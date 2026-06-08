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






<?php if(is_single('k18')): ?>
	<style>
		@media screen and (max-width: 990px) {
			.kaitori-kinds-list.column9 li {
				width: 24%;
			}
		}
		@media screen and (min-width: 1000px) {
			.kaitori-kinds-list.column9 li {
				width: 10%;
			}
		}
	</style>
<?php endif;?>

<?php

$today_sql = "select * from `wp_goldchart` ORDER BY `wp_goldchart`.`id` DESC limit 0,2";

$today_result = $wpdb->get_results($today_sql);





	$getgoldcoment =  GetGoldComent();

	

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


<?php if (!str_contains($_SERVER['REQUEST_URI'], '/gold/')):  ?>
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<?php endif;?>



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
			</style>
			<?php kaitori_breadcrumb();?>
		</section>
	</div>

	
	<div class="main-section" style="margin-bottom:30px;">
	
<?php
	$parent_id = $post->post_parent;
	$slug = get_post($post->ID)->post_name;
	$parent_slug = get_post($parent_id)->post_name;
?>

<?php if($parent_slug != 'vuitton' && $parent_slug != 'gold' && $parent_slug != 'letter-top'):?>
	<div class="only-pc">
		<?php if(!empty($image_fv_pc)):?>
		<img src="<?php echo esc_url($image_fv_pc['url']);?>" alt="<?php echo $post->post_title;?>買取ならジュエルカフェへ" >
		<?php endif;?>
	</div>
	<div class="only-sp">
		<?php if(!empty($image_fv_sp)):?>
		<img src="<?php echo esc_url($image_fv_sp['url']);?>" alt="<?php echo $post->post_title;?>買取ならジュエルカフェへ" >
		<?php endif;?>
	</div>
<?php endif;?>




<?php if( $parent_slug == 'gold' || $parent_slug == 'vuitton' || $parent_slug == 'letter-top'):?>
	<section class="mv">
		<div class="contents">
			<div class="image-wrap">
				<picture>
					<source srcset="<?php echo esc_url(get_field('fv_image_sp')['url']);?>" media="(max-width: 1000px)" type="image/jpg">
					<img src="<?php echo esc_url(get_field('fv_image_pc')['url']);?>">
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




<?php
	
	if( $parent_slug == 'gold') :
?>

<section class="kaitori-method red_bg">

	<?php get_template_part( 'template-parts/common-kaitori-method' );?>		

</section>

<?php endif;?>






<?php if(is_single('k18')):?>
<style>
	.features_wrap{
		> .title{
			font-size:36px;
			text-align:center;
			margin-bottom:10px;
		}
	}
	@media screen and (max-width:1000px){
		.features_wrap{
			> .title{
				font-size:18px;
			}
		}	
	}
</style>

	<div class="section-inner features_wrap mt-40">
<h1 class="title">18金(K18)買取ならジュエルカフェ！</h1>
<p class="content">18金は美しい光沢と優れた耐久性を持ち、他の金属と混ぜることで色や強度を調整しやすいため、ジュエリーや宝飾品に最も多く使われる貴金属です。
金含有率75%、イエロー・ホワイト・ピンクなどのカラーで作られ、結婚指輪やネックレス、ブレスレットなど、高級感を求めるアイテムに広く使用されます。アレルギー反応も少なく、長く愛用できることから、価値ある投資としても人気です。</p>
</div>

<?php else:?>

<section class="kaitori-intro section-inner mt-20">

	<?php
		get_template_part( 'template-parts/intro-kaitori-newparents' );
	?>

</section>

<?php endif;?>



<br><br>


<?php /* ?>古い相場速報　→しばらくしたら削除する
<?php

	if( $parent_slug == 'gold' || $post->post_name == 'gold' ) :
?>

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
<?php elseif(is_single('k21_6')): ?>
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
					<?php elseif(is_single('k23')): ?>
						<?php echo number_format($today_result[0]->k23_price);?>
					<?php elseif(is_single('k22')): ?>
						<?php echo number_format($today_result[0]->k22_price);?>
					<?php elseif(is_single('k21_6')): ?>
						<?php echo number_format($today_result[0]->k21_6_price);?>
					<?php elseif(is_single('k20')): ?>
						<?php echo number_format($today_result[0]->k20_price);?>
					<?php elseif(is_single('k18')): ?>
						<?php echo number_format($today_result[0]->k18_price);?>
					<?php elseif(is_single('k14')): ?>
							<?php echo number_format($today_result[0]->k14_price);?>
					<?php elseif(is_single('k12')): ?>
							<?php echo number_format($today_result[0]->k12_price);?>
					<?php elseif(is_single('k10')): ?>
							<?php echo number_format($today_result[0]->k10_price);?>
					<?php elseif(is_single('k9')): ?>
							<?php echo number_format($today_result[0]->k9_price);?>
					<?php elseif(is_single('k8')): ?>
							<?php echo number_format($today_result[0]->k8_price);?>
					<?php else:?>
						<?php echo number_format($today_result[0]->gold_price);?>
					<?php endif;?>
				</strong>&nbsp;円&nbsp;/g
			</div>
		</li>
	</ul>
</div>


<?php
	endif;
?>
<?php */ ?>







<?php if(is_single('junk-rolex')): ?>
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
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item1.png" alt="ベルトがない">
					<p class="txt">ベルトがない</p>
				</div>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item2.png" alt="動かない">
					<p class="txt">動かない</p>
				</div>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item3.png" alt="ガラス割れ">
					<p class="txt">ガラス割れ</p>
				</div>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item4.png" alt="部品だけある">
					<p class="txt">部品だけある</p>
				</div>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item5.png" alt="水没した">
					<p class="txt">水没した</p>
				</div>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item6.png" alt="サビている">
					<p class="txt">サビている</p>
				</div>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item7.png" alt="年代も不明">
					<p class="txt">年代も不明</p>
				</div>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/boro_item8.png" alt="大きなダメージ">
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
			<p class=""><img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/atmosphere1.jpg"></p>
			<p class="txt3">一級時計修理技能士が在籍する<br>時計修理専門工房</p>
			<p class="txt2">ジュエルカフェ専用の時計修理工房には一級時計修理技能士が在籍。分解清掃などオーバーホールはもちろん、最新の設備と技術レベルの高い技能士によってキズの研磨やガラスの交換もすべて対応できます。</p>
			<p class="atmos_box d-f">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/atmosphere2.jpg">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/atmosphere3.jpg">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/atmosphere4.jpg">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/atmosphere5.jpg">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/kaitori/junk-rolex/atmosphere6.jpg">
			</p>
		</div>
	</section>





<?php else:?>

<?php endif;?>




<?php 

	if( $parent_slug == 'gold' ){
		
		get_template_part('template-parts/market-price-chart-gold' , null , $getgoldcoment); 
	
	}

	

?>


<?php if(is_single('platinum')): ?>
	<?php //get_template_part('template-parts/market-price-chart-platinum'); ?>
<?php endif;?>






<?php if(!(is_single('junk-rolex'))): ?>
			<?php
				$wp_obj = get_queried_object( );
				$parent = $wp_obj->post_parent;
				$terms = get_the_terms($wp_obj->ID, 'hinmoku');
				
				
				if( is_array($terms) ){
					
					
				foreach ($terms as $term) {
					if($term->parent === 0) {
						$parent_terms_slug = $term->slug;
						$parent_terms_id = $term->term_id;
						$parent_terms_name = $term->name;
					}
				}

				foreach ($terms as $term) {
					if ($term->parent === $parent_terms_id) {
						$child_terms_slug = $term->slug;
						$child_terms_id = $term->term_id;
						$child_terms_name = $term->name;
					}
				}

				if(count($terms) === 3) {
					foreach ($terms as $term) {
						if ($term->parent === $child_terms_id) {
							$grand_child_terms_slug = $term->slug;
							$grand_child_terms_name = $term->name;
						}
					}
				}
				
				}
				
				if($parent === 0):
			?>
				<section class="intro section-inner">
					<?php get_template_part( 'template-parts/intro-kaitori-parents' );
					?>
				</section>
			<?php elseif(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):?>
				<section class="intro section-inner">
					<?php get_template_part( 'template-parts/intro-area-category' );?>
				</section>
			<?php elseif(is_single('k18')):?>
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
			<?php else:?>
				

				
				
			<?php endif;?>
