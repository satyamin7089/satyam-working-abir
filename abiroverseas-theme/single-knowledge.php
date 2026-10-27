<?php
/** Knowledge article detail with editable titles, linked rich text and flexible article sections. */
get_header();
while ( have_posts() ) : the_post();
$id = get_the_ID();
$direct = get_post_meta( $id, 'abk_direct_answer', true );
$comparison = get_post_meta( $id, 'abk_comparison_rows', true );
$why = get_post_meta( $id, 'abk_why', true );
$when = get_post_meta( $id, 'abk_when_rows', true );
$faqs = get_post_meta( $id, 'abk_faqs', true );
$related = get_post_meta( $id, 'abk_related_links', true );
$section_notes = array(
    'direct' => get_post_meta( $id, 'abk_note_direct', true ),
    'comparison' => get_post_meta( $id, 'abk_note_comparison', true ),
    'why' => get_post_meta( $id, 'abk_note_why', true ),
    'article_content' => get_post_meta( $id, 'abk_note_article_content', true ),
    'when' => get_post_meta( $id, 'abk_note_when', true ),
    'faqs' => get_post_meta( $id, 'abk_note_faqs', true ),
    'related' => get_post_meta( $id, 'abk_note_related', true ),
    'cta' => get_post_meta( $id, 'abk_note_cta', true ),
);
$section_note_headings = array(
    'direct' => get_post_meta( $id, 'abk_note_direct_heading', true ),
    'comparison' => get_post_meta( $id, 'abk_note_comparison_heading', true ),
    'why' => get_post_meta( $id, 'abk_note_why_heading', true ),
    'article_content' => get_post_meta( $id, 'abk_note_article_content_heading', true ),
    'when' => get_post_meta( $id, 'abk_note_when_heading', true ),
    'faqs' => get_post_meta( $id, 'abk_note_faqs_heading', true ),
    'related' => get_post_meta( $id, 'abk_note_related_heading', true ),
    'cta' => get_post_meta( $id, 'abk_note_cta_heading', true ),
);
$has_section_note = array();
foreach ( $section_notes as $note_key => $note_value ) {
    $has_section_note[ $note_key ] = is_string( $note_value ) && '' !== trim( wp_strip_all_tags( $note_value ) );
}
$render_section_note = static function ( $note, $heading = '', $cta_context = false ) {
    if ( ! is_string( $note ) || '' === trim( wp_strip_all_tags( $note ) ) ) { return; }
    $heading = is_string( $heading ) ? trim( $heading ) : '';
    $class = $cta_context ? 'kh-section-note kh-section-note--cta' : 'kh-section-note';
    $label_markup = '' !== $heading ? '<span class="kh-section-note-label">' . esc_html( $heading ) . '</span>' : '';
    $aria_label = '' !== $heading ? $heading : 'Section note';
    echo '<aside class="' . esc_attr( $class ) . '" aria-label="' . esc_attr( $aria_label ) . '">' . $label_markup . '<div class="kh-section-note-copy">' . wpautop( wp_kses_post( $note ) ) . '</div></aside>';
};
if ( ! is_array( $comparison ) ) { $comparison = array(); }
if ( ! is_array( $when ) ) { $when = array(); }
if ( ! is_array( $faqs ) ) { $faqs = array(); }
if ( ! is_array( $related ) ) { $related = array(); }
$headings = array(
    'direct' => ab_knowledge_meta_default( $id, 'abk_heading_direct', 'Direct answer' ),
    'comparison' => ab_knowledge_meta_default( $id, 'abk_heading_comparison', 'Compare materials' ),
    'why' => ab_knowledge_meta_default( $id, 'abk_heading_why', 'Why materials differ' ),
    'when' => ab_knowledge_meta_default( $id, 'abk_heading_when', 'When to consider each material' ),
    'faqs' => ab_knowledge_meta_default( $id, 'abk_heading_faqs', 'Frequently asked questions' ),
    'related' => ab_knowledge_meta_default( $id, 'abk_heading_related', 'Related materials' ),
);
$comparison_headers = array(
    'material' => ab_knowledge_meta_default( $id, 'abk_comparison_header_material', 'Material' ),
    'best_for' => ab_knowledge_meta_default( $id, 'abk_comparison_header_best_for', 'Typical fit' ),
    'consideration' => ab_knowledge_meta_default( $id, 'abk_comparison_header_consideration', 'Key consideration' ),
);
$cta_kicker = get_post_meta( $id, 'abk_cta_kicker', true );
$cta_title = ab_knowledge_meta_default( $id, 'abk_cta_title', 'Let’s discuss your material requirement.' );
$cta_text = ab_knowledge_meta_default( $id, 'abk_cta_text', 'Share your process, application and target specification. We’ll help you frame the next step.' );
$cta_label = ab_knowledge_meta_default( $id, 'abk_cta_label', 'Start a material conversation' );
$cta_url = ab_content_url( ab_knowledge_meta_default( $id, 'abk_cta_url', '/#quick-enquiry' ) );
$hub_terms = get_the_terms( $id, 'knowledge_hub' );
$topic_terms = get_the_terms( $id, 'knowledge_topic' );
$article_content = get_the_content();
$has_article_content = trim( (string) $article_content ) !== '';
$toc_items = array( array( 'direct-answer', $headings['direct'] ?: 'Direct answer' ) );
if ( $comparison || $has_section_note['comparison'] ) { $toc_items[] = array( 'comparison', $headings['comparison'] ?: 'Comparison' ); }
if ( $why || $has_section_note['why'] ) { $toc_items[] = array( 'why-different', $headings['why'] ?: 'Material behaviour' ); }
if ( $has_article_content || $has_section_note['article_content'] ) { $toc_items[] = array( 'article-editor-content', 'Article content' ); }
if ( $when || $has_section_note['when'] ) { $toc_items[] = array( 'when-to-consider', $headings['when'] ?: 'Selection guidance' ); }
if ( $faqs || $has_section_note['faqs'] ) { $toc_items[] = array( 'article-faqs', $headings['faqs'] ?: 'FAQs' ); }
if ( $related || $has_section_note['related'] ) { $toc_items[] = array( 'related-links', $headings['related'] ?: 'Related materials' ); }
if ( $cta_kicker || $cta_title || $cta_text || ( $cta_url && $cta_label ) || $has_section_note['cta'] ) { $toc_items[] = array( 'material-enquiry', $cta_title ?: 'Contact our team' ); }
?>
<main id="main-content" class="kh-main kh-article-main">

  <header class="kh-article-hero"><div class="kh-shell kh-article-hero-layout<?php echo has_post_thumbnail() ? ' has-featured' : ' no-featured'; ?>">
    <div class="kh-article-hero-copy">

      <h1><?php the_title(); ?></h1>
      <?php if ( has_excerpt() ) : ?><p class="kh-deck"><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
     
    </div>
    <?php if ( has_post_thumbnail() ) : ?><figure class="kh-article-featured"><?php the_post_thumbnail( 'large', array( 'class' => 'kh-featured-image', 'loading' => 'eager', 'fetchpriority' => 'high', 'decoding' => 'async' ) ); ?><?php $feature_caption = wp_get_attachment_caption( get_post_thumbnail_id() ); if ( $feature_caption ) : ?><figcaption><?php echo esc_html( $feature_caption ); ?></figcaption><?php endif; ?></figure><?php endif; ?>
  </div></header>
  <div class="kh-shell kh-article-layout">
    <aside class="kh-toc"><strong>On this page</strong><?php foreach ( $toc_items as $toc_item ) : ?><a href="#<?php echo esc_attr( $toc_item[0] ); ?>"><?php echo esc_html( $toc_item[1] ); ?></a><?php endforeach; ?></aside>
    <article class="kh-article-content">
      <section id="direct-answer" class="kh-content-section kh-direct-answer"><?php if ( $headings['direct'] ) : ?><h2><?php echo esc_html( $headings['direct'] ); ?></h2><?php endif; ?><div class="kh-direct-copy"><?php echo $direct ? wpautop( wp_kses_post( $direct ) ) : '<p>This guide answers the central material question and gives practical selection context.</p>'; ?></div><?php $render_section_note( $section_notes['direct'], $section_note_headings['direct'] ); ?></section>
      <?php if ( $comparison || $has_section_note['comparison'] ) : ?>
      <section id="comparison" class="kh-content-section">
        <?php if ( $headings['comparison'] ) : ?><h2><?php echo esc_html( $headings['comparison'] ); ?></h2><?php endif; ?>
        <?php if ( $comparison ) : ?><div class="kh-table-wrap"><table class="kh-comparison"><thead><tr><th scope="col"><?php echo esc_html( $comparison_headers['material'] ); ?></th><th scope="col"><?php echo esc_html( $comparison_headers['best_for'] ); ?></th><th scope="col"><?php echo esc_html( $comparison_headers['consideration'] ); ?></th></tr></thead><tbody><?php foreach ( $comparison as $row ) : ?><tr><th scope="row" data-label="<?php echo esc_attr( $comparison_headers['material'] ); ?>"><?php echo esc_html( isset( $row['material'] ) ? $row['material'] : '' ); ?></th><td data-label="<?php echo esc_attr( $comparison_headers['best_for'] ); ?>"><?php echo esc_html( isset( $row['best_for'] ) ? $row['best_for'] : '' ); ?></td><td data-label="<?php echo esc_attr( $comparison_headers['consideration'] ); ?>"><?php echo esc_html( isset( $row['consideration'] ) ? $row['consideration'] : '' ); ?></td></tr><?php endforeach; ?></tbody></table></div><?php endif; ?>
        <?php $render_section_note( $section_notes['comparison'], $section_note_headings['comparison'] ); ?>
      </section>
    <?php endif; ?>
      <?php if ( $why || $has_section_note['why'] ) : ?><section id="why-different" class="kh-content-section"><?php if ( $headings['why'] ) : ?><h2><?php echo esc_html( $headings['why'] ); ?></h2><?php endif; ?><?php if ( $why ) : ?><div class="kh-prose"><?php echo wpautop( wp_kses_post( $why ) ); ?></div><?php endif; ?><?php $render_section_note( $section_notes['why'], $section_note_headings['why'] ); ?></section><?php endif; ?>
      <?php if ( $has_article_content || $has_section_note['article_content'] ) : ?><div id="article-editor-content" class="kh-editor-content"><?php if ( $has_article_content ) : ?><?php the_content(); ?><?php endif; ?><?php $render_section_note( $section_notes['article_content'], $section_note_headings['article_content'] ); ?></div><?php endif; ?>
      <?php if ( $when || $has_section_note['when'] ) : ?><section id="when-to-consider" class="kh-content-section"><?php if ( $headings['when'] ) : ?><h2><?php echo esc_html( $headings['when'] ); ?></h2><?php endif; ?><?php if ( $when ) : ?><div class="kh-consider-grid"><?php foreach ( $when as $row ) : ?><article class="kh-consider-card"><h3><?php echo esc_html( isset( $row['material'] ) ? $row['material'] : '' ); ?></h3><div><?php echo wpautop( wp_kses_post( isset( $row['detail'] ) ? $row['detail'] : '' ) ); ?></div></article><?php endforeach; ?></div><?php endif; ?><?php $render_section_note( $section_notes['when'], $section_note_headings['when'] ); ?></section><?php endif; ?>
      <?php if ( $faqs || $has_section_note['faqs'] ) : ?><section id="article-faqs" class="kh-content-section"><?php if ( $headings['faqs'] ) : ?><h2><?php echo esc_html( $headings['faqs'] ); ?></h2><?php endif; ?><?php if ( $faqs ) : ?><div class="kh-faq-list"><?php foreach ( $faqs as $faq ) : if ( empty( $faq['question'] ) || empty( $faq['answer'] ) ) { continue; } ?><details><summary><?php echo esc_html( $faq['question'] ); ?></summary><div class="kh-faq-answer"><?php echo wpautop( wp_kses_post( $faq['answer'] ) ); ?></div></details><?php endforeach; ?></div><?php endif; ?><?php $render_section_note( $section_notes['faqs'], $section_note_headings['faqs'] ); ?></section><?php endif; ?>
      <?php if ( $related || $has_section_note['related'] ) : ?><section id="related-links" class="kh-content-section"><?php if ( $headings['related'] ) : ?><h2><?php echo esc_html( $headings['related'] ); ?></h2><?php endif; ?><?php if ( $related ) : ?><div class="kh-related-grid"><?php foreach ( $related as $row ) : $url = ab_content_url( isset( $row['url'] ) ? $row['url'] : '' ); if ( empty( $row['label'] ) || ! $url ) { continue; } ?><a class="kh-related-card" href="<?php echo esc_url( $url ); ?>"><span><?php echo esc_html( $row['label'] ); ?></span><span aria-hidden="true">→</span></a><?php endforeach; ?></div><?php endif; ?><?php $render_section_note( $section_notes['related'], $section_note_headings['related'] ); ?></section><?php endif; ?>
      <?php if ( $cta_kicker || $cta_title || $cta_text || ( $cta_url && $cta_label ) || $has_section_note['cta'] ) : ?><section id="material-enquiry" class="kh-enquiry"><div class="kh-enquiry-copy"><?php if ( $cta_kicker ) : ?><p class="kh-enquiry-kicker"><?php echo esc_html( $cta_kicker ); ?></p><?php endif; ?><?php if ( $cta_title ) : ?><h2><?php echo esc_html( $cta_title ); ?></h2><?php endif; ?><?php if ( $cta_text ) : ?><p><?php echo esc_html( $cta_text ); ?></p><?php endif; ?></div><?php if ( $cta_url && $cta_label ) : ?><a class="kh-button kh-enquiry-button" href="<?php echo esc_url( $cta_url ); ?>"><span><?php echo esc_html( $cta_label ); ?></span><span class="kh-cta-arrow" aria-hidden="true">↗</span></a><?php endif; ?><?php $render_section_note( $section_notes['cta'], $section_note_headings['cta'], true ); ?></section><?php endif; ?>
    </article>
  </div>
</main>
<?php endwhile; get_footer(); ?>