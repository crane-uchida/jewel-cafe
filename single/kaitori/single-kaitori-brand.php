<?php
/*
Template Name: 品目詳細ページ 金 専用
*/


?>

<?php get_header();?>

<script type="application/ld+json">
	{
		"@context": "https://schema.org/",
		"@type": "WebPage",
		"name": "<?php the_title(); ?>",
		"datePublished": "2012-03-11",
		"dateModified": "<?php echo date('Y-m-d');?>"
	}
</script>

<?php /*
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
*/ ?>


<?php

	$field = get_fields( $post->ID );

	if ( $field ) {
		foreach ( $field as $name => $value ) {

			$singel_fields[$name] = $value;

		}
	}
	
	$singel_fields['post_id'] = $post->ID;
	
	$singel_fields['custom_title'] = get_post( $post->ID )->post_title;


?>




<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<link rel="stylesheet" href="/wp-content/themes/jewelcafe_replace/assets/css/new-style.css"/>




	<div id="page-top"></div>

	<div class="main-section">
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
</style>
			<?php kaitori_breadcrumb();?>
		</section>
	</div>

			<div class="main-section">

<?php if(!is_single('vuitton')):?>
				<div class="only-pc">
					<?php $image_fv_pc = get_field('fv_image_pc'); if(!empty($image_fv_pc)):?>
					<img src="<?php echo esc_url($image_fv_pc['url']);?>" alt="<?php the_title(); ?>買取ならジュエルカフェ" >
					<?php endif;?>
				</div>
				<div class="only-sp">
					<?php $image_fv_sp = get_field('fv_image_sp'); if(!empty($image_fv_sp)):?>
					<img src="<?php echo esc_url($image_fv_sp['url']);?>" alt="<?php the_title(); ?>買取ならジュエルカフェ" >
					<?php endif;?>
				</div>
<?php endif;?>

<?php if(is_single('vuitton')):?>	
	<section class="mv">
		<div class="contents">
			<div class="image-wrap">
				<picture>
					<source srcset="<?php echo esc_url(get_field('fv_image_sp')['url']);?>" media="(max-width: 1000px)" type="image/jpg">
					<img src="<?php echo esc_url(get_field('fv_image_pc')['url']);?>" alt="ルイヴィトン買取">
				</picture>
			</div>
			<div class="text-wrap">
				<div class="text-box">
					
					<?php if ( wp_is_mobile() ) : ?>
						<p class="text"><?php the_field('mv_text1_sp'); ?></p>
					<?php else: ?>
						<p class="text"><?php the_field('mv_text1_pc'); ?></p>
					<?php endif; ?>
					

					<?php if ( wp_is_mobile() ) : ?>
						<p class="text2" style="font-size:<?php the_field('mv_text2_size_sp'); ?>px;"><?php the_field('mv_text2_sp'); ?></p>
					<?php else: ?>
						<p class="text2" style="font-size:<?php the_field('mv_text2_size_pc'); ?>px;"><?php the_field('mv_text2_pc'); ?></p>
					<?php endif; ?>

				</div>
				
				<div class="text-box2">
					
					<?php if ( wp_is_mobile() ) : ?>
						<p class="text3"><?php the_field('mv_text3_sp'); ?></p>
					<?php else: ?>
						<p class="text3"><?php the_field('mv_text3_pc'); ?></p>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
	</section>