<?php endif;?>








<?php

$arr[] = 3242;
$arr[] = 3262;
$arr[] = 3263;
$arr[] = 49369;
$arr[] = 3264;
$arr[] = 3252;
$arr[] = 3254;
$arr[] = 3250;
$arr[] = 3246;
$arr[] = 3245;
$arr[] = 3248;
$arr[] = 3255;
$arr[] = 3251;
$arr[] = 3257;
$arr[] = 3256;
$arr[] = 3249;
$arr[] = 3258;
$arr[] = 3259;
$arr[] = 3260;
$arr[] = 3253;
$arr[] = 3261;
$arr[] = 3497;
$arr[] = 4747;
$arr[] = 4773;
$arr[] = 4774;
$arr[] = 4775;
$arr[] = 4777;
$arr[] = 4776;
$arr[] = 4778;
$arr[] = 4779;
$arr[] = 4780;
$arr[] = 4781;
$arr[] = 4782;
$arr[] = 3520;
$arr[] = 3522;
$arr[] = 3521;
$arr[] = 3523;
$arr[] = 3524;
$arr[] = 3525;
$arr[] = 3526;
$arr[] = 3527;
$arr[] = 3528;
$arr[] = 3529;
$arr[] = 3530;
$arr[] = 3472;
$arr[] = 3510;
$arr[] = 3511;
$arr[] = 3512;
$arr[] = 3513;
$arr[] = 3514;
$arr[] = 3515;
$arr[] = 3516;
$arr[] = 3517;
$arr[] = 3518;
$arr[] = 3519;
$arr[] = 3532;
$arr[] = 3531;
$arr[] = 3533;
$arr[] = 3538;
$arr[] = 3540;
$arr[] = 3537;
$arr[] = 3534;
$arr[] = 3535;
$arr[] = 3542;
$arr[] = 3541;
$arr[] = 3543;
$arr[] = 3544;
$arr[] = 3545;
$arr[] = 3536;
$arr[] = 3539;
$arr[] = 3547;
$arr[] = 3546;
$arr[] = 3592;
$arr[] = 3594;
$arr[] = 3597;
$arr[] = 3593;
$arr[] = 3604;
$arr[] = 3602;
$arr[] = 3598;
$arr[] = 3603;
$arr[] = 3605;
$arr[] = 3596;
$arr[] = 3600;
$arr[] = 3599;
$arr[] = 3601;
$arr[] = 3595;
$arr[] = 151;
$arr[] = 3288;
$arr[] = 3383;
$arr[] = 3384;
$arr[] = 3385;
$arr[] = 3387;
$arr[] = 3388;
$arr[] = 3386;
$arr[] = 3390;
$arr[] = 3389;
$arr[] = 3395;
$arr[] = 3393;
$arr[] = 3394;
$arr[] = 3391;
$arr[] = 3397;
$arr[] = 3396;
$arr[] = 3398;
$arr[] = 3392;
$arr[] = 3308;
$arr[] = 3399;
$arr[] = 3400;
$arr[] = 3401;
$arr[] = 3402;
$arr[] = 3403;
$arr[] = 9260;
$arr[] = 3409;
$arr[] = 3413;
$arr[] = 3410;
$arr[] = 3414;
$arr[] = 3412;
$arr[] = 3420;
$arr[] = 3415;
$arr[] = 3417;
$arr[] = 3418;
$arr[] = 3416;
$arr[] = 3411;
$arr[] = 3419;
$arr[] = 3421;
$arr[] = 3422;
$arr[] = 3423;
$arr[] = 3424;
$arr[] = 3425;

?>		




			<?php if(is_single('rolex') || $post->ID == 151){ ?>
				<div class="section-inner mt-20">
					<?php get_template_part( 'template-parts/search-watch' );?>
				</div>
			<?php }else if(in_array($post->ID,$arr)){ ?>
				<div class="section-inner mt-40">
					<?php get_template_part( 'template-parts/search-watch2' );?>
				</div>
			<?php
				}
			?>



