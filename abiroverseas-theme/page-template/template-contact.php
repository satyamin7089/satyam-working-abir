<?php
/**
 * Template Name: Contact Abiroverseas
 * Template Post Type: page
 * Contact page using the shared Abiroverseas material-enquiry handler.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

$ab_contact_result = '';
if ( isset( $_GET['ab_enquiry'] ) && is_scalar( $_GET['ab_enquiry'] ) ) {
    $ab_contact_result = sanitize_key( wp_unslash( $_GET['ab_enquiry'] ) );
}
?>
<main id="main-content" class="ab-contact-page">
    <section class="ab-contact-hero" aria-labelledby="ab-contact-title">
        <div class="ab-wrap ab-contact-hero-grid">
            <div class="ab-contact-hero-copy">
                <span class="ab-eyebrow">Let’s talk materials · we’re here to help</span>
                <h1 id="ab-contact-title">Contact Abiroverseas.</h1>
                <p class="ab-contact-hero-lead">Have a material requirement or a question about supply? Tell us what your process needs and let’s start a clear, useful conversation.</p>
                <div class="ab-contact-hero-actions">
                    <a class="ab-btn" href="#quick-enquiry">SEND AN ENQUIRY <svg class="ab-icon" aria-hidden="true"><use href="#ab-icon-arrow" /></svg></a>
                    <a class="ab-btn ab-btn--light" href="mailto:info@abiroverseas.com">EMAIL OUR TEAM</a>
                </div>
                <div class="ab-contact-hero-meta">
                    <a href="mailto:info@abiroverseas.com"><span class="ab-contact-meta-mark" aria-hidden="true">✉</span><span><strong>Email us</strong><small>info@abiroverseas.com</small></span></a>
                    <a href="tel:+18565233366"><span class="ab-contact-meta-mark ab-contact-meta-mark--orange" aria-hidden="true">↗</span><span><strong>Call our team</strong><small>+1 (856) 523 3366</small></span></a>
                </div>
            </div>
            <div class="ab-contact-hero-art" role="img" aria-label="Close-up of industrial polymer resin pellets and flowing material forms">
                <img class="ab-contact-hero-img" src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/10/Industrial-Resin-Pellets-and-Flowing-Waves.png' ) ); ?>" alt="Industrial resin pellets and flowing polymer forms" width="900" height="700" fetchpriority="high">
                <span class="ab-contact-art-tag">Materials · forms · applications</span>
                <div class="ab-contact-art-caption"><span class="ab-contact-caption-dot" aria-hidden="true"></span><span><small>Start with your requirement</small><strong>Find the right material conversation.</strong></span></div>
                <span class="ab-contact-art-orbit" aria-hidden="true"></span>
            </div>
        </div>
    </section>

    <section class="ab-contact-main ab-section" id="quick-enquiry" aria-labelledby="ab-contact-form-title">
        <div class="ab-wrap">
            <div class="ab-contact-intro">
                <span class="ab-eyebrow">Contact our team</span>
                <h2 id="ab-contact-form-title">How can we help you?</h2>
                <p>Share a few details below and tell us what you’re looking for. If you already know the material, grade, form, or intended application, include it in your message.</p>
            </div>

            <?php if ( 'sent' === $ab_contact_result ) : ?>
                <div class="ab-contact-notice ab-contact-notice--success" role="status" aria-live="polite">
                    <strong>Thank you for contacting Abiroverseas.</strong>
                    <span>Your enquiry has been submitted successfully. We’ll review the details and follow up as appropriate.</span>
                </div>
            <?php elseif ( 'error' === $ab_contact_result ) : ?>
                <div class="ab-contact-notice ab-contact-notice--error" role="alert">
                    <strong>We couldn’t submit your enquiry.</strong>
                    <span>Please check the required fields and try again. If the problem continues, contact us by email or phone.</span>
                </div>
            <?php endif; ?>

            <div class="ab-contact-layout">
                <aside class="ab-contact-aside" aria-label="Contact information">
                    <div class="ab-contact-aside-heading">
                        <span class="ab-contact-kicker">A clear starting point</span>
                        <h3>Let’s make your material enquiry easier.</h3>
                        <p>Whether you have a detailed specification or are still exploring options, share what you know and we’ll help clarify the next step.</p>
                    </div>
                    <a class="ab-contact-detail" href="mailto:info@abiroverseas.com">
                        <span class="ab-contact-detail-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none"><path d="M3.5 6.5h17v11h-17zM4 7l8 6 8-6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span><small>Email us</small><strong>info@abiroverseas.com</strong><em>For product and business enquiries</em></span>
                    </a>
                    <a class="ab-contact-detail" href="tel:+18565233366">
                        <span class="ab-contact-detail-icon ab-contact-detail-icon--orange" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none"><path d="M7.1 3.8H4.8c-.8 0-1.4.7-1.3 1.5.7 7.9 7.1 14.3 15 15 .8.1 1.5-.5 1.5-1.3v-2.3l-4.1-1-1.3 2a14.3 14.3 0 0 1-6.5-6.5l2-1.3-1-4.1z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span><small>Call us</small><strong>+1 (856) 523 3366</strong><em>Speak with our team</em></span>
                    </a>
                    <div class="ab-contact-aside-note"><span class="ab-contact-note-dot" aria-hidden="true"></span><p>Helpful details include material type, grade, required form, application, approximate quantity, and destination.</p></div>
                    <div class="ab-contact-aside-decoration" aria-hidden="true"><span></span><span></span><span></span></div>
                </aside>

                <form class="ab-form-card ab-contact-form" id="ab-contact-enquiry-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
                    <input type="hidden" name="action" value="ab_material_enquiry">
                    <input type="hidden" name="enquiry_kind" value="general">
                    <?php wp_nonce_field( 'ab_material_enquiry', 'ab_material_enquiry_nonce' ); ?>
                    <label class="ab-honeypot" aria-hidden="true">Leave this field empty<input type="text" name="ab_website" tabindex="-1" autocomplete="off"></label>

                    <div class="ab-contact-form-heading">
                        <span class="ab-contact-step">01 <i aria-hidden="true"></i> YOUR DETAILS</span>
                        <h3>Send us your enquiry</h3>
                        <p>Fields marked with an asterisk are required.</p>
                    </div>
                    <div class="ab-form-grid">
                        <div class="ab-field">
                            <label for="contact-name">Full name <span aria-hidden="true">*</span></label>
                            <input id="contact-name" name="name" type="text" autocomplete="name" required maxlength="120" placeholder="Your full name">
                        </div>
                        <div class="ab-field">
                            <label for="contact-email">Business email <span aria-hidden="true">*</span></label>
                            <input id="contact-email" name="email" type="email" autocomplete="email" required maxlength="254" placeholder="name@company.com">
                        </div>
                        <div class="ab-field">
                            <label for="contact-company">Company name</label>
                            <input id="contact-company" name="company" type="text" autocomplete="organization" maxlength="160" placeholder="Your company">
                        </div>
                        <div class="ab-field">
                            <label for="contact-topic">Enquiry type <span aria-hidden="true">*</span></label>
                            <select id="contact-topic" name="topic" required>
                                <option value="">Choose a topic</option>
                                <option>Product enquiry</option>
                                <option>Material availability</option>
                                <option>Grade selection help</option>
                                <option>General business enquiry</option>
                                <option>Technical guidance</option>
                                <option>PP</option>
                                <option>HDPE</option>
                                <option>LDPE / LLDPE</option>
                                <option>PVC</option>
                                <option>PET</option>
                                <option>ABS</option>
                                <option>PS / HIPS</option>
                                <option>Engineering plastics</option>
                                <option>Masterbatch / additives</option>
                                <option>Recycled polymers</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="ab-field ab-field--full">
                            <label for="contact-message">How can we help? <span aria-hidden="true">*</span></label>
                            <textarea id="contact-message" name="message" required maxlength="5000" rows="5" placeholder="Tell us about the material, grade, form, application, quantity, or timing you have in mind."></textarea>
                        </div>
                    </div>
                    <div class="ab-form-foot">
                        <button class="ab-btn ab-contact-submit" type="submit">Submit enquiry <span aria-hidden="true">↗</span></button>
                        <span class="ab-contact-secure-note"><span aria-hidden="true">✓</span> Your details are used to respond to your enquiry.</span>
                    </div>
                    <p class="ab-form-disclaimer">Your message is sent to the site administrator email configured in WordPress.</p>
                </form>
            </div>
        </div>
    </section>


</main>
<?php get_footer(); ?>