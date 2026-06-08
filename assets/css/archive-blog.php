<?php
/*
Template Name: 買取実績一覧
*/

?>

<?php get_header();?>

		<div id="page-top"></div>





	<div class="main-section">
		<section class="breadcrumbs_type2">
			<style>
				.breadcrumbs_type2{
					.breadcrumbs{
						background:none;
						margin-bottom:0;
						padding: 0px 0 0px;
						letter-spacing: normal;
					}
				}
				.main-section + .main-section{
					padding-top:0;
				}
				.kaitori section {
					padding-bottom: 0;
				}

				.kaitori-kinds-feature{
					padding: 70px 0px;
				}
				.kaitori-kinds-feature .name{
					font-size: 20px;
					border-bottom: 1px solid #9f9f9f;
					margin-bottom: 15px;
					padding-bottom: 5px;
				}
				.kaitori-kinds-feature img{
					width: 180px;
					margin-right:15px;
				}
				.kaitori-kinds-feature .flex{
					margin-bottom:30px;
				}
				.static-catch{
					padding-top:0;
				}
				.blog .breadcrumbs{
					margin-top:0;
				}
				@media screen and (max-width: 480px){
					.kaitori-kinds-feature .flex{
						flex-wrap:wrap;
					}
					.kaitori-kinds-feature .flex > *{
						width: 100%;
					}
					.kaitori-kinds-feature img{
						margin: auto;
    					display: block;
					}
					.kaitori-kinds-feature .text{
						margin-top:10px;
					}
				}
			</style>
			<?php kaitori_breadcrumb();?>
		</section>
	</div>




    <div class="section-inner">
			<h1 class="section-ja-title shop-detail-h1">買取実績一覧</h1>
			<!-- </h1> -->

			<?php get_template_part( 'template-parts/search-blog' );?>

			<?php

			if( isset($_GET['city']) && trim($_GET['city'])!==''){

				$tax_query_arr = array(
					'taxonomy' => 'area',
					'field' => 'slug',
					'terms' => $_GET['city']
				);

			}


				$taxonomy_slug = 'hinmoku'; // タクソノミーのスラッグを指定
				$post_type_slug = 'blog'; // 投稿タイプのスラッグを指定
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => $post_type_slug, // 投稿タイプを指定
					'posts_per_page' => 30, // 表示件数を指定
					's' => trim($_GET['keyword'] ?? ''),
					'orderby' =>  'DESC',
					'paged' => $paged,
					'tax_query' => !empty($tax_query_arr) ? array($tax_query_arr) : array(),
				);


				$the_query = new WP_Query($args);
			?>

			<h3 class="ttl-box-red">検索結果 <span class="c-yellow"><?php echo $the_query->found_posts;?></span>件</h3>


			<?php

				if($the_query->have_posts()):
			?>


			<ul class="blog-archive-list">


			<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
			<?php
			$hinmoku_terms = get_the_terms($post->ID, 'hinmoku');
			
			if(is_array($hinmoku_terms)){
				
				if($hinmoku_terms[0]->slug == 'tokei-repair'){ continue; }
				
			
			foreach($hinmoku_terms as $term) {
				if($term->parent === 0) {
					$hinmoku_parent_name = $term->name;
					$hinmoku_parent_id = $term->term_id;
				}
			}
			foreach($hinmoku_terms as $term) {
				if($term->parent === $hinmoku_parent_id) {
					$hinmoku_child_name = $term->name;
					// $hinmoku_child_id = $term->term_id;
				}
			}
			
			}
			// foreach($hinmoku_terms as $term) {
			// 	if($term->parent === $hinmoku_child_id) {
			// 		$hinmoku_grandchild_name = $term->name;
			// 	}
			// }

			$area_terms = get_the_terms( $post->ID, 'area' );
			
			if(is_array($area_terms)){
				
			foreach($area_terms as $term) {
				if($term->parent === 0) {
					// $area_parent_name = $term->name;
					$area_parent_id = $term->term_id;
				}
			}
			foreach($area_terms as $term) {
				if($term->parent === $area_parent_id) {
					// $area_child_name = $term->name;
					$area_child_id = $term->term_id;
				}
			}
			foreach($area_terms as $term) {
				if($term->parent === $area_child_id) {
					$area_grandchild_name = $term->name;
				}
			}
			
			}
			
						$image_alt_title = $post->post_title;
						
						
						$alt_img_arr = explode('を',$post->post_title);
						
						if(isset($alt_img_arr[1]) && $alt_img_arr[1] == ''){
							
							$alt_img = explode('お',$post->post_title);

							if(isset($alt_img_arr[1]) && $alt_img[1] !== ''){
							
								$image_alt_title = $alt_img[0];
							
							}
							
						}else{
							
							$image_alt_title = $alt_img_arr[0];
							
						}
						

						
			
			?>
			<li>
				<a href="<?php the_permalink() ?>">
					<div class="blog-catch-img">

							<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
								<img class="blog-detail-img" src="<?php echo $post_thumbnail;?>" alt="<?php echo $image_alt_title;?>">
							<?php else:?>
								<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="">
							<?php endif;?>

						<div class="blog-archive-date"><time itemprop="dateCreated datePublished"><?php the_time('Y.m.d');?></time></div>
					</div>
					<div class="p-12">
						<p class="blog-archive-category"><?php
							echo esc_html($hinmoku_parent_name).'/'.esc_html($hinmoku_child_name);
							?></p>


						<?php
						/*
						if(get_field('買取価格')):?>
						<p class="blog-archive-category">
							<?php
							echo '買取価格 : ';
							the_field('買取価格');
							?></p>
						<?php endif;
						*/
						?>



						<p class="blog-archive-ttl"><?php the_title(); ?></p>
						<p class="blog-archive-shop"><?php
							echo esc_html($area_grandchild_name);
							?></p>
					</div>
				</a>
			</li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>
      </ul>

			<div class="blog-pagination">


				<?php if ($the_query->max_num_pages > 1) : ?>

					<?php
						

						$limitnum = 999999999;

						$page = paginate_links(array(
							'base'         => str_replace($limitnum, '%#%', esc_url(get_pagenum_link($limitnum))),
							'format'       => '',
							'current'      => max(1, get_query_var('paged')),
							'total'        => $the_query->max_num_pages,
							'prev_next'    => true,
							'prev_text' => '<span class="blog-pagination-prev"></span>',
							'next_text' => '<span class="blog-pagination-next"></span>',
							'type'         => 'list',
							'end_size'     => 1,
							'mid_size'     => 2
						));

						echo str_replace(',','',$page);
					
					?>

					<?php // echo jewelcafe_pagenavi();?>

				<?php endif; ?>


			</div>
			


      <section class="blog-search-shop">
        <h3 class="ttl-box-red">お近くのジュエルカフェ店舗を探す</h3>
        <p>商品知識豊富な女性スタッフと、ご来店からお支払いまで最短10分のスピード査定!スピード重視・ご相談重視なら来店買取がオススメです！</p>
      </section>

      <div>
        <?php get_template_part( 'template-parts/search-shop-new' );?>
      </div>


			</div>

			<?php get_template_part( 'template-parts/common-tab' );?>

    </div>
	</div>


	<style>
	.blog-archive-list li .blog-catch-img img{height:120px;}

	</style>

<?php get_footer();?>
