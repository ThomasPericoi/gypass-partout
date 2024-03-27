<?php
$labels = [
    'name' => 'Gammes',
    'singular_name' => 'Gamme',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter une gamme',
    'edit_item' => 'Modifier une gamme',
    'new_item' => 'Nouvelle gamme',
    'view_item' => 'Voir la gamme',
    'search_items' => 'Rechercher une gamme',
    'not_found' =>  'Pas de gamme trouvée.',
    'all_items' => 'Toutes les gammes',
    'not_found_in_trash' => 'Pas de gamme trouvée dans la corbeille.',
    'parent_item_colon' => ''
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
        'custom-fields',
    ],
    'taxonomies' => [],
    'has_archive' => true,
    'rewrite' => ['slug' => 'gammes/%gypass_range_product_family%', 'with_front' => true],
    'menu_position' => 20,
    'menu_icon' => 'dashicons-editor-contract',
];

register_post_type('gypass_range', $args);
