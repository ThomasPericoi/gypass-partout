<?php get_header(); ?>

<!-- Hero -->
<?php if (is_tax()) :
    $title = $title = is_tax('gypass_trip_trick_product_family', 41) ? get_queried_object()->name : __("Nos conseils pour vos ", "gypass") . get_queried_object()->name;
    $description = get_queried_object()->description ?:  __("Retrouvez ici tous les conseils et astuces GYPASS.", "gypass");
else :
    $title = get_field('tips_tricks_title', 'options') ?: __("Conseils & Astuces", "gypass");
    $description = get_field('tips_tricks__description', 'options') ?: __("Retrouvez ici tous les conseils et astuces GYPASS.", "gypass");
endif;
?>
<section id="hero" class="hero-listing">
    <div class="container container-lg">
        <h1 class="h2-size"><?php echo $title; ?></h1>
        <p><?php echo $description; ?></p>

        <?php $product_families = get_terms(
            array(
                'taxonomy'   => 'gypass_trip_trick_product_family',
                'hide_empty' => false,
                'include' => array(41, 25, 62, 23, 22, 21, 24, 61),
                'orderby'  => 'include',
            )
        );
        if (!empty($product_families) && is_array($product_families)) : ?>
            <div class="filters">
                <span class="filters-label"><?php echo __("Filtres", "gypass"); ?></span>
                <div class="filters-grid">
                    <a href="<?php echo esc_url(get_post_type_archive_link('gypass_tip_trick')) ?>" class="btn btn-outline-primary<?php if (!is_tax()) : ?> active<?php endif; ?>">
                        <?php echo __("Tout", "gypass"); ?>
                    </a>
                    <?php foreach ($product_families as $product_family) : ?>
                        <a href="<?php echo esc_url(get_term_link($product_family)) ?>" class="btn btn-outline-primary<?php if (is_tax('gypass_trip_trick_product_family', $product_family->slug)) : ?> active<?php endif; ?>">
                            <?php echo $product_family->name; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Posts -->
<section id="posts">
    <div class="container">
        <?php if (have_posts()) : ?>

            <?php get_template_part('template-parts/grid', 'posts', array(
                'title_tag' => 'h2',
            )); ?>

        <?php else : echo __('Aucun conseil n\'a (encore) été publié.', 'gypass');
        endif; ?>
    </div>
</section>

<?php get_template_part('template-parts/cta-trio'); ?>

<?php if (get_field('tips_tricks_cta_banner', 'options') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'title' => get_field('tips_tricks_cta_banner_title', 'options'),
        'description' => get_field('tips_tricks_cta_banner_description', 'options'),
        'cta' => get_field('tips_tricks_cta_banner_cta', 'options'),
        'additional_description' => false,
        'additional_cta' => false,
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>