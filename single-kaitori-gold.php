<?php
/*
Template Name: 品目詳細ページ 金 専用
*/


$parent_id = $post->post_parent;

$slug = get_post($post->ID)->post_name;

$parent_slug = get_post($parent_id)->post_name;



if(is_single('gold')){
		
	get_template_part('single/kaitori/single-kaitori-gold-test');
	
	exit;
	
} 

?>



<?php get_header( );?>

<script type="application/ld+json">
	{
		"@context" : "https://schema.org/",
		"@type": "Product",
		"@id": "kaitori",
		"name": "<?php the_title(); ?>",
		"description": "<?php echo strip_tags(get_the_content());?>",
		"review": {
						"@type": "Review",
						"reviewRating": {
							"@type": "Rating",
							"ratingValue": "4.8",
							"bestRating": "5"
						},
						"author": {
						"@type": "Person",
						"name" : "jewelcafe_user"
						}
					},
					"aggregateRating": {
						"@type": "AggregateRating",
						"ratingValue": "4.8",
						"reviewCount": "47"
					}
	}
</script>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>

$(document).ready(function(){

	$('.kaitori-howto-more-btn').on('click', function() {

		if( $(this).children().hasClass('is-active') ){

			$('.kaitori .kaitori-howto .kaitori-howto-txt').height('380');
		  
		   $(this).children().removeClass('is-active');
		 
		}else{
			
			$('.kaitori .kaitori-howto .kaitori-howto-txt').height('auto');
		  
		    $(this).children().addClass('is-active');
			
		} 
		 
	 });
 
});

</script>


	<div id="page-top"></div>
			<div class="main-section">
				<div class="only-pc">
					<h1>
					<?php $image_fv_pc = get_field('fv_image_pc'); if(!empty($image_fv_pc)):?>
					<img src="<?php echo esc_url($image_fv_pc['url']);?>" alt="金買取ならジュエルカフェ" >
					<?php endif;?>
					</h1>
				</div>
				<div class="only-sp">
					<h1>
					<?php $image_fv_sp = get_field('fv_image_sp'); if(!empty($image_fv_sp)):?>
					<img src="<?php echo esc_url($image_fv_sp['url']);?>" alt="金買取ならジュエルカフェ" >
					<?php endif;?>
					</h1>
				</div>
			</div>
			

		<?php
		/*
	?>
			<?php get_template_part('template-parts/market-price'); ?>



			<div class="breadcrumbs">
				<div class="d-f section-inner">
					<a href="<?php echo esc_url(home_url());?>">TOP<span></span></a>
					<div class="current breadcrumbs-list ml-4">金・貴金属買取専門ページ</div>
				</div>
			</div>

			<?php get_template_part('template-parts/market-price-chart-gold'); ?>
		<?php
	*/
