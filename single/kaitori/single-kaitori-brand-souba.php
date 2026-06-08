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

<?php

	$field = get_fields( $post->ID );

	if ( $field ) {
		foreach ( $field as $name => $value ) {

			$singel_fields[$name] = $value;

		}
	}
	
	$singel_fields['post_id'] = $post->ID;
	
	$singel_fields['custom_title'] = get_post( $post->ID )->post_title;

	$parent = get_post( $post->post_parent );
	


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


<?php if( $parent->post_name == 'vuitton' || $parent->post_name == 'rolex-top' ){?>

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
<?php
}else{
?>
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
<?php
}
?>
			</div>



			<section class="kaitori-method red_bg">
				<?php get_template_part( 'template-parts/common-kaitori-method' );?>
			</section>



			<section class="kaitori-intro section-inner mt-40">
				<h1 class="intro-title color-red">
					<?php echo $parent->post_title;?>の買取価格相場
				</h1>
			</section>



			<section class="kaitori-souba mt-40">
				<div class="section-inner">
				
					<div class="point-title">
						<div class="point-title-inner d-f ai-c">
							<div class="point-kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/kaitori-kuma.png" alt="" ></div>
							<div class="only-sp"><?php echo $parent->post_title;?>買取ポイント
							</div>
						</div>
						
						<div class="point-bg">
							<p class="only-pc">ジュエルカフェの<?php echo $parent->post_title;?>買取ポイント</p>
							<h2><?php echo $parent->post_title; ?>の参考買取価格相場</h2>
						</div>
					</div>		
					
					</div>
					
					<div class="section-inner mb-40">
						<?php get_template_part( 'template-parts/kaitori-souba-'.$parent->post_name);?>		
					</div>
					
					
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
								<?php if( in_array($parent->post_name, ['vuitton', 'chanel']) ): ?>
									<li>保証書が未記入ではなく、かつ最新の保証書の日付が【6ヶ月以内】であること（※一部モデルを除く）</li>
									<li>箱および保証書が付属していること（その他の付属品も年式相応に揃っている状態）</li>
									<li>本体に目立つキズや打痕がないこと</li>
								<?php elseif( $parent->post_name == 'rolex-top'): ?>
									<li>保証書が未記入ではなく、かつ最新の保証書の日付が【6ヶ月以内】であること（※一部モデルを除く）</li>
									<li>箱および保証書が付属していること（その他の付属品も年式相応に揃っている状態）</li>
									<li>ガラス、ケース、ブレスレット等に目立つキズや打痕がないこと</li>
									<li>バックルおよびリューズに破損がなく、正常に動作する状態であること</li>
									<li>ブレスレットのコマがすべて揃っていること</li>
								<?php endif;?>
							</ul>
							<p class="mt-12" style="font-size:11px;">※上記条件に該当しない場合でも、状態やモデルによっては高価買取が可能です。まずはお気軽にお問い合わせください。<br>※掲載相場は市場動向により変動するため、掲載価格と実際の査定額に差が生じる場合がございます。あらかじめご了承ください。</p>
							</section>
						</div>
					</div>
			</section>



		<section class="pink_bg">
			<div class="section-inner">
			
				<div class="point-title">

					<div class="point-title-inner d-f ai-c">
						<div class="point-kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/kaitori-kuma.png" alt="" ></div>
						<div class="only-sp">
							ジュエルカフェの<br/>
							<?php echo $parent->post_title;?>買取ポイント
						</div>
					</div>
					
					<div class="point-bg">
						<p class="only-pc">ジュエルカフェの <?php echo $parent->post_title;?>買取ポイント</p>
						<h2>
							<?php echo $parent->post_title;?>を高く売る方法は？
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




		<section class="kaitori-how-to-sell">

<div class="section-inner">

		<div class="section-inner">
		
			<div class="point-title">
			
				<div class="point-title-inner d-f ai-c">
					<div class="point-kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/kaitori-kuma.png" alt="" ></div>
					<div class="only-sp">
						ジュエルカフェの</br>
						<?php echo $parent->post_title;?>買取ポイント
					</div>
				</div>
				
				<div class="point-bg">
					<p class="only-pc">ジュエルカフェの <?php echo $parent->post_title;?>買取ポイント</p>
					<h2><?php echo $parent->post_title; ?>の買取方法</h2>
				</div>
				
			</div>		
			
			</div>
			
	
	
	
	<p class="section-ttl-con lh-20 justify">
		ジュエルカフェの<?php echo $parent->post_title;?>買取は、お客様のご都合に合わせて3つの便利な買取方法をご用意しています。<br>
		どの方法をご利用いただいても、ジュエルカフェなら1点1点丁寧に査定！お客様の<?php echo $parent->post_title;?>を高価買取いたします。
	</p>
	
</div>

			
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
</section>

