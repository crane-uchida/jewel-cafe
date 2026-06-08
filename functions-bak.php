<?php
/**
 * jewelcafe functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jewelcafe theme
 */

if ( ! function_exists( 'my_setup' ) ) : // 関数が既に定義されているかチェック.
	function my_setup() {
		add_theme_support( 'editor-styles' ); // 編集画面でスタイルシートを読み込めるように.
		add_editor_style( 'style-editor.css' ); // 編集画面で読み込むスタイルシートを指定.
		add_theme_support( 'post-thumbnails' ); // アイキャッチ画像を有効化.
		add_theme_support( 'automatic-feed-links' ); // 投稿とコメントのRSSフィードのリンクを有効化<head>に追加.
		// add_theme_support( 'title-tag' ); // タイトルタグ自動生成 <head>に追加.
		add_theme_support(
			'html5',
			array( // HTML5でマークアップ.
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);
		add_theme_support( 'customize-selective-refresh-widgets' ); // ウィジェット更新時に見た目も更新.
	}
endif;
add_action( 'after_setup_theme', 'my_setup' );

/**
 * カスタム投稿
 */
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'shop', [ // 投稿タイプ名の定義
			'labels' => [
				'name' => '店舗詳細ページ', // 管理画面上で表示する投稿タイプ名
				'singular_name' => 'shop',    // カスタム投稿の識別名
			],
			'public'        => true,  // 投稿タイプをpublicにするか
			'has_archive'   => true, // アーカイブ機能ON/OFF
			'hierarchical' => true, //階層化
			'rewrite' => array( 'slug' => 'shop' ),
			'menu_position' => 4,     // 管理画面上での配置場所
			'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
			'supports' => array('title','editor','thumbnail','author','revisions','page-attributes')
	]);
	register_post_type( 'kaitori', [ // 投稿タイプ名の定義
			'labels' => [
				'name' => '品目詳細ページ', // 管理画面上で表示する投稿タイプ名
				'singular_name' => 'kaitori',    // カスタム投稿の識別名
			],
			'public'        => true,  // 投稿タイプをpublicにするか
			'has_archive'   => true, // アーカイブ機能ON/OFF
			'hierarchical' => true, //階層化
			'menu_position' => 5,     // 管理画面上での配置場所
			'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
			'supports' => array('title','editor','thumbnail','author','revisions','page-attributes')
	]);
	register_post_type( 'blog', [ // 投稿タイプ名の定義
		'labels' => [
			'name' => '買取事例ブログ', // 管理画面上で表示する投稿タイプ名
			'singular_name' => 'blog',    // カスタム投稿の識別名
		],
		'public'        => true,  // 投稿タイプをpublicにするか
		'has_archive'   => true, // アーカイブ機能ON/OFF
		'rewrite' => array( 'slug' => 'blog' ),
		'menu_position' => 6,     // 管理画面上での配置場所
		'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
		'supports' => array('title','editor','thumbnail','author','revisions')
	]);
	register_post_type( 'news', [ // 投稿タイプ名の定義
			'labels' => [
				'name' => 'お知らせブログ', // 管理画面上で表示する投稿タイプ名
				'singular_name' => 'news',    // カスタム投稿の識別名
			],
			'public'        => true,  // 投稿タイプをpublicにするか
			'has_archive'   => true, // アーカイブ機能ON/OFF
			'menu_position' => 7,     // 管理画面上での配置場所
			'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
			'supports' => array('title','editor','thumbnail','author','revisions')
		]);
	register_post_type( 'column', [ // 投稿タイプ名の定義
        'labels' => [
					'name' => 'コラムブログ', // 管理画面上で表示する投稿タイプ名
					'singular_name' => 'column',    // カスタム投稿の識別名
        ],
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => true, // アーカイブ機能ON/OFF
        'menu_position' => 8,     // 管理画面上での配置場所
        'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
				'supports' => array('title','editor','thumbnail','author','revisions')
    ]);

	register_taxonomy_for_object_type('post_tag', 'blog');
}

add_action('rest_api_init', function () {
	register_rest_route('customize/', 'search_latest_purchase_price', [
		'methods'  =>  WP_REST_Server::READABLE,
		'permission_callback' => '__return_true',
		'callback' => 'get_latest_purchase_price_data'
	]);
});

