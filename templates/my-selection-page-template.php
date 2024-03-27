<?php
/* Template Name: Page ma sélection */
get_header(); ?>

<!-- Hero -->
<?php
$title = get_field('my_selection_title', 'options') ?: __("Ma sélection", "gypass");
$description = get_field('my_selection_description', 'options') ?: __("Retrouvez ici toutes les inspirations Gypass.", "gypass");
?>
<section id="hero" class="hero-listing">
    <div class="container">
        <h1 class="h2-size"><?php echo $title; ?></h1>
        <p><?php echo $description; ?></p>
    </div>
</section>

<!-- Inspirations -->
<section id="inspirations">
    <div class="container <?php echo get_field("page_container_size"); ?>">
        <?php if (get_user_favorites()) :
            query_posts(array(
                'post_type' => 'gypass_inspiration',
                'post__in' => get_user_favorites(),
            )); ?>

            <?php get_template_part('template-parts/grid', 'inspirations'); ?>

        <?php else : echo __('Aucune inspiration n\'a (encore) été aimée.', 'gypass');
        endif;
        wp_reset_query(); ?>
    </div>
</section>

<?php if (get_field('inspirations_cta_banner', 'options') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'class' => '',
        'title' => get_field('inspirations_cta_banner_title', 'options'),
        'description' => get_field('inspirations_cta_banner_description', 'options'),
        'cta' => get_field('inspirations_cta_banner_cta', 'options'),
        'additional_description' => false,
        'additional_cta' => false,
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>