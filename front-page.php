<?php
/*
Template Name: TOP
*/
?>

<?php get_header( );?>




  <section class="main-section">
    <div class="only-pc">
      <h1><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/top_mv_pc.jpg" alt="ジュエリー、ブランド品高く売るならジュエルカフェ" width="100%" height="100%"></h1>
    </div>
    <div class="only-sp">
      <h1><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/top_mv_sp.jpg" alt="ジュエリー、ブランド品高く売るならジュエルカフェ" width="100%" height="100%"></h1>
    </div>
  </section>
	
	

  <div class="sp">
    <div class="section-inner top_catch_sp">
      <div class="left"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/zeroen.png" alt="査定・ご相談0円" width="100%" height="100%"></div>
      <div class="right">
        <p class="text"><span style="background:linear-gradient(transparent 70%, #FDD500 30%);">「買取を身近なものに、<br>気軽に足を運べる場所に」</span></p>
        <p class="text2">あんしん便利な全国300店舗。<br>買取専門店ならジュエルカフェ。</p>
      </div>
    </div>
  </div>
<style>
  .pagetop{
    display:none;
  }
  .top_catch_sp{
    display:flex;
    align-items: center;
    column-gap: 7px;
    margin-top: 23px;
  }
  .top_catch_sp .left{
    width: 30%;
  }
  .top_catch_sp .right{

  }
  .top_catch_sp .right .text{
    font-weight:bold;
    font-size:18px;
  }
  .top_catch_sp .right .text2{
    font-size:14px;
    font-weight:bold;
    margin-top: 10px;
  }
  .top_catch_sp img{
    max-width: 100%;
    height: auto;
  }
</style>




    <div class="common-tab top-tab">
      <div class="section-inner">
	  
	  
        <div class="only-pc">
          <ul class="d-f bg-red jc-sa bdrs-4">
						<li><a href="<?php echo esc_url(home_url( '/shop-buy/' ));?>" class="color-white ta-c bold common-tab-01">店頭買取</a></li>
						<li><a href="<?php echo esc_url(home_url( '/delivery-buy/' ));?>" class="color-white ta-c bold common-tab-02">宅配買取</a></li>
						<li><a href="<?php echo esc_url(home_url( '/trip-buy/' ));?>" class="color-white ta-c bold common-tab-03">出張買取</a></li>
          </ul>
        </div>
		
		
        <div class="only-sp">
          <ul class="d-f bg-red jc-sa bdrs-4">
						<li><a href="<?php echo esc_url(home_url( '/shop-buy/' ));?>" class="color-white ta-c bold common-tab-01">店頭買取</a></li>
						<li><a href="<?php echo esc_url(home_url( '/delivery-buy/' ));?>" class="color-white ta-c bold common-tab-02">宅配買取</a></li>
          </ul>
          <ul class="d-f bg-red jc-sa bdrs-4 mt-8">
						<li><a href="<?php echo esc_url(home_url( '/trip-buy/' ));?>" class="color-white ta-c bold common-tab-03">出張買取</a></li>
          </ul>
        </div>
		
		
      </div>
    </div>
	
	
	
    <span class="top-catch" width="100%" height="100%">
      <div class="section-inner">
        <div class="top-catch-content">
          <?php get_template_part( 'template-parts/top-catch-text' );?>
          <div class="only-pc">
			<!--
            <a href="#media-popup" data-media="https://www.youtube.com/embed/tQ39vkGburM" target="_blank"></a>
			!-->
			
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/top-catch.jpg" alt="ジュエルカフェの高価買取" class="media-capture-img" width="500" height="500">
			  

          </div>
        </div>
        <div class="top-catch-bnr">
          <h3 class="section-ja-title ta-c">今月の買取・査定キャンペーン</h3>



<?php /* ?> // 通常のキャンペーン 
  <?php if(wp_is_mobile()): // スマホ・タブレットの場合の処理を記述 ?>
    <h4 class="section-inner">
      <img class="w-100per" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/top-catch-bnr-03_sp.jpg" alt="ジュエルカフェの査定プレゼント" width="100%" height="100%">
    </h4>
  <?php else: // PCの場合の処理を記述 ?>
    <ul class="d-f slider">
      <li><h4><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/top-catch-bnr-03.jpg" alt="ジュエルカフェの査定プレゼント" width="100%" height="100%"></h4></li>
      <li><h4><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/top-catch-bnr-02.jpg" alt="ジュエルカフェのロレックス買取特典" width="100%" height="100%"></h4></li>
      <li><h4><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/top-catch-bnr-01.png" alt="ジュエルカフェのブランド買取特典" width="100%" height="100%"></h4></li>
    </ul>
  <?php endif; ?>
<?php */ ?>


<?php /* ?> // 通常のキャンペーン <?php */ ?>
<!-- SP用(CSSで出し分け) -->
<h4 class="section-inner sp">
  <img class="w-100per" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/top-catch-bnr-03_sp.jpg" alt="ジュエルカフェの査定プレゼント" width="100%" height="100%">
</h4>

<!-- PC用(CSSで出し分け) -->
<div class="pc">
  <ul class="d-f slider">
    <li><h4><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/top-catch-bnr-03.jpg" alt="ジュエルカフェの査定プレゼント" width="100%" height="100%"></h4></li>
    <li><h4><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/top-catch-bnr-02.jpg" alt="ジュエルカフェのロレックス買取特典" width="100%" height="100%"></h4></li>
    <li><h4><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/top-catch-bnr-01.png" alt="ジュエルカフェのブランド買取特典" width="100%" height="100%"></h4></li>
  </ul>
</div>




<?php /* ?>ジュエルぐま公式X10000フォロワー突破キャンペーン
  <div class="section-inner">
    <picture class="modal-trigger" style="cursor:pointer;">
      <!-- スマホ用（最大幅767px以下） -->
      <source media="(max-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/campaign_x10000_sp.png">
      <!-- タブレット以上（768px以上）〜PC -->
      <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/campaign_x10000_pc.png">
      <!-- fallback（すべてのブラウザ用） -->
      <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/campaign_x10000_pc.png" alt="ジュエルぐま公式X10000フォロワー突破キャンペーン 買取金額20%UP" width="100%" height="100%">
    </picture>
  </div>
<?php */ ?>










        </div>
      </div>
