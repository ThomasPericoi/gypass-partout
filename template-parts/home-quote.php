<!-- Home Quote -->
<section id="home-quote">
    <div class="container container-sm">
        <?php if (get_field("home_quote_badge")) : ?>
            <img src="<?php echo get_field("home_quote_badge")["url"]; ?>" alt="<?php echo get_field("home_quote_badge")["alt"]; ?>">
        <?php endif; ?>
        <?php if (get_field("home_quote_title")) : ?>
            <h1 class="h2-size"><?php echo get_field("home_quote_title"); ?></h1>
        <?php endif; ?>
        <?php if (get_field("home_quote_text")) : ?>
            <?php echo get_field("home_quote_text"); ?>
        <?php endif; ?>
    </div>
</section>