<?php 
	$my_tax = 'area';
	$parent_terms = get_terms($my_tax, array('hide_empty' => false, 'parent' => 0));
	if(!empty($parent_terms)):

		foreach ($parent_terms as $pt) :
			$pt_id = $pt->term_id;
			$pt_name = $pt->name;
			$pt_url = get_term_link($pt);
	?>
		<?php 
			$child_terms = get_terms($my_tax, array('hide_empty' => false, 'parent' => $pt_id));
			if (!empty($child_terms)):
				foreach ($child_terms as $ct) :
					echo '<div class="wrap search-shop-flex c2 -wrap" data-shop-wrap="'.$ct->name.'">';
					$ct_id = $ct->term_id;
					$ct_slug = $ct->slug;
					$args = array(
						'post_type' => array('shop'),
						$my_tax => $ct_slug,

					);
					$the_query = new WP_Query($args);
		?>
			<?php if($the_query->have_posts()):?>
				<?php while ($the_query->have_posts()): $the_query->the_post();?>
					<a href="<?php the_permalink(  );?>">
						<div class="ico_arrow"><?php the_title( );?></div>
					</a>
				<?php endwhile;?>
			<?php else:?>
				<div class="noshops">店舗が見つかりませんでした。</div>
			<?php endif;?>
		</div>
		<?php wp_reset_postdata();?>
		<?php endforeach; endif;?>
	<?php endforeach; endif;?>