<?php get_header();

$shop_name = 'ジュエルカフェ 松江学園通り店';
$shop_tel = '0852-67-7062';
$shop_time = '10:00 - 19:00';
$shop_id = '104954';
?>



<link href="<?php echo get_stylesheet_directory_uri();?>/assets/css/tokei-repair.css" rel="stylesheet" type="text/css">
<link media="screen and (max-width: 767px)" href="<?php echo get_stylesheet_directory_uri();?>/assets/css/tokei-repair_sp.css" rel="stylesheet">
<script>
	$('.shop-detail.wrap-inner').removeClass('shop-detail');
</script>


<div class="shop-detail">
<div class="breadcrumbs">
    <div class="section-inner" style="font-size:12px;">
        <a href="https://jewel-cafe.jp">TOP<span></span></a>
        <a href="https://jewel-cafe.jp/shop">店舗案内<span></span></a>
        <a href="https://jewel-cafe.jp/shop/chugoku/">中国<span></span></a>
        <a href="https://jewel-cafe.jp/shop/chugoku/shimane/">島根県<span></span></a>松江学園通り店
    </div>
</div>
</div>

<?php /* ?>
<?php 

    $parent_post = get_post( $post->post_parent );
    $shop_info = get_shop_info( $parent_post->post_name );
	
	
	get_template_part( 'template-parts/shop-parent-detail2' , null , $shop_info);?>
<?php */ ?>




<div class="tokei-repair-slider">
  <div class="swiper-wrapper">
    <div class="swiper-slide slide1">
		<div class="main-b-wrap">
			<?php
				$month = date('n'); // 今月の数値（1〜12）
				$extra_class = ($month >= 10 && $month <= 12) ? 'double-digit' : '';
			?>
			<div class="image01">
				<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/main02.png"></figure>
				<span class="overlay-text <?php echo $extra_class; ?>">
					<?php echo $month; ?>
				</span>
			</div>
		</div>
	</div>
    <div class="swiper-slide slide2">
		<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/slider1_pc.jpg"></figure>
	</div>
  </div>
  <div class="swiper-pagination"></div>
<?php /* ?>
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
<?php */ ?>
</div>


<script>
const swiper = new Swiper('.tokei-repair-slider', {
  loop: true,
  spaceBetween: 0,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },

  // ページネーション
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },

  // ナビゲーション
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  breakpoints: {
    0: {            // 0px以上（スマホ）
      slidesPerView: 1,      // 1枚表示
      centeredSlides: false, // 両端非表示
    },
    768: {          // 768px以上（タブレット・PC）
      slidesPerView: 1.2,   // 1枚＋両端少し表示
      centeredSlides: true,
    },
	1190: {          // 1190px以上（タブレット・PC）
      slidesPerView: 1.4,   // 1枚＋両端少し表示
      centeredSlides: true,
    },
	1300: {          // 1190px以上（タブレット・PC）
      slidesPerView: 1.7,   // 1枚＋両端少し表示
      centeredSlides: true,
    },
	1600: {          // 1190px以上（タブレット・PC）
      slidesPerView: 2,   // 1枚＋両端少し表示
      centeredSlides: true,
    },
	1900: {          // 1190px以上（タブレット・PC）
      slidesPerView: 2.2,   // 1枚＋両端少し表示
      centeredSlides: true,
    }
  }
});
</script>


<?php /* ?>
<section class="mv">
	<div class="contents">
		<div class="swiper">
			<!-- Additional required wrapper -->
			<div class="swiper-wrapper">
				<!-- Slides -->
				<div class="swiper-slide">
					<picture class="slide">
						<source media="(min-width: 768px)" srcset="<?php echo get_stylesheet_directory_uri() ?>/assets/images/shop/tokei-repair/slider1_pc.jpg">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/slider1_pc.jpg">
					</picture>
				</div>
				<div class="swiper-slide">
					<picture class="slide">
						<source media="(min-width: 768px)" srcset="<?php echo get_stylesheet_directory_uri() ?>/assets/images/shop/tokei-repair/main02.png">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/main02.png">
					</picture>
				</div>
				<div class="swiper-slide">
					<picture class="slide">
						<source media="(min-width: 768px)" srcset="<?php echo get_stylesheet_directory_uri() ?>/assets/images/shop/tokei-repair/slider1_pc.jpg">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/slider1_pc.jpg">
					</picture>
				</div>
				<div class="swiper-slide">
					<picture class="slide">
						<source media="(min-width: 768px)" srcset="<?php echo get_stylesheet_directory_uri() ?>/assets/images/shop/tokei-repair/main02.png">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/main02.png">
					</picture>
				</div>
			</div>
			  <!-- ページネーション -->
  <div class="swiper-pagination"></div>
  <!-- 前後の矢印 -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
		</div>
	</div>
</section>
<?php */ ?>


