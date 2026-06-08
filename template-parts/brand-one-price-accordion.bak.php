

<style>

.accordion-purchase-ex .accordion .accordion-item .accordion-head a:before, .accordion-purchase-ex .accordion .accordion-item .accordion-head a:after, .shop-detail-faq .accordion .accordion-item .accordion-head a:before, .shop-detail-faq .accordion .accordion-item .accordion-head a:after, .accordion-section .accordion .accordion-item .accordion-head a:before, .accordion-section .accordion .accordion-item .accordion-head a:after, .tokei-pricetable .accordion .accordion-item .accordion-head a:before, .tokei-pricetable .accordion .accordion-item .accordion-head a:after, .brand-pricetable .accordion .accordion-item .accordion-head a:before, .brand-pricetable .accordion .accordion-item .accordion-head a:after, .card-pricetable .accordion .accordion-item .accordion-head a:before, .card-pricetable .accordion .accordion-item .accordion-head a:after{left:8px;border-bottom:solid 2px #de1122;border-right:solid 2px #de1122;}



.tokei-pricetable .accordion table tbody td:last-of-type, .brand-pricetable .accordion table tbody td:last-of-type, .card-pricetable .accordion table tbody td:last-of-type{font-weight:normal;color:#202020;}



.accordion-purchase-ex .accordion .accordion-item, .shop-detail-faq .accordion .accordion-item, .accordion-section .accordion .accordion-item, .tokei-pricetable .accordion .accordion-item, .brand-pricetable .accordion .accordion-item, .card-pricetable .accordion .accordion-item{border:0px;}




.brand-pricetable .accordion .accordion-model{
	
	position:relative;
	
}

.brand-pricetable .accordion .accordion-model i{
	border-bottom:solid 2px #de1122;border-right:solid 2px #de1122;bottom:0;content:"";
	position:absolute;
	left:8px;
	top:50%;
	display:inline-block;height:6px;transform:translateY(-50%);transform:rotate(45deg);transition:.2s;width:6px;
}


.accordion-head{padding:0px 20px;border-bottom:1px solid #8f8f8f;}






.accordion-purchase-ex .accordion .accordion-item .accordion-head a, .shop-detail-faq .accordion .accordion-item .accordion-head a, .accordion-section .accordion .accordion-item .accordion-head a, .tokei-pricetable .accordion .accordion-item .accordion-head a, .brand-pricetable .accordion .accordion-item .accordion-head a, .card-pricetable .accordion .accordion-item .accordion-head a{padding-left:25px;}


.accordion-model p{padding-left:25px;}


.brand-pricetable .accordion .model-content td{font-size:14px;}

.brand-pricetable .accordion .model-content td:first-child{padding-left:50px;}

.brand-pricetable .accordion .model-content tr:last-child td{border-bottom:1px solid #8f8f8f;}




.model-title{font-size:12px;margin-right:15px;}

.model-price{color:#e31424;font-size:19px;font-weight:bold;}


.accordion-content2{background:#f1f1f1;padding:30px 20px;}


</style>





<section class="brand-pricetable">
	<div class="common-ttl">
		<div class="section-inner">
			<h2 class="shop-title kaitori-title">
				<span class="common-ttl-sub">ジュエルカフェの</span>
				<span class="common-ttl-main"><?php the_title();?>買取価格<span class="color-red">相場表</span></span>
			</h2>
			<div class="common-ttl-en">Watch PriceTable</div>
		</div>
	</div>
	<div class="section-inner">
		<div class="accordion">
			<div class="accordion-item">
				<p class="accordion-head">
					<span class="accordion-head-text"><strong><?php the_title();?>の買取相場</strong></span>
				</p>
				<div class="accordion-content">
					<table>

							<?php
								$terms = get_the_terms( $post->ID, 'hinmoku' );


								$terms_count = count($terms);
	

								$wp_obj = get_queried_object(  );
								foreach ($terms as $term) {
									if($term->parent === 0) {
										$parent_terms_slug = $term->slug;
										$parent_terms_id = $term->term_id;
									}
								}
								if($terms_count === 2) {
									foreach ($terms as $term) {
										if ($term->parent === $parent_terms_id) {
											$child_terms_slug = $term->slug;
											$child_terms_id = $term->term_id;
										}
									}
								}


								if($terms_count === 3) {
									foreach ($terms as $term) {
										if ($term->parent === $child_terms_id) {
											$grand_child_terms_slug = $term->slug;
											$grand_terms_id = $term->term_id;
										}
									}
								}
							
							
		

							?>
							<?php if($child_terms_slug === $wp_obj->post_name ||  $post->ID == 3472):?>
							
								<?php
									$post_type_slug = 'kaitori';
									$args = array(
										'post_type' => $post_type_slug,
										'posts_per_page' => -1,
										'post_parent' => $post->ID,
										'no_found_rows' => true,
									);
									$the_query = new WP_Query($args);
									if($the_query->have_posts()):
								?>

								<?php while($the_query->have_posts()): $the_query->the_post();?>


									<?php

										if(get_field('ライン1')):
									?>
									<table class="accordion-model" cellpadding="0" cellspacing="0">
									<tbody>
									<tr>
										<td colspan="3">


											<?php
												$filed1 =  get_field('ライン1');



												echo $filed1;

											?>

											<i></i>
										</td>
									</tr>
									</tbody>
									</table>
									<?php endif;?>


								<div class="model-content">

								<table>


									<?php
										//add field  50
										for( $i=1; $i<=50; $i++){

											if(get_field('ライン'.$i)){

												$price = str_replace( '¥' , '' ,get_field('買取金額'.$i) );

												$price = str_replace( '￥' , '' ,$price );

												echo '<tr>';
												echo '<td>'.get_field('ライン'.$i).'</td>';
												echo '<td>'.get_field('型番_デザイン'.$i).'</td>';
												echo '<td align="right">¥'.$price.'</td>';
												echo '</tr>';

											}

										}
									?>


								</table>
								</div>


								<?php
									endwhile;
									wp_reset_postdata(  );
									endif;
								?>
							<?php endif;?>






							<table>

							<?php
								//add field  50



								for( $i=1; $i<=50; $i++){

									if(get_field('ライン'.$i)){


												$price = str_replace( '¥' , '' ,get_field('買取金額'.$i) );

												$price = str_replace( '￥' , '' ,$price );



												echo '<tr>';
												echo '<td>'.get_field('ライン'.$i).'</td>';
												echo '<td>'.get_field('型番_デザイン'.$i).'</td>';
												echo '<td align="right">¥'.$price.'</td>';
												echo '</tr>';

									}

								}
							?>



							</tbody>
						</table>



					</table>


				</div>
			</div>
		</div>
		<p class="table-att small-font-size ta-l mt-20">*掲載情報は該当商品の新品もしくは新古品にて算出した価格となります。また、市場価格は随時変動いたしますので、店舗にて実際にお買取させていただく価格とも異なる場合がございます。あらかじめご了承くださいませ。</p>
	</div>
</section>
