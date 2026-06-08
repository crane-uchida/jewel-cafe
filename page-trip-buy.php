<?php get_header(); ?>


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
      <!-- <a href="/campaign/"> -->
			<div>
				<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/shop-top-bnr.jpg" class="mb-12 " alt="来店予約&ROLEXお買取成立で¥20,000キャッシュバック">
			</div>
      <!-- </a> -->
    </div>

    <div class="section-inner">
      <section class="static-catch">
        <h1 class="section-ja-title">出張買取</h1>
        <picture>
					<source media="(min-width: 961px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shucho_mv_pc.png" class="w-100per ">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shucho_mv_sp.png" class="w-100per " alt="出張買取">
				</picture>
        <h2 class="static-sub-ttl">パソコンや携帯電話で24時間お申し込みOK!<br>ご自宅でお待ちいただくだけで、ジュエルカフェの<br class="only-pc">査定スタッフが伺います！もちろん出張料無料！</h2>
      </section>

      <section class="buy-order">
        <h3 class="buy-order-ttl slash-title">今すぐネットで申し込み！<br class="only-sp">出張買取でらくらく査定！</h3>
        <div class="d-b ta-c">
          <a href="<?php echo esc_url(home_url('form_syuttyou'));?>" class="base-btn">出張買取を申し込む</a><!-- 実装連絡：フォームへのURLを入れてください -->
        </div>
      </section>
	  
	  
	  <div style="border:1px dotted #C80000; padding:20px;">
		<p>現在、多くのお客様より出張買取のお申込みをいただいていることから、より丁寧で迅速な対応を行うため、出張買取の対象商品を以下の3カテゴリに限定させていただいております。</p>
		<div style="color:#C80000; margin:25px 0;">
			<div>【出張買取対象商品】</div>
			<p>貴金属（金・プラチナ製品・ジュエリーなど）</p>
			<p>ブランド品（バッグ・財布・時計・ジュエリーなど）</p>
			<p>骨董品（絵画・茶道具・工芸品など）</p>
		</div>
		<p>なお、上記以外のお品物につきましては、引き続き店頭での買取を承っております。お客様にはご不便をおかけいたしますが、何卒ご理解賜りますようお願い申し上げます。</p>
	  </div>
	  
	  
	  
      <div class="section-inner mb-40">
	
				<?php get_template_part( 'template-parts/search-shop-new' );?>
			
	</div>









	  
	  
	<?php
		/*
	?>
      <section class="media trip-buy">
        <iframe width="100%" height="auto" src="https://www.youtube.com/embed/qJlshhRX1Rw"  frameborder="0" id="video_iframe"></iframe>
      </section>
	<?php
		*/
	?>


      <section>
        <h3 class="ttl-box-red">査定専門スタッフがご自宅まで伺います！遺品整理などもお任せ！</h3>
        <p>ジュエルカフェの出張買取は「自宅で待つだけ」。面倒な梱包や運び出しもすべてジュエルカフェの専門スタッフが責任持って行います。買取希望のお品物の数が多い・・大きくて運べない・・などのご心配もいりません！<br>