<?php endif;?>








			</div>


			<section class="kaitori-method red_bg">
		
				<?php get_template_part( 'template-parts/common-kaitori-method' );?>		

			</section>
	







			
			
	
		<section class="kaitori-intro section-inner" style="margin-top:30px;">
		
			<?php get_template_part( 'template-parts/intro-kaitori-newparents' );?>
			
		</section>








	

	
			
			
			
			
			
		<section class="kaitori-result mb-0">
			<?php
				
				$group_name = '買取実績その1';
				$group      = get_field( $group_name );
			
			
				if(isset($group['買取実績その1_画像']['ID']) && $group['買取実績その1_画像']['ID'] > 0 ){
				
					get_template_part( 'template-parts/new-common-kaitori-results' );

				}

				
			?>
		</section>

	




			<?php // 現在表示されている投稿と同じタームに分類された投稿を取得
				$taxonomy_slug = 'hinmoku'; // タクソノミーのスラッグを指定
				$post_type_slug = 'blog'; // 投稿タイプのスラッグを指定
				
				$post_name = $post->post_name;

				$post_id = $post->ID ?? null;
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
				
				
				
				
				$kaitori_area_parent_id = $kaitori_area_parent_id ?? null;

				if($kaitori_area_parent_id):
					$blog_slug = get_post($kaitori_area_parent_id)->post_name;
				endif;
				
				

				

				//追加
				if( isset($currnet_terms_slug) == false){

					$current_terms_slug[] = $post_terms[0]->slug; // タームのスラッグを配列に追加

				}

				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				

				if($kaitori_area_parent_id):
					$args = array( //品目と県を絞って取得
						'post_type' => $post_type_slug, // 投稿タイプを指定
						'posts_per_page' => 3, // 表示件数を指定
						'orderby' =>  'DESC', // ランダムに投稿を取得
						'paged' => $paged,
						'tax_query' => array( // タクソノミーパラメーターを使用
							'relation' => 'AND',
							array( //品目の絞り込み
								'taxonomy' => 'hinmoku', // タームを取得タクソノミーを指定
								'field' => 'slug', // スラッグに一致するタームを返す
								'terms' => $blog_slug // タームの配列を指定
							),
							array( //県の絞り込み
								'taxonomy' => 'area', // タームを取得タクソノミーを指定
								'field' => 'slug', // スラッグに一致するタームを返す
								'terms' => $post_name // タームの配列を指定
							)
						)
					);
				else:
					$args = array(
						'post_type' => $post_type_slug, // 投稿タイプを指定
						'posts_per_page' => 3, // 表示件数を指定
						'orderby' =>  'DESC', // ランダムに投稿を取得
						'paged' => $paged,
						'tax_query' => array( // タクソノミーパラメーターを使用
							array(
								'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
								'field' => 'slug', // スラッグに一致するタームを返す
								'terms' => $post_name // タームの配列を指定
							)
						)
					);
				endif;
				

				$the_query = new WP_Query($args);
				$count = 1;
				if($the_query->have_posts()){
			?>
			
			
			<section class="kaitori-blog">
			

				<div class="section-inner">

				<div class="point-title">

					<div class="point-title-inner d-f ai-c">
						<div class="point-kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/kaitori-kuma.png" alt="" ></div>
						<div class="only-sp">
								ジュエルカフェの<br>
								<?php echo $post->post_title;?>買取ポイント
						</div>
					</div>
					
					<div class="point-bg">
						<p class="only-pc">ジュエルカフェの <?php echo $post->post_title;?>買取ポイント</p>
						<h2>
							〈毎日更新〉<?php the_title(); ?>の買取速報！</br>
							全国のジュエルカフェで高額査定中！
						</h2>
					</div>
					
				</div>
					
					

					<p class="section-ttl-con lh-20 justify">
						全国のジュエルカフェにて毎日数千件お買取させていただく<?php the_title(); ?>商品をご紹介します。<br>
						<?php the_title(); ?>のお買取でしたら、新品はもちろんのこと、古いもの・汚れのあるもの、どんなものでも丁寧に査定させていただきます。
						売れるかどうか不安でしたらまずはお気軽にお問い合わせください。
					</p>
					
				</div>





				<div class="section-inner">
				

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
						
						if(isset($alt_img_arr[1]) && $alt_img_arr[1] == ''){
							
							$alt_img = explode('お',$post->post_title);

							if(isset($alt_img_arr[1] ) && $alt_img[1] !== ''){
							
								$image_alt_title = $alt_img[0];
							
							}
							
						}else{
							
							$image_alt_title = $alt_img_arr[0];
							
						}
						
						$terms_area = get_the_terms($post->ID,'area');
						
						$grand_child_area_slug = '';
						

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
									店頭買取
								</li>
								<li class="blog-archive-prefecture"><?php echo esc_html($child_area_name);?></li>

								<?php
									if( isset($grand_child_area_name) ){
								?>
								<li class="blog-archive-shop">
									<span class="sp-line">ジュエルカフェ&nbsp;</span><?php echo esc_html($grand_child_area_name);?>
								</li>
								<?php
									}
								?>
								
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
					
					<?php
						if ( isset($news) && $news instanceof WP_Query && $news->post_count > 0 ) {
					?>

					<div class="blog-archive-linkWrapper">
						<a href="/blog/" class="blog-archive-link">もっと見る</a>
					</div>
					<?php
						}
					?>


					</div>

				</section>


			</section>

		<?php
			}
		?>

			<div class="d-b ta-c mb-20 mt-20">

				<a href="https://jewel-cafe.jp/blog/<?php echo $post->post_name;?>/" class="blog-archive-link">速報！<?php echo $post->post_title;?>の買取実績一覧</a>

			</div>








<?php if(is_single('vuitton')):?>
	<section class="kaitori-kinds mt-60 mb-52">
		<div class="section-inner bold ta-c">
			<h2 class="section-ttl-main bold">ルイヴィトン買取強化モデル一覧</h2>
		</div>
		<div class="section-inner">
			<ul class="kaitori-kinds-list" style="justify-content: center;">
				<li>
					<a href="https://jewel-cafe.jp/kaitori/brand/vuitton/speedy/">
						<div class="kaitori-kinds-img ta-c">												<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_01-1.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_01-1.jpg.webp"><img width="294" height="224" src="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_01-1.jpg" class="attachment-full size-full wp-post-image lazyloaded" alt="ルイヴィトンスピーディ買取画像" decoding="async" fetchpriority="high" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_01-1.jpg"><noscript><img width="294" height="224" src="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_01-1.jpg" class="attachment-full size-full wp-post-image" alt="ルイヴィトンスピーディ買取画像" decoding="async" fetchpriority="high" data-eio="l" /></noscript></picture>											</div>
						<div class="kaitori-kinds-label ta-c">
							<h3>スピーディ</h3>
						</div>
					</a>
				</li>		
				<li>
					<a href="https://jewel-cafe.jp/kaitori/brand/vuitton/alma/">
						<div class="kaitori-kinds-img ta-c">												<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_03-1.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_03-1.jpg.webp"><img width="294" height="224" src="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_03-1.jpg" class="attachment-full size-full wp-post-image lazyloaded" alt="ルイヴィトンアルマ買取画像" decoding="async" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_03-1.jpg"><noscript><img width="294" height="224" src="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_03-1.jpg" class="attachment-full size-full wp-post-image" alt="ルイヴィトンアルマ買取画像" decoding="async" data-eio="l" /></noscript></picture>											</div>
						<div class="kaitori-kinds-label ta-c">
							<h3>アルマ</h3>
						</div>
					</a>
				</li>
				<li>
					<a href="https://jewel-cafe.jp/kaitori/brand/vuitton/papillon/">
						<div class="kaitori-kinds-img ta-c">												<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_04.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_04.jpg.webp"><img width="294" height="224" src="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_04.jpg" class="attachment-full size-full wp-post-image lazyloaded" alt="ルイヴィトンパピヨン買取画像" decoding="async" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_04.jpg"><noscript><img width="294" height="224" src="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_04.jpg" class="attachment-full size-full wp-post-image" alt="ルイヴィトンパピヨン買取画像" decoding="async" data-eio="l" /></noscript></picture>											</div>
						<div class="kaitori-kinds-label ta-c">
							<h3>パピヨン</h3>
						</div>
					</a>
				</li>
				<li>
					<a href="https://jewel-cafe.jp/kaitori/brand/vuitton/neverfull/">
						<div class="kaitori-kinds-img ta-c">												<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_07.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_07.jpg.webp"><img width="294" height="224" src="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_07.jpg" class="attachment-full size-full wp-post-image lazyloaded" alt="ルイヴィトンネヴァーフル買取画像" decoding="async" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_07.jpg"><noscript><img width="294" height="224" src="https://jewel-cafe.jp/wp-content/uploads/2021/08/lv_07.jpg" class="attachment-full size-full wp-post-image" alt="ルイヴィトンネヴァーフル買取画像" decoding="async" data-eio="l" /></noscript></picture>											</div>
						<div class="kaitori-kinds-label ta-c">
							<h3>ネヴァーフル</h3>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</section>
