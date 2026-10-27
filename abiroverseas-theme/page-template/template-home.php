<?php
/**
 * Template Name: Homepage
 * Template Post Type: page
 * Exact layout/content based on the supplied finalized HTML file.
 */
get_header();
?>
<main id="main-content">
        <!-- 1. Hero & primary CTA -->
        <section class="ab-home-hero" aria-labelledby="home-title">
            <div class="ab-home-slides">
               
               
                <!-- Banner four: blurred background plus a four-image right-side fade carousel. -->
                <article class="ab-home-slide ab-home-slide--final">
                    <div class="ab-wrap ab-hero-grid ab-hero-grid--gallery"><div class="ab-hero-copy"><span class="ab-eyebrow">Materials · forms · applications</span><h1 id="home-title">Transforming Industrial Plastics
Across the Globe</h1><p>Abir bridges the worlds of recycling and manufacturing, transforming discarded plastics into valuable resources with renewed purpose. Rooted in trust, reliability, and a growing global reach, we partner with businesses across continents to deliver sustainable, high-quality solutions that drive the circular economy forward. Our mission is to reimagine the lifecycle of plastics and build a future where nothing goes to waste.</p><div class="ab-hero-actions"><a class="ab-btn" href="#quick-enquiry">START AN ENQUIRY <svg class="ab-icon" aria-hidden="true"><use href="#ab-icon-arrow" /></svg></a><a class="ab-btn ab-btn--light" href="#product-families">BROWSE MATERIALS</a></div></div>
                        <div class="ab-hero-art ab-hero-art--rotating" aria-label="Polymer materials image gallery"><span class="ab-art-tag">A closer look · materials</span><div class="ab-hero-photo-frame" data-hero-photo-gallery>
                            <figure class="ab-hero-photo is-active" data-hero-photo aria-hidden="false"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/10/r-p-10.png' ) ); ?>" alt="Industrial resin pellets and flowing waves" loading="lazy"></figure>
                            <figure class="ab-hero-photo" data-hero-photo aria-hidden="true"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/10/Frame-9.jpg' ) ); ?>" alt="Polymer pellets in an industrial plant" loading="lazy"></figure>
                            <figure class="ab-hero-photo" data-hero-photo aria-hidden="true"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/10/Frame-10.jpg' ) ); ?>" alt="Colorful polymer resin pellets" loading="lazy"></figure>
                            <figure class="ab-hero-photo" data-hero-photo aria-hidden="true"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/10/Frame-1.jpg' ) ); ?>" alt="Virgin and recycled polymer pellets" loading="lazy"></figure>
                        </div>
                        <div class="ab-hero-gallery-controls" aria-label="Gallery controls">
                            <button class="ab-hero-gallery-arrow ab-hero-gallery-arrow--prev" type="button" data-photo-prev aria-label="Previous gallery image"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M15 18 9 12l6-6" /></svg></button>
                            <div class="ab-hero-gallery-thumbs" role="group" aria-label="Choose a gallery image">
                                <button class="ab-hero-gallery-thumb is-active" type="button" data-photo-thumb="0" aria-label="Show industrial resin pellets image" aria-pressed="true"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/10/r-p-10.png' ) ); ?>" alt="" loading="lazy"></button>
                                <button class="ab-hero-gallery-thumb" type="button" data-photo-thumb="1" aria-label="Show polymer plant image" aria-pressed="false"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/10/Frame-9.jpg' ) ); ?>" alt="" loading="lazy"></button>
                                <button class="ab-hero-gallery-thumb" type="button" data-photo-thumb="2" aria-label="Show colorful polymer pellets image" aria-pressed="false"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/10/Frame-10.jpg' ) ); ?>" alt="" loading="lazy"></button>
                                <button class="ab-hero-gallery-thumb" type="button" data-photo-thumb="3" aria-label="Show recycled and virgin polymer image" aria-pressed="false"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/10/Frame-1.jpg' ) ); ?>" alt="" loading="lazy"></button>
                            </div>
                            <button class="ab-hero-gallery-arrow ab-hero-gallery-arrow--next" type="button" data-photo-next aria-label="Next gallery image"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m9 18 6-6-6-6" /></svg></button>
                        </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
        <!-- 2. Product families. Image placeholders are data-URI SVGs: replace each img src with a relative image path and update its alt; keep the existing 