<div id="repair">
<div class="kind-of-repair-wrap">
	<div class="inner">
		<h1>島根県松江市の腕時計の修理・オーバーホール・電池交換工房</h1>
		<p class="main-txt">思い入れのある大切な時計。この先長く長く愛用するために。誰かに譲り託すために。<br class="br-sp"><?php echo $shop_name;?>はそんな想いにメンテナンスという形でお応えします。<br class="br-sp">保証が切れているもの、購入元がわからないもの、原因不明の故障など、まずはなんでもご相談ください。あなたの大切な品を職人の確かな技術で蘇らせます。</p>
		<div class="box-wrap">
			<div class="box">
				<div class="ribbon4">電池交換</div>
				<div class="box-wrap2">
					<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/kind01.jpg"></figure>
					<p class="txt">電池の切れた状態で放置すると、液漏れや回路の損傷に繋がりますので、早めの交換をおすすめいたします。<br class="br-sp">ほとんどの国産・舶来ブランドにも対応していますので安心してご相談ください。</p>
				</div>
<?php /* ?>
				<div class="details-link"><a href="<?php echo esc_url( home_url( '/repair/changing-battery/' ) ); ?>">> 詳細はこちら</a></div>
<?php */ ?>
				<!-- <p class="more"><a href="#">さらに詳しく</a></p> -->
			</div>
			<div class="box">
				<div class="ribbon4">オーバーホール</div>
				<div class="box-wrap2">
					<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/kind02.jpg"></figure>
					<p class="txt">機械式時計は使用していくうちに内部部品のオイルが劣化するため、3～4年の頻度で清掃・注油をすることでパーツの摩耗を防ぎ、時計の寿命を飛躍的に伸ばすことができます。専門の職人が、細部に渡り丁寧に作業いたします。</p>
				</div>
<?php /* ?>
				<div class="details-link"><a href="#price-list">> 詳細はこちら</a></div>
<?php */ ?>
				<!-- <p class="more"><a href="#">さらに詳しく</a></p> -->
			</div>
			<div class="box">
				<div class="ribbon4">外装修理・研磨</div>
				<div class="box-wrap2">
					<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/kind03.jpg"></figure>
					<p class="txt">ケースやブレスレットを分解し、ひとつひとつの部品を綺麗に磨き上げます。小さな傷はほとんど見えなくなり、購入当時のようなピカピカの状態に。もちろん研磨の具合はお客様のご希望に沿ってひとつひとつ仕上げます。</p>
				</div>

				<p class="txt2">オーバーホール料金に含まれます</p>

				<!-- <p class="more"><a href="#">さらに詳しく</a></p> -->
			</div>
		</div>
	</div>
</div>

<div class="leave-wrap">
	<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/atmosphere_main01.jpg"></figure>
	<p class="txt1">腕時計のオーバーホールなら<br><?php echo $shop_name;?>にお任せください！</p>
	<p class="txt2">時計は、定期的にメンテナンスをして頂く事によって、末永くご愛用頂けるようになります。<br class="br-sp">一般的なクォーツ式で、5～6年に1度、機械式で3～4年に1度を目安にご検討ください。</p>
	<div class="txt3-outer">
		<p class="txt3"><?php echo $shop_name;?>では、時計修理技能士による分解・洗浄・組立・調整に<br class="br-sp">他店では別料金となる「新品仕上げ」までを含めたフルサービスにてご案内しております。</p>
	</div>
</div>

<div class="case-wrap">
	<div class="focus-box">
		<div class="ribbon-box">
			<h2 class="ribbon5">ジュエルカフェの時計修理がオトクな理由！</h2>
		</div>
		<h3><?php echo $shop_name;?>の時計オーバーホールは<br class="br-sp">他店では別料金となる<b>「新品仕上げ」が料金に含まれます。</b></h3>
	</div>
	<div class="inner">
		<p class="main-txt">新品仕上げ込みのシンプルな料金システム。<br class="br-sp">トータルコストで他店と差が付きます！<br class="br-sp">時計の中も外も、まとめてピカピカに！</p>
		<figure class="image01"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/case_image01.jpg"></figure>
		<div class="box-wrap">
			<div class="box-l">ロレックス<br class="br-sp">エクスプローラーI<br class="br-sp">の場合</div>
			<div class="box-r">
				<dl>
					<dt>某有名時計修理店</dt>
					<dd>オーバーホール<span class="txt1">&yen;36,800</span><br class="br-pc">+ 新品仕上げ<span class="txt1">&yen;20,000</span>=<span class="txt1">&yen;56,800</span></dd>
					<dt><?php echo $shop_name;?></dt>
					<dd>オーバーホール（新品仕上げ含む） =<span class="txt2">&yen;38,240</span></dd>
				</dl>
			</div>
		</div>
		<p class="sale">今ならさらに20%OFFセール中！</p>
	</div>
</div>

<div class="main-b-wrap">
	<?php
		$month = date('n'); // 今月の数値（1〜12）
		$extra_class = ($month >= 10 && $month <= 12) ? 'double-digit' : '';
	?>
	<div class="image01">
		<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/main02.png"></figure>
		<span class="overlay-text <?php echo $extra_class; ?>">
			<?php echo $month; ?>
		</span>
	</div>
</div>