<?php endif;?>

<?php if(is_single('vuitton')):?>
	<section class="kaitori-kinds mt-20">
		<div class="section-inner bold ta-c">
			<div class="point-title">
				<div class="point-title-inner d-f ai-c">
					<div class="point-kuma"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" alt="" data-src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" decoding="async" class=" ls-is-cached lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" alt=""  data-eio="l"></noscript></div>
					<div class="only-sp">ルイヴィトン買取価格表</div>
				</div>
				<div class="point-bg only-pc"><h2>ルイヴィトン買取価格表</h2></div>
			</div>
		</div>
		<div class="section-inner swiper-wrapper-achievements">
			<details open>
				<summary><h3 class="category">バッグ</h3></summary>
				<div class="swiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<!-- <img src="https://jewel-cafe.jp/wp-content/uploads/2024/06/2_IMG_2930.jpeg" alt="" /> -->
							<div class="name_box">ネヴァーフル MM</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">360,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">240,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">440,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">スピーディ 30</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">240,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">160,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">280,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">アルマ BB</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">300,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">200,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">360,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">キーポル 55</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">280,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">180,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">320,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">ポシェット・<br class="only-sp">メティス</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">400,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">280,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">460,000<span>円</span></div></li>
							</ul>
						</div>
					</div>
					<!-- 前後の矢印 -->
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</details>
			<details open>
				<summary><h3 class="category">財布</h3></summary>
				<div class="swiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<!-- <img src="https://jewel-cafe.jp/wp-content/uploads/2024/06/2_IMG_2930.jpeg" alt="" /> -->
							<div class="name_box">ポルトフォイユ・<br class="only-sp">サラ</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">140,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">90,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">180,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">ジッピー・<br class="only-sp">ウォレット</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">120,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">80,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">170,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">ポルトフォイユ・<br>ヴィクトリーヌ</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">100,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">60,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">140,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">ポルトフォイユ・<br>ブラザ</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">160,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">100,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">200,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">ポルトフォイユ・<br>エミリー</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">80,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">50,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">120,000<span>円</span></div></li>
							</ul>
						</div>
					</div>
					<!-- 前後の矢印 -->
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</details>
			<details open>
				<summary><h3 class="category">アクセサリー</h3></summary>
				<div class="swiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<!-- <img src="https://jewel-cafe.jp/wp-content/uploads/2024/06/2_IMG_2930.jpeg" alt="" /> -->
							<div class="name_box">ブレスレット・<br class="only-sp">ラブ</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">100,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">60,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">140,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">ネックレス・<br>ロックイット</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">120,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">80,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">170,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">イヤリング・<br class="only-sp">ルイーズ</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">80,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">50,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">120,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">キーホルダー・<br class="only-sp">クレ</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">60,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">40,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">100,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">リング・<br class="only-sp">エセンシャル V</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">70,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">44,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">110,000<span>円</span></div></li>
							</ul>
						</div>
					</div>
					<!-- 前後の矢印 -->
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</details>
			<details open>
				<summary><h3 class="category">腕時計</h3></summary>
				<div class="swiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<!-- <img src="https://jewel-cafe.jp/wp-content/uploads/2024/06/2_IMG_2930.jpeg" alt="" /> -->
							<div class="name_box">タンブール <br class="only-sp">ホライゾン</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">600,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">400,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">900,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">タンブール <br>オールブラック</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">500,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">340,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">800,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">エスカル・<br class="only-sp">タイムゾーン</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">900,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">600,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">1,200,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">ボワ・ド・<br class="only-sp">ローズ</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">400,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">260,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">700,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">ポルト・デ・<br class="only-sp">プール</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">360,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">240,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">600,000<span>円</span></div></li>
							</ul>
						</div>
					</div>
					<!-- 前後の矢印 -->
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</details>
			<details open>
				<summary><h3 class="category">アパレル</h3></summary>
				<div class="swiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<!-- <img src="https://jewel-cafe.jp/wp-content/uploads/2024/06/2_IMG_2930.jpeg" alt="" /> -->
							<div class="name_box">モノグラム <br class="only-sp">ジャケット</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">500,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">340,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">700,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">ダミエ パーカー</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">360,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">240,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">500,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">エピ スカート</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">240,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">160,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">360,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">マヒナ ドレス</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">600,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">400,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">900,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">アンプラント <br class="only-sp">パンツ</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">300,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">200,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">400,000<span>円</span></div></li>
							</ul>
						</div>
					</div>
					<!-- 前後の矢印 -->
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</details>
			<details open>
				<summary><h3 class="category">メンズ</h3></summary>
				<div class="swiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<!-- <img src="https://jewel-cafe.jp/wp-content/uploads/2024/06/2_IMG_2930.jpeg" alt="" /> -->
							<div class="name_box">モノグラム <br class="only-sp">バックパック</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">440,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">300,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">600,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">ダミエ <br class="only-sp">ビジネスバッグ</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">400,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">280,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">560,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">エピ <br class="only-sp">クラッチバッグ</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">260,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">180,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">360,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">マヒナ <br>メッセンジャーバッグ</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">500,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">340,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">700,000<span>円</span></div></li>
							</ul>
						</div>
						<div class="swiper-slide">
							<div class="name_box">アンプラント <br>トートバッグ</div>
							<ul class="price_box">
								<li>新品買取価格：<div class="value">360,000<span>円</span></div></li>
								<li>中古品参考買取：<div class="value">240,000<span>円</span></div></li>
								<li>定価参考価格：<div class="value">500,000<span>円</span></div></li>
							</ul>
						</div>
					</div>
					<!-- 前後の矢印 -->
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</details>
			<p class="note">※これらの価格は参考例であり、実際の買取価格は状態、流通量、需要などによって異なる場合があります。</p>
		</div>
	</section>

	<script>
	const swiper = new Swiper(".swiper", {
	// 前後の矢印
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	autoplay: true, // 自動再生
	// スライドの表示枚数
	slidesPerView: 2,
	breakpoints: {
		// スライドの表示枚数：500px以上の場合
		500: {
		slidesPerView: 4,
		}
	},
	});
	</script>



