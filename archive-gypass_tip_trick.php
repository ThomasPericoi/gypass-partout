<?php get_header(); ?>

<!-- Hero -->
<?php if (is_tax()) :
    $title = get_queried_object()->name;
    $description = get_queried_object()->description ?:  __("Retrouvez ici tous les conseils et astuces Gypass.", "gypass");
else :
    $title = get_field('tips_tricks_title', 'options') ?: __("Conseils & Astuces", "gypass");
    $description = get_field('tips_tricks__description', 'options') ?: __("Retrouvez ici tous les conseils et astuces Gypass.", "gypass");
endif;
?>
<section id="hero" class="hero-listing">
    <div class="container">
        <h1 class="h2-size"><?php echo $title; ?></h1>
        <p><?php echo $description; ?></p>

        <?php $product_families = get_terms(
            array(
                'taxonomy'   => 'gypass_trip_trick_product_family',
                'hide_empty' => false,
                'include' => array(41, 25, 23, 22, 21, 24),
                'orderby'  => 'include',
            )
        );
        if (!empty($product_families) && is_array($product_families)) : ?>
            <div class="filters">
                <span class="filters-label"><?php echo __("Filtres", "gypass"); ?></span>
                <a href="<?php echo esc_url(get_post_type_archive_link('gypass_tip_trick')) ?>" class="btn btn-outline-primary<?php if (!is_tax()) : ?> active<?php endif; ?>">
                    <?php echo __("Tout", "gypass"); ?>
                </a>
                <?php foreach ($product_families as $product_family) : ?>
                    <a href="<?php echo esc_url(get_term_link($product_family)) ?>" class="btn btn-outline-primary<?php if (is_tax('gypass_trip_trick_product_family', $product_family->slug)) : ?> active<?php endif; ?>">
                        <?php echo $product_family->name; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Posts -->
<section id="posts">
    <div class="container">
        <?php if (have_posts()) : ?>

            <?php get_template_part('template-parts/grid', 'posts'); ?>

        <?php else : echo __('Aucun conseil n\'a (encore) été publié.', 'gypass');
        endif; ?>
    </div>
</section>

<?php get_template_part('template-parts/cta-trio'); ?>

<?php if (get_field('tips_tricks_cta_banner', 'options') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'class' => '',
        'title' => get_field('tips_tricks_cta_banner_title', 'options'),
        'description' => get_field('tips_tricks_cta_banner_description', 'options'),
        'cta' => get_field('tips_tricks_cta_banner_cta', 'options'),
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>