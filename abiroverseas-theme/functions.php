<?php
/** Abiroverseas — WordPress theme functions. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'AB_THEME_VERSION', '1.5.0' );

add_action( 'after_setup_theme', 'ab_theme_setup' );
function ab_theme_setup() {
    load_theme_textdomain( 'abiroverseas', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'customize-selective-refresh-widgets' );
    register_nav_menus( array( 'primary' => 'Primary Menu' ) );
}

add_action( 'init', 'ab_register_content_types' );
function ab_register_content_types() {
    register_post_type( 'knowledge', array(
        'labels' => array(
            'name' => 'Knowledge Center', 'singular_name' => 'Knowledge Article',
            'add_new_item' => 'Add Knowledge Article', 'edit_item' => 'Edit Knowledge Article',
            'new_item' => 'New Knowledge Article', 'view_item' => 'View Knowledge Article',
            'search_items' => 'Search Knowledge Center', 'not_found' => 'No knowledge articles found',
            'menu_name' => 'Knowledge Center',
        ),
        'public' => true, 'show_in_rest' => true, 'has_archive' => 'knowledge',
        'rewrite' => array( 'slug' => 'knowledge', 'with_front' => false ),
        'menu_icon' => 'dashicons-welcome-learn-more', 'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
        'taxonomies' => array( 'knowledge_hub', 'knowledge_material', 'knowledge_topic' ),
    ) );

    register_taxonomy( 'knowledge_hub', array( 'knowledge' ), array(
        'labels' => array( 'name' => 'Knowledge Hub', 'singular_name' => 'Knowledge Hub', 'search_items' => 'Search Knowledge Hubs', 'all_items' => 'All Knowledge Hubs', 'parent_item' => 'Parent Hub', 'parent_item_colon' => 'Parent Hub:', 'edit_item' => 'Edit Knowledge Hub', 'add_new_item' => 'Add Knowledge Hub', 'menu_name' => 'Knowledge Hub' ),
        'public' => true, 'show_in_rest' => true, 'hierarchical' => true,
        'rewrite' => array( 'slug' => 'knowledge-hub', 'with_front' => false ),
    ) );
    register_taxonomy( 'knowledge_material', array( 'knowledge' ), array(
        'labels' => array( 'name' => 'Product Type / Material', 'singular_name' => 'Material', 'search_items' => 'Search Materials', 'all_items' => 'All Materials', 'edit_item' => 'Edit Material', 'add_new_item' => 'Add Material', 'menu_name' => 'Product Type / Material' ),
        'public' => true, 'show_in_rest' => true, 'hierarchical' => true,
        'rewrite' => array( 'slug' => 'knowledge-material', 'with_front' => false ),
    ) );
    register_taxonomy( 'knowledge_topic', array( 'knowledge' ), array(
        'labels' => array( 'name' => 'Knowledge Topic / Format', 'singular_name' => 'Knowledge Topic', 'search_items' => 'Search Topics', 'all_items' => 'All Topics', 'edit_item' => 'Edit Topic', 'add_new_item' => 'Add Topic', 'menu_name' => 'Knowledge Topics' ),
        'public' => true, 'show_in_rest' => true, 'hierarchical' => true,
        'rewrite' => array( 'slug' => 'knowledge-topic', 'with_front' => false ),
    ) );
}

add_action( 'wp_enqueue_scripts', 'ab_enqueue_assets' );
function ab_enqueue_assets() {
    $base = get_template_directory_uri();
    $version = AB_THEME_VERSION;
    $style = '';
    $script = '';
    if ( is_singular( 'knowledge' ) ) { $style = 'knowledge.css'; $script = 'knowledge-single.js'; }
    elseif ( is_post_type_archive( 'knowledge' ) || is_tax( array( 'knowledge_hub', 'knowledge_material', 'knowledge_topic' ) ) ) { $style = 'knowledge.css'; $script = 'knowledge-hub.js'; }
    elseif ( is_page() ) {
        /*
         * Resolve the page layout by slug first, then by assigned template.
         * This keeps page assets loading even if WordPress returns an empty
         * template slug (for example after a page/template assignment changes).
         */
        $page_id = get_queried_object_id();
        $slug = get_post_field( 'post_name', $page_id );
        $template = str_replace( 'page-templates/', 'page-template/', (string) get_page_template_slug( $page_id ) );
        $material_templates = array(
            'page-template/template-material.php',
            'page-template/template-material-Recycled-Plastics.php',
            'page-template/template-material-PS.php',
            'page-template/template-material-ABS.php',
            'page-template/template-material-EVA.php',
            'page-template/template-material-PVC.php',
            'page-template/template-material-PP.php',
            'page-template/template-material-LDPE.php',
        );

        if ( is_front_page() || 'home' === $slug || 'page-template/template-home.php' === $template ) {
            $style = 'home.css';
            $script = 'home.js';
        } elseif ( 'about' === $slug || 'page-template/template-about.php' === $template ) {
            $style = 'about.css';
            $script = 'about.js';
        } elseif ( in_array( $slug, array( 'products', 'product-families', 'product-range' ), true ) || in_array( $template, array( 'page-template/template-product-families.php', 'page-template/template-product-range.php' ), true ) ) {
            // Both product directories share one responsive design system and live-search controller.
            $style = 'products.css';
            $script = 'products.js';
        } elseif ( 'contact-us' === $slug || 'contact' === $slug || 'page-template/template-contact.php' === $template ) {
            $style = 'contact.css';
        } elseif ( in_array( $slug, array( 'recycled-plastics', 'ps', 'abs', 'eva', 'pvc', 'pp', 'ldpe', 'hdpe', 'material', 'materials' ), true ) || in_array( $template, $material_templates, true ) ) {
            $style = 'material.css';
            $script = 'material.js';
        }
    }
    // Load the declared brand font once, then shared site design tokens/base/chrome, then page-specific layout styles.
    wp_enqueue_style( 'ab-reddit-sans', 'https://fonts.googleapis.com/css2?family=Reddit+Sans:wght@400;500;600;700;800&display=swap', array(), null );
    wp_enqueue_style( 'ab-site-footer', $base . '/assets/css/site.css', array( 'ab-reddit-sans' ), $version );
    if ( $style ) { wp_enqueue_style( 'ab-page-layout', $base . '/assets/css/' . $style, array( 'ab-site-footer' ), $version ); }
    // One navigation & reveal controller serves the shared header and scroll animations on every page.
    wp_enqueue_script( 'ab-navigation', $base . '/assets/js/navigation.js', array(), $version, true );
    if ( $script ) { wp_enqueue_script( 'ab-page-interactions', $base . '/assets/js/' . $script, array( 'ab-navigation' ), $version, true ); }
}

