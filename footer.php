</main>

<!-- Footer -->
<?php $locations = get_nav_menu_locations();
$logo_alt = get_field('footer_logo_alt', 'option'); ?>

<footer id="footer">
    <div id="reinsurance">
        <div class="container">
            <?php if (have_rows('footer_reinsurance', 'option')) : ?>
                <ul class="badges">
                    <?php while (have_rows('footer_reinsurance', 'option')) : the_row();
                        $badge = get_sub_field('badge');
                    ?>
                        <li class="badge">
                            <img src="<?php echo $badge["url"]; ?>" alt="<?php echo $badge["alt"]; ?>">
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
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
                <?php if (get_field("footer_description", "options")) : ?>
                    <div class="description">
                        <?php echo get_field("footer_description", "options"); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="menus">
                <?php if (has_nav_menu('footer-menu-1')) : ?>
                    <div class="menu menu-footer">
                        <h3 class="title"><?php echo wp_get_nav_menu_object($locations['footer-menu-1'])->name; ?></h3>
                        <?php wp_nav_menu(array('theme_location' => 'footer-menu-1', 'container' => false, 'depth' => 1)); ?>
                    </div>
                <?php endif; ?>
                <?php if (has_nav_menu('footer-menu-2')) : ?>
                    <div class="menu menu-footer">
                        <h3 class="title"><?php echo wp_get_nav_menu_object($locations['footer-menu-2'])->name; ?></h3>
                        <?php wp_nav_menu(array('theme_location' => 'footer-menu-2', 'container' => false, 'depth' => 1)); ?>
                    </div>
                <?php endif; ?>
                <?php if (has_nav_menu('footer-menu-3')) : ?>
                    <div class="menu menu-footer">
                        <h3 class="title"><?php echo wp_get_nav_menu_object($locations['footer-menu-3'])->name; ?></h3>
                        <?php wp_nav_menu(array('theme_location' => 'footer-menu-3', 'container' => false, 'depth' => 1)); ?>
                    </div>
                <?php endif; ?>
                <?php if (has_nav_menu('footer-menu-4')) : ?>
                    <div class="menu menu-footer">
                        <h3 class="title"><?php echo wp_get_nav_menu_object($locations['footer-menu-4'])->name; ?></h3>
                        <?php wp_nav_menu(array('theme_location' => 'footer-menu-4', 'container' => false, 'depth' => 1)); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="contact">
                <?php if (get_field("footer_contact_button", "options")) : ?>
                    <?php if (get_field("footer_contact_title", "options")) : ?>
                        <h3 class="title"><?php echo get_field("footer_contact_title", "options"); ?></h3>
                    <?php endif; ?>
                    <?php if (get_field("footer_contact_address", "options")) : ?>
                        <p><?php echo get_field("footer_contact_address", "options"); ?></p>
                    <?php endif; ?>
                    <a href="<?php echo get_field("footer_contact_button", "options")["url"]; ?>" target="<?php echo get_field("footer_contact_button", "options")["target"]; ?>" class="btn-contact"><?php echo get_field("footer_contact_button", "options")["title"]; ?></a>
                <?php endif; ?>
                <?php if (have_rows('footer_socials', 'option')) : ?>
                    <div class="socials">
                        <?php while (have_rows('footer_socials', 'option')) : the_row();
                            $icon = get_sub_field('icon');
                            $url = get_sub_field('url'); ?>
                            <a href="<?php echo $url; ?>" target="_blank" class="social">
                                <?php echo file_get_contents(get_template_directory_uri() . '/assets/icons/socials/' . $icon . '.svg'); ?>
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (get_field("footer_newsletter_shortcode", "options")) : ?>
                <div class="newsletter">
                    <?php if (get_field("footer_newsletter_title", "options")) : ?>
                        <h3 class="title"><?php echo get_field("footer_newsletter_title", "options"); ?></h3>
                    <?php endif; ?>
                    <?php $shortcode_newsletter = '[contact-form-7 id="' . get_field("footer_newsletter_shortcode", "options") . '"]';
                    echo do_shortcode($shortcode_newsletter); ?>
                </div>
            <?php endif; ?>

            <?php if (has_nav_menu('footer-menu-5')) : ?>
                <div class="menu menu-footer menu-external">
                    <h3 class="title"><?php echo wp_get_nav_menu_object($locations['footer-menu-5'])->name; ?></h3>
                    <?php wp_nav_menu(array('theme_location' => 'footer-menu-5', 'container' => false, 'depth' => 1)); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>