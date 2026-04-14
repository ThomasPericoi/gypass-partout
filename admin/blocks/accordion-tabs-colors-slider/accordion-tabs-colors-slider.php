<?php

/**
 * Accordion Tabs (Colors Slider) Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$id = uniqid('accordion-');

$intro_title = get_field('intro_title');
$intro_content = get_field('intro_content');
$title = get_field('title');
$content = get_field('content');
$options_title = get_field('options_title');
$options = get_field('options');

$container = get_field('container_size');
$background = get_field('background');
$border_top = get_field('border_top');

$classes = array(
    'accordion-tabs-block',
    'accordion-tabs-colors-slider-block',
    $background,
    $border_top,
);

if (!empty($block['className'])) {
    $classes[] = $block['className'];
}

$classes = implode(' ', array_filter($classes));

$styles = array('');
$style = implode('; ', array_filter($styles));

$formatted_options = array();

if (!empty($options) && is_array($options)) {
    foreach ($options as $index => $option) {
        $formatted_options[] = array(
            'element_index' => $index + 1,
            'label' => $option['label'] ?? '',
            'image' => $option['image'] ?? null,
            'color_bg' => $option['options_image'] ?? '',
        );
    }
}

$options_chunks = array_chunk($formatted_options, 5);
?>

<!-- Block - Accordion Tabs (Colors Slider) -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>"
    style="<?php echo esc_attr($style); ?>">
    <div class="container <?php echo esc_attr($container); ?>">
        <?php if ($intro_title): ?>
            <div class="introduction formatted">
                <h2><?php echo esc_html($intro_title); ?></h2>

                <?php if ($intro_content): ?>
                    <?php echo wp_kses_post($intro_content); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="cols-wrapper">
            <div class="content formatted">
                <?php if ($title): ?>
                    <h2><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php echo wp_kses_post($content); ?>
            </div>

            <div class="media">
                <?php if (!empty($formatted_options)): ?>
                    <?php foreach ($formatted_options as $option): ?>
                        <?php
                        $image = $option['image'];

                        if (empty($image) || empty($image['url'])) {
                            continue;
                        }
                        ?>
                        <img data-tab-index="1" data-element-index="<?php echo esc_attr($option['element_index']); ?>"
                            src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" />
                    <?php endforeach; ?>

                    <div class="label">
                        <?php echo esc_html($options_title); ?> : <span id="active-label"></span>
                    </div>
                <?php endif; ?>

                <div class="button-prev">
                    <?php get_template_part('assets/icons/arrow-left.svg'); ?>
                </div>

                <div class="button-next">
                    <?php get_template_part('assets/icons/arrow-left.svg'); ?>
                </div>
            </div>

            <div class="menus">
                <?php if (!empty($options_chunks)): ?>
                    <div class="options-wrapper">
                        <div class="swiper options-swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($options_chunks as $chunk): ?>
                                    <div class="swiper-slide">
                                        <nav class="menu options">
                                            <?php foreach ($chunk as $option): ?>
                                                <?php
                                                $bg = '';

                                                if (!empty($option['color_bg'])) {
                                                    $bg = 'background-image: url(' . esc_url($option['color_bg']) . ');';
                                                }
                                                ?>
                                                <button class="color" type="button" data-tab-target="1"
                                                    data-element-target="<?php echo esc_attr($option['element_index']); ?>"
                                                    data-label="<?php echo esc_attr($option['label']); ?>"
                                                    style="<?php echo esc_attr($bg); ?>"
                                                    title="<?php echo esc_attr($option['label']); ?>">
                                                </button>
                                            <?php endforeach; ?>
                                        </nav>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="options-pagination"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>