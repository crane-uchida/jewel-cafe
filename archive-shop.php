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
          padding-top: 0px;
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
			</style>
			<?php kaitori_breadcrumb();?>
		</section>
	</div>





		
	<?php
		if ( !wp_is_mobile() ) {
	?>
      <section class="section-inner">
        <h1 class="section-ja-title mb-8">ジュエルカフェの店舗案内</h1>
        <div class="mb-32"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/archive_shop_mv.jpg" alt="ジュエルカフェの店舗案内"></div>
        <p class="mb-32">ジュエルカフェは業界最大級の全国300店舗！<br>
				地元の方に人気のショッピングモールや便利な駅前商店街などアクセス抜群の好立地が自慢です！<br>
				その場で査定、お支払いをご希望の方は、お近くのジュエルカフェまでお越しください！
		</p>
      </section>
	  
	  
	   <?php get_template_part('template-parts/store-area'); ?>
	 
	<?php
	
		}else{
		
	?> 
	 
	 

      <section class="shop-catch section-inner">
		 <h1 class="section-ja-title">ジュエルカフェの店舗案内</h1>
     <div class="mb-24"><img style="max-width:100%; height:auto;" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/archive_shop_mv.jpg" alt="ジュエルカフェの店舗案内"></div>
        <p>ジュエルカフェは業界最大級の全国300店舗！<br>
地元の方に人気のショッピングモールや便利な駅前商店街などアクセス抜群の好立地が自慢です！<br>
その場で査定、お支払いをご希望の方は、お近くのジュエルカフェまでお越しください！</p>

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
