<?php 
/*
Template Name: 買取詳細
*/

?>

<?php get_header( );?>


<style>
.breadcrumbs_type2 .breadcrumbs {
	background: none;
	padding: 0px 0 7px;
	letter-spacing: normal;
	font-size: 14px;
	margin: 0;
}	
</style>


<div id="page-top"></div>

		<?php
			$terms = get_the_terms( $post->ID, 'hinmoku' );
			
			$terms_area = get_the_terms( $post->ID, 'area' );
			
			
			$terms_count = count($terms);
			//そのページのWPオブジェクトを取得
			// $wp_obj = get_queried_object();
			
			
			
			echo 
			'<div class="main-section"><section class="breadcrumbs_type2"><div class="breadcrumbs">'.  //id名などは任意で
				'<div class="section-inner">'.
					'<a href="'. esc_url( home_url() ) .'">最新相場で高価買取ならジュエルカフェ<span></span></a>';

			foreach ($terms as $term) { //親ターム取得
				if ($term->parent === 0) {
					$parent_term_name = $term->name;
					
					if( $parent_term_name == '金' ){ $parent_term_name = '金・貴金属';}


					$parent_term_link = esc_url(get_term_link($term));
					$parent_term_id = $term->term_id;
					$parent_term_slug = $term->slug;
					//買取事例 - 品目 一覧へのリンク出力
					$parent_term_blog_link = str_replace("blog", "blogs", $parent_term_link);
				}
			}

			if(isset($terms)){

				foreach ($terms as $term) { //子ターム取得
					if ($term->parent === $parent_term_id) {
						$child_term_name = $term->name;
						$child_term_link = esc_url(get_term_link($term));
						$child_term_id = $term->term_id;
						$child_term_slug = $term->slug;
						//買取事例 - 品目 一覧へのリンク出力
						$child_term_blog_link = str_replace("blog", "blogs", $child_term_link);
					}
				}
			
			}

			if($terms_count === 3) { //孫ターム取得
				foreach ($terms as $term) {
					if ($term->parent === $child_term_id) {
						$grand_child_term_name = $term->name;
						$grand_child_term_link = esc_url(get_term_link($term));
						$grand_child_term_slug = $term->slug;
						//買取事例 - 品目 一覧へのリンク出力
						$grand_child_term_blog_link = str_replace("blog", "blogs", $grand_child_term_link);
					}
				}
			}


			if($terms[0]->slug !== 'tokei-repair' ){
		
			echo 
			'<a href="'. esc_url( home_url( '/kaitori/'.$parent_term_slug ) ) .'/">'.
				$parent_term_name .'買取<span></span>'.
			'</a>';
			
			}
			
			

			if($terms_count === 2) {
				
				
				
				if ($child_term_slug === "other-vuitton"	|| $child_term_slug === "other-chanel" || $child_term_slug === "other-hermes-brand" || $child_term_slug === "other"		) {
				
				echo
				'<a href="'. esc_url( home_url( '/kaitori/'.$parent_term_slug.'/' ) ) .'">'.
					$child_term_name .'買取<span></span>'.
				'</a>';
				
				}else{




				echo
				'<a href="'. esc_url( home_url( '/blog/'.$parent_term_slug.'/' ) ) .'">'.
					$parent_term_name .'の参考価格・買取実績一覧<span></span>'.
				'</a>';
					
				}
				
				
				
				'<span>'.
					the_title( );
				'</span>';
			} else if($terms[0]->slug == 'tokei-repair' ){
				
				
				if($terms_area[0]->term_id =='1044' || $terms_area[1]->term_id =='1044' || $terms_area[2]->term_id =='1044'){
				
					echo '<a href="/shop/chugoku/tottori/tokei-repair-matsuegakuendori/">松江学園通り店の時計修理<span></span></a>';
				
				}else{
				
					echo '<a href="/shop/chugoku/tottori/tokei-repair-yoshinari/">鳥取吉成店の時計修理<span></span></a>';
				
				}
				
				
				echo '<span>'.$post->post_title.'</span>';

				
			} else {

				echo '<a href="' . esc_url(home_url('/kaitori/' . $parent_term_slug . '/' . $child_term_slug . '/')) . '">'
					. esc_html($child_term_name) . '買取<span></span></a>';

				if (!empty($grand_child_term_slug) && !empty($grand_child_term_name)) {

					if (
						$grand_child_term_slug === "other-vuitton" ||
						$grand_child_term_slug === "other-chanel" ||
						$grand_child_term_slug === "other-hermes-brand" ||
						$grand_child_term_slug === "other"
					) {
						// other-vuitton(その他買取)の場合は、親のルイヴィトンTOPにリンク
						echo '<a href="' . esc_url(home_url('/kaitori/' . $parent_term_slug . '/' . $child_term_slug . '/')) . '">'
							. esc_html($grand_child_term_name) . '買取<span></span></a>';
					} else {
						echo '<a href="' . esc_url(home_url('/kaitori/' . $parent_term_slug . '/' . $child_term_slug . '/' . $grand_child_term_slug . '/')) . '">'
							. esc_html($grand_child_term_name) . '買取<span></span></a>';
					}

				}

				echo '<span>' . esc_html(get_the_title()) . '</span>';
			}


			echo '</div>'.
						'</div></section></div>';
						
						$image_alt_title = $post->post_title;
						
						
						$alt_img_arr = explode('を',$post->post_title);
						
						if(isset($alt_img_arr[1]) && $alt_img_arr[1] == ''){
							
							$alt_img = explode('お',$post->post_title);

							if($alt_img[1] !== ''){
							
								$image_alt_title = $alt_img[0];
							
							}
							
						}else{
							
							$image_alt_title = $alt_img_arr[0];
							
						}
						
						
						

			$tax_query_terms = 
			(isset($terms_count) && $terms_count === 3 && isset($grand_child_term_slug))
			? $grand_child_term_slug 
			: (isset($child_term_slug) ? $child_term_slug : '');



				$term_hinmoku_parent_posts = get_posts(array(
					'post_type' => 'blog',
					'posts_per_page' => 1, 
					'orderby' => 'date',
					'order' => 'DESC',
					'post__not_in' => array(get_the_ID()),
					'tax_query' => array(
						array(
							'taxonomy' => 'hinmoku',
							'field' => 'slug',
							'terms' => $tax_query_terms,
							'operator' => 'IN'
						),
					)
				));

				if (isset($term_hinmoku_parent_posts[0]) && !empty($term_hinmoku_parent_posts[0]->post_date)) {
					$dateTime = new DateTime($term_hinmoku_parent_posts[0]->post_date);
				} else {
					$dateTime = new DateTime(); // 기본값: 현재 시간
				}


				$dateOnly = $dateTime->format('Y-m-d H:i:s');
				
				$dateA = get_the_date('Y-m-d H:i:s');
				$dateB = $dateOnly;
				$dateTimeA = new DateTime($dateA);
				$dateTimeB = new DateTime($dateB);
		?>












