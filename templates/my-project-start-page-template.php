<?php
/* Template Name: Page Mon Projet (Début) */
get_header(); ?>

<!-- Hero -->
<section id="hero">
    <div class="container container-sm">
        <h1 class="h3-size"><?php echo get_field("my-project_title") ?: get_the_title(); ?></h1>
        <?php if (get_field("my-project_description")) : ?>
            <div class="description"><?php echo get_field("my-project_description"); ?></div>
        <?php endif; ?>
    </div>
</section>

<!-- Mon projet -->
<section id="my-project-start">
    <div class="container <?php echo get_field("page_container_size"); ?>">
        <?php if (have_rows('my-project_grid')) : ?>
            <div class="project-grid">
                <?php while (have_rows('my-project_grid')) : the_row();
                    $title = get_sub_field('title');
                    $link = get_sub_field('link');
                    $icon = get_sub_field('icon');
                    $color = get_sub_field('color');
                ?>
                    <a class="project" href="<?php echo $link["url"]; ?>" style="background-color: <?php echo $color; ?>;">
                        <?php if ($icon) : ?>
                            <img class="icon" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
                        <?php endif; ?>
                        <?php if ($title) : ?>
                            <span><?php echo $title; ?></span>
                        <?php endif; ?>
                    </a>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php if (get_field('cta_banner') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'class' => '',
        'title' => get_field('cta_banner_title'),
        'description' => get_field('cta_banner_description'),
        'cta' => get_field('cta_banner_cta'),
        'additional_description' => get_field('cta_banner_additional_description'),
        'additional_cta' => get_field('cta_banner_additional_cta'),
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>