遺品整理、コレクション整理などのお見積りもおおくのお客様からご好評をいただいております。捨ててしまう前に、まずはジュエルカフェにご相談ください。</p>
      </section>

      <section class="buy-flow mb-80">
        <h3 class="ttl-box-red">出張でのお買取の流れ</h3>
        <p>インターネットや携帯からかんたん申し込み！<br>店舗まで行くのが面倒な場合や、大型・大量商品で運べない場合には出張買取がオススメです！</p>
        <ul>
          <li>
            <h4 class="buy-flow-ttl">インターネット・<br class="only-sp">お電話からお申し込み</h4>
            <p>こちらのお申し込みフォームより必要事項をご入力ください！折り返し、カスタマーセンターよりお伺いする日程をご相談させていただきます。<br>その際に、お送りいただく商品についてできるだけ詳しく情報をご記入いただけますと、よりスムーズな査定が可能です。</p>
            <div class="flow-number">01</div>
          </li>
          <li>
            <h4 class="buy-flow-ttl">お約束の日時に、<br class="only-sp">査定スタッフがお伺い</h4>
            <p>査定をご希望のお品物は一箇所にまとめておいていただけると大変助かります。<br>掃除や手入れの必要はありません。鑑定書などがありましたらご準備ください。<br>査定は玄関先でも可能ですので、安心してお申し込みください。</p>
            <div class="flow-number">02</div>
          </li>
          <li>
            <h4 class="buy-flow-ttl">査定</h4>
            <p>査定は1点1点、丁寧に行います。事前にお話のなかった品物でもお引き受け可能な場合がございますので当日査定スタッフまでお気軽にお申し出ください。</p>
            <div class="flow-number">03</div>
          </li>
          <li>
            <h4 class="buy-flow-ttl">査定結果のお知らせ・<br class="only-sp">お支払い</h4>
            <p>品物を拝見した後、お客様に査定金額をご提示いたします。お客様にご納得いただけましたら買取成立とさせていただき、その場で現金をお支払いいたします。</p>
            <div class="flow-number">04</div>
          </li>
        </ul>
      </section>


      <?php get_template_part( 'template-parts/common-kaitori-results' );?>


      <section class="purchase">

				<?php get_template_part( 'template-parts/common-purchase-item' );?>

      </section>



		








      <section class="kaitori-policy">
        <div class="policy-inner section-inner">

          <div class="head flex -jscenter ls_15">
            <div class="common-ttl policy-ttl">
              <div class="section-inner">
                <h2 class="kaitori-title">
                  <span class="common-ttl-sub">ジュエルカフェが</span>
                  <span class="common-ttl-main"><span class="marker-yellow"><span class="color-red"><?php the_title(); ?></span>に</span><br><span class="marker-yellow">強い理由</span></span>
                </h2>
              </div>
            </div>
          </div>

          <div class="body">
            <div class="policies">

              <div class="policy-item d-f -alstretch">
                <div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/shucho/strong_reason01.jpg" alt="全国対応の広い出張エリア"></div>
                <div class="policy-item-inner">
                  <div class="policy-img-txt">
                    <div class="policy-img-txt-number tac fc_red flex">
                      <div class="policy-img-txt-sub color-red"><?php the_title(); ?>に強い理由</div>
                      <div class="number">1</div>
                    </div>
                    <div class="policy-title"><h3>全国対応の出張エリア</h3></div>
                    <div class="policy-text">ジュエルカフェは全国展開の店舗ネットワークを活かし、各拠点からお客様のご自宅まで専門スタッフが伺います。首都圏だけでなく国内全域にて出張買取を実施していますので、近くに買取店がないお客様もご安心ください。</div>
                  </div>
                </div>
              </div>

              <div class="policy-item d-f -alstretch">
                <div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/shucho/strong_reason02.jpg" alt="出張料・手数料すべて無料"></div>
                <div class="policy-item-inner">
                  <div class="policy-img-txt">
                    <div class="policy-img-txt-number tac fc_red flex">
                      <div class="policy-img-txt-sub color-red"><?php the_title(); ?>に強い理由</div>
                      <div class="number">2</div>
                    </div>
                    <div class="policy-title"><h3>出張料・手数料無料</h3></div>
                    <div class="policy-text">ジュエルカフェは出張査定に際し、手数料などを一切いただいておりません。もちろん、査定額にご満足いただけない場合の代金も無料です。値段がつくかわからないようなお品物でも、お気軽にご相談ください。</div>
                  </div>
                </div>
              </div>

              <div class="policy-item d-f -alstretch">
                <div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/shucho/strong_reason03.jpg" alt="プロの査定スタッフ"></div>
                <div class="policy-item-inner">
                  <div class="policy-img-txt">
                    <div class="policy-img-txt-number tac fc_red flex">
                      <div class="policy-img-txt-sub color-red"><?php the_title(); ?>に強い理由</div>
                      <div class="number">3</div>
                    </div>
                    <div class="policy-title"><h3>プロの査定スタッフ</h3></div>
                    <div class="policy-text">ジュエルカフェではプロの査定スタッフが丁寧に査定いたします。最新の価格データ、市場相場を加味して自信を持って査定し、お客様にご満足いただける価格をご提示できるように日々努めております。</div>
                  </div>
                </div>
              </div>

              <div class="policy-item d-f -alstretch">
                <div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/shucho/strong_reason04.jpg" alt="海外に展開・独自販売ルートの確立"></div>
                <div class="policy-item-inner">
                  <div class="policy-img-txt">
                    <div class="policy-img-txt-number tac fc_red flex">
                      <div class="policy-img-txt-sub color-red"><?php the_title(); ?>に強い理由</div>
                      <div class="number">4</div>
                    </div>
                    <div class="policy-title"><h3>海外に展開・独自販売ルートの確立</h3></div>
                    <div class="policy-text">ジュエルカフェでは海外にも多数の営業拠点を展開。お買取した商品は国内外のネットワークを活かして販売に繋げるため、より高い高価買取を実現できます。</div>
                  </div>
                </div>
              </div>

              <div class="policy-item d-f -alstretch">
                <div class="policy-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/shucho/strong_reason05.jpg" alt="直営300店舗の信頼と実績"></div>
                <div class="policy-item-inner">
                  <div class="policy-img-txt">
                    <div class="policy-img-txt-number tac fc_red flex">
                      <div class="policy-img-txt-sub color-red"><?php the_title(); ?>に強い理由</div>
                      <div class="number">5</div>
                    </div>
                    <div class="policy-title"><h3>直営300店舗の安心感</h3></div>
                    <div class="policy-text">ジュエルカフェでは直営店舗として300店舗以上の店舗を大型ショッピングセンターを中心に展開し、これまでに300万人以上のお客様にお売りいただいております。これからもお客様に信頼していただけるよう努めてまいります。</div>
                  </div>
                </div>
              </div>

          </div>

        </div><!-- bg -->
      </section>











      <section class="kaitori-voice">
        <h3 class="ttl-box-red">ご利用いただいたお客様の声</h3>
        <div class="voice-list">
          <h3 class="voice-ttl">「初めて出張買取を利用しました」</h3>
          <p class="voice-txt">定番サイズのアマゾンモノグラムをサイズ違いで3つの他、使わないブランドバッグが沢山ありました。気に入ったものしか結局使わないのでどこかで売れないか考えておりました。<br>
