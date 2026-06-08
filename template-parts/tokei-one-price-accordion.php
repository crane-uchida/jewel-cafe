
<section class="tokei-pricetable">





	<div class="common-ttl">
		<div class="section-inner">
			<h2 class="shop-title kaitori-title">
				<span class="common-ttl-sub">ジュエルカフェの</span>
				<span class="common-ttl-main"><?php the_title();?>買取価格<span class="color-red">相場表</span></span>
			</h2>
			<div class="common-ttl-en">Watch PriceTable</div>
		</div>
	</div>
	
	


<?php


	$parent_slug = get_post($post->post_parent)->post_name;


	if($parent_slug == 'rolex-top' || $post->post_name == 'rolex-top' || $parent_slug == 'omega' || $post->post_name == 'omega'){


		if( $parent_slug == 'rolex-top' || $post->post_name == 'rolex-top' ){

		
		
		$model['model'] = 'ロレックス';
		
		
		$model['name'][1] = 'デイトナ';
		$model['name'][2] = 'サブマリーナ';

		$model['name'][3] = 'ヨットマスター';
		

		$model['name'][4] = 'デイトジャスト';
		

		
		$model['num'][1] = '116520';
		$model['num'][2] = '16610';
		//$model['num'][3] = '16600';
		//$model['num'][4] = '16700';
		//$model['num'][5] = '114270';
		//$model['num'][6] = '16570';
		$model['num'][3] = '16622';
		//$model['num'][8] = '14000';
		//$model['num'][9] = '18238A';
		$model['num'][4] = '1601';
		//$model['num'][11] = '116000';
		//$model['num'][12] = '326934';


		$model['link'][1] = '/kaitori/tokei/rolex-top/daytona/';
		$model['link'][2] = '/kaitori/tokei/rolex-top/submariner/';
		//$model['link'][3] = '/kaitori/tokei/rolex-top/sea-dweller/';
		//$model['link'][4] = '/kaitori/tokei/rolex-top/gmt-master/';
		//$model['link'][5] = '/kaitori/tokei/rolex-top/explorer/';
		//$model['link'][6] = '/kaitori/tokei/rolex-top/explorer2/';
		$model['link'][3] = '/kaitori/tokei/rolex-top/yacht-master/';
		//$model['link'][8] = '/kaitori/tokei/rolex-top/air-king/';
		//$model['link'][9] = '/kaitori/tokei/rolex-top/daydate/';
		$model['link'][4] = '/kaitori/tokei/rolex-top/datejust/';
		//$model['link'][11] = '/kaitori/tokei/rolex-top/oyster-perpetual/';
		//$model['link'][12] = '/kaitori/tokei/rolex-top/sky-dweller/';


		//$rolex_key=['',3383,3386,3389,3390,3387,3388,3394,3393,3385,3384,3392,3395];
		
		$rolex_key=['',3383,3386,3394,3393];
		
		

		}else if($parent_slug == 'omega' || $post->post_name == 'omega'){

	
		
			$model['model'] = 'オメガ';
				
			$model['name'][1] = 'スピードマスター';
			$model['name'][2] = 'シーマスター';
			$model['name'][3] = 'コンステレーション';
			$model['name'][4] = 'デビル';


			$model['num'][1] = '';
			$model['num'][2] = '';
			$model['num'][3] = '';
			$model['num'][4] = '';


			$model['link'][1] = '/kaitori/tokei/rolex-top/daytona/';
			$model['link'][2] = '/kaitori/tokei/rolex-top/submariner/';
			$model['link'][3] = '/kaitori/tokei/rolex-top/sea-dweller/';
			$model['link'][4] = '/kaitori/tokei/rolex-top/gmt-master/';


			$rolex_key=['',3399,3400,3402,3403];
			

		}




?>






<section class="section-inner graph-grid mb-20">

	<?php
		for($k = 1;$k <= count($rolex_key)-1;$k++){
	?>
		<div class="graph-wrap">
			<h3><?php echo $model['model'];?></h3>
			<h4><a href="<?php echo $model['link'][$k];?>"><?php echo $model['name'][$k];?></a></h4>
			<h5><?php echo $model['num'][$k];?></h5>

			<div>
				<canvas id="chart<?php echo $k;?>"></canvas>
			</div>
			
			<?php

				$tokei_ratio = 0.65;
				
				if( trim(get_field('ratio')) !== ''){
					
					$tokei_ratio = get_field('ratio') * 0.01;
					
					
				}
				
				
				$price = get_field('買取金額1',$rolex_key[$k]);
				


				if(trim($price) !== 'ASK'){


					$price = @intval($price * $tokei_ratio);

					$price = @number_format(round($price,-4));
				
				
				}
			
			
			
				$price = str_replace('¥','',$price);
		
					
				$average_price = get_field('average_price',$rolex_key[$k]);
			
				$average_arr = explode(',' , $average_price);
				

				
				//$average_percent = round(($average_arr[6] - $average_arr[5]) / $average_arr[5] * 100 ,2);
				
				
				/*
				if($average_arr[6] >= $average_arr[5]){
					
					$average_per_str = '<font color="blue">(前日比 +'.$average_percent.'%)</font>';
					
				}else{
				
					$average_per_str = '<font color="#E31424">(前日比 '.$average_percent.'%)</font>';
					
				}
				*/
			
				$average_per_str = '';


			?>
			
			
			
			
			<div class="graph-info">
				<div class="graph-tokei-img">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/<?php echo $post->post_name?>/<?php echo 'model_num'.$k.'.png';?>" alt="" />
				</div>		
				
				<div class="">
					<p class="graph-name">ジュエルカフェ<br>最新買取相場価格</p>
					<p class="graph-price">¥<?php echo $price;?></p>
					<p class="graph-comparison"><?php echo $average_per_str;?></p>
				</div>				
			</div>
			
		</div>
	<?php
		}
	?>	

</section>	





  <!--  独自ライブラリ読み込み -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
  <!--  /独自ライブラリ読み込み -->

  <script>
  
 	<?php
		for($k = 1;$k <= 12;$k++){
			
	
			$average_price = get_field('average_price',$rolex_key[$k]);
		
			$average_arr = explode(',' , $average_price);

			
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
			<?php echo $average_arr[0]?>,
			<?php echo $average_arr[1]?>,
			<?php echo $average_arr[2]?>,
			<?php echo $average_arr[3]?>,
			<?php echo $average_arr[4]?>,
			<?php echo $average_arr[5]?>,
			<?php echo $average_arr[6]?>
		  ],
          borderColor: "#C80000",
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
					
					min: <?php echo intval(min($average_arr)) - 10000;?>,  //最小値を1に
					
					max: <?php echo intval(max($average_arr)) + 50000;?>,  //最大値を100に					
					
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

<?php

	}



