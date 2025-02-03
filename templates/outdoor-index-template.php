<?php
/* Template Name: Page Outdoor */
get_header(); ?>

<!-- Hero -->
<section id="outdoor-hero" style="background-image: url(<?php echo get_field("outdoor_hero_background"); ?>);">
    <div class="container container-lg">
        <h1 class="h1-size"><?php echo get_field("outdoor_hero_title"); ?></h1>
        <a class="btn-scroll" href="#outdoor-content-1">
            <?php get_template_part('assets/icons/arrow-line-bottom.svg'); ?>
        </a>
        <img class="badge" src="<?php echo get_field("outdoor_hero_badge")['url']; ?>" alt="<?php echo get_field("outdoor_hero_badge")['title']; ?>">
    </div>
</section>

<!-- Content 1 -->
<section id="outdoor-content-1">
    <div class="container container-sm">
        <div class="cols-wrapper">
            <div class="col">
                <div class="title-wrapper">
                    <h2 class="h1-size"><?php echo get_field("outdoor_content_1_title"); ?></h2>
                </div>
                <?php if (get_field("outdoor_content_1_video")) : ?>
                    <video <?= get_field("outdoor_content_1_video_poster") ? 'poster="' . get_field("outdoor_content_1_video_poster") . '"' : '' ?> src="<?php echo get_field("outdoor_content_1_video")["url"]; ?>" controls></video>
                <?php endif; ?>
            </div>
            <div class="col formatted" style="--content-spacing: 1rem;">
                <div class="introduction formatted">
                    <?php echo get_field("outdoor_content_1_introduction"); ?>
                </div>
                <div class="content formatted">
                    <?php echo get_field("outdoor_content_1_content"); ?>
                </div>
                <div class="warning">
                    <span><?php echo __("Un impératif : ", "gypass"); ?></span><?php echo get_field("outdoor_content_1_warning"); ?>
                </div>
                <a class="btn" href="<?php echo get_field("outdoor_content_1_button"); ?>"><?php echo get_field("outdoor_content_1_button_label"); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Content 2 -->
<section id="outdoor-content-2">
    <div class="container container-sm">
        <div class="cols-wrapper">
            <div class="col">
                <figure id="outdoor-image-1">
                    <img src="<?php echo esc_url(get_field("outdoor_content_2_image_1")['url']); ?>" alt="<?php echo esc_attr(get_field("outdoor_content_2_image_1")['alt']); ?>" />
                    <p class="caption"><?php echo esc_html(get_field("outdoor_content_2_image_1")['caption']); ?></p>
                </figure>
            </div>
            <div class="col">
                <figure id="outdoor-image-2">
                    <img src="<?php echo esc_url(get_field("outdoor_content_2_image_2")['url']); ?>" alt="<?php echo esc_attr(get_field("outdoor_content_2_image_2")['alt']); ?>" />
                    <p class="caption"><?php echo esc_html(get_field("outdoor_content_2_image_2")['caption']); ?></p>
                </figure>
            </div>
        </div>
    </div>
    <div class="container container-sm formatted" style="--content-spacing: 1rem;">
        <div class="title-wrapper">
            <h2 class="h1-size"><?php echo get_field("outdoor_content_2_title"); ?></h2>
        </div>
        <div class="introduction formatted">
            <?php echo get_field("outdoor_content_2_introduction"); ?>
        </div>
        <?php if (get_field('outdoor_content_2_introduction_download')) : ?>
            <div class="introduction-download">
                <?php echo get_field("outdoor_content_2_introduction_download"); ?>
                <a class="btn" href="<?php echo get_field("outdoor_content_2_files"); ?>"><?php echo get_field("outdoor_content_2_files_label"); ?></a>
            </div>
        <?php endif; ?>
        <div class="content formatted">
            <?php echo get_field("outdoor_content_2_content"); ?>
            <?php if (have_rows('outdoor_content_2_list')) : ?>
                <ul class="check-list">
                    <?php while (have_rows('outdoor_content_2_list')) : the_row();
                        $content = get_sub_field('content');
                    ?>
                        <li><?php echo $content; ?></li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
        <a class="btn" href="<?php echo get_field("outdoor_content_2_button"); ?>"><?php echo get_field("outdoor_content_2_button_label"); ?></a>
    </div>
    <div class="container">
        <div class="cols-wrapper">
            <div class="col">
                <figure id="outdoor-image-3">
                    <img src="<?php echo esc_url(get_field("outdoor_content_2_image_3")['url']); ?>" alt="<?php echo esc_attr(get_field("outdoor_content_2_image_3")['alt']); ?>" />
                    <p class="caption"><?php echo esc_html(get_field("outdoor_content_2_image_3")['caption']); ?></p>
                </figure>
            </div>
            <div class="col">
                <figure id="outdoor-image-4">
                    <img src="<?php echo esc_url(get_field("outdoor_content_2_image_4")['url']); ?>" alt="<?php echo esc_attr(get_field("outdoor_content_2_image_4")['alt']); ?>" />
                    <p class="caption"><?php echo esc_html(get_field("outdoor_content_2_image_4")['caption']); ?></p>
                </figure>
            </div>
        </div>
    </div>
