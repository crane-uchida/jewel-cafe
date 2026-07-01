<?php
	$wp_obj = get_queried_object(  );
	$terms = get_the_terms( $post->ID, 'area' );
	$parent_id = $post->post_parent;
	$hinmoku_term = get_the_terms( $post->ID, 'hinmoku' );

	
	if( is_array($terms) ){
	
	$terms_array = array_reverse($terms);
	foreach ($terms_array as $term) {
		if($term->parent !== 0) {
			$child_term_name = esc_html( $term->name );
		}
	}
	
	}
	
?>



<section class="store-detail-guide" id="js-store-guide">
	<div class="common-ttl">
		<div class="section-inner">
			<h2 class="shop-title">

				<?php if (!empty($args[0]->item)) { // itemがある場合（品目用店舗ページで表示） ?>
								<span class="common-ttl-sub" id="shop_info"><?php echo $args[0]->shop_name;?>での</span>
								
								<span class="common-ttl-main"><span class="common-ttl-sub"><?php echo str_replace('・貴金属','',$args[0]->item);?>買取・査定の</span><span class="color-red">ご案内</span></span>
				<?php } else {  // itemがない場合（通常店舗ページで表示）?>
								<span class="common-ttl-sub" id="shop_info"><?php echo $args[0]->shop_name;?>の</span>
								<span class="common-ttl-main">店舗<span class="color-red">案内</span></span>
				<?php } ?>

			</h2>
			<div class="common-ttl-en">Store Guide</div>
		</div>
	</div>


<style>
	.swiper-shop{overflow:hidden;}
	.swiper-shop .swiper-slide-next,
	.swiper-shop .swiper-slide-prev{
		opacity: 0.3;
	}
</style>


<div class="section-inner">









<div class="swiper-shop">
	<div class="swiper-wrapper">
		<?php
			if(!empty($args[0]->shop_image1)):
		?>
			<div class="swiper-slide">
				<img src="<?php echo $args[0]->shop_image1;?>" alt="<?php echo $args[0]->shop_name;?>">
<?php /* ?>
<picture data-src="<?php echo $args[0]->shop_image1;?>">
<source type="image/avif">
<img alt="<?php echo $args[0]->shop_name;?>">
</picture>
<?php */ ?>
			</div>
		<?php endif;?>

		<?php
			if(!empty($args[0]->shop_image2)):
		?>
			<div class="swiper-slide">
				<img src="<?php echo $args[0]->shop_image2;?>" alt="<?php echo $args[0]->shop_name;?>">
<?php /* ?>
<picture data-src="<?php echo $args[0]->shop_image2;?>">
  <source type="image/avif">
  <img alt="<?php echo $args[0]->shop_name;?>">
</picture>
<?php */ ?>
			</div>
		<?php endif;?>

		<?php
			if(!empty($args[0]->shop_image3)):
		?>
			<div class="swiper-slide">
				<img src="<?php echo $args[0]->shop_image3;?>" alt="<?php echo $args[0]->shop_name;?>">
<?php /* ?>
<picture data-src="<?php echo $args[0]->shop_image3;?>">
  <source type="image/avif">
  <img alt="<?php echo $args[0]->shop_name;?>">
</picture>
<?php */ ?>
			</div>
		<?php endif;?>
	</div>
</div>

</div>

<script>
	const mySwiper = new Swiper('.swiper-shop', {
		// Optional parameters
		//loop: true,
		centeredSlides: true,
		autoplay: { // 自動再生させる
			delay: 3000, // 次のスライドに切り替わるまでの時間（ミリ秒）
			disableOnInteraction: false, // ユーザーが操作しても自動再生を止めない
			waitForTransition: false, // アニメーションの間も自動再生を止めない（最初のスライドの表示時間を揃えたいときに）
		},
		slidesPerView: 1,
		watchSlidesProgress: true,
		breakpoints: {
			600: { // 画面幅600px以上で適用
			slidesPerView: 1.5,
			}
		},
	});
</script>


	<div class="store-map">

	
