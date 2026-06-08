<?php
/*
Template Name: 店舗ロレックスページ
*/

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







	$parent_id = get_post($post->post_parent)->post_parent;
	


	$rolex_page = 'rolex-top';
	
	$rolex_page_id = 3288;
	
	$image_fv_pc = get_field('fv_image_pc',3288);
	
	$image_fv_sp = get_field('fv_image_sp',3288);
	
	
	
	

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




<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



<link rel="stylesheet" href="/wp-content/themes/jewelcafe_replace/assets/css/new-style.css"/>








	<div id="page-top"></div>

<?php /* ?>
	<div class="main-section">
		<div class="only-pc">
			<?php if(!empty($image_fv_pc)):?>
			<img src="<?php echo esc_url($image_fv_pc['url']);?>" alt="<?php echo $post->post_title;?>買取ならジュエルカフェ" >
			<?php endif;?>
		</div>
		<div class="only-sp">
			<?php if(!empty($image_fv_sp)):?>
			<img src="<?php echo esc_url($image_fv_sp['url']);?>" alt="<?php echo $post->post_title;?>買取ならジュエルカフェ" >
			<?php endif;?>
		</div>
	</div>
<?php */ ?>

	
		<?php

			$wp_obj = get_queried_object(  );
			$terms = get_the_terms( $post->ID, 'area' );


				echo
					'<div class="breadcrumbs" style="padding:20px 0px;">'.  //id名などは任意で
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
					
					
					$nav_name = str_replace('-ロレックス買取','',get_the_title());
					
					
					
					echo '<a href="#">'.$child_term_name.'-'.$nav_name.'<span></span></a>';
							
					echo '<a href="#">時計買取<span></span></a>';					
					echo '<a href="#">ロレックス買取</a>';

					echo '</div>'.
								'</div>';
			
		?>
		
		




		<div class="section-inner">
		
	
				<h1 class="section-ja-title shop-detail-h1">
					ロレックス買取ならジュエルカフェ<br>
					<?php echo str_replace('-ロレックス買取','',get_the_title());?>
				</h1>