function get_latest_purchase_price_data(WP_REST_Request $request) {

	// 最下層の品目タームのみを取得
	$childless_terms = get_terms('hinmoku', [
		'childless' => true,
	]);

	$childless_term_ids = array_map(function ($childless_term) {
		return $child_term->term_id;
	}, $childless_terms);

	$search = $request->get_param('search');

	// 最下層の品目タームが紐づいていてかつ、最新買取価格が入っている投稿のみを取得
	$query  = new WP_Query([
		'post_type' => 'kaitori',
		's' => $search,
		'posts_per_page' => 12,
		'post_status' => 'publish',
		'meta_query' => [
			'relation' => 'AND',
			[
				'key' => '最新買取価格',
				'value' => '',
				'compare'=>'!=',
			],
			[
				'taxonomy' => 'hinmoku',
				'terms' => $childless_term_ids,
			]
		],
	]);

	$data = [];
	$data_limit = 20;
	if ($query->have_posts()) {
		while ($query->have_posts() && count($data) < $data_limit) {
			$query->the_post();
			$terms = get_the_terms(get_the_ID(), 'hinmoku');

			// 大品目ターム名を取得
			$classification_name = null;

			$root_terms = array_filter($terms, function ($term) {
				return $term->parent === 0;
			});

			if (count($root_terms) > 0) {
				$root_term = reset($root_terms);
				$classification_name = $root_term->name;
			}

			for ($i = 1; $i <= 3; $i++) {
				$field_image = get_field('latest_image' . $i);
				$field_description = get_field('型番' . $i);
				$field_price = get_field('最新買取価格' . $i);
				if ($field_image || $field_description || $field_price) {
					$data[] = [
						'image' => $field_image ?: null,
						'classification_name' => $classification_name,
						'name' => get_the_title(),
						'description' => $field_description,
						'price' => $field_price,
					];

					if (count($data) >= $data_limit) {
						break;
					}
				}
			}
		}
		wp_reset_postdata();
	}

	$response = new WP_REST_Response($data);

	return $response;
}



/*
function ex_trailingslashit($string, $url_type) {
	

  if ($url_type == 'page'){

		$string = trailingslashit($string);
	
		wp_redirect('https://jewel-cafe.jp'.$string, 301 );
		
		exit;
  }
  
}
add_filter('user_trailingslashit', 'ex_trailingslashit', 10, 2);
*/


/*


//投稿時にスラッグを自動的に日付にする

add_action('admin_head-post-new.php','set_slug_date');
function set_slug_date() {?>
<script language="javascript">
//<![CDATA[
jQuery(document).ready(function($){
    $('input#post_name').val("<?php echo date('Ymd');?>");
});
//]]>
</script>
<?php }
*/


// パンくずリスト自動生成
if (!function_exists('kaitori_breadcrumb')) {
	function kaitori_breadcrumb($wp_obj = null)
		{
		// トップページは対象外
		if (is_home() || is_front_page()) return false;
		//そのページのWPオブジェクトを取得
		$wp_obj = $wp_obj ?: get_queried_object();
		echo
		'<div class="breadcrumbs">' . //id名などは任意で
			'<div class="section-inner">'.
				'<a href="'. esc_url( home_url() ) .'">TOP<span></span></a>';
				if(get_the_terms($wp_obj->ID, 'area')):
					$kaitori_area_parent_id = $wp_obj->post_parent;
				endif;
				if($kaitori_area_parent_id){
					/**
					* 品目のカスタム投稿からデータを取得
					*/
					global $post;
					
					$post = get_post($post->ID);
					
					if($post->post_parent > 0 ){
					
						$post_parent = get_post($post->post_parent);
											
						echo '<a href="/kaitori/letter/" >'.$post_parent->post_title.'買取 <span></span></a>';
					
					}
					
					echo $post->post_title;

					/*
					$current_hinmoku = get_the_terms($post->ID, 'hinmoku');

					$current_hinmoku_post = get_page_by_path( $current_hinmoku[0]->slug, OBJECT, 'kaitori' );
					$current_hinmoku_post_link = get_permalink( $current_hinmoku_post->ID);

					$page_title = $wp_obj->post_title;

					echo
						'<a href="' . esc_url($current_hinmoku_post_link) . '">' . $current_hinmoku[0]->name .'買取</a>';
					*/	
					
						
				} elseif (is_post_type_hierarchical( 'kaitori' )) {
					/**
					* 階層を持つカスタム投稿タイプ ( $wp_obj : WP_Post )
					*/
					$page_id = $wp_obj->ID;
					$page_title = $wp_obj->post_title;

					// 親ページがあれば順番に表示
					if ($wp_obj->post_parent !== 0) {
						$parent_array = array_reverse(get_post_ancestors($page_id));
						foreach ($parent_array as $parent_id) {
						echo
							'<a href="' . get_permalink($parent_id) . '">' . get_the_title($parent_id) .
								'買取<span></span></a>';
						}
					}
					// 投稿自身の表示
					echo '<span>' . $page_title . '買取</span>';
					
					
				} elseif ( is_post_type_archive() ) {
					/**
					* 投稿タイプアーカイブページ ( $wp_obj : WP_Post_Type )
					*/
					
					
					echo '<a href="' . home_url() . '">' . $wp_obj->label . '買取</a>';
					
					
					
				}
		echo
			'</div>'. // 冒頭に合わせて閉じタグ
		'</div>';
		}
	}

