<div class="kaitori-model-search red_bg">

	<div class="search-watch-title ta-c color-white">
		<p>お買取希望の<?php echo $post->post_title;?>を検索!</p>
	</div>
	
	<div class="search-watch-form">
		<input id="inputView" type="text" class="search-watch-txt" name="keyword" value="" maxlength="50" placeholder="モデル名・型番などを入力してください。"/>
		<button type="button" class="search_watch_btn" id="search_watch_btn">買取相場を<br>チェック</button>
	<div>
	
	
	<div>
		
		<p class="watch-hot-title only-sp">人気の検索ワード</p>
		
		<div class="watch-hot-keyword">
		
			<span class="watch-hot-title-pc">人気の検索ワード</span>
			
			<a href="javascript:;" onclick='search_kw(this.innerHTML);'>サブマリーナ</a>
			
			<a href="javascript:;" onclick='search_kw(this.innerHTML);'>デイトジャスト</a>
			
			<a href="javascript:;" onclick='search_kw(this.innerHTML);'>エクスプローラー</a>
			
			<a href="javascript:;" onclick='search_kw(this.innerHTML);'>116500LN</a>
			
			<a href="javascript:;" onclick='search_kw(this.innerHTML);'>116610LN</a>
			
			<a href="javascript:;" onclick='search_kw(this.innerHTML);'>116233</a>
		</div>
	</div>
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

var dataList = [
	['ロレックス','ろれっくす'],
	['オメガ','おめが'],
	['カルティエ','かるてぃえ'],
	['ブルガリ','ぶるがり'],
	['フランクミュラー','ふらんくみゅらー'],
	['ヴァシュロン','う゛ぁしゅろん'],
	['パテックフィリップ','ぱてっくふぃりっぷ'],
	['パネライ','ぱねらい'],
	['オーデマピゲ','おーでまぴげ'],
	['IWC','IWC'],
	['ウブロ','うぶろ'],
	['タグホイヤー','たぐほいやー'],
	['ジャガールクルト','じゃがーるくると'],
	['ブライトリング','ぶらいとりんぐ'],
	['ランゲ&ゾーネ','らんげ&ぞーね'],
	['シャネル時計','しゃねるとけい'],
	['エルメス','えるめす'],
	['セイコー','せいこー'],
	['ロジェ・デュブイ','ろじぇ・でゅぶい'],
	['ブレゲ','ぶれげ'],
	['デイトナ','でいとな'],	
	['デイトジャスト','でいとじゃすと'],
	['デイデイト','でいでいと'],
	['エクスプローラー I','えくすぷろーらー I'],
	['エクスプローラー II','えくすぷろーらー II'],
	['サブマリーナ','さぶまりーな'],
	['GMTマスター II','GMTますたー II'],
	['シードゥエラー','しーどぅえらー'],
	['スカイドゥエラー','すかいどぅえらー'],
	['エアキング','えあきんぐ'],
	['ヨットマスター','よっとますたー'],
	['ミルガウス','みるがうす'],
	['チェリーニ','ちぇりーに'],
	['ターノグラフ','たーのぐらふ'],
	['オーキッド','おーきっど'],
	['オイスター パーペチュアル','おいすたー ぱーぺちゅある'],
];



jQuery(function(){  
  jQuery('#inputView').autocomplete({
    source: function(request, response){
      var suggests = [];
      var regexp = new RegExp('(' + request.term + ')');
      
      jQuery.each(dataList, function(i, values){
        if(values[0].match(regexp) || values[1].match(regexp)){
          suggests.push(values[0]);
        }
      });
      
      response(suggests);
	  

    },
    autoFocus: true,
    delay: 300,
    minLength: 1
  });
});




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