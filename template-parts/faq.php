<!-- F.A.Q. -->
<section id="faq" class="faq-block">
    <div class="container">
        <?php if ($args["title"]) : ?>
            <h2><?php echo $args["title"]; ?></h2>
        <?php endif; ?>
        <?php if ($args["faq"]) : ?>
            <ul class="faq-list">
                <?php foreach ($args["faq"] as $faq) : ?>
                    <details class="faq">
                        <summary>
                            <h3 class="h4-size"><?php echo $faq['title']; ?></h3>
                        </summary>
                        <?php if ($faq['text']) : ?>
                            <div class="content formatted">
                                <?php echo $faq['text']; ?>
                            </div>
                        <?php endif; ?>
                    </details>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>