<section class="boro_vuitton">
		<div class="section-inner">
			<div class="point-title">
				<div class="point-title-inner d-f ai-c">
					<div class="point-kuma"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" alt="" data-src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" decoding="async" class=" ls-is-cached lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" alt=""  data-eio="l"></noscript></div>
					<div class="only-sp">ジュエルカフェの<br>ルイヴィトン買取ポイント</div>
				</div>
				<div class="point-bg">
					<p class="only-pc">ジュエルカフェのルイヴィトン買取ポイント</p>
					<h2>中古・ボロボロのルイヴィトンも買い取ります</h2>
				</div>
			</div>
		</div>
		<div class="bg">
			<div class="section-inner">
				<div class="naname_text_box"><p class="text">ルイヴィトンでもこんなボロボロ<br class="sp">売れないでしょ？</p></div>
				<ul class="item_list">
					<li>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_vuitton_item1.png" alt="ルイヴィトン" >
						<div class="text_box">
							<p class="">持ち手の破損</p>
						</div>
					</li>
					<li>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_vuitton_item2.png" style="object-position:bottom;" alt="ルイヴィトン">
						<div class="text_box">
							<p class="">内部劣化・ベタベタ</p>
						</div>
					</li>
					<li>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_vuitton_item3.png" alt="ルイヴィトン" >
						<div class="text_box">
							<p class="">色が褪せ・焼け</p>
						</div>
					</li>
					<li>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_vuitton_item4.png" style="object-position: top;" alt="ルイヴィトン">
						<div class="text_box">
							<p class="">肩ひものちぎれ</p>
						</div>
					</li>
				</ul>


				<div class="pc_box">
					<p class="text2"><em>ルイヴィトン</em><span>なら</span><em>どんな状態でも</em></p>
					<div class="warranty_box">
						<img class="sp" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_warranty_sp.png" alt="買取保証" >
						<img class="pc" style="margin-bottom:-35px;" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_warranty_pc.png" alt="買取保証" >
					</div>
					<div class="section-inner pc">
						<p class="text3">まずはご相談ください!</p>
						<img style="width:540px; margin-bottom: 20px;padding-right: 30px;" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_vuitton_multiple.png" alt="ルイヴィトン" >
					</div>
				</div>

			</div>
		</div>
		<div class="section-inner sp">
			<p class="text3">まずはご相談ください!</p>
			<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_vuitton_multiple.png" alt="ルイヴィトン" >
		</div>

</section>








<?php endif;?>















		<section class="pink_bg">
			<div class="section-inner">
			
				<div class="point-title">

					<div class="point-title-inner d-f ai-c">
						<div class="point-kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/kaitori-kuma.png" alt="" ></div>
						<div class="only-sp">
							ジュエルカフェの<br/>
							<?php echo $post->post_title;?>買取ポイント
						</div>
					</div>
					
					<div class="point-bg">
						<p class="only-pc">ジュエルカフェの <?php echo $post->post_title;?>買取ポイント</p>
						<h2>
						
							<?php echo get_the_title();?>高価買取のためのポイントは？
					
						</h2>
					</div>
					
				</div>


				<div class="kaitori-inner-ways">
				<?php

					$custom_title = $custom_title ?? null;
				
					$voice = [
					  'custom_title' => $custom_title ,
					  'kaitori_ways_field' => $singel_fields['高く売る方法'],
					];

					echo $singel_fields['高く売る方法'];

				?>
				</div>
					</div>
			
		</section>



<?php if(is_single('vuitton')):?>
	<section class="kaitori-voice txtarea-js">
		<?php get_template_part( 'template-parts/kaitori-new-voice' );?>
		<p class="read-more"><span></span></p>
	</section>
