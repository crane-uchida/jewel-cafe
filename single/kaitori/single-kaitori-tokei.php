<?php
/*
Template Name: 品目子供ページ
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


<?php

	



	$custom_title = get_post( $post->ID )->post_title;
	$image_fv_pc = get_field('fv_image_pc');
	$image_fv_sp = get_field('fv_image_sp');
	$purchase_title = get_field('高価買取その1_タイトル');
	$purchase_desc = get_field('高価買取説明文');
	$kaitori_ways_field = get_field('高く売る方法');
	$title_kaitori_howto = get_field('買取豆知識_タイトル');
	$image_kaitori_howto = get_field('買取豆知識_画像');
	$sentense_kaitori_howto = get_field('買取豆知識_文章');



	$field = get_fields( $post->ID );

	if ( $field ) {
		foreach ( $field as $name => $value ) {

			$singel_fields[$name] = $value;

		}
	}
	
	$singel_fields['post_id'] = $post->ID;
	
	$singel_fields['custom_title'] = get_post( $post->ID )->post_title;



	  $parent_id = $post->post_parent; // 親ページのIDを取得
	  
	  $parent_slug = get_post($parent_id)->post_name; 

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

<?php
	$parent_id = $post->post_parent;
	$slug = get_post($post->ID)->post_name;
	$parent_slug = get_post($parent_id)->post_name;
?>

<?php if(!is_single('rolex-top') && $parent_slug != 'rolex-top'):?>
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
<?php endif;?>



<?php if(is_single('rolex-top') || $parent_slug == 'rolex-top'):?>	
	<section class="mv">
		<div class="contents">
			<div class="image-wrap">
				<picture>
					<source srcset="<?php echo esc_url(get_field('fv_image_sp')['url']);?>" media="(max-width: 1000px)" type="image/jpg">
					<img src="<?php echo esc_url(get_field('fv_image_pc')['url']);?>" alt="ロレックス買取">
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






	
		
		<?php
			
			$price1 = get_field('相場比較画像1');
		
			if( isset($price1['id']) && trim($price1['id']) !== '' ){
		
		?>
		<section class="kaitori-market-price mb-20">
		
		<div class="section-inner">

			<div class="point-title">

				<div class="point-title-inner d-f ai-c">
					<div class="point-kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/kaitori-kuma.png" alt="" ></div>
					<div class="only-sp">
						<h2>
							
							<?php echo $post->post_title;?>モデル別<br>買取価格一覧表
						</h2>
					</div>
				</div>
				
				<div class="point-bg">
					<p class="only-pc"><?php echo $post->post_title;?>モデル別買取価格一覧表</p>
					
					<h2>
							<?php echo $post->post_title;?>は今が売りどき！<br>
							<?php echo $post->post_title;?>買取相場が高騰しています！</h2>
				</div>
				
			</div>

		</div>
			<div class="section-inner">
				<?php

					if( get_field('is_show') ){
						get_template_part( 'template-parts/new-price-tokei' );
					}

				?>
			</div>
		</section>
	
	<?php
	
		}
	
	?>
	


		<section class="section-inner kaitori-search-model" id="kaitori-search-model">
		
			<?php get_template_part( 'template-parts/search-new-watch' );?>
			
		</section>







	<!--相場表!-->

<?php
	/*
?>
	<section class="kaitori-accordion">
		<?php 
			get_template_part( 'template-parts/tokei-one-price-accordion' );
		?>
	</section>



<?php if ( is_single('rolex-top') ): ?>
	<div class="section-inner mb-40">
		<div class="condition-wrap">
			<section class="condition">
			<h3>未使用品について</h3>
			<ul>
					<li>最新の保証書に記載された購入日が【1ヶ月以内】であること</li>
					<li>箱・保証書・付属品がすべて揃っていること</li>
					<li>実物を拝見したうえで、当社基準により「未使用」と判断できる状態であること</li>
			</ul>
			<p class="mt-12" style="font-size:11px;">※保証書の日付が1ヶ月を超えている場合でも、査定は可能です。お気軽にご相談ください。</p>
			</section>

			<section class="condition">
			<h3>中古品について</h3>
			<ul>
					<li>保証書が未記入ではなく、かつ最新の保証書の日付が【6ヶ月以内】であること（※一部モデルを除く）</li>
					<li>箱および保証書が付属していること（その他の付属品も年式相応に揃っている状態）</li>
					<li>ガラス、ケース、ブレスレット等に目立つキズや打痕がないこと</li>
					<li>バックルおよびリューズに破損がなく、正常に動作する状態であること</li>
					<li>ブレスレットのコマがすべて揃っていること</li>
			</ul>
			<p class="mt-12" style="font-size:11px;">※上記条件に該当しない場合でも、状態やモデルによっては高価買取が可能です。まずはお気軽にお問い合わせください。<br>※掲載相場は市場動向により変動するため、掲載価格と実際の査定額に差が生じる場合がございます。あらかじめご了承ください。</p>
			</section>
		</div>
	</div>
<?php endif; 
*/
?>




			<section class="kaitori-kinds">

				<div class="section-inner bold ta-c">