image class for responsive cropping. -->
        <section class="ab-section ab-section--white" id="product-families" aria-labelledby="families-title">
            <div class="ab-wrap">
                <div class="ab-head-row ab-head-row--families">
                    <div class="ab-section-head ab-reveal"><span class="ab-eyebrow">Explore the range</span>
                        <h2 id="families-title">Polymer families, made easier to navigate.</h2>
                    </div>
                    <div class="ab-family-head-actions"><a class="ab-btn ab-btn--outline"
                            href="<?php echo esc_url( home_url( '/hdpe/' ) ); ?>">EXPLORE HDPE <svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a><a class="ab-btn" href="<?php echo esc_url( home_url( '/knowledge/' ) ); ?>">VIEW
                            KNOWLEDGE CENTER <svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a></div>
                </div>
                <div class="ab-family-grid">
                    <article id="material-pp" class="ab-family-card ab-reveal">
                        <div class="ab-family-visual"><img class="ab-family-img" src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/10/Frame-9.jpg' ) ); ?>"
                                width="600" height="280" alt="PP polymer pellets - macro photograph" loading="lazy"
                                decoding="async"></div>
                        <h3>PP</h3>
                        <p class="ab-family-summary">A polypropylene family for process-led applications. Share your
                            moulding or extrusion method, the target properties and any existing grade for review.</p><a
                            class="ab-link" href="#quick-enquiry" data-enquiry="PP">Enquire about this group <svg
                                class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a>
                    </article>
                    <article id="material-hdpe" class="ab-family-card ab-reveal ab-reveal-delay-1">
                        <div class="ab-family-visual"><img class="ab-family-img" src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/10/r-p-10.png' ) ); ?>"
                                width="600" height="280" alt="HDPE polymer pellets - macro photograph" loading="lazy"
                                decoding="async"></div>
                        <h3>HDPE</h3>
                        <p class="ab-family-summary">Reprocessed or recycled
                            HDPE enquiries can include granules, powder
                            or compounds. Confirm the source, grade, documents
                            and current supply for the specific
                            requirement.</p><a class="ab-link" href="<?php echo esc_url( home_url( '/hdpe/' ) ); ?>">Explore HDPE <svg
                                class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a>
                    </article>
                    <article id="material-ldpe-lldpe" class="ab-family-card ab-reveal ab-reveal-delay-2">
                        <div class="ab-family-visual"><img class="ab-family-img" src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/10/Frame-1.jpg' ) ); ?>"
                                width="600" height="280" alt="LDPE / LLDPE polymer pellets - macro photograph"
                                loading="lazy" decoding="async"></div>
                        <h3>LDPE / LLDPE</h3>
                        <p class="ab-family-summary">Compare flexible
                            polyethylene options by film type, processing
                            route, grade, thickness and intended packaging
                            application.</p><a class="ab-link" href="#quick-enquiry" data-enquiry="LDPE / LLDPE">Enquire
                            about this group <svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a>
                    </article>
                    <!--<article id="material-pvc" class="ab-family-card ab-reveal ab-reveal-delay-2">
                        <div class="ab-family-visual"><img class="ab-family-img"                                
src="<?php echo esc_url( get_theme_file_uri( '/assets/img/pellets-macro.jpg' ) ); ?>"
                                width="600" height="280" alt="PVC / PET polymer pellets - macro photograph"
                                loading="lazy" decoding="async"></div>
                        <h3>PVC / PET</h3>
                        <p class="ab-family-summary">PVC and PET are distinct 
polymer families. Share the exact resin,
                            product application, processing method and relevant technical specification.</p><a
                            class="ab-link" href="#quick-enquiry" data-enquiry="PVC / PET">Enquire about this group <svg
                                class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a>
                    </article>
                    <article id="material-abs-ps-hips" class="ab-family-card ab-reveal ab-reveal-delay-1">
                        <div class="ab-family-visual"><img class="ab-family-img"                                
src="<?php echo esc_url( get_theme_file_uri( '/assets/img/pellets-macro.jpg' ) ); ?>"
                                width="600" height="280" alt="ABS / PS-HIPS polymer pellets - macro photograph"
                                loading="lazy" decoding="async"></div>
                        <h3>ABS / PS-HIPS</h3>
                        <p class="ab-family-summary">ABS, polystyrene and HIPS 