<?php if ( isset($parent->post_name) && $parent->post_name === 'vuitton' ) { ?>

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


<?php }else if( $parent->post_name == 'chanel'){?><section class="boro_vuitton">
		<div class="section-inner">
			<div class="point-title">
				<div class="point-title-inner d-f ai-c">
					<div class="point-kuma"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" alt="" data-src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" decoding="async" class=" ls-is-cached lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" alt=""  data-eio="l"></noscript></div>
					<div class="only-sp">ジュエルカフェの<br>シャネル買取ポイント</div>
				</div>
				<div class="point-bg">
					<p class="only-pc">ジュエルカフェのシャネル買取ポイント</p>
					<h2>中古・ボロボロのシャネルも買い取ります</h2>
				</div>
			</div>
		</div>
		<div class="bg">
			<div class="section-inner">
				<div class="naname_text_box"><p class="text">シャネルでもこんなボロボロ<br class="sp">売れないでしょ？</p></div>
				<ul class="item_list">
					<li>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_chanel_item1.jpg" alt="シャネル" >
						<div class="text_box">
							<p class="">ファスナーが破損した</p>
						</div>
					</li>
					<li>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_chanel_item2.jpg" style="object-position:bottom;" alt="シャネル">
						<div class="text_box">
							<p class="">レザーが劣化した</p>
						</div>
					</li>
					<li>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_chanel_item3.jpg" alt="シャネル" >
						<div class="text_box">
							<p class="">表面がボロボロになった</p>
						</div>
					</li>
					<li>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_chanel_item4.jpg" style="object-position: top;" alt="シャネル">
						<div class="text_box">
							<p class="">変色した</p>
						</div>
					</li>
				</ul>


				<div class="pc_box">
					<p class="text2"><em>シャネル</em><span>なら</span><em>どんな状態でも</em></p>
					<div class="warranty_box">
						<img class="sp" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_warranty_sp.png" alt="買取保証" >
						<img class="pc" style="margin-bottom:-35px;" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_warranty_pc.png" alt="買取保証" >
					</div>
					<div class="section-inner pc">
						<p class="text3">まずはご相談ください!</p>

						<img style="width:540px; margin-bottom: 20px;padding-right: 30px;" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_chanel_multiple.png" alt="シャネル" >
					</div>
				</div>

			</div>
		</div>
		<div class="section-inner sp">
			<p class="text3">まずはご相談ください!</p>
			<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_chanel_multiple.png" alt="シャネル" >
		</div>

</section>



<?php
}else{
?><section class="boro_vuitton">
		<div class="section-inner">
			<div class="point-title">
				<div class="point-title-inner d-f ai-c">
					<div class="point-kuma"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" alt="" data-src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" decoding="async" class=" ls-is-cached lazyloaded"><noscript><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/kaitori-kuma.png" alt=""  data-eio="l"></noscript></div>
					<div class="only-sp">ジュエルカフェの<br>ロレックス買取ポイント</div>
				</div>
				<div class="point-bg">
					<p class="only-pc">ジュエルカフェのロレックス買取ポイント</p>
					<h2>中古・ボロボロのロレックスも買い取ります</h2>
				</div>
			</div>
		</div>
		<div class="bg rolex">
			<div class="section-inner">
				<div class="naname_text_box"><p class="text">ロレックスでもこんなボロボロ<br class="sp">売れないでしょ？</p></div>
				<ul class="item_list">
					<li>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_rolex_item1.jpg" alt="ロレックス" >
						<div class="text_box">
							<p class="">ガラス割れ</p>
						</div>
					</li>
					<li>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_rolex_item2.jpg" style="object-position:bottom;" alt="ロレックス">
						<div class="text_box">
							<p class="">水没した</p>
						</div>
					</li>
					<li>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_rolex_item3.jpg" alt="ロレックス" >
						<div class="text_box">
							<p class="">サビている</p>
						</div>
					</li>
					<li>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_rolex_item4.jpg" style="object-position: top;" alt="ロレックス">
						<div class="text_box">
							<p class="">大きなダメージ</p>
						</div>
					</li>
				</ul>


				<div class="pc_box rolex">
					<p class="text2"><em>ロレックス</em><span>なら</span><em>どんな状態でも</em></p>
					<div class="warranty_box">
						<img class="sp" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_warranty_sp.png" alt="買取保証" >
						<img class="pc" style="margin-bottom:-35px;" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_warranty_pc.png" alt="買取保証" >
					</div>
					<div class="section-inner pc">
						<p class="text3">まずはご相談ください!</p>
						<img style="width:540px; margin-bottom: 20px;padding-right: 30px;" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_rolex_multiple.png" alt="ロレックス" >
					</div>
				</div>

			</div>
		</div>
		<div class="section-inner sp">
			<p class="text3">まずはご相談ください!</p>
			<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/boro_rolex_multiple.png" alt="ロレックス" >
		</div>

</section>


<?php }?>





	<?php get_template_part( 'template-parts/kaitori-verification-document' );?>






			<section class="kaitori-kinds">

				<div class="section-inner bold ta-c">
				
					<h2 class="section-ttl-main bold"> 
					
						<?php
							echo $parent->post_title.'<br class="only-sp">の買取アイテム一覧'; 
						?>

					</h2>
				
				</div>


				<div class="section-inner">
					<ul class="kaitori-kinds-list">


						<?php 
						
							$city_arr = array(
								'shop',
								'souba',
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
							
						
	
							$current_hinmoku_term = get_the_terms( $parent->ID, 'hinmoku' );
							

					
							
							$args = array(
								'post_type' => 'kaitori',
								'posts_per_page' => -1,
								'post_parent' => $parent->ID,
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

				
					</ul>
				</div>
			</section>



			
			<?php get_footer();?>