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









    <div class="section-inner">
      <section class="static-catch">
        <h1 class="section-ja-title">店舗物件募集</h1>
        <picture>
			<source media="(min-width: 961px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/kaihatsu_mv_pc.jpg" class="w-100per " alt="出店店舗を探しています">
			<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/static/kaihatsu_mv_sp.jpg" class="w-100per " alt="出店店舗を探しています">
		</picture>
        <h2 class="static-sub-ttl">ジュエルカフェでは買取専門店の<br>新規出店物件を広く求めております。</h2>
        <p>ジュエルカフェでは全国各地で物件を広く募集しております(ジュエルカフェはすべて直営店です)。<br>
募集要項に見合う物件、又は物件に関する情報をお持ちの方は下記のフォームよりぜひ情報をご提供ください。<br>
なお、弊社は買取専門で行っており、販売は行っておりません。</p>
      </section>

      <section>
        <h3 class="ttl-box-red">募集地域</h3>
        <p>日本全国(北海道から沖縄まで)、海外で物件を探しています。<br>特に下記のエリアは出店を強化しております。</p>
        <dl class="reinforcement-area">
          <dt>北海道・東北圏</dt>
          <dd>北海道、青森、岩手、秋田、福島</dd>
          <dt>北関東・甲信越</dt>
          <dd>新潟、長野、群馬、山梨</dd>
          <dt>首都圏</dt>
          <dd>東京、神奈川</dd>
          <dt>東海・北陸圏</dt>
          <dd>石川、福井、富山、岐阜、静岡</dd>
          <dt>関西・四国圏</dt>
          <dd>大阪、兵庫、滋賀、奈良、和歌山、徳島</dd>
          <dt>九州</dt>
          <dd style="padding-bottom:25px;">佐賀、長崎、宮崎、鹿児島</dd>
          <dt>海外</dt>
          <dd>香港、台湾、マレーシア、タイ、シンガポール、インドネシア、フィリピン<br>※その他アジア圏でも積極的に検討いたします。</dd>
        </dl>
        <p><b style="font-size:1.2em;">※ジュエルカフェはすべて直営店です。</b></p>
      </section>

      <section class="mt-20">
        <div>
          <h3 class="ttl-box-red">物件タイプ</h3>
          <h4 class="static-sub-ttl" style="font-size:1.3em;">ショッピングセンタータイプ</h4>
          <p>坪数：2坪～30坪 (適性10坪前後)<br>
          ※1階以外も検討可<br>
          施設内単独区画、施設吹き抜けブリッジ上、<br>
          エスカレーター下などのデッドスペースでも調整可</p>
          <ul class="proprety-img">
            <li>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/property-img-1.jpg" alt="買取専門店ジュエルカフェ">
            </li>
            <li>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/property-img-2.jpg" alt="買取専門店ジュエルカフェ">
            </li>
            <li>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/property-img-3.jpg" alt="買取専門店ジュエルカフェ">
            </li>
            <li>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/property-img-4.jpg" alt="買取専門店ジュエルカフェ">
            </li>
          </ul>
        </div>
        <div class="mb-20">
          <h4 class="static-sub-ttl" style="font-size:1.3em;">駅前、商店街タイプ</h4>
          <p>坪数：5坪～20坪<br>
          ※1階のみ<br>
          商店街沿い、駅から徒歩5分以内で目につきやすい立地<br>
          近隣にスーパーなどがあればなお可</p>
          <ul class="proprety-img">
            <li>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/property-img-5.jpg" alt="買取専門店ジュエルカフェ">
            </li>
            <li>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/property-img-6.jpg" alt="買取専門店ジュエルカフェ">
            </li>
          </ul>
        </div>
      </section>

      <section>
          <h3 class="ttl-box-red">お問い合わせはこちらから</h3>
          <div class="form property-form">
            <?php the_content(); ?>
          </div>
      </section>


			<?php get_template_part( 'template-parts/common-tab' );?>


    </div>

<?php get_footer(); ?>