have different performance profiles.
                            Specify the resin or existing grade, impact needs, 
appearance and process.</p><a
                            class="ab-link" href="#quick-enquiry" data-enquiry="ABS / PS-HIPS">Enquire about this group
                            <svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a>
                    </article>
                    <article id="material-recycled-polymers" class="ab-family-card ab-reveal ab-reveal-delay-2">
                        <div class="ab-family-visual"><img class="ab-family-img"                                
src="<?php echo esc_url( get_theme_file_uri( '/assets/img/virgin-vs-recycled.jpg' ) ); ?>"
                                width="600" height="280"
                                alt="Virgin vs recycled polymer materials comparison"
                                loading="lazy" decoding="async"></div>
                        <h3>Specialty & recycled materials</h3>
                        <p class="ab-family-summary">Specify the engineering 
resin, base polymer, additive or
                            recycled-material source, together with grade, form, application and documentation needs.
                        </p><a class="ab-link" href="#quick-enquiry"
                            data-enquiry="Specialty &amp; recycled materials">Enquire about this group <svg
                                class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a>
                    </article>-->
                </div>
              
            </div>
        </section>
        <!-- 3. Material grades & forms 
        <section class="ab-section ab-section--mist" id="materials" aria-labelledby="materials-title">
            <div class="ab-wrap">
                <div class="ab-section-head ab-reveal"><span class="ab-eyebrow">Specification, simplified</span>
                    <h2 id="materials-title">Find the right starting point.</h2>
                    <p>Material selection should be based on the actual grade,
                        processing method, technical
                        requirements, documentation, and end application.</p>
                </div>
                <div class="ab-grade-board">
                    <div class="ab-grade-panel ab-reveal">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-layers" />
                            </svg></div>
                        <h3>Material &amp; grade</h3>
                        <p>Use these prompts to describe what you need. Exact
                            grades and properties should be confirmed
                            against the relevant supplier datasheet.</p>
                        <div class="ab-grade-list">
                            <div class="ab-grade-item"><strong>Material
                                    family</strong><span>For example, HDPE or
                                    another polymer under
                                    consideration.</span></div>
                            <div class="ab-grade-item"><strong>End-use
                                    conditions</strong><span>Load, impact, exposure
                                    and expected service
                                    environment.</span></div>
                            <div class="ab-grade-item"><strong>Processing
                                    route</strong><span>Injection, extrusion, blow
                                    moulding or another process.</span></div>
                            <div class="ab-grade-item"><strong>Specification
                                    needs</strong><span>Any required standards,
                                    approvals or property limits.</span></div>
                        </div>
                    </div>
                    <div class="ab-grade-panel ab-grade-panel--dark ab-reveal ab-reveal-delay-1">
                        <div class="ab-icon-box" style="background:rgba(255,255,255,.1);color:#9fe0d7"><svg
                                class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-cube" />
                            </svg></div>
                        <h3>Common supply forms</h3>
                        <p>Tell us how the material needs to arrive at your
                            operation. Confirm the forms currently
                            available during enquiry.</p>
                        <div class="ab-form-pills"><span class="ab-form-pill">Pellets / granules</span><span
                                class="ab-form-pill">Powder</span><span class="ab-form-pill">Regrind*</span><span
                                class="ab-form-pill">Custom
                                requirement</span></div>
                     
                    </div>
                </div>
            </div>
        </section>-->
        <!-- 4. Manufacturing segments / processing methods -->
        <section class="ab-section ab-process-section" id="processing" aria-labelledby="processing-title">
            <div class="ab-wrap">
                <div class="ab-process-intro">
                    <div class="ab-section-head ab-reveal"><span class="ab-eyebrow">From recycled resin to finished form</span>
                        <h2 id="processing-title">Match the right material to your process.</h2>
                        <p>Your processing route determines which grade characteristics matter most. These are common polymer conversion methods—not a claim about Abir Overseas' manufacturing capability.</p>
                    </div><a class="ab-btn" href="#quick-enquiry">Discuss your process <svg
                            class="ab-icon" aria-hidden="true">
                            <use href="#ab-icon-arrow" />
                        </svg></a>
                </div>
                <div class="ab-process-flow">
                    <article class="ab-process-item ab-reveal">
                        <div class="ab-process-no">01</div>
                        <h3>Injection moulding</h3>
                        <p>For shaped parts from a mould; melt flow and cycle speed guide grade selection.</p>
                    </article>
                    <article class="ab-process-item ab-reveal ab-reveal-delay-1">
                        <div class="ab-process-no">02</div>
                        <h3>Extrusion</h3>
                        <p>For continuous profiles, pipes or sheets where consistency and end-use performance matter.</p>
                    </article>
                    <article class="ab-process-item ab-reveal ab-reveal-delay-2">
                        <div class="ab-process-no">03</div>
                        <h3>Blow moulding</h3>
                        <p>For hollow containers; share your part design and performance needs when enquiring.</p>
                    </article>
                    <article class="ab-process-item ab-reveal ab-reveal-delay-3">
                        <div class="ab-process-no">04</div>
                        <h3>Rotational moulding</h3>
                        <p>A viable route for larger hollow forms, depending on material grade and process compatibility.</p>
                    </article>
                </div>
            
            </div>
        </section>
        <!-- 5. Markets served -->
        <section class="ab-section" id="markets" aria-labelledby="markets-title">
            <div class="ab-wrap">
                <div class="ab-section-head ab-reveal"><span class="ab-eyebrow">Potential end-use markets</span>
                    <h2 id="markets-title">Bridging recycled materials to your industry.</h2>
                    <p>Our recycled polymers serve sectors across the globe. Tell us your end application so we can match the right grade to your needs.</p>
                </div>
                <div class="ab-market-grid">
                    <article class="ab-market-card ab-reveal">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-industry" />
                            </svg></div>
                        <h3>Packaging &amp; containers</h3>
                        <p>Recycled material solutions for rigid and flexible packaging applications.</p>
                    </article>
                    <article class="ab-market-card ab-reveal ab-reveal-delay-1">
                        <div class="ab-icon-box" style="background:#edf2fa;color:#1d4e9f"><svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-truck" />
                            </svg></div>
                        <h3>Logistics &amp; handling</h3>
                        <p>Durable recycled components where real-world use conditions guide selection.</p>
                    </article>
                    <article class="ab-market-card ab-reveal ab-reveal-delay-2">
                        <div class="ab-icon-box" style="background:#fff0e2;color:#b65a09"><svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-cube" />
                            </svg></div>
                        <h3>Consumer products</h3>
                        <p>Recycled polymer parts shaped around function, finish and processing needs.</p>
                    </article>
                    <article class="ab-market-card ab-reveal">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-globe" />
                            </svg></div>
                        <h3>Infrastructure</h3>
                        <p>Trusted material supply for products performing in demanding environments.</p>
                    </article>
                    <article class="ab-market-card ab-reveal ab-reveal-delay-1">
                        <div class="ab-icon-box" style="background:#edf2fa;color:#1d4e9f"><svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-flask" />
                            </svg></div>
                        <h3>Industrial equipment</h3>
                        <p>Reliable recycled grades for industrial parts and tough operating conditions.</p>
                    </article>
                    <article class="ab-market-card ab-reveal ab-reveal-delay-2">
                        <div class="ab-icon-box" style="background:#fff0e2;color:#b65a09"><svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-layers" />
                            </svg></div>
                        <h3>Construction products</h3>
                        <p>Sustainable polymer solutions where design, exposure and compliance matter.</p>
                    </article>
                    <article class="ab-market-card ab-reveal">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-beaker" />
                            </svg></div>
                        <h3>Agriculture &amp; water</h3>
                        <p>Recycled grades reviewed for UV exposure and long-term service demands.</p>
                    </article>
                    <article class="ab-market-card ab-reveal ab-reveal-delay-1">
                        <div class="ab-icon-box" style="background:#edf2fa;color:#1d4e9f"><svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-scale" />
                            </svg></div>
                        <h3>Other manufacturing</h3>
                        <p>Share your specifications and let our global team find the right fit.</p>
                    </article>
                </div>
             
            </div>
        </section>
        <!-- 6. Enquiry process -->
        <section class="ab-section ab-section--white" id="enquiry-process" aria-labelledby="process-title">
            <div class="ab-wrap">
                <div class="ab-section-head ab-reveal"><span class="ab-eyebrow">A straightforward next step</span>
                    <h2 id="process-title">How your enquiry progresses with Abir.
