<?php get_header(); ?>

<section id="section-404">
    <div class="container">
        <h1><?php echo get_field('404_title', 'options') ?: __("404", "gypass"); ?></h1>
        <h2><?php echo get_field('404_subtitle', 'options') ?: __("Vous êtes perdu ?", "gypass"); ?></h2>
        <button class="btn btn-primary js-toggleSearchModal"><?php echo get_field('404_search_label', 'options') ?: __("Lancez une recherche", "gypass"); ?></button>
    </div>
</section>

<?php if (get_field('404_cta_banner', 'options') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'title' => get_field('404_cta_banner_title', 'options'),
        'description' => get_field('404_cta_banner_description', 'options'),
        'cta' => get_field('404_cta_banner_cta', 'options'),
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>