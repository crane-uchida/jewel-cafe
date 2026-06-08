<div class="red_bg kaitori-model-search">
	
	<div class="section-inner">
	
	<div class="kaitori-model-inner d-f ai-e">
		
		<div class="model-search-form">
			<div class="model-search-title ta-c color-white mb-20 bold">
			
			<?php
				if(strpos($_SERVER['REQUEST_URI'],'/shop/') !== false && strpos($_SERVER['REQUEST_URI'],'/rolex-') !== false){
			?>
			
				<p>お買取希望のロレックスを検索!</p>
				
			<?php
				}else{
			?>	
					
					<p>お買取希望の<?php echo $post->post_title;?>を検索!</p>
				
			<?php } ?>	
				
			</div>
			<div class="d-f ai-c">
				<input id="inputView" type="text" class="model-search-input" name="keyword" value="" maxlength="50" placeholder="モデル名・型番を入力"/>
				<button type="button" class="model-search-btn bold" id="search_watch_btn">買取相場を<br>チェック</button>
			</div>
		</div>
	


		<div class="model-search-keyword">
		
			<span class="model-search-hot bold">人気の検索ワード</span>
			
			<ul class="d-f ai-e mt-10">
				<li><a href="javascript:;" onclick='search_kw(this.innerHTML);' class="bold">サブマリーナ</a></li>
				<li><a href="javascript:;" onclick='search_kw(this.innerHTML);' class="bold">デイトジャスト</a></li>
				<li><a href="javascript:;" onclick='search_kw(this.innerHTML);' class="bold">エクスプローラー</a></li>
				<li><a href="javascript:;" onclick='search_kw(this.innerHTML);' class="bold">116500LN</a></li>
				<li><a href="javascript:;" onclick='search_kw(this.innerHTML);' class="bold">116610LN</a></li>
				<li><a href="javascript:;" onclick='search_kw(this.innerHTML);' class="bold">116233</a></li>
			</ul>
			
		</div>

	
	</div>
	
	
	</div>
	
	

	
</div>


<div class="section-inner">

	<section id="result">
	
	</section>
	
</div>


<section id="watch_content"></section>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/ui-lightness/jquery-ui.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>


<script>


function accordion(id){
	
	
	
	if ($(".model-"+id).css("display") == "none") {
		

		$(".icon-"+id).css("transform", "rotate(45deg)");
		
	}else{
		
		$(".icon-"+id).css("transform", "rotate(-45deg)");
		
	}
	
	
	$(".model-"+id).slideToggle(300);

	
}


</script>
	



<script type="text/javascript">



function search_kw(name){
	
	$("#inputView").val(name);

	$("#result").hide();
	
	$('#search_watch_btn').click();

}



$('#search_watch_btn').on('click', function() {
	
	$.ajax({
		type: 'POST',
		// WordPressでAjaxを使用する場合、urlにはadmin-ajax.phpの絶対パスを指定
		url: "https://jewel-cafe.jp/wp-admin/admin-ajax.php",
		cache: false,
		dataType: 'html',
		data: {
			action : 'watch_search_ajax_action',
			keyword : $("#inputView").val(),
		},
		success: function(data){
			
			console.log(data);
			

			$("#watch_content").fadeIn();

			$("#watch_content").empty();
			
			$("#watch_content").html(data);


		}
	});

});

</script>