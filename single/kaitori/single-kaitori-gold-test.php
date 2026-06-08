<?php
/*
Template Name: 品目詳細ページ 金 専用
*/

?>


<?php get_header();?>

<?php


					$today_sql = "
(
  SELECT *
  FROM `wp_goldchart`
  WHERE DATE(STR_TO_DATE(`gold_time`, '%Y-%m-%d %H:%i:%s')) = CURDATE()
  ORDER BY STR_TO_DATE(`gold_time`, '%Y-%m-%d %H:%i:%s') DESC
  LIMIT 1
)
UNION ALL
(
  SELECT *
  FROM `wp_goldchart`
  WHERE DATE(STR_TO_DATE(`gold_time`, '%Y-%m-%d %H:%i:%s')) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)
  ORDER BY STR_TO_DATE(`gold_time`, '%Y-%m-%d %H:%i:%s') DESC
  LIMIT 1
)
ORDER BY STR_TO_DATE(`gold_time`, '%Y-%m-%d %H:%i:%s') DESC
";

$today_result = $wpdb->get_results($today_sql);



//$kaitori_breadcrumb2 = kaitori_breadcrumb2();



?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>



<?php /* パンくずリスト　※footerで設置済
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
		"name": "金・貴金属買取"
      }]
    }
</script>
 */ ?>

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




<!--
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
!-->

<?php
// post_idの取得と検証
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();

// FAQデータを配列として構築
$faq_items = [];
for ($k = 1; $k <= 10; $k++) {
    $question = get_field('よくあるご質問その'.$k.'_Q', $post_id);
    if ($question) {
        $answer = get_field('よくあるご質問その'.$k.'_A', $post_id);
        $faq_items[] = [
            '@type' => 'Question',
            'name' => strip_tags($question),
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => strip_tags($answer)
            ]
        ];
    }
}

// JSONとして出力(FAQが存在する場合のみ)
if (!empty($faq_items)) {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $faq_items
    ];
    echo '<script type="application/ld+json">';
    echo wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    echo '</script>';
}
?>



<?php

	$getgoldcoment =  GetGoldComent();



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
					<img src="<?php echo esc_url($image_fv_pc['url']);?>" alt="金買取ならジュエルカフェ" >
					<?php endif;?>
				</div>
				<div class="only-sp">
					<?php $image_fv_sp = get_field('fv_image_sp'); if(!empty($image_fv_sp)):?>
					<img src="<?php echo esc_url($image_fv_sp['url']);?>" alt="金買取ならジュエルカフェ" >
					<?php endif;?>
				</div>
<?php */ ?>

<section class="mv">

	<?php get_template_part( 'template-parts/gold_main_visual' );?>	


	<div class="contents">
		<div class="image-wrap">
			<picture>
				<source srcset="<?php echo esc_url(get_field('fv_image_sp')['url']);?>" media="(max-width: 1000px)" type="image/jpg">
				<img src="<?php echo esc_url(get_field('fv_image_pc')['url']);?>" alt="金買取">
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
	


		<section class="kaitori-intro section-inner mt-20">
		
			<?php get_template_part( 'template-parts/intro-kaitori-newparents' );?>
			
		</section>