</section>

<!-- Awards -->
<section id="outdoor-awards">
    <div class="container">
        <div class="title-wrapper">
            <h2 class="h1-size"><?php echo get_field("outdoor_awards_title"); ?></h2>
        </div>
    </div>
    <div class="container container-lg">
        <?php if (have_rows('outdoor_awards_awards')) : ?>
            <div class="awards">
                <?php while (have_rows('outdoor_awards_awards')) : the_row();
                    $title = get_sub_field('title');
                    $subtitle = get_sub_field('subtitle');
                    $color = get_sub_field('color');
                ?>
                    <div class="award" style="--theme: var(--<?php echo $color; ?>);">
                        <h3><?php echo $title; ?></h3>
                        <?php if ($subtitle) : ?>
                            <p><?php echo $subtitle; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <p class="legend"><?php echo get_field("outdoor_awards_legend"); ?></p>
    </div>
</section>

<!-- Jury -->
<section id="outdoor-jury">
    <div class="container">
        <div class="cols-wrapper">
            <div class="col">
                <figure id="outdoor-image-5">
                    <img src="<?php echo esc_url(get_field("outdoor_jury_image")['url']); ?>" alt="<?php echo esc_attr(get_field("outdoor_jury_image")['alt']); ?>" />
                    <p class="caption"><?php echo esc_html(get_field("outdoor_jury_image")['caption']); ?></p>
                </figure>
            </div>
            <div class="col">
                <div class="title-wrapper">
                    <h2 class="h1-size"><?php echo get_field("outdoor_jury_title"); ?></h2>
                </div>
                <p class="subtitle">
                    <?php echo get_field("outdoor_jury_subtitle"); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Calendar -->
<section id="outdoor-calendar">
    <div class="container container-sm">
        <div class="title-wrapper">
            <h2 class="h1-size"><?php echo get_field("outdoor_calendar_title"); ?></h2>
        </div>
        <?php if (have_rows('outdoor_calendar_categories')) : ?>
            <div class="cols-wrapper">
                <?php while (have_rows('outdoor_calendar_categories')) : the_row();
                    $title = get_sub_field('title');
                ?>
                    <div class="col">
                        <h3><?php echo $title; ?></h3>
                        <?php if (have_rows('list')) : ?>
                            <ul>
                                <?php while (have_rows('list')) : the_row();
                                    $title = get_sub_field('title');
                                    $subtitle = get_sub_field('subtitle');
                                ?>
                                    <li>
                                        <strong><?php echo $title; ?></strong>
                                        <p><?php echo $subtitle; ?></p>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <figure id="outdoor-image-6">
            <img src="<?php echo esc_url(get_field("outdoor_calendar_image")['url']); ?>" alt="<?php echo esc_attr(get_field("outdoor_calendar_image")['alt']); ?>" />
            <p class="caption"><?php echo esc_html(get_field("outdoor_calendar_image")['caption']); ?></p>
        </figure>
    </div>
</section>

<!-- How -->
<section id="outdoor-how">
    <div class="container">
        <div class="title-wrapper">
            <h2 class="h1-size"><?php echo get_field("outdoor_how_title"); ?></h2>
        </div>
        <?php if (have_rows('outdoor_how_steps')) : ?>
            <div class="steps">
                <?php while (have_rows('outdoor_how_steps')) : the_row();
                    $title = get_sub_field('title');
                    $subtitle = get_sub_field('subtitle');
                    $button = get_sub_field('button');
                ?>
                    <div class="step">
                        <span><?php echo get_row_index(); ?></span>
                        <h3><?php echo $title; ?></h3>
                        <p><?php echo $subtitle; ?></p>
                        <?php if ($button) : ?>
                            <a class="btn btn-secondary" href="<?php echo $button["url"]; ?>"><?php echo $button["title"]; ?></a>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>