<div class="price-list-wrap" id="price-list">
	<div align="center">
		<h2 class="ribbon2">
			<?php 
				if( wp_is_mobile() ){
					// スマホ・タブレットの場合の処理を記述
					echo '時計修理&nbsp;料金表';
				}else{ 
					// PCの場合の処理を記述
					echo $shop_name;
				}
			?>		
		</h2>
	</div>
	<h3>ロレックス&nbsp;オーバーホール&nbsp;<br class="br-pc">基本料金表（新品仕上げ含む）</h3>


	<table class="t01">
		<tr>
			<th>
				<h4>自動巻き</h4>
				<p class="model">デイトジャスト / OY.PP. / エアキング / デイデイト /<br class="br-sp"> スカイドゥエラー / エクスプローラー I・II / GMTマスター /<br class="br-sp"> サブマリーナー / シードゥエラー / ヨットマスター / ミルガウス など</p>
			</th>
			<th>
				<h4>クロノグラフ</h4>
				<p class="model">コスモグラフ デイトナ</p>
			</th>
		</tr>
		<tr>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</td><td><span class="sale">&yen;52,000～</span><span class="regular">&yen;64,800～</span></td>
		</tr>
	</table>

	<figure class="image01"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/price_list_image01_explorer1.png"></figure>

	<h3>その他ブランド&nbsp;オーバーホール&nbsp;<br class="br-pc">基本料金表（新品仕上げ含む）</h3>

	<table class="t02">
		<tr>
			<th class="th-f">ブランド名</th><th>クオーツ</th><th>自動巻き</th><th class="th-l">クロノグラフ</th>
		</tr>
		<tr>
			<td class="td-f">ROLEX <span class="jp">ロレックス</span></td>
			<td>-</td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;52,000～</span><span class="regular">&yen;64,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">TUDOR <span class="jp">チューダー</span></td>
			<td>-</td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">OMEGA <span class="jp">オメガ</span></td>
			<td><span class="sale">&yen;35,000～</span><span class="regular">&yen;43,800～</td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">CARTIER <span class="jp">カルティエ</span></td>
			<td><span class="sale">&yen;35,000～</span><span class="regular">&yen;43,800～</td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">BVLGARI <span class="jp">ブルガリ</span></td>
			<td><span class="sale">&yen;35,000～</span><span class="regular">&yen;43,800～</td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">HERMES <span class="jp">エルメス</span></td>
			<td><span class="sale">&yen;35,000～</span><span class="regular">&yen;43,800～</td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">CHANEL <span class="jp">シャネル</span></td>
			<td><span class="sale">&yen;35,000～</span><span class="regular">&yen;43,800～</td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">FRANCK MULLER<br class="br-pc"> <span class="jp">フランクミュラー</span></td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">PANERAI <span class="jp">パネライ</span></td>
			<td>-</td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">TAG-HEUER <span class="jp">タグ・ホイヤー</span></td>
			<td><span class="sale">&yen;35,000～</span><span class="regular">&yen;43,800～</td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">BREITLING <span class="jp">ブライトリング</span></td>
			<td><span class="sale">&yen;35,000～</span><span class="regular">&yen;43,800～</td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">IWC <span class="jp">アイ・ダブリュー・シー</span></td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">CORUM <span class="jp">コルム</span></td>
			<td><span class="sale">&yen;35,000～</span><span class="regular">&yen;43,800～</td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">ZENITH <span class="jp">ゼニス</span></td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;52,000～</span><span class="regular">&yen;64,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">GIRARD PERREGAUX<br class="br-pc"> <span class="jp">ジラール・ペルゴ</span></td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">CHOPARD <span class="jp">ショパール</span></td>
			<td><span class="sale">&yen;38,000～</span><span class="regular">&yen;47,800～</span></td>
			<td><span class="sale">&yen;44,000～</span><span class="regular">&yen;54,800～</span></td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">JAEGER LE COULTRE<br class="br-pc"> <span class="jp">ジャガー・ルクルト</span></td>
			<td><span class="sale">&yen;44,000～</span><span class="regular">&yen;54,800～</span></td>
			<td><span class="sale">&yen;44,000～</span><span class="regular">&yen;54,800～</span></td>
			<td class="td-l"><span class="sale">&yen;66,000～</span><span class="regular">&yen;82,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">PIAGET <span class="jp">ピアジェ</span></td>
			<td>-</td>
			<td><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
			<td class="td-l"><span class="sale">&yen;66,000～</span><span class="regular">&yen;82,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">BREGUET <span class="jp">ブレゲ</span></td>
			<td>-</td>
			<td><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
			<td class="td-l"><span class="sale">&yen;66,000～</span><span class="regular">&yen;82,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">BLANCPAIN <span class="jp">ブランパン</span></td>
			<td>-</td>
			<td><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
			<td class="td-l"><span class="sale">&yen;66,000～</span><span class="regular">&yen;82,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">AUDEMARS PIGUET<br class="br-pc"> <span class="jp">オーデマ・ピゲ</span></td>
			<td><span class="sale">&yen;44,000～</span><span class="regular">&yen;54,800～</span></td>
			<td><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
			<td class="td-l"><span class="sale">&yen;66,000～</span><span class="regular">&yen;82,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">VACHERON CONSTANTIN<br class="br-pc"> <span class="jp">ヴァシュロン・コンスタンタン</span></td>
			<td><span class="sale">&yen;44,000～</span><span class="regular">&yen;54,800～</span></td>
			<td><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
			<td class="td-l"><span class="sale">&yen;66,000～</span><span class="regular">&yen;82,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">PATEK PHILIPPE<br class="br-pc"> <span class="jp">パテック・フィリップ</span></td>
			<td><span class="sale">&yen;44,000～</span><span class="regular">&yen;54,800～</span></td>
			<td><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
			<td class="td-l"><span class="sale">&yen;66,000～</span><span class="regular">&yen;82,800～</span></td>
		</tr>
		<tr>
			<td class="td-f">国産（SEIKO,CITIZEN,etc）</td>
			<td><span class="sale">&yen;35,000～</span><span class="regular">&yen;43,800～</td>
			<td><span class="sale">&yen;35,000～</span><span class="regular">&yen;43,800～</td>
			<td class="td-l"><span class="sale">&yen;49,000～</span><span class="regular">&yen;60,800～</span></td>
		</tr>

	</table>


	<div class="focus-box">
		<p><?php echo $shop_name;?>の時計オーバーホールは<br class="br-sp">他店では別料金となる<b>「新品仕上げ」が料金に含まれます。</b></p>
	</div>