<?php /* ?>
<div class="ta-c">
  <a href="<?php echo esc_url(home_url('/shop/'));?>" class="base-btn center-right-arrow mb-40">詳しくはお近くの店舗へ</a>
</div>
<?php */ ?>
    </span>
	
	
	
    <section class="search bg-beige">
      <div class="section-inner">
<?php /* ?>
        <?php get_template_part( 'template-parts/latest-purchase-price-static' );?>
        <div class="dot-border"></div>
<?php */ ?>

		<style>
		.search-keyword-shop{

			background:#de1022;
			border-radius:10px;
			padding:20px;

		}

		</style>

	<div class="section-inner mb-40">
		
		<?php //get_template_part( 'template-parts/search-keyword-shop' );?>
		<?php get_template_part( 'template-parts/search-shop-new' );?>
		
		
	</div>

				<?php
					/*
				?>
				<div class="search-shop" data-uniq-id="609bb70d69163">
					<?php get_template_part( 'template-parts/search-shop' );?>
				</div>

				<section class="shop-search-keyword">
					<h3 class="ttl-box-red">フリーワードで検索</h3>
					<div class="shop-search-inner">
						<div class="search-form">
							<form method="get" action="<?php echo esc_url(home_url('shop')); ?>">
								<input type="text" name="s" value="" placeholder="都道府県をご入力下さい">
								<input type="image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/search-icon.svg">
							</form>
						</div>
						<p class="mt-8">入力した場所の近くの店舗やキーワードに関連している店舗を表示します。</p>
					</div>
				</section>
				<?php
					*/
				?>

        <!-- <div class="search-link">
          <ul class="d-f slick-top-search">
            <li><a href="<?php //echo esc_url(home_url('delivery_buy'));?>"><img src="<?php //echo esc_url(get_template_directory_uri());?>/assets/images/top/search-bnr-01.jpg"></a></li>
            <li><a href="<?php //echo esc_url(home_url('about-line'));?>"><img src="<?php //echo esc_url(get_template_directory_uri());?>/assets/images/top/search-bnr-02.jpg"></a></li>
            <li><a href="#"><img src="<?php //echo esc_url(get_template_directory_uri());?>/assets/images/top/search-bnr-03.jpg"></a></li>
          </ul>
        </div> -->
      </div>
    </section>
    <section class="purchase">
      <div class="section-inner">
        <div class="section-en-title sofia">PURCHASE</div>
        <div class="en-title-border"></div>
        <h3 class="section-ja-title ta-c">高く買います！買取強化中の商品</h3>

				<?php get_template_part( 'template-parts/common-purchase-item' );?>

        <div class="purchase-brand">
          <h3 class="section-ja-title ta-c">お気軽に無料査定！</h3>
          <ul>
            <li>
              <a href="<?php echo home_url('/kaitori/brand/vuitton/');?>" class="center-right-arrow pos-r">
				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-vuitton.jpg" media="(min-width: 1000px)" alt="ジュエルカフェのルイヴィトン買取" width="94" height="94"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-vuitton.jpg" alt="ジュエルカフェのルイヴィトン買取" width="63" height="63">
				</picture>
                <h4 class="brand-name-ja base-font-size color-red bold ta-c">ルイヴィトン<br><span class="brand-name-en small-font-size ta-c sofia">Louis Vuitton</span></h4>
                <hr>
                <p class="small-font-size purchase-brand-dtl">買取数No1の大人気ブランド、ルイヴィトン。市場人気も高く、古いものでも高価買取いたします。</p>
              </a>
            </li>
            <li>
              <a href="<?php echo home_url('/kaitori/brand/chanel/');?>" class="center-right-arrow pos-r">
				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-chanel.jpg" media="(min-width: 1000px)" alt="ジュエルカフェのシャネル買取" width="94" height="94"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-chanel.jpg" alt="ジュエルカフェのシャネル買取" width="63" height="63">
				</picture>
				
                <h4 class="brand-name-ja base-font-size color-red bold ta-c">シャネル<br><span class="brand-name-en small-font-size ta-c sofia">CHANEL</span></h4>
                <hr>
                <p class="small-font-size purchase-brand-dtl">ヴィンテージシャネルブームが起こるほど幅広い層から人気のシャネル。安定した買取相場です。</p>
              </a>
            </li>
            <li>
              <a href="<?php echo home_url('/kaitori/tokei/rolex-top/');?>" class="center-right-arrow arrow-gray pos-r">

				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-rolex.jpg" media="(min-width: 1000px)" alt="ジュエルカフェのロレックス買取" width="94" height="94"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-rolex.jpg" alt="ジュエルカフェのロレックス買取" width="63" height="63">
				</picture>
				
                <h4 class="brand-name-ja base-font-size color-red bold ta-c">ロレックス<br><span class="brand-name-en small-font-size ta-c sofia">ROLEX</span></h4>
                <hr>
                <p class="small-font-size purchase-brand-dtl">高級時計の王様ロレックス。壊れていても、ガラスが割れていても高価買取いたします。</p>
              </a>
            </li>
            <li>
              <a href="<?php echo home_url('/kaitori/tokei/omega/');?>" class="center-right-arrow arrow-gray pos-r">

				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-omega.jpg" media="(min-width: 1000px)" alt="ジュエルカフェのオメガ買取" width="94" height="94"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-omega.jpg" alt="ジュエルカフェのオメガ買取" width="63" height="63">
				</picture>
				
                <h4 class="brand-name-ja base-font-size color-red bold ta-c">オメガ<br><span class="brand-name-en small-font-size ta-c sofia">omega</span></h4>
                <hr>
                <p class="small-font-size purchase-brand-dtl">初めての機械式時計として選ばれることも多いオメガ。当店でもお買取実績多数です。</p>
              </a>
            </li>
            <li>
              <a href="<?php echo home_url('/kaitori/brand/gucci/');?>" class="center-right-arrow pos-r">
          
				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-gucci.jpg" media="(min-width: 1000px)" alt="ジュエルカフェのグッチ買取" width="94" height="94"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-gucci.jpg" alt="ジュエルカフェのグッチ買取" width="63" height="63">
				</picture>
				
                <h4 class="brand-name-ja base-font-size color-red bold ta-c">グッチ<br><span class="brand-name-en small-font-size ta-c sofia">GUCCI</span></h4>
                <hr>
                <p class="small-font-size purchase-brand-dtl">オールドグッチが大人気。古いモデルであっても安定した高価買取価格にてご案内いたします。</p>
              </a>
            </li>
            <li>
              <a href="<?php echo home_url('/kaitori/brand/hermes/');?>" class="center-right-arrow pos-r">
            
				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-hermes.jpg" media="(min-width: 1000px)" alt="ジュエルカフェのエルメス買取" width="94" height="94"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-hermes.jpg" alt="ジュエルカフェのエルメス買取" width="63" height="63">
				</picture>
				
				
                <h4 class="brand-name-ja base-font-size color-red bold ta-c">エルメス<br><span class="brand-name-en small-font-size ta-c sofia">HERMES</span></h4>
                <hr>
                <p class="small-font-size purchase-brand-dtl">セレブ御用達のエルメス。傷や汚れなどあっても高価買取可能です。最新相場でお買取します。</p>
              </a>
            </li>
            <li>
              <a href="<?php echo home_url('/kaitori/brand/tiffany/');?>" class="center-right-arrow arrow-gray pos-r">
        
				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-tiffany.jpg" media="(min-width: 1000px)" alt="ジュエルカフェのティファニー買取" width="94" height="94"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-tiffany.jpg" alt="ジュエルカフェのティファニー買取" width="63" height="63">
				</picture>
				
                <h4 class="brand-name-ja base-font-size color-red bold ta-c">ティファニー<br><span class="brand-name-en small-font-size ta-c sofia">Tiffany&Co</span></h4>
                <hr>
                <p class="small-font-size purchase-brand-dtl">シルバーからプラチナ・大粒ダイヤまで幅広くお持ちいただいています。鑑定書で買取額アップ！</p>
              </a>
            </li>
            <li>
              <a href="<?php echo home_url('/kaitori/brand/prada/');?>" class="center-right-arrow pos-r">

				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-prada.jpg" media="(min-width: 1000px)" alt="ジュエルカフェのプラダ買取" width="94" height="94"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-brand-prada.jpg" alt="ジュエルカフェのプラダ買取" width="63" height="63">
				</picture>
				
				
                <h4 class="brand-name-ja base-font-size color-red bold ta-c">プラダ<br><span class="brand-name-en small-font-size ta-c sofia">PRADA</span></h4>
                <hr>
                <p class="small-font-size purchase-brand-dtl">一世を風靡したリュックはもちろん、財布・小物まで多数お買取してます。限定品は買取額アップ！</p>
              </a>
            </li>
            <li>
              <a href="<?php echo home_url('/kaitori/card/departgift/');?>" class="center-right-arrow arrow-gray pos-r">
 
				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-departgift.jpg" media="(min-width: 1000px)" alt="ジュエルカフェの金券買取" width="94" height="94"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-departgift.jpg" alt="ジュエルカフェの金券買取" width="63" height="63">
				</picture>
				
                <h4 class="brand-name-ja base-font-size color-red bold ta-c">全国共通商品券<br><span class="brand-name-en small-font-size ta-c sofia">Gift Voucher</span></h4>
                <hr>
                <p class="small-font-size purchase-brand-dtl">商品券やプリペイドカード。全国共通券でしたら1枚から大歓迎！金券ショップに負けない高価買取です。</p>
              </a>
            </li>
            <li>
              <a href="<?php echo home_url('/kaitori/card/teleca/');?>" class="center-right-arrow pos-r">
     
				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-teleca.jpg" media="(min-width: 1000px)" alt="ジュエルカフェのテレホンカード買取" width="94" height="94"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-teleca.jpg" alt="ジュエルカフェのテレホンカード買取" width="63" height="63">
				</picture>
				
                <h4 class="brand-name-ja base-font-size color-red bold ta-c">テレホンカード<br><span class="brand-name-en small-font-size ta-c sofia">Phone Card</span></h4>
                <hr>
                <p class="small-font-size purchase-brand-dtl">コレクションしていた未使用のテレホンカードはぜひジュエルカフェへ！大量のお持込大歓迎です。</p>
              </a>
            </li>
            <li>
              <a href="<?php echo home_url('/kaitori/letter-top/');?>" class="center-right-arrow pos-r">
          
				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-letter.jpg" media="(min-width: 1000px)" alt="ジュエルカフェのハガキ買取" width="94" height="94"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-letter.jpg" alt="ジュエルカフェのハガキ買取" width="63" height="63">
				</picture>
				
                <h4 class="brand-name-ja base-font-size color-red bold ta-c">切手・官製はがき<br><span class="brand-name-en small-font-size ta-c sofia">Postage Stamps</span></h4>
                <hr>
                <p class="small-font-size purchase-brand-dtl">未使用の切手・官製はがきの買取もお任せください！書き損じの年賀はがきのお買取も大好評です。</p>
              </a>
            </li>
            <li>
              <a href="<?php echo home_url('/kaitori/kottou/kimono/');?>" class="center-right-arrow pos-r">
            
				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-kimono.jpg" media="(min-width: 1000px)" alt="ジュエルカフェの着物買取" width="94" height="94"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/purchase-kimono.jpg" alt="ジュエルカフェの着物買取" width="63" height="63">
				</picture>
				
				
                <h4 class="brand-name-ja base-font-size color-red bold ta-c">着物<br><span class="brand-name-en small-font-size ta-c sofia">Kimono</span></h4>
                <hr>
                <p class="small-font-size purchase-brand-dtl">振袖、訪問着、和装小物など、タンスに眠ったままの着物も高価買取いたします。古いものでも大歓迎！</p>
              </a>
            </li>
          </ul>
        </div>
        <div class="purchase-broken">
          <p class="purchase-broken-ttl color-white bold">キズや汚れのある訳あり品も買取可能</p>
          <div class="purchase-broken-inner bg-beige">
            <p class="purchase-broken-txt bold">他社で買取NGだった商品でも、ジュエルカフェは買取可能なシステムがあります。ぜひ無料査定をご活用ください。</p>
            <div class="purchase-broken-list">
              <div class="purchase-broken-bag">
                <p class="base-font-size bold">ブランドバッグ</p>
                <hr>
                <ul>
                  <li class="d-ib small-font-size">角スレ</li>
                  <li class="d-ib small-font-size">中がベタベタ</li>
                  <li class="d-ib small-font-size">くたくた</li>
                  <li class="d-ib small-font-size">イニシャル入り</li>
                  <li class="d-ib small-font-size">日焼け</li>
                  <li class="d-ib small-font-size">シミ</li>
                </ul>
              </div>
              <div class="purchase-broken-watch">
                <p class="base-font-size bold">ブランド時計</p>
                <hr>
                <ul>
                  <li class="d-ib small-font-size">本体だけ</li>
                  <li class="d-ib small-font-size">ガラス破損</li>
                  <li class="d-ib small-font-size">動かない</li>
                  <li class="d-ib small-font-size">ベルトボロボロ</li>
                  <li class="d-ib small-font-size">文字盤にシミ</li>
                  <li class="d-ib small-font-size">目立つキズ</li>
                </ul>
              </div>
              <div class="purchase-broken-jewely">
                <p class="base-font-size bold">ブランドジュエリー</p>
                <hr>
                <ul>
                  <li class="d-ib small-font-size">石がとれている</li>
                  <li class="d-ib small-font-size">切れている</li>
                  <li class="d-ib small-font-size">片方だけ</li>
                  <li class="d-ib small-font-size">イニシャル入り</li>
                  <li class="d-ib small-font-size">くすんでいる</li>
                  <li class="d-ib small-font-size">時代遅れ</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="ta-c">
          <a href="<?php echo esc_url(home_url( '/kaitori/'));?>" class="base-btn center-right-arrow">他の豊富な買取商品をみる</a>
        </div>
      </div>
    </section>

    <?php get_template_part('template-parts/store-area'); ?>