<?php /* ?>
			<div class="section-inner mt-20 mb-20">
				<?php
					if ( wp_is_mobile() ) :
				?>
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_tokuten_bnr_sp.jpg" alt="ジュエルカフェならお店で今すぐかんたんスピード買取！ 査定・ご相談0円" width="100%">
				<?php
					else :
				?>
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_tokuten_bnr.jpg" alt="ジュエルカフェならお店で今すぐかんたんスピード買取！ 査定・ご相談0円" width="100%">
				<?php
					endif;
				?>
			</div>


			<p class="mt-20"><span class="color-red bold d-b">査定受付時にスマホ画面をスタッフにお見せください。</span>※写真はイメージです。商品はご来店日・店舗によって異なり、品切れの場合もございます。予めご了承ください。</p>
<?php */ ?>




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

	<?php /* ?>新Googleマップ<?php */ ?>
	<div class="map">
        <div id="google_map" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></div>
    </div>

	
			<div class="store-map-btn-list">
				<a href="http://maps.google.com/maps?saddr=&daddr=ジュエルカフェ<?php the_title();?>&dirflg=" target="_blank" rel="noopener noreferrer" >GoogleMapでお店までの経路をみる</a>
			</div>


	</div>
	
	<h3 class="section-ja-title">ジュエルカフェ <?php echo str_replace('-ロレックス買取','',get_the_title());?></h3>


	<?php if(get_option('show_holidays',$parent_id) == '1'):?>
		<p class="shop-att"><?php the_field('the_year_end_and_new_year_holidays');?></p>
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
						<th>買取品目</th>
						<td>
							<?php 
								$hinmoku = get_field('買取全品目',$parent_id);
							
								
								if(count($hinmoku) > 0){
							
								foreach($hinmoku as $k=>$v){
									
									$v['value'] = str_replace('card1','card',$v['value']);
									
									$v['value'] = str_replace('card2','letter-top',$v['value']);
									
									echo '<a href="/kaitori/'.$v['value'].'/">'.$v['label'].'</a>';
									
									if( count($hinmoku)-1 > $k ){
										
										echo '・';
										
									}
									
								}
								
								}
					
							?>
						</td>
					</tr>
					<tr>
						<th>買取方法</th>
						<td>
							<?php 			
							
								$method = get_field('買取方法',$parent_id);

								if(count($method) > 0){

								foreach($method as $k=>$v){
									
									echo '<a href="/'.$v['value'].'/">'.$v['label'].'</a>';
									
									if( count($method)-1 > $k ){
										
										echo '・';
										
									}
									
								}
								
								}

							?>
						</td>
					</tr>
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






		<section class="kaitori">
		<div class="section-inner kaitori-search-model" id="kaitori-search-model">
		
			<?php get_template_part( 'template-parts/search-new-watch' );?>
		</div>	
		</section>
		
		



		
		<section class="kaitori-market-price mb-20">
		
		<div class="section-inner">

			<div class="point-title">
			
				<div class="point-title-inner d-f ai-c">
					<div class="point-kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/kaitori-kuma.png" alt="" ></div>
					<div class="only-sp">
						<h2>
							ジュエルカフェの<br>ロレックス買取ポイント
						</h2>
					</div>
				</div>
				
				<div class="point-bg">
					<p class="only-pc">ジュエルカフェのロレックス買取ポイント</p>
					<h2>
						ロレックスは今が売りどき！<br>
						ロレックス買取相場が高騰しています！
					</h2>
				</div>
				
			</div>

		</div>
			<div class="section-inner">

				<div class="maket-more animated">

					<ul class="kaitori-price-table">
						
						<?php
						
							for($i=1; $i <= 6; $i++){
							
							$image = get_field('相場比較画像'.$i,$rolex_page_id);
						?>
						
						<li class="kaitori-price-list d-f ai-c">
						
					
							<div class="kaitori-price-img d-f ai-c">
							
								<div class="item">
									<?php
										if( trim($image['url']) !== '' ){
											
											
											$alt_text =trim(get_field('相場比較ブランド名'.$i , $rolex_page_id). get_field('相場比較種類'.$i , $rolex_page_id).str_replace('ランダム番','',get_field('相場比較品番'.$i , $rolex_page_id)));
											
											
											
											echo '<img src=" '.$image['url'].'" alt="'.$alt_text.'" class="maket-price-img" />';
						
										}
									?>
								</div>
								
								<h3>
								
										<div class="brand_name">
										<?php 
										
											$shopname = get_field('相場比較ブランド名'.$i);
											
											if( trim($shopname) !== '' ){ echo $shopname; }
					
										?>
										</div>

										<div class="brand_name">
										<?php 
										
											$shopname = get_field('相場比較種類'.$i , $rolex_page_id);
											
											if( trim($shopname) !== '' ){ echo $shopname; }
											
										?>
										</div>
								


									<div class="code">
										<?php
											$modelname = get_field('相場比較品番'.$i , $rolex_page_id);
											
											if( trim($modelname) !== '' ){ echo $modelname; }								

										?>
									</div>
								</h3>
						
							</div>		
							


							<div class="kaitori-price-content d-f ai-c">
								<div class="old-price d-f ai-c">
									<span class="old-year color-white">2015 価格</span>
								<?php
									$old_price = get_field('以前の価格'.$i , $rolex_page_id);
									
									if( trim($old_price) !== '' ){ echo '&yen;'.$old_price; }
								
								?>
									<span class="arrow_r_icon">
										<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/arrow_r.png" alt="" />
									</span>				
								</div>

								<div class="new-price d-f ai-c">
								
									<span class="new-year color-white"><?php echo date('Y');?> 価格</span>
									
									<?php
										$new_price = get_field('現在の価格'.$i,$rolex_page_id);
										
										if( trim($new_price) !== '' ){ echo '&yen;'.$new_price; }							
									
									?>
								</div>
							</div>
								
						
							
						</li>
							
							
						<?php
						
							}
						?>
					</ul>
					
					<p class="note only-sp">
						<?php
							if( trim(get_field('備考') , $rolex_page_id) !== '' ){ echo get_field('備考' , $rolex_page_id);}
						?>
					</p>	
					
					<div class="ta-c">
					
						<div class="more-btn only-sp"><p class="open">もっと見る</p></div>

					</div>

				</div>

			</div>
		</section>









