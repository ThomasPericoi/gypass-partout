<?php
/* Template Name: Page Outdoor (Formulaire) */
get_header(); ?>

<!-- Content -->
<section id="content">
    <div class="container container-sm">
        <a class="btn-back" href="<?php echo get_home_url(); ?>/concours-outdoor">
            <?php get_template_part('assets/icons/arrow-line-left.svg'); ?>
        </a>
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer(); ?>