/** Install starter pages without overwriting existing page copy. */
add_action( 'after_switch_theme', 'ab_install_starter_pages' );
function ab_install_starter_pages() {
    $defaults = require get_template_directory() . '/inc/default-content.php';
    $home_id = 0;
    foreach ( $defaults['pages'] as $page_data ) {
        $page = get_page_by_path( $page_data['slug'], OBJECT, 'page' );
        if ( ! $page ) {
            $id = wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'publish', 'post_title' => $page_data['title'], 'post_name' => $page_data['slug'] ) );
            if ( is_wp_error( $id ) || ! $id ) { continue; }
        } else { $id = $page->ID; }
        update_post_meta( $id, '_wp_page_template', $page_data['template'] );
        if ( ! get_post_meta( $id, 'ab_meta_title', true ) ) { update_post_meta( $id, 'ab_meta_title', $page_data['seo_title'] ); }
        if ( ! get_post_meta( $id, 'ab_meta_description', true ) ) { update_post_meta( $id, 'ab_meta_description', $page_data['seo_description'] ); }
        if ( ! get_post_meta( $id, 'ab_schema_type', true ) ) { update_post_meta( $id, 'ab_schema_type', $page_data['schema_type'] ); }
        if ( ! get_post_meta( $id, 'ab_page_faqs', true ) && ! empty( $page_data['faqs'] ) ) { update_post_meta( $id, 'ab_page_faqs', $page_data['faqs'] ); }
        if ( 'home' === $page_data['slug'] ) { $home_id = (int) $id; }
    }
    if ( $home_id ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $home_id );
    }
    $hub_terms = array( 'HDPE', 'PP', 'LDPE / LLDPE', 'PVC', 'Recycled Polymers' );
    foreach ( $hub_terms as $term ) {
        if ( ! term_exists( $term, 'knowledge_hub' ) ) { wp_insert_term( $term, 'knowledge_hub' ); }
        if ( ! term_exists( $term, 'knowledge_material' ) ) { wp_insert_term( $term, 'knowledge_material' ); }
    }
    foreach ( array( 'Comparisons', 'FAQs', 'Grades & Selection', 'Processing Methods', 'Applications', 'Recycling & Sustainability' ) as $term ) {
        if ( ! term_exists( $term, 'knowledge_topic' ) ) { wp_insert_term( $term, 'knowledge_topic' ); }
    }
    // Create unpublished HDPE article starters so the Knowledge Center has the intended editorial structure without inventing technical copy.
    $starter_articles = array(
        'understanding-hdpe-grades' => array( 'Understanding HDPE Grades', 'Grades & Selection' ),
        'hdpe-processing-methods' => array( 'HDPE Processing Methods', 'Processing Methods' ),
        'hdpe-applications' => array( 'HDPE Applications', 'Applications' ),
        'virgin-vs-recycled-hdpe' => array( 'Virgin vs Recycled HDPE', 'Comparisons' ),
        'hdpe-vs-ldpe' => array( 'HDPE vs LDPE', 'Comparisons' ),
        'melt-flow-index-guide' => array( 'Melt Flow Index Guide', 'Grades & Selection' ),
        'pcr-vs-pir-recycled-plastic' => array( 'PCR vs PIR Recycled Plastic', 'Recycling & Sustainability' ),
        'how-to-select-an-hdpe-grade' => array( 'How to Select an HDPE Grade', 'Grades & Selection' ),
        'hdpe-frequently-asked-questions' => array( 'HDPE Frequently Asked Questions', 'FAQs' ),
    );
    foreach ( $starter_articles as $slug => $starter ) {
        if ( get_page_by_path( $slug, OBJECT, 'knowledge' ) ) { continue; }
        $post_id = wp_insert_post( array( 'post_type' => 'knowledge', 'post_status' => 'draft', 'post_title' => $starter[0], 'post_name' => $slug ) );
        if ( is_wp_error( $post_id ) || ! $post_id ) { continue; }
        update_post_meta( $post_id, 'ab_knowledge_url', $slug );
        $hub = get_term_by( 'slug', 'hdpe', 'knowledge_hub' );
        $material = get_term_by( 'slug', 'hdpe', 'knowledge_material' );
        $topic = get_term_by( 'name', $starter[1], 'knowledge_topic' );
        if ( $hub ) { wp_set_object_terms( $post_id, array( (int) $hub->term_id ), 'knowledge_hub' ); }
        if ( $material ) { wp_set_object_terms( $post_id, array( (int) $material->term_id ), 'knowledge_material' ); }
        if ( $topic ) { wp_set_object_terms( $post_id, array( (int) $topic->term_id ), 'knowledge_topic' ); }
    }
    ab_seed_primary_menu();
    flush_rewrite_rules();
}

/** Create an editable starter menu and assign it to Appearance → Menus → Primary Menu. */
function ab_seed_primary_menu() {
    $locations = get_theme_mod( 'nav_menu_locations', array() );
    if ( ! empty( $locations['primary'] ) && wp_get_nav_menu_object( (int) $locations['primary'] ) ) { return; }
    $menu = wp_get_nav_menu_object( 'Primary Menu' );
    $created = false;
    if ( ! $menu ) {
        $menu_id = wp_create_nav_menu( 'Primary Menu' );
        if ( is_wp_error( $menu_id ) ) { return; }
        $created = true;
    } else { $menu_id = (int) $menu->term_id; }
    if ( $created ) {
        ab_add_primary_menu_item( $menu_id, 'Home', home_url( '/' ) );
        $products = ab_add_primary_menu_item( $menu_id, 'Products', home_url( '/#product-families' ) );
        ab_add_primary_menu_item( $menu_id, 'Product families', home_url( '/#product-families' ), $products );
        ab_add_primary_menu_item( $menu_id, 'HDPE', home_url( '/hdpe/' ), $products );
        ab_add_primary_menu_item( $menu_id, 'Grades & forms', home_url( '/#materials' ), $products );
        ab_add_primary_menu_item( $menu_id, 'Materials', home_url( '/#materials' ) );
        ab_add_primary_menu_item( $menu_id, 'Industries', home_url( '/#markets' ) );
        ab_add_primary_menu_item( $menu_id, 'Resources', home_url( '/knowledge/' ) );
        ab_add_primary_menu_item( $menu_id, 'About Us', home_url( '/about/' ) );
        ab_add_primary_menu_item( $menu_id, 'Get a Custom Quote', home_url( '/#quick-enquiry' ), 0, array( 'ab-nav-quote' ) );
    }
    $locations['primary'] = (int) $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
}

function ab_add_primary_menu_item( $menu_id, $title, $url, $parent = 0, $classes = array() ) {
    return wp_update_nav_menu_item( $menu_id, 0, array(
        'menu-item-title' => $title,
        'menu-item-url' => $url,
        'menu-item-status' => 'publish',
        'menu-item-type' => 'custom',
        'menu-item-parent-id' => (int) $parent,
        'menu-item-classes' => $classes,
    ) );
}
add_action( 'init', 'ab_maybe_seed_primary_menu', 20 );
function ab_maybe_seed_primary_menu() {
    if ( get_theme_mod( 'ab_primary_menu_seeded' ) ) { return; }
    ab_seed_primary_menu();
    set_theme_mod( 'ab_primary_menu_seeded', 1 );
}

/**
 * Create the two product directory pages once, without replacing existing page copy.
 * Existing pages with these slugs keep their titles and content; only their template is assigned.
 */
