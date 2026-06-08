<?php
/*
Template Name: 店舗詳細ページ
*/

function getCustomerImage($str) {

    // 성별
    if (mb_strpos($str, '女') !== false) {
        $gender = 'w';
    } elseif (mb_strpos($str, '男') !== false) {
        $gender = 'm';
    } else {
        return 'unknown.png';
    }

    $age = null;

    if (preg_match('/(\d{2})-(\d{2})代/u', $str, $m)) {
        $age = (int)$m[1];
    }
    elseif (preg_match('/(\d{2})代/u', $str, $m)) {
        $age = (int)$m[1];
    }

    if ($age === null) {
        return 'unknown.png';
    }

    if ($age >= 20 && $age < 40) {
        $group = '20-30';
    } elseif ($age >= 40 && $age < 60) {
        $group = '40-60';
    } elseif ($age >= 60 && $age < 80) {
        $group = '60-70';
    } else {
        return 'unknown.png';
    }

    return $gender . $group . '.png';
}


function normalize_price($price) {
    if (strpos($price, ',') !== false) {
        return $price;
    }

    if (is_numeric($price)) {
        return number_format($price);
    }

    return $price;
}




?>


<?php get_header( );?>

<style>
	.pagetop{
		@media screen and (max-width:500px){
			bottom:50px;
		}
	}
</style>







<?php

	
	$line_show = get_field('ライン表示');
	$line_id = get_field('ラインID');


	
	if(!isset($local_image1['url']) ){
		
		$google_img = 'https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/shop-detail-mv.jpeg';
		
	}else{
		
		$google_img = $local_image1['url'];
		
	}

	
$today_sql = "select * from `wp_goldchart` ORDER BY `wp_goldchart`.`id` DESC limit 0,2";

$today_result = $wpdb->get_results($today_sql);

$shop_info = get_shop_info( $post->post_name );


$getgoldcoment =  GetGoldComent();



$parent_id = wp_get_post_parent_id($post->ID);

if ($parent_id == 0) {

	$topmost_parent_id = $post->ID;
} else {

	while ($parent_id) {
		$post_id = $parent_id;
		$parent_id = wp_get_post_parent_id($post_id);
	}
	$topmost_parent_id = $post_id;
}


$topmost_parent = get_post($topmost_parent_id);







$parent_post_array = array();

if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/brand/vuitton/shop/') !== false) {

	$parent_post_array = get_post(4747);

}else if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/tokei/rolex-top/shop/') !== false) {

	$parent_post_array = get_post(3288);

}



?>





<?php


$current_id = $post->ID;
$shop_ancestor_id = null;

while ($current_id) {
    $parent = get_post($current_id);

    if ($parent && $parent->post_name === 'shop') {
        $shop_ancestor_id = $parent->ID;
        break;
    }

    $current_id = $parent->post_parent;
}


?>

		
		



<?php /* ?>
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "LocalBusiness",
  "name" : "<?php the_title(); ?>",
  "image" : "<?php echo $google_img;?>",
  "telephone" : "<?php echo $local_tell?>",
  "priceRange":"<?php echo number_format($today_result[0]->gold_price);?>",
  "address" : {
    "@type" : "PostalAddress",
    "streetAddress" : "<?php echo $local_street;?>",
		"addressLocality" : "<?php echo $local_locality;?>",
    "addressRegion" : "<?php echo $local_region;?>",
    "postalCode" : "<?php echo $local_postal;?>",
		"addressCountry": "JP"
  },
	"geo": {
    "@type": "GeoCoordinates",
    "latitude": "<?php echo esc_html($local_map['lat']);?>",
    "longitude": "<?php echo esc_html($local_map['lng']);?>"
  },
  "openingHoursSpecification" : {
    "@type" : "OpeningHoursSpecification",
    "dayOfWeek" : {
      "@type" : "DayOfWeek",
      "name" : "<?php echo $local_bussinessDay;?>"
    },
    "opens" : "<?php echo $local_open;?>",
    "closes" : "<?php echo $local_end;?>"
  }
}
</script>
<?php */ ?>



<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>




	<div id="page-top"></div>
	



		<?php

			$wp_obj = get_queried_object(  );
			$terms = get_the_terms( $post->ID, 'area' );
			
		?>


    <div class="main-section"></div>
	
	
	
<section class="breadcrumbs_type2">
			<style>
				.breadcrumbs_type2{
					.breadcrumbs{
						background:none;
						margin-bottom:0;
						padding: 0px 0 7px;
						letter-spacing: normal;
					}
				}
				.main-section + .main-section{
					padding-top:0;
				}
				.kaitori section {
					padding-bottom: 0;
				}
			</style>	
	<div>
		<?php kaitori_breadcrumb(null , $shop_info[0]->shop_add);?>
	</div>
</section>



		<div class="section-inner">

	
				<h1 class="section-ja-title shop-detail-h1">
				


<?php //郵便番号部分だけを抽出して表示

if (!empty($shop_info) && isset($shop_info[0]->shop_add)) {
    $postcode = $shop_info[0]->shop_add;
} else {
    $postcode = '';
}

// 正規表現で郵便番号を抽出
preg_match('/〒(\d{3}-\d{4})/', $postcode, $matches_postcode);
?>

<?php //都道府県部分だけを抽出して表示
$prefecture = isset($shop_info[0]) ? ($shop_info[0]->shop_add ?? '') : '';

// 都道府県のリスト
$prefectures = [
    '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県', '埼玉県',
    '千葉県', '東京都', '神奈川県', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県',
    '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県',
    '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県', '大分県',
    '宮崎県', '鹿児島県', '沖縄県'
];
// 都道府県を抽出する正規表現を作成
$pattern = '/' . implode('|', $prefectures) . '/';
// 正規表現で都道府県を抽出
preg_match($pattern, $prefecture, $matches);
?>

<?php //郵便番号以外を抽出して表示
$address = (!empty($shop_info) && isset($shop_info[0]) && is_object($shop_info[0]) && isset($shop_info[0]->shop_add))
           ? $shop_info[0]->shop_add
           : '';

// 正規表現で郵便番号を取り除く
$address_without_postcode = preg_replace('/〒\d{3}-\d{4}/', '', $address);
// 空白文字を削除
$address_without_postcode = preg_replace('/^\s+|\s+$/u', '', $address_without_postcode);
?>

<?php
// 郵便番号が取り除かれた住所から都道府県を取り除く
if (!empty($matches) && isset($matches[0])) {
    $address_without_postcode_pref = preg_replace('/' . preg_quote($matches[0], '/') . '/', '', $address_without_postcode);
} else {
    $address_without_postcode_pref = $address_without_postcode;
}



$city_name = '';

// ① 「市」を優先的に抽出
if (preg_match('/(.+?市)/u', $address_without_postcode_pref, $m1)) {
    $city_name = $m1[1];
}
// ② 「市」が無い場合、「区」を抽出
elseif (preg_match('/(.+?区)/u', $address_without_postcode_pref, $m2)) {
    $city_name = $m2[1];
}
// ③ 「区」も無い場合、「町」または「村」を抽出
elseif (preg_match('/(.+?(町|村))/u', $address_without_postcode_pref, $m3)) {
    $city_name = $m3[1];
}

// トリム（空白削除）
$city_name = trim($city_name);

?>




						<?php if(strpos(get_permalink($post->ID), 'rolex-top') !== false): //URLにrolex-topが含まれている場合の処理 ?>
							<?php $item = 'ロレックス';?>
						<?php elseif(strpos(get_permalink($post->ID), 'vuitton') !== false): //URLにvuittonが含まれている場合の処理 ?>
							<?php $item = 'ルイヴィトン';?>
						<?php else:?>
							<?php $item = $topmost_parent->post_title;?>
						<?php endif;?>


						<div class="sub">

							<?php echo str_replace("・貴金属", "", $item); ?>買取なら<?php if (!empty($shop_info[0]->shop_access_seo)): ?><?php echo $shop_info[0]->shop_access_seo; ?>の<?php endif; ?>ジュエルカフェ
