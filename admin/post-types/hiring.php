<?php
$labels = [
    'name' => 'Recrutements',
    'singular_name' => 'Recrutement',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter un recrutement',
    'edit_item' => 'Modifier un recrutement',
    'new_item' => 'Nouveau recrutement',
    'view_item' => 'Voir le recrutement',
    'view_items' => 'Voir les recrutements',
    'search_items' => 'Rechercher un recrutement',
    'not_found' =>  'Pas de recrutement trouvé.',
    'all_items' => 'Tous les recrutements',
    'not_found_in_trash' => 'Pas de recrutement trouvé dans la corbeille.',
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
        'thumbnail',
        'custom-fields',
        'revisions',
    ],
    'taxonomies' => [],
    'has_archive' => true,
    'rewrite' => ['slug' => 'recrutement', 'with_front' => true],
    'menu_position' => 20,
    'menu_icon' => 'dashicons-businessman',
];

register_post_type('gypass_hiring', $args);