add_action( 'init', 'ab_ensure_product_directory_pages', 30 );
function ab_ensure_product_directory_pages() {
    if ( get_option( 'ab_product_directory_pages_ready' ) ) { return; }

    $pages = array(
        array(
            'slug' => 'products',
            'title' => 'Product Families',
            'template' => 'page-template/template-product-families.php',
        ),
        array(
            'slug' => 'product-range',
            'title' => 'Product Range',
            'template' => 'page-template/template-product-range.php',
        ),
    );

    foreach ( $pages as $page_data ) {
        $page = get_page_by_path( $page_data['slug'], OBJECT, 'page' );
        if ( ! $page ) {
            $page_id = wp_insert_post( array(
                'post_type' => 'page',
                'post_status' => 'publish',
                'post_title' => $page_data['title'],
                'post_name' => $page_data['slug'],
            ), true );
            if ( is_wp_error( $page_id ) || ! $page_id ) { continue; }
        } else {
            $page_id = (int) $page->ID;
        }

        update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
    }

    update_option( 'ab_product_directory_pages_ready', 1 );
}
function ab_primary_menu_fallback() {
    $items = array(
        array( 'Home', home_url( '/' ) ),
        array( 'HDPE', home_url( '/hdpe/' ) ),
        array( 'Resources', home_url( '/knowledge/' ) ),
        array( 'About Us', home_url( '/about/' ) ),
        array( 'Get a Custom Quote', home_url( '/#quick-enquiry' ), 'ab-nav-quote' ),
    );
    $html = '<ul id="ab-primary-menu" class="ab-nav-menu">';
    foreach ( $items as $item ) {
        $class = isset( $item[2] ) ? ' class="' . esc_attr( $item[2] ) . '"' : '';
        $html .= '<li' . $class . '><a href="' . esc_url( $item[1] ) . '">' . esc_html( $item[0] ) . '</a></li>';
    }
    $html .= '</ul>';
    return $html;
}