</h2>
                    <p>Share what you know. If a detail is still open, we can
                        make that part of the conversation.</p>
                </div>
                <div class="ab-enquiry-steps">
                    <article class="ab-step ab-reveal">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-chat" />
                            </svg></div>
                        <h3>Tell us the need</h3>
                        <p>Identify the material, application and any preferred grade or form.</p>
                    </article>
                    <article class="ab-step ab-reveal ab-reveal-delay-1">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-file" />
                            </svg></div>
                        <h3>Review the details</h3>
                        <p>Clarify quantity, specification, process and delivery expectations.</p>
                    </article>
                    <article class="ab-step ab-reveal ab-reveal-delay-2">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-scale" />
                            </svg></div>
                        <h3>Discuss a quotation</h3>
                        <p>Commercial terms and supply options can be considered against the brief.</p>
                    </article>
                    <article class="ab-step ab-reveal ab-reveal-delay-3">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-check" />
                            </svg></div>
                        <h3>Coordinate next steps</h3>
                        <p>Confirm the agreed requirements and any actions
                            needed to proceed.</p>
                    </article>
                </div>
                <div class="ab-enquiry-steps-cta"><a class="ab-btn" href="#quick-enquiry">START AN ENQUIRY <svg
                            class="ab-icon" aria-hidden="true">
                            <use href="#ab-icon-arrow" />
                        </svg></a></div>
            </div>
        </section>
        <!-- Temporarily commented out per request: “Useful detail, before a 
