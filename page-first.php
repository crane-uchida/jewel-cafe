<?php get_header( );?>

<link href="<?php echo esc_url(get_template_directory_uri());?>/assets/css/page-trip-buy.css" rel="stylesheet">

<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/post-ajax.js"></script>

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








	
    <div class="main-section only-sp">
      <a href="/campaign/">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shop/shop-top-bnr.jpg" class="mb-12 " alt="来店予約&ROLEXお買取成立で¥20,000キャッシュバック">
      </a>
    </div>

    <div class="section-inner">
      <section class="static-catch">
        <h1 class="section-ja-title">初めての方へ</h1>
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/first-video.jpg" class="w-100per " alt="買取スタッフ">
		<div class="ttl-text">
			<h2 class="static-sub-ttl mt-20">国内外300店舗以上展開する<br class="only-sp">業界屈指の超大型店。<br>カフェのように気軽に入れる、<br class="only-sp">フレンドリーな店舗が自慢です。</h2>
			<div class="ttl-text mb-20 f16">北海道から沖縄まで、大型ショッピングセンターを中心に展開してきたジュエルカフェは、主婦の方を中心に<br>毎日たくさんのお客様にご利用いただいています。</div>
		</div>
      </section>

      <section>
        <h3 class="ttl-box-red ta-c f20">ジュエルカフェのサービス</h3>
			<div class="ttl-text">
				<div class="lh-20">買取を身近なものに。気軽に足を運べる空間に。</div>
				<div class="lh-20">ジュエルカフェは貴金属・ブランド品・時計などのラグジュエアリーアイテムを中心に、</div>
				<div class="lh-20">金券や切手、化粧品や骨董品まで、お客様からのニーズの多いお品物を「かんたん高価買取」させていただく専門店です。</div>
				<div class="lh-20">お客様にご満足いただける買取価格はもちろんのこと、</div>
				<div class="lh-20 bold">「カフェのような空間で初めてのお客様でもご来店しやすい」</div>
				<div class="lh-20 bold">「女性スタッフによるきめ細やかで優しい接客」</div>
				<div class="lh-20 bold">「無料ジュエリークリーニングやサービスチケットなど嬉しい特典」</div>
				<div class="lh-20">など、他店にはないサービスをご用意し、特に女性のお客様からご好評をいただいています。</div>
				<div class="lh-20">買取価格でも、居心地のよい空間でも、ジュエルカフェは「買取」をどこまでも身近な存在にするために努めてまいります。</div>
			</div>
      </section>

<style>
.tll-text{text-align:left;}
.kaitori-policy .policy-item{margin-bottom:10px;margin-top:35px;align-items:center;}
.ttl-text{font-size:13px;}
.takuhaiSyuttyouKaitori>.left .head>.left{width:38%;}
.takuhaiSyuttyouKaitori>.right .head>.left{width:38%;}
.takuhaiSyuttyouKaitori>.left .head .right .kaitoriName{font-size:31px;text-align:left;}
.takuhaiSyuttyouKaitori>.right .head .right .kaitoriName{font-size:31px;text-align:left;}
.tentouKaitori .right .kaitoriName{font-size:31px;text-align:left;}
.tentouKaitori .right .txt1{font-size:14px;line-height:1.6;margin-top:10px;font-weight:normal;}
.takuhaiSyuttyouKaitori>.left .head .right .txt1{font-size:14px;line-height:1.6;margin-top:10px;text-align:left;}
.takuhaiSyuttyouKaitori>.right .head .right .txt1{font-size:14px;line-height:1.6;margin-top:10px;text-align:left;}
.takuhaiSyuttyouKaitori>.left .head{align-items:center;}
.takuhaiSyuttyouKaitori>.right .head{align-items:center;}
@media (min-width: 1000px) {
	.kaitori-policy .policy-item{margin-bottom:35px;}
	.kaitori-policy .policy-item{align-items:flex-start;}
	.takuhaiSyuttyouKaitori>.left .head>.left{width:200px;}
	.takuhaiSyuttyouKaitori>.right .head>.left{width:200px;}
	.tentouKaitori .right .kaitoriName{font-size:42px;text-align:left;}
	.takuhaiSyuttyouKaitori>.left .head .right .kaitoriName{font-size:42px;text-align:left;}
	.takuhaiSyuttyouKaitori>.right .head .right .kaitoriName{font-size:42px;text-align:left;}
	.tentouKaitori .right .txt1{font-size:18px;line-height:1.6;}
	.takuhaiSyuttyouKaitori>.left .head .right .txt1{font-size:18px;line-height:1.6;}
	.takuhaiSyuttyouKaitori>.right .head .right .txt1{font-size:18px;line-height:1.6;}
	.ttl-text{text-align:center;font-size:15px;}
	.common-shops .f20{font-size:20px;}
	.common-shops .f18{font-size:18px;}
}
</style>


	<section class="purchase">
		<?php get_template_part( 'template-parts/common-purchase-item' );?>
	</section>
	<section class="common-shops mb-20">
		<div class="section-inner mb-40">
			<?php get_template_part( 'template-parts/search-shop-new' );?>
		</div>
	</section>
	<section class="ta-c">
		<?php get_template_part( 'template-parts/shop-how-to-sell' );?>
	</section>
	<?php get_template_part( 'template-parts/common-tab' );?>
</div>

<?php get_footer( );?>