/** Shared SEO, page-schema and FAQ-schema fields for native Pages. */
add_action( 'add_meta_boxes', 'ab_add_meta_boxes' );
function ab_add_meta_boxes() {
    add_meta_box( 'ab_page_seo', 'Search Preview & Schema', 'ab_page_seo_metabox', 'page', 'normal', 'high' );
    add_meta_box( 'ab_knowledge_builder', 'Knowledge Article Fields', 'ab_knowledge_metabox', 'knowledge', 'normal', 'high' );
    add_meta_box( 'ab_knowledge_workflow', 'Knowledge Center publishing checklist', 'ab_knowledge_help_metabox', 'knowledge', 'side', 'high' );
}
function ab_page_seo_metabox( $post ) {
    wp_nonce_field( 'ab_page_meta_save', 'ab_page_meta_nonce' );
    $title = get_post_meta( $post->ID, 'ab_meta_title', true );
    $desc = get_post_meta( $post->ID, 'ab_meta_description', true );
    $schema = get_post_meta( $post->ID, 'ab_schema_type', true ) ?: 'WebPage';
    $faqs = get_post_meta( $post->ID, 'ab_page_faqs', true );
    if ( ! is_array( $faqs ) ) { $faqs = array(); }
    echo '<p>These fields apply to this Page only. The active Home, About and HDPE templates keep the supplied HTML layout; edit these metadata/schema fields here.</p>';
    echo '<p><label for="ab_meta_title"><strong>SEO title</strong></label><br><input class="widefat" id="ab_meta_title" name="ab_meta_title" maxlength="255" value="' . esc_attr( $title ) . '"></p>';
    echo '<p><label for="ab_meta_description"><strong>Meta description</strong></label><br><textarea class="widefat" rows="3" maxlength="320" id="ab_meta_description" name="ab_meta_description">' . esc_textarea( $desc ) . '</textarea></p>';
    echo '<p><label for="ab_schema_type"><strong>Page schema type</strong></label><br><select name="ab_schema_type" id="ab_schema_type">';
    foreach ( array( 'WebPage', 'AboutPage', 'ContactPage', 'CollectionPage' ) as $type ) { echo '<option value="' . esc_attr( $type ) . '" ' . selected( $schema, $type, false ) . '>' . esc_html( $type ) . '</option>'; }
    echo '</select> <span class="description">FAQPage schema is created from the question-and-answer rows below.</span></p>';
    ab_render_repeater( 'ab_page_faqs_json', $faqs, 'Page FAQs (used for FAQPage schema)', array( 'question' => 'Question', 'answer' => 'Answer' ), 'Add FAQ' );
}
function ab_knowledge_metabox( $post ) {
    wp_nonce_field( 'ab_knowledge_save', 'ab_knowledge_nonce' );
    $slug = get_post_meta( $post->ID, 'ab_knowledge_url', true );
    if ( ! $slug ) { $slug = $post->post_name; }
    $fields = array(
        'direct_answer' => get_post_meta( $post->ID, 'abk_direct_answer', true ),
        'why' => get_post_meta( $post->ID, 'abk_why', true ),
        'comparison' => get_post_meta( $post->ID, 'abk_comparison_rows', true ),
        'when' => get_post_meta( $post->ID, 'abk_when_rows', true ),
        'faqs' => get_post_meta( $post->ID, 'abk_faqs', true ),
        'related' => get_post_meta( $post->ID, 'abk_related_links', true ),
    );
    foreach ( $fields as $key => $value ) { if ( ! is_array( $value ) && in_array( $key, array( 'comparison', 'when', 'faqs', 'related' ), true ) ) { $fields[ $key ] = array(); } }
    $seo_title = get_post_meta( $post->ID, 'ab_meta_title', true );
    $seo_desc = get_post_meta( $post->ID, 'ab_meta_description', true );
    $comparison_headers = array(
        'material' => ab_knowledge_meta_default( $post->ID, 'abk_comparison_header_material', 'Material' ),
        'best_for' => ab_knowledge_meta_default( $post->ID, 'abk_comparison_header_best_for', 'Typical fit' ),
        'consideration' => ab_knowledge_meta_default( $post->ID, 'abk_comparison_header_consideration', 'Key consideration' ),
    );
    echo '<div class="ab-admin-knowledge">';
    echo '<section><h3>Article setup & search preview</h3><p><label><strong>Exact URL slug</strong><br><code>/knowledge/</code><input class="regular-text" name="ab_knowledge_url" value="' . esc_attr( $slug ) . '" placeholder="hdpe-vs-ldpe"></label><br><span class="description">Set this independently from the article title. Use one URL segment; WordPress keeps the post slug in sync.</span></p>';
    echo '<p><label><strong>SEO title</strong><br><input class="large-text" name="ab_meta_title" maxlength="255" value="' . esc_attr( $seo_title ) . '"></label></p><p><label><strong>Meta description</strong><br><textarea class="large-text" rows="2" maxlength="320" name="ab_meta_description">' . esc_textarea( $seo_desc ) . '</textarea></label></p><p class="description">Set the WordPress Featured image in the editor sidebar. It appears on Knowledge Hub cards and in this article’s hero.</p></section>';
    echo '<section><h3>Direct answer</h3><label class="ab-admin-full"><strong>Section heading</strong><input class="large-text" name="abk_heading_direct" value="' . esc_attr( ab_knowledge_meta_default( $post->ID, 'abk_heading_direct', 'Direct answer' ) ) . '"></label><p class="description">A concise answer shown near the start of the article. Select text and use the link button to add an inline link.</p>';
    ab_render_rich_field( 'abk_direct_answer', 'abk_direct_answer', $fields['direct_answer'] );
    ab_render_knowledge_section_note( $post->ID, 'abk_note_direct' );
    echo '</section>';
    echo '<section><h3>Quick comparison</h3><label class="ab-admin-full"><strong>Section heading</strong><input class="large-text" name="abk_heading_comparison" value="' . esc_attr( ab_knowledge_meta_default( $post->ID, 'abk_heading_comparison', 'Compare materials' ) ) . '"></label><p class="description">Edit the three column headings to suit this article.</p><div class="ab-admin-column-headings">';
    $comparison_header_labels = array( 'material' => 'Column 1 heading', 'best_for' => 'Column 2 heading', 'consideration' => 'Column 3 heading' );
    foreach ( $comparison_headers as $key => $value ) { echo '<label>' . esc_html( $comparison_header_labels[ $key ] ) . '<input class="regular-text" name="abk_comparison_header_' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '"></label>'; }
    echo '</div>';
    ab_render_repeater( 'abk_comparison_rows_json', $fields['comparison'], 'Comparison rows', array( 'material' => 'Material / option', 'best_for' => 'Typical fit', 'consideration' => 'Key consideration' ), 'Add comparison row' );
    ab_render_knowledge_section_note( $post->ID, 'abk_note_comparison' );
    echo '</section>';
    echo '<section><h3>Why materials differ</h3><label class="ab-admin-full"><strong>Section heading</strong><input class="large-text" name="abk_heading_why" value="' . esc_attr( ab_knowledge_meta_default( $post->ID, 'abk_heading_why', 'Why materials differ' ) ) . '"></label><p class="description">Use the rich text controls for inline links and formatting.</p>';
    ab_render_rich_field( 'abk_why', 'abk_why', $fields['why'] );
    ab_render_knowledge_section_note( $post->ID, 'abk_note_why' );
    echo '</section>';
    echo '<section><h3>When to consider</h3><label class="ab-admin-full"><strong>Section heading</strong><input class="large-text" name="abk_heading_when" value="' . esc_attr( ab_knowledge_meta_default( $post->ID, 'abk_heading_when', 'When to consider each material' ) ) . '"></label>';
    ab_render_repeater( 'abk_when_rows_json', $fields['when'], 'Selection guidance', array( 'material' => 'Material / situation', 'detail' => 'When to consider it' ), 'Add consideration' );
    ab_render_knowledge_section_note( $post->ID, 'abk_note_when' );
    echo '</section>';
    echo '<section><h3>Frequently asked questions</h3><label class="ab-admin-full"><strong>Section heading</strong><input class="large-text" name="abk_heading_faqs" value="' . esc_attr( ab_knowledge_meta_default( $post->ID, 'abk_heading_faqs', 'Frequently asked questions' ) ) . '"></label>';
    ab_render_repeater( 'abk_faqs_json', $fields['faqs'], 'Questions & answers', array( 'question' => 'Question', 'answer' => 'Answer (links supported)' ), 'Add FAQ' );
    ab_render_knowledge_section_note( $post->ID, 'abk_note_faqs' );
    echo '</section>';
    echo '<section><h3>Related materials</h3><label class="ab-admin-full"><strong>Section heading</strong><input class="large-text" name="abk_heading_related" value="' . esc_attr( ab_knowledge_meta_default( $post->ID, 'abk_heading_related', 'Related materials' ) ) . '"></label>';
    ab_render_repeater( 'abk_related_links_json', $fields['related'], 'Related product / material links', array( 'label' => 'Link label', 'url' => 'Full URL or site path' ), 'Add related link' );
    ab_render_knowledge_section_note( $post->ID, 'abk_note_related' );
    echo '</section>';
    echo '<section class="ab-editor-note"><h3>Extra article sections</h3><p>For any additional content, use the standard WordPress block editor for this article. Click the <strong>＋</strong> inserter to add a heading, rich text/links, image, list, quote, table, or group. That content appears after “Why materials differ” and before “When to consider”.</p></section>';
    ab_render_knowledge_section_note( $post->ID, 'abk_note_article_content' );
    echo '<section><h3>Enquiry call-to-action</h3><p class="description">A premium article-end contact panel. Keep the kicker blank to omit it; write the heading and button text for this article.</p><label class="ab-admin-full">Optional kicker<br><input class="large-text" name="abk_cta_kicker" value="' . esc_attr( get_post_meta( $post->ID, 'abk_cta_kicker', true ) ) . '"></label><p><label><strong>CTA heading</strong><br><input class="large-text" name="abk_cta_title" value="' . esc_attr( ab_knowledge_meta_default( $post->ID, 'abk_cta_title', 'Let’s discuss your material requirement.' ) ) . '"></label></p><p><label><strong>CTA text</strong><br><textarea class="large-text" rows="3" name="abk_cta_text">' . esc_textarea( ab_knowledge_meta_default( $post->ID, 'abk_cta_text', 'Share your process, application and target specification. We’ll help you frame the next step.' ) ) . '</textarea></label></p><p><label><strong>Button text</strong><br><input class="regular-text" name="abk_cta_label" value="' . esc_attr( ab_knowledge_meta_default( $post->ID, 'abk_cta_label', 'Start a material conversation' ) ) . '"></label></p><p><label><strong>Button URL</strong><br><input class="large-text" name="abk_cta_url" value="' . esc_attr( ab_knowledge_meta_default( $post->ID, 'abk_cta_url', '/#quick-enquiry' ) ) . '" placeholder="/#quick-enquiry"></label></p>';
    ab_render_knowledge_section_note( $post->ID, 'abk_note_cta' );
    echo '</section>';
    echo '</div>';
}
function ab_render_knowledge_section_note( $post_id, $meta_key ) {
    $value = get_post_meta( $post_id, $meta_key, true );
    $heading_key = $meta_key . '_heading';
    $heading = get_post_meta( $post_id, $heading_key, true );
    $has_note = is_string( $value ) && '' !== trim( wp_strip_all_tags( $value ) );
    $has_heading = is_string( $heading ) && '' !== trim( $heading );
    $has_value = $has_note || $has_heading;
    $state_class = $has_value ? ' is-enabled' : '';
    $expanded = $has_value ? 'true' : 'false';
    $button_label = $has_value ? 'Hide note editor' : '+ Add optional note / disclaimer';

    echo '<div class="ab-admin-section-note' . esc_attr( $state_class ) . '" data-section-note>';
    echo '<button type="button" class="button button-secondary ab-section-note-toggle" data-section-note-toggle aria-expanded="' . esc_attr( $expanded ) . '">' . esc_html( $button_label ) . '</button>';
    echo '<div class="ab-admin-section-note-editor"' . ( $has_value ? '' : ' hidden' ) . '>';
    echo '<h4>Optional paragraph after this section</h4><p class="description">Add a paragraph only where needed. You can label it Important, Disclaimer, or with your own heading. Leave the heading blank to show the paragraph without a heading.</p>';
    echo '<p><label class="ab-admin-full"><strong>Heading (optional)</strong><input class="large-text" type="text" name="' . esc_attr( $heading_key ) . '" value="' . esc_attr( $heading ) . '" placeholder="Important, Disclaimer, or your own heading"></label></p>';
    ab_render_rich_field( $meta_key, $meta_key, $value );
    echo '</div></div>';
}
function ab_knowledge_meta_default( $post_id, $key, $default = '' ) {
    return metadata_exists( 'post', $post_id, $key ) ? (string) get_post_meta( $post_id, $key, true ) : $default;
}
function ab_admin_rich_content( $content ) {
    $content = (string) $content;
    return preg_match( '/<[^>]+>/', $content ) ? wp_kses_post( $content ) : wpautop( esc_html( $content ) );
}
function ab_rich_toolbar_html() {
    return '<div class="ab-rich-toolbar" role="toolbar" aria-label="Text formatting"><button type="button" class="button" data-rich-command="bold" aria-label="Bold"><strong>B</strong></button><button type="button" class="button" data-rich-command="italic" aria-label="Italic"><em>I</em></button><button type="button" class="button" data-rich-command="insertUnorderedList" aria-label="Bulleted list">• List</button><button type="button" class="button" data-rich-command="link" aria-label="Insert link">↗ Link</button></div>';
}
function ab_render_rich_field( $id, $name, $content ) {
    echo '<div class="ab-admin-rich-field">' . ab_rich_toolbar_html() . '<div id="' . esc_attr( $id ) . '_visual" class="ab-rich-editable" contenteditable="true" data-rich-field="' . esc_attr( $id ) . '" role="textbox" aria-multiline="true">' . ab_admin_rich_content( $content ) . '</div><textarea hidden name="' . esc_attr( $name ) . '" data-rich-output="' . esc_attr( $id ) . '">' . esc_textarea( $content ) . '</textarea></div>';
}
function ab_knowledge_help_metabox() {
    echo '<p><strong>Article workflow</strong></p><ol><li>Set the custom URL slug and featured image.</li><li>Choose the material and topic terms.</li><li>Write your sections and customize their headings and comparison columns.</li><li>Use the standard WordPress block editor for any extra headings, text, links, images, lists, quotes, or tables.</li></ol><p>Featured images appear in the hub cards and article header. Article URLs remain <code>/knowledge/your-slug/</code>.</p>';
}
function ab_render_repeater( $name, $rows, $label, $columns, $button ) {
    if ( ! is_array( $rows ) ) { $rows = array(); }
    $serialized = wp_json_encode( array_values( $rows ) );
    echo '<section class="ab-admin-repeater" data-repeater data-fields="' . esc_attr( wp_json_encode( array_keys( $columns ) ) ) . '"><h3>' . esc_html( $label ) . '</h3><textarea class="ab-repeater-json" name="' . esc_attr( $name ) . '" hidden>' . esc_textarea( $serialized ) . '</textarea><div class="ab-repeater-rows" data-rows>';
    foreach ( array_values( $rows ) as $row ) {
        echo '<div class="ab-repeater-row" data-row>';
        foreach ( $columns as $key => $caption ) {
            $value = isset( $row[ $key ] ) ? $row[ $key ] : '';
            if ( in_array( $key, array( 'answer', 'detail' ), true ) ) {
                echo '<div class="ab-repeater-rich"><span class="ab-admin-field-title">' . esc_html( $caption ) . '</span>' . ab_rich_toolbar_html() . '<div class="ab-rich-editable" contenteditable="true" data-field="' . esc_attr( $key ) . '" role="textbox" aria-multiline="true">' . ab_admin_rich_content( $value ) . '</div></div>';
            } else {
                echo '<label>' . esc_html( $caption ) . '<textarea data-field="' . esc_attr( $key ) . '" rows="2">' . esc_textarea( $value ) . '</textarea></label>';
            }
        }
        echo '<button type="button" class="button-link-delete" data-remove>Remove row</button></div>';
    }
    echo '</div><button type="button" class="button button-secondary" data-add>' . esc_html( $button ) . '</button></section>';
}



