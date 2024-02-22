<?php
$labels = [
    'name' => __('Samples', 'gypass'),
    'singular_name' => __('Sample', 'gypass'),
    'add_new' => __('Add', 'gypass'),
    'add_new_item' => __('Add a sample', 'gypass'),
    'edit_item' => __('Edit the sample', 'gypass'),
    'new_item' => __('New sample', 'gypass'),
    'view_item' => __('View the sample', 'gypass'),
    'search_items' => __('Search a sample', 'gypass'),
    'not_found' =>  __('No sample found.', 'gypass'),
    'all_items' => __('All sample', 'gypass'),
    'not_found_in_trash' => __('No sample found in the trash.', 'gypass'),
    'parent_item_colon' => __('', 'gypass'),
];

$args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_rest' => true,
    'query_var' => true,
    'hierarchical' => true,
    'capability_type' => 'page',
    'supports' => [
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
        'page-attributes'
    ],
    'taxonomies' => [],
    'has_archive' => false,
    'rewrite' => ['slug' => 'sample', 'with_front' => true],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-carrot',
];

register_post_type('sample', $args);
