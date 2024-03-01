<!-- Home Video -->
<div id="home-video">
    <div class="container container-sm">
        <?php if (get_field("home_video_badge")) : ?>
            <img src="<?php echo get_field("home_video_badge")["url"]; ?>" alt="<?php echo get_field("home_video_badge")["alt"]; ?>">
        <?php endif; ?>
        <?php if (get_field("home_video_title")) : ?>
            <h2><?php echo get_field("home_video_title"); ?></h2>
        <?php endif; ?>
        <?php if (get_field("home_video_text")) : ?>
            <?php echo get_field("home_video_text"); ?>
        <?php endif; ?>
        <hr />
        <div class="socials-wrapper">
            <?php if (get_field("home_video_socials_title")) : ?>
                <h3 class="p-size"><?php echo get_field("home_video_socials_title"); ?></h3>
            <?php endif; ?>
            <?php if (have_rows('home_video_socials')) : ?>
                <div class="socials">
                    <?php while (have_rows('home_video_socials')) : the_row();
                        $icon = get_sub_field('icon');
                        $link = get_sub_field('link'); ?>
                        <a href="<?php echo $link; ?>" target="_blank" class="social">
                            <?php echo file_get_contents(get_template_directory_uri() . '/assets/icons/socials/' . $icon . '.svg'); ?>
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if (get_field("home_video_file")) : ?>
            <div class="video-wrapper">
                <div class="video">
                    <video <?php if (get_field("home_video_poster")) : ?> poster="<?php echo get_field("home_video_poster"); ?>" <?php endif; ?> tabindex="0">
                        <source src="<?php echo get_field("home_video_file")["url"]; ?>" type="video/<?php echo pathinfo(get_field("home_video_file")["url"])['extension']; ?>">
                        <p>Votre navigateur ne prend pas en charge les vidéos HTML5.</p>
                    </video>
                    <div class="play"></div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>