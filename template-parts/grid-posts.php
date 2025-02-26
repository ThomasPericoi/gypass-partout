<div class="posts-grid">
    <?php while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="post">
            <?php if (has_post_thumbnail()) : ?>
                <div class="thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
            <?php endif; ?>
            <?php if (get_field("post_badge")) : ?>
                <img class="badge" src="<?php echo get_field("post_badge")["url"]; ?>" alt="<?php echo get_field("post_badge")["title"]; ?>" />
            <?php endif; ?>
            <div class="content">
                <<?php echo $args["title_tag"]; ?> class="title"><?php the_title(); ?></<?php echo $args["title_tag"]; ?>>
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