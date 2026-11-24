<!-- Enquiry modal -->
    <div class="modal fade enquiryModal" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content enquiryModalContent">
                <div class="enquiryModalHeader">
                    <button type="button" class="enquiryModalClose" data-bs-dismiss="modal" aria-label="Close enquiry form"><span aria-hidden="true">&times;</span></button>
                    <h2 class="enquiryModalTitle" id="enquiryTitle">Start your healthcare journey</h2>
                    <p class="enquiryModalQuote">&ldquo;Your journey to better healthcare starts with a conversation.&rdquo;</p>
                    <p class="enquiryModalIntro">Tell us how we can assist you. Our team will contact you to discuss your healthcare coordination requirements.</p>
                </div>
                <div class="modal-body enquiryModalBody" data-lenis-prevent>
                    <form id="enquiryForm" action="mailto:Info@shalentomedicaljourney.co.uk" method="post">
                    <fieldset class="enquiryGroup">
                        <legend class="enquiryLegend">Your contact details</legend>
                        <div class="enquiryGrid">
                            <label class="enquiryField">Full name <b class="enquiryRequired">*</b><input class="enquiryInput" type="text" name="Full name" autocomplete="name" required></label>
                            <label class="enquiryField">Email address <b class="enquiryRequired">*</b><input class="enquiryInput" type="email" name="Email" autocomplete="email" required></label>
                            <label class="enquiryField">Contact number / WhatsApp <b class="enquiryRequired">*</b><input class="enquiryInput" type="tel" name="Phone" autocomplete="tel" required></label>
                            <label class="enquiryField">Country of residence <b class="enquiryRequired">*</b><input class="enquiryInput" type="text" name="Country" autocomplete="country-name" required></label>
                        </div>
                    </fieldset>
                    <fieldset class="enquiryGroup">
                        <legend class="enquiryLegend">Healthcare service</legend>
                        <div class="enquiryChips">
                            <label class="enquiryChip"><input type="checkbox" name="Healthcare service" value="Cancer Care &amp; Oncology"><span>Cancer Care &amp; Oncology</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="Healthcare service" value="Dental Care"><span>Dental Care</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="Healthcare service" value="Cardiology"><span>Cardiology</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="Healthcare service" value="Orthopaedics"><span>Orthopaedics</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="Healthcare service" value="Fertility &amp; Women&rsquo;s Health"><span>Fertility &amp; Women&rsquo;s Health</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="Healthcare service" value="Eye Care"><span>Eye Care</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="Healthcare service" value="Cosmetic Surgery"><span>Cosmetic Surgery</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="Healthcare service" value="Health Screening"><span>Health Screening</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="Healthcare service" value="Ayurveda &amp; Wellness"><span>Ayurveda &amp; Wellness</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="Healthcare service" value="Other / Not sure yet"><span>Other / Not sure yet</span></label>
                        </div>
                    </fieldset>
                    <fieldset class="enquiryGroup">
                        <legend class="enquiryLegend">Preferred destination</legend>
                        <div class="enquiryChips">
                            <label class="enquiryChip"><input type="radio" name="Preferred destination" value="Kerala"><span>Kerala</span></label>
                            <label class="enquiryChip"><input type="radio" name="Preferred destination" value="Elsewhere in India"><span>Elsewhere in India</span></label>
                            <label class="enquiryChip"><input type="radio" name="Preferred destination" value="Open to suggestions"><span>Open to suggestions</span></label>
                        </div>
                    </fieldset>
                    <fieldset class="enquiryGroup">
                        <legend class="enquiryLegend">How can we help?</legend>
                        <div class="enquiryChips">
                            <label class="enquiryChip"><input type="checkbox" name="How can we help" value="Healthcare provider exploration"><span>Healthcare provider exploration</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="How can we help" value="Appointment coordination"><span>Appointment coordination</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="How can we help" value="Initial consultation arrangements"><span>Initial consultation arrangements</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="How can we help" value="Travel planning"><span>Travel planning</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="How can we help" value="Accommodation assistance"><span>Accommodation assistance</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="How can we help" value="Airport pickup and transportation"><span>Airport pickup and transportation</span></label>
                            <label class="enquiryChip"><input type="checkbox" name="How can we help" value="Patient and family arrangements"><span>Patient and family arrangements</span></label>
                        </div>
                    </fieldset>
                    <fieldset class="enquiryGroup">
                        <legend class="enquiryLegend">Travel plans</legend>
                        <div class="enquiryChips">
                            <label class="enquiryChip"><input type="radio" name="Travel plans" value="As soon as possible"><span>As soon as possible</span></label>
                            <label class="enquiryChip"><input type="radio" name="Travel plans" value="Within one month"><span>Within one month</span></label>
                            <label class="enquiryChip"><input type="radio" name="Travel plans" value="Within three months"><span>Within three months</span></label>
                            <label class="enquiryChip"><input type="radio" name="Travel plans" value="Within six months"><span>Within six months</span></label>
                            <label class="enquiryChip"><input type="radio" name="Travel plans" value="Not decided yet"><span>Not decided yet</span></label>
                        </div>
                    </fieldset>
                    <fieldset class="enquiryGroup">
                        <legend class="enquiryLegend">Additional information</legend>
                        <label class="enquiryField">Message (optional)<textarea class="enquiryInput" name="Message" maxlength="1000"></textarea></label>
                        <p class="enquiryNote">Please do not include detailed medical histories, diagnoses, test results or medical records in this initial enquiry.</p>
                    </fieldset>
                        <label class="enquiryCheck"><input type="checkbox" name="Privacy notice acknowledged" value="Yes" required><span>I have read and acknowledge the <a href="#privacy">Privacy Notice</a>. <b class="enquiryRequired">*</b></span></label>
                        <label class="enquiryCheck"><input type="checkbox" name="Authorised to submit for another patient" value="Yes"><span>If I am submitting this enquiry on behalf of another patient, I confirm I am authorised to do so.</span></label>
                        <button class="btn btnNavy enquirySubmit" type="submit">Submit my enquiry</button>
                        <p class="enquiryCare">Your information is handled with care and used to respond to your enquiry.</p>
                    </form>
                    <div class="enquiryDone" id="enquiryDone" role="status" hidden>
                        <h3 class="enquiryDoneTitle">Thank you for your enquiry</h3>
                        <p>Your email app has opened with your enquiry ready to send. Press send to complete it, and our team will contact you to discuss your healthcare coordination requirements.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