車で30分以内の場所に近くのジュエルカフェがなかった事と行く時間がなかったのでチラシに記載があった出張買取を利用させて頂きました。すぐ折り返しお電話があり、迅速に対応して頂きました。驚いたのが電話の方も出張買取の担当の方もとても親切丁寧に対応して下さった事です。<br>
自分へのご褒美としてコツコツと集めたダミエ　アマゾン他のブランドバッグですから長年愛用していたのでお値段がつくかどうかも不安でしたが、納得いくまで説明して下さり、想像以上に高価買取で大変勉強になりました。総合パンフレットを頂きましたので参考にしながら自宅にいらない物を探します。また、利用させて頂きます。有難うございました。
          </p>
          <div class="voice-staff">
  				  <div class="d-f ai-c">
              <div class="voice-staff-img">
                <img class="-img--resize" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/img-voice-staff-01.png" alt="女性スタッフ" style="max-width: 94px; opacity: 1;">
              </div>
  						<h3 class="voice-ttl">「アマゾン買取ならジュエルカフェにお任せください！」</h3>
  					</div>
  					<div class="voice-txt">
              先日はたくさんある買取専門店の中から、当店をお選び頂き、出張買取をご利用頂きましてありがとうございました。<br>
アマゾンは、ストラップの調節できるショルダーバッグで見た目は小さいですが、普段持ち歩く財布・携帯等の小物関係は収納可能です。定番のショルダーバックであるため男女兼用で初期の頃から男女問わず愛され続けている不屈の名作です。中古市場でも人気が高く持込みも多いお品物になります。<br>
サイズも4サイズあり、見せて頂いたアマゾンは、3サイズありとてもいい状態でしたのでお値段を高く出させて頂きました。当店の査定結果にご納得いただき、大変嬉しく思っております。<br>
ジュエルカフェは只今、アマゾン買取の他のブランドバッグ買取を強化中で、沢山のお客様より日々アマゾンはじめルイヴィトンのお持ち込みとお問い合わせを頂いております。海外販売ルートに強い当社だからこそ他店よりも高く買い取れる自信を持っております。またアマゾン以外にもルイヴィトン買取をご希望の際には、ぜひお気軽にお問い合わせください。
            </div>
          </div>
        </div>
        <hr>
        <div class="voice-list">
          <h3 class="voice-ttl">「出張買取を申し込みました」</h3>
          <p class="voice-txt">趣味で集めていたノリタケ食器が大量に増えてしまい、昔は飾っていたり実際に使用していましたが、歳をとるにつれて不要なものが多く出てきました。処分するにも一人では難しく、処分費用もかかるので、他のいらないものを含めて買取してくれるところがないかとふとお店を探してみることにしました。すると近くのジュエルカフェでノリタケ買取を強化している事を知り、電話で問い合わせて、持ち込みが大変だったので、スタッフさんの案内もあって家に査定に来てもらうことにしました。当日来てくださったスタッフの方は大変丁寧に商品を扱ってくださり、査定の結果では処分に困っていた物全てを買取していただくことになりました。1点1点に査定してくださり、処分に困っていた物を買い取っていただけて本当に感謝しております。
          </p>
          <div class="voice-staff">
  				  <div class="d-f ai-c">
              <div class="voice-staff-img">
                <img class="-img--resize" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/img-voice-staff-01.png" alt="女性スタッフ" style="max-width: 94px; opacity: 1;">
              </div>
  						<h3 class="voice-ttl">「幅広い買取スタイルで対応致しております」</h3>
  					</div>
  					<div class="voice-txt">
              この度は出張買取をご利用いただきまして誠にありがとうございました。ジュエルカフェではお客様のニーズに合わせて店頭買取・出張買取・宅配買取の3つの買取方法をご用意しております。お問合せで店頭までご来店下さったお客様にも、お客様に合う買取方法をご案内し査定させて頂きます。この度は店頭のお問合せから出張買取のご案内をさせて頂きました。拝見させていただきましたお品物ですが、ノリタケ製品が多く、熱狂的なファンも多いオールドノリタケのシリーズもございましたので、できるだけ高くお買取りできるようにお見積りを出させていただきました。そしてご満足いただけたというお言葉を頂き、嬉しい限りです。今後も買取・サービス共にお客様に満足いただける様に精進致します。
            </div>
          </div>
        </div>
        <hr>
        <div class="voice-list">
          <h3 class="voice-ttl">「部屋が大分片付きました、出張買取を利用して良かったです」</h3>
          <p class="voice-txt"> ギターは趣味でやっていたのですが、仕事で多忙な日々を過ごしているうちに、いつの間にかインテリアになっていました。コレクションとして持っていてもスペースを取るので思い切って処分することにしました。ジュエルカフェのチラシを見て出張ギター買取をしている事を知りましたので問い合わせさせていただきました。沢山のアイテムを買取りしているようで、あれも売れるかこれも売れるかと長々と電話してしまい、家にある電動工具も売れそうだったので一緒に査定をお願いしました。後日来ていただいたスタッフも事前に問い合わせの内容を把握しておりスムーズに売ることができました。
          </p>
          <div class="voice-staff">
  				  <div class="d-f ai-c">
              <div class="voice-staff-img">
                <img class="-img--resize" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/img-voice-staff-01.png" alt="女性スタッフ" style="max-width: 94px; opacity: 1;">
              </div>
  						<h3 class="voice-ttl">「出張買取はとても便利なサービスです」</h3>
  					</div>
  					<div class="voice-txt">
              この度は出張ギター買取をご利用いただき、そして素敵なお品物をお売りいただきまして誠にありがとうございました。お売りいただいたギターの一つは日本でも知名度の高いフェルナンデス製の布袋氏モデルのギターで国内外で人気ある逸品でした。またマーシャルのアンプも状態が良く、専用ケースや保証書等もございましたので全品高額査定をさせていただきました。その他電動工具や銀食器などもお売りいただきまして、お部屋の整理もできてお客様の笑顔がみれて嬉しかったです。ジュエルカフェは全国300店舗展開しており、海外含め流通ルートには自信がございますので、是非またお売りいただけるものがございましたら当店をご利用ください。ギター買取以外にも様々なアイテムを強化買取中です。お忙しい中ご対応いただきましてありがとうございました。ジュエルカフェは引き続きギター買取強化中です！
            </div>
          </div>
        </div>
      </section>


      <section class="kaitori-faq">
				<div class="common-ttl">
					<div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub"><?php the_title(); ?>の</span>
							<span class="common-ttl-main">よくある<span class="color-red">ご質問</span></span>
						</h2>
						<div class="common-ttl-en">Faq</div>
					</div>
				</div>
				<div class="section-inner">
				<?php if ( get_field('よくあるご質問その1質問') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その1質問'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その1回答'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その2質問') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その2質問'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その2回答'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その3質問') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その3質問'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その3回答'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その4質問') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その4質問'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その4回答'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その5質問') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その5質問'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その5回答'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その6質問') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その6質問'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その6回答'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その7質問') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その7質問'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その7回答'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( get_field('よくあるご質問その8質問') ) : ?>
						<div class="kaitori-faq-list">
							<dl>
								<dt>
									<div class="d-f mb-4">
										<div class="faq-icon mr-4 bold">Q</div>
										<div class="faq-txt bold"><?php the_field('よくあるご質問その8質問'); ?></div>
									</div>
								</dt>
								<dd>
									<div class="d-f">
										<div class="faq-icon color-red mr-4">A</div>
										<div class="faq-txt"><?php the_field('よくあるご質問その8回答'); ?></div>
									</div>
								</dd>
							</dl>
						</div>
					<?php endif; ?>

				</div>
			</section>

			<?php get_template_part( 'template-parts/common-tab' );?>

    </div>

<?php get_footer(); ?>
