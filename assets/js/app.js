/* Shalento — shared site behaviour */
(function () {
    'use strict';

    document.documentElement.classList.add('js');

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- Mobile navigation ---------- */
    function initNavigation() {
        var toggle = document.querySelector('.navToggle');
        var nav = document.getElementById('site-nav');
        if (!toggle || !nav) return;

        var desktop = window.matchMedia('(min-width: 1200px)');

        function setOpen(open) {
            toggle.setAttribute('aria-expanded', String(open));
            toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
            nav.classList.toggle('isOpen', open);
            document.body.classList.toggle('isNavOpen', open);
            // Keep focus inside the full-screen menu: everything behind it is inert while open
            Array.prototype.forEach.call(document.querySelectorAll('.skipLink, #pageWrapper, .siteFooter'), function (el) {
                el.inert = open;
            });
            if (open) {
                var firstLink = nav.querySelector('a');
                if (firstLink) firstLink.focus();
            }
        }

        toggle.addEventListener('click', function () {
            setOpen(toggle.getAttribute('aria-expanded') !== 'true');
        });

        nav.addEventListener('click', function (event) {
            if (event.target.closest('a')) setOpen(false);
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && nav.classList.contains('isOpen')) {
                setOpen(false);
                toggle.focus();
            }
        });

        desktop.addEventListener('change', function (event) {
            if (event.matches) setOpen(false);
        });
    }

    /* ---------- Hero carousel (Bootstrap) ---------- */
    function initHeroCarousel() {
        var el = document.getElementById('heroSlides');
        if (!el || !window.bootstrap) return;

        // Later slides are lazy (off-screen at load); fetch them once the page is idle so the first transition never fades to an empty slide
        window.addEventListener('load', function () {
            Array.prototype.forEach.call(el.querySelectorAll('img[loading="lazy"]'), function (img) {
                img.loading = 'eager';
            });
        });

        new window.bootstrap.Carousel(el, {
            interval: 6000,
            ride: reduceMotion ? false : 'carousel',
            pause: 'hover',
            touch: true,
            wrap: true
        });
    }

    /* ---------- Splide sliders ----------
       Every slider loops + autoplays only while it has more slides than perPage;
       otherwise it stays a static row. Options are mobile-first (min-width breakpoints). */
    var sliderBase = {
        arrows: false,
        pagination: true,
        perMove: 1,
        speed: 700,
        interval: 4000,
        pauseOnHover: true,
        pauseOnFocus: true,
        mediaQuery: 'min'
    };

    // ≥1200 sizes use the CSS --px scale unit so sliders shrink with the design on laptops
    var sliderConfigs = {
        services: { perPage: 1, gap: 16, breakpoints: { 768: { perPage: 2, gap: 22 }, 1200: { destroy: true } } },
        process: { perPage: 1, gap: 0, breakpoints: { 576: { perPage: 2 }, 992: { perPage: 3 }, 1200: { perPage: 5 } } },
        features: {
            perPage: 1,
            gap: 16,
            breakpoints: { 768: { perPage: 2 } },
            // Vertical + mousewheel only where a pointer is likely; avoids trapping touch scroll on phones
            vertical: { minWidth: 992, options: { direction: 'ttb', height: 'calc(583 * var(--px))', perPage: 2, gap: 'calc(18 * var(--px))', wheel: true, wheelSleep: 500, releaseWheel: true, breakpoints: {} } }
        },
        treatments: { perPage: 1, gap: 16, breakpoints: { 576: { perPage: 2 }, 992: { perPage: 3, gap: 24 }, 1200: { destroy: true } } },
        network: { perPage: 1, gap: 16, breakpoints: { 1200: { destroy: true } } },
        logos: { perPage: 2, gap: 16, breakpoints: { 576: { perPage: 3 }, 992: { perPage: 4, gap: 24 }, 1200: { perPage: 5, gap: 'calc(24 * var(--px))' } } },
        testimonials: { perPage: 1, gap: 16, breakpoints: { 768: { perPage: 2, gap: 24 }, 1200: { perPage: 3, gap: 'calc(24 * var(--px))' } } }
    };

    function resolveOptions(config) {
        var width = window.innerWidth;
        var options = Object.assign({}, config);

        if (config.vertical && width >= config.vertical.minWidth) {
            options = Object.assign(options, config.vertical.options);
        }
        delete options.vertical;

        // Effective values for the current width (Splide applies the same breakpoints itself)
        var effective = Object.assign({}, options);
        Object.keys(options.breakpoints || {}).map(Number).sort(function (a, b) { return a - b; }).forEach(function (bp) {
            if (width >= bp) Object.assign(effective, options.breakpoints[bp]);
        });

        return { options: options, effective: effective };
    }

    function initSlider(el) {
        var config = sliderConfigs[el.getAttribute('data-slider')];
        if (!config || !window.Splide) return;

        var count = el.querySelectorAll('.splide__list > .splide__slide').length;
        var instance = null;
        var signature = '';

        function stateFor(resolved) {
            var loop = !resolved.effective.destroy && count > (resolved.effective.perPage || 1);
            return { loop: loop, key: loop + '|' + (resolved.options.direction || 'ltr') };
        }

        function mount() {
            var resolved = resolveOptions(Object.assign({}, sliderBase, config));
            var state = stateFor(resolved);
            signature = state.key;

            instance = new window.Splide(el, Object.assign(resolved.options, {
                type: state.loop ? 'loop' : 'slide',
                autoplay: state.loop && !reduceMotion,
                drag: state.loop,
                wheel: state.loop && resolved.options.wheel
            }));
            instance.mount();
            el.dispatchEvent(new CustomEvent('slider:mounted', { detail: { splide: instance, looping: state.loop } }));
        }

        mount();

        var timer;
        window.addEventListener('resize', function () {
            clearTimeout(timer);
            timer = setTimeout(function () {
                var next = stateFor(resolveOptions(Object.assign({}, sliderBase, config)));
                if (next.key !== signature) {
                    instance.destroy(true);
                    mount();
                }
            }, 200);
        });
    }

    /* ---------- How it works: step-by-step activation ---------- */
    function initProcessSteps() {
        var root = document.querySelector('[data-slider="process"]');
        if (!root) return;

        var index = 0;
        var timer = null;
        var inView = false;
        var isStatic = false;

        function steps() {
            return root.querySelectorAll('.splide__list > .stepItem:not(.splide__slide--clone)');
        }

        function paint() {
            Array.prototype.forEach.call(steps(), function (step, n) {
                step.classList.toggle('isActive', n === index);
                step.classList.toggle('isComplete', n < index);
            });
        }

        function clear() {
            Array.prototype.forEach.call(steps(), function (step) {
                step.classList.remove('isActive', 'isComplete');
            });
        }

        function stop() {
            clearInterval(timer);
            timer = null;
        }

        function start() {
            stop();
            if (!isStatic || !inView) return;
            paint();
            if (reduceMotion) return;
            timer = setInterval(function () {
                index = (index + 1) % steps().length;
                paint();
            }, 2600);
        }

        // While the slider loops, Splide's own is-active class drives the highlight
        root.addEventListener('slider:mounted', function (event) {
            isStatic = !event.detail.looping;
            index = 0;
            if (isStatic) {
                start();
            } else {
                stop();
                clear();
            }
        });

        if ('IntersectionObserver' in window) {
            new IntersectionObserver(function (entries) {
                inView = entries[0].isIntersecting;
                if (inView) start(); else stop();
            }, { threshold: 0.35 }).observe(root);
        } else {
            inView = true;
        }
    }

    /* ---------- Scroll reveal ---------- */
    function initReveal() {
        var items = document.querySelectorAll('[data-animate]');
        if (!items.length) return;

        if (reduceMotion || !('IntersectionObserver' in window)) {
            Array.prototype.forEach.call(items, function (item) { item.classList.add('isVisible'); });
            return;
        }

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('isVisible');
                    observer.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.12 });

        Array.prototype.forEach.call(items, function (item) { observer.observe(item); });
    }

    initNavigation();
    initHeroCarousel();
    initProcessSteps();
    Array.prototype.forEach.call(document.querySelectorAll('[data-slider]'), initSlider);
    initReveal();
})();
