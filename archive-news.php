<?php 
/*
Template Name: お知らせ一覧
*/
?>

<?php get_header( );?>

<div id="page-top"></div>
	<div class="breadcrumbs">  
		<div class="section-inner">
			<a href="<?php esc_url( home_url() );?>">TOP<span></span></a>
			<span>お知らせ</span>
		</div>		
	</div>

    <div class="section-inner">

			<ul class="blog-news-list">
				<?php if(have_posts()):?>
					<?php 
						$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
						$args = array(
							'post_type' => 'news',
							'posts_per_page' => 10,
							'orderby' =>  'DESC',
							'paged' => $paged,
						);
						$the_query = new WP_Query($args); if($the_query->have_posts()):
						?>
					<?php while($the_query->have_posts()): $the_query->the_post();?>
						<li>
							<p><?php the_time('Y/m/d g:i');?></p>
							<a href="<?php the_permalink();?>"><?php the_title();?></a>
						</li>
					<?php 
						endwhile;
						wp_reset_postdata(  );
						endif;
					?>
				<?php endif;?>
      </ul>
			<div class="blog-pagination">
				<?php if ($the_query->max_num_pages > 1) : ?>
					<?php
						$limitnum = 999999999;
						echo paginate_links(array(
							'base'         => str_replace($limitnum, '%#%', esc_url(get_pagenum_link($limitnum))),
							'format'       => '',
							'current'      => max(1, get_query_var('paged')),
							'total'        => $the_query->max_num_pages,
							'prev_next'    => true,
							'prev_text' => '<span class="blog-pagination-prev"></span>',
							'next_text' => '<span class="blog-pagination-next"></span>',
							'type'         => 'list',
							'end_size'     => 3,
							'mid_size'     => 3
						));
					?>
				<?php endif; ?>
			</div>

      <section class="blog-search-shop">
        <h2 class="ttl-box-red">お近くのジュエルカフェ店舗を探す</h2>
        <p>商品知識豊富な女性スタッフと、ご来店からお支払いまで最短10分のスピード査定!スピード重視・ご相談重視なら来店買取がオススメです！</p>
      </section>

			<div class="search-shop" data-uniq-id="609bb70d69163">
        <?php get_template_part( 'template-parts/search-shop' );?>
      </div>

      <?php get_template_part( 'template-parts/common-tab' );?>

    </div>

<?php get_footer( );?>