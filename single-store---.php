<?php
/*
Template Name: 店舗詳細ページ
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
	
	$line_show = get_field('ライン表示');
	$line_id = get_field('ラインID');


	
	if($local_image1['url'] == ''){
		
		$google_img = 'https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/shop/shop-detail-mv.jpeg';
		
	}else{
		
		$google_img = $local_image1['url'];
		
	}

	
$today_sql = "select * from `wp_goldchart` ORDER BY `wp_goldchart`.`id` DESC limit 0,2";

$today_result = $wpdb->get_results($today_sql);

	

	$shop_info = get_shop_info( $post->post_name );



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




	<div id="page-top"></div>
	
	
		<?php

			$wp_obj = get_queried_object(  );
			$terms = get_the_terms( $post->ID, 'area' );
			
		?>


    <div class="main-section"></div>
	
	
	
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

	
				<h1 class="section-ja-title shop-detail-h1">ジュエルカフェ<br>
					<?php echo $shop_info[0]->shop_name;?>
				</h1>


			<div class="shop-navigation">
				<div class="nav-box"><a href="#js-store-guide" class="on">店舗案内</a></div>
				<div class="nav-box"><a href="#js-achievement">高価買取実績</a></div>
				<div class="nav-box"><a href="#js-shop-three-features">3つの特徴</a></div>
				<div class="nav-box"><a href="#js-shop-voice">お客様の声</a></div>
				<div class="nav-box"><a href="#js-shop-news">店舗からのお知らせ</a></div>
				<div class="nav-box"><a href="#js-gold-chart" class="gold-market">本日の金相場</a></div>
				<div class="nav-box"><a href="#js-shop-detail-faq">よくあるご質問</a></div>
				<div class="nav-box"><a href="#js-shop-area-city">近隣店舗のご案内</a></div>
			</div>

			<div class="section-inner mt-20 mb-20">
				<?php
					if ( wp_is_mobile() ) :
				?>
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_tokuten_bnr_sp.webp" alt="ジュエルカフェならお店で今すぐかんたんスピード買取！ 査定・ご相談0円" width="100%">
				<?php
					else :
				?>
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop_tokuten_bnr.webp" alt="ジュエルカフェならお店で今すぐかんたんスピード買取！ 査定・ご相談0円" width="100%">
				<?php
					endif;
				?>
			</div>
			

			<p class="mt-20"><span class="color-red bold d-b">査定受付時にスマホ画面をスタッフにお見せください。</span>※写真はイメージです。商品はご来店日・店舗によって異なり、品切れの場合もございます。予めご了承ください。</p>

				<?php get_template_part( 'template-parts/shop-parent-detail2' , null , $shop_info);?>
	
		</div>





				<section class="common-kaitori-resuluts" id="js-achievement">

				<div class="section-inner">

					<div class="common-ttl">
						<div class="section-inner">
							<h2 class="shop-title <?php if ( $post->post_type =='shop' && $post->post_parent > 0 ):  echo 'shop';  else:  echo 'kaitori';  endif;?>-title">
								<span class="common-ttl-sub">
									ジュエルカフェ
									<?php
										echo ' - '.$post->post_title;
									?>
								</span>
								<span class="common-ttl-main"><span class="color-red">他店と差がつく</span>高価買取実績</span>
							</h2>

						</div>
					</div>

					<div class="only-pc">

						<ul class="item-list d-f jc-sb">
							<li class="mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/goldtop20_2.jpg" alt="<?php echo $post->post_title;?>の金買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/gold/">金買取</a> > <a href="/kaitori/gold/k18/">18金</a></p>
									<p class="ttl mb-10">喜平・18金アクセサリー<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">751,200<span class="small">円</span></div>
									</div>
								</div>
							</li>
							<li class="mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/DSC07981.jpg" alt="<?php echo $post->post_title;?>のロレックス買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/tokei/">時計買取</a> > <a href="/kaitori/tokei/rolex-top/">ロレックス買取</a></p>
									<p class="ttl mb-10">サブマリーナ 1266613LB<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">1,700,000<span class="small">円</span></div>
									</div>
								</div>
							</li>
							<li class="mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/lv20_6.jpg" alt="<?php echo $post->post_title;?>のルイヴィトン買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/brand/">ブランド買取</a> > <a href="/kaitori/brand/vuitton/">ルイヴィトン買取</a></p>
									<p class="ttl mb-10">スピーディ・バンドリエール 30 モノグラム M41112<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">125,800<span class="small">円</span></div>
									</div>
								</div>
							</li>

							<li class="mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/goldtop20_5.jpg" alt="<?php echo $post->post_title;?>の金買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/gold/">金買取</a> > <a href="/kaitori/gold/k18/">18金</a></p>
									<p class="ttl mb-10">18金ジュエリーまとめて<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">175,000<span class="small">円</span></div>
									</div>
								</div>
							</li>

							<li class="mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/rolex05.jpg" alt="<?php echo $post->post_title;?>のロレックス買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/tokei/">時計買取</a> > <a href="/kaitori/tokei/rolex-top/">ロレックス買取</a></p>
									<p class="ttl mb-10">GMTマスターⅡ 116710LN<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">1,210,000<span class="small">円</span></div>
									</div>
								</div>
							</li>
							<li class="mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/lv20_11.jpg" alt="<?php echo $post->post_title;?>のルイヴィトン買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/brand/">ブランド買取</a> > <a href="/kaitori/brand/vuitton/">ルイヴィトン買取</a></p>
									<p class="ttl mb-10">ウェストミンスター PM N41102<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">97,800<span class="small">円</span></div>
									</div>
								</div>
							</li>
							<li class="mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/goldtop20_11.jpg" alt="<?php echo $post->post_title;?>の金買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/gold/">金買取</a> > <a href="/kaitori/gold/k18/">18金</a></p>
									<p class="ttl mb-10">石付き18金ジュエリー<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">142,100<span class="small">円</span></div>
									</div>
								</div>
							</li>

							<li class="mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/goldtop20_14.jpg" alt="<?php echo $post->post_title;?>の金買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/gold/">金買取</a> > <a href="/kaitori/gold/k18/">18金</a></p>
									<p class="ttl mb-10">18金ジュエリーまとめて<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">498,800<span class="small">円</span></div>
									</div>
								</div>
							</li>

							<li class="mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/patek-philippe01.jpg" alt="<?php echo $post->post_title;?>のロレックス買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/tokei/">時計買取</a> > <a href="/kaitori/tokei/rolex-top/">ロレックス買取</a></p>
									<p class="ttl mb-10">ノーチラス 5712/1A-001 プチコンプリケーション<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">6,500,000<span class="small">円</span></div>
									</div>
								</div>
							</li>



							<li class="mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/chanel23_13.jpg" alt="<?php echo $post->post_title;?>のルイヴィトン買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/brand/">ブランド買取</a> > <a href="/kaitori/brand/chanel/">シャネル買取</a></p>
									<p class="ttl mb-10">シャネルのコレクションまとめて<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">1,620,000<span class="small">円</span></div>
									</div>
								</div>
							</li>
							
							

							<li class="mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/lv23_13.jpg" alt="<?php echo $post->post_title;?>のルイヴィトン買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/brand/">ブランド買取</a> > <a href="/kaitori/brand/vuitton/">ルイヴィトン買取</a></p>
									<p class="ttl mb-10">ルイヴィトンの小物まとめて<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">45,000<span class="small">円</span></div>
									</div>
								</div>
							</li>


							<li class="mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/lv20_12.jpg" alt="<?php echo $post->post_title;?>のルイヴィトン買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/brand/">ブランド買取</a> > <a href="/kaitori/brand/vuitton/">ルイヴィトン買取</a></p>
									<p class="ttl mb-10">ティヴォリ PM モノグラム M40143<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">104,800<span class="small">円</span></div>
									</div>
								</div>
							</li>

						</ul>



					</div>






				<div class="only-sp">


					<div class="shopswiper">

					<ul class="new-item-list swiper-wrapper">
						
							<li class="swiper-slide mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/goldtop20_2.jpg" alt="<?php echo $post->post_title;?>の金買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/gold/">金買取</a> > <a href="/kaitori/gold/k18/">18金</a></p>
									<p class="ttl mb-10">喜平・18金アクセサリー<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">751,200<span class="small">円</span></div>
									</div>
								</div>
							</li>
							<li class="swiper-slide mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/DSC07981.jpg" alt="<?php echo $post->post_title;?>のロレックス買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/tokei/">時計買取</a> > <a href="/kaitori/tokei/rolex-top/">ロレックス買取</a></p>
									<p class="ttl mb-10">サブマリーナ 1266613LB<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">1,700,000<span class="small">円</span></div>
									</div>
								</div>
							</li>
							<li class="swiper-slide mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/lv20_6.jpg" alt="<?php echo $post->post_title;?>のルイヴィトン買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/brand/">ブランド買取</a> > <a href="/kaitori/brand/vuitton/">ルイヴィトン買取</a></p>
									<p class="ttl mb-10">スピーディ・バンドリエール 30 モノグラム M41112<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">125,800<span class="small">円</span></div>
									</div>
								</div>
							</li>

							<li class="swiper-slide mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/goldtop20_5.jpg" alt="<?php echo $post->post_title;?>の金買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/gold/">金買取</a> > <a href="/kaitori/gold/k18/">18金</a></p>
									<p class="ttl mb-10">18金ジュエリーまとめて<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">175,000<span class="small">円</span></div>
									</div>
								</div>
							</li>

							<li class="swiper-slide mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/rolex05.jpg" alt="<?php echo $post->post_title;?>のロレックス買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/tokei/">時計買取</a> > <a href="/kaitori/tokei/rolex-top/">ロレックス買取</a></p>
									<p class="ttl mb-10">GMTマスターⅡ 116710LN<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">1,210,000<span class="small">円</span></div>
									</div>
								</div>
							</li>
							<li class="swiper-slide mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/lv20_11.jpg" alt="<?php echo $post->post_title;?>のルイヴィトン買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/brand/">ブランド買取</a> > <a href="/kaitori/brand/vuitton/">ルイヴィトン買取</a></p>
									<p class="ttl mb-10">ウェストミンスター PM N41102<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">97,800<span class="small">円</span></div>
									</div>
								</div>
							</li>
							<li class="swiper-slide mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/goldtop20_11.jpg" alt="<?php echo $post->post_title;?>の金買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/gold/">金買取</a> > <a href="/kaitori/gold/k18/">18金</a></p>
									<p class="ttl mb-10">石付き18金ジュエリー<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">142,100<span class="small">円</span></div>
									</div>
								</div>
							</li>

							<li class="swiper-slide mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/goldtop20_14.jpg" alt="<?php echo $post->post_title;?>の金買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/gold/">金買取</a> > <a href="/kaitori/gold/k18/">18金</a></p>
									<p class="ttl mb-10">18金ジュエリーまとめて<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">498,800<span class="small">円</span></div>
									</div>
								</div>
							</li>

							<li class="swiper-slide mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/patek-philippe01.jpg" alt="<?php echo $post->post_title;?>のロレックス買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/tokei/">時計買取</a> > <a href="/kaitori/tokei/rolex-top/">ロレックス買取</a></p>
									<p class="ttl mb-10">ノーチラス 5712/1A-001 プチコンプリケーション<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">6,500,000<span class="small">円</span></div>
									</div>
								</div>
							</li>


							<li class="swiper-slide mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/chanel23_13.jpg" alt="<?php echo $post->post_title;?>のルイヴィトン買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/brand/">ブランド買取</a> > <a href="/kaitori/brand/chanel/">シャネル買取</a></p>
									<p class="ttl mb-10">シャネルのコレクションまとめて<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">1,620,000<span class="small">円</span></div>
									</div>
								</div>
							</li>
							
							

							<li class="swiper-slide mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/lv23_13.jpg" alt="<?php echo $post->post_title;?>のルイヴィトン買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/brand/">ブランド買取</a> > <a href="/kaitori/brand/vuitton/">ルイヴィトン買取</a></p>
									<p class="ttl mb-10">ルイヴィトンの小物まとめて<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">45,000<span class="small">円</span></div>
									</div>
								</div>
							</li>


							<li class="swiper-slide mb-20">
								<div class="item-img">
									<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/07/lv20_12.jpg" alt="<?php echo $post->post_title;?>のルイヴィトン買取">
								</div>
								<div class="p-10">
									<p class="kaitoriName mb-4"><a href="/kaitori/brand/">ブランド買取</a> > <a href="/kaitori/brand/vuitton/">ルイヴィトン買取</a></p>
									<p class="ttl mb-10">ティヴォリ PM モノグラム M40143<br>お買取いたしました！</p>
									<div class="priceBox d-f jc-sb">
										<div class="left color-red">高価買取実績</div>
										<div class="right color-red">104,800<span class="small">円</span></div>
									</div>
								</div>
							</li>
							


					</ul>


					</div>

				<style>
					
					.new-item-list .swiper-slide{max-width:200px;margin-right:10px;}

				</style>


				</div>



<!-- Initialize Swiper -->
<script>

  
  var swiper = new Swiper(".shopswiper", {
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





					</div>


				</section>





<div class="section-inner">


			<?php



			if( strpos($_SERVER['REQUEST_URI'],'/tokei-') !== false){

				if( get_field('is_show' , 151) ){

					get_template_part( 'template-parts/shop-price-tokei' );

				}

				get_template_part( 'template-parts/shop-kaitori-results' );

			}




			?>



		</div>













		<div class="section-inner">


			<?php // 現在表示されている投稿と同じタームに分類された投稿を取得
				$taxonomy_slug = 'area'; // タクソノミーのスラッグを指定
				$sub_taxonomy_slug = 'hinmoku';
				$post_type_slug = 'blog'; // 投稿タイプのスラッグを指定
				$post_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // エリアタクソノミーの指定
				$sub_post_terms = wp_get_object_terms($post->ID, $sub_taxonomy_slug);
				$current_slug = basename(get_permalink( ));
				if( $post_terms && !is_wp_error($post_terms)) { // 値があるときに作動
					$terms_slug = array(); // 配列のセット
					foreach( $post_terms as $value ){ // 配列の作成
						$terms_slug[] = $value->slug; // タームのスラッグを配列に追加
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
							'terms' => $current_slug // タームの配列を指定
						)
					)
				);
				if($wp_obj->post_parent === 0) {
					$args = array(
						'post_type' => $post_type_slug, // 投稿タイプを指定
						'posts_per_page' => 10, // 表示件数を指定
						'orderby' =>  'DESC', // ランダムに投稿を取得
						'paged' => $paged,
						'tax_query' => array( // タクソノミーパラメーターを使用
							array(
								'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
								'field' => 'slug', // スラッグに一致するタームを返す
								'terms' => $current_slug // タームの配列を指定
							)
						)
					);
				} else { //店舗 - 品目ページの場合
					$parent_slug = get_post( $parent_id)->post_name;


					$args = array(
						'post_type' => $post_type_slug, // 投稿タイプを指定
						'posts_per_page' => 10, // 表示件数を指定
						'orderby' =>  'DESC', // ランダムに投稿を取得
						'paged' => $paged,
						'tax_query' => array( // タクソノミーパラメーターを使用
							'relation' => 'AND',
							array(
								'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
								'field' => 'slug', // スラッグに一致するタームを返す
								'terms' => $parent_slug // タームの配列を指定 (店舗名)
							),
							array(
								'taxonomy' => $sub_taxonomy_slug,
								'field' => 'slug',
								'terms' => $sub_post_terms[0]->slug // タームの配列を指定 (品目名)
							)
						)
					);
				}

				$the_query = new WP_Query($args); if($the_query->have_posts()):
			?>

			<section class="kaitori-resuluts" id="js-purchase-price">
				<div class="common-ttl">
					<div class="section-inner">
						<?php if($wp_obj->post_parent === 0):?>
							<h2 class="shop-title">
								<span class="common-ttl-sub">ジュエルカフェ - <?php the_title();?></span>
								<span class="common-ttl-main">最新買取<span class="color-red">事例</span></span>
							</h2>
						<?php else:?>
							<h2 class="shop-title">
								<span class="common-ttl-sub">ジュエルカフェ - <?php echo esc_html(get_post( $parent_id )->post_title);?></span>
								<span class="common-ttl-main"><?php echo esc_html($hinmoku_term[0]->name);?>最新買取<span class="color-red">事例</span></span>
							</h2>
						<?php endif;?>

						<div class="common-ttl-en" >Purchase Results</div>
					</div>
				</div>




				<div class="section-inner">
					<ul class="blog-archive-list">
					<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
					<?php
						$hinmoku_terms = get_the_terms($post->ID, 'hinmoku');

						if(is_array($hinmoku_terms)){

						foreach($hinmoku_terms as $term) {
							if($term->parent === 0) {
								$hinmoku_parent_name = $term->name;
								$hinmoku_parent_id = $term->term_id;
								// $hinmoku_parent_slug = $term->slug;
							}
						}
						foreach($hinmoku_terms as $term) {
							if($term->parent === $hinmoku_parent_id) {
								$hinmoku_child_name = $term->name;
								$hinmoku_child_id = $term->term_id;
								// $hinmoku_child_slug = $term->slug;
							}
						}

						}

						// foreach($hinmoku_terms as $term) {
						// 	if($term->parent === $hinmoku_child_id) {
						// 		$hinmoku_grandchild_name = $term->name;
						// 		$hinmoku_grandchild_slug = $term->slug;
						// 	}
						// }

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
							<p class="blog-archive-ttl">
								<a href="<?php the_permalink() ?>"><?php echo mb_convert_kana(get_the_title(), "rnas"); ?></a>
							</p>
							<div class="blog-archive-date">公開日：<time itemprop="dateCreated datePublished"><?php the_time('Y/m/d');?></time></div>
							<p class="blog-archive-point">
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
					<?php wp_reset_postdata(); ?>
					</ul>

					<div class="blog-archive-linkWrapper">
						<a href="/blog/" class="blog-archive-link">もっと見る</a>
					</div>
				
				</div>


			</section>
			<?php endif; ?>


</div>




	

      <section class="intro intro-broken section-inner">
				<div class="logo">
					<picture>
						<source media="(max-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/logo.svg">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/logo.svg" alt="JEWEL CAFE">
					</picture>
				</div>
				<div class="mincho pos-r">
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



	  <section class="shop-three-features section-inner" id="js-shop-three-features">
        <div class="common-ttl">
          <div class="section-inner">
						<h2 class="shop-title">
							<?php if($wp_obj->parent === 0):?>
								<span class="common-ttl-sub">ジュエルカフェ - <?php the_title();?>の</span>
							<?php else:?>
								<span class="common-ttl-sub">ジュエルカフェ - <?php echo get_post( $parent_id )->post_title;?>の</span>
							<?php endif;?>
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







      <section class="section-inner shop-voice" id="js-shop-voice">

	<?php
	
		 if( $shop_info[0]->shop_customer_title1 !== ''){
	
	?>


        <div class="common-ttl">
          <div class="section-inner">
		
			<h2 class="shop-title">
				<span class="common-ttl-sub">ジュエルカフェ - <?php $shop_info[0]->shop_name;?></span>
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


				<?php if( $shop_info[0]->shop_customer_title1 ):?>
				
					<div class="shop-voice-list-item">
						<div class="d-f media jc-sb">
							<div class="voice-img">


								<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/review_icon1.png" alt="買取してもらったお客様">

							</div>
							<div class="voice-default">
								<div class="count-rating">
									<div class="rating-value mr-3">5.0</div>
									<div class="star-rating">
										<div class="star-rating-front" style="width: 100%"></div>
										<div class="star-rating-back"></div>
									</div>
								</div>
								<div class="shop-customer-review-header bold">
									<p class="voice-ttl"><?php echo $shop_info[0]->shop_customer_title1;?><span>

									<?php
								
											if( $shop_info[0]->shop_customer_attributes1 == '' ){
								
												echo '（30代・女性）';

											}else{
												
												echo $shop_info[0]->shop_customer_attributes1;
												
											}

									?>


									</span></p>
								</div>
								<div class="ta-r mt-2">
									<a class="button-more">続きを読む</a>
								</div>
							</div>
						</div>
						
						
						<div class="mtb-12" style="display: none;">
							<?php echo $shop_info[0]->shop_customer_content1;?>
						</div>
						
						<div class="ta-c mt-16 mb-12">
							<img class="object-fit-contain" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/double-arrow.svg" alt="続きを読む">
						</div>
						<div class="d-f media jc-sb">
							<div class="voice-img">
								<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/staff.png" alt="買取対応した店舗スタッフ">
							</div>
							<div class="voice-default">
								<p class="voice-ttl bold"><?php echo $shop_info[0]->shop_staff_title1;?></p>
								<div class="ta-r mt-2">
									<a class="button-more">続きを読む</a>
								</div>
							</div>
						</div>
						<div class="mtb-12" style="display: none;">
							<?php echo $shop_info[0]->shop_staff_content1;?>
						</div>
					</div>

					<?php endif;?>







				<?php if( $shop_info[0]->shop_customer_title2 ):?>
				
					<div class="shop-voice-list-item">
						<div class="d-f media jc-sb">
							<div class="voice-img">


								<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/review_icon2.png" alt="買取してもらったお客様">

							</div>
							<div class="voice-default">
								<div class="count-rating">
									<div class="rating-value mr-3">5.0</div>
									<div class="star-rating">
										<div class="star-rating-front" style="width: 100%"></div>
										<div class="star-rating-back"></div>
									</div>
								</div>
								<div class="shop-customer-review-header bold">
									<p class="voice-ttl"><?php echo $shop_info[0]->shop_customer_title2;?><span>

									<?php
								
											if( $shop_info[0]->shop_customer_attributes2 == '' ){
								
												echo '（70代・女性）';

											}else{
												
												echo $shop_info[0]->shop_customer_attributes2;
												
											}

									?>



									</span></p>
								</div>
								<div class="ta-r mt-2">
									<a class="button-more">続きを読む</a>
								</div>
							</div>
						</div>
						
						
						<div class="mtb-12" style="display: none;">
							<?php echo $shop_info[0]->shop_customer_content2;?>
						</div>
						
						<div class="ta-c mt-16 mb-12">
							<img class="object-fit-contain" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/double-arrow.svg" alt="続きを読む">
						</div>
						<div class="d-f media jc-sb">
							<div class="voice-img">
								<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/staff.png" alt="買取対応した店舗スタッフ">
							</div>
							<div class="voice-default">
								<p class="voice-ttl bold"><?php echo $shop_info[0]->shop_staff_title2;?></p>
								<div class="ta-r mt-2">
									<a class="button-more">続きを読む</a>
								</div>
							</div>
						</div>
						<div class="mtb-12" style="display: none;">
							<?php echo $shop_info[0]->shop_staff_content2;?>
						</div>
					</div>

					<?php endif;?>










				<?php if( $shop_info[0]->shop_customer_title3 ):?>
								
					<div class="shop-voice-list-item">
						<div class="d-f media jc-sb">
							<div class="voice-img">

								<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/review_icon3.png" alt="買取してもらったお客様">
							</div>
							<div class="voice-default">
								<div class="count-rating">
									<div class="rating-value mr-3">5.0</div>
									<div class="star-rating">
										<div class="star-rating-front" style="width: 100%"></div>
										<div class="star-rating-back"></div>
									</div>
								</div>
								<div class="shop-customer-review-header bold">
									<p class="voice-ttl">

									<?php echo $shop_info[0]->shop_customer_title3; ?>

									<span>


										<?php
									
												if( $shop_info[0]->shop_customer_attributes3 == '' ){
									
													echo '（40代・女性）';

												}else{
													
													echo $shop_info[0]->shop_customer_attributes3;
													
												}

										?>


									</span>

									</p>
								</div>
								<div class="ta-r mt-2">
									<a class="button-more">続きを読む</a>
								</div>
							</div>
						</div>
						
						<div class="mtb-12" style="display: none;">

									<?php

										if( $shop_info[0]->shop_customer_content3 == '' ):

											echo '少しでも高く売りたいと思い、インターネットなどで買取店を調べて、何店舗か回ってみました。その中でもジュエルカフェ'. $shop_info[0]->shop_name .'さんは新聞チラシでもよく見かけていて名前を知っていたので期待して行ったのですが、30年近く前に夫が購入した傷だらけのロレックスでも驚くような値段がつきました。もちろん、何店舗か回った他店さんより高かったです。スタッフさんの応対も親切で、査定内容も納得できるものでしたので、最後はジュエルカフェ'. $shop_info[0]->shop_name .'さんにて買い取っていただくことにしました。また何かお願いしたいと思います。';


										else:

											echo $shop_info[0]->shop_customer_content3;

										endif;

									?>

						</div>

						<div class="ta-c mt-16 mb-12">
							<img class="object-fit-contain" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/double-arrow.svg" alt="">
						</div>
						<div class="d-f media jc-sb">
							<div class="voice-img">
								<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/staff.png" alt="買取対応した店舗スタッフ">
							</div>
							<div class="voice-default">
								<p class="voice-ttl bold">

									<?php

									if( $shop_info[0]->shop_staff_title3 == '' ):
									
											echo 'ジュエルカフェ'.$shop_info[0]->shop_name.'にお越しいただき、ありがとうございました！';

									else:

										echo $shop_info[0]->shop_customer_title3;

									endif;

									?>

								</p>
								<div class="ta-r mt-2">
									<a class="button-more">続きを読む</a>
								</div>
							</div>
						</div>
						<div class="mtb-12 voice-user" style="display: none;">

								<?php
								
								
								
								if( $shop_info[0]->shop_staff_content3 == '' ):
								
										echo 'この度はジュエルカフェ'. $shop_info[0]->shop_name .'の買取査定をご利用いただきありがとうございました。拝見した商品は確かに年代・状態ともにやや古いモデルではありましたが、ロレックスはヴィンテージに近いものであっても価格が高騰しており、買った当時よりも高く売れるケースも多々ございます。また、事前にお電話で来店予約をしてくださったことによりキャッシュバックキャンペーンの対象となったため、+αのお値段でお買取させていただきました。
										ジュエルカフェ'. $shop_info[0]->shop_name .'では時計の他にも貴金属ジュエリーやブランド品など、幅広い品目をお買取しています。1つからでも大丈夫ですので、ぜひまたのご利用をお待ちしております。';

								else:

									echo $shop_info[0]->shop_staff_content3;

								endif;

								?>


						</div>
					</div>
				<?php
					endif;
				?>




        </div>


		<?php } ?>
		
      </section>






			<?php get_template_part( 'template-parts/shop-purchase' );?>






		<section class="shop-news section-inner" id="js-shop-news">
			<?php if( $shop_info[0]->shop_notification ):?>
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="shop-title">

							<span class="common-ttl-sub">ジュエルカフェ - <?php echo $shop_info[0]->shop_name;?>の</span>
							
							<span class="common-ttl-main"><span class="color-red">お知らせ</span></span>
						</h2>
						<div class="common-ttl-en">News</div>
					</div>
				</div>
				<p><?php echo $shop_info[0]->shop_notification;?></p>
			<?php endif;?>
			
			
			
			<?php if( $shop_info[0]->shop_aword ):?>
				<div class="shop-news-comment">
					<div class="shop-news-comment-inner">
						<h3 class="shop-news-ttl">査定スタッフから一言</h3>
						<p class="shop-news-txt"><?php echo $shop_info[0]->shop_aword;?></p>
					</div>
				</div>
			<?php endif;?>
			
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
		
      


		<?php get_template_part('template-parts/market-price-chart-gold'); ?>






      <section class="section-inner shop-detail-faq" id="js-shop-detail-faq">
        <div class="common-ttl">
          <div class="section-inner">
						<h2 class="shop-title">
							<span class="common-ttl-sub">ジュエルカフェ - <?php echo $shop_info[0]->shop_name;?>の</span>
							<span class="common-ttl-main">よくある<span class="color-red">ご質問</span></span>
						</h2>
            <div class="common-ttl-en">Faq</div>
          </div>
        </div>
		
		
        <div class="accordion" id="first-accordion">
		
					
			<?php if( $shop_info[0]->shop_faq_q1 ):?>
				<div class="accordion-item">
					<h3 class="accordion-head">
						<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php echo $shop_info[0]->shop_faq_q1;?></a>
					</h3>
					<div class="accordion-content">
						<p><span class="mr-8">A</span><?php echo $shop_info[0]->shop_faq_a1;?></p>
					</div>
				</div>
			<?php endif;?>

					
					
			<?php if( $shop_info[0]->shop_faq_q2 ):?>
				<div class="accordion-item">
					<h3 class="accordion-head">
						<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php echo $shop_info[0]->shop_faq_q2;?></a>
					</h3>
					<div class="accordion-content">
						<p><span class="mr-8">A</span><?php echo $shop_info[0]->shop_faq_a2;?></p>
					</div>
				</div>
			<?php endif;?>

					
					
					
			<?php if( $shop_info[0]->shop_faq_q3 ):?>
				<div class="accordion-item">
					<h3 class="accordion-head">
						<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php echo $shop_info[0]->shop_faq_q3;?></a>
					</h3>
					<div class="accordion-content">
						<p><span class="mr-8">A</span><?php echo $shop_info[0]->shop_faq_a3;?></p>
					</div>
				</div>
			<?php endif;?>



			<?php if( $shop_info[0]->shop_faq_q4 ):?>
				<div class="accordion-item">
					<h3 class="accordion-head">
						<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php echo $shop_info[0]->shop_faq_q4;?></a>
					</h3>
					<div class="accordion-content">
						<p><span class="mr-8">A</span><?php echo $shop_info[0]->shop_faq_a4;?></p>
					</div>
				</div>
			<?php endif;?>


			<?php if( $shop_info[0]->shop_faq_q5 ):?>
				<div class="accordion-item">
					<h3 class="accordion-head">
						<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php echo $shop_info[0]->shop_faq_q5;?></a>
					</h3>
					<div class="accordion-content">
						<p><span class="mr-8">A</span><?php echo $shop_info[0]->shop_faq_a5;?></p>
					</div>
				</div>
			<?php endif;?>


			<?php if( $shop_info[0]->shop_faq_q6 ):?>
				<div class="accordion-item">
					<h3 class="accordion-head">
						<a href="javascript:void(0);"><span class="mr-8 color-red">Q</span><?php echo $shop_info[0]->shop_faq_q6;?></a>
					</h3>
					<div class="accordion-content">
						<p><span class="mr-8">A</span><?php echo $shop_info[0]->shop_faq_a6;?></p>
					</div>
				</div>
			<?php endif;?>





			<?php
				$page_ID = get_page_by_path( 'qa' );
				$page_ID = $page_ID->ID;
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
							<span class="common-ttl-sub">ジュエルカフェ - <?php the_title();?>の</span>
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
										
										
						$permalink = get_permalink(get_the_ID());
						
						$permalink = str_replace('/%hinmoku%','',$permalink);
						
	
		
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
            <div class="ta-r"><a class="pos-r bold color-red shop-detail-btn" href="<?php echo $permalink;?>">詳しくはこちら</a></div>
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
