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

$sup_img = get_field('sup_img');
$title = get_field('title');
$text = get_field('text');
$img = get_field('img');
$cta = get_field('cta');
$sub_img = get_field('sub_img');
$sub_text = get_field('sub_text');
$video = get_field("video");
$video_poster = get_field("video_poster");
$youtube = get_field("youtube");

$sub = get_field('sub');
$media = get_field("media");

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

/* Schema.org */
$video_schema = null;

if ($media && ($video || $youtube)) {
    $video_name = $title ? wp_strip_all_tags($title) : get_the_title($post_id);
    $video_description = $text ? wp_strip_all_tags($text) : get_the_excerpt($post_id);

    $thumbnail_url = null;

    if ($video_poster && !empty($video_poster['url'])) {
        $thumbnail_url = $video_poster['url'];
    } elseif ($img && !empty($img['url'])) {
        $thumbnail_url = $img['url'];
    } elseif (has_post_thumbnail($post_id)) {
        $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full');
    } elseif ($youtube) {
        $thumbnail_url = 'https://img.youtube.com/vi/' . $youtube . '/maxresdefault.jpg';
    }

    if ($video_name && $video_description && $thumbnail_url) {
        $video_schema = [
            '@context' => 'https://schema.org',
            '@type' => 'VideoObject',
            'name' => $video_name,
            'description' => $video_description,
            'thumbnailUrl' => [$thumbnail_url],
            'uploadDate' => get_the_date('c', $post_id),
        ];

        if ($media === 'youtube' && $youtube) {
            $video_schema['embedUrl'] = 'https://www.youtube.com/embed/' . $youtube;
            $video_schema['contentUrl'] = 'https://www.youtube.com/watch?v=' . $youtube;
        }

        if ($media === 'video' && $video) {
            $video_schema['contentUrl'] = $video;
        }
    }
}
?>

<!-- Block - Video -->
<?php if ($video_schema) : ?>
    <script type="application/ld+json">
        <?php echo wp_json_encode($video_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>
    </script>
<?php endif; ?>

<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container container-sm">
        <div class="introduction">
            <?php if ($sup_img) : ?>
                <img src="<?php echo $sup_img['url']; ?>" alt="<?php echo $sup_img['alt']; ?>" />
            <?php endif; ?>
            <?php if ($title) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($text) : ?>
                <div class="formatted"><?php echo $text; ?></div>
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