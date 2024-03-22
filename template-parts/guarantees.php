<!-- Guarantees -->
<section id="guarantees" class="guarantees-block">
    <div class="container">
        <?php if ($args["title"]) : ?>
            <h2><?php echo $args["title"]; ?></h2>
        <?php endif; ?>
        <?php if ($args["guarantees"]) : ?>
            <ul class="guarantees-grid grid-<?php echo get_field("range_guarantees_grid"); ?>">
                <?php foreach ($args["guarantees"] as $guarantee) : ?>
                    <li class="guarantee">
                        <img src="<?php echo $guarantee["badge"]["url"]; ?>" alt="<?php echo $guarantee["badge"]["alt"]; ?>">
                        <?php if ($guarantee["text"]) : ?>
                            <div class="text">
                                <?php echo $guarantee["text"]; ?>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>