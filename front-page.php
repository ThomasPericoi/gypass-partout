<?php get_header(); ?>

<?php get_template_part('template-parts/home-hero'); ?>
<?php get_template_part('template-parts/home-quote'); ?>
<?php get_template_part('template-parts/home-inspirations'); ?>
<?php get_template_part('template-parts/cta-trio'); ?>
<?php get_template_part('template-parts/faq', '', array(
    'title' => get_field("home_faq_title"),
    'faq' => get_field('home_faq'),
)); ?>
<?php get_template_part('template-parts/home-video'); ?>

<?php get_footer(); ?>