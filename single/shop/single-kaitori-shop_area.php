<?php
/*
Template Name: 品目店舗一覧
*/
?>

<?php get_header( );?>


<?php

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



$parent_slug = get_post($post->post_parent)->post_name;






							
$parent_id = wp_get_post_parent_id($post->ID); // 현재 포스트의 부모 ID를 가져옵니다.

if ($parent_id == 0) {
	// 부모가 없으면 현재 포스트가 최상위 부모입니다.
	$topmost_parent_id = $post->ID;
} else {
	// 부모가 있으면 최상위 부모를 찾습니다.
	while ($parent_id) {
		$post_id = $parent_id;
		$parent_id = wp_get_post_parent_id($post_id);
	}
	$topmost_parent_id = $post_id;
}


$topmost_parent = get_post($topmost_parent_id);


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


<div class="wrap-inner blog">




    <div class="section-inner">
      <section>
		<h1 class="section-ja-title"><?php echo $post->post_title;?>の<?php echo $parent_title;?>買取ならジュエルカフェ</h1>
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

				

				$current_term_name = $post->post_title;
				
				$current_term_slug = $post->post_name;

				
				
			?>
			<?php if($parent_slug == 'shop'):?>
			<section class="shop-area">
			<?php else:?>
			<section class="shop-area-city">
			<?php endif;?>
			
        <?php
				if($parent_slug == 'shop'){
					echo '<h3 class="ttl-box-red">'.$post->name .'エリア</h3>';
				} else {
					echo '<h3 class="shop-area-city-tll"><span>'.$post->name.'</span></h3>';
				}
				;?>

	
				
		<?php if($parent_slug == 'shop'):?>
		
		
        <ul class="shop-area-list">
				<?php else:?>
				<ul class="shop-area-city-list">
				<?php endif;?>

					<?php //親エリアページの場合
						if($parent_slug == 'shop'):?>

						<?php if($current_term_slug === 'hokkaido'):?>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/hokkaido/douou' ));?>">道央</a></li>
						<?php elseif($current_term_slug === 'tohoku'):?>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/tohoku/aomori' ));?>">青森県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/tohoku/iwate' ));?>">岩手県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/tohoku/miyagi' ));?>">宮城県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/tohoku/akita' ));?>">秋田県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/tohoku/yamagata' ));?>">山形県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/tohoku/fukushima' ));?>">福島県</a></li>
						<?php elseif($current_term_slug === 'kanto'):?>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kanto/tokyo' ));?>">東京都</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kanto/kanagawa' ));?>">神奈川県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kanto/saitama' ));?>">埼玉県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kanto/chiba' ));?>">千葉県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kanto/ibaraki' ));?>">茨城県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kanto/gunma' ));?>">群馬県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kanto/tochigi' ));?>">栃木県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kanto/yamanashi' ));?>">山梨県</a></li>
						<?php elseif($current_term_slug === 'chubu'):?>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/chubu/aichi' ));?>">愛知県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/chubu/gifu' ));?>">岐阜県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/chubu/nagano' ));?>">長野県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/chubu/shizuoka' ));?>">静岡県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/chubu/mie' ));?>">三重県</a></li>
						<?php elseif($current_term_slug === 'hokuriku'):?>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/hokuriku/niigata' ));?>">新潟県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/hokuriku/toyama' ));?>">富山県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/hokuriku/ishikawa' ));?>">石川県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/hokuriku/fukui' ));?>">福井県</a></li>
						<?php elseif($current_term_slug === 'kansai'):?>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kansai/osaka' ));?>">大阪府</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kansai/hyogo' ));?>">兵庫県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kansai/kyoto' ));?>">京都府</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kansai/shiga' ));?>">滋賀県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kansai/nara' ));?>">奈良県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kansai/wakayama' ));?>">和歌山県</a></li>
						<?php elseif($current_term_slug === 'chugoku'):?>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/chugoku/okayama' ));?>">岡山県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/chugoku/hiroshima' ));?>">広島県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/chugoku/yamaguchi' ));?>">山口県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/chugoku/tottori' ));?>">鳥取県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/chugoku/shimane' ));?>">島根県</a></li>
						<?php elseif($current_term_slug === 'shikoku'):?>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/shikoku/tokushima' ));?>">徳島県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/shikoku/kagawa' ));?>">香川県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/shikoku/ehime' ));?>">愛媛県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/shikoku/kouchi' ));?>">高知県</a></li>
						<?php elseif($current_term_slug === 'kyusyu'):?>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kyusyu/fukuoka' ));?>">福岡県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kyusyu/saga' ));?>">佐賀県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kyusyu/nagasaki' ));?>">長崎県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kyusyu/kumamoto' ));?>">熊本県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kyusyu/oita' ));?>">大分県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kyusyu/miyazaki' ));?>">宮崎県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'/shop/kyusyu/kagoshima' ));?>">鹿児島県</a></li>
						<?php elseif($current_term_slug === 'okinawa'):?>
							<li><a href="<?php echo esc_url(home_url( '/kaitori/'.$topmost_parent->post_name.'shop/okinawa/honto' ));?>">沖縄本島</a></li>
						<?php endif;?>

					<?php else:?>




