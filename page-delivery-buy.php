<?php get_header(); ?>


<div class="popup_box">
	<div class="popup_cont"></div>
</div>



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
        <h1 class="section-ja-title">宅配買取</h1>
        <picture>
					<source media="(min-width: 961px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/takuhai_mv_pc.png" class="w-100per ">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/takuhai_mv_sp.png" class="w-100per " alt="宅配買取">
				</picture>
        <h2 class="static-sub-ttl">パソコンや携帯電話で24時間お申し込みOK!<br>送料無料の宅配便で、ご自宅からラクラク買取！<br class="only-pc">かんたん梱包の宅配キットをお送りします！</h2>
      </section>

      <section class="buy-order">
        <h3 class="buy-order-ttl slash-title">今すぐネットで申し込み！<br class="only-sp">宅配キットをお送りします！</h3>
        <div class="d-b ta-c">
          <a href="#" class="base-btn">宅配買取を申し込む</a><!-- 実装連絡：フォームへのURLを入れてください -->
        </div>
      </section>
	
	<?php
		/*
	?>
      <section class="media delivery-buy">
        <iframe width="100%" height="auto" src="https://www.youtube.com/embed/HBuw0iG7e58"  frameborder="0" id="video_iframe"></iframe>
      </section>
	<?php
		*/
	?>


      <section>
        <h3 class="ttl-box-red">ご自宅からラクラク無料発送！<br class="only-sp">弊社買取センターでしっかり査定！</h3>
        <p>簡単・お気軽な宅配買取ですが、業界最大級ジュエルカフェの専門スタッフがしっかり査定しますので、安心の高価買取はそのまま！1点でも大量でもお任せください！</p>
      </section>

      <section class="buy-flow mb-80">
        <h3 class="ttl-box-red">宅配でのお買取の流れ</h3>
        <p>商品知識豊富な女性スタッフと、ご来店からお支払いまで最短10分のスピード査定!<br>スピード重視・ご相談重視なら来店買取がオススメです！</p>
        <ul>
          <li>
            <h4 class="buy-flow-ttl">インターネット・<br class="only-sp">お電話からお申し込み</h4>
            <p>こちらのお申し込みフォームより必要事項をご入力ください！ジュエルカフェより無料の梱包キットをお送りいたします。その際に、お送りいただく商品についてできるだけ詳しく情報をご記入いただけますと、よりスムーズな査定が可能です。</p>
            <div class="flow-number">01</div>
          </li>
          <li>
            <h4 class="buy-flow-ttl">お送りいただくお品物の<br class="only-sp">梱包・発送</h4>
            <p>お品物にキズなどがつかないように丁寧に梱包していただき、梱包キットに同梱している発送伝票をご利用の上、発送をお願いいたします。<br>《必要書類》<br>・運転免許証/マイナンバーカード/住民票/パスポート/外国人登録証のいずれかのコピー<br>・お申し込みシート（買取キットに同梱）</p>
            <div class="flow-number">02</div>
          </li>
          <li>
            <h4 class="buy-flow-ttl">お品物到着確認、査定</h4>
            <p>お品物が到着しましたら、1営業日以内にお買取金額を査定させていただきます。<br>ジュエルカフェの査定専門スタッフが行いますのでご安心ください。</p>
            <div class="flow-number">03</div>
          </li>
          <li>
            <h4 class="buy-flow-ttl">お客様へ査定結果を<br class="only-sp">ご連絡、お取引成立</h4>
            <p>査定が終わり次第、お客様へ結果をご連絡いたします。価格にご満足いただけましたら、お客様名義の銀行口座にご入金いたします。ご返却希望の場合は、速やかにお客様のご自宅へ返送いたします。</p>
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
          <h3 class="voice-ttl">「初めて買取専門店の宅配買取サービスを利用しました」</h3>
          <p class="voice-txt">ジュエルカフェのホームページを見てから初めてLINE査定から宅配買取を利用しました。ジュエルカフェのホームページを見た時に何となく明るい印象を受け、ブランド買取の文字を目にして普段使わなくなったシャネルのバッグや香水・靴を一式、ダンボールに詰めてお送りしました。すぐに宅配買取受付の方から返答のお電話をもらい、若い女性の方でしたがブランド品について大変詳しく、査定額が高くなるポイントまで教えていただきました。実際に顔を合わさずともしっかりと対応してくれたお店で、こちらも安心して気持ち良く売ることができました。個人で売るよりも高く買い取ってもらったと、御社の査定額にも十分満足しています。LINE査定も当日中に返信があり、スピーディーな対応に感謝しています。ありがとうございました。
          </p>
          <div class="voice-staff">
  				  <div class="d-f ai-c">
              <div class="voice-staff-img">
                <img class="-img--resize" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/img-voice-staff-01.png" alt="女性スタッフ" style="max-width: 94px; opacity: 1;">
              </div>
  						<h3 class="voice-ttl">「当店では、迅速且つ丁寧な接客・対応を心がけています」</h3>
  					</div>
  					<div class="voice-txt">
              先日は、数ある買取専門店からジュエルカフェのLINE査定・宅配買取をお選びいただきまして、誠にありがとうございます。シャネルのワイルドステッチはファッションが落ち着いた女性に人気のラインで、中でも今回お客様がお送り下さったトートバッグは、中古市場でも発売当初から根強い人気のあるバッグです。保管状態も良く、表面・内側には汚れも一切ありませんでしたので、通常よりもお値段を高くご提示させていただきました。当店の査定額にもご満足いただき、大変嬉しく思っております。ジュエルカフェは、ワイルドステッチ買取の他にもブランド品を買取強化中で、沢山のお客様より日々お持ち込み・お問い合わせをいただいております。海外での販売ルートに強い当社だからこそ、他店よりも高く買い取れる自信を持ってご提示させていただいております。ワイルドステッチ買取以外にもブランド品の買取をご希望の際は、是非お気軽にご来店下さいませ。ありがとうございました。
            </div>
          </div>
        </div>
        <hr>
        <div class="voice-list">
          <h3 class="voice-ttl">「ブランド品をまとめて宅配買取に出してスッキリしました」</h3>
          <p class="voice-txt">家の大掃除をしていたときに出てきた、使っていないシャネルの腕時計や、使わないブランドバック、開けてもいない香水などをまとめてジュエルカフェの宅配買取にてお願いをすることにしました。無料でいただいた宅配キットも翌々日に届いて早い対応をいただけました。荷物をつめて送り、翌日には到着したとのことで連絡が入り、査定の結果を楽しみに待ちました。結果は驚いたことに特に時計に高値が付いて、他も捨てるつもりの気持ちでいた程度のブランド品も1点1点に値段を付けていただけました。想定外の収入にとても嬉しかったです。友人にもジュエルカフェを紹介しましたのでよろしくお願いします。
          </p>
          <div class="voice-staff">
  				  <div class="d-f ai-c">
              <div class="voice-staff-img">
                <img class="-img--resize" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/img-voice-staff-01.png" alt="女性スタッフ" style="max-width: 94px; opacity: 1;">
              </div>
  						<h3 class="voice-ttl">「ご紹介は私どもの1番嬉しい結果です」</h3>
  					</div>
  					<div class="voice-txt">
              この度は宅配買取サービスをご利用いただき、またご友人様のご紹介もいただきまして誠にありがとうございます。私どもの全てのサービスにご満足いただいてはじめてご紹介をいただけますのでとても嬉しいです。届いたお荷物ですが、状態が様々にございましたので1点1点に細かく査定致しました、特にシャネルの時計につきましては人気があるマトラッセがございましたので、海外相場から精一杯お値段を付けました。ご満足いただけまして良かったです。ジュエルカフェでは多様な買取品目をお買取りしており、シャネル時計買取以外にもブランド品はただ今強化買取中ですので、ご友人様含め査定することを楽しみにお待ちしております。何卒宜しくお願い申し上げます。
            </div>
          </div>
        </div>
        <hr>
        <div class="voice-list">
          <h3 class="voice-ttl">「ジュエルカフェさんの宅配買取を利用させていただきました」</h3>
          <p class="voice-txt"> 私は長年鉄道模型のコレクターでしたが、月日が経ち保管にも困るようになったので数ある模型から一部売ることを決めました。チラシで高価買取を謳っているジュエルカフェさんへお世話になろうと思い、宅配買取を申し込みました。模型の数がとにかく多かったので時間がかかるかと思いましたが、発送後直ぐにお返事をいただけました。査定のポイントを具体的に説明いただいて、高額になるところも細かく見ていただいたので納得のお値段でした。次はレア物も相談してみたいと思います。この度はありがとうございました。
          </p>
          <div class="voice-staff">
  				  <div class="d-f ai-c">
              <div class="voice-staff-img">
                <img class="-img--resize" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/img-voice-staff-01.png" alt="女性スタッフ" style="max-width: 94px; opacity: 1;">
              </div>
  						<h3 class="voice-ttl">「スピード査定とスムーズなお取引が当店の持ち味です」</h3>
  					</div>
  					<div class="voice-txt">
              この度は宅配買取をご利用いただき、誠にありがとうございました。今回は数多くの鉄道模型を査定させていただきました。経年劣化なども一部見られましたが、人気車両も多く箱ありで状態も良いものでしたので、総合的に頑張ってお値段を出させていただきました。鉄道模型買取の市場は最近特に海外で需要が高まっています。アジアやヨーロッパでも日本の模型は広く認知されていて今回お持ちいただいた中では新幹線や蒸気機関車の模型に海外で人気のモデルがございました。当店ではスムーズにお取引できるようにできるだけ早く査定し、細かくポイントをお伝えすることに努めております。また鉄道模型買取以外にも、ブランド品や骨董品、家電製品、オーディオなど幅広く取り扱っております。どんなお品物でも査定を致しますので、御用の際にはお気軽にご相談ください。引き続きジュエルカフェでは鉄道模型買取強化中です。
            </div>
          </div>
        </div>
      </section>


      <?php get_template_part( 'template-parts/common-tab' );?>

    </div>