?>

				<?php get_template_part('template-parts/market-price-chart-gold'); ?>

			


			<section class="intro section-inner">
				<div class="logo">
					<picture>
						<source media="(max-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/logo.svg">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/logo.svg" alt="JEWEL CAFE">
					</picture>
				</div>
				<div class="mincho pos-r">
					<div class="intro-title">
						<span class="intro-sub">金・貴金属買取なら</span>
						<span class="intro-appeal color-red">全国300店舗展開の</span>
						<span class="intro-main color-red">
							ジュエルカフェに<br class="only-sp">お任せください。
						</span>
					</div>
					<div class="medal">
						<picture>
							<source media="(max-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/img_free_appraisal.png">
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/img_free_appraisal.png" alt="安心の無料査定">
						</picture>
					</div>
				</div>
				<div class="en">
					<picture>
						<source media="(max-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/txt_hs_intro.png">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/txt_hs_intro.png" alt="JewelCafe">
					</picture>
				</div>
				<p class="intro-txt color-black">
					<?php the_field('「ジュエルカフェにお任せください」以降の導入文（短め・大・小カテゴリ用）');?>
				</p>
			</section>

			<?php if (get_field('高価買取その1_タイトル')):?>
				<section class="ex-purchase">
					<div class="common-ttl">
						<div class="section-inner">
							<h2 class="kaitori-title">
								<span class="common-ttl-sub">ジュエルカフェは</span>
								<span class="common-ttl-main"><span class="color-red">高価買取</span>を<br>実現しています！</span>
							</h2>
							<div class="common-ttl-en">Expensive Purchase</div>
						</div>
					</div>
					<div class="section-inner">
						<p class="lh-20">
							<?php the_field('高価買取説明文');?>
						</p>
							<?php get_template_part( 'template-parts/ex-purchase' );?>
					</div>
				</section>
			<?php endif;?>




			<?php get_template_part('template-parts/common-kaitori-results'); ?>



			<?php // 現在表示されている投稿と同じタームに分類された投稿を取得
				$taxonomy_slug = 'hinmoku'; // タクソノミーのスラッグを指定
				$post_type_slug = 'blog'; // 投稿タイプのスラッグを指定
				$post_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // タクソノミーの指定
				if( $post_terms && !is_wp_error($post_terms)) { // 値があるときに作動
					$current_terms_slug = array(); // 配列のセット
					foreach( $post_terms as $value ){ // 配列の作成
						if($value->parent) {
							$currnet_terms_slug[] = $value->slug; // タームのスラッグを配列に追加
						} else {
							$parent_terms_slug = $value->slug;
						}
					}
				}
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => $post_type_slug, // 投稿タイプを指定
					'posts_per_page' => 10, // 表示件数を指定
					'orderby' =>  'DESC', // ランダムに投稿を取得
					'paged' => $paged,
					'tax_query' => array( // タクソノミーパラメーターを使用
						array(
							'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
							'field' => 'slug', // スラッグに一致するタームを返す
							'terms' => $parent_terms_slug // タームの配列を指定
						)
					)
				);
				$the_query = new WP_Query($args); if($the_query->have_posts()):
			?>
			<section class="kaitori-resuluts">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">リアルタイム!</span>
							<span class="common-ttl-main">金・貴金属<span class="color-red">買取事例</span></span>
						</h2>
						<div class="common-ttl-en">Purchase Results</div>
					</div>
				</div>

				<div class="section-inner">
					<p class="lh-20">全国のジュエルカフェにて毎日数千件お買取させていただく<?php the_title( ); ?>商品をご紹介します。<br><?php the_title( ); ?>のお買取でしたら、新品はもちろんのこと、古いもの・汚れのあるもの、どんなものでも丁寧に査定させていただきます。売れるかどうか不安でしたらまずはお気軽にお問い合わせください。</p>


					<ul class="blog-archive-list">
					<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
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
						
						if($alt_img_arr[1] == ''){
							
							$alt_img = explode('お',$post->post_title);

							if($alt_img[1] !== ''){
							
								$image_alt_title = $alt_img[0];
							
							}
							
						}else{
							
							$image_alt_title = $alt_img_arr[0];
							
						}
												
						
						?>
					<li>
						<a href="<?php the_permalink() ?>">
							<div class="blog-catch-img">
							
								<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
									<img class="blog-detail-img" src="<?php echo $post_thumbnail;?>" alt="<?php echo $image_alt_title;?>">
								<?php else:?>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="">
								<?php endif;?>
							
							
								<div class="blog-archive-date"><?php the_time('Y.m.d');?></div>
							</div>
							<div class="p-12">
								<p class="blog-archive-category"><?php
									echo esc_html($hinmoku_parent_name).'/'.esc_html($hinmoku_child_name);
									?></p>

								<?php if(get_field('買取価格')):?>
								<p class="blog-archive-category"><?php
									echo '買取価格 : ';
									the_field('買取価格');
									?></p>
								<?php endif;?>

								<p class="blog-archive-ttl"><?php the_title(); ?></p>
								<p class="blog-archive-shop"><?php
									echo esc_html($area_grandchild_name);
									?></p>
							</div>
						</a>
					</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					</ul>

					<div class="blog-archive-linkWrapper">
						<?php
							if($grand_child_terms_slug) {
								$blog_archive_link = $hinmoku_parent_slug.'/'.$hinmoku_child_slug.'/'.$hinmoku_grandchild_slug.'/';
							} elseif($child_terms_slug) {
								$blog_archive_link = $hinmoku_parent_slug.'/'.$hinmoku_child_slug.'/';
							} else {
								$blog_archive_link = $hinmoku_parent_slug.'/';
							}
						?>
						<a href="<?php echo esc_url(home_url('blogs/'.$blog_archive_link));?>" class="blog-archive-link">もっと見る</a>
					</div>
				</div>
			</section>


			<section class="kaitori-policy">
				<div class="policy-inner section-inner">

					<div class="head flex -jscenter ls_15">
						<div class="common-ttl policy-ttl">
							<div class="section-inner">
								<h2 class="kaitori-title">
									<span class="common-ttl-sub">ジュエルカフェが</span>
									<span class="common-ttl-main"><span class="marker-yellow"><span class="color-red"><?php the_title(); ?>買取</span>に</span><br><span class="marker-yellow">強い理由</span></span>
								</h2>
							</div>
						</div>
					</div>

					<div class="body">
						<div class="policies">

							<div class="policy-item d-f -alstretch">
								<div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-01.jpg" alt="プロの査定スタッフ"></div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php the_title(); ?>買取に強い理由</div>
											<div class="number">1</div>
										</div>
										<div class="policy-title"><h3>プロの査定スタッフ</h3></div>
										<div class="policy-text">ジュエルカフェではプロの査定スタッフが丁寧に査定いたします。最新の価格データ、市場相場を加味して自信を持って査定し、お客様にご満足いただける価格をご提示できるように日々努めております。</div>
									</div>
								</div>
							</div>

							<div class="policy-item d-f -alstretch">
								<div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-02.jpg" alt="海外に展開・独自販売ルートの確立"></div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php the_title(); ?>買取に強い理由</div>
											<div class="number">2</div>
										</div>
										<div class="policy-title"><h3>海外に展開・独自販売ルートの確立</h3></div>
										<div class="policy-text">ジュエルカフェでは海外にも多数の営業拠点を展開。お買取した商品は国内外のネットワークを活かして販売に繋げるため、より高い高価買取を実現できます。</div>
									</div>
								</div>
							</div>

							<div class="policy-item d-f -alstretch">
								<div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-03.jpg" alt="直営300店舗の実績"></div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php the_title(); ?>買取に強い理由</div>
											<div class="number">3</div>
										</div>
										<div class="policy-title"><h3>直営300店舗の実績</h3></div>
										<div class="policy-text">ジュエルカフェでは直営店舗として300店舗以上の店舗を展開し、これまでに延べ300万人以上のお客様にご利用いただいております。これからもお客様に信頼していただけるよう努めてまいります。</div>
									</div>
								</div>
							</div>

							<div class="policy-item d-f -alstretch">
								<div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-04.jpg" alt="様々な特典が利用可能"></div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php the_title(); ?>買取に強い理由</div>
											<div class="number">4</div>
										</div>
										<div class="policy-title"><h3>様々な特典が利用可能</h3></div>
										<div class="policy-text">ジュエルカフェでは、ご来店時にご利用いただける様々な特典をご用意しており、リピーターのお客様にも大変お喜びいただいております。Tポイントやジュエリークリーニングなども大好評です。</div>
									</div>
								</div>
							</div>

							<div class="policy-item d-f -alstretch">
								<div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-05.jpg" alt="お近くのお店で気軽に無料査定"></div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php the_title(); ?>買取に強い理由</div>
											<div class="number">5</div>
										</div>
										<div class="policy-title"><h3>お近くのお店で気軽に無料査定</h3></div>
										<div class="policy-text">ジュエルカフェは大型ショッピングモールや駅前商店街など便利なエリアにお店を展開。お買い物ついでに気軽に立ち寄れる居心地の良い空間を私たちは常に目指しております。</div>
									</div>
								</div>
							</div>

					</div>

				</div><!-- bg -->
			</section>


			<?php get_template_part( 'template-parts/kaitori-how-to-sell' );?>


			<div class="section-inner">
				<div class="search-shop" data-uniq-id="609bb70d69164">
					<?php get_template_part( 'template-parts/search-shop' );?>
				</div>
			</div>

			<?php endif; ?>







			<section class="kaitori-voice">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">ジュエルカフェで<br><?php the_title(); ?>買取をご利用いただいた</span>
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
                <div class="star-rating-front" style="width: 93%"></div>
                <div class="star-rating-back"></div>
              </div>
            </div>
            <div class="count-review mt-3 ta-c">
              （<span>47</span>件のレビュー）
            </div>
          </div>
        </div>

				<div class="section-inner">
					<div class="voice-list2">

						<div class="voice-list-item">
							<div class="d-f media jc-sb">

								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">4.9</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 93%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その1_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その1_お客様の声');?>
									</div>
								</div>
						</div>

						<div class="voice-list-item">
							<div class="d-f media jc-sb">

								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">5.0</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その2_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その2_お客様の声');?>
									</div>
								</div>
						</div>

						<div class="voice-list-item">
							<div class="d-f media jc-sb">

								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">4.8</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 93%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その3_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その3_お客様の声');?>
									</div>
								</div>
						</div>


