<?php

/* THEME SUPPORTS & OPTIONS
--------------------------------------------------------------- */

// Add theme supports
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('align-wide');
add_theme_support('editor-styles');
add_theme_support('custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array('site-title', 'site-description'),
));
add_theme_support(
    'html5',
    array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    )
);
add_theme_support('disable-custom-colors');
add_theme_support('disable-custom-font-sizes');

@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');

// Disable emojis
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emojis');

// Remove Wordpress version
function remove_wordpress_version()
{
    return '';
}
add_filter('the_generator', 'remove_wordpress_version');

// Hide Wordpress errors
function hide_wordpress_errors()
{
    return __('Une erreur est survenue !', 'gypass');
}
add_filter('login_errors', 'hide_wordpress_errors');

// Remove Wordpress admin bar
// add_filter('show_admin_bar', '__return_false');

// Add SVG support
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function add_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'add_mime_types');

function fix_svg_library()
{
    echo '
    <style type="text/css">
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'fix_svg_library');

// Add menus
function register_menus()
{
    register_nav_menus(
        array(
            'topbar-menu' => __('Barre supérieure', 'gypass'),
            'header-menu' => __('En-tête', 'gypass'),
            'footer-menu-1' => __('Pied de page 1', 'gypass'),
            'footer-menu-2' => __('Pied de page 2', 'gypass'),
            'footer-menu-3' => __('Pied de page 3', 'gypass'),
            'footer-menu-4' => __('Pied de page 4', 'gypass'),
            'footer-menu-5' => __('Pied de page 5', 'gypass'),
        )
    );
}
add_action('init', 'register_menus');

// Remove <p> and <br/> from Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

// Add ACF versioning
if (class_exists('ACF')) {
    function save_acf_groups_json($path)
    {
        $path = get_stylesheet_directory() . '/admin/acf-json';
        return $path;
    }
    add_filter('acf/settings/save_json', 'save_acf_groups_json');

    $field_groups = acf_get_local_field_groups();
    foreach ($field_groups as $field_group) {
        $key = $field_group['key'];
        if (acf_have_local_fields($key)) {
            $field_group['fields'] = acf_get_fields($key);
        }
        acf_write_json_field_group($field_group);
    }
}

function my_wp_nav_menu_objects($items, $args)
{
    foreach ($items as &$item) {
        $icon = get_field('icon', $item);
        if ($icon) {
            $item->title .= ' <img class="icon" src="' . $icon["url"] . '" alt="' . $icon["title"] . '" />';
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

/* INCLUDES
--------------------------------------------------------------- */

// Add PHP files
include_once('admin/admin.php');

// Add stylesheets
function enqueue_theme_stylesheets()
{
    if (!is_admin()) {
        wp_deregister_style('wp-block-library');
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('dashicons');
    }
    wp_register_style('reset', get_template_directory_uri() . '/assets/css/inc/reset.css', '', null, 'all');
    wp_register_style('wp-core', get_template_directory_uri() . '/assets/css/inc/wp-core.css', '', null, 'all');
    wp_register_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', '', null, 'all');
    wp_register_style('style', get_stylesheet_uri(), '', null, 'all');
    wp_enqueue_style('reset');
    wp_enqueue_style('wp-core');
    wp_enqueue_style('swiper');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'enqueue_theme_stylesheets');

// Add scripts
function enqueue_theme_scripts()
{
    wp_register_script('jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js', array(), false, true);
    wp_register_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), false, true);
    wp_register_script('usefool', get_template_directory_uri() . '/assets/js/usefool.js', array(), false, true);
    wp_register_script('ascii-printer', get_template_directory_uri() . '/assets/js/ascii-printer.js', array('usefool'), false, true);
    wp_register_script('script', get_template_directory_uri() . '/assets/js/main.js', array('jQuery', 'swiper', 'usefool', 'ascii-printer'), false, true);
    wp_enqueue_script('jQuery');
    wp_enqueue_script('swiper');
    wp_enqueue_script('usefool');
    wp_enqueue_script('ascii-printer');
    wp_enqueue_script('script');
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

/* WHITE LABEL
--------------------------------------------------------------- */

// Change login logo
function change_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url(<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/images/gypass-logo.svg);
            height: 65px;
            width: 320px;
            background-size: 320px 65px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'change_login_logo');

// Change admin bar logo
function change_admin_bar_logo()
{
    echo '
    <style type="text/css">
        #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
            background-image: url(' . get_bloginfo('stylesheet_directory') . '/assets/images/gypass-logo-condensed.svg) !important;
            background-position: 0 0;
            color:rgba(0, 0, 0, 0);
        }
        #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
            background-position: 0 0;
        }
    </style>
    ';
}
add_action('wp_before_admin_bar_render', 'change_admin_bar_logo');

// Change admin footer text
function change_admin_footer_text()
{
    echo __('Propulsé par <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Thème réalisé par <a href="https://www.thomaspericoi.com/" target="_blank">Thomas Pericoi</a> sous la supervision de <a href="https://www.red-agency.fr/" target="_blank">Red Agency</a></p>', 'gypass');
}
add_filter('admin_footer_text', 'change_admin_footer_text');

// Add admin widgets
function custom_dashboard_help()
{
    echo __('Ce thème est réalisé par <a href="https://www.thomaspericoi.com/" target="_blank">Thomas Pericoi</a> sous la supervision de <a href="https://www.red-agency.fr/" target="_blank">Red Agency</a>.</p>', 'gypass');
}

function add_admin_widgets()
{
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', __('Crédits', 'gypass'), 'custom_dashboard_help');
}
add_action('wp_dashboard_setup', 'add_admin_widgets');