</div>



<div class="section-inner">
<?php
$args = array(
  'post_type'      => 'blog',
  'posts_per_page' => 10,
  'orderby'        => 'date',
  'order'          => 'DESC',
  'tax_query'      => array(
    'relation' => 'AND',
    array(
      'taxonomy' => 'hinmoku',
      'field'    => 'slug',
      'terms'    => array('tokei-repair'),
    ),
    array(
      'taxonomy' => 'area',
      'field'    => 'slug',
      'terms'    => array($post->post_name),
    ),
  ),
);

$the_query = new WP_Query($args);
$used_titles = array(); // attachment 제목 중복 체크용

if ($the_query->have_posts()) :
?>
  <ul class="blog-archive-list">
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
      <?php
        // 현재 포스트의 썸네일 ID
        $thumb_id = get_post_thumbnail_id(get_the_ID());

        // 썸네일이 없으면 스킵
        if (!$thumb_id) {
          continue;
        }

        // 미디어 라이브러리에서 attachment의 post_title 가져오기
        $thumb_post = get_post($thumb_id);
        $thumb_title = $thumb_post ? strtolower(trim($thumb_post->post_title)) : '';

        // 제목이 없으면 스킵
        if (empty($thumb_title)) {
          continue;
        }

        // ✅ 같은 제목(같은 원본 이미지)이면 건너뛰기
        if (in_array($thumb_title, $used_titles, true)) {
          continue;
        }

        // 처음 보는 제목이면 기록
        $used_titles[] = $thumb_title;
      ?>

      <li>
        <a href="<?php the_permalink(); ?>">
          <div class="blog-catch-img">
            <?php the_post_thumbnail('medium', ['class' => 'blog-detail-img']); ?>
            <div class="blog-archive-date">
              <time itemprop="dateCreated datePublished"><?php the_time('Y.m.d'); ?></time>
            </div>
          </div>

          <div class="p-12">
            <p class="blog-archive-category">
              <?php echo esc_html(get_post_meta(get_the_ID(), 'tokei-category', true)); ?>
            </p>
            <p class="blog-archive-ttl">
              <?php echo esc_html(get_post_meta(get_the_ID(), 'tokei-brand', true)); ?> /
              <?php echo esc_html(get_post_meta(get_the_ID(), 'tokei-model', true)); ?>
            </p>
          </div>
        </a>
      </li>

    <?php endwhile; ?>
  </ul>
<?php
endif;
wp_reset_postdata();
?>
</div>





<div class="store-detail-guide">
	<div class="store-map">
		<?php /* ?>新Googleマップ<?php */ ?>
<div class="map">

			<div id="google_map" style="max-width: 1000px; height:450px; margin:0 auto;" allowfullscreen="" loading="lazy"></div>
			<style>
			@media screen and (max-width:768px) {
				#google_map {
				height:300px;
				}
			}
			</style>
			<script src="https://maps.google.com/maps/api/js?key=AIzaSyBDG1w7am_338bO-1sZuc0DRIbEPHmlJ5g&language=ja"></script>
			<script>
				const target = document.getElementById('google_map');
				const address = "〒690-0825　島根県松江市学園1丁目16-53";
				const shopname = "松江学園通り店";
				const geocoder = new google.maps.Geocoder();

				geocoder.geocode({ address: address }, function (results, status) {
					if (status === 'OK' && results[0]) {
						// Map取得
						const map = new google.maps.Map(target, {
							zoom: 16,
							center: results[0].geometry.location,
							mapTypeId: 'roadmap'
						});

						// Marker取得
						const marker = new google.maps.Marker({
							position: results[0].geometry.location,
							map: map
						});

						// 情報ウィンドウ設定
						const latlng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
						const info = '<div class="info">' +
							//'<p>' + address + '</p>' +
							'<p>' + shopname + '</p>' +
							// '<p><a href="https://maps.google.co.jp/maps?q=' + latlng + '&iwloc=J" target="_blank" rel="noopener noreferrer">Googleマップで見る</a></p>' +
							'</div>';
						var infowindow = new google.maps.InfoWindow({
							content: info
						});

						// 情報ウィンドウ表示
						// infowindow.open(map, marker);

						// クリックイベント設定
						google.maps.event.addListener(marker, 'click', function () {
							infowindow.open(map, marker);
						});
					} else {
						return;
					}
				});
			</script>

		</div>
		<div class="store-map-btn-list mt-80">
			<a href="http://maps.google.com/maps?saddr=&daddr=ジュエルカフェ<?php the_title();?>&dirflg=" target="_blank" rel="noopener noreferrer" >GoogleMapでお店までの経路をみる</a>
		</div>
	</div>
