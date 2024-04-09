<?php

/**
 * Tooltip (Double) Template.
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
$extra_content = get_field('extra_content');
$image = get_field('image_map');

$container = get_field('container_size');
$background = get_field('background');
$border_top = get_field('border_top');

$classes = array('tooltip-block', 'tooltip-double-block', $background, $border_top);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);
?>

<!-- Block - Tooltip (Double) -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container <?php echo $container; ?>">
        <div class="col-wrapper">
            <div class="content formatted">
                <?php if ($title) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php echo $content; ?>
            </div>
            <?php if ($extra_content) : ?>
                <div class="legend-wrapper">
                    <div class="legend">
                        <?php echo $extra_content; ?>
                    </div>
                    <?php if (have_rows('switch')) : ?>
                        <div class="switch">
                            <span><?php echo __("Choisissez votre couleur"); ?></span>
                            <?php while (have_rows('switch')) : the_row();
                                $label = get_sub_field('label');
                                $image = get_sub_field('image'); ?>
                                <button class="btn btn-outline-primary" data-image-url="<?php echo $image['url']; ?>"><?php echo $label; ?></button>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ($image) : ?>
                <div class="image-wrapper">
                    <img src="" alt="<?php echo $image['alt']; ?>" />
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