<?php

if (has_term('brand', 'hinmoku')){


	$check_field1 = JC_check_field( $post->ID , '買取実績その' );

}else if (has_term('tokei', 'hinmoku')){


	$check_field1 = JC_check_field( $post->ID , '買取実績その' );



	$check_field2 = JC_check_field( $post->post_parent , '買取実績その' );

	//カスタムフィールドにデータがあるのみ

	if( $check_field1 > 0 ){

		$field_id = $post->ID;

	}else{

		$field_id = $post->post_parent;

	}
	
	
	


}else{


	$check_field1 = JC_check_field( $post->ID , '買取実績その' );



	$check_field2 = JC_check_field( $post->post_parent , '買取実績その' );

	//カスタムフィールドにデータがあるのみ

	if( $check_field1 > 0 ){

		$field_id = $post->ID;

	}else{

		$field_id = $post->post_parent;

	}
	

}


//買取 ALT

$alt_img = ['','鉄瓶買取','着物買取','着物買取','着物買取','お酒買取','刀剣買取','金杯買取','ブランド品買取','ジュエリー買取','骨董買取','着物買取','鉄瓶買取','着物買取','着物買取','お酒買取','洋酒買取','金杯買取','ブランド品買取','ジュエリー買取','骨董買取','着物買取'];

			

	if( isset($check_field1)  ||  isset($check_field2) ){
?>




<style>
.common-kaitori-resuluts .item-list li{width:47%;margin-right:10px;}
.common-kaitori-resuluts .rolex-sp{position:relative;height:800px;overflow:hidden;}
.common-kaitori-resuluts .slide-down {height: auto; overflow: visible; padding-bottom: 50px;}
@media screen and (min-width: 501px){
    .common-kaitori-resuluts .item-list li{width:19%;margin-right:10px;}
}
</style>


<section class="common-kaitori-resuluts pink_bg">

    <div class="section-inner">

				<div class="point-title">

					<div class="point-title-inner d-f ai-c">
						<div class="point-kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/kaitori-kuma.png" alt="" ></div>
						<div class="only-sp">
								ジュエルカフェの<br>
								<?php echo $post->post_title;?>買取ポイント
						</div>
					</div>
					
					<div class="point-bg">
						<p class="only-pc">ジュエルカフェの <?php echo $post->post_title;?>買取ポイント</p>
						<h2>
							<?php 
							
								the_title(); 

								
								echo 'の買取参考価格';
								
							?>
							<br>
							圧倒的な査定数・買取点数
						</h2>
					</div>


					
				</div>









<!-- new-->
<?php if ( is_single(['gold', 'k24', 'k10', 'k14', 'k18', 'k20', 'k22', 'brand', 'vuitton', 'chanel', 'hermes', 'gucci', 'prada', 'coach', 'tokei', 'jewelry', 'diamond']) ): ?>
<?php
/**
 * 1. ページ情報の取得
 */
$current_id   = get_the_ID();
$current_slug = get_post_field('post_name', $current_id);
$parent_id    = wp_get_post_parent_id($current_id);
$parent_slug  = $parent_id ? get_post_field('post_name', $parent_id) : '';

// 初期設定
$show_tabs = false;
$categories = [];
$items_config = [];
$calc_settings = [];

/**
 * 2. ページごとの設定（ここを編集して増やしていきます）
 */

// --- 金（gold）ページ ---
if ( $current_slug === 'gold' ) {
    $show_tabs = true;
	$parent_label = '金・貴金属';
    $img_dir = 'gold'; // images/kaitori/item/gold/
    $categories = [
        1 => 'アクセサリー', 2 => '純金・インゴット', 3 => '喜平ネックレス',
        4 => '金貨・記念コイン', 5 => '金歯', 6 => '仏像仏具', 7 => '大判・小判', 8 => 'その他'
    ];
    $items_config = [
        1 => [
            1 => ['name' => '24金(K24/純金)', 'ttl' => '24 金（K24）アクセサリー', 'price' => '1,200,000'],
            2 => ['name' => '18金(K18)', 'ttl' => '18 金（K18）アクセサリー', 'price' => '2,800,000'],
            3 => ['name' => 'プラチナ', 'ttl' => 'プラチナ製ジュエリー', 'price' => '250,000'],
            4 => ['name' => '壊れた金製品', 'ttl' => '壊れた金アクセサリーまとめて', 'price' => '33,000'],
            5 => ['name' => '22金(K22)', 'ttl' => '22 金（K22）アクセサリー', 'price' => '125,000'],
            6 => ['name' => '20金(K20)', 'ttl' => '20 金（K20）アクセサリー', 'price' => '65,000'],
            7 => ['name' => '14金(K14)', 'ttl' => '14 金（K14）アクセサリー', 'price' => '58,000'],
            8 => ['name' => '金ピアス', 'ttl' => '金のピアス大量に', 'price' => '45,000'],
            9 => ['name' => '10金(K10)', 'ttl' => '10 金（K10）アクセサリー', 'price' => '30,000'],
        ],
        2 => [ 1 => ['name' => 'インゴット', 'ttl' => '純金インゴット大量に', 'price' => '3,600,000'] ],
        3 => [ 1 => ['name' => '金の喜平ネックレス', 'ttl' => '喜平ネックレス 美品をまとめて', 'price' => '4,500,000'] ],
        4 => [ 1 => ['name' => '金貨・金コイン', 'ttl' => '金貨・金コイン', 'price' => '1,650,000'] ],
        5 => [ 1 => ['name' => '金歯', 'ttl' => '外れた金歯', 'price' => '50,000'] ],
        6 => [ 1 => ['name' => '金工芸品', 'ttl' => '金の仏像', 'price' => '4,200,000'] ],
        7 => [ 1 => ['name' => '金の大判・小判', 'ttl' => 'ずっとしまわれていた金の大判・小判', 'price' => '1,100,000'] ],
        8 => [
            1 => ['name' => '金のメガネ', 'ttl' => '金のメガネフレーム', 'price' => '200,000'],
            2 => ['name' => '金のベルトバックル', 'ttl' => '金のベルトバックル', 'price' => '500,000'],
            3 => ['name' => '金塊', 'ttl' => 'なんと！金塊を', 'price' => '300,000'],
            4 => ['name' => '工業用レアメタル', 'ttl' => '金の工業製品', 'price' => '460,000'],
            5 => ['name' => 'パラジウム', 'ttl' => 'パラジウムプレート', 'price' => '50,000'],
        ],
    ];

/*
========================================
金1g相場 × weightで使う、金の種類とweightの設定
相場が変わると自動的に価格も変更される。
※現在はコメントアウト。この機能を有効にする時は、上記$items_configのpriceを全てASKにしておく。
========================================
    $calc_settings = [
        1 => [
            1 => ['key' => 'gold_price', 'weight' => 20],
            2 => ['key' => 'k24_price',  'weight' => 20],
            3 => ['key' => 'k22_price',  'weight' => 20],
            4 => ['key' => 'k20_price',  'weight' => 20],
            5 => ['key' => 'k18_price',  'weight' => 30],
            6 => ['key' => 'k14_price',  'weight' => 30],
        ],
        2 => [ 1 => ['key' => 'gold_price', 'weight' => 20] ]
    ];
*/


// --- 金の個別ページ（brand/k24） ---
} elseif ( $current_slug === 'k24' && $parent_slug === 'gold' ) {
    $show_tabs = true;
	$parent_label = '金・貴金属';
    $img_dir = 'gold/k24'; 
    $categories = [ 1 => '純金・インゴット', 2 => '24金アクセサリー', 3 => '24金金貨・記念コイン', 4 => '24金仏像仏具', 5 => '24金その他', 6 => '', 7 => '', 8 => '' ];
    $items_config = [
        1 => [
            1 => ['name' => '24金(K24/純金)', 'ttl' => '24金の純金インゴット大量に', 'price' => '3,600,000'],
            2 => ['name' => '24金(K24/純金)', 'ttl' => '24金インゴット', 'price' => 'ASK'],
            3 => ['name' => '24金(K24/純金)', 'ttl' => '24金インゴット', 'price' => 'ASK'],
        ],
        2 => [
            1 => ['name' => '24金(K24/純金)', 'ttl' => '24 金（K24）アクセサリー', 'price' => '1,200,000'],
        ],
        3 => [
            1 => ['name' => '24金(K24/純金)', 'ttl' => '24金の金貨・金コイン', 'price' => '1,650,000'],
            2 => ['name' => '24金(K24/純金)', 'ttl' => '純金の金貨まとめて', 'price' => 'ASK'],
        ],
        4 => [
            1 => ['name' => '24金(K24/純金)', 'ttl' => '24金の仏像', 'price' => '4,200,000'],
        ],
        5 => [
            1 => ['name' => '24金(K24/純金)', 'ttl' => 'なんと！24金の金塊', 'price' => '300,000'],
        ],
    ];






// --- 金の個別ページ（brand/k10） ---
} elseif ( $current_slug === 'k10' && $parent_slug === 'gold' ) {
    $show_tabs = true;
	$parent_label = '金・貴金属';
    $img_dir = 'gold/k10'; 
    $categories = [ 1 => '10金ネックレス', 2 => '10金リング', 3 => '10金ピアス', 4 => '10金その他' ];
    $items_config = [
        1 => [
            1 => ['name' => '10金(K10)', 'ttl' => '10金のネックレスチェーン', 'price' => 'ASK'],
        ],
        2 => [
            1 => ['name' => '10金(K10)', 'ttl' => '10 金（K10）アクセサリー', 'price' => '30,000'],
        ],
        3 => [
            1 => ['name' => '10金(K10)', 'ttl' => '10金のピアス', 'price' => 'ASK'],
        ],
        4 => [
            1 => ['name' => '10金(K10)', 'ttl' => '10金アクセサリー', 'price' => 'ASK'],
            2 => ['name' => '10金(K10)', 'ttl' => '10金のブローチ', 'price' => 'ASK'],
        ],
    ];

// --- 金の個別ページ（brand/k14） ---
} elseif ( $current_slug === 'k14' && $parent_slug === 'gold' ) {
    $show_tabs = true;
	$parent_label = '金・貴金属';
    $img_dir = 'gold/k14'; 
    $categories = [ 1 => '14金その他', 2 => '', 3 => '', 4 => '' ];
    $items_config = [
        1 => [
            1 => ['name' => '14金(K14)', 'ttl' => '14 金（K14）アクセサリー', 'price' => '58,000'],
            2 => ['name' => '14金(K14)', 'ttl' => '14金ジュエリーまとめて', 'price' => 'ASK'],
            3 => ['name' => '14金(K14)', 'ttl' => '14金コンビアクセサリー', 'price' => 'ASK'],
            4 => ['name' => '14金(K14)', 'ttl' => '14金の豪華なイヤリング', 'price' => 'ASK'],
        ],
    ];

// --- 金の個別ページ（brand/k18） ---
} elseif ( $current_slug === 'k18' && $parent_slug === 'gold' ) {
    $show_tabs = true;
	$parent_label = '金・貴金属';
    $img_dir = 'gold/k18'; 
    $categories = [ 1 => '18金ネックレス', 2 => '18金リング', 3 => '18金ピアス', 4 => '18金その他' ];
    $items_config = [
        1 => [
            1 => ['name' => '18金(K18)', 'ttl' => '18金の喜平ネックレス 美品をまとめて', 'price' => '4,500,000'],
            2 => ['name' => '18金(K18)', 'ttl' => '18金ジュエリー・ネックレス', 'price' => 'ASK'],
        ],
        2 => [
            1 => ['name' => '18金(K18)', 'ttl' => '18金リング・喜平', 'price' => '215,200'],
            2 => ['name' => '18金(K18)', 'ttl' => '18金の喜平・リングまとめて', 'price' => 'ASK'],
        ],
        3 => [
            1 => ['name' => '18金(K18)', 'ttl' => '18金のピアス大量に', 'price' => '45,000'],
        ],
        4 => [
            1 => ['name' => '18金(K18)', 'ttl' => '18金（K18）アクセサリー', 'price' => '2,800,000'],
            2 => ['name' => '18金(K18)', 'ttl' => '18金ジュエリーまとめて', 'price' => '498,800'],
            3 => ['name' => '18金(K18)', 'ttl' => 'ずっとしまわれていた18金の大判・小判', 'price' => '1,100,000'],
            4 => ['name' => '18金(K18)', 'ttl' => '18金のメガネフレーム', 'price' => '200,000'],
            5 => ['name' => '18金(K18)', 'ttl' => '18金のベルトバックル', 'price' => '500,000'],
            6 => ['name' => '18金(K18)', 'ttl' => '18金の壊れた金アクセサリーまとめて', 'price' => '33,000'],
            7 => ['name' => '18金(K18)', 'ttl' => '18金の外れた金歯', 'price' => '50,000'],
            8 => ['name' => '18金(K18)', 'ttl' => '18金の工業製品', 'price' => '460,000'],
            9 => ['name' => '18金(K18)', 'ttl' => '18金ジュエリー・チェーン', 'price' => 'ASK'],
            10 => ['name' => '18金(K18)', 'ttl' => '18金の宝石ジュエリー', 'price' => 'ASK'],
            11 => ['name' => '18金(K18)', 'ttl' => '18金の仏具', 'price' => 'ASK'],
        ],
    ];


// --- 金の個別ページ（brand/k20） ---
} elseif ( $current_slug === 'k20' && $parent_slug === 'gold' ) {
    $show_tabs = true;
	$parent_label = '金・貴金属';
    $img_dir = 'gold/k20'; 
    $categories = [ 1 => '20金リング', 2 => '20金その他', 3 => '', 4 => '' ];
    $items_config = [
        1 => [
            1 => ['name' => '20金(K20)', 'ttl' => '20金リングまとめて', 'price' => 'ASK'],
        ],
        2 => [
            1 => ['name' => '20金(K20)', 'ttl' => '20 金（K20）アクセサリー', 'price' => '65,000'],
            2 => ['name' => '20金(K20)', 'ttl' => '20金のペンダントトップ', 'price' => 'ASK'],
            3 => ['name' => '20金(K20)', 'ttl' => '20金のイヤリング', 'price' => 'ASK'],
        ],
    ];


// --- 金の個別ページ（brand/k22） ---
} elseif ( $current_slug === 'k22' && $parent_slug === 'gold' ) {
    $show_tabs = true;
	$parent_label = '金・貴金属';
    $img_dir = 'gold/k22'; 
    $categories = [ 1 => '22金リング', 2 => '22金ブレスレット', 3 => '22金その他', 4 => '' ];
    $items_config = [
        1 => [
            1 => ['name' => '22金(K22)', 'ttl' => '22金リング・ペンダント', 'price' => 'ASK'],
        ],
        2 => [
            1 => ['name' => '22金(K22)', 'ttl' => '22金ブレスレット', 'price' => 'ASK'],
        ],
        3 => [
            1 => ['name' => '22金(K22)', 'ttl' => '22 金（K22）アクセサリー', 'price' => '125,000'],
            2 => ['name' => '22金(K22)', 'ttl' => '22金ジュエリーまとめて', 'price' => 'ASK'],
            3 => ['name' => '22金(K22)', 'ttl' => '22金のカフスボタン', 'price' => 'ASK'],
        ],
    ];





// --- ブランド（brand）親ページ ---
} elseif ( $current_slug === 'brand' ) {
    $show_tabs = true;
	$parent_label = 'ブランド';
    $img_dir = 'brand'; // images/kaitori/item/brand/
    $categories = [ 1 => 'エルメス', 2 => 'シャネル', 3 => 'ヴィトン', 4 => 'ブランドジュエリー' ];
    $items_config = [
        1 => [
            1 => ['name' => 'エルメス', 'ttl' => 'エルメス コンスタンス', 'price' => '449,800'],
            2 => ['name' => 'エルメス', 'ttl' => 'エルメス バーキン40 シルバー金具', 'price' => '1,438,000'],
            3 => ['name' => 'エルメス', 'ttl' => 'エルメス ケリー28', 'price' => '799,000'],
            4 => ['name' => 'エルメス', 'ttl' => 'エルメス ヴィクトリア', 'price' => '199,000'],
            5 => ['name' => 'エルメス', 'ttl' => 'エルメス リンディ30', 'price' => '494,000'],
        ],
        2 => [
            1 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセ フラップショルダー A93752', 'price' => '370,000'],
            2 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセ ロングウォレット A50097', 'price' => '100,000'],
            3 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセ 復刻トート ゴールド金具 A01804', 'price' => '116,000'],
            4 => ['name' => 'シャネル', 'ttl' => 'シャネル コココクーン ボストンバッグ', 'price' => '166,000'],
            5 => ['name' => 'シャネル', 'ttl' => 'シャネル ボーイシャネル スモールフラップウォレット A81996', 'price' => '97,000'],
            6 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセ ラップバッグ AS0416', 'price' => '404,000'],
        ],
        3 => [
            1 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ネヴァーフル MM モノグラム M40995', 'price' => '104,800'],
            2 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ジッピー・ウォレット モノグラム M42616', 'price' => '62,800'],
            3 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン スピーディ・バンドリエール 30 M41112', 'price' => '125,800'],
            4 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン スピーディ 25 ダミエアズール N41371', 'price' => '59,500'],
            5 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ポルトフォイユ・ブラザ M61697', 'price' => '45,500'],
            6 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ウェストミンスター PM N41102', 'price' => '97,800'],
            7 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ティヴォリ PM モノグラム M40143', 'price' => '104,800'],
        ],
        4 => [
            1 => ['name' => 'エルメス', 'ttl' => 'エルメス ポップH', 'price' => '43,000'],
            2 => ['name' => 'シャネル', 'ttl' => 'シャネル テクスチャーココマーク 5チャーム', 'price' => '140,000'],
        ],
    ];

// --- ヴィトンの個別ページ（brand/vuitton） ---
} elseif ( $current_slug === 'vuitton' && $parent_slug === 'brand' ) {
    $show_tabs = true;
	$parent_label = 'ブランド';
    $img_dir = 'brand/vuitton'; 
    $categories = [ 1 => 'スピーディ', 2 => 'アルマ', 3 => 'キーポル', 4 => 'ネヴァーフル', 5 => 'ポルトフォイユ', 6 => 'ジッピー', 7 => 'その他', 8 => '' ];
    $items_config = [
        1 => [
            1 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン スピーディ・バンドリエール 30 モノグラム M41112', 'price' => '125,800'],
            2 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン スピーディ 25 ダミエアズール N41371', 'price' => '59,500'],
        ],
        2 => [
            1 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン アルマ 旧 ダミエ N51131', 'price' => '76,800'],
        ],
        3 => [
            1 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン キーポル・バンドリエール 55 モノグラム M41414', 'price' => '71,000'],
        ],
        4 => [
            1 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ネヴァーフル MM ダミエ N41358', 'price' => '92,960'],
            2 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ネヴァーフル MM モノグラム M40995', 'price' => '104,800'],
        ],
        5 => [
            1 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ポルトフォイユ・カプシーヌ M61250', 'price' => '104,800'],
            2 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ポルトフォイユ・カプシーヌ M61248', 'price' => '83,500'],
            3 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ポルトフォイユ・サラ モノグラム M60531', 'price' => '55,800'],
            4 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ポルトフォイユ・ブラザ モノグラムエクリプス  M61697', 'price' => '45,500'],
        ],
        6 => [
            1 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ジッピー・オーガナイザー モノグラム M62581', 'price' => '69,800'],
            2 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ジッピー・ウォレット モノグラム M42616', 'price' => '62,800'],
            3 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ジッピー・コイン パース モノグラムアンプラント M60574', 'price' => '41,800'],
        ],
        7 => [
            1 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン パームスプリングス バックパック MM', 'price' => '167,800'],
            2 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン トータリー MM ダミエ N41281', 'price' => '108,500'],
            3 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ウェストミンスター PM N41102', 'price' => '97,800'],
            4 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ティヴォリ PM モノグラム M40143', 'price' => '104,800'],
            5 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン バケット PM モノグラム M42238', 'price' => '62,800'],
            6 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ミュルティクレ 6 ダミエ N62630', 'price' => '16,500'],
            7 => ['name' => 'ルイヴィトン', 'ttl' => 'ルイヴィトン ポシェット・コスメティック モノグラム M47515', 'price' => '24,500'],
        ],
    ];

} elseif ( $current_slug === 'chanel' && $parent_slug === 'brand' ) {
    $show_tabs = true;
	$parent_label = 'ブランド';
    $img_dir = 'brand/chanel'; 
    $categories = [ 1 => 'マトラッセ', 2 => 'ボーイシャネル', 3 => 'コココクーン', 4 => 'その他' ];
    $items_config = [
        1 => [
            1 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセ 復刻トート ゴールド金具 A01804', 'price' => '116,000'],
            2 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセ チェーントート ショルダーバッグ A50995', 'price' => '320,000'],
            3 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセ ココハンドル A57043', 'price' => '359,000'],
            4 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセ 巾着型 チェーンリュック A94417', 'price' => '242,000'],
            5 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセ ラップバッグ AS0416', 'price' => '404,000'],
            6 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセステッチ ボーイシャネル A67086', 'price' => '480,000'],
            7 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセ ロングウォレット A50097', 'price' => '100,000'],
            8 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセ フラップショルダー A93752', 'price' => '370,000'],
            9 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセステッチ パリビアビッツ A46107', 'price' => '166,000'],
            10 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセ チェーンショルダー', 'price' => '168,000'],
            11 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセ スモールフラップウォレット AP0231', 'price' => '71,000'],
            12 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセラウンドファスナー シルバー金具 A50097', 'price' => '116,000'],
            13 => ['name' => 'シャネル', 'ttl' => 'シャネル マトラッセ チェーンショルダー', 'price' => '182,000'],
        ],
        2 => [
            1 => ['name' => 'シャネル', 'ttl' => 'シャネル ボーイシャネル スモールフラップウォレット A81996', 'price' => '97,000'],
        ],
        3 => [
            1 => ['name' => 'シャネル', 'ttl' => 'シャネル コココクーン ボストンバッグ', 'price' => '166,000'],
        ],
        4 => [
            1 => ['name' => 'シャネル', 'ttl' => 'シャネル テクスチャーココマーク 5チャーム', 'price' => '140,000'],
            2 => ['name' => 'シャネル', 'ttl' => 'シャネル ボーイシャネル シェブロン A67085', 'price' => '377,000'],
            3 => ['name' => 'シャネル', 'ttl' => 'シャネル バニティバッグ コスメポーチ A01619', 'price' => '67,000'],
            4 => ['name' => 'シャネル', 'ttl' => 'シャネル バニティケース チェーンショルダー A93343', 'price' => '398,000'],
            5 => ['name' => 'シャネル', 'ttl' => 'シャネル ホーボーバッグ ガブリエル ドゥ A93824', 'price' => '500,000'],
        ],
    ];
} elseif ( $current_slug === 'hermes' && $parent_slug === 'brand' ) {
    $show_tabs = true;
	$parent_label = 'ブランド';
    $img_dir = 'brand/hermes'; 
    $categories = [ 1 => 'バーキン', 2 => 'ケリー', 3 => 'ピコタン', 4 => 'エヴリン', 5 => 'ボリード', 6 => 'コンスタンス', 7 => 'エールバッグ', 8 => 'リンディ', 9 => 'その他' ];
    $items_config = [
        1 => [
            1 => ['name' => 'エルメス', 'ttl' => 'エルメス バーキン40　シルバー金具', 'price' => '1,438,000'],
        ],
        2 => [
            1 => ['name' => 'エルメス', 'ttl' => 'エルメス ケリー28', 'price' => '799,000'],
        ],
        3 => [
            1 => ['name' => 'エルメス', 'ttl' => 'エルメス ピコタンロック', 'price' => '199,000'],
        ],
        4 => [
            1 => ['name' => 'エルメス', 'ttl' => 'エルメス エブリン', 'price' => '175,000'],
        ],
        5 => [
            1 => ['name' => 'エルメス', 'ttl' => 'エルメス ボリード31', 'price' => '411,000'],
        ],
        6 => [
            1 => ['name' => 'エルメス', 'ttl' => 'エルメス Hベルト コンスタンス', 'price' => '63,000'],
            2 => ['name' => 'エルメス', 'ttl' => 'エルメス コンスタンス ', 'price' => '449,800'],
        ],
        7 => [
            1 => ['name' => 'エルメス', 'ttl' => 'エルメス エールバッグ', 'price' => '70,000'],
        ],
        8 => [
            1 => ['name' => 'エルメス', 'ttl' => 'エルメス リンディ30', 'price' => '494,000'],
        ],
        9 => [
            1 => ['name' => 'エルメス', 'ttl' => 'エルメス ガーデンパーティーPM', 'price' => '295,000'],
            2 => ['name' => 'エルメス', 'ttl' => 'エルメス ベアンスフレ', 'price' => '199,000'],
            3 => ['name' => 'エルメス', 'ttl' => 'エルメス ガーデンパーティポケット', 'price' => '183,000'],
            4 => ['name' => 'エルメス', 'ttl' => 'エルメス ドゴン', 'price' => '164,000'],
            5 => ['name' => 'エルメス', 'ttl' => 'エルメス ロデオチャーム', 'price' => '60,000'],
            6 => ['name' => 'エルメス', 'ttl' => 'エルメス ポップH', 'price' => '43,000'],
            7 => ['name' => 'エルメス', 'ttl' => 'エルメス ポシェット オメニトゥ', 'price' => '63,000'],
            8 => ['name' => 'エルメス', 'ttl' => 'エルメス ヴィクトリア', 'price' => '199,000'],
            9 => ['name' => 'エルメス', 'ttl' => 'エルメス エールラインPM', 'price' => '15,000'],
            10 => ['name' => 'エルメス', 'ttl' => 'エルメス エマイユ', 'price' => '19,000'],
            11 => ['name' => 'エルメス', 'ttl' => 'エルメス クリッククラックH', 'price' => '38,000'],
        ],
    ];
} elseif ( $current_slug === 'gucci' && $parent_slug === 'brand' ) {
    $show_tabs = true;
	$parent_label = 'ブランド';
    $img_dir = 'brand/gucci'; 
    $categories = [ 1 => 'バッグ', 2 => '財布', 3 => 'バンブー', 4 => 'その他' ];
    $items_config = [
        1 => [
            1 => ['name' => 'エルメス', 'ttl' => 'グッチ シルヴィミニバッグ 470270', 'price' => '144,060'],
            2 => ['name' => 'エルメス', 'ttl' => 'グッチ ディオニュソス チェーンショルダー 400249', 'price' => '144,060'],
            3 => ['name' => 'エルメス', 'ttl' => 'グッチ シェブロン ハート チェーンショルダー 547260', 'price' => '162,260'],
            4 => ['name' => 'エルメス', 'ttl' => 'グッチ GGマーモント ショルダーバッグ 443496', 'price' => '140,560'],
            5 => ['name' => 'エルメス', 'ttl' => 'グッチ オフィディア ハンドバッグ 547551', 'price' => '118,860'],
            6 => ['name' => 'エルメス', 'ttl' => 'グッチ GGスプリーム×ウェブ リュックク 495563', 'price' => '129,360'],
            7 => ['name' => 'エルメス', 'ttl' => 'グッチ グッチプリント ショルダーバッグ 523588', 'price' => '111,860'],
            8 => ['name' => 'エルメス', 'ttl' => 'グッチ タイガーヘッド ショルダー 473875', 'price' => '93,660'],
            9 => ['name' => 'エルメス', 'ttl' => 'グッチ ソーホー ハンドバッグ 431571', 'price' => '89,600'],
            10 => ['name' => 'エルメス', 'ttl' => 'グッチ GGブルームス トートバッグ 546325', 'price' => '81,760'],
            11 => ['name' => 'エルメス', 'ttl' => 'グッチ ホースビット ショルダーバッグ 384821', 'price' => '69,860'],
            12 => ['name' => 'エルメス', 'ttl' => 'グッチ ウエストバッグ ヒップバッグ 450956', 'price' => '52,360'],
        ],
        2 => [
            1 => ['name' => 'エルメス', 'ttl' => 'グッチ 折り財布 ウェブライン×GGスプリーム 408826', 'price' => '26,460'],
            2 => ['name' => 'エルメス', 'ttl' => 'グッチ GGクリスタル 長財布 231841', 'price' => '24,360'],
            3 => ['name' => 'エルメス', 'ttl' => 'グッチ ラウンドファスナー グッチシマ 244994', 'price' => '29,960'],
            4 => ['name' => 'エルメス', 'ttl' => 'グッチ オフィディア Wホック GGマーモント 523173', 'price' => '34,860'],
            5 => ['name' => 'エルメス', 'ttl' => 'グッチ GUCCY ジップアラウンドウォレット 510488', 'price' => '41,860'],
        ],
        3 => [
            1 => ['name' => 'エルメス', 'ttl' => 'グッチ バンブー×ウェブ ハンドバッグ 470271', 'price' => '108,360'],
        ],
        4 => [
            1 => ['name' => 'エルメス', 'ttl' => 'グッチ ラブリー カードケース 251848', 'price' => '13,860'],
            2 => ['name' => 'エルメス', 'ttl' => 'グッチ クーリエ タイガー UFO ドラゴン アップリケ', 'price' => '41,860'],
        ],
    ];
} elseif ( $current_slug === 'prada' && $parent_slug === 'brand' ) {
    $show_tabs = true;
	$parent_label = 'ブランド';
    $img_dir = 'brand/prada'; 
    $categories = [ 1 => 'バッグ', 2 => '財布', 3 => 'ボンバー', 4 => 'その他' ];
    $items_config = [
        1 => [
            1 => ['name' => 'プラダ', 'ttl' => 'プラダ サフィアーノ シティ 1BA103', 'price' => '111,000'],
            2 => ['name' => 'プラダ', 'ttl' => 'プラダ サフィアーノ ルクス 1BA896', 'price' => '80,000'],
            3 => ['name' => 'プラダ', 'ttl' => 'プラダ テスートメタル 1BZ026', 'price' => '68,000'],
            4 => ['name' => 'プラダ', 'ttl' => 'プラダ カパナ 1BG439', 'price' => '64,000'],
            5 => ['name' => 'プラダ', 'ttl' => 'プラダ テスート×サフィアーノ 2VH093', 'price' => '55,000'],
            6 => ['name' => 'プラダ', 'ttl' => 'プラダ カパナ B2439G', 'price' => '50,000'],
            7 => ['name' => 'プラダ', 'ttl' => 'プラダ ビブリオテーク 1BG098', 'price' => '123,000'],
            8 => ['name' => 'プラダ', 'ttl' => 'プラダ ヴィッテロダイノ BN2793', 'price' => '86,000'],
            9 => ['name' => 'プラダ', 'ttl' => 'プラダ カナパビジュー スタッズ B2642O', 'price' => '45,000'],
            10 => ['name' => 'プラダ', 'ttl' => 'プラダ サフィアーノガレリア 1BA274', 'price' => '94,000'],
            11 => ['name' => 'プラダ', 'ttl' => 'プラダ テスートサフィアーノ VA0269', 'price' => '24,000'],
        ],
        2 => [
            1 => ['name' => 'プラダ', 'ttl' => 'プラダ サフィアーノメタル 1ML506', 'price' => '37,000'],
            2 => ['name' => 'プラダ', 'ttl' => 'プラダ サフィアーノ ロングウォレット 1M1132', 'price' => '24,000'],
            3 => ['name' => 'プラダ', 'ttl' => 'プラダ ロゴ メンズ長財布', 'price' => '39,000'],
            4 => ['name' => 'プラダ', 'ttl' => 'プラダ サフィアーノメタル ロングウォレット 1ML506', 'price' => '38,000'],
        ],
        3 => [
            1 => ['name' => 'プラダ', 'ttl' => 'プラダ テスート ボンバー BN2632', 'price' => '73,000'],
        ],
        4 => [
            1 => ['name' => 'プラダ', 'ttl' => 'プラダ ドキュメントケース 2VN003', 'price' => '59,000'],
            2 => ['name' => 'プラダ', 'ttl' => 'プラダ サフィアーノキーケース 6連 1M0222', 'price' => '20,000'],
            3 => ['name' => 'プラダ', 'ttl' => 'プラダ レディースサングラス SPR08P', 'price' => '17,000'],
            4 => ['name' => 'プラダ', 'ttl' => 'プラダ サフィアーノ メタル キーホルダー6連 1PG222', 'price' => '13,000'],
        ],
    ];
} elseif ( $current_slug === 'coach' && $parent_slug === 'brand' ) {
    $show_tabs = true;
	$parent_label = 'ブランド';
    $img_dir = 'brand/coach'; 
    $categories = [ 1 => 'バッグ', 2 => '財布' ];
    $items_config = [
        1 => [
            1 => ['name' => 'コーチ', 'ttl' => 'コーチ リビングトン リュック シグネチャー 40344', 'price' => '21,000'],
            2 => ['name' => 'コーチ', 'ttl' => 'コーチ チャーリー キャリーオール オンブレ 41381', 'price' => '17,000'],
            3 => ['name' => 'コーチ', 'ttl' => 'コーチ ディズニーコラボ カメラバッグ ウィズ ダンボ 69252', 'price' => '16,000'],
            4 => ['name' => 'コーチ', 'ttl' => 'コーチ ロゴ シグネチャー バックパック F72482', 'price' => '11,000'],
            5 => ['name' => 'コーチ', 'ttl' => 'コーチ イーディーショルダーバッグ 57125', 'price' => '11,000'],
            6 => ['name' => 'コーチ', 'ttl' => 'コーチ スワッガー 2WAY ショルダーバッグ 21351', 'price' => '14,000'],
            7 => ['name' => 'コーチ', 'ttl' => 'コーチ ディズニー ダークフェアリーテイル パッチ 31153', 'price' => '10,000'],
            8 => ['name' => 'コーチ', 'ttl' => 'コーチ サープラ グラハム フォルドオーバー F50712', 'price' => '10,000'],
            9 => ['name' => 'コーチ', 'ttl' => 'コーチ クーパー キャリーオール ウィズ リベット 31932', 'price' => '11,000'],
            10 => ['name' => 'コーチ', 'ttl' => 'コーチ アウトライン シグネチャー スモール レクシー F29548', 'price' => '9,000'],
            11 => ['name' => 'コーチ', 'ttl' => 'コーチ マディソン ホーボー 2WAY ショルダーバッグ 27858', 'price' => '9,000'],
            12 => ['name' => 'コーチ', 'ttl' => 'コーチ シグネチャーヒップバッグ F48740', 'price' => '8,000'],
            13 => ['name' => 'コーチ', 'ttl' => 'コーチ ディズニー ミッキー ミニー F29358', 'price' => '8,000'],
            14 => ['name' => 'コーチ', 'ttl' => 'コーチ チャーリー ミニ F28995', 'price' => '7,000'],
            15 => ['name' => 'コーチ', 'ttl' => 'コーチ ストライプ ハンドバッグ シグネチャー 10124', 'price' => '4,000'],
        ],
        2 => [
            1 => ['name' => 'コーチ', 'ttl' => 'コーチ スモールウォレット ウィズ スキャッタード 76545', 'price' => '10,000'],
            2 => ['name' => 'コーチ', 'ttl' => 'コーチ ウィズ メドウ プレーリー プリント ジップアラウンドウォレット 69832', 'price' => '8,000'],
            3 => ['name' => 'コーチ', 'ttl' => 'コーチ アコーディオンジップ ラウンドファスナー 52372', 'price' => '8,000'],
            4 => ['name' => 'コーチ', 'ttl' => 'コーチ アコーディオン ヴィクトリアン フローラル ジップアラウンドウォレット F87716', 'price' => '5,000'],
            5 => ['name' => 'コーチ', 'ttl' => 'コーチ フローラルプリント 三つ折りウォレット F53758', 'price' => '5,000'],
        ],
    ];
} elseif ( $current_slug === 'tokei' ) {
    $show_tabs = true;
	$parent_label = '時計';
    $img_dir = 'tokei'; 
    $categories = [ 1 => 'ロレックス', 2 => 'オメガ', 3 => 'パテックフィリップ', 4 => 'その他' ];
    $items_config = [
        1 => [
            1 => ['name' => 'ロレックス', 'ttl' => 'ロレックス サブマリーナ 126613', 'price' => '2,000,000'],
            2 => ['name' => 'ロレックス', 'ttl' => 'ロレックス サブマリーナ 116613LN', 'price' => '1,400,000'],
            3 => ['name' => 'ロレックス', 'ttl' => 'ロレックス デイトジャスト 179173G', 'price' => '500,000'],
            4 => ['name' => 'ロレックス', 'ttl' => 'ロレックス オイスターパーペチュアル 15200', 'price' => '400,000'],
            5 => ['name' => 'ロレックス', 'ttl' => 'ロレックス GMTマスターⅡ 116710LN', 'price' => '1,200,000'],
            6 => ['name' => 'ロレックス', 'ttl' => 'ロレックス デイトナ 116520', 'price' => '2,400,000'],
            7 => ['name' => 'ロレックス', 'ttl' => 'ロレックス パールマスター 18946A PT', 'price' => '4,500,000'],
            8 => ['name' => 'ロレックス', 'ttl' => 'ロレックス ヨットマスターⅡ 116680', 'price' => '1,800,000'],
            9 => ['name' => 'ロレックス', 'ttl' => 'ロレックス エアキング 14000M', 'price' => '300,000'],
            10 => ['name' => 'ロレックス', 'ttl' => 'ロレックス デイデイト 18238A', 'price' => '1,400,000'],
            11 => ['name' => 'ロレックス', 'ttl' => 'ロレックス シードゥエラー 116600', 'price' => '1,500,000'],
            12 => ['name' => 'ロレックス', 'ttl' => 'ロレックス スカイドゥエラー 326939', 'price' => '3,000,000'],
        ],
        2 => [
            1 => ['name' => 'オメガ', 'ttl' => 'オメガ スピードマスター ムーンフェイズ', 'price' => '400,000'],
            2 => ['name' => 'オメガ', 'ttl' => 'オメガ コンステレーション', 'price' => '320,000'],
        ],
        3 => [
            1 => ['name' => 'パテックフィリップ', 'ttl' => 'パテック・フィリップ ノーチラス 5712/1A-001 プチコンプリケーション', 'price' => '9,000,000'],
        ],
        4 => [
            1 => ['name' => 'ブライトリング', 'ttl' => 'ブライトリング クロノマット A13356', 'price' => '200,000'],
            2 => ['name' => 'パネライ', 'ttl' => 'パネライ PAM00231 PG', 'price' => '1,110,000'],
            3 => ['name' => 'フランクミューラー', 'ttl' => 'フランクミューラー ロングアイランド 1200CHDCD No.85 ダイヤ', 'price' => '3,000,000'],
            4 => ['name' => 'ウブロ', 'ttl' => 'ウブロ キングパワーウニコ 701.NX.0170.RX', 'price' => '700,000'],
            5 => ['name' => 'シャネル', 'ttl' => 'シャネル プルミエール H2163 ベゼルダイヤ', 'price' => '200,000'],
        ],
    ];
} elseif ( $current_slug === 'jewelry' ) {
    $show_tabs = true;
	$parent_label = '宝石';
    $img_dir = 'jewelry'; 
    $categories = [ 1 => 'エメラルド', 2 => 'サファイア' ];
    $items_config = [
        1 => [
            1 => ['name' => 'エメラルド', 'ttl' => 'エメラルドリング1.09ct Pt900', 'price' => '120,000'],
            2 => ['name' => 'エメラルド', 'ttl' => 'エメラルドイヤリング 0.82ct Pt900', 'price' => '95,000'],
            3 => ['name' => 'エメラルド', 'ttl' => 'エメラルドリング 1.24ct Pt900', 'price' => '96,000'],
            4 => ['name' => 'エメラルド', 'ttl' => 'エメラルドリング 0,81ct Pt900', 'price' => '64,500'],
            5 => ['name' => 'エメラルド', 'ttl' => 'エメラルドリング Pt900', 'price' => '71,000'],
            6 => ['name' => 'エメラルド', 'ttl' => 'エメラルドリング 0,68ct Pt900', 'price' => '62,800'],
            7 => ['name' => 'エメラルド', 'ttl' => 'エメラルドリング 0,55ct Pt900', 'price' => '75,900'],
            8 => ['name' => 'エメラルド', 'ttl' => 'エメラルドリング 1,15ct K18WG', 'price' => '86,000'],
            9 => ['name' => 'エメラルド', 'ttl' => 'エメラルドリング 0,77ct K18YG', 'price' => '48,800'],
            10 => ['name' => 'エメラルド', 'ttl' => 'エメラルドピアス 0.30ct/0.30ct K18WG', 'price' => '77,500'],
        ],
        2 => [
            1 => ['name' => 'サファイア', 'ttl' => 'サファイアリング 1.68ct K18WG', 'price' => '82,000'],
            2 => ['name' => 'サファイア', 'ttl' => 'バイオレットサファイアネックレス1.36ct K18WG', 'price' => '111,000'],
            3 => ['name' => 'サファイア', 'ttl' => 'ピンクサファイアリング 1.30ct Pt900', 'price' => '92,000'],
            4 => ['name' => 'サファイア', 'ttl' => 'ピンクサファイアリング 0.66ct K18PG', 'price' => '80,000'],
            5 => ['name' => 'サファイア', 'ttl' => 'サファイアリング 1.18ct K18WG', 'price' => '74,000'],
            6 => ['name' => 'サファイア', 'ttl' => 'サファイアネックレス 0.57ct Pt900', 'price' => '68,500'],
            7 => ['name' => 'サファイア', 'ttl' => 'サファイアピアス K18YG', 'price' => '25,000'],
            8 => ['name' => 'サファイア', 'ttl' => 'サファイアリング 1.17ct K18YG', 'price' => '46,000'],
            9 => ['name' => 'サファイア', 'ttl' => 'ピンクサファイアネックレス 0.60ct K18WG', 'price' => '30,000'],
            10 => ['name' => 'サファイア', 'ttl' => 'オレンジサファイアリング 0.91ct Pt900', 'price' => '52,000'],
        ],
    ];
} elseif ( $current_slug === 'diamond' ) {
    $show_tabs = true;
	$parent_label = 'ダイヤモンド';
    $img_dir = 'diamond'; 
    $categories = [ 1 => 'リング（指輪）', 2 => 'ネックレス', 3 => 'ピアス', 4 => 'ペンダントトップ' ];
    $items_config = [
        1 => [
            1 => ['name' => 'リング（指輪）', 'ttl' => 'ダイヤモンドリング0.80ct/0.13ct K18YG', 'price' => '210,000'],
            2 => ['name' => 'リング（指輪）', 'ttl' => 'ピンクダイヤ 1.53ct ダイヤリング Pt900', 'price' => '976,000'],
            3 => ['name' => 'リング（指輪）', 'ttl' => 'ダイヤモンドリング0.30ct/0.83ct K18YG', 'price' => '90,000'],
            4 => ['name' => 'リング（指輪）', 'ttl' => 'ダイヤモンドリング0.79ct Pt900', 'price' => '80,000'],
            5 => ['name' => 'リング（指輪）', 'ttl' => 'ピンクダイヤモンド1.09ct Pt900', 'price' => '1,200,000'],
            6 => ['name' => 'リング（指輪）', 'ttl' => 'ダイヤモンドリング0.62ct Pt900', 'price' => '210,000'],
            7 => ['name' => 'リング（指輪）', 'ttl' => 'ダイヤモンドリング0.80ct Pt900', 'price' => '79,000'],
            8 => ['name' => 'リング（指輪）', 'ttl' => 'ダイヤモンドリング0.19ct/0.26ct Pt900', 'price' => '38,000'],
            9 => ['name' => 'リング（指輪）', 'ttl' => 'ダイヤモンドリング1.08ct Pt900', 'price' => '68,000'],
            10 => ['name' => 'リング（指輪）', 'ttl' => 'ダイヤモンドリング0.79ct K18YG', 'price' => '85,000'],
            11 => ['name' => 'リング（指輪）', 'ttl' => 'ダイヤモンドリング1.40ct K18PG', 'price' => '105,000'],
            12 => ['name' => 'リング（指輪）', 'ttl' => 'ダイヤモンドリング1.00ct Pt900', 'price' => '93,000'],
        ],
        2 => [
            1 => ['name' => 'ネックレス', 'ttl' => 'ダイヤモンドネックレス0.18ct/0.47ct K18', 'price' => '50,000'],
            2 => ['name' => 'ネックレス', 'ttl' => 'ダイヤモンドネックレス0.30ct/0.37ct K18', 'price' => '70,000'],
            3 => ['name' => 'ネックレス', 'ttl' => 'ダイヤモンドネックレス1.00ct Pt900', 'price' => '54,500'],
            4 => ['name' => 'ネックレス', 'ttl' => 'ブルーダイヤネックレス0.41ct K18', 'price' => '61,600'],
        ],
        3 => [
            1 => ['name' => 'ピアス', 'ttl' => 'ダイヤモンドピアス0.47ct/0.47ct K18YG', 'price' => '80,000'],
            2 => ['name' => 'ピアス', 'ttl' => 'ダイヤモンドピアス0.50ct/0.50ct K18YG', 'price' => '50,000'],
            3 => ['name' => 'ピアス', 'ttl' => 'ダイヤモンドピアス0.15ct/0.15ct K18YG', 'price' => '48,000'],
        ],
        4 => [
            1 => ['name' => 'ペンダントトップ', 'ttl' => 'ダイヤ・ピンクダイヤ　ペントップ 1.00ct', 'price' => '230,000'],
        ],
    ];
}

/**
 * 3. 共通処理（計算・パス確定）
 */
if ($show_tabs) {
    // 画像ディレクトリのフルパス確認
    $full_path = get_stylesheet_directory() . '/assets/images/kaitori/item/' . $img_dir;

    // 計算（$calc_settingsがある場合のみ）
    if (!empty($calc_settings)) {
        foreach ($calc_settings as $cat_id => $items) {
            foreach ($items as $item_id => $conf) {
                $key = $conf['key'];
                if (isset($items_config[$cat_id][$item_id]) && isset($args[0]->$key)) {
                    $pure_p = str_replace(',', '', $args[0]->$key);
                    if (is_numeric($pure_p)) {
                        $items_config[$cat_id][$item_id]['price'] = $conf['weight'] * $pure_p;
                    }
                }
            }
        }
    }

    $current_date = date('Y年n月j日') . "時点";
    $img_path_base = get_stylesheet_directory_uri() . '/assets/images/kaitori/item/' . $img_dir . '/';
}

/**
 * 4. HTML出力
 */
if ( $show_tabs && !empty($categories) ) :
?>
<div class="kaitori-category-tab-container">
    <?php foreach ($categories as $id => $cat_name): ?>
        <input type="radio" name="tab" id="tab<?php echo $id; ?>" <?php echo ($id === 1) ? 'checked' : ''; ?>>
    <?php endforeach; ?>

    <ul class="tabs">
        <?php foreach ($categories as $id => $cat_name): ?>
            <li class="label<?php echo $id; ?>"><label for="tab<?php echo $id; ?>"><?php echo $cat_name; ?></label></li>
        <?php endforeach; ?>
    </ul>

    <div class="tabs-content">
        <?php foreach ($categories as $id => $cat_name): ?>
            <div class="tab-content content<?php echo $id; ?>">
                <ul class="item-list d-f">
                    <?php 
                    if (isset($items_config[$id])): 
                        foreach ($items_config[$id] as $img_num => $data): 
                            $file_name = "tab{$id}-{$img_num}.jpg";
                            // 画像チェック
                            $img_file = $full_path . '/' . $file_name;
                            $img_url = $img_path_base . $file_name;
                            if (!file_exists($img_file)) {
                                $img_url = get_stylesheet_directory_uri() . '/assets/images/kaitori/item/no-image.jpg';
                            }
                    ?>
                        <li class="mb-20">
                            <div class="item-img">
                                <img src="<?php echo $img_url; ?>" alt="<?php echo $data['ttl']; ?>">
                            </div>
                            <div class="p-10">
                                <p class="kaitoriName mb-4"><?php echo $parent_label; ?>買取 &gt; <?php echo $data['name']; ?>買取</p>
                                <p class="ttl mb-10"><?php echo $data['ttl']; ?><br>お買取いたしました！</p>
                                <div class="priceBox d-f jc-sb">
                                    <div class="left color-red">買取参考価格</div>
                                    <div class="right color-red">
                                        <?php 
                                            $price_val = str_replace(',', '', $data['price']);
                                            echo is_numeric($price_val) ? number_format((float)$price_val) : $data['price'];
                                        ?><span class="small">円</span>
                                    </div>
                                </div>
                                <div class="priceBox d-f jc-sb mt-20">
                                    <div class="left"><?php echo $current_date; ?></div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; endif; ?>
                </ul>
                <button class="load-more">もっと見る</button>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>


<script>
jQuery(function($){
    const showCount = 8; 
    const initialVisible = 8; 

    $('.tabs-content .tab-content').each(function(){
        let $tab = $(this);
        let $items = $tab.find('.item-list li');
        let $button = $tab.find('.load-more');

        if ( $button.length === 0 ) return;

        // 初期化：最初の8件以外を隠す
        $items.hide().slice(0, initialVisible).show();

        // 8件以下ならボタンを隠す
        if ( $items.length <= initialVisible ) {
            $button.hide();
        }

        $button.on('click', function(){
            let visibleCount = $items.filter(':visible').length;
            $items.slice(visibleCount, visibleCount + showCount).slideDown(200);

            // 表示後、さらに隠れているものがなければボタンを消す
            setTimeout(function(){
                if ( $items.length <= $items.filter(':visible').length ) {
                    $button.fadeOut();
                }
            }, 250);
        });
    });
});
</script>
<?php endif; ?>
<!-- newここまで-->

</div>








<?php if ( !is_single('vuitton') && !is_single('chanel') && !is_single('gold') && !is_single('k18') && !is_single('k10') && !is_single('k14') && !is_single('k20') && !is_single('k22') && !is_single('k24') && !is_single('platinum') && !is_single('brand') && !is_single('hermes') && !is_single('gucci') && !is_single('prada') && !is_single('coach') && !is_single('tokei') && !is_single('jewelry') && !is_single('diamond') ): ?>
  <section class="section-inner more-btn-outer2">
	<div>
		  <?php
			if( $post->post_type =='shop'  && $post->post_parent > 0 ){
				$terms = get_the_terms( $post->ID, 'hinmoku' );
				if(count($terms[0]) > 1){
					$post_slug = $terms[0]->slug;
				}else{
					$post_slug = $terms[count($terms)-1]->slug;
				}
			}else{
				$post_slug = $post->post_name;
			}
			echo '<ul class="item-list d-f">';
			$count = 0 ;
			//買取 ALT
$sorted_groups = [];
for ($i = 1; $i <= 20; $i++) {
	$field_id = $field_id ?? null;
    $group = get_field('買取実績その' . $i, $field_id);
    if (!empty($group['買取実績その' . $i . '_画像'])) {
        $order = isset($group['買取実績表示順番' . $i]) ? intval($group['買取実績表示順番' . $i]) : 9999;
        $sorted_groups[] = [
            'index' => $i,
            'order' => $order,
            'group' => $group
        ];
    }
}
// 表示順でソート
usort($sorted_groups, function ($a, $b) {
    return $a['order'] <=> $b['order'];
});
// 출력
$count = 0;
foreach ($sorted_groups as $item) {
    $i = $item['index'];
    $group = $item['group'];
    ?>
    <li class="mb-20">
        <div class="item-img">
            <img src="<?php echo $group['買取実績その' . $i . '_画像']['sizes']['large']; ?>" alt="<?php echo $alt_img[$i]; ?>">
        </div>
        <div class="p-10">
            <p class="kaitoriName mb-4"><?php if ($group['買取実績その' . $i . '_買取名']) { echo $group['買取実績その' . $i . '_買取名']; } ?></p>
            <p class="ttl mb-10"><?php if ($group['買取実績その' . $i . '_タイトル']) { echo $group['買取実績その' . $i . '_タイトル']; } ?><br>お買取いたしました！</p>
            <div class="priceBox d-f jc-sb">
                <div class="left color-red">高価買取実績</div>
                <div class="right color-red"><?php if ($group['買取実績その' . $i . '_価格']) { echo $group['買取実績その' . $i . '_価格']; } ?><span class="small">円</span></div>
            </div>
        </div>
    </li>
    <?php
    $count++;
}
?>  
		</ul>
		<p class="small-font-size mb-24">※お持ちいただいたお品物の状態によって金額は変動いたします。</p>
	</div>
						<div class="more-btn ta-c btn2">
							<p class="open">もっと見る</p>
						</div>
	</section>
<?php endif; ?>


	</section>

<?php
	}
?>


<script>
    $(document).ready(function() { /* 買取参考価格の商品が5以上あれば「もっと見る」ボタンを表示する */
        $('.common-kaitori-resuluts .more-btn').css('display','none');
        if ($('.common-kaitori-resuluts .item-list li').length >= 5) {
            $('.common-kaitori-resuluts .more-btn').css('display','block');
        }
    });
</script>

<?php /* ?>金価格一覧
<?php
echo '<pre>';
print_r($args);
echo '</pre>';


?>
<?php */ ?>