<?php /* ?>ワードプレスプラグインを使ったGoogleマップ
		<?php $shopmap = get_field('shopmap'); if($shopmap):?>
			<div class="acf-map">
				<div class="marker" data-lat="<?php echo esc_attr($shopmap['lat']);?>" data-lng="<?php echo esc_attr($shopmap['lng']);?>"></div>
			</div>
		<?php endif;?>
<?php */ ?>





<?php /* ?>新Googleマップ<?php */ ?>
	<div class="map">
        <div id="google_map" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></div>
    </div>












			<br>
			<br>
			
			<div class="store-map-btn-list">
				<a href="http://maps.google.com/maps?saddr=&daddr=<?php echo urlencode('ジュエルカフェ'.$args[0]->shop_name);?>&dirflg=" target="_blank" rel="noopener noreferrer" >GoogleMapでお店までの経路をみる</a>
			</div>
		
	</div>
	
	<h3 class="section-ja-title"><?php echo $args[0]->shop_name;?></h3>
	
	

	<?php if(!empty($args[0]->shop_about)):?>
		<p class="shop-att"><?php echo nl2br($args[0]->shop_about);?></p>
	<?php endif;?>





	<?php if ( is_single( 'aeonlaketown-mori' ) ): //エキテンの来店予約ボタン ?>
		<style>
		.ekiten{margin-bottom: 30px;}
		@media screen and (min-width:1024px) {
		    .ekiten{position: relative; top: 15px; width: 310px;}
		}
		</style>
		<div class="ekiten">
		<div class="ekiten-gadget" data-gadget-type="reserve_button" data-shop-id="54936256" style="display: none"></div><script src="https://static.ekiten.jp/js/gadget.js" async="async" defer="defer" charset="UTF-8"></script>
		</div>
	<?php endif;?>