?>






	
	
	<div class="section-inner">
		<div class="accordion">
			
				<div class="p-10">
					<time datetime="<?php echo date('Y-m-d');?>" itemprop="modified"><?php echo date('Y年m月d日');?></time>更新
				</div>
				
			<div class="accordion-item">
				<p class="accordion-head" style="border-bottom:1px solid #8f8f8f;">
					<i></i>
					<a href="javascript:void(0);"><?php the_title();?>の買取相場</a>
				</p>
				<div class="accordion-content2" style="display:block;">
					
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
										if (isset($child_terms_id) && $term->parent === $child_terms_id) {
											$grand_child_terms_slug = $term->slug;
											$grand_terms_id = $term->term_id;
										}
									}
								}
							?>
							
							
							
							
							<?php if(isset($child_terms_slug) && $child_terms_slug === $wp_obj->post_name):?>
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
										if(get_field('モデル1')):
										
											/*
											if( get_field('モデル1') == 'デイデイト' ||  get_field('モデル1') == 'エクスプローラー'  ||  get_field('モデル1') == 'エクスプローラーⅡ'  ||  get_field('モデル1') == 'GMTマスター II' ||  get_field('モデル1') == 'シードゥエラー' ||  get_field('モデル1') == 'スカイドゥエラー'  ||  get_field('モデル1') == 'エアキング' ||  get_field('モデル1') == 'チェリーニ'   ||  get_field('モデル1') == 'ミルガウス'  ||  get_field('モデル1') == 'ターノグラフ' ||  get_field('モデル1') == 'オーキッド' ||  get_field('モデル1') == 'オイスター パーペチュアル' ){ continue; }
											*/							
									?>
									
									
									
									
									
									<table class="accordion-model" cellpadding="0" cellspacing="0">
									<tbody>
									<tr>
										<td colspan="3" class="accordion-head">
										
											
											<i></i>
											<p>
											<?php
												$filed1 =  get_field('モデル1');

												echo $filed1;

											?>
											</p>
									
										</td>
									</tr>
									</tbody>
									</table>
									<?php endif;?>


								<div class="model-content" style="display:none;">
								
								
								
								<table>


									<?php
												
												
										$parent_id = $post->post_parent;
										
										$parent_title = get_post($parent_id)->post_title;
										

									
										//ロレックスのみ 対応
										
										if($parent_slug == 'rolex-top' || $post->post_name == 'rolex-top' || $parent_slug == 'omega' || $post->post_name == 'omega'){
									
						
												
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
													if(is_single('rolex-top') ||  is_single('omega')){
														
														if(trim($price) !== 'ASK'){
															

															$price = @intval($price * $tokei_ratio);

															$price = @number_format(round($price,-4));
														
														
														}
														
													}
												
												
												$price = str_replace('¥','',$price);
												
			
												
												/*
												echo '<tr>';
												echo '<td>'.$parent_title.'　'.get_field('モデル'.$i).'<div class="only-sp model-title">'.get_field('型番_デザイン'.$i).'</div></td>';
												echo '<td class="only-pc">'.get_field('型番_デザイン'.$i).'</td>';
												echo '<td align="right"><span class="model-title">ジュエルカフェ 最新買取相場価格</span><span class="model-price">¥'.$price.'</span></td>';
												echo '</tr>';
												*/
						
						
												echo '<tr>';
												echo '<td><div class="rolex-td"><div>'.$parent_title.'　'.get_field('モデル'.$i).'&nbsp;&nbsp;'.get_field('型番_デザイン'.$i).'</div><div class="purchase_price ta-r"><span class="model-title">ジュエルカフェ 最新買取相場価格</span><span class="model-price">¥'.$price.'</span></div></div></td>';

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
							
								
								
								//add field  85
								for( $i=1; $i<=85; $i++){

									if(get_field('モデル'.$i)){

												$price = get_field('買取金額'.$i);

													
													//ロレックスのみ 対応
													if($parent_slug == 'rolex-top' || $post->post_name == 'rolex-top' || $parent_slug == 'omega' || $post->post_name == 'omega'){
														
														if(trim($price) !== 'ASK'){
															
															$price = @intval($price * $tokei_ratio);

															$price = @number_format(round($price,-4));
														
														}
														
													}
												
												
												$price = str_replace('¥','',$price);
												
												if(!isset($parent_title)){$parent_title = '';}
						
												echo '<tr>';
												echo '<td><div class="rolex-td"><div>'.$parent_title.'　'.get_field('モデル'.$i).'&nbsp;&nbsp;'.get_field('型番_デザイン'.$i).'</div><div class="purchase_price ta-r"><span class="model-title">ジュエルカフェ 最新買取相場価格</span><span class="model-price">¥'.$price.'</span></div></div></td>';

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
