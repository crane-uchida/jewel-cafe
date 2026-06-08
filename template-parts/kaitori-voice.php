			<section class="kaitori-voice">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">ジュエルカフェで<br><?php echo $args['custom_title']; ?>買取をご利用いただいた</span>
							<span class="common-ttl-main">お客様の<span class="color-red">声</span></span>
						</h2>
						<div class="common-ttl-en">Customer's Voice</div>
					</div>
				</div>

				<div class="rating py-4">
				  <div class="text-center">
					<div class="count-rating color-red">
					  <div class="bold">
						<span>4.8</span>
					  </div>
					  <div class="devider"></div>
					  <div class="star-rating">
						<div class="star-rating-front" style="width: 96%"></div>
						<div class="star-rating-back"></div>
					  </div>
					</div>
					<div class="count-review mt-3 ta-c">
					  （<span>47</span>件のレビュー）
					</div>
				  </div>
				</div>

				<div class="section-inner">
					<div class="voice-list2">

						<?php



							if( $kaitori_area_parent_id && $post->post_parent > 0 ){

								$post_id = $post->post_parent;


							}else{

								$post_id = $post->ID;

							}



							$voice_field_num = JC_get_field_num($post_id , 'お客様の声');



							for ($k=1; $k<=$voice_field_num; $k++) :

							if (get_field('お客様の声その'.$k.'_お客様タイトル',$post_id)) :



						?>
						<div class="voice-list-item">
							<div class="d-f media jc-sb">

								<div class="voice-default">
									<div class="count-rating">
										<div class="rating-value mr-3">
<?php
	$ary = array("5.0", "4.9", "4.8");
	$key = array_rand($ary, 1);
	echo $ary[$key];
?>
										</div>
										<div class="star-rating">
											<div class="star-rating-front" style="width: 100%"></div>
											<div class="star-rating-back"></div>
										</div>
									</div>
									<div class="shop-customer-review-header bold">
										<h3 class="voice-ttl"><?php the_field('お客様の声その'.$k.'_お客様タイトル',$post_id);?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="voice-txt">
								<div class="voiceBox">
									<div class="voiceBox-inner">
										<?php

											$content = get_field('お客様の声その'.$k.'_お客様の声',$post_id);

											echo strip_tags($content);

										?>
									</div>
								</div>
						</div>


						<?php
							endif;
							endfor;
						?>

					</div>
				</div>
			</section>
