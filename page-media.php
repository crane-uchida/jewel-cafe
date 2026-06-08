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



    <div class="main-section">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/static/media-img.jpg" class="mb-12 " alt="CM・メディア掲載">
    </div>

    <div class="section-inner">
      <h3 class="ttl-box-red">JEWEL CAFE テレビCM動画</h3>
      <p class="base-font-size">ジュエルカフェの踊れるゆるキャラ「ジュエルぐま」が、なんとあのMAXと夢のコラボ！キレのあるセクシーダンスを披露してくれました！さらに、これまで放送されてきたCM動画も公開中です！</p>


      <iframe class="mtb-12 w-100per" src="https://www.youtube.com/embed/NtB4XuGdb4U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <iframe class="mtb-12 w-100per" src="https://www.youtube.com/embed/9AKRpA3iFGw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <iframe class="mtb-12 w-100per" src="https://www.youtube.com/embed/5gjyRhd3yzA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <iframe class="mtb-12 w-100per" src="https://www.youtube.com/embed/1l42sNbWskI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>



      <h3 class="ttl-box-red">メディア掲載履歴</h3>

      <section class="company-table">
        <table class="bold">
          <tbody>
              <th>メディア掲載履歴</th>
              <td>TBS「Nスタ」<br>
                  鹿児島テレビ「おしゃべりサラダ」<br>
                  西日本放送「情報あーる」<br>
                  山口放送「熱血テレビ」<br>
                  北海道テレビ「エンプロ」<br>
                  テレビ愛媛「得ダネ！情報局」<br>
                  山陽放送「情報プラス」<br>
                  女性週刊誌「女性自身」<br>
                  全国紙「産経新聞」<br>
                  オンラインメディア「日本経済新聞電子版」<br>
                  （3月号）広告・宣伝「コマーシャルフォト」<br>
                  専門誌「CM NOW」<br>
                  全国紙「読売新聞」<br>
                  （12月号）情報誌「日経エンタテインメント！」<br>
                  （11月号）フリーペーパー「風とロック」<br>
                  （12月号）広告・宣伝「ブレーン」<br>
                  テレビガイド誌「TV station」<br>
                  専門誌「CM INDEX」<br>
                  夕刊紙「夕刊フジ」<br>
                  スポーツ紙「東京スポーツ」<br>
                  オンラインメディア「Yahoo!JAPAN ニュース」<br>
                  オンラインメディア「mixiニュース」<br>
                  オンラインメディア「ORICON CAreer」<br>
                  その他多数
              </td>
            </tr>
          </tbody>
        </table>

        <h3 class="ttl-box-red">お近くのジュエルカフェ店舗を探す</h3>
        <div class="base-font-size">
          <p class="bold">ジュエルカフェ採用サイトはこちら</p>
          <p>〈HP〉<a class="color-red" href="http://www.crane-recruit.com/" target="_blank">http://www.crane-recruit.com/</a></p>
        </div>
      </section>

      <section class="blog-search-shop">
        <h3 class="ttl-box-red">お近くのジュエルカフェ店舗を探す</h3>
        <p>商品知識豊富な女性スタッフと、ご来店からお支払いまで最短10分のスピード査定!スピード重視・ご相談重視なら来店買取がオススメです！</p>
      </section>

		<div >
        <?php get_template_part( 'template-parts/search-shop-new' );?>
      </div>

      <?php get_template_part( 'template-parts/common-tab' );?>


    </div>

<?php get_footer(); ?>