<?php /* ?>　催事イベント
    <section class="event_saiji mt-32">
      <div class="section-inner">
        <div class="section-en-title sofia">EVENT</div>
        <div class="en-title-border"></div>
        <h3 class="section-ja-title ta-c">全国各地で買取イベント開催中！</h3>
        <ul class="primary">
		<?php
		
			$get_latest =  get_saiji_list(4);

			
			if(is_array($get_latest)){
				
				foreach($get_latest as $v){

		?>

          <li>
            <div class="title"><?php if($v['is_eventing'] == '1'){?><span>開催中</span><?php }?>【<?php echo $v['event_area'];?>】<?php echo $v['event_area2'];?>で買取イベントを開催します！</div>
            <table>

              <tr>
                <th>開催日程</th>
                <td><?php echo $v['schedule_sdate'];?>(<?php echo get_week($v['schedule_sdate'])?>)  ～  <?php echo $v['schedule_edate'];?>(<?php echo get_week($v['schedule_edate']);?>)　<?php echo $v['schedule_stime'];?> - <?php echo $v['schedule_etime'];?>

				</td>
              </tr>
            </table>

          </li>
		 <?php
				}
			}
		 ?>
		  		  
        </ul>
      </div>
    </section>
<?php */ ?>





















    <section class="feature mt-32">
      <div class="section-inner">
        <div class="section-en-title sofia">FEATURE</div>
        <div class="en-title-border"></div>
        <h3 class="section-ja-title ta-c">ジュエルカフェが選ばれる<br class="only-sp">3つの理由</h3>
        <div class="only-sp">
          <div class="mb-20">
            <a href="#media-popup" data-media="https://www.youtube.com/embed/tQ39vkGburM" target="_blank" class="d-b mb-4">
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/tentou_image2.jpg" width="100%" height="100%" class="media-capture-img w-100per">
            </a>
            <p class="ta-c small-font-size">日本全国<?php echo get_option('shop'); ?>店舗のジュエルカフェで買取</p>
          </div>
          <div class="d-f jc-sb mb-32">
            <div class="w-48">
              <a href="#media-popup" data-media="https://www.youtube.com/embed/HBuw0iG7e58" target="_blank" class="d-b mb-4">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/takuhai_image.jpg" width="100%" height="100%" class="media-capture-img w-100per">
              </a>
              <p class="ta-c small-font-size">詰めて送るだけ！宅配買取</p>
            </div>
            <div class="w-48">
              <a href="#media-popup" data-media="https://www.youtube.com/embed/qJlshhRX1Rw" target="_blank" class="d-b mb-4">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shucho_image.jpg" width="100%" height="100%" class="media-capture-img w-100per">
              </a>
              <p class="ta-c small-font-size">ご自宅でらくらく出張買取</p>
            </div>
          </div>
        </div>
        <div class="feature-content">
          <div class="only-pc">
            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/feature-pc.jpg" alt="ジュエルカフェが選ばれる3つの理由" width="100%">
          </div>
          <div class="feature-txt-wrapper">
            <div class="feature-txt">
              <div class="d-f">
                <p class="color-red feature-reason-ttl sofia">REASON<span class="ta-c sofia bold lh">1</span></p>
                <div>
                  <h4 class="feature-reason-txt-ttl">業界最大級の<?php echo get_option('shop'); ?>店舗<br>気軽に足を運べる便利な立地と、<br class="pc-only">女性スタッフ中心の安心感</h4>
                  <p class="feature-reason-txt">ジュエルカフェは日本全国に直営店<?php echo get_option('shop'); ?>店舗を展開する超大型買取専門店！多くのお客様からの信頼とリピートをいただき、圧倒的な買取実績を誇ります。大手ショッピングセンター内や駅前商店街など、便利な場所にございます。</p>
                </div>
              </div>
            </div>
            <div class="feature-txt">
              <div class="d-f">
                <p class="color-red feature-reason-ttl sofia">REASON<span class="ta-c sofia bold">2</span></p>
                <div>
                  <h4 class="feature-reason-txt-ttl">海外にもお店を展開、<br>独自の商品ルートで<br class="pc-only">高価買取を実現します</h4>
                  <p class="feature-reason-txt">国内・海外で多くの流通ネットワークを持つジュエルカフェなら、お預かりした商品の価値を最大限に引き出した驚きの高価買取が可能です！最新の市場価格を反映した最大価格でご案内いたします。
