<?php /* ?>
<table>
	<tr>
		<th></th>
		<th>モデル名 型番</th>
		<th>未使用品<br>買取価格</th>
		<th>中古品<br>買取価格</th>
	</tr>
	<tr>
		<td>画像</td>
		<td>
			<p class="">デイトナ SS ブラック</p>
			<p class="">型番：126500LN</p>
		</td>
		<td></td>
		<td></td>
	</tr>
</table>
<?php */ ?>











<div class="maket-more animated">

	<ul class="kaitori-price-table">
		
		<?php
		
			for($i=1; $i <= 6; $i++){
			
			$image = get_field('相場比較画像'.$i);
		?>
		
		<li class="kaitori-price-list d-f ai-c">
		
	
			<div class="kaitori-price-img d-f ai-c">
			
				<div class="item">
					<?php
						if( trim($image['url']) !== '' ){
							
							
							$alt_text =trim(get_field('相場比較ブランド名'.$i). get_field('相場比較種類'.$i).str_replace('ランダム番','',get_field('相場比較品番'.$i)));
							
							
							
							echo '<img src=" '.$image['url'].'" alt="'.$alt_text.'" class="maket-price-img" />';
		
						}
					?>
				</div>
				
				<h3>
				
						<div class="brand_name">
						<?php 
						
							$shopname = get_field('相場比較ブランド名'.$i);
							
							if( trim($shopname) !== '' ){ echo $shopname; }
	
						?>
						</div>

						<div class="brand_name">
						<?php 
						
							$shopname = get_field('相場比較種類'.$i);
							
							if( trim($shopname) !== '' ){ echo $shopname; }
							
						?>
						</div>
				


					<div class="code">
						<?php
							$modelname = get_field('相場比較品番'.$i);
							
							if( trim($modelname) !== '' ){ echo $modelname; }								

						?>
					</div>
				</h3>
		
			</div>		
			


			<div class="kaitori-price-content d-f ai-c">
				<div class="old-price d-f ai-c">
					<span class="old-year color-white">2015 価格</span>
				<?php
					$old_price = get_field('以前の価格'.$i);
					
					if( trim($old_price) !== '' ){ echo '&yen;'.$old_price; }
				
				?>
					<span class="arrow_r_icon">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/arrow_r.png" alt="" />
					</span>				
				</div>

				<div class="new-price d-f ai-c">
				
					<span class="new-year color-white"><?php echo date('Y');?> 価格</span>
					
					<?php
						$new_price = get_field('現在の価格'.$i);
						
						if( trim($new_price) !== '' ){ echo '&yen;'.$new_price; }							
					
					?>
				</div>
			</div>
				
		
			
		</li>
			
			
		<?php
		
			}
		?>
	</ul>
	
	<p class="note only-sp">
		<?php
			if( trim(get_field('備考')) !== '' ){ echo get_field('備考');}
		?>
	</p>	
	
	<div class="ta-c">
	
		<div class="more-btn only-sp"><p class="open">もっと見る</p></div>

	</div>

</div>
