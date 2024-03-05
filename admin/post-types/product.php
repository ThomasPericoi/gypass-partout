<?php
$labels = [
    'name' => 'Produits',
    'singular_name' => 'Produit',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter un produit',
    'edit_item' => 'Modifier un produit',
    'new_item' => 'Nouveau produit',
    'view_item' => 'Voir le produit',
    'search_items' => 'Rechercher un produit',
    'not_found' =>  'Pas de produit trouvé.',
    'all_items' => 'Tous les produits',
    'not_found_in_trash' => 'Pas de produit trouvé dans la corbeille.',
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
    'rewrite' => ['slug' => 'produits', 'with_front' => true],
    'menu_position' => 20,
    'menu_icon' => 'dashicons-cart',
];

register_post_type('gypass_product', $args);
