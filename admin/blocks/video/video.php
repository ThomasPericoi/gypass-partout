<?php

/**
 * Video Template.
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
$text = get_field('text');
$img = get_field('img');
$cta = get_field('cta');
$sub = get_field('sub');
$sub_img = get_field('sub_img');
$sub_text = get_field('sub_text');
$media = get_field("media");
$video = get_field("video");
$video_poster = get_field("video_poster");
$youtube = get_field("youtube");

$container = get_field('container_size');
$background = get_field('background');
$border_top = get_field('border_top');
$gif_mode = get_field("gif_mode");

$classes = array('video-block', $background, $border_top);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);
?>

<!-- Block - Video -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container container-sm">
        <div class="introduction">
            <?php if ($title) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($text) : ?>
                <div><?php echo $text; ?></div>
            <?php endif; ?>
            <?php if ($img) : ?>
                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" />
            <?php endif; ?>
            <?php if ($cta) : ?>
                <a href="<?php echo $cta["url"]; ?>" class="btn btn-outline-primary"><?php echo $cta["title"]; ?></a>
            <?php endif; ?>
            <?php if ($sub && ($sub_img || $sub_text)) : ?>
                <div class="sub-section">
                    <?php if ($sub_img) : ?>
                        <img src="<?php echo $sub_img['url']; ?>" alt="<?php echo $sub_img['alt']; ?>" />
                    <?php endif; ?>
                    <?php if ($sub_text) : ?>
                        <div><?php echo $sub_text; ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if ($media && ($video || $youtube)) : ?>
        <div class="container <?php echo $container; ?>">
            <div class="media">
                <?php if (($media == "video") && $video) : ?>
                    <div class="video-wrapper cover">
                        <?php if ($gif_mode == "true") : ?>
                            <video class="gif" src="<?php echo $video; ?>" loop autoplay muted playsinline>
                            </video>
                        <?php else : ?>
                            <video src="<?php echo $video; ?>" loop playsinline tabindex="0" <?php if ($video_poster) : ?>poster="<?php echo $video_poster['url']; ?>" <?php endif; ?>>
                            </video>
                            <div class="play"></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if (($media == "youtube") && $youtube) : ?>
                    <div class="video-wrapper">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</section>