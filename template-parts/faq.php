<?php
$faq_schema = null;

if (!empty($args['faq'])) {

    $main_entity = [];

    foreach ($args['faq'] as $faq) {

        if (empty($faq['title']) || empty($faq['text'])) {
            continue;
        }

        $main_entity[] = [
            '@type' => 'Question',
            'name' => wp_strip_all_tags($faq['title']),
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => wp_strip_all_tags($faq['text']),
            ],
        ];
    }

    if (!empty($main_entity)) {
        $faq_schema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $main_entity,
        ];
    }
}
?>

<?php if ($faq_schema) : ?>
    <script type="application/ld+json">
        <?php echo wp_json_encode(
            $faq_schema,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        ); ?>
    </script>
<?php endif; ?>

<!-- F.A.Q. -->
<section id="faq" class="faq-block">
    <div class="container">

        <?php if (!empty($args["title"])) : ?>
            <h2>
                <?php echo esc_html($args["title"]); ?>
            </h2>
        <?php endif; ?>

        <?php if (!empty($args["faq"])) : ?>
            <ul class="faq-list">

                <?php foreach ($args["faq"] as $faq) : ?>

                    <li>
                        <details class="faq">

                            <summary>
                                <h3 class="h4-size">
                                    <?php echo esc_html($faq['title']); ?>
                                </h3>
                            </summary>

                            <?php if (!empty($faq['text'])) : ?>
                                <div class="content formatted">
                                    <?php echo wp_kses_post($faq['text']); ?>
                                </div>
                            <?php endif; ?>

                        </details>
                    </li>

                <?php endforeach; ?>

            </ul>
        <?php endif; ?>

    </div>
</section>