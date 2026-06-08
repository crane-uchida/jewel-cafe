<?php get_header( );?>

<div id="page-top"></div>

<div class="main-section">
	<div class="only-sp">
		<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop-top-bnr.jpg" class="mb-12" alt="来店予約&ROLEXお買取成立で¥20,000キャッシュバック" class="no-lazyload">
	</div>
</div>

<div class="section-inner">
	<section>
		<h2 class="section-ja-title">店舗案内</h2>
		<p>ジュエルカフェは業界最大級の全国300店舗</p>
	</section>

	<section>
		<picture>
			<source media="(min-width: 961px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shop_mv_pc.jpg" class="w-100per mb-20 no-lazyload">
			<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shop_mv_sp.jpg" class="w-100per mb-20 no-lazyload" alt="ジュエルカフェの店頭買取はお客様人気NO.1 お電話で来店予約もご利用いただけます">
		</picture>
	</section>

	<section class="shop-area-city">
		<h3 class="shop-area-city-tll"><span>「<?php echo get_search_query(); ?>」の店舗一覧</span></h3>

		<ul class="shop-area-city-list">
			<?php
				$args = array(
					'post_type' => 'shop',
					'posts_per_page' => -1,
					'post_parent' => 0,
					'orderby' => 'DESC',
					'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
					's' => get_search_query(),
				);
				$the_query = new WP_Query($args); if($the_query->have_posts()):
			?>
			<?php while($the_query->have_posts()): $the_query->the_post();?>
			<?php
			$terms = get_the_terms(get_the_ID(), 'area');
			$child_terms = array_filter($terms, function ($term) {
				return $term->parent;
			});

			$child_term = count($child_terms) > 0 ? reset($child_terms) : '';
			?>
				<li class="shop-area-city-item">
					<div class="shop-name bold"><?php echo $child_term->name; ?> - <?php the_title();?></div>
					<?php if(get_field('店舗電話番号')):?>
						<a href="tel:<?php
							$tel = get_field('店舗電話番号');
							$tel = str_replace(array('-', 'ー', '−', '―', '‐','(',')','（','）',' ','　'), '', $tel);
							echo $tel;
						?>" class="shop-tel bold color-red"><?php the_field('店舗電話番号'); ?></a>
					<?php else:?>
						<div class="shop-tel bold color-red"><?php the_field('オープン時期');?></div>
					<?php endif;?>
					<div class="shop-info">
						<div class="shop-address d-f"><?php the_field('所在地');?></div>
						<div class="shop-opening d-f">営業時間<?php the_field('営業時間');?></div>
					</div>
					<?php if(get_field('一覧ページに載せるお知らせ')):?>
						<p class="shop-att"><?php the_field('一覧ページに載せるお知らせ');?></p>
					<?php endif;?>
					<div class="ta-r"><a class="pos-r bold color-red shop-detail-btn" href="<?php the_permalink( );?>">詳しくはこちら</a></div>
				</li>
			<?php
			endwhile;
			wp_reset_postdata(  );
			endif;
			?>
		</ul>
	</section>

	<section>
		<h4 class="section-ja-title ta-c">査定無料！<br class="only-sp">お気軽にお問合せ下さい！</h4>
		<ul class="border-col-3 m-12">
			<li>
				<a href="<?php echo esc_url(home_url( 'shop-buy' ));?>" class="border-col-item d-b color-black">
					<div class="drawer-icon mb-4">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/drawer-icon-01.svg" alt="">
					</div>店頭買取
				</a>
			</li>
			<li>
				<a href="<?php echo esc_url(home_url( 'delivery-buy' ));?>"  class="border-col-item d-b color-black">
					<div class="drawer-icon mb-4">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/drawer-icon-02.svg" alt="">
					</div>宅配買取
				</a>
			</li>
			<li>
				<a href="<?php echo esc_url(home_url( 'trip-buy' ));?>" class="border-col-item d-b color-black">
					<div class="drawer-icon mb-4">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/drawer-icon-03.svg" alt="">
					</div>出張買取
				</a>
			</li>
		</ul>
	</section>


	<section class="purchase">
		<h4 class="section-ja-title ta-c">ジュエルカフェ<?php echo esc_html($current_term_name); ?>の<br class="only-sp">買取商品一覧</h4>

		<?php get_template_part( 'template-parts/common-purchase-item' );?>

	</section>

	<?php get_template_part( 'template-parts/common-tab' );?>

</div>

<?php get_footer( );?>
