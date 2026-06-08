<form action="?keyword=<?php echo $_GET['keyword'] ?? ''; ?>&city=<?php echo $_GET['city'] ?? ''; ?>">

<section class="search-blog mb-20">

	<div class="search-blog-mlabel only-sp">
	条件から検索!
	</div>

	<div class="search-blog-form">
		<ul>
			<li><span class="search-blog-label only-pc">条件から検索!</span></li>
			<li><span>商品名</span><input type="text" name="keyword" id="keyword" value="<?php echo $_GET['keyword'] ?? ''; ?>" maxlength="35" /></li>
			<li>
				<span>エリア</span>
				<select name="city">
					<option value="" selected>都道府県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'hokkaido'){echo 'selected';}?> value="hokkaido">北海道</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'aomori'){echo 'selected';}?> value="aomori">青森県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'iwate'){echo 'selected';}?> value="iwate">岩手県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'miyagi'){echo 'selected';}?> value="miyagi">宮城県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'akita'){echo 'selected';}?> value="akita">秋田県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'yamagata'){echo 'selected';}?> value="yamagata">山形県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'fukushima'){echo 'selected';}?> value="fukushima">福島県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'ibaraki'){echo 'selected';}?> value="ibaraki">茨城県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'tochigi'){echo 'selected';}?> value="tochigi">栃木県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'gunma'){echo 'selected';}?> value="gunma">群馬県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'saitama'){echo 'selected';}?> value="saitama">埼玉県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'chiba'){echo 'selected';}?> value="chiba">千葉県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'tokyo'){echo 'selected';}?> value="tokyo">東京都</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'kanagawa'){echo 'selected';}?> value="kanagawa">神奈川県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'niigata'){echo 'selected';}?> value="niigata">新潟県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'toyama'){echo 'selected';}?> value="toyama">富山県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'ishikawa'){echo 'selected';}?> value="ishikawa">石川県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'fukui'){echo 'selected';}?> value="fukui">福井県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'yamanashi'){echo 'selected';}?> value="yamanashi">山梨県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'nagano'){echo 'selected';}?> value="nagano">長野県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'gifu'){echo 'selected';}?> value="gifu">岐阜県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'shizuoka'){echo 'selected';}?> value="shizuoka">静岡県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'aichi'){echo 'selected';}?> value="aichi">愛知県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'mie'){echo 'selected';}?> value="mie">三重県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'shiga'){echo 'selected';}?> value="shiga">滋賀県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'kyoto'){echo 'selected';}?> value="kyoto">京都府</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'osaka'){echo 'selected';}?> value="osaka">大阪府</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'hyogo'){echo 'selected';}?> value="hyogo">兵庫県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'nara'){echo 'selected';}?> value="nara">奈良県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'wakayama'){echo 'selected';}?> value="wakayama">和歌山県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'tottori'){echo 'selected';}?> value="tottori">鳥取県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'shimane'){echo 'selected';}?> value="shimane">島根県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'okayama'){echo 'selected';}?> value="okayama">岡山県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'hiroshima'){echo 'selected';}?> value="hiroshima">広島県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'yamaguchi'){echo 'selected';}?> value="yamaguchi">山口県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'tokushima'){echo 'selected';}?> value="tokushima">徳島県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'kagawa'){echo 'selected';}?> value="kagawa">香川県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'ehime'){echo 'selected';}?> value="ehime">愛媛県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'kochi'){echo 'selected';}?> value="kochi">高知県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'fukuoka'){echo 'selected';}?> value="fukuoka">福岡県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'saga'){echo 'selected';}?> value="saga">佐賀県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'nagasaki'){echo 'selected';}?> value="nagasaki">長崎県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'kumamoto'){echo 'selected';}?> value="kumamoto">熊本県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'oita'){echo 'selected';}?> value="oita">大分県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'miyazaki'){echo 'selected';}?> value="miyazaki">宮崎県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'kagoshima'){echo 'selected';}?> value="kagoshima">鹿児島県</option>
					<option <?php if(isset($_GET['city']) && $_GET['city'] == 'okinawa'){echo 'selected';}?> value="okinawa">沖縄県</option>
				</select>
			</li>

		</ul>

		<div class="search-blog-m-btn only-sp">
			<input type="image" src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon/icon_search.svg" />
		</div>

	</div>
	
	
	<div class="search-blog-btn only-pc" id="">
		<input type="image" src="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/icon/icon_search.svg" />
	</div>

	
</section>


