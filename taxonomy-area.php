<?php
/*
Template Name: 店舗案内ページ(地方 / 県)
*/
?>


<?php get_header( );?>



<?php

$page_url_arr = explode('/' , $_SERVER['REQUEST_URI']);

$page_url = $page_url_arr[count($page_url_arr)-2];



$city_arr = array(
			"hokkaido",
			"tohoku",
			"kanto",
			"chubu",
			"hokuriku",
			"kansai",
			"chugoku",
			"shikoku",
			"kyusyu",
			"aomori",
			"iwate",
			"miyagi",
			"akita",
			"yamagata",
			"fukushima",
			"ibaraki",
			"tochigi",
			"gunma",
			"saitama",
			"chiba",
			"tokyo",
			"kanagawa",
			"niigata",
			"toyama",
			"ishikawa",
			"fukui",
			"yamanashi",
			"nagano",
			"gifu",
			"shizuoka",
			"aichi",
			"mie",
			"shiga",
			"kyoto",
			"osaka",
			"hyogo",
			"nara",
			"wakayama",
			"tottori",
			"shimane",
			"okayama",
			"hiroshima",
			"yamaguchi",
			"tokushima",
			"kagawa",
			"ehime",
			"kouchi",
			"fukuoka",
			"saga",
			"nagasaki",
			"kumamoto",
			"oita",
			"miyazaki",
			"kagoshima",
			"okinawa",
			);
			


if( !in_array($page_url,$city_arr) ){

	$query = new WP_Query(array(
		'name'        => $page_url,
		'post_type'   => 'shop',
		'post_status' => 'publish',
		'post_parent' => 0,
		'posts_per_page' => 1
	));

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			


			$terms = get_the_terms(get_the_ID(), 'area');
			if (!empty($terms) && !is_wp_error($terms)) {
				foreach ($terms as $term) {
					
					if( $term->parent == 0){
						
						$parent_slug = $term->slug;
						
					}else{
						
						$child_slug = $term->slug;
						
					}
					
				}
				
				
				wp_redirect( "/shop/".$parent_slug.'/'.$child_slug.'/' . $post->post_name, 301 );
				
				exit;
				
				
			}


		}
	} 
		

	
}



