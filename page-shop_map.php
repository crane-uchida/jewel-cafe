<?php get_header( );?>



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
				.breadcrumbs > .section-inner{
					width: 1000px!important;
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


	<div class="section-inner">


<?php /* ?>
		<div class="api_current_location_button" id="current_location"><a href="#" class="">現在地から探す</a></div>
<?php */ ?>


		<div action="#" class="api_search_box">
			<label>
				<input type="text" placeholder="地名・駅名で探す" id="locationInput">
			</label>
			<button type="submit" aria-label="検索" id="locationSubmit"></button>
		</div>


		<div class="api_aside_box">
		  <div class="wrap">
			<div class="actions">
			
			<?php if (!wp_is_mobile() ): ?>	
			  <div class="item fullsize">
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="全画面で見る" class="icon lazyload" data-src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon/icon_fullsize.svg" decoding="async"><noscript><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon/icon_fullsize.svg" alt="全画面で見る" class="icon" data-eio="l"></noscript>
				<span class="text">全画面<br>で見る</span>
			  </div>
			 <?php endif; ?>
			  
			  
			  <div class="item current_location" id="current_location2">
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="現在地に戻る" class="icon lazyload" data-src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon/icon_current_location2.svg" decoding="async"><noscript><img src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon/icon_current_location2.svg" alt="現在地に戻る" class="icon" data-eio="l"></noscript>
				<span class="text">現在地に<br>戻る</span>
			  </div>
			</div>
		  </div>
		</div>

		<div id="map"></div>
	 


	</div>

</div>

<style>
	.gm-control-active.gm-fullscreen-control,
	.gm-style-mtc,
	.footer-txt{
		display:none;
	}
	#footer{
		margin-top:0!important;
	}
	#map{
		width:100%;
		height:700px;
		height: calc(100dvh - 55.55px);
	}
	@media screen and (min-width: 1000px){
		#map{
			height:800px;
			height: calc(100vh - 75px);
		}
	}
</style>


<!-- .api_aside_box要素がページ上から800px以上スクロールされたらゆっくりと非表示にするアニメーションを実行 -->
<script>
	$(document).ready(function() {
		// スクロールイベントハンドラを設定
		$(window).scroll(function() {
			// スクロール位置を取得
			var scrollPosition = $(window).scrollTop();
			if (scrollPosition >= 800) {
				$(".api_aside_box,.api_search_box").fadeOut('slow');
			} else {
				$(".api_aside_box,.api_search_box").fadeIn('slow');
			}
		});
	});
