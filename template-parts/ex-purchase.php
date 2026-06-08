<?php
/**
 * 高価買取リスト表示テンプレート
 * PC版とSP版で表示を切り替え
 */

// 価格表示用ヘルパー関数
function format_price($price) {
    if (empty($price)) return '';
    
    // 既に「円」が含まれている場合は除去
    $price = str_replace('円', '', $price);
    return $price . '<span>円</span>';
}

// 価格取得関数（「円」の有無をチェック）
function get_price_text($field_value) {
    if (empty($field_value)) return '';
    
    if (strpos($field_value, '円') !== false) {
        return $field_value;
    }
    return $field_value . '円';
}

// 買取アイテム出力関数
function render_purchase_item($index, $is_mobile = false) {
    $title = get_field("高価買取その{$index}_タイトル");
    if (!$title) return '';
    
    $subtitle = get_field("高価買取その{$index}_サブタイトル");
    $price_a = get_price_text(get_field("高価買取その{$index}_A社価格"));
    $price_b = get_price_text(get_field("高価買取その{$index}_B社価格"));
    $price_c = get_price_text(get_field("高価買取その{$index}_C社価格"));
    $price_cafe = format_price(get_field("高価買取その{$index}_ジュエルカフェ価格"));
    $image = get_field("price_image{$index}");
    
    $slide_class = $is_mobile ? 'swiper-slide d-b' : '';
    $info_wrapper = $is_mobile ? '<div class="ex-purchase-info">' : '';
    $info_wrapper_close = $is_mobile ? '</div>' : '';
    $th_width = $is_mobile ? ' width="40"' : '';
    
    ob_start();
    ?>
    <li class="<?php echo $slide_class; ?>">
        <?php echo $info_wrapper; ?>
            <div class="index color-red fs_20">
                <h3><?php echo esc_html($title); ?></h3>
            </div>
            <div class="ex-purchase-sub fs_11"><?php echo esc_html($subtitle); ?></div>
        <?php echo $info_wrapper_close; ?>
        
        <div class="ex-purchase-comparison pos-r d-f">
            <div class="others fs_13">
                <table>
                    <tbody>
                        <tr>
                            <th<?php echo $th_width; ?>>A社</th>
                            <td><?php echo $price_a; ?></td>
                        </tr>
                        <tr>
                            <th<?php echo $th_width; ?>>B社</th>
                            <td><?php echo $price_b; ?></td>
                        </tr>
                        <tr>
                            <th<?php echo $th_width; ?>>C社</th>
                            <td><?php echo $price_c; ?></td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="ex-purchase-label">
                    <div class="ex-purchase-price d-f">
                        <div class="ex-purchase-price-ttl">
                            <p class="color-white"><span>ジュエルカフェ</span>買取実績</p>
                        </div>
                        <div class="ex-purchase-value color-white">
                            <?php echo $price_cafe; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="ex-purchase-img">
                <?php if (!empty($image)): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" 
                         alt="<?php echo esc_attr($title); ?>">
                <?php endif; ?>
            </div>
        </div>
    </li>
    <?php
    return ob_get_clean();
}

// K18ページの場合はdetailsタグで囲む
$is_k18 = is_single('k18');
$is_rolex = is_single('rolex');
?>

<!-- PC版 -->
<div <?php if (!$is_rolex) { ?>class="only-pc"<?php } ?>>
    <?php if ($is_k18): ?>
        <details class="details_style mt-16">
            <summary>詳細はこちら</summary>
    <?php endif; ?>
    
    <ul class="ex-purchase-list">
        <?php for ($i = 1; $i <= 4; $i++): ?>
            <?php echo render_purchase_item($i, false); ?>
        <?php endfor; ?>
    </ul>
    
    <?php if ($is_k18): ?>
        </details>
    <?php endif; ?>
</div>

<!-- SP版 -->
<?php if (!$is_rolex): ?>
    <div class="only-sp">
        <?php if ($is_k18): ?>
            <details class="details_style mt-16">
                <summary>詳細はこちら</summary>
        <?php endif; ?>
        
        <div class="swiper mySwiper2">
            <ul class="ex-purchase-list swiper-wrapper">
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <?php echo render_purchase_item($i, true); ?>
                <?php endfor; ?>
            </ul>
        </div>
        
        <?php if ($is_k18): ?>
            </details>
        <?php endif; ?>
    </div>
<?php endif; ?>

<!-- CSS -->
<style>
.details_style summary {
    background: #C80000;
    color: #fff;
    padding: 7px 0;
    border-radius: 5px;
    text-align: center;
    cursor: pointer;
}

.details_style summary:hover {
    opacity: 0.8;
}

.ex-purchase ul {
    display: fixed;
}

.ex-purchase ul.ex-purchase-list li .ex-purchase-sub {
    text-align: left;
}

.ex-purchase ul.ex-purchase-list li {
    display: block;
    width: 88%;
    padding: 10px 15px;
}

.ex-purchase ul.ex-purchase-list li .index {
    text-align: left;
    font-size: 13px;
}

.ex-purchase-info {
    height: 40px;
    margin-bottom: 10px;
}

.ex-purchase .ex-purchase-img {
    max-width: 110px;
}

.ex-purchase ul.ex-purchase-list li .ex-purchase-comparison {
    padding-bottom: 35px;
    margin-top: 0;
}

.ex-purchase ul.ex-purchase-list li .ex-purchase-comparison .others {
    padding-top: 10px;
}

.ex-purchase ul.ex-purchase-list li table tr td {
    letter-spacing: -0.3px;
}

.ex-purchase-price-ttl {
    text-align: left;
}

.ex-purchase ul.ex-purchase-list li table tr th {
    font-size: 12px;
}

.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    display: block;
}

@media screen and (max-width: 320px) {
    .ex-purchase .ex-purchase-img {
        max-width: 100px;
    }
}

@media screen and (min-width: 1000px) {
    .ex-purchase ul.ex-purchase-list li {
        width: 48%;
        padding: 20px 40px;
    }
    
    .ex-purchase ul.ex-purchase-list li .index {
        font-size: 16px;
    }
    
    .ex-purchase .ex-purchase-img {
        max-width: 160px;
    }
    
    .ex-purchase ul.ex-purchase-list li table tr th {
        font-size: 14px;
    }
    
    .ex-purchase ul.ex-purchase-list li table tr td {
        font-size: 16px;
    }
    
    .ex-purchase ul.ex-purchase-list li .ex-purchase-comparison {
        padding-bottom: 10px;
    }
    
    .ex-purchase ul.ex-purchase-list li .ex-purchase-comparison .others {
        padding-top: 30px;
    }
}
</style>

<!-- JavaScript -->
<script>
var swiper = new Swiper(".mySwiper2", {
    slidesPerView: 'auto',
    spaceBetween: 5,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false
    },
    centeredSlides: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
</script>