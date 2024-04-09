<?php

/**
 * Content (3 columns) Template.
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
$image = get_field("image");

$container = get_field('container_size');
$background = get_field('background');
$border_top = get_field('border_top');

$classes = array('content-3-columns-block', $background, $border_top);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);
?>

<!-- Block - Content (3 columns) -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container <?php echo $container; ?>">
        <div class="col-wrapper">
            <div class="content formatted">
                <?php if ($title) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php echo $content; ?>
                <?php if ($cta) : ?>
                    <a href="<?php echo $cta["url"]; ?>" class="btn btn-outline-primary" target="<?php echo $cta["target"]; ?>"><?php echo $cta["title"]; ?></a>
                <?php endif; ?>
            </div>
            <?php if ($image) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            <?php endif; ?>
            <div class="features" style="--primary: var(--manatee); --content-color: var(--manatee);">
                <?php if (have_rows('features')) : ?>
                    <?php while (have_rows('features')) : the_row();
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
                    ?>
                        <div class="feature formatted">
                            <?php if ($title) : ?>
                                <h3 class="p-size"><?php echo $title; ?></h3>
                            <?php endif; ?>
                            <?php if ($content) : ?>
                                <?php echo $content; ?>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>