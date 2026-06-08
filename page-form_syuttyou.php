<?php get_header(); ?>

    <div id="page-top"></div>

    <div class="section-inner">
      <section class="static-catch">
        <h1 class="section-ja-title">出張買取お申し込み</h1>
      </section>
	  
	  <?php
		/*
	  ?>
      <p style="border: 2px dotted #de1122; font-weight: bold; padding: 15px 20px; font-size: 16px; line-height: 1.7;">
		<!--
	  8月13日〜16日までの期間、出張買取のご案内・お客様対応を休業とさせていただきます。<br>出張買取をご検討中のお客様におかれましては、大変ご迷惑をおかけいたしますが、ご了承いただきますようお願い申し上げます。
		!-->
      </p>
	  <?php
		*/
	  ?>
	  
	  
	  
	  
	  
	  
      <section class="form">
        <?php the_content(); ?>
      </section>

			<?php get_template_part( 'template-parts/common-tab' );?>
	
    </div>

<style>
	
	@media screen and (max-width: 800px) {
	
		#postal-code{width:150px;}

	}
	
	
	.form .form-list .form-item .form-tit{
		
		margin-bottom:8px;
		font-size:1rem;
		font-weight:700;
		
	}
	
	
	.form .form-list .form-item .input-required{
		
		margin:-6px 0 0 4px;
		padding:0 4px;
		font-size:.625rem;
		color:#fff;
		background:#de1122;
		border-radius:2px;
		
	}
	
	
	#wpcf7cpcnf table{width:100%;}
	
	#wpcf7cpcnf{border-collapse: separate;border-spacing: 0px;border-spacing:0;width:100%;}
	

	#wpcf7cpcnf th{background:#fcf7f0;max-width:100px;}
	
	#wpcf7cpcnf td	, #wpcf7cpcnf th{padding:15px;text-align:left; border: 1px solid #000;font-weight:normal;}

	label[for="your-pref"] { display:none; }
	
	
	.wpcf7cp-cfm-edit-btn{background:#cccccc;border-radius:30px;min-width:200px;padding:15px 20px;color:#fff;border:0px;font-weight:bold;}
	
	.wpcf7cp-cfm-edit-btn:hover{cursor:pointer;-webkit-transition:all .3s;transition:all .3s;opacity:.6;}
	
	.wpcf7cp-cfm-submit-btn{background:#de1122;border-radius:30px;min-width:200px;padding:15px 20px;color:#fff;border:0px;font-weight:bold;}
	
	.wpcf7cp-cfm-submit-btn:hover{cursor:pointer;-webkit-transition:all .3s;transition:all .3s;opacity:.6;}
	
	.wpcf7cp-btns{text-align:center;}
	
	
	div#wpcf7cpcnf{position:relative;z-index:98;}
	
	.wpcf7cp-form-hide{display:none;}
	
	.form .form-list .form-item fieldset dt{display:flex;}
	
	
	#wpcf7-f3796-o4 [type="text"]{outline: none !important;}
	
	#wpcf7-f3796-o4 .err_red{color:#de1122;padding-left:10px;}
	
	
	#wpcf7-f3796-o4 .ck-err{border:1px solid #de1122;}
	
	#wpcf7-f3796-o4 .ck-err:focus{outline: none !important;border:1px solid #de1122;}
	
	
	#wpcf7-f3796-o4 .ck-ok{border:1px solid #25AF01;}
	
	#wpcf7-f3796-o4 .ck-ok:focus{outline: none !important;border:1px solid #25AF01;}



	#wpcf7-f3796-o4 input[readonly]{background:#e9ecef;}
	
	#wpcf7-f3796-o4 .form-check{
	  content: '';
	  position:absolute;
	  top:50%;
	  transform: translate(-50%, 0%);
	  -webkit-transform: translate(-50%, 0%);
	  -ms-transform: translate(-50%, 0%);
	  right:10px;
	  width: 10px;
	  height: 5px;
	  border-left: 3px solid #25AF01;
	  border-bottom: 3px solid #25AF01;
	  transform: rotate(-45deg);
	}	
	
	
	.wpcf7-confirm , .wpcf7-back , .wpcf7-submit{
		
		width:267px;
		display:inline-block;
		position:relative;
		margin:0 auto;
		padding:14px 20px;
		background:#de1122;
		border-radius:30px;
		color:#fff;
		margin-right:10px;
		margin-bottom:10px;
		border:0px;
		font-weight:bold;
		font-size:1rem;
	}
	
	.wpcf7-back{
		
		background:gray;
		
	}
	
	
	.wpcf7-confirm:hover , .wpcf7-submit:hover , .wpcf7-back:hover{
		
		-webkit-transition:all .3s;
		transition:all .3s;
		opacity:.6;
		cursor:pointer;
		
	}
	

	
	


	
	@media screen and (max-width: 1000px){
	
		.form .form-list .form-item select{height:35px;line-height:35px;}
	
	}
	
</style>


<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/jquery.autoKana.js"></script>

<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/ajaxzip3.js"></script>

<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/check_form.js"></script>




<?php get_footer(); ?>
