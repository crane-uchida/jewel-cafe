<?php
/*
Template Name: 品目 店舗案内ページ
*/
?>

<?php get_header( );




$area_name = $post->post_title;




$parent_post_id = $post->post_parent;



if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/brand/vuitton/shop/') !== false) {

	$parent_post = get_post(4747);
	$parent_title = $parent_post->post_title;
	$parent_post_id = $parent_post->post_parent;

	

}else if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/tokei/rolex-top/shop/') !== false) {

	$parent_post = get_post(3288);
	$parent_title = $parent_post->post_title;
	$parent_post_id = $parent_post->post_parent;


}else{

	$parent_title = '';
	while ($parent_post_id) {

		$parent_post = get_post($parent_post_id);
		$parent_title = $parent_post->post_title;
		$parent_post_id = $parent_post->post_parent;

	}

}


?>


    <div class="main-section">
		<?php
			/*
		?>
      <div class="only-sp">
        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop-top-bnr.jpg" class="mb-12 " alt="来店予約&ROLEXお買取成立で¥20,000キャッシュバック">
      </div>
	  <?php
		*/
	  ?>
    </div>
	
	

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
		<?php kaitori_breadcrumb();?>
	</div>
</section>


    <div class="section-inner">
      <section>
        <h1 class="section-ja-title"><?php echo $area_name;?>の<?php echo $parent_title;?>買取ならジュエルカフェ</h1>
        <p><?php echo $post->post_title;?>で<?php echo $parent_title;?>を売るならジュエルカフェにお任せください。</p>
		<p>古いもの・傷のあるものでも1点から丁寧に査定いたします！</p>		
      </section>

      <section>
			<picture>
					<source media="(min-width: 961px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shop_mv_pc.png" class="w-100per mb-20 ">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shop_mv_sp.png" class="w-100per mb-20 " alt="ジュエルカフェの店頭買取はお客様人気NO.1 お電話で来店予約もご利用いただけます">
				</picture>
      </section>





<?php

			

			$page_url = $post->post_name;
			
			
			
			if( $page_url == 'okinawa' || $page_url == 'hokkaido' ){
			
				$shop_info_sql = "SELECT * FROM `wp_shop_admin` WHERE shop_city1 = '{$post->post_name}' limit 1";

			}else{
				
				$shop_info_sql = "SELECT * FROM `wp_shop_admin` WHERE shop_city2 = '{$post->post_name}' limit 1";
				
			}


			$result_shop = $wpdb->get_results($shop_info_sql);
			

			if(  isset($result_shop[0]) ){
		
				if( ($page_url == 'okinawa' || $page_url == 'hokkaido') ){
					
					$shop_info_sql2 = "SELECT * FROM `wp_shop_admin` WHERE shop_city1 = '{$result_shop[0]->shop_city1}' ";
					
				}else{
					
					$shop_info_sql2 = "SELECT * FROM `wp_shop_admin` WHERE shop_city2 = '{$result_shop[0]->shop_city2}' ";
					
				}
				
				$result_shop2 = $wpdb->get_results($shop_info_sql2);
			
			}

			
			

