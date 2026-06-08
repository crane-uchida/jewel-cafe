<section class="kaitori-rank">
	<div class="common-ttl">
		<div class="section-inner">
			<h2 class="kaitori-title">
				<span class="common-ttl-sub"><?php echo $args['custom_title']; ?>買取の</span>
				<span class="common-ttl-main"><span class="color-red">ランキング</span></span>
			</h2>
			<div class="common-ttl-en">Ranking</div>
		</div>
	</div>
	<div class="section-inner">
		<div class="kaitori-rank-list">
			<div class="kaitori-rank-ttl d-f ai-c">
				<div class="kaitori-rank-medal">
					<picture>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-01.png" alt="1位" style="max-width: 50px; opacity: 1;">
					</picture>
				</div>
				<p class="kaitori-rank-item"><?php the_field('買取ランキング1位_タイトル');?></p>
			</div>
				<p class="kaitori-rank-txt"><?php the_field('買取ランキング1位_文章');?></p>
		</div>
		<div class="kaitori-rank-list">
			<div class="kaitori-rank-ttl d-f ai-c">
				<div class="kaitori-rank-medal">
					<picture>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-02.png" alt="2位" style="max-width: 50px; opacity: 1;">
					</picture>
				</div>
				<p class="kaitori-rank-item"><?php the_field('買取ランキング2位_タイトル');?></p>
			</div>

			<p class="kaitori-rank-txt"><?php the_field('買取ランキング2位_文章');?></p>
		</div>
		<div class="kaitori-rank-list">
			<div class="kaitori-rank-ttl d-f ai-c">
				<div class="kaitori-rank-medal">
					<picture>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rank-icon-03.png" alt="3位" style="max-width: 50px; opacity: 1;">
					</picture>
				</div>
				<p class="kaitori-rank-item"><?php the_field('買取ランキング3位_タイトル');?></p>
			</div>
			<p class="kaitori-rank-txt"><?php the_field('買取ランキング3位_文章');?></p>
		</div>
	</div>
</section>
