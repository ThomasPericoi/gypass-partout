<?php

/**
 * Accordion Tabs Crossed Template.
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
$title = get_field('title');
$content = get_field('content');
$cta = get_field('cta');
$options_title = get_field('options_title');
$options_count = count(get_field('options'));

$options_mode = get_field('options_mode');

$container = get_field('container_size');
$background = get_field('background');
$border_top = get_field('border_top');

$classes = array('accordion-tabs-block', 'accordion-tabs-crossed-block', $background, $border_top);
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
        <div class="cols-wrapper">
            <div class="content formatted">
                <?php if ($title) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php echo $content; ?>
                <?php if ($cta) : ?>
                    <a href="<?php echo $cta["url"]; ?>" class="btn btn-outline-primary" target="<?php echo $cta["target"]; ?>"><?php echo $cta["title"]; ?></a>
                <?php endif; ?>
                <?php if (have_rows('options')) : ?>
                    <div class="options-wrapper">
                        <div class="label">
                            <?php echo $options_title; ?> : <span id="active-label"></span>
                        </div>
                        <?php if ($options_mode == "color") : ?>
                            <nav class="options options-<?php echo $options_count; ?> <?php echo $options_mode; ?>">
                                <?php while (have_rows('options')) : the_row();
                                    $id = get_sub_field('id');
                                    $title = get_sub_field('title');
                                    $color = get_sub_field('color');
                                    $color_bg = get_sub_field('color_bg');
                                    $bg = $color ? "background-color:" . $color . ";" : "background-image: url(" . $color_bg . ");" ?>
                                    <button class="color" id="<?php echo $id; ?>" data-label="<?php echo $title; ?>" style="<?php echo $bg; ?>" title="<?php echo $title; ?>"></button>
                                <?php endwhile; ?>
                            </nav>
                        <?php else : ?>
                            <nav class="options options-<?php echo $options_count; ?> <?php echo $options_mode; ?>">
                                <?php while (have_rows('options')) : the_row();
                                    $id = get_sub_field('id');
                                    $title = get_sub_field('title');
                                    $image = get_sub_field('image'); ?>
                                    <button class="image" id="<?php echo $id; ?>" data-label="<?php echo $title; ?>" title="<?php echo $title; ?>">
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    </button>
                                <?php endwhile; ?>
                            </nav>
                        <?php endif; ?>
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
                                        $options_id = get_sub_field('options_id'); ?>
                                        <img data-options-id="<?php echo $options_id; ?>" data-tab-index="<?php echo $tab_index; ?>" data-element-index="<?php echo $element_index; ?>" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php endwhile;
                                endif;
                            endwhile;
                        endif;
                    endwhile;
                endif; ?>
            </div>
            <div class="menus">
                <?php if (have_rows('menus')) :
                    while (have_rows('menus')) : the_row();
                        $tab_index = get_row_index();
                        $title = get_sub_field('title'); ?>
                        <nav id="menu-<?php echo $tab_index; ?>" class="menu">
                            <p class="title" tabindex="0" role="button"><?php echo $title; ?></p>
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