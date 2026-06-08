<?php
/*
Template Name: 店舗iPhone修理ページ
*/

?>

<?php get_header( );?>

<style>
	.pagetop{
		@media screen and (max-width:500px){
			bottom:50px;
		}
	}
	.shop-detail .breadcrumbs{
		padding-top: 15px;
		@media screen and (min-width:1000px){
			padding-top: 40px;
		}
	}
	.main-section{
		margin-top:82.5px;
		@media screen and (max-width:500px){
			margin-top:55px;
		}
	}
	.main-section img{
		margin-left:auto;
		margin-right:auto;
		display: block;
		max-width:100%;
		width:auto;
	}

	#iphone-repair .shop-detail-faq .accordion .accordion-item .accordion-head a{
		padding-left:0;
	}
	.footer-shop-nav-menu{
		justify-content:center;
	}
	.footer-shop-nav-menu li:first-child{
		display:none;
	}



/* 修理料金表01 */
.iphone_repair_price_list {
	width:100%;
    border: 1px solid #dddddd;
    border-collapse: collapse;
    border-spacing: 0;
    background:#ffffff;
	text-align:center;

}
.iphone_repair_price_list th {
    color: #fff;
    padding-top:10px;
	padding-bottom:10px;
    border-bottom: 1px solid #dddddd;
	border-left: 1px solid #dddddd;
    background: #797979;
    font-weight:normal;
    font-size:20px;
}
.iphone_repair_price_list th .small{
	font-size:16px;
}
.iphone_repair_price_list tr th:first-child{
	text-align:left;
	padding-left:15px;
}
.iphone_repair_price_list td {
	border-left: 1px solid #dddddd;
	font-size:28px;

}
.iphone_repair_price_list td{font-size:16px;}
.iphone_repair_price_list td span{font-size:23px;padding-right: 3px;}
.iphone_repair_price_list tr:nth-child(2n+1) {
    background: #f5f5f5;
}
@media screen and (max-width:500px){
	.iphone_repair_price_list th{
		font-size:11px;
	}
	.iphone_repair_price_list th .small{
		font-size:10px;
	}
	.iphone_repair_price_list td span {
		font-size:13px;
		padding-right: 1px;
	}
	.iphone_repair_price_list td {
    	font-size: 10px;
	}
	.iphone_repair_price_list tr th:first-child{
		padding-left: 3px;
	}
}


/* 修理事例 */
#iphone-repair .repair-resuluts .blog-archive-list .blog-archive-ttl{
	color:#C80000;
}
#iphone-repair .repair-resuluts .blog-archive-list{
	margin-top:0;
}
#iphone-repair .repair-resuluts .blog-archive-list li{
	align-items: center;
}
#iphone-repair .repair-resuluts .blog-archive-list .left img{
	width:250px;
}
#iphone-repair .repair-resuluts .blog-archive-list .left img:hover{
	transform: scale(2,2);
	transition-duration: 0.5s;
}
#iphone-repair .repair-resuluts .blog-archive-list .right .blog-archive-point{
	font-size:16px;
	line-height:2;
}
@media screen and (max-width:500px){
	#iphone-repair .repair-resuluts .blog-archive-list{
		text-align:center;
	}
	#iphone-repair .repair-resuluts .blog-archive-list .left img{
		width:100%;
	}
	#iphone-repair .repair-resuluts .blog-archive-list .right .blog-archive-point{
	font-size:14px;
	text-align:left;
	margin-top:20px;
}
}
</style>




<?php
// 슬래시(/)를 기준으로 문자열을 나누고, 배열의 마지막 요소를 얻습니다.
$parts = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
$post_name = end($parts);

// WP_Query 인스턴스 생성
$post_args2 = array(
    'post_type' => 'shop',
    'name' => $post_name,
    'posts_per_page' => 1, // 가져올 포스트 수
);

$post_query = new WP_Query($post_args2);

// 가져온 포스트 정보 사용
if ($post_query->have_posts()) {
    while ($post_query->have_posts()) {
        $post_query->the_post();
		$post = get_post(get_the_ID());
    }
    // 반드시 리셋 필요
    wp_reset_postdata();
}

	$parent_id = $post->post_parent;

	if($parent_id){ //店舗-品目ページ
		$local_image1 = get_field('slide_img_1', $parent_id);
		$local_map = get_field('shopmap', $parent_id);
		$local_tell = get_field('店舗電話番号', $parent_id);
		$local_postal = get_field('郵便番号', $parent_id);
		$local_region = get_field('都道府県', $parent_id);
		$local_locality = get_field('市区町村', $parent_id);
		$local_street = get_field('番地以降', $parent_id);
		$local_bussinessDay = get_field('営業日', $parent_id);
		$local_open = get_field('営業開始時間', $parent_id);
		$local_end = get_field('営業終了時間', $parent_id);
	}

	if($local_image1['url'] == ''){
		$google_img = 'https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/shop-detail-mv.jpeg';
	}else{
		$google_img = $local_image1['url'];
	}

$today_sql = "select * from `wp_goldchart` ORDER BY `wp_goldchart`.`id` DESC limit 0,2";
$today_result = $wpdb->get_results($today_sql);
?>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="/wp-content/themes/jewelcafe_replace/assets/css/new-style.css"/>




<div id="iphone-repair">
	<div id="page-top"></div>
	<div class="main-section">
		<picture>
			<source media="(min-width: 768px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/iphone_repair/mv_pc.png">
			<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/iphone_repair/mv_sp.png" alt="iPhone修理">
		</picture>
	</div>




<?php
$wp_obj = get_queried_object(  );
$terms = get_the_terms( $post->ID, 'area' );
$parent_id = $post->post_parent;