<?php /* ?> 一時的に非表示
			<?php if($parent_terms_slug === 'diamond'): // 共通?>
				<?php get_template_part( 'template-parts/diamond-simulator' );?>
			<?php endif;?>
<?php */ ?>

			<div class="section-inner">
				<?php
					if( get_field('is_show') ){
						get_template_part( 'template-parts/market-price-tokei' );
					}
				?>
			</div>



	<?php

		if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id > 0 ){

		if(get_post($kaitori_area_parent_id)->post_name  == 'letter'||get_post($kaitori_area_parent_id)->post_name  == 'card'){

	?>


	<style>
		.jc_info{display:flex;}
		.jc_kuma img{width:100px;}
		.jc_title{line-height:80px;border-bottom:1px solid #de1122;font-size:30px;font-weight:bold;padding-left:15px;}

		.u-b{text-decoration: underline;line-height:22px;}
		.city_intro{background:#fef8f8;border-radius:10px;padding:30px;margin-top:30px;}
		.city_con{font-size:14px;padding:15px 0px;}

		.city-ttl{font-weight:bold;font-size:20px;text-align:center;padding:15px 0px;clear:both;}
		.city_content{ background:#fff;padding:30px;font-size:12px;}


		@media (max-width:767px) {

			.city_intro{padding:25px;}
			.jc_kuma img{width:50px;margin-top:10px;}
			.jc_title{font-size:20px;line-height:30px;}
			.city-ttl{font-size:15px;text-align:left;}
			.city_content{padding:15px;}

		}
	</style>



	<section class="section-inner">

		<div class="city_intro">

			<?php
				if(get_post($kaitori_area_parent_id)->post_name  == 'card'){
			?>
			<div class="jc_info">
			<span class="jc_kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/jewelkuma_200.png" alt="" /></span>
			<span class="jc_title"><?php echo $post->post_title;?>で、金券・商品券の買取・換金を承ります！</span>
			</div>
			<div class="city-ttl">ジュエルカフェはお買物に便利な場所に展開しています！ぜひお気軽にお立ち寄り下さい！</div>
			<?php
				}else{
			?>
			<div class="jc_info">
			<span class="jc_kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/jewelkuma_200.png" alt="" /></span>
			<span class="jc_title"><?php echo $post->post_title;?>全域で、切手買取を承ります！</span>
			</div>
			<div class="city-ttl">ジュエルカフェのお店はもちろん、<span class="u-b">宅配買取</span>・<span class="u-b">出張買取</span>もお気軽にご相談下さい。</div>
			<?php }?>




			<div class="city_con">
				<?php
					echo get_field('買取受付エリア');
				?>
			</div>


			<div class="city_content">

				<?php
					echo nl2br(get_field('県の情報'));
				?>
			</div>

		</div>

		<?php


		if(get_post($kaitori_area_parent_id)->post_name  == 'letter'){

			$post_t = "切手";

		}else if(get_post($kaitori_area_parent_id)->post_name  == 'card'){

			$post_t = "金券";

		}

		?>

		<div class="blog-archive-linkWrapper"> <a href="/kaitori/letter/" class="blog-archive-link">ジュエルカフェの<?php echo $post_t;?>買取総合ページはこちら</a></div>

	</section>
	<?php
		}

		}
	?>






			<?php
			
			$terms = get_the_terms($post->ID, 'area'); 

			?>
			<?php

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
					?>





			<?php if ($purchase_title && !is_single('junk-rolex') && !is_single('k18')):?>
			<section class="ex-purchase">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">ジュエルカフェの</span>
							<span class="common-ttl-main"><span class="color-red"><?php echo $post->post_title;?>買取価格</span><br>を他社と比較してください！</span>
						</h2>
						<div class="common-ttl-en">Expensive Purchase</div>
					</div>
				</div>
				<div class="section-inner">
					<p class="lh-20">
						<?php echo $purchase_desc;?>
					</p>
					<?php
						if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):
							get_template_part( 'template-parts/ex-purchase-area-category' );
						else:


							get_template_part( 'template-parts/ex-purchase' );


						endif;
						?>
				</div>
			</section>
			<?php endif;?>






			<?php


				//品目ページ
				if ( $post->post_type =='kaitori' && isset($parent_terms_slug)):

					//子ページ
					if( $post->post_parent > 0  && $parent_terms_slug == 'tokei'){


							$template_file = 'template-parts/tokei-one-price-accordion';

					}else if( $post->post_parent > 0  && $parent_terms_slug == 'brand' ){


							$template_file = 'template-parts/brand-one-price-accordion';



					}else if( $post->post_parent > 0  && $parent_terms_slug == 'card'){

							if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):
								$template_file = 'template-parts/card-all-price-accordion';
							else:
								$template_file = 'template-parts/card-one-price-accordion';
							endif;
					}else{

							$template_file = 'template-parts/' . $post->post_name . '-all-price-accordion';

					}



					//if(is_single('k18')){
					if( $parent_terms_slug == 'gold' ){

						get_template_part( 'template-parts/new-common-kaitori-results' );							
							
					}else{
						
						get_template_part( 'template-parts/common-kaitori-results' );
						
					}
					
		
				endif;

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
				
				

				if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):
					$blog_slug = get_post($kaitori_area_parent_id)->post_name;
				endif;
				
				
				

				//追加
				if( isset($post_terms[0]) && isset($currnet_terms_slug) == false){

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
						),
			
					);
					
				else:
				
					if(is_single('k18')){
						
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
							'filter_titles' => true					
						);
						
				
					}else{
					
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
					
					}
					
					
				endif;
				

				$the_query = new WP_Query($args);
				$count = 1;
				if($the_query->have_posts()){
			?>
			<section class="kaitori-resuluts">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">リアルタイム!</span>
							<?php if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):?>
								<span class="common-ttl-main"><?php echo $post->post_title.'の'.$custom_title; ?><span class="color-red">買取実績</span></span>
							<?php else:?>
								<span class="common-ttl-main"><?php echo $custom_title; ?><span class="color-red">買取実績</span></span>
							<?php endif;?>
						</h2>
						<div class="common-ttl-en">Purchase Results</div>
					</div>
				</div>



				<div class="section-inner">

					<?php if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):?>


					<p class="lh-20"><?php the_title( ); ?>のジュエルカフェにて毎日数千件お買取させていただく切手買取実績をご紹介します。<br>切手のお買取でしたら、新品はもちろんのこと、古いもの・汚れのあるもの、どんなものでも丁寧に査定させていただきます。売れるかどうか不安でしたらまずはお気軽にお問い合わせください。</p>
					<?php else:?>

					<p class="lh-20">全国のジュエルカフェにて毎日数千件お買取させていただく<?php the_title( ); ?>商品をご紹介します。<br><?php the_title( ); ?>のお買取でしたら、新品はもちろんのこと、古いもの・汚れのあるもの、どんなものでも丁寧に査定させていただきます。売れるかどうか不安でしたらまずはお気軽にお問い合わせください。</p>

					<?php endif;?>



				<div class="txtarea-js">
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
					<p class="read-more"><span></span></p>
</div>

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
			
			
			

			//if ( file_exists( get_template_directory() .'/'. $template_file .'.php') ) :  get_template_part( $template_file );  endif;

		?>





			<section class="kaitori-policy">
				<div class="policy-inner section-inner pb-20">

					<div class="head flex -jscenter ls_15">
						<div class="common-ttl policy-ttl">
							<div class="section-inner">
								<h2 class="kaitori-title">
						
									<?php if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):?>
										<span class="common-ttl-main">
											<span class="marker-yellow">
												<span class="color-red"><?php echo $post->post_title.'の';?></span>
											</span>
											<br>
											<span class="marker-yellow">
												<span class="color-red"><?php echo $custom_title;?>買取</span>に
												<br>
												<span class="marker-yellow">ジュエルカフェが<br>強い理由</span>
											</span>
									<?php elseif(is_single('junk-rolex')):?>
										<span class="common-ttl-main"><span class="marker-yellow"><span class="color-red">ボロボロの</span></span><br><span class="marker-yellow"><span class="color-red"><?php echo $custom_title; ?>買取に</span></span><br><span class="marker-yellow">ジュエルカフェが<br>強い理由</span></span>
									<?php else:?>
										<span class="common-ttl-main"><span class="marker-yellow"><span class="color-red"><?php echo $custom_title; ?>買取</span>に</span><br><span class="marker-yellow">ジュエルカフェが<br>強い理由</span></span>
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


						<?php if(is_single('k18')):?>
							<style>
								.ex-purchase ul.ex-purchase-list{margin-bottom:50px;}
								.ex-purchase ul.ex-purchase-list li{padding:20px!important;}
							</style>
							<section class="ex-purchase">
								<div class="common-ttl">
									<div class="section-inner">
										<h4 class="kaitori-title">
											<span class="common-ttl-sub">ジュエルカフェは</span>
											<span class="common-ttl-main"><span class="color-red"><?php echo $post->post_title;?>買取価格</span><br>を他社と比較してください！</span>
										</h4>
										<div class="common-ttl-en">Expensive Purchase</div>
									</div>
								</div>
								<div class="section-inner" style="width:auto;">
									<p class="lh-20">
										<?php echo $purchase_desc;?>
									</p>
									<?php
										if(isset($kaitori_area_parent_id)):
											get_template_part( 'template-parts/ex-purchase-area-category' );
										else:


											get_template_part( 'template-parts/ex-purchase' );


										endif;
										?>
								</div>
							</section>
						<?php endif;?>







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
								<div class="policy-img">
									<?php if(is_single(['k24', 'k22', 'k20', 'k18', 'k14', 'k10'])):?>
										<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-05b.jpg" alt="手数料無料で気軽に相談可能">
									<?php else:?>
										<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-05.jpg" alt="お近くのお店で気軽に無料査定">
									<?php endif;?>
								</div>
								<div class="policy-item-inner">
									<div class="policy-img-txt">
										<div class="policy-img-txt-number tac fc_red flex">
											<div class="policy-img-txt-sub color-red"><?php echo $custom_title; ?>買取に強い理由</div>
											<div class="number">5</div>
										</div>
										<div class="policy-title">
											<h3>
												<?php if(is_single(['k24', 'k22', 'k20', 'k18', 'k14', 'k10'])):?>
													手数料無料で気軽に相談可能
												<?php else:?>
													お近くのお店で気軽に無料査定
												<?php endif;?>
											</h3>
										</div>
										<div class="policy-text only-pc">
											<?php if(is_single(['k24', 'k22', 'k20', 'k18', 'k14', 'k10'])):?>
												ジュエルカフェでは、査定料・手数料はすべて無料です。「これは売れるの？」「いくらくらいになる？」といったご相談だけでも大歓迎ですので、初めての方も安心してお気軽にご利用ください。
											<?php else:?>
												ジュエルカフェは大型ショッピングモールや駅前商店街など便利なエリアにお店を展開。お買い物ついでに気軽に立ち寄れる居心地の良い空間を私たちは常に目指しております。
											<?php endif;?>
										</div>
									</div>
								</div>

							</div>
							<div class="policy-text only-sp">
								<?php if(is_single(['k24', 'k22', 'k20', 'k18', 'k14', 'k10'])):?>
									ジュエルカフェでは、査定料・手数料はすべて無料です。「これは売れるの？」「いくらくらいになる？」といったご相談だけでも大歓迎ですので、初めての方も安心してお気軽にご利用ください。
								<?php else:?>
									ジュエルカフェは大型ショッピングモールや駅前商店街など便利なエリアにお店を展開。お買い物ついでに気軽に立ち寄れる居心地の良い空間を私たちは常に目指しております。
								<?php endif;?>
							</div>

					</div>

				</div><!-- bg -->
			</section>




			<?php	
				if( $parent_slug !== 'diamond' ){
			?>
			<section class="intro section-inner rr">
					<?php get_template_part( 'template-parts/intro-kaitori-children' );?>
			</section>
			<?php
				}
			?>



			<?php get_template_part( 'template-parts/kaitori-how-to-sell' );?>
			<?php get_template_part( 'template-parts/kaitori-verification-document' );?>


		<?php
			/*
		?>
			<div class="section-inner">
				<div class="search-shop" data-uniq-id="609bb70d69164">
					<?php get_template_part( 'template-parts/search-shop' );?>
				</div>
			</div>
		<?php
			*/
		?>



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

		






			<?php if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id && (get_field('紹介アイテム名1'))): //品目-県ページ?>



