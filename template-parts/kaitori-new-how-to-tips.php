<section class="kaitori-howto">

	<div class="red_bg mb-20 mt-20">
		<div class="section-inner">
			<div class="red-bar d-f bold mame-title">
				<div class="red-bar-title">
					<h2>
						<?php echo display_filed('tips_title',get_the_title().'買取<br class="only-sp">豆知識'); ?>
					</h2>
				</div>
			</div>
		</div>
	</div>
	
	<div class="section-inner">
		<div>
			<h3 class="kaitori-howto-item-title"><?php echo $args['post_title'];?></h3>
			<?php if(!empty($args['image_kaitori_howto']['url'])):?>
				<img src="<?php echo esc_url($args['image_kaitori_howto']['url']);?>" alt="<?php echo esc_html($args['image_kaitori_howto']['url']);?>">
			<?php endif;?>
		</div>

		<?php if(is_single('gold')):?>
			<p class="text">近年金相場は、本ページの金相場グラフからもわかるように大きく上昇しています。<br><br>近年相場が上昇している理由はたくさんありますが、主な理由は5つに集約されます。<br><br>・世界情勢の不安〜ロシアウクライナの対立<br>・インフレ不安<br>・世界的な低金利<br>・株価が不安定<br>・中国やインドなどの台頭<br><br>金相場が、近年高騰している理由についてわかりやすく説明をします。<span class="ico-plus parent"></span></p>
			<div class="kaitori-howto-txt lh-20 justify" style="display:none;">
				<?php echo $args['sentense_kaitori_howto'];?>
			</div>
		<?php else:?>
			<div class="kaitori-howto-txt lh-20 justify">
				<?php echo $args['sentense_kaitori_howto'];?>
			</div>
		<?php endif;?>

	</div>
</section>