quote” / Supply capabilities section. -->
        <!-- Temporarily commented out per request: “Featured knowledge” 
section. The Knowledge Hub remains available on /knowledge/. -->
        <!-- 9. Company credibility -->
        <section class="ab-section ab-credibility" id="credibility" aria-labelledby="credibility-title">
            <div class="ab-wrap ab-credibility-grid">
                <div class="ab-credibility-visual ab-reveal" role="img"
                    aria-label="Virgin and recycled polymer pellets compared side by side"><img
                        class="ab-credibility-img" src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/10/r-p-18.png' ) ); ?>" width="620" height="450"
                        alt="Virgin and recycled polymer pellets compared side by side" loading="lazy" decoding="async">
                    <div class="ab-credibility-badge"><strong>Specifics over
                            assumptions.</strong>Clear requirements
                        help both sides assess fit, availability and next
                        steps.</div>
                </div>
                <div class="ab-credibility-copy ab-reveal ab-reveal-delay-1"><span class="ab-eyebrow">Company
                        credibility</span>
                    <h2 id="credibility-title">Trust starts with what can be
                        confirmed.</h2>
                    <p>Abiroverseas brings buyers and material requirements into one focused conversation. Share the
                        information available; details that need confirmation
                        can be identified before a commercial
                        decision.</p>
                    <div class="ab-values">
                        <div class="ab-value"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-check" />
                            </svg><span><strong>Clarity before
                                    commitment</strong> — confirm the grade, form and terms
                                relevant to the enquiry.</span></div>
                        <div class="ab-value"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-check" />
                            </svg><span><strong>Application-led
                                    discussion</strong> — keep the use case and processing
                                needs in view.</span></div>
                        <div class="ab-value"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-check" />
                            </svg><span><strong>Honest information</strong> —
                                specific credentials and capabilities can
                                be shared once verified.</span></div>
                    </div>
                    <p class="ab-quiet-note">No third-party endorsements,
                        certifications or company metrics are
                        presented until verified details are provided.</p>
                </div>
            </div>
        </section>
        <!-- 10. Certifications & credentials: replace placeholders only with 