</div>

<div class="section-inner">
	<h3 class="section-ja-title"><?php echo $shop_name;?></h3>
	<div class="shop-info-tab">
		<div class="shop-tab bold ls-11 active">
			店舗情報
		</div>

		<?php if(get_field('道順その1_本文',$shop_id)):?>
			<div class="shop-tab bold ls-11">
				道順
			</div>
		<?php endif;?>
	</div>



<div class="shop-tab-content-area">
		<div class="shop-tab-content show">
			<table class="bold">
				<tbody>
					<tr>
						<th>営業時間</th>
						<td><?php the_field('営業時間',$shop_id);?></td>
					</tr>
					<tr>
						<th>定休日</th>
						<td><?php the_field('定休日',$shop_id);?></td>
					</tr>
					<tr>
						<th>所在地</th>
						<td>
							<?php the_field('所在地',$shop_id);?>
							<?php if(get_field('施設hpリンク',$shop_id) || get_field('フロアマップリンク',$shop_id)):?>
								<span class="shop-tab-content-linkWrapper">
									<?php if(get_field('施設hpリンク',$shop_id)):?>
										<a href="<?php echo esc_url(get_field('施設hpリンク',$shop_id));?>" class="shop-tab-content-link" target="_blank">施設のホームページを見る</a>
									<?php endif;?>
									<?php if(get_field('フロアマップリンク',$shop_id)):?>
										<a href="<?php echo esc_url(get_field('フロアマップリンク',$shop_id));?>" class="shop-tab-content-link" target="_blank">フロアマップを見る</a>
									<?php endif;?>
								</span>
							<?php endif;?>
						</td>
					</tr>
					<?php if(get_field('店舗電話番号',$shop_id)):?>
					<tr>
						<th>電話番号</th>
						<td>
							<a href="tel:<?php
								$tel = get_field('店舗電話番号',$shop_id);
								$tel = str_replace(array('-', 'ー', '−', '―', '‐','(',')','（','）',' ','　'), '', $tel);
								echo $tel;
							?>" class="shop-tab-content-tel bold"><?php the_field('店舗電話番号',$shop_id); ?></a>
						</td>
					</tr>
					<?php endif;?>
					<tr>
						<th>買取品目</th>
						<td>
							<?php 
								$hinmoku = get_field('買取全品目',$shop_id);
							
								
								if(count($hinmoku) > 0){
							
								foreach($hinmoku as $k=>$v){
									
									$v['value'] = str_replace('card1','card',$v['value']);
									
									$v['value'] = str_replace('card2','letter-top',$v['value']);
									
									echo '<a href="/kaitori/'.$v['value'].'/">'.$v['label'].'</a>';
									
									if( count($hinmoku)-1 > $k ){
										
										echo '・';
										
									}
									
								}
								
								}
					
							?>
						</td>
					</tr>
					<tr>
						<th>買取方法</th>
						<td>
							<?php 			
							
								$method = get_field('買取方法',$shop_id);

								if(count($method) > 0){

								foreach($method as $k=>$v){
									
									echo '<a href="/'.$v['value'].'/">'.$v['label'].'</a>';
									
									if( count($method)-1 > $k ){
										
										echo '・';
										
									}
									
								}
								
								}

							?>
						</td>
					</tr>
					<tr>
						<th>マップコード</th>
						<td><?php the_field('マップコード',$shop_id);?><span class="normal d-b">※「マップコード」および「ＭＡＰＣＯＤＥ」は（株）デンソーの登録商標です。</span></td>
					</tr>
					<tr>
						<th>古物商許可証番号</th>
						<td>東京都公安委員会許可第302210708825号</td>
					</tr>
				</tbody>
			</table>
		</div>

		<?php if(get_field('道順その1_本文',$shop_id)):?>
		<div class="shop-tab-content">
			<div class="map-img-guide">
				<ul>
					<li>
						<p class="map-img-guide-number">01</p>
						<div class="map-img-guide-img">
							<?php
								$image = get_field('road_image1',$shop_id);
								if(!empty($image)):
								?>
									<img src="<?php echo esc_url($image['url']);?>" alt="<?php echo $image['alt'];?>">
							<?php endif;?>
						</div>
						<p><?php echo esc_html(get_field('道順その1_本文',$shop_id));?></p>
					</li>

					<?php
						$image = get_field('road_image2',$shop_id);
						if(!empty($image)):
						?>
					<li>
						<p class="map-img-guide-number">02</p>
						<div class="map-img-guide-img">
							<img src="<?php echo esc_url($image['url']);?>" alt="<?php echo $image['alt'];?>">
						</div>
						<p><?php echo esc_html(get_field('道順その2_本文',$shop_id));?></p>
					</li>
					<?php endif;?>

					<?php //道順3
						$image = get_field('road_image3',$shop_id);
						if(!empty($image)):
						?>
					<li>
						<p class="map-img-guide-number">03</p>
						<div class="map-img-guide-img">
							<img src="<?php echo esc_url($image['url']);?>" alt="<?php echo $image['alt'];?>">
						</div>
						<p><?php echo esc_html(get_field('道順その3_本文',$shop_id));?></p>
					</li>
					<?php endif;?>

					<?php //道順4
						$image = get_field('road_image4',$shop_id);
						if(!empty($image)):
						?>
					<li>
						<p class="map-img-guide-number">04</p>
						<div class="map-img-guide-img">
							<img src="<?php echo esc_url($image['url']);?>" alt="<?php echo $image['alt'];?>">
						</div>
						<p><?php echo esc_html(get_field('道順その4_本文',$shop_id));?></p>
					</li>
					<?php endif;?>

					<?php //道順5
						$image = get_field('road_image5',$shop_id);
						if(!empty($image)):
						?>
					<li>
						<p class="map-img-guide-number">05</p>
						<div class="map-img-guide-img">
							<img src="<?php echo esc_url($image['url']);?>" alt="<?php echo $image['alt'];?>">
						</div>
						<p><?php echo esc_html(get_field('道順その5_本文',$shop_id));?></p>
					</li>
					<?php endif;?>

					<?php //道順6
						$image = get_field('road_image6',$shop_id);
						if(!empty($image)):
						?>
					<li>
						<p class="map-img-guide-number">06</p>
						<div class="map-img-guide-img">
							<img src="<?php echo esc_url($image['url']);?>" alt="<?php echo $image['alt'];?>">
						</div>
						<p><?php echo esc_html(get_field('道順その6_本文',$shop_id));?></p>
					</li>
					<?php endif;?>

				</ul>
			</div>
		</div>
		<?php endif;?>
