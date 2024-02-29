<?php get_header(); ?>

<!-- Content -->
<section>
    <div class="container <?php echo get_field("page_container_size"); ?> formatted">
        <h1><?php echo get_the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer(); ?>