<?php

			

			$page_url = $post->post_name;
			
			
			
			if( $page_url == 'okinawa' || $page_url == 'hokkaido' ){
			
				$shop_info_sql = "SELECT * FROM `wp_shop_admin` WHERE shop_city1 = '{$post->post_name}' limit 1";

			}else{
				
				$shop_info_sql = "SELECT * FROM `wp_shop_admin` WHERE shop_city2 = '{$post->post_name}' limit 1";
				
			}


			$result_shop = $wpdb->get_results($shop_info_sql);
			
			
			if( $page_url == 'okinawa' || $page_url == 'hokkaido' ){
				
				$shop_info_sql2 = "SELECT * FROM `wp_shop_admin` WHERE shop_city1 = '{$result_shop[0]->shop_city1}' ";
				
			}else{
				
				$shop_info_sql2 = "SELECT * FROM `wp_shop_admin` WHERE shop_city2 = '{$result_shop[0]->shop_city2}' ";
				
			}

			$result_shop2 = $wpdb->get_results($shop_info_sql2);
			

?>


			<?php							
							
				$parent_id = wp_get_post_parent_id($post->ID); // 현재 포스트의 부모 ID를 가져옵니다.

				if ($parent_id == 0) {
					// 부모가 없으면 현재 포스트가 최상위 부모입니다.
					$topmost_parent_id = $post->ID;
				} else {
					// 부모가 있으면 최상위 부모를 찾습니다.
					while ($parent_id) {
						$post_id = $parent_id;
						$parent_id = wp_get_post_parent_id($post_id);
					}
					$topmost_parent_id = $post_id;
				}


				$topmost_parent = get_post($topmost_parent_id);
				

			
				echo '<h2 class="shop-area-city-tll"><span>'.$area_name.'</span></h2>';
				
			?>


			
					<?php						
						foreach( $result_shop2 as $v_shop2){
					?>


					<li class="shop-area-city-item">
						<h3 class="shop-name bold">
						
							<?php
								
								if($v_shop2->shop_city1 == 'hokkaido' || $v_shop2->shop_city1 == 'okinawa'){
							
									echo replacePrefecturesName($v_shop2->shop_city1);
							
								}else{
							
									echo replacePrefecturesName($v_shop2->shop_city2);
									
								}
								
								
							?>			
							
							- <?php echo $parent_title.'買取';?>
							- <?php echo $v_shop2->shop_name;?>
						</h3>
							


							<?php if( $v_shop2->shop_tel ):?>
							
								<a href="tel:<?php
									$tel = $v_shop2->shop_tel;
									$tel = str_replace(array('-', 'ー', '−', '―', '‐','(',')','（','）',' ','　'), '', $tel);
									echo $tel;
								?>" class="shop-tel bold color-red"><?php echo $v_shop2->shop_tel; ?></a>
							<?php else:?>
								<div class="shop-tel bold color-red"><?php the_field('オープン時期');?></div>
							<?php endif;?>
							
							
            <div class="shop-info">
              <div class="shop-address d-f"><?php echo $v_shop2->shop_add;?></div>
              <div class="shop-opening d-f"><?php echo $v_shop2->shop_time;?></div>
            </div>
						<?php if( $v_shop2->shop_about ):?>
							<div class="shop-att small-font-size"><?php echo $v_shop2->shop_about;?></div>
						<?php endif;?>

						
				<div class="ta-r">
					<a class="pos-r bold color-red shop-detail-btn" href="/shop/<?php echo $v_shop2->shop_city1;?><?php echo '/'.$v_shop2->shop_city2;?>/<?php echo $v_shop2->shop_url;?>/">詳しくはこちら</a>
					
				</div>
			
          </li>
					
			<?php } ?>

   

					<?php endif;?>
        </ul>
      </section>

			<?php //子エリアページの場合
				if(isset($current_term) && $current_term->parent):?>
				<section>
					<h4 class="section-ja-title ta-c">査定無料！<br class="only-sp">お気軽にお問合せ下さい！</h4>
					<ul class="border-col-3 m-12">
						<li>
							<a href="<?php echo esc_url(home_url( 'shop-buy' ));?>" class="border-col-item d-b color-black">
								<div class="drawer-icon mb-4">
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/drawer-icon-01.svg" alt="">
								</div>店頭買取
							</a>
						</li>
						<li>
							<a href="<?php echo esc_url(home_url( 'delivery-buy' ));?>"  class="border-col-item d-b color-black">
								<div class="drawer-icon mb-4">
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/drawer-icon-02.svg" alt="">
								</div>宅配買取
							</a>
						</li>
						<li>
							<a href="<?php echo esc_url(home_url( 'trip-buy' ));?>" class="border-col-item d-b color-black">
								<div class="drawer-icon mb-4">
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/drawer-icon-03.svg" alt="">
								</div>出張買取
							</a>
						</li>
					</ul>
				</section>


				<section class="purchase">
					<h2 class="section-ja-title ta-c"><?php echo esc_html($current_term_name); ?>の<br class="only-sp">買取商品一覧</h2>

					<?php get_template_part( 'template-parts/common-purchase-item' );?>

				</section>
			<?php endif;?>

			<?php get_template_part( 'template-parts/common-tab' );?>

    </div>

</div>



<?php /* ?>このページはパンくずリスト構造化マークアップ不要！

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

<?php */ ?>










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