<?php
/* Template Name: Page contact */
get_header(); ?>

<!-- Contact -->
<section id="contact">
    <div class="container <?php echo get_field("page_container_size"); ?>">
        <h1 class="h2-size"><?php echo get_the_title(); ?></h1>
        <?php if (get_field("contact_description")) : ?>
            <div class="description formatted"><?php echo get_field("contact_description"); ?></div>
        <?php endif; ?>
        <?php $shortcode_contact = '[contact-form-7 id="' . get_field("contact_shortcode") . '"]';
        echo do_shortcode($shortcode_contact); ?>
    </div>
</section>

<?php if (get_field('cta_banner') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'class' => '',
        'title' => get_field('cta_banner_title'),
        'description' => get_field('cta_banner_description'),
        'cta' => get_field('cta_banner_cta'),
        'additional_description' => get_field('cta_banner_additional_description'),
        'additional_cta' => get_field('cta_banner_additional_cta'),
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>