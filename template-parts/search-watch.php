<section class="search-watch">

	<div class="search-watch-title ta-c">
		<p>お買取希望の<?php echo $post->post_title;?>を検索!</p>
	</div>
	
	<div class="search-watch-form">
		<input id="inputView" type="text" class="search-watch-txt" name="keyword" value="" maxlength="50" placeholder="モデル名・型番などを入力してください。"/>
		<input type="button" id="search_watch_btn"  class="search_watch_btn" value="買取相場をチェック" /> 
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
	
</section>






<section id="watch_content">


</section>



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
	
	<?php	

		$arr[0] = '16520 SS ブラック';
		$arr[1] = '16520 SS ホワイト';
		$arr[2] = '116520 SS ブラック';
		$arr[3] = '116520 SS ホワイト';
		$arr[4] = '116500LN SS ブラック';
		$arr[5] = '116500LN SS ホワイト';
		$arr[6] = '116503 SS+YG ブラック';
		$arr[7] = '116503 SS+YG ホワイト';
		$arr[8] = '116503G SS+YG ブラック';
		$arr[9] = '116503G SS+YG シャンパン';
		$arr[10] = '116503NG SS+YG ブラックシェル';
		$arr[11] = '116503NG SS+YG  ホワイトシェル';
		$arr[12] = '116508 YG グリーン';
		$arr[13] = '116508 YG シャンパン';
		$arr[14] = '116508 YG ブラック';
		$arr[15] = '116508 YG ブラック/シャンパン';
		$arr[16] = '116508 YG シャンパン/ブラック';
		$arr[17] = '116508G YG ブラック';
		$arr[18] = '116508G YG シャンパン';
		$arr[19] = '116508NG YG ブラックシェル';
		$arr[20] = '116508NG YG ホワイトシェル';
		$arr[21] = '116509 WG ブルー';
		$arr[22] = '116509 WG スチール/ブラック';
		$arr[23] = '116509G WG ブラック';
		$arr[24] = '116509NG WG ブラックシェル';
		$arr[25] = '116509NG WG ホワイトシェル';
		$arr[26] = '116505 PG ブラック/ピンク';
		$arr[27] = '116505 PG ピンク/ブラック';
		$arr[28] = '116505 PG チョコレート/ブラック';
		$arr[29] = '116505 PG アイボリー';
		$arr[30] = '116505B PG ピンク';
		$arr[31] = '116595RBOW PG ブラック/レインボーサファイア';
		$arr[32] = '116595RBOW PG パヴェダイヤ/レインボーサファイア';
		$arr[33] = '116506 PT アイスブルー';
		$arr[34] = '116506B PT アイスブルー';
		$arr[35] = '116518LN YG シャンパン/ブラック';
		$arr[36] = '116518LN YG ブラック/シャンパン';
		$arr[37] = '116518LNG YG シャンパン';
		$arr[38] = '116518LNG YG ブラック';
		$arr[39] = '116518LNNG YG ホワイトシェル';
		$arr[40] = '116588TBR YG ブラックラッカー/パヴェダイヤ';
		$arr[41] = '116519LN WG スチール/ブラック';
		$arr[42] = '116519LNG WG ブラック';
		$arr[43] = '116519LNNG WG ホワイトシェル';
		$arr[44] = '116515LN PG ブラック/ピンク';
		$arr[45] = '116515LN PG ピンク/ブラック';
		$arr[46] = '116515LN PG チョコレート/ブラック';
		$arr[47] = '116515LNB PG ピンク';
		$arr[48] = '16233 SS+YG シャンパン';
		$arr[49] = '16233G SS+YG シャンパン';
		$arr[50] = '116233 SS+YG シャンパン';
		$arr[51] = '116233G SS+YG シャンパン';
		$arr[52] = '126200 SS シルバー';
		$arr[53] = '126200 SS ブラック';
		$arr[54] = '126200 SS ブルー';
		$arr[55] = '126200 SS ホワイトローマ';
		$arr[56] = '16234 SS+WG シルバー';
		$arr[57] = '16234G SS+WG シルバー';
		$arr[58] = '116234 SS+WG シルバー';
		$arr[59] = '116234G SS+WG シルバー';
		$arr[60] = '126234 SS+WG シルバー';
		$arr[61] = '126234 SS+WG ブラック';
		$arr[62] = '126234 SS+WG ブルー';
		$arr[63] = '126234 SS+WG ホワイトローマ';
		$arr[64] = '126234 SS+WG  ピンクローマ';
		$arr[65] = '126234G SS+WG ブラック';
		$arr[66] = '126234G SS+WG ブルー';
		$arr[67] = '126234G SS+WG ブルーコンピューター';
		$arr[68] = '126234G SS+WG ピンクコンピューター';
		$arr[69] = '126234NG SS+WG ホワイトシェル';
		$arr[70] = '126284G SS+WG ブラック';
		$arr[71] = '126284G SS+WG ブルー';
		$arr[72] = '126233 SS+YG シャンパン';
		$arr[73] = '126233 SS+YG シルバーローマ';
		$arr[74] = '126233 SS+YG オリーブグリーンローマ';
		$arr[75] = '126233G SS+YG シャンパン';
		$arr[76] = '126233G SS+YG ブラック';
		$arr[77] = '126233NG SS+YG ホワイトシェル';
		$arr[78] = '126300 SS シルバー';
		$arr[79] = '126300 SS ブラック';
		$arr[80] = '126300 SS ブルー';
		$arr[81] = '126300 SS スレートローマ';
		$arr[82] = '126334 SS+WG シルバー';
		$arr[83] = '126334 SS+WG ブラック';
		$arr[84] = '126334 SS+WG ダークロジウム';
		$arr[85] = '126334 SS+WG ブルー';
		$arr[86] = '126334 SS+WG スレートローマ';
		$arr[87] = '126334G SS+WG ブラック';
		$arr[88] = '126334G SS+WG ダークロジウム';
		$arr[89] = '126334G SS+WG ブルー';
		$arr[90] = '126334NG SS+WG ホワイトシェル';
		$arr[91] = '126333 SS+YG シャンパン';
		$arr[92] = '126333 SS+YG ブラック';
		$arr[93] = '126333 SS+YG スレートローマ';
		$arr[94] = '126333G SS+YG シャンパン';
		$arr[95] = '126333G SS+YG ブラック';
		$arr[96] = '126333NG SS+YG ホワイトシェル';
		$arr[97] = '18238 YG シャンパン';
		$arr[98] = '18238A YG シャンパン';
		$arr[99] = '118238 YG シャンパン';
		$arr[100] = '118238A YG シャンパン';
		$arr[101] = '128238A YG シャンパン';
		$arr[102] = '128238A YG グリーンオンブレ';
		$arr[103] = '128238A YG ダークグレー';
		$arr[104] = '128238A YG パヴェダイヤ/レインボーサファイア';
		$arr[105] = '128239 WG シルバー';
		$arr[106] = '128239A WG ブルーオンブレ';
		$arr[107] = '128239A WG パヴェダイヤ/レインボーサファイア';
		$arr[108] = '128349RBR WG パヴェダイヤ/レインボーサファイア';
		$arr[109] = '128235A PG ローズ';
		$arr[110] = '128235A PG ブラウンオンブレ';
		$arr[111] = '128235A PG パヴェダイヤ/レインボーサファイア';
		$arr[112] = '128345RBR PG パヴェダイヤ/レインボーサファイア';
		$arr[113] = '228238A YG シャンパン';
		$arr[114] = '228238A YG ブラック';
		$arr[115] = '228348RBR YG シャンパン';
		$arr[116] = '228239 WG オリーブグリーンローマ';
		$arr[117] = '228239 WG ブルーローマ';
		$arr[118] = '228239A WG シルバー';
		$arr[119] = '228239A WG ブラック';
		$arr[120] = '228235 PG オリーブグリーンローマ';
		$arr[121] = '228235A PG サンダスト';
		$arr[122] = '228345RBR PG チョコレート';
		$arr[123] = '228206 PT アイスブルークワドラントローマ';
		$arr[124] = '228206A PT アイスブルー';
		$arr[125] = '228396TBR PT パヴェダイヤ/2Pサファイア';
		$arr[126] = '14270 SS ブラック';
		$arr[127] = '114270 SS ブラック';
		$arr[128] = '214270 SS ブラック';
		$arr[129] = '216570 SS ブラック';
		$arr[130] = '216570 SS ホワイト';
		$arr[131] = 'Ref.16570';
		$arr[132] = '114060 SS ブラック';
		$arr[133] = '124060 SS ブラック';
		$arr[134] = '16610 SS ブラック';
		$arr[135] = '16610LV SS ブラック';
		$arr[136] = '16613 SS+YG ブルー';
		$arr[137] = '116610LN SS ブラック';
		$arr[138] = '116610LV SS グリーン';
		$arr[139] = '116613LN SS+YG ブラック';
		$arr[140] = '116613LB SS+YG ブルー';
		$arr[141] = '126610LN SS ブラック';
		$arr[142] = '126610LV SS グリーン';
		$arr[143] = '126613LN SS+YG ブラック';
		$arr[144] = '126613LB SS+YG ブルー';
		$arr[145] = '116618LN(旧型) YG ブラック';
		$arr[146] = '116618LB(旧型) YG ブルー';
		$arr[147] = '116619LB(旧型) WG ブルー';
		$arr[148] = '116659SABR WG  ブルー';
		$arr[149] = '116710LN SS ブラック';
		$arr[150] = '116710BLNR SS ブラック';
		$arr[151] = '126710BLRO SS ブラック';
		$arr[152] = '126710BLNR SS ブラック';
		$arr[153] = '126711CHNR SS+PG ブラック';
		$arr[154] = '126715CHNR PG ブラック';
		$arr[155] = '126755SARU PG ブラック';
		$arr[156] = '126719BLRO WG ブルー';
		$arr[157] = '126719BLRO WG メテオライト';
		$arr[158] = '116600 SS ブラック';
		$arr[159] = '116660 SS ブラック';
		$arr[160] = '116660 SS Dブルー';
		$arr[161] = '126600 SS ブラック';
		$arr[162] = '126603 SS+YG ブラック';
		$arr[163] = '126660 SS ブラック';
		$arr[164] = '126660 SS Dブルー';
		$arr[165] = '326934 SS+WG ブラック';
		$arr[166] = '326934 SS+WG ブルー';
		$arr[167] = '326933 SS+YG シャンパン';
		$arr[168] = '326933 SS+YG ホワイト';
		$arr[169] = '326938 YG シャンパン';
		$arr[170] = '326935 PG ダークロジウム';
		$arr[171] = '326934 SS+WG ブラック';
		$arr[172] = '326934 SS+WG ブルー';
		$arr[173] = '326933 SS+YG シャンパン';
		$arr[174] = '326933 SS+YG ホワイト';
		$arr[175] = '326938 YG シャンパン';
		$arr[176] = '326935 PG ダークロジウム';
		$arr[177] = '116900 SS ブラック';
		$arr[178] = '226659 WG ブラック';
		$arr[179] = '116622 SS+PT ダークロジウム';
		$arr[180] = '116622 SS+PT ブルー';
		$arr[181] = '116621 SS+PG ブラウン';
		$arr[182] = '116621 SS+PG ブラック';
		$arr[183] = '116655 PG ブラック';
		$arr[184] = '126622 SS+PT ダークロジウム';
		$arr[185] = '126622 SS+PT ブルー';
		$arr[186] = '126621 SS+PG ブラウン';
		$arr[187] = '126621 SS+PG ブラック';
		$arr[188] = '126655 PG ブラック';
		$arr[189] = '268622 SS+PT ダークロジウム';
		$arr[190] = '268621 SS+PG ブラウン';
		$arr[191] = '268621 SS+PG ブラック';
		$arr[192] = '268655 PG ブラック';
		$arr[193] = '116680 SS ホワイト';
		$arr[194] = '116681 SS+PG ホワイト';
		$arr[195] = '116688 YG ホワイト';
		$arr[196] = '116689 WG+PT ホワイト';
		$arr[197] = '116400GV SS ブラック';
		$arr[198] = '116400GV SS Zブルー';
		$arr[199] = '6623 YG ホワイト';
		$arr[200] = '116264 SS+WG ブラック';
		$arr[201] = '2762 YG';
		$arr[202] = '114200 SS  ブラック';
		$arr[203] = '114200 SS ホワイト';
		$arr[204] = '114200 SS シャンパン';
		$arr[205] = '114200 SS オリーブグリーン';
		$arr[206] = '114200 SS レッドグレープ';
		$arr[207] = '114200 SS シルバー369';
		$arr[208] = '114200 SS ブルー369';
		$arr[209] = '116000 SS ブラック';
		$arr[210] = '116000 SS ホワイト';
		$arr[211] = '116000 SS スチール';
		$arr[212] = '116000 SS レッドグレープ';
		$arr[213] = '116000 SS ホワイトグレープ';
		$arr[214] = '116000 SS ブルー369';
		$arr[215] = '114300 SS ブラック';
		$arr[216] = '114300 SS ホワイト';
		$arr[217] = '114300 SS ダークロジウム';
		$arr[218] = '114300 SS ブルー';
		$arr[219] = '114300 SS レッドグレープ';
		$arr[220] = '115200 SS シルバー';
		$arr[221] = '115200 SS ブルー';
		$arr[222] = '115200 SS ブラック';


?>


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
	<?php
	
		foreach($arr as $k=>$v){
			
			echo "['".$v."','".mb_convert_kana($v, 'Hc')."'],";
			
			
		}
		
	?>
  
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