if($wp_obj->post_parent) { //店舗-品目ページ
	$hinmoku_term = get_the_terms( $post->ID, 'hinmoku' );
	echo
	'<div class="breadcrumbs">'.  //id名などは任意で
		'<div class="section-inner">'.
			'<a href="'. esc_url( home_url() ) .'">ジュエルカフェ<span></span></a><br class="only-sp">'.
			'<a href="'. esc_url( home_url('shop') ) .'">店舗案内<span></span></a>';
	foreach ($terms as $term) {
		if($term->parent === 0) {
			$parent_term_name = esc_html( $term->name );
			$parent_term_link = esc_url(get_term_link($term));
			echo
			'<a href="'. $parent_term_link .'">'.$parent_term_name.'<span></span></a>';
		}
	}
	foreach ($terms as $term) {
		if($term->parent !== 0) {
			$child_term_name = esc_html( $term->name );
			$child_term_link = esc_url(get_term_link($term));
			echo
			'<a href="'. $child_term_link .'">'.$child_term_name.'<span></span></a>';
		}
	}
	echo
		get_post( $parent_id )->post_title.' iPhone修理専門';
	echo '</div>'.
				'</div>';
} else { //店舗メインページ
	echo
		'<div class="breadcrumbs">'.  //id名などは任意で
			'<div class="section-inner">'.
				'<a href="'. esc_url( home_url() ) .'">TOP<span></span></a>'.
				'<a href="'. esc_url( home_url('shop') ) .'">店舗案内<span></span></a>';
		foreach ($terms as $term) {
			if($term->parent === 0) {
				$parent_term_name = esc_html( $term->name );
				$parent_term_link = esc_url(get_term_link($term));
				echo
				'<a href="'. $parent_term_link .'">'.$parent_term_name.'<span></span></a>';
			}
		}
		foreach ($terms as $term) {
			if($term->parent !== 0) {
				$child_term_name = esc_html( $term->name );
				$child_term_link = esc_url(get_term_link($term));
				echo
				'<a href="'. $child_term_link .'">'.$child_term_name.'<span></span></a>';
			}
		}
		echo
				'ジュエルカフェ'.$child_term_name.'-'.esc_html(get_the_title(  ));
		echo '</div>'.
					'</div>';
}
?>



		<div class="section-inner">
				<h1 class="section-ja-title shop-detail-h1">
					iPhone修理ならジュエルカフェ<br>鳥取吉成店
				</h1>