</p>
                </div>
              </div>
            </div>
            <div class="feature-txt">
              <div class="d-f">
                <p class="color-red feature-reason-ttl sofia">REASON<span class="ta-c sofia bold">3</span></p>
                <div>
                  <h4 class="feature-reason-txt-ttl">充実のお客様サービスは<br class="pc-only">業界トップの自信！</h4>
                  <p class="feature-reason-txt">お客様から大好評の無料ジュエリークリーニング、リピート時にご利用いただける増額クーポン、店舗でのドリンクサービスなど、ご来店の感謝を込めてたくさんの無料サービスをご用意しております。キャンペーンで景品プレゼントがあることも。</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="feature-point">
          <p class="feature-point-ttl bg-red bdrs-4 bold">他にも！お客さまが選んだジュエルカフェのココが良い！</p>
          <ul>
            <li>
				<?php
					/*
				?>
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/feature-point-01.svg" alt="ショッピングセンターの中で子供連れでも安心">
			  <?php
				*/
			  ?>
			  
				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/feature-point-01.svg" media="(min-width: 1000px)" alt="ショッピングセンターの中で子供連れでも安心" width="140" height="140"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/feature-point-01.svg" alt="ショッピングセンターの中で子供連れでも安心" width="100" height="100">
				</picture>


              <div class="feature-point-list-inner">
                <p class="bold feature-point-list-ttl">ショッピングセンター<br class="pc-only">の中で子供連れでも安心</p>
                <p class="feature-point-txt">よくある質屋さんなどとちがって、大きなショッピングセンターにある明るいお店なので子供と一緒でも安心して入れました。スタッフさんが女性なのも安心ですね。買取価格にはもちろん満足、しっかりお値段をつけてもらいました。</p>
              </div>
            </li>
            <li>

				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/feature-point-02.svg" media="(min-width: 1000px)" alt="ガラスが割れたロレックスを買い取ってもらえた" width="140" height="140"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/feature-point-02.svg" alt="ガラスが割れたロレックスを買い取ってもらえた" width="100" height="100">
				</picture>
			  
              <div class="feature-point-list-inner">
                <p class="bold feature-point-list-ttl">ガラスが割れたロレックス<br class="pc-only">を買い取ってもらえた</p>
                <p class="feature-point-txt">ホームページで「壊れたロレックス」の買取例があったので、半信半疑で査定してもらったら本当に買い取ってもらえてびっくり！とっても古いゼンマイも巻けなかったのに。来店予約特典までいただけて満足です。</p>
              </div>
            </li>
            <li>
				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/feature-point-03.svg" media="(min-width: 1000px)" alt="急いでいたが20分もかからずすぐに買取" width="140" height="140"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/feature-point-03.svg" alt="急いでいたが20分もかからずすぐに買取" width="100" height="100">
				</picture>
			  
              <div class="feature-point-list-inner">
                <p class="bold feature-point-list-ttl">急いでいたが20分も<br class="pc-only">かからずすぐに買取</p>
                <p class="feature-point-txt">他のお店で持っていたところ「別の部署で査定が必要だから2~3日かかる」と言われ近くにあったジュエルカフェにお願いしました。その場ですぐに査定してくださり、支払いまでに20分程度でした。急いでいたので本当に助かりました。</p>
              </div>
            </li>
			
            <li>
			

				<picture>
				  <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/feature-point-04.svg" media="(min-width: 1000px)" alt="鑑定書があったら持っていったほうがいい" width="140" height="140"/>
				  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/feature-point-04.svg" alt="鑑定書があったら持っていったほうがいい" width="100" height="100">
				</picture>
				
              <div class="feature-point-list-inner">
                <p class="bold feature-point-list-ttl">鑑定書があったら<br class="pc-only">持っていったほうがいい</p>
                <p class="feature-point-txt">少し大きめのダイヤモンドを査定してもらいました。はじめ「思ってたより安いかな・・・」と思いましたが、「鑑定書があるならもっと高くできますと教えていただき、探して再来店。ぐっと高くなって大変満足です！安く買い取ることもできたはずなのに、丁寧に教えていただけました。</p>
              </div>
            </li>
          </ul>
        </div>

