<?php if('kaitori' === get_post_type()):?>
  <?php if(has_term(array('ihin-seiri','sake'),'hinmoku')):?>
    <section class="kaitori-resuluts media">
      <div class="common-ttl">
        <div class="section-inner">
		<span class="common-ttl-sub bold">ジュエルカフェの</span>
          <h2 class="kaitori-title">
            <span class="common-ttl-main"><?php the_title( ); ?><span class="color-red">買取方法</span></span>
          </h2>
          <div class="common-ttl-en">How to sell</div>
        </div>
      </div>

      <div class="section-inner">
        <p class="lh-20">ジュエルカフェの<?php the_title( ); ?>買取は、お客様のご都合に合わせて3つの便利な買取方法をご用意しています。<br>どの方法をご利用いただいても、ジュエルカフェなら1点1点丁寧に査定！お客様の<?php the_title( ); ?>を高価買取いたします。</p>

        <div class="tentouKaitoriRecommend">
          <div class="inner">おすすめ！</div>
        </div>

        <div class="d-f tentouKaitori">
          <div class="left">
            <a href="#media-popup" data-media="https://www.youtube.com/embed/qJlshhRX1Rw" target="_blank">
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shucho_image.jpg?random" class="media-capture-img" alt="出張買取">
            </a>
          </div>
          <div class="right d-f">
            <p class="txt1">お客様満足度No1！<br>ジュエルカフェおすすめの<br class="br-sp"><?php the_title( ); ?>買取方法です。</p>
            <h3 class="kaitoriName">出張買取</h3>
            <ul class="tentouKaitoriPoint_pc d-f">
              <li>大量でも安心！</li>
              <li>即日現金お渡し</li>
              <li>スマホ申し込み</li>
              <li>お出かけ不要！</li>
            </ul>
          </div>
        </div>
        <ul class="tentouKaitoriPoint_sp">
          <li>大量でも安心！</li>
          <li>即日現金お渡し</li>
          <li>スマホ申し込み</li>
          <li>お出かけ不要！</li>
        </ul>
        <p class="lh-20">ジュエルカフェの出張買取は「自宅で待つだけ」。面倒な梱包や運び出しもすべてジュエルカフェの専門スタッフが責任持って行います。大量の商品でも安心！</p>

        <h3 id="acMenu" class="detailBtn"><?php the_title( ); ?>の出張買取方法を詳しく見る</h3>
        <div class="buy-flow acMenuContents">
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
        </div>

        <div class="takuhaiSyuttyouKaitori d-f jc-sb">
          <div class="left">
            <div class="head d-f">
              <div class="left">
                <a href="#media-popup" data-media="https://www.youtube.com/embed/tQ39vkGburM" target="_blank">
                  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/tentou_image.jpg?random" class="media-capture-img" alt="店頭買取">
                </a>
              </div>
              <div class="right">
                <p class="txt1">全国<?php echo get_option('shop'); ?>店舗以上！<br>即日現金お渡し！</p>
                <h3 class="kaitoriName">店頭買取</h3>
              </div>
            </div>
            <ul class="point d-f jc-sb">
              <li>スピード査定</li>
              <li>全国<?php echo get_option('shop'); ?>店舗以上</li>
              <li>即日現金お渡し</li>
              <li>女性スタッフ中心</li>
            </ul>
            <p class="lh-18">商品知識豊富な女性スタッフと、ご来店からお支払いまで最短10分のスピード査定！スピード重視・ご相談重視なら、店頭買取がオススメです！</p>
            <div class="linkBtn"><a href="<?php echo esc_url(home_url('shop-buy/'));?>"><?php the_title( ); ?>の店頭買取方法</a></div>
          </div>

          <div class="right">
            <div class="head d-f">
              <div class="left">
                <a href="#media-popup" data-media="https://www.youtube.com/embed/HBuw0iG7e58" target="_blank">
                  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/takuhai_image.jpg?random" class="media-capture-img" alt="宅配買取">
                </a>
              </div>
              <div class="right">
                <p class="txt1">全国送料無料！<br>スマホから<br class="only-sp">簡単申し込み！</p>
                <h3 class="kaitoriName">宅配買取</h3>
              </div>
            </div>
            <ul class="point d-f jc-sb">
              <li>無料発送キット</li>
              <li>スピード査定</li>
              <li>スマホ申し込み</li>
              <li>詰めて送るだけ！</li>
            </ul>
            <p class="lh-18">宅配買取なら無料の発送キットに詰めて送るだけ！パソコンやスマホで24時間お申し込みいただけますので、お店まで出かけるお時間のない方にピッタリです！</p>
            <div class="linkBtn"><a href="<?php echo esc_url(home_url('delivery-buy/'));?>"><?php the_title( ); ?>の宅配買取方法</a></div>
          </div>
        </div>
      </div>
    </section>


  <?php elseif(has_term('card','hinmoku')):?>

		<?php
			if(get_the_terms($post->ID, 'area')){ //品目 - 県ページの場合
				$kaitori_area_parent_id = $post->post_parent;
				$custom_title = get_post( $kaitori_area_parent_id)->post_title;
			} else { //品目ページ -> 投稿のタイトル
				$custom_title = get_the_title( );
			}
		?> 

    <section class="kaitori-resuluts media">
      <div class="common-ttl">
        <div class="section-inner">
		<span class="common-ttl-sub bold">ジュエルカフェの</span>
          <h2 class="kaitori-title">
            <span class="common-ttl-main"><?php echo $custom_title; ?><span class="color-red">買取方法</span></span>
          </h2>
          <div class="common-ttl-en">How to sell</div>
        </div>
      </div>

      <div class="section-inner">
        <p class="lh-20">ジュエルカフェの<?php echo $custom_title; ?>買取は、お客様のご都合に合わせて便利な買取方法をご用意しています。<br>ジュエルカフェなら1点1点丁寧に査定！お客様の<?php echo $custom_title; ?>を高価買取いたします。</p>

        <div class="tentouKaitoriRecommend">
          <div class="inner">おすすめ！</div>
        </div>

        <div class="d-f tentouKaitori">
          <div class="left">
            <a href="#media-popup" data-media="https://www.youtube.com/embed/tQ39vkGburM" target="_blank">
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/tentou_image.jpg?random" class="media-capture-img" alt="店頭買取">
            </a>
          </div>
          <div class="right d-f">
            <p class="txt1">お客様満足度No1！<br>ジュエルカフェおすすめの<br class="br-sp"><?php echo $custom_title; ?>買取方法です。</p>
            <h3 class="kaitoriName">店頭買取</h3>
            <ul class="tentouKaitoriPoint_pc d-f">
              <li>スピード査定</li>
              <li>全国<?php echo get_option('shop'); ?>店舗以上</li>
              <li>即日現金お渡し</li>
            </ul>
          </div>
        </div>
        <ul class="tentouKaitoriPoint_sp">
          <li>スピード査定</li>
          <li>全国<?php echo get_option('shop'); ?>店舗以上</li>
          <li>即日現金お渡し</li>
        </ul>
        <p class="lh-20"><?php echo $custom_title; ?>買取専門店ジュエルカフェは全国<?php echo get_option('shop'); ?>店舗！大型ショッピングセンターや駅前商店街など、お買い物のついでにお気軽にお立ち寄りいただけるロケーションでお待ちしております。商品知識豊富な女性スタッフと、ご来店からお支払いまで最短10分のスピード査定! スピード重視・ご相談重視なら、店頭買取がオススメです！</p>

        <h3 id="acMenu" class="detailBtn"><?php echo $custom_title; ?>の店頭買取方法</h3>
        <div class="buy-flow acMenuContents">
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
        </div>

      </div>
    </section>

  <?php else:?>

		<?php
			if(get_the_terms($post->ID, 'area')){ //品目 - 県ページの場合
				$kaitori_area_parent_id = $post->post_parent;
				$custom_title = get_post( $kaitori_area_parent_id)->post_title;
			} else { //品目ページ -> 投稿のタイトル
				$custom_title = get_the_title( );
			}
		?> 

    <section class="kaitori-resuluts media">
      <div class="common-ttl">
        <div class="section-inner">
			<span class="common-ttl-sub bold">ジュエルカフェの</span>
          <h2 class="kaitori-title">
						<?php if(isset($kaitori_area_parent_id) && $kaitori_area_parent_id):?>
            	<span class="common-ttl-main"><?php echo $post->post_title.'の'.$custom_title; ?><span class="color-red">買取方法</span></span>
						<?php else:?>
							<span class="common-ttl-main"><?php echo $custom_title; ?><span class="color-red">買取方法</span></span>
						<?php endif;?>
          </h2>
          <div class="common-ttl-en">How to sell</div>
        </div>
      </div>

      <div class="section-inner">
        <p class="lh-20">ジュエルカフェの<?php echo $custom_title; ?>買取は、お客様のご都合に合わせて3つの便利な買取方法をご用意しています。<br>どの方法をご利用いただいても、ジュエルカフェなら1点1点丁寧に査定！お客様の<?php echo $custom_title; ?>を高価買取いたします。</p>

        <div class="tentouKaitoriRecommend">
          <div class="inner">おすすめ！</div>
        </div>

        <div class="d-f tentouKaitori">
          <div class="left">
            <a href="#media-popup" data-media="https://www.youtube.com/embed/tQ39vkGburM" target="_blank">
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/tentou_image.jpg?random" class="media-capture-img" alt="店頭買取">
            </a>
          </div>
          <div class="right d-f">
            <p class="txt1">お客様満足度No1！<br>ジュエルカフェおすすめの<br class="br-sp"><?php echo $custom_title; ?>買取方法です。</p>
            <h3 class="kaitoriName">店頭買取</h3>
            <ul class="tentouKaitoriPoint_pc d-f">
              <li>スピード査定</li>
              <li>全国<?php echo get_option('shop'); ?>店舗以上</li>
              <li>即日現金お渡し</li>
            </ul>
          </div>
        </div>
        <ul class="tentouKaitoriPoint_sp">
          <li>スピード査定</li>
          <li>全国<?php echo get_option('shop'); ?>店舗以上</li>
          <li>即日現金お渡し</li>
        </ul>
        <p class="lh-20"><?php echo $custom_title; ?>買取専門店ジュエルカフェは全国<?php echo get_option('shop'); ?>店舗！大型ショッピングセンターや駅前商店街など、お買い物のついでにお気軽にお立ち寄りいただけるロケーションでお待ちしております。商品知識豊富な女性スタッフと、ご来店からお支払いまで最短10分のスピード査定! スピード重視・ご相談重視なら、店頭買取がオススメです！</p>

        <h3 id="acMenu" class="detailBtn"><?php echo $custom_title; ?>の店頭買取方法</h3>
        <div class="buy-flow acMenuContents">
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
        </div>

        <div class="takuhaiSyuttyouKaitori d-f jc-sb">
          <div class="left">
            <div class="head d-f">
              <div class="left">
                <a href="#media-popup" data-media="https://www.youtube.com/embed/HBuw0iG7e58" target="_blank">
                  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/takuhai_image.jpg?random" class="media-capture-img" alt="宅配買取">
                </a>
              </div>
              <div class="right">
                <p class="txt1">全国送料無料！<br>スマホから<br>簡単申し込み！</p>
                <h3 class="kaitoriName">宅配買取</h3>
              </div>
            </div>
            <ul class="point d-f jc-sb">
              <li>無料発送キット</li>
              <li>スピード査定</li>
              <li>スマホ申し込み</li>
              <li>詰めて送るだけ！</li>
            </ul>
            <p class="lh-18">宅配買取なら無料の発送キットに詰めて送るだけ！パソコンやスマホで24時間お申し込みいただけますので、お店まで出かけるお時間のない方にピッタリです！</p>
            <div class="linkBtn"><a href="<?php echo esc_url(home_url('delivery-buy/'));?>"><?php echo $custom_title; ?>の宅配買取方法を詳しく見る</a></div>
          </div>

          <div class="right">
            <div class="head d-f">
              <div class="left">
                <a href="#media-popup" data-media="https://www.youtube.com/embed/qJlshhRX1Rw" target="_blank">
                  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shucho_image.jpg?random" class="media-capture-img" alt="出張買取">
                </a>
              </div>

              <div class="right">
                <p class="txt1">大量の商品でも安心！<br>ご自宅までお伺いして<br>査定いたします！</p>
                <h3 class="kaitoriName">出張買取</h3>
              </div>
            </div>
            <ul class="point d-f jc-sb">
              <li>大量でも安心！</li>
              <li>即日現金お渡し</li>
              <li>スマホ申し込み</li>
              <li>お出かけ不要！</li>
            </ul>
            <p class="lh-18">ジュエルカフェの出張買取は「自宅で待つだけ」。面倒な梱包や運び出しもすべてジュエルカフェの専門スタッフが責任持って行います。大量の商品でも安心！</p>
            <div class="linkBtn"><a href="<?php echo esc_url(home_url('trip-buy/'));?>"><?php echo $custom_title; ?>の出張買取方法を詳しく見る</a></div>
          </div>
        </div>
      </div>
    </section>


  <?php endif;?>
<?php endif;?>
