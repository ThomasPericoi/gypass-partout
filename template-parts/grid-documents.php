<div class="documents-grid">
    <?php while (have_posts()) : the_post(); ?>
        <div class="document">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail(); ?>
            <?php endif; ?>
            <div class="content">
                <?php if (get_the_terms($post->ID, 'gypass_document_type')) : ?>
                    <span class="category"><?php echo get_the_terms($post->ID, 'gypass_document_type')[0]->name; ?></span>
                <?php endif; ?>
                <h2 class="title"><?php the_title(); ?></h2>
                <div class="btn-wrapper">
                    <a class="btn-inline btn-icon-eye" href="<?php echo get_field('document_url_read') ?: get_field('document_file'); ?>" target="_blank"><?php echo __("Lire"); ?></a>
                    <a class="btn-inline btn-icon-download" href="<?php echo get_field('document_file'); ?>" download><?php echo __("Télécharger"); ?></a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php the_posts_pagination(array(
    'prev_text' => __('<span class="icon icon-left"></span>', 'gypass'),
    'next_text' => __('<span class="icon icon-right"></span>', 'gypass'),
)); ?>