<?php /* ?>
        <div class="feature-comparison bg-beige">
          <h3 class="section-ja-title ta-c">他社との比較</h3>
          <div class="only-sp mb-20">
            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/comparison-img.jpg">
          </div>
          <div class="feature-comparison-inner">
            <div class="feature-comparison-txt">
              <p class="bold feature-comparison-case">「ROLEX デイトナ116528」の買取価格の場合</p>
              <div class="bg-red bdrs-4 feature-comparison-ex ai-c">
                <p class="bg-white feature-comparison-ex-ttl ta-c base-font-size mr-8"><span class="base-font-size bold">驚異の<br>買取価格</span></p>
                <p class="color-white feature-comparison-ex-price sofia bold">470<span>万円</span></p>
              </div>
              <p class="bold ta-c slash-title">他社とも比較してもこんなに違う！！</p>
              <ul class="d-f jc-sb">
                <li class="bg-white">
                  <p class="ta-c feature-comparison-ttl small-font-size bold">時計専門店A店</p>
                  <p class="ta-c feature-comparison-price sofia bold">450<span class="small-font-size">万円</span></p>
                </li>
                <li class="bg-white">
                  <p class="ta-c feature-comparison-ttl small-font-size bold">質屋B店</p>
                  <p class="ta-c feature-comparison-price sofia bold">290<span class="small-font-size">万円</span></p>
                </li>
                <li class="bg-white">
                  <p class="ta-c feature-comparison-ttl small-font-size bold">ブランド買取C店</p>
                  <p class="ta-c feature-comparison-price small-font-size sofia bold">380<span class="small-font-size">万円</span></p>
                </li>
              </ul>
              <p class="ta-r xs-font-size mt-12">※2021年12月現在のジュエルカフェの新品買取価格</p>
            </div>
            <div class="only-pc">
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/comparison-img.jpg">
            </div>
          </div>
        </div>
<?php */ ?>

      </div>
    </section>





    <section class="real-time">
      <div class="section-inner">
        <div class="section-en-title sofia">REAL TIME</div>
        <div class="en-title-border"></div>
        <h3 class="section-ja-title ta-c">〈毎日更新〉<br>全国のジュエルカフェで<br>高額買取中！</h3>
      
