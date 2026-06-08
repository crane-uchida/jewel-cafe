<?php 
/*
Template Name: 買取実績一覧
*/

$current_url = home_url(add_query_arg(array(),$wp->request));

$new_url = str_replace('/blogs/','/blog/',$current_url);

wp_redirect($new_url, 301 );

exit();

?>

<?php get_header();?>

		<div id="page-top"></div>
		
		
		
		
		<?php
			echo 
			'<div class="breadcrumbs">'.  //id名などは任意で
				'<div class="section-inner">'.
					'<a href="'. esc_url( home_url() ) .'">TOP<span></span></a>';
			
			//そのページのWPオブジェクトを取得
			$wp_obj = get_queried_object();
			$wp_obj_id = get_queried_object_id();
			if($wp_obj->parent) { //現在のターム情報が子タームなら
				$ancestors = get_ancestors( $wp_obj_id, 'hinmoku' ); //先祖のタームを取得
				$ancestors = array_reverse($ancestors);
				foreach ($ancestors as $ancesotor) {
					$parent_term_obj = get_term($ancesotor, 'hinmoku'); //タームIDからターム情報を取得
					if($parent_term_obj->parent) { //子ターム情報が取得されたとき
						$child_term_slug = $parent_term_obj->slug;
						$child_term_name = $parent_term_obj->name;
					} else {
						$parent_term_slug = $parent_term_obj->slug;
						$parent_term_name = $parent_term_obj->name;
					}
				}
			}

			if($child_term_slug) {
				$parent_archive_link = 'blogs/'.$parent_term_slug;
				$child_archive_link = 'blogs/'.$parent_term_slug.'/'.$child_term_slug;
				echo '<a href="'.esc_url( home_url($parent_archive_link) ).'">'.
							$parent_term_name .'買取<span></span>'.
							'</a>'.
							'<a href="'.esc_url( home_url($child_archive_link) ).'">'.
							$child_term_name .'買取<span></span>'.
							'</a>'.
							'<span>'.
							$wp_obj->name .'買取'.
							'</span>';
				echo '</div>'.
					'</div>';
			} elseif($parent_term_slug) {
				$parent_archive_link = 'blogs/'.$parent_term_slug;
				echo '<a href="'.esc_url( home_url($parent_archive_link) ).'">'.
							$parent_term_name .'買取<span></span>'.
							'</a>'.
							'<span>'.
							$wp_obj->name .'買取'.
							'</span>';
				echo '</div>'.
					'</div>';
			} else {
				echo '<span>'.
							$wp_obj->name .'買取'.
							'</span>';
				echo '</div>'.
					'</div>';
			}
		?>

    <div class="section-inner">
				<?php //ターム一覧のタイトルを表示
					echo
						'<h1 class="section-ja-title shop-detail-h1">';
					if($child_term_name) {
						echo $parent_term_name.' / '.$child_term_name.' / '.$wp_obj->name.'の買取例';
					} elseif($parent_term_name) {
						echo $parent_term_name.' / '.$wp_obj->name.'の買取例';
					} else {
						echo $wp_obj->name.'の買取例';
					}
					echo
						'</h1>';
				?>
			<!-- </h1> -->
			<?php get_template_part( 'template-parts/search-blog' );?>
			
				

			<?php

			if(trim($_POST['city'])!==''){

				$tax_query_arr = array(
					'taxonomy' => 'area',
					'field' => 'slug',
					'terms' => $_POST['city']
				);

			}


				$taxonomy_slug = 'hinmoku'; // タクソノミーのスラッグを指定
				$post_type_slug = 'blog'; // 投稿タイプのスラッグを指定
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => $post_type_slug, // 投稿タイプを指定
					'posts_per_page' => 30, // 表示件数を指定
					's' => trim($_POST['keyword']),
					'orderby' =>  'DESC',
					'paged' => $paged,
					'tax_query' => array($tax_query_arr)
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
			?>
			<li>
				<a href="<?php the_permalink() ?>">
					<div class="blog-catch-img">

						<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
							<img class="blog-detail-img" src="<?php echo $post_thumbnail;?>" alt="<?php the_title();?>">
						<?php else:?>
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="">
						<?php endif;?>

						<div class="blog-archive-date"><time itemprop="dateCreated datePublished"><?php the_time('Y.m.d');?></time></div>
					</div>
					<div class="p-12">
						<p class="blog-archive-category"><?php
							echo esc_html($hinmoku_parent_name).'/'.esc_html($hinmoku_child_name);
							?></p>

						<?php if(get_field('買取価格')):?>
						<p class="blog-archive-category"><?php
							echo '買取価格 : ';
							the_field('買取価格');
							?></p>
						<?php endif;?>

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

      <div class="search-shop" data-uniq-id="609bb70d69163">
        <?php get_template_part( 'template-parts/search-shop' );?>
      </div>

			</div>

			<?php get_template_part( 'template-parts/common-tab' );?>

    </div>
	</div>

<?php get_footer();?>