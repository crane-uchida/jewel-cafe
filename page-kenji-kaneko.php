<?php get_header();?>

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

	
<section class="author">
	<div class="section-inner">
		<h1 class="title">〈専門家による今日の金相場解説〉<br>筆者紹介</h1>
	</div>
	<h2 class="name_area section-inner">
		<div class="section-inner">
			<div class="name">金子 賢司 さん<span class="job">ファイナンシャルプランナー</span></div>
		</div>
	</h2>
	<div class="section-inner">
		<div class="flex">
			<div class="image_box">
				<div class="image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/kenji-kaneko.jpg"></div>
				<div class="sns_flex pc">
					<a href="https://twitter.com/NICE4611" target="_blank"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon/jewelcafe_x.png" alt="" style="width:35px;" height="35">X</a>
					<a href="https://fp-kane.com/" target="_blank"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon_hp.svg" alt="" style="width:35px;" height="35">HP</a>
					<a href="https://kane4611.xsrv.jp/" target="_blank"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon_blog.svg" alt="" style="width:35px;" height="35">Blog</a>
				</div>
			</div>
			<div class="text_box">
				<p class="text">東証一部上場企業（現在は東証スタンダード市場）で10年間サラリーマンを務めるなか、業務中の交通事故をきっかけに企業の福利厚生に興味を持ち、社会保障の勉強を始める。以降ファイナンシャルプランナーとして活動し、個人・法人のお金に関する相談、北海道のテレビ番組のコメンテーター、年間毎年約100件のセミナー講師なども務める。趣味はフィットネス。健康とお金、豊かなライフスタイルを実践・発信している。</p>
				<hr>
				<h3 class="text2">略歴</h3>
				<p class="text">1998年：立教大学 法学部法学科 卒業<br>1998年：株式会社菱食（現：三菱食品株式会社）<br>2007年：三井住友海上きらめき生命保険（現：三井住友海上あいおい生命）<br>2009年：日本興亜損保（現：損保ジャパン）<br>現在はファイナンシャルプランナーとして独立し、セミナーや執筆活動、個人相談業務を手掛けている。</p>
				<h3 class="text2">保有資格・実績</h3>
				<h4 class="text3">CFP®資格</h4>
				<p class="text4">CFP®資格は、北米、アジア、ヨーロッパ、オセアニアを中心に世界25カ国・地域（2024年2月現在）で導入されている、「世界が認めるプロフェッショナルFPの証」で、FPの頂点とも言えるものです。原則として一国一組織により資格認定が行われており、日本においては日本FP協会が認定しています。</p>
			</div>
		</div>
		<div class="sns_flex sp">
			<a href="https://twitter.com/NICE4611" target="_blank"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon/jewelcafe_x.png" alt="" style="width:35px;" height="35">X</a>
			<a href="https://fp-kane.com/" target="_blank"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon_hp.svg" alt="" style="width:35px;" height="35">HP</a>
			<a href="https://kane4611.xsrv.jp/" target="_blank"><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon_blog.svg" alt="" style="width:35px;" height="35">Blog</a>
		</div>
	</div>
</section>


<?php get_footer(); ?>



