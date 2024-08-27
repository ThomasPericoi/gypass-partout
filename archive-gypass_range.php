<?php get_header(); ?>

<!-- Hero -->
<?php if (is_tax()) :
    $title = get_queried_object()->name;
    $description = get_queried_object()->description ?: __("Retrouvez ici toutes les gammes Gypass.", "gypass");
else :
    $title = __("Nos gammes", "gypass");
    $description = __("Retrouvez ici toutes les gammes Gypass.", "gypass");
endif;
?>
<section id="hero" class="hero-listing">
    <div class="container">
        <h1 class="h2-size"><?php echo $title ?></h1>
        <p><?php echo $description; ?></p>
    </div>
</section>

<!-- Posts -->
<section id="posts">
    <div class="container">
        <?php if (have_posts()) : ?>

            <?php get_template_part('template-parts/grid', 'posts'); ?>

        <?php else : echo __('Aucune gamme n\'a (encore) été publié.', 'gypass');
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