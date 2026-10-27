<?php get_header(); ?>
<main id="main-content" class="ab-section">
  <div class="ab-wrap">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article <?php post_class( 'ab-prose-shell' ); ?>><h1><?php the_title(); ?></h1><?php the_content(); ?></article>
    <?php endwhile; else : ?><h1><?php esc_html_e( 'Nothing found', 'abiroverseas' ); ?></h1><?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>