<?php /* ?>古い相場速報　→しばらくしたら削除する
<div class="gold_banner_wrapper">
	<ul class="gold_banner">
		<li class="left_box">
			<h2 class="date"><?php echo date('Y年m月d日');?></h2>
<?php if(is_single('k24')): ?>
		<h2 class="breaking_news type2">24金相場速報</h2>
<?php elseif(is_single('k23')): ?>
		<h2 class="breaking_news type2">23金相場速報</h2>
<?php elseif(is_single('k22')): ?>
		<h2 class="breaking_news type2">22金相場速報</h2>
<?php elseif(is_single('k21.6')): ?>
		<h2 class="breaking_news type2">21.6金相場速報</h2>
<?php elseif(is_single('k20')): ?>
		<h2 class="breaking_news type2">20金相場速報</h2>
<?php elseif(is_single('k18')): ?>
			<h2 class="breaking_news type2">18金相場速報</h2>
<?php elseif(is_single('k14')): ?>
			<h2 class="breaking_news type2">14金相場速報</h2>
<?php elseif(is_single('k12')): ?>
			<h2 class="breaking_news type2">12金相場速報</h2>
<?php elseif(is_single('k10')): ?>
			<h2 class="breaking_news type2">10金相場速報</h2>
<?php elseif(is_single('k9')): ?>
			<h2 class="breaking_news type2">9金相場速報</h2>
<?php elseif(is_single('k8')): ?>
			<h2 class="breaking_news type2">8金相場速報</h2>
<?php else:?>
			<h2 class="breaking_news">金相場速報</h2>
<?php endif;?>
		</li>
		<li class="right_box">
			<div class="newest">最新価格相場</div>
			<div class="price">
				<strong>
				
				
					<?php if(is_single('k24')): ?>
						<?php echo number_format($today_result[0]->k24_price);?>
					<?php elseif(is_single('k22')): ?>
						<?php echo number_format($today_result[0]->k22_price);?>
					<?php elseif(is_single('k18')): ?>
						<?php echo number_format($today_result[0]->k18_price);?>
					<?php else:?>
						<?php echo number_format($today_result[0]->gold_price);?>
					<?php endif;?>
				</strong>&nbsp;円&nbsp;/g
			</div>
		</li>
	</ul>
</div>
<?php */ ?>






<?php /* ?>
<div class="gold_souba_banner">
	<div class="content">
		<div class="title_box">
			<p class="text">歴史的高騰が続いています!</p>
			<h2 class="title">金相場速報</h2>
		</div>
		<div class="today_box">
			<div class="today_date">2024年10月08日</div>
			<div class="the_day_before_box">
				<div class="balloon">
					<p class="text2">前日比</p>
					<div class="value_the_day_before">-94<span class="en">円</span></div>
				</div>
			</div>
			<div class="value_today">13,749<span class="en">&nbsp;円/g</span></div>
		</div>
		<div class="past_box">
			<div class="text3">過去価格と比べて大幅高騰!</div>
			<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/gold_souba_line.svg" alt="ライン" />
			<ul class="past_flex">
				<li>
					<div class="last_year_date">2022年10月08日</div>
					<div class="value_last_year">8,710<span class="en">&nbsp;円/g</span></div>
				</li>
				<li>
					<div class="the_year_before_last_date">2023年10月08日</div>
					<div class="value_the_year_before_last">9,512<span class="en">&nbsp;円/g</span></div>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php */ ?>







<?php if ( current_user_can('administrator') ): ?>
<section id="gold-market-chart" class="section-inner">
	<div class="toolbar">
		<button id="btn_1m">1ヶ月</button>
		<button id="btn_1y">1年</button>
		<button id="btn_5y">5年</button>
		<button id="btn_10y" class="active">10年</button>
	</div>
	<div id="gold-chart"></div>
