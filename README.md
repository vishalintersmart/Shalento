# Shalento Medical Journey — PHP site

PHP-assembled static site (PHP only composes shared templates; no application logic). Styles are authored in indented Sass (ITCSS layers) and compiled to `assets/css`.

## Build

```bash
npm install
npm run build      # copies vendor JS (Bootstrap, Splide) + compiles app.min.css / pages.min.css
npm run watch:css  # recompile on change while developing
npm run build:static # optional: render *.php to local *.html previews (git-ignored; needs php on PATH)
```

The site needs a PHP host. GitHub Pages cannot run PHP, so the repo carries no `*.html`; the generated copies are git-ignored.

## Page structure

- `main.php` document shell (head, shared CSS, opens `<body>`, loads the header); pages set `$pageTitle`, `$pageDescription`, `$preloadImage` first
- `includes/header.php`, `includes/footer.php` (footer, enquiry modal, shared scripts, closes the document), `includes/enquiry-modal.php`
- `index.php`, `about.php`, `contact.php`, `404.php`: page content only, inside `<main id="pageWrapper" class="<name>Page">`
- Bump `$assetVersion` in `main.php` after a release build

## Sass structure

- `assets/sass/0-abstracts` tokens + mixins (no output)
- `assets/sass/1-base` font, reset, responsive scale, container, reveal animations
- `assets/sass/2-plugins` Bootstrap carousel (compiled from source) + Splide core
- `assets/sass/3-modules` reusable sections/cards (buttons, serviceCard, treatmentCard, …)
- `assets/sass/4-layouts` header + footer
- `assets/sass/5-pages` page-scoped overrides only (`.homePage`, `.aboutPage`, `.contactPage`, `.errorPage`)
- `assets/js/app.js` shared behaviour: nav, hero carousel, sliders, step animation, scroll reveal

## Sliders

Add `class="splide …" data-slider="<key>"` and a config entry in `sliderConfigs` (app.js).
A slider loops + autoplays only while it has more slides than `perPage`; otherwise it stays static.
`destroy: true` at a breakpoint turns it into the module's CSS grid.
