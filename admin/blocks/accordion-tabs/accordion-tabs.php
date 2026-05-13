<?php

/**
 * Accordion Tabs Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$id = uniqid("accordion-");
$intro_title = get_field('intro_title');
$intro_content = get_field('intro_content');
$image = get_field('image');
$title = get_field('title');
$content = get_field('content');
$cta = get_field('cta');

$cta_classname = get_field('cta_classname');

$container = get_field('container_size');
$background = get_field('background');
$border_top = get_field('border_top');
$scroll = get_field('scroll');

$classes = array('accordion-tabs-block', $background, $border_top, $scroll);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);
?>

<!-- Block - Accordion Tabs -->
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
            <div class="content formatted">
                <?php if ($image) : ?>
                    <img class="logo" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php endif; ?>
                <?php if ($title) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php echo $content; ?>
                <?php if ($cta) : ?>
                    <a href="<?php echo $cta["url"]; ?>" class="btn btn-outline-primary <?php if ($cta_classname) : echo $cta_classname;
                                                                                        endif; ?>" target="<?php echo $cta["target"]; ?>"><?php echo $cta["title"]; ?></a>
                <?php endif; ?>
            </div>
            <div class="media">
                <?php if (have_rows('menus')) :
                    while (have_rows('menus')) : the_row();
                        $tab_index = get_row_index();
                        if (have_rows('elements')) :
                            while (have_rows('elements')) : the_row();
                                $element_index = get_row_index();
                                $media = get_sub_field('media');
                                $image = get_sub_field('image');
                                $video = get_sub_field('video'); ?>
                                <?php if (($media == "image") && $image) : ?>
                                    <img data-tab-index="<?php echo $tab_index; ?>" data-element-index="<?php echo $element_index; ?>" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                <?php elseif (($media == "video") && $video) : ?>
                                    <div class="video-wrapper cover" data-tab-index="<?php echo $tab_index; ?>" data-element-index="<?php echo $element_index; ?>">
                                        <video class="gif" src="<?php echo $video; ?>" loop autoplay muted playsinline>
                                        </video>
                                    </div>
                                <?php endif; ?>
                <?php endwhile;
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