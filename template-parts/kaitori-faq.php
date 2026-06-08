<div class="common-ttl">
	<div class="section-inner">
		<h2 class="kaitori-title">
			<span class="common-ttl-sub"><?php echo $args['custom_title']; ?>買取の</span>
			<span class="common-ttl-main">よくある<span class="color-red">ご質問</span></span>
		</h2>
		<div class="common-ttl-en">Faq</div>
	</div>
</div>

<div class="section-inner">

<?php
	for ($k=1; $k<=10; $k++) :

	if (get_field('よくあるご質問その'.$k.'_Q',$args['post_id'])) :
?>
		<div class="kaitori-faq-list">
			<dl>
				<dt>
					<div class="d-f mb-4">
						<div class="faq-icon mr-4 bold">Q</div>
						<div class="faq-txt bold"><?php the_field('よくあるご質問その'.$k.'_Q',$args['post_id']); ?></div>
					</div>
				</dt>
				<dd>
					<div class="d-f">
						<div class="faq-icon color-red mr-4">A</div>
						<div class="faq-txt"><?php the_field('よくあるご質問その'.$k.'_A',$args['post_id']); ?></div>
					</div>
				</dd>
			</dl>
		</div>
<?php
	endif;

	endfor;
?>

</div>