</script>




  <!-- 動作処理 -->
  <script>
  
	var map;
	var markers = [];
	var infoWindows = [];
	var initialMapOptions; // 초기 지도 옵션을 저장할 변수
	var currentLocationMarker; // 현재 위치를 나타내는 마커


	
    // 現在地取得処理
    window.initMap = function () {
		

      // Geolocation APIに対応している
      if (navigator.geolocation) {
        // 現在地を取得
        navigator.geolocation.getCurrentPosition(
          // 取得成功した場合
          function(position) {
            // 緯度・経度を変数に格納
            var mapLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			
			
            // マップオプションを変数に格納
            initialMapOptions = {
              zoom : 13,          // 拡大倍率
              center : mapLatLng  // 緯度・経度
            };
            // マップオブジェクト作成
            map = new google.maps.Map(
              document.getElementById("map"), // マップを表示する要素
              initialMapOptions         // マップオプション
            );
			

            //　マップにマーカーを表示する
            var marker = new google.maps.Marker({
              map : map,             // 対象の地図オブジェクト
			  icon : 'https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon/shop_icon.png',
              position : mapLatLng   // 緯度・経度
            });




				<?php

						$args = array(
							'post_type' => 'shop',
							'post_parent' => 0,
							'numberposts' => '-1',
						);

						$shop_posts = get_posts($args);


						
						foreach($shop_posts as $key=>$value){
						
						$post_meta = get_post_meta($value->ID);
						
						
						if($value->post_name == 'omotesando'){ continue; }
						

						$area_terms = get_the_terms( $value->ID, 'area' );
						
						if(is_array($area_terms)){
								
							foreach($area_terms as $term) {
								if($term->parent === 0) {
									
									 $area_parent_id = $term->term_id;
									 
									 $area_parent_name = $term->slug;
								}
							}
							foreach($area_terms as $term) {
								
								
								if($term->parent === $area_parent_id) {
									$area_child_id = $term->term_id;
									
									$area_child_name = $term->slug;
								}
							}
							foreach($area_terms as $term) {
								if($term->parent === $area_child_id) {
									$area_grandchild_name = $term->slug;
								}
							}
						
						}
				?>



					var address = "<?php echo str_replace(array("\r", "\n"), ' ', $post_meta['所在地'][0]); ?>";


					
					var geocoder = new google.maps.Geocoder();
					
					geocoder.geocode({ address: address }, function (results, status) {
						if (status === 'OK' && results[0]) {

							var add_marker = new google.maps.Marker({
							position: new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()),
							animation: google.maps.Animation.DROP,
							icon : 'https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon/shop_icon2.png',
							map: map
							});
							

				const contentString = '<div class="api_shop_information"><div class="name"><?php echo $value->post_title;?></div><div class="address"><?php echo str_replace(array("\r", "\n"), ' ', $post_meta['所在地'][0]); ?></div><div class="detail_button"><a href="/shop/<?php echo $area_parent_name;?>/<?php echo $area_child_name;?>/<?php echo $area_grandchild_name;?>/<?php echo $value->post_name;?>" class="arrow">詳しく見る</a></div></div>';

							
							const infoWindow = new google.maps.InfoWindow({
							  content: contentString,
							});


							add_marker.addListener("click", () => {
								
								infoWindows.forEach((infoWindow) => {
									infoWindow.close();
								});
														
								infoWindow.open(map, add_marker);
							});
							
							markers.push(add_marker);
							infoWindows.push(infoWindow);
									

							
						} else {
							return;
						}
					});

				<?php
					
						}
				?>
	

          },
          // 取得失敗した場合
          function(error) {
            // エラーメッセージを表示
            switch(error.code) {
              case 1: // PERMISSION_DENIED
                alert("位置情報の利用が許可されていません");
                break;
              case 2: // POSITION_UNAVAILABLE
                alert("現在位置が取得できませんでした");
                break;
              case 3: // TIMEOUT
                alert("タイムアウトになりました");
                break;
              default:
                alert("その他のエラー(エラーコード:"+error.code+")");
                break;
            }
          }
        );
      // Geolocation APIに対応していない
      } else {
        alert("この端末では位置情報が取得できません");
      }
    }
	

$('#locationSubmit').on('click', function() {
	
	
    var addressInput = document.getElementById("locationInput").value;

    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ address: addressInput }, function(results, status) {
        if (status === 'OK' && results[0]) {
            var addressLocation = results[0].geometry.location;

            // 지도 이동
            map.setOptions({
                zoom: 13, // 확대 수준 설정
                center: addressLocation // 주소 위치로 중심 설정
            });

            // 마커 표시
            var addressMarker = new google.maps.Marker({
                map: map,
                position: addressLocation,
                icon: 'https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon/address_marker.png'
            });
        } else {
            alert("住所が見つかりません。");
        }
    });
});




	

$('#current_location , #current_location2').on('click', function() {
	
	if (navigator.geolocation) {	
		navigator.geolocation.getCurrentPosition(function(position) {
			var currentLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

			// 현재 위치로 지도 이동
			if (map) { // map 객체가 정의되었을 때만 실행
				map.setOptions({ // setOptions 메서드 사용
					zoom: 15, // 확대 수준 설정
					center: currentLocation // 현재 위치로 중심 설정
				});
			}
		});
	}
	
});



$('.fullsize').on('click', function() {	
  const isFullscreen = document.fullscreenElement;
  const fullscreenTarget = document.querySelector('#map');
  if( isFullscreen ) {
    document.exitFullscreen();
  } else {
    fullscreenTarget.requestFullscreen();
  }
});

</script>




 
  
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDG1w7am_338bO-1sZuc0DRIbEPHmlJ5g&callback=initMap"></script>
  
  <script>
        $(document).ready(function() {
            // #main要素の下に新しいHTMLを挿入
            $("iframe").prepend("<p>新しいHTMLを挿入しました。</p>");
        });
    </script>



  <?php get_footer(); ?>