<?php if (get_field('お客様の声その4_お客様タイトル')) :?>
						<div class="voice-list-item">
							<div class="d-f media jc-sb">

								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">5.0</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その4_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その4_お客様の声');?>
									</div>
								</div>
						</div>
<?php endif; ?>

<?php if (get_field('お客様の声その5_お客様タイトル')) :?>
						<div class="voice-list-item">
							<div class="d-f media jc-sb">

								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">5.0</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その5_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その5_お客様の声');?>
									</div>
								</div>
						</div>
<?php endif; ?>

<?php if (get_field('お客様の声その6_お客様タイトル')) :?>
						<div class="voice-list-item">
							<div class="d-f media jc-sb">

								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">5.0</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その6_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その6_お客様の声');?>
									</div>
								</div>
						</div>
<?php endif; ?>

<?php if (get_field('お客様の声その7_お客様タイトル')) :?>
						<div class="voice-list-item">
							<div class="d-f media jc-sb">

								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">4.7</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 93%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その7_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その7_お客様の声');?>
									</div>
								</div>
						</div>
<?php endif; ?>

<?php if (get_field('お客様の声その8_お客様タイトル')) :?>
						<div class="voice-list-item">
							<div class="d-f media jc-sb">

								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">5.0</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その8_お客様タイトル');?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php the_field('お客様の声その8_お客様の声');?>
									</div>
								</div>
						</div>
