<div class="posts-grid">
    <?php while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="post">
            <?php if (has_post_thumbnail()) : ?>
                <div class="thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
            <?php endif; ?>
            <div class="content">
                <h2 class="title"><?php the_title(); ?></h2>
                <?php if (has_excerpt()) : ?>
                    <p><?php the_excerpt(); ?></p>
                <?php endif; ?>
                <span class="btn btn-outline-primary"><?php echo __("En savoir plus", "gypasss"); ?></span>
            </div>
        </a>
    <?php endwhile; ?>
</div>

<?php the_posts_pagination(array(
    'prev_text' => __('<span class="icon icon-left"></span>', 'gypass'),
    'next_text' => __('<span class="icon icon-right"></span>', 'gypass'),
)); ?>