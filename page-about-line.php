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
        <h1 class="section-ja-title">LINE査定のご案内</h1>
<?php /* ?> //年末年始休業のお知らせ
        <p style="border:2px dotted #de1122; padding: 20px; line-height: 2; font-size:16px; margin-bottom:30px;">誠に勝手ながら、LINE査定は<span style="font-weight:bold; color:#de1122;">12月27日(水)から1月4日(木)まで年末年始休業</span>とさせて頂きます。<br>休業期間中のお申込みにつきましては、1月5日(金)から順次対応させて頂きます。<br>何卒ご了承下さいますようお願い申し上げます。</p>
<?php */ ?>
        <picture>
					<source media="(min-width: 961px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/line_mv_pc.png" class="w-100per ">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/line_mv_sp.png" class="w-100per " alt="LINE買取">
				</picture>
      </section>

      <section class="buy-order buy-order-line">
        <h3 class="buy-order-ttl slash-title">今すぐLINEから申し込み！<br class="only-sp">らくらく査定！</h3>
        <div class="d-b ta-c">
          <a href="https://lin.ee/LOhLTBd" class="base-btn">ジュエルカフェを友だちに追加</a><!-- 実装連絡：フォームへのURLを入れてください -->
        </div>
      </section>

      <section class="buy-flow buy-flow-line">
        <h3 class="ttl-box-red">LINE査定の流れ</h3>
        <ul>
          <li>
            <div class="pc-flex">
              <h4 class="buy-flow-ttl only-sp">スマホカメラで撮る</h4>
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/line-step1.png" alt="買取商品をスマホカメラで撮る">
              <div>
                <h4 class="buy-flow-ttl only-pc">スマホカメラで撮る</h4>
                <p>査定をご希望の商品をスマホのカメラで撮影してください。<br>全体・商品タグなどのアップ・キズがあればその部分のアップなど、複数いただけますとよりスムーズな査定が可能です。</p>
              </div>
            </div>
            <div class="flow-number">01</div>
          </li>
          <li>
            <div class="pc-flex">
              <h4 class="buy-flow-ttl only-sp">LINEアプリで送る</h4>
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/line-step2.png" alt="買取商品の画像をLINEで送る">
              <div>
                <h4 class="buy-flow-ttl only-pc">LINEアプリで送る</h4>
                <p>LINEアプリからお送りください。 わかる範囲でモデル名・購入時期・キズの有無もお知らせください。査定金額がより正確になります。</p>
              </div>
            </div>
            <div class="flow-number">02</div>
          </li>
          <li>
            <div class="pc-flex">
              <h4 class="buy-flow-ttl only-sp">ジュエルカフェが査定</h4>
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/line-step3.png" alt="買取商品を査定">
              <div>
                <h4 class="buy-flow-ttl only-pc">ジュエルカフェが査定</h4>
                <p>担当スタッフの査定が完了次第、お客様にご返信いたします。ご質問などございましたらお気軽にお申し付けください。</p>
              </div>
            </div>
            <div class="flow-number">03</div>
          </li>
        </ul>
      </section>

      <section class="about-line-point">
        <h3 class="ttl-box-red">高く売るための写真撮影ポイント</h3>
        <div class="pc-flex">
          <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/line-point.png" alt="買取商品の撮影のポイント">
          <div>
            <ul>
              <li>明るい場所で撮影</li>
              <li>画面をタップして商品にピントを合わせる</li>
              <li>目立つ汚れやキズもわかりやすく</li>
            </ul>
            <p>アップで撮っていただけると更に正確に!<br>・ジュエリー・貴金属の刻印 （K18 / Pt900など）<br>・時計の盤面やバックル<br>・ギャランティカードや保証書</p>
          </div>
        </div>
      </section>

      <section class="buy-order buy-order-line">
        <h3 class="buy-order-ttl slash-title">今すぐLINEから申し込み！<br class="only-sp">らくらく査定！</h3>
        <div class="d-b ta-c">
          <a href="https://lin.ee/LOhLTBd" class="base-btn">ジュエルカフェを友だちに追加</a><!-- 実装連絡：フォームへのURLを入れてください -->
        </div>
      </section>

      <section class="purchase">

				<?php get_template_part( 'template-parts/common-purchase-item' );?>

      </section>

      <section class="feature">
        <div class="section-inner">
          <div class="only-sp">
            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/feature-sp.jpg" class="w-100per mb-32" alt="ジュエルカフェが選ばれる3つの理由">
          </div>
          <div class="feature-content">
            <div class="only-pc">
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/top/feature-pc.jpg" alt="ジュエルカフェが選ばれる3つの理由">
            </div>
            <div class="feature-txt-wrapper">
              <div class="feature-txt">
                <div class="d-f">
                  <p class="color-red feature-reason-ttl sofia">REASON<span class="ta-c sofia bold lh">1</span></p>
                  <div>
                    <h6 class="feature-reason-txt-ttl">業界最大級!日本全国300店舗以上の便利な立地</h6>
                    <p class="feature-reason-txt">ジュエルカフェは日本全国に直営店300店舗以上を展開する超大型買取専門店！多くのお客様からの信頼とリピートをいただき、圧倒的な買取実績を誇ります。大手ショッピングセンター内や駅前商店街など、便利な場所にございます。</p>
                  </div>
                </div>
              </div>
              <div class="feature-txt">
                <div class="d-f">
                  <p class="color-red feature-reason-ttl sofia">REASON<span class="ta-c sofia bold">2</span></p>
                  <div>
                    <h6 class="feature-reason-txt-ttl">小さなもの1つからでも驚きの高価買取</h6>
                    <p class="feature-reason-txt">ジュエルカフェは小さなアクセサリー1つからでも専門スタッフが丁寧に査定。最新の市場相場を加味して最大価格にてお買取しています。古いもの・壊れているものでもお買取できますのでお気軽に無料査定をご利用ください。</p>
                  </div>
                </div>
              </div>
              <div class="feature-txt">
                <div class="d-f">
                  <p class="color-red feature-reason-ttl sofia">REASON<span class="ta-c sofia bold">3</span></p>
                  <div>
                    <h6 class="feature-reason-txt-ttl">お客様に喜んでいただくための充実のサービス</h6>
                    <p class="feature-reason-txt">お客様から大好評の無料ジュエリークリーニング、リピート時にご利用いただける増額クーポン、店舗でのドリンクサービスなど、ご来店の感謝を込めてたくさんの無料サービスをご用意しております。キャンペーンで景品プレゼントがあることも。</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <?php get_template_part( 'template-parts/common-tab' );?>

    </div>

<?php get_footer(); ?>