<?php endif;?>


		
		<?php
		
			$example = [
			  'custom_title' => $custom_title,
			  'post_number' => '04',
			  'post_title' => $post->post_title,
			];
			
		?>
		<section class="kaitori-reason">
			<?php get_template_part( 'template-parts/kaitori-new-policy',null,$example );?>
		</section>






<?php if(!is_single('vuitton')):?>
		<section class="kaitori-purchase">		
			<div class="section-inner">
				<div class="point-title">
					<div class="point-title-inner d-f ai-c">
						<div class="point-kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/kaitori-kuma.png" alt="" ></div>
						<div class="only-sp">ジュエルカフェの<br><?php echo $post->post_title;?>買取ポイント</div>
					</div>
					<div class="point-bg">
						<p class="only-pc">ジュエルカフェの <?php echo $post->post_title;?>買取ポイント</p>
						<h3><?php echo $post->post_title;?>買取価格を他社と比較して下さい！</h3>
					</div>
				</div>
				<p class="section-ttl-con lh-20 justify"><?php if(isset($purchase_desc)){ echo $purchase_desc; }?></p>
			</div>
			<section class="ex-purchase">
				<div class="section-inner">
					<?php
						get_template_part( 'template-parts/new-ex-purchase' );
					?>
				</div>
			</section>
		</section>
<?php endif;?>
			




		<?php
		
			$example = [
			  'post_number' => '05',
			];
			
		?>

		<section class="kaitori-how-to-sell">
			<?php get_template_part( 'template-parts/kaitori-new-how-to-sell' ,null,$example );?>
		</section>


<?php if (is_single(array('vuitton', 'chanel'))) : ?>
		<?php get_template_part( 'template-parts/kaitori-verification-document' );?>
<?php else : ?>
	<?php get_template_part( 'template-parts/kaitori-verification-document' );?>
<?php endif;?>




		<?php get_template_part( 'template-parts/search-shop-new' );?>






<?php if(!is_single('vuitton')):?>
		<section class="kaitori-voice">
			<?php get_template_part( 'template-parts/kaitori-new-voice' );?>
		</section>