<section class="search bg-beige">
	<div class="section-inner">


	<div class="common-ttl"><div class="section-inner"><h2 class="kaitori-title"> <span class="common-ttl-sub"><?php echo $custom_title;?>買取</span> <span class="common-ttl-main"><?php the_title();?>の<?php echo $custom_title;?>を<span class="color-red">ご紹介</span></span></h2><div class="common-ttl-en">Introducing famous <span class="capitalize"><?php echo $post->post_name;?></span> stamps</div></div></div>





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

						<?php if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):?>
							<span class="common-ttl-sub bold"><?php echo $post->post_title;?>のジュエルカフェで</span>
						<?php else:?>
							<span class="common-ttl-sub bold">ジュエルカフェで</span>
						<?php endif;?>

						<h2 class="kaitori-title">
							<span class="common-ttl-sub"><?php echo $custom_title; ?>買取をご利用いただいた</span>
							<span class="common-ttl-main">お客様の<span class="color-red">声</span></span>
						</h2>

						<div class="common-ttl-en">Customer's Voice</div>
					</div>
				</div>

				<div class="rating py-4 mb-20">
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


<?php if (str_contains($_SERVER['REQUEST_URI'], '/gold/')): // URLに /gold/ が含まれているページはスライド形式 ?>
	<link rel="stylesheet" href="/wp-content/themes/jewelcafe_replace/assets/css/new-style.css"/>
	<?php get_template_part( 'template-parts/kaitori-new-voice' );?>
<?php else:?>
	<div class="section-inner">
		<div class="voice-list2">
			<?php
				if( isset($kaitori_area_parent_id) && $kaitori_area_parent_id && $post->post_parent > 0 ){
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
				<div class="voiceBox remove">
					<div class="voiceBox-inner">
						<?php
							$content = get_field('お客様の声その'.$k.'_お客様の声',$post_id);
							echo strip_tags($content);
						?>
						<?php if(is_single('k18') || $post->post_parent > 0 && $parent_terms_slug == 'diamond'):?>
							<div class="reply-wrap">
								<div><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/common/staff.png" alt="買取対応した店舗スタッフ" decoding="async" class=" lazyloaded"></div>
								<div style="border: 1px dotted #cc0000; padding: 10px 15px; background: #FFEBEB;">
									<?php
										$content_staff = get_field('お客様の声その'.$k.'_スタッフの声',$post_id);
										echo strip_tags($content_staff);
									?>
								</div>
							</div>
						<?php endif;?>
					</div>
				</div>
			</div>
			<?php
				endif;
				endfor;
			?>
		</div>
	</div>
<?php endif;?>


			</section>






			<?php if(is_single('diamond')): //ダイヤモンドトップ ?>
				<?php get_template_part( 'template-parts/diamond-4c' );?>
			<?php endif;?>


			<section class="kaitori-ways section-inner">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<?php if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):?>
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



<?php if( is_single( array('k18', 'k10', 'k14', 'k20', 'k22', 'k24') ) ): ?>
	<div class="kaitori">
		<section class="anything pink_bg mt-40">
			<div class="section-inner mt-40">
				<div class="title_wrapper">
					<h2 class="title">どんな状態の<?php echo preg_replace('/\(.*?\)/', '', $custom_title); ?>でも<br class="sp">買取いたします</h2>
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
	</div>
<?php endif; ?>

	
	
	<section class="kaitori-kinds more-btn-outer">

				
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-main">
								<?php 
								
								if( !is_single('k18') ){
								
									echo get_post( $post->post_parent )->post_title;
									
								}

								?>
								
							<span class="color-red">買取商品一覧</span>
								
							</span>
						</h2>
					</div>
				</div>


				<div class="section-inner">
					<ul class="kaitori-kinds-list">

						<?php 
						
		
						if(isset($kaitori_area_parent_id) && $post->post_parent === 0 ): //親ページ、または品目-都道府県ページの処理

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

									if($type_display[0] == '1' || get_the_ID() == 87115){continue;}
								
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

									if($type_display[0] == '1'){continue;}
									
									
									if($post->post_name == 'shop' || $post->post_name == 'souba'){continue;}
									
								
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
									$type_display = get_field('type_display', get_the_ID());

									if($type_display[0] == '1'){continue;}
									
									if($post->post_name == 'shop' || $post->post_name == 'souba'){continue;}
									
									
								?>


									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-img ta-c"><?php ?>
												<?php the_post_thumbnail( 'full' );?>
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
									'post__not_in' => array($post->ID),
									'post_parent' => $wp_obj->post_parent,
									'no_found_rows' => true,
								);
								
								$the_query = new WP_Query($args); if($the_query->have_posts()):
								?>
								<?php while($the_query->have_posts()): $the_query->the_post();?>

								<?php
									$type_display = get_field('type_display', get_the_ID());
			
									if(isset($type_display[0]) && $type_display[0] == '1'){continue;}
									
									if($post->post_name == 'shop' || $post->post_name == 'souba'){continue;}
									
									if( in_array($post->post_name , $city_arr) ){ continue; }
																							
							?>
									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-img ta-c">
												<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="<?php echo get_the_title();?>"  />
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
							<?php endif;?>
						<?php endif;?>
					</ul>
				</div>
				
				<div class="more-btn only-sp ta-c">
					<p class="open">もっと見る</p>
				</div>
				
			</section>


			
			<?php
			
					$args = array(
					  'post_parent' => get_the_ID(),
					  'post_status' => 'publish',
					  'post_type'   => 'kaitori'
					);
					$children_array = get_children( $args );
					
					
				if($post->ID !== 3532 && count( $children_array ) > 0 ){

					
			?>
			
			

			
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
									if(get_the_ID() ==76147 ){continue;}
								
									$type_display = get_field('type_display', get_the_ID());

									if($type_display[0] == '1'){continue;}
								?>


								<li>
									<a href="<?php the_permalink();?>">
										<div class="kaitori-kinds-label ta-c">
											<h3 class="small-font-size"><?php the_title();?></h3>
										</div>
										<div class="kaitori-kinds-img ta-c">
											<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="<?php echo get_the_title();?>買取"  />
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
												<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="<?php echo get_the_title();?>買取"  />
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
											<div class="kaitori-kinds-img ta-c"><?php ?>
												<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="<?php echo get_the_title();?>買取"  />
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
												<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="<?php echo get_the_title();?>買取"  />
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
				}
			?>
	




			<?php
			$con=mysqli_connect("localhost", "xs931070_column", "KJhsadkJHKAS12d", "xs931070_newcolumn");


			if(mysqli_connect_errno()){

				echo "Connection Fail".mysqli_connect_error();

			}
		
		
			//$parent_slug = get_post_field('post_name', $post->post_parent);
		


			//  カテゴリに関連付けられた投稿を取得
			$result = $con->query("SELECT term_id FROM wp_terms WHERE slug = '{$post->post_name}'");
			if ($result && $row = $result->fetch_assoc()) {
				$category_id = $row['term_id'];
			} else {
				$category_id = null; // 또는 기본값 설정
			}


			if ($category_id) {
				
				if( is_single('k18') ){
				
					$query = "SELECT p.* FROM `wp_posts` p
						INNER JOIN `wp_term_relationships` tr ON p.ID = tr.object_id
						WHERE tr.term_taxonomy_id = $category_id
						AND p.post_status = 'publish' AND p.post_type = 'post' 
						AND p.post_title LIKE '%18金%'
						ORDER BY p.post_modified DESC LIMIT 8";

				}else{
					
					$query = "SELECT p.* FROM `wp_posts` p
						INNER JOIN `wp_term_relationships` tr ON p.ID = tr.object_id
						WHERE tr.term_taxonomy_id = $category_id
						AND p.post_status = 'publish' AND p.post_type = 'post'
						ORDER BY p.post_modified DESC LIMIT 8";
					
				}



				$result = $con->query($query);
				
				$number = 1; 



			?>



			<section class="kaitori-column more-btn-outer">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub"><?php the_title();?>買取の</span>
							<span class="common-ttl-main"><span class="color-red">お役立ち</span>コラム</span>
						</h2>
						<div class="common-ttl-en">Colums</div>
					</div>
				</div>


				<div class="section-inner">
				
				
					<?php 
					if ($result->num_rows > 0) {
						
						while ($row = $result->fetch_assoc()) {
					?>
			


					<a href="/column/<?php echo $post->post_name;?>/<?php echo $row['post_name'];?>/">
						<div class="d-f">
							<div class="kaitori-info">
								<div class="kaitori-ttl color-black bold mb-4"><h3><?php echo $row['post_title'];?></h3></div>
								<div class="kaitori-txt color-black"><?php echo mb_substr(strip_tags($row['post_content']), 0, 50) . '...';?></div>
							</div>
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
						</div>
					</a>
					<?php
							}
						}
						
					?>	
						
						

				</div>

				<div class="more-btn only-sp ta-c">
					<p class="open">もっと見る</p>
				</div>

						
					<?php	
						
}
					?>



			</section>

