<?php get_header(); ?>

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
      <!-- <a href="/campaign/"> -->
			<div>
				<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop-top-bnr.jpg" class="mb-12 " alt="来店予約&ROLEXお買取成立で¥20,000キャッシュバック">
			</div>
      <!-- </a> -->
    </div>

    <div class="section-inner">
      <section class="static-catch">
        <h1 class="section-ja-title">店頭買取</h1>
        <picture>
					<source media="(min-width: 961px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shop_mv_pc.jpg" alt="店頭買取" class="w-100per ">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shop_mv_sp.jpg" class="w-100per " alt="店頭買取">
				</picture>
        <h2 class="static-sub-ttl">全国300店舗以上！<br>大型ショッピングセンターや駅前商店街など、<br class="only-pc">お買い物のついでにお気軽にお立ち寄りいただけるロケーションでお待ちしております。</h2>
      </section>


	<?php
		/*
	?>
	
      <section class="media shop-buy">
        <iframe width="100%" height="auto" src="https://www.youtube.com/embed/tQ39vkGburM"  frameborder="0" id="video_iframe"></iframe>
      </section>

	
	
      <div class="search-shop" data-uniq-id="609bb70d69164">
        <?php get_template_part( 'template-parts/search-shop' );?>
      </div>
	<?php
		*/
	?>
	
		
		<link rel="stylesheet" href="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/css/singel.css"/>
		
		
		
		<div class="mb-40">
				<?php get_template_part( 'template-parts/search-shop-new' );?>
		</div>
			



      <section>
        <h3 class="ttl-box-red">女性スタッフだから安心!もちろん査定はプロ級です</h3>
        <p>金・プラチナ製品であれば、壊れたもの、古いデザインのもの、どんなお品でも喜んでお買取りさせて頂きます！0.1gからお買取り可能です！査定料金、買取手数料は一切不要！完全無料です！
