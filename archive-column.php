<?php
/*
Template Name: コラム一覧
*/
?>

<?php get_header( );?>


<div class="breadcrumbs">
    <div class="column-inner">
        <a href="<?php echo esc_url( home_url() ) ?>">TOP<span></span></a>
        <span>ジュエルカフェのお役立ちコラム</span>
    </div>
</div>

<nav class="gnavi">
  <div class="gnavi_inner">
    <ul>
        <li><a href="<?php echo esc_url( home_url('/column/') ) ?>"><span>お役立ちコラム TOP</span></a></li>
        <li><a href="<?php echo esc_url( home_url() ) ?>"><span>ジュエルカフェ TOP</span></a></li>
        <li class="shop"><a href="<?php echo esc_url( home_url('/shop/') ) ?>"><span>お近くのジュエルカフェを調べる</span></a></li>
        <li class="line"><a href="<?php echo esc_url( home_url('/about-line/') ) ?>"><span>LINEで今すぐお気軽査定！</span></a></li>
    </ul>
  </div>
</nav>

<div class="container cf">
    <main role="main" class="left">
        <div id="page-top"></div>

        <div class="column_inner">
            <h1 class="section-ja-title shop-detail-h1">ジュエルカフェの<br class="pc-none">お役立ちコラム</h1>
            <ul class="blog-news-list">
                <?php
				
				$post_parent_arr = array();
		
				$args = array(
				'posts_per_page' => -1,
				'post_type' => 'column',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_parent' => 0,
				);
				
				$common_pages = new WP_Query( $args );
				if( $common_pages->have_posts() ):
					while( $common_pages->have_posts() ): $common_pages->the_post();
					
						$post_parent_arr[] = get_the_ID();
			
					endwhile;
					wp_reset_postdata();
				endif;				
				
				
				
				
					$post_type_slug = 'column'; // 投稿タイプのスラッグを指定
					$paged = get_query_var('paged') ? get_query_var('paged') : 1;
					$args = array(
						'post_type' => $post_type_slug, // 投稿タイプを指定
						'posts_per_page' => 12, // 表示件数を指定
						'orderby' =>  'DESC',
						'paged' => $paged,
						'post__not_in' => $post_parent_arr,
					);
					
					
					$the_query = new WP_Query($args); if($the_query->have_posts()):
					
					$get_num = $the_query->post_count;
					
		
					
				?>
                <?php while ($the_query->have_posts()): $the_query->the_post(); ?>

                <li>
                    <a class="post_image" href="<?php the_permalink();?>">
					

						
							<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
							
							<img src="<?php echo $post_thumbnail;?>" alt="<?php the_title();?>">
							
						<?php else:?>
							<img class="blog-detail-img" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="ジュエルぐま">
						<?php endif;?>
						
					</a>
					
					
                    <div class="txt_box">

                        <?php
								$parent_id = $post->ancestors[count($post->ancestors) - 1]; // 最上の親ページのIDを取得
							?>

                        <a class="post_category" href="<?php echo get_permalink($parent_id); ?>">
                            <?php
									echo $parent_title = get_post($parent_id)->post_title; // 最上の親ページのタイトルを取得して表示
								?>
                        </a>

                        <div class="dayDate"><?php the_time("Y.m.d"); ?>up</div>
                        <a class="post_ttl" href="<?php the_permalink();?>"><?php the_title();?></a>

                        <?php if( wp_is_mobile()): //スマホ・タブレットの場合 ?>
                        <?php else: //PCの場合 ?>
                        <?php
                            echo ' <a class="more">';
                            if (mb_strlen($post->post_content,'UTF-8')>50) {
                                $content = strip_shortcodes($post-> post_content);   
                                $content = preg_replace('/<cite>.*?<\/cite>/is', "", $content); //preg_replace関数を使って特定のHTMLタグ（要素を含む）を削除
                                $content= str_replace('\n', '', mb_substr(strip_tags($content), 0, 50,'UTF-8'));
                                echo $content . '・・・<a href="' . get_permalink() . '"></a>';
                            } else {
                                echo str_replace('\n', '', strip_tags($post->post_content)) ;
                            }
                            echo '</a>';
                        ?>
                        <?php endif;?>
                    </div>
                </li>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
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
							'end_size'     => 2,
							'mid_size'     => 3
						));
					?>
                <?php endif; ?>
            </div>



        </div>



</main>
<?php get_template_part( 'template-parts/column-sidebar' );?>


</div>
<div class="section-inner">
    <section class="blog-search-shop">
        <h3 class="ttl-box-red">お近くのジュエルカフェ店舗を探す</h3>
        <p>商品知識豊富な女性スタッフと、ご来店からお支払いまで最短10分のスピード査定!スピード重視・ご相談重視なら来店買取がオススメです！</p>
    </section>

    <div>
        <?php get_template_part( 'template-parts/search-shop-new' );?>
    </div>
    <?php get_template_part( 'template-parts/common-tab' );?>
</div>


<?php get_footer( );?>