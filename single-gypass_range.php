<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs" class="<?php echo get_field("post_style_breadcrumbs"); ?>">
    <div class="container container-lg">
        <span class="js-openRanges">
            <a class="btn-back">
                <?php get_template_part('assets/icons/arrow-line-left.svg'); ?>
            </a>
        </span>
        <?php if (get_field("range_icon")) : ?>
            <img src="<?php echo get_field("range_icon")["url"]; ?>" alt="<?php echo get_field("range_icon")["title"]; ?>">
        <?php endif; ?>
        <nav aria-label="breadcrumbs" class="rank-math-breadcrumb">
            <p>
                <span class="js-openRanges"><a><?php echo __("Gammes", "gypass"); ?></a></span>
                <span class="separator"> &gt; </span>
                <?php if (get_the_terms(get_the_id(), 'gypass_range_product_family')) : ?>
                    <span class="js-openRanges"><a><?php echo get_the_terms(get_the_id(), 'gypass_range_product_family')[0]->name; ?></a></span>
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
            <?php echo __("Gamme", "gypass"); ?><br />
            <strong><?php echo get_field("range_range") ?: get_the_title(); ?></strong>
        </h1>
        <h2 class="h1-size"><?php echo get_field("range_title") ?: get_the_title(); ?></h2>
        <a class="btn-scroll" href="#plus">
            <?php get_template_part('assets/icons/arrow-line-bottom.svg'); ?>
        </a>
    </div>
</section>

<?php get_template_part('template-parts/plus', '', array(
    'plus' => get_field('range_plus'),
)); ?>

<!-- Content -->
<section id="content" style="--primary: var(--<?php echo get_field("range_color"); ?>);--content-color: var(--<?php echo get_field("range_color"); ?>)">
    <?php the_content(); ?>
</section>

<?php get_template_part('template-parts/guarantees', '', array(
    'title' => get_field('range_guarantees_title'),
    'guarantees' => get_field('range_guarantees'),
)); ?>

<?php get_template_part('template-parts/faq', '', array(
    'title' => false,
    'faq' => get_field('range_faq'),
)); ?>

<?php if (get_field('range_cta_banner') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'title' => get_field('range_cta_banner_title'),
        'description' => get_field('range_cta_banner_description'),
        'cta' => get_field('range_cta_banner_cta'),
        'additional_description' => false,
        'additional_cta' => false,
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>