<?php endif; ?>

					</div>
				</div>
			</section>

			<div class="section-inner">
				<div class="search-shop" data-uniq-id="609bb70d69165">
					<?php get_template_part( 'template-parts/search-shop' );?>
				</div>
			</div>

			<section class="kaitori-ways section-inner">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">金買取・貴金属買取で</span>
							<span class="common-ttl-main"><span class="color-red">高く売る方法</span></span>
						</h2>
						<div class="common-ttl-en">Ways to make expensive purchase Results</div>
					</div>
				</div>
				<?php ?>
				<div class="kaitori-ways-list">
					<?php the_field('高く売る方法');?>
				</div>
			</section>


			<section class="kaitori-kinds">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">買取可能な</span>
							<span class="common-ttl-main">金・貴金属の<span class="color-red">種類</span></span>
						</h2>
						<div class="common-ttl-en">Kinds we make expensive purchase</div>
					</div>
				</div>
				<div class="section-inner">
					<ul class="kaitori-kinds-list">

						<?php
							$post_type_slug = 'kaitori';
							$args = array(
								'post_type' => $post_type_slug,
								'posts_per_page' => -1,
								'post_parent' => $post->ID,
								'no_found_rows' => true,
								'order' => 'ASC',
								'orderby' => 'menu_order'
							);
							$the_query = new WP_Query($args); if($the_query->have_posts()):
						?>
						<?php while($the_query->have_posts()): $the_query->the_post();?>
						<li>
							<a href="<?php the_permalink();?>">
								<div class="kaitori-kinds-label ta-c">
									<h3 class="small-font-size"><?php the_title();?></h3>
								</div>
								<div class="kaitori-kinds-img ta-c">
									<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="<?php echo get_the_title();?>"  />
								</div>
							</a>
						</li>
						<?php
							endwhile;
							wp_reset_postdata(  );
							endif;
						?>

					</ul>
				</div>
			</section>


			<?php // 現在表示されている投稿と同じタームに分類された投稿を取得
				$taxonomy_slug = 'hinmoku'; // タクソノミーのスラッグを指定
				$post_type_slug = 'column'; // 投稿タイプのスラッグを指定

				if($grand_child_terms_slug) {
					$currnet_hinmoku_term_slug = $grand_child_terms_slug;
				} elseif ($child_terms_slug) {
					$currnet_hinmoku_term_slug = $child_terms_slug;
				} else {
					$currnet_hinmoku_term_slug = $parent_terms_slug;
				}
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => $post_type_slug, // 投稿タイプを指定
					'posts_per_page' => 8, // 表示件数を指定
					'orderby' =>  'ASC', // 新着順に投稿を取得
					'paged' => $paged,
					'tax_query' => array( // タクソノミーパラメーターを使用
						array(
							'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
							'field' => 'slug', // スラッグに一致するタームを返す
							'terms' => $currnet_hinmoku_term_slug // タームの配列を指定
						)
					)
				);
				$the_query = new WP_Query($args); if($the_query->have_posts()):
			?>
			<section class="kaitori-column">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">金・貴金属買取の</span>
							<span class="common-ttl-main"><span class="color-red">お役立ち</span>コラム</span>
						</h2>
						<div class="common-ttl-en">Columns</div>
					</div>
				</div>


			<?php
				if($the_query->found_posts > 3){
			?>
			<div class="content-wrap animated">
			  <div class="content-txt">
			<?php
				}
			?>

				<div class="section-inner">
					<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
					<a href="<?php the_permalink() ?>">
						<div class="d-f">
							<div class="kaitori-info">
								<div class="kaitori-ttl color-black bold mb-4"><h3><?php the_title();?></h3></div>
								<div class="kaitori-txt color-black"><?php echo mb_substr(get_the_excerpt(), 0, 50) . '...';?></div>
							</div>
							<div class="kaitori-column-img">
								<?php if($post_thumbnail = get_the_post_thumbnail( $post->ID, 'full' )):?>
									<?php echo $post_thumbnail; ?>
								<?php else:?>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="">
								<?php endif;?>
							</div>
						</div>
					</a>

					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div>

			<?php
				if($the_query->found_posts > 3){
			?>
				</div>
					<div class="more-btn">
						<p class="open">もっと見る</p>
					</div>
			</div>
			<?php
				}
			?>

			</section>
			<?php endif; ?>



	<script>

