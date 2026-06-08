<?php
$field = get_field('買取価格例その1');

if (!empty($field) && !empty($field['タイトル'])):?>
		<section class="detail-st-purchase" id="js-purchase-price">
			<div class="common-ttl">
				<div class="section-inner">
					<h2>
						<span class="common-ttl-sub">ジュエルカフェ<?php
							echo $child_term_name;?> - <?php the_title();?></span>
						<span class="common-ttl-main">お買取<span class="color-red">強化品目</span></span>
					</h2>
					<div class="common-ttl-en">Strengthen Purchase</div>
				</div>
			</div>
			
			
			<ul class="detail-st-purchase-list">

				<?php 
					if(get_field('買取価格例その1')['タイトル']):?>
				<li>
					<h3 class="color-red detail-st-purchase-ttl"><?php echo esc_html(get_field('買取価格例その1')['タイトル']);?></h3>
					<?php
						$img_field = get_field('買取価格例その1')['sample_image1'];
						if ($img_field) { ?>
						<img src="<?php echo esc_url($img_field['url']); ?>" class="w-100per mtb-8" alt="<?php echo $img_field['alt'];?>">
					<?php }?>
					<p class="bold"><?php echo esc_html(get_field('買取価格例その1')['説明文']); ?></p>
					<?php
						if(get_field('買取価格例その1')['アイテム_その1']['アイテム名']):
					?>
					<div class="accordion-purchase-ex" id="first-accordion">
						<div class="accordion-item">
							<p class="accordion-head">
								<a href="javascript:void(0);">お買取価格例</a>
							</p>
							<div class="accordion-content">
								<ul class="ex-price-list">
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その1')['アイテム_その1']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その1']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その1']['金額']); ?>円</p>
									</li>

									<?php
										if(get_field('買取価格例その1')['アイテム_その2']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その1')['アイテム_その2']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その2']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その2']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その1')['アイテム_その3']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その1')['アイテム_その3']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その3']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その3']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その1')['アイテム_その4']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その1')['アイテム_その4']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その4']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その4']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その1')['アイテム_その5']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その1')['アイテム_その5']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その5']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その5']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その1')['アイテム_その6']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その1')['アイテム_その6']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その6']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その6']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その1')['アイテム_その7']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その1')['アイテム_その7']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その7']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その7']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その1')['アイテム_その8']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その1')['アイテム_その8']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その8']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その8']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その1')['アイテム_その9']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その1')['アイテム_その9']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その9']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その9']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その1')['アイテム_その10']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その1')['アイテム_その10']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その10']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その1')['アイテム_その10']['金額']); ?>円</p>
									</li>
									<?php endif;?>

								</ul>
							</div>
						</div>
					</div>
					<?php endif;?>
				</li>
				<?php endif;?>

				<?php 
					if(get_field('買取価格例その2')['タイトル']):?>
				<li>
					<h3 class="color-red detail-st-purchase-ttl"><?php echo esc_html(get_field('買取価格例その2')['タイトル']);?></h3>
					<?php
						$img_field = get_field('買取価格例その2')['sample_image1'];
						if ($img_field) { ?>
						<img src="<?php echo esc_url($img_field['url']); ?>" class="w-100per mtb-8" alt="<?php echo $img_field['alt'];?>">
					<?php }?>
					<p class="bold"><?php echo esc_html(get_field('買取価格例その2')['説明文']); ?></p>
					<?php
						if(get_field('買取価格例その2')['アイテム_その1']['アイテム名']):
					?>
					<div class="accordion-purchase-ex" id="first-accordion">
						<div class="accordion-item">
							<p class="accordion-head">
								<a href="javascript:void(0);">お買取価格例</a>
							</p>
							<div class="accordion-content">
								<ul class="ex-price-list">
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その2')['アイテム_その1']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その1']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その1']['金額']); ?>円</p>
									</li>

									<?php
										if(get_field('買取価格例その2')['アイテム_その2']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その2')['アイテム_その2']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その2']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その2']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その2')['アイテム_その3']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その2')['アイテム_その3']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その3']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その3']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その2')['アイテム_その4']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その2')['アイテム_その4']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その4']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その4']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その2')['アイテム_その5']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その2')['アイテム_その5']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その5']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その5']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その2')['アイテム_その6']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その2')['アイテム_その6']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その6']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その6']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その2')['アイテム_その7']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その2')['アイテム_その7']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その7']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その7']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その2')['アイテム_その8']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その2')['アイテム_その8']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その8']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その8']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その2')['アイテム_その9']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その2')['アイテム_その9']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その9']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その9']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その2')['アイテム_その10']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その2')['アイテム_その10']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その10']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その2')['アイテム_その10']['金額']); ?>円</p>
									</li>
									<?php endif;?>

								</ul>
							</div>
						</div>
					</div>
					<?php endif;?>
				</li>
				<?php endif;?>

				<?php 
					if(get_field('買取価格例その3')['タイトル']):?>
				<li>
					<h3 class="color-red detail-st-purchase-ttl"><?php echo esc_html(get_field('買取価格例その3')['タイトル']);?></h3>
					<?php
						$img_field = get_field('買取価格例その3')['sample_image1'];
						if ($img_field) { ?>
						<img src="<?php echo esc_url($img_field['url']); ?>" class="w-100per mtb-8" alt="<?php echo $img_field['alt'];?>">
					<?php }?>
					<p class="bold"><?php echo esc_html(get_field('買取価格例その3')['説明文']); ?></p>
					<?php
						if(get_field('買取価格例その3')['アイテム_その1']['アイテム名']):
					?>
					<div class="accordion-purchase-ex" id="first-accordion">
						<div class="accordion-item">
							<p class="accordion-head">
								<a href="javascript:void(0);">お買取価格例</a>
							</p>
							<div class="accordion-content">
								<ul class="ex-price-list">
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その3')['アイテム_その1']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その1']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その1']['金額']); ?>円</p>
									</li>

									<?php
										if(get_field('買取価格例その3')['アイテム_その2']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その3')['アイテム_その2']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その2']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その2']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その3')['アイテム_その3']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その3')['アイテム_その3']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その3']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その3']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その3')['アイテム_その4']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その3')['アイテム_その4']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その4']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その4']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その3')['アイテム_その5']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その3')['アイテム_その5']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その5']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その5']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その3')['アイテム_その6']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その3')['アイテム_その6']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その6']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その6']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その3')['アイテム_その7']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その3')['アイテム_その7']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その7']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その7']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その3')['アイテム_その8']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その3')['アイテム_その8']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その8']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その8']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その3')['アイテム_その9']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その3')['アイテム_その9']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その9']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その9']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その3')['アイテム_その10']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その3')['アイテム_その10']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その10']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その3')['アイテム_その10']['金額']); ?>円</p>
									</li>
									<?php endif;?>

								</ul>
							</div>
						</div>
					</div>
					<?php endif;?>
				</li>
				<?php endif;?>

				<?php 
					if(get_field('買取価格例その4')['タイトル']):?>
				<li>
					<h3 class="color-red detail-st-purchase-ttl"><?php echo esc_html(get_field('買取価格例その4')['タイトル']);?></h3>
					<?php
						$img_field = get_field('買取価格例その4')['sample_image1'];
						if ($img_field) { ?>
						<img src="<?php echo esc_url($img_field['url']); ?>" class="w-100per mtb-8" alt="<?php echo $img_field['alt'];?>">
					<?php }?>
					<p class="bold"><?php echo esc_html(get_field('買取価格例その4')['説明文']); ?></p>
					<?php
						if(get_field('買取価格例その4')['アイテム_その1']['アイテム名']):
					?>
					<div class="accordion-purchase-ex" id="first-accordion">
						<div class="accordion-item">
							<p class="accordion-head">
								<a href="javascript:void(0);">お買取価格例</a>
							</p>
							<div class="accordion-content">
								<ul class="ex-price-list">
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その4')['アイテム_その1']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その1']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その1']['金額']); ?>円</p>
									</li>

									<?php
										if(get_field('買取価格例その4')['アイテム_その2']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その4')['アイテム_その2']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その2']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その2']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その4')['アイテム_その3']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その4')['アイテム_その3']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その3']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その3']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その4')['アイテム_その4']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その4')['アイテム_その4']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その4']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その4']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その4')['アイテム_その5']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その4')['アイテム_その5']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その5']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その5']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その4')['アイテム_その6']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その4')['アイテム_その6']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その6']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その6']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その4')['アイテム_その7']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その4')['アイテム_その7']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その7']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その7']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その4')['アイテム_その8']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その4')['アイテム_その8']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その8']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その8']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その4')['アイテム_その9']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その4')['アイテム_その9']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その9']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その9']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その4')['アイテム_その10']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その4')['アイテム_その10']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その10']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その4')['アイテム_その10']['金額']); ?>円</p>
									</li>
									<?php endif;?>
								</ul>
							</div>
						</div>
					</div>
					<?php endif;?>
				</li>
				<?php endif;?>


				<?php 
					if(get_field('買取価格例その5')['タイトル']):?>
				<li>
					<h3 class="color-red detail-st-purchase-ttl"><?php echo esc_html(get_field('買取価格例その5')['タイトル']);?></h3>
					<?php
						$img_field = get_field('買取価格例その5')['sample_image1'];
						if ($img_field) { ?>
						<img src="<?php echo esc_url($img_field['url']); ?>" class="w-100per mtb-8" alt="<?php echo $img_field['alt'];?>">
					<?php }?>
					<p class="bold"><?php echo esc_html(get_field('買取価格例その5')['説明文']); ?></p>
					<?php
						if(get_field('買取価格例その5')['アイテム_その1']['アイテム名']):
					?>
					<div class="accordion-purchase-ex" id="first-accordion">
						<div class="accordion-item">
							<p class="accordion-head">
								<a href="javascript:void(0);">お買取価格例</a>
							</p>
							<div class="accordion-content">
								<ul class="ex-price-list">
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その5')['アイテム_その1']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その1']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その1']['金額']); ?>円</p>
									</li>

									<?php
										if(get_field('買取価格例その5')['アイテム_その2']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その5')['アイテム_その2']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その2']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その2']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その5')['アイテム_その3']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その5')['アイテム_その3']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その3']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その3']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その5')['アイテム_その4']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その5')['アイテム_その4']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その4']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その4']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その5')['アイテム_その5']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その5')['アイテム_その5']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その5']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その5']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その5')['アイテム_その6']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その5')['アイテム_その6']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その6']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その6']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その5')['アイテム_その7']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その5')['アイテム_その7']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その7']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その7']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その5')['アイテム_その8']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その5')['アイテム_その8']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その8']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その8']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その5')['アイテム_その9']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その5')['アイテム_その9']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その9']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その9']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その5')['アイテム_その10']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その5')['アイテム_その10']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その10']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その5')['アイテム_その10']['金額']); ?>円</p>
									</li>
									<?php endif;?>

								</ul>
							</div>
						</div>
					</div>
					<?php endif;?>
				</li>
				<?php endif;?>

				<?php 
					if(get_field('買取価格例その6')['タイトル']):?>
				<li>
					<h3 class="color-red detail-st-purchase-ttl"><?php echo esc_html(get_field('買取価格例その6')['タイトル']);?></h3>
					<?php
						$img_field = get_field('買取価格例その6')['sample_image1'];
						if ($img_field) { ?>
						<img src="<?php echo esc_url($img_field['url']); ?>" class="w-100per mtb-8" alt="<?php echo $img_field['alt'];?>">
					<?php }?>
					<p class="bold"><?php echo esc_html(get_field('買取価格例その6')['説明文']); ?></p>
					<?php
						if(get_field('買取価格例その6')['アイテム_その1']['アイテム名']):
					?>
					<div class="accordion-purchase-ex" id="first-accordion">
						<div class="accordion-item">
							<p class="accordion-head">
								<a href="javascript:void(0);">お買取価格例</a>
							</p>
							<div class="accordion-content">
								<ul class="ex-price-list">
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その6')['アイテム_その1']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その1']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その1']['金額']); ?>円</p>
									</li>

									<?php
										if(get_field('買取価格例その6')['アイテム_その2']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その6')['アイテム_その2']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その2']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その2']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その6')['アイテム_その3']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その6')['アイテム_その3']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その3']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その3']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その6')['アイテム_その4']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その6')['アイテム_その4']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その4']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その4']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その6')['アイテム_その5']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その6')['アイテム_その5']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その5']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その5']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その6')['アイテム_その6']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その6')['アイテム_その6']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その6']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その6']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その6')['アイテム_その7']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その6')['アイテム_その7']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その7']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その7']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その6')['アイテム_その8']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その6')['アイテム_その8']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その8']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その8']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その6')['アイテム_その9']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その6')['アイテム_その9']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その9']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その9']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その6')['アイテム_その10']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その6')['アイテム_その10']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その10']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その6')['アイテム_その10']['金額']); ?>円</p>
									</li>
									<?php endif;?>

								</ul>
							</div>
						</div>
					</div>
					<?php endif;?>
				</li>
				<?php endif;?>


				<?php 
					if(get_field('買取価格例その7')['タイトル']):?>
				<li>
					<h3 class="color-red detail-st-purchase-ttl"><?php echo esc_html(get_field('買取価格例その7')['タイトル']);?></h3>
					<?php
						$img_field = get_field('買取価格例その7')['sample_image1'];
						if ($img_field) { ?>
						<img src="<?php echo esc_url($img_field['url']); ?>" class="w-100per mtb-8" alt="<?php echo $img_field['alt'];?>">
					<?php }?>
					<p class="bold"><?php echo esc_html(get_field('買取価格例その7')['説明文']); ?></p>
					<?php
						if(get_field('買取価格例その7')['アイテム_その1']['アイテム名']):
					?>
					<div class="accordion-purchase-ex" id="first-accordion">
						<div class="accordion-item">
							<p class="accordion-head">
								<a href="javascript:void(0);">お買取価格例</a>
							</p>
							<div class="accordion-content">
								<ul class="ex-price-list">
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その7')['アイテム_その1']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その1']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その1']['金額']); ?>円</p>
									</li>

									<?php
										if(get_field('買取価格例その7')['アイテム_その2']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その7')['アイテム_その2']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その2']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その2']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その7')['アイテム_その3']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その7')['アイテム_その3']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その3']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その3']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その7')['アイテム_その4']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その7')['アイテム_その4']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その4']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その4']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その7')['アイテム_その5']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その7')['アイテム_その5']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その5']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その5']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その7')['アイテム_その6']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その7')['アイテム_その6']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その6']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その6']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その7')['アイテム_その7']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その7')['アイテム_その7']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その7']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その7']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その7')['アイテム_その8']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その7')['アイテム_その8']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その8']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その8']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その7')['アイテム_その9']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その7')['アイテム_その9']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その9']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その9']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その7')['アイテム_その10']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その7')['アイテム_その10']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その10']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その7')['アイテム_その10']['金額']); ?>円</p>
									</li>
									<?php endif;?>

								</ul>
							</div>
						</div>
					</div>
					<?php endif;?>
				</li>
				<?php endif;?>


				<?php 
					if(get_field('買取価格例その8')['タイトル']):?>
				<li>
					<h3 class="color-red detail-st-purchase-ttl"><?php echo esc_html(get_field('買取価格例その8')['タイトル']);?></h3>
					<?php
						$img_field = get_field('買取価格例その8')['sample_image1'];
						if ($img_field) { ?>
						<img src="<?php echo esc_url($img_field['url']); ?>" class="w-100per mtb-8" alt="<?php echo $img_field['alt'];?>">
					<?php }?>
					<p class="bold"><?php echo esc_html(get_field('買取価格例その8')['説明文']); ?></p>
					<?php
						if(get_field('買取価格例その8')['アイテム_その1']['アイテム名']):
					?>
					<div class="accordion-purchase-ex" id="first-accordion">
						<div class="accordion-item">
							<p class="accordion-head">
								<a href="javascript:void(0);">お買取価格例</a>
							</p>
							<div class="accordion-content">
								<ul class="ex-price-list">
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その8')['アイテム_その1']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その1']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その1']['金額']); ?>円</p>
									</li>

									<?php
										if(get_field('買取価格例その8')['アイテム_その2']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その8')['アイテム_その2']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その2']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その2']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その8')['アイテム_その3']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その8')['アイテム_その3']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その3']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その3']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その8')['アイテム_その4']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その8')['アイテム_その4']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その4']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その4']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その8')['アイテム_その5']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その8')['アイテム_その5']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その5']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その5']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その8')['アイテム_その6']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その8')['アイテム_その6']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その6']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その6']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その8')['アイテム_その7']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その8')['アイテム_その7']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その7']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その7']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その8')['アイテム_その8']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その8')['アイテム_その8']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その8']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その8']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その8')['アイテム_その9']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その8')['アイテム_その9']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その9']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その9']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その8')['アイテム_その10']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その8')['アイテム_その10']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その10']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その8')['アイテム_その10']['金額']); ?>円</p>
									</li>
									<?php endif;?>

								</ul>
							</div>
						</div>
					</div>
					<?php endif;?>
				</li>
				<?php endif;?>


				<?php 
					if(get_field('買取価格例その9')['タイトル']):?>
				<li>
					<h3 class="color-red detail-st-purchase-ttl"><?php echo esc_html(get_field('買取価格例その9')['タイトル']);?></h3>
					<?php
						$img_field = get_field('買取価格例その9')['sample_image1'];
						if ($img_field) { ?>
						<img src="<?php echo esc_url($img_field['url']); ?>" class="w-100per mtb-8" alt="<?php echo $img_field['alt'];?>">
					<?php }?>
					<p class="bold"><?php echo esc_html(get_field('買取価格例その9')['説明文']); ?></p>
					<?php
						if(get_field('買取価格例その9')['アイテム_その1']['アイテム名']):
					?>
					<div class="accordion-purchase-ex" id="first-accordion">
						<div class="accordion-item">
							<p class="accordion-head">
								<a href="javascript:void(0);">お買取価格例</a>
							</p>
							<div class="accordion-content">
								<ul class="ex-price-list">
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その9')['アイテム_その1']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その1']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その1']['金額']); ?>円</p>
									</li>

									<?php
										if(get_field('買取価格例その9')['アイテム_その2']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その9')['アイテム_その2']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その2']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その2']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その9')['アイテム_その3']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その9')['アイテム_その3']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その3']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その3']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その9')['アイテム_その4']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その9')['アイテム_その4']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その4']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その4']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その9')['アイテム_その5']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その9')['アイテム_その5']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その5']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その5']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その9')['アイテム_その6']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その9')['アイテム_その6']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その6']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その6']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その9')['アイテム_その7']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その9')['アイテム_その7']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その7']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その7']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その9')['アイテム_その8']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その9')['アイテム_その8']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その8']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その8']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その9')['アイテム_その9']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その9')['アイテム_その9']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その9']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その9']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その9')['アイテム_その10']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その9')['アイテム_その10']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その10']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その9')['アイテム_その10']['金額']); ?>円</p>
									</li>
									<?php endif;?>

								</ul>
							</div>
						</div>
					</div>
					<?php endif;?>
				</li>
				<?php endif;?>


				<?php 
					if(get_field('買取価格例その10')['タイトル']):?>
				<li>
					<h3 class="color-red detail-st-purchase-ttl"><?php echo esc_html(get_field('買取価格例その10')['タイトル']);?></h3>
					<?php
						$img_field = get_field('買取価格例その10')['sample_image1'];
						if ($img_field) { ?>
						<img src="<?php echo esc_url($img_field['url']); ?>" class="w-100per mtb-8" alt="<?php echo $img_field['alt'];?>">
					<?php }?>
					<p class="bold"><?php echo esc_html(get_field('買取価格例その10')['説明文']); ?></p>
					<?php
						if(get_field('買取価格例その10')['アイテム_その1']['アイテム名']):
					?>
					<div class="accordion-purchase-ex" id="first-accordion">
						<div class="accordion-item">
							<p class="accordion-head">
								<a href="javascript:void(0);">お買取価格例</a>
							</p>
							<div class="accordion-content">
								<ul class="ex-price-list">
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その10')['アイテム_その1']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その1']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その1']['金額']); ?>円</p>
									</li>

									<?php
										if(get_field('買取価格例その10')['アイテム_その2']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その10')['アイテム_その2']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その2']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その2']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その10')['アイテム_その3']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その10')['アイテム_その3']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その3']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その3']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その10')['アイテム_その4']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その10')['アイテム_その4']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その4']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その4']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その10')['アイテム_その5']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その10')['アイテム_その5']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その5']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その5']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その10')['アイテム_その6']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その10')['アイテム_その6']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その6']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その6']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その10')['アイテム_その7']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その10')['アイテム_その7']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その7']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その7']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その10')['アイテム_その8']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その10')['アイテム_その8']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その8']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その8']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その10')['アイテム_その9']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その10')['アイテム_その9']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その9']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その9']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その10')['アイテム_その10']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その10')['アイテム_その10']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その10']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その10')['アイテム_その10']['金額']); ?>円</p>
									</li>
									<?php endif;?>

								</ul>
							</div>
						</div>
					</div>
					<?php endif;?>
				</li>
				<?php endif;?>


				<?php 
					if(get_field('買取価格例その11')['タイトル']):?>
				<li>
					<h3 class="color-red detail-st-purchase-ttl"><?php echo esc_html(get_field('買取価格例その11')['タイトル']);?></h3>
					<?php
						$img_field = get_field('買取価格例その11')['sample_image1'];
						if ($img_field) { ?>
						<img src="<?php echo esc_url($img_field['url']); ?>" class="w-100per mtb-8" alt="<?php echo $img_field['alt'];?>">
					<?php }?>
					<p class="bold"><?php echo esc_html(get_field('買取価格例その11')['説明文']); ?></p>
					<?php
						if(get_field('買取価格例その11')['アイテム_その1']['アイテム名']):
					?>
					<div class="accordion-purchase-ex" id="first-accordion">
						<div class="accordion-item">
							<p class="accordion-head">
								<a href="javascript:void(0);">お買取価格例</a>
							</p>
							<div class="accordion-content">
								<ul class="ex-price-list">
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その11')['アイテム_その1']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その1']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その1']['金額']); ?>円</p>
									</li>

									<?php
										if(get_field('買取価格例その11')['アイテム_その2']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その11')['アイテム_その2']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その2']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その2']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その11')['アイテム_その3']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その11')['アイテム_その3']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その3']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その3']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その11')['アイテム_その4']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その11')['アイテム_その4']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その4']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その4']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その11')['アイテム_その5']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その11')['アイテム_その5']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その5']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その5']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その11')['アイテム_その6']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その11')['アイテム_その6']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その6']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その6']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その11')['アイテム_その7']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その11')['アイテム_その7']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その7']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その7']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その11')['アイテム_その8']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その11')['アイテム_その8']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その8']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その8']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その11')['アイテム_その9']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その11')['アイテム_その9']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その9']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その9']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その11')['アイテム_その10']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その11')['アイテム_その10']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その10']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その11')['アイテム_その10']['金額']); ?>円</p>
									</li>
									<?php endif;?>

								</ul>
							</div>
						</div>
					</div>
					<?php endif;?>
				</li>
				<?php endif;?>


				<?php 
					if(get_field('買取価格例その12')['タイトル']):?>
				<li>
					<h3 class="color-red detail-st-purchase-ttl"><?php echo esc_html(get_field('買取価格例その12')['タイトル']);?></h3>
					<?php
						$img_field = get_field('買取価格例その12')['sample_image1'];
						if ($img_field) { ?>
						<img src="<?php echo esc_url($img_field['url']); ?>" class="w-100per mtb-8" alt="<?php echo $img_field['alt'];?>">
					<?php }?>
					<p class="bold"><?php echo esc_html(get_field('買取価格例その12')['説明文']); ?></p>
					<?php
						if(get_field('買取価格例その12')['アイテム_その1']['アイテム名']):
					?>
					<div class="accordion-purchase-ex" id="first-accordion">
						<div class="accordion-item">
							<p class="accordion-head">
								<a href="javascript:void(0);">お買取価格例</a>
							</p>
							<div class="accordion-content">
								<ul class="ex-price-list">
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その12')['アイテム_その1']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その1']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その1']['金額']); ?>円</p>
									</li>

									<?php
										if(get_field('買取価格例その12')['アイテム_その2']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その12')['アイテム_その2']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その2']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その2']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その12')['アイテム_その3']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その12')['アイテム_その3']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その3']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その3']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その12')['アイテム_その4']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その12')['アイテム_その4']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その4']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その4']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その12')['アイテム_その5']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その12')['アイテム_その5']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その5']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その5']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その12')['アイテム_その6']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その12')['アイテム_その6']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その6']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その6']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その12')['アイテム_その7']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その12')['アイテム_その7']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その7']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その7']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その12')['アイテム_その8']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その12')['アイテム_その8']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その8']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その8']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その12')['アイテム_その9']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その12')['アイテム_その9']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その9']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その9']['金額']); ?>円</p>
									</li>
									<?php endif;?>

									<?php
										if(get_field('買取価格例その12')['アイテム_その10']['アイテム名']):
									?>
									<li>
										<div class="d-f">
											<img src="<?php echo esc_url(get_field('買取価格例その12')['アイテム_その10']['image']['url']); ?>">
											<p class="ex-price-ttl"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その10']['アイテム名']); ?></p>
										</div>
										<p class="color-red"><?php echo esc_html(get_field('買取価格例その12')['アイテム_その10']['金額']); ?>円</p>
									</li>
									<?php endif;?>

								</ul>
							</div>
						</div>
					</div>
					<?php endif;?>
				</li>
				<?php endif;?>


			</ul>
		</section>
		<?php endif;?>