</div>

</div><!-- /section-inner -->



<a href="https://jewel-cafe.jp/form_tokei-repair/" class="btn_arrow">来店予約はこちらから</a>

<style>
.btn_arrow {
    display: table;
    position: relative;
    padding: 1em 2.5em;
	border-radius:4px;
    color: white;
    font-size: 23px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    box-sizing: border-box;
    transition: 0.5s;
	background-color:#C80000;
    margin: 55px auto;
}
.btn_arrow::after {
    position: absolute;
    top: 50%;
    right: 1em;
    width: 0.5em;
    height: 0.5em;
    transform: translateY(-50%) rotate(45deg);
    border-right: 2px solid currentColor;
    border-top: 2px solid currentColor;
    content: "";
}
.btn_arrow:hover {
    opacity:0.8;
}
@media screen and (min-width:501px){
	.btn_arrow{
		width:680px;
	}
}

</style>


<div class="band-wrap">
	<div class="inner">
		<p class="txt01">受付店舗は島根県松江市にございます。<br>来店ご予約受付中！</p>
		<div class="box">
			<div class="l"><p class="ribbon1">お問合せ・ご予約はこちらから</p></div>
			<div class="r"><p class="tel"><a href="tel:<?php echo $shop_tel;?>"><?php echo $shop_tel;?></a></p></div>
		</div>
		<p class="txt02">営業時間・電話お問い合わせ受付時間  <?php echo $shop_time;?></p>
	</div>
</div>


<div class="results-wrap">
	<div class="inner">
		<div class="ribbon-box">
			<h2 class="ribbon3">

			<?php 
				if( wp_is_mobile() ){
					// スマホ・タブレットの場合の処理を記述
					echo '時計修理実績';
				}else{ 
					// PCの場合の処理を記述
					echo $shop_name;
				}
			?>
			</h2>
		</div>

		<div class="item-wrap">

<div class="item-box">
	<span class="name">ロレックス エクスプローラーI 114270</span>
	<div class="item-box-inner">
		<div class="pic-wrap">
										<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/114270_1.jpg"></figure>
																<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/114270_2.jpg"></figure>
								</div>
		<span class="content">修理内容</span>
		<table>
										<tbody><tr><th>オーバーホール</th><td></td></tr>
																<tr><th>3、4番車磨き再生・部品交換</th><td></td></tr>
														</tbody></table>
							<p style="margin-top:5px;">ゼンマイ切れによる止まり症状です。完全な油切れ状態で3,4番車に焼き付きが起きておりました。ゼンマイが切れの不動の為、修理に持ち込まれましたが、このまま使い続けていたら 歯車の交換は避けられず、費用も高額になるところでした。</p>
	</div>
</div>


<div class="item-box">
	<span class="name">ロレックス サブマリーナ 14060</span>
	<div class="item-box-inner">
		<div class="pic-wrap">
										<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/14060_1.jpg"></figure>
																<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/14060_2.jpg"></figure>
								</div>
		<span class="content">修理内容</span>
		<table>
										<tbody><tr><th>オーバーホール</th><td></td></tr>
																<tr><th>パッキン交換（基本料に含む）</th><td></td></tr>
														</tbody></table>
							<p style="margin-top:5px;">定期的なメンテナンスで大事にお使いになっているお客様でした。部品のダメージがなく、パッキンの交換で防水結果も問題ありません。弊社のオーバーホールには基本的にパッキン代が含まれておりますが、例外も御座いますので詳しくはお見積りをお願いします。</p>
	</div>
