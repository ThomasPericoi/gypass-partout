<?php if (have_rows('home_hero_slider')) : ?>
    <!-- Home Hero -->
    <section id="home-hero" class="swiper">
        <div class="swiper-wrapper">
            <?php while (have_rows('home_hero_slider')) : the_row();
                $backgrounds = get_sub_field('background');
                $title = get_sub_field('title');
                $label = get_sub_field('label');
                $url = get_sub_field('url');
                $range = get_sub_field('range');
                $badge = get_sub_field('badge');
                $class = get_sub_field('class');
                $news = get_sub_field('news');
            ?>
                <?php if (count($backgrounds) > 1) : ?>
                    <div class="swiper-slide">
                        <div class="nested-slider swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($backgrounds as $background) : ?>
                                    <div class="slider-element <?php if ($news) : ?>news<?php endif; ?>  swiper-slide" style="background-image: url('<?php echo $background; ?>');">
                                        <div class="container container-lg <?php if ($class) : echo $class;
                                                                            endif; ?>">
                                            <?php if ($range) : ?>
                                                <img class="range" src="<?php echo $range["url"]; ?>" alt="<?php echo $range["title"]; ?>" />
                                            <?php endif; ?>
                                            <?php if ($badge) : ?>
                                                <img class="badge" src="<?php echo $badge["url"]; ?>" alt="<?php echo $badge["title"]; ?>" />
                                            <?php endif; ?>
                                            <?php if ($news) : ?>
                                                <div class="h1-size">
                                                    <?php echo $title; ?>
                                                </div>
                                            <?php endif; ?>
                                            <a <?php if ($url) : ?>href="<?php echo $url; ?>" <?php endif; ?> class="btn btn-outline-white"><?php echo $label; ?></a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="slider-element <?php if ($news) : ?>news<?php endif; ?>  swiper-slide" style="background-image: url('<?php echo $backgrounds[0]; ?>');">
                        <div class="container container-lg <?php if ($class) : echo $class;
                                                            endif; ?>">
                            <?php if ($range) : ?>
                                <img class="range" src="<?php echo $range["url"]; ?>" alt="<?php echo $range["title"]; ?>" />
                            <?php endif; ?>
                            <?php if ($badge) : ?>
                                <img class="badge" src="<?php echo $badge["url"]; ?>" alt="<?php echo $badge["title"]; ?>" />
                            <?php endif; ?>
                            <?php if ($news) : ?>
                                <div class="h1-size">
                                    <?php echo $title; ?>
                                </div>
                            <?php endif; ?>
                            <a <?php if ($url) : ?>href="<?php echo $url; ?>" <?php endif; ?> class="btn btn-outline-white"><?php echo $label; ?></a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
        <a class="btn-scroll" href="#home-quote">
            <?php get_template_part('assets/icons/arrow-line-bottom.svg'); ?>
        </a>
    </section>
<?php endif; ?>