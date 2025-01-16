<?php

/**
 * Content (2 columns) Template.
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
$media = get_field("media");
$image = get_field("image");
$video = get_field("video");
$video_poster = get_field("video_poster");

$order = get_field('order');

$classes = array('content-2-columns-block', $order);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);
?>

<!-- Block - Content (2 columns) -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="cols-wrapper">
        <div class="content formatted">
            <?php if ($title) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php echo $content; ?>
        </div>
        <?php if ($image || $video) : ?>
            <div class="media">
                <?php if (($media == "image") && $image) : ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php elseif (($media == "video") && $video) : ?>
                    <div class="video-wrapper cover">
                        <video src="<?php echo $video; ?>" loop playsinline tabindex="0" <?php if ($video_poster) : ?>poster="<?php echo $video_poster['url']; ?>" <?php endif; ?>>
                        </video>
                        <div class="play"></div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>