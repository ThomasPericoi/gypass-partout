<?php if ($args["plus"]) : ?>
    <!-- Plus -->
    <section id="plus" class="plus-block">
        <div class="container container-sm">
            <ul class="plus-list">
                <?php foreach ($args["plus"] as $plus) : ?>
                    <li class="plus">
                        <img src="<?php echo $plus["badge"]["url"]; ?>" alt="<?php echo $plus["badge"]["alt"]; ?>">
                        <div class="content">
                            <?php if ($plus["title"]) : ?>
                                <h2 class="h6-size"><?php echo $plus["title"]; ?></h2>
                            <?php endif; ?>
                            <?php if ($plus["text"]) : ?>
                                <div class="text">
                                    <?php echo $plus["text"]; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>