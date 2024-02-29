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
    $post_types = ["sample"];

    foreach ($post_types as $post_type) {
        include_once(__DIR__ . '/post-types/' . $post_type . '.php');
    }
}
add_action('init', 'register_custom_post_types');

// Add custom landing page taxonomy
function register_custom_taxonomy()
{
    register_taxonomy(
        'sample',
        array('post', 'page'),
        array(
            'label' => __('Sample taxonomy', 'gypass'),
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_admin_column' => true,
            'hierarchical' => true,
        )
    );
}
add_action('init', 'register_custom_taxonomy');

/* BLOCK(S)
--------------------------------------------------------------- */

// Register blocks
function register_acf_blocks()
{
    $blocks = ["content-2-columns"];

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
    remove_role('editor');
    remove_role('contributor');
    remove_role('author');
}
add_action('init', 'manage_user_roles');