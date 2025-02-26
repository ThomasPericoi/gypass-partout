<?php get_header(); ?>

<!-- Hero -->
<?php if (is_category()) :
    $title = get_queried_object()->name;
    $description = get_queried_object()->description ?: __("Retrouvez ici toutes les actualités GYPASS.", "gypass");
else :
    $title = get_field('blog_title', 'options') ?: __("Nos actualités", "gypass");
    $description = get_field('blog_description', 'options') ?: __("Retrouvez ici toutes les actualités GYPASS.", "gypass");
endif;
?>
<section id="hero" class="hero-listing">
    <div class="container">
        <h1 class="h2-size"><?php echo $title ?></h1>
        <p><?php echo $description; ?></p>

        <?php $categories = get_terms(
            array(
                'taxonomy'   => 'category',
                'hide_empty' => false,
                'include' => array(8, 9, 10),
                'exclude' => array(1),
                'orderby'  => 'include',
            )
        );
        if (!empty($categories) && is_array($categories)) : ?>
            <div class="filters">
                <span class="filters-label"><?php echo __("Filtres", "gypass"); ?></span>
                <div class="filters-grid">
                    <a href="<?php echo esc_url(get_post_type_archive_link('post')) ?>" class="btn btn-outline-primary<?php if (!is_category()) : ?> active<?php endif; ?>">
                        <?php echo __("Tout", "gypass"); ?>
                    </a>
                    <?php foreach ($categories as $category) : ?>
                        <a href="<?php echo esc_url(get_term_link($category)) ?>" class="btn btn-outline-primary<?php if (is_category($category->name)) : ?> active<?php endif; ?>">
                            <?php echo $category->name; ?>
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
            )); ?>); ?>

        <?php else : echo __('Aucune actualité n\'a (encore) été publié.', 'gypass');
        endif; ?>
    </div>
</section>

<?php if (get_field('blog_cta_banner', 'options') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'title' => get_field('blog_cta_banner_title', 'options'),
        'description' => get_field('blog_cta_banner_description', 'options'),
        'cta' => get_field('blog_cta_banner_cta', 'options'),
        'additional_description' => false,
        'additional_cta' => false,
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>