<?php /* ?>
							<span class="area">
								<?php 
								echo (isset($matches[0]) ? $matches[0] : ''); 
								echo (isset($city[0]) && $city[0] !== '') ? $city[0] : ''; 
								?>
							</span>
<?php */ ?>
						</div>
						<div class="name"><?php echo get_the_title($parent_id);?></div>

				
				</h1>



			<div class="shop-navigation">
				<div class="nav-box"><a href="#js-store-guide" class="on">店舗案内</a></div>
				<div class="nav-box"><a href="#js-achievement">高価買取実績</a></div>
				<div class="nav-box"><a href="#js-shop-three-features">店舗のご紹介</a></div>
				<div class="nav-box"><a href="#js-shop-voice">お客様の声</a></div>
				<div class="nav-box"><a href="#js-shop-news">店舗からのお知らせ</a></div>
				<div class="nav-box"><a href="#js-gold-chart" class="gold-market">本日の金相場</a></div>
				<div class="nav-box"><a href="#js-shop-detail-faq">よくあるご質問</a></div>
				<div class="nav-box"><a href="#js-shop-area-city">近隣店舗のご案内</a></div>
			</div>

			<div class="section-inner mt-20 mb-20">

				<?php /* ?> 特定の店舗に非常食プレゼントバナーを表示 → 実施期間が終了
					<?php if ( is_single('mare-urawa') || is_single('mallage-shobu') || is_single('shimachu-sokatoneri') || is_single('aeonlaketown-mori') || is_single('cainzhome-kamisato') || is_single('omiya-stellartown') || is_single('urawa-parco') || is_single('aeonmall-yono') ) :?>
						<picture>
							<source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_tokuten_bnr_type2.avif" media="(min-width: 501px)" type="image/avif" width="100%">
							<source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_tokuten_bnr_type2.jpg" media="(min-width: 501px)" width="100%">
							<source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_tokuten_bnr_type2_sp.avif" media="(max-width: 500px)" type="image/avif" width="100%">
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_tokuten_bnr_type2_sp.jpg" alt="非常食プレゼント" width="100%">
						</picture>
					<?php else :?>
					<?php endif;?>
				<?php */ ?>

				<?php
				$now = new DateTime('now', new DateTimeZone('Asia/Tokyo'));
				$cutoff = new DateTime('2026-07-01 00:00:00', new DateTimeZone('Asia/Tokyo'));
				?>
				<?php if ($now < $cutoff): ?>
					<!-- 6月末まで表示するコンテンツ -->
					<?php if ( is_single('chigasaki') ) :?>
						<style>
							.special-text::before {
								content: "＼";
								color: #c80000; 
							}

							.special-text::after {
								content: "／"; 
								color: #c80000;
							}
							@media screen and (min-width: 768px) {
								.special-text{
									font-size: 45px;
									text-align: center;
									color: #c80000;
									margin-bottom: 10px;
									margin-top: 30px;
									font-weight:bold;
								}
							}
							@media screen and (max-width: 767px) {
								.special-text{
									font-size: 18px;
									text-align: center;
									color: #c80000;
									margin-bottom: 5px;
									margin-top: 30px;
									font-weight:bold;
								}
								.special-img{
									width: 100vw;
									margin-left: calc(50% - 50vw);
									margin-right: calc(50% - 50vw);
									display: block;
								}
							}
						</style>
						<p class="special-text">茅ヶ崎店限定! 2026年6月末まで</p>
						<picture>
							<source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/chigasaki_kouka_pc.jpg" media="(min-width: 501px)" width="100%">
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/chigasaki_kouka_sp.jpg" alt="" width="100%" class="special-img">
						</picture>
					<?php else :?>
						<?php /* ?> 生活雑貨プレゼントバナー <?php */ ?>
						<picture>
							<source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_tokuten_bnr.webp" media="(min-width: 501px)" type="image/webp" width="100%">
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_tokuten_bnr_sp.webp" alt="生活雑貨プレゼント" width="100%">
						</picture>
						<?php /* ?> 生活雑貨プレゼントバナーを表示するときにセットで表示する <?php */ ?>
						<p class="mt-20">
							<span class="color-red bold d-b">査定受付時にスマホ画面をスタッフにお見せください。</span>※写真はイメージです。商品はご来店日・店舗によって異なり、品切れの場合もございます。予めご了承ください。
						</p>
					<?php endif;?>

				<?php else: ?>
					<!-- 7月以降に表示するコンテンツ -->
					<?php /* ?> 生活雑貨プレゼントバナー <?php */ ?>
					<picture>
						<source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_tokuten_bnr.webp" media="(min-width: 501px)" type="image/webp" width="100%">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_tokuten_bnr_sp.webp" alt="生活雑貨プレゼント" width="100%">
					</picture>
					<?php /* ?> 生活雑貨プレゼントバナーを表示するときにセットで表示する <?php */ ?>
					<p class="mt-20">
						<span class="color-red bold d-b">査定受付時にスマホ画面をスタッフにお見せください。</span>※写真はイメージです。商品はご来店日・店舗によって異なり、品切れの場合もございます。予めご了承ください。
					</p>
				<?php endif; ?>

			</div>
<?php /* ?>　// ジュエルぐま公式X10000フォロワー突破キャンペーンバナー
				<picture class="modal-trigger" style="cursor:pointer;">
					<!-- スマホ用（最大幅767px以下） -->
					<source media="(max-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/campaign_x10000_sp.png">
					<!-- タブレット以上（768px以上）〜PC -->
					<source media="(min-width: 768px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/campaign_x10000_pc.png">
					<!-- fallback（すべてのブラウザ用） -->
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/campaign_x10000_pc.png" alt="ジュエルぐま公式X10000フォロワー突破キャンペーン 買取金額20%UP" width="100%" height="100%">
				</picture>
<?php */ ?>



			<?php
				$shop_info[0]->item = $item;
			?>

			<?php get_template_part( 'template-parts/shop-parent-detail2' , null , $shop_info);?>
	
		</div>





				<section class="common-kaitori-resuluts" id="js-achievement">

				<div class="section-inner">

					<div class="common-ttl">
						<div class="section-inner">
							<h2 class="shop-title kaitori-title">
								<span class="common-ttl-sub">
									<?php
										echo $shop_info[0]->shop_name;
									?>
									
								</span>
								<span class="common-ttl-main"><span class="color-red">他店と差がつく</span><br><?php echo $item;?>の買取参考価格</span>
							</h2>

						</div>
					</div>

					<div class="only-pc">

						<ul class="item-list d-f jc-sb">

		
		
						<?php

								for($g=1;$g<=12;$g++){

								$group = get_field('買取実績その'.$g, $shop_ancestor_id);
							
							
								if( !empty($group['買取実績その'.$g.'_画像'])){
						?>
		
						
							<li class="mb-20">
								<div class="item-img">
									<img src="<?php echo $group['買取実績その'.$g.'_画像']['url'];?>" alt="<?php echo $group['買取実績その'.$g.'_タイトル'];?>">
								</div>
								<div class="p-10">
					
									<p class="kaitoriName mb-4">
										<?php
											if( $topmost_parent->post_name == 'brand'){ 
										?>
											<a href="/kaitori/brand/vuitton/">ルイヴィトン買取</a>
											
										<?php
											}else if( $topmost_parent->post_name == 'tokei'){ 
										?>
											<a href="/kaitori/tokei/rolex-top/">ロレックス買取</a>
											
										<?php
											}else{
										?>
										<a href="/kaitori/<?php echo $topmost_parent->post_name?>/"><?php echo $topmost_parent->post_title;?>買取</a>
										<?php
											}
										?>
									</p>
				
									<p class="ttl mb-10"><?php echo $group['買取実績その'.$g.'_タイトル'];?>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red"><?php echo normalize_price($group['買取実績その'.$g.'_価格']);?><span class="small">円</span></div>
									</div>
								</div>
							</li>
						
						<?php
								}
							}
						?>
							

						</ul>
					</div>




				<div class="only-sp">


					<div class="shopswiper">

					<ul class="new-item-list swiper-wrapper">
						
						
						<?php

								for($g=1;$g<=12;$g++){

								$group = get_field('買取実績その'.$g, $shop_ancestor_id);
							
							
								if( !empty($group['買取実績その'.$g.'_画像'])){
						?>
		
						
							<li class="swiper-slide mb-20">
								<div class="item-img">
									<img src="<?php echo $group['買取実績その'.$g.'_画像']['url'];?>" alt="<?php echo $group['買取実績その'.$g.'_タイトル'];?>">
								</div>
								<div class="p-10">
					
									<p class="kaitoriName mb-4">
										<?php
											if( $topmost_parent->post_name == 'brand'){ 
										?>
											<a href="/kaitori/brand/vuitton/">ルイヴィトン買取</a>
											
										<?php
											}else if( $topmost_parent->post_name == 'tokei'){ 
										?>
											<a href="/kaitori/tokei/rolex-top/">ロレックス買取</a>
											
										<?php
											}else{
										?>
										<a href="/kaitori/<?php echo $topmost_parent->post_name?>/"><?php echo $topmost_parent->post_title;?>買取</a>
										<?php
											}
										?>
									</p>
				
									<p class="ttl mb-10"><?php echo $group['買取実績その'.$g.'_タイトル'];?>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red"><?php echo normalize_price($group['買取実績その'.$g.'_価格']);?><span class="small">円</span></div>
									</div>
								</div>
							</li>
						
						<?php
								}
							}
						?>



					</ul>


					</div>

				<style>
					
					.new-item-list .swiper-slide{max-width:200px;margin-right:10px;}

				</style>


				</div>