/**
 * Decode and sanitize repeater rows submitted by the Knowledge Article builder.
 * This helper is shared by Page FAQs and Knowledge Article comparison, selection,
 * FAQ, and related-link fields. Rich answer/detail fields retain safe post HTML.
 */
function ab_decode_rows( $field_name, $allowed_fields ) {
    if ( ! isset( $_POST[ $field_name ] ) || ! is_scalar( $_POST[ $field_name ] ) ) {
        return array();
    }

    $raw_rows = wp_unslash( (string) $_POST[ $field_name ] );
    $decoded = json_decode( $raw_rows, true );
    if ( ! is_array( $decoded ) ) {
        return array();
    }

    $rows = array();
    $rich_fields = array( 'answer', 'detail' );

    foreach ( $decoded as $row ) {
        if ( ! is_array( $row ) ) {
            continue;
        }

        $clean_row = array();
        $has_content = false;

        foreach ( $allowed_fields as $field ) {
            $value = isset( $row[ $field ] ) && is_scalar( $row[ $field ] )
                ? (string) $row[ $field ]
                : '';

            if ( in_array( $field, $rich_fields, true ) ) {
                $value = wp_kses_post( $value );
            } elseif ( 'url' === $field ) {
                // Preserve safe absolute URLs and internal paths such as /hdpe/ or /#quick-enquiry.
                $value = esc_url_raw( trim( $value ) );
            } else {
                $value = sanitize_text_field( $value );
            }

            $clean_row[ $field ] = $value;
            if ( '' !== trim( wp_strip_all_tags( $value ) ) ) {
                $has_content = true;
            }
        }

        if ( $has_content ) {
            $rows[] = $clean_row;
        }
    }

    return $rows;
}

