<?php 
	$kaitori_area_parent_id = $post->post_parent;
	$custom_title = get_post( $kaitori_area_parent_id)->post_title;
?>


<div class="mincho pos-r">


	


	<h1 class="intro-title">
		<span class="intro-appeal color-red"><?php echo $post->post_title;?>買取なら</span>
		<span class="intro-main color-red">ジュエルカフェへ！</span>
	</h1>

	
</div>

<p class="intro-txt color-black">
	<?php
	echo nl2br( get_field('「ジュエルカフェにお任せください」以降の導入文（短め・大・小カテゴリ用）') );
	?>
</p>


<style>
@media screen and (min-width: 1000px) {
	
	.intro .medal{right:40px;bottom:-170px;}
	
}	
</style>