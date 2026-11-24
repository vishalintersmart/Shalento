<a class="skipLink" href="#pageWrapper">Skip to content</a>

    <header class="siteHeader" id="site-header">
        <div class="container siteHeaderInner">
            <a class="siteLogo" href="index.php" aria-label="Shalento Medical Journey home">
                <img src="assets/images/logo-white.webp" srcset="assets/images/logo-white-256.webp 256w, assets/images/logo-white.webp 512w" sizes="(min-width: 1920px) 256px, (min-width: 1200px) 200px, (min-width: 768px) 160px, 120px" width="256" height="163" alt="Shalento Medical Journey Ltd. — Global Healthcare Travel" decoding="async" fetchpriority="high">
            </a>

            <nav class="siteNav" id="site-nav" aria-label="Primary">
                <ul class="siteNavList">
                    <li><a class="siteNavLink" href="about.php"<?= $page === 'about' ? ' aria-current="page"' : '' ?>>About</a></li>
                    <li><a class="siteNavLink" href="<?= $home ?>#our-services">Services</a></li>
                    <li><a class="siteNavLink" href="<?= $home ?>#how-it-works">How it works</a></li>
                    <li><a class="siteNavLink" href="<?= $home ?>#treatments">Treatments</a></li>
                    <li><a class="siteNavLink" href="<?= $home ?>#faqs">FAQs</a></li>
                    <li><a class="siteNavLink" href="contact.php"<?= $page === 'contact' ? ' aria-current="page"' : '' ?>>Contact</a></li>
                </ul>
                <a class="btn btnGold siteNavCta" href="#contact" data-bs-toggle="modal" data-bs-target="#enquiryModal">
                    Start your Journey
                    <img class="btnIcon" src="assets/images/icons/arrow-right-white.svg" width="20" height="20" alt="">
                </a>
            </nav>

            <div class="siteHeaderActions">
                <a class="btn btnGlass siteHeaderCta" href="#contact" data-bs-toggle="modal" data-bs-target="#enquiryModal">
                    Start your Journey
                    <img class="btnIcon" src="assets/images/icons/arrow-right-gold.svg" width="20" height="20" alt="">
                </a>
                <button class="navToggle" type="button" aria-expanded="false" aria-controls="site-nav" aria-label="Open menu">
                    <span class="navToggleBar"></span>
                </button>
            </div>
        </div>
    </header>