add_action( 'save_post_page', 'ab_save_page_meta', 10, 2 );
function ab_save_page_meta( $post_id, $post ) {
    if ( ! isset( $_POST['ab_page_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ab_page_meta_nonce'] ) ), 'ab_page_meta_save' ) || ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_post', $post_id ) ) { return; }
    update_post_meta( $post_id, 'ab_meta_title', isset( $_POST['ab_meta_title'] ) ? sanitize_text_field( wp_unslash( $_POST['ab_meta_title'] ) ) : '' );
    update_post_meta( $post_id, 'ab_meta_description', isset( $_POST['ab_meta_description'] ) ? sanitize_textarea_field( wp_unslash( $_POST['ab_meta_description'] ) ) : '' );
    $allowed = array( 'WebPage', 'AboutPage', 'ContactPage', 'CollectionPage' );
    $schema = isset( $_POST['ab_schema_type'] ) ? sanitize_text_field( wp_unslash( $_POST['ab_schema_type'] ) ) : 'WebPage';
    update_post_meta( $post_id, 'ab_schema_type', in_array( $schema, $allowed, true ) ? $schema : 'WebPage' );
    $faqs = ab_decode_rows( 'ab_page_faqs_json', array( 'question', 'answer' ) );
    update_post_meta( $post_id, 'ab_page_faqs', $faqs );
}
add_action( 'save_post_knowledge', 'ab_save_knowledge_meta', 10, 2 );
function ab_save_knowledge_meta( $post_id, $post ) {
    if ( ! isset( $_POST['ab_knowledge_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ab_knowledge_nonce'] ) ), 'ab_knowledge_save' ) || ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_post', $post_id ) ) { return; }
    $slug = isset( $_POST['ab_knowledge_url'] ) ? sanitize_title( wp_unslash( $_POST['ab_knowledge_url'] ) ) : '';
    update_post_meta( $post_id, 'ab_knowledge_url', $slug );
    if ( $slug && $post->post_name !== $slug && ! get_post_meta( $post_id, '_ab_syncing_slug', true ) ) {
        update_post_meta( $post_id, '_ab_syncing_slug', 1 );
        wp_update_post( array( 'ID' => $post_id, 'post_name' => $slug ) );
        delete_post_meta( $post_id, '_ab_syncing_slug' );
    }
    update_post_meta( $post_id, 'ab_meta_title', isset( $_POST['ab_meta_title'] ) ? sanitize_text_field( wp_unslash( $_POST['ab_meta_title'] ) ) : '' );
    update_post_meta( $post_id, 'ab_meta_description', isset( $_POST['ab_meta_description'] ) ? sanitize_textarea_field( wp_unslash( $_POST['ab_meta_description'] ) ) : '' );
    update_post_meta( $post_id, 'abk_direct_answer', isset( $_POST['abk_direct_answer'] ) ? wp_kses_post( wp_unslash( $_POST['abk_direct_answer'] ) ) : '' );
    update_post_meta( $post_id, 'abk_why', isset( $_POST['abk_why'] ) ? wp_kses_post( wp_unslash( $_POST['abk_why'] ) ) : '' );
    foreach ( array( 'abk_heading_direct', 'abk_heading_comparison', 'abk_heading_why', 'abk_heading_when', 'abk_heading_faqs', 'abk_heading_related', 'abk_comparison_header_material', 'abk_comparison_header_best_for', 'abk_comparison_header_consideration', 'abk_cta_title', 'abk_cta_kicker', 'abk_cta_label' ) as $key ) {
        update_post_meta( $post_id, $key, isset( $_POST[ $key ] ) ? sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) : '' );
    }
    update_post_meta( $post_id, 'abk_cta_text', isset( $_POST['abk_cta_text'] ) ? sanitize_textarea_field( wp_unslash( $_POST['abk_cta_text'] ) ) : '' );
    update_post_meta( $post_id, 'abk_cta_url', isset( $_POST['abk_cta_url'] ) ? esc_url_raw( wp_unslash( $_POST['abk_cta_url'] ) ) : '' );
    update_post_meta( $post_id, 'abk_comparison_rows', ab_decode_rows( 'abk_comparison_rows_json', array( 'material', 'best_for', 'consideration' ) ) );
    update_post_meta( $post_id, 'abk_when_rows', ab_decode_rows( 'abk_when_rows_json', array( 'material', 'detail' ) ) );
    update_post_meta( $post_id, 'abk_faqs', ab_decode_rows( 'abk_faqs_json', array( 'question', 'answer' ) ) );
    update_post_meta( $post_id, 'abk_related_links', ab_decode_rows( 'abk_related_links_json', array( 'label', 'url' ) ) );
    foreach ( array( 'abk_note_direct', 'abk_note_comparison', 'abk_note_why', 'abk_note_article_content', 'abk_note_when', 'abk_note_faqs', 'abk_note_related', 'abk_note_cta' ) as $note_key ) {
        if ( isset( $_POST[ $note_key ] ) && is_scalar( $_POST[ $note_key ] ) ) {
            update_post_meta( $post_id, $note_key, wp_kses_post( wp_unslash( $_POST[ $note_key ] ) ) );
        }
    }
    foreach ( array( 'abk_note_direct_heading', 'abk_note_comparison_heading', 'abk_note_why_heading', 'abk_note_article_content_heading', 'abk_note_when_heading', 'abk_note_faqs_heading', 'abk_note_related_heading', 'abk_note_cta_heading' ) as $note_heading_key ) {
        update_post_meta( $post_id, $note_heading_key, isset( $_POST[ $note_heading_key ] ) ? sanitize_text_field( wp_unslash( $_POST[ $note_heading_key ] ) ) : '' );
    }
}
add_action( 'admin_enqueue_scripts', 'ab_knowledge_admin_assets' );
function ab_knowledge_admin_assets( $hook ) {
    if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) { return; }
    $screen = get_current_screen();
    if ( ! $screen || ! in_array( $screen->post_type, array( 'knowledge', 'page' ), true ) ) { return; }
    wp_enqueue_style( 'ab-admin-knowledge', get_template_directory_uri() . '/assets/css/knowledge-admin.css', array(), AB_THEME_VERSION );
    wp_enqueue_script( 'ab-admin-knowledge', get_template_directory_uri() . '/assets/js/knowledge-admin.js', array(), AB_THEME_VERSION, true );
}

/** Editable SEO fields for the Knowledge Center archive (the archive is not a native Page). */
add_action( 'admin_menu', 'ab_knowledge_seo_menu' );
function ab_knowledge_seo_menu() {
    add_submenu_page( 'edit.php?post_type=knowledge', 'Knowledge Center SEO', 'Hub SEO', 'manage_options', 'ab-knowledge-seo', 'ab_knowledge_seo_settings_page' );
}
add_action( 'admin_init', 'ab_register_knowledge_seo_settings' );
function ab_register_knowledge_seo_settings() {
    register_setting( 'ab_knowledge_seo', 'ab_knowledge_archive_title', array( 'sanitize_callback' => 'sanitize_text_field' ) );
    register_setting( 'ab_knowledge_seo', 'ab_knowledge_archive_description', array( 'sanitize_callback' => 'sanitize_textarea_field' ) );
}
function ab_knowledge_seo_settings_page() {
    if ( ! current_user_can( 'manage_options' ) ) { return; }
    echo '<div class="wrap"><h1>Knowledge Center archive SEO</h1><p>Set the metadata and CollectionPage schema values for <code>/knowledge/</code>.</p><form method="post" action="options.php">';
    settings_fields( 'ab_knowledge_seo' );
    echo '<table class="form-table"><tr><th><label for="ab_knowledge_archive_title">SEO title</label></th><td><input class="large-text" id="ab_knowledge_archive_title" name="ab_knowledge_archive_title" maxlength="255" value="' . esc_attr( ab_knowledge_archive_title() ) . '"></td></tr><tr><th><label for="ab_knowledge_archive_description">Meta description</label></th><td><textarea class="large-text" rows="3" id="ab_knowledge_archive_description" name="ab_knowledge_archive_description" maxlength="320">' . esc_textarea( ab_knowledge_archive_description() ) . '</textarea></td></tr></table>';
    submit_button();
    echo '</form></div>';
}

