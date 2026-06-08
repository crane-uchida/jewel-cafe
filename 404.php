<?php 
/*
Template Name: 404
*/
?>

<?php get_header( );?>

<div id="page-top"></div>

	<div class="section-inner">
		<h1 class="ttl-404">
			<img class="ttl-404-icon" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/mascot.svg" alt="">
			お探しのページは見つかりませんでした
		</h1>

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