?>

			<section class="shop-area-city renew">

			<?php
			
							
							
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
				

			
				echo '<h2 class="shop-area-city-tll"><span>'.$area_name.'</span></h2>';
				
			?>


				<ul class="shop-area-city-list">
			
					<?php						
					
						if( isset($result_shop2) ){
					
						foreach( $result_shop2 as $v_shop2){
					?>


					<li class="shop-area-city-item">

<div class="area_info_box_wrap">
	<div class="area_info_box1">
		<h3 class="shop-name bold">
			<div class="area_kaitori">
				<?php
					if($v_shop2->shop_city1 == 'hokkaido' || $v_shop2->shop_city1 == 'okinawa'){
						echo replacePrefecturesName($v_shop2->shop_city1);
					}else{
						echo replacePrefecturesName($v_shop2->shop_city2);
					}
				?>
				- <?php echo $parent_title.'買取';?>
			</div>
			<div class="name">
				<a class="" href="/kaitori/<?php echo $topmost_parent->post_name;?>/shop/<?php echo $v_shop2->shop_city1;?><?php echo '/'.$v_shop2->shop_city2;?>/<?php echo $v_shop2->shop_url;?>/"><?php echo $v_shop2->shop_name;?></a>
			</div>
		</h3>
	</div>
	<div class="area_info_box2">
		<?php if( $v_shop2->shop_tel ):?>
			<a href="tel:<?php
				$tel = $v_shop2->shop_tel;
				$tel = str_replace(array('-', 'ー', '−', '―', '‐','(',')','（','）',' ','　'), '', $tel);
				echo $tel;
			?>" class="shop-tel bold color-red">TEL&nbsp;<?php echo $v_shop2->shop_tel; ?></a>
		<?php else:?>
			<div class="shop-tel bold color-red"><?php the_field('オープン時期');?></div>
		<?php endif;?>						
		<div class="shop-info">
			<div class="shop-address d-f"><?php echo $v_shop2->shop_add;?></div>
			<div class="shop-opening d-f">営業時間&nbsp;<?php echo $v_shop2->shop_time;?></div>
		</div>
		<?php /* ?>
			<?php if( $v_shop2->shop_about ):?>
				<div class="shop-att small-font-size"><?php echo $v_shop2->shop_about;?></div>
			<?php endif;?>
		<?php */ ?>
	</div>
</div>

<?php
	if( $parent_post->post_name == 'rolex-top' ){ $topmost_parent->post_name = 'tokei/rolex-top'; }else if( $parent_post->post_name == 'vuitton' ){ $topmost_parent->post_name = 'brand/vuitton'; }
?>
<div class="area_link_box ta-r">
	<a class="pos-r bold color-red shop-detail-btn" href="/kaitori/<?php echo $topmost_parent->post_name;?>/shop/<?php echo $v_shop2->shop_city1;?><?php echo '/'.$v_shop2->shop_city2;?>/<?php echo $v_shop2->shop_url;?>/"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/arrow.svg"></a>
</div>




</li>
	
<?php } } ?>


        </ul>
      </section>
	  



    <div class="section-inner mb-40">
      <?php get_template_part( 'template-parts/search-shop-new' );?>
    </div>


			<section class="kaitori-kinds more-btn-outer">

				<div class="section-inner bold ta-c">
					
					<h2 class="section-ja-title ta-c bold"> <?php echo $topmost_parent->post_title;?> 買取商品一覧</h2>
				
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
							
							
						
							$args = array(
								'post_type' => 'kaitori',
								'posts_per_page' => -1,
								'post_parent' => $topmost_parent_id,
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

									if(isset($type_display[0]) && $type_display[0] == '1' || get_the_ID() == 87115){continue;}
								
								?>



								<li>
									<a href="<?php the_permalink();?>">
										<div class="kaitori-kinds-img ta-c">
										
											<?php //the_post_thumbnail( 'full' );?>
											
											<?php
												$img_src = get_the_post_thumbnail_url();
												
												$img_src = str_replace('jewel-cafe.site','jewel-cafe.jp',$img_src);
											?>
											
											<img src="<?php echo $img_src;?>" alt="">
											
											
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
						
					</ul>
				</div>
				
				<div class="more-btn only-sp ta-c">
					<p class="open">もっと見る</p>
				</div>
				
				
			</section>






				<section class="purchase">
					<h2 class="section-ja-title ta-c"><?php echo $post->post_title; ?>の<br class="only-sp">買取商品一覧</h2>

					<?php get_template_part( 'template-parts/common-purchase-item' );?>

				</section>


			<?php get_template_part( 'template-parts/common-tab' );?>

    </div>







<?php /* パンくずリスト */ ?>
<?php
$url = get_permalink($post->ID);
$parsed_url = explode('/', $url);
$base_url1 = implode('/', array_slice($parsed_url, 0, 5)) . '/';
$base_url2 = implode('/', array_slice($parsed_url, 0, 6)) . '/';
$base_url3 = implode('/', array_slice($parsed_url, 0, 7)) . '/';
?>

<?php if(strpos(get_permalink($post->ID), 'tokei') !== false): //URLにtokeiが含まれている場合の処理 ?>
	<?php $category_parent = '時計';?>
<?php elseif(strpos(get_permalink($post->ID), 'brand') !== false): //URLにbrandが含まれている場合の処理 ?>
	<?php $category_parent = 'ブランド品';?>
<?php endif;?>

<?php if(strpos(get_permalink($post->ID), 'rolex-top') !== false || strpos($url, 'vuitton') !== false): //URLにrolex-topまたはvuittonが含まれている場合の処理 ?>

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
			"name": "<?php echo $category_parent;?>の買取",
			"item": "<?php echo $base_url1;?>"
		},{
			"@type": "ListItem",
			"position": 3,
			"name": "<?php echo $parent_title;?>の買取",
			"item": "<?php echo $base_url2;?>"
		},{
			"@type": "ListItem",
			"position": 4,
			"name": "<?php echo $parent_title;?>買取の店舗案内",
			"item": "<?php echo $base_url3;?>"
		},{
			"@type": "ListItem",
			"position": 5,
			"name": "<?php echo get_the_title($parent_id);?>の<?php echo $parent_title;?>買取"
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
			"name": "<?php echo $parent_title;?>の買取",
			"item": "<?php echo $base_url1;?>"
		},{
			"@type": "ListItem",
			"position": 3,
			"name": "<?php echo $parent_title;?>買取の店舗案内",
			"item": "<?php echo $base_url2;?>"
		},{
			"@type": "ListItem",
			"position": 4,
			"name": "<?php echo get_the_title($parent_id);?>の<?php echo $parent_title;?>買取"
		}]
		}
	</script>

<?php endif;?>



<?php /* WebPage */ ?>
<script type="application/ld+json">
	{
		"@context": "https://schema.org/",
		"@type": "WebPage",
		"@id": "<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
		"name": "<?php echo get_the_title($parent_id);?>の<?php echo $parent_title;?>買取ならジュエルカフェ",
		"datePublished": "2012-03-11",
		"dateModified": "<?php echo get_latest_shop_area_post_date( $post->post_name ); ?>",
		"publisher": {
			"@type": "Organization",
			"name": "株式会社クレイン",
			"url": "https://jewel-cafe.jp/company/"
		}
	}
</script>

<?php /* LocalBusiness */ ?>
<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "LocalBusiness",
		"@id": "<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
		"name": "<?php echo get_the_title($parent_id);?>の<?php echo $parent_title;?>買取ならジュエルカフェ",
		"image": "https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/static/shop_mv_sp.png",
		"url": "<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
		"sameAs": [
			"https://www.instagram.com/jewelcafe.jp",
			"https://twitter.com/Jewel_Cafe",
			"https://page.line.me/cob5096n"
		]
	}
</script> 


<?php get_footer( );?>