<?php
  $taxonomy_slug = 'hinmoku'; // タクソノミーのスラッグを指定
  $post_type_slug = 'blog'; // 投稿タイプのスラッグを指定
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  $args = array(
    'post_type' => $post_type_slug, // 投稿タイプを指定
    'posts_per_page' => 15, // 表示件数を指
    'orderby' =>  'DESC',
    'paged' => $paged,
  );
	$the_query = new WP_Query($args);
	
	$count = 1;
?>

        <ul class="blog-archive-list">
					<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
					<?php
						$hinmoku_terms = get_the_terms($post->ID, 'hinmoku');
												
						if ( !empty($hinmoku_terms) && is_array($hinmoku_terms) ) {

							// 기본값 초기화 (에러 방지)
							$hinmoku_parent_id = 0;
							$hinmoku_child_id = 0;
							$hinmoku_parent_name = '';
							$hinmoku_child_name = '';
							$hinmoku_grandchild_name = '';
							$hinmoku_parent_slug = '';
							$hinmoku_child_slug = '';
							$hinmoku_grandchild_slug = '';

							// ① 최상위(parent 0)
							foreach ( $hinmoku_terms as $term ) {
								if ( isset($term->parent) && (int)$term->parent === 0 ) {
									$hinmoku_parent_name = $term->name ?? '';
									$hinmoku_parent_id   = $term->term_id ?? 0;
									$hinmoku_parent_slug = $term->slug ?? '';
									break; // 하나만 필요하면 루프 중단
								}
							}

							// ② 2단계(child)
							if ( $hinmoku_parent_id ) {
								foreach ( $hinmoku_terms as $term ) {
									if ( isset($term->parent) && (int)$term->parent === (int)$hinmoku_parent_id ) {
										$hinmoku_child_name = $term->name ?? '';
										$hinmoku_child_id   = $term->term_id ?? 0;
										$hinmoku_child_slug = $term->slug ?? '';
										break;
									}
								}
							}

							// ③ 3단계(grandchild)
							if ( $hinmoku_child_id ) {
								foreach ( $hinmoku_terms as $term ) {
									if ( isset($term->parent) && (int)$term->parent === (int)$hinmoku_child_id ) {
										$hinmoku_grandchild_name = $term->name ?? '';
										$hinmoku_grandchild_slug = $term->slug ?? '';
										break;
									}
								}
							}
						}


						$area_terms = get_the_terms( $post->ID, 'area' );
						
						if(is_array($area_terms)){
						
						foreach($area_terms as $term) {
							if($term->parent === 0) {
								// $area_parent_name = $term->name;
								$area_parent_id = $term->term_id;
							}
						}
						foreach($area_terms as $term) {
							if($term->parent === $area_parent_id) {
								// $area_child_name = $term->name;
								$area_child_id = $term->term_id;
							}
						}
						foreach($area_terms as $term) {
							if($term->parent === $area_child_id) {
								$area_grandchild_name = $term->name;
							}
						}
						
						}
						
						
						
					$image_alt_title = $post->post_title;

					// 「を」で分割して2つ以上の要素がある場合
					$alt_img_arr = explode('を', $post->post_title);
					if (isset($alt_img_arr[1]) && $alt_img_arr[1] !== '') {
						$image_alt_title = $alt_img_arr[0];
					} else {
						// 「を」が 없을 때 → 「お」で 시도
						$alt_img = explode('お', $post->post_title);
						if (isset($alt_img[1]) && $alt_img[1] !== '') {
							$image_alt_title = $alt_img[0];
						}
					}



					$terms_area = get_the_terms($post->ID,'area');

			
					if($terms_area[0]->slug == 'tokei-repair-matsuegakuendori' || $terms_area[1]->slug == 'tokei-repair-matsuegakuendori' || $terms_area[2]->slug == 'tokei-repair-matsuegakuendori' ){ continue; }

					if($terms_area[0]->slug == 'tokei-repair-yoshinari' || $terms_area[1]->slug == 'tokei-repair-yoshinari' || $terms_area[2]->slug == 'tokei-repair-yoshinari' ){ continue; }



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

						if(!isset($grand_child_area_slug)){ $grand_child_area_slug ='';}

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
							<h4 class="blog-archive-ttl">
								<a href="<?php the_permalink() ?>"><?php echo mb_convert_kana(get_the_title(), "rnas"); ?></a>
							</h4>
							<div class="blog-archive-date">公開日：<time itemprop="datePublished" datetime="<?php the_time('c');?>"><?php the_time('Y/m/d');?></time></div>
							<p class="blog-archive-point pc">
								<?php 
									if(trim(get_field('買取査定ポイント')) !== ''):
										the_field('買取査定ポイント');
									else:
										continue;
									endif;
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
					endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</ul>



      </div>
    </section>














    <section class="news">
      <div class="section-inner">
        <div class="section-en-title sofia">NEWS</div>
        <div class="en-title-border"></div>
        <h3 class="section-ja-title ta-c">お知らせ</h3>

					<?php
						$post_type_slug = 'news';
						$paged = get_query_var('paged') ? get_query_var('paged') : 1;
						$args = array(
							'post_type' => $post_type_slug, // 投稿タイプを指定
							'posts_per_page' => 3, // 表示件数を指定
							'orderby' =>  'DESC', // 新着順に投稿を取得
							'paged' => $paged,
						);
						$the_query = new WP_Query($args); if($the_query->have_posts()):
					?>
					<ul>
					<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
					<li class="bd-t">
            <a href="<?php the_permalink() ?>">
              <span class="news-date d-b color-black bold"><time itemprop="dateCreated datePublished"><?php the_time('Y.m.d');?></time></span>
              <span class="news-ttl d-b color-black"><?php the_title();?></span>
            </a>
          </li>

					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					</ul>
					<?php endif; ?>

          <!-- <li class="bd-t">
            <a href="#">
              <span class="news-date d-b color-black bold">2021.2.9</span>
              <span class="news-ttl d-b color-black">埼玉・さいたま市中央区・桜区でデイトジャストをお買取させていただきました！</span>
            </a>
          </li>
          <li class="bd-t bd-b">
            <a href="#">
              <span class="news-date d-b color-black bold">2021.2.9</span>
              <span class="news-ttl d-b color-black">テキスが長い時は2行以上になって文章が折り返します。これは見た目を確認するためのテキストです。テキスが長い時は2行以上になって文章が折り返します。これは見た目を確認するためのテキストです。</span>
            </a>
          </li> -->

        <div class="ta-r">
          <a href="<?php echo esc_url(home_url('news'));?>" class="border-arrow-btn">もっと詳しくみる</a>
        </div>
      </div>
    </section>

    <section class="media">
      <div class="section-inner">
        <div class="section-en-title sofia">MEDIA</div>
        <div class="en-title-border"></div>
        <h3 class="section-ja-title ta-c">メディア情報</h3>

