<!-- CTA Banner -->
<section class="cta-banner-block">
    <div class="container container-sm">
        <?php if ($args['title']) : ?>
            <h2><?php echo $args['title']; ?></h2>
        <?php endif; ?>
        <?php if ($args['description'] || $args['cta']) : ?>
            <p class="h2-size"><?php echo $args['description']; ?><?php if ($args['cta']) : ?> <a href="<?php echo $args['cta']["url"]; ?>" target="<?php echo $args['cta']["target"]; ?>"><?php echo $args['cta']["title"]; ?></a><?php endif; ?>
            <?php if ($args['additional_description'] && $args['additional_cta']) : ?>
                <br /><?php echo $args['additional_description']; ?><?php if ($args['additional_cta']) : ?> <a href="<?php echo $args['additional_cta']["url"]; ?>" target="<?php echo $args['additional_cta']["target"]; ?>"><?php echo $args['additional_cta']["title"]; ?></a><?php endif; ?>
        <?php endif; ?>
            </p>
        <?php endif; ?>
    </div>
</section>