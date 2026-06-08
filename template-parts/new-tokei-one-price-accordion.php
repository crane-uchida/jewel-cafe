
<section class="tokei-pricetable">

	<div class="section-inner">
	
		<div class="section-title red_bg mb-20 mt-20">
			<div class="point-bar d-f bold">
				<div class="point-bar-title color-white"> ジュエルカフェの<br> <?php the_title();?><br class="only-sp">買取ポイント</div> 
				<span class="color-white"><?php if(trim($args['post_number']) !== ''){echo $args['post_number'];}else{ echo '06';}?></span>
			</div>
		</div>
		
		<p class="lh-20 section-ttl-sub bold">最新市場価格で更新中！</p>
		<h2 class="section-ttl-main bold"> <?php the_title();?><br class="only-sp">買取価格相場表</h2>





			<div class="section-inner graph-grid mb-20">

				<?php
					for($k = 1;$k <= 8;$k++){
						
						if( get_field('型番_デザイン'.$k,$post->ID) !== '' ){
						
				?>
					<div class="graph-wrap">
						<h3><a href="/kaitori/tokei/rolex-top/">ロレックス</a></h3>
						<h4><a href="/kaitori/tokei/rolex-top/<?php echo $post->post_name;?>/"><?php echo $post->post_title?></a></h4>
						<h5><?php echo get_field('型番_デザイン'.$k,$post->ID);?></h5>

						<div>
							<canvas id="chart<?php echo $k;?>"></canvas>
						</div>
						
						<?php

							$tokei_ratio = 0.65;
							
							if( trim(get_field('ratio')) !== ''){
								
								$tokei_ratio = get_field('ratio') * 0.01;
								
								
							}
							
							
							$price = get_field('買取金額'.$k,$post->ID);
							
							
							

							if(trim($price) !== 'ASK'){
								

								$price = @intval($price * $tokei_ratio);

								$price = @number_format(round($price,-4));
							
							
							}
						
							$price = str_replace('¥','',$price);
					
							

							$representative_price = get_field('representative_model'.$k,$post->ID);
						
							$representative_arr = explode(',' , $representative_price);
							

							
							$representative_percent = round(($representative_arr[6] - $representative_arr[5]) / $representative_arr[5] * 100 ,2);
					
							
							if($representative_arr[6] >= $representative_arr[5]){
								
								$representative_per_str = '<font color="blue">(前日比 +'.$representative_percent.'%)</font>';
								
							}else{
							
								$representative_per_str = '<font color="#E31424">(前日比 '.$representative_percent.'%)</font>';
								
							}



						?>
						
						
						
						
						<div class="graph-info">
							<div class="graph-tokei-img">
							
								<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rolex-image/<?php echo $post->post_name.'-'.$k;?>.jpg" alt="" />
			
							</div>		
							
							<div class="">
								<p class="graph-name">ジュエルカフェ<br>最新買取相場価格</p>
								<p class="graph-price">¥<?php echo $price;?></p>
								<p class="graph-comparison"><?php echo $representative_per_str;?></p>
							</div>				
						</div>
						
					</div>
				<?php
					}
					
					}
				?>	

			</div>	
	

  <!--  独自ライブラリ読み込み -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
  <!--  /独自ライブラリ読み込み -->

  <script>
  
 	<?php
		for($k = 1;$k <= 8;$k++){
			
	
			$representative_price = get_field('representative_model'.$k,$post->ID);
		
			$representative_arr = explode(',' , $representative_price);

			
			
	?> 
  
  var ctx = document.getElementById("chart<?php echo $k;?>");
  

  var myLineChart = new Chart(ctx, {
    // グラフの種類：折れ線グラフを指定
    type: 'line',
    data: {
      // x軸の各メモリ
      labels: [	  
	  "","","","","","","","",
	  ],
      datasets: [
        {
		 display: false,
          label: '',
          data: [
			<?php echo $representative_arr[0]?>,
			<?php echo $representative_arr[1]?>,
			<?php echo $representative_arr[2]?>,
			<?php echo $representative_arr[3]?>,
			<?php echo $representative_arr[4]?>,
			<?php echo $representative_arr[5]?>,
			<?php echo $representative_arr[6]?>
		  ],
          borderColor: "#DE1022",
          backgroundColor: "#00000000"
        },	
      ],
    },
	
    options: {
	  tooltips: {enabled: false},
	  hover: {mode: null},
	  showLabelBackdrop:false,
	  legend: {position: 'none'},
      scales: {
		xAxes: [
				{

				 ticks: {
				 
					 display: true,
					
					gridLines: {        // 垂直補助線の定義
						display: false     // 消す
					},
					scaleLabel: {display: false}
			
					}
			
				}
			],
			yAxes: [
				{
				
				  ticks: {

                    display: false,
      
					reverse: false,
	
					mirror: true,
	
					//stepSize: 12000,  // 縦メモリのステップ数
					
					min: <?php echo min($representative_arr) - 10000;?>,  //最小値を1に
					
					max: <?php echo max($representative_arr) + 50000;?>,  //最大値を100に					
					
					callback: function(value, index, values){
					  return  value  // 各メモリのステップごとの表記（valueは各ステップの値）
					}
				  }
 
				}
			]
      },
	  
    }
  });
  
  <?php
	
	}
  
  ?>
  
  </script>
	

	



		<div class="accordion">
		
				<div class="p-10">
					<time itemprop="dateModified"><?php echo date('Y年m月d日');?></time>更新
				</div>
				
			<div class="accordion-item">
				<p class="accordion-head" style="border-bottom:1px solid #8f8f8f;">
					<i></i>
					<a href="javascript:void(0);"><?php the_title();?>の買取相場</a>
				</p>

				
				<div class="accordion-content2">
					
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
							
							





							<table>


							<?php
							

							//ロレックスのみ 対応
							
							$parent_id = $post->post_parent;
							
							$parent_title = get_post($parent_id)->post_title;
							
				
			
							if(get_post($parent_id)->post_name == 'rolex-top'){

								$tokei_ratio = 0.65;
								
								if( trim(get_field('ratio')) !== ''){
									
									$tokei_ratio = get_field('ratio') * 0.01;
									
									
								}
						
							}
							
			
			

								//add field  85
								for( $i=1; $i<=85; $i++){

									if(get_field('モデル'.$i)){


												$price = get_field('買取金額'.$i);
												
				

													//ロレックスのみ 対応
													if(get_post($parent_id)->post_name == 'rolex-top'){

														if(trim($price) !== 'ASK' &&  trim($price)!==''){

															$price = $price * $tokei_ratio;

															$price =  number_format(round($price,-4));

														}

													}


												$price = str_replace('¥','',$price);


												echo '<tr>';
												echo '<td><div class="rolex-td"><div>'.$parent_title.'　'.get_field('モデル'.$i).'</div><div>'.get_field('型番_デザイン'.$i).'</div><div class="purchase_price ta-r"><span class="model-title">ジュエルカフェ 最新買取相場価格</span><span class="model-price">¥'.$price.'</span></div></div></td>';

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




