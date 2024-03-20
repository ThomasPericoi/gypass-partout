<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs" class="<?php echo get_field("post_style_breadcrumbs"); ?>">
    <div class="container container-lg">
        <a class="btn-back" href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
            <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/icons/arrow-line-left.svg'); ?>
        </a>
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</section>

<!-- Hero -->
<section id="hero">
    <?php if (get_field("post_image_cover")) : ?>
        <div class="thumbnail" style="background-image: url('<?php echo get_field("post_image_cover"); ?>');"></div>
    <?php endif; ?>
    <div class="container container-sm">
        <h1 class="h2-size"><?php echo get_the_title(); ?></h1>
        <?php if (get_field("post_introduction")) : ?>
            <div class="introduction">
                <?php echo get_field("post_introduction"); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if (get_field("post_badge")) : ?>
        <img class="badge" src="<?php echo get_field("post_badge")["url"]; ?>" alt="<?php echo get_field("post_badge")["title"]; ?>" />
    <?php endif; ?>
</section>

<!-- Content -->
<section id="content">
    <div class="container formatted">
        <?php the_content(); ?>

        <?php if (have_rows('post_tabs')) : ?>
            <div class="tabs-block">
                <nav class="tabs-menu">
                    <?php while (have_rows('post_tabs')) : the_row();
                        $title = get_sub_field('title');
                    ?>
                        <a class="tabs-menu-element" tabindex="0" role="button" class="btn" href="#content"><?php echo $title; ?></a>
                    <?php endwhile; ?>
                </nav>
                <div class="tabs-content formatted">
                    <?php while (have_rows('post_tabs')) : the_row();
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
                    ?>
                        <div class="tabs-content-element formatted">
                            <h2><?php echo $title; ?></h2>
                            <?php echo $content; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Related -->
<?php $related = get_posts(array(
    'numberposts' => 3,
    'post_type' => get_post_type($post->ID),
    'post__not_in' => array($post->ID)
)); ?>
<?php if ($related) : ?>
    <section id="related">
        <div class="container container">
            <h2><?php echo __("À consulter également", "gypass"); ?></h2>
            <div class="posts-grid">
                <?php foreach ($related as $post) :
                    setup_postdata($post); ?>
                    <a href="<?php the_permalink(); ?>" class="post">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                        <?php endif; ?>
                        <?php if (get_field("post_badge")) : ?>
                            <img class="badge" src="<?php echo get_field("post_badge")["url"]; ?>" alt="<?php echo get_field("post_badge")["title"]; ?>" />
                        <?php endif; ?>
                        <div class="content">
                            <h2 class="title"><?php the_title(); ?></h2>
                            <?php if (has_excerpt()) : ?>
                                <p><?php the_excerpt(); ?></p>
                            <?php endif; ?>
                            <span class="btn btn-outline-primary"><?php echo __("En savoir plus", "gypasss"); ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>