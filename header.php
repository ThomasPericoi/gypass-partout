<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="inner-header">
                <?php
                if (function_exists('the_custom_logo')) :
                    if (has_custom_logo()) :
                        the_custom_logo();
                    else : ?>
                        <a href="<?php echo site_url(); ?>" class="custom-logo-link h5-size">
                            <?php echo get_bloginfo(); ?>
                        </a>
                <?php endif;
                endif; ?>
                <?php if (has_nav_menu('header-menu')) :
                    wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'menu menu-header', 'container' => false));
                endif; ?>
                <div class="menu-toggle-col">
                    <div class="menu-toggle-wrapper">
                        <input id="menu-toggle" class="js-toggleMenu" type="checkbox" role="button" tabindex="0" aria-label="Ouvrir le menu" />
                        <div class="menu-toggle-open" aria-hidden="true">
                            <span aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Menu Modal -->
    <div class="super-menu" aria-hidden="true" aria-modal="true" inert>
        <div class="super-menu-overlay"></div>
        <div class="super-menu-wrapper">
            <div class="container">
                <button class="js-toggleMenu menu-toggle-close" type="button">
                    <svg viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon">
                        <line fill="none" stroke="#fff" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line>
                        <line fill="none" stroke="#fff" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line>
                    </svg>
                </button>
                <?php wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'menu menu-header menu-header-mobile', 'container' => false)); ?>
            </div>
        </div>
    </div>

    <!-- Search Modal -->
    <div class="search-modal js-searchModal" aria-hidden="true" aria-modal="true" inert>
        <div class="container">
            <a class="btn-close js-toggleSearchModal" role="button" tabindex="0">
                <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/icons/cross.svg'); ?>
            </a>
            <?php get_search_form(); ?>
        </div>
    </div>

    <main aria-hidden="false">