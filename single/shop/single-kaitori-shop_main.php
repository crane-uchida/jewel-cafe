<?php
/*
Template Name: 品目店舗一覧
*/
?>

<?php get_header( );?>


<?php

$area_name = $post->post_title;
$parent_post_id = $post->post_parent;

if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/brand/vuitton/shop/') !== false) {

	$parent_post = get_post(4747);
	$parent_title = $parent_post->post_title;
	$parent_post_id = $parent_post->post_parent;

	

}else if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/tokei/rolex-top/shop/') !== false) {

	$parent_post = get_post(3288);
	$parent_title = $parent_post->post_title;
	$parent_post_id = $parent_post->post_parent;


}else{

	$parent_title = '';
	while ($parent_post_id) {

		$parent_post = get_post($parent_post_id);
		$parent_title = $parent_post->post_title;
		$parent_post_id = $parent_post->post_parent;

	}

}

?>


<div class="main-section">
	<?php
		/*
	?>
  <div class="only-sp">
	<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop-top-bnr.jpg" class="mb-12 " alt="来店予約&ROLEXお買取成立で¥20,000キャッシュバック">
  </div>
  <?php
	*/
  ?>
</div>


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
			</style>	
	<div>
		<?php kaitori_breadcrumb();?>
	</div>
</section>



	<div>
		<div >
		
	<?php
		if ( !wp_is_mobile() ) {
	?>
      <section class="section-inner">
	  
        <h1 class="section-ja-title mb-8"><?php echo $parent_title;?>買取の店舗案内</h1>
		
        <div class="mb-32"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/archive_shop_mv.jpg" alt="<?php echo $parent_title;?>買取のジュエルカフェ 店舗案内"></div>
        <p class="mb-32">
		


	<?php
		if($parent_post->post_name == 'gold'){
		
	?>

ジュエルカフェは、国内外に300以上の店舗を持つ、金・貴金属買取の専門店です。<br>
多くのリピーター様にご愛顧いただく人気の理由は、豊富な専門知識を持つスタッフが1点ずつ丁寧に査定する安心感と、カフェのように入りやすいお店づくりによる気軽さがあります。<br>
ジュエルカフェは全国の駅チカ・駅前商店街などお買い物のついででも立ち寄りやすい便利な立地に出店。地元に密着したサービスと、全国どこでも変わらない高額買取によりご好評をいただいています。<br><br>

ジュエルカフェでは、古い商品や壊れたものでも査定対象。「こんなものでもお金になるの？」などどんな相談でもお伺いいたします。捨てるはずだった品物が意外な高額になることも！まずはお気軽にジュエルカフェにお持ちください！
	<?php
		}else if($parent_post->post_name == 'rolex-top'){
	?>


全国展開のジュエルカフェは、ロレックスの高価買取専門店です。古い時計や壊れた時計でも無料で査定。お客様にご満足いただける価格をご提示します。経験豊富なスタッフが最新の市場価格を反映し、1点ずつ丁寧に値付けいたしますので安心してご利用ください。<br><br>

ジュエルカフェは全国の有名ショッピングセンターや駅前商店街など、アクセスしやすい場所にございますので、お忙しい方にも便利です。まずはお気軽にジュエルカフェにお持ちください！

	
	
	<?php
		}else if($parent_post->post_name == 'diamond'){
	?>


全国展開のジュエルカフェは、ダイヤモンドの高価買取を得意とする買取専門店です。古いダイヤモンドやキズがあるダイヤモンドでも、無料で丁寧に見積もりを行い、お客様の大切なダイヤモンドを最高の価格で評価いたします。経験豊富なスタッフが、専門知識を活かして迅速かつ正確に査定し、納得のいく買取価格を提供します。<br><br>

ジュエルカフェは全国の有名ショッピングセンターや駅前商店街など、アクセス便利な場所に数多くの店舗を展開しており、いつでもお気軽にご利用いただけます。お客様のご都合に合わせてご来店いただけるよう、店頭買取だけでなく宅配買取もご用意しています。また、ジュエルカフェでは透明性のある買取プロセスを大切にしており、お客様が安心して買取を依頼できる環境を整えています。<br><br>

ダイヤモンドの買取をお考えなら、信頼と実績のジュエルカフェにお任せください。


	
	<?php
		}else if($parent_post->post_name == 'jewelry'){
	?>



全国展開のジュエルカフェは、宝石の高価買取を得意とする買取専門店です。古い宝石やキズがある宝石でも、無料で丁寧に見積もりを行い、お客様の大切なジュエリーを最高の価格で評価いたします。経験豊富なスタッフが、専門知識を活かして迅速かつ正確に査定し、納得のいく買取価格を提供します。<br><br>

ジュエルカフェは全国の有名ショッピングセンターや駅前商店街など、アクセス便利な場所に数多くの店舗を展開しており、いつでもお気軽にご利用いただけます。お客様のご都合に合わせてご来店いただけるよう、店頭買取だけでなく宅配買取もご用意しています。また、ジュエルカフェでは透明性のある買取プロセスを大切にしており、お客様が安心して買取を依頼できる環境を整えています。<br><br>

さらに、ジュエルカフェは豊富な市場データと最新の買取知識を駆使して、どのような宝石でもその真の価値を見逃しません。エメラルド、ルビー、サファイアなど、多様な宝石に対応しており、どんな状態の宝石でも高価買取をお約束します。

宝石の買取をお考えなら、信頼と実績のジュエルカフェにお任せください。


	
	<?php
		}else if($parent_post->post_name == 'letter-top'){
	?>


ジュエルカフェは、切手買取のエキスパートとして全国展開を行っており、どんな切手でも高価買取をお約束します。お手持ちの切手が1枚でも、大量のコレクションでも、無料で見積もりをいたしますので、まずはお気軽にご相談ください。古い切手や傷のある切手も丁寧に査定し、お客様の切手の価値を最大限に引き出します。<br><br>

ジュエルカフェは全国の有名ショッピングセンターや駅前商店街など、アクセスしやすい場所に多数の店舗を構えております。お客様の生活スタイルに合わせて便利にご利用いただけるよう、店頭買取だけでなく宅配買取もご用意しています。ジュエルカフェは、切手買取において透明性の高いプロセスを大切にしており、安心してお任せいただける環境を整えています。<br><br>

切手の買取を検討中のお客様、ぜひ信頼のジュエルカフェをご利用ください。経験豊富なスタッフが親切に対応し、お客様にとって最適な買取価格をご提案します。買取に関するご質問や見積もり依頼を心よりお待ちしております。


	<?php
		}else if($parent_post->post_name == 'vuitton'){
	?>

全国展開のジュエルカフェは、ルイヴィトンの高価買取に自信を持っています。古いモデルや壊れたルイヴィトン製品でも、専門のスタッフが丁寧に査定し、最新市場価格を元にお買取りします。お客様の大切なルイヴィトンをしっかりと評価し、納得のいく価格をご提供いたします。<br><br>

ジュエルカフェは全国の主要なショッピングセンターや駅前商店街に店舗を展開しており、どこからでもアクセスが便利です。お買い物やお仕事の合間に立ち寄れる利便性があり、お客様のご都合に合わせた利用が可能です。私たちのスタッフは豊富な経験と知識を持ち、透明で安心できる買取プロセスをお約束します。<br><br>

ルイヴィトンのアイテムを手放す際は、信頼と実績のあるジュエルカフェをご利用ください。お客様のルイヴィトン製品の価値を最大限に引き出し、高価買取を実現します。ご相談や見積もりのご依頼を、スタッフ一同心よりお待ちしております。


	<?php
		}
	?>

		</p>
      </section>
	  
	  
	   <?php get_template_part('template-parts/store-area'); ?>
	 
	<?php
	
		}else{
		
	?> 
	 
	 

      <section class="shop-catch section-inner">
		 <h1 class="section-ja-title"><?php echo $parent_title;?>買取のジュエルカフェ 店舗案内</h1>
     <div class="mb-24"><img style="max-width:100%; height:auto;" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/archive_shop_mv.jpg" alt="<?php echo $parent_title;?>買取のジュエルカフェ 店舗案内"></div>
        <p>

	<?php
		if($parent_post->post_name == 'gold'){
		
	?>

ジュエルカフェは、国内外に300以上の店舗を持つ、金・貴金属買取の専門店です。<br>
多くのリピーター様にご愛顧いただく人気の理由は、豊富な専門知識を持つスタッフが1点ずつ丁寧に査定する安心感と、カフェのように入りやすいお店づくりによる気軽さがあります。<br>
ジュエルカフェは全国の駅チカ・駅前商店街などお買い物のついででも立ち寄りやすい便利な立地に出店。地元に密着したサービスと、全国どこでも変わらない高額買取によりご好評をいただいています。<br><br>

ジュエルカフェでは、古い商品や壊れたものでも査定対象。「こんなものでもお金になるの？」などどんな相談でもお伺いいたします。捨てるはずだった品物が意外な高額になることも！まずはお気軽にジュエルカフェにお持ちください！
	<?php
		}else if($parent_post->post_name == 'rolex-top'){
	?>


全国展開のジュエルカフェは、ロレックスの高価買取専門店です。古い時計や壊れた時計でも無料で査定。お客様にご満足いただける価格をご提示します。経験豊富なスタッフが最新の市場価格を反映し、1点ずつ丁寧に値付けいたしますので安心してご利用ください。<br><br>

ジュエルカフェは全国の有名ショッピングセンターや駅前商店街など、アクセスしやすい場所にございますので、お忙しい方にも便利です。まずはお気軽にジュエルカフェにお持ちください！

	
	
	<?php
		}else if($parent_post->post_name == 'diamond'){
	?>


全国展開のジュエルカフェは、ダイヤモンドの高価買取を得意とする買取専門店です。古いダイヤモンドやキズがあるダイヤモンドでも、無料で丁寧に見積もりを行い、お客様の大切なダイヤモンドを最高の価格で評価いたします。経験豊富なスタッフが、専門知識を活かして迅速かつ正確に査定し、納得のいく買取価格を提供します。<br><br>

ジュエルカフェは全国の有名ショッピングセンターや駅前商店街など、アクセス便利な場所に数多くの店舗を展開しており、いつでもお気軽にご利用いただけます。お客様のご都合に合わせてご来店いただけるよう、店頭買取だけでなく宅配買取もご用意しています。また、ジュエルカフェでは透明性のある買取プロセスを大切にしており、お客様が安心して買取を依頼できる環境を整えています。<br><br>

ダイヤモンドの買取をお考えなら、信頼と実績のジュエルカフェにお任せください。


	
	<?php
		}else if($parent_post->post_name == 'jewelry'){
	?>



全国展開のジュエルカフェは、宝石の高価買取を得意とする買取専門店です。古い宝石やキズがある宝石でも、無料で丁寧に見積もりを行い、お客様の大切なジュエリーを最高の価格で評価いたします。経験豊富なスタッフが、専門知識を活かして迅速かつ正確に査定し、納得のいく買取価格を提供します。<br><br>

ジュエルカフェは全国の有名ショッピングセンターや駅前商店街など、アクセス便利な場所に数多くの店舗を展開しており、いつでもお気軽にご利用いただけます。お客様のご都合に合わせてご来店いただけるよう、店頭買取だけでなく宅配買取もご用意しています。また、ジュエルカフェでは透明性のある買取プロセスを大切にしており、お客様が安心して買取を依頼できる環境を整えています。<br><br>

さらに、ジュエルカフェは豊富な市場データと最新の買取知識を駆使して、どのような宝石でもその真の価値を見逃しません。エメラルド、ルビー、サファイアなど、多様な宝石に対応しており、どんな状態の宝石でも高価買取をお約束します。<br><br>

宝石の買取をお考えなら、信頼と実績のジュエルカフェにお任せください。


	
	<?php
		}else if($parent_post->post_name == 'letter-top'){
	?>


ジュエルカフェは、切手買取のエキスパートとして全国展開を行っており、どんな切手でも高価買取をお約束します。お手持ちの切手が1枚でも、大量のコレクションでも、無料で見積もりをいたしますので、まずはお気軽にご相談ください。古い切手や傷のある切手も丁寧に査定し、お客様の切手の価値を最大限に引き出します。<br><br>

ジュエルカフェは全国の有名ショッピングセンターや駅前商店街など、アクセスしやすい場所に多数の店舗を構えております。お客様の生活スタイルに合わせて便利にご利用いただけるよう、店頭買取だけでなく宅配買取もご用意しています。ジュエルカフェは、切手買取において透明性の高いプロセスを大切にしており、安心してお任せいただける環境を整えています。<br><br>

切手の買取を検討中のお客様、ぜひ信頼のジュエルカフェをご利用ください。経験豊富なスタッフが親切に対応し、お客様にとって最適な買取価格をご提案します。買取に関するご質問や見積もり依頼を心よりお待ちしております。


	<?php
		}else if($parent_post->post_name == 'vuitton'){
	?>

全国展開のジュエルカフェは、ルイヴィトンの高価買取に自信を持っています。古いモデルや壊れたルイヴィトン製品でも、専門のスタッフが丁寧に査定し、最新市場価格を元にお買取りします。お客様の大切なルイヴィトンをしっかりと評価し、納得のいく価格をご提供いたします。<br><br>

ジュエルカフェは全国の主要なショッピングセンターや駅前商店街に店舗を展開しており、どこからでもアクセスが便利です。お買い物やお仕事の合間に立ち寄れる利便性があり、お客様のご都合に合わせた利用が可能です。私たちのスタッフは豊富な経験と知識を持ち、透明で安心できる買取プロセスをお約束します。<br><br>

ルイヴィトンのアイテムを手放す際は、信頼と実績のあるジュエルカフェをご利用ください。お客様のルイヴィトン製品の価値を最大限に引き出し、高価買取を実現します。ご相談や見積もりのご依頼を、スタッフ一同心よりお待ちしております。


	<?php
		}
	?>
		</p>


      <ul class="border-col-3 mt-8">
        <li class="border-col-item d-b">
          <div class="border-col-item d-b">
            <div class="shop-catch-col-img">
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/shop-catch-icon-01.svg" class="d-b">
            </div>
            スピード査定
          </div>
        </li>
        <li class="border-col-item d-b">
          <div class="border-col-item d-b">
            <div class="shop-catch-col-img">
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/shop-catch-icon-02.svg" class="d-b">
            </div>
            即日現金払い
          </div>
        </li>
        <li class="border-col-item d-b">
          <div class="border-col-item d-b">
            <div class="shop-catch-col-img">
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/shop-catch-icon-03.svg" class="d-b">
            </div>
            アクセス抜群！
          </div>
        </li>
      </ul>
      <p class="mt-8">来店時のご予約は不要です。お気軽にお越しください。</p>
      </section>


    <div class="section-inner mb-40">
      <?php get_template_part( 'template-parts/search-shop-new' );?>
    </div>


	  <?php
		}
	  ?>
	
	</div>


		<?php get_template_part( 'template-parts/common-tab' );?>

 </div>









<?php /* パンくずリスト */ ?>
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
		"name": "<?php echo $parent_title;?>買取の店舗案内"
      }]
    }
</script>

<?php /* WebPage */ ?>
<script type="application/ld+json">
	{
		"@context": "https://schema.org/",
		"@type": "WebPage",
		"@id": "<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
		"name": "<?php echo $parent_title;?>買取の店舗案内",
		"datePublished": "2012-03-11",
		"dateModified": "<?php echo get_latest_shop_post_date(); ?>",
		"publisher": {
			"@type": "Organization",
			"name": "株式会社クレイン",
			"url": "https://jewel-cafe.jp/company/"
		}
	}
</script>

<?php /* LocalBusiness */ ?>
<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "LocalBusiness",
		"@id": "<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
		"name": "<?php echo $parent_title;?>買取の店舗案内",
		"image": "https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/archive_shop_mv.jpg",
		"url": "<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
		"sameAs": [
			"https://www.instagram.com/jewelcafe.jp",
			"https://twitter.com/Jewel_Cafe",
			"https://page.line.me/cob5096n"
		]
	}
</script> 



<?php get_footer( );?>