<?php /* ?>
	<div class="shop-info-tab">
		<div class="shop-tab bold ls-11">
			店舗情報
		</div>
		<?php if(!empty($args[0]->shop_directions1)):?>
		<div class="shop-tab bold ls-11">
			道順
		</div>
		<?php endif;?>
	</div>
<?php */ ?>
	
	
	<div class="shop-tab-content-area">
		<div class="shop-tab-content show">
			<table class="bold">
				<tbody>
					<tr>
						<th>営業時間</th>
						<td>
							<?php echo $args[0]->shop_time;?>
						</td>
					</tr>
					<tr>
						<th>定休日</th>
						<td><?php echo $args[0]->shop_holiday;?></td>
					</tr>
					<tr>
						<th>所在地</th>
						<td>
							<?php echo $args[0]->shop_add;?>					
						
							
								<span class="shop-tab-content-linkWrapper">
										
										
										<?php if( trim($args[0]->shop_facility_hp) !== '' ):?>
										
										<a href="<?php echo $args[0]->shop_facility_hp;?>" class="shop-tab-content-link" target="_blank">施設のホームページを見る</a>
										
										<?php endif;?>	
										
										
										<?php if( trim($args[0]->shop_floor_map) !== '' ):?>
										
										<a href="<?php echo $args[0]->shop_floor_map;?>" class="shop-tab-content-link" target="_blank">フロアマップを見る</a>
										
										<?php endif;?>		
										
								</span>

						</td>
					</tr>

					<?php if( $args[0]->shop_access ):?>
					<tr>
						<th>アクセス情報</th>
						<td><?php echo $args[0]->shop_access;?></td>
					</tr>
					<?php endif;?>


					<?php if( $args[0]->shop_tel ):?>
					<tr>
						<th>電話番号</th>
						<td>
							<a href="tel:<?php
								$tel = $args[0]->shop_tel;
								$tel = str_replace(array('-', 'ー', '−', '―', '‐','(',')','（','）',' ','　'), '', $tel);
								echo $tel;
							?>" class="shop-tab-content-tel bold"><?php echo $args[0]->shop_tel; ?></a>
						</td>
					</tr>
					<?php endif;?>

					
					
					<tr>
						<th>買取品目</th>
						<td>
							<?php 
							
								$hinmoku = $args[0]->shop_item;
								

								if (strpos($hinmoku, 'gold') !== false) {	
									
									echo '<a href="/kaitori/gold/">金プラチナ</a>・';
									
								}
								

								if (strpos($hinmoku, 'diamond') !== false) {	
									
									echo '<a href="/kaitori/diamond/">ダイヤモンド</a>・';
									
								}
								
								
								if (strpos($hinmoku, 'jewel') !== false) {	
									
									echo '<a href="/kaitori/jewelry/">宝石</a>・';
									
								}
								
								
								if (strpos($hinmoku, 'brand') !== false) {	
									
									echo '<a href="/kaitori/brand/">ブランドバッグ</a>・';
									
								}
						
								if (strpos($hinmoku, 'tokei') !== false) {	
									
									echo '<a href="/kaitori/tokei/">ブランド腕時計</a>・';
									
								}


								if (strpos($hinmoku, 'card') !== false) {	
								
									echo '<a href="/kaitori/card/">金券</a>・';
									
								}
						
						

								if (strpos($hinmoku, 'letter') !== false) {	
								
									echo '<a href="/kaitori/letter-top/">切手</a>・';
									
								}
								
								
								if (strpos($hinmoku, 'post_card') !== false) {	
									
									echo '<a href="/kaitori/postcard/">はがき</a>・';
									
								}
								
								
								if (strpos($hinmoku, 'osake') !== false) {	

									echo '<a href="/kaitori/osake/">お酒</a>・';
									
								}
								
								
								if (strpos($hinmoku, 'letter') !== false) {	
									
									echo '<a href="/kaitori/kottou/">骨董品</a>・';
									
								}
								
								
								if (strpos($hinmoku, 'cosme') !== false) {
									
									echo '<a href="/kaitori/cosme/">化粧品</a>';
									
								}

					
							?>
						</td>
					</tr>
					
					
					<tr>
						<th>買取方法</th>
						<td>
							
							<a href="/trip-buy/">出張買取</a>・
							<a href="/delivery-buy/">宅配買取</a>・
							<a href="/shop-buy/">店頭買取</a>	
							
						</td>
					</tr>
					
					<tr>
						<th>マップコード</th>
						<td><?php echo $args[0]->shop_map_code; ?><span class="normal d-b">※「マップコード」および「ＭＡＰＣＯＤＥ」は（株）デンソーの登録商標です。</span></td>
					</tr>
					<tr>
						<th>古物商許可証番号</th>
						<td>東京都公安委員会許可第302210708825号</td>
					</tr>
				</tbody>
			</table>
		</div>



	</div>
	
	<p class="base-font-size mtb-12"><?php echo nl2br($args[0]->shop_introduction);?></p>
	
</section>






