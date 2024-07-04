<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs" class="motorisation-domotique">
    <div class="container container-lg">
        <span class="js-openRanges">
            <a class="btn-back">
                <?php get_template_part('assets/icons/arrow-line-left.svg'); ?>
            </a>
        </span>
        <h1 class="h3-size"><?php echo get_the_title(); ?></span></h1>
    </div>
</section>

<?php if (have_rows('range_hero_plus')) : ?>
    <!-- Hero -->
    <section id="hero-alt">
        <div class="container">
            <div class="plus-grid">
                <?php while (have_rows('range_hero_plus')) : the_row();
                    $title = get_sub_field('title');
                ?>
                    <div class="plus">
                        <?php get_template_part('assets/icons/plus.svg'); ?>
                        <?php if (have_rows('points')) : ?>
                            <ul>
                                <li>
                                    <h2 class="p-size"><?php echo $title; ?></h2>
                                </li>
                                <?php while (have_rows('points')) : the_row();
                                    $text = get_sub_field('text');
                                ?>
                                    <li><?php echo $text; ?></li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('range_hero_features')) : ?>
    <!-- Features -->
    <section class="features">
        <div class="container container-sm">
            <h2><?php echo __("Fonctionnalités principales", "gypass"); ?></h2>
            <div class="features-grid">
                <?php while (have_rows('range_hero_features')) : the_row();
                    $content = get_sub_field('content');
                    $icon = get_sub_field('icon');
                ?>
                    <div class="feature">
                        <img src="<?php echo $icon["url"]; ?>" alt="<?php echo $icon["alt"]; ?>">
                        <?php echo $content; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ((have_rows('range_filters_openings')) && (have_rows('range_filters_brands'))) : ?>
    <!-- Filters -->
    <section class="filters">
        <div class="container">
            <div class="filters-wrapper">
                <div class="filter opening-filter">
                    <span class="filters-label"><?php echo __("Sélectionnez <br /> votre ouverture", "gypass"); ?></span>

                    <?php while (have_rows('range_filters_openings')) : the_row();
                        $icon = get_sub_field('icon');
                        $classname = get_sub_field('classname');
                    ?>
                        <button data-opening="<?php echo $classname; ?>">
                            <img src="<?php echo $icon["url"]; ?>" alt="<?php echo $icon["alt"]; ?>">
                        </button>
                    <?php endwhile; ?>
                </div>
                <div class="filter class-filter">
                    <span class="filters-label"><?php echo __("Sélectionnez <br /> votre marque", "gypass"); ?></span>

                    <?php while (have_rows('range_filters_brands')) : the_row();
                        $icon = get_sub_field('icon');
                        $classname = get_sub_field('classname');
                    ?>
                        <button data-classname="<?php echo $classname; ?>">
                            <img src="<?php echo $icon["url"]; ?>" alt="<?php echo $icon["alt"]; ?>">
                        </button>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

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