<?php if(is_single('k18')): ?>
			<section class="engraving">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-main">18金(K18)の<span class="color-red">刻印</span><br>国別表記と見分け方</span>
						</h2>
					</div>
				</div>
				<div class="section-inner">
					<p class="text">18金製品には、金の含有量を示す刻印が必ず施されていますが、表記方法は国や地域によって異なります。「K18」「750」「Au750」など、一見わかりにくい刻印も正しく理解すれば素材判別の大きなヒントになります。ここでは主要国ごとの刻印の違いと見分け方をわかりやすくまとめました。</p>
					<div style="overflow-x: auto;">
						<table class="purity_features_table">
							<thead>
								<tr>
									<th>国・地域</th>
									<th>主な刻印表記</th>
									<th>表記の意味</th>
									<th>見分け方・特徴</th>
									<th>実務・買取のポイント</th>
								</tr>
							</thead>
								<tr>
									<td>日本</td>
									<td>K18 / 18K</td>
									<td>金の純度75％（24分率）</td>
									<td>「K」が付く表記が一般的。リング内側・留め具に刻印されることが多い。</td>
									<td>国内流通品は信頼性が高く、刻印確認でスムーズに査定可能。</td>
								</tr>
								<tr>
									<td>アメリカ</td>
									<td>18K / 750</td>
									<td>18K＝75％、750＝千分率</td>
									<td>数字のみ「750」表記が多い。ブランド品は刻印が小さい場合あり。</td>
									<td>K表記・数字表記どちらも18金として評価。</td>
								</tr>
								<tr>
									<td>ヨーロッパ<br>（フランス・イタリア等）</td>
									<td>750</td>
									<td>純金75％（ミル表示）</td>
									<td>楕円・ひし形などの検定刻印（ホールマーク）が併記されることが多い。</td>
									<td>刻印が摩耗していても比重検査で確認可能。</td>
								</tr>
								<tr>
									<td>イギリス</td>
									<td>750 / Crown＋数字</td>
									<td>公的ホールマーク制度</td>
									<td>王冠・ライオンなどのシンボルマーク入り。</td>
									<td>正規刻印は信頼度が高く、素材判定が明確。</td>
								</tr>
								<tr>
									<td>中国</td>
									<td>足金750 / 750</td>
									<td>750＝金75％</td>
									<td>漢字表記＋数字の組み合わせが多い。</td>
									<td>表記が独特なため専門的な判別が必要。</td>
								</tr>
								<tr>
									<td>香港・台湾</td>
									<td>750 / Au750</td>
									<td>Au＝金（元素記号）</td>
									<td>国際基準寄りの表記。</td>
									<td>輸入品・海外ブランドで多く見られる。</td>
								</tr>
						</table>
					</div>
				</div>
			</section>
<?php endif; ?>









<?php /* よくあるご質問 */ ?>
<link rel="stylesheet" href="/wp-content/themes/jewelcafe_replace/assets/css/new-style.css"/>
<?php
	$kaitori_faq = [
		'custom_title' => $custom_title,
		'post_id' => $post->ID,
	];
?>
<section class="kaitori-faq more-btn-outer">

	<div class="common-ttl">
		<div class="section-inner">
			<h2 class="kaitori-title">
				<?php if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):?>
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

	<?php get_template_part( 'template-parts/kaitori-new-faq',null,$kaitori_faq );?>
	<div class="more-btn only-sp ta-c">
		<p class="open">もっと見る</p>
	</div>
</section>

<?php /* ?>　旧コード（よくあるご質問）しばらくしたら削除する。2026/4/15
			<section class="kaitori-faq">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<?php if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):?>
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


					if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id){
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
<?php */ ?>










			<section class="kaitori-rank">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<?php if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id)://品目-県ページ?>
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
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-01.png" alt="1位" style="max-width: 50px; opacity: 1;">
								</picture>
							</div>
							<?php if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id)://品目-県ページ?>
								<p class="kaitori-rank-item"><?php the_field('買取ランキング1位_タイトル', $kaitori_area_parent_id);?></p>
							<?php else: //品目ページ?>
								<p class="kaitori-rank-item"><?php the_field('買取ランキング1位_タイトル');?></p>
							<?php endif;?>
						</div>
						<?php if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id)://品目-県ページ?>
							<p class="kaitori-rank-txt"><?php the_field('買取ランキング1位_文章', $kaitori_area_parent_id);?></p>
						<?php else: //品目ページ?>
							<p class="kaitori-rank-txt"><?php the_field('買取ランキング1位_文章');?></p>
						<?php endif;?>
					</div>
					<div class="kaitori-rank-list">
						<div class="kaitori-rank-ttl d-f ai-c">
							<div class="kaitori-rank-medal">
								<picture>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-02.png" alt="2位" style="max-width: 50px; opacity: 1;">
								</picture>
							</div>
							<?php if(isset($kaitori_area_parent_id))://品目-県ページ?>
								<p class="kaitori-rank-item"><?php the_field('買取ランキング2位_タイトル', $kaitori_area_parent_id);?></p>
							<?php else: //品目ページ?>
								<p class="kaitori-rank-item"><?php the_field('買取ランキング2位_タイトル');?></p>
							<?php endif;?>
						</div>
						<?php if(isset($kaitori_area_parent_id))://品目-県ページ?>
							<p class="kaitori-rank-txt"><?php the_field('買取ランキング2位_文章', $kaitori_area_parent_id);?></p>
						<?php else: //品目ページ?>
							<p class="kaitori-rank-txt"><?php the_field('買取ランキング2位_文章');?></p>
						<?php endif;?>
					</div>
					<div class="kaitori-rank-list">
						<div class="kaitori-rank-ttl d-f ai-c">
							<div class="kaitori-rank-medal">
								<picture>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-03.png" alt="3位" style="max-width: 50px; opacity: 1;">
								</picture>
							</div>
							<?php if(isset($kaitori_area_parent_id))://品目-県ページ?>
								<p class="kaitori-rank-item"><?php the_field('買取ランキング3位_タイトル', $kaitori_area_parent_id);?></p>
							<?php else: //品目ページ?>
								<p class="kaitori-rank-item"><?php the_field('買取ランキング3位_タイトル');?></p>
							<?php endif;?>
						</div>
						<?php if(isset($kaitori_area_parent_id))://品目-県ページ?>
							<p class="kaitori-rank-txt"><?php the_field('買取ランキング3位_文章', $kaitori_area_parent_id);?></p>
						<?php else: //品目ページ?>
							<p class="kaitori-rank-txt"><?php the_field('買取ランキング3位_文章');?></p>
						<?php endif;?>
					</div>
				</div>
			</section>



			<?php
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