</div>


<div class="item-box">
	<span class="name">ロレックス エクスプローラーII 16570</span>
	<div class="item-box-inner">
		<div class="pic-wrap">
										<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/16570_2.jpg"></figure>
																<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/16570_1.jpg"></figure>
								</div>
		<span class="content">修理内容</span>
		<table>
										<tbody><tr><th>オーバーホール</th><td></td></tr>
																<tr><th>ゼンマイ交換</th><td></td></tr>
														</tbody></table>
							<p style="margin-top:5px;">前回のオーバーホールから6年間のご使用でゼンマイが切れてしまい不動の状態です。油切れでしたのでこのままですと部品の焼つきが生じた可能性があります。4年～5年に一度の定期的なメンテナンスを行うことで結果的に費用も少なく、末永くご利用頂けます。</p>
	</div>
</div>


<div class="item-box">
	<span class="name">ロレックスデイトジャスト 16013</span>
	<div class="item-box-inner">
		<div class="pic-wrap">
										<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/16013_1.jpg"></figure>
																<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/16013_2.jpg"></figure>
								</div>
		<span class="content">修理内容</span>
		<table>
										<tbody><tr><th>オーバーホール</th><td></td></tr>
																<tr><th>部品交換（風防・チューブ・ハックレバー</th><td></td></tr>
														</tbody></table>
							<p style="margin-top:5px;">ハックレバーの先端折れにより動かなくなっておりました。このムーブメント（al.3035）ではゼンマイ切れに近い確率で多いトラブルです。風防とチューブを交換して防水性も維持確認が取れました。ベルトの伸びもありましたが、磨きを掛けてピカピカです。</p>
	</div>
</div>


