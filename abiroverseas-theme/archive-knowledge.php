<?php
/** Knowledge Center archive and hub filters. */
get_header();
$materials = get_terms( array( 'taxonomy' => 'knowledge_material', 'hide_empty' => false ) );
$topics = get_terms( array( 'taxonomy' => 'knowledge_topic', 'hide_empty' => false ) );
$hubs = get_terms( array( 'taxonomy' => 'knowledge_hub', 'hide_empty' => false ) );
$current_material = sanitize_title( get_query_var( 'knowledge_material' ) );
$current_topic = sanitize_title( get_query_var( 'knowledge_topic' ) );
$current_hub = sanitize_title( get_query_var( 'knowledge_hub' ) );
?>
<main id="main-content" class="kh-main">
  <section class="kh-hero"><div class="kh-shell kh-hero-grid">
    <div><span class="kh-eyebrow">Knowledge Hub</span><h1>Material knowledge, made practical.</h1><p>Find straight answers, material comparisons, processing guidance and FAQs. Choose a material or topic to narrow the library.</p></div>
    <div class="kh-hero-note"><strong>How to use this hub</strong><p>Start with a product type such as HDPE, then narrow by comparisons, FAQs, grades or applications. Search by article or material name at any time.</p></div>
  </div></section>
  <section class="kh-shell kh-library" aria-labelledby="kh-library-title">
    <div class="kh-library-heading"><div><span class="kh-eyebrow">Browse resources</span><h2 id="kh-library-title">Knowledge Center</h2></div><p><?php echo esc_html( (string) $GLOBALS['wp_query']->found_posts ); ?> resources</p></div>
    <form class="kh-filter" method="get" action="<?php echo esc_url( get_post_type_archive_link( 'knowledge' ) ); ?>">
      <label class="kh-search"><span>Search by product or article name</span><input type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="e.g. HDPE vs LDPE"></label>
      <label><span>Product type</span><select name="knowledge_material"><option value="">All materials</option><?php if ( ! is_wp_error( $materials ) ) : foreach ( $materials as $term ) : ?><option value="<?php echo esc_attr( $term->slug ); ?>" <?php selected( $current_material, $term->slug ); ?>><?php echo esc_html( $term->name ); ?></option><?php endforeach; endif; ?></select></label>
      <label><span>Category / topic</span><select name="knowledge_topic"><option value="">All topics</option><?php if ( ! is_wp_error( $topics ) ) : foreach ( $topics as $term ) : ?><option value="<?php echo esc_attr( $term->slug ); ?>" <?php selected( $current_topic, $term->slug ); ?>><?php echo esc_html( $term->name ); ?></option><?php endforeach; endif; ?></select></label>
      <label><span>Knowledge Hub</span><select name="knowledge_hub"><option value="">All hubs</option><?php if ( ! is_wp_error( $hubs ) ) : foreach ( $hubs as $term ) : ?><option value="<?php echo esc_attr( $term->slug ); ?>" <?php selected( $current_hub, $term->slug ); ?>><?php echo esc_html( $term->name ); ?></option><?php endforeach; endif; ?></select></label>
      <button type="submit" class="kh-button">Find resources</button>
      <?php if ( get_search_query() || $current_material || $current_topic || $current_hub ) : ?><a class="kh-clear" href="<?php echo esc_url( get_post_type_archive_link( 'knowledge' ) ); ?>">Clear filters</a><?php endif; ?>
    </form>
    <?php if ( have_posts() ) : ?>
      <div class="kh-card-grid">
      <?php while ( have_posts() ) : the_post(); $hub_terms = get_the_terms( get_the_ID(), 'knowledge_hub' ); $topic_terms = get_the_terms( get_the_ID(), 'knowledge_topic' ); ?>
        <article <?php post_class( 'kh-card' ); ?>>
          <?php if ( has_post_thumbnail() ) : ?><a class="kh-card-image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?></a><?php else : ?><a class="kh-card-art" href="<?php the_permalink(); ?>" aria-hidden="true"><span>AB</span></a><?php endif; ?>
          <div class="kh-card-content">
            <div class="kh-tags"><?php if ( $hub_terms && ! is_wp_error( $hub_terms ) ) : ?><span><?php echo esc_html( $hub_terms[0]->name ); ?></span><?php endif; ?><?php if ( $topic_terms && ! is_wp_error( $topic_terms ) ) : ?><span><?php echo esc_html( $topic_terms[0]->name ); ?></span><?php endif; ?></div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo esc_html( wp_trim_words( get_the_excerpt() ?: get_post_meta( get_the_ID(), 'abk_direct_answer', true ), 25 ) ); ?></p>
            <a class="kh-read-more" href="<?php the_permalink(); ?>">Read this guide <span aria-hidden="true">→</span></a>
          </div>
        </article>
      <?php endwhile; ?>
      </div>
      <nav class="kh-pagination" aria-label="Knowledge pages"><?php the_posts_pagination( array( 'mid_size' => 1, 'prev_text' => 'Previous', 'next_text' => 'Next' ) ); ?></nav>
    <?php else : ?>
      <div class="kh-empty"><h3>No resources match those filters yet.</h3><p>Try another material or topic, or clear the filters to browse the complete Knowledge Center.</p><a class="kh-button" href="<?php echo esc_url( get_post_type_archive_link( 'knowledge' ) ); ?>">Browse all resources</a></div>
    <?php endif; ?>
  </section>
  <section class="kh-bottom-cta"><div class="kh-shell"><div><span class="kh-eyebrow">Need a material recommendation?</span><h2>Share your process, application and requirement.</h2></div><a class="kh-button kh-button-light" href="<?php echo esc_url( home_url( '/#quick-enquiry' ) ); ?>">Make a material enquiry</a></div></section>
</main>
<?php get_footer(); ?>