/*	カスタム投稿のパーマリンク設定
-----------------------------------------------------*/
//パーマリンクからタクソノミー名を削除
function my_custom_post_type_permalinks_set($termlink, $term, $taxonomy){
	return str_replace('/'.$taxonomy.'/', '/', $termlink);
}
add_filter('term_link', 'my_custom_post_type_permalinks_set',11,3);

// リライトルールの追加

//買取事例一覧・ページネーション
add_rewrite_rule('blog/page/([0-9]+)/?$', 'index.php?post_type=blog&paged=$matches[1]', 'top');
//買取事例投稿
add_rewrite_rule('blog/([^/]+)/([0-9]+)/?$', 'index.php?post_type=blog&p=$matches[2]', 'top');

//買取事例 タクソノミー 親
add_rewrite_rule('blogs/([^/]+)/?$', 'index.php?hinmoku=$matches[1]', 'top');
add_rewrite_rule('blogs/([^/]+)/page/([0-9]+)/?$', 'index.php?hinmoku=$matches[1]&paged=$matches[2]', 'top');

//買取事例 タクソノミー 子
add_rewrite_rule('blogs/([^/]+)/([^/]+)/?$', 'index.php?hinmoku=$matches[2]', 'top');
add_rewrite_rule('blogs/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?hinmoku=$matches[2]&paged=$matches[3]', 'top');

//買取事例 タクソノミー 孫
add_rewrite_rule('blogs/([^/]+)/([^/]+)/([^/]+)/?$', 'index.php?hinmoku=$matches[3]', 'top');
add_rewrite_rule('blogs/([^/]+)/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?hinmoku=$matches[3]&paged=$matches[4]', 'top');

// add_rewrite_rule('blog/([^/]+)/([^/]+)/([^/]+)/([^/]+)/?$', 'index.php?hinmoku=$matches[4]', 'top');
// add_rewrite_rule('blog/([^/]+)/([^/]+)/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?hinmoku=$matches[4]&paged=$matches[5]', 'top');

// 店舗 - 地方エリア
add_rewrite_rule('shop/([^/]+)/?$', 'index.php?taxonomy=area&term=$matches[1]', 'top');
add_rewrite_rule('shop/([^/]+)/page/([0-9]+)/?$', 'index.php?taxonomy=area&term=$matches[1]&paged=$matches[2]', 'top');

// 店舗 - 都道府県
add_rewrite_rule('shop/([^/]+)/([^/]+)/?$', 'index.php?taxonomy=area&term=$matches[2]', 'top');
add_rewrite_rule('shop/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?taxonomy=area&term=$matches[2]&paged=$matches[3]', 'top');

// 店舗ページ
add_rewrite_rule('shop/([^/]+)/([^/]+)/([^/]+)/?$', 'index.php?post_type=shop&name=$matches[3]', 'top');
add_rewrite_rule('shop/([^/]+)/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?post_type=shop&name=$matches[3]&paged=$matches[4]', 'top');


// 店舗品目ページ
add_rewrite_rule('shop/([^/]+)/([^/]+)/([^/]+)/([^/]+)/?$', 'index.php?post_type=shop&name=$matches[4]', 'top');