/** Native enquiry handlers used by both supplied page forms. */
add_action( 'admin_post_nopriv_ab_material_enquiry', 'ab_handle_material_enquiry' );
add_action( 'admin_post_ab_material_enquiry', 'ab_handle_material_enquiry' );
function ab_handle_material_enquiry() {
    $kind = isset( $_POST['enquiry_kind'] ) && is_scalar( $_POST['enquiry_kind'] ) ? sanitize_key( wp_unslash( $_POST['enquiry_kind'] ) ) : 'general';
    $material_kinds = array( 'hdpe', 'abs', 'eva', 'ldpe', 'pp', 'ps', 'pvc', 'recycled-plastics', 'recycled_plastics', 'material' );
    $is_material = in_array( $kind, $material_kinds, true ) || ( isset( $_POST['requirement'] ) && ! isset( $_POST['message'] ) );
    $fallback_slug = ( $is_material && 'material' !== $kind ) ? '/' . str_replace( '_', '-', $kind ) . '/' : '/';
    $fallback = home_url( $fallback_slug );
    $referer = wp_get_referer();
    $redirect = wp_validate_redirect( $referer ? $referer : $fallback, $fallback );
    $result = 'error';
    if ( isset( $_POST['ab_material_enquiry_nonce'] ) && is_scalar( $_POST['ab_material_enquiry_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ab_material_enquiry_nonce'] ) ), 'ab_material_enquiry' ) && ( ! isset( $_POST['ab_website'] ) || ( is_scalar( $_POST['ab_website'] ) && '' === (string) $_POST['ab_website'] ) ) ) {
        $name = isset( $_POST['name'] ) && is_scalar( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
        $email = isset( $_POST['email'] ) && is_scalar( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
        $required_key = $is_material ? 'requirement' : 'message';
        $required = isset( $_POST[ $required_key ] ) && is_scalar( $_POST[ $required_key ] ) ? sanitize_textarea_field( wp_unslash( $_POST[ $required_key ] ) ) : '';
        if ( ! $name || ! is_email( $email ) || ! $required ) {
            $result = 'missing';
        } else {
            $labels = array(
                'company' => 'Company', 'topic' => 'Material / topic', 'material_type' => 'Material type', 'processing_method' => 'Processing method', 'manufacturer' => 'Manufacturer / source', 'grade' => 'Grade', 'form' => 'Form', 'color' => 'Color', 'quantity' => 'Quantity', 'destination' => 'Destination', 'requirement' => 'Requirement', 'pack_size' => 'Pack size', 'frequency' => 'Frequency', 'delivery_date' => 'Required delivery date', 'documents' => 'Documents needed', 'notes' => 'Additional notes', 'message' => 'Message',
            );
            $lines = array( 'Name: ' . $name, 'Email: ' . $email );
            foreach ( $labels as $field => $label ) { if ( isset( $_POST[ $field ] ) && is_scalar( $_POST[ $field ] ) && '' !== (string) $_POST[ $field ] ) { $lines[] = $label . ': ' . sanitize_textarea_field( wp_unslash( $_POST[ $field ] ) ); } }
            $attachments = array();
            if ( $is_material && isset( $_FILES['datasheet'] ) && is_array( $_FILES['datasheet'] ) ) {
                $file = $_FILES['datasheet'];
                $upload_error = isset( $file['error'] ) && is_scalar( $file['error'] ) ? (int) $file['error'] : UPLOAD_ERR_NO_FILE;
                if ( UPLOAD_ERR_NO_FILE !== $upload_error ) {
                    $file_size = isset( $file['size'] ) && is_scalar( $file['size'] ) ? (int) $file['size'] : 0;
                    $file_tmp = isset( $file['tmp_name'] ) && is_scalar( $file['tmp_name'] ) ? $file['tmp_name'] : '';
                    $file_name = isset( $file['name'] ) && is_scalar( $file['name'] ) ? $file['name'] : '';
                    $allowed = array( 'pdf' => 'application/pdf', 'doc' => 'application/msword', 'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'xls' => 'application/vnd.ms-excel', 'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'csv' => 'text/csv', 'jpg|jpeg|jpe' => 'image/jpeg', 'png' => 'image/png' );
                    $checked = ( UPLOAD_ERR_OK === $upload_error && $file_size > 0 && $file_size <= 5 * MB_IN_BYTES && $file_tmp && $file_name ) ? wp_check_filetype_and_ext( $file_tmp, $file_name, $allowed ) : array();
                    if ( empty( $checked['type'] ) || ! is_uploaded_file( $file_tmp ) ) { ab_enquiry_redirect( $redirect, 'error', $is_material ); }
                    $attachments[] = $file_tmp;
                    $lines[] = 'Attached file: ' . sanitize_file_name( $file_name );
                }
            }
            $tag = $is_material ? strtoupper( str_replace( array( '-', '_' ), ' ', $kind ) ) : 'Website';
            $subject = sprintf( '[%s] Material enquiry from %s', $tag, $name );
            $headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );
            $sent = wp_mail( get_option( 'admin_email' ), $subject, implode( "\n", $lines ), $headers, $attachments );
            if ( $sent ) { $result = 'sent'; }
        }
    }
    ab_enquiry_redirect( $redirect, $result, $is_material );
}
function ab_enquiry_redirect( $url, $result, $is_hdpe ) {
    $url = remove_query_arg( 'ab_enquiry', $url );
    $url = add_query_arg( 'ab_enquiry', $result, $url );
    $url .= $is_hdpe ? '#primary-enquiry' : '#quick-enquiry';
    wp_safe_redirect( $url );
    exit;
}