<section class="service">
	<h2 class="title"><?php echo $args[0]->shop_name;?>の特徴とサービス</h2>
	<ul class="service_list_flex">
		
		<?php if ($args[0]->p_appraisal == '1'): ?>
		<li>
			<div class="icon"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon_free_assessment.svg" alt=""></div>
			<div class="name">査定無料</div>
		</li>
		<?php endif; ?>
		
		<?php if ($args[0]->p_reserve == '1'): ?>
		<li>
			<div class="icon"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon_reservation.svg" alt=""></div>
			<div class="name">来店予約</div>
		</li>
		<?php endif; ?>
		
		<?php if ($args[0]->p_deposit == '1'): ?>
		<li>
			<div class="icon"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon_custody.svg" alt=""></div>
			<div class="name">お預かり査定</div>
		</li>
		<?php endif; ?>
		
		
		<?php if ($args[0]->p_female == '1'): ?>
		<li>
			<div class="icon"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon_women_staff.svg" alt=""></div>
			<div class="name">女性スタッフ</div>
		</li>
		<?php endif; ?>
		
		<?php if ($args[0]->p_drink == '1'): ?>
		<li>
			<div class="icon"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon_free_drink.svg" alt=""></div>
			<div class="name">無料ドリンク</div>
		</li>
		<?php endif; ?>
		
		<?php if ($args[0]->p_clean == '1'): ?>
		<li>
			<div class="icon"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon_jewelry_cleaning.svg" alt=""></div>
			<div class="name">ジュエリー<br>クリーニング</div>
		</li>
		<?php endif; ?>
		
		<?php if ($args[0]->p_coupon == '1'): ?>
		<li>
			<div class="icon"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon_coupon.svg" alt=""></div>
			<div class="name">次回クーポン</div>
		</li>
		<?php endif; ?>
		
		<?php if ($args[0]->p_gift == '1'): ?>
		<li>
			<div class="icon"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon_present.svg" alt=""></div>
			<div class="name">成約プレゼント</div>
		</li>
		<?php endif; ?>
		
		<?php if ($args[0]->p_parking == '1'): ?>
		<li>
			<div class="icon"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon_parking_available.svg" alt=""></div>
			<div class="name">駐車場あり</div>
		</li>
		<?php endif; ?>
		
		<?php if ($args[0]->p_station == '1'): ?>
		<li>
			<div class="icon"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon_station.svg" alt=""></div>
			<div class="name">駅チカ</div>
		</li>
		<?php endif; ?>
		
		<?php if ($args[0]->p_mal == '1'): ?>
		<li>
			<div class="icon"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon_commercial_facility.svg" alt=""></div>
			<div class="name">商業施設</div>
		</li>
		<?php endif; ?>
		
	</ul>
</section>







<?php if( $args[0]->shop_directions1 ):?>
<section class="access_route">
	<h2 class="title"><?php echo $args[0]->shop_name;?>のアクセス</h2>
		<div class="shop-tab-content-area">
			<div class="shop-tab-content show">
				<div class="map-img-guide">
					<ul>
						<li>
							<p class="map-img-guide-number">01</p>
							<div class="map-img-guide-img">
								<?php
									if(!empty($args[0]->shop_directions1)):
								?>
								<img src="<?php echo $args[0]->shop_directions1;?>" alt="">
<?php /* ?>
	<picture data-src="<?php echo $args[0]->shop_directions1;?>">
		<source type="image/avif">
		<img alt="">
	</picture>
<?php */ ?>
								<?php endif;?>
							</div>
							<p>
								<?php 
									echo $args[0]->shop_directions1_txt;
								?>
							</p>
						</li>
						<?php
							if(!empty($args[0]->shop_directions2)):
						?>
						<li>
							<p class="map-img-guide-number">02</p>
							<div class="map-img-guide-img">
								<img src="<?php echo $args[0]->shop_directions2;?>" alt="">
<?php /* ?>
	<picture data-src="<?php echo $args[0]->shop_directions2;?>">
		<source type="image/avif">
		<img alt="">
	</picture>
<?php */ ?>
							</div>
							<p>
								<?php 
									echo $args[0]->shop_directions2_txt;
								?>
							</p>
						</li>
						<?php endif;?>
						<?php
							if(!empty($args[0]->shop_directions3)):
						?>
						<li>
							<p class="map-img-guide-number">03</p>
							<div class="map-img-guide-img">
								<img src="<?php echo $args[0]->shop_directions3;?>" alt="">
<?php /* ?>
<picture data-src="<?php echo $args[0]->shop_directions3;?>">
	<source type="image/avif">
	<img alt="">
</picture>
<?php */ ?>
							</div>
							<p>
								<?php 
									echo $args[0]->shop_directions3_txt;
								?>
							</p>
						</li>
						<?php endif;?>
						<?php
							if(!empty($args[0]->shop_directions4)):
						?>
						<li>
							<p class="map-img-guide-number">04</p>
							<div class="map-img-guide-img">
								<img src="<?php echo $args[0]->shop_directions4;?>" alt="">
<?php /* ?>
<picture data-src="<?php echo $args[0]->shop_directions4;?>">
	<source type="image/avif">
	<img alt="">
</picture>
<?php */ ?>
							</div>
							<p>
								<?php 
									echo $args[0]->shop_directions4_txt;
								?>
							</p>
						</li>
						<?php endif;?>
						<?php
							if(!empty($args[0]->shop_directions5)):
						?>
						<li>
							<p class="map-img-guide-number">05</p>
							<div class="map-img-guide-img">
								<img src="<?php echo $args[0]->shop_directions5;?>" alt="">
