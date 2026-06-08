<?php
/*
Template Name: 店舗一覧
*/
?>

<?php get_header( );?>


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
          .breadcrumbs_type2 span {
              color: #fff;
              line-height: 40px;
              padding: 0 3%;
          }
				}
				footer .section-inner .footer-txt{
					display:none;
				}
				img.mv{
					max-width:100%;
					height:auto;
				}
			</style>
			<?php kaitori_breadcrumb();?>
		</section>
	</div>

	<script>
        $(document).ready(function() {
            $('.breadcrumbs_type2 span').each(function() {
                if ($(this).text().trim() === "店舗案内") {
                    $(this).text("ジュエルカフェVポイント10倍キャンペーン");
                }
            });
        });
    </script>



		
	<?php
		if ( !wp_is_mobile() ) {
	?>
      <section class="section-inner">
        <h1 class="section-ja-title mb-8">ジュエルカフェVポイント10倍キャンペーン</h1>
        <div class="mb-32">
			
			<img class="only-pc" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/archive_vpoint10-shop_mv_pc.jpg" alt="ジュエルカフェVポイント10倍キャンペーン">
		</div>
        <p class="mb-32">ジュエルカフェは全国300店舗展開の買取専門店！お家に眠っているご不要なジュエリー・ブランド品を最新相場で高価買取いたします。<br>
		期間中ならダブルでVポイントもお得にゲットできるチャンス!このお得な機会をお見逃しなく！<br>
		皆様のご来店をお待ちしております。
		</p>




<div style="font-size: 12px; margin-top:15px;margin-bottom:5px; font-weight:bold;" class="alert_title">Vポイント10倍キャンペーンのご注意事項</div>
<ul style="font-size: 10px; list-style: none; margin-bottom: 45px;" class="alert_contents">
    <li><span style="color:#C80000;">●</span>Vポイント（旧Tポイント）お取り扱い店に限ります。</li>
    <li><span style="color:#C80000;">●</span>有効なVカードを必ずご持参いただき、こちらの画面をスタッフにご提示ください。</li>
    <li><span style="color:#C80000;">●</span>貴金属ジュエリー・ブランド品が対象になります。金券・切手など一部対象外商品がございますので、予めご了承ください。</li>
    <li><span style="color:#C80000;">●</span>お一人様1回限りとなります。</li>
    <li><span style="color:#C80000;">●</span>Vポイントはご来店・買取ご成約の翌日以降の付与を予定しております。</li>
    <li><span style="color:#C80000;">●</span>通常ポイントはご成約金額200円= 1ポイントです。</li>
    <li><span style="color:#C80000;">●</span>ポイント付与の上限は5000ポイントとなります。</li>
    <li><span style="color:#C80000;">●</span>キャンペーン期間は2025年2月28日までとなります。</li>
    <li><span style="color:#C80000;">●</span>このキャンペーンに関するお問い合わせは<a href="mailto:info@crane-a.co.jp">こちら</a>から</li>
</ul>










      </section>
	  
	  
	   <?php get_template_part('template-parts/store-area'); ?>
	 
	<?php
	
		}else{
		
	?> 
	 
	 

      <section class="shop-catch section-inner">
		 <h1 class="section-ja-title">ジュエルカフェ<br>Vポイント10倍キャンペーン</h1>
     <div class="mb-24">
		 <img class="only-sp mv" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/archive_vpoint10-shop_mv_sp.jpg" alt="ジュエルカフェVポイント10倍キャンペーン">
	 </div>
        <p class="mb-32">ジュエルカフェは全国300店舗展開の買取専門店！お家に眠っているご不要なジュエリー・ブランド品を最新相場で高価買取いたします。<br>
		期間中ならダブルでVポイントもお得にゲットできるチャンス!このお得な機会をお見逃しなく！<br>
		皆様のご来店をお待ちしております。
		</p>


		<div style="font-size: 12px; margin-top:15px;margin-bottom:5px; font-weight:bold;" class="alert_title">Vポイント10倍キャンペーンのご注意事項</div>
<ul style="font-size: 10px; list-style: none; margin-bottom: 15px;" class="alert_contents">
    <li><span style="color:#C80000;">●</span>Vポイント（旧Tポイント）お取り扱い店に限ります。</li>
    <li><span style="color:#C80000;">●</span>有効なVカードを必ずご持参いただき、こちらの画面をスタッフにご提示ください。</li>
    <li><span style="color:#C80000;">●</span>貴金属ジュエリー・ブランド品が対象になります。金券・切手など一部対象外商品がございますので、予めご了承ください。</li>
    <li><span style="color:#C80000;">●</span>お一人様1回限りとなります。</li>
    <li><span style="color:#C80000;">●</span>Vポイントはご来店・買取ご成約の翌日以降の付与を予定しております。</li>
    <li><span style="color:#C80000;">●</span>通常ポイントはご成約金額200円= 1ポイントです。</li>
    <li><span style="color:#C80000;">●</span>ポイント付与の上限は5000ポイントとなります。</li>
    <li><span style="color:#C80000;">●</span>キャンペーン期間は2025年2月28日までとなります。</li>
	<li><span style="color:#C80000;">●</span>このキャンペーンに関するお問い合わせは<a href="mailto:info@crane-a.co.jp">こちら</a>から</li>
</ul>








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

<?php get_footer( );?>
