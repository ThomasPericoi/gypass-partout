<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs" class="<?php echo get_field("post_style_breadcrumbs"); ?>">
    <div class="container container-lg">
        <span class="js-openRanges">
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
            <?php echo get_field("range_description"); ?>
        </div>
        <?php if (have_rows('range_filters')) : ?>
            <div class="filters">
                <span class="filters-label"><?php echo __("Filtres <br /> par marques", "gypass"); ?></span>
                <button class="btn btn-outline-primary all-filter active">
                    <?php echo __("Tout", "gypass"); ?>
                </button>
                <?php while (have_rows('range_filters')) : the_row();
                    $label = get_sub_field('label');
                    $classname = get_sub_field('classname');
                ?>
                    <button class="btn btn-outline-primary class-filter" data-classname="<?php echo $classname; ?>">
                        <?php echo $label; ?>
                    </button>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<section id="content">
    <?php the_content(); ?>
</section>

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