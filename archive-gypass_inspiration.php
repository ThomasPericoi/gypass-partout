<?php get_header(); ?>

<!-- Hero -->
<?php if (is_tax()) :
    $title = get_queried_object()->name;
    $description = get_queried_object()->description ?: __("Retrouvez ici toutes les actualités Gypass.", "gypass");
else :
    $title = get_field('inspirations_title', 'options') ?: __("Inspirations", "gypass");
    $description = get_field('inspirations_description', 'options') ?: __("Retrouvez ici toutes les inspirations Gypass.", "gypass");
endif;
?>
<section id="hero" class="hero-listing">
    <div class="container">
        <h1 class="h2-size"><?php echo $title; ?></h1>
        <p><?php echo $description; ?></p>

        <?php $product_types = get_terms(
            array(
                'taxonomy'   => 'gypass_inspi_product_family',
                'hide_empty' => false,
                'include' => array(26, 63, 38, 35, 28, 27, 55),
                'orderby'  => 'include',
            )
        );
        if (!empty($product_types) && is_array($product_types)) : ?>
            <div class="filters">
                <span class="filters-label"><?php echo __("Filtres", "gypass"); ?></span>
                <a href="<?php echo esc_url(get_post_type_archive_link('gypass_inspiration')) ?>" class="btn btn-outline-primary<?php if (!is_tax()) : ?> active<?php endif; ?>">
                    <?php echo __("Tout", "gypass"); ?>
                </a>
                <?php foreach ($product_types as $product_type) : ?>
                    <a href="<?php echo esc_url(get_term_link($product_type)) ?>" class="btn btn-outline-primary<?php if (is_tax('gypass_inspi_product_family', $product_type->slug)) : ?> active<?php endif; ?>">
                        <?php echo $product_type->name; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Inspirations -->
<section id="inspirations">
    <div class="container container-lg">
        <?php if (have_posts()) : ?>

            <?php get_template_part('template-parts/grid', 'inspirations'); ?>

        <?php else : echo __('Aucune inspiration n\'a (encore) été publiée.', 'gypass');
        endif; ?>
    </div>
</section>

<?php get_template_part('template-parts/cta-trio'); ?>

<?php if (get_field('inspirations_cta_banner', 'options') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'title' => get_field('inspirations_cta_banner_title', 'options'),
        'description' => get_field('inspirations_cta_banner_description', 'options'),
        'cta' => get_field('inspirations_cta_banner_cta', 'options'),
        'additional_description' => false,
        'additional_cta' => false,
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>