<!-- Initialize Swiper -->
<script>

  
  var swiper = new Swiper(".shopswiper", {
	slidesPerView: 2,
	spaceBetween: 10,
	loop: true,
	autoplay: {
	   delay: 2500,
	   disableOnInteraction:false
	 },
	centeredSlides: true,
	pagination: {
	  el: ".swiper-pagination",
	  clickable: true,
	},

  });
  
  
  
</script>





					</div>


				</section>





<div class="section-inner">


			<?php



			if( strpos($_SERVER['REQUEST_URI'],'/tokei-') !== false){

				if( get_field('is_show' , 151) ){

					get_template_part( 'template-parts/shop-price-tokei' );

				}

				get_template_part( 'template-parts/shop-kaitori-results' );

			}




			?>



		</div>













		<div class="section-inner">


			<?php // 現在表示されている投稿と同じタームに分類された投稿を取得
				$taxonomy_slug = 'area'; // タクソノミーのスラッグを指定
				$sub_taxonomy_slug = 'hinmoku';
				$post_type_slug = 'blog'; // 投稿タイプのスラッグを指定
				
				$post_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // エリアタクソノミーの指定
				$sub_post_terms = wp_get_object_terms($post->ID, $sub_taxonomy_slug);
				
				$current_slug = basename(get_permalink( ));
				
	
				
				
				if( $post_terms && !is_wp_error($post_terms)) { // 値があるときに作動
					$terms_slug = array(); // 配列のセット
					foreach( $post_terms as $value ){ // 配列の作成
						$terms_slug[] = $value->slug; // タームのスラッグを配列に追加
					}
				}
				
				
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				
		
				
				if( $topmost_parent->post_name == 'tokei' ){
					
					$blog_terms = 'rolex-top';
					
				}else if( $topmost_parent->post_name == 'brand' ){
					
					$blog_terms = 'vuitton';
					
				}else{
					
					$blog_terms = $topmost_parent->post_name;
					
				}
	
				
				
				
				$args = array(
					'post_type' => $post_type_slug, // 投稿タイプを指定
					'posts_per_page' => 10, // 表示件数を指定
					'orderby' =>  'DESC', // ランダムに投稿を取得
					'paged' => $paged,
					'tax_query' => array( // タクソノミーパラメーターを使用
						array(
							'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
							'field' => 'slug', // スラッグに一致するタームを返す
							'terms' => $current_slug // タームの配列を指定
						),
						array(
							'taxonomy' => 'hinmoku', // ✅ WordPressのデフォルトカテゴリー
							'field' => 'slug',
							'terms' => $blog_terms
						)						
					)
				);
				
				
			


				$the_query = new WP_Query($args); if($the_query->have_posts()):
			?>

			<section class="kaitori-resuluts" id="js-purchase-price">
				<div class="common-ttl">
					<div class="section-inner">

							<h2 class="shop-title">
								<span class="common-ttl-sub"><?php echo $shop_info[0]->shop_name;?>の<?php echo $item;?>の</span>
								<span class="common-ttl-main">最新買取<span class="color-red">事例</span></span>
							</h2>

						<div class="common-ttl-en" >Purchase Results</div>
					</div>
				</div>




				<div class="section-inner">
					<ul class="blog-archive-list">
					<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
					
					
					
					<?php
						$hinmoku_terms = get_the_terms($post->ID, 'hinmoku');
						
						$count = 0;

						if(is_array($hinmoku_terms)){

						foreach($hinmoku_terms as $term) {
							if($term->parent === 0) {
								$hinmoku_parent_name = $term->name;
								$hinmoku_parent_id = $term->term_id;
								// $hinmoku_parent_slug = $term->slug;
							}
						}
						foreach($hinmoku_terms as $term) {
							if($term->parent === $hinmoku_parent_id) {
								$hinmoku_child_name = $term->name;
								$hinmoku_child_id = $term->term_id;
								// $hinmoku_child_slug = $term->slug;
							}
						}

						}

						// foreach($hinmoku_terms as $term) {
						// 	if($term->parent === $hinmoku_child_id) {
						// 		$hinmoku_grandchild_name = $term->name;
						// 		$hinmoku_grandchild_slug = $term->slug;
						// 	}
						// }

						$area_terms = get_the_terms( $post->ID, 'area' );
						foreach($area_terms as $term) {
							if($term->parent === 0) {
								// $area_parent_name = $term->name;
								$area_parent_id = $term->term_id;
							}
						}
						foreach($area_terms as $term) {
							if($term->parent === $area_parent_id) {
								// $area_child_name = $term->name;
								$area_child_id = $term->term_id;
							}
						}
						foreach($area_terms as $term) {
							if($term->parent === $area_child_id) {
								$area_grandchild_name = $term->name;
							}
						}
						
						$image_alt_title = $post->post_title;
						
						
						$alt_img_arr = explode('を',$post->post_title);
						
						if(isset($alt_img_arr[1]) == ''){
							
							$alt_img = explode('お',$post->post_title);

							if(isset($alt_img[1]) !== ''){
							
								$image_alt_title = $alt_img[0];
							
							}
							
						}else{
							
							$image_alt_title = $alt_img_arr[0];
							
						}
									
						