<?php

	$hinmoku_term = get_top_parent_term($terms, 'hinmoku');
	$area_term    = get_bottom_child_term($terms_area, 'area');


?>


<section id="blog-detail">
  <div class="jc-main-content">
  <div class="section-inner">
    <div class="jc-hero">
      <p class="jc-meta">更新日：<time datetime="<?php echo $dateTime->format('Y-n-j'); ?>"><?php echo $dateTime->format('Y年n月j日'); ?></time>　|　公開日：<time datetime="<?php echo get_the_date('Y-n-j'); ?>"><?php echo get_the_date('Y年n月j日'); ?></time></p>
      <h1 class="jc-title"><?php the_title();?></h1>
      <div class="jc-content-grid">
        <div class="jc-img-wrap">
          <div class="jc-img-placeholder">
			  <?php
				  $post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' );
			  ?>
			  <img class="blog-detail-img" src="<?php echo $post_thumbnail;?>" alt="<?php echo $image_alt_title;?>">
		  </div>
        </div>
        <div>
          <div class="jc-price-card">
            <div class="jc-price-rows">
              <div class="jc-price-row">
                <div class="jc-price-key">カテゴリー</div>
                <div class="jc-price-val">
															
				<?php if (!empty($terms) && !is_wp_error($terms)) : ?>
					<?php foreach ($terms as $term) : ?>
						<?php
						$term_link = get_term_link($term, $term->taxonomy);

						if (is_wp_error($term_link)) {
							continue;
						}

						$term_link = str_replace('/blog/', '/kaitori/', $term_link);
						?>

							<a href="<?php echo esc_url($term_link); ?>">
								<?php echo esc_html($term->name); ?>買取
							</a>

					<?php endforeach; ?>
				<?php endif; ?>

                </div>
              </div>
			  
              <div class="jc-price-row">
                <div class="jc-price-key">買取日</div>
                <div class="jc-price-val"><?php echo get_the_date('Y年n月j日'); ?></div>
              </div>
              <div class="jc-price-row">
                <div class="jc-price-key">買取店舗</div>
                <div class="jc-price-val">
					<?php
						echo $area_term->name;
					?>
				</div>
              </div>
            </div>
            <div class="jc-price-footer">
              <div class="jc-price-key">買取価格</div>
              <div class="jc-price-amount">
			  
				<?php if(trim(get_field('買取価格'))):?>

				<?php echo number_format(get_field('買取価格'));?>
				
				<span>円</span>
	
				<?php endif;?>
				
				</div>
			  
              <p class="jc-price-note">※買取価格は<?php echo get_the_date('Y年n月j日'); ?>時点での買取参考価格です。<br>各種キャンペーン等や仕入れ状況により買取価格は常時変動いたします。</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="jc-desc">
      <?php the_field('買取査定ポイント');?>
    </div>
  </div>
  </div>
  
		
		<?php
			$shop = get_shop_admin_by_shop_url($area_term->slug);

		?>
  
  <div class="section-inner">

    <div class="jc-store-section">
      <div class="jc-section-tag">お買取した店舗</div>
      <div class="jc-store-body">
        <div class="jc-store-img">
          <div class="jc-img-placeholder">
				<img src="<?php echo $shop->shop_image1;?>" ?>
		  </div>
        </div>
        <div>


		<p class="jc-store-info-sub">					
			<?php
					echo $hinmoku_term->name;
			?>買取ならジュエルカフェ
		</p>
		
		<p class="jc-store-name">
			<?php
				echo $area_term->name;
			?>
		</p>


          <p class="jc-store-addr"><?php echo $shop->shop_add;?></p>
          <p class="jc-store-tel">TEL <a href="tel:<?php echo $shop->shop_tel;?>"><?php echo $shop->shop_tel;?></a></p>
          <div class="jc-store-btns">
            <a href="/shop/<?php echo $shop->shop_city1;?>/<?php echo $shop->shop_city2;?>/<?php echo $shop->shop_url;?>/#js-purchase-price" class="jc-btn-outline">この店舗の買取実績を見る</a>
            <a href="/shop/<?php echo $shop->shop_city1;?>/<?php echo $shop->shop_city2;?>/<?php echo $shop->shop_url;?>/#js-store-guide" class="jc-btn-red">店舗の詳細・Googleマップを見る</a>
          </div>
        </div>
      </div>
    </div>

    <div class="jc-more-section">
      <div class="jc-more-header">
        <div class="jc-more-title">その他の <?php
					echo $hinmoku_term->name;
			?> お買取実績</div>
        <a href="/blog/" class="jc-more-link">買取実績をもっと見る ›</a>
      </div>

