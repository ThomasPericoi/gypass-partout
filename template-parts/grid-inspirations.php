<div class="inspirations-grid">
    <?php while (have_posts()) : the_post(); ?>
        <div class="inspiration">
            <div class="inspiration-thumbnail" <?php if (has_post_thumbnail()) : ?>style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" <?php endif; ?>>
                <?php echo get_favorites_button(); ?>
            </div>
            <div class="inspiration-content">
                <h2 class="h6-size"><?php echo get_the_title(); ?></h2>
                <?php if (get_field("inspiration_url_gamme")) : ?>
                    <a class="btn btn-outline-primary" href="<?php echo get_field("inspiration_url_gamme"); ?>"><?php echo __("Voir la gamme", "gypass"); ?></a>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php the_posts_pagination(array(
    'prev_text' => __('<span class="icon icon-left"></span>', 'gypass'),
    'next_text' => __('<span class="icon icon-right"></span>', 'gypass'),
)); ?>