「素材が分からない」「こんなものでも売れるかな？」など、迷ったら、まずは一度お近くのジュエルカフェへお持ちください。</p>
      </section>

      <section class="buy-flow mb-80">
        <h3 class="ttl-box-red">店頭でのお買取の流れ</h3>
        <p>商品知識豊富な女性スタッフと、ご来店からお支払いまで最短10分のスピード査定!<br>スピード重視・ご相談重視なら来店買取がオススメです！</p>
        <ul>
          <li>
            <h4 class="buy-flow-ttl">ご来店・受付</h4>
            <p>こちらのページから最寄りのジュエルカフェをお探しください。日本全国のショッピングセンター、駅前商店街などに出店しております。ご来店の際は必ず<span>《運転免許証・マイナンバーカード等の身分証明書》</span>をご持参ください。</p>
            <div class="flow-number">01</div>
          </li>
          <li>
            <h4 class="buy-flow-ttl">商品のお預かり</h4>
            <p>ジュエルカフェの経験豊富な査定スタッフが、お客様の大切な商品をお預かりいたします。</p>
            <div class="flow-number">02</div>
          </li>
          <li>
            <h4 class="buy-flow-ttl">査定</h4>
            <p>ジュエルカフェの店頭買取はスピード査定が自慢！およそ10分～15分程度で査定は完了いたします。（お客様のお待ち状況・お持ち込みの点数によってお待たせする場合もございます。）お待ちの間は、店内のカフェスペースにて無料のお飲み物をお召し上がりいただけます。くつろぎの空間で、ごゆっくりお過ごしください。</p>
            <div class="flow-number">03</div>
          </li>
          <li>
            <h4 class="buy-flow-ttl">査定結果のお知らせ・<br class="only-sp">お支払い</h4>
            <p>査定が終わりましたら、お買取金額をお知らせいたします。金額にご納得いただけましたら買取成立となり、その場で代金をお支払いいたします。また、次回のご来店時にご利用いただけるクーポン券やメンバーズカードもお渡しいたします。ご利用毎にお得になる会員特典はリピーター様に大好評です。ぜひまたご利用ください！</p>
            <div class="flow-number">04</div>
          </li>
        </ul>
      </section>

      <?php get_template_part( 'template-parts/common-kaitori-results' );?>

      <section class="purchase">

				<?php get_template_part( 'template-parts/common-purchase-item' );?>

      </section>

      <section class="kaitori-voice">
        <h3 class="ttl-box-red">ご利用いただいたお客様の声</h3>
        <div class="voice-list">
          <h3 class="voice-ttl">「ホームページを見て、利用させて頂きました」</h3>
          <p class="voice-txt">引越しの片付けをしていた時に昔愛用していた財布やバッグなどが数点出てきました。その中にルイヴィトンのジッピーウォレットがあり、捨てるのはもったいないと思い、買取してくれるお店を探していたところ、ジュエルカフェさんのホームページを拝見し、ダメージがあるものでも買取って下さること、また「お客様の声」では対応や金額面で満足したとのお声が多くございましたので、持って行くことに決めました。初めは見てもらうのも恥ずかしかったですが、女性スタッフさんが笑顔で対応して下さり、金額についてもしっかり説明をして下さりましたので、安心して手放す事が出来ました。対応も金額もホームページ通りで、大変満足出来ました。本当に感謝しております。他にも不要な食器やコスメ類などもあるのでまた利用させて頂きます。
          </p>
          <div class="voice-staff">
  				  <div class="d-f ai-c">
              <div class="voice-staff-img">
                <img class="-img--resize" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/img-voice-staff-01.png" alt="女性スタッフ" style="max-width: 94px; opacity: 1;">
              </div>
  						<h3 class="voice-ttl">「素敵な財布をお売りいただきましてありがとうございます」</h3>
  					</div>
  					<div class="voice-txt">
              先日はご来店いただきまして、誠にありがとうございました。お客様にお持ち込みいただきました財布は、ルイヴィトン　モノグラム・グラフィティという2001年に展開された限定ラインで、2009年にジッピーウォレットも展開されました。当時は定番のモノグラムに落書き風のプリントを施すといった独特のデザインが爆発的な人気となり、未だに人気は衰えておらず、入荷した途端に売れてしまう事も多いラインですので、高価買取が可能となっております。今回は、引越しの片付けの際に出てきたものとの事で、ジュエルカフェにご来店くださったことに大変感謝しております。貴重なお品をお譲りくださり、誠にありがとうございました。ジュエルカフェではルイヴィトン買取といったブランド品買取以外にもジュエリー、ブランド時計、ブランド食器、家電まで幅広いアイテムを高価買取中ですので、是非またご利用くださいませ。
            </div>
          </div>
        </div>
        <hr>
        <div class="voice-list">
          <h3 class="voice-ttl">「初めての買取店でしたが、女性スタッフばかりで安心しました」</h3>
          <p class="voice-txt">独身時代、自分へのご褒美として購入して大切に使っていたルイヴィトンのパピヨンですが、子供が生まれてからは、荷物がたくさん入るママバッグばかりで、この先もブランドバッグを持つことは無いだろうと思い、買取ってもらうことにしました。買取店は初めての利用で少し不安でしたが、ジュエルカフェはよく利用するショッピングセンターに入っていて明るい雰囲気なので、思い切って査定してもらいました。女性スタッフさんが、一緒にキズや汚れの状態を見て、細かく説明してくださり、査定額にも納得でした。途中、ベビーカーでぐずり出した子供をあやしてくれたり、女性ならではの心遣い！また、利用したいと思います。
          </p>
          <div class="voice-staff">
  				  <div class="d-f ai-c">
              <div class="voice-staff-img">
                <img class="-img--resize" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/img-voice-staff-01.png" alt="女性スタッフ" style="max-width: 94px; opacity: 1;">
              </div>
  						<h3 class="voice-ttl">「女性スタッフならではのサービスを常に心がけています」</h3>
  					</div>
  					<div class="voice-txt">
              先日は、ジュエルカフェをご利用いただき有難うございました。お持ち下さったルイヴィトンのパピヨンは四代目アンリ・ルイ・ヴィトンがデザインし、1966年に誕生しました。誕生してからも多くの方に愛され現在も変わらず人気のデザインです。お客様の思い入れのあるお品物を隅々まで丁寧に査定し、定番デザインということで価格をつけさせていただきました。またジュエルカフェではルイヴィトンの他にも、様々なブランド品や様々な商材をお買取しています。今後も安心してお売りいただける接客・サービスをを目指していきますので、またのご利用お待ちしております。
            </div>
          </div>
        </div>
        <hr>
        <div class="voice-list">
          <h3 class="voice-ttl">「丁寧な接客で、価格も嬉しかったです」</h3>
          <p class="voice-txt"> 先日ジュエルカフェのお店の前を通った時に、スタッフの方に店頭販促のポケットティッシュをもらいました。色々な物を買い取っていると案内いただきましたので、家にある歪んだカルティエのリングも買い取れるか伺ったところ、全然大丈夫とのことでしたので。買い物ついでに立ち寄って査定に出してみました。スタッフさんも相談した時のことを覚えてくださっていて、感じが良かったです。査定に関する質問にも丁寧に答えてくれて、今回出したリングは歪んでいるのにも関わらずお値段も高く出していただいて嬉しかったです。使わない物があんな高値になるなんて、もっと早くに持って来れば良かったと思いました。近くにジュエルカフェがあるのは嬉しいです。
          </p>
          <div class="voice-staff">
  				  <div class="d-f ai-c">
              <div class="voice-staff-img">
                <img class="-img--resize" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/img-voice-staff-01.png" alt="女性スタッフ" style="max-width: 94px; opacity: 1;">
              </div>
  						<h3 class="voice-ttl">「問い合わせや査定だけでも大歓迎です」</h3>
  					</div>
  					<div class="voice-txt">
              この度はご来店ありがとうございました。ジュエルカフェでは、宣伝活動で店頭にてポケットティッシュの配布を行っております。お客様に私どもが受付や査定をさせていただいているという安心感も抱いていただけるようにできるだけ店頭にてお声がけも頑張っております。お陰様でお客様からもお声がけをいただく機会も多く、親切・丁寧な接客を日頃から心がけております。お客様からの喜びの声はとても嬉しい限りです。「こんなもの、お金にならないでしょ？」と思っているものが思わぬ高値になることもありますので、お気軽にお問い合わせをいただければと思います。お客様に喜んでいただける接客とお値段を日々追求しておりますので、ぜひご来店ください。スタッフ一同、心よりお待ちしております。
            </div>
          </div>
        </div>
      </section>


      <?php get_template_part( 'template-parts/common-tab' );?>

    </div>

<?php get_footer(); ?>