$terms_area = get_the_terms($post->ID,'area');

						foreach ($terms_area as $term) {
							if ($term->parent === 0) {
								$parent_area_name = $term->name;
								$parent_area_id = $term->term_id;
								$parent_area_slug = $term->slug;
							}
						}

						foreach ($terms_area as $term) {
							if ($term->parent === $parent_area_id) {
								$child_area_name = $term->name;
								$child_area_id = $term->term_id;
								$child_area_slug = $term->slug;
							}
						}

						foreach ($terms_area as $term) {
							if ($term->parent === $child_area_id) {
								$grand_child_area_name = $term->name;
								$grand_child_area_link = esc_url(get_term_link($term));
								$grand_child_area_slug = $term->slug;
							}
						}

						$current_shop_url = esc_url(home_url( '/shop/'.$parent_area_slug.'/'.$child_area_slug.'/'.$grand_child_area_slug ));



						?>
						
					<li>
						<a href="<?php the_permalink() ?>" class="blog-catch-img">
							<picture>
								<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
									<source type="image/webp" data-srcset="<?php echo $post_thumbnail;?>" srcset="<?php echo $post_thumbnail;?>">
									<img class="blog-detail-img ls-is-cached lazyloaded" src="<?php echo $post_thumbnail;?>" alt="<?php echo $image_alt_title;?>" data-eio="p" data-src="<?php echo $post_thumbnail;?>" decoding="async">
								<?php else:?>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="">
								<?php endif;?>
							</picture>
						</a>
						
						<div class="right">
							<p class="blog-archive-ttl">
								<a href="<?php the_permalink() ?>"><?php echo mb_convert_kana(get_the_title(), "rnas"); ?></a>
							</p>
							<div class="blog-archive-date">公開日：<time itemprop="dateCreated datePublished"><?php the_time('Y/m/d');?></time></div>
							<p class="blog-archive-point pc">
								<?php 

									if(trim(get_field('買取査定ポイント')) !== ''):
								
										the_field('買取査定ポイント');
										
									else:
										
										continue;
							
									endif;
								
								?>
							</p>
							<ul class="blog-archive-flex">
								<li class="blog-archive-kind">
									<a href="/shop-buy/">店頭買取</a>
								</li>
								<li class="blog-archive-prefecture"><?php echo esc_html($child_area_name);?></li>
								<li class="blog-archive-shop">
									<span class="sp-line">ジュエルカフェ&nbsp;</span><?php echo esc_html($grand_child_area_name);?>
								</li>
							</ul>
						</div>



            <div class="text_box sp">
              <input id="trigger<?php echo $count; ?>" class="trigger" type="checkbox">
              <p class="blog-archive-point">
                <?php 
                  if(trim(get_field('買取査定ポイント')) !== ''):
                    the_field('買取査定ポイント');
                  else:
                    continue;
                  endif;
                ?>
              </p>
              <label class="read_more" for="trigger<?php echo $count; ?>"></label>
            </div>





					</li>						
						
					<?php
					$count++;
					endwhile; ?>
					<?php wp_reset_postdata(); ?>
					</ul>

					<div class="blog-archive-linkWrapper">
						<a href="/blog/" class="blog-archive-link">もっと見る</a>
					</div>
				
				</div>


			</section>
			<?php endif; ?>