<section class="hot-keyword">
	<h3 class="color-red">人気のタグ</h3>
	<ul class="d-f ai-c keyword-list">
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'gold'){ echo 'color-red';} ?>" href="/blog/gold/">#金</a></li>
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'diamond'){ echo 'color-red';} ?>" href="/blog/diamond/">#ダイヤモンド</a></li>
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'jewelry'){ echo 'color-red';} ?>" href="/blog/jewelry/">#宝石</a></li>
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'brand'){ echo 'color-red';} ?>" href="/blog/brand/">#ブランド品</a></li>
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'tokei'){ echo 'color-red';} ?>" href="/blog/tokei/">#ブランド時計</a></li>
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'k18'){ echo 'color-red';} ?>" href="/blog/k18/">#18金</a></li>
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'ingot'){ echo 'color-red';} ?>" href="/blog/ingot/">#インゴット</a></li>
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'chanel'){ echo 'color-red';} ?>" href="/blog/chanel/">#シャネル</a></li>
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'vuitton'){ echo 'color-red';} ?>" href="/blog/vuitton/">#ルイヴィトン</a></li>
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'rolex-top'){ echo 'color-red';} ?>" href="/blog/rolex-top/">#ロレックス</a></li>
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'card'){ echo 'color-red';} ?>" href="/blog/card/">#金券</a></li>
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'letter-top'){ echo 'color-red';} ?>" href="/blog/letter-top/">#切手</a></li>
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'cosme'){ echo 'color-red';} ?>" href="/blog/cosme/">#化粧品</a></li>
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'osake'){ echo 'color-red';} ?>" href="/blog/osake/">#お酒</a></li>
		<li><a class="<?php if(isset($args['blog_name']) && trim($args['blog_name']) == 'kottou'){ echo 'color-red';} ?>" href="/blog/kottou/">#遺品・生前整理</a></li>
	</ul>
</section>


</form>







<style>

.c-yellow{color:#ff0;}

.search-blog{background:#f1f1f1;position:relative;border-radius:10px;}

.search-blog li span{font-size:13px;font-weight:bold;color:#000000;width:100px;}

.search-blog .search-blog-label{width:100%;}

.search-blog .search-blog-mlabel{text-align:center;padding-top:10px;font-size:15px;font-weight:bold;}



.search-blog-form{padding-bottom:5px;width:calc(100% - 70px);  border-top-left-radius:10px;border-bottom-left-radius:10px;display:flex;}


.search-blog-form ul{width:100%;}


.search-blog-form input[type="text"]{min-height:25px;border-radius:5px;border:0px;width:100%;padding:0px 10px;}

.search-blog-form select{min-height:30px;border-radius:5px;background:#fff;border:0px;width:100%;padding:0px 10px;}

.search-blog-form li{line-height:30px;text-align:center;display:flex;margin-bottom:8px;}



.search-blog-btn{border-top-right-radius:10px;border-bottom-right-radius:10px;background:#df1022;width:85px;position:relative;}

.search-blog-m-btn{background:#df1022;border-radius:5px;padding:10px;position:absolute;right:15px;top:42%;}



.search-blog-m-btn input[type="image"]{width:24px;}

.search-blog-btn input[type="image"]{width:30px;height:30px;position:absolute;top:50%;left:50%;-webkit-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);}



.search-blog-btn:hover{cursor:pointer;transition:all .3s;opacity:.6;-webkit-transition:all .3s;}

.search-blog-m-btn:hover{cursor:pointer;transition:all .3s;opacity:.6;-webkit-transition:all .3s;}




.ui-autocomplete {
	
	overflow: auto;
    max-height: 300px !important;

}


.ui-menu .ui-menu-item a{
	
	font-size:12px;
	
}




@media (min-width: 1000px) {
	
	.ui-menu .ui-menu-item a{
		
		font-size:14px;
		
	}

	.search-blog{display: flex;}
	
	.search-blog li span{padding:0px 15px;}
	
	
	.search-blog-form{padding:15px;width:calc(100% - 85px);}
	
	.search-blog-form input[type="text"]{line-height:40px;}
	
	.search-blog-form select{min-height:40px;}

	.search-blog-form li{line-height:40px;}

	
	
	.search-blog li span{font-size:1rem;}

	.search-blog-form ul{display: flex;}
	
	.search-blog-label{border-right:1px solid #d8d8d8;}

	.search-blog-form li{text-align:left;display:block;margin-bottom:0px;}
	
	.search-blog-form input[type="text"]{width:320px;}

	.search-blog-form select{width:260px;}
	

}

</style>





<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/ui-lightness/jquery-ui.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>

