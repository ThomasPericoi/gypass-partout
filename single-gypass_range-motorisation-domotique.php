<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs" class="<?php echo get_field("post_style_breadcrumbs"); ?>">
    <div class="container container-lg">
        <a class="btn-back" href="<?php echo home_url(); ?>">
            <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/icons/arrow-line-left.svg'); ?>
        </a>
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
<section id="hero-alt">
    <div class="container">
        <div class="formatted">
            <h1 class="h3-size"><?php echo get_the_title(); ?></span></h1>
            <?php echo get_field("range_description"); ?>
        </div>
        <div class="filters">
            <span class="filters-label"><?php echo __("Filtres <br /> par marques", "gypass"); ?></span>
            <button class="btn btn-outline-primary all-filter active">
                <?php echo __("Tout", "gypass"); ?>
            </button>
            <?php if (have_rows('range_filters')) : ?>
                <?php while (have_rows('range_filters')) : the_row();
                    $label = get_sub_field('label');
                    $classname = get_sub_field('classname');
                ?>
                    <button class="btn btn-outline-primary class-filter" data-classname="<?php echo $classname; ?>">
                        <?php echo $label; ?>
                    </button>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
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