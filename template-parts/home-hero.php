<?php if (have_rows('home_hero_slider')) : ?>
    <!-- Home Hero -->
    <section id="home-hero" class="swiper">
        <div class="swiper-wrapper">
            <?php while (have_rows('home_hero_slider')) : the_row();
                $news = get_sub_field('news');
                $backgrounds = get_sub_field('background');
                $background_mobile = get_sub_field('background_mobile');
                $shadowed = get_sub_field('shadowed');
                $background_video = get_sub_field('background_video');
                $background_video_mobile = get_sub_field('background_video_mobile');
                $title = get_sub_field('title');
                $label = get_sub_field('label');
                $url = get_sub_field('url');
                $class = get_sub_field('class');
                $range = get_sub_field('range');
                $range_label = get_sub_field('range_label');
                $badge = get_sub_field('badge');
            ?>
                <?php if (count($backgrounds) > 1) : ?>
                    <a <?= $url ? 'href="' . $url . '"' : '' ?> class="swiper-slide">
                        <div class="nested-slider swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($backgrounds as $background) : ?>
                                    <div class="slider-element <?= $news ? 'news' : '' ?> <?= $shadowed ? 'shadowed' : '' ?> swiper-slide" style="--background: <?php echo $background; ?>;">
                                        <div class="container container-lg <?php if ($class) : echo $class;
                                                                            endif; ?>">
                                            <?php if ($range_label && $news) : ?>
                                                <div class="range h4-size">
                                                    <?php echo $range_label; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($range) : ?>
                                                <img class="range" src="<?php echo $range["url"]; ?>" alt="<?php echo $range["title"]; ?>" />
                                            <?php endif; ?>
                                            <?php if ($badge) : ?>
                                                <img class="badge" src="<?php echo $badge["url"]; ?>" alt="<?php echo $badge["title"]; ?>" />
                                            <?php endif; ?>
                                            <?php if ($news && $title) : ?>
                                                <div class="h1-size">
                                                    <?php echo $title; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($label) : ?>
                                                <span class="btn btn-outline-white" tabindex="0" role="button"><?php echo $label; ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </a>
                <?php else : ?>
                    <a <?= $url ? 'href="' . $url . '"' : '' ?> class="slider-element <?= $news ? 'news' : '' ?> <?= $shadowed ? 'shadowed' : '' ?> <?= ($background_mobile || $background_video_mobile) ? 'mobile' : '' ?> swiper-slide" style="<?= $backgrounds[0] ? '--background: url(' . $backgrounds[0] . ');' : '' ?> <?= $background_mobile ? '--background-mobile: url(' . $background_mobile . ');' : '' ?>">
                        <?php if ($background_video) : ?>
                            <video class="background-video background-video-desktop" src="<?php echo $background_video["url"]; ?>" autoplay muted inline"></video>
                        <?php endif; ?>
                        <?php if ($background_video_mobile) : ?>
                            <video class="background-video background-video-mobile" src="<?php echo $background_video_mobile["url"]; ?>" autoplay muted inline"></video>
                        <?php endif; ?>
                        <div class="container container-lg <?php if ($class) : echo $class;
                                                            endif; ?>">
                            <?php if ($range_label && $news) : ?>
                                <div class="range h4-size">
                                    <?php echo $range_label; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($range) : ?>
                                <img class="range" src="<?php echo $range["url"]; ?>" alt="<?php echo $range["title"]; ?>" />
                            <?php endif; ?>
                            <?php if ($badge) : ?>
                                <img class="badge" src="<?php echo $badge["url"]; ?>" alt="<?php echo $badge["title"]; ?>" />
                            <?php endif; ?>
                            <?php if ($news && $title) : ?>
                                <div class="h1-size">
                                    <?php echo $title; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($label) : ?>
                                <span class="btn btn-outline-white" tabindex="0" role="button"><?php echo $label; ?></span>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
        <a class="btn-scroll" href="#home-quote">
            <?php get_template_part('assets/icons/arrow-line-bottom.svg'); ?>
        </a>
    </section>
<?php endif; ?>