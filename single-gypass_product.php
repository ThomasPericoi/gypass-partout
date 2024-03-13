<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs" class="<?php echo get_field("post_style_breadcrumbs"); ?>">
    <div class="container container-lg">
        <a class="btn-back" href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
            <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/icons/arrow-line-left.svg'); ?>
        </a>
        <?php if (get_field("product_icon")) : ?>
            <img src="<?php echo get_field("product_icon")["url"]; ?>" alt="<?php echo get_field("product_icon")["title"]; ?>">
        <?php endif; ?>
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</section>

<!-- Hero -->
<section id="hero" <?php if (has_post_thumbnail()) : ?>style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" <?php endif; ?>>
    <div class="container">
        <h1><span class="p-size"><?php echo get_the_terms(get_the_id(), 'gypass_product_product_family')[0]->name; ?></span><br /> <span class="h4-size"><?php echo get_the_title(); ?></span></h1>
        <h2 class="h1-size"><?php echo get_field("product_title") ?: get_the_title(); ?></h2>
    </div>
</section>

<?php if (get_field('product_cta_banner_1') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'class' => 'product-cta-banner-1',
        'title' => get_field('product_cta_banner_title_1'),
        'cta' => get_field('product_cta_banner_cta_1'),
    )); ?>
<?php endif; ?>

<?php get_template_part('template-parts/cta-trio'); ?>

<section id="content">
    <div class="container">
        <div class="ornament">
            <?php echo file_get_contents(get_template_directory_uri() . '/assets/icons/settings.svg'); ?>
        </div>
        <div class="content">
            <?php if (get_field('product_content_title')) : ?>
                <h2 class="h6-size"><?php echo get_field('product_content_title'); ?></h2>
            <?php endif; ?>
            <?php if (get_field('product_content_subtitle')) : ?>
                <h3 class="h2-size"><?php echo get_field('product_content_subtitle'); ?></h3>
            <?php endif; ?>
            <?php if (get_field('product_content_text')) : ?>
                <div class="formatted"><?php echo get_field('product_content_text'); ?></div>
            <?php endif; ?>
            <?php if (get_field('product_content_cta')) : ?>
                <a href="<?php echo get_field('product_content_cta')["url"]; ?>" class="btn btn-outline-primary"><?php echo get_field('product_content_cta')["title"]; ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (get_field('product_cta_banner_2') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'class' => 'product-cta-banner-2',
        'title' => get_field('product_cta_banner_title_2'),
        'description' => get_field('product_cta_banner_description_2'),
        'cta' => get_field('product_cta_banner_cta_2'),
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>