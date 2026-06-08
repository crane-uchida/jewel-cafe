
	$('#search-btn').click(function(){
 
	  $.getJSON('https://zipcloud.ibsnet.co.jp/api/search?callback=?',
		  {
			zipcode: $('#post_code').val()
		  }
		)
		// 結果を取得したら…
		.done(function(data) {
			

		  // 中身が空でなければ、その値を［住所］欄に反映
		  if (data.results) {
			var result = data.results[0];
			
			
			//$('#address').val(result.address1 + result.address2 + result.address3);
			
			if( result.address1!=='' && result.address2 !==''){
			
				$('.search-add').html(result.address1 + result.address2 + result.address3);
		
			}
			
			$.ajax({
				type: 'POST',
				// WordPressでAjaxを使用する場合、urlにはadmin-ajax.phpの絶対パスを指定
				url: "https://jewel-cafe.jp/wp-admin/admin-ajax.php",
				cache: false,
				data: {
					// アクションフックで利用する文字列を指定
					action : 'my_ajax_action',
					// 現在のページのURLが格納された変数を値に指定
					address1 : result.address1,
					address2 : result.address2,
					address3 : result.address3,
				},
				beforeSend: function(){
					$('.loading-div').removeClass('loading-hide');
				},
				success: function(response){
					// AJAX通信によって取得したデータをダイアログに表示
					//alert(response);
					
					$('.loading-div').addClass('loading-hide'); 

					if( response.length  < 1){
						
						$("#shop-res").html('');
						
						$('.shop-result').fadeIn();
						
						$('.shop-result .yellow').html('0');
					
						$("#shop-res").append('<li class="shop-result-item bg-search marker-yellow"><div class="shop-name bold">該当する住所が存在しません</div></li>');
						
						return false;
						
					}
					
					
					$('.shop-result').fadeIn();
					
					$("#shop-res").html('');
					
					$('.shop-result .yellow').html(response.length);
					
					$.each(response,function(key,obj){
						
						//alert(obj.meta_value);
						$("#shop-res").append('<li class="shop-result-item bg-search marker-yellow"><div class="shop-result-name"><div class="shop-name bold"><a href="'+obj.url+'"  class="">ジュエルカフェ '+obj.title+'</a></div><div class="shop-address d-f">'+obj.add+'</div></div><div class="shop-result-tel"><a class="shop-tel bold color-red" href="tel:'+obj.tel+'">TEL '+obj.tel+'</a><div class="shop-opening">受付時間 '+obj.time+'</div></div></li>');
			
					});
					
				}
			});
			
			
		  // 中身が空の場合は、エラーメッセージを反映
		  } else {
			  
				$('.loading-div').addClass('loading-hide'); 
			  
				$("#shop-res").html('');
				
				$('.search-add').html('');
				
				$('.shop-result .yellow').html('0');
				
				$('.shop-result').fadeIn();
			
				$("#shop-res").append('<li class="shop-result-item bg-search marker-yellow"><div class="shop-name bold">該当する住所が存在しません</div></li>');
			
			
		  }
		});
 
		
	});





	$('#search-btn2').click(function(){
 
	  $.getJSON('https://zipcloud.ibsnet.co.jp/api/search?callback=?',
		  {
			zipcode: $('#post_code2').val()
		  }
		)
		// 結果を取得したら…
		.done(function(data) {
			

		  // 中身が空でなければ、その値を［住所］欄に反映
		  if (data.results) {
			var result = data.results[0];
			
			
			//$('#address').val(result.address1 + result.address2 + result.address3);
			
			if( result.address1!=='' && result.address2 !==''){
			
				$('.search-add2').html(result.address1 + result.address2 + result.address3);
		
			}
			
			$.ajax({
				type: 'POST',
				// WordPressでAjaxを使用する場合、urlにはadmin-ajax.phpの絶対パスを指定
				url: "https://jewel-cafe.jp/wp-admin/admin-ajax.php",
				cache: false,
				data: {
					// アクションフックで利用する文字列を指定
					action : 'my_ajax_action',
					// 現在のページのURLが格納された変数を値に指定
					address1 : result.address1,
					address2 : result.address2,
					address3 : result.address3,
				},
				beforeSend: function(){
					$('.loading-div2').removeClass('loading-hide2');
				},
				success: function(response){
					// AJAX通信によって取得したデータをダイアログに表示
					//alert(response);
					
					$('.loading-div2').addClass('loading-hide2'); 

					if( response.length  < 1){
						
						$("#shop-res2").html('');
						
						$('.shop-result2').fadeIn();
						
						$('.shop-result2 .yellow').html('0');
					
						$("#shop-res2").append('<li class="shop-result-item bg-search marker-yellow"><div class="shop-name bold">該当する住所が存在しません</div></li>');
						
						return false;
						
					}
					
					
					$('.shop-result2').fadeIn();
					
					$("#shop-res2").html('');
					
					$('.shop-result2 .yellow').html(response.length);
					
					$.each(response,function(key,obj){
						
						//alert(obj.meta_value);
						$("#shop-res2").append('<li class="shop-result-item bg-search marker-yellow"><div class="shop-result-name"><div class="shop-name bold"><a href="'+obj.url+'"  class="">ジュエルカフェ '+obj.title+'</a></div><div class="shop-address d-f">'+obj.add+'</div></div><div class="shop-result-tel"><a class="shop-tel bold color-red" href="tel:'+obj.tel+'">TEL '+obj.tel+'</a><div class="shop-opening">受付時間 '+obj.time+'</div></div></li>');
			
					});
					
				}
			});
			
			
		  // 中身が空の場合は、エラーメッセージを反映
		  } else {
			  
				$('.loading-div2').addClass('loading-hide'); 
			  
				$("#shop-res2").html('');
				
				$('.search-add2').html('');
				
				$('.shop-result2 .yellow').html('0');
				
				$('.shop-result2').fadeIn();
			
				$("#shop-res2").append('<li class="shop-result-item bg-search marker-yellow"><div class="shop-name bold">該当する住所が存在しません</div></li>');
			
			
		  }
		});
 
		
	});

