<?php
$labels = [
    'name' => 'Documents presse',
    'singular_name' => 'Document presse',
    'add_new' => 'Ajouter un document presse',
    'add_new_item' => 'Ajouter un document presse',
    'edit_item' => 'Modifier un document presse',
    'new_item' => 'Nouveau document presse',
    'view_item' => 'Voir le document presse',
    'view_items' => 'Voir les documents presse',
    'search_items' => 'Rechercher un document presse',
    'not_found' => 'Pas de document presse trouvé.',
    'all_items' => 'Tous les documents presse',
    'not_found_in_trash' => 'Pas de document presse trouvé dans la corbeille.',
    'parent_item_colon' => ''
];

$args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_rest' => true,
    'capability_type' => 'page',
    'supports' => [
        'title',
        'thumbnail',
        'custom-fields',
        'revisions',
    ],
    'taxonomies' => [],
    'has_archive' => true,
    'rewrite' => ['slug' => 'espace-presse', 'with_front' => true],
    'menu_position' => 20,
    'menu_icon' => 'dashicons-paperclip',
];

register_post_type('gypass_press', $args);
remove_rewrite_tag('%gypass_press_document%');