verified documents. -->
        <section class="ab-section ab-certification-section" id="certifications" aria-labelledby="certifications-title">
            <div class="ab-wrap">
                <div class="ab-section-head ab-reveal"><span class="ab-eyebrow">Credentials · sample placeholders</span>
                    <h2 id="certifications-title">Certifications &amp;
                        documentation.</h2>
                    <p>No certification is claimed here. Replace these clearly
                        marked sample slots only after confirming
                        the document, issuing body, scope and validity.</p>
                </div>
                <div class="ab-cert-grid">
                    <article class="ab-cert-card ab-reveal">
                        <div class="ab-cert-icon"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-shield" />
                            </svg></div>
                        <div class="ab-cert-status">PLACEHOLDER · NOT A VERIFIED CERTIFICATE</div>
                        <h3>Quality management</h3>
                        <p>Add the verified certificate name, issuer, reference, scope and validity dates.</p>
                    </article>
                    <article class="ab-cert-card ab-reveal ab-reveal-delay-1">
                        <div class="ab-cert-icon ab-cert-icon--blue"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-globe" />
                            </svg></div>
                        <div class="ab-cert-status">PLACEHOLDER · NOT A VERIFIED CERTIFICATE</div>
                        <h3>Environmental management</h3>
                        <p>Use this slot only for a current, applicable document approved for publication.</p>
                    </article>
                    <article class="ab-cert-card ab-reveal ab-reveal-delay-2">
                        <div class="ab-cert-icon ab-cert-icon--orange"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-file" />
                            </svg></div>
                        <div class="ab-cert-status">PLACEHOLDER · NOT A VERIFIED CERTIFICATE</div>
                        <h3>Product &amp; compliance documents</h3>
                        <p>List material-specific declarations or technical
                            documentation only when verified.</p>
                    </article>
                </div>

            </div>
        </section>
        <!-- 11. Testimonials: sample copy is intentionally non-attributed and 