</div>




	

      <section class="intro intro-broken section-inner">
				<div class="logo">
					<picture>
						<source media="(max-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/logo.svg">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/logo.svg" alt="JEWEL CAFE">
					</picture>
				</div>
				<div class="mincho pos-r">
					<div class="intro-sub">おひとつからしっかり査定！</div>
					<div class="intro-main color-red">
						古くても<br class="only-sp">
						壊れていてもOK！
					</div>
				</div>

				<?php if(has_term( 'tokei', 'hinmoku' )):?>
					<ul class="detail-broken-list d-f jc-sb">
						<li>
							<h3>ムーブメント故障</h3>
							<h4>動かなくても大丈夫！</h4>
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/kowaretatokei_1.jpg" alt="動かない時計買取">
							<p>ゼンマイが巻けない、針が動かない、など動作不良の時計であってもしっかり査定いたします。ご相談ください。</p>
						</li>
						<li>
							<h3>ガラス割れ・欠け</h3>
							<h4>ガラスが割れた時計も！</h4>
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/kowaretatokei_2.jpg" alt="割れた時計買取">
							<p>ロレックスをはじめとしたブランド腕時計であれば、ガラスの割れ・欠けがあってもお買取OK!</p>
						</li>
						<li>
							<h3>キズ・凹み・汚れ</h3>
							<h4>キズだらけでもOK!</h4>
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/kowaretatokei_3.jpg" alt="傷だらけの時計買取">
							<p>ケースやブレスのキズ、レザーバンドの汚れや劣化などがあっても、お気軽にお持ちください！丁寧に査定いたします。</p>
						</li>
						<li>
							<h3>オーバーホール未実施</h3>
							<h4>調整に出していない！！</h4>
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/kowaretatokei_4.jpg" alt="経年劣化した時計買取">
							<p>1度もオーバーホール・調整に出していない20〜30年前のロレックスでも高価買取！予想以上のプレミアがつくことも！</p>
						</li>
					</ul>
				<?php else:?>
					<ul class="detail-broken-list d-f jc-sb">
						<li>
							<h3>ブランド品買取</h3>
							<h4>汚れ・シミ・ベタ</h4>
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/detail-broken-01.jpg" alt="汚れたブランド品買取">
							<p class="describe">ルイヴィトンやシャネルなどの人気バッグは汚れ・シミがあってもお買取大歓迎です。内側のベタつきや匂いがあってもOK！</p>
						</li>
						<li>
							<h3>ジュエリー買取</h3>
							<h4>年代物・壊れたもの</h4>
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/detail-broken-02.jpg" alt="壊れたジュエリー買取">
							<p class="describe">50年以上前の古いジュエリーでも、どんなにデザインが古いものでもしっかり高価買取！もちろん壊れているものでも大丈夫！</p>
						</li>
						<li>
							<h3>ロレックス時計買取</h3>
							<h4>故障・破損</h4>
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/detail-broken-03.jpg" alt="故障した時計買取">
							<p class="describe">ガラスがわれている、ベルトが切れている、針が動かないなど、どんな状態でもお持ちください。丁寧に査定いたします。</p>
						</li>
						<li>
							<h3>貴金属買取</h3>
							<h4>金歯や工業製品</h4>
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/detail-broken-04.jpg" alt="金歯買取">
							<p class="describe">ジュエリーだけでなく、はずれた金歯や破片のような工業製品も「貴金属」です。ジュエルカフェならどんな状態でもお買取OK！</p>
						</li>
					</ul>
				<?php endif;?>

        <div class="detail-confirm">
          <div class="d-f ai-c jc-c">
            <div class="detail-confirm-border"></div>
            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/comfirm-icon-01.svg" alt="お買取りに必要なものはご本人確認書類だけ">
            <div class="detail-confirm-border"></div>
          </div>
          <div class="detail-confirm-list">
            <p class="bold ta-c">お買取りに必要なものはご本人確認書類だけ</p>
            <div class="document-list bold mt-4">
              <ul>
                <li>運転免許証</li>
                <li>マイナンバーカード</li>
                <li>パスポート</li>
              </ul>
              <ul>
                <li class="confirm-list-small">住民基本台帳カード</li>
                <li class="confirm-list-small">在留カード</li>
                <li class="confirm-list-small">特別永住者証明書</li>
              </ul>
            </div>
          </div>

          <div class="d-f ai-c jc-c">
            <div class="detail-confirm-border"></div>
            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/comfirm-icon-02.svg" alt="鑑定書もお持ちください">
            <div class="detail-confirm-border"></div>
          </div>
          <div class="detail-confirm-txt mt-4">
            <p><span class="color-red">宝石の鑑定書、ブランド品・時計のギャランティカード</span>などがありますと更に高価買取が可能です。<br>お手元にございましたらぜひご一緒にお持ちください！</p>
            <hr>
            <p class="detail-confirm-txt-att">※18~19歳のお客様の場合、同意書又は委任状が必要になります。又、18歳未満のお客様はご利用いただけません。</p>
          </div>
        </div>
	</section>






	<?php get_template_part( 'template-parts/shop-flow' );?>

	<section class="shop-three-features section-inner" id="js-shop-three-features">
		<div class="common-ttl">
			<div class="section-inner">
				<h2 class="shop-title">
					<span class="common-ttl-sub"><?php echo $shop_info[0]->shop_name;?>を</span>
					<span class="common-ttl-main"><span class="color-red">ご紹介</span>します！</span>
				</h2>
				<div class="common-ttl-en">Shop Introduction</div>
			</div>
		</div>
		

		
		<?php get_template_part( 'template-parts/shop-introduction' ,null , $shop_info );?>
		
	</section>







      <section class="section-inner shop-voice" id="js-shop-voice">


        <div class="common-ttl">
          <div class="section-inner">
		
			<h2 class="shop-title">
				<span class="common-ttl-sub"><?php echo $shop_info[0]->shop_name;?>での<?php echo $item;?>買取の</span>
				<span class="common-ttl-main">お客様の<span class="color-red">口コミ</span></span>
			</h2>

            <div class="common-ttl-en">Customer's Voice</div>
          </div>
        </div>
        <div class="rating py-4">
          <div class="text-center">
            <div class="count-rating color-red">
              <div class="bold">
                <span><?php echo $shop_info[0]->shop_score;?></span>
              </div>
              <div class="devider"></div>
              <div class="star-rating">
                <div class="star-rating-front" style="width: 90%"></div>
                <div class="star-rating-back"></div>
              </div>
            </div>
            <div class="count-review mt-3 ta-c">
              （<span><?php echo $shop_info[0]->shop_reviews;?></span>件のレビュー）
            </div>
          </div>
        </div>
		


		<?php get_template_part( 'template-parts/shop-customers-voice' ,null , $shop_info);?>




      </section>





			<?php get_template_part( 'template-parts/shop-purchase' );?>






		<section class="shop-news section-inner" id="js-shop-news">
			<?php if( $shop_info[0]->shop_notification ):?>
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="shop-title">

							<span class="common-ttl-sub"><?php echo $shop_info[0]->shop_name;?>の</span>
							
							<span class="common-ttl-main"><span class="color-red">お知らせ</span></span>
						</h2>
						<div class="common-ttl-en">News</div>
					</div>
				</div>
				<p><?php echo $shop_info[0]->shop_notification;?></p>
			<?php endif;?>
			
			
			
			<?php if( $shop_info[0]->shop_aword ):?>
				<div class="shop-news-comment">
					<div class="shop-news-comment-inner">
						<h3 class="shop-news-ttl">査定スタッフから一言</h3>
						<p class="shop-news-txt"><?php echo $shop_info[0]->shop_aword;?></p>
					</div>
				</div>
			<?php endif;?>
			
		</section>
		
		
		
		
		
		
		
		
		
		<section class="section-inner shop-voice mt-20 mb-20">   
		
        <div class="shop-kaitori-menu">
          <div class="free_ribbon">無料</div>
          <div class="shop-kaitori-menu-inner">
            <img src="/wp-content/themes/jewelcafe_replace/imported-assets/rn/img/shop/kaitori-satei-menu-ttl.png" alt="">
            <h2 class="shop-kaitori-menu-ttl">買取・査定<span class="sofia bold">MENU</spam></h2>
            <ul>
              <li>
                <div class="shop-kaitori-menu-text">
                  <h3 class="color-red shop-kaitori-menu-number"><span class="sofia bold">1</span>買取査定</h3>
                  <hr>
                  <p>お持ちの商品を1点ずつ丁寧に査定。お買取価格をお知らせします。</p>
                </div>
                <div class="shop-kaitori-menu-img">
                  <img src="/wp-content/themes/jewelcafe_replace/imported-assets/rn/img/shop/kaitori-satei-menu-item-1.jpg" alt="買取査定">
                </div>
              </li>
              <li>
                <div class="shop-kaitori-menu-text">
                  <h3 class="color-red shop-kaitori-menu-number"><span class="sofia bold">2</span>スピード査定</h3>
                  <hr>
                  <p>最短10分以内に査定完了。ざっくりどのくらいの金額か査定します。</p>
                </div>
                <div class="shop-kaitori-menu-img">
                  <img src="/wp-content/themes/jewelcafe_replace/imported-assets/rn/img/shop/kaitori-satei-menu-item-2.jpg" alt="スピード査定">
                </div>
              </li>
              <li>
                <div class="shop-kaitori-menu-text">
                  <h3 class="color-red shop-kaitori-menu-number"><span class="sofia bold">3</span>壊れ物査定</h3>
                  <hr>
                  <p>壊れている、不備がある、付属品が揃っていないなどの商品を査定します。</p>
                </div>
                <div class="shop-kaitori-menu-img">
                  <img src="/wp-content/themes/jewelcafe_replace/imported-assets/rn/img/shop/kaitori-satei-menu-item-3.jpg" alt="壊れ物査定">
                </div>
              </li>
              <li>
                <div class="shop-kaitori-menu-text">
                  <h3 class="color-red shop-kaitori-menu-number"><span class="sofia bold">4</span>おまとめ査定</h3>
                  <hr>
                  <p>複数の商品をまとめてお持ちいただくと、査定金額をアップいたします。</p>
                </div>
                <div class="shop-kaitori-menu-img">
                  <img src="/wp-content/themes/jewelcafe_replace/imported-assets/rn/img/shop/kaitori-satei-menu-item-4.jpg" alt="おまとめ査定">
                </div>
              </li>
            </ul>
          </div>
        </div>
		</section>
		
      


		<?php 
		
			if (strpos($_SERVER['REQUEST_URI'], '/kaitori/gold/shop/') !== false ) {
			
				get_template_part('template-parts/market-price-chart-gold' , null , $getgoldcoment); 
			
			}
			
		?>




      <section class="section-inner shop-detail-faq" id="js-shop-detail-faq">
        <div class="common-ttl">
          <div class="section-inner">
						<h2 class="shop-title">
							<span class="common-ttl-sub"><?php echo $shop_info[0]->shop_name;?>の<?php echo $item;?>買取に関する</span>
							<span class="common-ttl-main">よくある<span class="color-red">ご質問</span></span>
						</h2>
            <div class="common-ttl-en">Faq</div>
          </div>
        </div>
		
		
        <div class="accordion" id="first-accordion">
		
					
			<?php if( $shop_info[0]->shop_faq_q1 ):?>
				<div class="accordion-item">
					<h3 class="accordion-head">
						<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php echo $shop_info[0]->shop_faq_q1;?></a>
					</h3>
					<div class="accordion-content">
						<p><span class="mr-8">A</span><?php echo $shop_info[0]->shop_faq_a1;?></p>
					</div>
				</div>
			<?php endif;?>

					
			<?php
				/*
			?>
			<?php if( $shop_info[0]->shop_faq_q2 ):?>
				<div class="accordion-item">
					<h3 class="accordion-head">
						<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php echo $shop_info[0]->shop_faq_q2;?></a>
					</h3>
					<div class="accordion-content">
						<p><span class="mr-8">A</span><?php echo $shop_info[0]->shop_faq_a2;?></p>
					</div>
				</div>
			<?php endif;?>

					
					
					
			<?php if( $shop_info[0]->shop_faq_q3 ):?>
				<div class="accordion-item">
					<h3 class="accordion-head">
						<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php echo $shop_info[0]->shop_faq_q3;?></a>
					</h3>
					<div class="accordion-content">
						<p><span class="mr-8">A</span><?php echo $shop_info[0]->shop_faq_a3;?></p>
					</div>
				</div>
			<?php endif;?>



			<?php if( $shop_info[0]->shop_faq_q4 ):?>
				<div class="accordion-item">
					<h3 class="accordion-head">
						<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php echo $shop_info[0]->shop_faq_q4;?></a>
					</h3>
					<div class="accordion-content">
						<p><span class="mr-8">A</span><?php echo $shop_info[0]->shop_faq_a4;?></p>
					</div>
				</div>
			<?php endif;?>


			<?php if( $shop_info[0]->shop_faq_q5 ):?>
				<div class="accordion-item">
					<h3 class="accordion-head">
						<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php echo $shop_info[0]->shop_faq_q5;?></a>
					</h3>
					<div class="accordion-content">
						<p><span class="mr-8">A</span><?php echo $shop_info[0]->shop_faq_a5;?></p>
					</div>
				</div>
			<?php endif;?>


			<?php if( $shop_info[0]->shop_faq_q6 ):?>
				<div class="accordion-item">
					<h3 class="accordion-head">
						<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php echo $shop_info[0]->shop_faq_q6;?></a>
					</h3>
					<div class="accordion-content">
						<p><span class="mr-8">A</span><?php echo $shop_info[0]->shop_faq_a6;?></p>
					</div>
				</div>
			<?php endif;?>

			<?php
				*/
			?>




			<?php
				$page_ID = get_page_by_path( 'qa' );
				$page_ID = $page_ID->ID;
			?>
			
			
					<?php if(get_field('よくあるご質問その1_Q')):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その1_Q');?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その1_A');?></p>
            </div>
          </div>
					<?php endif;?>



					<?php if(get_field('よくあるご質問その2_Q')):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その2_Q');?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その2_A');?></p>
            </div>
          </div>
					<?php endif;?>




					<?php if(get_field('よくあるご質問その3_Q')):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その3_Q');?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その3_A');?></p>
            </div>
          </div>
					<?php endif;?>


					<?php if(get_field('よくあるご質問その4_Q')):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その4_Q');?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その4_A');?></p>
            </div>
          </div>
					<?php endif;?>


					<?php if(get_field('よくあるご質問その5_Q')):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その5_Q');?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その5_A');?></p>
            </div>
          </div>
					<?php endif;?>



					<?php if(get_field('よくあるご質問その6_Q')):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その6_Q');?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その6_A');?></p>
            </div>
          </div>
					<?php endif;?>



					<?php if(get_field('よくあるご質問その7_Q')):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その7_Q');?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その7_A');?></p>
            </div>
          </div>
					<?php endif;?>


					<?php if(get_field('よくあるご質問その8_Q')):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その8_Q');?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その8_A');?></p>
            </div>
          </div>
					<?php endif;?>


					<?php if(get_field('よくあるご質問その9_Q')):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その9_Q');?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その9_A');?></p>
            </div>
          </div>
					<?php endif;?>


					<?php if(get_field('よくあるご質問その10_Q')):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その10_Q');?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その10_A');?></p>
            </div>
          </div>
					<?php endif;?>




					<?php
