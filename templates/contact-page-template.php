<?php
/* Template Name: Page contact */
get_header(); ?>

<!-- Contact -->
<div id="contact">
    <div class="container <?php echo get_field("page_container_size"); ?>">
        <h1 class="h2-size"><?php echo get_the_title(); ?></h1>
        <?php if (get_field("contact_description")) : ?>
            <div class="description formatted"><?php echo get_field("contact_description"); ?></div>
        <?php endif; ?>
        <?php $shortcode_contact = '[contact-form-7 id="' . get_field("contact_shortcode") . '"]';
        echo do_shortcode($shortcode_contact); ?>
    </div>
</div>

<?php if (get_field('cta_banner') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'title' => get_field('cta_banner_title'),
        'description' => get_field('cta_banner_description'),
        'cta' => get_field('cta_banner_cta'),
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>