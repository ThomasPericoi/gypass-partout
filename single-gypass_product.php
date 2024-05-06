<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs" class="<?php echo get_field("post_style_breadcrumbs"); ?>">
    <div class="container container-lg">
        <span class="js-openRanges">
            <a class="btn-back">
                <?php get_template_part('assets/icons/arrow-line-left.svg'); ?>
            </a>
        </span>
        <?php if (get_field("product_icon")) : ?>
            <img src="<?php echo get_field("product_icon")["url"]; ?>" alt="<?php echo get_field("product_icon")["title"]; ?>">
        <?php endif; ?>
        <nav aria-label="breadcrumbs" class="rank-math-breadcrumb">
            <p>
                <span class="js-openProducts"><a><?php echo __("Produits", "gypass"); ?></a></span>
                <span class="separator"> &gt; </span>
                <?php if (get_the_terms(get_the_id(), 'gypass_product_product_family')) : ?>
                    <span class="js-openProducts"><a><?php echo get_the_terms(get_the_id(), 'gypass_product_product_family')[0]->name; ?></a></span>
                    <span class="separator"> &gt; </span>
                <?php endif; ?>
                <span class="last"><?php echo get_the_title(); ?></span>
            </p>
        </nav>
    </div>
</section>

<!-- Hero -->
<section id="hero" <?php if (has_post_thumbnail()) : ?>style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" <?php endif; ?>>
    <div class="container">
        <h1 class="h4-size">
            <?php if (get_field("product_top_title_1") || get_the_terms(get_the_id(), 'gypass_product_product_family')) : ?>
                <?php echo get_field("product_top_title_1") ?: get_the_terms(get_the_id(), 'gypass_product_product_family')[0]->name; ?><br />
            <?php endif; ?>
            <strong><?php echo get_field("product_top_title_2") ?: get_the_title(); ?></strong>
        </h1>
        <h2 class="h1-size"><?php echo get_field("product_title") ?: get_the_title(); ?></h2>
        <a class="btn-scroll" href="#content">
            <?php get_template_part('assets/icons/arrow-line-bottom.svg'); ?>
        </a>
    </div>
</section>

<section id="content">
</section>

<?php if (get_field('product_cta_banner_1') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner-simple', '', array(
        'title' => get_field('product_cta_banner_title_1'),
        'cta' => get_field('product_cta_banner_cta_1'),
        'background' => get_field('product_cta_banner_background_1'),
    )); ?>
<?php endif; ?>

<?php get_template_part('template-parts/cta-trio'); ?>

<!-- Content CTA -->
<section id="cta-content">
    <div class="container">
        <div class="ornament">
            <?php get_template_part('assets/icons/settings.svg'); ?>
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
        'title' => get_field('product_cta_banner_title_2'),
        'description' => get_field('product_cta_banner_description_2'),
        'cta' => get_field('product_cta_banner_cta_2'),
        'additional_description' => false,
        'additional_cta' => false,
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>