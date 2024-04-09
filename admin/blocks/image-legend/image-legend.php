<?php

/**
 * Image w/ legend Template.
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
$cta_classname = get_field('cta_classname');
$media = get_field("media");
$image = get_field("image");
$video = get_field("video");

$container = get_field('container_size');
$background = get_field('background');
$border_top = get_field('border_top');

$classes = array('image-legend-block', $background, $border_top);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);
?>

<!-- Block - Image w/ legend -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container <?php echo $container; ?>">
        <div class="col-wrapper">
            <div class="content formatted">
                <?php if ($title) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php echo $content; ?>
                <?php if ($cta) : ?>
                    <a href="<?php echo $cta["url"]; ?>" class="btn btn-outline-primary <?php if ($cta_classname) : echo $cta_classname;
                                                                                        endif; ?>" target="<?php echo $cta["target"]; ?>"><?php echo $cta["title"]; ?></a>
                <?php endif; ?>
            </div>
            <?php if ($image || $video) : ?>
                <div class="media">
                    <?php if (($media == "image") && $image) : ?>
                        <figure>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php if ($image['caption']) : ?>
                                <figcaption><?php echo $image['caption']; ?></figcaption>
                            <?php endif; ?>
                        </figure>
                    <?php elseif (($media == "video") && $video) : ?>
                        <div class="video-wrapper cover">
                            <video class="gif" src="<?php echo $video; ?>" loop autoplay muted playsinline>
                            </video>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>