<section class="store-detail-guide" id="js-store-guide">
	<div class="common-ttl">
		<div class="section-inner">
			<h2 class="shop-title">
				<span class="common-ttl-sub" id="shop_info">ジュエルカフェ - <?php echo str_replace('-ロレックス買取','',get_the_title());?>の</span><span class="common-ttl-main">店舗<span class="color-red">案内</span></span>
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
			$image = get_field('slide_img_1',$parent_id);
			if(!empty($image)):
		?>
			<div class="swiper-slide">
				<img class="object-fit-contain no-lazyload" src="<?php echo esc_url($image['url']);?>" alt="<?php the_title();?>">
			</div>
		<?php endif;?>

		<?php
			$image = get_field('slide_img_2',$parent_id);
			if(!empty($image)):
		?>
			<div class="swiper-slide">
				<img class="object-fit-contain no-lazyload" src="<?php echo esc_url($image['url']);?>" alt="<?php the_title();?>">
			</div>
		<?php endif;?>

		<?php
			$image = get_field('slide_img_3',$parent_id);
			if(!empty($image)):
		?>
			<div class="swiper-slide">
				<img class="object-fit-contain no-lazyload" src="<?php echo esc_url($image['url']);?>" alt="<?php the_title();?>">
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
		<?php
			$shopmap = get_field('shopmap',$parent_id);
			if($shopmap):
		?>
			<div class="acf-map">
				<div class="marker" data-lat="<?php echo esc_attr($shopmap['lat']);?>" data-lng="<?php echo esc_attr($shopmap['lng']);?>"></div>
			</div>
			<div class="store-map-btn-list">
				<a href="http://maps.google.com/maps?saddr=&daddr=ジュエルカフェ<?php the_title();?>&dirflg=" target="_blank" rel="noopener noreferrer" >GoogleMapでお店までの経路をみる</a>
			</div>
		<?php endif;?>

	</div>
	
	<h3 class="section-ja-title">ジュエルカフェ <?php echo str_replace('-ロレックス買取','',get_the_title());?></h3>


	<?php if(get_option('show_holidays',$parent_id) == '1'):?>
		<?php if( get_field('the_year_end_and_new_year_holidays') ):?><p class="shop-att"><?php the_field('the_year_end_and_new_year_holidays');?></p><?php endif; ?>
	<?php endif;?>

	<?php if(get_field('一覧ページに載せるお知らせ',$parent_id)):?>
		<p class="shop-att"><?php the_field('一覧ページに載せるお知らせ');?></p>
	<?php endif;?>

	<?php if ( is_single( 'aeonlaketown-mori',$parent_id ) ): //エキテンの来店予約ボタン ?>
		<style>
			.ekiten{margin-bottom: 30px;}
			@media screen and (min-width:1024px) {
				.ekiten{position: relative; top: -20px; width: 310px;}
			}
		</style>
		<div class="ekiten">
		<div class="ekiten-gadget" data-gadget-type="reserve_button" data-shop-id="54936256" style="display: none"></div><script src="https://static.ekiten.jp/js/gadget.js" async="async" defer="defer" charset="UTF-8"></script>
		</div>
	<?php endif;?>

	<div class="shop-info-tab">
		<div class="shop-tab bold ls-11 active">
			店舗情報
		</div>

		<?php if(get_field('道順その1_本文',$parent_id)):?>
		<div class="shop-tab bold ls-11">
			道順
		</div>
		<?php endif;?>
	</div>
	<div class="shop-tab-content-area">
		<div class="shop-tab-content show">
			<table class="bold">
				<tbody>
					<tr>
						<th>営業時間</th>
						<td><?php the_field('営業時間',$parent_id);?></td>
					</tr>
					<tr>
						<th>定休日</th>
						<td><?php the_field('定休日',$parent_id);?></td>
					</tr>
					<tr>
						<th>所在地</th>
						<td>
							<?php the_field('所在地',$parent_id);?>
							
							
							<?php if(get_field('施設hpリンク',$parent_id) || get_field('フロアマップリンク',$parent_id)){?>
								<span class="shop-tab-content-linkWrapper">
									<?php if(get_field('施設hpリンク',$parent_id)):?>
										<a href="<?php echo esc_url(get_field('施設hpリンク'),$parent_id);?>" class="shop-tab-content-link" target="_blank">施設のホームページを見る</a>
									<?php endif;?>
									<?php if(get_field('フロアマップリンク',$parent_id)):?>
										<a href="<?php echo esc_url(get_field('フロアマップリンク',$parent_id));?>" class="shop-tab-content-link" target="_blank">フロアマップを見る</a>
									<?php endif;?>
								</span>
							<?php };?>
						</td>
					</tr>
					<?php if(get_field('店舗電話番号',$parent_id)):?>
					<tr>
						<th>電話番号</th>
						<td>
							<a href="tel:<?php
								$tel = get_field('店舗電話番号',$parent_id);
								$tel = str_replace(array('-', 'ー', '−', '―', '‐','(',')','（','）',' ','　'), '', $tel);
								echo $tel;
							?>" class="shop-tab-content-tel bold"><?php the_field('店舗電話番号',$parent_id); ?></a>
						</td>
					</tr>
					<?php endif;?>


					<tr>
						<th>マップコード</th>
						<td><?php the_field('マップコード',$parent_id);?><span class="normal d-b">※「マップコード」および「ＭＡＰＣＯＤＥ」は（株）デンソーの登録商標です。</span></td>
					</tr>
					<tr>
						<th>古物商許可証番号</th>
						<td>東京都公安委員会許可第302210708825号</td>
					</tr>
				</tbody>
			</table>
		</div>

		<?php if(get_field('道順その1_本文',$parent_id)):?>
		<div class="shop-tab-content">
			<div class="map-img-guide">
				<ul>
					<li>
						<p class="map-img-guide-number">01</p>
						<div class="map-img-guide-img">
							<?php
								$image = get_field('road_image1',$parent_id);
								if(!empty($image)):
								?>
									<img src="<?php echo esc_url($image['url']);?>" alt="<?php echo $image['alt'];?>">
							<?php endif;?>
						</div>
						<p><?php 
							$field_value = get_field('道順その1_本文',$parent_id);
							echo htmlspecialchars_decode($field_value, ENT_QUOTES);
						?></p>
					</li>

					<?php
						$image = get_field('road_image2', $parent_id);
						if(!empty($image)):
						?>
					<li>
						<p class="map-img-guide-number">02</p>
						<div class="map-img-guide-img">
							<img src="<?php echo esc_url($image['url']);?>" alt="<?php echo $image['alt'];?>">
						</div>
						<p><?php 
							$field_value = get_field('道順その2_本文',$parent_id);
							echo htmlspecialchars_decode($field_value, ENT_QUOTES);
						?></p>
					</li>
					<?php endif;?>

					<?php //道順3
						$image = get_field('road_image3', $parent_id);
						if(!empty($image)):
						?>
					<li>
						<p class="map-img-guide-number">03</p>
						<div class="map-img-guide-img">
							<img src="<?php echo esc_url($image['url']);?>" alt="<?php echo $image['alt'];?>">
						</div>
						<p><?php 
							$field_value = get_field('道順その3_本文',$parent_id);
							echo htmlspecialchars_decode($field_value, ENT_QUOTES);
						?></p>
					</li>
					<?php endif;?>

					<?php //道順4
						$image = get_field('road_image4', $parent_id);
						if(!empty($image)):
						?>
					<li>
						<p class="map-img-guide-number">04</p>
						<div class="map-img-guide-img">
							<img src="<?php echo esc_url($image['url']);?>" alt="<?php echo $image['alt'];?>">
						</div>
						<p><?php 
							$field_value = get_field('道順その4_本文',$parent_id);
							echo htmlspecialchars_decode($field_value, ENT_QUOTES);
						?></p>
					</li>
					<?php endif;?>

					<?php //道順5
						$image = get_field('road_image5', $parent_id);
						if(!empty($image)):
						?>
					<li>
						<p class="map-img-guide-number">05</p>
						<div class="map-img-guide-img">
							<img src="<?php echo esc_url($image['url']);?>" alt="<?php echo $image['alt'];?>">
						</div>
						<p><?php 
							$field_value = get_field('道順その5_本文');
							echo htmlspecialchars_decode($field_value, ENT_QUOTES);
						?></p>
					</li>
					<?php endif;?>

					<?php //道順6
						$image = get_field('road_image6', $parent_id);
						if(!empty($image)):
						?>
					<li>
						<p class="map-img-guide-number">06</p>
						<div class="map-img-guide-img">
							<img src="<?php echo esc_url($image['url']);?>" alt="<?php echo $image['alt'];?>">
						</div>
						<p><?php 
							$field_value = get_field('道順その6_本文',$parent_id);
							echo htmlspecialchars_decode($field_value, ENT_QUOTES);
						?></p>
					</li>
					<?php endif;?>

				</ul>
			</div>
		</div>
		<?php endif;?>

	</div>
	<p class="base-font-size mtb-12"><?php the_field('店舗紹介フリーテキスト', $parent_id);?></p>

	
</section>



</div>
















<style>
	.swiper {
	width: 100%;
	height: 100%;
	}
	.swiper-slide {
	text-align: center;
	font-size: 18px;
	background: #fff;
	width:80%;
	/* Center slide text vertically */
	display: -webkit-box;
	display: -ms-flexbox;
	display: -webkit-flex;
	display: flex;
	-webkit-box-pack: center;
	-ms-flex-pack: center;
	-webkit-justify-content: center;
	justify-content: center;
	-webkit-box-align: center;
	-ms-flex-align: center;
	-webkit-align-items: center;
	align-items: center;
	}
	.swiper-slide img {
	display: block;
	width: 100%;
	height: 100%;
	object-fit: cover;
	}
</style>