?>


	<div id="page-top"></div>
		
		
		
	<?php
		/*
	?>	
    <div class="main-section">
      <div class="only-sp">
        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop-top-bnr.jpg" class="mb-12" alt="来店予約&ROLEXお買取成立で¥20,000キャッシュバック" >
      </div>
    </div>
	<?php
		*/
	?>
	

	
	<div class="breadcrumbs">
		<div class="section-inner">
			<a href="https://jewel-cafe.jp">高価買取ならジュエルカフェ<span></span></a>
			<br class="only-sp"><span>
			<?php

				$term = get_term_by('slug', $page_url, 'area');

				$city_arr = array(
					'tohoku',
					'kanto',
					'chubu',
					'hokuriku',
					'kansai',
					'chugoku',		
					'shikoku',
					'kyusyu',
				);
				
				$parent_term = get_term($term->parent, 'area');

				

				if (isset($term)) {

					echo '<a href="/shop/">店舗案内<span></span></a>';
					
	
					if ($term->parent) {

						if ($parent_term && ! in_array($parent_term->slug , $city_arr) ) {
							echo '<a href="/shop/'.$parent_term->slug.'/">'.$parent_term->name.'<span></span></a>';
						}
						
					}else{

						echo '<span>'.$term->name.'</span>';
						
					}
					

					if( isset($term->slug) && isset($parent_term->slug) ){
						echo '<a href="/shop/'.$parent_term->slug.'/'.$term->slug.'/">'.$term->name.'</a>';
					}
					
					
				}

			?>
			</span>
		</div>
	</div>
	





    <div class="section-inner">
      <section>
        <h2 class="section-ja-title">店舗案内</h2>
        <p>ジュエルカフェは業界最大級の全国300店舗</p>
      </section>

      <section>
			<picture>
					<source media="(min-width: 961px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shop_mv_pc.png" class="w-100per mb-20 ">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shop_mv_sp.png" class="w-100per mb-20 " alt="ジュエルカフェの店頭買取はお客様人気NO.1 お電話で来店予約もご利用いただけます">
				</picture>
      </section>

			<?php
				$current_term = get_queried_object(  );
				$current_term_slug = $current_term->slug;
				$current_term_id = $current_term->term_id;
				$current_term_name = $current_term->name;
			?>
			<?php if($current_term->parent === 0):?>
			<section class="shop-area">
			<?php else:?>
			<section class="shop-area-city renew">
			<?php endif;?>
        <?php
				if($current_term->parent === 0) {
					echo '<h3 class="ttl-box-red">'.$current_term->name .'エリア</h3>';
					
				} else {
					echo '<h3 class="shop-area-city-tll"><span>'.$current_term->name.'</span></h3>';
				}
				;?>
				<?php if($current_term->parent === 0):?>
        <ul class="shop-area-list">
				<?php else:?>
				<ul class="shop-area-city-list">
				<?php endif;?>

					<?php //親エリアページの場合
						if($current_term->parent === 0):?>

						<?php if($current_term_slug === 'hokkaido'):?>
							<li><a href="<?php echo esc_url(home_url( '/shop/hokkaido/douou/' ));?>">道央</a></li>
						<?php elseif($current_term_slug === 'tohoku'):?>
							<li><a href="<?php echo esc_url(home_url( '/shop/tohoku/aomori/' ));?>">青森県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/tohoku/iwate/' ));?>">岩手県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/tohoku/miyagi/' ));?>">宮城県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/tohoku/akita/' ));?>">秋田県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/tohoku/yamagata/' ));?>">山形県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/tohoku/fukushima/' ));?>">福島県</a></li>
						<?php elseif($current_term_slug === 'kanto'):?>
							<li><a href="<?php echo esc_url(home_url( '/shop/kanto/tokyo/' ));?>">東京都</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kanto/kanagawa/' ));?>">神奈川県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kanto/saitama/' ));?>">埼玉県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kanto/chiba/' ));?>">千葉県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kanto/ibaraki/' ));?>">茨城県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kanto/gunma/' ));?>">群馬県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kanto/tochigi/' ));?>">栃木県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kanto/yamanashi/' ));?>">山梨県</a></li>
						<?php elseif($current_term_slug === 'chubu'):?>
							<li><a href="<?php echo esc_url(home_url( '/shop/chubu/aichi/' ));?>">愛知県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/chubu/gifu/' ));?>">岐阜県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/chubu/nagano/' ));?>">長野県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/chubu/shizuoka/' ));?>">静岡県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/chubu/mie/' ));?>">三重県</a></li>
						<?php elseif($current_term_slug === 'hokuriku'):?>
							<li><a href="<?php echo esc_url(home_url( '/shop/hokuriku/niigata/' ));?>">新潟県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/hokuriku/toyama/' ));?>">富山県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/hokuriku/ishikawa/' ));?>">石川県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/hokuriku/fukui/' ));?>">福井県</a></li>
						<?php elseif($current_term_slug === 'kansai'):?>
							<li><a href="<?php echo esc_url(home_url( '/shop/kansai/osaka/' ));?>">大阪府</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kansai/hyogo/' ));?>">兵庫県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kansai/kyoto/' ));?>">京都府</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kansai/shiga' ));?>">滋賀県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kansai/nara/' ));?>">奈良県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kansai/wakayama/' ));?>">和歌山県</a></li>
						<?php elseif($current_term_slug === 'chugoku'):?>
							<li><a href="<?php echo esc_url(home_url( '/shop/chugoku/okayama/' ));?>">岡山県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/chugoku/hiroshima/' ));?>">広島県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/chugoku/yamaguchi/' ));?>">山口県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/chugoku/tottori/' ));?>">鳥取県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/chugoku/shimane/' ));?>">島根県</a></li>
						<?php elseif($current_term_slug === 'shikoku'):?>
							<li><a href="<?php echo esc_url(home_url( '/shop/shikoku/tokushima/' ));?>">徳島県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/shikoku/kagawa/' ));?>">香川県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/shikoku/ehime/' ));?>">愛媛県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/shikoku/kouchi/' ));?>">高知県</a></li>
						<?php elseif($current_term_slug === 'kyusyu'):?>
							<li><a href="<?php echo esc_url(home_url( '/shop/kyusyu/fukuoka/' ));?>">福岡県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kyusyu/saga/' ));?>">佐賀県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kyusyu/nagasaki/' ));?>">長崎県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kyusyu/kumamoto/' ));?>">熊本県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kyusyu/oita/' ));?>">大分県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kyusyu/miyazaki/' ));?>">宮崎県</a></li>
							<li><a href="<?php echo esc_url(home_url( '/shop/kyusyu/kagoshima/' ));?>">鹿児島県</a></li>
						<?php elseif($current_term_slug === 'okinawa'):?>
							<li><a href="<?php echo esc_url(home_url( '/shop/okinawa/honto/' ));?>">沖縄本島</a></li>
						<?php endif;?>

					<?php else:?>

						<?php
							

						$shop_info_sql2 = "SELECT * FROM `wp_shop_admin` WHERE shop_city2 = '{$page_url}' ";
						
		
						
						$result_shop2 = $wpdb->get_results($shop_info_sql2);
						
						
		
						
						foreach( $result_shop2 as $v_shop2){
		
					?>

					<li class="shop-area-city-item">


<div class="area_info_box_wrap">
	<div class="area_info_box1">
		<div class="shop-name bold">
			<div class="area_kaitori">
				<?php
					if($v_shop2->shop_city1 == 'hokkaido' || $v_shop2->shop_city1 == 'okinawa'){
						echo replacePrefecturesName($v_shop2->shop_city1);
					}else{
						echo replacePrefecturesName($v_shop2->shop_city2);
					}
				?>
			</div>
			<div class="name">
				<a class="" href="/shop/<?php echo $v_shop2->shop_city1;?>/<?php echo $v_shop2->shop_city2;?>/<?php echo $v_shop2->shop_url;?>/"><?php echo $v_shop2->shop_name;?></a>
			</div>	
		</div>
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

<div class="area_link_box ta-r">
	<a class="pos-r bold color-red shop-detail-btn" href="/shop/<?php echo $v_shop2->shop_city1;?>/<?php echo $v_shop2->shop_city2;?>/<?php echo $v_shop2->shop_url;?>/"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/arrow.svg"></a>
</div>






          </li>
			<?php } ?>


			

					<?php endif;?>
        </ul>
      </section>

			<?php //子エリアページの場合
				if($current_term->parent):?>
				<section>
					<h2 class="section-ja-title ta-c">査定無料！<br class="only-sp">お気軽にお問合せ下さい！</h2>
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
					<h4 class="section-ja-title ta-c">ジュエルカフェ<?php echo esc_html($current_term_name); ?>の<br class="only-sp">買取商品一覧</h4>

					<?php get_template_part( 'template-parts/common-purchase-item' );?>

				</section>
			<?php endif;?>

			<?php get_template_part( 'template-parts/common-tab' );?>

    </div>



		<?php get_footer( );?>
