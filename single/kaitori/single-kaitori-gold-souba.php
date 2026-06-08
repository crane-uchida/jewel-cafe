<?php
/*
Template Name: 品目詳細ページ 金 専用
*/
?>

<?php get_header();?>

<script type="application/ld+json">
	{
		"@context": "https://schema.org/",
		"@type": "WebPage",
		"name": "<?php the_title(); ?>",
		"datePublished": "2012-03-11",
		"dateModified": "<?php echo date('Y-m-d');?>"
	}
</script>

<?php /*
<script type="application/ld+json">
	{
		"@context" : "https://schema.org/",
		"@type": "Product",
		"@id": "kaitori",
		"@brand": "",
		"@sku": "",
		"name": "<?php the_title(); ?>",
		"description": "<?php echo strip_tags(get_the_content());?>",
		"review": {
			"@type": "Review",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8",
				"bestRating": "5"
			},
			"author": {
			"@type": "Person",
			"name" : "jewelcafe_user"
			}
		},
		"aggregateRating": {
			"@type": "AggregateRating",
			"ratingValue": "4.8",
			"reviewCount": "47"
		}
	}
</script>
*/ ?>



<?php


$today_sql = "select * from `wp_goldchart` ORDER BY `wp_goldchart`.`id` DESC limit 0,2";

$today_result = $wpdb->get_results($today_sql);




	$getgoldcoment =  GetGoldComent();
	



	$field = get_fields( $post->ID );

	if ( $field ) {
		foreach ( $field as $name => $value ) {

			$singel_fields[$name] = $value;

		}
	}
	
	$singel_fields['post_id'] = $post->ID;
	
	$singel_fields['custom_title'] = get_post( $post->ID )->post_title;


?>





