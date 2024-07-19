<?php
$labels = [
    'name' => 'Conseils & Astuces',
    'singular_name' => 'Conseil et Astuce',
    'add_new' => 'Ajouter un conseil et astuce',
    'add_new_item' => 'Ajouter un conseil et astuce',
    'edit_item' => 'Modifier un conseil et astuce',
    'new_item' => 'Nouveau conseil et astuce',
    'view_item' => 'Voir le conseil et astuce',
    'view_items' => 'Voir les conseils et astuces',
    'search_items' => 'Rechercher un conseil et astuce',
    'not_found' =>  'Pas de conseil et astuce trouvé.',
    'all_items' => 'Tous les conseils et astuces',
    'not_found_in_trash' => 'Pas de conseil et astuce trouvé dans la corbeille.',
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
    'capability_type' => 'post',
    'supports' => [
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
    ],
    'taxonomies' => [],
    'has_archive' => true,
    'rewrite' => ['slug' => 'conseils-astuces', 'with_front' => true],
    'menu_position' => 5,
    'menu_icon' => 'dashicons-thumbs-up',
];

register_post_type('gypass_tip_trick', $args);
