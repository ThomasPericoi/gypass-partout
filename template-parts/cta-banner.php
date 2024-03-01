<!-- CTA Banner -->
<div id="cta-banner">
    <div class="container container-sm">
        <?php if ($args['title']) : ?>
            <h2><?php echo $args['title']; ?></h2>
        <?php endif; ?>
        <?php if ($args['description']) : ?>
            <p class="h2-size"><?php echo $args['description']; ?><?php if ($args['cta']) : ?> <a href="<?php echo $args['cta']["url"]; ?>" target="<?php echo $args['cta']["target"]; ?>"><?php echo $args['cta']["title"]; ?></a><?php endif; ?></p>
        <?php endif; ?>
    </div>
</div>