// 投稿一覧に投稿IDを表示
add_filter('manage_posts_columns', 'posts_columns_id', 5);
add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
add_filter('manage_pages_columns', 'posts_columns_id', 5);
add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);
function posts_columns_id($defaults){
$defaults['wps_post_id'] = __('ID');
return $defaults;
}
function posts_custom_id_columns($column_name, $id){
if($column_name === 'wps_post_id'){
echo $id;
}
}

//ACF Google Map
function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyBDG1w7am_338bO-1sZuc0DRIbEPHmlJ5g';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

//Really Simple CSV Importerに住所のみでACFに対応
define("GOOGLE_MAP_KEY", "AIzaSyBDG1w7am_338bO-1sZuc0DRIbEPHmlJ5g");

add_action('acf/init', function() {
		acf_update_setting('google_api_key', GOOGLE_MAP_KEY);
});

add_filter("really_simple_csv_importer_save_meta", function($meta, $post, $is_update) {

		if (isset($meta["shopmap"])) {
				$url = sprintf("https://maps.googleapis.com/maps/api/geocode/json?address=%s&key=%s", urlencode($meta["shopmap"]), GOOGLE_MAP_KEY);

				// $context = stream_context_create([
				// 		'http' => ['ignore_errors' => true]
				// ]);

				// $response = file_get_contents($url, false, $context);

				$options = stream_context_create(array('ssl' => array( //証明書エラーを無視
					'verify_peer'      => false,
					'verify_peer_name' => false
				)));

				$response = file_get_contents($url, false, $options);

				$pos = strpos($http_response_header[0], '200');
				if ($pos === false) {
						//緯度経度が取得できなかった場合は登録しない;
						return $meta;
				}

				$jsonData = json_decode($response, true);

				$lat = $jsonData["results"][0]["geometry"]["location"]["lat"];
				$lng = $jsonData["results"][0]["geometry"]["location"]["lng"];

				$meta["shopmap"] = [
						"address" => $meta["shopmap"],
						"lat" => $lat,
						"lng" => $lng
				];
		}

		return $meta;
}, 10, 3);

//ユーザー一覧画面の表示をカスタマイズ
function add_users_columns( $columns ) {
  $columns['columns_nickname'] = 'ニックネーム';
	$sort_number = array(
    'username' => 0, //ユーザー名
		'columns_nickname' => 1, //ニックネーム
    'role' => 2, //権限グループ
    'posts' => 3, //投稿
    'email' => 4, //メールアドレス
		'name' => 5 //名前
  );
  $sort = array();
  foreach($columns as $key => $value){
    $sort[] = $sort_number[$key];
  }
  array_multisort($sort,$columns);
  return $columns;
}
function add_users_custom_column( $dummy, $column, $user_id ) {
  if ( $column == 'columns_nickname' ) {
    $user_info = get_userdata($user_id);
    return $user_info->nickname;
  }
}
add_filter( 'manage_users_columns', 'add_users_columns' );
add_filter( 'manage_users_custom_column', 'add_users_custom_column', 10, 3 );

//管理画面に独自CSS追加
function add_admin_style(){
  $setUrl = get_template_directory_uri().'/assets/css/custom-admin.css';
  // スタイル読み込みキューに追加
  wp_enqueue_style( 'original_admin_style', $setUrl );
}
// アクション追加（管理画面用のキューに追加）
add_action( 'admin_enqueue_scripts', 'add_admin_style' );

//Contact Form7にショートコードを埋め込みできるように
add_filter( 'wpcf7_form_elements', 'mycustom_wpcf7_form_elements' );

function mycustom_wpcf7_form_elements( $form ) {
$form = do_shortcode( $form );

return $form;
}

// テキストウィジェット用 home_uri
function my_home_shortcode() {
	return get_bloginfo('url');
}
add_shortcode('myhome_url', 'my_home_shortcode', true);
add_filter( 'widget_text', 'do_shortcode' );

// テキストウィジェット用 get_template_directory_uri
function my_directory_uri_shortcode() {
	return get_template_directory_uri(  );
}
add_shortcode('my_directory_uri', 'my_directory_uri_shortcode', true);
add_filter( 'widget_text', 'do_shortcode' );

/**
 * サイト内検索の範囲に、カテゴリー名、タグ名、を含める
 */
