<?php
/*
Template Name: 品目詳細ページ
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
	

	if(get_the_terms($post->ID, 'area')){ //品目 - 県ページの場合
		$kaitori_area_parent_id = $post->post_parent;
		$kaitori_area_parent_name = get_post( $kaitori_area_parent_id)->post_name;
		$custom_title = get_post( $kaitori_area_parent_id)->post_title;
		
		if(get_field('fv_image_pc', $post->ID)) {
			$image_fv_pc = get_field('fv_image_pc', $post->ID);
		} else {
			$image_fv_pc = get_field('fv_image_pc', $kaitori_area_parent_id);
		}
		if(get_field('fv_image_sp', $post->ID)) {
			$image_fv_sp = get_field('fv_image_sp', $post->ID);
		} else {
			$image_fv_sp = get_field('fv_image_sp', $kaitori_area_parent_id);
		}
		$purchase_title = get_field('高価買取その1_タイトル', $kaitori_area_parent_id);
		$purchase_desc = get_field('高価買取説明文',$kaitori_area_parent_id);
		$kaitori_ways_field = get_field('高く売る方法', $kaitori_area_parent_id);
		$title_kaitori_howto = get_field('買取豆知識_タイトル', $kaitori_area_parent_id);
		$image_kaitori_howto = get_field('買取豆知識_画像', $kaitori_area_parent_id);
		$sentense_kaitori_howto = get_field('買取豆知識_文章', $kaitori_area_parent_id);
	} else { //品目ページの場合
		$custom_title = get_post( $post->ID )->post_title;
		$image_fv_pc = get_field('fv_image_pc');
		$image_fv_sp = get_field('fv_image_sp');
		$purchase_title = get_field('高価買取その1_タイトル');
		$purchase_desc = get_field('高価買取説明文');
		$kaitori_ways_field = get_field('高く売る方法');
		$title_kaitori_howto = get_field('買取豆知識_タイトル');
		$image_kaitori_howto = get_field('買取豆知識_画像');
		$sentense_kaitori_howto = get_field('買取豆知識_文章');
	}
?>


<?php /*
<script type="application/ld+json">
	{
		"@context" : "https://schema.org/",
		"@type": "Product",
		"@id": "kaitori",
		"name": "<?php echo $custom_title; ?>",
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




	<div id="page-top"></div>
			<div class="main-section">
				<div class="only-pc">
					<?php if(!empty($image_fv_pc)):?>
					<img src="<?php echo esc_url($image_fv_pc['url']);?>" alt="ボロボロのロレックスも高価買取" >
					<?php endif;?>
				</div>
				<div class="only-sp">
					<?php if(!empty($image_fv_sp)):?>
					<img src="<?php echo esc_url($image_fv_sp['url']);?>" alt="ボロボロのロレックスも高価買取" >
					<?php endif;?>
				</div>
			</div>



	<?php kaitori_breadcrumb();?>
	
	
	
	<script>
		jQuery('.breadcrumbs span').last().html('ボロボロ・古い・壊れたロレックス買取');
	</script>

	<div class="mt-12">
		<?php get_template_part( 'template-parts/common-tab' );?>
	</div>
	<section class="boro_rolex1">
		<div class="section-inner bg_woman">
			<p class="txt1"><span class="marker">「壊れた」</span><span class="marker">「動かない」</span><br>
				<span class="marker">「古い」</span><span class="marker">「汚い」</span><span class="marker">「水没」</span><br><span class="marker">「部品だけ」</span><span class="marker">「ボロボロ」</span>
			</p>
			<p class="txt2"><span class="color-red">どんな状態でも</span><br>お持ちください!</p>
			<div class="boro_item_box d-f">
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item1.png" alt="ベルトがないロレックスも高価買取">
					<p class="txt">ベルトがない</p>
				</div>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item2.png" alt="動かないロレックスも高価買取">
					<p class="txt">動かない</p>
				</div>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item3.png" alt="ガラス割れロレックスも高価買取">
					<p class="txt">ガラス割れ</p>
				</div>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item4.png" alt="部品だけあるロレックスも高価買取">
					<p class="txt">部品だけある</p>
				</div>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item5.png" alt="水没したロレックスも高価買取">
					<p class="txt">水没した</p>
				</div>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item6.png" alt="サビているロレックスも高価買取">
					<p class="txt">サビている</p>
				</div>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item7.png" alt="年代も不明なロレックスも高価買取">
					<p class="txt">年代も不明</p>
				</div>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item8.png" alt="大きなダメージのロレックスも高価買取">
					<p class="txt">大きなダメージ</p>
				</div>
			</div>
		</div>
	</section>


	<section class="boro_rolex2">
		<div class="section-inner">
			<p class="txt1 mt-24">壊れた・ジャンク品のロレックスをお持ちの方、<br>ジュエルカフェなら<span class="color-red large">高価現金買取</span>いたします！</p>
			<p class="txt2">買取専門店ジュエルカフェはでは「壊れた」「ボロボロな」「動かない」「古い」「ジャンクな」ロレックス（ROLEX）腕時計を高価買取しています！</p>
			<p class="txt2">世界各地への物流ルートを持ち、毎日多数のロレックスを買取実績を誇るジュエルカフェなら「壊れた」ロレックスでもプロスタッフがしっかり査定！驚きの価格をご提示いたします。</p>
			<p class="txt2">「腕時計といえばロレックス」というほどの知名度を確立しているロレックスは、近年流通相場が大幅に高騰。コンディションの良いものはもちろんですが、キズや故障があったとしても、かつては考えられなかったほどのお値段がつく場合がございます。</p>
			<p class="txt3"><span class="color-red marker">「こんな壊れた状態ならば相手にしてもらえないだろうから捨ててしまおう」<br>「買取査定に出したいけど、サビだらけだし、鑑定士に笑われてしまいそう」<br>「古くて動かないし、どうせほぼ0 円に近い買取価格なんでしょ？」</span></p>
			<p class="txt2">とんでもございません！現在のロレックス買取相場であれば、お持ちになったお客様の予想を超える買取価格をご提示できることも大変多くなっています！実際にお客様から多くの喜びの声をいただき、クチコミでご来店いただくことも大変増えております。</p>
			<p class="txt2">デイトナ、デイトジャスト、デイデイト、サブマリーナ、エクスプローラーI、エクスプローラーII、オイスターパーペチュアル、ミルガウス、GT マスター、シードゥエラー、ヨットマスター、スカイドゥエラーなど、人気モデルはガラスが割れていても、オーバーホールをしていなくてもまったく構いません！</p>
			<p class="txt2">ぜひ一度、お近くの店舗、または宅配買取からジュエルカフェの無料査定をご利用ください！</p>
		</div>
	</section>

	<div class="section-inner mb-40">
		<?php get_template_part( 'template-parts/search-keyword-shop' );?>
	</div>

	<section class="boro_rolex3">
		<div class="section-inner">
			<p class="pt-24 txt1">ジュエルカフェが壊れた時計を<br><span class="color-red large">高価買取できる理由はここにあります！</span></p>
			<p class="txt2">なぜジュエルカフェが「壊れた」「ボロボロな」「動かない」「古い」「ジャンクな」ロレックス（ROLEX）腕時計を高価買取できるのか、その秘密は自社専用の修理工房があるから。<br>お客様からお買取した壊れたロレックスを原価で修理してから売却ルートに乗せるため、どんな状態であってもお買取することが可能になります。</p>
			<p class=""><img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/atmosphere1.jpg" alt="ボロボロロレックスでも高価買取"></p>
			<p class="txt3">一級時計修理技能士が在籍する<br>時計修理専門工房</p>
			<p class="txt2">ジュエルカフェ専用の時計修理工房には一級時計修理技能士が在籍。分解清掃などオーバーホールはもちろん、最新の設備と技術レベルの高い技能士によってキズの研磨やガラスの交換もすべて対応できます。</p>
			<p class="atmos_box d-f">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/atmosphere2.jpg" alt="ロレックス修理技師">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/atmosphere3.jpg" alt="ロレックス修理技師">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/atmosphere4.jpg" alt="ロレックス修理技師">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/atmosphere5.jpg" alt="ロレックス修理技師">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/atmosphere6.jpg" alt="ロレックス修理技師">
			</p>
		</div>
	</section>






	
			<?php
			/*買取事例*/
			
			$terms = get_the_terms($post->ID, 'area'); 
			

			if( is_array($terms) ){
			if (count($terms) == 1 && $kaitori_area_parent_id): 
			
			?>

				<?php
					$current_term = get_queried_object(  );
					$current_term_slug = $current_term->post_name;
					$current_term_id = $current_term->term_id;
					$current_term_name = $current_term->post_title;
				?>
				<div class="section-inner" style="margin-top:50px;">
					<section class="shop-area-city">
						<div class="common-ttl">
							<div class="section-inner">
								<h2 class="kaitori-title">
										<span class="common-ttl-sub">便利な場所に出店中！</span>
									<span class="common-ttl-main"><?php echo $post->post_title; ?>のジュエルカフェ一覧</span>
								</h2>
								<div class="common-ttl-en">Store location</div>
							</div>
						</div>
						<ul class="shop-area-city-list">
										<?php
											$child_taxonomy_slug = 'area';
											$child_post_type_slug = 'shop';
											$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
											$args = array(
												'post_type' => $child_post_type_slug,
												'posts_per_page' => -1,
												'post_parent' => 0,
												'orderby' => 'DESC',
												'paged' => $paged,
												'tax_query' => array(
													array(
														'taxonomy' => $child_taxonomy_slug,
														'field' => 'slug',
														'terms' => $current_term_slug
													)
												)
											);
											$the_query = new WP_Query($args); if($the_query->have_posts()):
										?>
										<?php while($the_query->have_posts()): $the_query->the_post();?>
											<li class="shop-area-city-item">
												<div class="shop-name bold"><?php echo $current_term_name;?> - <?php the_title();?></div>
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
													<div class="shop-opening d-f">営業時間<?php the_field('営業時間');?></div>
												</div>
												<?php if(get_field('一覧ページに載せるお知らせ')):?>
													<p class="shop-att"><?php the_field('一覧ページに載せるお知らせ');?></p>
												<?php endif;?>
												<div class="ta-r"><a class="pos-r bold color-red shop-detail-btn" href="<?php the_permalink( );?>">詳しくはこちら</a></div>
											</li>
										<?php
										endwhile;
										wp_reset_postdata(  );
										endif;
										?>
									</ul>
								</section>
							</div>
						<?php endif;?>
				<?php
				}
				
				/*買取事例*/
				?>









			<?php // 現在表示されている投稿と同じタームに分類された投稿を取得
				$taxonomy_slug = 'hinmoku'; // タクソノミーのスラッグを指定
				$post_type_slug = 'blog'; // 投稿タイプのスラッグを指定
				
				if($post->ID == 64){
					
					$post_id = 3288;
					
					$post_name = 'rolex';
		
				}else{
					
					$post_name = $post->post_name;
					
				}
				
				
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
				if($kaitori_area_parent_id):
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
						'posts_per_page' => 10, // 表示件数を指定
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

				if($the_query->have_posts()){
			?>
			<section class="kaitori-resuluts">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">リアルタイム!</span>
							<?php if($kaitori_area_parent_id):?>
								<span class="common-ttl-main"><?php echo $post->post_title.'の'.$custom_title; ?><span class="color-red">買取事例</span></span>
							<?php else:?>
								<span class="common-ttl-main"><?php echo $custom_title; ?><span class="color-red">買取事例</span></span>
							<?php endif;?>
						</h2>
						<div class="common-ttl-en">Purchase Results</div>
					</div>
				</div>



				<div class="section-inner">

					<?php if($kaitori_area_parent_id):?>

					<p class="lh-20"><?php the_title( ); ?>のジュエルカフェにて毎日数千件お買取させていただく切手買取実績をご紹介します。<br>切手のお買取でしたら、新品はもちろんのこと、古いもの・汚れのあるもの、どんなものでも丁寧に査定させていただきます。売れるかどうか不安でしたらまずはお気軽にお問い合わせください。</p>
					<?php else:?>

					<p class="lh-20">全国のジュエルカフェにて毎日数千件お買取させていただく<?php the_title( ); ?>商品をご紹介します。<br><?php the_title( ); ?>のお買取でしたら、新品はもちろんのこと、古いもの・汚れのあるもの、どんなものでも丁寧に査定させていただきます。売れるかどうか不安でしたらまずはお気軽にお問い合わせください。</p>

					<?php endif;?>


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
					<?php wp_reset_postdata(); ?>
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

			if ( file_exists( get_template_directory() .'/'. $template_file .'.php') ) :  get_template_part( $template_file );  endif;

		?>











			<section class="kaitori-policy">
				<div class="policy-inner section-inner">

					<div class="head flex -jscenter ls_15">
						<div class="common-ttl policy-ttl">
							<div class="section-inner">
								<h2 class="kaitori-title">
									<span class="common-ttl-sub">ジュエルカフェが</span>
									
									<?php if(is_single('junk-rolex')):?>
										<span class="common-ttl-main">
											<span class="marker-yellow"><span class="color-red">ボロボロの</span></span><br>
											<span class="marker-yellow"><span class="color-red"><?php echo $custom_title; ?>買取に</span></span><br>
											<span class="marker-yellow">強い理由</span></span>
									<?php endif;?>
									
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
											<div class="policy-img-txt-sub color-red"><?php echo $custom_title; ?>買取に強い理由</div>
											<div class="number">1</div>
										</div>
										<div class="policy-title"><h3>プロの査定スタッフ</h3></div>
										<div class="policy-text only-pc">ジュエルカフェではプロの査定スタッフが丁寧に査定いたします。最新の価格データ、市場相場を加味して自信を持って査定し、お客様にご満足いただける価格をご提示できるように日々努めております。</div>
									</div>
								</div>
							</div>
							<div class="policy-text only-sp">
								ジュエルカフェではプロの査定スタッフが丁寧に査定いたします。最新の価格データ、市場相場を加味して自信を持って査定し、お客様にご満足いただける価格をご提示できるように日々努めております。
							</div>

							<div class="policy-item d-f -alstretch">
								<div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-02.jpg" alt="海外に展開・独自販売ルートの確立"></div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php echo $custom_title; ?>買取に強い理由</div>
											<div class="number">2</div>
										</div>
										<div class="policy-title"><h3>海外に展開・独自販売ルートの確立</h3></div>
										<div class="policy-text only-pc">ジュエルカフェでは海外にも多数の営業拠点を展開。お買取した商品は国内外のネットワークを活かして販売に繋げるため、より高い高価買取を実現できます。</div>
									</div>
								</div>
							</div>
							<div class="policy-text only-sp">ジュエルカフェでは海外にも多数の営業拠点を展開。お買取した商品は国内外のネットワークを活かして販売に繋げるため、より高い高価買取を実現できます。</div>



							<div class="policy-item d-f -alstretch">
								<div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-03.jpg" alt="直営<?php echo get_option('shop'); ?>店舗の実績"></div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php echo $custom_title; ?>買取に強い理由</div>
											<div class="number">3</div>
										</div>
										<div class="policy-title"><h3>直営<?php echo get_option('shop'); ?>店舗の実績</h3></div>
										<div class="policy-text only-pc">ジュエルカフェでは直営店舗として<?php echo get_option('shop'); ?>店舗以上の店舗を展開し、これまでに延べ300万人以上のお客様にご利用いただいております。これからもお客様に信頼していただけるよう努めてまいります。</div>
									</div>
								</div>
							</div>
							<div class="policy-text only-sp">ジュエルカフェでは直営店舗として<?php echo get_option('shop'); ?>店舗以上の店舗を展開し、これまでに延べ300万人以上のお客様にご利用いただいております。これからもお客様に信頼していただけるよう努めてまいります。</div>



							<div class="policy-item d-f -alstretch">
								<div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-04.jpg" alt="様々な特典が利用可能"></div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php echo $custom_title; ?>買取に強い理由</div>
											<div class="number">4</div>
										</div>
										<div class="policy-title"><h3>様々な特典が利用可能</h3></div>
										<div class="policy-text only-pc">ジュエルカフェでは、ご来店時にご利用いただける様々な特典をご用意しており、リピーターのお客様にも大変お喜びいただいております。Tポイントやジュエリークリーニングなども大好評です。</div>
									</div>
								</div>
							</div>
							<div class="policy-text only-sp">ジュエルカフェでは、ご来店時にご利用いただける様々な特典をご用意しており、リピーターのお客様にも大変お喜びいただいております。Tポイントやジュエリークリーニングなども大好評です。</div>




							<div class="policy-item d-f -alstretch">
								<div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-05.jpg" alt="お近くのお店で気軽に無料査定"></div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php echo $custom_title; ?>買取に強い理由</div>
											<div class="number">5</div>
										</div>
										<div class="policy-title"><h3>お近くのお店で気軽に無料査定</h3></div>
										<div class="policy-text only-pc">ジュエルカフェは大型ショッピングモールや駅前商店街など便利なエリアにお店を展開。お買い物ついでに気軽に立ち寄れる居心地の良い空間を私たちは常に目指しております。</div>
									</div>
								</div>

							</div>
							<div class="policy-text only-sp">ジュエルカフェは大型ショッピングモールや駅前商店街など便利なエリアにお店を展開。お買い物ついでに気軽に立ち寄れる居心地の良い空間を私たちは常に目指しております。</div>

					</div>

				</div><!-- bg -->
			</section>







			<?php get_template_part( 'template-parts/kaitori-how-to-sell' );?>




		

					<?php get_template_part( 'template-parts/search-shop-new' );?>

		
		
		

	<div class="shop-result2 mt-10">
		
			<div class="loading-div2 loading-hide2">
				<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/css/ajax-loader.gif" alt="" />
			</div>
			
		
			<h3 class="ttl-box-red">検索結果 <span class="yellow">0</span>件</h3>
		
			<ul id="shop-res2">
				

			</ul>

	</div>

	</div>




	<?php if($kaitori_area_parent_id && (get_field('紹介アイテム名1'))): //品目-県ページ?>



<section class="search bg-beige">
	<div class="section-inner">


	<div class="common-ttl">
		<div class="section-inner">
			<h2 class="kaitori-title"> 
				<span class="common-ttl-sub"><?php echo $custom_title;?>買取</span> 
				<span class="common-ttl-main"><?php the_title();?>の<?php echo $custom_title;?>を<span class="color-red">ご紹介</span></span>
			</h2>
			<div class="common-ttl-en">Introducing famous <span class="capitalize"><?php echo $post->post_name;?></span> stamps</div>
		</div>
	</div>



<div class="latest-purchase-price">
  <div class="goods-list">

						<ul class="kaitori-famous-list">
							<?php

								for ($k=1; $k<=8; $k++) :

								if (get_field('紹介アイテム名'.$k)) :
							?>
								<li class="d-f">
									<?php /*?>
									<div class="kaitori-famous-label ta-c">
										<h3 class="small-font-size"><?php the_field('紹介アイテム名'.$k);?></h3>
									</div>
									<?php */?>

									<div class="kaitori-famous-img ta-c">
										<?php $famous_item_image = get_field('famous_image'.$k);?>
										<img src="<?php echo esc_url($famous_item_image['url']);?>" alt="<?php echo esc_attr($famous_item_image['alt']);?>">
									</div>

									<div class="kaitori-famous-text">
										<h3 class=""><?php the_field('紹介アイテム名'.$k);?></h3>
										<p><?php the_field('紹介アイテム本文'.$k);?></p>
									</div>


								</li>
							<?php
								endif;

								endfor;
							?>
						</ul>

						<style>
							.kaitori-famous-list li{border:1px solid #8f8f8f;border-radius:4px;padding:15px;background:#fff;margin-bottom:20px;}
							.kaitori-famous-list .kaitori-famous-text{padding-left:20px;}
							.kaitori-famous-text h3{font-size:20px;margin-bottom:10px;}
							.kaitori-famous-img{text-align:center;}
							.kaitori-famous-img img{max-width:166px;vertical-align:middle;}

							@media screen and (max-width: 768px) {

								.kaitori-famous-list .kaitori-famous-text{padding-left:10px;}
								.kaitori-famous-img img{width:100px;vertical-align:middle;}
								.kaitori-famous-text h3{font-size:17px;}

							}

						</style>

  </div>

</div>

</div>
</section>


			<?php endif;?>







			<section class="kaitori-voice">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">

							<?php if($kaitori_area_parent_id):?>
								<span class="common-ttl-sub"><?php echo $post->post_title;?>のジュエルカフェで<br><?php echo $custom_title; ?>買取をご利用いただいた</span>
							<?php else:?>
								<span class="common-ttl-sub">ジュエルカフェで<br><?php echo $custom_title; ?>買取をご利用いただいた</span>
							<?php endif;?>



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

				<div class="section-inner">
					<div class="voice-list2">

						<?php



							if( $kaitori_area_parent_id && $post->post_parent > 0 ){

								$post_id = $post->post_parent;


							}else{

								$post_id = $post->ID;

							}



							$voice_field_num = JC_get_field_num($post_id , 'お客様の声');



							for ($k=1; $k<=$voice_field_num; $k++) :

							if (get_field('お客様の声その'.$k.'_お客様タイトル',$post_id)) :



						?>
						<div class="voice-list-item">
							<div class="d-f media jc-sb">

								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">
<?php
	$ary = array("5.0", "4.9", "4.8");
	$key = array_rand($ary, 1);
	echo $ary[$key];
?>
										</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その'.$k.'_お客様タイトル',$post_id);?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php

											$content = get_field('お客様の声その'.$k.'_お客様の声',$post_id);

											echo strip_tags($content);

										?>
									</div>
								</div>
						</div>


						<?php
							endif;
							endfor;
						?>

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
							<?php if($kaitori_area_parent_id):?>
								<span class="common-ttl-sub"><?php echo $post->post_title.'の'.$custom_title; ?>買取</span>
							<?php elseif(is_single('junk-rolex')):?>
								<span class="common-ttl-sub">ボロボロの<?php echo $custom_title; ?>買取で</span>
							<?php else:?>
								<span class="common-ttl-sub"><?php echo $custom_title; ?>買取で</span>
							<?php endif;?>

							<span class="common-ttl-main"><span class="color-red">高く売る方法</span></span>


						</h2>
						<div class="common-ttl-en">Ways to make expensive purchase Results</div>
					</div>
				</div>
				<?php ?>
				<div class="kaitori-ways-list">
					<?php echo $kaitori_ways_field;?>
				</div>
			</section>







			<section class="kaitori-kinds">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">買取可能な</span>
							<?php
								// 階層によって見出しを分岐
								if($post->post_parent === 0){
									//品目親ページ
									echo '<span class="common-ttl-main">'.$custom_title.'の<span class="color-red">種類</span></span>';
								} elseif($kaitori_area_parent_id) { //品目-県ページ
									echo '<span class="common-ttl-main">'.$post->post_title.'の'.$custom_title.'の<span class="color-red">種類</span></span>';
								} else {
									$children_args = array(
										'post_parent'=> $post->ID,
										'post_type'  => 'kaitori'
									);
									if(!count(get_children($children_args)) && !$grand_child_terms_slug){ //現在の下階層ページかつ孫タームが紐付いてないとき

										//孫ページがない子ページ
										echo '<span class="common-ttl-main">'. get_post($parent_id)->post_title .'の<span class="color-red">種類</span></span>';
									} elseif (count(get_children($children_args)) > 0){

										//孫ページがある子ページ
										echo '<span class="common-ttl-main">'.get_the_title().'の<span class="color-red">種類</span></span>';
									} else {

										//孫ページ
										echo '<span class="common-ttl-main">'.esc_html($child_terms_name).'の<span class="color-red">種類</span></span>';
									}
								}
							?>
						</h2>
						<div class="common-ttl-en">Kinds we make expensive purchase</div>
					</div>
				</div>
				<div class="section-inner">
					<ul class="kaitori-kinds-list">

						<?php if($post->post_parent === 0 || $kaitori_area_parent_id): //親ページ、または品目-都道府県ページの処理

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
									$type_display = get_field('type_display', get_the_ID());
									
									if(get_the_ID() ==76147 ){continue;}
									
									if($type_display[0] == '1'){continue;}
								?>


								<li>
									<a href="<?php the_permalink();?>">
										<div class="kaitori-kinds-label ta-c">
											<h3 class="small-font-size"><?php the_title();?></h3>
										</div>
										<div class="kaitori-kinds-img ta-c">
										
											<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
											
												<img src="<?php echo $post_thumbnail;?>" alt="ボロボロなロレックス<?php the_title();?>も高価買取">

											<?php endif;?>
										
											
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
									
									if(get_the_ID() ==76147 ){continue;}
									
									if($type_display[0] == '1'){continue;}
								?>

									<?php
										$thumb = get_the_post_thumbnail($post->ID,'full');

										if(trim($thumb) !==''){
									?>

									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-label ta-c">
												<h3 class="small-font-size"><?php the_title();?></h3>
											</div>
											<div class="kaitori-kinds-img ta-c">
											
											<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
											
												<img src="<?php echo $post_thumbnail;?>" alt="ボロボロなロレックス<?php the_title();?>も高価買取">

											<?php endif;?>
											
											
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
									
									if(get_the_ID() ==76147 ){continue;}
									
									if($type_display[0] == '1'){continue;}
								?>


									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-label ta-c">
												<h3 class="small-font-size"><?php the_title();?></h3>
											</div>
											<div class="kaitori-kinds-img ta-c">
											
											<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
											
												<img src="<?php echo $post_thumbnail;?>" alt="ボロボロなロレックス<?php the_title();?>も高価買取">

											<?php endif;?>
											
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
									
									if(get_the_ID() ==76147 ){continue;}
									
									if($type_display[0] == '1'){continue;}
								?>
									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-label ta-c">
												<h3 class="small-font-size"><?php the_title();?></h3>
											</div>
											<div class="kaitori-kinds-img ta-c">
											
											
												<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
												
													<img src="<?php echo $post_thumbnail;?>" alt="ボロボロなロレックス<?php the_title();?>も高価買取">

												<?php endif;?>
											
											
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
							<span class="common-ttl-sub"><?php echo $custom_title; ?>買取の</span>
							<span class="common-ttl-main"><span class="color-red">お役立ち</span>コラム</span>
						</h2>
						<div class="common-ttl-en">Colums</div>
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
							<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'medium' )):?>
								
									<img src="<?php echo $post_thumbnail; ?>" alt="<?php echo get_the_title();?>"  />
									
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

.kaitori-column .slide-up {
  height: 450px;
  padding-bottom: 0;
  overflow: hidden;
}

@media screen and (min-width: 800px) {

	.kaitori-column .slide-up {
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

  position:relative;
  display: inline-block;
  color: #fff;
  cursor: pointer;
  background: #de1122;
  padding: 5px 20px;
  padding:10px 82px;
  border-radius: 50px;
  font-weight:bold;

}


.more-btn p:before{

	border-bottom:2px solid #fff;
	border-right:2px solid #fff;
	content:"";
	height:9px;
	position:absolute;
	right:24px;
	top:50%;
	transform:translateY(-50%) rotate(-45deg);
	width:9px;

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





.kaitori-policy .policy-item{margin-bottom:10px;margin-top:35px;align-items:center;}




.takuhaiSyuttyouKaitori>.left .head>.left{width:38%;}

.takuhaiSyuttyouKaitori>.right .head>.left{width:38%;}



.takuhaiSyuttyouKaitori>.left .head .right .kaitoriName{font-size:31px;}

.takuhaiSyuttyouKaitori>.right .head .right .kaitoriName{font-size:31px;}

.tentouKaitori .right .kaitoriName{font-size:31px;}


.tentouKaitori .right .txt1{font-size:14px;line-height:1.6;margin-top:10px;font-weight:normal;}

.takuhaiSyuttyouKaitori>.left .head .right .txt1{font-size:14px;line-height:1.6;margin-top:10px;}

.takuhaiSyuttyouKaitori>.right .head .right .txt1{font-size:14px;line-height:1.6;margin-top:10px;}



.takuhaiSyuttyouKaitori>.left .head{align-items:center;}

.takuhaiSyuttyouKaitori>.right .head{align-items:center;}



@media (min-width: 800px) {

	.kaitori-policy .policy-item{margin-bottom:35px;}

	.kaitori-policy .policy-item{align-items:flex-start;}


	.takuhaiSyuttyouKaitori>.left .head>.left{width:200px;}

	.takuhaiSyuttyouKaitori>.right .head>.left{width:200px;}


	.tentouKaitori .right .kaitoriName{font-size:42px;}

	.takuhaiSyuttyouKaitori>.left .head .right .kaitoriName{font-size:42px;}

	.takuhaiSyuttyouKaitori>.right .head .right .kaitoriName{font-size:42px;}


	.tentouKaitori .right .txt1{font-size:18px;line-height:1.6;}

	.takuhaiSyuttyouKaitori>.left .head .right .txt1{font-size:18px;line-height:1.6;}

	.takuhaiSyuttyouKaitori>.right .head .right .txt1{font-size:18px;line-height:1.6;}




}



.blog-archive-link{

	padding:10px 82px;

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
							<?php if($kaitori_area_parent_id):?>
								<span class="common-ttl-sub"><?php echo $post->post_title.'の'.$custom_title; ?>買取の</span>
							<?php elseif(is_single('junk-rolex')):?>
								<span class="common-ttl-sub">ボロボロの<?php echo $custom_title; ?>買取の</span>
							<?php else:?>
								<span class="common-ttl-sub"><?php echo $custom_title; ?>買取の</span>
							<?php endif;?>
							<span class="common-ttl-main">よくある<span class="color-red">ご質問</span></span>
						</h2>
						<div class="common-ttl-en">Faq</div>
					</div>
				</div>
				<div class="section-inner">

				<?php


					if($kaitori_area_parent_id){
						$post_id = $kaitori_area_parent_id;
					}else{
						$post_id = $post->ID;
					}


					for ($k=1; $k<=10; $k++) :

					if (get_field('よくあるご質問その'.$k.'_Q',$post_id)) :
				?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その'.$k.'_Q',$post_id); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その'.$k.'_A',$post_id); ?></div>
									</div>
								</dd>
							</dl>
						</div>
				<?php
					endif;

					endfor;
				?>



				</div>
			</section>


			<section class="kaitori-rank">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<?php if($kaitori_area_parent_id)://品目-県ページ?>
								<span class="common-ttl-sub"><?php echo $post->post_title.'の'.$custom_title; ?>買取の</span>
							<?php elseif(is_single('junk-rolex')):?>
								<span class="common-ttl-sub">ボロボロの<?php echo $custom_title; ?>買取の</span>
							<?php else:?>
								<span class="common-ttl-sub"><?php echo $custom_title; ?>買取の</span>
							<?php endif;?>
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
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-01.png" alt="ボロボロロレックス買取1位" style="max-width: 50px; opacity: 1;">
								</picture>
							</div>
							<?php if($kaitori_area_parent_id)://品目-県ページ?>
								<p class="kaitori-rank-item"><?php the_field('買取ランキング1位_タイトル', $kaitori_area_parent_id);?></p>
							<?php else: //品目ページ?>
								<p class="kaitori-rank-item"><?php the_field('買取ランキング1位_タイトル');?></p>
							<?php endif;?>
						</div>
						<?php if($kaitori_area_parent_id)://品目-県ページ?>
							<p class="kaitori-rank-txt"><?php the_field('買取ランキング1位_文章', $kaitori_area_parent_id);?></p>
						<?php else: //品目ページ?>
							<p class="kaitori-rank-txt"><?php the_field('買取ランキング1位_文章');?></p>
						<?php endif;?>
					</div>
					<div class="kaitori-rank-list">
						<div class="kaitori-rank-ttl d-f ai-c">
							<div class="kaitori-rank-medal">
								<picture>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-02.png" alt="ボロボロロレックス買取2位" style="max-width: 50px; opacity: 1;">
								</picture>
							</div>
							<?php if($kaitori_area_parent_id)://品目-県ページ?>
								<p class="kaitori-rank-item"><?php the_field('買取ランキング2位_タイトル', $kaitori_area_parent_id);?></p>
							<?php else: //品目ページ?>
								<p class="kaitori-rank-item"><?php the_field('買取ランキング2位_タイトル');?></p>
							<?php endif;?>
						</div>
						<?php if($kaitori_area_parent_id)://品目-県ページ?>
							<p class="kaitori-rank-txt"><?php the_field('買取ランキング2位_文章', $kaitori_area_parent_id);?></p>
						<?php else: //品目ページ?>
							<p class="kaitori-rank-txt"><?php the_field('買取ランキング2位_文章');?></p>
						<?php endif;?>
					</div>
					<div class="kaitori-rank-list">
						<div class="kaitori-rank-ttl d-f ai-c">
							<div class="kaitori-rank-medal">
								<picture>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-03.png" alt="ボロボロロレックス買取3位" style="max-width: 50px; opacity: 1;">
								</picture>
							</div>
							<?php if($kaitori_area_parent_id)://品目-県ページ?>
								<p class="kaitori-rank-item"><?php the_field('買取ランキング3位_タイトル', $kaitori_area_parent_id);?></p>
							<?php else: //品目ページ?>
								<p class="kaitori-rank-item"><?php the_field('買取ランキング3位_タイトル');?></p>
							<?php endif;?>
						</div>
						<?php if($kaitori_area_parent_id)://品目-県ページ?>
							<p class="kaitori-rank-txt"><?php the_field('買取ランキング3位_文章', $kaitori_area_parent_id);?></p>
						<?php else: //品目ページ?>
							<p class="kaitori-rank-txt"><?php the_field('買取ランキング3位_文章');?></p>
						<?php endif;?>
					</div>
				</div>
			</section>






			<?php
				/**/
				if( get_field('歴史文章' ) !=='' ){
			?>
			<?php if($kaitori_area_parent_id):?>
				<section class="kaitori-history">
					<div class="common-ttl">
						<div class="section-inner">
							<h2 class="kaitori-title">
								<span class="common-ttl-sub"><?php echo $custom_title; ?>買取</span>
								<span class="common-ttl-main"><?php the_title();?>の<span class="color-red">歴史</span>と<? echo $custom_title;?>買取</span>
							</h2>
							<div class="common-ttl-en">History</div>
						</div>
					</div>
					<div class="section-inner">
						<div class="kaitori-howto-txt">
							<?php the_field('歴史文章');?>
						</div>
					</div>
				</section>
			<?php endif;?>
		<?php
			}
		?>





		<section class="kaitori-howto">
		<div class="common-ttl">
			<div class="section-inner">
				<h2 class="kaitori-title">
					<span class="common-ttl-sub">ボロボロの<?php echo $custom_title; ?>買取</span>
					<span class="common-ttl-main">今週の<span class="color-red"><?php echo $custom_title; ?></span>豆知識</span>
				</h2>
				<div class="common-ttl-en">HOW TO TIPS</div>
			</div>
		</div>
		<div class="section-inner">
			<div class="kaitori-howto-item d-f">
				<h3 class="kaitori-howto-item-title"><?php echo $title_kaitori_howto;?></h3>
				<?php $image_kaitori_howto; if(!empty($image_kaitori_howto)):?>
					<img src="<?php echo esc_url($image_kaitori_howto['url']);?>" alt="<?php echo esc_html($image_kaitori_howto['url']);?>">
				<?php endif;?>
			</div>
			<div class="kaitori-howto-txt">
				<?php echo $sentense_kaitori_howto;?>
			</div>
		</div>
		</section>

	<?php get_template_part( 'template-parts/common-tab' );?>

	<?php get_footer( );?>