<section class="common-kaitori-resuluts" id="js-achievement">
  <div class="common-ttl">
    <div class="section-inner">


	<h2 class="shop-title shop-title">
			<span class="common-ttl-sub">
				ジュエルカフェ
				<?php echo str_replace('-ロレックス買取','',get_the_title());?>
			</span>

			<span class="common-ttl-main"><span class="color-red">他店と差がつく</span>高価買取実績</span>
	</h2>

    </div>
  </div>


  <div class="section-inner">


	<div class="only-pc">
		  <ul class="item-list d-f jc-sb">			  <li class="mb-20">
				<div class="item-img">
				  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" alt="BIGHOPガーデンモール印西店の時計買取実績" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC07981.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC07981.jpg" alt="BIGHOPガーデンモール印西店の時計買取実績" data-eio="l"></noscript>
				</div>
				<div class="p-10">
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl mb-10">ロレックス サブマリーナ 126613<br>お買取いたしました！</p>
				  <div class="priceBox d-f jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">2,000,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
		  			  <li class="mb-20">
				<div class="item-img">
				  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" alt="BIGHOPガーデンモール印西店の時計買取実績" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC08009.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC08009.jpg" alt="BIGHOPガーデンモール印西店の時計買取実績" data-eio="l"></noscript>
				</div>
				<div class="p-10">
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl mb-10">ロレックス サブマリーナ 116613LN<br>お買取いたしました！</p>
				  <div class="priceBox d-f jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">1,400,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
		  			  <li class="mb-20">
				<div class="item-img">
				  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" alt="BIGHOPガーデンモール印西店の時計買取実績" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC07993.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC07993.jpg" alt="BIGHOPガーデンモール印西店の時計買取実績" data-eio="l"></noscript>
				</div>
				<div class="p-10">
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl mb-10">ロレックス デイトジャスト 179173G<br>お買取いたしました！</p>
				  <div class="priceBox d-f jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">500,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
		  			  <li class="mb-20">
				<div class="item-img">
				  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" alt="BIGHOPガーデンモール印西店の時計買取実績" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC07971.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC07971.jpg" alt="BIGHOPガーデンモール印西店の時計買取実績" data-eio="l"></noscript>
				</div>
				<div class="p-10">
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl mb-10">ロレックス オイスターパーペチュアル 15200<br>お買取いたしました！</p>
				  <div class="priceBox d-f jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">400,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
		  			  <li class="mb-20">
				<div class="item-img">
				  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" alt="BIGHOPガーデンモール印西店の時計買取実績" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex05.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex05.jpg" alt="BIGHOPガーデンモール印西店の時計買取実績" data-eio="l"></noscript>
				</div>
				<div class="p-10">
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl mb-10">ロレックス GMTマスターⅡ 116710LN<br>お買取いたしました！</p>
				  <div class="priceBox d-f jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">1,200,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
		  			  <li class="mb-20">
				<div class="item-img">
				  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" alt="BIGHOPガーデンモール印西店の時計買取実績" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex06.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex06.jpg" alt="BIGHOPガーデンモール印西店の時計買取実績" data-eio="l"></noscript>
				</div>
				<div class="p-10">
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl mb-10">ロレックス デイトナ 116520<br>お買取いたしました！</p>
				  <div class="priceBox d-f jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">2,400,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
		  			  <li class="mb-20">
				<div class="item-img">
				  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" alt="BIGHOPガーデンモール印西店の時計買取実績" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex07.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex07.jpg" alt="BIGHOPガーデンモール印西店の時計買取実績" data-eio="l"></noscript>
				</div>
				<div class="p-10">
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl mb-10">ロレックス パールマスター 18946A PT<br>お買取いたしました！</p>
				  <div class="priceBox d-f jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">4,500,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
		  			  <li class="mb-20">
				<div class="item-img">
				  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" alt="BIGHOPガーデンモール印西店の時計買取実績" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex09.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex09.jpg" alt="BIGHOPガーデンモール印西店の時計買取実績" data-eio="l"></noscript>
				</div>
				<div class="p-10">
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl mb-10">ロレックス ヨットマスターⅡ 116680<br>お買取いたしました！</p>
				  <div class="priceBox d-f jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">1,800,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
		  			  <li class="mb-20">
				<div class="item-img">
				  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" alt="BIGHOPガーデンモール印西店の時計買取実績" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex10.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex10.jpg" alt="BIGHOPガーデンモール印西店の時計買取実績" data-eio="l"></noscript>
				</div>
				<div class="p-10">
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl mb-10">ロレックス エアキング 14000M<br>お買取いたしました！</p>
				  <div class="priceBox d-f jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">300,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
		  			  <li class="mb-20">
				<div class="item-img">
				  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" alt="BIGHOPガーデンモール印西店の時計買取実績" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex11.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex11.jpg" alt="BIGHOPガーデンモール印西店の時計買取実績" data-eio="l"></noscript>
				</div>
				<div class="p-10">
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl mb-10">ロレックス デイデイト 18238A<br>お買取いたしました！</p>
				  <div class="priceBox d-f jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">1,400,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
		  		</ul>


	</div>






	<div class="only-sp">


		<div class="swiper mySwiper">



		<ul class="new-item-list swiper-wrapper">

					  <li class="mb-20 swiper-slide">

				<div style="text-align:left;">

					<div class="item-img mb-10">
						 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC07981.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC07981.jpg" data-eio="l"></noscript>
					</div>
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl">ロレックス サブマリーナ 126613<br>お買取いたしました！</p>
				  <div class="p-10 priceBox jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">2,000,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
						  <li class="mb-20 swiper-slide">

				<div style="text-align:left;">

					<div class="item-img mb-10">
						 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC08009.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC08009.jpg" data-eio="l"></noscript>
					</div>
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl">ロレックス サブマリーナ 116613LN<br>お買取いたしました！</p>
				  <div class="p-10 priceBox jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">1,400,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
						  <li class="mb-20 swiper-slide">

				<div style="text-align:left;">

					<div class="item-img mb-10">
						 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC07993.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC07993.jpg" data-eio="l"></noscript>
					</div>
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl">ロレックス デイトジャスト 179173G<br>お買取いたしました！</p>
				  <div class="p-10 priceBox jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">500,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
						  <li class="mb-20 swiper-slide">

				<div style="text-align:left;">

					<div class="item-img mb-10">
						 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC07971.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC07971.jpg" data-eio="l"></noscript>
					</div>
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl">ロレックス オイスターパーペチュアル 15200<br>お買取いたしました！</p>
				  <div class="p-10 priceBox jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">400,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
						  <li class="mb-20 swiper-slide">

				<div style="text-align:left;">

					<div class="item-img mb-10">
						 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex05.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex05.jpg" data-eio="l"></noscript>
					</div>
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl">ロレックス GMTマスターⅡ 116710LN<br>お買取いたしました！</p>
				  <div class="p-10 priceBox jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">1,200,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
						  <li class="mb-20 swiper-slide">

				<div style="text-align:left;">

					<div class="item-img mb-10">
						 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex06.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex06.jpg" data-eio="l"></noscript>
					</div>
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl">ロレックス デイトナ 116520<br>お買取いたしました！</p>
				  <div class="p-10 priceBox jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">2,400,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
						  <li class="mb-20 swiper-slide">

				<div style="text-align:left;">

					<div class="item-img mb-10">
						 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex07.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex07.jpg" data-eio="l"></noscript>
					</div>
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl">ロレックス パールマスター 18946A PT<br>お買取いたしました！</p>
				  <div class="p-10 priceBox jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">4,500,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
						  <li class="mb-20 swiper-slide">

				<div style="text-align:left;">

					<div class="item-img mb-10">
						 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex09.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex09.jpg" data-eio="l"></noscript>
					</div>
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl">ロレックス ヨットマスターⅡ 116680<br>お買取いたしました！</p>
				  <div class="p-10 priceBox jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">1,800,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
						  <li class="mb-20 swiper-slide">

				<div style="text-align:left;">

					<div class="item-img mb-10">
						 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex10.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex10.jpg" data-eio="l"></noscript>
					</div>
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl">ロレックス エアキング 14000M<br>お買取いたしました！</p>
				  <div class="p-10 priceBox jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">300,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
						  <li class="mb-20 swiper-slide">

				<div style="text-align:left;">

					<div class="item-img mb-10">
						 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAJYAQAAAACWHaVxAAAAAnRSTlMAAHaTzTgAAABDSURBVHja7cEBDQAAAMKg909tDjegAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC+DbIgAAFbm/qRAAAAAElFTkSuQmCC" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex11.jpg" decoding="async" class="lazyload"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex11.jpg" data-eio="l"></noscript>
					</div>
				  <p class="kaitoriName mb-4">時計買取 > ロレックス買取</p>
				  <p class="ttl">ロレックス デイデイト 18238A<br>お買取いたしました！</p>
				  <div class="p-10 priceBox jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red">1,400,000<span class="small">円</span></div>
				  </div>
				</div>
			  </li>
			

		</ul>


		</div>





	</div>




  </div>


