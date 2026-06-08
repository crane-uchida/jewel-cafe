<?php
/*
Template Name: お知らせブログ
*/
?>

<?php get_header( );?>

<style>
	.footer-txt{display:none;}
</style>


<div id="page-top"></div>
	<div class="breadcrumbs">
		<div class="section-inner">
			<a href="<?php echo esc_url( home_url() );?>">TOP<span></span></a>
			<a href="<?php echo esc_url(get_post_type_archive_link(get_post_type()));?>">お知らせ<span></span></a>
			<span><?php the_title();?></span>
		</div>
	</div>

	<section id="news">
		<div class="section-inner">
			<p class="blog-detail-date"><span class="news">お知らせ</span><?php echo get_the_date('Y.n.d'); ?></p>
			<h1 class="blog-detail-title"><?php the_title();?></h1>
	<?php /* ?>
				<?php if($post_thumbnail = get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'blog-detail-img ' ) )):?>
					<?php echo $post_thumbnail; ?>
				<?php else:?>
					<img class="blog-detail-img" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="ジュエルぐま">
				<?php endif;?>
	<?php */ ?>
			<section class="blog-comment">
				<?php the_content();?>
			</section>

	<?php /* ?>
		<section class="blog-search-shop">
			<h2 class="ttl-box-red">お近くのジュエルカフェ店舗を探す</h2>
			<p>商品知識豊富な女性スタッフと、ご来店からお支払いまで最短10分のスピード査定!スピード重視・ご相談重視なら来店買取がオススメです！</p>
		</section>

				<div class="search-shop" data-uniq-id="609bb70d69163">
			<?php get_template_part( 'template-parts/search-shop' );?>
		</div>

		<?php get_template_part( 'template-parts/common-tab' );?>
	<?php */ ?>
		</div>
	</section>

<?php get_footer( );?>
