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



<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



<?php /* ?>
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "FAQPage",
    "mainEntity": [{
            "@type": "Question",
            "name": "<?php the_field('よくあるご質問その1_Q'); ?>",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "<?php the_field('よくあるご質問その1_A'); ?>"
            }
        },
        {
            "@type": "Question",
            "name": "<?php the_field('よくあるご質問その2_Q'); ?>",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "<?php the_field('よくあるご質問その2_A'); ?>"
            }
        }
    ]
}
</script>
<?php */ ?>


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
				.kaitori section {
					padding-bottom: 0;
				}

				.kaitori-kinds-feature{
					padding: 70px 0px;
				}
				.kaitori-kinds-feature .name{
					font-size: 20px;
					border-bottom: 1px solid #9f9f9f;
					margin-bottom: 15px;
					padding-bottom: 5px;
				}
				.kaitori-kinds-feature img{
					width: 180px;
					margin-right:15px;
				}
				.kaitori-kinds-feature .flex{
					margin-bottom:30px;
				}
				@media screen and (max-width: 480px){
					.kaitori-kinds-feature .flex{
						flex-wrap:wrap;
					}
					.kaitori-kinds-feature .flex > *{
						width: 100%;
					}
					.kaitori-kinds-feature img{
						margin: auto;
    					display: block;
					}
					.kaitori-kinds-feature .text{
						margin-top:10px;
					}
				}
			</style>
			<?php kaitori_breadcrumb();?>
		</section>
	</div>
	

			<div class="main-section">
<?php /* ?>
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
<?php */ ?>









<section class="mv">
	<div class="contents">
		<div class="image-wrap">
			<picture>
				<source srcset="<?php echo esc_url(get_field('fv_image_sp')['url']);?>" media="(max-width: 1000px)" type="image/jpg">
				<img src="<?php echo esc_url(get_field('fv_image_pc')['url']);?>" alt="切手買取">
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












			</div>


			<section class="kaitori-method red_bg">
		
				<?php get_template_part( 'template-parts/common-kaitori-method' );?>		

			</section>
	








			
			
	
		<section class="kaitori-intro section-inner" style="margin-top:30px;">
		
			<?php get_template_part( 'template-parts/intro-kaitori-newparents' );?>
			
		</section>






		<section class="">
	
			<?php
				$top_banner = get_field('top-banner');

				$top_banner_sp = get_field('top-banner_sp');
				
			?>
	
			<div class="main-banner">
				<div class="only-pc">
					<?php if(!empty($top_banner['url'])):?>
					<img src="<?php echo esc_url($top_banner['url']);?>" alt="来店予約でロレックス買取成約のお客様に20000円キャッシュバックキャンペーン" >
					<?php endif;?>
				</div>
				<div class="only-sp">
					<?php if(!empty($top_banner_sp['url'])):?>
					<img src="<?php echo esc_url($top_banner_sp['url']);?>" alt="来店予約でロレックス買取成約のお客様に20000円キャッシュバックキャンペーン" >
					<?php endif;?>
				</div>
			</div>

		</section>
		
	
	
	

			
			
			
			
			
		<section class="kaitori-result mb-0">
			<?php
				get_template_part( 'template-parts/new-common-kaitori-results' );
			?>
		</section>

	




			<?php // 現在表示されている投稿と同じタームに分類された投稿を取得
				$taxonomy_slug = 'hinmoku'; // タクソノミーのスラッグを指定
				$post_type_slug = 'blog'; // 投稿タイプのスラッグを指定
				
				$post_name = $post->post_name;


	
				$post_id = isset($post_id) ? $post_id : get_the_ID();
				$taxonomy_slug = isset($taxonomy_slug) ? $taxonomy_slug : 'area';

				$post_terms = wp_get_object_terms($post_id, $taxonomy_slug);
								
				
		
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
				
				
				$kaitori_area_parent_id = $kaitori_area_parent_id ?? 0;

				if($kaitori_area_parent_id):
					$blog_slug = get_post($kaitori_area_parent_id)->post_name;
				endif;
				
				
				

				//追加
				if( isset($currnet_terms_slug) == false){

					$current_terms_slug[] = $post_terms[0]->slug; // タームのスラッグを配列に追加

				}

				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				
				
				
				
				/*
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
				

				endif;


				$the_query = new WP_Query($args);
				
				if($the_query->have_posts()){
				

				}
	

				
			*/
			
			

global $wpdb;


$offset = $offset ?? 0;


