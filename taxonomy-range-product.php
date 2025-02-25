<?php get_header(); ?>

<!-- Hero -->
<?php $title = get_queried_object()->name;
$description = get_queried_object()->description ?: __("Retrouvez ici toutes les gammes BRO.", "gypass");
?>

<section id="hero" class="hero-listing">
    <div class="container">
        <h1><?php echo $title . " sur-mesure"; ?></h1>
        <p><?php echo $description; ?></p>
    </div>
</section>

<!-- Posts -->
<section id="posts">
    <div class="container">
        <?php if (get_field("tax_range_ranges_title", get_queried_object())) : ?>
            <h2><?php echo get_field("tax_range_ranges_title", get_queried_object()); ?></h2>
        <?php endif; ?>

        <?php if (have_posts()) : ?>

            <?php get_template_part('template-parts/grid', 'posts'); ?>

        <?php else : echo __('Aucune gamme n\'a (encore) été publié.', 'gypass');
        endif; ?>
    </div>
</section>

<!-- Steps -->
<section id="steps">
    <div class="container container-lg">
        <?php if (get_field("tax_range_steps_title", get_queried_object())) : ?>
            <h2><strong><?php echo get_field("tax_range_steps_title", get_queried_object()); ?> : </strong><?php echo __("les étapes du projet", "gypass") ?></h2>
        <?php endif; ?>
        <?php if (have_rows("tax_range_steps", get_queried_object())) : ?>
            <div class="steps-grid">
                <?php while (have_rows("tax_range_steps", get_queried_object())) : the_row();
                    $title = get_sub_field('title');
                    $description = get_sub_field('content');
                ?>
                    <div class="step">
                        <h3 class="h6-size">
                            <strong><?php echo __("Étape ") . get_row_index(); ?></strong>
                            <?php echo $title; ?>
                        </h3>
                        <?php echo $description; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Products -->
<?php $products = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'gypass_product',
    'orderby' => 'date',
    'order'   => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'gypass_product_product_family',
            'field' => 'slug',
            'terms' => get_queried_object()->slug,
        ),
    ),
)); ?>
<?php if ($products) : ?>
    <section id="products">
        <div class="container">
            <?php if (get_field("tax_range_products_title", get_queried_object())) : ?>
                <h2><?php echo get_field("tax_range_products_title", get_queried_object()); ?></h2>
            <?php endif; ?>

            <div class="posts-grid">

                <?php foreach ($products as $post) :
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

            <?php the_posts_pagination(array(
                'prev_text' => __('<span class="icon icon-left"></span>', 'gypass'),
                'next_text' => __('<span class="icon icon-right"></span>', 'gypass'),
            )); ?>
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php if (get_field('tax_range_faq', get_queried_object())) : ?>
    <?php get_template_part('template-parts/faq', '', array(
        'title' => "Foire aux questions",
        'faq' => get_field('tax_range_faq', get_queried_object()),
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>