</section>

  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <script>
    // --- 1. 各期間のデータ ---
    
	// 1ヶ月分のデータ
    var data1Month = {
      prices: [
        24100, 24150, 24220,
        24180, 24300, 24250, 24380, 24400, 
        24320, 24390, 24450, 24520, 24480,
        24550, 24600, 24510, 24350, 24624
      ],
      dates: [
        '5/1',  '5/2',  '5/7', 
        '5/8',  '5/11', '5/12', '5/13', '5/14', 
        '5/15', '5/18', '5/19', '5/20', '5/21', 
        '5/22', '5/25', '5/26', '5/27', '5/28'
      ]
    };

    // 1年分のデータ（月ごとの推移など）
    var data1Year = {
      prices: [16700, 17200, 18500, 19800, 21000, 22500, 24100, 24624],
      dates: ['25年5月', '25年7月', '25年9月', '25年11月', '26年1月', '26年3月', '26年5月', '5/28']
    };

    // 5年分のデータ（年ごとの推移）
    var data5Years = {
      prices: [8300, 9600, 12700, 18500, 24624],
      dates: ['2022年', '2023年', '2024年', '2025年', '2026年(現在)']
    };

    // 10年分のデータ
    var data10Years = {
      prices: [4657, 4852, 4824, 5244, 6608, 6934, 8301, 9601, 12758, 18505, 24624],
      dates: ['2016年', '2017年', '2018年', '2019年', '2020年', '2021年', '2022年', '2023年', '2024年', '2025年', '2026年']
    };

    // --- 2. グラフの初期設定 ---
    var options = {
      chart: {
        type: 'area',
        height: 350,
        animations: { enabled: true }, // 切り替え時に動くアニメーションをON
		toolbar: { show: false } // 右上のメニューやズームボタンを一式非表示
      },
	  colors: ['#D4AF37'],
      series: [{
        name: '金相場価格',
        data: data10Years.prices // 初期データ
      }],
      xaxis: {
        categories: data10Years.dates // 初期の日付
      },
      yaxis: {
        labels: {
          formatter: function (val) { return val.toLocaleString() + " 円"; }
        }
      },
      stroke: { curve: 'smooth', width: 3 },
      tooltip: {
        y: { formatter: function (val) { return val.toLocaleString() + " 円 / g"; } }
      }
    };

    // グラフの描画
    var chart = new ApexCharts(document.querySelector("#gold-chart"), options);
    chart.render();

    // --- 3. タブ切り替えのロジック ---
    
    // データを書き換えてグラフを更新する共通の関数
    function updateChartData(newData, buttonId) {
      // 1. すべてのボタンからactiveを消す
      document.querySelectorAll('.toolbar button').forEach(btn => btn.classList.remove('active'));
      // 2. クリックされたボタンの色を変える
      document.getElementById(buttonId).classList.add('active');
      
      // 3. ApexChartsのデータとX軸のラベルを瞬時に書き換える（ここが肝です）
      chart.updateOptions({
        series: [{ data: newData.prices }],
        xaxis: { categories: newData.dates }
      });
    }

    // 各ボタンをクリックしたときの動作を登録
    document.getElementById('btn_1m').addEventListener('click', function() {
      updateChartData(data1Month, 'btn_1m');
    });

    document.getElementById('btn_1y').addEventListener('click', function() {
      updateChartData(data1Year, 'btn_1y');
    });

    document.getElementById('btn_5y').addEventListener('click', function() {
      updateChartData(data5Years, 'btn_5y');
    });

    document.getElementById('btn_10y').addEventListener('click', function() {
      updateChartData(data10Years, 'btn_10y');
    });

  </script>
