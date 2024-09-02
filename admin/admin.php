<?php

/* OPTIONS PAGE(S)
--------------------------------------------------------------- */

// Add options page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => __('Options du thème Gypass', 'gypass'),
        'menu_title'    => __('Thème Gypass', 'gypass'),
        'menu_slug'     => 'options',
        'capability'    => 'edit_pages',
        'redirect'      => true,
        'position'      => 2,
        'update_button' => __('Mettre à jour', 'gypass'),
        'updated_message' => __('Tout est bon', 'gypass'),
        'icon_url'      => 'dashicons-admin-settings'
    ));
}

/* POST TYPE(S)
--------------------------------------------------------------- */

// Register post types
function register_custom_post_types()
{
    $post_types = ["document", "hiring", "inspiration", "product", "range", "tip-trick"];
    foreach ($post_types as $post_type) {
        include_once(__DIR__ . '/post-types/' . $post_type . '.php');
    }
}
add_action('init', 'register_custom_post_types');

// Register taxonomies
function register_custom_taxonomy()
{
    register_taxonomy(
        'gypass_document_type',
        array('gypass_document'),
        array(
            'label' => __('Types de documents', 'gypass'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'hierarchical' => true,
            'rewrite' => ['slug' => 'documents', 'with_front' => true],
        )
    );
    register_taxonomy(
        'gypass_inspi_product_family',
        array('gypass_inspiration'),
        array(
            'label' => __('Familles de produits', 'gypass'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'hierarchical' => true,
            'rewrite' => ['slug' => 'inspirations-types', 'with_front' => true],
        )
    );
    register_taxonomy(
        'gypass_product_product_family',
        array('gypass_product'),
        array(
            'label' => __('Familles de produits', 'gypass'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'hierarchical' => true,
            'rewrite' => ['slug' => 'familles-produits', 'with_front' => true],
        )
    );
    register_taxonomy(
        'gypass_range_product_family',
        array('gypass_range'),
        array(
            'label' => __('Familles de produits', 'gypass'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'hierarchical' => true,
            'rewrite' => ['slug' => 'gammes', 'with_front' => true],
        )
    );
    register_taxonomy(
        'gypass_trip_trick_product_family',
        array('gypass_tip_trick'),
        array(
            'label' => __('Familles de produits', 'gypass'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'hierarchical' => true,
            'rewrite' => ['slug' => 'conseils-astuces-types', 'with_front' => true],
        )
    );
}
add_action('init', 'register_custom_taxonomy');

// Redirect from tax to archive
function redirect_tax_archive($template)
{
    if (is_tax('gypass_document_type') && is_archive()) {
        $new_template = locate_template(array('archive-gypass_document.php'));
        if ('' != $new_template) {
            return $new_template;
        }
    }
    if (is_tax('gypass_inspi_product_family') && is_archive()) {
        $new_template = locate_template(array('archive-gypass_inspiration.php'));
        if ('' != $new_template) {
            return $new_template;
        }
    }
    if (is_tax('gypass_range_product_family') && is_archive()) {
        $new_template = locate_template(array('archive-gypass_range.php'));
        if ('' != $new_template) {
            return $new_template;
        }
    }
    if (is_tax('gypass_trip_trick_product_family') && is_archive()) {
        $new_template = locate_template(array('archive-gypass_tip_trick.php'));
        if ('' != $new_template) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'redirect_tax_archive');

// Redirect from single to cat
function redirect_single_cat($template)
{
    if (has_term('motorisations-domotique', 'gypass_product_product_family') && is_single()) {
        $new_template = locate_template(array('single-gypass_product-motorisation-domotique.php'));
        if ('' != $new_template) {
            return $new_template;
        }
    }
    if (has_term('motorisations-domotique', 'gypass_range_product_family') && is_single()) {
        $new_template = locate_template(array('single-gypass_range-motorisation-domotique.php'));
        if ('' != $new_template) {
            return $new_template;
        }
    }
    return $template;
}
add_filter("template_include", "redirect_single_cat");

// Rewrite URL for content types
function rewrite_post_type_permalink($post_link, $post)
{
    if (is_object($post) && $post->post_type == 'gypass_product') {
        $terms = wp_get_object_terms($post->ID, 'gypass_product_product_family');
        if ($terms) {
            return str_replace('%gypass_product_product_family%', $terms[0]->slug, $post_link);
        }
    }
    if (is_object($post) && $post->post_type == 'gypass_range') {
        $terms = wp_get_object_terms($post->ID, 'gypass_range_product_family');
        if ($terms) {
            return str_replace('%gypass_range_product_family%', $terms[0]->slug, $post_link);
        }
    }
    return $post_link;
}
add_filter('post_type_link', 'rewrite_post_type_permalink', 10, 2);

function enable_dynamic_rw_rules()
{
    $product_terms = get_terms(array(
        'taxonomy' => 'gypass_product_product_family',
        'hide_empty' => false,
    ));
    if (!empty($product_terms)) {
        foreach ($product_terms as $term) {
            add_rewrite_rule(
                '^' . $term->slug . '/(.*)/?$',
                'index.php?post_type=gypass_product&name=$matches[1]',
                'top'
            );
        }
    }
    $range_terms = get_terms(array(
        'taxonomy' => 'gypass_range_product_family',
        'hide_empty' => false,
    ));
    if (!empty($range_terms)) {
        foreach ($range_terms as $term) {
            add_rewrite_rule(
                '^' . $term->slug . '/(.*)/?$',
                'index.php?post_type=gypass_range&name=$matches[1]',
                'top'
            );
        }
    }
}
add_action('init', 'enable_dynamic_rw_rules');

/* BLOCK(S)
--------------------------------------------------------------- */

// Register blocks
function register_acf_blocks()
{
    $blocks = ["accordion-tabs", "accordion-tabs-crossed", "accordion-tabs-crossed-double", "accordion-tabs-crossed-double-special", "content-2-columns", "content-3-columns", "image-legend", "shades", "tooltip-double", "tooltip-simple", "tooltip-special", "video"];

    foreach ($blocks as $block) {
        register_block_type(__DIR__ . '/blocks/' . $block);
    }
}
add_action('init', 'register_acf_blocks');

// Register custom block category
function register_block_category($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'gypass-block',
                'title' => __('Gypass', 'gypass'),
            ),
        )
    );
}
add_filter('block_categories_all', 'register_block_category', 10, 2);

/* USER ROLE(S)
--------------------------------------------------------------- */

// Add and delete roles
function manage_user_roles()
{
    remove_role('subscriber');
    // remove_role('editor');
    remove_role('contributor');
    remove_role('author');
}
add_action('init', 'manage_user_roles');

/* COMMENTS
--------------------------------------------------------------- */

// Close comments on the front-end
function disable_comments_status()
{
    return false;
}
add_filter('comments_open', 'disable_comments_status', 20, 2);
add_filter('pings_open', 'disable_comments_status', 20, 2);

// Hide existing comments
function disable_comments_hide_existing_comments($comments)
{
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function disable_comments_admin_menu()
{
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'disable_comments_admin_menu');

// Redirect any user trying to access comments page
function disable_comments_admin_menu_redirect()
{
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
}
add_action('admin_init', 'disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function disable_comments_dashboard()
{
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'disable_comments_dashboard');

// Remove comments links from admin bar
function disable_comments_admin_bar()
{
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'disable_comments_admin_bar', 60);
    }
}
add_action('init', 'disable_comments_admin_bar');

// Disable support for comments and trackbacks in post types
function disable_comments_post_types_support()
{
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'disable_comments_post_types_support');