</section>








<!-- Demo styles -->
<style>


  .common-kaitori-resuluts .item-list{

		flex-wrap:nowrap;
		justify-content:center;


  }





  .new-item-list li .kaitoriName{

	  color:#ccc;
	  font-size:10px;
	  text-align:left;
	  height:25px;
	  margin-bottom:10px;
	  padding-left:10px;


  }





  .common-kaitori-resuluts .new-item-list li .priceBox .left{

	  font-size:12px;
	  margin-bottom:0px;
	  width:100%;
	  text-align:left;

  }


  .common-kaitori-resuluts .new-item-list li .priceBox .right{

	  font-size:20px;
	  width:100%;
	  text-align:right;
	  letter-spacing:-0.3px;

  }

  .common-kaitori-resuluts .new-item-list li .ttl{

		font-size:10px;
		min-height:58px;
		padding-left:10px;

  }



  .common-kaitori-resuluts .new-item-list li .priceBox .right .small{

	  font-size:10px;

  }






  @media (min-width: 800px) {

	  .common-kaitori-resuluts .item-list{

			flex-wrap:wrap;
			justify-content:center;


	  }


		.common-kaitori-resuluts .item-list li{

			width:19%;
			margin-right:10px;

		}


		.common-kaitori-resuluts .item-list li:nth-child(5n) {

			margin-right:0px;

		}





		.common-kaitori-resuluts .item-list li .priceBox .right{

			width:100%;


		}


		.common-kaitori-resuluts .item-list li .priceBox .left{

			width:100%;
			margin-bottom:10px;

		}


  }



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



	





			

		<div class="kaitori">

			<?php


			// 現在表示されている投稿と同じタームに分類された投稿を取得
				$taxonomy_slug = 'hinmoku'; // タクソノミーのスラッグを指定
				
				$post_type_slug = 'blog'; // 投稿タイプのスラッグを指定
				
				
				$post_name= 'rolex-top';
			
			
				$post_terms = wp_get_object_terms($post_id, $taxonomy_slug); // タクソノミーの指定
				
				
				
		
				if( $post_terms && !is_wp_error($post_terms)) { // 値があるときに作動
					$current_terms_slug = array(); // 配列のセット
					foreach( $post_terms as $value ){ // 配列の作成
						if($value->parent) {
							$current_terms_slug[] = $value->slug; // タームのスラッグを配列に追加
						} else {
							$parent_terms_slug = $value->slug;
							//$currnet_terms_slug[] = $value->slug;
						}
					}
					
	
				}
				
				

				if($kaitori_area_parent_id):
					$blog_slug = get_post($kaitori_area_parent_id)->post_name;
				endif;
				
				
		
				
				

				//追加
				if( isset($currnet_terms_slug) == false){

					$current_terms_slug[] = $post_terms[0]->slug; // タームのスラッグを配列に追加

				}

				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
			
			
				$blog_terms = '';
				
				
				if($terms[0]->slug > 0 ){
					
					
					$blog_terms = $terms[1]->slug;
					
				}else{
					
					$blog_terms = $terms[0]->slug;
					
				}
			
				

			
			
			
					$args = array( //品目と県を絞って取得
						'post_type' => $post_type_slug, // 投稿タイプを指定
						'posts_per_page' => 10, // 表示件数を指定
						'orderby' =>  'DESC', // ランダムに投稿を取得
						'paged' => $paged,
						'tax_query' => array( // タクソノミーパラメーターを使用
							'relation' => 'AND',
							array( //品目の絞り込み
								'taxonomy' => 'hinmoku', // タームを取得タクソノミーを指定
								'field' => 'slug', // スラッグに一致するタームを返す
								'terms' => 'rolex-top' // タームの配列を指定
							),
							array( //県の絞り込み
								'taxonomy' => 'area', // タームを取得タクソノミーを指定
								'field' => 'slug', // スラッグに一致するタームを返す
								'terms' => $blog_terms // タームの配列を指定
							)
						)
					);

				
				
				


				$the_query2 = new WP_Query($args);

				if($the_query2->have_posts()){
					
					
			?>
			<section class="kaitori-resuluts">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">リアルタイム!</span>

								<span class="common-ttl-main">ロレックス<span class="color-red">買取事例</span></span>
		
						</h2>
						<div class="common-ttl-en">Purchase Results</div>
					</div>
				</div>



				<div class="section-inner">

					<?php if($kaitori_area_parent_id):?>

					<p class="lh-20"><?php the_title( ); ?>のジュエルカフェにて毎日数千件お買取させていただく切手買取実績をご紹介します。<br>切手のお買取でしたら、新品はもちろんのこと、古いもの・汚れのあるもの、どんなものでも丁寧に査定させていただきます。売れるかどうか不安でしたらまずはお気軽にお問い合わせください。</p>
					<?php else:?>

					<p class="lh-20">全国のジュエルカフェにて毎日数千件お買取させていただくロレックス買取商品をご紹介します。<br>
					
					ロレックス買のお買取でしたら、新品はもちろんのこと、古いもの・汚れのあるもの、どんなものでも丁寧に査定させていただきます。売れるかどうか不安でしたらまずはお気軽にお問い合わせください。</p>

					<?php endif;?>


					<ul class="blog-archive-list">
					
					
					
					<?php while ($the_query2->have_posts()): $the_query2->the_post(); ?>
					
					
					
					
					
					<?php
					
						$hinmoku_terms = get_the_terms($post->ID, 'hinmoku');
						foreach($hinmoku_terms as $term) {
							if($term->parent === 0) {
								$hinmoku_parent_name = $term->name;
								$hinmoku_parent_id = $term->term_id;
								$hinmoku_parent_slug = $term->slug;
							}
						}
						foreach($hinmoku_terms as $term) {
							if($term->parent === $hinmoku_parent_id) {
								$hinmoku_child_name = $term->name;
								$hinmoku_child_id = $term->term_id;
								$hinmoku_child_slug = $term->slug;
							}
						}
						foreach($hinmoku_terms as $term) {
							if($term->parent === $hinmoku_child_id) {
								$hinmoku_grandchild_name = $term->name;
								$hinmoku_grandchild_slug = $term->slug;
							}
						}

						$area_terms = get_the_terms( $post->ID, 'area' );
						
						if(is_array($area_terms)){
						
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
						
						}
						
						
						$image_alt_title = $post->post_title;
						
						
						$alt_img_arr = explode('を',$post->post_title);
						
						if($alt_img_arr[1] == ''){
							
							$alt_img = explode('お',$post->post_title);

							if($alt_img[1] !== ''){
							
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
							<h3 class="blog-archive-ttl">
								<a href="<?php the_permalink() ?>"><?php echo mb_convert_kana(get_the_title(), "rnas"); ?></a>
							</h3>
							<div class="blog-archive-date">公開日：<time itemprop="datePublished" datetime="<?php the_time('c');?>"><?php the_time('Y/m/d');?></time></div>
							<p class="blog-archive-point">
								<?php 
									if(get_field('買取査定ポイント')):
								
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
									<a href="<?php echo $current_shop_url;?>"><span class="sp-line">ジュエルカフェ&nbsp;</span><?php echo esc_html($grand_child_area_name);?></a>
								</li>
							</ul>
						</div>
					</li>						
						
					<?php endwhile; ?>
					</ul>
					
					
					
					
					
					

					<?php
						if( $news->post_count ){
					?>

					<div class="blog-archive-linkWrapper">
						<a href="/blog/" class="blog-archive-link">もっと見る</a>
					</div>
					<?php
						}
					?>
					
				</div>

			</section>



		<?php
		

			}


		?>
		
		</div>
		




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




	<!--相場表!-->
	
	<section class="kaitori-accordion mb-20">
		<?php 
			get_template_part( 'template-parts/tokei-shop-price-accordion'  );
		?>
	</section>
	
	


	
		
      <section class="intro intro-broken section-inner">
		
				<div class="mincho pos-r mt-20">
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
            <p class="detail-confirm-txt-att">※18~19歳のお客様の場合、同意書又は委任状が必要になります。又、18歳未満のお客様はご利用いただけません。※保険証をご提示いただく場合は、別途発行日から3ヶ月以内の公共料金領収書又は住民票が必要になります。</p>
          </div>
        </div>
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
		
		
		
		
		
      

	  <section class="shop-three-features section-inner" id="js-shop-three-features">
        <div class="common-ttl">
          <div class="section-inner">
						<h2 class="shop-title">
							<span class="common-ttl-sub">ロレックス買取の</span>
							<span class="common-ttl-main">３つの<span class="color-red">特徴</span></span>
						</h2>
            <div class="common-ttl-en">Three Features</div>
          </div>
        </div>
        <ul>
          <li class="shop-feature-item">
            <div class="feature-header pos-r">
              <h3 class="feature-title color-red">女性のお客様でもお気軽に買取相談</h3>
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
              査定をお待ちの間、ゆっくりとおくつろぎいただける清潔なショップであるよう心がけています。無料ドリンクや携帯充電器などのサービスをご用意しています。
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










		<section class="shop-news section-inner" id="js-shop-news">
			<?php if( get_field('お知らせ' , $parent_id) ):?>
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="shop-title">
								<span class="common-ttl-sub">ジュエルカフェ - <?php echo str_replace('-ロレックス買取','',get_the_title());?>の</span>
							<span class="common-ttl-main"><span class="color-red">お知らせ</span></span>
						</h2>
						<div class="common-ttl-en">News</div>
					</div>
				</div>
				<p><?php the_field('お知らせ',$parent_id);?></p>
			<?php endif;?>
			<?php if( get_field('査定スタッフから一言',$parent_id) ):?>
				<div class="shop-news-comment">
					<div class="shop-news-comment-inner">
						<h3 class="shop-news-ttl">査定スタッフから一言</h3>
						<p class="shop-news-txt"><?php the_field('査定スタッフから一言',$parent_id);?></p>
					</div>
				</div>
			<?php endif;?>
		</section>
		
		
		








      <section class="section-inner shop-detail-faq" id="js-shop-detail-faq">
        <div class="common-ttl">
          <div class="section-inner">
						<h2 class="shop-title">
							<span class="common-ttl-sub">ジュエルカフェ - <?php echo str_replace('-ロレックス買取','',get_the_title());?>の</span>
							<span class="common-ttl-main">よくある<span class="color-red">ご質問</span></span>
						</h2>
            <div class="common-ttl-en">Faq</div>
          </div>
        </div>
        <div class="accordion" id="first-accordion">
					<?php if(get_field('よくあるご質問その1質問',$parent_id)):?>
						<div class="accordion-item">
							<h3 class="accordion-head">
								<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その1質問',$parent_id);?></a>
							</h3>
							<div class="accordion-content">
								<p><span class="mr-8">A</span><?php the_field('よくあるご質問その1回答',$parent_id);?></p>
							</div>
						</div>
					<?php endif;?>

					<?php if(get_field('よくあるご質問その2質問',$parent_id)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その2質問',$parent_id);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その2回答',$parent_id);?></p>
            </div>
          </div>
					<?php endif;?>

					<?php if(get_field('よくあるご質問その3質問',$parent_id)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その3質問',$parent_id);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その3回答',$parent_id);?></p>
            </div>
          </div>
					<?php endif;?>

					<?php if(get_field('よくあるご質問その4質問',$parent_id)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その4質問',$parent_id);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その4回答',$parent_id);?></p>
            </div>
          </div>
					<?php endif;?>

					<?php if(get_field('よくあるご質問その5質問',$parent_id)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その5質問',$parent_id);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その5回答',$parent_id);?></p>
            </div>
          </div>
					<?php endif;?>

					<?php if(get_field('よくあるご質問その6質問',$parent_id)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その6質問',$parent_id);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その6回答',$parent_id);?></p>
            </div>
          </div>
					<?php endif;?>



					<?php if(get_field('よくあるご質問その7質問',$parent_id)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その7質問',$parent_id);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その7回答',$parent_id);?></p>
            </div>
          </div>
					<?php endif;?>

					<?php if(get_field('よくあるご質問その8質問',$parent_id)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('よくあるご質問その8質問',$parent_id);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('よくあるご質問その8回答',$parent_id);?></p>
            </div>
          </div>
					<?php endif;?>

					<?php
						$page_ID = get_page_by_path( 'qa' );
						$page_ID = $parent_id;
					?>
					<?php if(get_field('共通質問1', $page_ID)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('共通質問1', $page_ID);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('共通回答1', $page_ID);?></p>
            </div>
          </div>
					<?php endif;?>

					<?php if(get_field('共通質問2', $page_ID)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('共通質問2', $page_ID);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('共通回答2', $page_ID);?></p>
            </div>
          </div>
					<?php endif;?>

					<?php if(get_field('共通質問3', $page_ID)):?>
          <div class="accordion-item">
            <h3 class="accordion-head">
              <a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php the_field('共通質問3', $page_ID);?></a>
            </h3>
            <div class="accordion-content">
              <p><span class="mr-8">A</span><?php the_field('共通回答3', $page_ID);?></p>
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
					<?php endif;?>

      </section>












	<?php 

			$page_url = $post->post_name;
			
	
			// 現在表示されている投稿と同じタームに分類された投稿を取得
			$taxonomy_slug = 'area'; // タクソノミーのスラッグを指定
			$post_type_slug = 'shop'; // 投稿タイプのスラッグを指定
			$post_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // タクソノミーの指定
			// $current_slug = basename(get_permalink( ));
			if( $post_terms && !is_wp_error($post_terms)) { // 値があるときに作動
				$terms_slug = array(); // 配列のセット
				foreach( $post_terms as $value ){ // 配列の作成
					if ($value->parent) { //子ターム(県)を取得
						$terms_slug[] = $value->slug; // タームのスラッグを配列に追加
					}
				}
			}
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;


			$args = array(
				'post_type' => $post_type_slug, // 投稿タイプを指定
				'posts_per_page' => 100, // 表示件数を指定
				'orderby' =>  'DESC', // ランダムに投稿を取得
				'paged' => $paged,
				'post__not_in' => array(get_the_ID()),
				'post_parent' => 0,
				'tax_query' => array( // タクソノミーパラメーターを使用
					array(
						'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
						'field' => 'slug', // スラッグに一致するタームを返す
						'terms' => $terms_slug // タームの配列を指定
					)
				)
			);
			$the_query = new WP_Query($args);


			if($the_query->post_count > 0 && $the_query->have_posts()):
		?>

      <section class="shop-area-city section-inner" id="js-shop-area-city">
        <div class="common-ttl">
          <div class="section-inner">
						<h2 class="shop-title">
							<span class="common-ttl-sub">ジュエルカフェ - <?php echo str_replace('-ロレックス買取','',get_the_title());?>の</span>
							<span class="common-ttl-main">近隣店舗<span class="color-red">ご案内</span></span>
						</h2>
            <div class="common-ttl-en">Neighboring Stores</div>
          </div>
        </div>
        <ul class="shop-area-city-list">

					<?php while ($the_query->have_posts()): $the_query->the_post(); ?>

					<?php
					
		
						
					$exclude_store =  get_field('exclude-store',get_the_ID());
					
					if($exclude_store[0]== '1'){
						
						continue;

					}
						
									
									
						if(strpos($page_url , $post->post_name) !== false ){continue;}
										
		
					?>
					
					<li class="shop-area-city-item">
            <div class="shop-name bold"><?php
							echo $child_term_name;?> - <?php the_title();?></div>
							<?php if(get_field('店舗電話番号')):?>
								<a href="tel:<?php
									$tel = get_field('店舗電話番号');
									$tel = str_replace(array('-', 'ー', '−', '―', '‐','(',')','（','）',' ','　'), '', $tel);
									echo $tel;
								?>" class="shop-tel bold color-red"><?php the_field('店舗電話番号'); ?></a>
							<?php else:?>
								<div class="shop-tel bold color-red"><?php the_field('オープン時期');?></div>
							<?php endif;?>
            <div class="shop-info">
              <div class="shop-address d-f"><?php the_field('所在地');?></div>
              <div class="shop-opening d-f"><?php the_field('営業時間');?></div>
            </div>
						<?php if(get_field('一覧ページに載せるお知らせ')):?>
							<div class="shop-att small-font-size"><?php the_field('一覧ページに載せるお知らせ');?></div>
						<?php endif;?>
            <div class="ta-r"><a class="pos-r bold color-red shop-detail-btn" href="<?php the_permalink( );?>">詳しくはこちら</a></div>
          </li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>

        </ul>
      </section>

	  <?php endif; ?>





      <?php get_template_part( 'template-parts/common-tab' );?>

		</div>





		<?php

			if($line_show){

				echo '<div><a class="line-btn" href="https://line.me/R/ti/p/'.$line_id.' " target="_blank">
						<img src="'.esc_url(get_template_directory_uri()).'/assets/images/shop/line_icon.png">
					  </a></div>';
			}

		?>



		<?php get_footer( );?>