<?php if(is_single('k18')): ?>
	<style>
	.kaitori-how-to-inner {
		margin-top:80px;
		justify-content: space-between;
	}
	.kaitori-type-img {
		margin-right: 7px;
	}
	.kaitori-type-txt {
		letter-spacing: -1.2px;
	}
	.kaitori-name {
		position: relative;
		font-size: 37px;
	}
	.kaitori-name2 {
		font-size: 14px;
	}
	.kaitori_btn {
		background: #C80000;
		border-radius: 10px;
	}
	.kaitori-name:before {
		position: absolute;
		top: 50%;
		right: 10px;
		transform: translateY(-50%);
		background-image: url(//jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/common/arrow-right-red.svg);
		background-repeat: no-repeat;
		background-position: center;
		background-size: 9px 15px;
		vertical-align: middle;
		content: "";
		width: 25px;
		height: 25px;
		border-radius: 50%;
		background-color: #fff;
	}
	.kaitori-name-info {
		color: #fff;
		margin: 0 auto;
	}
	.kaitori-img img {
		width: 100%;
		display: block;
	}
	.kaitori-img {
		width: 30%;
	}
	.kaitori-type-list {
		width: 32.5%;
	}
	@media screen and (max-width: 990px){
		.kaitori-how-to-inner {
			display: block;
		}
		.kaitori-type-list {
			width: 100%;
		}
		.kaitori-how-to-inner{
			margin-top:40px;
		}
	}
	</style>
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
<?php endif;?>




		<?php

			if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id > 0 || $post->post_name  == 'letter'||$post->post_name == 'card'){


			if($post->post_name  == 'letter'||$post->post_name == 'card'||get_post($kaitori_area_parent_id)->post_name  == 'letter'||get_post($kaitori_area_parent_id)->post_name  == 'card'){



				if($post->post_name  == 'letter'||$post->post_name == 'card'){

					$post_url = '/kaitori/'.$post->post_name;

				}else{

					$post_url = '/kaitori/'.get_post($kaitori_area_parent_id)->post_name;

				}



				if($post->post_name  == 'letter'||get_post($kaitori_area_parent_id)->post_name  == 'letter'){

					$pname = '切手・ハガキ';

				}else{

					$pname =  '金券・商品券';

				}



		?>


		<footer style="padding-top:0px;">


		<script>

	$(document).ready(function() {

		$(".karrow").click(function(){


		  $("#area_kaitori").slideToggle();


		});

	});

		</script>


		<style>
		#area_kaitori{margin-top:30px;display:none;}

		.karrow{position:relative;}

		.karrow-icon{
			content: "";
			position: absolute;
			top: 50%;
			right: 10px;
			transform: translate(-50%, -50%);
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			border: 5px solid transparent;
			border-top: 8px solid #fff;   /* 好みで色を変えてください */
		}

		.karrow:hover{ cursor:pointer;}

		</style>


		<div class="section-inner" style="padding:0px;">


		<h3 class="ttl-box-red karrow">ジュエルカフェは全国で<br class="only-sp"><?php echo $pname;?>をお買取しています！<span class="karrow-icon"></span></h3>


        <div class="footer-shop-ja" id="area_kaitori">

          <div class="shop-ja-area">
            <div>
              <div class="shop-ja-area-box">
                <p>北海道エリア</p>
                <ul class="footer-shop-list">
                  <li><a href="<?php echo esc_url(home_url($post_url.'/hokkaido/')); ?>">道央</a></li>
                </ul>
              </div>
              <div class="shop-ja-area-box">
                <p>東北エリア</p>
                <ul class="footer-shop-list">
                  <li><a href="<?php echo esc_url(home_url($post_url.'/aomori')); ?>">青森県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/iwate')); ?>">岩手県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/miyagi')); ?>">宮城県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/akita')); ?>">秋田県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/yamagata')); ?>">山形県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/fukushima')); ?>">福島県</a></li>
                </ul>
              </div>
              <div class="shop-ja-area-box">
                <p>関東エリア</p>
                <ul class="footer-shop-list">
                  <li><a href="<?php echo esc_url(home_url($post_url.'/tokyo')); ?>">東京都</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/kanagawa')); ?>">神奈川県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/chiba')); ?>">千葉県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/saitama')); ?>">埼玉県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/ibaraki')); ?>">茨城県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/tochigi')); ?>">栃木県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/gunma')); ?>">群馬県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/yamanashi')); ?>">山梨県</a></li>
                </ul>
              </div>
              <div class="shop-ja-area-box">
                <p>中部・北陸エリア</p>
                <ul class="footer-shop-list">
                  <li><a href="<?php echo esc_url(home_url($post_url.'/aichi')); ?>">愛知県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/gifu')); ?>">岐阜県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/shizuoka')); ?>">静岡県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/mie')); ?>">三重県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/niigata')); ?>">新潟県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/nagano')); ?>">長野県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/toyama')); ?>">富山県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/ishikawa')); ?>">石川県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/fukui')); ?>">福井県</a></li>
                </ul>
              </div>
            </div>
            <div>
              <div class="shop-ja-area-box">
                <p>関西エリア</p>
                <ul class="footer-shop-list">
                  <li><a href="<?php echo esc_url(home_url($post_url.'/osaka')); ?>">大阪府</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/hyogo')); ?>">兵庫県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/kyoto')); ?>">京都府</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/shiga')); ?>">滋賀県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/nara')); ?>">奈良県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/wakayama')); ?>">和歌山県</a></li>
                </ul>
              </div>
              <div class="shop-ja-area-box">
                <p>中国・四国エリア</p>
                <ul class="footer-shop-list">
                  <li><a href="<?php echo esc_url(home_url($post_url.'/okayama')); ?>">岡山県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/hiroshima')); ?>">広島県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/yamaguchi')); ?>">山口県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/tottori')); ?>">鳥取県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/shimane')); ?>">島根県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/tokushima')); ?>">徳島県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/kagawa')); ?>">香川県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/ehime')); ?>">愛媛県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/kouchi')); ?>">高知県</a></li>
                </ul>
              </div>
              <div class="shop-ja-area-box">
                <p>九州エリア</p>
                <ul class="footer-shop-list">
                  <li><a href="<?php echo esc_url(home_url($post_url.'/fukuoka')); ?>">福岡県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/saga')); ?>">佐賀県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/nagasaki')); ?>">長崎県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/kumamoto')); ?>">熊本県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/oita')); ?>">大分県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/miyazaki')); ?>">宮崎県</a></li>
                  <li><a href="<?php echo esc_url(home_url($post_url.'/kagoshima')); ?>">鹿児島県</a></li>
                </ul>
              </div>
              <div class="shop-ja-area-box">
                <p>沖縄エリア</p>
                <ul class="footer-shop-list">
                  <li><a href="<?php echo esc_url(home_url($post_url.'/okinawa')); ?>">沖縄県</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        </div>

		</footer>


		<?php
			}

			}
		?>


