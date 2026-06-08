<div <?php if(!is_single('rolex')){?>class="only-pc"<?php }?>>

	<?php if(is_single('k18')): ?>
		<details class="details_style mt-16">
			<summary>詳細はこちら</summary>
	<?php endif;?>

	<ul class="ex-purchase-list">
		<?php
			for($i = 1 ;$i<=4;$i++ ){
		?>
			<?php if ( get_field('高価買取その'.$i.'_タイトル') ) : ?>
			<li>
				<div class="index color-red fs_20"><h3><?php the_field('高価買取その'.$i.'_タイトル');?></h3></div>
				<div class="ex-purchase-sub fs_11"><?php the_field('高価買取その'.$i.'_サブタイトル');?></div>
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
								<div class="ex-purchase-price-ttl">
									<p class="color-white"><span>ジュエルカフェ</span>買取実績</p>
								</div>
								<div class="ex-purchase-value color-white">
								
										<?php 
										
				
											if( strpos(get_field('高価買取その'.$i.'_ジュエルカフェ価格') , '円') !== false ){
												
												
												$price = get_field('高価買取その'.$i.'_ジュエルカフェ価格');
												
												$price = str_replace('円' , '' , $price);


												echo $price.'<span>円</span>';


											}else{
												
												echo get_field('高価買取その'.$i.'_ジュエルカフェ価格').'<span>円</span>';
												
											}
										?>
										
			
								</div>
							</div>
						</div>
					</div>
					<div class="ex-purchase-img">
						<?php $image_ex_01 = get_field('price_image'.$i); if(!empty($image_ex_01)):?>
							<img src="<?php echo esc_url($image_ex_01['url']);?>" alt="<?php the_field('高価買取その'.$i.'_タイトル');?>">
						<?php endif;?>
					</div>
				</div>
			</li>
			<?php endif; ?>
			
		<?php
			}
		?>
	</ul>

<?php if(is_single('k18')): ?>
	</details>
<?php endif;?>

</div>






<?php if(!is_single('rolex')){?>
	<div class="only-sp">
		<?php if(is_single('k18')): ?>
			<details class="details_style mt-16">
				<summary>詳細はこちら</summary>
		<?php endif;?>

		<div class="swiper mySwiper2">
			<ul class="ex-purchase-list swiper-wrapper">
				<?php
					for($i = 1 ;$i<=4;$i++ ){
				?>
					<?php if ( get_field('高価買取その'.$i.'_タイトル') ) : ?>
						<li class="swiper-slide d-b">
							<div class="ex-purchase-info">
								<div class="index color-red fs_20"><h3><?php the_field('高価買取その'.$i.'_タイトル');?></h3></div>
								<div class="ex-purchase-sub fs_11"><?php the_field('高価買取その'.$i.'_サブタイトル');?></div>
							</div>
							<div class="ex-purchase-comparison pos-r d-f">
								<div class="others fs_13">
									<table>
										<tbody>
											<tr>
												<th width="40">A社</th>
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
												<th width="40">B社</th>
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
												<th width="40">C社</th>
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
											<div class="ex-purchase-price-ttl">
												<p class="color-white"><span>ジュエルカフェ</span>買取実績</p>
											</div>
											<div class="ex-purchase-value color-white">
											
													<?php 
													
							
														if( strpos(get_field('高価買取その'.$i.'_ジュエルカフェ価格') , '円') !== false ){
															
															
															$price = get_field('高価買取その'.$i.'_ジュエルカフェ価格');
															
															$price = str_replace('円' , '' , $price);


															echo $price.'<span>円</span>';


														}else{
															
															echo get_field('高価買取その'.$i.'_ジュエルカフェ価格').'<span>円</span>';
															
														}
													?>
													
						
											</div>
										</div>
									</div>
								</div>
								<div class="ex-purchase-img">
									<?php $image_ex_01 = get_field('price_image'.$i); if(!empty($image_ex_01)):?>
										<img src="<?php echo esc_url($image_ex_01['url']);?>" alt="<?php the_field('高価買取その'.$i.'_タイトル');?>">
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

		<?php if(is_single('k18')): ?>
			</details>
		<?php endif;?>
	</div>
<?php
}
?>



<style>
	.details_style summary{
		background: #C80000;
		color:#fff;
		padding: 7px 0;
		border-radius: 5px;
		text-align:center;
		cursor: pointer;
	}
	.details_style summary:hover{
		opacity:0.8;
	}
	.ex-purchase ul{
		display:fixed;
	}
	.ex-purchase ul.ex-purchase-list li .ex-purchase-sub{
		text-align:left;
	}
	.ex-purchase ul.ex-purchase-list li{
		display:block;
		width:88%;
		padding:10px 15px;
	}
	.ex-purchase ul.ex-purchase-list li .index{
		text-align:left;
		font-size:13px;
	}
	.ex-purchase-info{height:40px;margin-bottom:10px;}
	.ex-purchase .ex-purchase-img{
		max-width:110px;
	}
	.ex-purchase ul.ex-purchase-list li .ex-purchase-comparison{
		padding-bottom:35px;
	}
	.ex-purchase ul.ex-purchase-list li .ex-purchase-comparison .others{
		padding-top:10px;
	}
	.ex-purchase ul.ex-purchase-list li table tr td{
		letter-spacing:-0.3px;
	}
	.ex-purchase-price-ttl{
		text-align:left;
	}
	.ex-purchase ul.ex-purchase-list li table tr th{font-size:12px;}
	.ex-purchase ul.ex-purchase-list li .ex-purchase-comparison{
		margin-top:0px;
	}
	@media screen and (max-width: 320px){
		.ex-purchase .ex-purchase-img{max-width:100px;}
	}
	@media screen and (min-width: 1000px){
		.ex-purchase ul.ex-purchase-list li{
			width:48%;
			padding:20px 40px;
		}
		.ex-purchase ul.ex-purchase-list li .index{
			text-align:left;
			font-size:16px;
		}
		.ex-purchase .ex-purchase-img{
			max-width:160px;
		}
		.ex-purchase ul.ex-purchase-list li table tr th{font-size:14px;}
		.ex-purchase ul.ex-purchase-list li table tr td{
			letter-spacing:-0.3px;
			font-size:16px;
		}
		.ex-purchase ul.ex-purchase-list li .ex-purchase-comparison{
			padding-bottom:10px;
		}
		.ex-purchase ul.ex-purchase-list li .ex-purchase-comparison .others{
			padding-top:30px;
		}
	}
	.swiper-slide{
	text-align: center;
	font-size: 18px;
	background: #fff;
	display: block;
	}
</style>	



<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper2", {
	slidesPerView: 'auto',
	spaceBetween: 5,
	loop: true,
	autoplay: {
	   delay: 2500,
	   disableOnInteraction:false
	 },
	centeredSlides: true,
	pagination: {
	  el: ".swiper-pagination",
	  clickable: true,
	},	

  });
</script>