<?php

$taxonomy = 'hinmoku';

$parent_term = get_term_by('slug', $hinmoku_term->slug, $taxonomy);

$hinmoku_children = [];

if ($parent_term && !is_wp_error($parent_term)) {

    $child_terms = get_terms([
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
        'parent'     => $parent_term->term_id,
        'orderby'    => 'term_order',
        'order'      => 'ASC',
    ]);

    if (!empty($child_terms) && !is_wp_error($child_terms)) {
        foreach ($child_terms as $child_term) {
            $hinmoku_children[$child_term->slug] = [
                'term_id' => $child_term->term_id,
                'name'    => $child_term->name,
                'slug'    => $child_term->slug,
            ];
        }
    }
}

if (!empty($hinmoku_children)) {
    $visible_hinmoku_children = [];

    foreach ($hinmoku_children as $slug => $child) {
        $child_exists_query = new WP_Query([
            'post_type'      => 'blog',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
            'no_found_rows'  => true,
            'tax_query'      => [
                [
                    'taxonomy' => 'hinmoku',
                    'field'    => 'term_id',
                    'terms'    => [$child['term_id']],
                ],
            ],
        ]);

        if ($child_exists_query->have_posts()) {
            $visible_hinmoku_children[$slug] = $child;
        }

        wp_reset_postdata();
    }

    $hinmoku_children = $visible_hinmoku_children;
}

$child_term_ids = [];
$has_tab_posts = false;

if (!empty($hinmoku_children)) {
    foreach ($hinmoku_children as $child) {
        $child_term_ids[] = $child['term_id'];
    }

    $has_tab_posts = !empty($child_term_ids);
}

?>



      <!-- タブ -->
      <?php if ($has_tab_posts) : ?>
      <div class="jc-tags" role="tablist">
        <span class="jc-tag active" role="tab" data-tab="all">すべて</span>
		<?php foreach ($hinmoku_children as $slug => $child) : ?>
				<span class="jc-tag" role="tab" data-tab="<?php echo esc_attr($child['slug']); ?>">
					<?php echo esc_html($child['name']); ?>
				</span>
		<?php endforeach; ?>
      </div>
      <?php endif; ?>



<?php
$shop_name = '';

if (!empty($shop) && !empty($shop->shop_name)) {
    $shop_name = $shop->shop_name;
}
?>

