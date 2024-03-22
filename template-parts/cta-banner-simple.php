<!-- CTA Banner (Simple) -->
<section class="cta-banner-block cta-banner-block-simple" style="background-color: <?php echo $args['background'] ?: 'var(--bay-of-many)'; ?>">
    <div class="container container-sm">
        <?php if ($args['title']) : ?>
            <h2><?php echo $args['title']; ?></h2>
        <?php endif; ?>
        <?php if ($args['cta']) : ?>
            <a class="btn btn-outline-white" href="<?php echo $args['cta']["url"]; ?>" target="<?php echo $args['cta']["target"]; ?>"><?php echo $args['cta']["title"]; ?></a>
        <?php endif; ?>
    </div>
</section>