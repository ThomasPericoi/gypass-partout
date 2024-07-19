<?php get_header(); ?>

<!-- Hero -->
<section id="hero" class="hero-recrutement">
    <div class="container" style="background-image: url('<?php echo get_field("hiring_cover_image", "options"); ?>');">
        <h1><?php echo get_field("hiring_title", "options") ?: get_the_title(); ?></h1>
    </div>
</section>

<!-- Hiring -->
<section id="hiring">
    <?php if (have_posts()) : ?>
        <?php get_template_part('template-parts/list', 'hiring'); ?>
    <?php else : echo __('Aucun recrutement n\'a (encore) été publié.', 'gypass');
    endif; ?>
</section>

<?php get_footer(); ?>