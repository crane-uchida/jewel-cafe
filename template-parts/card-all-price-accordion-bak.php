<?php
	if (get_the_terms($post->ID, 'area')):
		$kaitori_area_parent_id = $post->post_parent;
		$custom_title = get_post( $kaitori_area_parent_id)->post_title;

		$check_field = JC_check_field( $post->post_parent , '種類' );
	else:
		$check_field = JC_check_field( $post->ID , '種類' );
		$custom_title = get_the_title();
	endif;

	if( $check_field > 0 ) :
?>
<style>

	.card-pricetable{}


</style>

<section class="card-pricetable">
	<div class="common-ttl">
		<div class="section-inner">
			<h2 class="shop-title kaitori-title">
				<span class="common-ttl-sub">ジュエルカフェの</span>
				<span class="common-ttl-main"><?php echo $custom_title;?>買取価格<span class="color-red">相場表</span></span>
			</h2>
			<div class="common-ttl-en">Watch PriceTable</div>
		</div>
	</div>


	<div class="section-inner">

		<div class="mb-20 section-message">
			本ページに掲載している買取価格 / 買取レートは<span>宅配買取限定価格</span>となります。<br />
			<span>店頭買取の買取価格 / 買取レートとは異なります</span>のでご注意ください。<br />
			また、宅配買取の際に<span>金券のみでの査定の場合は送料はお客様負担</span>とさせていただきます。あらかじめご了承ください。
		</div>



		<div class="accordion" id="first-accordion">
			<?php

				if($kaitori_area_parent_id):
					$sql = "SELECT * FROM `wp_postmeta` where   post_id  = {$kaitori_area_parent_id} and  meta_key  like '種類%'   group by meta_value ";
				else:
					$sql = "SELECT * FROM `wp_postmeta` where   post_id  = {$post->ID} and  meta_key  like '種類%'   group by meta_value ";
				endif;

				$result = $wpdb->get_results( $sql );

				$num = $wpdb->num_rows;


				if($num > 0 ):

					foreach($result as $k=>$v):
					
					
		
					if ( empty(trim($v->meta_value)) == false ):
		?>

			<div class="accordion-item">
				<p class="accordion-head">
					<a href="javascript:void(0);"><?php echo $v->meta_value;?>の買取相場</a>
				</p>


				<div class="accordion-content" style="display:block;">
					<table>
						<thead>
							<tr>
								<th>商品名</th>
								<th>買取価格</th>
								<th>レート/備考</th>
							</tr>
						</thead>
						<tbody>

							<?php
								if($kaitori_area_parent_id):
									$type_sql = "SELECT * FROM `wp_postmeta` where   post_id  = {$kaitori_area_parent_id} and  meta_value= '{$v->meta_value}'  ";
								else:
									$type_sql = "SELECT * FROM `wp_postmeta` where   post_id  = {$post->ID} and  meta_value= '{$v->meta_value}'  ";
								endif;

								$type_result = $wpdb->get_results( $type_sql );

								foreach( $type_result as $k2=>$v2 ):

								if ( empty(trim($v2->meta_value)) == false ):

									$fkey = str_replace('種類', '' ,$v2->meta_key);

							?>
							<tr>
								<?php if($kaitori_area_parent_id):?>
									<td><?php the_field('商品名'.$fkey, $kaitori_area_parent_id);?></td>
									<td>¥<?php the_field('買取価格'.$fkey, $kaitori_area_parent_id);?></td>
									<td><?php the_field('備考'.$fkey, $kaitori_area_parent_id);?></td>
								<?php else:?>
									<td><?php the_field('商品名'.$fkey);?></td>
									<td>¥<?php the_field('買取価格'.$fkey);?></td>
									<td><?php the_field('備考'.$fkey);?></td>
								<?php endif;?>
							</tr>
							<?php

								endif;

							endforeach;

							?>

						</tbody>
					</table>
				</div>

			</div>

			<?php
					endif;

				endforeach;

			endif;
			?>
		</div>

		<p class="table-att small-font-size ta-l mt-20">*掲載情報は該当商品の新品もしくは新古品にて算出した価格となります。また、市場価格は随時変動いたしますので、店舗にて実際にお買取させていただく価格とも異なる場合がございます。あらかじめご了承くださいませ。</p>
	</div>

</section>


<?php

	endif;

?>