<!-- すべて -->
<?php if ($has_tab_posts) : ?>
<div class="jc-tab-panel active" data-panel="all">
    <div class="jc-cards-grid">

        <?php
        $args = [
            'post_type'      => 'blog',
            'post_status'    => 'publish',
            'posts_per_page' => 10,
            'tax_query'      => [
                [
                    'taxonomy' => 'hinmoku',
                    'field'    => 'term_id',
                    'terms'    => $child_term_ids,
                    'operator' => 'IN',
                ],
            ],
        ];

        $all_query = new WP_Query($args);

        if ($all_query->have_posts()) :
            while ($all_query->have_posts()) :
                $all_query->the_post();

                $post_id = get_the_ID();
                $title   = get_the_title();
                $url     = get_permalink();
                $date    = get_the_date('Y年m月d日');

                $price = get_post_meta($post_id, '買取価格', true);

                $thumb = get_the_post_thumbnail_url($post_id, 'medium');
        ?>

                <a href="<?php echo esc_url($url); ?>" class="jc-item-card">
                    <div class="jc-item-img">
                        <?php if ($thumb) : ?>
                            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
                        <?php else : ?>
                            <div class="jc-img-placeholder" style="font-size:10px;">画像</div>
                        <?php endif; ?>
                    </div>

                    <div class="jc-item-body">
                        <div class="jc-item-price-label">参考買取価格</div>

                        <?php if ($price !== '') : ?>
                            <div class="jc-item-price"><?php echo esc_html(number_format((int)$price)); ?>円</div>
                        <?php endif; ?>

                        <div class="jc-item-name"><?php echo esc_html($title); ?></div>

                        <?php if ($shop_name !== '') : ?>
                            <div class="jc-item-store">
                                <span class="jc-item-dot"></span><?php echo esc_html($shop_name); ?>
                            </div>
                        <?php endif; ?>

                        <div class="jc-item-date"><?php echo esc_html($date); ?></div>
                    </div>
                </a>

        <?php
            endwhile;
            wp_reset_postdata();
		endif; ?>

    </div>
</div>
<?php endif; ?>


<?php if ($has_tab_posts) : ?>
    <?php foreach ($hinmoku_children as $slug => $child) : ?>

        <!-- <?php echo esc_html($child['name']); ?> -->
        <div class="jc-tab-panel" data-panel="<?php echo esc_attr($child['slug']); ?>">
            <div class="jc-cards-grid">

                <?php
                $args = [
                    'post_type'      => 'blog',
                    'post_status'    => 'publish',
                    'posts_per_page' => 10,
                    'tax_query'      => [
                        [
                            'taxonomy' => 'hinmoku',
                            'field'    => 'term_id',
                            'terms'    => [$child['term_id']],
                        ],
                    ],
                ];

                $child_query = new WP_Query($args);

                if ($child_query->have_posts()) :
                    while ($child_query->have_posts()) :
                        $child_query->the_post();

                        $post_id = get_the_ID();
                        $title   = get_the_title();
                        $url     = get_permalink();
                        $date    = get_the_date('Y年m月d日');

                        $price = get_post_meta($post_id, '買取価格', true);

                        $thumb = get_the_post_thumbnail_url($post_id, 'medium');
                ?>

                        <a href="<?php echo esc_url($url); ?>" class="jc-item-card">
                            <div class="jc-item-img">
                                <?php if ($thumb) : ?>
                                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
                                <?php else : ?>
                                    <div class="jc-img-placeholder" style="font-size:10px;">画像</div>
                                <?php endif; ?>
                            </div>

                            <div class="jc-item-body">
                                <div class="jc-item-price-label">参考買取価格</div>

                                <?php if ($price !== '') : ?>
                                    <div class="jc-item-price"><?php echo esc_html(number_format((int)$price)); ?>円</div>
                                <?php endif; ?>

                                <div class="jc-item-name"><?php echo esc_html($title); ?></div>

                                <?php if ($shop_name !== '') : ?>
                                    <div class="jc-item-store">
                                        <span class="jc-item-dot"></span><?php echo esc_html($shop_name); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="jc-item-date"><?php echo esc_html($date); ?></div>
                            </div>
                        </a>

                <?php
                    endwhile;
                    wp_reset_postdata();
					endif; ?>

            </div>
        </div>

    <?php endforeach; ?>
<?php endif; ?>



      <div style="text-align:center;">
        <a href="/blog/" class="jc-more-btn"><?php echo $hinmoku_term->name;?>の買取実績をもっと見る ›</a>
      </div>
    </div>


	<?php /* ?>
		<?php get_template_part("template-parts/common-tab"); ?>
	<?php */ ?>

  </div>
</section>

