<?php

/**
 * Shades Template.
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
$instructions = get_field('instructions');
$text = get_field('text');
$download_chart_file = get_field('download_chart_file');
$download_chart_label = get_field('download_chart_label');
$cta = get_field('cta');

$container = get_field('container_size');

$classes = array('shades-block');
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("--theme: var(--bay-of-many)", "--primary: var(--bay-of-many");
$style  = implode('; ', $styles);
?>

<!-- Block - Shades -->
<section class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container <?php echo $container; ?>">
        <div class="col-wrapper">
            <div class="selector">
                <div class="introduction">
                    <?php if ($title) : ?>
                        <div>
                            <h2><?php echo $title; ?></h2>
                        </div>
                    <?php endif; ?>
                    <?php if ($text) : ?>
                        <?php echo $text; ?>
                    <?php endif; ?>
                    <?php if ($instructions) : ?>
                        <p class="instructions"><?php echo $instructions; ?></p>
                    <?php endif; ?>
                </div>
                <div class="shades-wrapper">
                    <?php if (have_rows('shades_1')) : ?>
                        <div id="shades-1" class="shades">
                            <h3 class="shades-title p-size"><span id="shades-count-1"></span> <?php echo __("teintes Fine texture"); ?></h3>
                            <div class="shades-grid">
                                <?php while (have_rows('shades_1')) : the_row();
                                    $label = get_sub_field('code_label');
                                    $code = get_sub_field('code');
                                    $background_thumbnail = get_sub_field('background_thumbnail');
                                    $background = get_sub_field('background');
                                    $theme = get_sub_field('theme');
                                ?>
                                    <button style="--thumbnail: url(<?php echo $background_thumbnail["url"]; ?>);" data-label="<?php echo $label; ?>" data-code="<?php echo $code; ?>" data-background="<?php echo $background["url"]; ?>" data-theme="<?php echo $theme; ?>"></button>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (have_rows('shades_2')) : ?>
                        <div id="shades-2" class="shades">
                            <h3 class="shades-title p-size"><span id="shades-count-2"></span> <?php echo __("teintes Sablée"); ?></h3>
                            <div class="shades-grid">
                                <?php while (have_rows('shades_2')) : the_row();
                                    $label = get_sub_field('code_label');
                                    $code = get_sub_field('code');
                                    $background_thumbnail = get_sub_field('background_thumbnail');
                                    $background = get_sub_field('background');
                                    $theme = get_sub_field('theme');
                                ?>
                                    <button style="--thumbnail: url(<?php echo $background_thumbnail["url"]; ?>);" data-label="<?php echo $label; ?>" data-code="<?php echo $code; ?>" data-background="<?php echo $background["url"]; ?>" data-theme="<?php echo $theme; ?>"></button>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (have_rows('shades_3')) : ?>
                        <div id="shades-3" class="shades">
                            <h3 class="shades-title p-size"><?php echo __("Teinte Métallisée mat"); ?></h3>
                            <div class="shades-grid">
                                <?php while (have_rows('shades_3')) : the_row();
                                    $label = get_sub_field('code_label');
                                    $code = get_sub_field('code');
                                    $background_thumbnail = get_sub_field('background_thumbnail');
                                    $background = get_sub_field('background');
                                    $theme = get_sub_field('theme');
                                ?>
                                    <button style="--thumbnail: url(<?php echo $background_thumbnail["url"]; ?>);" data-label="<?php echo $label; ?>" data-code="<?php echo $code; ?>" data-background="<?php echo $background["url"]; ?>" data-theme="<?php echo $theme; ?>"></button>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div id="shades-4" class="shades">
                        <h3 class="shades-title p-size"><?php echo __("Teinte personnalisée"); ?></h3>
                        <div class="shades-grid">
                            <span></span>
                        </div>
                    </div>
                </div>
                <?php if ($download_chart_file && $download_chart_label) : ?>
                    <p class="chart"><?php echo $download_chart_label; ?> <a href="<?php echo $download_chart_file; ?>" download><?php echo __("ici", "gypass") ?></a></p>
                <?php endif; ?>
                <?php if ($cta) : ?>
                    <a href="<?php echo $cta["url"]; ?>" class="btn btn-outline-primary" target="<?php echo $cta["target"]; ?>"><?php echo $cta["title"]; ?></a>
                <?php endif; ?>
            </div>
            <div class="result">
                <span id="selector-code-label"></span>
                <span id="selector-code"></span>
            </div>
        </div>
    </div>
</section>