<?php
							$args = array(
								'post_type'      => 'kaitori',
								'post_parent'    => get_the_ID(),
								'post_status'    => 'any',
								'posts_per_page' => -1
							);
							$q = new WP_Query($args);

							if ($q->have_posts()) {
?>				
				
					<h2 class="section-ttl-main bold"> <?php echo $post->post_title;?>買取モデル</h2>
<?php

	}
	wp_reset_postdata();

?>

				
				
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
							
						
						$kaitori_area_parent_id = $kaitori_area_parent_id ?? null;
							
						if($post->post_parent === 0 || $kaitori_area_parent_id): //親ページ、または品目-都道府県ページの処理

							$current_hinmoku_term = get_the_terms( $post->ID, 'hinmoku' );
							if($kaitori_area_parent_id){
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

									if($type_display[0] == '1' || $post->post_name == 'souba'){continue;}
								?>


								<li>
									<a href="<?php the_permalink();?>">
										<div class="kaitori-kinds-img ta-c">
											<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="<?php echo get_the_title();?>買取"  />
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3><?php the_title();?>買取</h3>
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

								if( isset($grand_child_terms_slug) && !count(get_children($children_args)) && !$grand_child_terms_slug): //子ページかつ最下層の処理

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

									if($type_display[0] == '1' || $post->post_name == 'souba'){continue;}
								?>

									<?php
										$thumb = get_the_post_thumbnail($post->ID,'full');

										if(trim($thumb) !==''){
									?>

									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-img ta-c">
												<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="<?php echo get_the_title();?>買取"  />
											</div>
											<div class="kaitori-kinds-label ta-c">
												<h3><?php the_title();?>買取</h3>
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
								
								
									$type_display = get_field('type_display', get_the_ID());

									if(isset($type_display[0]) && $type_display[0] == '1'){continue;}
									
									if($post->post_name == 'souba'){continue;}
								?>


									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-img ta-c"><?php ?>
											
												<?php //the_post_thumbnail( 'full' );?>
												
												<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="<?php echo get_the_title();?>買取"  />
											</div>
											<div class="kaitori-kinds-label ta-c">
												<h3><?php the_title();?>買取</h3>
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
								
								$post_id = isset($post->ID) ? $post->ID : 0;
								$post_parent = (isset($wp_obj) && isset($wp_obj->post_parent)) ? $wp_obj->post_parent : 0;

								if( $post_parent > 0 ){

								$args = array(
									'post_type'      => 'kaitori',
									'posts_per_page' => -1,
									'post__not_in'   => array($post_id),
									'post_parent'    => $post_parent,
									'no_found_rows'  => true,
								);
					
								$the_query = new WP_Query($args); if($the_query->have_posts()):
								?>
								<?php while($the_query->have_posts()): $the_query->the_post();?>

								<?php
									$type_display = get_field('type_display', get_the_ID());

									if(isset($type_display[0]) && $type_display[0] == '1'){continue;}
									
									if($post->post_name == 'souba'){continue;}
								?>
									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-img ta-c">
												<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="<?php echo get_the_title();?>買取"  />
											</div>
											<div class="kaitori-kinds-label ta-c">
												<h3><?php the_title();?>買取</h3>
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
/*
$parent_id = $post->post_parent;
$slug = get_post($post->ID)->post_name;
$parent_slug = get_post($parent_id)->post_name;
?>
<?php if($parent_slug == 'rolex-top' ):?>	

	<section class="rolex-model">
		<div class="common-ttl">
			<div class="section-inner">
				<h2 class="common-ttl-main">ロレックスの買取強化モデル一覧</h2>
				<div class="common-ttl-en">ROLEX MODEL</div>
			</div>
		</div>
		<div class="primary section-inner">
			<ul class="flex">
				<li>
					<a href="<?php echo esc_url(home_url('/kaitori/tokei/rolex-top/daytona/')); ?>">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rolex_daytona.jpg" alt="デイトナ買取">
						<h3 class="text">デイトナ<br class="only-sp">買取</h3>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url(home_url('/kaitori/tokei/rolex-top/datejust/')); ?>">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rolex_datejust_b.jpg" alt="デイトジャスト買取">
						<h3 class="text">デイトジャスト<br class="only-sp">買取</h3>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url(home_url('/kaitori/tokei/rolex-top/yacht-master/')); ?>">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rolex_yacht.jpg" alt="ヨットマスター買取">
						<h3 class="text">ヨットマスター<br class="only-sp">買取</h3>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url(home_url('/kaitori/tokei/rolex-top/submariner/')); ?>">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rolex_submariner.jpg" alt="サブマリーナ買取">
						<h3 class="text">サブマリーナ<br class="only-sp">買取</h3>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url(home_url('/kaitori/tokei/rolex-top/daydate/')); ?>">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rolex_daydate.jpg" alt="デイデイト買取">
						<h3 class="text">デイデイト<br class="only-sp">買取</h3>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url(home_url('/kaitori/tokei/rolex-top/explorer/')); ?>">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rolex_explorer.jpg" alt="エクスプローラー買取">
						<h3 class="text">エクスプローラー<br class="only-sp">買取</h3>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url(home_url('/kaitori/tokei/rolex-top/explorer2/')); ?>">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rolex_explorerII.jpg" alt="エクスプローラーII買取">
						<h3 class="text">エクスプローラーII<br class="only-sp">買取</h3>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url(home_url('/kaitori/tokei/rolex-top/gmt-master/')); ?>">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rolex_gmt.jpg" alt="GMTマスター買取">
						<h3 class="text">GMTマスター<br class="only-sp">買取</h3>
					</a>
				</li>
			</ul>
		</div>
	</section>

<?php endif;
*/
?>









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
				
				

				if($kaitori_area_parent_id):
					$blog_slug = get_post($kaitori_area_parent_id)->post_name;
				endif;
				
				
				

				//追加
				if( isset($currnet_terms_slug) == false && isset($post_terms[0])){

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
	












		<div class="section-inner mt-52">
			<div class="point-title">
				<div class="point-title-inner d-f ai-c">
					<div class="point-kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/kaitori-kuma.png" alt="" ></div>
					<div class="only-sp">ジュエルカフェの<br><?php echo $post->post_title;?>買取ポイント</div>
				</div>
				<div class="point-bg">
					<p class="only-pc">ジュエルカフェの<?php echo $post->post_title;?>買取ポイント</p>
					<h2>〈毎日更新〉<?php the_title(); ?>の買取実績！<br>全国のジュエルカフェで高額査定中！</h2>
				</div>
			</div>
			<p class="section-ttl-con lh-20 justify">全国のジュエルカフェにて毎日数千件お買取させていただく<?php echo $post->post_title;?>商品をご紹介します。<br><?php echo $post->post_title;?>のお買取でしたら、新品はもちろんのこと、古いもの・汚れのあるもの、どんなものでも丁寧に査定させていただきます。売れるかどうか不安でしたらまずはお気軽にお問い合わせください。</p>
		</div>		
		
		
		




				<div class="section-inner">
	
					<ul class="blog-archive-list mb-0">
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
						
						if(isset($alt_img_arr[1]) && $alt_img_arr[1] == ''){
							
							$alt_img = explode('お',$post->post_title);

							if(isset($alt_img_arr[1]) && $alt_img[1] !== ''){
							
								$image_alt_title = $alt_img[0];
							
							}
							
						}else{
							
							$image_alt_title = $alt_img_arr[0];
							
						}
						
												
						$terms_area = get_the_terms($post->ID,'area');

						if(is_array($terms_area)){

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
						
						}

						$current_shop_url = esc_url(home_url( '/shop/'.$parent_area_slug.'/'.$child_area_slug.'/'.$grand_child_area_slug ));



						?>
						
						<li>
						<a href="<?php the_permalink() ?>" class="blog-catch-img">
							<picture>
								<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
									<source type="image/webp" data-srcset="<?php echo $post_thumbnail;?>" srcset="<?php echo $post_thumbnail;?>">
									<img class="blog-detail-img ls-is-cached lazyloaded" src="<?php echo $post_thumbnail;?>" alt="blog画像 <?php echo $image_alt_title;?>" data-eio="p" data-src="<?php echo $post_thumbnail;?>" decoding="async">
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

		<?php
			}
		?>


		
		<div class="d-b ta-c mb-40 mt-40">

			<a href="https://jewel-cafe.jp/blog/rolex-top/" class="blog-archive-link">速報！<?php echo get_the_title();?>の買取実績一覧</a>

		</div>





		<section class="">
	
			<?php
				$top_banner = get_field('top-banner');

				$top_banner_sp = get_field('top-banner_sp');
				
			?>
	
			<div class="main-banner">
				<div class="only-pc">
					<?php if(!empty($top_banner['url'])):?>
					<img src="<?php echo esc_url($top_banner['url']);?>" alt="来店予約で<?php echo $post->post_title;?>買取成約のお客様に20000円キャッシュバックキャンペーン" >
					<?php endif;?>
				</div>
				<div class="only-sp">
					<?php if(!empty($top_banner_sp['url'])):?>
					<img src="<?php echo esc_url($top_banner_sp['url']);?>" alt="来店予約で<?php echo $post->post_title;?>買取成約のお客様に20000円キャッシュバックキャンペーン" >
					<?php endif;?>
				</div>
			</div>

		</section>







		
		
	<?php
		
		if($parent_slug == 'rolex-top' || $post->post_name == 'rolex-top'){
		
	?>	
	<section class="kaitori-boroboro gray_bg mt-20">
		
		
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
						<?php echo $post->post_title;?>なら訳アリ・中古や古いモデルも買取！
					</h2>
				</div>
				
			</div>

		</div>
				
		
		
		



		

			<?php
			
				$boroboro_banner = get_field('boroboro-banner');
				
				$boroboro_banner_sp = get_field('boroboro-banner_sp');
				
			?>
			
	
			<div class="main-banner">
				<div class="only-pc">
					<?php if(!empty($boroboro_banner['url'])):?>

					<div class="text-overlay-wrapper">
						<img src="<?php echo esc_url($boroboro_banner['url']);?>" alt="<?php echo $post->post_title;?>ならボロボロでもしっかり買取" >
						<div class="text-overlay">「絶対売れない」と思っていた</div>
						<div class="text-overlay2">ボロボロ<span>の</span>ロレックス</div>
					</div>

					<?php endif;?>
				</div>
				<div class="only-sp">
					<?php if(!empty($boroboro_banner_sp['url'])):?>
					<div class="text-overlay-wrapper">
						<img src="<?php echo esc_url($boroboro_banner_sp['url']);?>" alt="<?php echo $post->post_title;?>ならボロボロでもしっかり買取" >
						<div class="text-overlay">「絶対売れない」と<br>思っていた</div>
						<div class="text-overlay2">ボロボロ<span>の</span><br>ロレックス</div>
					</div>
					<?php endif;?>
				</div>
			</div>	
				

		<div class="section-inner">
		
			<p class="banner-ttl-con lh-20 justify">
				買取専門店ジュエルカフェでは「壊れた」「ボロボロな」「動かない」「古い」「ジャンクな」ロレックス（ROLEX）腕時計を高価買取しています！<br>
				世界各地への物流ルートを持ち、毎日多数のロレックスを買取実績を誇るジュエルカフェなら「壊れた」ロレックスでもプロスタッフがしっかり査定！驚きの価格をご提示いたします。
			</p>

		</div>
	
	</section>

	
	<?php
		}
	?>
















<?php /* ?><?php */ ?>














<?php


 if(is_single('rolex-top') || $parent_slug == 'rolex-top'):?>
	<section class="kaitori-voice txtarea-js">
		<?php get_template_part( 'template-parts/kaitori-new-voice' );?>
		<p class="read-more"><span></span></p>
	</section>
<?php endif;?>

		
		






		
		<?php
		
			$example = [
			  'custom_title' => $custom_title,
			  'post_title' => $post->post_title,
			];
			
		?>
		<section class="kaitori-reason">
			<?php get_template_part( 'template-parts/kaitori-new-policy',null,$example );?>
		</section>




<?php if ( current_user_can('administrator') ): ?>
<?php if(is_single('rolex-top')):?>
<section class="appraiser">
<div class="section-inner">

<?php
	$texts = [
		'title' => 'ジュエルカフェの<br class="sp">〈 ロレックス買取 〉<br class="sp">査定士紹介',
		'name' => '原田査定士',
		'image' => 'appraiser',
		'hinmoku' => '時計',
		'brand' => 'チューダー',
		'hobby' => 'カラオケ・旅行',
		'voice' => 'ジュエルカフェでは、多様なお品物を取り扱う中で、お客様に安心してご利用いただけることを第一に考えております。査定士として知識や技術の習得に尽力するのはもちろんですが、同時にお品物ひとつひとつに込められた背景や価値を探ることを大切にしています。<br>お客様に安心して査定をお任せいただける存在を目指し、ご納得いただける確かな査定額をご案内することが私達の使命です。ご来店いただいた時間の中で、できる限りの信頼関係を築き、お気持ちに寄り添ったサービスを提供できるよう努めてまいります。どうぞよろしくお願いいたします。
'
	];
?>

<?php /* ?><?php */ ?>
<!-- スマホ -->
<div class="contents sp">
	<div class="head">
		<div class="flex">
			<div class="image_box">
				<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/<?php echo $texts['image'];?>.jpg" alt="<?php echo $texts['name'];?>" />
			</div>
			<div class="text_box">
				<h2 class="title"><?php echo $texts['title'];?></h2>
				<div class="name"><?php echo $texts['name'];?></div>
			</div>
		</div>
	</div>
	<div class="primary">
		<dl>
			<dt>得意な商材</dt>
			<dd><?php echo $texts['hinmoku'];?></dd>
		</dl>
		<dl>
			<dt>好きなブランド</dt>
			<dd><?php echo $texts['brand'];?></dd>
		</dl>
		<dl>
			<dt>趣味</dt>
			<dd><?php echo $texts['hobby'];?></dd>
		</dl>
		<p class="voice"><?php echo $texts['voice'];?></p>
	</div>
</div>

<!-- PC -->
<div class="contents pc">
	<div class="head">
		<h2 class="title"><?php echo $texts['title'];?></h2>
	</div>
	<div class="image_box">
		<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/<?php echo $texts['image'];?>.jpg" alt="<?php echo $texts['name'];?>" />
	</div>
	<div class="flex">
		<div class="left_box">
			<div class="name"><?php echo $texts['name'];?></div>
			<dl>
				<dt>得意な商材</dt>
				<dd><?php echo $texts['hinmoku'];?></dd>
			</dl>
			<dl>
				<dt>好きなブランド</dt>
				<dd><?php echo $texts['brand'];?></dd>
			</dl>
			<dl>
				<dt>趣味</dt>
				<dd><?php echo $texts['hobby'];?></dd>
			</dl>
		</div>
		<div class="right_box">
			<p class="voice"><?php echo $texts['voice'];?></p>
		</div>
	</div>
</div>

</div>
</section>
<?php endif;?>
<?php endif; ?>















<?php if(!is_single('rolex-top')):?>
	<section class="kaitori-purchase">
		<?php
			$parent_slug = get_post($parent_id)->post_name;
			if($parent_slug !== 'rolex-top' ){
		?>
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
					<h3><?php echo $post->post_title;?>買取価格を他店と比較してください！</h3>
				</div>
			</div>
		</div>		
		<section class="ex-purchase">
			<div class="section-inner">
				<?php
					get_template_part( 'template-parts/new-ex-purchase' );
				?>
			</div>
		</section>

		<?php
			}
		?>
	</section>
<?php endif;?>





		


		<section class="kaitori-how-to-sell mt-60">

			<?php get_template_part( 'template-parts/kaitori-new-how-to-sell' );?>
			
		</section>
		
		
		
		
		
		<?php get_template_part( 'template-parts/search-shop-new' );?>
			
		







		<section class="pink_bg">
		
			
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
						<?php echo $post->post_title;?>高価買取のためのポイントは？
					</h2>
				</div>
				
			</div>

		</div>

			
			
	<div class="section-inner">
			
				
			
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


			
			






		<?php
			
			$kaitori_faq = [
			  'custom_title' => $custom_title,
			  'post_id' => $post->ID,
			];
			
		?>
		
		
		<section class="kaitori-faq more-btn-outer mt-40">
			<?php get_template_part( 'template-parts/kaitori-new-faq',null,$kaitori_faq );?>
			<div class="more-btn only-sp ta-c">
				<p class="open">もっと見る</p>
			</div>
		</section>
		
		
		
		











<?php if(is_single('rolex-top') || $parent_slug == 'rolex-top'):?>	
			<section class="kaitori-kinds mt-20">

					<div class="section-inner bold ta-c">
						<h2 class="section-ttl-main bold">買取強化中の腕時計ブランド一覧</h2>
					</div>

				<div class="section-inner">
					<ul class="kaitori-kinds-list">
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/rolex-top/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex_tokei.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex_tokei.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex_tokei.jpg" alt="ロレックス" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex_tokei.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rolex_tokei.jpg" alt="ロレックス" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>ロレックス</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/omega/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/omega_tokei.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/omega_tokei.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/omega_tokei.jpg" alt="オメガ" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/omega_tokei.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/omega_tokei.jpg" alt="オメガ" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>オメガ</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/cartier-watch/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/cartier_tokei.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/cartier_tokei.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/cartier_tokei.jpg" alt="カルティエ時計" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/cartier_tokei.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/cartier_tokei.jpg" alt="カルティエ時計" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>カルティエ時計</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/bulgari-watch/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/blugari_tokei.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/blugari_tokei.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/blugari_tokei.jpg" alt="ブルガリ時計" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/blugari_tokei.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/blugari_tokei.jpg" alt="ブルガリ時計" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>ブルガリ時計</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/franckmuller/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/franck_tokei.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/franck_tokei.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/franck_tokei.jpg" alt="フランクミュラー" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/franck_tokei.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/franck_tokei.jpg" alt="フランクミュラー" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>フランクミュラー</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/vacheron/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/vacheron_tokei.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/vacheron_tokei.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/vacheron_tokei.jpg" alt="ヴァシュロン" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/vacheron_tokei.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/vacheron_tokei.jpg" alt="ヴァシュロン" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>ヴァシュロン</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/patek/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/patek.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/patek.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/patek.jpg" alt="パテックフィリップ" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/patek.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/patek.jpg" alt="パテックフィリップ" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>パテックフィリップ</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/panerai/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/panerai_tokei.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/panerai_tokei.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/panerai_tokei.jpg" alt="パネライ" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/panerai_tokei.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/panerai_tokei.jpg" alt="パネライ" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>パネライ</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/piguet/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/ap_tokei.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/ap_tokei.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/ap_tokei.jpg" alt="オーデマピゲ" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/ap_tokei.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/ap_tokei.jpg" alt="オーデマピゲ" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>オーデマピゲ</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/iwc/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/iwc_tokei.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/iwc_tokei.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/iwc_tokei.jpg" alt="IWC" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/iwc_tokei.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/iwc_tokei.jpg" alt="IWC" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>IWC</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/hublot/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/hublot_tokei.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/hublot_tokei.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/hublot_tokei.jpg" alt="ウブロ" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/hublot_tokei.jpg" decoding="async" class=" ls-is-cached lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/hublot_tokei.jpg" alt="ウブロ" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>ウブロ</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/tagheuer/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/tag_tokei.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/tag_tokei.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/tag_tokei.jpg" alt="タグホイヤー" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/tag_tokei.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/tag_tokei.jpg" alt="タグホイヤー" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>タグホイヤー</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/jaegerlecoultre/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/jl_tokei.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/jl_tokei.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/jl_tokei.jpg" alt="ジャガールクルト" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/jl_tokei.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/jl_tokei.jpg" alt="ジャガールクルト" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>ジャガールクルト</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/breitling/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/breitling_tokei.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/breitling_tokei.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/breitling_tokei.jpg" alt="ブライトリング" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/breitling_tokei.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/breitling_tokei.jpg" alt="ブライトリング" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>ブライトリング</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/alange-soehne/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/als_tokei.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/als_tokei.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/als_tokei.jpg" alt="ランゲ&amp;ゾーネ" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/als_tokei.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/als_tokei.jpg" alt="ランゲ&#038;ゾーネ" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>ランゲ&amp;ゾーネ</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/chanel-watch/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/chanel_tokei-1.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/chanel_tokei-1.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/chanel_tokei-1.jpg" alt="シャネル時計" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/chanel_tokei-1.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/chanel_tokei-1.jpg" alt="シャネル時計" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>シャネル時計</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/hermes-watch/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/hermes_tokei-1.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/hermes_tokei-1.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/hermes_tokei-1.jpg" alt="エルメス時計" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/hermes_tokei-1.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/hermes_tokei-1.jpg" alt="エルメス時計" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>エルメス時計</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/seiko/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/seiko_tokei-1.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/seiko_tokei-1.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/seiko_tokei-1.jpg" alt="セイコー" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/seiko_tokei-1.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/seiko_tokei-1.jpg" alt="セイコー" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>セイコー</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/rogerdubuis/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/rd_tokei-1.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/rd_tokei-1.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rd_tokei-1.jpg" alt="ロジェ・デュブイ" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rd_tokei-1.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/rd_tokei-1.jpg" alt="ロジェ・デュブイ" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>ロジェ・デュブイ</h3>
										</div>
									</a>
								</li>
								<li>
									<a href="https://jewel-cafe.jp/kaitori/tokei/breguet/">
										<div class="kaitori-kinds-img ta-c">
											<picture><source type="image/webp" data-srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/breguet_tokei-1.jpg.webp" srcset="https://jewel-cafe.jp/wp-content/uploads/2021/07/breguet_tokei-1.jpg.webp"><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/breguet_tokei-1.jpg" alt="ブレゲ" data-eio="p" data-src="https://jewel-cafe.jp/wp-content/uploads/2021/07/breguet_tokei-1.jpg" decoding="async" class=" lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/uploads/2021/07/breguet_tokei-1.jpg" alt="ブレゲ" data-eio="l" /></noscript></picture>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3>ブレゲ</h3>
										</div>
									</a>
								</li>
							</ul>
				</div>
			</section>
<?php endif;?>











			

		




<?php
$con=mysqli_connect("localhost", "xs931070_column", "KJhsadkJHKAS12d", "xs931070_newcolumn");


if(mysqli_connect_errno()){

	echo "Connection Fail".mysqli_connect_error();

}


$column_cate = 'tokei';

if($post_name == 'gmt-master' || $post_name == 'explorer'	|| $post_name == 'submariner' || $post_name == 'sky-dweller' || $post_name == 'daytona' || $post_name =='yacht-master' ){

	$column_cate = 'rolex-'.$post_name;

}




//  カテゴリに関連付けられた投稿を取得
$category_id = null;

$slug = $con->real_escape_string($post->post_name);
$result = $con->query("SELECT term_id FROM wp_terms WHERE slug = '{$slug}' LIMIT 1");

if ($result && ($row = $result->fetch_assoc())) {
    $category_id = (int)$row['term_id'];
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

	
				<div class="more-btn only-sp ta-c">
					<p class="open">もっと見る</p>
				</div>

			</section>
			
			
			
			</section>
	
	
	

		<?php
			/*
		?>
			<div class="section-inner">
				<div class="search-shop" data-uniq-id="609bb70d69166">
					<?php get_template_part( 'template-parts/search-shop' );?>
				</div>
			</div>
		<?php
			*/
		?>



		










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
		
		
		
		
		<?php //get_template_part( 'template-parts/common-tab' );?>








	<?php get_footer();?>