/*
					if(get_field('共通質問2')):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('共通質問2');?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('共通回答2');?></p>
            </div>
          </div>
					<?php endif;?>

					<?php if(get_field('共通質問3')):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('共通質問3');?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('共通回答3');?></p>
            </div>
          </div>
					<?php endif;?>



					<?php if(get_field('共通質問4', $page_ID)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('共通質問4', $page_ID);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span>

				<?php

					$content4 = get_field('共通回答4', $page_ID);

					echo str_replace('鑑 定書' , '鑑定書' , $content4);


				?>


			</p>
            </div>
          </div>
					<?php endif;?>

					<?php if(get_field('共通質問5', $page_ID)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('共通質問5', $page_ID);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span>

				<?php

					 the_field('共通回答5', $page_ID);

					?>

				</p>
            </div>
          </div>


					<?php endif;?>

					<?php if(get_field('共通質問6', $page_ID)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('共通質問6', $page_ID);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span>
				<?php the_field('共通回答6', $page_ID);?></p>
            </div>
          </div>
					<?php endif;?>



					<?php if(get_field('共通質問7', $page_ID)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('共通質問7', $page_ID);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('共通回答7', $page_ID);?></p>
            </div>
          </div>
					<?php endif;?>

					<?php if(get_field('共通質問8', $page_ID)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('共通質問8', $page_ID);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('共通回答8', $page_ID);?></p>
            </div>
          </div>
					<?php endif;?>

					<?php if(get_field('共通質問9', $page_ID)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('共通質問9', $page_ID);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('共通回答9', $page_ID);?></p>
            </div>
          </div>
					<?php endif;?>

					<?php if(get_field('共通質問10', $page_ID)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('共通質問10', $page_ID);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('共通回答10', $page_ID);?></p>
            </div>
          </div>
					<?php endif;?>

					<?php if(get_field('共通質問11', $page_ID)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('共通質問11', $page_ID);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('共通回答11', $page_ID);?></p>
            </div>
          </div>
					<?php endif;
					
					*/
					?>

      </section>




<?php



$current_shop = jc_get_current_shop_by_post_name($wpdb, $post->post_name);

if (empty($current_shop)) {
    return;
}

$base_path = jc_get_current_kaitori_base_path();

$nearby_shops = jc_get_nearby_shops_with_fill($wpdb, $current_shop, 5);
$prefecture_shops = jc_get_prefecture_shops($wpdb, $current_shop);
?>


<?php if (!empty($nearby_shops)) : ?>
<section class="shop-area-city renew section-inner" id="js-shop-nearby-city">
    <div class="common-ttl">
        <div class="section-inner">
            <h2 class="shop-title">
                <span class="common-ttl-sub"><?php echo esc_html($current_shop->shop_name); ?>の</span>
                <span class="common-ttl-main">近隣店舗</span>
            </h2>
            <div class="common-ttl-en">Nearby Stores</div>
        </div>
    </div>

    <ul class="shop-area-city-list">
        <?php foreach ($nearby_shops as $v_shop2) : ?>
            <li class="shop-area-city-item">
                <div class="area_info_box_wrap">
                    <div class="area_info_box1">
                        <h3 class="shop-name bold">
                            <div class="area_kaitori">
                                <?php
                                if ($v_shop2->shop_city1 == 'hokkaido' || $v_shop2->shop_city1 == 'okinawa') {
                                    echo esc_html(replacePrefecturesName($v_shop2->shop_city1));
                                } else {
                                    echo esc_html(replacePrefecturesName($v_shop2->shop_city2));
                                }
                                ?>
                            </div>

                            <div class="name">
                                <a href="<?php echo esc_url(jc_get_shop_area_url($v_shop2, $base_path)); ?>">
                                    <?php echo esc_html($v_shop2->shop_name); ?>
                                </a>
                            </div>
                        </h3>
                    </div>

                    <div class="area_info_box2">
                        <?php if (!empty($v_shop2->shop_tel)) : ?>
                            <a href="tel:<?php echo esc_attr(jc_format_tel_number($v_shop2->shop_tel)); ?>" class="shop-tel bold color-red">
                                TEL&nbsp;<?php echo esc_html($v_shop2->shop_tel); ?>
                            </a>
                        <?php else : ?>
                            <div class="shop-tel bold color-red"><?php the_field('オープン時期'); ?></div>
                        <?php endif; ?>

                        <div class="shop-info">
                            <div class="shop-address d-f"><?php echo esc_html($v_shop2->shop_add); ?></div>
                            <div class="shop-opening d-f">営業時間&nbsp;<?php echo esc_html($v_shop2->shop_time); ?></div>

                            <?php
							/*
							if (isset($v_shop2->distance_km)) : ?>
                                <div class="shop-distance ft-12 d-f">
                                    直線距離&nbsp;
									<span class="color-red">約<?php echo esc_html(number_format((float)$v_shop2->distance_km, 1)); ?>km</span>
                                </div>
                            <?php endif; 
							*/
							?>
                        </div>
                    </div>
                </div>

                <div class="area_link_box ta-r">
                    <a class="pos-r bold color-red shop-detail-btn" href="<?php echo esc_url(jc_get_shop_area_url($v_shop2, $base_path)); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/arrow.svg" alt="">
                    </a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<?php endif; ?>