<?php endif;?>




			


		







			<section class="kaitori-kinds">

				<div class="section-inner bold ta-c">
				
					<h2 class="section-ttl-main bold"> 
					
						<?php
							$args = array(
								'post_type'      => 'kaitori',
								'post_parent'    => get_the_ID(),
								'post_status'    => 'any',
								'posts_per_page' => -1
							);
							$q = new WP_Query($args);

							if ($q->have_posts()) {
								echo display_filed('kinds_title',get_the_title().'なら<br class="only-sp">どんなものでもお持ちください !'); 
							}
							wp_reset_postdata();

						?>
						
					</h2>
				
				</div>


				<div class="section-inner">
					<ul class="kaitori-kinds-list">


						<?php 
						
							$city_arr = array(
								'shop',
								'hokkaido',
								'aomori',
								'iwate',
								'miyagi',
								'akita',
								'yamagata',
								'fukushima',
								'ibaraki',
								'tochigi',
								'gunma',
								'saitama',
								'chiba',
								'tokyo',
								'kanagawa',
								'niigata',
								'toyama',
								'ishikawa',
								'fukui',
								'yamanashi',
								'nagano',
								'gifu',
								'shizuoka',
								'aichi',
								'mie',
								'shiga',
								'kyoto',
								'osaka',
								'hyogo',
								'nara',
								'wakayama',
								'tottori',
								'shimane',
								'okayama',
								'hiroshima',
								'yamaguchi',
								'tokushima',
								'kagawa',
								'ehime',
								'kouchi',
								'fukuoka',
								'saga',
								'nagasaki',
								'kumamoto',
								'oita',
								'miyazaki',
								'kagoshima',
								'okinawa',
							);
							
						
						
		
						if($post->post_parent === 0 || $kaitori_area_parent_id): //親ページ、または品目-都道府県ページの処理

							$current_hinmoku_term = get_the_terms( $post->ID, 'hinmoku' );
							if(isset($kaitori_area_parent_id)){
								$post_id = $kaitori_area_parent_id;
							}else{
								$post_id = $post->ID;
							}
							

						
							
							$args = array(
								'post_type' => 'kaitori',
								'posts_per_page' => -1,
								'post_parent' => $post_id,
								'no_found_rows' => true,
								'order' => 'ASC',
								'orderby' => 'menu_order',
								'tax_query' => array(
									array(
										'taxonomy' => 'area',
										'field' => 'slug',
										'terms' => array('okinawa', 'kanto', 'kansai', 'hokkaido', 'tohoku', 'hokuriku', 'chubu', 'chugoku', 'shikoku', 'kyusyu'),
										'operator' => 'NOT IN'
									)
								)
							);
							$the_query = new WP_Query($args); if($the_query->have_posts()):
							?>
							<?php while($the_query->have_posts()): $the_query->the_post();?>

								<?php
								
									if( in_array($post->post_name , $city_arr) ){ continue; }
									
									$type_display = get_field('type_display', get_the_ID());

									if($type_display[0] == '1'){continue;}
								?>


								<li>
									<a href="<?php the_permalink();?>">
										<div class="kaitori-kinds-img ta-c">
											<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="<?php echo get_the_title();?>"  />
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3><?php the_title();?></h3>
										</div>
									</a>
								</li>
							<?php
								endwhile;
								wp_reset_postdata(  );
								endif;
							?>
							
							
							
							
							
						<?php else:?>
	
							<?php
								

								$children_args = array(
									'post_parent'=> $post->ID,
									'post_type'  => 'kaitori'
								);

								if(isset($grand_child_terms_slug) && !count(get_children($children_args)) && !$grand_child_terms_slug): //子ページかつ最下層の処理

								//get_post($parent_id)


							?>
								<?php
								$args = array(
									'post_type' => 'kaitori',
									'posts_per_page' => -1,
									'post__not_in' => array($post->ID),
									'post_parent' => $post->post_parent,
									'no_found_rows' => true,
								);
								$the_query = new WP_Query($args); if($the_query->have_posts()):
								?>
								<?php while($the_query->have_posts()): $the_query->the_post();?>

								<?php
								
									 if( in_array($post->post_name , $city_arr) ){ continue; }
									 
										if( $post->post_name == 'souba' ){ continue; }
								
									 $type_display = get_field('type_display', get_the_ID());

									if(isset($type_display[0]) && $type_display[0] == '1'){continue;}
								?>

									<?php
										$thumb = get_the_post_thumbnail($post->ID,'full');

										if(trim($thumb) !==''){
									?>

									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-img ta-c">
												<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="<?php echo get_the_title();?>"  />
											</div>
											<div class="kaitori-kinds-label ta-c">
												<h3><?php the_title();?></h3>
											</div>
										</a>
									</li>
								<?php
										}

									endwhile;
									wp_reset_postdata(  );
									endif;
								?>
							<?php //孫ページがある子ページ
								elseif(count(get_children($children_args)) > 0):
								$args = array(
									'post_type' => 'kaitori',
									'posts_per_page' => -1,
									'post_parent' => $post->ID,
									'no_found_rows' => true,
									'order' => 'ASC',
									'orderby' => 'menu_order'
								);
								$the_query = new WP_Query($args); if($the_query->have_posts()):
								?>
								<?php while($the_query->have_posts()): $the_query->the_post();?>

								<?php
								
									if( in_array($post->post_name , $city_arr) ){ continue; }

									if( $post->post_name == 'souba' ){ continue; }
									 
		
									$type_display = get_field('type_display', get_the_ID());

									if( isset($type_display[0]) && $type_display[0] == '1'){continue;}
									
									
									
								?>


									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-img ta-c"><?php ?>
												<?php the_post_thumbnail( 'full' );?>
											</div>
											<div class="kaitori-kinds-label ta-c">
												<h3><?php the_title();?></h3>
											</div>
										</a>
									</li>
								<?php
									endwhile;
									wp_reset_postdata(  );
									endif;
								?>
							<?php
								else: //孫ページの場合
								
								
									if ( isset($wp_obj) && isset($wp_obj->post_parent) ) {
										$post_parent_id = $wp_obj->post_parent;
									} else {
										$post_parent_id = 0; // 혹은 null
									}

								
								if( $post_parent_id > 0 ){
									
								$args = array(
									'post_type' => 'kaitori',
									'posts_per_page' => -1,
									'post__not_in' => array($post->ID),
									'post_parent' => $post_parent_id,
									'no_found_rows' => true,
								);
								$the_query = new WP_Query($args); if($the_query->have_posts()):
								?>
								<?php while($the_query->have_posts()): $the_query->the_post();?>

								<?php
									$type_display = get_field('type_display', get_the_ID());

									if(isset($type_display[0]) && $type_display[0] == '1'){continue;}
								?>
									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-img ta-c">
												<?php the_post_thumbnail( 'full' );?>
											</div>
											<div class="kaitori-kinds-label ta-c">
												<h3><?php the_title();?></h3>
											</div>
										</a>
									</li>
								<?php
									endwhile;
									wp_reset_postdata(  );
									endif;
									
								}
									
								?>
							<?php endif;?>
						<?php endif;?>
					</ul>
				</div>
			</section>





		<?php
			
			$kaitori_faq = [
			  'custom_title' => $custom_title,
			  'post_id' => $post->ID,
			];
			
		?>
		
		<section class="kaitori-faq">
			<?php get_template_part( 'template-parts/kaitori-new-faq',null,$kaitori_faq );?>
		</section>
		




<?php


$con=mysqli_connect("localhost", "xs931070_column", "KJhsadkJHKAS12d", "xs931070_newcolumn");


if(mysqli_connect_errno()){

	echo "Connection Fail".mysqli_connect_error();

}


//$parent_slug = get_post_field('post_name', $post->post_parent);


//  カテゴリに関連付けられた投稿を取得
//$category_id = $con->query("SELECT term_id FROM `wp_terms` WHERE slug = '{$post->post_name}'")->fetch_assoc()['term_id'];

$category_id = 0;

$result = $con->query(
    "SELECT term_id FROM wp_terms WHERE slug = '{$post->post_name}' LIMIT 1"
);

if ($result) {
    $row = $result->fetch_assoc();
    if ($row && isset($row['term_id'])) {
        $category_id = (int)$row['term_id'];
    }
}



