

<div>
<ul class="ex-purchase-list">
<?php

	for($i = 1 ;$i<=4;$i++ ){
?>
	<?php if ( get_field('高価買取その'.$i.'_タイトル') ) : ?>
	<li>
		<div class="ex-purchase-info">
			<div class="index color-red"><h4 class="ex-purchase-list-name"><?php the_field('高価買取その'.$i.'_タイトル');?></h4></div>
			<div class="ex-purchase-sub"><?php the_field('高価買取その'.$i.'_サブタイトル');?></div>
		</div>
		
		<div class="ex-purchase-comparison pos-r d-f">
			<div class="others fs_13">
				<table>
					<tbody>
						<tr>
							<th>A社</th>
							<td>
								<?php 
									if( strpos(get_field('高価買取その'.$i.'_A社価格') , '円') !== false ){
										
										echo get_field('高価買取その'.$i.'_A社価格');
										
									}else{
										
										echo get_field('高価買取その'.$i.'_A社価格').'円';
										
									}
								?>
							</td>
						</tr>
						<tr>
							<th>B社</th>
							<td>
								<?php 
									if( strpos(get_field('高価買取その'.$i.'_B社価格') , '円') !== false ){
										
										echo get_field('高価買取その'.$i.'_B社価格');
										
									}else{
										
										echo get_field('高価買取その'.$i.'_B社価格').'円';
										
									}
								?>
							</td>
						</tr>
						<tr>
							<th>C社</th>
							<td>
								<?php 
									if( strpos(get_field('高価買取その'.$i.'_C社価格') , '円') !== false ){
										
										echo get_field('高価買取その'.$i.'_C社価格');
										
									}else{
										
										echo get_field('高価買取その'.$i.'_C社価格').'円';
										
									}
								?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="ex-purchase-label">

					<div class="ex-purchase-price d-f">
						
						<div class="ex-purchase-title-info">
							ジュエルカフェ買取実績
						</div>						
						
						
						
						
						<div class="ex-purchase-value color-white">
						
							
						
								<?php 

									if( strpos(get_field('高価買取その'.$i.'_ジュエルカフェ価格') , '円') !== false ){
										
										
										$price = get_field('高価買取その'.$i.'_ジュエルカフェ価格');
										
										$price = str_replace('円' , '' , $price);


										echo $price;


									}else{
										
										echo get_field('高価買取その'.$i.'_ジュエルカフェ価格');
										
									}
								?>
								
								<div class="ex-price-yen">円</div>
								
								

						</div>
						
						
					</div>
				</div>
			</div>
			<div class="ex-purchase-img">
				<?php $image_ex_01 = get_field('price_image'.$i); if(!empty($image_ex_01)):?>
					<img src="<?php echo esc_url($image_ex_01['url']);?>" alt="他社との金買取価格<?php the_field('高価買取その'.$i.'_タイトル');?>">
				<?php endif;?>
			</div>
		</div>
	</li>
	<?php endif; ?>
	
<?php
	}
?>
</ul>

</div>



