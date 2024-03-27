<?php get_header(); ?>

<!-- Hero -->
<?php if (is_tax()) :
    $title = get_queried_object()->name;
    $description = get_queried_object()->description ?: __("Retrouvez ici toutes les actualités Gypass.", "gypass");
else :
    $title = get_field('documents_title', 'options') ?: __("Documents", "gypass");
    $description = get_field('documents_description', 'options') ?: __("Retrouvez ici toute la documentation Gypass.", "gypass");
endif;
?>
<section id="hero" class="hero-listing">
    <div class="container">
        <h1 class="h2-size"><?php echo $title; ?></h1>
        <p><?php echo $description; ?></p>

        <?php $document_types = get_terms(
            array(
                'taxonomy'   => 'gypass_document_type',
                'hide_empty' => false,
                'include' => array(11, 12, 13, 14),
                'orderby'  => 'include',
            )
        );
        if (!empty($document_types) && is_array($document_types)) : ?>
            <div class="filters">
                <span class="filters-label"><?php echo __("Filtres", "gypass"); ?></span>
                <a href="<?php echo esc_url(get_post_type_archive_link('gypass_document')) ?>" class="btn btn-outline-primary<?php if (!is_tax()) : ?> active<?php endif; ?>">
                    <?php echo __("Tout", "gypass"); ?>
                </a>
                <?php foreach ($document_types as $document_type) : ?>
                    <a href="<?php echo esc_url(get_term_link($document_type)) ?>" class="btn btn-outline-primary<?php if (is_tax('gypass_document_type', $document_type->slug)) : ?> active<?php endif; ?>">
                        <?php echo $document_type->name; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Documents -->
<section id="documents">
    <div class="container container-lg">
        <?php if (have_posts()) : ?>

            <?php get_template_part('template-parts/grid', 'documents'); ?>

        <?php else : echo __('Aucun document n\'a (encore) été publié.', 'gypass');
        endif; ?>
    </div>
</section>

<?php if (get_field('documents_cta_banner', 'options') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'title' => get_field('documents_cta_banner_title', 'options'),
        'description' => get_field('documents_cta_banner_description', 'options'),
        'cta' => get_field('documents_cta_banner_cta', 'options'),
        'additional_description' => false,
        'additional_cta' => false,
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>