function custom_search($search, $wp_query)
{
    global $wpdb;

//サーチページ以外だったら終了
    if (!$wp_query->is_search)
        return $search;

    if (!isset($wp_query->query_vars))
        return $search;

// タクソノミーを検索対象に追加
    $search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
    if (count($search_words) > 0) {
        $search = '';
        foreach ($search_words as $word) {
            if (!empty($word)) {
                $search_word = $wpdb->escape("%{$word}%");
                $search .= " AND (
					{$wpdb->posts}.post_title LIKE '{$search_word}'
					OR {$wpdb->posts}.post_content LIKE '{$search_word}'
					OR {$wpdb->posts}.ID IN (
						SELECT distinct r.object_id
						FROM {$wpdb->term_relationships} AS r
						INNER JOIN {$wpdb->term_taxonomy} AS tt ON r.term_taxonomy_id = tt.term_taxonomy_id
						INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
						WHERE t.name LIKE '{$search_word}'
					OR t.slug LIKE '{$search_word}'
					OR tt.description LIKE '{$search_word}'
					)
			) ";
            }
        }
    }

    return $search;
}
add_filter('posts_search', 'custom_search', 10, 2);


/* All In ONE SEOの独自テーブルaioseo_postsを$wpdbに対応させる */
function add_db_aioseo() {
  global $wpdb;

  $table_name = $wpdb->prefix. "aioseo_posts";
  if (!isset($wpdb->aioseo_posts))
  {
    $wpdb->aioseo_posts = $table_name;
    $wpdb->tables[] = str_replace($wpdb->prefix, '', $table_name);
  }
}
add_action( 'init', 'add_db_aioseo');

/* Ver3で運用していたがVer4になってしまったサイトに対応 */
function aioseo_description_extention($description){
  global $wpdb,$post;
  $pid = $post->ID;
  $desc0 = $wpdb->get_var($wpdb->prepare("SELECT description FROM $wpdb->aioseo_posts WHERE post_id = %d", $pid));
  $desc1 = get_post_meta($pid, '_aioseo_description', true);
  $desc2 = get_post_meta($pid, '_aioseop_description', true);
  if ($desc0 != '' && $desc0 != '#post_content') {
    $description = $desc0;
  } elseif ($desc1 != '' && $desc0 != '#post_content') {
    $description = $desc1;
  } elseif ($desc2 != '' && $desc0 != '#post_content') {
    $description = $desc2;
  }else{
		//投稿本文を取得してディスクリプションとして返す
    $description = get_the_content($pid);
  }
  return $description;
}
add_filter('aioseo_description', 'aioseo_description_extention');




function is_404_to_homeurl(){
    if( is_404() ){
		//?chirashi
		if(strpos($_SERVER['REQUEST_URI'],'/shops/?') !== false ){
			wp_redirect('/shop', 301 );
			exit();
		}
    }
}
add_action('template_redirect', 'is_404_to_homeurl');



// ページ遷移時のリダイレクトを阻止する
add_filter('redirect_canonical','my_disable_redirect_canonical');
function my_disable_redirect_canonical( $redirect_url ) {
if ( is_single('shop') ){
    //リクエストURLに「/page/」があれば、リダイレクトしない
    preg_match('/\/paged\//', $redirect_url, $matches);
    if ($matches){

		global $wp_rewrite;
		$wp_rewrite->flush_rules();

        $redirect_url = false;
        return $redirect_url;
    }
}
}




add_action( 'admin_menu', 'remove_menus' );
function remove_menus(){

	global $current_user;

    if( $current_user->roles[0] == 'author' ){

        remove_menu_page( 'edit.php?post_type=kaitori' ); //ダッシュボード


    }

}



//check  is_null

function JC_check_field( $post_id , $str){

	global $wpdb;

	$sql = "SELECT count(*) FROM `wp_postmeta` where post_id = {$post_id} and meta_key like '{$str}%'  and  meta_value != '' ";

	$count = $wpdb->get_var( $sql );

	return $count;

}



//get max

function JC_get_field_num( $post_id , $str ){

	global $wpdb;

	$sql = "SELECT * FROM `wp_postmeta` where post_id = {$post_id} and meta_key like '{$str}%' order by meta_key desc limit 1";

	$result = $wpdb->get_results( $sql );

	$text = $result[0]->meta_key;

	$text = trim(mb_convert_kana($text, 'as', 'UTF-8'));

	$hankaku = preg_replace('/[^0-9a-zA-Z]/', '', $text);

	if($hankaku < 1 ){ $hankaku = 1;}

	return $hankaku;

}




