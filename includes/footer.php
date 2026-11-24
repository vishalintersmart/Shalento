<footer class="siteFooter">
        <?php if ($page !== 'contact') : ?>
        <section id="contact" class="footerCallout" aria-labelledby="footer-callout-title">
            <div class="container footerCalloutInner">
                <div class="footerCalloutCopy" data-animate>
                    <p class="footerEyebrow">Private consultation</p>
                    <h2 class="footerCalloutTitle" id="footer-callout-title">Your healthcare journey begins with a conversation.</h2>
                    <p class="footerCalloutText">Share your needs with a dedicated Journey Coordinator and receive clear, personal guidance on your next steps.</p>
                </div>
                <a class="btn btnSolid" href="mailto:Info@shalentomedicaljourney.co.uk?subject=Consultation%20request" data-bs-toggle="modal" data-bs-target="#enquiryModal" data-animate data-delay="1">
                    Request a consultation
                    <img class="btnIcon" src="assets/images/icons/arrow-right-dark.svg" width="20" height="20" alt="">
                </a>
            </div>
        </section>
        <?php endif; ?>

        <div class="footerMain">
            <div class="container">
                <div class="footerColumns">
                    <div class="footerBrand">
                        <a href="index.php" aria-label="Shalento Medical Journey home">
                            <img loading="lazy" src="assets/images/logo-footer.webp" width="264" height="168" alt="Shalento Medical Journey Ltd." decoding="async">
                        </a>
                        <p class="footerTagline">Thoughtful coordination for a clearer, more personal healthcare journey in India.</p>
                        <p class="footerNote">We coordinate care and travel; medical advice and treatment are provided independently by your chosen healthcare professionals.</p>
                    </div>

                    <nav class="footerColumn" aria-labelledby="footer-explore">
                        <h2 class="footerColumnTitle" id="footer-explore">Explore</h2>
                        <ul class="footerLinks">
                            <li><a href="about.php">About Shalento</a></li>
                            <li><a href="<?= $home ?>#our-services">Our services</a></li>
                            <li><a href="<?= $home ?>#how-it-works">How it works</a></li>
                            <li><a href="<?= $home ?>#treatments">Treatments</a></li>
                            <li><a href="<?= $home ?>#why-india">Why India</a></li>
                        </ul>
                    </nav>

                    <nav class="footerColumn" aria-labelledby="footer-support">
                        <h2 class="footerColumnTitle" id="footer-support">Patient support</h2>
                        <ul class="footerLinks">
                            <li><a href="<?= $home ?>#how-it-works">Plan your journey</a></li>
                            <li><a href="<?= $home ?>#healthcare-network">Hospital coordination</a></li>
                            <li><a href="<?= $home ?>#our-services">Travel &amp; accommodation</a></li>
                            <li><a href="<?= $home ?>#faqs">Patient FAQs</a></li>
                        </ul>
                    </nav>

                    <div class="footerColumn footerContact">
                        <h2 class="footerColumnTitle">Speak with our team</h2>
                        <ul class="footerContactList">
                            <li class="footerContactItem">
                                <span class="footerContactIcon"><img src="assets/images/icons/mail.svg" width="16" height="16" alt=""></span>
                                <span>
                                    <span class="footerContactLabel">Email</span>
                                    <span class="footerContactValue"><a href="mailto:Info@shalentomedicaljourney.co.uk">Info@shalentomedicaljourney.co.uk</a></span>
                                </span>
                            </li>
                            <li class="footerContactItem">
                                <span class="footerContactIcon"><img src="assets/images/icons/phone.svg" width="16" height="16" alt=""></span>
                                <span>
                                    <span class="footerContactLabel">International enquiries</span>
                                    <span class="footerContactValue"><a href="tel:+447760954262">+44 7760954262</a></span>
                                </span>
                            </li>
                            <li class="footerContactItem">
                                <span class="footerContactIcon"><img src="assets/images/icons/map-pin.svg" width="16" height="16" alt=""></span>
                                <div>
                                    <span class="footerContactLabel">Coordination office</span>
                                    <address class="footerContactValue">CM1 2HF <br>:6 Beaumont Chelmsford</address>
                                </div>
                            </li>
                        </ul>
                        <p class="footerHours">Monday–Saturday · 09:00–18:00 IST</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="footerLegal">
            <div class="container footerLegalInner">
                <p class="footerCopyright">© 2026 Shalento Medical Journey. All rights reserved.</p>
                <p class="footerLegalTag">INDIA · GLOBAL PATIENT SUPPORT</p>
            </div>
        </div>
    </footer>

<?php include "includes/enquiry-modal.php"; ?>

<script src="assets/js/vendor/bootstrap.min.js" defer></script>
<script src="assets/js/vendor/splide.min.js" defer></script>
<script src="assets/js/vendor/lenis.min.js" defer></script>
<script src="assets/js/app.js?v=<?= $assetVersion ?>" defer></script>

</body>
</html>