<?php /* ?>
        <ul class="media-capture">
          <li>
						<a href="#media-popup" data-media="https://www.youtube.com/embed/bJ32Puevrh8?si=R_tx2Ps-xoP-05wo?enablejsapi=1" target="_blank">
						  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/media-img-04.jpg?random" class="media-capture-img main" alt="フォレオ大津一里山様のYouTubeに登場しました！" width="100%" height="100%">
						</a>
            <p class="bold ta-c">超かわいいジュエルぐま！最新テレビCMを先行公開!</p>
          </li>
        </ul>
<?php */ ?>




<ul class="media-capture">
          <li>
						<a href="#media-popup" data-media="https://www.youtube.com/embed/bJ32Puevrh8?si=R_tx2Ps-xoP-05wo?enablejsapi=1" target="_blank">
						  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/media-img-sam_kuma1.jpg?random" class="media-capture-img" alt="超かわいいジュエルぐま！最新テレビCMオンエア中" width="100%" height="100%">
						</a>
            <p class="bold ta-c">超かわいいジュエルぐま！最新テレビCMオンエア中</p>
          </li>

          <li>
						<a href="#media-popup" data-media="https://www.youtube.com/embed/lGurEE_e6v8?si=Kcf-f4cwk0cRqZUc?enablejsapi=1" target="_blank">
						  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/media-img-sam_kuma2.jpg?random" class="media-capture-img" alt="ジュエルぐまアニメCM第2弾公開！" width="100%" height="100%">
						</a>
            <p class="bold ta-c">ジュエルぐまアニメCM第2弾公開！</p>
          </li>
</ul>










        <ul class="media-capture">

<?php /* ?>　高村さんが出ているので外しました。
          <li>
           <p class="bold ta-c slash-title">「カンニング竹山のイチバン研究所」<br class="only-pc">で取り上げられました！</p>
						<a href="#media-popup" data-media="https://www.youtube.com/embed/X6Uazw5cS3Y?enablejsapi=1" target="_blank">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/media-img-02.jpg?random" class="media-capture-img" alt="「カンニング竹山のイチバン研究所」で取り上げられました！" style="width:100%;">
						</a>
          </li>
<?php */ ?>

<?php /* ?>
          <li>
            <a href="#media-popup" data-media="https://www.youtube.com/embed/NtB4XuGdb4U?enablejsapi=1" target="_blank">
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/media-img-01.jpg?random" class="media-capture-img" alt="地方でCM放映中 ジュエルクマのダンス必見！" width="100%" height="100%">
            </a>
            <p class="bold ta-c">地方でCM放映中 ジュエルクマのダンス<br class="only-pc">必見！</p>
          </li>
<?php */ ?>






          <li>
						<a href="#media-popup" data-media="https://www.youtube.com/embed/-JPzIHwjhx4?enablejsapi=1" target="_blank">
						  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/media-img-03.jpg?random" class="media-capture-img" alt="フォレオ大津一里山様のYouTubeに登場しました！" width="100%" height="100%">
						</a>
            <p class="bold ta-c">フォレオ大津一里山様のYouTubeに登場しました！</p>
          </li>

          <li>
						<a href="#media-popup" data-media="https://www.youtube.com/embed/lICk3Siw5Gs" target="_blank">
						  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/media-img-02.jpg?random" class="media-capture-img" alt="人気Youtubeチャンネルとのコラボ動画も大好評！" width="100%" height="100%">
						</a>
            
            <p class="bold ta-c">人気Youtubeチャンネルとのコラボ動画も大好評！</p>
          </li>

        </ul>
        <p class="ta-c bold">その他、テレビ・ニュース・WEBなど<br class="only-sp">多数のメディアに紹介されています</p>
  
        <ul class="media-logo">
          <li><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/media-logo.svg" alt="テレビ・ニュース・WEBなど多数のメディアに紹介されています" width="100%" height="100%"></li>
        </ul>
      </div>
    </section>




    <div class="jewel-guma-banner section-inner">
      <a href="/jewel-guma/" target="_blank" class="d-b ta-c">
          <picture>
            <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/jewelguma_banner_pc.jpg" media="(min-width: 1000px)" alt="ジュエルぐまバナー" width="1000" height="150"/>
            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/jewelguma_banner_sp.jpg" alt="ジュエルぐまバナー" class="w-100per">
          </picture>
      </a>
    </div>





  <section class="csr">
    <div class="contents section-inner">
      <div class="sp">
        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/csr_image_sp.png" alt="">
      </div>
      <div class="background">
        <div class="pc absolute">持続的な支援と<br>コミュニティとの<br>絆を深める<br>CSR活動</div>
        <div class="main_area">
          <div class="title_wrapper">
            <div class="title">ジュエルカフェの社会貢献活動</div>
          </div>
          <p class="text">ジュエルカフェでは、地域社会への貢献を大切にし、継続的にCSR活動を行っています。<br>2020年には、マレーシアの孤児院へ古着を寄付する取り組みをスタート。その後も活動の幅を広げ、2023年にはイオン財団のトルコ地震支援キャンペーンに参加し、募金を実施しました。<br>さらに2025年には、マレーシアのNGO「Malaysian CARE」と協力し、先住民の子どもたちへの学用品を寄贈も行っています。</p>
        </div>
      </div>
      <div class="sp">
        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/csr_image2_sp.png" alt="">
      </div>
      <div class="report">
        <div class="title_wrapper">
          <div class="title">直近の活動レポート<span>マレーシア・Ladang CARE（2025年1月）</span></div>
        </div>
        <div class="flex">
          <div class="image_box">
            <picture>
              <source srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/csr_image_pc.png" media="(min-width: 1000px)" alt="" width="" height=""/>
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/csr_image3_sp.png" alt="" class="w-100per">
            </picture>
          </div>
          <div class="text_box">
            <div class="title">■ 活動内容</div>
            <p class="text2">2025年1月、マレーシアの支援団体とのパートナーシップにより、チャンデリアンのLadang CAREを訪問。制服や靴、文房具などの学用品と、RM6,500の支援金を先住民の子どもたちに届けました。</p>
            <div class="title">■ 交流イベント</div>
            <p class="text2">当日は子どもたちとの挨拶や自己紹介を皮切りに、ドローイングコンテストやカップスタッキングゲームなどを通じて交流を深め、笑顔あふれる時間を共有しました。</p>
            <div class="title">■ 取り組みの意義</div>
            <p class="text2">物資の支援だけでなく、子どもたちとの直接的なコミュニケーションを大切にすること。CSR活動は単なる寄付で終わらず、未来を担う子どもたちへ希望を届ける大切な機会であると考えております。</p>
          </div>
        </div>
      </div>
    </div>
  </section>



