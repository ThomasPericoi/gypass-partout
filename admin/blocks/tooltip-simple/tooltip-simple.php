<?php

/**
 * Tooltip (Simple) Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$title = get_field('title');
$content = get_field('content');
$cta = get_field('cta');
$extra_image = get_field("extra_image");
$extra_content = get_field("extra_content");
$image = get_field("image_map");

$container = get_field('container_size');
$background = get_field('background');
$display = get_field('display');

$classes = array('tooltip-block', 'tooltip-simple-block', $background, $display);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);
?>

<!-- Block - Tooltip (Simple) -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container <?php echo $container; ?>">
        <div class="col-wrapper">
            <div class="content formatted">
                <?php if ($title) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php echo $content; ?>
                <?php if ($cta) : ?>
                    <a href="<?php echo $cta["url"]; ?>" class="btn btn-outline-primary" target="<?php echo $cta["target"]; ?>"><?php echo $cta["title"]; ?></a>
                <?php endif; ?>
                <?php if ($extra_image && ($display == "row")) : ?>
                    <div class="legend">
                        <img src="<?php echo $extra_image['url']; ?>" alt="<?php echo $extra_image['alt']; ?>" />
                        <?php if ($extra_content) : ?>
                            <?php echo $extra_content; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if (have_rows('tooltips')) :
                    while (have_rows('tooltips')) : the_row();
                        $index = get_row_index();
                        $content = get_sub_field('popup_content');
                        $popup_image = get_sub_field('popup_image');
                        $entrance = get_sub_field('entrance');  ?>
                        <div class="tooltip-popup <?php echo $entrance; ?>" data-trigger="<?php echo $index; ?>">
                            <?php if ($popup_image) : ?>
                                <img src="<?php echo $popup_image['url']; ?>" alt="<?php echo $popup_image['alt']; ?>" />
                            <?php endif; ?>
                            <?php if ($content) : ?>
                                <div class="content">
                                    <?php echo $content; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
            <div class="medias">
                <?php if ($extra_image && ($display == "column")) : ?>
                    <div class="legend">
                        <img src="<?php echo $extra_image['url']; ?>" alt="<?php echo $extra_image['alt']; ?>" />
                        <?php if ($extra_content) : ?>
                            <?php echo $extra_content; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ($image) : ?>
                    <div class="image-wrapper">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php if (have_rows('tooltips')) :
                            while (have_rows('tooltips')) : the_row();
                                $index = get_row_index();
                                $position = get_sub_field('position'); ?>
                                <button class="tooltip" data-position="<?php echo $position; ?>" data-target="<?php echo $index; ?>">
                                    <?php get_template_part('assets/icons/tooltip-minus.svg'); ?>
                                </button>
                        <?php endwhile;
                        endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>