$(function() {


	  $('.more-btn').on('click', function() {
		if( $(this).children().is('.open') ) {
		  $(this).html('<p class="close">閉じる</p>').addClass('close-btn');
		  $(this).parent().removeClass('slide-up').addClass('slide-down');
		} else {
		  $(this).html('<p class="open">もっと見る</p>').removeClass('close-btn');
		  $(this).parent().removeClass('slide-down').addClass('slide-up');
		}
	  });
  
  
	$('.kaitori-howto-more-btn').on('click', function() {

		if( $(this).children().hasClass('is-active') ){

			$('.kaitori .kaitori-howto .kaitori-howto-txt').height('380');
		  
		   $(this).children().removeClass('is-active');
		 
		}else{
			
			$('.kaitori .kaitori-howto .kaitori-howto-txt').height('auto');
		  
		    $(this).children().addClass('is-active');
			
		} 
		 
	 });
  
});

	</script>


	<style>

.animated {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}
@-webkit-keyframes slideDown {
  0% {
    opacity: 1;
    -webkit-transform: translateY(-20px);
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}
@keyframes slideDown {
  0% {
    opacity: 1;
    -webkit-transform: translateY(-20px);
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}
.slide-down {
  -webkit-animation-name: slideDown;
  animation-name: slideDown;
}
@-webkit-keyframes slideUp {
  0% {
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
  }
  100% {
    -webkit-transform: translateY(0px);
    transform: translateY(0px);
  }
}
@keyframes slideUp {
  0% {
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
  }
  100% {
    -webkit-transform: translateY(0px);
    transform: translateY(0px);
  }
}
.slide-up {
  -webkit-animation-name: slideUp;
  animation-name: slideUp;
}
.content-wrap {
  height: 450px;
  overflow: hidden;
  position: relative;
  margin: 0;
}


@media screen and (min-width: 800px) {

	.content-wrap {
	  height: 650px;
	  overflow: hidden;
	  position: relative;
	  margin: 0;
	}

}



.close-btn, .more-btn {
  display: block;
  width: 100%;
  padding: 80px 0 0;
  position: absolute;
  bottom: 0;
  left: 0;
  text-align: center;
  background: -moz-linear-gradient(
    top,
    rgba(255, 255, 255, 0) 0%,
    rgba(255, 255, 255, 1) 60%
  );
  background: -webkit-linear-gradient(
    top,
    rgba(255, 255, 255, 0) 0%,
    rgba(255, 255, 255, 1) 60%
  );
  background: linear-gradient(
    to bottom,
    rgba(255, 255, 255, 0) 0%,
    rgba(255, 255, 255, 1) 60%
  );
  filter: progid:DXImageTransform.Microsoft.gradient(
      startColorstr='#00ffffff',
      endColorstr='#ffffff',
      GradientType=0
    );
}
.close-btn {
  background: none;
}
.slide-up {
  height: 450px;
  padding-bottom: 0;
  overflow: hidden;
}

@media screen and (min-width: 800px) {

	.slide-up {
	  height: 650px;
	  padding-bottom: 0;
	  overflow: hidden;
	}

}


.slide-down {
  height: auto;
  overflow: visible;
  padding-bottom: 50px;
}
.more-btn p {
  display: inline-block;
  color: #fff;
  cursor: pointer;
  background: #de1122;
  padding: 5px 20px;
  padding:10px 82px;
  border-radius: 50px;
  font-weight:bold;

}

.more-btn p:hover{
	opacity:0.6;
	transition:all .3s;
}


.close-btn {
  padding:0;
}
.close-btn p {
  background: #aaa;
}


.kaitori-policy .policy-item{align-items:center;}


@media (min-width: 800px) {

	.kaitori-policy .policy-item{align-items:flex-start;}

}


.blog-archive-list li .blog-catch-img img{
	
	height:120px;
	
}



	</style>



			<div class="section-inner">
				<div class="search-shop" data-uniq-id="609bb70d69166">
					<?php get_template_part( 'template-parts/search-shop' );?>
				</div>
			</div>

			<section class="kaitori-faq">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">金・貴金属買取の</span>
							<span class="common-ttl-main">よくある<span class="color-red">ご質問</span></span>
						</h2>
						<div class="common-ttl-en">Faq</div>
					</div>
				</div>
				<div class="section-inner">

					<?php if ( get_field('よくあるご質問その1_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その1_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その1_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その2_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その2_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その2_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その3_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その3_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その3_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その4_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その4_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その4_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その5_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その5_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その5_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その6_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その6_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その6_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その7_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その7_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その7_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その8_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その8_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その8_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その9_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その9_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その9_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その10_Q') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その10_Q'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その10_A'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

				</div>
			</section>

			<section class="kaitori-rank">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">金・貴金属買取の</span>
							<span class="common-ttl-main"><span class="color-red">ランキング</span></span>
						</h2>
						<div class="common-ttl-en">Ranking</div>
					</div>
				</div>
				<div class="section-inner">
					<div class="kaitori-rank-list">
						<div class="kaitori-rank-ttl d-f ai-c">
							<div class="kaitori-rank-medal">
								<picture>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-01.png" alt="1位" style="max-width: 50px; opacity: 1;">
								</picture>
							</div>
							<p class="kaitori-rank-item"><?php the_field('買取ランキング1位_タイトル');?></p>
						</div>
						<p class="kaitori-rank-txt"><?php the_field('買取ランキング1位_文章');?></p>
					</div>
					<div class="kaitori-rank-list">
						<div class="kaitori-rank-ttl d-f ai-c">
							<div class="kaitori-rank-medal">
								<picture>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-02.png" alt="2位" style="max-width: 50px; opacity: 1;">
								</picture>
							</div>
							<p class="kaitori-rank-item"><?php the_field('買取ランキング2位_タイトル');?></p>
						</div>
						<p class="kaitori-rank-txt"><?php the_field('買取ランキング2位_文章');?></p>
					</div>
					<div class="kaitori-rank-list">
						<div class="kaitori-rank-ttl d-f ai-c">
							<div class="kaitori-rank-medal">
								<picture>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-03.png" alt="3位" style="max-width: 50px; opacity: 1;">
								</picture>
							</div>
							<p class="kaitori-rank-item"><?php the_field('買取ランキング3位_タイトル');?></p>
						</div>
						<p class="kaitori-rank-txt"><?php the_field('買取ランキング3位_文章');?></p>
					</div>
				</div>
			</section>

			<section class="kaitori-howto">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">金・貴金属買取の</span>
							<span class="common-ttl-main">今週の<span class="color-red">金・貴金属</span>豆知識</span>
						</h2>
						<div class="common-ttl-en">HOW TO TIPS</div>
					</div>
				</div>
				<div class="section-inner">
					<div class="kaitori-howto-item d-f">
						<h3 class="kaitori-howto-item-title"><?php the_field('買取豆知識_タイトル');?></h3>
						<?php $image_kaitori_howto = get_field('買取豆知識_画像'); if(!empty($image_kaitori_howto)):?>
							<img src="<?php echo esc_url($image_kaitori_howto['url']);?>" alt="<?php echo esc_html($image_kaitori_howto['url']);?>">
						<?php endif;?>
					</div>
					<div class="kaitori-howto-txt">
						<?php the_field('買取豆知識_文章');?>
					</div>
				</div>
			</section>

      <?php get_template_part( 'template-parts/common-tab' );?>

			<?php get_footer( );?>