<section class="shop-area-city renew section-inner" id="js-shop-area-city">
    <div class="common-ttl">
        <div class="section-inner">
            <h2 class="shop-title">
                <span class="common-ttl-sub">
                    <?php
                    if ($current_shop->shop_city1 == 'hokkaido' || $current_shop->shop_city1 == 'okinawa') {
                        echo esc_html(replacePrefecturesName($current_shop->shop_city1));
                    } else {
                        echo esc_html(replacePrefecturesName($current_shop->shop_city2));
                    }
                    ?>の
                </span>
                <span class="common-ttl-main">店舗一覧</span>
            </h2>
            <div class="common-ttl-en">Store List</div>
        </div>
    </div>

    <ul class="shop-area-city-list">
        <?php foreach ($prefecture_shops as $v_shop2) : ?>
            <li class="shop-area-city-item">
                <div class="area_info_box_wrap">
                    <div class="area_info_box1">
                        <h3 class="shop-name bold">
                            <div class="area_kaitori">
                                <?php
                                if ($v_shop2->shop_city1 == 'hokkaido' || $v_shop2->shop_city1 == 'okinawa') {
                                    echo esc_html(replacePrefecturesName($v_shop2->shop_city1));
                                } else {
                                    echo esc_html(replacePrefecturesName($v_shop2->shop_city2));
                                }
                                ?>
                            </div>

                            <div class="name">
                                <a href="<?php echo esc_url(jc_get_shop_area_url($v_shop2, $base_path)); ?>">
                                    <?php echo esc_html($v_shop2->shop_name); ?>
                                </a>
                            </div>
                        </h3>
                    </div>

                    <div class="area_info_box2">
                        <?php if (!empty($v_shop2->shop_tel)) : ?>
                            <a href="tel:<?php echo esc_attr(jc_format_tel_number($v_shop2->shop_tel)); ?>" class="shop-tel bold color-red">
                                TEL&nbsp;<?php echo esc_html($v_shop2->shop_tel); ?>
                            </a>
                        <?php else : ?>
                            <div class="shop-tel bold color-red"><?php the_field('オープン時期'); ?></div>
                        <?php endif; ?>

                        <div class="shop-info">
                            <div class="shop-address d-f"><?php echo esc_html($v_shop2->shop_add); ?></div>
                            <div class="shop-opening d-f">営業時間&nbsp;<?php echo esc_html($v_shop2->shop_time); ?></div>
                        </div>
                    </div>
                </div>

                <div class="area_link_box ta-r">
                    <a class="pos-r bold color-red shop-detail-btn" href="<?php echo esc_url(jc_get_shop_area_url($v_shop2, $base_path)); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/arrow.svg" alt="">
                    </a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>





      <?php get_template_part( 'template-parts/common-tab' );?>

		</div>





		<?php

			if($line_show){

				echo '<div><a class="line-btn" href="https://line.me/R/ti/p/'.$line_id.' " target="_blank">
						<img src="'.esc_url(get_template_directory_uri()).'/assets/images/shop/line_icon.png">
					  </a></div>';
			}

		?>












<?php /* パンくずリスト ※footer設定済
<?php
$url = get_permalink($post->ID);
$parsed_url = explode('/', $url);
$base_url1 = implode('/', array_slice($parsed_url, 0, 5)) . '/';
$base_url2 = implode('/', array_slice($parsed_url, 0, 6)) . '/';
$base_url3 = implode('/', array_slice($parsed_url, 0, 7)) . '/';
$base_url4 = implode('/', array_slice($parsed_url, 0, 8)) . '/';
$base_url5 = implode('/', array_slice($parsed_url, 0, 9)) . '/';
?>

<?php if(strpos(get_permalink($post->ID), 'tokei') !== false): //URLにtokeiが含まれている場合の処理 ?>
	<?php $category_parent = '時計';?>
<?php elseif(strpos(get_permalink($post->ID), 'brand') !== false): //URLにbrandが含まれている場合の処理 ?>
	<?php $category_parent = 'ブランド品';?>
<?php endif;?>

<?php if(strpos(get_permalink($post->ID), 'rolex-top') !== false || strpos($url, 'vuitton') !== false): //URLにrolex-topまたはvuittonが含まれている場合の処理 ?>
	<?php if(strpos(get_permalink($post->ID), 'hokkaido') !== false || strpos($url, 'okinawa') !== false): //URLにhokkaidoまたはokinawaが含まれている場合の処理 ?>
		<script type="application/ld+json">
			{
			"@context": "https://schema.org",
			"@type": "BreadcrumbList",
			"itemListElement": [{
				"@type": "ListItem",
				"position": 1,
				"name": "金・ブランド品・時計の買取ならジュエルカフェ",
				"item": "https://jewel-cafe.jp/"
			},{
				"@type": "ListItem",
				"position": 2,
				"name": "<?php echo $topmost_parent->post_title;?>の買取",
				"item": "<?php echo $base_url1;?>"
			},{
				"@type": "ListItem",
				"position": 3,
				"name": "<?php echo $parent_post_array->post_title;?>の買取",
				"item": "<?php echo $base_url2;?>"
			},{
				"@type": "ListItem",
				"position": 4,
				"name": "<?php echo $parent_post_array->post_title;?>買取の店舗案内",
				"item": "<?php echo $base_url3;?>"
			},{
				"@type": "ListItem",
				"position": 5,
				"name": "<?php echo get_post($post->post_parent)->post_title;?>の<?php echo $parent_post_array->post_title;?>買取",
				"item": "<?php echo $base_url4;?>"
			},{
				"@type": "ListItem",
				"position": 6,
				"name": "<?php echo $parent_post_array->post_title;?>買取なら<?php echo get_the_title($parent_id);?>"
			}]
			}
		</script>
	<?php else:?>
		<script type="application/ld+json">
			{
			"@context": "https://schema.org",
			"@type": "BreadcrumbList",
			"itemListElement": [{
				"@type": "ListItem",
				"position": 1,
				"name": "金・ブランド品・時計の買取ならジュエルカフェ",
				"item": "https://jewel-cafe.jp/"
			},{
				"@type": "ListItem",
				"position": 2,
				"name": "<?php echo $topmost_parent->post_title;?>の買取",
				"item": "<?php echo $base_url1;?>"
			},{
				"@type": "ListItem",
				"position": 3,
				"name": "<?php echo $parent_post_array->post_title;?>の買取",
				"item": "<?php echo $base_url2;?>"
			},{
				"@type": "ListItem",
				"position": 4,
				"name": "<?php echo $parent_post_array->post_title;?>買取の店舗案内",
				"item": "<?php echo $base_url3;?>"
			},{
				"@type": "ListItem",
				"position": 5,
				"name": "<?php echo get_post($post->post_parent)->post_title;?>の<?php echo $parent_post_array->post_title;?>買取",
				"item": "<?php echo $base_url5;?>"
			},{
				"@type": "ListItem",
				"position": 6,
				"name": "<?php echo $parent_post_array->post_title;?>買取なら<?php echo get_the_title($parent_id);?>"
			}]
			}
		</script>
	<?php endif;?>

<?php else:?>
	<?php if(strpos(get_permalink($post->ID), 'hokkaido') !== false || strpos($url, 'okinawa') !== false): //URLにhokkaidoまたはokinawaが含まれている場合の処理 ?>
		<script type="application/ld+json">
			{
			"@context": "https://schema.org",
			"@type": "BreadcrumbList",
			"itemListElement": [{
				"@type": "ListItem",
				"position": 1,
				"name": "金・ブランド品・時計の買取ならジュエルカフェ",
				"item": "https://jewel-cafe.jp/"
			},{
				"@type": "ListItem",
				"position": 2,
				"name": "<?php echo $topmost_parent->post_title;?>の買取",
				"item": "<?php echo $base_url1;?>"
			},{
				"@type": "ListItem",
				"position": 3,
				"name": "<?php echo $topmost_parent->post_title;?>買取の店舗案内",
				"item": "<?php echo $base_url2;?>"
			},{
				"@type": "ListItem",
				"position": 4,
				"name": "<?php echo get_post($post->post_parent)->post_title;?>の<?php echo $topmost_parent->post_title;?>買取",
				"item": "<?php echo $base_url3;?>"
			},{
				"@type": "ListItem",
				"position": 5,
				"name": "<?php echo $topmost_parent->post_title;?>買取なら<?php echo get_the_title($parent_id);?>"
			}]
			}
		</script>
	<?php else:?>
		<script type="application/ld+json">
			{
			"@context": "https://schema.org",
			"@type": "BreadcrumbList",
			"itemListElement": [{
				"@type": "ListItem",
				"position": 1,
				"name": "金・ブランド品・時計の買取ならジュエルカフェ",
				"item": "https://jewel-cafe.jp/"
			},{
				"@type": "ListItem",
				"position": 2,
				"name": "<?php echo $topmost_parent->post_title;?>の買取",
				"item": "<?php echo $base_url1;?>"
			},{
				"@type": "ListItem",
				"position": 3,
				"name": "<?php echo $topmost_parent->post_title;?>買取の店舗案内",
				"item": "<?php echo $base_url2;?>"
			},{
				"@type": "ListItem",
				"position": 4,
				"name": "<?php echo get_post($post->post_parent)->post_title;?>の<?php echo $topmost_parent->post_title;?>買取",
				"item": "<?php echo $base_url4;?>"
			},{
				"@type": "ListItem",
				"position": 5,
				"name": "<?php echo $topmost_parent->post_title;?>買取なら<?php echo get_the_title($parent_id);?>"
			}]
			}
		</script>
	<?php endif;?>

<?php endif;?>
 */ ?>