/** SEO title, description and JSON-LD. An SEO plugin remains the single owner when installed. */
function ab_has_seo_plugin() {
    return defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'AIOSEO_VERSION' ) || function_exists( 'aioseo' );
}
add_filter( 'pre_get_document_title', 'ab_filter_document_title', 20 );
function ab_knowledge_archive_title() {
    return get_option( 'ab_knowledge_archive_title', 'Knowledge Center | Polymer Materials & Supply Guidance | Abiroverseas' );
}
function ab_knowledge_archive_description() {
    return get_option( 'ab_knowledge_archive_description', 'Search practical polymer material guides, comparisons, processing notes and FAQs by material, product type or topic.' );
}
function ab_filter_document_title( $title ) {
    if ( is_post_type_archive( 'knowledge' ) ) { return ab_knowledge_archive_title() ?: $title; }
    if ( ab_has_seo_plugin() || ! is_singular() ) { return $title; }
    $custom = get_post_meta( get_queried_object_id(), 'ab_meta_title', true );
    return $custom ? $custom : $title;
}
function ab_plugin_seo_title( $title ) {
    if ( is_post_type_archive( 'knowledge' ) ) { return ab_knowledge_archive_title() ?: $title; }
    if ( ! is_singular() ) { return $title; }
    $custom = get_post_meta( get_queried_object_id(), 'ab_meta_title', true );
    return $custom ? $custom : $title;
}
function ab_plugin_seo_description( $description ) {
    if ( is_post_type_archive( 'knowledge' ) ) { return ab_knowledge_archive_description() ?: $description; }
    if ( ! is_singular() ) { return $description; }
    $custom = get_post_meta( get_queried_object_id(), 'ab_meta_description', true );
    return $custom ? $custom : $description;
}
add_filter( 'wpseo_title', 'ab_plugin_seo_title' );
add_filter( 'wpseo_metadesc', 'ab_plugin_seo_description' );
add_filter( 'rank_math/frontend/title', 'ab_plugin_seo_title' );
add_filter( 'rank_math/frontend/description', 'ab_plugin_seo_description' );
add_filter( 'aioseo_title', 'ab_plugin_seo_title' );
add_filter( 'aioseo_description', 'ab_plugin_seo_description' );
add_action( 'wp_head', 'ab_output_seo_and_schema', 3 );
function ab_output_seo_and_schema() {
    if ( ab_has_seo_plugin() ) {
        if ( ! is_singular( array( 'page', 'knowledge' ) ) ) { return; }
        $plugin_post_id = get_queried_object_id();
        $plugin_faqs = 'knowledge' === get_post_type( $plugin_post_id ) ? get_post_meta( $plugin_post_id, 'abk_faqs', true ) : get_post_meta( $plugin_post_id, 'ab_page_faqs', true );
        $plugin_entities = array();
        if ( is_array( $plugin_faqs ) ) {
            foreach ( $plugin_faqs as $faq ) {
                $q = isset( $faq['question'] ) ? trim( wp_strip_all_tags( $faq['question'] ) ) : '';
                $a = isset( $faq['answer'] ) ? trim( wp_strip_all_tags( $faq['answer'] ) ) : '';
                if ( $q && $a ) { $plugin_entities[] = array( '@type' => 'Question', 'name' => $q, 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $a ) ); }
            }
        }
        if ( $plugin_entities ) {
            $plugin_faq_schema = array( '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $plugin_entities );
            echo '<script type="application/ld+json">' . wp_json_encode( $plugin_faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT ) . '</script>' . "\n";
        }
        return;
    }
    if ( is_post_type_archive( 'knowledge' ) ) {
        $url = get_post_type_archive_link( 'knowledge' );
        $title = ab_knowledge_archive_title();
        $description = ab_knowledge_archive_description();
        echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
        $schema = array( '@context' => 'https://schema.org', '@type' => 'CollectionPage', 'name' => $title, 'description' => $description, 'url' => $url, 'isPartOf' => array( '@type' => 'WebSite', 'name' => get_bloginfo( 'name' ), 'url' => home_url( '/' ) ) );
        echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT ) . '</script>' . "\n";
        return;
    }
    if ( is_tax( array( 'knowledge_hub', 'knowledge_material', 'knowledge_topic' ) ) ) {
        $term = get_queried_object();
        $name = $term && isset( $term->name ) ? $term->name : 'Knowledge Center';
        $description = $term && isset( $term->description ) ? wp_strip_all_tags( $term->description ) : '';
        if ( ! $description ) { $description = 'Knowledge Center resources and material guidance for ' . $name . '.'; }
        $title = $name . ' | Knowledge Center | Abiroverseas';
        echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
        $schema = array( '@context' => 'https://schema.org', '@type' => 'CollectionPage', 'name' => $title, 'description' => $description, 'url' => get_term_link( $term ), 'isPartOf' => array( '@type' => 'WebSite', 'name' => get_bloginfo( 'name' ), 'url' => home_url( '/' ) ) );
        echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT ) . '</script>' . "\n";
        return;
    }
    if ( ! is_singular( array( 'page', 'knowledge' ) ) ) { return; }
    $id = get_queried_object_id();
    $description = get_post_meta( $id, 'ab_meta_description', true );
    if ( $description ) { echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n"; }
    $title = get_post_meta( $id, 'ab_meta_title', true );
    if ( ! $title ) { $title = get_the_title( $id ); }
    $page_description = $description ? $description : wp_strip_all_tags( get_the_excerpt( $id ) );
    if ( 'knowledge' === get_post_type( $id ) ) {
        $page_schema = array( '@type' => 'Article', 'headline' => $title, 'description' => $page_description, 'mainEntityOfPage' => get_permalink( $id ), 'datePublished' => get_the_date( DATE_W3C, $id ), 'dateModified' => get_the_modified_date( DATE_W3C, $id ), 'author' => array( '@type' => 'Organization', 'name' => get_bloginfo( 'name' ) ), 'publisher' => array( '@type' => 'Organization', 'name' => get_bloginfo( 'name' ) ) );
        if ( has_post_thumbnail( $id ) ) { $page_schema['image'] = array( get_the_post_thumbnail_url( $id, 'full' ) ); }
        $faqs = get_post_meta( $id, 'abk_faqs', true );
    } else {
        $type = get_post_meta( $id, 'ab_schema_type', true );
        $page_schema = array( '@type' => $type ? $type : 'WebPage', 'name' => $title, 'description' => $page_description, 'url' => get_permalink( $id ), 'isPartOf' => array( '@type' => 'WebSite', 'name' => get_bloginfo( 'name' ), 'url' => home_url( '/' ) ) );
        $faqs = get_post_meta( $id, 'ab_page_faqs', true );
    }
    $graph = array( $page_schema );
    if ( is_array( $faqs ) && $faqs ) {
        $entities = array();
        foreach ( $faqs as $faq ) {
            $q = isset( $faq['question'] ) ? trim( wp_strip_all_tags( $faq['question'] ) ) : '';
            $a = isset( $faq['answer'] ) ? trim( wp_strip_all_tags( $faq['answer'] ) ) : '';
            if ( $q && $a ) { $entities[] = array( '@type' => 'Question', 'name' => $q, 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $a ) ); }
        }
        if ( $entities ) { $graph[] = array( '@type' => 'FAQPage', 'mainEntity' => $entities ); }
    }
    $schema = array( '@context' => 'https://schema.org', '@graph' => $graph );
    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT ) . '</script>' . "\n";
}

/** Convert author-provided internal site paths to absolute, safe home URLs. */
function ab_home_anchor_url( $id ) {
    $id = sanitize_html_class( $id );
    return is_front_page() ? '#' . $id : home_url( '/#' . $id );
}
function ab_content_url( $url ) {
    $url = trim( (string) $url );
    if ( '' === $url ) { return ''; }
    if ( 0 === strpos( $url, '/' ) ) { return home_url( $url ); }
    return esc_url_raw( $url );
}
function ab_knowledge_article_url( $slug ) {
    $article = get_page_by_path( sanitize_title( $slug ), OBJECT, 'knowledge' );
    if ( $article && 'publish' === $article->post_status ) { return get_permalink( $article ); }
    $archive = get_post_type_archive_link( 'knowledge' );
    return $archive ? $archive : home_url( '/knowledge/' );
}