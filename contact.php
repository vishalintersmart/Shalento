<?php
$pageTitle = 'Contact Shalento Medical Journey | Healthcare Travel Enquiries';
$pageDescription = 'Contact Shalento Medical Journey to enquire about healthcare coordination and travel support for patients exploring healthcare options in India.';
$preloadImage = 'hero-slide-1';
include "main.php";
?>
<link rel="stylesheet" href="assets/css/pages.min.css?v=<?= $assetVersion ?>">

<main id="pageWrapper" class="contactPage" tabindex="-1">

        <!-- Hero -->
        <section class="heroCarousel heroCarouselCompact" aria-labelledby="contact-title">
            <div class="heroCarouselSlides">
                <img class="heroCarouselImage" src="assets/images/hero-slide-1.webp" srcset="assets/images/hero-slide-1-828.webp 828w, assets/images/hero-slide-1-1280.webp 1280w, assets/images/hero-slide-1.webp 1920w" sizes="100vw" width="1920" height="1080" alt="A Shalento journey coordinator talking with a couple in a hotel lounge" fetchpriority="high" decoding="async">
            </div>
            <div class="heroCarouselOverlay" aria-hidden="true"></div>
            <div class="container heroCarouselContent">
                <div class="heroCarouselCopy">
                    <p class="sectionEyebrow">Contact us</p>
                    <h1 class="heroCarouselTitle" id="contact-title">Let&rsquo;s Talk About Your Healthcare Journey</h1>
                    <p class="heroCarouselText">Have questions about exploring healthcare options in India? Get in touch with Shalento Medical Journey. We&rsquo;re here to listen to your requirements and help you understand the coordination support available for your journey.</p>
                    <div class="heroCarouselFooter">
                        <div class="heroCarouselActions">
                            <a class="btn btnNavy" href="#enquiry-form">
                                Send an Enquiry
                                <img class="btnIcon" src="assets/images/icons/arrow-right-white.svg" width="20" height="20" alt="">
                            </a>
                            <a class="btn btnGold" href="#contact-details">
                                Contact Us
                                <img class="btnIcon" src="assets/images/icons/arrow-right-white.svg" width="20" height="20" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact details + enquiry form -->
        <div class="sectionSpace">
            <div class="container contactLayout">
                <section id="contact-details" class="contactDetails" aria-labelledby="contact-details-title">
                    <div class="sectionHeading" data-animate>
                        <p class="sectionEyebrow">We&rsquo;re here to help</p>
                        <h2 class="sectionTitle" id="contact-details-title">Start With a Conversation</h2>
                        <p class="sectionText">Whether you are exploring healthcare options in India or need information about travel and appointment coordination, our team welcomes your enquiry. Share a few details about what you are looking for, and we can discuss the next steps.</p>
                    </div>
                    <ul class="contactDetailsList" data-animate data-delay="1">
                        <li class="contactDetailsItem">
                            <span class="contactDetailsIcon"><img src="assets/images/icons/mail.svg" width="22" height="22" alt=""></span>
                            <span>
                                <span class="contactDetailsLabel">Email</span>
                                <span class="contactDetailsValue"><a href="mailto:Info@shalentomedicaljourney.co.uk">Info@shalentomedicaljourney.co.uk</a></span>
                            </span>
                        </li>
                        <li class="contactDetailsItem">
                            <span class="contactDetailsIcon"><img src="assets/images/icons/phone.svg" width="22" height="22" alt=""></span>
                            <span>
                                <span class="contactDetailsLabel">Phone / WhatsApp</span>
                                <span class="contactDetailsValue"><a href="tel:+447760954262">+44 7760954262</a></span>
                            </span>
                        </li>
                        <li class="contactDetailsItem">
                            <span class="contactDetailsIcon"><img src="assets/images/icons/map-pin.svg" width="22" height="22" alt=""></span>
                            <div>
                                <span class="contactDetailsLabel">UK office address</span>
                                <address class="contactDetailsValue">CM1 2HF <br>:6 Beaumont Chelmsford</address>
                            </div>
                        </li>
                    </ul>
                </section>

                <section id="enquiry-form" class="contactForm" aria-labelledby="enquiry-form-title" data-animate data-delay="1">
                    <div class="sectionHeading contactFormHead">
                        <p class="sectionEyebrow">Send an enquiry</p>
                        <h2 class="sectionTitle" id="enquiry-form-title">Tell Us How We Can Help</h2>
                        <p class="sectionText">Complete the form below and our team will review your enquiry and get in touch using your preferred contact method.</p>
                    </div>

                    <form id="contactForm" data-contact-form action="mailto:Info@shalentomedicaljourney.co.uk" method="post" novalidate>
                        <div class="contactFormTrap" aria-hidden="true">
                            <label>Leave this field empty<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
                        </div>
                        <fieldset class="enquiryGroup">
                            <legend class="enquiryLegend">Your details</legend>
                            <div class="enquiryGrid">
                                <div>
                                    <label class="enquiryField">Full name <b class="enquiryRequired">*</b><input class="enquiryInput" type="text" name="Full name" autocomplete="name" required data-error="Enter your full name."></label>
                                </div>
                                <div>
                                    <label class="enquiryField">Email address <b class="enquiryRequired">*</b><input class="enquiryInput" type="email" name="Email" autocomplete="email" required data-error="Enter a valid email address."></label>
                                </div>
                                <div>
                                    <label class="enquiryField">Phone number (include country code) <b class="enquiryRequired">*</b><input class="enquiryInput" type="tel" name="Phone" autocomplete="tel" placeholder="+44 7000 000000" required data-error="Enter your phone number, including the country code."></label>
                                </div>
                                <div>
                                    <label class="enquiryField">Country of residence (optional)<input class="enquiryInput" type="text" name="Country" autocomplete="country-name"></label>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="enquiryGroup">
                            <legend class="enquiryLegend">Preferred contact method</legend>
                            <div class="enquiryChips">
                                    <label class="enquiryChip"><input type="radio" name="Preferred contact method" value="Email" checked><span>Email</span></label>
                                    <label class="enquiryChip"><input type="radio" name="Preferred contact method" value="Phone"><span>Phone</span></label>
                                    <label class="enquiryChip"><input type="radio" name="Preferred contact method" value="WhatsApp"><span>WhatsApp</span></label>
                            </div>
                        </fieldset>

                        <fieldset class="enquiryGroup">
                            <legend class="enquiryLegend">Nature of enquiry</legend>
                            <div class="enquiryChips">
                                    <label class="enquiryChip"><input type="radio" name="Nature of enquiry" value="General enquiry" checked><span>General enquiry</span></label>
                                    <label class="enquiryChip"><input type="radio" name="Nature of enquiry" value="Healthcare provider coordination"><span>Healthcare provider coordination</span></label>
                                    <label class="enquiryChip"><input type="radio" name="Nature of enquiry" value="Travel and accommodation support"><span>Travel and accommodation support</span></label>
                                    <label class="enquiryChip"><input type="radio" name="Nature of enquiry" value="Other"><span>Other</span></label>
                            </div>
                        </fieldset>

                        <fieldset class="enquiryGroup">
                            <legend class="enquiryLegend">Your message</legend>
                            <label class="enquiryField">Message <b class="enquiryRequired">*</b><textarea class="enquiryInput" name="Message" maxlength="1000" required data-error="Tell us a little about what you are looking for."></textarea></label>
                            <p class="enquiryNote">Please do not include medical records, diagnoses or other sensitive health information in this general enquiry form.</p>
                        </fieldset>

                        <div>
                            <label class="enquiryCheck"><input type="checkbox" name="Consent" value="Yes" required data-error="Please confirm your consent to continue."><span>I agree to Shalento Medical Journey contacting me about my enquiry and acknowledge the <a href="#privacy">Privacy Policy</a>. <b class="enquiryRequired">*</b></span></label>
                        </div>
                        <button class="btn btnNavy enquirySubmit" type="submit">Send Enquiry</button>
                    </form>

                    <div class="contactFormDone" data-contact-done role="status" hidden>
                        <h3>Thank you for your enquiry</h3>
                        <p>Your email app has opened with your enquiry ready to send. Press send to complete it, and our team will get in touch using your preferred contact method.</p>
                    </div>
                </section>
            </div>
        </div>

        <!-- What happens next -->
        <section id="what-happens-next" class="nextSection darkSection sectionSpace" aria-labelledby="next-title">
            <div class="container">
                <div class="sectionHeading sectionHeadingCenter sectionHeadingLight" data-animate>
                    <p class="sectionEyebrow">After your enquiry</p>
                    <h2 class="sectionTitle" id="next-title">We&rsquo;re Here to Guide Your Next Steps.</h2>
                    <p class="sectionText">Once you submit your enquiry, our team will get in touch to understand your healthcare needs and travel preferences. We&rsquo;ll help you explore the available coordination options, answer your questions about our services and guide you through the next steps of planning your healthcare journey to India.</p>
                </div>
            </div>
        </section>

    </main>

<?php include "./includes/footer.php"; ?>