<?php /* WebPage */ ?>
<?php
// 現在のURLを取得
$current_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// nameの条件分岐
$url = get_permalink($post->ID);
if (strpos($url, 'rolex-top') !== false || strpos($url, 'vuitton') !== false) {
    $page_name = $parent_post_array->post_title . '買取なら' . get_the_title($parent_id);
} else {
    $page_name = $topmost_parent->post_title . '買取なら' . get_the_title($parent_id);
}

// 公開日と更新日
$date_published = mysql2date('Y-m-d', $post->post_date);
$date_modified = get_latest_shop_area_post_date($post->post_name);

// スキーマ構造を配列で構築
$schema = [
    '@context' => 'https://schema.org/',
    '@type' => 'WebPage',
    '@id' => $current_url,
    'name' => $page_name,
    'datePublished' => $date_published,
    'dateModified' => $date_modified,
    'publisher' => [
        '@type' => 'Organization',
        'name' => '株式会社クレイン',
        'url' => 'https://jewel-cafe.jp/company/'
    ]
];

// JSON-LDとして出力
echo '<script type="application/ld+json">';
echo wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
echo '</script>';
?>






<?php /* LocalBusiness */ ?>

<?php //郵便番号部分だけを抽出して表示
$postcode = $shop_info[0]->shop_add;
// 正規表現で郵便番号を抽出
preg_match('/〒(\d{3}-\d{4})/', $postcode, $matches_postcode);
?>

<?php //都道府県部分だけを抽出して表示
$prefecture = $shop_info[0]->shop_add;
// 都道府県のリスト
$prefectures = [
    '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県', '埼玉県',
    '千葉県', '東京都', '神奈川県', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県',
    '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県',
    '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県', '大分県',
    '宮崎県', '鹿児島県', '沖縄県'
];
// 都道府県を抽出する正規表現を作成
$pattern = '/' . implode('|', $prefectures) . '/';
// 正規表現で都道府県を抽出
preg_match($pattern, $prefecture, $matches);
?>

<?php //郵便番号以外を抽出して表示
$address = $shop_info[0]->shop_add;
// 正規表現で郵便番号を取り除く
$address_without_postcode = preg_replace('/〒\d{3}-\d{4}/', '', $address);
// 空白文字を削除
$address_without_postcode = preg_replace('/^\s+|\s+$/u', '', $address_without_postcode);
?>

<?php
// 郵便番号が取り除かれた住所から都道府県を取り除く
$address_without_postcode_pref = preg_replace('/'.$matches[0].'/', '', $address_without_postcode);
// 市区町村部分を抽出する正規表現パターン
$pattern2 = "/^(.*?)(市|区|町|村)/s";
preg_match($pattern2, $address_without_postcode_pref, $city);
// 空白文字を削除
$city[0] = preg_replace('/^\s+|\s+$/u', '', $city[0]);
?>

<?php //住所から緯度経度を取得
function getLatLong($address) {
    $apiKey = 'AIzaSyBDG1w7am_338bO-1sZuc0DRIbEPHmlJ5g';
    // 住所をURLエンコード
    $address = urlencode($address);
    // Geocoding APIのエンドポイント
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key={$apiKey}";
    // cURLでリクエストを送信
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    // 返されたJSONデータをデコード
    $responseData = json_decode($response, true);
    // 緯度経度を取得
    if ($responseData['status'] == 'OK') {
        $latitude = $responseData['results'][0]['geometry']['location']['lat'];
        $longitude = $responseData['results'][0]['geometry']['location']['lng'];
        return array('lat' => $latitude, 'lng' => $longitude);
    } else {
        return false;
    }
}
// 住所
$address = trim($address_without_postcode);
$coordinates = getLatLong($address);
?>

<?php //openingHoursの出力設定
// 曜日とその英語短縮形を含む配列
$weekdays = [
    "月曜日" => "Mo", "月曜" => "Mo",
    "火曜日" => "Tu", "火曜" => "Tu",
    "水曜日" => "We", "水曜" => "We",
    "木曜日" => "Th", "木曜" => "Th",
    "金曜日" => "Fr", "金曜" => "Fr",
    "土曜日" => "Sa", "土曜" => "Sa",
    "日曜日" => "Su", "日曜" => "Su"
];
// 調べる文字列
$holiday = $shop_info[0]->shop_holiday;
$time = $shop_info[0]->shop_time;
// 「～」を「-」に変換
$time = str_replace("～", "-", $time);
// 使用されていない曜日の短縮形を格納するための配列
$unusedWeekdays = ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"];
// 含まれる曜日をチェックし、使用されている英語短縮形を除去
foreach ($weekdays as $day => $short) {
    if (strpos($holiday, $day) !== false) {
        $unusedWeekdays = array_diff($unusedWeekdays, [$short]);
    }
}
// 使用されていない曜日に時間を追加してJSON形式で構造化
$output = [];
foreach ($unusedWeekdays as $short) {
    $output[] = "$short $time";
}
// JSON構造を作成し、出力
$result = ["openingHours" => $output];
$jsonResult = json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
// 最初の「{」と最後の「}」を省いて出力
// echo substr($jsonResult, 1, -1);
?>

<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "LocalBusiness",
		"@id": "<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
		"name": "ジュエルカフェ<?php echo get_the_title($parent_id);?>",
		"image": "<?php echo $shop_info[0]->shop_image1;?>",
		"url": "<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
		"telephone": "<?php echo $shop_info[0]->shop_tel;?>",
		"address": {
			"@type": "PostalAddress",
			"streetAddress": "<?php echo $address_without_postcode;?>",
			"addressLocality": "<?php echo $city[0];?>",
			"addressRegion": "<?php echo $matches[0];?>",
			"postalCode": "<?php echo $matches_postcode[1];?>",
			"addressCountry": "JP"
		},
		<?php echo substr($jsonResult, 1, -1); ?>,
		<?php /* "priceRange": "$$", 適切な価格帯を設定 */ ?>
		"geo": {
			"@type": "GeoCoordinates",
			"latitude": <?php echo $coordinates['lat'];?>,
			"longitude": <?php echo $coordinates['lng'];?>
		},
		"sameAs": [
			"https://www.instagram.com/jewelcafe.jp",
			"https://twitter.com/Jewel_Cafe",
			"https://page.line.me/cob5096n"
		]
	}
</script> 





<?php get_template_part('template-parts/shop-faq', 'schema'); ?>



<?php get_footer( );?>