must be replaced.
        <section class="ab-section ab-testimonial-section" id="testimonials" aria-labelledby="testimonials-title">
            <div class="ab-wrap">
                <div class="ab-head-row">
                    <div class="ab-section-head ab-reveal"><span class="ab-eyebrow">Customer voices · sample
                            placeholders</span>
                        <h2 id="testimonials-title">What a useful supply
                            conversation should feel like.</h2>
                        <p>These are layout samples, not customer endorsements. Replace each with a real, approved
                            quotation and attribution before publication.</p>
                    </div><a class="ab-btn ab-btn--light" href="#quick-enquiry">START A CONVERSATION <svg
                            class="ab-icon" aria-hidden="true">
                            <use href="#ab-icon-arrow" />
                        </svg></a>
                </div>
                <div class="ab-testimonial-grid">
                    <article class="ab-testimonial-card ab-reveal"><span class="ab-testimonial-mark"
                            aria-hidden="true">“</span>
                        <div class="ab-testimonial-label">SAMPLE PLACEHOLDER ·
                            NOT A REAL TESTIMONIAL</div>
                        <blockquote>[Insert an approved customer quote about
                            clear grade information and the enquiry
                            experience.]</blockquote>
                        <div class="ab-testimonial-by"><strong>[Customer name / role]</strong><span>[Company and
                                industry · publish with permission]</span></div>
                    </article>
                    <article class="ab-testimonial-card ab-reveal ab-reveal-delay-1"><span
                            class="ab-testimonial-mark ab-testimonial-mark--blue" aria-hidden="true">“</span>
                        <div class="ab-testimonial-label">SAMPLE PLACEHOLDER ·
                            NOT A REAL TESTIMONIAL</div>
                        <blockquote>[Add a verified comment about material
                            selection, specifications or supply
                            coordination.]</blockquote>
                        <div class="ab-testimonial-by"><strong>[Customer name / role]</strong><span>[Company and
                                industry · publish with permission]</span></div>
                    </article>
                    <article class="ab-testimonial-card ab-reveal ab-reveal-delay-2"><span
                            class="ab-testimonial-mark ab-testimonial-mark--orange" aria-hidden="true">“</span>
                        <div class="ab-testimonial-label">SAMPLE PLACEHOLDER ·
                            NOT A REAL TESTIMONIAL</div>
                        <blockquote>[Replace with a real quotation that has been reviewed and approved for use.]
                        </blockquote>
                        <div class="ab-testimonial-by"><strong>[Customer name / role]</strong><span>[Company and
                                industry · publish with permission]</span></div>
                    </article>
                </div>
            </div>
        </section> -->
        <!-- 12. Quick enquiry options -->
        <section class="ab-section ab-enquiry-section" id="quick-enquiry" aria-labelledby="quick-enquiry-title">
            <div class="ab-wrap ab-enquiry-layout">
                <div class="ab-enquiry-copy ab-reveal"><span class="ab-eyebrow">Quick enquiry options</span>
                    <h2 id="quick-enquiry-title">What can we help you clarify?
                    </h2>
                    <p>Use the form to outline your requirement. Choose a topic to prefill the enquiry type, then add
                        any details you already know.</p>
                    <div class="ab-enquiry-options"><a class="ab-enquiry-option" href="#enquiry-form"
                            data-enquiry="Product enquiry"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-cube" />
                            </svg>Product enquiry</a><a class="ab-enquiry-option" href="#enquiry-form"
                            data-enquiry="Material availability"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-layers" />
                            </svg>Material availability</a><a class="ab-enquiry-option" href="#enquiry-form"
                            data-enquiry="Grade selection help"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-flask" />
                            </svg>Grade selection help</a><a class="ab-enquiry-option" href="#enquiry-form"
                            data-enquiry="General business enquiry"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-chat" />
                            </svg>General business enquiry</a></div>
                </div>
                <form class="ab-form-card" id="enquiry-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" novalidate>
                <input type="hidden" name="action" value="ab_material_enquiry"><input type="hidden" name="enquiry_kind" value="general"><?php wp_nonce_field( 'ab_material_enquiry', 'ab_material_enquiry_nonce' ); ?><label class="ab-honeypot" aria-hidden="true">Leave this field empty<input type="text" name="ab_website" tabindex="-1" autocomplete="off"></label>
                    <h3>Share your requirement</h3>
                    <p>Fields marked required help us understand the enquiry.
                        Your message is sent to the site administrator email configured in WordPress.</p>
                    <div class="ab-form-grid">
                        <div class="ab-field"><label for="home-name">Name <span
                                    aria-hidden="true">*</span></label><input id="home-name" name="name"
                                autocomplete="name" required placeholder="Your name"></div>
                        <div class="ab-field"><label for="home-email">Business
                                email <span aria-hidden="true">*</span></label><input id="home-email" name="email"
                                type="email" autocomplete="email" required placeholder="name@company.com"></div>
                        <div class="ab-field"><label for="home-company">Company</label><input id="home-company"
                                name="company" autocomplete="organization" placeholder="Company name"></div>
                        <div class="ab-field"><label for="home-topic">Enquiry
                                type <span aria-hidden="true">*</span></label><select id="home-topic" name="topic"
                                required>
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
                                <option>PVC / PET</option>
                                <option>ABS / PS-HIPS</option>
                                <option>Specialty &amp; recycled
                                    materials</option>
                                <option>Other</option>
                            </select></div>
                        <div class="ab-field ab-field--full"><label for="home-message">Requirement details <span
                                    aria-hidden="true">*</span></label><textarea id="home-message" name="message"
                                required
                                placeholder="Material, grade or form, application, quantity and any timing details"></textarea>
                        </div>
                    </div>
                    <div class="ab-form-foot"><button class="ab-btn" type="submit">Review enquiry <svg
                                class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></button><span class="ab-form-status" id="home-form-status" role="status"
                            aria-live="polite"></span></div>
                    <p class="ab-form-disclaimer">Enquiry details are emailed to the site administrator address configured in WordPress.</p>
                </form>
            </div>
        </section>
        <!-- 11. Final quote / consultation CTA 
        <section class="ab-final-cta" id="final-quote" aria-labelledby="final-title">
            <div class="ab-wrap ab-final-inner">
                <div class="ab-final-copy ab-reveal"><span class="ab-eyebrow">Take the next step</span>
                    <h2 id="final-title">Have a material requirement in 
mind?</h2>
                    <p>Share your grade, application, quantity or open 
questions. Start a clear conversation and confirm
                        the right next step.</p>
                </div>
                <div class="ab-final-actions ab-reveal ab-reveal-delay-1"><a 
class="ab-btn" href="#quick-enquiry">Get a
                        Custom Quote <svg class="ab-icon" aria-hidden="true">
                            <use href="#ab-icon-arrow" />
                        </svg></a><a class="ab-btn ab-btn--light" href="#quick-enquiry">Discuss a requirement</a></div>
            </div>
        </section>-->
    </main>
<?php get_footer(); ?>