<?php /* ?>プラグイン「Smash Balloon Instagram Feed」を使って表示する場合
    <div style="position:relative; top:60px;">
      <?php echo do_shortcode(' [instagram-feed user="jewelcafe.jp"] '); ?>
    </div>
<?php */ ?>


<?php /* ?>
<!-- インスタapi start -->
<section class="instagram" id="instagram">
    <div class="contents">
      <div class="swiper instaSwiper">
        <ul class="swiper-wrapper" id="instagram-posts"></ul>

<!-- 
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-scrollbar"></div>
 -->
        </div>

        <script>
          const accessToken = 'EAAOMPHlbpioBOwdPSZChYqxZBayZCNN6MPrjlo2nF6tC0g71x3GZCCArE0GjecTvJs34qm46OzZApP49jK4NzN7Oi5yVLTXbs1nJEryWjfEtr1C8O9MisT0q9VZCk1KhmNOllLepWaei64T37UsBuiqYXCPjNyltEgoW9MI4tcrjKMrXzLQvYWoP5YPZAKYHX9CufahSzcZCxl0pfY4ZD';
          const businessAccountId = '17841404306466300';
          const endpoint = `https://graph.facebook.com/v21.0/${businessAccountId}?fields=media.limit(12){media_url,thumbnail_url,permalink,media_type}&access_token=${accessToken}`;

          async function fetchInstagramPosts() {
              try {
              const response = await fetch(endpoint);
              const data = await response.json();

              if (data.error) {
                  console.error('エラー:', data.error.message);
                  return;
              }

              const posts = data.media.data;
              const container = document.getElementById('instagram-posts');

              posts
                  //.filter(post => post.media_type === 'CAROUSEL_ALBUM' || post.media_type === 'VIDEO') // CAROUSEL_ALBUMまたはVIDEOを表示
                  .forEach(post => {
                  const slide = document.createElement('li');
                  slide.classList.add('swiper-slide');

                  const link = document.createElement('a');
                  link.href = post.permalink;
                  link.target = '_blank';

                  const img = document.createElement('img');
                  img.src = post.media_type === 'VIDEO' ? post.thumbnail_url : post.media_url; // VIDEOの場合はthumbnail_urlを使用
                  img.alt = 'Instagram post';

                  link.appendChild(img);
                  slide.appendChild(link);
                  container.appendChild(slide);
                  
                  });

                  // ✅ スライド追加後にループを再構築
                  insta_swiper.update();
                  insta_swiper.loopDestroy();
                  insta_swiper.loopCreate();

              } catch (error) {
              console.error('Instagram投稿の取得中にエラーが発生しました:', error);
              }
          }

          fetchInstagramPosts();
        </script>
      </div>
    </div>
</section>

<script>
  const insta_swiper = new Swiper('.instaSwiper', {
    slidesPerView: 8,
    loop: true,
    autoplay: { // 自動再生させる
        delay: 3000, // 次のスライドに切り替わるまでの時間（ミリ秒）
        disableOnInteraction: false, // ユーザーが操作しても自動再生を止めない
        waitForTransition: false, // アニメーションの間も自動再生を止めない（最初のスライドの表示時間を揃えたいときに）
    },

//     pagination: {
//         el: '.swiper-pagination',
//     },

//     navigation: {
//         nextEl: '.swiper-button-next',
//         prevEl: '.swiper-button-prev',
//     },

//     scrollbar: {
//         el: '.swiper-scrollbar',


    breakpoints: {
      1200: {  // 1200px以上
        slidesPerView: 8,
      },
      768: {   // 768px以上〜1199px
        slidesPerView: 5,
      },
      0: {     // 0〜767px（スマホ）
        slidesPerView: 3,
      }
    }
  });
</script>
<!-- インスタapi end -->
<?php */ ?>





<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script> 
<?php
$today_sql = "select * from `wp_goldchart` ORDER BY `wp_goldchart`.`id` DESC limit 0,2";
$today_result = $wpdb->get_results($today_sql);
?>



	<div class="jewelkuma_speech_balloon">
		<div class="balloon_right">
			<a href="/kaitori/gold/">
				<p class="arrow_in_balloon">金相場高騰中! 本日
					<?php
						if (isset($today_result[0]) && is_numeric($today_result[0]->gold_price)) {
							echo number_format((float)$today_result[0]->gold_price);
						}			
					?>
				円!<br>くわしくは<span class="marker">金買取ページ</span>から!</p>
			</a>
		</div>
		<div class="image_wrapper"><img class="image" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon_jewelkuma_speech_balloon.svg" alt="ジュエルくま"></div>
	</div>

	<script>
		$(document).ready(function() {
			$(window).scroll(function() {
				var scrollPosition = $(window).scrollTop();
				if (scrollPosition > 100) {
					$('.jewelkuma_speech_balloon').addClass('is-active');
					setTimeout(function(){
						$('.balloon_right').addClass('is-active');
					}, 2000); // 2秒
				} else {
					$('.jewelkuma_speech_balloon').removeClass('is-active');
				}
			});
		});
	</script>




<?php get_footer( );?>