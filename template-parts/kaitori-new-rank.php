<section class="kaitori-ranking">

	<div class="section-inner">
	
		<div class="ta-c">
			<div class="kaitori-rank-bar ta-c">
			

				<!--
				<h2 class="kaitori-rank-ttl-sub bold">
				!-->
				
				<h2 class="section-ttl-main bold"> 
				
					<?php echo display_filed('rank_title2',get_the_title().'<br>ジュエルカフェ買取ランキング'); ?>
					
				</h2>
				
			</div>
		</div>


	
	<div class="kaitori-rank-inner d-f">
		<div class="kaitori-rank-list">
			<div class="kaitori-rank-title d-f ai-t">
				<div class="kaitori-rank-medal">
					<picture>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/num1.png" alt="1位" style="max-width: 44px; opacity: 1;">
					</picture>
				</div>
				<h3 class="kaitori-rank-item bold"><?php the_field('買取ランキング1位_タイトル');?></h3>
			</div>
			<p class="kaitori-rank-txt lh-10 justify"><?php the_field('買取ランキング1位_文章');?></p>
		</div>
		<div class="kaitori-rank-list">
			<div class="kaitori-rank-title d-f ai-t">
				<div class="kaitori-rank-medal">
					<picture>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/num2.png" alt="2位" style="max-width: 44px; opacity: 1;">
					</picture>
				</div>
				<h3 class="kaitori-rank-item bold"><?php the_field('買取ランキング2位_タイトル');?></h3>
			</div>

			<p class="kaitori-rank-txt lh-10 justify"><?php the_field('買取ランキング2位_文章');?></p>
		</div>
		<div class="kaitori-rank-list">
			<div class="kaitori-rank-title d-f ai-t">
				<div class="kaitori-rank-medal">
					<picture>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/num3.png" alt="3位" style="max-width: 44px; opacity: 1;">
					</picture>
				</div>
				<h3 class="kaitori-rank-item bold"><?php the_field('買取ランキング3位_タイトル');?></h3>
			</div>
			<p class="kaitori-rank-txt lh-10 justify"><?php the_field('買取ランキング3位_文章');?></p>
		</div>
	</div>
	
	</div>
</section>
