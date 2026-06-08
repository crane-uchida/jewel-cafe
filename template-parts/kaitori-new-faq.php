<?php // /kaitori/の直下（1階層だけ）に一致するURLだけ処理する。品目ページの大カテゴリのみ（例）https://jewel-cafe.jp/kaitori/gold/
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (preg_match('#^/kaitori/[^/]+/?$#', $path)) :
?>
	<div class="section-inner">
		<h2 class="section-ttl-main bold">
			<p class="lh-20 section-ttl-sub bold">
				<?php echo display_filed('faq_title',get_the_title().'買取の'); ?>
			</p>
			<?php echo display_filed('faq_title2','よくあるご質問'); ?>
		</h2>
		<p class="section-ttl-con"></p>
	</div>
<?php endif; ?>





<div class="section-inner">

<?php


	for ($k=1; $k<=10; $k++) :
	

	if (get_field('よくあるご質問その'.$k.'_Q',$args['post_id'])) :
?>
		<div class="kaitori-faq-list">
			<dl>
				<dt>
					<div class="d-f mb-4 ai-t kaitori-faq-icon">
						<span class="ico-plus mr-10"></span>
						<h3 class="faq-txt bold"><?php echo get_field('よくあるご質問その'.$k.'_Q',$args['post_id']); ?></h3>
					</div>
				</dt>
				<dd>
					<div>
						<div class="faq-txt lh-20"><?php echo get_field('よくあるご質問その'.$k.'_A',$args['post_id']); ?></div>
					</div>
				</dd>
			</dl>
		</div>
<?php
	endif;
	endfor;
?>

</div>



<script>
$('.kaitori-faq-list dt').on('click', function() {
	
	
	var check_result = $(this).children().find('.ico-plus');
	

	
	if(check_result[0] !== undefined){

		$(this).children().find('.ico-plus').addClass('ico-close');
		
		$(this).children().find('.ico-plus').removeClass('ico-plus');
		
		$(this).parent().find('dd').slideToggle(300);		

	}else{
		

		$(this).children().find('.ico-close').addClass('ico-plus');
		
		$(this).children().find('.ico-close').removeClass('ico-close');
		
		$(this).parent().find('dd').slideToggle(300);		

	}

	
});

</script>