$query = $wpdb->prepare("
SELECT p.*
FROM {$wpdb->posts} p
LEFT JOIN {$wpdb->term_relationships} tr ON p.ID = tr.object_id
LEFT JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
LEFT JOIN {$wpdb->terms} t ON tt.term_id = t.term_id
LEFT JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id AND pm.meta_key = '買取査定ポイント'
WHERE p.post_type = %s
AND p.post_status = 'publish'
AND tt.taxonomy = %s
AND t.slug = %s
AND (
    (pm.meta_value IS NULL OR pm.meta_value NOT LIKE '%%はがき%%')
    AND (pm.meta_value IS NULL OR pm.meta_value NOT LIKE '%%ハガキ%%')
    AND (pm.meta_value IS NULL OR pm.meta_value NOT LIKE '%%葉書%%')
)
AND (
    p.post_title NOT LIKE '%%はがき%%'
    AND p.post_title NOT LIKE '%%ハガキ%%'
    AND p.post_title NOT LIKE '%%葉書%%'
)
ORDER BY p.post_date DESC
LIMIT 3
", $post_type_slug, $taxonomy_slug, $post_name, $offset, $posts_per_page);



$results = $wpdb->get_results($query);



				/*
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
						),

					);
				*/

	
				$count = 1;
				
			?>
			


			<section class="kaitori-blog">

				<div class="section-inner">

				<div class="point-title">

					<div class="point-title-inner d-f ai-c">
						<div class="point-kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/kaitori-kuma.png" alt="" ></div>
						<div class="only-sp">
							ジュエルカフェの<br><?php echo $post->post_title;?>買取ポイント
						</div>
					</div>
					
					<div class="point-bg">
						<p class="only-pc">ジュエルカフェの <?php echo $post->post_title;?>買取ポイント</p>
						<h2>〈毎日更新〉<?php the_title(); ?>の買取速報！<br>
						<?php echo display_filed('introduction_title2',get_the_title().'買取ならジュエルカフェが高い！'); ?></h2>
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
	
										
					<?php
					if ($results) {
						foreach ($results as $blog_result) {

		

					?>					
					
					
					<?php
						$hinmoku_terms = get_the_terms($blog_result->ID, 'hinmoku');
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

						$area_terms = get_the_terms( $blog_result->ID, 'area' );
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
						
						
						$image_alt_title = $blog_result->post_title;
						
						
						$alt_img_arr = explode('を',$blog_result->post_title);
						
						$alt_img_arr[1] = $alt_img_arr[1] ?? '';
						
						
						if($alt_img_arr[1] == ''){
							
							$alt_img = explode('お',$blog_result->post_title);

							if($alt_img[1] !== ''){
							
								$image_alt_title = $alt_img[0];
							
							}
							
						}else{
							
							$image_alt_title = $alt_img_arr[0];
							
						}
						
						
						$terms_area = get_the_terms($blog_result->ID,'area');

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
						<a href="<?php echo $blog_result->guid; ?>" class="blog-catch-img">
							<picture>
								<?php if($post_thumbnail = get_the_post_thumbnail_url( $blog_result->ID, 'full' )):?>
									<source type="image/webp" data-srcset="<?php echo $post_thumbnail;?>" srcset="<?php echo $post_thumbnail;?>">
									<img class="blog-detail-img ls-is-cached lazyloaded" src="<?php echo $post_thumbnail;?>" alt="blog画像 <?php echo $image_alt_title;?>" data-eio="p" data-src="<?php echo $post_thumbnail;?>" decoding="async">
								<?php else:?>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="">
								<?php endif;?>
							</picture>
						</a>
						
						<div class="right">
							<h3 class="blog-archive-ttl">
								<a href="<?php echo $blog_result->guid; ?>"><?php echo mb_convert_kana($blog_result->post_title, "rnas"); ?></a>
							</h3>
					
							<div class="blog-archive-date">公開日：<time itemprop="datePublished" datetime="<?php echo $blog_result->post_modified;?>"><?php echo substr($blog_result->post_date,0,10);?></time></div>
							<p class="blog-archive-point pc">
								<?php 
									if(trim(get_field('買取査定ポイント' , $blog_result->ID)) !== ''):
										the_field('買取査定ポイント' , $blog_result->ID);
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
								<li class="blog-archive-shop">
									<span class="sp-line">ジュエルカフェ&nbsp;</span><?php echo esc_html($grand_child_area_name);?>
								</li>
							</ul>
						</div>

            <div class="text_box sp">
              <input id="trigger<?php echo $count; ?>" class="trigger" type="checkbox">
              <p class="blog-archive-point">
                <?php 
                  if(trim(get_field('買取査定ポイント',$blog_result->ID)) !== ''):
                    the_field('買取査定ポイント',$blog_result->ID);
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
					


						}
					}

					?>

					</ul>
					
					<?php
					
					
						if( isset($news) && $news->post_count ){
					?>

					<div class="blog-archive-linkWrapper">
						<a href="/blog/" class="blog-archive-link">もっと見る</a>
					</div>
					<?php
						}
					?>



			<div class="d-b ta-c mb-40 mt-40">

				<a href="/blog/letter-top/" class="blog-archive-link">速報！切手の買取実績一覧</a>

			</div>


					</div>

				</section>


			</section>

	









		

<?php if(is_single('letter-top')):?>
	<section class="boro_vuitton letter">
			<div class="section-inner">
				<div class="point-title">
					<div class="point-title-inner d-f ai-c">
						<div class="point-kuma"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" alt="" data-src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" decoding="async" class=" ls-is-cached lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" alt=""  data-eio="l"></noscript></div>
						<div class="only-sp">ジュエルカフェの<br>切手買取ポイント</div>
					</div>
					<div class="point-bg">
						<p class="only-pc">ジュエルカフェの切手買取ポイント</p>
						<h2>こんな状態の切手でも査定いたします</h2>
					</div>
				</div>
			</div>
			<div class="bg letter">
				<div class="section-inner">
					<div class="naname_text_box letter"><p class="text">未使用切手なら、<br class="sp">どんな切手でもお持ちください!</p></div>
					<ul class="item_list">
						<li>
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_letter_item1.jpg" alt="切手シート大量" >
							<div class="text_box">
								<p class="">切手シート大量</p>
							</div>
						</li>
						<li>
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_letter_item2.jpg" alt="バラ切手少量">
							<div class="text_box">
								<p class="">バラ切手少量</p>
							</div>
						</li>
						<li>
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_letter_item3.jpg" alt="未整理でもOK" >
							<div class="text_box">
								<p class="">未整理でもOK</p>
							</div>
						</li>
						<li>
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_letter_item4.jpg" alt="色褪せ・破れ">
							<div class="text_box">
								<p class="">色褪せ・破れ</p>
							</div>
						</li>
					</ul>

				</div>
			</div>
	</section>

	<section class="kaitori-voice txtarea-js">
		<?php get_template_part( 'template-parts/kaitori-new-voice' );?>
		<p class="read-more"><span></span></p>
	</section>
<?php endif;?>



		




		
		<?php
		
			$custom_title = $custom_title ?? '';
		
			$example = [
			  'custom_title' => $custom_title,
			  'post_number' => '04',
			  'post_title' => $post->post_title,
			];
			
		?>
		<section class="kaitori-reason">
			<?php get_template_part( 'template-parts/kaitori-new-policy',null,$example );?>
		</section>



<?php if(!is_single('letter-top')):?>
		<section class="kaitori-purchase">
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
						<?php echo display_filed('introduction_title','他店と比べてください！'); ?><br>
						<h4><?php echo display_filed('introduction_title2',get_the_title().'買取ならジュエルカフェが高い！'); ?></h4>
					</div>
				</div>
				<p class="section-ttl-con lh-20 justify">
					<?php echo $purchase_desc;?>
				</p>			
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


		<?php get_template_part( 'template-parts/search-shop-new' );?>

		
			<section class="kaitori-kinds kaitori-kinds-feature letter-top">
				<div class="section-inner bold ta-c">
					<h2 class="section-ttl-main bold">切手の種類と特徴</h2>
				</div>
				<div class="section-inner">
					<h3 class="name">バラ切手</h3>
					<div class="flex">
						<div class="image"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC01445-1.jpg" alt="バラ切手"></div>
						<p class="text">バラ切手とは、シートやセットから1枚ずつばらばらに分けられた切手のことを指します。主に収集家や使用目的で購入されることが多く、特定の一枚だけが欲しい場合に便利です。また、バラ切手はシート切手に比べて取引価格が安いことがありますが、希少価値のある切手は一枚でも高価に取引されることがあります。</p>
					</div>

					<h3 class="name">切手シート</h3>
					<div class="flex">
						<div class="image"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/DSC01442-1.jpg" alt="切手シート"></div>
						<p class="text">切手シートとは、複数の切手が一枚の紙に印刷された状態のものを指します。シート全体が一つのデザインになっている場合もあり、収集家に人気です。切手シートは、未使用のまま保存されることが多く、そのままの形でコレクションすることで価値が保たれます。切手シートの状態や希少性によって、価値が大きく変動することがあります。</p>
					</div>
					<h3 class="name">プレミア切手</h3>
					<div class="flex">
						<div class="image"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/kit_0001_1-1.jpg" alt="プレミア切手"></div>
						<p class="text">プレミア切手とは、希少価値が高く、収集家の間で高値で取引される切手のことを指します。発行枚数が少ないものや、特定の歴史的な出来事に関連するもの、エラー切手などがプレミア切手として扱われます。これらの切手は、状態や保存状況によりその価値が大きく変わることがあります。コレクターにとっては非常に魅力的なアイテムです。</p>
					</div>
					<h3 class="name">特殊切手</h3>
					<div class="flex">
						<div class="image"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/special_stamp_thum.jpg" alt="特殊切手"></div>
						<p class="text">特殊切手とは、特定のテーマやデザインを持つ切手で、通常の郵便料金切手とは異なる特別な目的で発行されます。これには、自然、文化、スポーツなどをテーマにしたものや、特別な技術や素材を使用して作られたものが含まれます。特殊切手は収集家に人気があり、コレクションの一部として価値を持つことが多いです。</p>
					</div>
					<h3 class="name">ふるさと切手</h3>
					<div class="flex">
						<div class="image"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/kitte_furusato.jpg" alt="ふるさと切手"></div>
						<p class="text">ふるさと切手とは、日本の各地域の文化や自然、名所などをテーマにした切手で、地元の魅力を発信する目的で発行されます。地域ごとに異なるデザインが採用され、その土地ならではの特色が表現されています。ふるさと切手は、地元の人々や観光客、切手収集家に人気があり、コレクションの一部として価値があります。</p>
					</div>
					<h3 class="name">記念切手</h3>
					<div class="flex">
						<div class="image"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/kitte_kinen.jpg" alt="記念切手"></div>
						<p class="text">記念切手とは、特定の記念日やイベント、歴史的な出来事を祝うために発行される切手のことを指します。これには、国際的なイベントや国内の重要な出来事、著名な人物の誕生日などが含まれます。記念切手は、その時期限定で発行されるため、収集家にとっては貴重なアイテムとなります。また、美しいデザインが特徴で、コレクションとしても価値があります。</p>
					</div>
					<h3 class="name">中国切手</h3>
					<div class="flex">
						<div class="image"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/kitte_hinmoku.jpg" alt="中国切手"></div>
						<p class="text">中国切手とは、中国で発行される切手のことを指します。特に文化大革命期に発行された切手や、パンダ、兵馬俑など中国の文化や歴史をテーマにした切手は、国内外で高い人気を誇ります。中国切手は、希少性やデザインの美しさから収集家にとって非常に価値が高いものが多く、高額で取引されることもあります。</p>
					</div>
					<h3 class="name">年賀切手</h3>
					<div class="flex">
						<div class="image"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/newyear_stamp_thum.jpg" alt="年賀切手"></div>
						<p class="text">年賀切手とは、新年を祝うために毎年発行される特別な切手のことを指します。日本では、年賀状に使用されることが一般的で、その年の干支や新年にふさわしいデザインが特徴です。年賀切手は、季節限定で発行されるため収集家に人気があります。さらに、特定の年賀切手には抽選番号が付いており、景品が当たることもあるため、楽しみながら集めることができます。</p>
					</div>
				</div>
			</section>











		
		<section class="pink_bg">
			<div class="section-inner">
			
			

				<div class="point-title">

					<div class="point-title-inner d-f ai-c">
						<div class="point-kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/kaitori-kuma.png" alt="" ></div>
						<div class="only-sp">
							ジュエルカフェの<br><?php echo $post->post_title;?>買取ポイント
						</div>
					</div>
					
					<div class="point-bg">
						<p class="only-pc">ジュエルカフェの <?php echo $post->post_title;?>買取ポイント</p>
						
						<div>
						<?php

							echo display_filed('method_title','お店でも！宅配でも！'); 

						?>
						</div>
						
						
						<h2>
						<?php

							echo display_filed('method_title2',get_the_title().'買取で高く売るには'); 

						?>
						</h2>
					</div>
					
				</div>


			
			
				


				
			
				<div class="kaitori-inner-ways">
				<?php
				
					$voice = [
					  'custom_title' => $custom_title,
					  'kaitori_ways_field' => $singel_fields['高く売る方法'],
					];

					echo $singel_fields['高く売る方法'];

				?>
				</div>
					</div>
			
		</section>







			<section class="kaitori-kinds">

				<div class="section-inner bold ta-c">
				
					<h2 class="section-ttl-main bold"> 
					
						<?php

							echo display_filed('kinds_title',get_the_title().'なら<br class="only-sp">どんなものでもお持ちください !'); 

						?>
						
					</h2>
				
				</div>


				<div class="section-inner">
					<ul class="kaitori-kinds-list">


						<?php 
						
		
						if($post->post_parent === 0 || $kaitori_area_parent_id): //親ページ、または品目-都道府県ページの処理

							$current_hinmoku_term = get_the_terms( $post->ID, 'hinmoku' );
							if($kaitori_area_parent_id){
								$post_id = $kaitori_area_parent_id;
							}else{
								$post_id = $post->ID;
							}
							
	
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

									if(isset($type_display[0]) && $type_display[0] == '1'){continue;}
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

								if(!count(get_children($children_args)) && !$grand_child_terms_slug): //子ページかつ最下層の処理

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
									$type_display = get_field('type_display', get_the_ID());

									if( in_array($post->post_name , $city_arr) ){ continue; }


									if($type_display[0] == '1'){continue;}
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
									$type_display = get_field('type_display', get_the_ID());

									if($type_display[0] == '1'){continue;}
									
									if( in_array($post->post_name , $city_arr) ){ continue; }
									
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
								$args = array(
									'post_type' => 'kaitori',
									'posts_per_page' => -1,
									'post__not_in' => array($post->ID),
									'post_parent' => $wp_obj->post_parent,
									'no_found_rows' => true,
								);
								$the_query = new WP_Query($args); if($the_query->have_posts()):
								?>
								<?php while($the_query->have_posts()): $the_query->the_post();?>

								<?php
									$type_display = get_field('type_display', get_the_ID());

									if($type_display[0] == '1'){continue;}
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
		
		
		<div class="d-b ta-c mb-20 mt-20">

			<a href="https://jewel-cafe.jp/qa/" class="blog-archive-link">よくある質問一覧はこちら</a>

        </div>





<?php
$con=mysqli_connect("localhost", "xs931070_column", "KJhsadkJHKAS12d", "xs931070_newcolumn");


if(mysqli_connect_errno()){

	echo "Connection Fail".mysqli_connect_error();

}


//  カテゴリに関連付けられた投稿を取得
$category_id = $con->query("SELECT term_id FROM `wp_terms` WHERE slug = 'letter-top' ")->fetch_assoc()['term_id'];

if ($category_id) {
    // "tokei" カテゴリに属する投稿を取得
				$query = "SELECT p.* FROM `wp_posts` p
					INNER JOIN `wp_term_relationships` tr ON p.ID = tr.object_id
					WHERE tr.term_taxonomy_id = $category_id
					AND p.post_status = 'publish' AND p.post_type = 'post'
					ORDER BY p.post_modified DESC LIMIT 5";
	

		
		
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

								
									//$thumbnail_src = $con->query("SELECT * FROM `wp_posts` where ID = {$thumbnail_id}")->fetch_assoc()['guid'];
									
									$thumbnail_src = $con->query("SELECT * FROM `wp_posts` where ID = {$thumbnail_id}")->fetch_assoc()['guid'];
									
									
									echo '<td><img src="'.$thumbnail_src.'" alt="'.get_the_title().'" ></td>';
						
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
						
}
					?>
				</div>

				</div>

			</section>
			
			



			<div class="d-b ta-c mb-20 mt-20">

				<a href="https://jewel-cafe.jp/column/category/letter/" class="blog-archive-link"><?php the_title(); ?>のコラム一覧</a>

			</div>





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
		
		
		
		
		
			
<div class="section-inner d-f kaitori-how-to-inner mt-40">
  
  
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
		
			$howto_tips = [
			  'custom_title' => $custom_title,
			  'post_title' => $singel_fields['買取豆知識_タイトル'],
			  'sentense_kaitori_howto' => nl2br($singel_fields['買取豆知識_文章']),
			  'image_kaitori_howto' => $singel_fields['買取豆知識_画像'],
			];
			
		?>
		
		<section class="kaitori-howto-tips justify">
			<?php get_template_part( 'template-parts/kaitori-new-how-to-tips',null,$howto_tips );?>

		</section>
		


	
			
			<?php get_footer();?>