<?php
	function render_gold_content($custom_title, $lead, $intro, $diff, $items, $value) {



$custom_title_trimmed = preg_replace('/\(.*?\)/', '', $custom_title); // (〜)を削除
$custom_title_trimmed = trim($custom_title_trimmed); // 念のため空白除去





		
?>
    <style>
        @media screen and (max-width: 990px) {
            .ttt { margin-top: -20px; margin-bottom: 40px; }
            .eee { margin-top: 40px; }
        }
        @media screen and (min-width: 1000px) {
            .ttt { margin-top: -50px; margin-bottom: 50px; }
            .eee { margin-top: 40px; }
        }
    </style>

    <section class="kaitori-howto">
        <div class="common-ttl">
            <div class="section-inner">
                <h2 class="kaitori-title">
                    <span class="common-ttl-main">今週の<span class="color-red"><?php echo $custom_title; ?></span>基礎知識</span>
                </h2>
                <div class="common-ttl-en">HOW TO TIPS</div>
            </div>
        </div>
        <div class="section-inner">
            <p class="ttt"><?php echo $lead; ?></p>
        </div>
        <div class="section-inner">

            <div class="kaitori-howto-item d-f">
                <h3 class="kaitori-howto-item-title eee"><?php echo $custom_title_trimmed; ?>の特徴とは</h3>
            </div>
            <div class="kaitori-howto-txt"><?php echo $intro; ?></div>

            <div class="kaitori-howto-item d-f">
                <h3 class="kaitori-howto-item-title eee">
					<?php
						if (is_single('k24')) {
							echo $custom_title_trimmed.'と他の金種の違い';
						} else {
							echo $custom_title_trimmed.'と純金の違い';
						}
					?>
				</h3>
            </div>
            <div class="kaitori-howto-txt"><?php echo $diff; ?></div>

            <div class="kaitori-howto-item d-f">
                <h3 class="kaitori-howto-item-title eee"><?php echo $custom_title_trimmed; ?>が使用されているアイテム</h3>
            </div>
            <div class="kaitori-howto-txt"><?php echo $items; ?></div>

<?php if( is_single('k18')): ?>
            <div class="kaitori-howto-item d-f">
                <h3 class="kaitori-howto-item-title eee"><?php echo $custom_title_trimmed; ?>のカラーについて</h3>
            </div>
            <div class="kaitori-howto-txt">18金（K18）は純金75％に他の金属を配合した合金で、配合バランスによって色味や特性が変わります。イエローゴールドは金本来の色味を活かし、銀や銅を加えることで華やかさと耐久性を両立。資産価値の安定感も魅力です。ホワイトゴールドはパラジウムなどを配合し、プラチナのような上品な白さを表現。ロジウムコーティングが施されることも多く、洗練された印象が特徴です。ピンクゴールドは銅の比率を高め、やさしく温かみのある色合いに仕上げます。肌なじみが良く、デザイン性の高いジュエリーに多く使われます。18金の買取査定では色味に関わらず基本の評価は同じですが、重量や状態、デザイン性によって査定額が変動します。</div>
<?php endif; ?>
			
            <div class="kaitori-howto-item d-f">
                <h3 class="kaitori-howto-item-title eee"><?php echo $custom_title_trimmed; ?>アイテムは高価買取が期待できる</h3>
            </div>
            <div class="kaitori-howto-txt"><?php echo $value; ?></div>
        </div>
    </section>
    <?php
}