//get parent ID

function JC_get_page_parent( $parent_id , $object = true , $root = true ) {

        //parent_idが0の場合何もしない
        if( $parent_id == false ) {
            return false;
        }

        if( $object == true ) { //返り値がpostオブジェクト

            while( $parent_id ) {
                $page = get_post( $parent_id );
                $result[] = $page;
                $parent_id = $page->post_parent;
            }

        } else { //返り値がpostID

            while( $parent_id ) {
                $page_id = get_post_field( 'post_parent' , $parent_id );
                $result[] = $parent_id;
                $parent_id = $page_id;
            }

        }

        //配列を逆順に(rootを0に)
        $result = array_reverse( $result );

        //rootがtureの場合0番目(rootページのみ)をセット
        if( $root == true) {
            $result = $result[0];
        }

        return $result;
}





function my_ajax(){


	$result_arr = array();

	$add1 = $_POST['address1'];

	$add2 = $_POST['address2'];

	$add3 = $_POST['address3'];

	global $wpdb;

	$sql = "SELECT `wp_postmeta`.post_id	  FROM `wp_postmeta` LEFT JOIN `wp_posts` ON  `wp_postmeta`.post_id =  `wp_posts`.ID	  where  `wp_posts`.post_status = 'publish'  and   `wp_posts`.post_type = 'shop' and `wp_postmeta`.meta_key = '所在地' and meta_value like '%{$add1}{$add2}{$add3}%'   ";


	$count_arr = 0;

	$result = $wpdb->get_results( $sql );

	$num = $wpdb->num_rows;

	if($num > 0 ){

		foreach($result as $k=>$v) {


			$post_meta = get_post_meta($v->post_id);

			$result_arr[$count_arr]['url'] = get_permalink($v->post_id);

			$result_arr[$count_arr]['tel'] = $post_meta['店舗電話番号'][0];

			$result_arr[$count_arr]['time'] = $post_meta['営業時間'][0];

			$result_arr[$count_arr]['add'] = $post_meta['所在地'][0];

			$result_arr[$count_arr]['id'] = $v->post_id;

			$result_arr[$count_arr]['title'] = get_the_title($v->post_id);

			$count_arr++;

		}

	}



	if( count($result_arr) <10 ){

		$sql = "SELECT * FROM `wp_postmeta` LEFT JOIN `wp_posts` ON  `wp_postmeta`.post_id =  `wp_posts`.ID	  where  `wp_posts`.post_status = 'publish'  and   `wp_posts`.post_type = 'shop' and `wp_postmeta`.meta_key = '所在地' and meta_value like '%{$add1}{$add2}%'   ";


		$result = $wpdb->get_results( $sql );

		$num = $wpdb->num_rows;



		if($num > 0 ){

			foreach($result as $k=>$v) {

				$post_meta = get_post_meta($v->post_id);

				$result_arr[$count_arr]['url'] = get_permalink($v->post_id);

				$result_arr[$count_arr]['tel'] = $post_meta['店舗電話番号'][0];

				$result_arr[$count_arr]['time'] = $post_meta['営業時間'][0];

				$result_arr[$count_arr]['add'] = $post_meta['所在地'][0];

				$result_arr[$count_arr]['id'] = $v->post_id;

				$result_arr[$count_arr]['title'] = get_the_title($v->post_id);

				$count_arr++;

			}

		}

			if( count($result_arr) <10 ){

				$sql = "SELECT * FROM `wp_postmeta` LEFT JOIN `wp_posts` ON  `wp_postmeta`.post_id =  `wp_posts`.ID	  where  `wp_posts`.post_status = 'publish'  and  `wp_posts`.post_type = 'shop' and `wp_postmeta`.meta_key = '所在地' and meta_value like '%{$add1}%'   ";

				$result = $wpdb->get_results( $sql );

				$num = $wpdb->num_rows;

				if($num > 0 ){

					foreach($result as $k=>$v) {

						$post_meta = get_post_meta($v->post_id);



						$result_arr[$count_arr]['url'] = get_permalink($v->post_id);

						$result_arr[$count_arr]['tel'] = $post_meta['店舗電話番号'][0];

						$result_arr[$count_arr]['time'] = $post_meta['営業時間'][0];

						$result_arr[$count_arr]['add'] = $post_meta['所在地'][0];

						$result_arr[$count_arr]['id'] = $v->post_id;

						$result_arr[$count_arr]['title'] = get_the_title($v->post_id);

						$count_arr++;

					}

				}

			}

	}




	header("Content-type: application/json; charset=UTF-8");

	echo json_encode($result_arr);



	/*
   $_POST['address1'];
   $_POST['address2'];
   $_POST['address3'];
	*/

    wp_die();

}

