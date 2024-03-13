<!-- CTA Banner -->
<section class="cta-banner <?php echo $args['class'] ?: 'cta-banner-classic'; ?>">
    <div class="container container-sm">
        <?php if ($args['title']) : ?>
            <h2><?php echo $args['title']; ?></h2>
        <?php endif; ?>
        <?php if ($args['description'] || $args['cta']) : ?>
            <p class="h2-size"><?php echo $args['description']; ?><?php if ($args['cta']) : ?> <a href="<?php echo $args['cta']["url"]; ?>" target="<?php echo $args['cta']["target"]; ?>"><?php echo $args['cta']["title"]; ?></a><?php endif; ?></p>
        <?php endif; ?>
    </div>
</section>