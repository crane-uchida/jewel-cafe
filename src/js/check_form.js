
$( document ).ready( function()
{


	$('#buttonOpen').on('click', function() {
						

			
			$('span').remove('.company-err');
			
		
			const property_address = $('#property-address').val();
						
			const floor_number = $('#floor-number').val();
			
			const area_size = $('#area-size').val();
			
			const rent_condition = $('#rent-condition').val();
			
			const security_deposit = $('#security-deposit').val();
			
			const content2 = $('textarea[name="content2"]').val();
			
			const representative_name = $('#representative-name').val();
			
			const company_name = $('#company-name').val();
			
			const tel = $('#tel').val();
			
			const company_address = $('#company-address').val();
			
			const your_content = $('textarea[name="your-content"]').val();
			
			const email = $('#email').val();




			const your_file1_arr = $('input[name="your-file1"]').val().split('\\');
			
			const your_file2_arr = $('input[name="your-file2"]').val().split('\\');
			
			const your_file3_arr = $('input[name="your-file3"]').val().split('\\');




			if( $('input[name="your-file1"]').val() !== '' ){
				
				var your_file1 = your_file1_arr[your_file1_arr.length-1] + ' , ';
				
			}else{
				
				var your_file1 = '';
				
			}
			
			

			if( $('input[name="your-file2"]').val() !== '' ){
				
				var your_file2 = your_file2_arr[your_file2_arr.length-1] + ' , ';
				
			}else{
				
				var your_file2 = '';
				
			}


			if( $('input[name="your-file3"]').val() !== '' ){
				
				var your_file3 = your_file3_arr[your_file3_arr.length-1];
				
			}else{
				
				var your_file3 = '';
				
			}



			
			//error check couting
			let check_count = 0 ;
			
	
	
			if (property_address == null || property_address == '') {
					
				$('.shop-address').parent('dd').append('<span class="company-err">物件住所を入力してください。</span>');
				
				$('#property-address').addClass('error');
				
				$('#property-address').focus();
				
				check_count++;
				
			}
			

		
			if (floor_number == null || floor_number == '') {
					
				$('.stairs').parent('dd').append('<span class="company-err">階数を入力してください。</span>');
				
				$('input[name="stairs"]').addClass('error');
				
				if( check_count < 1){
					
					$('input[name="stairs"]').focus();
					
				}
				
				check_count++;
				
			}
			
			
			

			if (area_size == null || area_size == '') {
					
				$('.dimension').parent('dd').append('<span class="company-err">面積を入力してください。</span>');
				
				$('input[name="dimension"]').addClass('error');
				
				
				if( check_count < 1){
					
					$('input[name="dimension"]').focus();
					
				}
				
				check_count++;
				
			}
	
	
	
		
			if (company_name == null || company_name == '') {
					
				$('.your-company').parent('dd').append('<span class="company-err">貴社企業名を入力してください。</span>');
				
				$('input[name="your-company"]').addClass('error');
				
				
				if( check_count < 1){
					
					$('input[name="your-company"]').focus();
					
				}
				
				check_count++;
				
			}
			
			
			
			if (company_address == null || company_address == '') {
					
				$('.your-company-address').parent('dd').append('<span class="company-err">貴社住所を入力してください。</span>');
				
				$('input[name="your-company-address"]').addClass('error');
				
				
				if( check_count < 1){
					
					$('input[name="your-company-address"]').focus();
					
				}
				
				check_count++;
				
			}
			
	

				
			if (representative_name == null || representative_name == '') {
					
				$('.your-name').parent('dd').append('<span class="company-err">ご担当者様氏名を入力してください。</span>');
				
				$('input[name="your-name"]').addClass('error');
				
				
				if( check_count < 1){
					
					$('input[name="your-name"]').focus();
					
				}
				
				check_count++;
					
			}
			
			
			
		

			if (email == null || email == '') {
					
				$('.your-email').parent('dd').append('<span class="company-err">メールアドレスを入力してください。</span>');
				
				$('input[name="your-email"]').addClass('error');
				
				
				if( check_count < 1){
					
					$('input[name="your-email"]').focus();
					
				}
				
				check_count++;
				
			}
		
		
			if( email !== '' && MailCheck(email) == false){
				
				$('.your-email').parent('dd').append('<span class="company-err">正しいメールアドレスを入力してください。</span>');
				
				$('input[name="your-email"]').addClass('error');
				
				$('input[name="your-email"]').focus();
				
				
				if( check_count < 1){
					
					$('input[name="your-email"]').focus();
					
				}
				
				check_count++;
				
			}
		
			
				
				//form check error
				if( check_count > 0){
					
					return false;	
					
				}
			
			

			
			//popuop
			const myDialog = document.getElementById('modalDialog');

			myDialog.showModal();
			


			let html  = '<div class="wrapper-modal"><div id="form_confirm"><section class="main_contents"><button id="buttonClose" onclick="buttonClose();" class="round_btn" type="reset"></button><div class="contents"><p class="text">この内容で送信します。よろしいですか？</p><dl class="primary"><dt>物件住所</dt><dd>' + property_address + '</dd><dt>階数（階）</dt><dd>' + floor_number + '</dd><dt>面積（坪）</dt><dd>' + area_size + '</dd><dt>賃料条件</dt><dd>' + rent_condition + '</dd><dt>敷金／補償金</dt><dd>' + security_deposit + '</dd><dt>備考（居抜き・入居中など）</dt><dd>' + content2 + '</dd><dt>添付ファイル名</dt><dd>' + your_file1 + your_file2 + your_file3 + '</dd><dt>貴社 企業名</dt><dd>' + company_name + '</dd><dt>貴社 住所</dt><dd>' + company_address + '</dd><dt>ご担当者様 氏名</dt><dd>' + representative_name + '</dd><dt>ご連絡先電話番号</dt><dd>' + tel + '</dd><dt>メールアドレス</dt><dd>' + email + '</dd><dt>その他・ご質問等</dt><dd>' + your_content + '</dd></dl><div class="button_box" id="button_box"><button class="cancel" type="button" onclick="cancel();">キャンセル</button><button class="submit" type="button" id="btn_submit"  onclick="send_form();">送信</button></div></div></section></div></div>';

		
			
			$("#modalDialog").html(html);
	

			return false;



	});


	
	
	
	//階数
	$("#floor-number").focus(function(){
		

			const property_address = $('#property-address').val();
						
			if (property_address == null || property_address == '') {
					

				$('.shop-address').parent('dd').children('.company-err').remove();
				
				$('.shop-address').parent('dd').append('<span class="company-err">物件住所を入力してください。</span>');
				
				$('#property-address').addClass('error');

				
			}
	
	});
	
	
	
	//面積
	
	$("#area-size").focus(function(){
		
				
			//物件住所
			const property_address = $('#property-address').val();
						
			if (property_address == null || property_address == '') {
					

				$('.shop-address').parent('dd').children('.company-err').remove();
				
				$('.shop-address').parent('dd').append('<span class="company-err">物件住所を入力してください。</span>');
				
				$('#property-address').addClass('error');

				
			}
	
	
	
			//階数
			const floor_number = $('#floor-number').val();
			
			
			if (floor_number == null || floor_number == '') {
					
				$('.stairs').parent('dd').children('.company-err').remove();
				
				$('.stairs').parent('dd').append('<span class="company-err">階数を入力してください。</span>');
				
				$('input[name="stairs"]').addClass('error');
				
			}
			
	
	});
	



	
	
		
	
	
	
	
	
		//貴社 企業名
		
		$("#company-name").focus(function(){
			
					
				//物件住所
				const property_address = $('#property-address').val();
							
				if (property_address == null || property_address == '') {
						

					$('.shop-address').parent('dd').children('.company-err').remove();
					
					$('.shop-address').parent('dd').append('<span class="company-err">物件住所を入力してください。</span>');
					
					$('#property-address').addClass('error');

					
				}
		
		
		
				//階数
				const floor_number = $('#floor-number').val();
				
				
				if (floor_number == null || floor_number == '') {
						
					$('.stairs').parent('dd').children('.company-err').remove();
					
					$('.stairs').parent('dd').append('<span class="company-err">階数を入力してください。</span>');
					
					$('input[name="stairs"]').addClass('error');
					
				}
				
				
				//面積
				const area_size = $('#area-size').val();
				
				if (area_size == null || area_size == '') {
						
					$('.dimension').parent('dd').children('.company-err').remove();
					
					$('.dimension').parent('dd').append('<span class="company-err">面積を入力してください。</span>');
					
					$('input[name="dimension"]').addClass('error');
					
				}
				

		
		});
		
		
		
		
		
		$("#company-address").focus(function(){
		
		
		
				//物件住所
				const property_address = $('#property-address').val();
							
				if (property_address == null || property_address == '') {
						

					$('.shop-address').parent('dd').children('.company-err').remove();
					
					$('.shop-address').parent('dd').append('<span class="company-err">物件住所を入力してください。</span>');
					
					$('#property-address').addClass('error');

					
				}
		
		
		
				//階数
				const floor_number = $('#floor-number').val();
				
				
				if (floor_number == null || floor_number == '') {
						
					$('.stairs').parent('dd').children('.company-err').remove();
					
					$('.stairs').parent('dd').append('<span class="company-err">階数を入力してください。</span>');
					
					$('input[name="stairs"]').addClass('error');
					
				}
				
				
				//面積
				const area_size = $('#area-size').val();
				
				if (area_size == null || area_size == '') {
						
					$('.dimension').parent('dd').children('.company-err').remove();
					
					$('.dimension').parent('dd').append('<span class="company-err">面積を入力してください。</span>');
					
					$('input[name="dimension"]').addClass('error');
					
				}
				
				
				//貴社 企業名
				const company_name = $('#company-name').val();

				if (company_name == null || company_name == '') {
						
					$('.your-company').parent('dd').children('.company-err').remove();
					
					$('.your-company').parent('dd').append('<span class="company-err">貴社企業名を入力してください。</span>');
					
					$('input[name="your-company"]').addClass('error');
					
				}
				
		});
		
	
	
	
	
	
		//ご担当者様 氏名
		$("#representative-name").focus(function(){
		
		
		
				//物件住所
				const property_address = $('#property-address').val();
							
				if (property_address == null || property_address == '') {
						

					$('.shop-address').parent('dd').children('.company-err').remove();
					
					$('.shop-address').parent('dd').append('<span class="company-err">物件住所を入力してください。</span>');
					
					$('#property-address').addClass('error');

					
				}
		
		
		
				//階数
				const floor_number = $('#floor-number').val();
				
				
				if (floor_number == null || floor_number == '') {
						
					$('.stairs').parent('dd').children('.company-err').remove();
					
					$('.stairs').parent('dd').append('<span class="company-err">階数を入力してください。</span>');
					
					$('input[name="stairs"]').addClass('error');
					
				}
				
				
				//面積
				const area_size = $('#area-size').val();
				
				if (area_size == null || area_size == '') {
						
					$('.dimension').parent('dd').children('.company-err').remove();
					
					$('.dimension').parent('dd').append('<span class="company-err">面積を入力してください。</span>');
					
					$('input[name="dimension"]').addClass('error');
					
				}
				
				
				//貴社 企業名
				const company_name = $('#company-name').val();

				if (company_name == null || company_name == '') {
						
					$('.your-company').parent('dd').children('.company-err').remove();
					
					$('.your-company').parent('dd').append('<span class="company-err">貴社企業名を入力してください。</span>');
					
					$('input[name="your-company"]').addClass('error');
					
				}
				
				
				//貴社 住所
				const company_address = $('#company-address').val();


				if (company_address == null || company_address == '') {
						
					$('.your-company-address').parent('dd').children('.company-err').remove();
					
					$('.your-company-address').parent('dd').append('<span class="company-err">貴社住所を入力してください。</span>');
					
					$('input[name="your-company-address"]').addClass('error');
					
					
				}
		
				
		});
	
	
	
	
		//メールアドレス
		$("#email").focus(function(){
		
		
		
				//物件住所
				const property_address = $('#property-address').val();
							
				if (property_address == null || property_address == '') {
						

					$('.shop-address').parent('dd').children('.company-err').remove();
					
					$('.shop-address').parent('dd').append('<span class="company-err">物件住所を入力してください。</span>');
					
					$('#property-address').addClass('error');

					
				}
		
		
		
				//階数
				const floor_number = $('#floor-number').val();
				
				
				if (floor_number == null || floor_number == '') {
						
					$('.stairs').parent('dd').children('.company-err').remove();
					
					$('.stairs').parent('dd').append('<span class="company-err">階数を入力してください。</span>');
					
					$('input[name="stairs"]').addClass('error');
					
				}
				
				
				//面積
				const area_size = $('#area-size').val();
				
				if (area_size == null || area_size == '') {
						
					$('.dimension').parent('dd').children('.company-err').remove();
					
					$('.dimension').parent('dd').append('<span class="company-err">面積を入力してください。</span>');
					
					$('input[name="dimension"]').addClass('error');
					
				}
				
				
				//貴社 企業名
				const company_name = $('#company-name').val();

				if (company_name == null || company_name == '') {
						
					$('.your-company').parent('dd').children('.company-err').remove();
					
					$('.your-company').parent('dd').append('<span class="company-err">貴社企業名を入力してください。</span>');
					
					$('input[name="your-company"]').addClass('error');
					
				}
				
				
				//貴社 住所
				const company_address = $('#company-address').val();


				if (company_address == null || company_address == '') {
						
					$('.your-company-address').parent('dd').children('.company-err').remove();
					
					$('.your-company-address').parent('dd').append('<span class="company-err">貴社住所を入力してください。</span>');
					
					$('input[name="your-company-address"]').addClass('error');


				}

				
				//
				
				const representative_name = $('#representative-name').val();


				if (representative_name == null || representative_name == '') {
						
					$('.your-name').parent('dd').children('.company-err').remove();
					
					$('.your-name').parent('dd').append('<span class="company-err">ご担当者様氏名を入力してください。</span>');
					
					$('input[name="your-name"]').addClass('error');
					
						
				}

				
		});
	
	
	
	
	
	
	
	
	
	


	 $("#wpcf7-f3798-o1 .wpcf7-form input").keypress(function(){
	
			$(this).removeClass('error');
			
			$(this).closest('dd').children('.company-err').remove();
			
	 });
	 
	 

	
	function MailCheck( mail ) {
		var mail_regex1 = new RegExp( '(?:[-!#-\'*+/-9=?A-Z^-~]+\.?(?:\.[-!#-\'*+/-9=?A-Z^-~]+)*|"(?:[!#-\[\]-~]|\\\\[\x09 -~])*")@[-!#-\'*+/-9=?A-Z^-~]+(?:\.[-!#-\'*+/-9=?A-Z^-~]+)*' );
		var mail_regex2 = new RegExp( '^[^\@]+\@[^\@]+$' );
		if( mail.match( mail_regex1 ) && mail.match( mail_regex2 ) ) {
			// 全角チェック
			if( mail.match( /[^a-zA-Z0-9\!\"\#\$\%\&\'\(\)\=\~\|\-\^\\\@\[\;\:\]\,\.\/\\\<\>\?\_\`\{\+\*\} ]/ ) ) { return false; }
			// 末尾TLDチェック（〜.co,jpなどの末尾ミスチェック用）
			if( !mail.match( /\.[a-z]+$/ ) ) { return false; }
			return true;
		} else {
			return false;
		}
	}


	
	
	
	
	
	//郵便番号
	function is_postcode( postcode ) {
		if ( postcode.match(/^\d{3}-?\d{4}$/) ) {
			return true;
		} else {
			return false;
		}
	} 	
	
	
	
	//郵便番号
	$('#postal-code').keyup(function() {

	    var thisval = $(this).val().replace(/[^\d-.]/g,'');
		
        $(this).val(thisval);


		if($('#postal-code').val().length == 7){
		
			AjaxZip3.zip2addr(this,'','your-pref','your-address1');		
	
		
			AjaxZip3.onSuccess = function() {
			
				$('.form-postal .err_red').remove();
				
				$('#wpcf7-f3796-o4 .form-postal .form-check').remove();
			
				$('#postal-code').addClass('ck-ok');
				
				$('#wpcf7-f3796-o4 .your-postad').append('<span class="form-check"></span>');
				
				
				
				$('.your-address1 .err_red').remove();
				
				$('#wpcf7-f3796-o4 .your-address1 .form-check').remove();
				
				
				$('#address1').addClass('ck-ok');
				
				$('#wpcf7-f3796-o4 .your-address1').append('<span class="form-check"></span>');
				
				
				$('#address2').focus();
				
				
				
			};
			
			

			AjaxZip3.onFailure = function() {
				
				$('.form-postal .err_red').remove();
				
				$('.form-postal').append("<div class='err_red'>　郵便番号を正しく入力してください。</div>");
				
				$('#address1').val('');
				
				$('#postal-code').addClass('ck-err');
				
				
				$('.your-address1').removeClass('ck-ok');
				
				$('.your-address1 .err_red').remove();
				
				$('#address1').val('');
				
				$('#address1').addClass('ck-err');
	
				
			};
			
			
			
		}else{
			
			$('#postal-code').removeClass('ck-ok');
			
			$('#address1').removeClass('ck-ok');
			
			
			$('#wpcf7-f3796-o4 .form-postal .form-check').remove();
			
			$('#wpcf7-f3796-o4 .form-postal .err_red').remove();
			
			
			$('#wpcf7-f3796-o4 .your-address1 .form-check').remove();
			
			$('#wpcf7-f3796-o4 .your-address1 .err_red').remove();
			
	
			
			//$('.form-postal').append("<div class='err_red'>郵便番号を正しく入力してください。</div>");
			
			$('#address1').val('');
			
			$('#postal-code').addClass('ck-err');

			$('#address1').addClass('ck-err');



		}
	
	});
	
	
	
	
	
	
	
	
	//電話番号数字入力
    $('#tel').keyup(function(){
		
        var thisval = $(this).val().replace(/[^\d-.]/g,'');
		
        $(this).val(thisval);
		
		
		if($('#tel').val().length == 10 || $('#tel').val().length == 11 ){
		
		
			$('.tel-96 .err_red').remove();
		
			$('#tel').addClass('ck-ok');
			
			$('#wpcf7-f3796-o4 .tel-96 .form-check').remove();
			
			$('#wpcf7-f3796-o4 .tel-96').append('<span class="form-check"></span>');


		}else{
			
			$('#tel').removeClass('ck-ok');
			
			
			$('#wpcf7-f3796-o4 .tel-96 .form-check').remove();
			
			$('#wpcf7-f3796-o4 .tel-96 .err_red').remove();
			
			$('#wpcf7-f3796-o4 .tel-96').append("<div class='err_red'>ご連絡先電話番号を正しく入力してください。</div>");

			$('#tel').addClass('ck-err');

		}

    });




	//メール入力検査
    $('#email').keyup(function(){
		
		var str = $(this).val();
			
		var reg = /^((([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6}\;))*(([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})))$/;
		
		if(reg.test(str)){
			
			$('#wpcf7-f3796-o4 .email-972 .err_red').remove();
			
			$('#email').addClass('ck-ok');
			
			$('#wpcf7-f3796-o4 .email-972').append('<span class="form-check"></span>');
			

			
		}else{
			
			
			$('#wpcf7-f3796-o4 .email-972 #email').removeClass('ck-ok');
			
			$('#wpcf7-f3796-o4 .email-972 .form-check').remove();
			
			$('#wpcf7-f3796-o4 .email-972 .err_red').remove();
			
			$('#wpcf7-f3796-o4 .email-972').append("<div class='err_red'>メールアドレスを正しく入力してください。</div>");
		
			$('#wpcf7-f3796-o4 #email').addClass('ck-err');

		}

		
	});




	//商品内容入力検査
    $('#model-number').keyup(function(){
		
		var str = $(this).val();
		
		if(str.length >= 1){
			
			$('#wpcf7-f3796-o4 .text-671 .err_red').remove();
			
			$('#model-number').addClass('ck-ok');
			
			$('#wpcf7-f3796-o4 .text-671').append('<span class="form-check"></span>');
			
			
		}else{
			
			
			$('#wpcf7-f3796-o4 .text-671 #model-number').removeClass('ck-ok');
			
			$('#wpcf7-f3796-o4 .text-671 .form-check').remove();
			
			$('#wpcf7-f3796-o4 .text-671 .err_red').remove();
			
			$('#wpcf7-f3796-o4 .text-671').append("<div class='err_red'>商品内容を入力してください。</div>");
		
			$('#wpcf7-f3796-o4 #model-number').addClass('ck-err');

		}
	
	});





	//商品状態入力検査
    $('#appearance').keyup(function(){
		
		var str = $(this).val();
		
		if(str.length >= 1){
			
			$('#wpcf7-f3796-o4 .text-673 .err_red').remove();
			
			$('#appearance').addClass('ck-ok');
			
			$('#wpcf7-f3796-o4 .text-673').append('<span class="form-check"></span>');
			
			
		}else{
			
			
			$('#wpcf7-f3796-o4 .text-673 #appearance').removeClass('ck-ok');
			
			$('#wpcf7-f3796-o4 .text-673 .form-check').remove();
			
			$('#wpcf7-f3796-o4 .text-673 .err_red').remove();
			
			$('#wpcf7-f3796-o4 .text-673').append("<div class='err_red'>商品状態を入力してください。</div>");
		
			$('#wpcf7-f3796-o4 #appearance').addClass('ck-err');

		}
	
	});

	
	
	
	
	//番地、ビル名入力検査
    $('#address2').keyup(function(){
		
		var str = $(this).val();
		
		if(str.length >= 1){
			
			$('#wpcf7-f3796-o4 .your-address2 .err_red').remove();
			
			$('#address2').addClass('ck-ok');
			
			$('#wpcf7-f3796-o4 .your-address2').append('<span class="form-check"></span>');
			
			
		}else{
			
			
			$('#wpcf7-f3796-o4 .your-address2 #address2').removeClass('ck-ok');
			
			$('#wpcf7-f3796-o4 .your-address2 .form-check').remove();
			
			$('#wpcf7-f3796-o4 .your-address2 .err_red').remove();
			
			$('#wpcf7-f3796-o4 .your-address2').append("<div class='err_red'>番地、ビル名を入力してください。</div>");
		
			$('#wpcf7-f3796-o4 #address2').addClass('ck-err');

		}
	
	});

	
	
	
	
	
	
	
	//名前を入力検査
    $('#contact-name').keyup(function(){
		
		var str = $(this).val();
		
		if(str.length >= 1){
			
			$('#wpcf7-f3796-o4 .your-name .err_red').remove();
			
			$('#contact-name').addClass('ck-ok');
			
			$('#wpcf7-f3796-o4 .your-name').append('<span class="form-check"></span>');
			
			
			if($('#contact-furigana').val().length >=1){
			
				$('#wpcf7-f3796-o4 .text-927 .err_red').remove();
				
				$('#contact-furigana').addClass('ck-ok');
				
				$('#wpcf7-f3796-o4 .text-927').append('<span class="form-check"></span>');
				
			}else{
				
				$('#wpcf7-f3796-o4 .text-927 #contact-furigana').removeClass('ck-ok');
				
				$('#wpcf7-f3796-o4 .text-927 .form-check').remove();
				
				$('#wpcf7-f3796-o4 .text-927 .err_red').remove();
				
				$('#wpcf7-f3796-o4 .text-927').append("<div class='err_red'>フリガナを入力してください。</div>");
			
				$('#wpcf7-f3796-o4 #contact-furigana').addClass('ck-err');
				
			}
			
			
		}else{
			
			
			$('#wpcf7-f3796-o4 .your-name #contact-name').removeClass('ck-ok');
			
			$('#wpcf7-f3796-o4 .your-name .form-check').remove();
			
			$('#wpcf7-f3796-o4 .your-name .err_red').remove();
			
			$('#wpcf7-f3796-o4 .your-name').append("<div class='err_red'>氏名を入力してください。</div>");
		
			$('#wpcf7-f3796-o4 #contact-name').addClass('ck-err');



		}
	
	});

	
	


    $('#contact-furigana').keyup(function(){
		
		var str = $(this).val();
		
		if(str.length >= 1){
			
			$('#wpcf7-f3796-o4 .text-927 .err_red').remove();
			
			$('#contact-furigana').addClass('ck-ok');
			
			$('#wpcf7-f3796-o4 .text-927').append('<span class="form-check"></span>');
			
			
		}else{
			
			$('#wpcf7-f3796-o4 .text-927 #contact-furigana').removeClass('ck-ok');
			
			$('#wpcf7-f3796-o4 .text-927 .form-check').remove();
			
			$('#wpcf7-f3796-o4 .text-927 .err_red').remove();
			
			$('#wpcf7-f3796-o4 .text-927').append("<div class='err_red'>フリガナを入力してください。</div>");
		
			$('#wpcf7-f3796-o4 #contact-furigana').addClass('ck-err');			
			
		}
	

	});



	$('.send').on('click', function() {
		send_form();
	});


});
