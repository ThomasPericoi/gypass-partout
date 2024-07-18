<?php

/**
 * Tooltip (Spécial) Template.
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
$image = get_field("image_map");

$container = get_field('container_size');
$border_top = get_field('border_top');

$classes = array('tooltip-block', 'tooltip-special-block', $border_top);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);
?>

<!-- Block - Tooltip (Spécial) -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container <?php echo $container; ?>">
        <div class="col-wrapper">
            <div class="content formatted">
                <?php if ($title) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php echo $content; ?>
            </div>
            <div class="medias">
                <?php if (have_rows('features')) : ?>
                    <div class="features">
                        <?php while (have_rows('features')) : the_row();
                            $badge = get_sub_field('image');
                            $content = get_sub_field('content'); ?>
                            <div class="feature">
                                <img src="<?php echo $badge["url"]; ?>" alt="<?php echo $badge["alt"]; ?>">
                                <div class="content formatted">
                                    <?php if ($content) : ?>
                                        <?php echo $content; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <?php if ($image) : ?>
                    <div class="image-wrapper">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php if (have_rows('tooltips')) :
                            while (have_rows('tooltips')) : the_row();
                                $index = get_row_index();
                                $position = get_sub_field('position'); ?>
                                <button class="tooltip" data-position="<?php echo $position; ?>" data-target="<?php echo $index; ?>" title="<?php echo __("Ouvrir le tooltip", "gypass"); ?>">
                                    <?php get_template_part('assets/icons/tooltip-minus.svg'); ?>
                                </button>
                        <?php endwhile;
                        endif; ?>
                    </div>
                <?php endif; ?>
            </div>
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
    </div>
</section>