<!-- タブ切り替えJS -->
<script>
(function () {
  const tags = document.querySelectorAll('#blog-detail .jc-tag');
  const panels = document.querySelectorAll('#blog-detail .jc-tab-panel');
  tags.forEach(function (tag) {
    tag.addEventListener('click', function () {
      tags.forEach(function (t) { t.classList.remove('active'); });
      panels.forEach(function (p) { p.classList.remove('active'); });
      tag.classList.add('active');
      var target = tag.getAttribute('data-tab');
      var panel = document.querySelector('#blog-detail .jc-tab-panel[data-panel="' + target + '"]');
      if (panel) panel.classList.add('active');
    });
  });
})();
</script>








<?php
	/*
?>




    <div class="section-inner">
			<div style="line-height:1;">


			<?php if ($dateTimeA < $dateTimeB):?>
				<span class="blog-detail-date">更新日 : <?php echo $dateTime->format('Y年n月j日'); ?></span>&nbsp;<br class="pc-none">
			<?php endif;?>

			<span class="blog-detail-date">公開日 : <?php echo get_the_date('Y年n月j日'); ?></span>


			</div>

			<h1 class="section-ja-title shop-detail-h1">
				<?php the_title();?>
			</h1>


			<?php
				$post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' );
				
				$image_id2 = get_post_meta($post->ID, 'tokei-image', true);
				$image_url2 = wp_get_attachment_url($image_id2);


				if($terms[0]->slug == 'tokei-repair' && trim($image_url2) !== ''){
			?>
			
			<div class="repair_images">
				<img src="<?php echo $post_thumbnail;?>">
				<img src="<?php echo $image_url2;?>">
			</div>
			<style>
				.repair_images{display:flex;column-gap: 30px;}
				.repair_images img{
					  width: calc(50% - 15px);
			  aspect-ratio: 1/1;
			  object-fit: cover;
				}
			</style>

			
			<?php
				}else{
			?>
				<?php if($post_thumbnail !== ''):?>
					<img class="blog-detail-img" src="<?php echo $post_thumbnail;?>" alt="<?php echo $image_alt_title;?>">
				<?php else:?>
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="">
				<?php endif;?>
			<?php
				}
			?>
			


	
		<?php
			if($terms[0]->slug == 'tokei-repair' ){
		?>
			
		  <section class="detail-column">
			<h2 class="blog-detail-ttl"><span>修理商品の詳細</span></h2>
			
			<div class="blog-flex-item">
			  <h3 class="detail-column-ttl">修理店舗</h3>
			  
				<div class="blog-detail-list-border">
					<p>
						<?php
	
							if($terms_area[0]->term_id =='1044' || $terms_area[1]->term_id =='1044' || $terms_area[2]->term_id =='1044'){
						?>
						島根県
						<br>
						<a href="/shop/chugoku/shimane/tokei-repair-matsuegakuendori/">松江学園通り店</a>
						<?php
							}else{
						?>
						鳥取県
						<br>
						<a href="/shop/chugoku/tottori/tokei-repair-yoshinari/">鳥取吉成店</a>
						<?php } ?>

					</p>
				</div>

			</div>
			
			
			<div class="blog-flex-item">
				<h3 class="detail-column-ttl">ブランド</h3>
				<div class="blog-detail-list-border">
					<p><?php the_field('tokei-brand');?></p>
				</div>
			</div>
		
			<div class="blog-flex-item">
				<h3 class="detail-column-ttl">モデル</h3>
				<div class="blog-detail-list-border">
					<p><?php the_field('tokei-model');?></p>
				</div>
			</div>
		
		
			<div class="blog-flex-item">
				<h3 class="detail-column-ttl">カテゴリー</h3>
				<div class="blog-detail-list-border">
					<p><?php the_field('tokei-category');?></p>
				</div>
			</div>
		
			<div class="blog-flex-item">
				<h3 class="detail-column-ttl">料金</h3>
				<div class="blog-detail-list-border">
					<p><?php echo number_format(get_field('tokei-price'));?>円</p>
				</div>
			</div>
			
			<div class="blog-flex-item">
				<h3 class="detail-column-ttl">修理期間</h3>
				<div class="blog-detail-list-border">
					<p><?php the_field('tokei-time');?></p>
				</div>
			</div>
			
			<section class="blog-comment">
				<h3 class="blog-detail-ttl"><span>修理のポイント</span></h3>
				<p><?php the_field('tokei-point');?></p>
			</section>
			
			
		</section>
		
		
		
		
		<?php
			}else{
		?>
		

      <section class="detail-column">
        <h2 class="blog-detail-ttl"><span>買取商品の詳細</span></h2>
        <div class="blog-flex-item">
          <h3 class="detail-column-ttl">商品カテゴリ</h3>
          <div class="blog-detail-list-border">
			<p>
				<a href="<?php //親カテゴリ
					echo esc_url(home_url( '/kaitori/'.$parent_term_slug ));?>/"><?php
					echo esc_html( $parent_term_name );?>買取</a>
			</p>
			<p>
				<a href="
						<?php //中カテゴリ

							if ($child_term_slug === "other-vuitton"	|| $child_term_slug === "other-chanel" || $child_term_slug === "other-hermes-brand" || $child_term_slug === "other"		) {
								
								echo esc_url(home_url( '/kaitori/'.$parent_term_slug.'/' ));
							} else{
								echo esc_url(home_url( '/kaitori/'.$parent_term_slug.'/'.$child_term_slug ));
							}
						?>">
					
					
					<?php
					echo esc_html( $child_term_name );?>買取</a>
			</p>
			<?php if(isset($grand_child_term_slug) && $grand_child_term_slug):?>
				<p>
					<a href="
						<?php //小カテゴリ

							if ($grand_child_term_slug === "other-vuitton"	|| $grand_child_term_slug === "other-chanel" || $grand_child_term_slug === "other-hermes-brand" || $grand_child_term_slug === "other"		) {
								
								echo esc_url(home_url( '/kaitori/'.$parent_term_slug.'/'.$child_term_slug.'/' ));
							} else{
								echo esc_url(home_url( '/kaitori/'.$parent_term_slug.'/'.$child_term_slug.'/'.$grand_child_term_slug ));
							}
						?>
					">
						<?php echo esc_html( $grand_child_term_name );?>買取
					</a>
				</p>
			<?php endif;?>
          </div>
        </div>

				<?php if(trim(get_field('買取価格'))):?>
				<div class="blog-flex-item">
					<h3 class="detail-column-ttl">買取参考価格</h3>
					<div class="blog-detail-list-border">
						<p><?php echo number_format(get_field('買取価格'));?>円</p>
					</div>
				</div>
				<?php endif;?>

      </section>



      <section class="detail-column">
        <h2 class="blog-detail-ttl"><span>買取店舗</span></h2>
        <div class="blog-flex-item">
          <h3>買取した時期</h3>
          <div class="blog-detail-list-border">
            <p><?php echo get_the_date('Y年n月'); ?></p>
          </div>
        </div>
        <div class="blog-flex-item">
          <h3>買取した店舗</h3>
          <div class="blog-detail-list-border">
            <p><?php 
							$terms_area = get_the_terms($post->ID,'area');
							foreach ($terms_area as $term) { //親ターム取得
								if ($term->parent === 0) {
									$parent_area_name = $term->name;
									$parent_area_id = $term->term_id;
									$parent_area_slug = $term->slug;
								}
							}
				
							foreach ($terms_area as $term) { //子ターム取得
								if ($term->parent === $parent_area_id) {
									$child_area_name = $term->name;
									$child_area_id = $term->term_id;
									$child_area_slug = $term->slug;
								}
							}

							foreach ($terms_area as $term) { //孫ターム
								if ($term->parent === $child_area_id) {
									$grand_child_area_name = $term->name;
									$grand_child_area_link = esc_url(get_term_link($term));
									$grand_child_area_slug = $term->slug;
								}
							}
							
							
							
							
							$hinmoku_shop = '';
							
							if($parent_term_slug == 'gold' || $child_area_slug == 'gold'){
								
								$hinmoku_shop = '/kaitori/gold';
								
							}else if($parent_term_slug == 'diamond'  || $child_area_slug == 'diamond' ){
							
								$hinmoku_shop = '/kaitori/diamond';
						
							}else if($parent_term_slug == 'letter-top' || $child_area_slug == 'letter-top' ){
								
								$hinmoku_shop = '/kaitori/letter-top';	
								
							}else if($parent_term_slug == 'jewelry'  || $child_area_slug == 'jewelry' ){
								
								$hinmoku_shop = '/kaitori/jewelry';
								
							}else if($child_term_slug == 'rolex-top' || $parent_term_slug == 'rolex-top'){
								
								$hinmoku_shop = '/kaitori/tokei/rolex-top';
								
							}else if($child_term_slug == 'vuitton'  || $parent_term_slug == 'vuitton'){

								$hinmoku_shop = '/kaitori/brand/vuitton';
							
							}
							
							
							if($child_area_slug == 'douou' || $child_area_slug == 'honto'){ 
							
								$child_area_slug = '/';
							
							}else{
								
								$child_area_slug = '/'.$child_area_slug.'/';
								
							}
							
							
							
							
							
							$current_shop_url = esc_url(home_url( $hinmoku_shop.'/shop/'.$parent_area_slug.$child_area_slug.$grand_child_area_slug.'/' ));
							
							
							echo esc_html($child_area_name);
							?>
							<br>
							<a href="<?php echo $current_shop_url;?>"><?php
								echo esc_html($grand_child_area_name);
							?></a>
						</p>
          </div>
        </div>
      </section>

	<?php
		}
	?>




			<?php if(get_field('買取査定ポイント')):?>
			<section class="blog-comment">
				<h3 class="blog-detail-ttl"><span>買取・査定のポイント</span></h3>
				<p><?php the_field('買取査定ポイント');?></p>
			</section>
			<?php endif;?>

			<?php if(get_field('担当者からのコメント')):?>
			<section class="blog-comment">
				<h3 class="blog-detail-ttl"><span>買取・査定担当者からのコメント</span></h3>
				<p><?php the_field('担当者からのコメント');?></p>
			</section>
			<?php endif;?>


			<?php if(get_field('買取商品について')):?>
			<section class="blog-comment">
				<h3 class="blog-detail-ttl"><span>買取商品について</span></h3>
				<p><?php the_field('買取商品について');?></p>
			</section>
			
			<?php endif;?>



<?php
	if($terms[0]->slug !== 'tokei-repair' ){
?>
	
	
    <section class="real-time pb-0">
      <div class="section-inner">
        <h2 class="section-ja-title" style="padding-left:0; padding-right:0;">最新の関連商品買取実績</h2>
      
<?php

	$tax_query_terms = $terms_count === 3 ? $grand_child_term_slug : $child_term_slug;
	$term_hinmoku_parent_posts = get_posts(array(
		'post_type' => 'blog',
		'posts_perpage' => 8,
		'orderby' => 'date',
		'order' => 'DESC',
		'post__not_in' => array(get_the_ID()),
		'tax_query' => array(
			array(
				'taxonomy' => 'hinmoku',
				'field' => 'slug',
				'terms' => $tax_query_terms,
				'operator' => 'IN'
			),
		)
	));

	$count = 1;
?>

        <ul class="blog-archive-list">
		



					<?php 
						foreach($term_hinmoku_parent_posts as $key=>$post):
						

					?>


					<?php
					
						
						$image_alt_title = $post->post_title;
						
						
						$alt_img_arr = explode('を',$post->post_title);
						
						if(isset($alt_img_arr[1] ) && $alt_img_arr[1] == ''){
							
							$alt_img = explode('お',$post->post_title);

							if(isset($alt_img_arr[1] )  && $alt_img[1] !== ''){
							
								$image_alt_title = $alt_img[0];
							
							}
							
						}else{
							
							$image_alt_title = $alt_img_arr[0];
							
						}
						
						$terms_area = get_the_terms($post->ID,'area');

						foreach ($terms_area as $term) {
							if ($term->parent === 0) {
								$parent_area_name = $term->name;
								$parent_area_id = $term->term_id;
								$parent_area_slug = $term->slug;
							}
						}

						foreach ($terms_area as $term) {
							if ($term->parent === $parent_area_id) {
								$child_area_name = $term->name;
								$child_area_id = $term->term_id;
								$child_area_slug = $term->slug;
							}
						}

						foreach ($terms_area as $term) {
							if ($term->parent === $child_area_id) {
								$grand_child_area_name = $term->name;
								$grand_child_area_link = esc_url(get_term_link($term));
								$grand_child_area_slug = $term->slug;
							}
						}

						$current_shop_url = esc_url(home_url( '/shop/'.$parent_area_slug.'/'.$child_area_slug.'/'.$grand_child_area_slug ));



						?>
						
					<li>
						<a href="<?php the_permalink() ?>" class="blog-catch-img">
							<picture>
								<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
									<source type="image/webp" data-srcset="<?php echo $post_thumbnail;?>" srcset="<?php echo $post_thumbnail;?>">
									<img class="blog-detail-img ls-is-cached lazyloaded" src="<?php echo $post_thumbnail;?>" alt="<?php echo $image_alt_title;?>" data-eio="p" data-src="<?php echo $post_thumbnail;?>" decoding="async">
								<?php else:?>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="">
								<?php endif;?>
							</picture>
						</a>
						
						<div class="right">
							<h3 class="blog-archive-ttl">
								<a href="<?php the_permalink() ?>"><?php echo mb_convert_kana(get_the_title(), "rnas"); ?></a>
							</h3>
							<div class="blog-archive-date">公開日：<?php the_time('Y/m/d');?></div>
							<p class="blog-archive-point">

								<?php
					
								if(get_field('買取価格')):?>
								<p class="blog-archive-category">

									<?php
									echo '参考買取価格 : ';
									echo '<span>'.number_format(get_field('買取価格')).'</span>';
									?>

									円
								</p>
								<?php endif;
						
								?>
							</p>
							<ul class="blog-archive-flex">
								<li class="blog-archive-kind">
									<a href="/shop-buy/">店頭買取</a>
								</li>
								<li class="blog-archive-prefecture"><?php echo esc_html($child_area_name);?></li>
								<li class="blog-archive-shop">
									<a href="<?php echo $current_shop_url;?>"><span class="sp-line">ジュエルカフェ&nbsp;</span><?php echo esc_html($grand_child_area_name);?></a>
								</li>
							</ul>
						</div>

            <div class="text_box sp">
              <input id="trigger<?php echo $count; ?>" class="trigger" type="checkbox">
              <p class="blog-archive-point">
                <?php 
                  if(trim(get_field('買取査定ポイント')) !== ''):
                    the_field('買取査定ポイント');
                  else:
                    continue;
                  endif;
                ?>
              </p>
              <label class="read_more" for="trigger<?php echo $count; ?>"></label>
            </div>

					</li>						

					<?php
					$count++;
					endforeach; ?>
					
					<?php wp_reset_postdata(); ?>
				</ul>

      </div>
    </section>


<?php

	}



			if(isset($grand_child_term_name) && $grand_child_term_name){
				
				$howtosell_title = $grand_child_term_name;
			
			}else if(isset($child_term_name)){
				
				$howtosell_title = $child_term_name;
			
			
			}else if($parent_term_name){
			
				$howtosell_title = $parent_term_name;
			
			}
			
			
			

	
	if( isset($grand_child_area_slug) &&  $grand_child_area_slug !== '' ){

		$Voice_slug = $grand_child_area_slug;

	}else{
		
		$Voice_slug = isset($child_area_slug) ? $child_area_slug : '';

	}


$args = array(
    'name' => $Voice_slug,
    'post_type' => 'shop', // 기본 post 타입을 조회합니다. 다른 post type을 조회할 경우 변경하세요.
    'post_status' => 'publish',
    'numberposts' => 1
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();

		$Voice_post_id = get_the_ID();
		
		
    }
} 


*/