if ($category_id) {
    // "tokei" カテゴリに属する投稿を取得
				$query = "SELECT p.* FROM `wp_posts` p
					INNER JOIN `wp_term_relationships` tr ON p.ID = tr.object_id
					WHERE tr.term_taxonomy_id = $category_id
					AND p.post_status = 'publish' AND p.post_type = 'post'
					ORDER BY p.post_modified DESC LIMIT 8";

    $result = $con->query($query);
    
    $number = 1; 



?>

			
			<section class="kaitori-column mt-40">
			
			<div class="red_bg">
				<div class="section-inner">
				
					<div class="red-bar d-f bold column-title">
						<div class="red-bar-title color-white">
							<h2>
							<?php the_title();?>買取
							
							<?php
								if(is_single('gold') == false){
							?>
							<br class="only-sp">
							<?php
								}
							?>
							
							お役立ちコラム
							</h2>
							
							<br class="only-sp">
							<span class="red-bar-by">by ジュエルカフェ</span>
							
						</div> 
					</div>
				
				</div>
			</div>
			
			


		<section class="more-btn-outer">
			<div class="section-inner kaitori-column-wrapper ">
			

				<div class="d-f ai-c kaitori-column-list">
					
					<?php
					if ($result->num_rows > 0) {
						
						while ($row = $result->fetch_assoc()) {
					?>
					
						<div class="d-f ai-t kaitori-column-content">

							<div class="kaitori-column-img">
							
							<?php
							
								$thumbnail_id = $con->query("SELECT * FROM `wp_postmeta` where post_id = '{$row['ID']}'  and meta_key = '_thumbnail_id'")->fetch_assoc()['meta_value'];

								if($thumbnail_id > 0 ){
									
									$thumbnail_src = $con->query("SELECT * FROM `wp_posts` where ID = {$thumbnail_id}")->fetch_assoc()['guid'];
									
									
									echo '<img src="'.$thumbnail_src.'" alt="'.get_the_title().'" >';
						
								}else{
									
									echo '<img src="'. esc_url(get_template_directory_uri()). '/assets/images/common/mascot.svg" alt="">';
									
								}			
												
							?>
			
							</div>
							
							
							
							<div class="kaitori-info">
				
								<div class="kaitori-ttl color-black bold mb-4">

									<h3>
										<a href="/column/<?php echo $post->post_name;?>/<?php echo $row['post_name'];?>/">
										<?php 
											
											
											if ( wp_is_mobile() ) {
																								
												echo mb_substr($row['post_title'],0, 30, 'UTF-8');
												
												if(strlen($row['post_title']) > 25){
													
													echo '...';
													
												}
											
											}else{
												
												echo mb_substr($row['post_title'],0, 190, 'UTF-8');
												
					
												if(strlen($row['post_title']) > 170){
													
													echo '...';
													
												}
												
											}

										?>
										</a>
									</h3>
									
								</div>
								<div class="kaitori-txt color-black">
									<a href="/column/<?php echo $post->post_name;?>/<?php echo $row['post_name'];?>/" class="kaitori-column-btn">コラムを読む&nbsp;></a>
								</div>
							</div>
							
						</div>
					<?php
							}
						}
						
						?>
										</div>

				</div>

	
				<div class="more-btn only-sp ta-c">
					<p class="open">もっと見る</p>
				</div>
					<?php	
						
}
					?>


			</section>
			
			
			
			</section>
	
	
	
	





		<?php
		/*
			$kaitori_rank = [
			  'custom_title' => $custom_title,
			];
			
		?>
		
		<section class="kaitori-rank">
			<?php get_template_part( 'template-parts/kaitori-new-rank',null,$kaitori_rank );?>
		</section>
		
		<?php
			*/
		?>
		
		
	<div class="section-inner d-f kaitori-how-to-inner">
  
  
	<div class="kaitori-type-list">
	
	   <div class="kaitori-type-info d-f ai-c">
		<div class="kaitori-type-img">
		 <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/tentou_icon.png?random" alt="ジュエルカフェの店頭買取" />
		</div>
		<div class="bold kaitori-type-txt">
		  お客様満足度No1！
		 <br /> ジュエルカフェおすすめの買取方法です。
		</div>
	   </div> 

	   <a href="/shop-buy/" class="kaitori_btn d-f ai-c mb-20">
		<div class="kaitori-img">
		 <img class=" ls-is-cached lazyloaded" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/tentou_image.jpg?random" alt="ジュエルカフェの店頭買取"/>
		</div>
		<div class="kaitori-name-info lts0">
		 <h3 class="bold kaitori-name">
		  店頭買取
		 </h3>
		 <div class="kaitori-name2 bold">
		  全国300店舗 / 即日現金お渡し
		 </div>
		</div> 
		</a>
	
	</div>
	
	
	<div class="kaitori-type-list">
	
	   <div class="kaitori-type-info d-f ai-c">
		<div class="kaitori-type-img">
		<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/takuhai_icon.png?random" alt="ジュエルカフェの宅配買取" />
		</div>
		<div class="bold kaitori-type-txt">
		全国送料無料！
		<br /> スマホからかんたん申し込み！
		</div>
	   </div> 
	   
	   
	   <a href="/delivery-buy/" class="kaitori_btn d-f ai-c mb-20">
		<div class="kaitori-img">
		 <img class=" ls-is-cached lazyloaded" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/takuhai_image.jpg?random" alt="ジュエルカフェの宅配買取" />
		</div>
		<div class="kaitori-name-info lts0">
		 <h3 class="bold kaitori-name">
		  宅配買取
		 </h3>
		 <div class="bold kaitori-name2">
		  無料発送キット / スピード査定
		 </div>
		</div> 
		</a>
	
	</div>
	
	
	<div class="kaitori-type-list">
	
	   <div class="kaitori-type-info d-f ai-c">
		<div class="kaitori-type-img"> 
		 <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/shucho_icon.png?random" alt="ジュエルカフェの出張買取"/>
		</div>
		<div class="bold kaitori-type-txt">
		  大量の商品でも安心！
		 <br /> ご自宅までお伺いして査定いたします！
		</div>
	   </div> 
	   
	   
	   <a href="/trip-buy/" class="kaitori_btn d-f ai-c mb-20">
		<div class="kaitori-img">
		 <img class=" ls-is-cached lazyloaded" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/shucho_image.jpg?random" alt="ジュエルカフェの出張買取"/>
		</div>
		<div class="kaitori-name-info lts0">
		 <h3 class="bold kaitori-name">
		  出張買取
		 </h3>
		 <div class="bold kaitori-name2">
		  大量でも安心 / お出かけ不要！
		 </div>
		</div> 
		</a>
	
	</div>
	
