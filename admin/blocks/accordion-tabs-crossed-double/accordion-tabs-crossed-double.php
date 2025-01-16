<?php

/**
 * Accordion Tabs Crossed (Double) Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$id = uniqid("accordion-crossed-");
$intro_title = get_field('intro_title');
$intro_content = get_field('intro_content');
$options_1_title = get_field('options_1_title');

$container = get_field('container_size');
$background = get_field('background');
$border_top = get_field('border_top');

$classes = array('accordion-tabs-block', 'accordion-tabs-crossed-block', 'accordion-tabs-crossed-double-block', $background, $border_top);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);
?>

<!-- Block - Accordion Tabs (Crossed) -->
<section id="<?php echo $id; ?>" class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container <?php echo $container; ?>">
        <?php if ($intro_title) : ?>
            <div class="introduction formatted">
                <h2><?php echo $intro_title; ?></h2>
                <?php if ($intro_content) : ?>
                    <?php echo $intro_content; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="cols-wrapper">
            <div class="content">
                <?php if (have_rows('menus')) :
                    while (have_rows('menus')) : the_row();
                        $tab_index = get_row_index();
                        if (have_rows('elements')) :
                            while (have_rows('elements')) : the_row();
                                $element_index = get_row_index();
                                $title = get_sub_field('title');
                                $content = get_sub_field('content'); ?>
                                <div class="formatted" data-tab-index="<?php echo $tab_index; ?>" data-element-index="<?php echo $element_index; ?>">
                                    <?php if ($title) : ?>
                                        <h2><?php echo $title; ?></h2>
                                    <?php endif; ?>
                                    <?php echo $content; ?>
                                </div>
                <?php endwhile;
                        endif;
                    endwhile;
                endif; ?>
                <?php if (have_rows('options_1')) : ?>
                    <div class="options-wrapper">
                        <div class="label">
                            <?php echo $options_1_title; ?> : <span id="option-active-label"></span>
                        </div>
                        <nav class="options">
                            <?php while (have_rows('options_1')) : the_row();
                                $id = get_sub_field('id');
                                $title = get_sub_field('title');
                                $image = get_sub_field('image'); ?>
                                <button class="image" id="<?php echo $id; ?>" data-label="<?php echo $title; ?>" title="<?php echo $title; ?>">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                </button>
                            <?php endwhile; ?>
                        </nav>
                    </div>
                <?php endif; ?>
            </div>
            <div class="media">
                <?php if (have_rows('menus')) :
                    while (have_rows('menus')) : the_row();
                        $tab_index = get_row_index();
                        if (have_rows('elements')) :
                            while (have_rows('elements')) : the_row();
                                $element_index = get_row_index();
                                if (have_rows('images')) :
                                    while (have_rows('images')) : the_row();
                                        $image = get_sub_field('image');
                                        $options_1_id = get_sub_field('options_1_id');
                                        $options_2_id = get_sub_field('options_2_id'); ?>
                                        <img data-options-id="<?php echo $options_1_id; ?>" data-options-alt-id="<?php echo $options_2_id; ?>" data-tab-index="<?php echo $tab_index; ?>" data-element-index="<?php echo $element_index; ?>" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php endwhile;
                                endif;
                            endwhile;
                        endif;
                    endwhile;
                endif; ?>
                <?php if (have_rows('options_2')) : ?>
                    <div class="options-alt-wrapper">
                        <nav class="options-alt swiper">
                            <div class="swiper-wrapper">
                                <?php while (have_rows('options_2')) : the_row();
                                    $id = get_sub_field('id');
                                    $cat = get_sub_field('category');
                                    $title = get_sub_field('title');
                                    $image = get_sub_field('image'); ?>
                                    <button class="image swiper-slide" id="<?php echo $id; ?>" data-title="<?php echo $cat; ?>" data-label="<?php echo $title; ?>" title="<?php echo $title; ?>">
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    </button>
                                <?php endwhile; ?>
                            </div>
                        </nav>
                        <div class="button-prev">
                            <?php get_template_part('assets/icons/arrow-left.svg'); ?>
                        </div>
                        <div class="button-next">
                            <?php get_template_part('assets/icons/arrow-left.svg'); ?>
                        </div>
                        <div class="label">
                            <span id="option-alt-active-title"></span> : <span id="option-alt-active-label"></span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="menus">
                <?php if (have_rows('menus')) :
                    while (have_rows('menus')) : the_row();
                        $tab_index = get_row_index();
                        $title = get_sub_field('title'); ?>
                        <nav id="menu-<?php echo $tab_index; ?>" class="menu">
                            <h3 tabindex="0" role="button"><?php echo $title; ?></h3>
                            <div class="accordion-content">
                                <div class="accordion-list">
                                    <?php if (have_rows('elements')) :
                                        while (have_rows('elements')) : the_row();
                                            $element_index = get_row_index();
                                            $label = get_sub_field('label'); ?>
                                            <button data-tab-target="<?php echo $tab_index; ?>" data-element-target="<?php echo $element_index; ?>"><?php echo $label; ?></button>
                                    <?php endwhile;
                                    endif; ?>
                                </div>
                            </div>
                        </nav>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>