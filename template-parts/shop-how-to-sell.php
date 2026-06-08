
		<?php
			if(get_the_terms($post->ID, 'area')){ //品目 - 県ページの場合
				$kaitori_area_parent_id = $post->post_parent;
				$custom_title = get_post( $kaitori_area_parent_id)->post_title;
			} else { //品目ページ -> 投稿のタイトル
				$custom_title = get_the_title( );
			}
		?> 

    <section class="kaitori-resuluts media">
	

      <div class="section-inner">
	  
		<div class="static-catch" style="padding-top:20px;">
			<h2 class="static-sub-ttl">ご自宅でらくらく！宅配買取& 出張買取もご利用いただけます！</h2>
		</div>


        <div class="takuhaiSyuttyouKaitori d-f jc-sb">
          <div class="left">
            <div class="head d-f">
              <div class="left">
                <a href="#media-popup" data-media="https://www.youtube.com/embed/HBuw0iG7e58" target="_blank">
                  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/takuhai_image.jpg?random" class="media-capture-img">
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
            <p class="lh-18 ta-l">宅配買取なら無料の発送キットに詰めて送るだけ！パソコンやスマホで24時間お申し込みいただけますので、お店まで出かけるお時間のない方にピッタリです！</p>
            <div class="linkBtn"><a href="<?php echo esc_url(home_url('delivery-buy/'));?>">宅配買取方法を詳しく見る</a></div>
          </div>

          <div class="right">
            <div class="head d-f">
              <div class="left">
                <a href="#media-popup" data-media="https://www.youtube.com/embed/qJlshhRX1Rw" target="_blank">
                  <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/shucho_image.jpg?random" class="media-capture-img">
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
            <p class="lh-18 ta-l">ジュエルカフェの出張買取は「自宅で待つだけ」。面倒な梱包や運び出しもすべてジュエルカフェの専門スタッフが責任持って行います。大量の商品でも安心！</p>
            <div class="linkBtn"><a href="<?php echo esc_url(home_url('trip-buy/'));?>">出張買取方法を詳しく見る</a></div>
          </div>
        </div>
      </div>
    </section>
