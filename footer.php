</main>

<!-- Footer -->
<?php $locations = get_nav_menu_locations();
$logo_alt = get_field('footer_logo_alt', 'option'); ?>

<footer id="footer">
    <div id="main-footer">
        <div class="container">
            <div class="informations">
                <?php
                if (!empty($logo_alt)) : ?>
                    <a href="<?php echo get_home_url(); ?>" class="custom-logo-link" rel="home" aria-current="page">
                        <img src="<?php echo esc_url($logo_alt['url']); ?>" alt="<?php echo esc_attr($logo_alt['alt']); ?>" class="custom-logo">
                    </a>
                    <?php else :
                    if (function_exists('the_custom_logo')) :
                        if (has_custom_logo()) :
                            the_custom_logo();
                        else : ?>
                            <a href="<?php echo site_url(); ?>" class="custom-logo-link h5-size">
                                <?php echo get_bloginfo(); ?>
                            </a>
                <?php endif;
                    endif;
                endif;
                ?>
                <?php if (have_rows('footer_socials', 'option')) : ?>
                    <div class="socials">
                        <?php while (have_rows('footer_socials', 'option')) : the_row();
                            $icon = get_sub_field('icon');
                            $url = get_sub_field('other') ?: get_sub_field('url'); ?>
                            <a href="<?php echo $url; ?>" target="_blank" class="social">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/socials/<?php echo $icon; ?>.svg" alt="<?php echo $icon; ?>">
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="menus">
                <?php if (has_nav_menu('main-footer-menu-1')) : ?>
                    <div class="menu menu-main-footer">
                        <h3 class="h5-size"><?php echo wp_get_nav_menu_object($locations['main-footer-menu-1'])->name; ?></h3>
                        <?php wp_nav_menu(array('theme_location' => 'main-footer-menu-1', 'container' => false, 'depth' => 1)); ?>
                    </div>
                <?php endif; ?>
                <?php if (has_nav_menu('main-footer-menu-2')) : ?>
                    <div class="menu menu-main-footer">
                        <h3 class="h5-size"><?php echo wp_get_nav_menu_object($locations['main-footer-menu-2'])->name; ?></h3>
                        <?php wp_nav_menu(array('theme_location' => 'main-footer-menu-2', 'container' => false, 'depth' => 1)); ?>
                    </div>
                <?php endif; ?>
                <?php if (has_nav_menu('main-footer-menu-3')) : ?>
                    <div class="menu menu-main-footer">
                        <h3 class="h6-size"><?php echo wp_get_nav_menu_object($locations['main-footer-menu-3'])->name; ?></h3>
                        <?php wp_nav_menu(array('theme_location' => 'main-footer-menu-3', 'container' => false, 'depth' => 1)); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>