<div class="item-box">
	<span class="name">ロレックス デイトジャスト 16014</span>
	<div class="item-box-inner">
		<div class="pic-wrap">
										<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/16014_1.jpg"></figure>
																<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/16014_2.jpg"></figure>
								</div>
		<span class="content">修理内容</span>
		<table>
										<tbody><tr><th>オーバーホール</th><td></td></tr>
																<tr><th>部品交換(ローター芯）</th><td></td></tr>
														</tbody></table>
							<p style="margin-top:5px;">比較的消耗が見られるローター芯の磨耗により基盤部品への接触跡が確認されました。ローターのいつもと違うガタツキ感のようなブレを感じましたら、お早目の修理をお勧めします。今回は症状も初期でしたので、費用も最小限で収まりました。</p>
	</div>
</div>


<div class="item-box">
	<span class="name">ロレックスGMTマスター 16700</span>
	<div class="item-box-inner">
		<div class="pic-wrap">
										<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/16700_1.jpg"></figure>
																<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/16700_2.jpg"></figure>
								</div>
		<span class="content">修理内容</span>
		<table>
										<tbody><tr><th>オーバーホール</th><td></td></tr>
																<tr><th>部品交換（ローター芯・ゼンマイ</th><td></td></tr>
														</tbody></table>
							<p style="margin-top:5px;">お持込いただいた時点ではまったく不動、ゼンマイ切れでの止まり症状でしたが、もう一つ問題がありました。ローター芯の磨耗により地板に接触跡があり交換が必要な状態です。お客様のご要望により全てオリジナル部品を使用しました。</p>
	</div>
</div>


</div>





	</div>
</div>

<div class="qa-wrap">
	<div align="center"><h2 class="ribbon2">時計修理のよくある質問</h2></div>
	<p class="txt">当店によくお寄せいただく質問をまとめました。<br class="br-sp">こちらの中にないご質問は、お気軽にご相談・お問い合わせください。</p>
	<div class="box">
		<ul>
			<li>
				<h3 class="q">時計のオーバーホールって何をするんですか？</h3>
				<p class="a">オーバーホールとは分解掃除のことで、時計の駆動部分であるムーブメントから全てのパーツを分解して、文字盤や針、ケースなどに分解いたします。
そのパーツを丁寧に1つ1つアルコールや薬剤で洗浄して精密に作られて、非常に細かい歯車の隙間にある細かい汚れをブラシやエアーなどで洗浄していきます。その後、元の状態に組み上げていきます。
その後は制度や防水機能の試験を行い、仕上げ処理を施して完成です。<?php echo $shop_name;?>のオーバーホールには仕上げ料金が含まれていますので、新品同様のピカピカの状態でお渡しできますよ。</p>
			</li>
			<li>
				<h3 class="q">オーバーホールには、どれくらいで出せばいいのでしょう？</h3>
				<p class="a">機械式時計のオーバーホールは、３～４年に一度が理想的です。時間が遅れたり、持続時間が短くなるなどの症状がある場合はもちろん、調子がどこも悪くなくても、機械油が乾いたり汚れたりすると、部品の摩耗につながるので、定期的なオーバーホールをおすすめします。</p>
			</li>
			<li>
				<h3 class="q">時計のガラスが割れてしまいました。</h3>
				<p class="a">落としてしまったり、ぶつける等して衝撃が加わると時計のガラスが割れてしまう事があります。
ガラスが割れると、時計自体の気密性が損なわれ、湿気や細かいゴミなどが侵入し、機械内部にまで不具合が出る事がありますので、早急にガラス交換が必要になります。内部の状態によってはガラスの交換以外にオーバーホールをおすすめしております。</p>
			</li>
		</ul>
		<ul>
			<li>
				<h3 class="q">店舗にて電池交換をしてもらえるのですか？</h3>
				<p class="a">クオーツ時計の電池交換につきましては、店舗にて受付・作業いたします。他店でご購入された腕時計でもお気軽にご相談ください。お買い物の合間にできあがります。※店頭で受けられない特殊な腕時計の場合は、修理工房での作業となり、2-3週間お時間をいただく場合がございます。</p>
			</li>
			<li>
				<h3 class="q">電池が切れた時計は、そのままにしておいても大丈夫？</h3>
				<p class="a">使い切った電池を放置しておくと、最悪の場合には液漏れが発生することがあります。この液体は金属を腐食させる危険があるばかりか、人体にとっても有害なもの。クォーツ式時計が止まったら、早めの電池交換をおすすめします。</p>
			</li>
			<li>
				<h3 class="q">見積もり・修理期間はどのくらいですか？</h3>
				<p class="a">見積もりは約１週間、オーバーホールは約４週間です。ただし、修理内容によって前後する場合がございます。</p>
			</li>
			<li>
				<h3 class="q">海外のお土産でもらったブランド時計のコピーでも大丈夫？</h3>
				<p class="a">申し訳ありませんが、偽物(コピー品)は修理できません。</p>
			</li>
		</ul>
	</div>

</div>



<div class="band-wrap">
	<div class="inner">
		<p class="txt01">受付店舗は島根県松江市にございます。<br>来店ご予約受付中！</p>
		<div class="box">
			<div class="l"><p class="ribbon1">お問合せ・ご予約はこちらから</p></div>
			<div class="r"><p class="tel"><a href="tel:<?php echo $shop_tel;?>"><?php echo $shop_tel;?></a></p></div>
		</div>
		<p class="txt02">営業時間・電話お問い合わせ受付時間  <?php echo $shop_time;?></p>
	</div>
</div>


<div class="atmosphere-wrap">
	<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/atmosphere_main02.jpg"></figure>
	<h3>一級時計修理技能士が在籍する時計修理専門工房</h3>
	<p class="txt"><?php echo $shop_name;?>にてお預かりしたお客様の大切な時計は、一級時計修理技能士が在籍する時計修理専門工房に運ばれます。<br class="br-sp">最新の設備と技術レベルの高い技能士によって、お客様の大切な時計の性能と価値の維持に努め、信頼にお応えします。</p>
	<div class="box">
		<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/atmosphere01.jpg"></figure>
		<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/atmosphere02.jpg"></figure>
		<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/atmosphere03.jpg"></figure>
		<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/atmosphere04.jpg"></figure>
		<figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/shop/tokei-repair/atmosphere05.jpg"></figure>
	</div>
</div>


<div class="top_reason">
	<div class="inner">
		<h2>ジュエルカフェの時計修理がオトクな理由！<span>REASON</span></h2>
		<div class="reasonlist">
			<ul>
<?php /* ?>
			<li>
				<div class="inr">
					<p class="tit rea06">銀座の一等地に出店</p>
					<p class="txt">ショッピングや食事の途中でお立ち寄りいただける銀座の中心部にオープン。時計に関する意識の高い銀座のお客様にご満足いただけるよう、どこよりも高いオーバーホール精度を実現するために専門の職人が技術を培っております。</p>
				</div>
			</li>
<?php */ ?>
			<li>
				<div class="inr">
					<p class="tit rea01">他店比較大歓迎</p>
					<p class="txt">高額なブランド時計を修理に出す際、やはり他店との価格の差は気になるもの。<?php echo $shop_name;?>では、新品仕上げをオーバーホール料金に含めることでどこよりもお得にご案内できる価格にてご案内しております。</p>
				</div>
			</li>
			<li>
				<div class="inr">
					<p class="tit rea05">お見積りはもちろん無料</p>
					<p class="txt">オーバーホールにつきましては、時計をお預かりしたうえで、まずはお見積りをお出しします。修理項目や総額をご確認いただいた上でのキャンセルももちろん無料にてお受けいたしますので安心してお申し込みください。</p>
				</div>
			</li>
			<li>
				<div class="inr">
					<p class="tit rea03">高いリピート率</p>
					<p class="txt">当店にお持ち込みいただくお客様にはブランド時計を複数お持ちの時計マニアの方も多数いらっしゃいます。そんなお客様からも価格・仕上げ共にご満足いただき、リピートでのご利用をいただいているのが当店の信頼の証です。</p>
				</div>
			</li>
			</ul>
		</div>
	</div>
</div>














</div>


<script>
  var swiper = new Swiper(".swiper", {
	slidesPerView: 1,
	spaceBetween: 0,
	loop: true,
	autoplay: {
	   delay: 2500,
	   disableOnInteraction:false
	 },
	centeredSlides: true,
	pagination: {
	  el: ".swiper-pagination",
	  clickable: true,
	},
	breakpoints: {
      // 画面幅が 980px 以上の場合
      980: {
        slidesPerView: 1.5,
      },
    },

  });
</script>





<?php get_footer(); ?>



