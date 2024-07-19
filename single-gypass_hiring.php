<?php get_header(); ?>

<!-- Hero -->
<section id="hero" class="hero-recrutement">
    <div class="container" style="background-image: url('<?php echo get_field("hiring_cover_image", "options"); ?>');">
        <h1><?php echo get_field("hiring_title", "options") ?: get_the_title(); ?></h1>
    </div>
</section>

<!-- Hiring -->
<section id="hiring">
    <?php get_template_part('template-parts/list', 'hiring'); ?>
    <div class="content">
        <div class="container">
            <div class="col-wrapper">
                <?php if (get_field("hiring_description_1")) : ?>
                    <div class="col formatted">
                        <?php echo get_field("hiring_description_1"); ?>
                    </div>
                <?php endif; ?>
                <?php if (get_field("hiring_description_2")) : ?>
                    <div class="col formatted">
                        <?php echo get_field("hiring_description_2"); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if (get_field("hiring_shortcode")) : ?>
        <div class="form">
            <div class="container">
                <h3><?php echo get_field("hiring_forms_label") ?: __("Merci de remplir le formulaire", "gypass"); ?></h3>
                <?php $shortcode = '[contact-form-7 id="' . get_field("hiring_shortcode") . '"]'; ?>
                <?php echo do_shortcode($shortcode); ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>