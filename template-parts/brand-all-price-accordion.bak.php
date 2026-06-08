



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


	<div class="section-inner">
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

				<p class="accordion-head"><a href="javascript:void(0);"><?php the_title();?>の買取相場</a></p>
				
				

				<div class="accordion-content2" style="display:none;">
					<table>

						<thead>
							<tr>
								<th>ライン</th>
								<th >型番/デザイン</th>
								<th align="right">買取金額</th>
							</tr>
						</thead>

							<?php
								for( $i=1; $i<=20; $i++){

									if(get_field('ライン'.$i)){

										echo '<tr>';
										echo '<td>'.get_field('ライン'.$i).'</td>';
										echo '<td>'.get_field('型番_デザイン'.$i).'</td>';
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
										<p>
											<?php
												$filed1 =  get_field('ライン1');

												echo $filed1;
											?>
										</p>
										<i></i>
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
		</div>
			<p class="table-att small-font-size ta-l mt-20">*掲載情報は該当商品の新品もしくは新古品にて算出した価格となります。また、市場価格は随時変動いたしますので、店舗にて実際にお買取させていただく価格とも異なる場合がございます。あらかじめご了承くださいませ。</p>
	</div>

</section>