<?php endif; ?>
















		<?php get_template_part('template-parts/market-price-chart-gold' , null , $getgoldcoment); ?>






		<section class="">
	
			<?php
				$top_banner = get_field('top-banner');

				$top_banner_sp = get_field('top-banner_sp');
				
			?>
	
			<div class="main-banner">
				<div class="only-pc">
					<?php if(!empty($top_banner['url'])):?>
					<img src="<?php echo esc_url($top_banner['url']);?>" alt="来店予約で<?php the_title(); ?>買取成約のお客様に20000円キャッシュバックキャンペーン" >
					<?php endif;?>
				</div>
				<div class="only-sp">
					<?php if(!empty($top_banner_sp['url'])):?>
					<img src="<?php echo esc_url($top_banner_sp['url']);?>" alt="来店予約で<?php the_title(); ?>買取成約のお客様に20000円キャッシュバックキャンペーン" >
					<?php endif;?>
				</div>
			</div>

		</section>
			
			
			
		<div class="d-b ta-c mb-60 mt-20">
			<a href="/kaitori/gold/souba/" class="blog-archive-link">金・貴金属の<br class="sp">相場情報はこちら</a>
		</div>
			
		<section class="kaitori-result mb-0">
			<?php
				get_template_part( 'template-parts/new-common-kaitori-results' ,null,$today_result);
			?>
		</section>






			<?php // 現在表示されている投稿と同じタームに分類された投稿を取得
				$taxonomy_slug = 'hinmoku'; // タクソノミーのスラッグを指定
				$post_type_slug = 'blog'; // 投稿タイプのスラッグを指定
				
				$post_name = $post->post_name;


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
				
				

				if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):
					$blog_slug = get_post($kaitori_area_parent_id)->post_name;
				endif;
				
				
				

				//追加
				if( isset($currnet_terms_slug) == false){

					$current_terms_slug[] = $post_terms[0]->slug; // タームのスラッグを配列に追加

				}

				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):
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
					<h2>最新の金買取商品を紹介</h2>
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

							if(isset($alt_img_arr[1]) && $alt_img[1] !== ''){
							
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
								
								<?php
									$post_thumbnail = str_replace(' ','%20',$post_thumbnail);
								?>
								
									<source type="image/webp" data-srcset="<?php echo $post_thumbnail;?>" srcset="<?php echo $post_thumbnail;?>">
									<img class="blog-detail-img ls-is-cached lazyloaded" src="<?php echo $post_thumbnail;?>" alt="blog画像<?php echo $image_alt_title;?>" data-eio="p" data-src="<?php echo $post_thumbnail;?>" decoding="async">
								<?php else:?>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="">
								<?php endif;?>
							</picture>
						</a>
						
						<div class="right">
							<h3 class="blog-archive-ttl">
								<a href="<?php the_permalink() ?>"><?php echo mb_convert_kana(get_the_title(), "rnas"); ?></a>
							</h3>
							<div class="blog-archive-date">公開日：<?php the_time('Y/m/d');?></div>
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
									<span>店頭買取</span>
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


		<div class="d-b ta-c mb-20 mt-20">

			<a href="https://jewel-cafe.jp/blog/gold/" class="blog-archive-link">速報！金・貴金属の買取実績一覧</a>

		</div>

<br><br>
		
<?php if ( current_user_can('administrator') ): ?><?php endif; ?>
		<section class="mt-80 mb-80">
			<div class="section-inner">

				<div class="point-title" bis_skin_checked="1">

					<div class="point-title-inner d-f ai-c" bis_skin_checked="1">
						<div class="point-kuma" bis_skin_checked="1"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" alt=""></div>
						<div class="only-sp" bis_skin_checked="1">
							ジュエルカフェの<br>
							金・貴金属買取ポイント
						</div>
					</div>

					<div class="point-bg" bis_skin_checked="1">
						<p class="only-pc">ジュエルカフェの金・貴金属買取ポイント</p>
						<h2>純度・品位別で金製品を探す</h2>
					</div>

				</div>


				<div class="main_gold_products">
					<details>
						<summary>主な金買取製品</summary>
						<div class="content">
							<ul>
							
						<?php 
							$args = array(
								'post_type' => 'kaitori',
								'posts_per_page' => -1,
								'post_parent' => $post->ID,
								'no_found_rows' => true,
								'order' => 'DESC',
								'orderby' => $post->ID,
								'tax_query' => array(
									array(
										'taxonomy' => 'area',
										'field' => 'slug',
										'terms' => array('okinawa', 'kanto', 'kansai', 'hokkaido', 'tohoku', 'hokuriku', 'chubu', 'chugoku', 'shikoku', 'kyusyu'),
										'operator' => 'NOT IN'
									)
								)
							);
							
							$the_query = new WP_Query($args); 
							
							if($the_query->have_posts()):
							
								while($the_query->have_posts()): $the_query->the_post();
								
										if($post->post_name == 'shop' || $post->post_name == 'souba'){ continue; }

								?>
								<li>
									<a href="<?php the_permalink();?>">
										<div class="kaitori-kinds-label ta-c">
											<div class="product"><?php the_title();?></div>
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
					</details>
				</div>



				
			</div>
		</section>

		
		

		<section class="mb-40">
			<div class="section-inner">
				

					<div class="point-title" bis_skin_checked="1">

					<div class="point-title-inner d-f ai-c" bis_skin_checked="1">
						<div class="point-kuma" bis_skin_checked="1"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" alt=""></div>
						<div class="only-sp" bis_skin_checked="1">
							ジュエルカフェの<br>
							金・貴金属買取ポイント
						</div>
					</div>

					<div class="point-bg" bis_skin_checked="1">
						<p class="only-pc">ジュエルカフェの金・貴金属買取ポイント</p>
						<h2>金を売るなら今がおすすめ</h2>
					</div>

					</div>


				<p>
金相場はここ数年で急激に上昇し、1グラムあたり23,000円を超えるなど過去最高値水準で推移しています。1998年頃には1グラム1,000円前後だった時期もあり、当時と比較すると金価格は20倍以上に上昇しました。このような背景から、金の売却や現金化を検討し、ジュエルカフェにご来店いただくお客様が増えています。<br>
純金インゴットだけでなく、18金・14金のジュエリー、壊れたアクセサリー、小さな金製品でも、最新の金相場をもとに査定が可能です。デザインや流行に左右されにくい点も、金買取の大きな魅力といえます。相場は常に変動するため、金相場が高水準にある「いま」こそ、使っていない金を納得のいく価格で売却・現金化するチャンスです。
				</p>

				
			</div>
		</section>
	


	
	
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
								<h2><?php the_title();?>買取で高く売る方法を紹介</h2>
							</div>
							
						</div>

				

				
			
				<div class="kaitori-inner-ways">
				<?php
					$custom_title = $custom_title ?? null;
					
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
			
			$custom_title = $custom_title ?? null;
			
			$example = [
			  'custom_title' => $custom_title,
			  'post_title' => $post->post_title,
			  'post_number' => '04'
			];
			
		?>
		<section class="kaitori-reason">
			<?php get_template_part( 'template-parts/kaitori-new-policy',null,$example );?>
		</section>










<?php /* ?><?php */ ?>
		<section class="mb-40 mt-60">
			<div class="section-inner">

				<div class="point-title" bis_skin_checked="1">

					<div class="point-title-inner d-f ai-c" bis_skin_checked="1">
						<div class="point-kuma" bis_skin_checked="1"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" alt=""></div>
						<div class="only-sp" bis_skin_checked="1">
							ジュエルカフェの<br>
							金・貴金属買取ポイント
						</div>
					</div>

					<div class="point-bg" bis_skin_checked="1">
						<p class="only-pc">ジュエルカフェの 金・貴金属買取ポイント</p>
						<h2>純度・品位がわからない金製品の買取も<br>ご相談可能です</h2>
					</div>

				</div>
				

					
				<h3 class="mb-10" style="font-size:16px;">純度・品位別の金製品の特徴</h3>
				<div style="overflow-x: auto;">


					<table class="purity_features_table">
						<thead>
							<tr>
								<th>品位</th>
								<th>純度</th>
								<th>刻印</th>
								<th>主な買取商品</th>
								<th>特徴</th>
								<th>買取価格との関係</th>
							</tr>
						</thead>
							<tr>
								<td>24金<br>(K24)</td>
								<td><span class="nowrap">約99.9%</span>以上</td>
								<td>K24 / 24K / 純金 / FINE GOLD / 999</td>
								<td>金貨、インゴット、資産用地金、一部の記念品</td>
								<td>金の含有量がほぼ100%で、金そのものの価値を重視した品位。非常に柔らかく、日常的に身につけると変形しやすいため装飾品には不向き。資産保有や保存目的で選ばれることが多い。（金のインゴット・記念金貨など）</td>
								<td>金相場の影響を最も強く受け、買取価格が最も高い。</td>
							</tr>
							<tr>
								<td>22金<br>(K22)</td>
								<td><span class="nowrap">約91.7%</span></td>
								<td>K22 / 22K / 916</td>
								<td>金貨（海外）、アジア・中東のジュエリー</td>
								<td>24金に近い高純度を保ちながら、他金属を少量加えることで適度な硬さを持つ。深みのある濃い金色が特徴で、装飾性と資産性の両立が可能。海外市場で多く流通している。（海外流通の金貨・装飾用バングルなど）</td>
								<td>24金に次いで高評価で、重量がそのまま価格に反映されやすい。</td>
							</tr>
							<tr>
								<td>18金<br>(K18)</td>
								<td><span class="nowrap">約75%</span></td>
								<td>K18 / 18K / 750</td>
								<td>高級ジュエリー、ブランドアクセサリー、時計部品</td>
								<td>純度と強度のバランスが非常に良く、傷や変形に強いため長く使える。変色もしにくく、日本国内のジュエリーで最も一般的な品位。デザイン性の高い製品にも多く使われる。（指輪・ネックレス・ブレスレットなど）</td>
								<td>流通量が多く、安定した高水準の買取価格がつきやすい。</td>
							</tr>
							<tr>
								<td>14金<br>(K14)</td>
								<td><span class="nowrap">約58.5%</span></td>
								<td>K14 / 14K / 585</td>
								<td>ファッションジュエリー、海外アクセサリー</td>
								<td>金以外の金属の割合が増えるため硬度が高く、衝撃や摩耗に強い。価格が比較的抑えられ、日常使いしやすい点が特徴。金色はやや淡く落ち着いた印象になる。（普段使いのアクセサリーなど）</td>
								<td>純度分だけ価格は下がるが、金として問題なく買取対象。</td>
							</tr>
							<tr>
								<td>10金<br>(K10)</td>
								<td><span class="nowrap">約41.7%</span></td>
								<td>K10 / 10K / 417</td>
								<td>カジュアルアクセサリー、量産品</td>
								<td>金の含有量が少なく、軽量で硬いのが特徴。価格が手頃なため入門用として選ばれやすいが、金特有の色味や資産性は控えめ。装飾性重視の製品に多い。（量産アクセサリー・小物など）</td>
								<td>純度が低いため単価は控えめだが、しっかり金価格で査定される。</td>
							</tr>
					</table>


				</div>

			</div>
		</section>


	
	


	
			<section class="kaitori-kinds more-btn-outer">

				<div class="section-inner bold ta-c">

					<h2 class="section-ttl-main bold"> <?php the_title(); ?>  買取商品一覧</h2>
				
				</div>


				<div class="section-inner">
					<ul class="kaitori-kinds-list">

						<?php 
						
		
						if($post->post_parent === 0 || $kaitori_area_parent_id): //親ページ、または品目-都道府県ページの処理

							$current_hinmoku_term = get_the_terms( $post->ID, 'hinmoku' );
							if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id){
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
								'orderby' => 'ID',
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
								
									if($post->post_name == 'shop'){ continue; }
								
								
									$type_display = get_field('type_display', get_the_ID());

									if(isset($type_display[0]) && $type_display[0] == '1' || get_the_ID() == 87115){continue;}
								
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

									if($type_display[0] == '1'){continue;}
								?>

									<?php
										$thumb = get_the_post_thumbnail($post->ID,'full');

										if(trim($thumb) !==''){
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
							<?php endif;?>
						<?php endif;?>
					</ul>
				</div>
				
				<div class="more-btn only-sp ta-c">
					<p class="open">もっと見る</p>
				</div>
				
				
			</section>








<section class="appraiser">
<div class="section-inner">

<?php
	$texts = [
		'title' => 'ジュエルカフェの<br class="sp">〈 金買取 〉査定士紹介',
		'name' => '原田査定士',
		'image' => 'appraiser',
		'hinmoku' => '時計',
		'brand' => 'チューダー',
		'hobby' => 'カラオケ・旅行',
		'voice' => 'ジュエルカフェでは、多様なお品物を取り扱う中で、お客様に安心してご利用いただけることを第一に考えております。査定士として知識や技術の習得に尽力するのはもちろんですが、同時にお品物ひとつひとつに込められた背景や価値を探ることを大切にしています。<br>お客様に安心して査定をお任せいただける存在を目指し、ご納得いただける確かな査定額をご案内することが私達の使命です。ご来店いただいた時間の中で、できる限りの信頼関係を築き、お気持ちに寄り添ったサービスを提供できるよう努めてまいります。どうぞよろしくお願いいたします。
'
	];
?>

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
		<div class="title"><?php echo $texts['title'];?></div>
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





<section class="anything pink_bg mt-40">
	<div class="section-inner mt-40">
		<div class="title_wrapper">
			<h2 class="title">どんな状態の金でも<br class="sp">買取いたします</h2>
		</div>
		<ul class="item_list">
			<li>
				<div class="set">
					<div class="photo"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/gold_anything_item_01.png" alt="切れたネックレス" ></div>
					<div class="name">切れたネックレス</div>
				</div>
				<p class="message">壊れているもの、使えないものも「金」なら高価買取いたします！</p>
			</li>
			<li>
				<div class="set">
					<div class="photo"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/gold_anything_item_02.png" alt="はずれた「金歯」" ></div>
					<div class="name">はずれた「金歯」</div>
				</div>
				<p class="message">「金歯」が金製品として売れるなんて！という声をよくいただきます！</p>
			</li>
			<li>
				<div class="set">
					<div class="photo"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/gold_anything_item_03.png" alt="ネーム入りの指輪" ></div>
					<div class="name">ネーム入りの指輪</div>
				</div>
				<p class="message">結婚指輪やペアリングなど、イニシャルの刻印がある物もお買取OK!</p>
			</li>
			<li>
				<div class="set">
					<div class="photo"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/gold_anything_item_04.png" alt="50年前のジュエリー" ></div>
					<div class="name">50年前のジュエリー</div>
				</div>
				<p class="message">古いデザインでも金の価値は変わりません！状態問わずお持ちください。</p>
			</li>
			<li>
				<div class="set">
					<div class="photo"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/gold_anything_item_05.png" alt="金メガネフレーム" ></div>
					<div class="name">金メガネフレーム</div>
				</div>
				<p class="message">レンズが外れたり、ツルが曲がってしまったり金のメガネフレームも!</p>
			</li>
			<li>
				<div class="set">
					<div class="photo"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/gold_anything_item_06.png" alt="片方だけのピアス" ></div>
					<div class="name">片方だけのピアス</div>
				</div>
				<p class="message">片方なくしてしまったピアス、捨てる前にお持ち下さい！</p>
			</li>
			<li>
				<div class="set">
					<div class="photo"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/gold_anything_item_07.png" alt="工業・歯科材料" ></div>
					<div class="name">工業・歯科材料</div>
				</div>
				<p class="message">工業用・歯科スクラップも買取強化中!今がチャンスです！</p>
			</li>
			<li>
				<div class="set">
					<div class="photo"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/gold_anything_item_08.png" alt="仏具・金工芸品" ></div>
					<div class="name">仏具・金工芸品</div>
				</div>
				<p class="message">「おりん」や「仏像」「金杯」など金でできた仏具、大歓迎です！</p>
			</li>
		</ul>
	</div>
</section>










			<?php get_template_part( 'template-parts/kaitori-verification-document' );?>






		<section class="kaitori-how-to-sell">
<?php /* ?>  施策ID 44-4
			<?php 
				$example = [
					'post_number' => '05'
				];
				get_template_part( 'template-parts/kaitori-new-how-to-sell',null,$example );
			?>
<?php */ ?>

			<?php get_template_part( 'template-parts/kaitori-how-to-sell' );?>


		</section>






			<?php get_template_part( 'template-parts/search-shop-new' );?>
		
		
		

		

		
		<section class="kaitori-voice mb-20">
		
			<?php get_template_part( 'template-parts/kaitori-new-voice' );?>
			


		</section>

			






<?php
$con=mysqli_connect("localhost", "xs931070_column", "KJhsadkJHKAS12d", "xs931070_newcolumn");


if(mysqli_connect_errno()){

	echo "Connection Fail".mysqli_connect_error();

}


//  カテゴリに関連付けられた投稿を取得
$category_id = $con->query("SELECT term_id FROM `wp_terms` WHERE slug = '{$post->post_name}'")->fetch_assoc()['term_id'];

if ($category_id) {
    // "tokei" カテゴリに属する投稿を取得
				$query = "SELECT p.* FROM `wp_posts` p
					INNER JOIN `wp_term_relationships` tr ON p.ID = tr.object_id
					WHERE tr.term_taxonomy_id = $category_id
					AND p.post_status = 'publish' AND p.post_type = 'post'
					ORDER BY p.post_modified DESC LIMIT 8";


	if( $post->post_name == 'gold' ){
		
		$query = "SELECT * FROM wp_posts WHERE ID IN (2409, 252, 827, 2393, 632, 664)";		
		
	}



    $result = $con->query($query);
    
    $number = 1; 




?>

			
			<section class="kaitori-column mt-40">
			
			<div class="red_bg">
				<div class="section-inner">
				
					<div class="red-bar d-f bold column-title">
						<div class="red-bar-title color-white">
							<h2>
							<?php echo trim(get_the_title()).'の';
							
								if(is_single('gold') == false){
							
									echo '<br class="only-sp">';
							
								}
								
								echo 'お役立ちコラム';
							?>
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
							
							<a href="/column/<?php echo $post->post_name;?>/<?php echo $row['post_name'];?>/">
							<?php
							
								$thumbnail_id = $con->query("SELECT * FROM `wp_postmeta` where post_id = '{$row['ID']}'  and meta_key = '_thumbnail_id'")->fetch_assoc()['meta_value'];

								if($thumbnail_id > 0 ){
									
									$thumbnail_src = $con->query("SELECT * FROM `wp_posts` where ID = {$thumbnail_id}")->fetch_assoc()['guid'];
									
									
									echo '<img src="'.$thumbnail_src.'" alt="'.get_the_title().'" >';
						
								}else{
									
									echo '<img src="'. esc_url(get_template_directory_uri()). '/assets/images/common/mascot.svg" alt="">';
									
								}			
												
							?>
							</a>							
							
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
	
			
			
				<div class="d-b ta-c mb-20 mt-20">

					<a href="https://jewel-cafe.jp/column/category/gold/" class="blog-archive-link">金・貴金属のコラム一覧</a>

				</div>
	


		
		

		<?php
			
			$kaitori_faq = [
			  'custom_title' => $custom_title,
			  'post_id' => $post->ID,
			];
			
		?>
		
		<section class="kaitori-faq more-btn-outer">
			<?php get_template_part( 'template-parts/kaitori-new-faq',null,$kaitori_faq );?>
			<div class="more-btn only-sp ta-c">
				<p class="open">もっと見る</p>
			</div>
		</section>

	
		<div class="d-b ta-c mb-20 mt-20">

			<a href="https://jewel-cafe.jp/qa/" class="blog-archive-link">よくある質問一覧はこちら</a>

        </div>
		








		<?php
		
			$custom_title = $custom_title ?? null;
		
			$kaitori_rank = [
			  'custom_title' => $custom_title,
			];
			
		?>
		
		<section class="kaitori-rank">
			<?php get_template_part( 'template-parts/kaitori-new-rank',null,$kaitori_rank );?>
		</section>
		
		
		
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
		
		<section class="kaitori-howto-tips justify">
			<?php get_template_part( 'template-parts/kaitori-new-how-to-tips',null,$howto_tips );?>
		</section>
		
	<?php
		*/
	?>




<?php get_footer();?>