<!-- Home Inspirations -->
<section id="home-inspirations">
    <div class="introduction">
        <div class="container">
            <?php if (get_field("home_inspirations_title")) : ?>
                <h2><?php echo get_field("home_inspirations_title"); ?></h2>
            <?php endif; ?>
            <a href="<?php echo get_post_type_archive_link('gypass_inspiration'); ?>" class="btn btn-outline-primary"><?php echo get_field("home_inspirations_cta_label") ?: __("Découvrir toutes nos inspirations", "gypass"); ?></a>
        </div>
    </div>
    <?php if (get_field("home_inspirations_slider_1")) : ?>
        <div id="inspirations-slider-1" class="inspirations-slider swiper">
            <div class="swiper-wrapper">
                <?php foreach (get_field("home_inspirations_slider_1") as $post) :
                    setup_postdata($post); ?>
                    <div class="inspiration swiper-slide">
                        <div class="inspiration-thumbnail" <?php if (has_post_thumbnail()) : ?>style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" <?php endif; ?>>
                            <?php echo get_favorites_button(); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (get_field("home_inspirations_slider_2")) : ?>
        <div id="inspirations-slider-2" class="inspirations-slider swiper">
            <div class="swiper-wrapper">
                <?php foreach (get_field("home_inspirations_slider_2") as $post) :
                    setup_postdata($post); ?>
                    <div class="inspiration swiper-slide">
                        <div class="inspiration-thumbnail" <?php if (has_post_thumbnail()) : ?>style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" <?php endif; ?>>
                            <?php echo get_favorites_button(); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    <?php endif; ?>
</section>