add_action( 'wp_ajax_my_ajax_action', 'my_ajax' );
add_action( 'wp_ajax_nopriv_my_ajax_action', 'my_ajax' );








function brand_ajax(){

	global $wpdb;


	$sql = "SELECT count(*) FROM `wp_terms` where name LIKE BINARY '%{$_POST['brand']}%'   ";

	$count = $wpdb->get_var( $sql );


	if($count > 0){

		$sql_search = "SELECT * FROM `wp_term_taxonomy` left join `wp_terms`  ON `wp_term_taxonomy`.term_id = `wp_terms`.term_id  where `wp_term_taxonomy`.taxonomy  = 'hinmoku' and `wp_terms`.name LIKE  BINARY  '%{$_POST['brand']}%' ";

		$result_search = $wpdb->get_results($sql_search);

		if( $wpdb->num_rows > 0){

			foreach( $result_search as $k=>$v ){
				// 把搜索结果集存进一个数组
				$results_search[] = $v;
			}

		}

		echo json_encode($results_search,JSON_UNESCAPED_UNICODE);

	}

    wp_die();


}

add_action( 'wp_ajax_brand_ajax_action', 'brand_ajax' );
add_action( 'wp_ajax_nopriv_brand_ajax_action', 'brand_ajax' );







function search_ajax(){

	global $wpdb;


    $sql_search = " SELECT `wp_posts`.ID,`wp_posts`.post_date, `wp_posts`.post_title FROM `wp_posts`   left  join `wp_term_relationships` ON 	`wp_term_relationships`.object_id  = `wp_posts`.ID  WHERE `wp_posts`.post_type = 'blog' and `wp_posts` . post_status = 'publish' and  `wp_term_relationships`.term_taxonomy_id = {$_POST['data_id']}; ";


    $result_search = $wpdb->get_results($sql_search);


	if( $wpdb->num_rows > 0){

		foreach( $result_search as $k=>$v ){

			$results_search[] = $v;
		}

	}


	echo json_encode($results_search,JSON_UNESCAPED_UNICODE);

    wp_die();

}

add_action( 'wp_ajax_search_ajax_action', 'search_ajax' );
add_action( 'wp_ajax_nopriv_search_ajax_action', 'search_ajax' );





add_action('admin_menu', 'custom_menu_page');
function custom_menu_page()
{
	add_menu_page('店舗設定画面', '店舗設定', 'manage_options', 'custom_menu_page', 'add_custom_menu_page', 'dashicons-store', 4);
	add_action('admin_init', 'register_custom_setting');

}