<link rel="stylesheet" href="/wp-content/themes/jewelcafe_replace/assets/css/new-style.css"/>




	<div id="page-top"></div>
			<div class="main-section">

				<section class="breadcrumbs_type2">
					<style>
						.breadcrumbs_type2{
							.breadcrumbs{
								background:none;
								margin-bottom:0;
								padding: 0px 0 7px;
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
<div class="breadcrumbs" bis_skin_checked="1">
	<div class="section-inner" bis_skin_checked="1">
		<a href="/">最新相場で高価買取ならジュエルカフェ<span></span></a>
		<a href="/kaitori/gold/">金・貴金属買取<span></span></a>
		<span>金相場買取</span><span>今日の金価格・1gあたりの金相場</span></div>
</div>
				</section>



				<div class="only-pc">
					<div>
						<?php $image_fv_pc = get_field('fv_image_pc'); if(!empty($image_fv_pc)):?>
							<div><img src="<?php echo esc_url($image_fv_pc['url']);?>" alt="" ></div>
						<?php endif;?>
					</div>
				</div>
				<div class="only-sp">
					<div>
						<?php $image_fv_sp = get_field('fv_image_sp'); if(!empty($image_fv_sp)):?>
							<div><img src="<?php echo esc_url($image_fv_sp['url']);?>" alt="" ></div>
						<?php endif;?>
					</div>
				</div>
			</div>


			<section class="kaitori-method red_bg">
				<?php get_template_part( 'template-parts/common-kaitori-method' );?>		
			</section>


			<section class="kaitori-intro section-inner mt-40">
				<h1 class="intro-title color-red">
					今日の1gあたりの金相場
				</h1>
			</section>
			

			<div class="mt-40">
				<?php get_template_part('template-parts/market-price-chart-gold' , null , $getgoldcoment); ?>
			</div>


	

			<section class="kaitori-kinds">

				<div class="section-inner bold ta-c">
				
					<h2 class="section-ttl-main bold"> <?php the_title(); ?>なら<br class="only-sp">どんなものでもお持ちください!</h2>
				
				</div>


				<div class="section-inner">
					<ul class="kaitori-kinds-list">




						<?php 
						
		
						if($post->post_parent === 0 || isset($kaitori_area_parent_id)): //親ページ、または品目-都道府県ページの処理

							$current_hinmoku_term = get_the_terms( $post->ID, 'hinmoku' );
							if($kaitori_area_parent_id){
								$post_id = $kaitori_area_parent_id;
							}else{
								$post_id = $post->ID;
							}
							
						
							
							$args = array(
								'post_type' => 'kaitori',
								'posts_per_page' => -1,
								'post_parent' => $post_id,
								'no_found_rows' => true,
								'order' => 'ASC',
								'orderby' => 'menu_order',
								'tax_query' => array(
									array(
										'taxonomy' => 'area',
										'field' => 'slug',
										'terms' => array('okinawa', 'kanto', 'kansai', 'hokkaido', 'tohoku', 'hokuriku', 'chubu', 'chugoku', 'shikoku', 'kyusyu'),
										'operator' => 'NOT IN'
									)
								)
							);
							$the_query = new WP_Query($args); if($the_query->have_posts()):
							?>
							<?php while($the_query->have_posts()): $the_query->the_post();?>

								<?php
									
									if($post->post_name == 'shop'){ continue; }
								
									$type_display = get_field('type_display', get_the_ID());

									if($type_display[0] == '1' || get_the_ID() == 87115){continue;}
								
								?>



								<li>
									<a href="<?php the_permalink();?>">
										<div class="kaitori-kinds-img ta-c">
											<?php the_post_thumbnail( 'full' );?>
										</div>
										<div class="kaitori-kinds-label ta-c">
											<h3><?php the_title();?></h3>
										</div>
									</a>
								</li>
							<?php
								endwhile;
								wp_reset_postdata(  );
								endif;
							?>
							
							
							
							
							
						<?php else:?>
	
							<?php
							
							
							
								$children_args = array(
									'post_parent'=> $post->ID,
									'post_type'  => 'kaitori'
								);

								if(!count(get_children($children_args)) && !isset($grand_child_terms_slug)): //子ページかつ最下層の処理

								//get_post($parent_id)


							?>
								<?php
								$args = array(
									'post_type' => 'kaitori',
									'posts_per_page' => -1,
									'post__not_in' => array($post->ID),
									'post_parent' => $post->post_parent,
									'no_found_rows' => true,
								);
								$the_query = new WP_Query($args); if($the_query->have_posts()):
								?>
								<?php while($the_query->have_posts()): $the_query->the_post();?>

								<?php
									$type_display = get_field('type_display', get_the_ID());

									if(isset($type_display[0]) && $type_display[0] == '1'){continue;}
								?>

									<?php
										$thumb = get_the_post_thumbnail($post->ID,'full');

										if(trim($thumb) !==''){
									?>

									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-img ta-c">
												<?php the_post_thumbnail( 'full' );?>
											</div>
											<div class="kaitori-kinds-label ta-c">
												<h3><?php the_title();?></h3>
											</div>
										</a>
									</li>
								<?php
										}

									endwhile;
									wp_reset_postdata(  );
									endif;
								?>
							<?php //孫ページがある子ページ
								elseif(count(get_children($children_args)) > 0):
								$args = array(
									'post_type' => 'kaitori',
									'posts_per_page' => -1,
									'post_parent' => $post->ID,
									'no_found_rows' => true,
									'order' => 'ASC',
									'orderby' => 'menu_order'
								);
								$the_query = new WP_Query($args); if($the_query->have_posts()):
								?>
								<?php while($the_query->have_posts()): $the_query->the_post();?>

								<?php
									$type_display = get_field('type_display', get_the_ID());

									if($type_display[0] == '1'){continue;}
								?>


									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-img ta-c"><?php ?>
												<?php the_post_thumbnail( 'full' );?>
											</div>
											<div class="kaitori-kinds-label ta-c">
												<h3><?php the_title();?></h3>
											</div>
										</a>
									</li>
								<?php
									endwhile;
									wp_reset_postdata(  );
									endif;
								?>
							<?php
								else: //孫ページの場合
								$args = array(
									'post_type' => 'kaitori',
									'posts_per_page' => -1,
									'post__not_in' => array($post->ID),
									'post_parent' => $wp_obj->post_parent,
									'no_found_rows' => true,
								);
								$the_query = new WP_Query($args); if($the_query->have_posts()):
								?>
								<?php while($the_query->have_posts()): $the_query->the_post();?>

								<?php
									$type_display = get_field('type_display', get_the_ID());

									if($type_display[0] == '1'){continue;}
								?>
									<li>
										<a href="<?php the_permalink();?>">
											<div class="kaitori-kinds-img ta-c">
												<?php the_post_thumbnail( 'full' );?>
											</div>
											<div class="kaitori-kinds-label ta-c">
												<h3><?php the_title();?></h3>
											</div>
										</a>
									</li>
								<?php
									endwhile;
									wp_reset_postdata(  );
									endif;
								?>
							<?php endif;?>
						<?php endif;?>
					</ul>
				</div>
			</section>




			
			
			<section class="kaitori-souba section-inner mt-40">
			
			<?php
				/*
			?>
				<h2 class="gold-sb-title">
					<?php echo nl2br(get_option('souba_title')); ?>
				</h2>
			<?php
				*/
			?>


			<div style="text-align:right; font-size:10px; margin-top:5px;">
				<time datetime="<?php the_time('c'); ?>" itemprop="dateCreated datePublished">公開日：<?php echo get_the_date('Y/m/d'); ?></time>&nbsp;&nbsp;
				<time datetime="<?php echo nl2br(get_option('souba_up_time')); ?>" itemprop="modified">更新日：<?php echo nl2br(get_option('souba_up_time')); ?></time>
			</div><br>
			
				<div class="gold-sb-con">
					<?php echo nl2br(get_option('souba_content')); ?>
				</div>
			
			</section>


			


<?php
$con=mysqli_connect("localhost", "xs931070_column", "KJhsadkJHKAS12d", "xs931070_newcolumn");


if(mysqli_connect_errno()){

	echo "Connection Fail".mysqli_connect_error();

}


//  カテゴリに関連付けられた投稿を取得
$category_id = $con->query("SELECT term_id FROM `wp_terms` WHERE slug = 'gold'")->fetch_assoc()['term_id'];

if ($category_id) {
    // "tokei" カテゴリに属する投稿を取得
				$query = "SELECT p.* FROM `wp_posts` p
					INNER JOIN `wp_term_relationships` tr ON p.ID = tr.object_id
					WHERE tr.term_taxonomy_id = $category_id
					AND p.post_status = 'publish' AND p.post_type = 'post'
					ORDER BY p.post_modified DESC LIMIT 8";

    $result = $con->query($query);
    
    $number = 1; 



?>

			
			<section class="kaitori-column mt-40">
			
			<div class="red_bg">
				<div class="section-inner">
				
					<div class="red-bar d-f bold column-title">
						<div class="red-bar-title color-white">
							<h2>
							<?php the_title();?>買取
							
							<?php
								if(is_single('gold') == false){
							?>
							<br class="only-sp">
							<?php
								}
							?>
							
							お役立ちコラム
							</h2>
							
							<br class="only-sp">
							<span class="red-bar-by">by ジュエルカフェ</span>
							
						</div> 
					</div>
				
				</div>
			</div>
			
			



		<section class="more-btn-outer">
			<div class="section-inner kaitori-column-wrapper ">
			

				<div class="d-f ai-c kaitori-column-list">
					
					<?php
					if ($result->num_rows > 0) {
						
						while ($row = $result->fetch_assoc()) {
					?>
					
						<div class="d-f ai-t kaitori-column-content">

							<div class="kaitori-column-img">
							
							<?php
							
								$thumbnail_id = $con->query("SELECT * FROM `wp_postmeta` where post_id = '{$row['ID']}'  and meta_key = '_thumbnail_id'")->fetch_assoc()['meta_value'];

								if($thumbnail_id > 0 ){
									
									$thumbnail_src = $con->query("SELECT * FROM `wp_posts` where ID = {$thumbnail_id}")->fetch_assoc()['guid'];
									
									
									echo '<td><img src="'.$thumbnail_src.'" alt="'.get_the_title().'" ></td>';
						
								}else{
									
									echo '<img src="'. esc_url(get_template_directory_uri()). '/assets/images/common/mascot.svg" alt="">';
									
								}			
												
							?>
			
							</div>
							
							
							
							<div class="kaitori-info">
				
								<div class="kaitori-ttl color-black bold mb-4">

									<h3>
									
										<a href="/column/<?php echo $post->post_name;?>/<?php echo $row['post_name'];?>/" >
									
										<?php 
											
											
											if ( wp_is_mobile() ) {
																								
												echo mb_substr($row['post_title'],0, 30, 'UTF-8');
												
												if(strlen($row['post_title']) > 25){
													
													echo '...';
													
												}
											
											}else{
												
												echo mb_substr($row['post_title'],0, 190, 'UTF-8');
												
					
												if(strlen($row['post_title']) > 170){
													
													echo '...';
													
												}
												
											}
											

										
										?>
										
										</a>
										
									</h3>
									
								</div>
								<div class="kaitori-txt color-black">
									<a href="/column/<?php echo $post->post_name;?>/<?php echo $row['post_name'];?>/" class="kaitori-column-btn">コラムを読む&nbsp;></a>
								</div>
							</div>
							
						</div>
					<?php
							}
						}
						
}
					?>
				</div>

				</div>

	
				<div class="more-btn only-sp ta-c">
					<p class="open">もっと見る</p>
				</div>

			</section>
			
			
			
			</section>
	






			
			<?php get_footer();?>
