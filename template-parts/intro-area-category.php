<?php 
	$kaitori_area_parent_id = $post->post_parent;
	$custom_title = get_post( $kaitori_area_parent_id)->post_title;
?>

<div class="logo">
	<picture>
		<source media="(max-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/logo.svg">
		<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/logo.svg" alt="JEWEL CAFE">
	</picture>
</div>
<div class="mincho pos-r">
	<h1 class="intro-title">
		<span class="intro-sub"><?php echo $post->post_title.'の'.$custom_title;?>買取なら</span>
		<span class="intro-appeal color-red">全国<?php echo get_option('shop'); ?>店舗展開の</span>
		<span class="intro-main color-red">
			ジュエルカフェに<br class="only-sp">
			お任せください。
		</span>
	</h1>
	<div class="medal">
		<picture>
			<source media="(max-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/img_free_appraisal.png">
			<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/img_free_appraisal.png" alt="安心の無料査定">
		</picture>
	</div>
</div>
<div class="en">
	<picture>
		<source media="(max-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/txt_hs_intro.png">
		<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/txt_hs_intro.png" alt="JewelCafe">
	</picture>
</div>
<p class="intro-txt color-black">
	<?php the_field('「ジュエルカフェにお任せください」以降の導入文（短め・大・小カテゴリ用）', $kaitori_area_parent_id);?>
</p>