function add_custom_menu_page()
{
?>

<style>
	.admin-table{border-collapse: collapse; border-color:#666;}
	.admin-table th{padding:10px;background:#eeeeee;width:180px;border:1px solid #c3c4c7;border-right:0px;}
	.admin-table td{padding:10px;border:1px solid #c3c4c7;border-left:0px;}

	.postbox{padding:10px;}


</style>

<div class="wrap">

  <form method="post" action="options.php" enctype="multipart/form-data" encoding="multipart/form-data">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>
    <div class="metabox-holder">
      <div class="postbox ">

	  <h2>店舗情報設定</h2>

	  <table cellpadding="0" cellspacing="0" width="100%" class="admin-table">
			<tr>
				<th>店舗数</th>
				<td>

					<div style="padding:10px;"><input type="text" id="shop" name="shop" value="<?php echo get_option('shop'); ?>"><span style="margin-left:10px;">数字のみ入力してください。</span></div>

					<h2 style="padding:0px 10px;">MYSQL QUERY(<span style="color:red;">データベース 修正</span>)</h2>

					<div style="padding:10px;">UPDATE `wp_options` SET option_value = REPLACE ( option_value, '250店舗', <span style="color:red;">'251店舗'</span> );</div>

					<div style="padding:10px;">UPDATE `wp_posts` SET post_title = REPLACE ( post_title, '250店舗', <span style="color:red;">'251店舗'</span> );</div>

					<div style="padding:10px;">UPDATE `wp_posts` SET post_content = REPLACE ( post_content, '250店舗', <span style="color:red;">'251店舗'</span> );</div>

					<div style="padding:10px;">UPDATE `wp_postmeta` SET meta_value = REPLACE ( meta_value, '250店舗', <span style="color:red;">'251店舗'</span> );</div>

				</td>
			</tr>
	  </table>


      </div>

    </div>
    <?php submit_button(); ?>
  </form>
</div>


<?php
}


function register_custom_setting()
{
    register_setting('custom-menu-group', 'shop');
}



/**
 * Deregister scripts
 */
function deregister_or_dequeue_scripts() {
    wp_dequeue_script('wc-password-strength-meter');
}

add_action('wp_print_scripts', 'deregister_or_dequeue_scripts', 20);



/*
	画像に関する　data-src
*/
//add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );


/*----------------------------------------------------
 recaptcha
----------------------------------------------------*/
add_action('wp_enqueue_scripts', function() {
  // recaptchaを表示させたい固定ページの slug を指定します。複数OK
  $page_list = [
    'property',
    'form_takuhai',
    'form_syuttyou',
  ];
  if(is_page($page_list)) return;
  wp_deregister_script('google-recaptcha');
}, 100);




function get_shop_data(){
	
	
	
	
}



function display_filed(){
	
	
	
	
}



/*

if( is_admin() ) {
	
	add_action( 'post_submitbox_misc_actions', 'disable_publish_button' );
	function disable_publish_button() {
		global $post;
		
		 if( 'shop' == $post->post_type ) {
	
		?>
		
		<label>
		<div class="misc-pub-section">
			<span id="shop-publish-button">
				店舗タグに追加・修正する
			</span>

		  <form method="post" action="options.php" enctype="multipart/form-data" encoding="multipart/form-data">
			<?php
			settings_fields('custom-menu-group');
			do_settings_sections('custom-menu-group'); ?>
			<div class="metabox-holder">
			  <div class="postbox ">

			  <h2>店舗情報設定</h2>


			  </div>

			</div>
			<?php submit_button(); ?>
		  </form>
  
  


		</div>
		</label>
		
		
		<style scoped>
		.misc-pub-section #shop-publish-button {
			padding: 2px 0 1px;
			display: inline!important;
			height: auto!important;
			font-style: normal !important;
		}
		.misc-pub-section #shop-publish-button:before {
			font: 400 25px/1 dashicons;
			speak: none;
			display: inline-block;
			padding: 0 2px 0 0;
			top: 0;
			left: -1px;
			position: relative;
			vertical-align: top;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			text-decoration: none!important;
			content: "\f12a"; 
			color: #82878c;
		}
		</style>
		
		<?php 
	}
	
	}
}






function custom_edit_newpost_delete($hook) {
	
    if($hook == 'edit.php' || $hook == 'post.php'){
        $postType = get_post_type();

		

        if ( $postType == 'shop' ) {
			
            global $post;
			
			
			print_R($post);
			
			
			
			//$post->post_title;
			
			//$post->post_name;
			
			//$count = get_posts( array('post_type'=>'shop','orderby'=>'ID','post'=>1 ,'post_title' =>$post->post_title) );
		
			global $wpdb;

			$sql = "select count(*) from `wp_terms` WHERE name =".$post->post_title;

			$res = $wpdb->get_results($sql); 
			
			
			if( count($res) < 1 ) :
			
				$sql = "insert into `wp_terms` VALUES (NULL,".$post->post_title.", " .$post->post_name. "0,0); ";
	
			else:
				
				$sql = "update `wp_terms` set name = ".$post->name . ", slug = ".$post->post_name . ",term_group =0 , term_order=0;  ";

			endif;
	
			$res = $wpdb->get_results($sql); 
	
	

		
			//$terms = get_terms( 'area', array( 'get' => 'all' , 'orderby' => 'id', 'order' => 'ASC' ) );    //並び順は自由に
			
			//$area_terms = get_the_terms( $post->ID,'area' );
			
			//wp_insert_term('area',$area_terms);
			
			
			//get_post_type();
			
			
        }
		
    }
}
add_action('admin_enqueue_scripts', 'custom_edit_newpost_delete');

*/
