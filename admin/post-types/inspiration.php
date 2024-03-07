<?php
$labels = [
    'name' => 'Inspirations',
    'singular_name' => 'Inspiration',
    'add_new' => 'Ajouter une inspiration',
    'add_new_item' => 'Ajouter une inspiration',
    'edit_item' => 'Modifier une inspiration',
    'new_item' => 'Nouvelle inspiration',
    'view_item' => 'Voir l\'inspiration',
    'search_items' => 'Rechercher une inspiration',
    'not_found' =>  'Pas d\'inspiration trouvée.',
    'all_items' => 'Toutes les inspirations',
    'not_found_in_trash' => 'Pas d\'inspiration trouvée dans la corbeille.',
    'parent_item_colon' => ''
];

$args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_rest' => true,
    'query_var' => false,
    'hierarchical' => true,
    'capability_type' => 'page',
    'supports' => [
        'title',
        'thumbnail',
        'custom-fields',
    ],
    'taxonomies' => [],
    'has_archive' => true,
    'rewrite' => ['slug' => 'inspirations', 'with_front' => true],
    'menu_position' => 20,
    'menu_icon' => 'dashicons-search',
];

register_post_type('gypass_inspiration', $args);
