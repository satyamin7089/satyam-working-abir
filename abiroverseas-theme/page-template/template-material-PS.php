<?php
/**
 * Template Name: Material Information — PS
 * Template Post Type: page
 * Exact layout/content based on the supplied finalized HTML file.
 */
get_header();
?>
<main id="main-content">
        <!-- 1. Hero section -->
        <section class="ab-prod-hero" aria-labelledby="hdpe-title">
            <div class="ab-wrap ab-prod-hero-grid">
                <div class="ab-prod-copy ab-reveal is-visible">
                  <span
                        class="ab-eyebrow">Reprocessed
                        &amp; recycled · polyethylene</span>
                    <h1 id="hdpe-title">Reprocessed and Recycled HDPE Materials</h1>
                    <p>HDPE stands for High-Density Polyethylene. Explore reprocessed and recycled HDPE in available
                        granule,
                        powder, or compound forms, with grade, source, documentation, and supply details confirmed for
                        each enquiry.
                    </p>
                    <p>Looking for a specific HDPE requirement? Share the application, processing method, grade or
                        specification,
                        required form, quantity, pack size, destination, and required documents.</p>
                    <div class="ab-prod-actions"><a class="ab-btn" href="#primary-enquiry">REQUEST AN HDPE QUOTE <svg
                                class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a><a class="ab-btn ab-btn--outline" href="#hdpe-datasheet">UPLOAD A DATASHEET</a>
                    </div>
                    <div class="ab-prod-meta"><span><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-layers" />
                            </svg>Reprocessed or recycled</span><span><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-file" />
                            </svg>Grade and source verified</span></div>
                </div>
                <div class="ab-product-gallery ab-reveal ab-reveal-delay-1" data-hdpe-gallery role="region"
                    aria-roledescription="carousel" aria-label="HDPE product image gallery">
                    <div class="ab-prod-art">
                        <div class="ab-gallery-stage">
                            <div class="ab-gallery-slide is-active" id="hdpe-gallery-slide-1" role="group"
                                aria-roledescription="slide" aria-label="1 of 4: HDPE polymer pellets"
                                aria-hidden="false"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/pellets-macro.jpg' ) ); ?>" alt="" width="1536"
                                    height="1024" decoding="async" loading="eager" fetchpriority="high"></div>
                            <div class="ab-gallery-slide" id="hdpe-gallery-slide-2" role="group"
                                aria-roledescription="slide" aria-label="2 of 4: virgin and recycled polymer material"
                                aria-hidden="true"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/virgin-vs-recycled.jpg' ) ); ?>" alt="" width="1536"
                                    height="1024" decoding="async" loading="eager"></div>
                            <div class="ab-gallery-slide ab-gallery-slide--pellets-detail" id="hdpe-gallery-slide-3"
                                role="group" aria-roledescription="slide"
                                aria-label="3 of 4: close detail of HDPE polymer pellets" aria-hidden="true"><img
                                    src="<?php echo esc_url( get_theme_file_uri( '/assets/img/pellets-macro.jpg' ) ); ?>" alt="" width="1536" height="1024"
                                    decoding="async" loading="eager"></div>
                            <div class="ab-gallery-slide ab-gallery-slide--recycled-detail" id="hdpe-gallery-slide-4"
                                role="group" aria-roledescription="slide"
                                aria-label="4 of 4: close detail of recycled polymer material" aria-hidden="true"><img
                                    src="<?php echo esc_url( get_theme_file_uri( '/assets/img/virgin-vs-recycled.jpg' ) ); ?>" alt="" width="1536" height="1024"
                                    decoding="async" loading="eager"></div>
                        </div><button class="ab-gallery-arrow ab-gallery-arrow--prev" type="button"
                            aria-label="Previous product image"><svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="m15 18-6-6 6-6" />
                            </svg></button><button class="ab-gallery-arrow ab-gallery-arrow--next" type="button"
                            aria-label="Next product image"><svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="m9 18 6-6-6-6" />
                            </svg></button>
                    </div>
                    <div class="ab-gallery-thumbs" role="group" aria-label="Choose a product image"><button
                            class="ab-gallery-thumb is-active" type="button"
                            aria-label="Show image 1 of 4: HDPE polymer pellets" aria-controls="hdpe-gallery-slide-1"
                            aria-pressed="true"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/pellets-macro.jpg' ) ); ?>" alt="" width="1536"
                                height="1024" loading="eager" decoding="async"></button><button class="ab-gallery-thumb"
                            type="button" aria-label="Show image 2 of 4: virgin and recycled polymer material"
                            aria-controls="hdpe-gallery-slide-2" aria-pressed="false"><img
                                src="<?php echo esc_url( get_theme_file_uri( '/assets/img/virgin-vs-recycled.jpg' ) ); ?>" alt="" width="1536" height="1024"
                                loading="eager" decoding="async"></button><button
                            class="ab-gallery-thumb ab-gallery-thumb--crop" type="button"
                            aria-label="Show image 3 of 4: close detail of HDPE polymer pellets"
                            aria-controls="hdpe-gallery-slide-3" aria-pressed="false"><img
                                src="<?php echo esc_url( get_theme_file_uri( '/assets/img/pellets-macro.jpg' ) ); ?>" alt="" width="1536" height="1024" loading="eager"
                                decoding="async"></button><button class="ab-gallery-thumb ab-gallery-thumb--crop"
                            type="button" aria-label="Show image 4 of 4: close detail of recycled polymer material"
                            aria-controls="hdpe-gallery-slide-4" aria-pressed="false"><img
                                src="<?php echo esc_url( get_theme_file_uri( '/assets/img/virgin-vs-recycled.jpg' ) ); ?>" alt="" width="1536" height="1024"
                                loading="eager" decoding="async"></button></div>
                </div>
            </div>
        </section>
        <nav class="ab-prod-sticky-wrap" aria-label="HDPE page sections">
            <div class="ab-prod-sticky" id="product-section-nav"><span class="ab-prod-sticky-label">On this
                    page</span><a href="#overview">Overview</a><a href="#grades-processing">Grades &amp;
                    Processing</a><a href="#forms">Forms</a><a href="#applications">Applications</a><a
                    href="#industries">Industries</a><a href="#selection-guide">Selection Guide</a><a
                    href="#technical-support">Technical Support</a><a href="#faqs">FAQs</a><a
                    href="#related-knowledge">Related Knowledge</a><a href="#related-materials">Related
                    Materials</a></div>
        </nav>
        <!-- 2. HDPE overview -->
        <section class="ab-section" id="overview" aria-labelledby="overview-title">
            <div class="ab-wrap ab-overview-layout">
                <div class="ab-overview-copy ab-reveal"><span class="ab-eyebrow">Material overview</span>
                    <h2 id="overview-title">What is HDPE?</h2>
                    <p>Compared with LDPE, HDPE has less molecular branching. This allows closer molecular packing and
                        generally
                        contributes to greater rigidity and strength. Actual performance depends on the specific grade,
                        formulation,
                        and processing conditions.</p>
                    <p>HDPE is generally associated with strength, rigidity, durability, and chemical resistance.
                        Material options
                        for this page are reprocessed or recycled HDPE; verify the specific source, grade,
                        documentation, and
                        availability for each requirement.</p><a class="ab-link" href="#selection-guide">What should I
                        consider?
                        <svg class="ab-icon" aria-hidden="true">
                            <use href="#ab-icon-arrow" />
                        </svg></a>
                </div>
                <div class="ab-overview-visual ab-reveal ab-reveal-delay-1">
                    <h3>HDPE at a glance</h3>
                    <div class="ab-character-grid">
                        <div class="ab-character"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-file" />
                            </svg><strong>Full name</strong><span>High-Density Polyethylene</span></div>
                        <div class="ab-character"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-layers" />
                            </svg><strong>Abbreviation</strong><span>HDPE</span></div>
                        <div class="ab-character"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-cube" />
                            </svg><strong>Polymer family</strong><span>Polyethylene</span></div>
                        <div class="ab-character"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-flask" />
                            </svg><strong>Material type</strong><span>Thermoplastic</span></div>
                    </div>
                    <p class="ab-tech-note"><strong>Material options:</strong> reprocessed or recycled. Publish source,
                        grade,
                        form, documentation, pack size, minimum order quantity and availability only after verification.
                    </p>
                </div>
            </div>
        </section>
        <!-- 3. HDPE grades & processing methods -->
        <section class="ab-section ab-section--white" id="grades-processing" aria-labelledby="grades-title">
            <div class="ab-wrap">
                <div class="ab-section-head ab-reveal"><span class="ab-eyebrow">Grades &amp; processing</span>
                    <h2 id="grades-title">Select the HDPE grade for the process and application.</h2>
                    <p>The correct HDPE grade should be selected according to the manufacturing process, intended
                        application, and
                        required product performance. Availability and grade details must be verified for each enquiry.
                    </p>
                </div>
                <div class="ab-grade-method-grid">
                    <div class="ab-panel ab-reveal">
                        <h3>Process, typical use &amp; buyer details</h3>
                        <p>Use these prompts to describe the requirement. They are process examples, not a confirmed
                            grade or stock
                            list.</p>
                        <div class="ab-grade-cards">
                            <article class="ab-grade-card"><strong>Injection molding</strong>
                                <p><b>Typical uses:</b> Molded products and components.<br><b>Specify:</b> Application,
                                    grade, melt flow
                                    requirement, color, and quantity.</p>
                            </article>
                            <article class="ab-grade-card"><strong>Blow molding</strong>
                                <p><b>Typical uses:</b> Bottles, containers, canisters, and industrial
                                    packaging.<br><b>Specify:</b>
                                    Container type, grade, performance requirements, color, and quantity.</p>
                            </article>
                            <article class="ab-grade-card"><strong>Extrusion</strong>
                                <p><b>Typical uses:</b> Pipes, profiles, sheets, and other extruded
                                    products.<br><b>Specify:</b>
                                    Application, grade or specification, and performance requirements.</p>
                            </article>
                            <article class="ab-grade-card"><strong>Film</strong>
                                <p><b>Typical uses:</b> Selected film applications.<br><b>Specify:</b> Application,
                                    grade, processing
                                    requirement, thickness, and quantity.</p>
                            </article>
                        </div>
                    </div>
                    <div class="ab-panel ab-reveal ab-reveal-delay-1">
                        <h3>Processing methods</h3>
                        <p>Tell us how the material will be converted and what the finished product needs to do.</p>
                        <div class="ab-method-list">
                            <div class="ab-method"><span class="ab-method-num">01</span>
                                <div><strong>Injection molding</strong><span>For molded products and components; include
                                        melt flow
                                        requirements if known.</span></div>
                            </div>
                            <div class="ab-method"><span class="ab-method-num">02</span>
                                <div><strong>Blow molding</strong><span>For bottles, containers, canisters and
                                        industrial
                                        packaging.</span></div>
                            </div>
                            <div class="ab-method"><span class="ab-method-num">03</span>
                                <div><strong>Extrusion</strong><span>For pipes, profiles, sheets and other extruded
                                        products.</span>
                                </div>
                            </div>
                            <div class="ab-method"><span class="ab-method-num">04</span>
                                <div><strong>Selected film processes</strong><span>Share the film type, thickness,
                                        processing
                                        requirements and quantity.</span></div>
                            </div>
                        </div>
                        <div class="ab-caveat">Confirm the individual grade, technical specification and processing fit
                            against
                            current documentation before production.</div>
                    </div>
                </div>
                <div class="ab-mfi-callout" id="mfi-guide">
                    <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                            <use href="#ab-icon-scale" />
                        </svg></div>
                    <div><strong>Melt Flow Index (MFI)</strong>
                        <p>Melt flow information supports grade comparison and process selection. Compare values only
                            when test
                            conditions and grade documentation are clear; MFI is one input, not a complete performance
                            measure.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- 4. Reprocessed and recycled HDPE forms -->
        <section class="ab-section ab-section--mist" id="forms" aria-labelledby="forms-title">
            <div class="ab-wrap">
                <div class="ab-section-head ab-reveal"><span class="ab-eyebrow">Reprocessed &amp; recycled
                        HDPE</span>
                    <h2 id="forms-title">Forms for your HDPE requirement.</h2>
                    <p>Available forms may include granules, powder, and compounds. Verify the product, source, form,
                        grade or
                        specification, processing method, application, documentation, pack size, minimum order quantity,
                        and
                        availability before publication or purchase.</p>
                </div>
                <div class="ab-forms-grid">
                    <article class="ab-form-option ab-reveal">
                        <div class="ab-form-graphic"><svg viewBox="0 0 120 80" aria-hidden="true">
                                <path d="M16 55h88l-9 17H25z" fill="#d6e9e4" stroke="#008080" stroke-width="2" />
                                <g fill="#fff" stroke="#7ab7ac" stroke-width="1.5">
                                    <circle cx="30" cy="49" r="9" />
                                    <circle cx="50" cy="45" r="10" />
                                    <circle cx="70" cy="50" r="9" />
                                    <circle cx="90" cy="45" r="10" />
                                </g>
                            </svg></div>
                        <h3>Granules</h3>
                        <p>Reprocessed or recycled HDPE in granule form may be considered where a suitable specification
                            and current
                            supply are confirmed.</p>
                    </article>
                    <article class="ab-form-option ab-reveal ab-reveal-delay-1">
                        <div class="ab-form-graphic"><svg viewBox="0 0 120 80" aria-hidden="true">
                                <path d="M37 16h46l-6 56H43z" fill="#dce7f5" stroke="#1d4e9f" stroke-width="2" />
                                <path d="M33 16h54M45 26h30" stroke="#1d4e9f" stroke-width="2" stroke-linecap="round" />
                                <circle cx="56" cy="43" r="3" fill="#1d4e9f" />
                                <circle cx="68" cy="50" r="3" fill="#1d4e9f" />
                                <circle cx="55" cy="59" r="3" fill="#1d4e9f" />
                            </svg></div>
                        <h3>Powder</h3>
                        <p>Powder may suit selected applications and processes. Confirm particle specification, handling
                            needs, and
                            availability.</p>
                    </article>
                    <article class="ab-form-option ab-reveal ab-reveal-delay-2">
                        <div class="ab-form-graphic"><svg viewBox="0 0 120 80" aria-hidden="true">
                                <path d="M24 55h72v13H24zM31 41h59v12H31zM38 27h46v12H38z" fill="#f8dfc9"
                                    stroke="#d47422" stroke-width="2" />
                                <path d="M38 32h46M31 46h59M24 60h72" stroke="#fff" stroke-width="2" />
                            </svg></div>
                        <h3>Compounds</h3>
                        <p>Share the intended application, base material, colour or property targets, and any required
                            documentation.</p>
                    </article>
                </div>
                <div class="ab-source-note" id="virgin-recycled-guide"><strong>Reprocessed / recycled material:</strong>
                    Virgin
                    HDPE uses primary resin, while recycled HDPE uses recovered feedstock. Compare the actual grade
                    specifications, source, documentation, and application requirements. Use post-consumer (PCR) or
                    post-industrial (PIR) classifications only when the source has been verified.</div>
                <p class="ab-forms-disclaimer">Forms shown are potential forms only, not a confirmation of current
                    inventory or
                    availability.</p>
            </div>
        </section>
        <!-- 5. Primary enquiry CTA -->
        <section class="ab-primary-enquiry" id="primary-enquiry" aria-labelledby="primary-enquiry-title">
            <div class="ab-wrap ab-primary-layout">
                <div class="ab-primary-copy ab-reveal"><span class="ab-eyebrow">HDPE enquiry</span>
                    <h2 id="primary-enquiry-title">Request an HDPE quote.</h2>
                    <p>Provide the available technical and commercial details so the product team can review your
                        requirement
                        efficiently. Share the application, processing method, grade or specification, required form,
                        quantity, pack
                        size, destination, and required documents.</p>
                    <div class="ab-primary-prompt"><span>Grade / specification</span><span>Application &amp;
                            process</span><span>Form &amp; quantity</span><span>Pack size &amp;
                            destination</span><span>Datasheet
                            &amp; documents</span></div>
                </div>
                <form class="ab-product-form ab-reveal ab-reveal-delay-1" id="hdpe-enquiry-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" enctype="multipart/form-data" novalidate>
                <input type="hidden" name="action" value="ab_material_enquiry"><input type="hidden" name="enquiry_kind" value="ps"><?php wp_nonce_field( 'ab_material_enquiry', 'ab_material_enquiry_nonce' ); ?><label class="ab-honeypot" aria-hidden="true">Leave this field empty<input type="text" name="ab_website" tabindex="-1" autocomplete="off"></label>
                    <h3>Submit an HDPE requirement</h3>
                    <p>Complete what you know. Your enquiry is emailed to the site administrator address configured in WordPress. Optional attachments are checked before sending.</p>
                    <div class="ab-product-form-grid">
                        <div class="ab-product-field"><label for="hdpe-name">Name *</label><input id="hdpe-name"
                                name="name" autocomplete="name" required placeholder="Your name"></div>
                        <div class="ab-product-field"><label for="hdpe-email">Business email *</label><input
                                id="hdpe-email" name="email" type="email" autocomplete="email" required
                                placeholder="name@company.com"></div>
                        <div class="ab-product-field"><label for="hdpe-material-type">Material type</label><select
                                id="hdpe-material-type" name="material_type">
                                <option value="">Select if known</option>
                                <option>Reprocessed</option>
                                <option>Recycled</option>
                                <option>Not sure</option>
                            </select></div>
                        <div class="ab-product-field"><label for="hdpe-process">Processing method</label><select
                                id="hdpe-process" name="processing_method">
                                <option value="">Select if known</option>
                                <option>Injection molding</option>
                                <option>Blow molding</option>
                                <option>Extrusion</option>
                                <option>Film</option>
                                <option>Other</option>
                                <option>Not sure</option>
                            </select></div>
                        <div class="ab-product-field"><label for="hdpe-manufacturer">Manufacturer (if
                                known)</label><input id="hdpe-manufacturer" name="manufacturer"
                                placeholder="Manufacturer or source"></div>
                        <div class="ab-product-field"><label for="hdpe-grade">Grade or specification</label><input
                                id="hdpe-grade" name="grade" placeholder="Grade name or target specification"></div>
                        <div class="ab-product-field"><label for="hdpe-form">Required form</label><select id="hdpe-form"
                                name="form">
                                <option value="">Select if known</option>
                                <option>Granules</option>
                                <option>Powder</option>
                                <option>Compound</option>
                                <option>Other</option>
                                <option>Not sure</option>
                            </select></div>
                        <div class="ab-product-field"><label for="hdpe-color">Color</label><input id="hdpe-color"
                                name="color" placeholder="Color requirement"></div>
                        <div class="ab-product-field"><label for="hdpe-quantity">Quantity and unit</label><input
                                id="hdpe-quantity" name="quantity" placeholder="e.g. 5 metric tonnes"></div>
                        <div class="ab-product-field"><label for="hdpe-destination">Destination</label><input
                                id="hdpe-destination" name="destination" autocomplete="shipping country"
                                placeholder="Country and port / city"></div>
                        <div class="ab-product-field ab-product-field--full"><label for="hdpe-requirement">Application
                                and required
                                properties</label><textarea id="hdpe-requirement" name="requirement" required
                                placeholder="Describe the end application, technical requirements, and performance needs"></textarea>
                        </div>
                        <div class="ab-product-field ab-product-field--full" id="datasheet-upload"><label
                                for="hdpe-datasheet">Upload a technical datasheet (optional)</label><input
                                id="hdpe-datasheet" name="datasheet" type="file"
                                accept=".pdf,.doc,.docx,.xls,.xlsx,.csv,.jpg,.jpeg,.png"><span
                                class="ab-field-help">Choose a current datasheet or target specification. It is attached to the enquiry email after file-type and size checks.</span></div>
                    </div>
                    <details class="ab-enquiry-details">
                        <summary>More technical &amp; commercial details (optional)</summary>
                        <div class="ab-product-form-grid ab-details-grid">
                            <div class="ab-product-field"><label for="hdpe-pack-size">Pack size /
                                    packaging</label><input id="hdpe-pack-size" name="pack_size"
                                    placeholder="e.g. bag or bulk requirement"></div>
                            <div class="ab-product-field"><label for="hdpe-frequency">Requirement
                                    frequency</label><select id="hdpe-frequency" name="frequency">
                                    <option value="">Select if known</option>
                                    <option>One-time</option>
                                    <option>Monthly</option>
                                    <option>Regular</option>
                                </select></div>
                            <div class="ab-product-field"><label for="hdpe-delivery-date">Required delivery
                                    date</label><input id="hdpe-delivery-date" name="delivery_date" type="date"></div>
                            <div class="ab-product-field"><label for="hdpe-documents">Required
                                    documentation</label><input id="hdpe-documents" name="documents"
                                    placeholder="List any required documents"></div>
                            <div class="ab-product-field ab-product-field--full"><label for="hdpe-notes">Additional
                                    notes</label><textarea id="hdpe-notes" name="notes"
                                    placeholder="Anything else to help review the requirement"></textarea></div>
                        </div>
                    </details>
                    <div class="ab-product-form-foot"><button class="ab-btn" type="submit">Review HDPE
                            requirement
                            <svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></button><span class="ab-product-status" id="hdpe-form-status" role="status"
                            aria-live="polite"></span></div>
                    <p class="ab-form-small">Required fields are checked before submission. Confirm source, grade, documentation, pack size, minimum order quantity, current availability and delivery timing for each request.</p>
                </form>
            </div>
        </section>
        <!-- 6. Applications -->
        <section class="ab-section" id="applications" aria-labelledby="applications-title">
            <div class="ab-wrap">
                <div class="ab-section-head ab-reveal"><span class="ab-eyebrow">Applications</span>
                    <h2 id="applications-title">HDPE applications by product group.</h2>
                    <p>HDPE is commonly used in packaging, containers, pipes, profiles, and industrial products.
                        Suitability
                        depends on the grade and application.</p>
                </div>
                <div class="ab-app-grid">
                    <article class="ab-app-card ab-reveal">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-cube" />
                            </svg></div>
                        <div>
                            <h3>Packaging</h3>
                            <p>Bottles, containers, pails, and industrial packaging. Specify the container type, process
                                and
                                performance requirements.</p>
                        </div>
                    </article>
                    <article class="ab-app-card ab-reveal ab-reveal-delay-1">
                        <div class="ab-icon-box" style="background:#edf2fa;color:#1d4e9f"><svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-layers" />
                            </svg></div>
                        <div>
                            <h3>Pipes &amp; extruded products</h3>
                            <p>Pipes, profiles, sheets, and related extruded products. Share the application and grade
                                or
                                specification.</p>
                        </div>
                    </article>
                    <article class="ab-app-card ab-reveal ab-reveal-delay-2">
                        <div class="ab-icon-box" style="background:#fff0e2;color:#b65a09"><svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-industry" />
                            </svg></div>
                        <div>
                            <h3>Industrial products</h3>
                            <p>Molded components, containers, and other products where grade suitability is confirmed.
                            </p>
                        </div>
                    </article>
                </div>
             
            </div>
        </section>
        <!-- 7. Industries served -->
        <section class="ab-section ab-industry-section" id="industries" aria-labelledby="industries-title">
            <div class="ab-wrap ab-industry-layout">
                <div class="ab-industry-copy ab-reveal"><span class="ab-eyebrow">Industry contexts</span>
                    <h2 id="industries-title">HDPE across product supply chains.</h2>
                    <p>HDPE may be specified in several manufacturing sectors. These industry contexts are illustrative
                        and are
                        not a verified customer list or market-footprint claim.</p><a class="ab-btn ab-btn--light"
                        href="#primary-enquiry">Discuss your application <svg class="ab-icon" aria-hidden="true">
                            <use href="#ab-icon-arrow" />
                        </svg></a>
                </div>
                <div>
                    <div class="ab-industry-cards">
                        <div class="ab-industry-card ab-reveal"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-cube" />
                            </svg>
                            <div><strong>Packaging &amp; containers</strong><span>Bottles, pails and industrial
                                    packaging</span></div>
                        </div>
                        <div class="ab-industry-card ab-reveal ab-reveal-delay-1"><svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-globe" />
                            </svg>
                            <div><strong>Pipes &amp; infrastructure</strong><span>Selected pipe, profile and utility
                                    products</span>
                            </div>
                        </div>
                        <div class="ab-industry-card ab-reveal ab-reveal-delay-2"><svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-industry" />
                            </svg>
                            <div><strong>Industrial manufacturing</strong><span>Molded components and grade-appropriate
                                    products</span></div>
                        </div>
                        <div class="ab-industry-card ab-reveal ab-reveal-delay-3"><svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-layers" />
                            </svg>
                            <div><strong>Film &amp; extrusion</strong><span>Selected film applications and extruded
                                    forms</span></div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </section>
        <!-- 8. Material selection guidance -->
        <section class="ab-section ab-section--white" id="selection-guide" aria-labelledby="selection-title">
            <div class="ab-wrap ab-selection-layout">
                <div class="ab-selection-copy ab-reveal"><span class="ab-eyebrow">Material selection guide</span>
                    <h2 id="selection-title">How to select the right HDPE.</h2>
                    <p>Material selection should always be based on the intended application and the technical
                        specification of
                        the individual grade. For an accurate material enquiry, provide:</p>
                    <div class="ab-selection-callout">If available, attach the current technical datasheet or target
                        specification. Required properties and compliance needs should be checked against grade-specific
                        documentation.</div>
                    <div class="ab-selection-action"><a class="ab-btn" href="#primary-enquiry">REQUEST
                            MATERIAL
                            GUIDANCE <svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a></div>
                </div>
                <div class="ab-checklist ab-reveal ab-reveal-delay-1">
                    <div class="ab-check">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-cube" />
                            </svg></div>
                        <div><strong>Application &amp; process</strong><span>What is being made, and is it injection
                                molding, blow
                                molding, extrusion or film?</span></div>
                    </div>
                    <div class="ab-check">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-file" />
                            </svg></div>
                        <div><strong>Manufacturer &amp; grade</strong><span>Share the manufacturer and grade, if
                                known.</span></div>
                    </div>
                    <div class="ab-check">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-layers" />
                            </svg></div>
                        <div><strong>Material source</strong><span>State whether reprocessed or recycled material is
                                required;
                                clarify source if known.</span></div>
                    </div>
                    <div class="ab-check">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-scale" />
                            </svg></div>
                        <div><strong>Technical requirements</strong><span>Include the specification and required
                                properties or
                                performance targets.</span></div>
                    </div>
                    <div class="ab-check">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-cube" />
                            </svg></div>
                        <div><strong>Color, quantity &amp; packaging</strong><span>Provide color and quantity with unit,
                                pack size
                                or packaging requirements.</span></div>
                    </div>
                    <div class="ab-check">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-truck" />
                            </svg></div>
                        <div><strong>Destination &amp; timing</strong><span>Specify delivery country, port or city, and
                                required
                                delivery timing.</span></div>
                    </div>
                    <div class="ab-check">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-shield" />
                            </svg></div>
                        <div><strong>Required documentation</strong><span>List any technical, source or compliance
                                documents
                                needed.</span></div>
                    </div>
                    <div class="ab-check">
                        <div class="ab-icon-box"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-file" />
                            </svg></div>
                        <div><strong>Datasheet or target specification</strong><span>Attach current material
                                documentation when
                                available.</span></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 9. Technical & commercial support -->
        <section class="ab-section ab-support-section" id="technical-support" aria-labelledby="support-title">
            <div class="ab-wrap ab-support-layout">
                <div class="ab-support-copy ab-reveal"><span class="ab-eyebrow">Technical &amp; commercial
                        support</span>
                    <h2 id="support-title">Bring your open questions into the enquiry.</h2>
                    <p>Use the conversation to make the product brief clearer. Support topics below describe useful
                        enquiry areas;
                        confirm the services and documentation available for your specific request.</p><a
                        class="ab-link" href="#primary-enquiry">Start an HDPE enquiry <svg class="ab-icon"
                            aria-hidden="true">
                            <use href="#ab-icon-arrow" />
                        </svg></a>
                </div>
                <div>
                    <div class="ab-support-cardgrid">
                        <article class="ab-support-card ab-reveal"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-file" />
                            </svg><strong>Specification review</strong>
                            <p>Align the grade name, property targets and relevant documents.</p>
                        </article>
                        <article class="ab-support-card ab-reveal ab-reveal-delay-1"><svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-flask" />
                            </svg><strong>Grade discussion</strong>
                            <p>Frame the process and end-use questions that affect material choice.</p>
                        </article>
                        <article class="ab-support-card ab-reveal ab-reveal-delay-2"><svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-scale" />
                            </svg><strong>Quantity &amp; quotation</strong>
                            <p>Share indicative volume and timing so commercial terms can be reviewed.</p>
                        </article>
                        <article class="ab-support-card ab-reveal ab-reveal-delay-3"><svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-truck" />
                            </svg><strong>Supply coordination</strong>
                            <p>Confirm the requested form, packaging and delivery requirements.</p>
                        </article>
                    </div>
                    <p class="ab-support-note">No testing, engineering approval or certification service is implied.
                        Specific
                        support and documentation are confirmed case by case.</p>
                </div>
            </div>
        </section>
        <!-- 10. Secondary enquiry CTA -->
        <section class="ab-secondary-cta" id="secondary-enquiry" aria-labelledby="secondary-title">
            <div class="ab-wrap">
                <div class="ab-secondary-card ab-reveal">
                    <div class="ab-secondary-copy"><span class="ab-eyebrow">Ready when you are</span>
                        <h2 id="secondary-title">Need HDPE for a specific application?</h2>
                        <p>Send the grade or specification, processing method, application, quantity, and destination.
                            Upload a
                            technical datasheet where available.</p>
                    </div>
                    <div class="ab-secondary-actions"><a class="ab-btn" href="#primary-enquiry">REQUEST AN HDPE QUOTE
                            <svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a><a class="ab-btn ab-btn--outline" href="#hdpe-datasheet">UPLOAD A DATASHEET</a><a
                            class="ab-btn ab-btn--outline" href="#hdpe-requirement">ASK A PRODUCT QUESTION</a></div>
                </div>
            </div>
        </section>
        <!-- 11. Frequently asked questions -->
        <section class="ab-section" id="faqs" aria-labelledby="faqs-title">
            <div class="ab-wrap">
                <div class="ab-section-head ab-reveal"><span class="ab-eyebrow">Frequently asked questions</span>
                    <h2 id="faqs-title">HDPE, clearly explained.</h2>
                    <p>Answers are general guidance. Verify the individual grade, source and documentation for each
                        requirement.
                    </p>
                </div>
                <div class="ab-faq-list ab-reveal">
                    <details>
                        <summary>What is HDPE?</summary>
                        <div class="ab-faq-answer">
                            <p>HDPE stands for High-Density Polyethylene. It is a polyethylene thermoplastic generally
                                associated with
                                strength, rigidity, durability, and chemical resistance.</p>
                        </div>
                    </details>
                    <details>
                        <summary>What is the difference between HDPE and LDPE?</summary>
                        <div class="ab-faq-answer">
                            <p>Both belong to the polyethylene family. HDPE has less branching and generally offers
                                greater rigidity
                                and strength; LDPE has more branching and is generally softer and more flexible. Actual
                                performance
                                depends on the specific grade, formulation, processing conditions, and end use.</p>
                        </div>
                    </details>
                    <details>
                        <summary>What is HDPE used for?</summary>
                        <div class="ab-faq-answer">
                            <p>HDPE is commonly used in rigid packaging, containers, pipes, profiles, and industrial
                                products.
                                Suitability depends on the grade and application.</p>
                        </div>
                    </details>
                    <details>
                        <summary>Can HDPE be injection molded, blow molded, or extruded?</summary>
                        <div class="ab-faq-answer">
                            <p>HDPE grades are used for injection molding, blow molding, and extrusion; selected film
                                processes may
                                also be relevant. The grade must match the manufacturing process and required
                                performance.</p>
                        </div>
                    </details>
                    <details>
                        <summary>What is the difference between virgin and recycled HDPE?</summary>
                        <div class="ab-faq-answer">
                            <p>Virgin HDPE uses primary resin, while recycled HDPE uses recovered feedstock. Compare the
                                actual grade
                                specifications, source, documentation and application requirements before selection.</p>
                        </div>
                    </details>
                    <details>
                        <summary>Can recycled HDPE replace virgin material?</summary>
                        <div class="ab-faq-answer">
                            <p>Replacement should be evaluated by grade and application. Review the source,
                                specification, processing
                                behaviour, regulatory requirements and finished-product performance before approval.</p>
                        </div>
                    </details>
                    <details>
                        <summary>What forms of reprocessed or recycled HDPE may be available?</summary>
                        <div class="ab-faq-answer">
                            <p>Forms may include granules, powder, and compounds. This is not a live stock list: confirm
                                the specific
                                product, source, grade, documentation, pack size, minimum order quantity and current
                                availability.</p>
                        </div>
                    </details>
                    <details>
                        <summary>How do I select an HDPE grade?</summary>
                        <div class="ab-faq-answer">
                            <p>Start with the application and manufacturing process, then evaluate the grade, technical
                                properties,
                                reprocessed or recycled requirement, documentation and commercial requirements. Attach
                                the current
                                technical datasheet or target specification if available.</p>
                        </div>
                    </details>
                    <details>
                        <summary>What is Melt Flow Index (MFI)?</summary>
                        <div class="ab-faq-answer">
                            <p>Melt Flow Index is a test result used to describe polymer melt flow under specified
                                conditions. Compare
                                values only when test conditions and grade documentation are clear; it is one input to
                                grade and process
                                selection, not a complete performance measure.</p>
                        </div>
                    </details>
                    <details id="pcr-pir-faq">
                        <summary>What do PCR and PIR mean for recycled plastic?</summary>
                        <div class="ab-faq-answer">
                            <p>PCR refers to post-consumer recycled material and PIR to post-industrial recycled
                                material. Use either
                                classification only when the material source has been verified and documentation
                                supports the
                                description.</p>
                        </div>
                    </details>
                    <details>
                        <summary>What documents should I provide with an HDPE enquiry?</summary>
                        <div class="ab-faq-answer">
                            <p>If available, attach the current technical datasheet or target specification. List any
                                required source,
                                technical or compliance documents so they can be checked for the specific material.</p>
                        </div>
                    </details>
                    <details>
                        <summary>Can you confirm HDPE availability, pack size or minimum order quantity?</summary>
                        <div class="ab-faq-answer">
                            <p>Availability, pack size and minimum order quantity depend on the verified product and
                                current supply.
                                Include your required form, quantity, destination and timing in an enquiry so those
                                details can be
                                reviewed.</p>
                        </div>
                    </details>
                    <details>
                        <summary>Are the material properties on this page guaranteed values?</summary>
                        <div class="ab-faq-answer">
                            <p>No. General characteristics are not guaranteed grade data. Use a current manufacturer
                                datasheet and
                                appropriate technical review for numerical properties and suitability.</p>
                        </div>
                    </details>
                </div>
            </div>
        </section>
        <!-- 12. Related knowledge -->
        <section class="ab-section ab-section--white" id="related-knowledge" aria-labelledby="knowledge-title">
            <div class="ab-wrap">
                <div class="ab-section-head ab-reveal"><span class="ab-eyebrow">Related knowledge</span>
                    <h2 id="knowledge-title">HDPE Knowledge Hub</h2>
                    <p>Explore practical guidance on HDPE grades, processing methods, applications, recycling, material
                        comparisons, and buyer selection. Use these resources to understand the technical and commercial
                        information
                        needed for a more accurate material enquiry.</p>
                </div>
                <div class="ab-related-grid">
                    <article class="ab-knowledge-card ab-reveal">
                        <div class="ab-knowledge-art"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/pellets-macro.jpg' ) ); ?>"
                                alt="Illustrative macro photograph of polymer resin pellets" loading="lazy"
                                decoding="async"></div>
                        <div class="ab-knowledge-body"><span class="ab-knowledge-tag">Grade guide</span>
                            <h3>HDPE Grades</h3>
                            <a class="ab-link" href="<?php echo esc_url( ab_knowledge_article_url( 'understanding-hdpe-grades' ) ); ?>">Read article
                                <svg class="ab-icon" aria-hidden="true">
                                    <use href="#ab-icon-arrow" />
                                </svg></a>
                        </div>
                    </article>
                    <article class="ab-knowledge-card ab-reveal ab-reveal-delay-1">
                        <div class="ab-knowledge-art"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/pellets-macro.jpg' ) ); ?>"
                                alt="Illustrative macro photograph of polymer resin pellets" loading="lazy"
                                decoding="async"></div>
                        <div class="ab-knowledge-body"><span class="ab-knowledge-tag">Processing guide</span>
                            <h3>HDPE Processing Methods</h3>
                            <a class="ab-link" href="<?php echo esc_url( ab_knowledge_article_url( 'hdpe-processing-methods' ) ); ?>">Read article
                                <svg class="ab-icon" aria-hidden="true">
                                    <use href="#ab-icon-arrow" />
                                </svg></a>
                        </div>
                    </article>
                    <article class="ab-knowledge-card ab-reveal ab-reveal-delay-2">
                        <div class="ab-knowledge-art"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/pellets-macro.jpg' ) ); ?>"
                                alt="Illustrative macro photograph of polymer resin pellets" loading="lazy"
                                decoding="async"></div>
                        <div class="ab-knowledge-body"><span class="ab-knowledge-tag">Application guide</span>
                            <h3>HDPE Applications</h3>
                            <a class="ab-link" href="<?php echo esc_url( ab_knowledge_article_url( 'hdpe-applications' ) ); ?>">Read article <svg class="ab-icon"
                                    aria-hidden="true">
                                    <use href="#ab-icon-arrow" />
                                </svg></a>
                        </div>
                    </article>
                    <article class="ab-knowledge-card ab-reveal">
                        <div class="ab-knowledge-art"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/virgin-vs-recycled.jpg' ) ); ?>"
                                alt="Illustrative virgin and recycled polymer comparison" loading="lazy"
                                decoding="async"></div>
                        <div class="ab-knowledge-body"><span class="ab-knowledge-tag">Recycled materials</span>
                            <h3>Virgin vs Recycled HDPE</h3>
                           <a class="ab-link" href="<?php echo esc_url( ab_knowledge_article_url( 'virgin-vs-recycled-hdpe' ) ); ?>">Read article
                                <svg class="ab-icon" aria-hidden="true">
                                    <use href="#ab-icon-arrow" />
                                </svg></a>
                        </div>
                    </article>
                    <article class="ab-knowledge-card ab-reveal ab-reveal-delay-1">
                        <div class="ab-knowledge-art"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/pellets-macro.jpg' ) ); ?>"
                                alt="Illustrative macro photograph of polymer resin pellets" loading="lazy"
                                decoding="async"></div>
                        <div class="ab-knowledge-body"><span class="ab-knowledge-tag">Material comparison</span>
                            <h3>HDPE vs LDPE</h3>
                           <a
                                class="ab-link" href="<?php echo esc_url( ab_knowledge_article_url( 'hdpe-vs-ldpe' ) ); ?>">Read article <svg class="ab-icon"
                                    aria-hidden="true">
                                    <use href="#ab-icon-arrow" />
                                </svg></a>
                        </div>
                    </article>
                    <article class="ab-knowledge-card ab-reveal ab-reveal-delay-2">
                        <div class="ab-knowledge-art"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/pellets-macro.jpg' ) ); ?>"
                                alt="Illustrative macro photograph of polymer resin pellets" loading="lazy"
                                decoding="async"></div>
                        <div class="ab-knowledge-body"><span class="ab-knowledge-tag">Technical guide</span>
                            <h3>Melt Flow Index Guide</h3>
                           
                            <a class="ab-link" href="<?php echo esc_url( ab_knowledge_article_url( 'melt-flow-index-guide' ) ); ?>">Read article <svg class="ab-icon"
                                    aria-hidden="true">
                                    <use href="#ab-icon-arrow" />
                                </svg></a>
                        </div>
                    </article>
                    <article class="ab-knowledge-card ab-reveal">
                        <div class="ab-knowledge-art"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/virgin-vs-recycled.jpg' ) ); ?>"
                                alt="Illustrative virgin and recycled polymer comparison" loading="lazy"
                                decoding="async"></div>
                        <div class="ab-knowledge-body"><span class="ab-knowledge-tag">Recycling guide</span>
                            <h3>PCR vs PIR Recycled Plastic</h3>
                           <a class="ab-link" href="<?php echo esc_url( ab_knowledge_article_url( 'pcr-vs-pir-recycled-plastic' ) ); ?>">Read article <svg
                                    class="ab-icon" aria-hidden="true">
                                    <use href="#ab-icon-arrow" />
                                </svg></a>
                        </div>
                    </article>
                    <article class="ab-knowledge-card ab-reveal ab-reveal-delay-1">
                        <div class="ab-knowledge-art"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/pellets-macro.jpg' ) ); ?>"
                                alt="Illustrative macro photograph of polymer resin pellets" loading="lazy"
                                decoding="async"></div>
                        <div class="ab-knowledge-body"><span class="ab-knowledge-tag">Buyer checklist</span>
                            <h3>How to Select an HDPE Grade</h3>
                           <a class="ab-link" href="<?php echo esc_url( ab_knowledge_article_url( 'how-to-select-an-hdpe-grade' ) ); ?>">Read article <svg class="ab-icon"
                                    aria-hidden="true">
                                    <use href="#ab-icon-arrow" />
                                </svg></a>
                        </div>
                    </article>
                    <article class="ab-knowledge-card ab-reveal ab-reveal-delay-2">
                        <div class="ab-knowledge-art"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/pellets-macro.jpg' ) ); ?>" alt="Illustrative macro photograph of polymer resin pellets" loading="lazy" decoding="async"></div>
                        <div class="ab-knowledge-body"><span class="ab-knowledge-tag">Frequently asked questions</span>
                            <h3>HDPE Frequently Asked Questions</h3>
                            
                            <a class="ab-link" href="<?php echo esc_url( ab_knowledge_article_url( 'hdpe-frequently-asked-questions' ) ); ?>">Read article <svg class="ab-icon" aria-hidden="true"><use href="#ab-icon-arrow" /></svg></a>
                        </div>
                    </article>
                </div>
                <p class="ab-knowledge-note">Each card opens its matching HDPE Knowledge Center article when published. Until then, its link takes visitors to the Knowledge Center library.</p>
            </div>
        </section>
        <!-- 13. Related materials -->
        <section class="ab-section ab-related-materials" id="related-materials" aria-labelledby="related-title">
            <div class="ab-wrap">
                <div class="ab-head-row">
                    <div class="ab-section-head ab-reveal"><span class="ab-eyebrow">Related materials</span>
                        <h2 id="related-title">Explore related polymer families.</h2>
                        <p>Compare another material family when the application, processing method or technical
                            requirements call
                            for it.</p>
                    </div><a class="ab-link" href="<?php echo esc_url( home_url( '/#product-families' ) ); ?>">Browse all material families <svg
                            class="ab-icon" aria-hidden="true">
                            <use href="#ab-icon-arrow" />
                        </svg></a>
                </div>
                <div class="ab-comparison-card" id="hdpe-ldpe-comparison">
                    <div class="ab-comparison-copy"><span class="ab-family-kicker">Material comparison</span>
                        <h3>HDPE vs LDPE</h3>
                        <p>Both belong to the polyethylene family, but their molecular structures differ. HDPE has less
                            branching
                            and generally offers greater rigidity and strength. LDPE has more branching and is generally
                            softer and
                            more flexible. Performance depends on the specific grade, formulation, processing conditions
                            and end use.
                        </p>
                    </div>
                    <div class="ab-comparison-scroll" role="region" aria-label="HDPE and LDPE quick comparison"
                        tabindex="0">
                        <table class="ab-comparison-table">
                            <thead>
                                <tr>
                                    <th scope="col">Property</th>
                                    <th scope="col">HDPE</th>
                                    <th scope="col">LDPE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" data-label="Property">Molecular structure</th>
                                    <td data-label="HDPE">Less branched</td>
                                    <td data-label="LDPE">More branched</td>
                                </tr>
                                <tr>
                                    <th scope="row" data-label="Property">General characteristics</th>
                                    <td data-label="HDPE">Generally more rigid and stronger</td>
                                    <td data-label="LDPE">Generally softer and more flexible</td>
                                </tr>
                                <tr>
                                    <th scope="row" data-label="Property">Packaging association</th>
                                    <td data-label="HDPE">Rigid packaging</td>
                                    <td data-label="LDPE">Flexible packaging</td>
                                </tr>
                                <tr>
                                    <th scope="row" data-label="Property">Example applications</th>
                                    <td data-label="HDPE">Bottles, containers and selected pipes</td>
                                    <td data-label="LDPE">Films, bags, liners and flexible packaging</td>
                                </tr>
                                <tr>
                                    <th scope="row" data-label="Property">Selection basis</th>
                                    <td colspan="2" data-label="Comparison applies to">Application, process, grade, specification and end-use requirements
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ab-comparison-tips">
                        <p><strong>Consider HDPE</strong> when characteristics associated with greater strength and
                            rigidity are
                            required.</p>
                        <p><strong>Consider LDPE</strong> when characteristics associated with softness and flexibility
                            are
                            required.</p>
                    </div>
                </div>
                <div class="ab-related-grid">
                    <article class="ab-related-material-card ab-reveal">
                        <div class="ab-material-mark"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-layers" />
                            </svg></div>
                        <h3>PP</h3>
                        <p>Polypropylene family overview, with buyer notes on grade, processing and end-use fit.</p><a
                            class="ab-link" href="<?php echo esc_url( home_url( '/#material-pp' ) ); ?>">Explore PP <svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a>
                    </article>
                    <article class="ab-related-material-card ab-reveal ab-reveal-delay-1">
                        <div class="ab-material-mark"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-cube" />
                            </svg></div>
                        <h3>LDPE / LLDPE</h3>
                        <p>Polyethylene options often considered for film, flexible packaging and extrusion.</p><a
                            class="ab-link" href="<?php echo esc_url( home_url( '/#material-ldpe-lldpe' ) ); ?>">Explore LDPE / LLDPE <svg
                                class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a>
                    </article>
                    <article class="ab-related-material-card ab-reveal ab-reveal-delay-2">
                        <div class="ab-material-mark"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-industry" />
                            </svg></div>
                        <h3>PVC</h3>
                        <p>A separate polymer family available in rigid and flexible formulations across the wider
                            market.</p><a class="ab-link" href="<?php echo esc_url( home_url( '/#material-pvc' ) ); ?>">Explore PVC <svg class="ab-icon"
                                aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a>
                    </article>
                    <article class="ab-related-material-card ab-reveal">
                        <div class="ab-material-mark"><svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-globe" />
                            </svg></div>
                        <h3>Recycled polymers</h3>
                        <p>Source, classification, grade, form and application all need review for recycled materials.
                        </p><a class="ab-link" href="<?php echo esc_url( home_url( '/#material-recycled-polymers' ) ); ?>">Explore recycled polymers
                            <svg class="ab-icon" aria-hidden="true">
                                <use href="#ab-icon-arrow" />
                            </svg></a>
                    </article>
                </div>

            </div>
        </section>
    </main>
<?php get_footer(); ?>