</div>
  	
		
		
		
		
		<?php
		
		/*
		
			$howto_tips = [
			  'custom_title' => $custom_title,
			  'post_title' => $singel_fields['買取豆知識_タイトル'],
			  'sentense_kaitori_howto' => nl2br($singel_fields['買取豆知識_文章']),
			  'image_kaitori_howto' => $singel_fields['買取豆知識_画像'],
			];
			
		?>


<?php if( !is_single('vuitton') && !is_single('chanel') ): ?>
		<section class="kaitori-howto-tips justify">
			<?php get_template_part( 'template-parts/kaitori-new-how-to-tips',null,$howto_tips );?>
		</section>
<?php endif; 
	*/
?>


	

<?php if(is_single('vuitton')):?>
			<section class="kaitori-kinds mt-20">

					<div class="section-inner bold ta-c">
						<h2 class="section-ttl-main bold">買取強化中のブランド品一覧</h2>
					</div>

				<div class="section-inner">
					<ul class="kaitori-kinds-list column4">
						<li>
							<a href="https://jewel-cafe.jp/kaitori/brand/hermes/">
								<div class="kaitori-kinds-label ta-c">
									<h3 class="small-font-size">エルメス</h3>
								</div>
								<div class="kaitori-kinds-img ta-c">
									<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/hermes-1-1.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/hermes-1-1.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/hermes-1-1.jpg" alt="エルメス" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/hermes-1-1.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/hermes-1-1.jpg" alt="エルメス" data-eio="l" /></noscript></picture>
								</div>
							</a>
						</li>
						<li>
							<a href="https://jewel-cafe.jp/kaitori/brand/tiffany/">
								<div class="kaitori-kinds-label ta-c">
									<h3 class="small-font-size">ティファニー</h3>
								</div>
								<div class="kaitori-kinds-img ta-c">
									<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/ubr_759_1-1.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/ubr_759_1-1.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/ubr_759_1-1.jpg" alt="ティファニー" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/ubr_759_1-1.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/ubr_759_1-1.jpg" alt="ティファニー" data-eio="l" /></noscript></picture>
								</div>
							</a>
						</li>
						<li>
							<a href="https://jewel-cafe.jp/kaitori/brand/chanel/">
								<div class="kaitori-kinds-label ta-c">
									<h3 class="small-font-size">シャネル</h3>
								</div>
								<div class="kaitori-kinds-img ta-c">
									<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/chanel-1-1-1.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/chanel-1-1-1.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/chanel-1-1-1.jpg" alt="シャネル" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/chanel-1-1-1.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/chanel-1-1-1.jpg" alt="シャネル" data-eio="l" /></noscript></picture>
								</div>
							</a>
						</li>
						<li>
							<a href="https://jewel-cafe.jp/kaitori/brand/gucci/">
								<div class="kaitori-kinds-label ta-c">
									<h3 class="small-font-size">グッチ</h3>
								</div>
								<div class="kaitori-kinds-img ta-c">
									<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/gucc-1-1.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/gucc-1-1.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/gucc-1-1.jpg" alt="グッチ" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/gucc-1-1.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/gucc-1-1.jpg" alt="グッチ" data-eio="l" /></noscript></picture>
								</div>
							</a>
						</li>
						<li>
							<a href="https://jewel-cafe.jp/kaitori/brand/prada/">
								<div class="kaitori-kinds-label ta-c">
									<h3 class="small-font-size">プラダ</h3>
								</div>
								<div class="kaitori-kinds-img ta-c">
									<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/prada-1-1.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/prada-1-1.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/prada-1-1.jpg" alt="プラダ" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/prada-1-1.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/prada-1-1.jpg" alt="プラダ" data-eio="l" /></noscript></picture>
								</div>
							</a>
						</li>
						<li>
							<a href="https://jewel-cafe.jp/kaitori/brand/fendi/">
								<div class="kaitori-kinds-label ta-c">
									<h3 class="small-font-size">フェンディ</h3>
								</div>
								<div class="kaitori-kinds-img ta-c">
									<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/fendi.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/fendi.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/fendi.jpg" alt="フェンディ" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/fendi.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/fendi.jpg" alt="フェンディ" data-eio="l" /></noscript></picture>
								</div>
							</a>
						</li>
						<li>
							<a href="https://jewel-cafe.jp/kaitori/brand/ferragamo/">
								<div class="kaitori-kinds-label ta-c">
									<h3 class="small-font-size">フェラガモ</h3>
								</div>
								<div class="kaitori-kinds-img ta-c">
									<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/Ferragamo-1-1.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/Ferragamo-1-1.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/Ferragamo-1-1.jpg" alt="フェラガモ" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/Ferragamo-1-1.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/Ferragamo-1-1.jpg" alt="フェラガモ" data-eio="l" /></noscript></picture>
								</div>
							</a>
						</li>
						<li>
							<a href="https://jewel-cafe.jp/kaitori/brand/dior/">
								<div class="kaitori-kinds-label ta-c">
									<h3 class="small-font-size">ディオール</h3>
								</div>
								<div class="kaitori-kinds-img ta-c">
									<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/dior-1.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/dior-1.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/dior-1.jpg" alt="ディオール" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/dior-1.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/dior-1.jpg" alt="ディオール" data-eio="l" /></noscript></picture>
								</div>
							</a>
						</li>
						

					</ul>
				</div>
			</section>
<?php endif;?>












			
			<?php get_footer();?>