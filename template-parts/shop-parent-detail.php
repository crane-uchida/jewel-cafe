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
				<span class="common-ttl-sub" id="shop_info">ジュエルカフェ - <?php the_title();?>の</span><span class="common-ttl-main">店舗<span class="color-red">案内</span></span>
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
			$image = get_field('slide_img_1');
			if(!empty($image)):
		?>
			<div class="swiper-slide">
				<img class="object-fit-contain no-lazyload" src="<?php echo esc_url($image['url']);?>" alt="<?php the_title();?>">
			</div>
		<?php endif;?>

		<?php
			$image = get_field('slide_img_2');
			if(!empty($image)):
		?>
			<div class="swiper-slide">
				<img class="object-fit-contain no-lazyload" src="<?php echo esc_url($image['url']);?>" alt="<?php the_title();?>">
			</div>
		<?php endif;?>

		<?php
			$image = get_field('slide_img_3');
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
				<a href="http://maps.google.com/maps?saddr=&daddr=<?php echo urlencode('ジュエルカフェ'.the_title());?>&dirflg=" target="_blank" rel="noopener noreferrer" >GoogleMapでお店までの経路をみる</a>
			</div>


	</div>
	<h3 class="section-ja-title">ジュエルカフェ<br><?php the_title();?></h3>
<?php /* ?>
	<?php if(get_option('show_holidays') == '1'):?>
		<p class="shop-att"><?php the_field('the_year_end_and_new_year_holidays');?></p>
	<?php endif;?>
<?php */ ?>
	<?php if(get_field('一覧ページに載せるお知らせ')):?>
		<p class="shop-att"><?php the_field('一覧ページに載せるお知らせ');?></p>
	<?php endif;?>

	<?php if ( is_single( 'aeonlaketown-mori' ) ): //エキテンの来店予約ボタン ?>
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

		<?php if(get_field('道順その1_本文')):?>
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
						<td><?php the_field('営業時間');?></td>
					</tr>
					<tr>
						<th>定休日</th>
						<td><?php the_field('定休日');?></td>
					</tr>
					<tr>
						<th>所在地</th>
						<td>
							<?php the_field('所在地');?>
							<?php if(get_field('施設hpリンク') || get_field('フロアマップリンク')):?>
								<span class="shop-tab-content-linkWrapper">
									<?php if(get_field('施設hpリンク')):?>
										<a href="<?php echo esc_url(get_field('施設hpリンク'));?>" class="shop-tab-content-link" target="_blank">施設のホームページを見る</a>
									<?php endif;?>
									<?php if(get_field('フロアマップリンク')):?>
										<a href="<?php echo esc_url(get_field('フロアマップリンク'));?>" class="shop-tab-content-link" target="_blank">フロアマップを見る</a>
									<?php endif;?>
								</span>
							<?php endif;?>
						</td>
					</tr>
					<?php if(get_field('店舗電話番号')):?>
					<tr>
						<th>電話番号</th>
						<td>
							<a href="tel:<?php
								$tel = get_field('店舗電話番号');
								$tel = str_replace(array('-', 'ー', '−', '―', '‐','(',')','（','）',' ','　'), '', $tel);
								echo $tel;
							?>" class="shop-tab-content-tel bold"><?php the_field('店舗電話番号'); ?></a>
						</td>
					</tr>
					<?php endif;?>
					<tr>
						<th>買取品目</th>
						<td>
							<?php 
								$hinmoku = get_field('買取全品目');
								
								
								$count_number = array();
							
								$count_number['gold'] = 0;
								$count_number['diamond'] = 1;
								$count_number['jewelry'] = 2;
								$count_number['brand'] = 3;
								$count_number['tokei'] = 4;
								$count_number['card1'] = 5;
								$count_number['card/teleca'] = 6;
								$count_number['card2'] = 7;
								$count_number['card'] = 8;
								$count_number['osake'] = 9;
								$count_number['kottou'] = 10;
								$count_number['cosme'] = 11;
								
								
						
	
								if(count($hinmoku) > 0){


								foreach($hinmoku as $key=>$num){

									$hinmoku_array[$count_number[$num['value']]] = $hinmoku[$key]; 
									
								}

								 ksort($hinmoku_array);
								
	
								
								$count = 0;

								foreach($hinmoku_array as $k=>$v){
									
									$v['value'] = str_replace('card1','card',$v['value']);
									
									$v['value'] = str_replace('card2','letter-top',$v['value']);
									
									echo '<a href="/kaitori/'.$v['value'].'/">'.$v['label'].'</a>';
									
									
									
									if( count($hinmoku_array)-1 > $count ){
										
										echo '・';
										
									}
									
									
									$count++;
									
								}
								
								}
					
							?>
						</td>
					</tr>
					<tr>
						<th>買取方法</th>
						<td>
							<?php 			
							
								$method = get_field('買取方法');

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
						<td><?php the_field('マップコード');?><span class="normal d-b">※「マップコード」および「ＭＡＰＣＯＤＥ」は（株）デンソーの登録商標です。</span></td>
					</tr>
					<tr>
						<th>古物商許可証番号</th>
						<td>東京都公安委員会許可第302210708825号</td>
					</tr>
				</tbody>
			</table>
		</div>

		<?php if(get_field('道順その1_本文')):?>
		<div class="shop-tab-content">
			<div class="map-img-guide">
				<ul>
					<li>
						<p class="map-img-guide-number">01</p>
						<div class="map-img-guide-img">
							<?php
								$image = get_field('road_image1');
								if(!empty($image)):
								?>
									<img src="<?php echo esc_url($image['url']);?>" alt="<?php echo $image['alt'];?>">
							<?php endif;?>
						</div>
						<p><?php 
							$field_value = get_field('道順その1_本文');
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
							$field_value = get_field('道順その2_本文');
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
							$field_value = get_field('道順その3_本文');
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
							$field_value = get_field('道順その4_本文');
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
							$field_value = get_field('道順その6_本文');
							echo htmlspecialchars_decode($field_value, ENT_QUOTES);
						?></p>
					</li>
					<?php endif;?>

				</ul>
			</div>
		</div>
		<?php endif;?>

	</div>
	<p class="base-font-size mtb-12"><?php the_field('店舗紹介フリーテキスト');?></p>

	<?php
		/*
	?>
	<div class="shop-detail-link">
		<a href="<?php echo esc_url( home_url('/kaitori/gold/') );?>">金買取専門ページ</a>
	</div>
	<?php
		*/
	?>
	
</section>
