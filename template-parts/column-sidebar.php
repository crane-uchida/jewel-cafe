<aside class="right">

	<div class="inner">
	<div class="category_box">

		<div class="ttl">カテゴリー</div>
		<ul class="list">

    <?php
  		$args = array( // WP_Queryのパラメータを指定
  			'post_type' =>'column',
			'posts_per_page' => -1,
			'post_parent' => 0
  		);
  		$query = new WP_Query( $args ); // WP_Queryのオブジェクト（インスタンス）を作成
  		while ( $query->have_posts() ) : // ループ開始
  			$query->the_post(); // サブループの投稿データをセット
  	?>

              <li>
                  <a class="category-ttl" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </li>

	<?php
	endwhile; // ループ終了
	wp_reset_postdata(); // メインクエリの投稿データに戻す
	?>


		</ul>
		</div>
		






		<div class="related_box">
				<div class="ttl">こちらの記事も読まれています！</div>
				<ul class="list">
					<li>
					<a href="<?php echo esc_url(home_url('kaitori/tokei')); ?>">
					<article class="item">
						
							<div class="thumb"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/column/tokei_soba_link.jpg" alt="【最新版】人気ブランド時計の買取相場一覧"></div>
							<div class="ttl">【最新版】人気ブランド時計の買取相場一覧</div>
						
					</article>
					</a>
</li>

<?php if(has_term('gold','hinmoku')): ?>
	<?php $id = array(8386,11312,11294,8350,8388);?>
	<?php if(in_array($post->ID, $id)): //$idの配列の中に現在の記事ID（$post->ID）が含まれている場合 ?>
		<?php
			$id = array_diff($id, array($post->ID)); //現在の記事ID（$post->ID）を削除する
			$id = array_values($id); //indexを詰める
			$id[] = '8348'; //配列の最後に要素を追加
		?>
	<?php endif; ?>
<?php elseif(has_term('brand','hinmoku')): ?>
	<?php $id = array(50321,11539,11660,11422,8338);?>
	<?php if(in_array($post->ID, $id)): ?>
		<?php
			$id = array_diff($id, array($post->ID));
			$id = array_values($id);
			$id[] = '11672';
		?>
	<?php endif; ?>
<?php elseif(has_term('tokei','hinmoku')): ?>
	<?php $id = array(8338,11672,8338,8372,8370);?>
	<?php if(in_array($post->ID, $id)): ?>
		<?php
			$id = array_diff($id, array($post->ID));
			$id = array_values($id);
			$id[] = '8368';
		?>
	<?php endif; ?>
<?php elseif(has_term('jewelry','hinmoku')): ?>
	<?php $id = array(51950,50953,12318,49909,51961);?>
	<?php if(in_array($post->ID, $id)): ?>
		<?php
			$id = array_diff($id, array($post->ID));
			$id = array_values($id);
			$id[] = '8386';
		?>
	<?php endif; ?>
<?php elseif(has_term('diamond','hinmoku')): ?>
	<?php $id = array(51950,50953,12318,49909,51961);?>
	<?php if(in_array($post->ID, $id)): ?>
		<?php
			$id = array_diff($id, array($post->ID));
			$id = array_values($id);
			$id[] = '8386';
		?>
	<?php endif; ?>
<?php elseif(has_term('card','hinmoku')): ?>
	<?php $id = array(50900,52831,8386,11672,11429);?>
	<?php if(in_array($post->ID, $id)): ?>
		<?php
			$id = array_diff($id, array($post->ID));
			$id = array_values($id);
			$id[] = '11539';
		?>
	<?php endif; ?>
<?php elseif(has_term('letter','hinmoku')): ?>
	<?php $id = array(50945,53432,66089,11672,11429);?>
	<?php if(in_array($post->ID, $id)): ?>
		<?php
			$id = array_diff($id, array($post->ID));
			$id = array_values($id);
			$id[] = '11539';
		?>
	<?php endif; ?>
<?php elseif(has_term('osake','hinmoku')): ?>
	<?php $id = array(50930,54777,8386,11672,11429);?>
	<?php if(in_array($post->ID, $id)): ?>
		<?php
			$id = array_diff($id, array($post->ID));
			$id = array_values($id);
			$id[] = '11539';
		?>
	<?php endif; ?>
<?php elseif(has_term('kimono','hinmoku')): ?>
	<?php $id = array(58462,65516,8386,11672,11429);?>
	<?php if(in_array($post->ID, $id)): ?>
		<?php
			$id = array_diff($id, array($post->ID));
			$id = array_values($id);
			$id[] = '11539';
		?>
	<?php endif; ?>
<?php else: ?>
	<?php $id = array(8386,11672,11429,11539,8360);?>
<?php endif; ?>

<?php if(strpos(get_the_title(),'偽物')): //タイトルに偽物が含まれていた場合 ?>
	<?php $id = array(8386,11672,8338,11539,51950); //偽物の記事を並べる ?>
	<?php if(in_array($post->ID, $id)): ?>
		<?php
			$id = array_diff($id, array($post->ID));
			$id = array_values($id);
			$id[] = '8360';
		?>
	<?php endif; ?>
<?php endif; ?>

					<?php
						$postID = get_the_ID();
						$arg   = array(
							'exclude' => $postID,
						  'posts_per_page' =>5, // 表示する件数
						//    'orderby' => 'rand', // ランダム
						//    'orderby'        => 'date',
						//    'order'          => 'desc',
						  'post_type' => 'column',
							'post__in' => $id,
							'orderby' => 'post__in', //指定した順番通りに並べる
						//    'category_name' => 'tokei-kaitori',
						//    'tag'            => 'gold' // 表示したいタグのスラッグを指定（金買取）
						);
						$posts = get_posts( $arg );
						if ( $posts ):
					?>
					<?php
						foreach ( $posts as $post ) :
						setup_postdata( $post );
					?>
<li>
<a href="<?php the_permalink(); ?>">
					<article class="item">
						
							<div class="thumb">
								<?php //the_post_thumbnail('full'); ?>
								
							<?php if($post_thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' )):?>
							
							<img src="<?php echo $post_thumbnail;?>" alt="<?php the_title();?>">
							
						<?php else:?>
							<img class="blog-detail-img" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="ジュエルぐま">
						<?php endif;?>
								
							</div>
							<div class="ttl"><?php the_title(); ?></div>
						

					</article>
					</a>
						</li>

					<?php endforeach; ?>
					<?php
					endif;
					wp_reset_postdata();
					?>

				</ul>
				</div>










		

	</div>

</aside>