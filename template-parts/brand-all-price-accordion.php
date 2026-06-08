<style>

.accordion-purchase-ex .accordion .accordion-item .accordion-head a:before, .accordion-purchase-ex .accordion .accordion-item .accordion-head a:after, .shop-detail-faq .accordion .accordion-item .accordion-head a:before, .shop-detail-faq .accordion .accordion-item .accordion-head a:after, .accordion-section .accordion .accordion-item .accordion-head a:before, .accordion-section .accordion .accordion-item .accordion-head a:after, .tokei-pricetable .accordion .accordion-item .accordion-head a:before, .tokei-pricetable .accordion .accordion-item .accordion-head a:after, .brand-pricetable .accordion .accordion-item .accordion-head a:before, .brand-pricetable .accordion .accordion-item .accordion-head a:after, .card-pricetable .accordion .accordion-item .accordion-head a:before, .card-pricetable .accordion .accordion-item .accordion-head a:after{left:8px;border-bottom:solid 2px #de1122;border-right:solid 2px #de1122;}



.tokei-pricetable .accordion table tbody td:last-of-type, .brand-pricetable .accordion table tbody td:last-of-type, .card-pricetable .accordion table tbody td:last-of-type{width:14%;font-weight:normal;color:#202020;}



.accordion-purchase-ex .accordion .accordion-item, .shop-detail-faq .accordion .accordion-item, .accordion-section .accordion .accordion-item, .tokei-pricetable .accordion .accordion-item, .brand-pricetable .accordion .accordion-item, .card-pricetable .accordion .accordion-item{border:0px;}




.brand-pricetable .accordion .accordion-model{
	
	position:relative;
	
}



.accordion-head{position:relative;}




.brand-pricetable .accordion .accordion-model i{
	border-bottom:solid 2px #de1122;border-right:solid 2px #de1122;bottom:0;content:"";
	position:absolute;
	left:8px;
	top:50%;
	display:inline-block;height:6px;transform:translateY(-50%);transform:rotate(-45deg);transition:.2s;width:6px;
}





.brand-pricetable .accordion .accordion-item .accordion-head a:before{content:"";border:0px;} 

.brand-pricetable .accordion .accordion-item .accordion-head a:after{content:"";border:0px;}


.brand-pricetable .accordion .accordion-item .accordion-head i{
	
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


.accordion-purchase-ex .accordion .accordion-item .accordion-head a, .shop-detail-faq .accordion .accordion-item .accordion-head a, .accordion-section .accordion .accordion-item .accordion-head a, .tokei-pricetable .accordion .accordion-item .accordion-head a, .brand-pricetable .accordion .accordion-item .accordion-head a, .card-pricetable .accordion .accordion-item .accordion-head a{padding-left:25px;}




.model-price{color:#e31424;font-size:16px;font-weight:bold;}


.model-title{font-size:12px;}

.brand-pricetable .accordion .model-content td:first-child{width:60%;vertical-align:middle;}

.brand-pricetable .accordion .accordion-content2 td:first-child{width:60%;vertical-align:middle;}


.brand-pricetable .accordion .model-content td{font-size:12px;}


.accordion-model p{padding-left:25px;font-size:15px;}

.accordion-model p:hover{cursor:pointer;}


.brand-pricetable .accordion .model-content td:last-child{text-align:right;padding-right:10px;}


.brand-pricetable .section-price .accordion table tbody td:last-of-type{width:14%;}





.model-title{font-size:9px;}




@media (min-width: 1000px) {

	.model-title{margin-right:0;font-size:11px;}

	.accordion-content2{padding:30px 20px;}

	.accordion-head{padding:0px 20px;border-bottom:1px solid #8f8f8f;}

	.brand-pricetable .accordion .model-content td:first-child{padding-left:50px;}

	.model-price{color:#e31424;font-size:19px;font-weight:bold;}

	.brand-pricetable .accordion .model-content td{font-size:14px;}
	
	.brand-pricetable .accordion .model-content td:first-child{width:45%;}
	
	
	.brand-pricetable .accordion .accordion-content2 td:first-child{width:45%;vertical-align:middle;}
	
	
	
	

}


</style>







<section class="brand-pricetable">
	<div class="common-ttl">
		<div class="section-inner">
			<h2 class="shop-title kaitori-title">
				<span class="common-ttl-sub">ジュエルカフェの</span>
				<span class="common-ttl-main"><?php the_title();?>買取価格<span class="color-red">相場表</span></span>
			</h2>
			<div class="common-ttl-en">Brand PriceTable</div>
		</div>
	</div>


	<div class="section-inner section-price">
		<div class="accordion">
			<?php
				
				global $wpdb;
				
				$post_type_slug = 'kaitori';
				$args = array(
					'post_type' => $post_type_slug,
					'posts_per_page' => -1,
					'post_parent' => $post->ID,
					'no_found_rows' => true,
				);

				$the_query = new WP_Query($args);

				if($the_query->have_posts()):


				while($the_query->have_posts()): $the_query->the_post();
					
					
	
					$post_id = get_the_ID();
		
		
					$sql = "SELECT count(*) FROM `wp_postmeta` LEFT JOIN `wp_posts` ON  `wp_postmeta`.post_id =  `wp_posts`.ID	  where  `wp_posts`.post_type = 'kaitori'  and   `wp_posts`.post_parent = {$post_id}	 and `wp_postmeta`.meta_key = 'ライン1'   ";
					
					$count = $wpdb->get_var( $sql );
					
					
	
					if(	$count > 0  ){
			?>


			<div class="accordion-item">

				<p class="accordion-head">
				
					<i></i>
					<a href="javascript:void(0);"><?php the_title();?>の買取相場</a>	
					
				</p>
				
				

				<div class="accordion-content2" style="display:none;">
					<table>
							<?php
								for( $i=1; $i<=20; $i++){

									if(get_field('ライン'.$i)){

										echo '<tr>';
										echo '<td>'.get_field('ライン'.$i).'<div class="only-sp model-title">'.get_field('型番_デザイン'.$i).'</div></td>';
										echo '<td class="only-pc">'.get_field('型番_デザイン'.$i).'</td>';
										echo '<td align="right">'.get_field('買取金額'.$i).'</td>';
										echo '</tr>';

									}

								}
							?>
					</table>


							<?php
								$post_id = get_the_ID();


								$temp = $the_query; //子ページのクエリを格納
								$the_query = null; //孫ページ用に初期化

								$args = array(
									'post_type' => $post_type_slug,
									'posts_per_page' => -1,
									'post_parent' => $post_id,
									'no_found_rows' => true,
								);
								$the_query = new WP_Query($args);
								if($the_query->have_posts()):
							?>
							<?php //時計孫ページのループ
								while($the_query->have_posts()): $the_query->the_post();?>


								<?php //孫ページのカスタムフィールド出力
									if(get_field('ライン1')):
								?>
								<table class="accordion-model">
								<tr>
									<td colspan="3" >
										<i></i>
										<p>
											<?php
												$filed1 =  get_field('ライン1');
												
												$filed1 =  str_replace('　',' ',$filed1);

												echo $filed1;
											?>
										</p>
									</td>
								</tr>
								</table>
								<?php endif;?>



							<div class="model-content">
								<table>
									<?php
										for( $i=1; $i<=20; $i++){

											if(get_field('ライン'.$i)){

												$price = str_replace( '¥' , '' ,get_field('買取金額'.$i) );

												$price = str_replace( '￥' , '' ,$price );
												
												
												$filed1 =  get_field('ライン'.$i);
												
												$filed1 =  str_replace('　',' ',$filed1);

												echo '<tr>';
												echo '<td>'.$filed1.'<div class="only-sp model-title">'.get_field('型番_デザイン'.$i).'</div></td>';
												echo '<td class="only-pc">'.get_field('型番_デザイン'.$i).'</td>';
												echo '<td align="right"><span class="model-title">新品買取相場価格</span><br  class="only-sp"><span class="model-price">¥'.$price.'</span></td>';
												echo '</tr>';

											}
										}
									?>
								</table>
							</div>




							<?php endwhile; endif;
								$the_query = null; //子ページのクエリに戻すため初期化
								$the_query = $temp; //子ページのクエリに戻す
							?>
						</table>

				</div>



			</div>
			<?php
					}
			?>

			<?php endwhile; wp_reset_postdata(); endif;?>
			
			<p class="table-att small-font-size ta-l mt-20">*掲載情報は該当商品の新品もしくは新古品にて算出した価格となります。また、市場価格は随時変動いたしますので、店舗にて実際にお買取させていただく価格とも異なる場合がございます。あらかじめご了承くださいませ。</p>
		</div>
			
	</div>

</section>


