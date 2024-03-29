<?php
/* Template Name: Page recrutement */
get_header(); ?>

<!-- Hero -->
<section id="hero" class="hero-recrutement">
    <div class="container <?php echo get_field("page_container_size"); ?>" style="background-image: url('<?php echo get_field("hiring_cover_image"); ?>');">
        <h1><?php echo get_field("hiring_title") ?: get_the_title(); ?></h1>
    </div>
</section>

<!-- Formulaires -->
<section id="hiring">
    <?php if (have_rows('hiring_forms')) : ?>
        <div class="forms swiper">
            <div class="form-wrapper swiper-wrapper">
                <?php while (have_rows('hiring_forms')) : the_row();
                    $date = get_sub_field('date');
                    $type = get_sub_field('type');
                    $time = get_sub_field('time');
                    $title = get_sub_field('title');
                    $subtitle = get_sub_field('subtitle');
                    $description = get_sub_field('description');
                    $shortcode = '[contact-form-7 id="' . get_sub_field("shortcode") . '"]';
                ?>
                    <div class="form swiper-slide">
                        <div class="form-informations">
                            <div class="container <?php echo get_field("page_container_size"); ?>">
                                <?php if ($date) : ?>
                                    <div class="date">
                                        <?php echo __("Publiée le ", "gypass") . $date; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="details">
                                    <?php if ($type) : ?>
                                        <span><?php echo $type; ?></span>
                                    <?php endif; ?>
                                    <?php if ($time) : ?>
                                        <span><?php echo $time; ?></span>
                                    <?php endif; ?>
                                </div>
                                <?php if ($title) : ?>
                                    <h2><?php echo $title; ?></h2>
                                <?php endif; ?>
                                <?php if ($subtitle) : ?>
                                    <h3><?php echo $subtitle; ?></h3>
                                <?php endif; ?>
                                <?php if ($description) : ?>
                                    <div class="description formatted">
                                        <?php echo $description; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-form">
                            <div class="container <?php echo get_field("page_container_size"); ?>">
                                <h3><?php echo get_field("hiring_forms_label") ?: __("Remplir le formulaire", "gypass"); ?></h3>
                                <?php echo do_shortcode($shortcode); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    <?php else : ?>
        <p><?php echo __("Aucun recrutement n'est en cours.", "gypass"); ?></p>
    <?php endif; ?>
</section>

<?php if (get_field('cta_banner') == "true") : ?>
    <?php get_template_part('template-parts/cta-banner', '', array(
        'class' => '',
        'title' => get_field('cta_banner_title'),
        'description' => get_field('cta_banner_description'),
        'cta' => get_field('cta_banner_cta'),
        'additional_description' => get_field('cta_banner_additional_description'),
        'additional_cta' => get_field('cta_banner_additional_cta'),
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>