<style>

* html .popup_box { position: absolute; }

.btn_open { padding: 5px 10px; background: #759587; border: 0; color: #fff; cursor: pointer; }
#mask { display: none; width: 100%; height: 100%; position: fixed; left: 0; top: 0; background: #000; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)"; filter: alpha(opacity=50); zoom: 1; opacity: 0.5; z-index: 9998; }
* html #mask { position: absolute; }

.popup_box { display: none; width: 90%; height: 300px; position: fixed; top: 50%; left: 50%; z-index: 9999; }

.btn_close { width: 16px; height: 16px; font-size:25px;border: 0; background:transparent;color: #000; cursor: pointer; }

.btn_close:after{
	display: inline-block;
	content: "\00d7";
	font-size:25px;
	width:16px;
	height:16px;
	position: absolute; 
	top: 30px; 
	left: 10px; 
}


@media screen and (min-width: 1000px) {
	
	.popup_box{width:600px;}

	.btn_close:after{ position: absolute; top: 35px; left: 17px; }

}

</style>



<script>

$(function(){


	$(".popup_box").hide();
	
	$("body").append("<div id='mask'></div>");
	
	$("#mask").click(function(){
		$(this).hide();
		$(".popup_box").hide();
	});
	


	$("#mask").show();
	
	
	$(".popup_box").show().html("<button type='button' class='btn_close'></button><div><img src='<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/delivery-popup.jpg' alt='' style='width:100%;'></div>").css({
		marginTop:"-"+$(".popup_box").height()/2+"px" , 
		marginLeft:"-"+$(".popup_box").width()/2+"px" 
	});
	
	
	
	$(".btn_close").click(function(){
		$("#mask").hide();
		$(".popup_box").hide();
	});
	
	return false;

});


</script>




<?php get_footer(); ?>
