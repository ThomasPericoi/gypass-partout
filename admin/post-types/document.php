<?php
$labels = [
    'name' => 'Documents',
    'singular_name' => 'Document',
    'add_new' => 'Ajouter un document',
    'add_new_item' => 'Ajouter un document',
    'edit_item' => 'Modifier un document',
    'new_item' => 'Nouveau document',
    'view_item' => 'Voir le document',
    'view_items' => 'Voir les documents',
    'search_items' => 'Rechercher un document',
    'not_found' =>  'Pas de document trouvé.',
    'all_items' => 'Tous les documents',
    'not_found_in_trash' => 'Pas de document trouvé dans la corbeille.',
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
    ],
    'taxonomies' => [],
    'has_archive' => true,
    'rewrite' => ['slug' => 'nos-documents', 'with_front' => true],
    'menu_position' => 20,
    'menu_icon' => 'dashicons-paperclip',
];

register_post_type('gypass_document', $args);
remove_rewrite_tag('%gypass_document%');
