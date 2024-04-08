<?php
/* Template Name: Page Mon Projet (Fin) */
get_header(); ?>

<!-- Content -->
<section id="content">
    <div class="container container-sm">
        <h1><?php echo get_field("my-project_title") ?: get_the_title(); ?></h1>
        <?php if (get_field("my-project_description")) : ?>
            <div class="description h2-size"><?php echo get_field("my-project_description"); ?></div>
        <?php endif; ?>
        <?php if (get_field("my-project_text")) : ?>
            <div class="text formatted"><?php echo get_field("my-project_text"); ?></div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>