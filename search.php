<?php get_header(); ?>

<section>
    <div class="container container-sm">
        <h1><?php echo __("Page de recherche", "gypass"); ?></h1>

        <?php get_search_form(); ?>

        <?php if (have_posts()) : ?>
            <h2><?php echo __("Résultat(s) pour", "gypass"); ?> "<?php echo get_query_var('s'); ?>"</h2>

            <ul class="search-results">
                <?php while (have_posts()) : the_post(); ?>
                    <li>
                        <?php if ('gypass_document' == get_post_type()) : ?>
                        <a href="<?php echo get_field('document_file'); ?>">
                        <?php elseif ('gypass_inspiration' == get_post_type()) : ?>
                        <a href="<?php echo get_post_type_archive_link('gypass_inspiration'); ?>">
                        <?php else : ?>
                        <a href="<?php echo get_the_permalink(); ?>">
                        <?php endif; ?>
                            <h3>
                                <?php if (get_the_terms($post->ID, 'gypass_document_type')) : ?>
                                    <?php echo get_the_terms($post->ID, 'gypass_document_type')[0]->name; ?> :
                                <?php endif; ?>
                                <?php if (('gypass_range' == get_post_type()) && (get_the_terms($post->ID, 'gypass_range_product_family'))) : ?>
                                    <?php echo get_the_terms($post->ID, 'gypass_range_product_family')[0]->name; ?> |
                                <?php endif; ?>
                                <?php echo get_the_title(); ?>
                            </h3>
                            <span><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></span>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>

            <?php the_posts_pagination(array(
                'prev_text' => __('<span class="icon icon-left"></span>', 'gypass'),
                'next_text' => __('<span class="icon icon-right"></span>', 'gypass'),
            )); ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <h2><?php echo __("Rien n'a été trouvé pour le terme", "gypass"); ?> "<?php echo get_query_var('s'); ?>"</h2>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>