



<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/img_minamino_intro_pc.png" alt="" class="intro-fr only-sp" />

<div class="mincho pos-r">
	<h2 class="intro-title">
		<span class="intro-sub"><?php the_title();?>を売りたいお客様へ</span>
		<span class="intro-appeal color-red">ジュエルカフェが</span>
		<span class="intro-main color-red">
			<?php the_title();?>買取に<br class="only-sp">自信がある理由
		</span>
	</h2>
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



<div class="intro-txt color-black">


	<div class="f-l">
	<?php
		$get_data = get_field('導入文');

		$get_data = str_replace('<p>','',$get_data);

		$get_data = str_replace('</p>','',$get_data);

		echo $get_data;

	?>
	</div>





</div>







<style>


.intro .intro-txt{width:100%;}

.intro .intro-fr{float:right;width:200px;}


@media screen and (min-width: 1000px) {

	.intro .intro-txt{width:55%;}
	.intro .intro-txt .f-l , .intro .intro-txt .f-r{clear:both;}
	
	.intro .medal{right:40px;bottom:-170px;}

}


@media screen and (max-width: 700px) {

	.intro{background:none;}

}


</style>
