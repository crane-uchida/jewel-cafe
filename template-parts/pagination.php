<?php if ($the_query->max_num_pages > 1) : ?>
	<?php
		$limitnum = 999999999;
		echo '<div class="p-blog__pager">';
		echo paginate_links(array(
			'base'         => str_replace($limitnum, '%#%', esc_url(get_pagenum_link($limitnum))),
			'format'       => '',
			'current'      => max(1, get_query_var('paged')),
			'total'        => $the_query->max_num_pages,
			'prev_next'    => false,
			'type'         => 'list',
			'end_size'     => 3,
			'mid_size'     => 3
		));
		echo '</div>';
	?>
<?php endif; ?>