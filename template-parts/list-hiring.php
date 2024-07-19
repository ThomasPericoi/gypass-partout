<div class="hiring-list">
    <?php while (have_posts()) : the_post(); ?>
        <?php if (is_single()) : ?>
            <div class="hiring">
        <?php else : ?>
            <a class="hiring" href="<?php the_permalink(); ?>">
        <?php endif; ?>
                <div class="container">
                    <?php if (get_field("hiring_date")) : ?>
                        <div class="date">
                            <?php echo __("Publiée le ", "gypass") . get_field("hiring_date"); ?>
                        </div>
                    <?php endif; ?>
                    <h2 class="title"><?php the_title(); ?> <span><?php echo get_field("hiring_subtitle"); ?></span></h2>
                    <div class="pills-wrapper">
                        <?php if (get_field("hiring_type")) : ?>
                            <div class="pill">
                                <?php echo get_field("hiring_type"); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (get_field("hiring_time")) : ?>
                            <div class="pill">
                                <?php echo get_field("hiring_time"); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
        <?php if (is_single()) : ?>
            </div>
        <?php else : ?>
            </a>
        <?php endif; ?>
        <?php endwhile; ?>
</div>

<?php the_posts_pagination(array(
    'prev_text' => __('<span class="icon icon-left"></span>', 'gypass'),
    'next_text' => __('<span class="icon icon-right"></span>', 'gypass'),
)); ?>