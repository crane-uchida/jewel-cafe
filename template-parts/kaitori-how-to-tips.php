<section class="kaitori-howto">
	<div class="common-ttl">
		<div class="section-inner">
			<h2 class="kaitori-title">
				<span class="common-ttl-sub"><?php echo $args['custom_title']; ?>買取</span>
				<span class="common-ttl-main">今週の<span class="color-red"><?php echo $args['custom_title']; ?></span>豆知識</span>
			</h2>
			<div class="common-ttl-en">HOW TO TIPS</div>
		</div>
	</div>
	<div class="section-inner">
		<div class="kaitori-howto-item d-f">
			<h3 class="kaitori-howto-item-title"><?php echo $args['買取豆知識_タイトル'];  ;?></h3>
			<?php if(!empty($args['image_kaitori_howto']['url'])):?>
				<img src="<?php echo esc_url($args['image_kaitori_howto']['url']);?>" alt="<?php echo esc_html($args['image_kaitori_howto']['url']);?>">
			<?php endif;?>
		</div>
		<div class="kaitori-howto-txt">
			<?php echo $args['sentense_kaitori_howto'];?>
		</div>
	</div>
</section>