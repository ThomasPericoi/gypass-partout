<!-- CTA Trio -->
<section id="cta-trio">
    <div class="container">
        <?php if (have_rows('global_ctas', 'options')) : ?>
            <div class="ctas">
                <?php while (have_rows('global_ctas', 'options')) : the_row();
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $button = get_sub_field('button');
                ?>
                    <div class="cta">
                        <img src="<?php echo $icon["url"]; ?>" alt="<?php echo $icon["alt"]; ?>">
                        <h2 class="h3-size"><?php echo $title; ?></h2>
                        <p><?php echo $text; ?></p>
                        <a href="<?php echo $button["url"]; ?>" target="<?php echo $button["target"]; ?>" class="btn btn-outline-secondary"><?php echo $button["title"]; ?></a>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>