if (is_single('k18')) {
    render_gold_content(
        $custom_title,
		'18金（K18）は、金の純度と強度のバランスがよく、ジュエリーに幅広く使われる人気素材です。ここでは18金の基本的な特徴から純金との違い、実際に使われる代表的なアイテム、イエロー・ホワイト・ピンクなどカラーの種類までをわかりやすく整理します。さらに、刻印や状態によって評価が変わるポイントも踏まえながら、18金アイテムが高価買取につながりやすい理由も解説します。',
        '18金（K18）とは、金の含有率が75％の合金を指します。残りの25％には、銀や銅、パラジウムなどが含まれており、強度や色味を調整する役割を果たしています。純金（K24）に比べて硬く、キズがつきにくいため、ジュエリーや腕時計など日常使いの製品に幅広く用いられています。見た目は華やかで高級感がありながらも実用性が高いことから、買取市場でも人気の高い金種です。',
        '18金と純金（24金）の最大の違いは金の純度です。純金は金の含有率が99.9％以上で、柔らかく変形しやすいため、装飾品には不向きな面もあります。一方、18金は金が75％で、銀や銅などを混ぜて強度を高めており、ジュエリーなどに最適な素材です。色味もやや赤みや白みを帯びることがあり、デザインの幅も広がります。実用性と美しさのバランスから、18金は日常使いにも人気の金素材です。',
        '18金はその耐久性と美しさから、さまざまな製品に使用されています。代表的なものは、ネックレス・リング・ピアスなどのジュエリー類。また、ブランド時計やベルトのバックル、眼鏡のフレーム、高級ライターなどにも18金が使われることがあります。装飾品以外にも、記念コインやアクセサリーパーツなど、多彩なアイテムに用いられており、買取対象も幅広いのが特徴です。',
        '18金は金の含有量が高く、買取相場でも安定した価値があるため、高価買取が期待できます。特にブランドジュエリーやデザイン性の高いアイテムは、金としての価値に加え、製品としての価値も評価されます。また、18金製品は需要が高く、状態が良ければ再販もしやすいため、買取業者にとっても魅力的な商材です。金相場が高騰している今は、売却の好タイミングといえるでしょう。'
    );
} elseif (is_single('k20')) {
    render_gold_content(
        $custom_title,
		'20金（K20）は純度と耐久性のバランスがよく、ジュエリーや装飾品で見かけることのある金種です。ここでは20金の特徴をはじめ、18金・22金など他の金種との違い、実際に使われるアイテム例をわかりやすく紹介します。さらに、イエロー系を中心とした色味の傾向や、刻印の見分け方、状態や重量が買取価格にどう影響するかも解説。20金が高価買取につながる理由を整理します。',
        '20金（K20）は金の含有率が約83.3％の合金で、純金よりも硬く、18金よりも金の純度が高いのが特徴です。日本では流通量が少ないため、やや希少性のある金種といえます。海外製ジュエリーやアンティーク品に用いられることが多く、金の輝きが濃く美しい点も魅力。強度と美観を兼ね備えた素材として、一部の高級品や特注品に使用されることがあります。',
        '純金は金の含有率がほぼ100％で柔らかく加工しづらいのに対し、20金は金を83.3％含みながらも他の金属を加えることで耐久性が向上しています。そのため、20金は装飾品としての実用性が高く、特にヨーロッパや中東などでは高級ジュエリー素材として人気があります。純金に近い深みのあるゴールドカラーも特徴で、美しさと実用性のバランスが魅力です。',
        '20金は主に海外製のジュエリーや装飾品に使われています。ヨーロッパのヴィンテージジュエリーやオーダーメイドの指輪、ネックレス、ペンダントトップなどに多く見られます。また、中東やインドなど金の需要が高い地域では、20金のアクセサリーが富裕層の間で人気を集めています。日本国内での流通量は少ないため、アイテムによっては希少価値が高まることもあります。',
        '20金は18金よりも金の純度が高く、希少性もあるため、買取価格が高くなる傾向があります。特に海外ブランドのジュエリーやアンティーク品は、金としての価値に加え、デザインやブランド評価もプラスされ、高額査定が期待できます。また、日本国内では珍しい金種であることから、状態の良い品やレアなデザインは市場でも注目されやすい素材です。'
    );
} elseif (is_single('k14')) {
    render_gold_content(
        $custom_title,
		'14金（K14）は金の割合を抑えつつ強度を高めた素材で、日常使いのジュエリーに多く採用されています。ここでは14金の特徴や18金・10金との違い、リングやチェーンなど代表的なアイテム例を紹介します。また、ホワイト系・ピンク系などカラーの傾向や、刻印（K14／585など）の見分け方も整理。さらに、変色や小傷など状態面が査定に与える影響を踏まえながら、14金アイテムの買取ポイントをわかりやすく解説します。',
        '14金（K14）は金の含有率が約58.5％の合金で、金と他の金属をバランスよく配合した素材です。耐久性に優れているため、日常使いのジュエリーに多く採用されています。欧米では非常に一般的な金種で、リーズナブルでありながら高級感もあるため人気があります。日本国内では18金が主流のため、14金アイテムは主に海外製品で多く見られます。',
        '14金は純金に比べて金の含有率が低く、色味もやや控えめなゴールドになりますが、その分硬くて丈夫なのが特徴です。純金が柔らかく傷つきやすいのに対し、14金は変形しにくく、普段使いに向いています。また、価格帯も抑えられており、ファッションジュエリーやカジュアルなアクセサリーに多用されています。色味・強度・価格のバランスに優れた金種です。',
        '14金は主に欧米製のジュエリーに使用され、結婚指輪・ペンダント・ブレスレット・イヤリングなど幅広いアイテムで見かけます。特にアメリカでは標準的な素材とされており、デザイン性の高いファッションジュエリーに多く採用されています。また、ホワイトゴールドやピンクゴールドなど、合金の割合を調整することで多彩な色味を出せるのも14金の魅力です。',
        '14金は18金や純金より金の含有量は少ないものの、需要は安定しており買取市場でも取扱いは多くあります。特に海外ブランドのジュエリーや個性的なデザインのアクセサリーは、素材以上の付加価値がつくこともあります。また、14金はホワイトゴールドとしても流通しており、見た目の状態やデザイン性によっては高価買取が狙えるアイテムです。'
    );
} elseif (is_single('k10')) {
    render_gold_content(
        $custom_title,
		'10金（K10）は金の含有量が比較的低く、その分硬くて傷つきにくいことから、カジュアルジュエリーにも広く使われる金種です。ここでは10金の特徴や14金・18金との違い、ネックレスやピアスなど使用されやすいアイテム例をわかりやすく紹介します。あわせて、刻印（K10／417など）の確認ポイント、色味の傾向、変色やメッキとの見分け方も整理。状態や重量による査定の考え方も含め、買取のポイントを解説します。',
        '10金（K10）は金の含有率が約41.7％の合金で、金の割合が少ないぶん非常に硬く、キズや摩耗に強いのが特徴です。比較的価格が安いため、カジュアルジュエリーやファッションアクセサリーに広く使われています。見た目にはゴールドの輝きが控えめですが、その実用性とデザインの多様性から、若年層を中心に人気があります。',
        '10金は金の含有量が約4割と少なく、残りの多くを銀や銅などの他金属が占めます。そのため純金に比べて色合いが淡く、黄色味が薄いのが特徴です。一方で硬度は非常に高く、変形やキズに強いため、日常使いのアクセサリーに適しています。価格もリーズナブルで、金の輝きを気軽に楽しみたい方に支持されています。',
        '10金はコストパフォーマンスの良さから、ピアスやネックレス、リングなどのファッションジュエリーに多く使われています。特に国内ブランドのカジュアルラインや、量販店向けのアクセサリーに多く採用されています。見た目も18金と大きく変わらないため、普段使いに最適な素材といえるでしょう。',
        '10金は金の含有量が少ない分、1gあたりの買取価格は他の金種よりも低めですが、アクセサリーとしての需要が高いため買取対象としては十分価値があります。ブランド品や状態の良いジュエリーは素材以上の価値がつくこともあり、まとめての買取やデザイン性のある品なら査定額アップも見込めます。'
    );
} elseif (is_single('k22')) {
    render_gold_content(
        $custom_title,
		'22金（K22）は高い純度を保ちながら、24金よりも硬さが増し、装飾品にも使いやすい金種です。ここでは22金の特徴や24金・18金との違い、どのようなアイテムに用いられるかを具体例とともに解説します。また、色味や合金配合による風合いの違いにも触れつつ、刻印や重量、付属品・状態が査定に与える影響も整理。22金アイテムが高価買取を期待できるポイントをわかりやすくまとめます。',
        '22金（K22）は金の含有率が約91.6％と非常に高く、純金に近い金種です。日本国内ではあまり見かけませんが、インドや中東、アジア圏などでは22金の装飾品が人気です。美しい黄金色と高い資産価値を備えつつ、18金よりも柔らかいため、装飾品としてはやや慎重な扱いが必要になります。',
        '22金は金の純度が高く、純金（24金）に非常に近い色合いと価値を持ちますが、わずかに他金属が含まれているため純金よりも若干硬くなっています。純金が柔らかすぎてジュエリーには向かないという点を補い、22金はその輝きと耐久性のバランスが良好です。伝統的なジュエリーによく使われています。',
        '22金はインドの結婚式用ジュエリーや、中東の富裕層向けアクセサリー、記念コインや投資目的のゴールド製品に多く見られます。海外製品が多いため、日本国内では希少性がありますが、ボリュームのある装飾品が多く、重量感のある買取対象として注目されます。',
        '22金は純度が高いため、1gあたりの金額が18金よりも高く、状態や重さによっては高額査定が見込めます。特に海外で購入したジュエリーや伝統工芸品は、重量が大きいものも多く、資産価値が高いのが特徴です。市場に出回る数が少ないため、希少性のある品としての評価も期待できます。'
    );
} elseif (is_single('k24')) {
    render_gold_content(
        $custom_title,
		'24金（K24）は金の純度が最も高く、金本来の美しい色味と資産価値の高さが魅力です。ここでは24金の特徴や純金ならではの性質、18金など他の金種との違いをわかりやすく解説します。さらに、インゴットやコイン、記念品など使用される代表的なアイテム例、そして刻印・重量・状態によって査定がどう変わるかも紹介。24金が高価買取につながりやすい理由を整理します。',
        '24金（K24）は金の含有率99.9％以上の「純金」で、もっとも高い純度を誇る金種です。美しい黄金色と柔らかさが特徴で、装飾品としてよりも資産保有や工業用、記念品などに利用されることが多い素材です。市場価格に大きく左右されやすいですが、常に高い価値を保つ代表的な貴金属です。',
        '24金は不純物をほとんど含まないため非常に柔らかく、加工や変形に弱いのが特徴です。そのため、18金や22金と異なりジュエリーには不向きとされ、主に金貨やインゴット、記念メダルなど、投資目的や資産保管向けとして流通しています。価格も金相場と連動しやすいため、高騰時は非常に高値で取引されます。',
        '24金は主にインゴット（地金）や金貨、記念メダル、仏具、金歯、工業用パーツなどに使用されています。ジュエリーとして使用されることもありますが、柔らかさゆえに変形しやすく、日常使いには不向きとされます。見た目の美しさと純度の高さから、保存・投資用アイテムとして非常に人気があります。',
        '24金は最も純度が高いため、買取市場でも1gあたりの単価がトップクラスに高い金種です。インゴットや金貨などは重量もあるため、高額買取につながるケースが多く、状態が良いものは市場価値がそのまま反映されます。また、金相場が高騰している時期には特におすすめの売却タイミングといえるでしょう。'
    );
}
?>


<br><br>
<?php get_template_part( 'template-parts/common-tab' );?>





<?php if($parent_slug == 'vuitton'):?>
	<style>
		.kaitori-kinds .section-ttl-main {
			font-size: 33px;
			letter-spacing: 0;
			margin-bottom: 45px;
		}
		@media screen and (max-width: 990px) {
			.kaitori-kinds .section-ttl-main {
				font-size: 22px;
				margin-bottom: 24px;
			}
			.kaitori-kinds-list.column4 li{
				width: 47%;
			}
		}
	</style>
			<section class="kaitori-kinds mt-80">

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


<?php get_footer( );?>