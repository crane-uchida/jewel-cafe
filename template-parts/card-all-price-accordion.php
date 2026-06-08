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



.accordion-purchase-ex .accordion .accordion-item .accordion-head a:before, .accordion-purchase-ex .accordion .accordion-item .accordion-head a:after, .shop-detail-faq .accordion .accordion-item .accordion-head a:before, .shop-detail-faq .accordion .accordion-item .accordion-head a:after, .accordion-section .accordion .accordion-item .accordion-head a:before, .accordion-section .accordion .accordion-item .accordion-head a:after, .card-pricetable .accordion .accordion-item .accordion-head a:before, .card-pricetable .accordion .accordion-item .accordion-head a:after, .card-pricetable .accordion .accordion-item .accordion-head a:before, .card-pricetable .accordion .accordion-item .accordion-head a:after, .card-pricetable .accordion .accordion-item .accordion-head a:before, .card-pricetable .accordion .accordion-item .accordion-head a:after{left:8px;border-bottom:solid 2px #de1122;border-right:solid 2px #de1122;}




.card-pricetable .accordion table tbody td:last-of-type, .card-pricetable .accordion table tbody td:last-of-type, .card-pricetable .accordion table tbody td:last-of-type{font-weight:normal;color:#202020;}



.accordion-purchase-ex .accordion .accordion-item, .shop-detail-faq .accordion .accordion-item, .accordion-section .accordion .accordion-item, .card-pricetable .accordion .accordion-item, .card-pricetable .accordion .accordion-item, .card-pricetable .accordion .accordion-item{border:0px;}




.card-pricetable .accordion .accordion-model{
	
	position:relative;
	
}





.card-pricetable .accordion .accordion-content2 .accordion-model td i{
	border-bottom:solid 2px #de1122;border-right:solid 2px #de1122;bottom:0;content:"";
	position:absolute;
	left:8px;
	top:50%;
	display:inline-block;height:6px;transform:translateY(-50%);transform:rotate(-45deg);transition:.2s;width:6px;
}




.card-pricetable .accordion .accordion-item .accordion-head a:before{content:"";border:0px;} 

.card-pricetable .accordion .accordion-item .accordion-head a:after{content:"";border:0px;}


.card-pricetable .accordion .accordion-item .accordion-head i{
	
	border-bottom:solid 2px #de1122;
	border-right:solid 2px #de1122;
	bottom:0;
	content:"";
	position:absolute;
	left:8px;
	top:50%;
	display:inline-block;
	height:6px;
	transform:translateY(-50%);
	transform:rotate(-45deg);
	transition:.2s;
	width:6px;
	
}










.accordion-content2{background:#f1f1f1;padding:10px;}

.accordion-head{padding:0px 10px;border-bottom:1px solid #8f8f8f;}


.accordion-purchase-ex .accordion .accordion-item .accordion-head a, .shop-detail-faq .accordion .accordion-item .accordion-head a, .accordion-section .accordion .accordion-item .accordion-head a, .card-pricetable .accordion .accordion-item .accordion-head a, .card-pricetable .accordion .accordion-item .accordion-head a, .card-pricetable .accordion .accordion-item .accordion-head a{padding-left:25px;}




.model-price{color:#e31424;font-size:16px;font-weight:bold;}


.model-title{font-size:12px;}

.card-pricetable .accordion .model-content td:first-child{width:58%;vertical-align:middle;}

.card-pricetable .accordion .accordion-content2 td:first-child{width:58%;vertical-align:middle;}

.card-pricetable .accordion table tbody td:nth-of-type(2){padding-right:0px;}


.card-pricetable .accordion .model-content td{font-size:12px;}


.accordion-model p{padding-left:25px;font-size:15px;}

.accordion-model p:hover{cursor:pointer;}


.card-pricetable .accordion .model-content td:last-child{text-align:right;padding-right:10px;}


.model-title{font-size:9px;}


@media (min-width: 800px) {

	.model-title{font-size:11px;}

	.accordion-content2{padding:30px 20px;}

	.accordion-head{padding:0px 20px;border-bottom:1px solid #8f8f8f;}

	.card-pricetable .accordion .model-content td:first-child{padding-left:50px;}

	.model-price{color:#e31424;font-size:19px;font-weight:bold;}

	.card-pricetable .accordion .model-content td{font-size:14px;}
	


}


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

				if( isset($kaitori_area_parent_id) && $kaitori_area_parent_id):
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
					<i></i>
					<a href="javascript:void(0);"><?php echo $v->meta_value;?>の買取相場</a>
				</p>
				

				<div class="accordion-content2">
					<table>
					
					
					
						<tbody>

							<?php
								if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):
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
								<?php if( isset($kaitori_area_parent_id) && $kaitori_area_parent_id):?>
									<td><?php the_field('商品名'.$fkey, $kaitori_area_parent_id);?></td>
									<td align="center"><?php the_field('備考'.$fkey, $kaitori_area_parent_id);?></td>
									<td align="right"><span class="model-price">¥<?php the_field('買取価格'.$fkey, $kaitori_area_parent_id);?></span></td>
								<?php else:?>
									<td><?php the_field('商品名'.$fkey);?></td>
									<td align="center"><?php the_field('備考'.$fkey);?></td>
									<td align="right"><span class="model-price">¥<?php the_field('買取価格'.$fkey);?></span></td>
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
