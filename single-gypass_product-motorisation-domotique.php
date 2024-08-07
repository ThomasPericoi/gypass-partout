<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs">
    <div class="container container-lg">
        <span class="js-openProducts">
            <a class="btn-back">
                <?php get_template_part('assets/icons/arrow-line-left.svg'); ?>
            </a>
        </span>
    </div>
</section>

<!-- Hero -->
<section id="hero-alt">
    <div class="container container-lg">
        <div class="formatted">
            <h1 class="h3-size"><?php echo get_the_title(); ?></span></h1>
            <?php echo get_field("product_description"); ?>
        </div>
    </div>
</section>

<section id="content">
    <?php the_content(); ?>
</section>

<?php if (get_field('product_cta_banner') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'title' => get_field('product_cta_banner_title'),
        'description' => get_field('product_cta_banner_description'),
        'cta' => get_field('product_cta_banner_cta'),
        'additional_description' => false,
        'additional_cta' => false,
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>