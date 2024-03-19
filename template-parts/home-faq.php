<!-- Home F.A.Q. -->
<section id="home-faq" class="faq-block">
    <div class="container">
        <?php if (get_field("home_faq_title")) : ?>
            <h2><?php echo get_field("home_faq_title"); ?></h2>
        <?php endif; ?>
        <?php if (have_rows('home_faq')) : ?>
            <ul class="faq-list">
                <?php while (have_rows('home_faq')) : the_row();
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                ?>
                    <details class="faq">
                        <summary>
                            <h3 class="h4-size"><?php echo $title; ?></h3>
                        </summary>
                        <?php if ($text) : ?>
                            <div class="content formatted">
                                <?php echo $text; ?>
                            </div>
                        <?php endif; ?>
                    </details>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>