<?php /* ?>
<picture data-src="<?php echo $args[0]->shop_directions5;?>">
	<source type="image/avif">
	<img alt="">
</picture>
<?php */ ?>
							</div>
							<p>
								<?php 
									echo $args[0]->shop_directions5_txt;
								?>
							</p>
						</li>
						<?php endif;?>
						<?php
							if(!empty($args[0]->shop_directions6)):
						?>
						<li>
							<p class="map-img-guide-number">06</p>
							<div class="map-img-guide-img">
								<img src="<?php echo $args[0]->shop_directions6;?>" alt="">
<?php /* ?>
<picture data-src="<?php echo $args[0]->shop_directions6;?>">
	<source type="image/avif">
	<img alt="">
</picture>
<?php */ ?>
							</div>
							<p>
								<?php 
									echo $args[0]->shop_directions6_txt;
								?>
							</p>
						</li>
						<?php endif;?>
					</ul>
				</div>
			</div>
		</div>
</section>
<?php endif;?>








<?php if (!empty($args[0]->p_name)): ?>
<section class="parking">
	<h2 class="title"><?php echo $args[0]->shop_name;?>近隣の駐車場</h2>
	<div class="flex">
		<div class="left_box">
			<div class="name">
				<?php echo $args[0]->p_name;?>
			</div>
		</div>
		<div class="right_box">

			<?php
			// データの取得（変数に代入して扱いやすくします）
			$p_add  = $args[0]->p_add;
			$p_name = $args[0]->p_name;

			// 住所がある場合のみ表示
			if (!empty($p_add)): 
				// 検索ワードの組み立て（住所 + 施設名 + " 駐車場"）
				// 施設名が空の場合も考慮して、array_filterで空要素を除去して連結します
				$search_words = array_filter([$p_add, $p_name, "駐車場"]);
				$query = implode(" ", $search_words);
				$map_url = "https://www.google.com/maps/search/?api=1&query=" . rawurlencode($query);
			?>
				<div class="address">
					<?php echo htmlspecialchars($p_add, ENT_QUOTES, 'UTF-8'); ?>
					<a href="<?php echo $map_url; ?>" target="_blank" rel="noopener noreferrer">
						地図を見る
					</a>
				</div>
			<?php endif; ?>

			<?php if (!empty($args[0]->p_capacity)): ?>
				<div class="capacity"><?php echo $args[0]->p_capacity; ?></div>
			<?php endif; ?>

			<?php if ($args[0]->p_type !== '4'): ?>
			<div class="time"><?php echo $args[0]->p_time;?></div>
			<?php endif; ?>
			
			
			<?php if ($args[0]->p_type !== '4'): ?>
			<div class="price"><?php echo $args[0]->p_price;?></div>
			<?php endif; ?>
			
			<?php if ($args[0]->p_type !== '3' && $args[0]->p_type !== '4'): ?>
			<div class="text"><?php echo $args[0]->p_service;?></div>
			<?php endif; ?>


		</div>
	</div>
</section>
<?php endif; ?>












<script>
document.querySelectorAll('picture[data-src]').forEach(picture => {
  const src = picture.getAttribute('data-src');
  picture.querySelector('source').srcset = `https://res.cloudinary.com/di7ku0rqu/image/fetch/f_auto,q_auto/${src}`;
  picture.querySelector('img').src = src;
});
</script>




<script src="https://maps.google.com/maps/api/js?key=AIzaSyBDG1w7am_338bO-1sZuc0DRIbEPHmlJ5g&language=ja"></script>

<?php
global $wpdb;
$table_name = 'wp_shop_admin';

// ========================================
// URLに指定の文字列が含まれていれば緯度経度を直接指定
// ========================================
$latlng_data = [
    'uozu' => [  // アイタウン魚津店
        'lat' => 36.820293,
        'lng' => 137.411773
    ]
    // 追加例
    // 'AAA' => [ ... ],
];

