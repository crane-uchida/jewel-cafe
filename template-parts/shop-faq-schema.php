<?php
    $shop_info = get_shop_info( $post->post_name );
?>


<script type="application/ld+json">
<?php
$faqItems = [];

/* -------------------------
  店舗ページ専用のFAQ（最大6件）
------------------------- */
for ($i = 1; $i <= 6; $i++) {
    $qKey = "shop_faq_q{$i}";
    $aKey = "shop_faq_a{$i}";
    
    $question = isset($shop_info[0]->$qKey) ? trim($shop_info[0]->$qKey) : '';
    $answer   = isset($shop_info[0]->$aKey) ? trim($shop_info[0]->$aKey) : '';

    if ($question !== '' && $answer !== '') {
        $faqItems[] = [
            "@type" => "Question",
            "name"  => $question,
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text"  => $answer
            ]
        ];
    }
}

/* -------------------------
  共通FAQ（最大11件）
------------------------- */
$page_ID = get_page_by_path('qa');
$page_ID = $page_ID->ID;

for ($i = 1; $i <= 11; $i++) {
    $q = get_field("共通質問{$i}", $page_ID);
    $a = get_field("共通回答{$i}", $page_ID);

    if (!empty($q) && !empty($a)) {
        $faqItems[] = [
            "@type" => "Question",
            "name"  => $q,
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text"  => $a
            ]
        ];
    }
}

/* -------------------------
  JSON-LD 出力
------------------------- */
if (!empty($faqItems)) {
    $faqSchema = [
        "@context"   => "https://schema.org",
        "@type"      => "FAQPage",
        "mainEntity" => $faqItems
    ];
    echo json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}
?>
</script>
