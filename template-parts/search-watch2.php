<div style="padding:20px 0px;">
<section class="search-watch">

	<div class="search-watch-title ta-c">
		<p>お買取希望の<?php echo $post->post_title;?>を検索!</p>
	</div>
	
	<div class="search-watch-form">
		<input id="inputView" type="text" class="search-watch-txt" name="keyword" value="" maxlength="50" placeholder="モデル名・型番などを入力してください。"/>
		<input type="button" id="search_watch_btn"  class="search_watch_btn" value="買取相場をチェック" /> 
	</div>
	
	
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
	
</section>






<section id="watch_content">


</section>

</div>


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






<style>

.ui-autocomplete {
	
	overflow: auto;
    max-height: 300px !important;

}


#watch_count{
	
	color:#de1022;
	font-weight:bold;
	
}



.ui-menu .ui-menu-item a{
	
	font-size:12px;
	
}


@media (min-width: 1000px) {


.ui-menu .ui-menu-item a{
	
	font-size:14px;
	
}


}



::placeholder {
  color: #d5d5d5;
  font-size:13px;
  font-weight:400;
}
/* 旧Edge対応 */
::-ms-input-placeholder {
  color: #d5d5d5;
   font-size:13px;
   font-weight:400;
}
/* IE対応 */
:-ms-input-placeholder {
  color: #d5d5d5;
   font-size:13px;
   font-weight:400;
}



#watch_content{display:none;}

#result{min-width:300px;display:none;position:absolute;top:47px;left:10px;background:#fff;}

#result p{padding:10px;text-align:left;}

#result p:hover{padding:10px;background:#ccc;}


#watch_content h3{padding:15px 0px;}

.section-inner .search-watch{background:#de1022;border-radius:10px;padding:0px;padding:10px 20px;}


.section-inner .search-watch-title{font-size:19px;color:#fff;font-weight:700;padding:10px 0px;width:100%;display:block;}
.section-inner .search-watch-txt{padding:15px;width:calc( 100% - 270px );font-weight:bold;color:#040404;border:0px;width:100%;font-size:15px;display:block;}

.section-inner .search-watch-form{text-align:center;position:relative;}


.section-inner .search_watch_btn{margin-top:15px;background:#feff03;color:#de1022;padding:10px 30px;border:0px;border-radius:100px;font-weight:bold;font-size:18px;  -webkit-box-sizing: content-box;
  -webkit-appearance: button;
  appearance: button;
  border: none;
  box-sizing: border-box;
  cursor: pointer;}

.section-inner .watch-hot-title{color:#fff;font-weight:bold;padding:15px 0px;font-size:17px;}


.section-inner .watch-hot-keyword a{border:1px solid #fff;border-radius:100px;color:#fff;padding:5px 3px;font-size:11px;display:inline-block;margin-bottom:10px;}


.section-inner .search_watch_btn:hover{cursor:pointer;}

.section-inner .watch-hot-title{text-align:left;}

.section-inner .watch-hot-keyword{text-align:left;display:fixed}


.watch-hot-title-pc{display:none;}


@media (min-width: 1000px) {


::placeholder {
  color: #d5d5d5;
  font-size:15px;
  font-weight:400;
}
/* 旧Edge対応 */
::-ms-input-placeholder {
  color: #d5d5d5;
   font-size:15px;
   font-weight:400;
}
/* IE対応 */
:-ms-input-placeholder {
  color: #d5d5d5;
   font-size:15px;
   font-weight:400;
}


.watch-hot-title-pc{display:inline-block;color:#fff;font-weight:bold;padding:15px 0px;font-size:17px;}

.section-inner .search-watch{background:#de1022;border-radius:10px;padding:0px;padding:20px;}

	
.section-inner .search-watch-title{font-size:30px;color:#fff;font-weight:700;letter-spacing:.2rem;padding:10px 0px;display:inline-block;}
.section-inner .search-watch-txt{padding:15px;width:calc( 100% - 270px );font-weight:bold;color:#040404;border:0px;font-size:15px;display:inline-block;}


.section-inner .search_watch_btn{margin-top:0px;background:#feff03;color:#de1022;padding:10px 30px;border:0px;border-radius:100px;font-weight:bold;font-size:20px;}

.section-inner .watch-hot-title{text-align:left;}

.section-inner .watch-hot-keyword{text-align:left;padding-top:15px;}

.section-inner .watch-hot-keyword a{border:1px solid #fff;border-radius:100px;color:#fff;padding:7px;font-size:13px;display:inline-block;margin-bottom:10px;}


}






</style>