// URL判定と緯度経度取得
$current_url = $_SERVER['REQUEST_URI'];
$use_latlng = false;
$lat = null;
$lng = null;

foreach ($latlng_data as $keyword => $coords) {
    if (strpos($current_url, $keyword) !== false) {
        $use_latlng = true;
        $lat = $coords['lat'];
        $lng = $coords['lng'];
        break;
    }
}

// ========================================
// 独自テーブルから正しい shop_id を特定
// ========================================
$shop_name = $args[0]->shop_name; 
$row = $wpdb->get_row($wpdb->prepare(
    "SELECT * FROM $table_name WHERE shop_name = %s", 
    $shop_name
));

$actual_shop_id = $row ? $row->shop_id : 0;
$saved_lat = $row ? $row->lat : '未登録';
$saved_lng = $row ? $row->lng : '未登録';
?>

<script>
    (function() {
        const target = document.getElementById('google_map');
        if (!target) return;

        // PHPの値を安全にJSオブジェクトに変換
        const shopInfo = <?php echo json_encode([
            'shop_id'  => $actual_shop_id,
            'name'     => $args[0]->shop_name,
            'address'  => $args[0]->shop_add,
            'manualLat'=> $use_latlng ? (float)$lat : null,
            'manualLng'=> $use_latlng ? (float)$lng : null,
            'dbLat'    => ($row && $row->lat) ? (float)$row->lat : null,
            'dbLng'    => ($row && $row->lng) ? (float)$row->lng : null,
            'isManual' => $use_latlng
        ]); ?>;

        const mapConfig = {
            zoom: 16,
            mapTypeId: 'roadmap'
        };

        // 地図作成関数
        function createMap(lat, lng) {
            const pos = { lat: parseFloat(lat), lng: parseFloat(lng) };
            if (isNaN(pos.lat) || isNaN(pos.lng)) return;

            const map = new google.maps.Map(target, {
                ...mapConfig,
                center: pos
            });
            const marker = new google.maps.Marker({
                position: pos,
                map: map
            });
            const infowindow = new google.maps.InfoWindow({
                content: '<div class="info"><p>' + shopInfo.name + '</p></div>'
            });
            marker.addListener('click', () => infowindow.open(map, marker));
        }

        // DB保存関数
        function saveToDatabase(lat, lng) {
            if (!shopInfo.shop_id || shopInfo.shop_id == "0") return;
            const formData = new FormData();
            formData.append('action', 'save_mapcode_coords');
            formData.append('shop_id', shopInfo.shop_id);
            formData.append('lat', lat);
            formData.append('lng', lng);

            fetch('/wp-admin/admin-ajax.php', { method: 'POST', body: formData })
                .then(res => res.text())
                .then(msg => console.log("DB同期:", msg))
                .catch(err => console.error("保存失敗:", err));
        }

        // --- メイン実行ロジック ---
        if (shopInfo.isManual) {
            // 1. 手動設定がある場合（魚津店など）
            console.log("モード: 手動設定優先");
            createMap(shopInfo.manualLat, shopInfo.manualLng);
            saveToDatabase(shopInfo.manualLat, shopInfo.manualLng);

        } else if (shopInfo.dbLat && shopInfo.dbLng) {
            // 2. すでにDBに値がある場合
            console.log("モード: DB保存値使用");
            createMap(shopInfo.dbLat, shopInfo.dbLng);

        } else {
            // 3. どちらもなければGoogle検索
            console.log("モード: Google Geocoding実行");
            const geocoder = new google.maps.Geocoder();
            geocoder.geocode({ address: shopInfo.address }, function(results, status) {
                if (status === 'OK' && results[0]) {
                    const loc = results[0].geometry.location;
                    createMap(loc.lat(), loc.lng());
                    saveToDatabase(loc.lat(), loc.lng());
                } else {
                    console.error("ジオコーディング失敗:", status);
                }
            });
        }
    })();
</script>