<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper(".mySwiper", {
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





<a href="https://jewel-cafe.jp/form_iphone-repair/" class="btn_arrow">来店予約はこちらから</a>





<section class="shop-three-features section-inner" id="js-shop-three-features">
        <div class="common-ttl">
          <div class="section-inner">
			<h2 class="shop-title">
				<span class="common-ttl-sub">iPhone修理の</span>
				<span class="common-ttl-main"><span class="color-red">料金表</span></span>
			</h2>
            <div class="common-ttl-en">Price List</div>
          </div>
        </div>

		<table class="iphone_repair_price_list">
			<thead>
				<tr>
					<th>機種＼内容</th>
					<th>液晶パネル交換<br class="sp">(液晶)</th>
					<th>液晶パネル交換<br class="sp">(有機EL)</th>
					<th>バッテリー交換</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>iPhone14Pro<br class="sp">Max</th>
					<td><span>-</span></td>
					<td><span>91,000</span>円</td>
					<td><span>18,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone14Pro</th>
					<td><span>-</span></td>
					<td><span>85,000</span>円</td>
					<td><span>18,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone14Plus</th>
					<td><span>33,000</span>円</td>
					<td><span>61,000</span>円</td>
					<td><span>18,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone14</th>
					<td><span>33,000</span>円</td>
					<td><span>60,000</span>円</td>
					<td><span>18,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone13Pro<br class="sp">Max</th>
					<td><span>75,000</span>円</td>
					<td><span>88,000</span>円</td>
					<td><span>18,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone13Pro</th>
					<td><span>65,000</span>円</td>
					<td><span>78,000</span>円</td>
					<td><span>18,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone13</th>
					<td><span>23,000</span>円</td>
					<td><span>50,000</span>円</td>
					<td><span>14,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone13mini</th>
					<td><span>23,000</span>円</td>
					<td><span>50,000</span>円</td>
					<td><span>13,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone12Pro<br class="sp">Max</th>
					<td><span>27,000</span>円</td>
					<td><span>35,000</span>円</td>
					<td><span>11,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone12Pro</th>
					<td><span>20,000</span>円</td>
					<td><span>31,000</span>円</td>
					<td><span>11,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone12</th>
					<td><span>20,000</span>円</td>
					<td><span>31,000</span>円</td>
					<td><span>10,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone12 Mini</th>
					<td><span>20,000</span>円</td>
					<td><span>33,000</span>円</td>
					<td><span>10,000</span>円</td>
				</tr>
				<tr>
					<th>iPhoneSE<br class="sp"><span class="small">（第2世代／2020）</span></th>
					<td><span>7,000</span>円</td>
					<td><span>-</span></td>
					<td><span>7,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone11Pro<br class="sp">Max</th>
					<td><span>13,000</span>円</td>
					<td><span>30,000</span>円</td>
					<td><span>10,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone11Pro</th>
					<td><span>12,000</span>円</td>
					<td><span>20,000</span>円</td>
					<td><span>10,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone11</th>
					<td><span>11,000</span>円</td>
					<td><span>-</span></td>
					<td><span>8,000</span>円</td>
				</tr>
				<tr>
					<th>iPhoneXS MAX</th>
					<td><span>13,000</span>円</td>
					<td><span>21,000</span>円</td>
					<td><span>10,000</span>円</td>
				</tr>
				<tr>
					<th>iPhoneXS</th>
					<td><span>10,000</span>円</td>
					<td><span>20,000</span>円</td>
					<td><span>8,000</span>円</td>
				</tr>
				<tr>
					<th>iPhoneXR</th>
					<td><span>10,000</span>円</td>
					<td><span>-</span></td>
					<td><span>7,800</span>円</td>
				</tr>
				<tr>
					<th>iPhoneX</th>
					<td><span>10,000</span>円</td>
					<td><span>18,000</span>円</td>
					<td><span>7,800</span>円</td>
				</tr>
				<tr>
					<th>iPhone8</th>
					<td><span>7,000</span>円</td>
					<td><span>-</span></td>
					<td><span>6,500</span>円</td>
				</tr>
				<tr>
					<th>iPhone8Plus</th>
					<td><span>8,200</span>円</td>
					<td><span>-</span></td>
					<td><span>7,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone7</th>
					<td><span>6,600</span>円</td>
					<td><span>-</span></td>
					<td><span>6,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone7Plus</th>
					<td><span>7,000</span>円</td>
					<td><span>-</span></td>
					<td><span>6,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone6s</th>
					<td><span>6,600</span>円</td>
					<td><span>-</span></td>
					<td><span>5,500</span>円</td>
				</tr>
				<tr>
					<th>iPhone6sPlus</th>
					<td><span>7,000</span>円</td>
					<td><span>-</span></td>
					<td><span>6,000</span>円</td>
				</tr>
				<tr>
					<th>iPhoneSE</th>
					<td><span>5,500</span>円</td>
					<td><span>-</span></td>
					<td><span>5,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone6</th>
					<td><span>5,500</span>円</td>
					<td><span>-</span></td>
					<td><span>5,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone6Plus</th>
					<td><span>6,700</span>円</td>
					<td><span>-</span></td>
					<td><span>5,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone5s</th>
					<td><span>5,500</span>円</td>
					<td><span>-</span></td>
					<td><span>5,000</span>円</td>
				</tr>
				<tr>
					<th>iPhone5c</th>
					<td><span>5,500</span>円</td>
					<td><span>-</span></td>
					<td><span>-</span></td>
				</tr>
				<tr>
					<th>iPhone5</th>
					<td><span>5,500</span>円</td>
					<td><span>-</span></td>
					<td><span>-</span></td>
				</tr>
				<tr>
					<th>iPhone4s</th>
					<td><span>5,500</span>円</td>
					<td><span>-</span></td>
					<td><span>-</span></td>
				</tr>
				<tr>
					<th>iPhone4</th>
					<td><span>5,500</span>円</td>
					<td><span>-</span></td>
					<td><span>-</span></td>
				</tr>
			</tbody>
		</table>
</section>






<a href="https://jewel-cafe.jp/form_iphone-repair/" class="btn_arrow">来店予約はこちらから</a>


<style>
.btn_arrow {
    display: table;
    position: relative;
    padding: 1em 2.5em;
	border-radius:4px;
    color: white;
    font-size: 23px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    box-sizing: border-box;
    transition: 0.5s;
	background-color:#C80000;
    margin: 55px auto;
}
.btn_arrow::after {
    position: absolute;
    top: 50%;
    right: 1em;
    width: 0.5em;
    height: 0.5em;
    transform: translateY(-50%) rotate(45deg);
    border-right: 2px solid currentColor;
    border-top: 2px solid currentColor;
    content: "";
}
.btn_arrow:hover {
    opacity:0.8;
}
@media screen and (min-width:501px){
	.btn_arrow{
		width:680px;
	}
}

</style>


<?php /* ?>
<?php
$json = getJsonFromApi(); // JSONデータを取得

$json = $json["result"]["opening_hours"]["weekday_text"];

foreach ($json as &$line) {
  echo '<p>'. $line . '</p>';
}


// JSONをPlace APIから取得する
function getJsonFromApi()
{
  $apiUrl = 'https://maps.googleapis.com/maps/api/place/details/json?place_id=ChIJSwzcR3uRVTUR8ZFgk9x1ziI&key=AIzaSyBDG1w7am_338bO-1sZuc0DRIbEPHmlJ5g&language=ja';
  $ch = curl_init($apiUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);
  $json = trim($response);
  return json_decode($json, true);
}
?>
<?php */ ?>





<section class="repair-resuluts" id="js-purchase-price">
	<div class="common-ttl">
		<div class="section-inner">
				<h2 class="shop-title">
					<span class="common-ttl-main">修理<span class="color-red">事例</span></span>
				</h2>
			
			<div class="common-ttl-en">Repair Results</div>
		</div>
	</div>
	<div class="section-inner">
		<ul class="blog-archive-list">
			
			<?php
			$count = 1; // 初期値を1に設定

			for ($i = 0; $i < 10; $i++) {
				$repairImage = get_field('iphone-repair-image' . $count);
				$repairText = get_field('iphone-repair-text' . $count);
				
				if (!empty($repairImage) && !empty($repairText)) :
			?>
					<li>
						<div class="left">
							<img src="<?php echo esc_url($repairImage['url']); ?>" alt="修理画像" />
						</div>
						<div class="right">
							<p class="blog-archive-point"><?php echo $repairText; ?></p>
						</div>
					</li>
			<?php
				endif;
				
				$count++; // 変数の値を1ずつ増加
			}
			?>

		</ul>
	</div>
</section>




<section class="section-inner shop-voice" id="js-shop-voice">
    <div class="common-ttl">
        <div class="section-inner">
			<h2 class="shop-title">
				<span class="common-ttl-sub">iPhone修理の</span>
				<span class="common-ttl-main">お客様の<span class="color-red">声</span></span>
			</h2>
            <div class="common-ttl-en">Customer's Voice</div>
        </div>
    </div>
	<div class="rating py-4">
		<div class="text-center">
		<div class="count-rating color-red">
			<div class="bold">
			<span>4.8</span>
			</div>
			<div class="devider"></div>
			<div class="star-rating">
			<div class="star-rating-front" style="width: 96%"></div>
			<div class="star-rating-back"></div>
			</div>
		</div>
		<div class="count-review mt-3 ta-c">
			（<span>47</span>件のレビュー）
		</div>
		</div>
	</div>
	<div class="shop-voice-list">
		<div class="shop-voice-list-item">
			<div class="d-f media jc-sb">
				<div class="voice-img">
					<img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon1.png" alt="買取してもらったお客様" data-src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon1.png" decoding="async" class=" ls-is-cached lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon1.png" alt="買取してもらったお客様" data-eio="l"></noscript>
				</div>
				<div class="voice-default">
					<div class="count-rating">
						<div class="rating-value mr-3">5.0</div>
						<div class="star-rating"><div class="star-rating-front" style="width: 100%"></div><div class="star-rating-back"></div></div>
					</div>
					<div class="shop-customer-review-header bold">
						<p class="voice-ttl">割れたiPhone、捨てないでよかった！<span>（30代・女性）</span></p>
					</div>
					<div class="ta-r mt-2">
						<a class="button-more">続きを読む</a>
					</div>
				</div>
			</div>
			<div class="mtb-12" style="display: none;">
				<p>ジュエルカフェさんはブランド品を買い取ってもらったことがあり、その時から良い印象がありましたが、この間お店の前を通りかかったらiPhoneの修理をはじめたとのこと。そういえば・・・以前にiPhoneの画面を割ってしまって新品に買い替えたのですが、割れた古いiPhoneも捨てずに取っておいたんですよね。これが修理できれば子供に譲ることもできるので早速お願いしてみました。本当にピカピカの新品画面になって、タッチ操作もスムーズ！買い換える前に知りたかった・・・。即日修理は本当で、30分もかからずに渡していただけました。電池交換というメニューがあるのも初めて知りました。交換で直るならいいですね。また伺います！</p>
			</div>
		</div>
		<div class="shop-voice-list-item">
			<div class="d-f media jc-sb">
				<div class="voice-img">
					<img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon2.png" alt="買取してもらったお客様" data-src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon2.png" decoding="async" class=" ls-is-cached lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon2.png" alt="買取してもらったお客様" data-eio="l"></noscript>
				</div>
				<div class="voice-default">
					<div class="count-rating">
						<div class="rating-value mr-3">5.0</div>
						<div class="star-rating">
							<div class="star-rating-front" style="width: 100%"></div><div class="star-rating-back"></div>
						</div>
					</div>
					<div class="shop-customer-review-header bold">
						<p class="voice-ttl">孫を遊ばせている間に修理完了してしまいました。<span>（60代・女性）</span></p>
					</div>
					<div class="ta-r mt-2">
						<a class="button-more">続きを読む</a>
					</div>
				</div>
			</div>
			<div class="mtb-12" style="display: none;">
				<p>iPhoneを片時も離せない愛用者ですが、先日画面をバキバキに割ってしまいました。修理に出したいですが、平日は仕事で忙しいし休みの日に行くとだいたいアップルストアは激混みなんですよね。でも割れたままというわけにもいかないので、ネットで即日修理ができるところをさがしていてジュエルカフェさんを見つけました。先に待っている人が2組くらいいたようですが、あっという間に修理完了してしまいました。修理保証がついているのも安心ですね。私と同様にiPhoneの修理業者をどこにすればいい？って困っている方がいたら、迷わずオススメしますよ！</p>
			</div>
		</div>
		<div class="shop-voice-list-item">
			<div class="d-f media jc-sb">
				<div class="voice-img">
					<img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon3.png" alt="買取してもらったお客様" data-src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon3.png" decoding="async" class=" ls-is-cached lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon3.png" alt="買取してもらったお客様" data-eio="l"></noscript>
				</div>
				<div class="voice-default">
					<div class="count-rating">
						<div class="rating-value mr-3">5.0</div>
						<div class="star-rating">
							<div class="star-rating-front" style="width: 100%"></div><div class="star-rating-back"></div>
						</div>
					</div>
					<div class="shop-customer-review-header bold">
						<p class="voice-ttl">本当に30分、というか実際20分くらい<span>（40代・女性）</span>
						</p>
					</div>
					<div class="ta-r mt-2">
						<a class="button-more">続きを読む</a>
					</div>
				</div>
			</div>
			<div class="mtb-12" style="display: none;">iphoneを落として割ってしまいましたが、こういう時はだいたいdocomoやau、ソフトバンクなどのショップに行くのではと思います。ただ、ショップで修理することができないので、今度は直営の修理店へ行くよう言われます。このたらいまわしで面倒で割れたまま我慢して使っていましたが、たまたま見つけたジュエルカフェで「30分でiPhone修理します」というノボリが立っていましたのですぐにお願いしてしまいました。結果・・・本当に30分、というか実際20分くらいで直ってしまったじゃないですか！すごすぎます。夫のiPhoneも割れているので連れてきますね！</div>
		</div>
		<div class="shop-voice-list-item">
			<div class="d-f media jc-sb">
				<div class="voice-img">
					<img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon2.png" alt="買取してもらったお客様" data-src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon3.png" decoding="async" class=" ls-is-cached lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon3.png" alt="買取してもらったお客様" data-eio="l"></noscript>
				</div>
				<div class="voice-default">
					<div class="count-rating">
						<div class="rating-value mr-3">5.0</div>
						<div class="star-rating">
							<div class="star-rating-front" style="width: 100%"></div><div class="star-rating-back"></div>
						</div>
					</div>
					<div class="shop-customer-review-header bold">
						<p class="voice-ttl">当日の混み具合も教えてくれます。<span>（70代・女性）</span>
						</p>
					</div>
					<div class="ta-r mt-2">
						<a class="button-more">続きを読む</a>
					</div>
				</div>
			</div>
			<div class="mtb-12" style="display: none;">アイフォンの画面を割ってしまって困っていました。ヒビが入るだけならよかったのですが、画面の一部が暗くなってタッチもできません。でも宅配修理の手続きも面倒だし、アップルストアの予約もわからないし・・・。そんな時新聞のチラシでこちらを見てすぐに電話でお問い合わせしました。感じの良いスタッフさんで、当日の混み具合も教えてくれます。画面が新品になって、まるで新しいiPhoneを手に入れたみたいです！大変満足しています。本当にありがとうございました！</div>
		</div>
		<div class="shop-voice-list-item">
			<div class="d-f media jc-sb">
				<div class="voice-img">
					<img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon3.png" alt="買取してもらったお客様" data-src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon3.png" decoding="async" class=" ls-is-cached lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon3.png" alt="買取してもらったお客様" data-eio="l"></noscript>
				</div>
				<div class="voice-default">
					<div class="count-rating">
						<div class="rating-value mr-3">5.0</div>
						<div class="star-rating">
							<div class="star-rating-front" style="width: 100%"></div><div class="star-rating-back"></div>
						</div>
					</div>
					<div class="shop-customer-review-header bold">
						<p class="voice-ttl">「最短30分」はありがたいですね。<span>（40代・女性）</span>
						</p>
					</div>
					<div class="ta-r mt-2">
						<a class="button-more">続きを読む</a>
					</div>
				</div>
			</div>
			<div class="mtb-12" style="display: none;">検索でジュエルカフェさんを見つけて修理をお願いしました。「最短30分」はありがたいですね。メーカー修理が一番安心なのでしょうが、郵送で預けている間スマホなしは考えられません。ここのところバッテリーが2時間程度しか持たなくなってしまい途方にくれていました。修理作業が迅速で、感動しました。また何かあったら迷わずリピートします。</div>
		</div>
		<div class="shop-voice-list-item">
			<div class="d-f media jc-sb">
				<div class="voice-img">
					<img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon1.png" alt="買取してもらったお客様" data-src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon3.png" decoding="async" class=" ls-is-cached lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/review_icon3.png" alt="買取してもらったお客様" data-eio="l"></noscript>
				</div>
				<div class="voice-default">
					<div class="count-rating">
						<div class="rating-value mr-3">5.0</div>
						<div class="star-rating">
							<div class="star-rating-front" style="width: 100%"></div><div class="star-rating-back"></div>
						</div>
					</div>
					<div class="shop-customer-review-header bold">
						<p class="voice-ttl">すぐに直して欲しいというならダントツでおすすめです！<span>（30代・女性）</span>
						</p>
					</div>
					<div class="ta-r mt-2">
						<a class="button-more">続きを読む</a>
					</div>
				</div>
			</div>
			<div class="mtb-12" style="display: none;">iPhoneの修理と言えば「高い・時間がかかる・本体交換？でデータが消えてしまう」などなにかと面倒なイメージでしたが、HPで見つけたこちらのお店はその場で修理してくれて、すぐにもって帰れるとのこと！早速お願いしましたが、本当に20分もしないうちに画面のガラスが新しいものになりました！すぐに直して欲しいというならダントツでおすすめです！</div>
		</div>
	</div>
</section>














<section class="shop-detail-faq section-inner" id="js-shop-detail-faq">
	<div class="common-ttl">
		<div class="section-inner">
			<h2 class="shop-title">
				<span class="common-ttl-sub">iPhone修理の</span>
				<span class="common-ttl-main">よくある<span class="color-red">ご質問</span></span>
			</h2>
			<div class="common-ttl-en">Faq</div>
		</div>
	</div>
	<div class="accordion" id="first-accordion">
		<div class="accordion-item">
			<h3 class="accordion-head accordion-header">
				<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span>持ち込み修理、即日対応、郵送修理は可能ですか？</a>
			</h3>
			<div class="accordion-content2">
				<p><span class="mr-8">A</span>予約なしで当日の修理を受け付けております。<br>修理作業中は一度iPhoneをお預けいただき、再び引き取りに来られる形で構いません。店舗でお待ちいただいてももちろん大丈夫です。仕事等の都合ですぐに引き取りに来られない場合はきちんとお預かりいたします。郵送修理については行っていません。店頭修理のみとなります。受付順での作業となりますのでお客様の混み具合によっては即日納品が難しい場合もございます。予めご了承ください。</p>
			</div>
		</div>
	</div>
	<div class="accordion" id="first-accordion">
		<div class="accordion-item">
			<h3 class="accordion-head accordion-header">
				<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span>使用するパーツは純正品ですか？</a>
			</h3>
			<div class="accordion-content2">
				<p><span class="mr-8">A</span>純正相当品を使用しております。<br>動作・品質ともに純正品と比べて遜色ない物を使用しております。フロントパネルなど見た目で確認できる部品であれば、修理組み立て前に確認していただくことも可能です。</p>
			</div>
		</div>
	</div>
	<div class="accordion" id="first-accordion">
		<div class="accordion-item">
			<h3 class="accordion-head accordion-header">
				<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span>保証はつきますか？</a>
			</h3>
			<div class="accordion-content2">
				<p><span class="mr-8">A</span>初期不良の場合、修理当日から１ヶ月以内の保証をお付けします。<br>フロントパネル交換なら、タッチ不良や液晶が急に映らなくなったなどパーツの不具合に関して保証いたします。不具合がありましたら、ご利用いただいた際に発行した領収書をお持ちになってご来店お願いします。診断・点検後、不良原因が部品の初期不良と診断できましたら、相当部品と交換させて頂きます。なお、故意・過失に関わらず自損の場合など自己に起因する動作不良・故障は保証対象外となります。水没、浸水・自己分解、他社修理経験あり・脱獄(JailBreak)に当てはまるiPhoneに関しては、修理作業を原因としない故障が発生する可能性があります。よってこの1ヶ月保証をお付け出来ず、この先の動作保証は出来かねます。予めご了承ください。</p>
			</div>
		</div>
	</div>
	<div class="accordion" id="first-accordion">
		<div class="accordion-item">
			<h3 class="accordion-head accordion-header">
				<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span>個人情報の流出が心配ですが大丈夫ですか？</a>
			</h3>
			<div class="accordion-content2">
				<p><span class="mr-8">A</span>作業前後の動作確認で、弊社スタッフが操作する部分は以下のとおりです。<br>
・カメラ(デフォルトのもの。前面・背面カメラが起動できているかの確認)<br>
・ボリュームボタン・マナーボタン・ホームボタン・電源ボタンの反応、押し具合の確認<br>
・ボイスメモ(イヤースピーカーとマイクの確認)<br>
・充電器の接続(充電が問題なく行えているかの確認)<br>
これ以外を起動する場合は、お客様に見える形で操作させて頂きます。動作確認等、弊社スタッフがお客様のiPhoneを起動させることに問題があれば、そのまま修理作業だけ行うことも可能です。その場合は修理依頼された箇所以外の故障に関して一切の責任を負いかねますので、予めご了承お願いいたします。</p>
			</div>
		</div>
	</div>
	<div class="accordion" id="first-accordion">
		<div class="accordion-item">
			<h3 class="accordion-head accordion-header">
				<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span>SIMフリー・脱獄済みのiPhoneの対応は可能ですか？</a>
			</h3>
			<div class="accordion-content2">
				<p><span class="mr-8">A</span>修理費用や作業時間に影響はありません。<br>すでに解約済みのものなども対応できます。ただ脱獄(JailBreak)されたものに関しては、修理作業後、作業を原因としない故障箇所が発生する可能性がありますので、保証をお付けできません。海外製SIMフリーのiPhoneは、日本国内のAppleStoreでは有償修理対象外となる場合があるため、保証をお付けできないことがございます。また、修理作業中バッテリーを抜いて電源を切るため、脱獄等の仕様上、再起動に伴い一時的にiPhoneが使用できなくなる場合がございます。バックアップ作成後の修理ご依頼をお勧めしております。</p>
			</div>
		</div>
	</div>
	<div class="accordion" id="first-accordion">
		<div class="accordion-item">
			<h3 class="accordion-head accordion-header">
				<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span>見積もり後にキャンセルはできますか？</a>
			</h3>
			<div class="accordion-content2">
				<p><span class="mr-8">A</span>お見積り後のキャンセルは可能ですが、修理後のキャンセルはできません。<br>※水没の場合は内部クリーニングがお見積もりに必要となりますので、キャンセル時でもクリーニング費用が発生します。予めご了承ください。</p>
			</div>
		</div>
	</div>
	<div class="accordion" id="first-accordion">
		<div class="accordion-item">
			<h3 class="accordion-head accordion-header">
				<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span>支払方法はクレジットカード払い可能ですか？</a>
			</h3>
			<div class="accordion-content2">
				<p><span class="mr-8">A</span>申し訳ございませんが、お支払いは現金のみとなっております。</p>
			</div>
		</div>
	</div>
	<div class="accordion" id="first-accordion">
		<div class="accordion-item">
			<h3 class="accordion-head accordion-header">
				<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span>作業時間の目安はどのくらいですか？</a>
			</h3>
			<div class="accordion-content2">
				<p><span class="mr-8">A</span>パネル交換で30～60分程度、バッテリー交換は10～15分程度いただいています。<br>水没など修理箇所によって作業時間が変わるものもあります。また当日の混み具合によっても作業時間が大幅に変わることもございます。予めご了承ください。</p>
			</div>
		</div>
	</div>
	<div class="accordion" id="first-accordion">
		<div class="accordion-item">
			<h3 class="accordion-head accordion-header">
				<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span>修理不可とは？</a>
			</h3>
			<div class="accordion-content2">
				<p><span class="mr-8">A</span>弊社をはじめとした非正規修理店では、原則パーツ交換しか行えません。<br>基板本体そのものに損傷があれば修理を行うことができなくなってしまいます。基板そのものの修理を行える場所はなく、Apple公式でもこういった故障の場合は本体交換をすることでしか修理が行えません。また、基板故障が起こっている段階で、もし修理できたとしても同じ障害が再度発生することがあります。よって弊社では部品交換修理に範囲をとどめております。</p>
			</div>
		</div>
	</div>
	<div class="accordion" id="first-accordion">
		<div class="accordion-item">
			<h3 class="accordion-head accordion-header">
				<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span>お見積もりをしていただきたいのですが・・</a>
			</h3>
			<div class="accordion-content2">
				<p><span class="mr-8">A</span>お電話にてお問い合わせ下さい。<br>iPhoneの機種、状況をお教えいただければ、当店スタッフがお見積もりとおおよその作業時間をお伝えします。店舗で直接お見積もりをさせていただくことも可能です。お気軽にお問い合わせください。</p>
			</div>
		</div>
	</div>
	<div class="accordion" id="first-accordion">
		<div class="accordion-item">
			<h3 class="accordion-head accordion-header">
				<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span>免責事項について知りたいのですが？</a>
			</h3>
			<div class="accordion-content2">
				<p><span class="mr-8">A</span>免責事項は下記の通り定めております。<br>修理後、AppleCareや各キャリアの保証及びアフターサービスが受けられなくなる場合があります。データの紛失・破損等につきましては一切保証いたしかねますので、お客様ご自身にて、事前にバックアップをお取りする事を推奨いたします。修理時の不具合により取り外した部品につきましては、原則、返却致しかねます。交換後の部品は、交換前に比べ見た目・液晶等の色合いが異なる場合があります。予めご了承下さい。修理後の不具合に関して、下記に該当する端末は保証の対象外とさせていただきます。<br>
・他社で修理した事がある端末<br>
・一度開封した事がある端末<br>
・強い衝撃によって破損した端末<br>
・水没反応がある端末<br>
液晶パネル上部にある近接センサーは、端末やパーツとの相性上、効かなくなる可能性があります。落下等の強い衝撃による破損の場合、修理時に予期せぬ故障が発生する場合があります。（その際に発生した不具合に関しては、当店で保証いたしかねますので予めご了承下さい）細心の注意を払って作業いたしますが、本体にごく僅かな傷が付いてしまう恐れがあります。（作業時における傷については保証いたしかねますので、予めご了承下さい）修理後に動作確認を行いますので、可能な限りパスコードロックの記載、または解除をお願いいたします。（ロック解除後は動作確認以外の目的で操作いたしません。解除不可の場合、一部動作確認を省略させていただきます）本体開封後、水没または基盤の破損等が確認された場合、修理ができない場合があります。耐水性を備えた機種の液晶パネルを交換する場合、耐水機能は損ないますので予めご了承ください。</p>
			</div>
		</div>
	</div>
</section>


<style>
.accordion-content2 {
	display: none;
	padding: 10px 21px;
}
.accordion-content2 p{
	display:flex;
}
.accordion-content2 p span{
	font-weight:bold;
}

</style>
<script>
	$(document).ready(function() {
		$('.accordion-header').click(function() {
		$(this).next('.accordion-content2').slideToggle();
		// 選択されたアコーディオン項目以外のコンテンツを非表示にする
		// $('.accordion-content2').not($(this).next()).slideUp();
		});
	});

</script>




<?php
// 슬래시(/)를 기준으로 문자열을 나누고, 배열의 마지막 요소를 얻습니다.
$parts = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
$post_name = end($parts);

// WP_Query 인스턴스 생성
$post_args2 = array(
    'post_type' => 'shop',
    'name' => $post_name,
    'posts_per_page' => 1, // 가져올 포스트 수
);
$post_query = new WP_Query($post_args2);

// 가져온 포스트 정보 사용
if ($post_query->have_posts()) {
    while ($post_query->have_posts()) {
        $post_query->the_post();
       $post = get_post(get_the_ID());
    }

    // 반드시 리셋 필요
    wp_reset_postdata();
}
?>


	  <section class="shop-three-features section-inner" id="js-shop-three-features">
        <div class="common-ttl">
          <div class="section-inner">
			<h2 class="shop-title">
				<span class="common-ttl-sub">iPhone修理の</span>
				<span class="common-ttl-main">３つの<span class="color-red">特徴</span></span>
			</h2>
            <div class="common-ttl-en">Three Features</div>
          </div>
        </div>
        <ul>
          <li class="shop-feature-item">
            <div class="feature-header pos-r">
              <h3 class="feature-title color-red">女性のお客様でもお気軽に修理相談</h3>
              <div class="feature-number-box color-red">
                <div class="ta-c">feature<span class="d-b sofia">01</div>
              </div>
            </div>
            <div class="feature-image">
              <img class="w-100per object-fit-contain" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_feature01.jpg" alt="女性のお客様でもお気軽に買取相談">
            </div>
            <div class="feature-desc mt-8">
              女性スタッフ中心のジュエルカフェなら初めてのお客様・女性のお客様でも安心です。ジュエルカフェのお客様の8割が女性の方です。
            </div>
          </li>
          <li class="shop-feature-item">
            <div class="feature-header pos-r">
              <h3 class="feature-title color-red">カフェのようなくつろぎ空間</h3>
              <div class="feature-number-box color-red">
                <div class="ta-c">feature<span class="d-b sofia">02</div>
              </div>
            </div>
            <div class="feature-image">
              <img class="w-100per object-fit-contain" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_feature02.png" alt="カフェのようなくつろぎ空間">
            </div>
            <div class="feature-desc mt-8">
              修理をお待ちの間、ゆっくりとおくつろぎいただける清潔なショップであるよう心がけています。無料ドリンクのサービスをご用意しています。
            </div>
          </li>
          <li class="shop-feature-item">
            <div class="feature-header pos-r">
              <h3 class="feature-title color-red">うれしい特典・キャンペーン</h3>
              <div class="feature-number-box color-red">
                <div class="ta-c">feature<span class="d-b sofia">03</div>
              </div>
            </div>
            <div class="feature-image">
              <img class="w-100per object-fit-contain" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_feature03.jpg" alt="うれしい特典・キャンペーン">
            </div>
            <div class="feature-desc mt-8">
              ご来店特典・リピーター様特典など、うれしい特典やプレゼントをご用意しています。
            </div>
          </li>
        </ul>
      </section>


		</div>

		<?php
			if($line_show){
				echo '<div><a class="line-btn" href="https://line.me/R/ti/p/'.$line_id.' " target="_blank">
						<img src="'.esc_url(get_template_directory_uri()).'/assets/images/shop/line_icon.png">
					  </a></div>';
			}
		?>

</div>
		<?php get_footer( );?>