?>



      </div>

      <?php get_template_part( 'template-parts/common-tab' );?>

    </div>


<?php /* ↓ 構造化データマークアップの更新日は公開日より新しいときに表示する */ ?>
<script type="application/ld+json">
	{
		"@context": "https://schema.org/",
		"@type": "WebPage",
		"name": "<?php the_title(); ?>",
		"datePublished": "<?php echo get_the_date('Y-m-d H:i:s'); ?>"
<?php
$dateA = get_the_date('Y-m-d H:i:s');
$dateB = $dateOnly;

$dateTimeA = new DateTime($dateA);
$dateTimeB = new DateTime($dateB);

if ($dateTimeA < $dateTimeB) :?>
	,"dateModified" : "<?php echo $dateB;?>"
<?php endif;?>
	}
</script>

<?php /* ?>パンくずリスト
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "金・ブランド品・時計の買取ならジュエルカフェ",
        "item": "https://jewel-cafe.jp/"
      },{
        "@type": "ListItem",
        "position": 2,
        "name": "<?php echo $parent_term_name; ?>買取",
        "item": "https://jewel-cafe.jp/kaitori/<?php echo $parent_term_slug; ?>/"
      },{
        "@type": "ListItem",
        "position": 3,
        "name": "<?php echo $child_term_name; ?>買取",
        "item": "https://jewel-cafe.jp/kaitori/<?php echo $parent_term_slug; ?>/<?php echo $child_term_slug; ?>/"
      },<?php if($grand_child_term_slug):?>{
		"@type": "ListItem",
		"position": 4,
		"name": "<?php echo $grand_child_term_name; ?>買取",
<?php if($grand_child_term_slug === "other-vuitton"):?>
		"item": "https://jewel-cafe.jp/kaitori/<?php echo $parent_term_slug; ?>/<?php echo $child_term_slug; ?>/"
<?php else:?>
		"item": "https://jewel-cafe.jp/kaitori/<?php echo $parent_term_slug; ?>/<?php echo $child_term_slug; ?>/<?php echo $grand_child_term_slug; ?>/"
<?php endif;?>
      },<?php endif;?>{
        "@type": "ListItem",
<?php if($grand_child_term_slug):?>
		"position": 5,
<?php else:?>
		"position": 4,
<?php endif;?>
		"name": "<?php the_title( ); ?>"
      }]
    }
</script>
<?php */ ?>

<?php get_footer( );?>
