<?php
ob_start();

/**
 * jewelcafe functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jewelcafe theme
 */





add_action( 'template_redirect', function() {
	
	
	if ( !empty($_GET) && !headers_sent() ) {
		header('X-Robots-Tag: noindex, nofollow', true);
	}

	
	if ( is_feed() && headers_sent() === false ) {
	
		header( 'X-Robots-Tag: noindex, follow', true );
	}
	
} );





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
	register_post_type( 'jewel-guma-news', [ // 投稿タイプ名の定義
			'labels' => [
				'name' => '【ジュエルぐま】お知らせ', // 管理画面上で表示する投稿タイプ名
				'singular_name' => 'jewel-guma-news',    // カスタム投稿の識別名
			],
			'public'        => true,  // 投稿タイプをpublicにするか
			'has_archive'   => false, // アーカイブ機能ON/OFF
			'menu_position' => 4,     // 管理画面上での配置場所
			'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
			'publicly_queryable' => true, // URLアクセス不可
			'rewrite' => false, // パーマリンク生成しない
			'supports' => array('title','editor','thumbnail','author','revisions')
	]);
	register_post_type( 'jewel-guma-wallpaper', [ // 投稿タイプ名の定義
			'labels' => [
				'name' => '【ジュエルぐま】今月の壁紙', // 管理画面上で表示する投稿タイプ名
				'singular_name' => 'jewel-guma-wallpaper',    // カスタム投稿の識別名
			],
			'public'        => true,  // 投稿タイプをpublicにするか
			'has_archive'   => false, // アーカイブ機能ON/OFF
			'menu_position' => 5,     // 管理画面上での配置場所
			'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
			'publicly_queryable' => true, // URLアクセス不可
			'rewrite' => false, // パーマリンク生成しない
			'supports' => array('title','thumbnail','author','revisions')
	]);
	register_post_type( 'jewel-guma-uranai', [ // 投稿タイプ名の定義
			'labels' => [
				'name' => '【ジュエルぐま】誕生石占い', // 管理画面上で表示する投稿タイプ名
				'singular_name' => 'jewel-guma-uranai',    // カスタム投稿の識別名
			],
			'public'        => true,  // 投稿タイプをpublicにするか
			'has_archive'   => false, // アーカイブ機能ON/OFF
			'menu_position' => 6,     // 管理画面上での配置場所
			'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
			'publicly_queryable' => true, // URLアクセス不可
			'rewrite' => false, // パーマリンク生成しない
			'supports' => array('title','thumbnail','author','revisions')
	]);
	register_post_type( 'line-ad', [ // 投稿タイプ名の定義
			'labels' => [
				'name' => 'line-ad', // 管理画面上で表示する投稿タイプ名
				'singular_name' => 'line-ad',    // カスタム投稿の識別名
			],
			'public'        => true,  // 投稿タイプをpublicにするか
			'has_archive'   => true, // アーカイブ機能ON/OFF
			'hierarchical' => true, //階層化
			'rewrite' => array( 'slug' => 'line-ad' ),
			'menu_position' => 10,     // 管理画面上での配置場所
			'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
			'supports' => array('title','editor','thumbnail','author','revisions','page-attributes')
	]);
	register_post_type( 'shop', [ // 投稿タイプ名の定義
			'labels' => [
				'name' => '店舗案内', // 管理画面上で表示する投稿タイプ名
				'singular_name' => 'shop',    // カスタム投稿の識別名
			],
			
			'public'        => true,  // 投稿タイプをpublicにするか
			'has_archive'   => true, // アーカイブ機能ON/OFF
			'hierarchical' => true, //階層化
			'rewrite' => array( 'slug' => 'shop' ),
			'menu_position' => 5,     // 管理画面上での配置場所
			'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
			'supports' => array('title','editor','thumbnail','author','revisions','page-attributes')
	]);
	register_post_type( 'kaitori', [ // 投稿タイプ名の定義
			'labels' => [
				'name' => '買取品目の一覧', // 管理画面上で表示する投稿タイプ名
				'singular_name' => 'kaitori',    // カスタム投稿の識別名
			],
			'public'        => true,  // 投稿タイプをpublicにするか
			'has_archive'   => true, // アーカイブ機能ON/OFF
			'hierarchical' => true, //階層化
			'menu_position' => 6,     // 管理画面上での配置場所
			'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
			'supports' => array('title','editor','thumbnail','author','revisions','page-attributes')
	]);
	register_post_type( 'blog', [ // 投稿タイプ名の定義
		'labels' => [
			'name' => '参考価格買取実績一覧', // 管理画面上で表示する投稿タイプ名
			'singular_name' => 'blog',    // カスタム投稿の識別名
		],
		'public'        => true,  // 投稿タイプをpublicにするか
		'publicly_queryable' => true,
		'show_ui' => true,
		'has_archive'   => true, // アーカイブ機能ON/OFF
		'rewrite' => array( 'slug' => 'blog' ),
		'menu_position' => 7,     // 管理画面上での配置場所
		'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
		'exclude_from_search' => false, // 追加すると明示的になります
		'supports' => array('title','editor','thumbnail','author','revisions')
	]);
	register_post_type( 'news', [ // 投稿タイプ名の定義
			'labels' => [
				'name' => 'お知らせ', // 管理画面上で表示する投稿タイプ名
				'singular_name' => 'news',    // カスタム投稿の識別名
			],
			'public'        => true,  // 投稿タイプをpublicにするか
			'has_archive'   => true, // アーカイブ機能ON/OFF
			'menu_position' => 8,     // 管理画面上での配置場所
			'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
			'supports' => array('title','editor','thumbnail','author','revisions')
	]);


	register_post_type( 'saiji', [ // 投稿タイプ名の定義
			'labels' => [
				'name' => '催事管理',
				'singular_name' => 'saiji',    // カスタム投稿の識別名
			],
			'public'        => true,  // 投稿タイプをpublicにするか
			'has_archive'   => true, // アーカイブ機能ON/OFF
			'menu_position' => 5,     // 管理画面上での配置場所
			'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
			'supports' => array('title','editor','thumbnail','author','revisions')
		]);

	/*
	register_post_type( 'column', [ // 投稿タイプ名の定義
        'labels' => [
					'name' => 'コラム', // 管理画面上で表示する投稿タイプ名
					'singular_name' => 'column',    // カスタム投稿の識別名
        ],
		
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => true, // アーカイブ機能ON/OFF
        'menu_position' => 8,     // 管理画面上での配置場所
        'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
		'supports' => array('title','editor','thumbnail','author','revisions','page-attributes')
		'public'        => true,  // 投稿タイプをpublicにするか
		'has_archive'   => true, // アーカイブ機能ON/OFF
		'hierarchical' => true, //階層化
		'menu_position' => 8,     // 管理画面上での配置場所
		'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
		'supports' => array('title','editor','thumbnail','author','revisions','page-attributes')
		
		
    ]);
	*/

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







// パンくずリスト自動生成
if (!function_exists('kaitori_breadcrumb')) {
	

	
	function kaitori_breadcrumb($wp_obj = null , $add = NULL)
		{
			

		// トップページは対象外
		if (is_home() || is_front_page()) return false;
		//そのページのWPオブジェクトを取得
		$wp_obj = $wp_obj ?: get_queried_object();
		
		if($wp_obj->name == 'shop'){
			
			echo '<div class="breadcrumbs pt-20">';
			
		}else{
			
			echo '<div class="breadcrumbs">';

		}

		global $post;
				

		echo '<div class="section-inner">';
			

			$parent_post = get_post($post->post_parent);
			
				/*
				if($post->post_name == 'gold' || $parent_post->post_name == 'gold'){
					
					echo '<a href="'. esc_url( home_url() ) .'">買取専門店のジュエルカフェ<span></span></a>';
	
				}else{

				}
				*/
			
			//print_R($wp_obj);
			
			

				//echo '<a href="'. esc_url( home_url() ) .'">最新相場で高価買取ならジュエルカフェ<span></span></a>';


				$kaitori_area_parent_id = 0;

				echo '<a href="' . esc_url(home_url()) . '">最新相場で高価買取ならジュエルカフェ<span></span></a>';

				// area タクソノミーがあるか確認
				if ( get_the_terms( $wp_obj->ID ?? 0, 'area' ) ) {
					$kaitori_area_parent_id = $wp_obj->post_parent ?? 0;
				}
				
			
				
				if($kaitori_area_parent_id){
					/**
					* 品目のカスタム投稿からデータを取得
					*/
					

					$post = get_post($post->ID);


					if($post->post_parent > 0 ){

						$post_parent = get_post($post->post_parent);

						echo '<a href="/kaitori/letter/" >'.$post_parent->post_title.'買取 <span></span></a>';

					}

					echo '<span>'.$post->post_title.'</span>';


				} elseif ( isset($wp_obj) && $wp_obj instanceof WP_Post && $wp_obj->post_type === 'kaitori' ) {

					/**
					* 階層を持つカスタム投稿タイプ ( $wp_obj : WP_Post )
					*/
					$page_id = $wp_obj->ID;
					$page_title = $wp_obj->post_title;
					



					$page_slug = $wp_obj->name;
					
					$post_parent = get_post($post->post_parent);



					// 親ページがあれば順番に表示
					if ($wp_obj->post_parent !== 0) {
						
						$parent_array = array_reverse(get_post_ancestors($page_id));

			
						if (strpos($_SERVER['REQUEST_URI'], '/shop/') !== false) {
			
			
							foreach ($parent_array as $parent_id) {

									$parent_post_array = get_post($parent_id);

									
									if($parent_post_array->post_name == 'shop'){

											
											$kaitori_parent_post_name = get_the_title($parent_post_array->post_parent);																	
																					
											echo '<a href="' . get_permalink($parent_id) . '">' . $kaitori_parent_post_name .'買取の店舗案内<span></span></a>';				

							

									}else if(get_post($parent_post_array->post_parent)->post_name == 'shop'){
									

										if($post->post_name == 'douou' || $post->post_name == 'honto' ){
											
											echo '<a href="' . get_permalink($parent_id) . '">' . get_the_title($parent_id) .'の'.$kaitori_parent_post_name.'買取<span></span></a>';

										}

									}else{
										
										if(!isset($kaitori_parent_post_name)){$kaitori_parent_post_name='';}
										
										if(get_the_title($parent_id) !== '道央' && get_the_title($parent_id)!=='沖縄本島'){

											echo '<a href="' . get_permalink($parent_id) . '">' . get_the_title($parent_id) .'の'.$kaitori_parent_post_name.'買取<span></span></a>';

										}else{

											$new_kaitori_parent_post_name = get_the_title($parent_post_array->post_parent);	
											$new_parent_id = $parent_post_array->post_parent;
											
											echo '<a href="' . get_permalink($new_parent_id) . '">' . get_the_title($new_parent_id) .'の'.$kaitori_parent_post_name.'買取<span></span></a>';
	
										}
									
									}

					
							}
							

						
						}else{
							
				
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
							
							
							if($wp_obj->post_name == 'souba'){
								
								echo '<span>' . $page_title . '</span>';
	
							}else{
								
								echo '<span>' . $page_title . '買取</span>';
							}
	
							
						}

					}
					
					

					
					//金相場
					if( $wp_obj->ID == 87115 ){
						
						echo '<span>今日の金・貴金属相場情報</span>';

					}else if (strpos($_SERVER['REQUEST_URI'], '/shop/') !== false) {



							$parent_id = wp_get_post_parent_id($post->ID); // 현재 포스트의 부모 ID를 가져옵니다.

							if ($parent_id == 0) {
								// 부모가 없으면 현재 포스트가 최상위 부모입니다.
								$topmost_parent_id = $post->ID;
							} else {
								// 부모가 있으면 최상위 부모를 찾습니다.
								while ($parent_id) {
									$post_id = $parent_id;
									$parent_id = wp_get_post_parent_id($post_id);
								}
								$topmost_parent_id = $post_id;
							}
			
						
						$topmost_parent = get_post($topmost_parent_id);
						
					
						$parent_arr = get_post($post->post_parent);
					
				
					
					
						
						if( $post->post_type == 'kaitori' && $post->post_name == 'shop'){


							if( get_post($post->post_parent)->post_name == 'vuitton' || get_post($post->post_parent)->post_name == 'rolex-top' ){
								
							
								// 投稿自身の表示
								echo '<span>' .get_post($post->post_parent)->post_title.'買取の'. $page_title . '</span>';

							}else{
								
								// 投稿自身の表示
								echo '<span>' .$topmost_parent->post_title.'買取の'. $page_title . '</span>';


							}
					
					
					
						}else if( $post->post_type == 'kaitori' && $parent_arr->post_name == 'shop'){
							

								if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/brand/vuitton/shop/') !== false) {

									$parent_post_array2 = get_post(4747);

									echo '<span>' . $page_title.'の'.$parent_post_array2->post_title . '買取</span>';

								}else if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/tokei/rolex-top/shop/') !== false) {

									$parent_post_array2 = get_post(3288);
									
									echo '<span>' . $page_title.'の'.$parent_post_array2->post_title . '買取</span>';
									
								}else{
				
									echo '<span>' . $page_title.'の'.$topmost_parent->post_title . '買取</span>';
						
								}
				
					
						}else{
							


								if( $post->post_name == 'aomori'  ||  $post->post_name == 'fukushima'  || $post->post_name == 'fukui'  || $post->post_name == 'wakayama' ){

									echo '<span>' . $page_title.'の'.$topmost_parent->post_title . '買取';
								
								}else{
									
									
									if( $topmost_parent->post_name == 'gold' || $topmost_parent->post_name == 'diamond' || $topmost_parent->post_name == 'letter-top' || $topmost_parent->post_name == 'jewelry' ){
										
										
										$args = array(
											'post_type'   => 'kaitori',
											'post_parent' => $post->ID,
											'numberposts' => -1
										);
										$children = get_posts( $args );
										
										if ( $children ) {
											
											echo '<span>'.$page_title;
											
										
										
										}else{
											
											
											if( $add !== ''){												
												$parts = split_japanese_address($add);
											}
												
											echo '<span>';
											
											echo esc_html($parts['prefecture']) . esc_html($parts['city']) . esc_html($parts['ward']).esc_html($parts['gun']).esc_html($parts['town']).esc_html($parts['village']).'の';
							
											echo $topmost_parent->post_title.'買取なら'. $page_title;


										}
										
			
									}else if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/brand/vuitton/shop/') !== false) {

										$parent_post_array2 = get_post(4747);
										
										$args = array(
											'post_type'   => 'kaitori',
											'post_parent' => $post->ID,
											'numberposts' => -1
										);
										$children = get_posts( $args );
										
										if ( $children ) {
											
											echo '<span>'.$page_title;
										
										}else{
											
											if( $add !== ''){												
												$parts = split_japanese_address($add);
											}
												
											echo '<span>';
											
											echo esc_html($parts['prefecture']) . esc_html($parts['city']) . esc_html($parts['ward']).esc_html($parts['gun']).esc_html($parts['town']).esc_html($parts['village']).'の';
							
											echo 'ルイヴィトン買取なら'. $page_title;

											
										}
										
										

									}else if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/tokei/rolex-top/shop/') !== false) {

										$parent_post_array2 = get_post(3288);
										
																		
										$args = array(
											'post_type'   => 'kaitori',
											'post_parent' => $post->ID,
											'numberposts' => -1
										);
										$children = get_posts( $args );
										
										if ( $children ) {
											
											echo '<span>'.$page_title;
										
										}else{
											
											if( $add !== ''){												
												$parts = split_japanese_address($add);
											}
												
											echo '<span>';
											
											echo esc_html($parts['prefecture']) . esc_html($parts['city']) . esc_html($parts['ward']).esc_html($parts['gun']).esc_html($parts['town']).esc_html($parts['village']).'の';
							
											echo 'ロレックス買取なら'. $page_title;

											
										}
										
										
									}else{

										echo '<span>' . $page_title;
									
									}
								
								
									
								}
								
						
								$args = array(
									'post_type' => 'kaitori',
									 'post_parent' => $post->ID,
									 'posts_per_page' => -1,
								);
								
								$the_query = new WP_Query($args);
					
								
								
						
							if( strpos($_SERVER['REQUEST_URI'] , 'kaitori') !== false && strpos($_SERVER['REQUEST_URI'] , 'shop') !== false && $the_query->found_posts < 1 ){


								
							}else{
								
								
									if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/brand/vuitton/shop/') !== false) {


										$parent_post_array2 = get_post(4747);

										echo 'の'.get_the_title($parent_post_array2->ID) .'買取';
										

									}else if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/tokei/rolex-top/shop/') !== false) {

										$parent_post_array2 = get_post(3288);
										
										echo 'の'.get_the_title($parent_post_array2->ID) .'買取';


									}else{
										
									
										echo 'の'.$topmost_parent->post_title . '買取';
								
									}

							}
							
							
							
							
							
						
							// 投稿自身の表示
							echo '</span>';
			
			
			
			
						}


					}else if($post->post_parent == 0 ){
						
							//echo '<a href="' . get_permalink($post->ID) . '">' .$post->post_title.'買取</a>';	
							
							echo '<span>' .$post->post_title.'買取</span>';	
						
					}
					




				} else if ( isset($wp_obj) && $wp_obj instanceof WP_Post && $wp_obj->post_type === 'shop' ) {	
				
						echo '<a href="/shop/">店舗案内<span></span></a>';


						$terms = get_the_terms($wp_obj->ID, 'area');

						if (!empty($terms) && !is_wp_error($terms)) {

							$parent = null;
							$child  = null;

							foreach ($terms as $t) {
								if ($t->parent == 0) {
									$parent = $t;
								} else {
									$child = $t;
								}
							}

							if ($child) {
								echo '<a href="/shop/'.$parent->slug.'/'.$child->slug.'">'
									. esc_html($child->name) . '<span></span></a>';
							}else if ($parent) {
								echo '<a href="/shop/'.$parent->slug.'">'
									. esc_html($parent->name) . '<span></span></a>';
							}
						}




						echo '<span>' . $post->post_title . '</span>';


				} else if ( is_post_type_archive() ) {
					/**
					* 投稿タイプアーカイブページ ( $wp_obj : WP_Post_Type )
					*/

					if($_SERVER['REQUEST_URI'] == '/shop/'|| $_SERVER['REQUEST_URI'] == '/kaitori/' || $_SERVER['REQUEST_URI'] == '/blog/' ){
						
						echo '<span>' . $wp_obj->label . '</span>';
					
					}else{
					
						echo '<span>' . $wp_obj->label . '買取</span>';

					}


				}else{
					
					echo '<span>' . $post->post_title . '</span>';				
					
				}
				
				
		echo
			'</div>'. // 冒頭に合わせて閉じタグ
		'</div>';
		}
	}




function split_japanese_address($address) {

    // 우편번호 제거
    $address = preg_replace('/〒?\d{3}-\d{4}\s*/u', '', $address);
    $address = trim($address);

    $result = array(
        'prefecture' => '',
        'city'       => '',
        'ward'       => '',
        'gun'        => '',
        'town'       => '',
        'village'    => '',
    );

    // 都道府県
    if (preg_match('/^(北海道|東京都|(?:京都|大阪)府|.{2,3}県)/u', $address, $m)) {
        $result['prefecture'] = $m[1];
        $address = mb_substr($address, mb_strlen($m[1]));
    }

    // 市
    if (preg_match('/^(.+?市)/u', $address, $m)) {
        $result['city'] = $m[1];
        $address = mb_substr($address, mb_strlen($m[1]));
    }

    // 区
    if (preg_match('/^(.+?区)/u', $address, $m)) {
        $result['ward'] = $m[1];
        $address = mb_substr($address, mb_strlen($m[1]));
    }

    // 郡
    if (preg_match('/^(.+?郡)/u', $address, $m)) {
        $result['gun'] = $m[1];
        $address = mb_substr($address, mb_strlen($m[1]));
    }

    // 町
    if (preg_match('/^(.+?町)/u', $address, $m)) {
        $result['town'] = $m[1];
        $address = mb_substr($address, mb_strlen($m[1]));
    }

    // 村
    if (preg_match('/^(.+?村)/u', $address, $m)) {
        $result['village'] = $m[1];
    }

    return $result;
}





function kaitori_breadcrumb2($wp_obj = null)
	{
	// トップページは対象外
	if (is_home() || is_front_page()) return false;
	//そのページのWPオブジェクトを取得
	$wp_obj = $wp_obj ?: get_queried_object();
	
	

	
	global $post;
	
	$nav_arr = [];



		$parent_post = get_post($post->post_parent);
		
		
		$nav_arr['value'][] = '最新相場で高価買取ならジュエルカフェ';
		
		$nav_arr['url'][] = 'https://jewel-cafe.jp';
			

			
			$wp_obj = get_queried_object();

			if ( $wp_obj instanceof WP_Post ) {
				$terms = get_the_terms($wp_obj->ID, 'area');
				if ( !empty($terms) && !is_wp_error($terms) ) {
					$kaitori_area_parent_id = $wp_obj->post_parent ?? 0;
				}
			}

			if ( isset($wp_obj) && $wp_obj instanceof WP_Post && $wp_obj->post_type === 'kaitori' ) {

				/**
				* 階層を持つカスタム投稿タイプ ( $wp_obj : WP_Post )
				*/
				$page_id = $wp_obj->ID;
				$page_title = $wp_obj->post_title;


				$page_slug = $wp_obj->name;
				$post_parent = get_post($post->post_parent);
				


				// 親ページがあれば順番に表示
				if ($wp_obj->post_parent !== 0) {
					
					$parent_array = array_reverse(get_post_ancestors($page_id));

		
					if (strpos($_SERVER['REQUEST_URI'], '/shop/') !== false) {
		
		
						foreach ($parent_array as $pkey=>$parent_id) {


								$parent_post_array = get_post($parent_id);

								if($parent_post_array->post_name == 'shop'){

										
										$kaitori_parent_post_name = get_the_title($parent_post_array->post_parent);																	
																				
										$nav_arr['value'][] = $kaitori_parent_post_name .'買取の店舗案内';
										
										$nav_arr['url'][] = $parent_post_array->post_name.'/';
										

								}else if(get_post($parent_post_array->post_parent)->post_name == 'shop'){
									
									
									if($post->post_name == 'hokkaido' || $post->post_name == 'okinawa' ){
										
										$nav_arr['value'] =  get_the_title($parent_id) .'の'.$kaitori_parent_post_name.'買取';
										
										$nav_arr['url'][] = $parent_post_array->post_name.'/';

									}

								}else{
									
									if( !isset($kaitori_parent_post_name) ){$kaitori_parent_post_name = ''; }
									
									$nav_arr['value'][] =  get_the_title($parent_id) .'の'.$kaitori_parent_post_name.'買取';
								
									if($pkey >= count($parent_array)-1){
										
										$nav_arr['url'][] = get_post(get_post($parent_id)->post_parent)->post_name.'/'.$parent_post_array->post_name.'/';
										
									}else{
													
											$city_arr = array(
														'shop',
														'hokkaido',
														'aomori',
														'iwate',
														'miyagi',
														'akita',
														'yamagata',
														'fukushima',
														'ibaraki',
														'tochigi',
														'gunma',
														'saitama',
														'chiba',
														'tokyo',
														'kanagawa',
														'niigata',
														'toyama',
														'ishikawa',
														'fukui',
														'yamanashi',
														'nagano',
														'gifu',
														'shizuoka',
														'aichi',
														'mie',
														'shiga',
														'kyoto',
														'osaka',
														'hyogo',
														'nara',
														'wakayama',
														'tottori',
														'shimane',
														'okayama',
														'hiroshima',
														'yamaguchi',
														'tokushima',
														'kagawa',
														'ehime',
														'kouchi',
														'fukuoka',
														'saga',
														'nagasaki',
														'kumamoto',
														'oita',
														'miyazaki',
														'kagoshima',
														'okinawa',
													);
												
								
												
												if( in_array($parent_post_array->post_name , $city_arr) ){ 
												
													$nav_arr['url'][] = $parent_post_array->post_name.'/';

												}else{
						
													$found = false;
													foreach ($nav_arr['url'] as $url) {
														if (strpos($url, '/kaitori/') !== false) {
															$found = true;
															break;
														}
													}

													 if( $found ){
														
														$nav_arr['url'][] = $parent_post_array->post_name.'/';
														
													 }else{
								
														$nav_arr['url'][] = '/kaitori/'.$parent_post_array->post_name.'/';
													 }

								
												}
								
									}
								
								
								
								
								}
								
						}
						
						

					}else{
						
			
						$page_id = $wp_obj->ID;
						$page_title = $wp_obj->post_title;

						// 親ページがあれば順番に表示
						if ($wp_obj->post_parent !== 0) {
							$parent_array = array_reverse(get_post_ancestors($page_id));
							foreach ($parent_array as $pa_key=>$parent_id) {
							
							
								$nav_arr['value'][] = get_the_title($parent_id) . '買取';
								
								if($pa_key<1){
									
									$nav_arr['url'][] = '/kaitori/'.get_post($parent_id)->post_name.'/';
								
								}else{
								
									$nav_arr['url'][] = get_post($parent_id)->post_name.'/';
								
								}
								

							}
						}

						

$city_arr = array(
								'shop',
								'hokkaido',
								'aomori',
								'iwate',
								'miyagi',
								'akita',
								'yamagata',
								'fukushima',
								'ibaraki',
								'tochigi',
								'gunma',
								'saitama',
								'chiba',
								'tokyo',
								'kanagawa',
								'niigata',
								'toyama',
								'ishikawa',
								'fukui',
								'yamanashi',
								'nagano',
								'gifu',
								'shizuoka',
								'aichi',
								'mie',
								'shiga',
								'kyoto',
								'osaka',
								'hyogo',
								'nara',
								'wakayama',
								'tottori',
								'shimane',
								'okayama',
								'hiroshima',
								'yamaguchi',
								'tokushima',
								'kagawa',
								'ehime',
								'kouchi',
								'fukuoka',
								'saga',
								'nagasaki',
								'kumamoto',
								'oita',
								'miyazaki',
								'kagoshima',
								'okinawa',
							);
						

						
						if( in_array($wp_obj->post_name , $city_arr) ){ 
						
							$nav_arr['value'][] = $page_title;
						
						 }else{
					
							// 投稿自身の表示
							$nav_arr['value'][] = $page_title . '買取';
					
						 }
					
						$nav_arr['url'][] = $wp_obj->post_name.'/';



					}

				}
				
				


				

				if($wp_obj->post_name == 'souba'){
				
					$nav_arr['value'][] = '今日の金価格・1gあたりの金相場';
					$nav_arr['url'][] = '/souba/';


				}else if (strpos($_SERVER['REQUEST_URI'], '/shop/') !== false) {

						$parent_id = wp_get_post_parent_id($post->ID);

						if ($parent_id == 0) {
							// 부모가 없으면 현재 포스트가 최상위 부모입니다.
							$topmost_parent_id = $post->ID;
						} else {
							// 부모가 있으면 최상위 부모를 찾습니다.
							while ($parent_id) {
								$post_id = $parent_id;
								$parent_id = wp_get_post_parent_id($post_id);
							}
							$topmost_parent_id = $post_id;
						}
		
					
					$topmost_parent = get_post($topmost_parent_id);
					
				
					$parent_arr = get_post($post->post_parent);
				
			
				
				
					
					if( $post->post_type == 'kaitori' && $post->post_name == 'shop'){


						if( get_post($post->post_parent)->post_name == 'vuitton' || get_post($post->post_parent)->post_name == 'rolex-top' ){
							
						
							// 投稿自身の表示
							$nav_arr['value'][] = get_post($post->post_parent)->post_title.'買取の'. $page_title ;
							
							$nav_arr['url'][] = get_post($post->post_parent)->post_name.'/';

						}else{
							
							// 投稿自身の表示
							$nav_arr['value'][] = $topmost_parent->post_title.'買取の'. $page_title;
							
							$nav_arr['url'][] = $topmost_parent->post_name.'/';


						}
				
				
				
				
					}else if( $post->post_type == 'kaitori' && $parent_arr->post_name == 'shop'){
						

							if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/brand/vuitton/shop/') !== false) {

								$parent_post_array2 = get_post(4747);

								$nav_arr['value'][] = $page_title.'の'.$parent_post_array2->post_title . '買取';
								
								$nav_arr['url'][] = $parent_post_array2->post_name.'/';


							}else if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/tokei/rolex-top/shop/') !== false) {

								$parent_post_array2 = get_post(3288);
								
								$nav_arr['value'][] = $page_title.'の'.$parent_post_array2->post_title . '買取';
								
								$nav_arr['url'][] = $parent_post_array2->post_name.'/';
								
							}else{
			
								$nav_arr['value'][] = $page_title.'の'.$topmost_parent->post_title . '買取</span>';
								
								if( isset($parent_post_array2) ){									
									$nav_arr['url'][] = $parent_post_array2->post_name.'/';
								}
					
							}
			
				
					}else{
						
						
							
						$nav_str = '';	
						
						$nav_url = '';	
							
							

							if( $post->post_name == 'aomori'  ||  $post->post_name == 'fukushima'  || $post->post_name == 'fukui'  || $post->post_name == 'wakayama' ){

								$nav_str = $page_title.'の'.$topmost_parent->post_title . '買取';
							
							}else{
								
								
								if( $topmost_parent->post_name == 'gold' || $topmost_parent->post_name == 'diamond' || $topmost_parent->post_name == 'letter-top' || $topmost_parent->post_name == 'jewelry' ){
									
									
									$args = array(
										'post_type'   => 'kaitori',
										'post_parent' => $post->ID,
										'numberposts' => -1
									);
									$children = get_posts( $args );
									
									if ( $children ) {
										
										$nav_str = $page_title;
										
									
									
									}else{
										
										$nav_str = $topmost_parent->post_title.'買取なら'. $page_title;
										
									}
									
		
								}else if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/brand/vuitton/shop/') !== false) {

									$parent_post_array2 = get_post(4747);
									
									$args = array(
										'post_type'   => 'kaitori',
										'post_parent' => $post->ID,
										'numberposts' => -1
									);
									$children = get_posts( $args );
									
									if ( $children ) {
										
										$nav_str = $page_title;
									
									}else{
										
										$nav_str = 'ルイヴィトン買取なら'. $page_title;
										
									}
									
									

								}else if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/tokei/rolex-top/shop/') !== false) {

									$parent_post_array2 = get_post(3288);
									
																	
									$args = array(
										'post_type'   => 'kaitori',
										'post_parent' => $post->ID,
										'numberposts' => -1
									);
									$children = get_posts( $args );
									
									if ( $children ) {
										
										$nav_str = $page_title;
									
									}else{
										
										$nav_str =  'ロレックス買取なら'. $page_title;
										
									}
									
									
								}else{

									$nav_str = $page_title;
								
								}
							

							}
							
					
					
							$args = array(
								'post_type' => 'kaitori',
								 'post_parent' => $post->ID,
								 'posts_per_page' => -1,
							);
							
							$the_query = new WP_Query($args);
				
							
							
					
						if( strpos($_SERVER['REQUEST_URI'] , 'kaitori') !== false && strpos($_SERVER['REQUEST_URI'] , 'shop') !== false && $the_query->found_posts < 1 ){


							
						}else{
							
							
								if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/brand/vuitton/shop/') !== false) {


									$parent_post_array2 = get_post(4747);

									$nav_str.= get_the_title($parent_post_array2->ID) .'買取';
									
									$nav_url = $parent_post_array2->post_name.'/';
									

								}else if (strpos($_SERVER['REQUEST_URI'], '/kaitori/') !== false && strpos($_SERVER['REQUEST_URI'], '/tokei/rolex-top/shop/') !== false) {

									$parent_post_array2 = get_post(3288);
									
									$nav_str.= 'の'.get_the_title($parent_post_array2->ID) .'買取';
									
									$nav_url = $parent_post_array2->post_name.'/';


								}else{
									
									$nav_str.= 'の'.$topmost_parent->post_title . '買取';
									
									if(isset($parent_post_array2)){
										
									$nav_url = $parent_post_array2->post_name.'/';
									
									}
							
								}

						}				

						
						$nav_arr['value'][] = $nav_str;
						
						$nav_arr['url'][] = $nav_url.'/';
		
					}
					


				}else if($post->post_parent == 0 ){
					
					$nav_arr['value'][] = $post->post_title.'買取';	
					
					$nav_arr['url'][] = $post->post_name.'/';
					
				}
				


			} else if ( isset($wp_obj) && $wp_obj instanceof WP_Post && $wp_obj->post_type === 'shop' ) {
				
				
				
					$nav_arr['value'][] = $post->post_title;
					
					$nav_arr['url'][] = $post->post_name;
					

			} elseif ( is_post_type_archive() ) {
				
		
				if($_SERVER['REQUEST_URI'] == '/shop/' || $_SERVER['REQUEST_URI'] == '/kaitori/'  || $_SERVER['REQUEST_URI'] == '/news/'	){
					
					$nav_arr['value'][] = $wp_obj->label;
					
					$nav_arr['url'][] = $post->post_name;
					
					
				}else if($_SERVER['REQUEST_URI'] == '/blog/' ){
					
					
					$nav_arr['value'][] = $wp_obj->label;
					
					$nav_arr['url'][] = $post->post_name;
					
								
				} else if(isset($kaitori_area_parent_id)){


						$post = get_post($post->ID);

						if($post->post_parent > 0 ){

							$post_parent = get_post($post->post_parent);

							$nav_arr[] = $post_parent->post_title;
							
							$nav_arr['url'][] = $post_parent->post_name;

						}

						$nav_arr[] =  $post->post_title;
						
						$nav_arr['url'][] = $post->post_name;


				
				}else{
				
					$nav_arr['value'][] = $wp_obj->label . '買取';
					
					$nav_arr['url'][] = $post->post_name;

				}



			} else if (isset($wp_obj) && $wp_obj->post_type ==  'blog' ) {


				

				$blog_post_array = get_post($wp_obj->ID);

				$terms = get_the_terms( $wp_obj->ID, 'hinmoku' );
				
		
				foreach ($terms as $term) { //親ターム取得
					if ($term->parent === 0) {
						$parent_term_name = $term->name;
						$parent_term_link = esc_url(get_term_link($term));
						$parent_term_id = $term->term_id;
						$parent_term_slug = $term->slug;
						
						
						if(strpos($parent_term_slug, 'other') === false){
						
							$nav_arr['value'][] =  $parent_term_name. '買取';
							$nav_arr['url'][] = '/kaitori/'.$parent_term_slug.'/';
						}

					}
				}
				


				foreach ($terms as $term) { //子ターム取得
					if ($term->parent === $parent_term_id) {
						$child_term_name = $term->name;
						$child_term_link = esc_url(get_term_link($term));
						$child_term_id = $term->term_id;
						$child_term_slug = $term->slug;
						
						if(strpos($child_term_slug, 'other') === false){
							
							$nav_arr['value'][] =  $child_term_name. '買取';
							$nav_arr['url'][] = $child_term_slug.'/';

						}

					}
				}

				 //孫ターム取得
					foreach ($terms as $term) {
						$child_term_id = $child_term_id ?? 0;
						if ($term->parent === $child_term_id) {
							$grand_child_term_name = $term->name;
							$grand_child_term_link = esc_url(get_term_link($term));
							$grand_child_term_slug = $term->slug;
						

							if(strpos($grand_child_term_slug, 'other') === false){

								$nav_arr['value'][] =  $grand_child_term_name. '買取';
								$nav_arr['url'][] = $grand_child_term_slug.'/';
								
							}else{

								$nav_arr['value'][] =  $grand_child_term_name. '買取';
								$nav_arr['url'][] = '';				
									
							}

						}
					}
			


				$nav_arr['value'][] = $wp_obj->post_title;
				$nav_arr['url'][] = $wp_obj->post_name.'/';


			} else if ( isset($wp_obj) && $wp_obj->post_type ==  'news' ) {


				$nav_arr['value'][] = 'お知らせ';
				
				$nav_arr['url'][] = '/news/';
				
				
				

				$nav_arr['value'][] = $post->post_title;				
				
				$nav_arr['name'][] = $post->post_title;				


			}else if (strpos($_SERVER['REQUEST_URI'], '/shop/') !== false && !isset($wp_obj->post_type) ){

				if(isset($wp_obj)){
						
					$nav_arr['value'][] = $wp_obj->name;				
					
					$nav_arr['name'][] = $wp_obj->slug;		
			
				}
	
			}else{
				

				$nav_arr['value'][] = $post->post_title;				
				
				$nav_arr['name'][] = $post->post_title;				
				
			}
			

		return $nav_arr;
			
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


/*
// 店舗 - 地方エリア
add_rewrite_rule('shop/([^/]+)/?$', 'index.php?taxonomy=area&term=$matches[1]', 'top');
add_rewrite_rule('shop/([^/]+)/page/([0-9]+)/?$', 'index.php?taxonomy=area&term=$matches[1]&paged=$matches[2]', 'top');

// 店舗 - 都道府県
add_rewrite_rule('shop/([^/]+)/([^/]+)/?$', 'index.php?taxonomy=area&term=$matches[2]', 'top');
add_rewrite_rule('shop/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?taxonomy=area&term=$matches[2]&paged=$matches[3]', 'top');

// 店舗ページ
add_rewrite_rule('shop/([^/]+)/([^/]+)/([^/]+)/?$', 'index.php?post_type=shop&name=$matches[3]', 'top');
add_rewrite_rule('shop/([^/]+)/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?post_type=shop&name=$matches[3]&paged=$matches[4]', 'top');
*/

// 店舗品目ページ
//add_rewrite_rule('shop/([^/]+)/([^/]+)/([^/]+)/([^/]+)/?$', 'index.php?post_type=shop&name=$matches[4]', 'top');

/**
 * -------------------------------------------
 * 1) area(親) 리스트ページ
 * -------------------------------------------
 */
add_rewrite_rule(
    '^shop/([^/]+)/?$',
    'index.php?taxonomy=area&term=$matches[1]',
    'top'
);

add_rewrite_rule(
    '^shop/([^/]+)/page/([0-9]+)/?$',
    'index.php?taxonomy=area&term=$matches[1]&paged=$matches[2]',
    'top'
);


/**
 * -------------------------------------------
 * 2) pref(子) 리스트ページ
 * -------------------------------------------
 */
add_rewrite_rule(
    '^shop/([^/]+)/([^/]+)/?$',
    'index.php?taxonomy=area&term=$matches[2]',
    'top'
);

add_rewrite_rule(
    '^shop/([^/]+)/([^/]+)/page/([0-9]+)/?$',
    'index.php?taxonomy=area&term=$matches[2]&paged=$matches[3]',
    'top'
);


/**
 * -------------------------------------------
 * 3) area/pref/postname 店舗ページ (단일 페이지)
 * -------------------------------------------
 */
add_rewrite_rule(
    '^shop/([^/]+)/([^/]+)/([^/]+)/?$',
    'index.php?post_type=shop&name=$matches[3]&area=$matches[1]&pref=$matches[2]',
    'top'
);

add_rewrite_rule(
    '^shop/([^/]+)/([^/]+)/([^/]+)/page/([0-9]+)/?$',
    'index.php?post_type=shop&name=$matches[3]&paged=$matches[4]&area=$matches[1]&pref=$matches[2]',
    'top'
);


/**
 * -------------------------------------------
 * 4) query_var 등록
 * -------------------------------------------
 */
add_filter('query_vars', function($vars){
    $vars[] = 'area';
    $vars[] = 'pref';
    return $vars;
});


/**
 * -------------------------------------------
 * 5) URL 자동 교정 + prefix 자동 추출 + 301 리다이렉트
 * -------------------------------------------
 */

/**
 * -------------------------------------------
 * 5) URL 자동 교정 (LIST + SINGLE 공통)
 *    - /shop/hokkaido/tokyo/
 *    - /kaitori/gold/shop/hokkaido/tokyo/
 *    - /kaitori/gold/shop/kanto/shiga/foleo-otsu/
 * -------------------------------------------
 */
add_action('template_redirect', function () {

    // 요청 경로(쿼리 제거)
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // /shop/ 위치 찾기
    $shop_pos = strpos($path, '/shop/');
    if ($shop_pos === false) {
        return;
    }

    // prefix 추출 (/kaitori/gold 등)
    $prefix = substr($path, 0, $shop_pos);

    // /shop/ 뒤의 모든 슬러그
    $after = substr($path, $shop_pos + strlen('/shop/'));
    $after = trim($after, '/');

    if ($after === '') {
        return;
    }

    // 슬러그 분해
    $parts = explode('/', $after);
    $count = count($parts);


    /**
     * -----------------------------------------------
     * ① /shop/{pref}/  단독 pref 입력 처리
     * 예: /shop/saitama/ → pref 찾아서 area 붙여서 리다이렉트
     * -----------------------------------------------
     */
    if ($count === 1) {

        $pref_slug = $parts[0];

        $pref_term = get_term_by('slug', $pref_slug, 'area');
        if (!$pref_term || is_wp_error($pref_term)) {
            return;
        }

        if (!$pref_term->parent) {
            return;
        }

        $parent = get_term($pref_term->parent, 'area');
        if (!$parent || is_wp_error($parent)) {
            return;
        }

        $correct_area = $parent->slug;

        // 새 URL 생성
        $new_path = rtrim($prefix, '/') . "/shop/{$correct_area}/{$pref_slug}/";

        $query = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== ''
            ? '?' . $_SERVER['QUERY_STRING']
            : '';

        wp_redirect(home_url($new_path) . $query, 301);
        exit;
    }



    /**
     * -----------------------------------------------
     * ② /shop/{area}/{pref}/ 구조 처리
     * -----------------------------------------------
     */
    if ($count >= 2) {

        $area_slug = $parts[0];
        $pref_slug = $parts[1];

        $pref_term = get_term_by('slug', $pref_slug, 'area');
        if (!$pref_term || is_wp_error($pref_term)) {
            return;
        }

        if (!$pref_term->parent) {
            return;
        }

        $parent = get_term($pref_term->parent, 'area');
        if (!$parent || is_wp_error($parent)) {
            return;
        }

        $correct_area = $parent->slug;


        /**
         * 빈 area 또는 잘못된 area 자동 교정
         * 예:
         * /shop//saitama/  → area_slug = '' → correct_area 로 변경
         * /shop/hokkaido/saitama/ → correct_area 로 변경
         */
        if ($area_slug === '' || $area_slug !== $correct_area) {

            $parts[0] = $correct_area;

            // 새 URL 생성
            $new_path = rtrim($prefix, '/') . '/shop/' . implode('/', $parts) . '/';

            $query = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== ''
                ? '?' . $_SERVER['QUERY_STRING']
                : '';

            wp_redirect(home_url($new_path) . $query, 301);
            exit;
        }
    }

});






/**
 * -------------------------------------------
 * 6) 관리자 パーマリンク 도 area/pref/postname 출력
 * -------------------------------------------
 */
add_filter('post_type_link', function($post_link, $post){

    if($post->post_type !== 'shop') return $post_link;

    $terms = wp_get_post_terms($post->ID, 'area');
    if(empty($terms) || is_wp_error($terms)) return $post_link;

    $area = '';
    $pref = '';

    foreach($terms as $t){
        if($t->parent == 0) {
            $area = $t->slug;   // 親
        } else {
            $pref = $t->slug;   // 子
        }
    }

    if(!$area || !$pref) return $post_link;

    return home_url("/shop/{$area}/{$pref}/{$post->post_name}/");

}, 10, 2);






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
  
	$pid = '';
  
	if(isset($post->ID)){
  
		$pid = $post->ID;
	
	}
	
	//107817

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
  
	if($_SERVER['REQUEST_URI'] == '/column/' || $_SERVER['REQUEST_URI'] == '/column' ){

		$description = '全国300店舗の買取専門店ジュエルカフェがお届けするお役立ちコラム。人気ブランドや腕時計・貴金属にまつわる豆知識や、不用品やエコに関するライフハックまで、情報満載の人気コーナーです。';
	  
	}
	
  return $description;
}
add_filter('aioseo_description', 'aioseo_description_extention');








function is_404_to_homeurl(){


	if(strpos($_SERVER['REQUEST_URI'],'/diamond-kaitori/') !== false){
		
			wp_redirect('/kaitori/diamond/', 301 );
			exit();
	
		
	}else if(strpos($_SERVER['REQUEST_URI'],'/tag/') !== false){

			wp_redirect('/', 301 );
			exit();


	}else if ( is_home() || is_front_page() ) {

		if(strpos($_SERVER['REQUEST_URI'],'/index.php') !== false || strpos($_SERVER['REQUEST_URI'],'/index.html') !== false){
			
			wp_redirect('/', 301 );
			exit();

		}
	
    }else if( is_404() ){

		if(strpos($_SERVER['REQUEST_URI'],'/shops/') !== false){

			wp_redirect('/shop/', 301 );
			exit();
		}
		

		if(strpos($_SERVER['REQUEST_URI'],'/kaitori/gold/') !== false || strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/') !== false){
			
			//wp_redirect('/kaitori/gold/', 301 );
			//exit();
				
		}else if(strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/10k/') !== false){
		
		
			wp_redirect('/kaitori/gold/k10/', 301 );
			exit();
	
		}else if(strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/14k/') !== false){
		
		
			wp_redirect('/kaitori/gold/k14/', 301 );
			exit();
	
		}else if(strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/20k/') !== false || strpos($_SERVER['REQUEST_URI'],'/brand-detail/k20/') !== false){
		
		
			wp_redirect('/kaitori/gold/k20/', 301 );
			exit();
	
		}else if(strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/22k/') !== false){
		
		
			wp_redirect('/gold/k22/', 301 );
			exit();
	
		}else if(strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/24k/') !== false){
		
		
			wp_redirect('/kaitori/gold/k24/', 301 );
			exit();
	
		}else if(strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/belt-buckle/') !== false){
			
			wp_redirect('/kaitori/gold/belt-buckle/', 301 );
			exit();
	
		}else if(strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/coin/') !== false){
			
			wp_redirect('/kaitori/gold/coin/', 301 );
			exit();
	
		}else if(strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/eyeglass/') !== false){
			
			wp_redirect('/kaitori/gold/eyeglass/', 301 );
			exit();
		
		}else if(strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/bullion/') !== false){
		
			wp_redirect('/kaitori/gold-bullion/', 301 );
			exit();
	
		}else if(strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/gold-bullion/') !== false){
		

			wp_redirect('/kaitori/gold/bullion/', 301 );
			exit();

		}else if(strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/ingot/') !== false){

			wp_redirect('/kaitori/gold/ingot/', 301 );
			exit();
			
		}else if(strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/koban/') !== false){	
			
			wp_redirect('/kaitori/gold/koban/', 301 );
			exit();	


		}else if(strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/palladium/') !== false || strpos($_SERVER['REQUEST_URI'],'/gold-kaitori/platinum/') !== false){
		
			wp_redirect('/kaitori/palladium/', 301 );
			exit();	

		}else if(strpos($_SERVER['REQUEST_URI'],'/audio-kaitori/') !== false){

			wp_redirect('/kaitori/letter-top/', 301 );
			exit();

		}else if( $_SERVER['REQUEST_URI'] == '/brand-detail/anime-stamp/'  || $_SERVER['REQUEST_URI'] == '/brand-detail/piece-stamp/' ){

			wp_redirect('/kaitori/letter-top/', 301 );
			exit();

		}else if( $_SERVER['REQUEST_URI'] == '/brand-detail/china-stamp/' ){
				
			wp_redirect('/kaitori/letter-top/china-stamp/', 301 );
			exit();
		
		}else if( $_SERVER['REQUEST_URI'] == '/brand-detail/furusato-stamp/' ){
			
			wp_redirect('/kaitori/letter-top/furusato-stamp/', 301 );
			exit();
			
		}else if( $_SERVER['REQUEST_URI'] == '/brand-detail/sheet-stamp/' ){
		
			wp_redirect('/kaitori/letter-top/sheet-stamp/', 301 );
			exit();
		
		}else if( $_SERVER['REQUEST_URI'] == '/brand-detail/commemorative-stamp/' ){
		
			wp_redirect('/kaitori/letter-top/commemorative-stamp/', 301 );
			exit();
		
		}else if( $_SERVER['REQUEST_URI'] == '/letter-kaitori/' ){
		
			wp_redirect('/kaitori/letter-top/', 301 );
			exit();
		
		
		}else if( $_SERVER['REQUEST_URI'] == '/card-kaitori/' ||  $_SERVER['REQUEST_URI'] == '/kaitori/card/q' ||  $_SERVER['REQUEST_URI'] == '/brandapparel-kaitori/' ||  $_SERVER['REQUEST_URI'] == '/brand-detail/postcard' ){
			
			wp_redirect('/kaitori/card/', 301 );
			exit();
		
		
		}else if( $_SERVER['REQUEST_URI'] == '/rolex/' ){
			
			
			wp_redirect('/kaitori/tokei/rolex-top/', 301 );
			exit();

			
		}else if( $_SERVER['REQUEST_URI'] == '/tokei-kaitori/' ){
			
			wp_redirect('/kaitori/tokei/rolex-top/', 301 );
			exit();
		
		
		}else if( $_SERVER['REQUEST_URI'] == '/brand-detail/seiko/' ){
			
			wp_redirect('/kaitori/tokei/seiko/', 301 );
			exit();
		
		}else if( $_SERVER['REQUEST_URI'] == '/tokei-kaitori/cartier-tokei/' ){
			
			
			wp_redirect('/kaitori/tokei/cartier-watch/', 301 );
			exit();			
		
		}else if( $_SERVER['REQUEST_URI'] == '/tokei-kaitori/omega/' ){
			
			wp_redirect('/kaitori/tokei/omega/', 301 );
			exit();						


		}else if( $_SERVER['REQUEST_URI'] == '/tokei-kaitori/rolex/' ){
			
			wp_redirect('/tokei-kaitori/rolex-top/', 301 );
			exit();		
		
		}else if( $_SERVER['REQUEST_URI'] == '/diamond-kaitori/' ){
			
			wp_redirect('/diamond-kaitori/', 301 );
			exit();		
				
			
		}else if( $_SERVER['REQUEST_URI'] == '/kaitori/diamoni/' ){
		
			wp_redirect('/diamond-kaitori/', 301 );
			exit();		
		
		
		}else if( $_SERVER['REQUEST_URI'] == '/brand-detail/cosme-chanel/' ){
			
			wp_redirect('/diamond-kaitori/', 301 );
			exit();	
			
			
		}else if( $_SERVER['REQUEST_URI'] == '/brand-detail/whisky/' ){
			
			wp_redirect('/diamond-kaitori/', 301 );
			exit();		
		
		
		}else if( $_SERVER['REQUEST_URI'] == '/osake-kaitori/' ){
			
			wp_redirect('/kaitori/osake/', 301 );
			exit();		
			
			
		}else if( $_SERVER['REQUEST_URI'] == '/osake-kaitori/' ){
			
			
			wp_redirect('/kaitori/cosme/', 301 );
			exit();					
		
		
		}else if( $_SERVER['REQUEST_URI'] == '/pen-kaitori/' || $_SERVER['REQUEST_URI'] == '/game-kaitori/' || $_SERVER['REQUEST_URI'] == '/hobby-kaitori/' || $_SERVER['REQUEST_URI'] == '/tool-kaitori/' || $_SERVER['REQUEST_URI'] == '/silver-kaitori/' ||  strpos($_SERVER['REQUEST_URI'],'/kaitori-report/') !== false){
		
			wp_redirect('/kaitori/cosme/', 301 );
			exit();					
		
		
		}else if( $_SERVER['REQUEST_URI'] == '/cm/cm_harikomi.html' ||  $_SERVER['REQUEST_URI'] == '/cm/cm_tsuiseki.html' || $_SERVER['REQUEST_URI'] == '/cm/gallery.html' || $_SERVER['REQUEST_URI'] == '/cm/introduction.html'){
			
			wp_redirect('/media/', 301 );
			exit();
		
		}else if( $_SERVER['REQUEST_URI'] == '/brand-detail/vuitton/' ){
			
			wp_redirect('/kaitori/brand/vuitton/', 301 );
			exit();
	
	
		}else if( $_SERVER['REQUEST_URI'] == '/brand-detail/bvlgari/' ){
	
			wp_redirect('/kaitori/brand/bvlgari/', 301 );
			exit();
	
	
		}else if( $_SERVER['REQUEST_URI'] == '/bag-kaitori/celine-bag/' ){
	
			wp_redirect('/kaitori/brand/celine/', 301 );
			exit();
		
		
		}else if( $_SERVER['REQUEST_URI'] == '/bag-kaitori/chanel-bag/' ){
			
			wp_redirect('/kaitori/brand/chanel/', 301 );
			exit();
		
		
		}else if( $_SERVER['REQUEST_URI'] == '/bag-kaitori/gucci-bag/' ){
			
			wp_redirect('/kaitori/brand/gucci/', 301 );
			exit();
		
		}else if( $_SERVER['REQUEST_URI'] == '/bag-kaitori/hermes-bag/' ){
		
		
			wp_redirect('/kaitori/brand/hermes/', 301 );
			exit();
		
		}else if( $_SERVER['REQUEST_URI'] == '/bag-kaitori/ysl-bag/' ){
			
			wp_redirect('/kaitori/brand/ysl/', 301 );
			exit();
	
		}else if( $_SERVER['REQUEST_URI'] == '/brand-detail/brandy/' || $_SERVER['REQUEST_URI'] == '/brand-detail/christofle/' || $_SERVER['REQUEST_URI'] == '/brand-detail/franckmuller/' || $_SERVER['REQUEST_URI'] == '/brand-detail/fur/' || $_SERVER['REQUEST_URI'] == '/brand-detail/contact/' || $_SERVER['REQUEST_URI'] == '/bag-kaitori/' || $_SERVER['REQUEST_URI'] == '/brand-detail/copenhagen/' || $_SERVER['REQUEST_URI'] == '/brand-detail/tableware-hermes/' || $_SERVER['REQUEST_URI'] == '/brand-detail/pentax/' ){
				
			wp_redirect('/kaitori/brand/vuitton/', 301 );
			exit();
		
		
		}else if( $_SERVER['REQUEST_URI'] == '/hobby-kaitori/board/' || $_SERVER['REQUEST_URI'] == '/hobby-kaitori/car-supplies//' || $_SERVER['REQUEST_URI'] == '/hobby-kaitori/golf-goods/' || $_SERVER['REQUEST_URI'] == '/hobby-kaitori/helmet/' || $_SERVER['REQUEST_URI'] == '/hobby-kaitori/musical-instrument/' || $_SERVER['REQUEST_URI'] == '/camera-kaitori/'  || $_SERVER['REQUEST_URI'] == '/collection-kaitori/' || $_SERVER['REQUEST_URI'] == '/hobby-kaitori/road-bike/' || $_SERVER['REQUEST_URI']  == '/kottou-kaitori/' || $_SERVER['REQUEST_URI']  == '/brand-detail/kimono/'){
			
			
			wp_redirect('/kaitori/kottou/', 301 );
			exit();



		}else if( $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/jewelry-kaitori/ahkah-jewelry/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori//jewelry-kaitori/boucheron-jewelry/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/bvlgari-jewelry/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/chopard-jewelry/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/chromehearts-jewelry/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/damiani-jewelry/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/emerald/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/fred-jewelry/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/graff-jewelry/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/harrywinston-jewelry/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/mikimoto-jewelry/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/piaget-jewelry/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/pontevecchio-jewelry/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/tiffany-jewelry/' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/vancleefarpels-jewelry/' || $_SERVER['REQUEST_URI'] == '/brand-detail/jewelry-bvlgari/' || $_SERVER['REQUEST_URI'] == '/brand-detail/jewelry-chromehearts/' || $_SERVER['REQUEST_URI'] == '/brand-detail/jewelry-bvlgari/' || $_SERVER['REQUEST_URI'] == '/brand-detail/jewelry-chromehearts/' || $_SERVER['REQUEST_URI'] == '/kaitori/jewelr' || $_SERVER['REQUEST_URI'] == '/jewelry-kaitori/cartier-jewelry/' ){

			wp_redirect('/kaitori/jewelry/', 301 );
			exit();
	
	
		}else if( $_SERVER['REQUEST_URI'] == '/campaign/' || $_SERVER['REQUEST_URI'] == '/estate.html' || $_SERVER['REQUEST_URI'] == '/index.html' || $_SERVER['REQUEST_URI'] == '/official_top/official_jewelguma/' || $_SERVER['REQUEST_URI'] == '/official_top/official_shop_detail/?id=150' || $_SERVER['REQUEST_URI'] == '/purchase/' || $_SERVER['REQUEST_URI'] == '/tag/matsusaka-marm/' || $_SERVER['REQUEST_URI'] == '/t-point/' || $_SERVER['REQUEST_URI'] == '//2021/02/01/was-befinden-sich-sicherer-datenraume-des-weiteren-ihre-hauptvorteile/' || strpos($_SERVER['REQUEST_URI'],'/wp-content/uploads/') !== false || strpos($_SERVER['REQUEST_URI'],'/wp-content/themes/jewelcafe_replace/imported-assets/') !== false  || strpos($_SERVER['REQUEST_URI'],'/wp-content/plugins/') !== false){	
			
			wp_redirect('/', 301 );
			exit();
	
		
		}else if( $_SERVER['REQUEST_URI'] == '/contact/' ){
			
			wp_redirect('/form_takuhai/', 301 );
			exit();

	
		}else if( $_SERVER['REQUEST_URI'] == '/delivery_buy/' ){
			
			
			wp_redirect('/delivery-buy/', 301 );
			exit();			
		
		
		}else if( $_SERVER['REQUEST_URI'] == '/about.html' ){
	
			wp_redirect('/company/', 301 );
			exit();	
	
		
		}else if( $_SERVER['REQUEST_URI'] == '/storeguide.html' ){
			
			
			wp_redirect('/shop/', 301 );
			exit();	
	
	
		}else if( $_SERVER['REQUEST_URI'] == '/iphone_repair/' || $_SERVER['REQUEST_URI'] == '/iphone-kaitori/'  ){
			
			wp_redirect('/iphone-repair/', 301 );
			exit();	
			
			
		}else if( $_SERVER['REQUEST_URI'] == '/column/bag-fake2/' || $_SERVER['REQUEST_URI'] == '/column/gold-purity/' || $_SERVER['REQUEST_URI'] == '/column/bag-fake2/embed/'  ){
						
			wp_redirect('/trip-buy/', 301 );
			exit();
			

		}else if( $_SERVER['REQUEST_URI'] == '/trip_buy/' ){
					
			wp_redirect('/trip-buy/', 301 );
			exit();
	
		}
		
		
		
		 if(strpos($_SERVER['REQUEST_URI'],'/shop/') !== false && strpos($_SERVER['REQUEST_URI'],'/tokei-') !== false && strpos($_SERVER['REQUEST_URI'],'/rolex-') == false){
			

			$parts = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
			
			$url = '/kaitori/tokei/rolex-top/'.$parts[1].'/'.$parts[2].'/'.$parts[3].'/'.$parts[4];

			wp_redirect( $url , 301);
			
			exit;
	
		 }



		 if(strpos($_SERVER['REQUEST_URI'],'/shop/') !== false && strpos($_SERVER['REQUEST_URI'],'/rolex-') !== false){
		

				function modify_robots_meta_tag() {


					$parts = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));

					$post_name = end($parts);



					// WP_Query 인스턴스 생성
					$post_args2 = array(
						'post_type' => 'shop',
						'name' => $post_name,
						'posts_per_page' => 1, // 가져올 포스트 수
					);

					$post_query = new WP_Query($post_args2);
					
					
					$aioseo_title =  $post_query->posts[0]->post_title;
					
					$aioseo_description = $post_query->posts[0]->post_description;
		
		
					//$aioseo_title =get_post_meta($post_query->posts[0]->ID , '_aioseo_title' , true);
					
					//$aioseo_description =get_post_meta($post_query->posts[0]->ID  , '_aioseo_description' , true);


					echo '<title>'.$aioseo_title.'</title>';
					echo '<meta name="description" content="'.$aioseo_description.'" />';
					echo '<link rel="canonical" href="'.$post_query->posts[0]->guid.'" />';
					echo '<meta property="og:locale" content="ja_JP" />';
					echo '<meta property="og:site_name" content="全国展開の買取専門店 ジュエルカフェ【公式】 | 金・時計・金券・ブランド買取を日本全国対応いたします。全国300店舗以上で高価買取実施中。お気軽に無料査定をご利用ください！" />';
					echo '<meta property="og:type" content="article" />';
					echo '<meta property="og:title" content="'.$aioseo_title.'" />';
					echo '<meta property="og:description" content="'.$aioseo_description.'" />';
					echo '<meta property="og:url" content="'.$post_query->posts[0]->guid.'" />';
					echo '<meta name="twitter:card" content="summary_large_image" />';
					echo '<meta name="twitter:title" content="'.$aioseo_title.'" />';
					echo '<meta name="twitter:description" content="'.$aioseo_description.'" />';
					
				}

				// wp_head 훅에 새로 추가한 함수를 등록합니다.
				add_action('wp_head', 'modify_robots_meta_tag', 0);


				
				get_template_part('single-shop-rolex');
				exit;
				
			

		 }
		 


		if(strpos($_SERVER['REQUEST_URI'],'/blog/') !== false){
			
			get_template_part('blog-list');
			exit;
	
		}else if(strpos($_SERVER['REQUEST_URI'],'/shop/letter-top/') !== false){
			
			$new_url = str_replace('/shop/','/kaitori/',$_SERVER['REQUEST_URI']);

			wp_redirect($new_url, 301 );
			exit();
			
		}else if(strpos($_SERVER['REQUEST_URI'],'/rolex/junk-') !== false ){
			wp_redirect('/kaitori/tokei/rolex-top/junk-rolex/', 301 );
			exit();
		}else if(strpos($_SERVER['REQUEST_URI'],'/rolex') !== false ){
			//wp_redirect('/kaitori/tokei/rolex-top', 301 );
			//exit();
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


			$exclude_store =  get_field('exclude-store',$v->post_id);
			
			if($exclude_store[0]== '1'){
				
				continue;

			}


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
				
				$exclude_store =  get_field('exclude-store',$v->post_id);
				
				if($exclude_store[0]== '1'){
					
					continue;

				}				
				

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

						$exclude_store =  get_field('exclude-store',$v->post_id);
						
						if($exclude_store[0]== '1'){
							
							continue;

						}

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
	add_menu_page('店舗設定画面', '店舗設定', 'manage_options', 'custom_menu_page', 'add_custom_menu_page', 'dashicons-store', 9);
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
				<th>休業・営業時間　表示</th>
				<td>
					
					<div style="padding:15px 0px;">
						<label><input type="radio" name="show_holidays" value="1" <?php if( trim(get_option('show_holidays')) == '1' ){echo 'checked';}?>  />&nbsp;表示</label>
						&nbsp;
						<label><input type="radio" name="show_holidays" value="2" <?php if( trim(get_option('show_holidays')) == '2' ){echo 'checked';}?> />&nbsp;非表示</label>
					</div>

				</td>
			</tr>
			<tr>
				<th>店舗数<br><br>（テキスト）</th>
				<td>

					<div style="padding:10px;"><input type="text" id="shop" name="shop" value="<?php echo get_option('shop'); ?>"><span style="margin-left:10px;">数字のみ入力してください。</span></div>

					<h2 style="padding:0px 10px;">MYSQL QUERY(<span style="color:red;">データベース 修正</span>)</h2>

					<div style="padding:10px;">UPDATE `wp_options` SET option_value = REPLACE ( option_value, '300店舗', <span style="color:red;">'251店舗'</span> );</div>

					<div style="padding:10px;">UPDATE `wp_posts` SET post_title = REPLACE ( post_title, '300店舗', <span style="color:red;">'251店舗'</span> );</div>

					<div style="padding:10px;">UPDATE `wp_posts` SET post_content = REPLACE ( post_content, '300店舗', <span style="color:red;">'251店舗'</span> );</div>

					<div style="padding:10px;">UPDATE `wp_postmeta` SET meta_value = REPLACE ( meta_value, '300店舗', <span style="color:red;">'251店舗'</span> );</div>

				</td>
			</tr>
			<tr>
				<th>店舗数<br><br>（画像）</th>
				<td>
					<ul>
						<li><a href="https://jewel-cafe.jp/shop-buy/" target="_blank">店頭買取ページ</a>（PC・スマホ）</li>
						<li>single-kaitori.phpの&nbsp;<a href="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/policy-03.jpg" target="_blank">https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/kaitori/policy-03.jpg</a>
						<br />
						&nbsp;(例)&nbsp;<a href="https://jewel-cafe.jp/kaitori/tokei/rolex/" target="_blank">https://jewel-cafe.jp/kaitori/tokei/rolex/</a></li>
					</ul>
				</td>
			</tr>
	  </table>




		<h2>金買取相場</h2>

		<table cellpadding="0" cellspacing="0" width="100%" class="admin-table">

			<tr>
				<th>計算ツール<?php echo trim(get_option('souba_search_display'));?></th>
				<td>
					
					<div style="padding:15px 0px;">
						<label><input type="radio" name="souba_search_display" value="1" <?php if( trim(get_option('souba_search_display')) == '1' ){echo 'checked';}?>  />&nbsp;表示</label>
						&nbsp;
						<label><input type="radio" name="souba_search_display" value="2" <?php if( trim(get_option('souba_search_display')) == '2' ){echo 'checked';}?> />&nbsp;非表示</label>
					</div>

				</td>
			</tr>

			<tr>
				<th>TOPタイトル</th>
				<td>
					<textarea name="souba_top_title" id="souba_top_title" style="width:100%;"><?php echo esc_attr( get_option('souba_top_title') ); ?></textarea>
				</td>
			</tr>


			<tr>
				<th>タイトル</th>
				<td>
					<textarea name="souba_title" id="souba_title" style="width:100%;"><?php echo esc_attr( get_option('souba_title') ); ?></textarea>
				</td>
			</tr>
		
			<tr>
				<th>内容</th>
				<td>				
					<?php wp_editor( get_option('souba_content') , 'souba_content', $settings = array() ); ?>
				</td>
			</tr>
			
			<tr>
				<th>更新時間</th>
				<td>
					<input type="text" name="souba_up_time" value="<?php echo date('Y/m/d');?>" >
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
    register_setting('custom-menu-group', 'show_holidays');
    register_setting('custom-menu-group', 'souba_search_display');
    register_setting('custom-menu-group', 'souba_top_title');
    register_setting('custom-menu-group', 'souba_title');
    register_setting('custom-menu-group', 'souba_content');
    register_setting('custom-menu-group', 'souba_up_time');
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
add_action('wp_enqueue_scripts', function() {
  // recaptchaを表示させたい固定ページの slug を指定します。複数OK
  $page_list = [
    'property',
    'form_takuhai',
    'form_syuttyou',
    'aa',
  ];
  if(is_page($page_list)) return;
  wp_deregister_script('google-recaptcha');
}, 100);
----------------------------------------------------*/






/*
	トップ都道府県店舗名
*/
function get_shop_data($slug , $url){

	$str = '';

	$pages = get_posts(array(
	  'post_type' => 'shop',
	  'numberposts' => -1,
	  'post_parent' => 0,
	   'tax_query' => array(
			array(
				'taxonomy' => 'area',
				'field' => 'slug',
				'terms' => $slug
			)
		)
	));


	if( ! empty( $pages ) ){

		$str .= '<tr>';
		
		$count = 1;

		foreach ( $pages as $key=>$post ) {
			
			$exclude_store =  get_field('exclude-store',$post->ID);
			
			if ( !empty($exclude_store) && ( $exclude_store === '1' || $exclude_store === true ) ) {
				continue;
			}
					
			

			$str .='<td><a href="'.esc_url(home_url($url.$post->post_name)).'/">'.$post->post_title.'</a></td>';

			if( $count % 3 == 0  ){

				$str.='</tr><tr>';

			}
		
			$count++;
		
		}

	}else{

		$str = '店舗はありません';

	}

	return $str;

}












/* 検索ajax処理 */
function watch_search_ajax(){

	global $wpdb;

	$keyword = trim($_POST["keyword"]);


	if($keyword == 'シャネル'){

		$keyword = 'シャネル時計';

	}


	if($keyword == 'エルメス'){

		$keyword = 'エルメス時計';

	}


	if($keyword == 'カルティエ'){

		$keyword = 'カルティエ時計';

	}



	if($keyword == 'ブルガリ'){

		$keyword = 'ブルガリ時計';

	}






	$sql = "SELECT * FROM `wp_posts` where post_parent = 151  and  post_title = '".$keyword."' and post_type = 'kaitori'  ";


	$res = $wpdb->get_results($sql);

	$knum = $wpdb->num_rows;



	if($knum > 0 ){


			$sql2 = "SELECT * FROM `wp_posts` where post_parent = {$res[0]->ID} and post_type = 'kaitori'  ";

			$res2 = $wpdb->get_results($sql2);

			$num2 = $wpdb->num_rows;



			if($num2 < 1){


				$sql2 = "SELECT * FROM `wp_posts` where ID = {$res[0]->ID} and post_type = 'kaitori'  ";

				$res2 = $wpdb->get_results($sql2);

				$num2 = $wpdb->num_rows;

				$str = '';




				foreach($res2 as $k2=>$v2){

					$post_v2id =  $v2->ID;

					$count_num = 0;

					//add field  50
					for( $i=1; $i<=50; $i++){

						if(get_field('モデル'.$i,$post_v2id)){

							$price = str_replace( '¥' , '' ,get_field('買取金額'.$i,$post_v2id) );


							$str.= '<tr>';
							$str.= '<td>'.get_field('モデル'.$i,$post_v2id).'<div class="only-sp model-title">'.get_field('型番_デザイン'.$i,$post_v2id).'</div></td>';
							$str.= '<td class="only-pc">'.get_field('型番_デザイン'.$i,$post_v2id).'</td>';
							$str.= '<td align="right"><span class="model-title">新品買取相場価格</span><br  class="only-sp"><span class="model-price">¥'.$price.'</span></td>';
							$str.= '</tr>';

							$count_num++;


						}
					}

				}



			echo  '<h3 class="p-20">検索結果<span id="watch_count" class="color-red">'.$count_num.'</span>件</h3>
		  <section class="tokei-pricetable">
		   <div class="section-inner">
			<div class="accordion">
			 <div class="accordion-item"><div class="accordion-content2" style="display:block;"><table>';

			echo $str;

			echo '</table></div>';



			}else{



			echo  '<h3 class="p-20">検索結果<span id="watch_count" class="color-red">'.$num2.'</span>件</h3>
		  <section class="tokei-pricetable">
		   <div class="section-inner">
			<div class="accordion">
			 <div class="accordion-item"><div class="accordion-content2" style="display:block;">';




			foreach($res2 as $k2=>$v2){

				$post_v2id =  $v2->ID;

?>

							<table class="accordion-model" onclick="accordion(<?php echo $k2?>);">
								<?php
									if(get_field('モデル1',$post_v2id)):
								?>
								<tr>
									<td colspan="3" >
										<i class="icon-<?php echo $k2;?>"></i>
										<p>
											<?php
												$filed1 =  get_field('モデル1',$post_v2id);

												$filed1 = str_replace('42','',$filed1);

												$filed1 = str_replace('34','',$filed1);

												echo $filed1;

											?>
										</p>

									</td>
								</tr>
								<?php endif;?>
							</table>

							<div class="model-content model-<?php echo $k2;?>">
								<table>
									<?php
										//add field  50
										for( $i=1; $i<=50; $i++){

											if(get_field('モデル'.$i,$post_v2id)){

												$price = str_replace( '¥' , '' ,get_field('買取金額'.$i,$post_v2id) );


												echo '<tr>';
												echo '<td>'.get_field('モデル'.$i,$post_v2id).'<div class="only-sp model-title">'.get_field('型番_デザイン'.$i,$post_v2id).'</div></td>';
												echo '<td class="only-pc">'.get_field('型番_デザイン'.$i,$post_v2id).'</td>';
												echo '<td align="right"><span class="model-title">新品買取相場価格</span><br  class="only-sp"><span class="model-price">¥'.$price.'</span></td>';
												echo '</tr>';

											}
										}
									?>
								</table>
							</div>


		<?php

			}


				echo '</div></div></div></div></section>';


		}


	exit;

	}else{

		$sql = 'SELECT * FROM wp_postmeta LEFT JOIN wp_posts ON wp_posts.ID = wp_postmeta.post_id  WHERE wp_postmeta.meta_value like "%'.$keyword.'%" and  (meta_key like "モデル%"  or meta_key like "型番_デザイン%") and wp_posts.post_type = "kaitori" ';


		$res = $wpdb->get_results($sql);

		$num = $wpdb->num_rows;

		$str = '<h3 class="p-20">検索結果<span id="watch_count" class="color-red">'.$num.'</span>件</h3>
		  <section class="tokei-pricetable">
		   <div class="section-inner">
			<div class="accordion">
			 <div class="accordion-item"><div class="accordion-content2" style="display:block;"><table>';

		if($num > 0){

			foreach($res as $key=>$post) {

				$meta_key  = str_replace('型番_デザイン','',$post->meta_key);

				$meta_key  = str_replace('モデル','',$meta_key);

				$price = $wpdb->get_results( 'SELECT * FROM wp_postmeta where meta_key = "買取金額'.$meta_key.'" and post_id = '.$post->post_id );

				$design = $wpdb->get_results( 'SELECT * FROM wp_postmeta where meta_key = "型番_デザイン'.$meta_key.'" and post_id = '.$post->post_id );

				$model = $wpdb->get_results( 'SELECT * FROM wp_postmeta where meta_key = "モデル'.$meta_key.'" and post_id = '.$post->post_id );


				$row_search['price'] = str_replace('¥','',$price[0]->meta_value);


				$row_search['design'] =  $design[0]->meta_value;

				$row_search['model'] = $model[0]->meta_value;


				$str .= '<tr>
				   <td>'.$row_search['model'].'
					<div class="only-sp model-title">
					 '.$row_search['design'].'
					</div></td>
				   <td class="only-pc">'.$row_search['design'].'</td>
				   <td align="right"><span class="model-title">新品買取相場価格</span><br class="only-sp" /><span class="model-price">&yen;'.$row_search['price'].'</span></td>
				  </tr>';

			}

		}else{




			$str .= '検索結果が見つかりませんでした。';



		}


		$str .= '</table></div></div></div></section>';

		echo $str;

	exit;

	}


}

add_action( 'wp_ajax_watch_search_ajax_action', 'watch_search_ajax' );
add_action( 'wp_ajax_nopriv_watch_search_ajax_action', 'watch_search_ajax' );








function change_blogname_option( $value ) {
	
	global $post;
	
	
	$qObject = get_queried_object();
	
	if ( isset($qObject) && isset($qObject->taxonomy) && $qObject->taxonomy === 'area' ) {

		$value = $qObject->name.'の買取ならジュエルカフェ 【公式】 | 最新相場で高価買取ならジュエルカフェ';

	}else if( strpos($_SERVER['REQUEST_URI'] , '/blog') !== false ){
		
			$hinmoku_terms = get_the_terms($post->ID, 'hinmoku');
			
			if(is_array($hinmoku_terms)){
			
				foreach($hinmoku_terms as $term) {
					if($term->parent === 0) {
						$hinmoku_parent_name = $term->name;
						$hinmoku_parent_id = $term->term_id;
					}
				}
				foreach($hinmoku_terms as $term) {
					if($term->parent === $hinmoku_parent_id) {
						$hinmoku_child_name = $term->name;
						// $hinmoku_child_id = $term->term_id;
					}
				}
			
			}	
			
			
			
			$blog_post_title = preg_replace('/[!‼︎！。♪⭐︎✴︎。^☆★♬😃⭐️]/u', '', $post->post_title);

			
			
			
			
			$blog_post_title = str_replace('をお買取致しました','',$blog_post_title);
			$blog_post_title = str_replace('をお買取をしました','',$blog_post_title);
			$blog_post_title = str_replace('をお買取り致しました','',$blog_post_title);
			$blog_post_title = str_replace('をお買取りいたしました','',$blog_post_title);
			$blog_post_title = str_replace('をお買い取り致しました','',$blog_post_title);
			$blog_post_title = str_replace('をお買取りさせていただきました','',$blog_post_title);
			$blog_post_title = str_replace('をお買取させていただきました','',$blog_post_title);
			$blog_post_title = str_replace('をお買取りしました','',$blog_post_title);
			$blog_post_title = str_replace('をお買取させて頂きました','',$blog_post_title);
			$blog_post_title = str_replace('をお買い取りさせて頂きました','',$blog_post_title);
			$blog_post_title = str_replace('をお買取いたしました','',$blog_post_title);
			$blog_post_title = str_replace('をお買取しました','',$blog_post_title);
			$blog_post_title = str_replace('を高価買取させていただきました','',$blog_post_title);
			$blog_post_title = str_replace('をお買取りさせて頂きました','',$blog_post_title);
			$blog_post_title = str_replace('を買い取りました','',$blog_post_title);
			$blog_post_title = str_replace('を買取りしました','',$blog_post_title);
			$blog_post_title = str_replace('お買取です','',$blog_post_title);
			$blog_post_title = str_replace('お買取しました','',$blog_post_title);
			$blog_post_title = str_replace('お買取りしました','',$blog_post_title);
			$blog_post_title = str_replace('お買取致しました','',$blog_post_title);
			$blog_post_title = str_replace('お買取いたしました','',$blog_post_title);
			$blog_post_title = str_replace('お買取り致しました','',$blog_post_title);
			$blog_post_title = str_replace('お買取りいたしました','',$blog_post_title);
			$blog_post_title = str_replace('お買い取りいたしました','',$blog_post_title);
			$blog_post_title = str_replace('お買取させて頂きました','',$blog_post_title);
			$blog_post_title = str_replace('お買取りさせて頂きました','',$blog_post_title);
			$blog_post_title = str_replace('お買い取り致しました','',$blog_post_title);
			$blog_post_title = str_replace('お買取いたします','',$blog_post_title);
			$blog_post_title = str_replace('お買い取りしました','',$blog_post_title);
			$blog_post_title = str_replace('お買取させていただきました','',$blog_post_title);
			$blog_post_title = str_replace('のお買取りをさせて頂きました','',$blog_post_title);
			$blog_post_title = str_replace('の買取をしました','',$blog_post_title);
			$blog_post_title = str_replace('のお買取りもさせていただいております','',$blog_post_title);
			$blog_post_title = str_replace('のお買取りを致しました','',$blog_post_title);
			$blog_post_title = str_replace('のお買取りをさせていただきました','',$blog_post_title);
			$blog_post_title = str_replace('お買取','',$blog_post_title);
			$blog_post_title = str_replace('お買取り','',$blog_post_title);
			$blog_post_title = str_replace('お買取してます','',$blog_post_title);
			$blog_post_title = str_replace('致します','',$blog_post_title);
			$blog_post_title = str_replace('買取致しました','',$blog_post_title);
			

			
			
			if( $hinmoku_terms[0]->slug == 'tokei-repair' ){
				
			$value = $blog_post_title . '修理実績 | '.date('Y年m月d日',strtotime($post->post_date)). ' | 最新相場で高価買取ならジュエルカフェ';
				
			}else{
			
			$value = $blog_post_title . ' | '.$hinmoku_parent_name.'買取 | 最新相場で高価買取ならジュエルカフェ';
			
			}
			
			
			
	}
	
	return $value;
	
	
}
add_filter( 'aioseo_title', 'change_blogname_option', 100 );










function jewelcafe_pagenavi() {


    global $paged,$wp_query;

    if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
    }


    if( $max_page >1 ) {

        if(!$paged){$paged = 1;}


		if( $paged-1 > 0){ $prev_link = '/blog/page/'.($paged-1).'/';}else{$prev_link = '/blog/page/1/';}

		if( $paged+1 < $max_page){ $next_link = '/blog/page/'.($paged+1).'/';}else{$next_link = '/blog/page/'.$max_page.'/';}


		if( $paged == $max_page ){

			echo '<a href="'.$prev_link.'" class="next-page-btn only-sp">上のページ</a>';

		}else{

			echo '<a href="'.$next_link.'" class="next-page-btn">次のページ</a>';

		}


		echo '<ul class="page-numbers2">';


        if( $paged !== 1 ) {

			echo '<li class="prev-arrow"><a href="'.$prev_link.'" class=""><</a></li>';

            echo "<li class='number'><a href='/blog/page/1/' class='extend'>1</a></li>";

        }



		if( $paged >= 1 && ($paged + 3) < $max_page ){


			for( $i = $paged; $i <= ($paged +2); $i++ ) {

				echo "<li class='number'><a href='".get_pagenum_link($i) ."'";

				if($i==$paged) echo " class='current'";echo ">$i</a></li>";

			}

			echo '<li class="dots"><span>…</span></li>';

		}else{


			echo '<li class="dots"><span>…</span></li>';


			for( $i = $paged - 2; $i <= $paged; $i++ ) {

				echo "<li class='number'><a href='".get_pagenum_link($i) ."'";

				if($i==$paged) echo " class='current'";echo ">$i</a></li>";

			}

		}


        if($paged != $max_page){

            echo "<li class='number'><a href='".get_pagenum_link($max_page) ."' class='extend' title='次のページ'>".$max_page."</a></li>";

			echo '<li class="next-arrow"><a href="'.$next_link.'" class="">></a></li>';

        }

        echo '</ul>';

    }
}




function assoc_unique($arr, $key){

$tmp_arr = array();
foreach($arr as $k => $v)
{
 if(in_array($v[$key], $tmp_arr))//搜索$v[$key]是否在$tmp_arr数组中存在，若存在返回true
{
   unset($arr[$k]);
}
else {
  $tmp_arr[] = $v[$key];
}
}
//sort($arr);
return $arr;

}



function search_shop(){


	global $wpdb;
	//$_POST['search_shop'];

	$_POST['address'] = mb_convert_kana($_POST['address'], 'KVa');
	
	if($_POST['address'] == '東京'){$_POST['address'] = '東京都';}
	
	if($_POST['address'] == '京都'){$_POST['address'] = '京都府';}


	$result_arr = array();

	if(strpos($_POST['address'],'都') !== false && $_POST['address'] !== '京都'){

		$new_add = explode('都',$_POST['address']);

		$add1 = $new_add[0].'都';

		$add2 = $new_add[1];

		$add3 = '';


	}else if(strpos($_POST['address'],'道') !== false){

		$new_add = explode('道',$_POST['address']);

		$add1 = $new_add[0].'道';

		$add3 = '';

	}else if(strpos($_POST['address'],'府') !== false){

		$new_add = explode('府',$_POST['address']);

		$add1 = $new_add[0].'府';

		$add3 = '';

	}else if(strpos($_POST['address'],'県') !== false){

		$new_add = explode('県',$_POST['address']);

		$add1 = $new_add[0].'県';

		$add3 = '';

	}else{

		$sql = "SELECT * FROM `wp_posts` where post_status = 'publish' and post_type = 'shop' and post_parent = 0 and post_title like '%{$_POST['address']}%' ";
		

		$result = $wpdb->get_results( $sql );


		$num = $wpdb->num_rows;


		if($num > 0 ){

			foreach($result as $k=>$v) {



				$sql = "SELECT * FROM `wp_shop_admin` WHERE shop_url = '{$v->post_name}' limit 1";

				$result = $wpdb->get_results($sql);
				
	
							
				//$post_meta = get_post_meta($v->ID);


				$exclude_store =  get_field('exclude-store',$v->ID);
				
				if($exclude_store[0]== '1'){
					
					continue;

				}
				
				
				if( $result[0]->shop_city1 == 'hokkaido' || $result[0]->shop_city1 == 'okinawa'){
				
					$result_arr[$count_arr]['url'] = '/shop/'.$result[0]->shop_city1.'/'.$result[0]->shop_url.'/';
				
				}else{
					
					$result_arr[$count_arr]['url'] = '/shop/'.$result[0]->shop_city1.'/'.$result[0]->shop_city2.'/'.$result[0]->shop_url.'/';
					
				}
				
				
				$result_arr[$count_arr]['tel'] = $result[0]->shop_tel;

				$result_arr[$count_arr]['time'] = $result[0]->shop_time;

				$result_arr[$count_arr]['add'] = $result[0]->shop_add;

				$result_arr[$count_arr]['id'] = $result[0]->shop_id;

				$result_arr[$count_arr]['title'] = $result[0]->shop_name;


				$count_arr++;


			}
			
			
			
			
			$sql = "SELECT `wp_postmeta`.post_id  FROM `wp_postmeta` LEFT JOIN `wp_posts` ON  `wp_postmeta`.post_id =  `wp_posts`.ID	  where  `wp_posts`.post_status = 'publish'  and  `wp_posts`.post_type = 'shop' and `wp_postmeta`.meta_key = '所在地' and meta_value like '%{$_POST['address']}%'   ";


			$result = $wpdb->get_results( $sql );
			

			$num = $wpdb->num_rows;
		
		
				if($num > 0 ){

					foreach($result as $k=>$v) {
					

						$sql = "SELECT * FROM `wp_shop_admin` WHERE shop_url = '{$v->post_name}' limit 1";

						$result = $wpdb->get_results($sql);
						
			
									
						//$post_meta = get_post_meta($v->ID);


						$exclude_store =  get_field('exclude-store',$v->ID);
						
						if($exclude_store[0]== '1' || $result[0]->shop_name == '' ){
							
							continue;

						}
						
						
						//$result_arr[$count_arr]['url'] = '/shop/'.$result[0]->shop_city1.'/'.$result[0]->shop_city2.'/'.$result[0]->shop_url.'/';
						
						
						if( $result[0]->shop_city1 == 'hokkaido' || $result[0]->shop_city1 == 'okinawa'){
						
							$result_arr[$count_arr]['url'] = '/shop/'.$result[0]->shop_city1.'/'.$result[0]->shop_url.'/';
						
						}else{
							
							$result_arr[$count_arr]['url'] = '/shop/'.$result[0]->shop_city1.'/'.$result[0]->shop_city2.'/'.$result[0]->shop_url.'/';
							
						}
								
						
						$result_arr[$count_arr]['tel'] = $result[0]->shop_tel;

						$result_arr[$count_arr]['time'] = $result[0]->shop_time;

						$result_arr[$count_arr]['add'] = $result[0]->shop_add;

						$result_arr[$count_arr]['id'] = $result[0]->shop_id;

						$result_arr[$count_arr]['title'] = $result[0]->shop_name;
								
				
						$count_arr++;

					}
				}
			
			
			

		}else{
			
			
			$sql = "SELECT `wp_postmeta`.post_id  FROM `wp_postmeta` LEFT JOIN `wp_posts` ON  `wp_postmeta`.post_id =  `wp_posts`.ID	  where  `wp_posts`.post_status = 'publish'  and  `wp_posts`.post_type = 'shop' and `wp_postmeta`.meta_key = '所在地' and meta_value like '%{$_POST['address']}%'   ";


			$result = $wpdb->get_results( $sql );
			

			$num = $wpdb->num_rows;
		
		
				if($num > 0 ){

					foreach($result as $k=>$v) {
					

						$sql = "SELECT * FROM `wp_shop_admin` WHERE shop_url = '{$v->post_name}' limit 1";

						$result = $wpdb->get_results($sql);
						
			
									
						//$post_meta = get_post_meta($v->ID);


						$exclude_store =  get_field('exclude-store',$v->ID);
						
						if($exclude_store[0]== '1' || $result[0]->shop_name == '' ){
							
							continue;

						}
						
						$result_arr[$count_arr]['url'] = '/shop/'.$result[0]->shop_city1.'/'.$result[0]->shop_city2.'/'.$result[0]->shop_url.'/';
						
						$result_arr[$count_arr]['tel'] = $result[0]->shop_tel;

						$result_arr[$count_arr]['time'] = $result[0]->shop_time;

						$result_arr[$count_arr]['add'] = $result[0]->shop_add;

						$result_arr[$count_arr]['id'] = $result[0]->shop_id;

						$result_arr[$count_arr]['title'] = $result[0]->shop_name;
						
				
						$count_arr++;

					}
				}
				

			
		}



		$result_arr = assoc_unique($result_arr,'add');


		header("Content-type: application/json; charset=UTF-8");

		echo json_encode($result_arr);

		exit;


	}




	$sql = "SELECT `wp_postmeta`.post_id  FROM `wp_postmeta` LEFT JOIN `wp_posts` ON  `wp_postmeta`.post_id =  `wp_posts`.ID	  where  `wp_posts`.post_status = 'publish'  and  `wp_posts`.post_type = 'shop' and `wp_postmeta`.meta_key = '所在地' and meta_value like '%{$add1}{$add2}{$add3}%'   ";


	$count_arr = 0;

	$result = $wpdb->get_results( $sql );

	$num = $wpdb->num_rows;

	if($num > 0 ){

		foreach($result as $k=>$v) {


				$sql = "SELECT * FROM `wp_shop_admin` WHERE shop_url = '{$v->post_name}' limit 1";

				$result = $wpdb->get_results($sql);
				
	
							
				//$post_meta = get_post_meta($v->ID);


				$exclude_store =  get_field('exclude-store',$v->ID);
		
				if($exclude_store[0]== '1' || $result[0]->shop_name == '' ){
					
					continue;

				}
		
				
				$result_arr[$count_arr]['url'] = '/shop/'.$result[0]->shop_city1.'/'.$result[0]->shop_city2.'/'.$result[0]->shop_url.'/';
				
				$result_arr[$count_arr]['tel'] = $result[0]->shop_tel;

				$result_arr[$count_arr]['time'] = $result[0]->shop_time;

				$result_arr[$count_arr]['add'] = $result[0]->shop_add;

				$result_arr[$count_arr]['id'] = $result[0]->shop_id;

				$result_arr[$count_arr]['title'] = $result[0]->shop_name;
				
				

			$count_arr++;

		}

	}





	if( count($result_arr) <10 ){

		$sql = "SELECT * FROM `wp_postmeta` LEFT JOIN `wp_posts` ON  `wp_postmeta`.post_id =  `wp_posts`.ID	  where  `wp_posts`.post_status = 'publish'  and   `wp_posts`.post_type = 'shop' and `wp_postmeta`.meta_key = '所在地' and meta_value like '%{$add1}{$add2}%'   ";


		$result = $wpdb->get_results( $sql );

		$num = $wpdb->num_rows;



		if($num > 0 ){

			foreach($result as $k=>$v) {


				$sql = "SELECT * FROM `wp_shop_admin` WHERE shop_url = '{$v->post_name}' limit 1";

				$result = $wpdb->get_results($sql);
				
	
							
				//$post_meta = get_post_meta($v->ID);


				$exclude_store =  get_field('exclude-store',$v->ID);
				
				if($exclude_store[0]== '1' || $result[0]->shop_name == '' ){
					
					continue;

				}
		
				
				$result_arr[$count_arr]['url'] = '/shop/'.$result[0]->shop_city1.'/'.$result[0]->shop_city2.'/'.$result[0]->shop_url.'/';
				
				$result_arr[$count_arr]['tel'] = $result[0]->shop_tel;

				$result_arr[$count_arr]['time'] = $result[0]->shop_time;

				$result_arr[$count_arr]['add'] = $result[0]->shop_add;

				$result_arr[$count_arr]['id'] = $result[0]->shop_id;

				$result_arr[$count_arr]['title'] = $result[0]->shop_name;

				$count_arr++;

			}



		}

			if( count($result_arr) <10 ){

				$sql = "SELECT * FROM `wp_postmeta` LEFT JOIN `wp_posts` ON  `wp_postmeta`.post_id =  `wp_posts`.ID	  where  `wp_posts`.post_status = 'publish'  and  `wp_posts`.post_type = 'shop' and `wp_postmeta`.meta_key = '所在地' and meta_value like '%{$add1}%'   ";

				$result = $wpdb->get_results( $sql );

				$num = $wpdb->num_rows;

				if($num > 0 ){

					foreach($result as $k=>$v) {


						$sql = "SELECT * FROM `wp_shop_admin` WHERE shop_url = '{$v->post_name}' limit 1";

						$result = $wpdb->get_results($sql);
						
			
									
						//$post_meta = get_post_meta($v->ID);


						$exclude_store =  get_field('exclude-store',$v->ID);
						
						if($exclude_store[0]== '1' || $result[0]->shop_name == '' ){
							
							continue;

						}
						
						
						$result_arr[$count_arr]['url'] = '/shop/'.$result[0]->shop_city1.'/'.$result[0]->shop_city2.'/'.$result[0]->shop_url.'/';
						
						$result_arr[$count_arr]['tel'] = $result[0]->shop_tel;

						$result_arr[$count_arr]['time'] = $result[0]->shop_time;

						$result_arr[$count_arr]['add'] = $result[0]->shop_add;

						$result_arr[$count_arr]['id'] = $result[0]->shop_id;

						$result_arr[$count_arr]['title'] = $result[0]->shop_name;

						$count_arr++;

					}

				}

			}

	}



	$result_arr = assoc_unique($result_arr,'add');


	header("Content-type: application/json; charset=UTF-8");

	echo json_encode($result_arr);

    wp_die();

}
add_action( 'wp_ajax_search_shop', 'search_shop' );
add_action( 'wp_ajax_nopriv_search_shop', 'search_shop' );





function show_banner($name){
	
	$banner_img = '';
	
	$img_src = get_field($name);
	
	if($img_src['url'] !== ''){
	
		$banner_img = '<img src="'.$img_src['url'].'" alt="ジュエルカフェならお店で今すぐかんたんスピード買取！ 査定・ご相談0円" width="100%" />';
	
	}
	
	return $banner_img;
	
}




function load_single_template($template) {
    $new_template = '';
    // single post template    
    if( is_single() ) {      
        global $post;

		if( is_single()  && $post->post_type == 'shop' && $post->post_name == 'tokei-repair-matsuegakuendori') {

			$new_template  = locate_template(array('page-tokei-repair-matsuegakuendori.php'));
			
		}

		if( is_single()  && $post->post_type == 'shop' && $post->post_name == 'tokei-repair-yoshinari') {

			$new_template  = locate_template(array('page-tokei-repair-yoshinari.php'));
			
		}
	

    }    
    return ('' != $new_template) ? $new_template : $template;  
}
add_action('template_include', 'load_single_template');







function display_filed($title,$message){
	
	if(get_field($title)){
	
		return get_field($title);
		
	}else{
			
		return $message;
		
	}

}

function add_slash($uri, $type) {
  if ($type != 'single') {
    $uri = trailingslashit($uri);
  }
  return $uri;
}
add_filter('user_trailingslashit', 'add_slash', 10, 2);




/*
function gold_search_ajax(){
	
	global $wpdb;

	$ary_lists = array();


	$sql = "select {$_POST['posttype']} from `wp_goldchart` ORDER BY `wp_goldchart`.`id` DESC limit 0,30";

	$result = $wpdb->get_results($sql);


	foreach($result as $key=>$row) {

		$ary_lists[] = (array)$row[$_POST['posttype']];
		
	}
	

	echo json_encode($ary_lists); //jsonオブジェクト化。
	exit;

}


add_action( 'wp_ajax_gold_search_ajax_action', 'gold_search_ajax' );
add_action( 'wp_ajax_nopriv_gold_search_ajax_action', 'gold_search_ajax' );
*/




function gold_search_ajax(){

	global $wpdb;

	$ary_lists = array();


	$sql = "select {$_POST['posttype']} from `wp_goldchart` ORDER BY `wp_goldchart`.`id` DESC limit 0,30";

	$result = $wpdb->get_results($sql);
	
	foreach($result as $key=>$row) {
		
		$row = (array)$row;

		$ary_lists[] = trim($row[$_POST['posttype']]);
		
	}
	
	
	header('Content-type: application/json; charset=UTF-8');

	$jsonstr =  json_encode($ary_lists, true);
	
	echo $jsonstr;
		
	exit;


}


add_action( 'wp_ajax_gold_search_ajax_action', 'gold_search_ajax' );
add_action( 'wp_ajax_nopriv_gold_search_ajax_action', 'gold_search_ajax' );





//google 構造化データ
function google_json_data( $post ){
	
	
	if($post->post_type == 'shop' || $post->post_type == 'kaitori'){


		if( get_the_terms($post->ID, 'area') ){ //品目 - 県ページの場合
		
			$post_id= $post->post_parent;
			
		}else{
			
			$post_id = $post->ID;
			
			
		}

	
	
	$application_json = '';
	
	
	//shop kaitori , ファイル名前
	$qna_field = array();
	
	
		for ($k=1; $k<=10; $k++){

			
			if( $post->post_type == 'shop' ){ 
			
				$qna_field[0] = '質問';
				
				$qna_field[1] = '回答';

			}else{ 
		
				$qna_field[0] = '_Q';
				
				$qna_field[1] = '_A';
				
			}




			if (get_field('よくあるご質問その'.$k.$qna_field[0],$post_id) && get_field('よくあるご質問その'.$k.$qna_field[1],$post_id)){

				$application_json.= '{';
				
				$application_json.= '
				"@type": "Question",
				';

				$application_json.= '
				"name": "'.str_replace('"',"'",get_field('よくあるご質問その'.$k.$qna_field[0],$post_id)).'",
				';

				$application_json.= '
				"acceptedAnswer": {
				';

				$application_json.= '
				"@type": "Answer",
				';

				$application_json.= ' 
				"text": "'.str_replace('"',"'",get_field('よくあるご質問その'.$k.$qna_field[1],$post_id)).'"
				}
				';
			
				$application_json.= '},';
				
			}
			
		}
	
	
	
	
	
	//店舗ページ共通質問
	
	if($post->post_type == 'shop'){
		
		
		$page_ID = get_page_by_path( 'qa' );
		
		$page_ID = $page_ID->ID;


		
		for ($k=1; $k<=11; $k++){


			if (get_field('共通質問'.$k,$page_ID) && get_field('共通回答'.$k,$page_ID)){

				$application_json.= '{';
				
				$application_json.= '
				"@type": "Question",
				';

				$application_json.= '
				"name": "'.str_replace('"',"'",get_field('共通質問'.$k,$page_ID)).'",
				';

				$application_json.= '
				"acceptedAnswer": {
				';

				$application_json.= '
				"@type": "Answer",
				';

				$application_json.= ' 
				"text": "'.str_replace('"',"'",get_field('共通回答'.$k,$page_ID)).'"
				}
				';
			
				$application_json.= '},';
				
			}
			
		}
		
		
	}

	
		return  substr($application_json,0,strlen($application_json)-1); 
	
	
	}


}



//コラムのCTAボタン
function cta_box() {
    return '
		<div class="cta">
			<ul>
				<li class="top">
					<a href="'.esc_url(home_url()).'">
						<img src="'.esc_url(get_template_directory_uri()).'/assets/images/column/cta_button_top.svg">
					</a>
				</li>
				<li class="line">
					<a href="'.esc_url(home_url('/about-line/')).'">
						<img src="'.esc_url(get_template_directory_uri()).'/assets/images/column/cta_button_line.svg">
					</a>
				</li>
			</ul>
		</div>
    ';
}
add_shortcode('cta', 'cta_box');

//コラムのCTAボタン2
function cta2_box() {
	$url = explode('/', $_SERVER['REQUEST_URI']);
	if($url[2] == 'brand'){
		$hinmoku = "ブランド買取なら";
	}elseif($url[2] == 'gold'){
		$hinmoku = "貴金属買取なら";
	}elseif($url[2] == 'tokei'){
		$hinmoku = "時計買取なら";
	}else{
		$hinmoku = "買取専門店";
	}
    return '
		<div class="cta2">
			<div class="text">全国300店舗<span class="punctuation">、</span><br class="only-sp">お客様満足度No1の買取専門店</div>
			<div class="cta_button">
				<a href="'.esc_url(home_url()).'">'.$hinmoku.'ジュエルカフェ！<br class="only-sp">お近くの店舗はこちらから</a>
			</div>
		</div>
    ';
}
add_shortcode('cta2', 'cta2_box');


//店舗数のショートコード@金券切手の都道府県ページタイトル
function shop_count_term( $area ) {
	$child_term_count = count( get_term_children( get_term_by( 'slug', $area[0], 'area' )->term_id, 'area' ) );
	return $child_term_count;
}
add_shortcode('shop_count', 'shop_count_term');




//コラム画像処理
function get_link_thumbnail($post_content){
	
	preg_match_all('/\[(.*?)jewel-cafe.jp\/column\/(.*?)\/(.*?)\]/msi',$post_content,$link_arr);



	if( isset($link_arr[3]) && count($link_arr[3])>0 ){

		foreach($link_arr[3] as $key=>$value){
			
			$post_slug = str_replace('/','',$value);
			
			$post = get_posts('post_type=column&name='.$post_slug);
			
			$post_title = $post[0]->post_title;
			
			$thumbnail = get_the_post_thumbnail_url($post[0]->ID);

			if( trim($thumbnail) !== ''){
				
				$replace_str = '
					<div class="outline">
						<article class="item">
							<div class="text_box">
								<div class="related_article">関連記事</div>
								<div class="ttl">'.$post_title.'</div>
								<div class="read">
									<a href="https://jewel-cafe.jp/column/'.$link_arr[2][$key].'/'.$link_arr[3][$key].'">続きを読む</a>
								</div>
							</div>
							<div class="thumb_box">
								<img src="'.$thumbnail.'" />
							</div>
						</article>
					</div>
				';
				
				$post_content = str_replace($link_arr[0][$key],$replace_str,$post_content);

			}
			
		}

	}

	return $post_content;

}









// 買取事例ブログの入力必須設定
function post_edit_required() {
	?>
	<script type="text/javascript">
	jQuery(function($) {
	  if ( 'blog' == $('#post_type').val() ) { // ここでページの種類を指定
		$('#post').submit(function(e) {
		  // タイトル
		  if ('' == $('#title').val()) {
			alert('タイトルを入力してください');
			$('.spinner').css('visibility', 'hidden');
			$('#publish').removeClass('button-primary-disabled');
			$('#title').focus();
			return false;
		  }

<?php /* ?> 時計修理の実績ブログでは親のみ選択なのでこちらのエラー処理をひとまず停止
		  // 品目タグ ※「親・子・子」の階層3つあるうち、親と上の子の選択がされていなければエラーを出す
		  if ($('#taxonomy-hinmoku #hinmokuchecklist > li > label input:checked').length < 1 || $('#taxonomy-hinmoku #hinmokuchecklist > li > ul > li > label input:checked').length < 1 ) {
			alert('品目を正確に選択してください（例：ブランド時計 , ロレックス , デイトナ）');
			$('.spinner').css('visibility', 'hidden');
			$('#publish').removeClass('button-primary-disabled');
			$('#taxonomy-hinmoku a[href="#hinmoku-all"]').focus();
			return false;
		  }
<?php */ ?>

		  // 店舗タグ
		  if ($('#taxonomy-area input:checked').length < 3) {
			alert('店舗を正確に選択してください（例：関東 , 東京 , 浅草店）');
			$('.spinner').css('visibility', 'hidden');
			$('#publish').removeClass('button-primary-disabled');
			$('#taxonomy-area a[href="#area-all"]').focus();
			return false;
		  }

		  // アイキャッチ
		  if ($('#set-post-thumbnail img').length < 1) {
			alert('アイキャッチ画像を設定してください');
			$('.spinner').css('visibility', 'hidden');
			$('#publish').removeClass('button-primary-disabled');
			$('#set-post-thumbnail').focus();
			return false;
		  }

		});
	  }
	});
	</script>
	<?php
	}
	add_action( 'admin_head-post-new.php', 'post_edit_required' );
	add_action( 'admin_head-post.php', 'post_edit_required' );
	



	if (strpos($_SERVER['REQUEST_URI'], '/author/') === 0) { //authorディレクトリをTOPページにリダイレクト
		header("Location: /");
		exit();
	}

	









function get_saiji_list( $count ){
	
	
	$saiji_arr = array();
	

	$servername = "localhost";
	
	$username = "xs931070_jcevent";
	
	$password = "jcevent617044";
	
	$dbname = "xs931070_event";


	$conn = new mysqli($servername, $username, $password, $dbname);


	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	


$sql = "
SELECT *
FROM wp_postmeta
WHERE meta_key = 'schedule_edate'
AND STR_TO_DATE(meta_value, '%Y/%m/%d') >= CURDATE()
ORDER BY STR_TO_DATE(meta_value, '%Y/%m/%d') ASC;
";



	
	$result = $conn->query($sql);


	if ($result->num_rows > 0) {
		
		$count_num = 1;
		
		
		while($row = $result->fetch_assoc()) {

		
			$sql2 = "SELECT
    p.ID AS post_id,
    p.post_name,
    p.post_title,
    pm1.meta_value AS event_area,
    pm2.meta_value AS event_area2,
    pm3.meta_value AS event_area3,
    pm4.meta_value AS venue_name,
    pm5.meta_value AS venue_room,
    pm6.meta_value AS schedule_sdate,
    pm7.meta_value AS schedule_edate,
    pm8.meta_value AS schedule_stime,
    pm9.meta_value AS schedule_etime,
    pm10.meta_value AS different_etime
FROM
    wp_posts p
LEFT JOIN wp_postmeta pm1 ON p.ID = pm1.post_id AND pm1.meta_key = 'event_area'
LEFT JOIN wp_postmeta pm2 ON p.ID = pm2.post_id AND pm2.meta_key = 'event_area2'
LEFT JOIN wp_postmeta pm3 ON p.ID = pm3.post_id AND pm3.meta_key = 'event_area3'
LEFT JOIN wp_postmeta pm4 ON p.ID = pm4.post_id AND pm4.meta_key = 'venue_name'
LEFT JOIN wp_postmeta pm5 ON p.ID = pm5.post_id AND pm5.meta_key = 'venue_room'
LEFT JOIN wp_postmeta pm6 ON p.ID = pm6.post_id AND pm6.meta_key = 'schedule_sdate'
LEFT JOIN wp_postmeta pm7 ON p.ID = pm7.post_id AND pm7.meta_key = 'schedule_edate'
LEFT JOIN wp_postmeta pm8 ON p.ID = pm8.post_id AND pm8.meta_key = 'schedule_stime'
LEFT JOIN wp_postmeta pm9 ON p.ID = pm9.post_id AND pm9.meta_key = 'schedule_etime'
LEFT JOIN wp_postmeta pm10 ON p.ID = pm10.post_id AND pm10.meta_key = 'different_etime'
WHERE p.ID = 
".$row['post_id'];
		
		

		$result2 = $conn->query($sql2);

		$row2 = $result2->fetch_assoc();
		

		if (strpos($row2['post_name'], 'revision') !== false) {
			
			continue;
	
		}
		

		
		$current_time = new DateTime();


		$current_time = new DateTime();

		$other_time = new DateTime($row2['schedule_sdate'].' '.$row2['schedule_stime']);
	
		
		
		$row2['is_eventing'] = '';

			
		if ($current_time >= $other_time) {

			$row2['is_eventing'] = '1';
			
		}
		
		
		$saiji_arr[] = $row2;
		
		
		if ($count > 0 && $count_num >= $count) {
			
			return $saiji_arr;
			
		}
		
		
		
		$count_num++;
		
		
		}
		
	}


	$conn->close();
	
	return $saiji_arr;
	

}





function get_week($data){
	
		$week = [
		  '日', //0
		  '月', //1
		  '火', //2
		  '水', //3
		  '木', //4
		  '金', //5
		  '土', //6
		];

		$date = date('w', strtotime($data));
		 
		return  $week[$date];
	
}




function GetGoldComent(){
	
	global $wpdb;
	
	$sql = "SELECT * FROM `wp_goldcomment` WHERE 1 order by time desc limit 0 , 1";

	$result = $wpdb->get_results($sql);
	
    $date = new DateTime($result[0]->time);

    $formattedDate = $date->format('Y年n月j日 H:i');
	
	$result[0]->time = $formattedDate;
	
	$result[0]->comment = nl2br(htmlspecialchars($result[0]->comment));


	return $result;
	
}




//店舗情報管理

function get_shop_info( $slug ){
	
	
	global $wpdb;
	
	$sql = "SELECT * FROM `wp_shop_admin` WHERE shop_url = '{$slug}' limit 1";

	$result = $wpdb->get_results($sql);
	
	return $result;
	
}




function replacePrefecturesName( $name ){


        if (mb_strlen($name) < 1) return $name;
 
        if (strpos($name,"hokkaido") !== false) return "北海道";
        if (strpos($name,"aomori") !== false) return "青森県";
        if (strpos($name,"iwate") !== false) return "岩手県";
        if (strpos($name,"miyagi") !== false) return "宮城県";
        if (strpos($name,"akita") !== false) return "秋田県";
        if (strpos($name,"yamagata") !== false) return "山形県";
        if (strpos($name,"fukushima") !== false) return "福島県";
        if (strpos($name,"ibaraki") !== false) return "茨城県";
        if (strpos($name,"tochigi") !== false) return "栃木県";
        if (strpos($name,"gunma") !== false) return "群馬県";
        if (strpos($name,"saitama") !== false) return "埼玉県";
        if (strpos($name,"chiba") !== false) return "千葉県";
        if (strpos($name,"tokyo") !== false) return "東京都";
        if (strpos($name,"kanagawa") !== false) return "神奈川県";
        if (strpos($name,"niigata") !== false) return "新潟県";
        if (strpos($name,"toyama") !== false) return "富山県";
        if (strpos($name,"ishikawa") !== false) return "石川県";
        if (strpos($name,"fukui") !== false) return "福井県";
        if (strpos($name,"yamanashi") !== false) return "山梨県";
        if (strpos($name,"nagano") !== false) return "長野県";
        if (strpos($name,"gifu") !== false) return "岐阜県";
        if (strpos($name,"shizuoka") !== false) return "静岡県";
        if (strpos($name,"aichi") !== false) return "愛知県";
        if (strpos($name,"mie") !== false) return "三重県";
        if (strpos($name,"shiga") !== false) return "滋賀県";
        if (strpos($name,"kyoto") !== false) return "京都府";
        if (strpos($name,"osaka") !== false) return "大阪府";
        if (strpos($name,"hyogo") !== false) return "兵庫県";
        if (strpos($name,"hyōgo") !== false) return "兵庫県";
        if (strpos($name,"nara") !== false) return "奈良県";
        if (strpos($name,"wakayama") !== false) return "和歌山県";
        if (strpos($name,"tottori") !== false) return "鳥取県";
        if (strpos($name,"shimane") !== false) return "島根県";
        if (strpos($name,"okayama") !== false) return "岡山県";
        if (strpos($name,"hiroshima") !== false) return "広島県";
        if (strpos($name,"yamaguchi") !== false) return "山口県";
        if (strpos($name,"tokushima") !== false) return "徳島県";
        if (strpos($name,"kagawa") !== false) return "香川県";
        if (strpos($name,"ehime") !== false) return "愛媛県";
        if (strpos($name,"kouchi") !== false) return "高知県";
        if (strpos($name,"kōchi") !== false) return "高知県";
        if (strpos($name,"fukuoka") !== false) return "福岡県";
        if (strpos($name,"saga") !== false) return "佐賀県";
        if (strpos($name,"nagasaki") !== false) return "長崎県";
        if (strpos($name,"kumamoto") !== false) return "熊本県";
        if (strpos($name,"oita") !== false) return "大分県";
        if (strpos($name,"ōita") !== false) return "大分県";
        if (strpos($name,"miyazaki") !== false) return "宮崎県";
        if (strpos($name,"kagoshima") !== false) return "鹿児島県";
        if (strpos($name,"okinawa") !== false) return "沖縄県";
 
        return null;
	
	
}



function filter_posts_by_title($where, $wp_query) {
    if ($wp_query->get('filter_titles')) {
        global $wpdb;
        $where .= " AND ({$wpdb->posts}.post_title LIKE '%k18%' OR {$wpdb->posts}.post_title LIKE '%K18%' OR {$wpdb->posts}.post_title LIKE '%18金%')";
    }
    return $where;
}
add_filter('posts_where', 'filter_posts_by_title', 10, 2);

//All in one seoの構造化マークアップ無効化
add_filter( 'aioseo_schema_disable', '__return_true' );





function get_latest_shop_post_date(){
	
    global $wpdb;

    $args = array(
        'posts_per_page' => 1,
        'post_type' => 'shop',
        'orderby' => 'date',
        'order' => 'DESC',
    );
	
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $query->the_post();
        $latest_post_date = get_the_date('Y-m-d');
        wp_reset_postdata();
        return $latest_post_date;
    } else {
        return '投稿がありません';
    }

}







function get_latest_shop_area_post_date($city){
	
    global $wpdb;

    $args = array(
        'posts_per_page' => 1,
        'post_type' => 'blog',
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'area',
                'field'    => 'slug',
                'terms'    => $city,
            ),
        ),		
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $query->the_post();
        $latest_post_date = get_the_date('Y-m-d');
        wp_reset_postdata();
        return $latest_post_date;
    } else {
        return '投稿がありません';
    }

}








function update_guid_with_hierarchical_taxonomy( $post_ID ) {
    global $wpdb;


    $post = get_post( $post_ID );


    if ( $post->post_type == 'kaitori' ) {


        $post_ancestors = get_post_ancestors( $post_ID );
        $ancestor_slugs = array();

        if ( !empty( $post_ancestors ) ) {
            foreach ( $post_ancestors as $ancestor_id ) {
                $ancestor_post = get_post( $ancestor_id );
                $ancestor_slugs[] = $ancestor_post->post_name;
            }
        }


        $terms = wp_get_post_terms( $post_ID, 'hinmoku' );

        $term_slugs = array();


        if ( !empty($terms) && !is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {

                $term_ancestors = get_ancestors( $term->term_id, 'hinmoku' );
                $term_ancestors = array_reverse( $term_ancestors );

                foreach ( $term_ancestors as $ancestor_id ) {
                    $ancestor_term = get_term( $ancestor_id, 'hinmoku' );
                    if ( !in_array( $ancestor_term->slug, $term_slugs ) ) {
                        $term_slugs[] = $ancestor_term->slug;
                    }
                }

                if ( !in_array( $term->slug, $term_slugs ) ) {
                    $term_slugs[] = $term->slug;
                }
            }
        }

        $term_slugs = array_unique( $term_slugs );

        $all_slugs = array_merge( $ancestor_slugs, $term_slugs );

        if ( !empty( $all_slugs ) ) {
            $slug_path = implode( '/', $all_slugs );
            $post_name_guid = home_url( '/' . $post->post_type . '/' . $slug_path . '/' . $post->post_name . '/' );
        } else {
            $post_name_guid = home_url( '/' . $post->post_type . '/' . $post->post_name . '/' );
        }


        $wpdb->update(
            $wpdb->posts,
            array( 'guid' => $post_name_guid ),
            array( 'ID' => $post_ID )
        );
    }
}

add_action( 'save_post', 'update_guid_with_hierarchical_taxonomy' );




// 管理画面のみ、管理者権限以外のユーザーは特定メニューを非表示にする。タクソノミー「hinmoku」と「area」
function remove_menus2() {
    if ( is_admin() && ! current_user_can( 'administrator' ) ) {
        global $wp_taxonomies;
        if ( isset( $wp_taxonomies['hinmoku'] ) ) {
            unset( $wp_taxonomies['hinmoku'] );
        }
        if ( isset( $wp_taxonomies['area'] ) ) {
            unset( $wp_taxonomies['area'] );
        }
    }
}
add_action( 'init', 'remove_menus2' );




/*
add_filter('wpcf7_mail_components', 'custom_wpcf7_add_dynamic_cc', 100, 3);
function custom_wpcf7_add_dynamic_cc($components, $contact_form, $mail) {
    if ($contact_form->id() !== 3796) {
        error_log('폼 ID가 3796이 아님: ' . $contact_form->id());
        return $components;
    }

    // 제출 데이터 가져오기
    $submission = WPCF7_Submission::get_instance();

    $posted_data = $submission->get_posted_data();
	

    $cc_emails = [];
    if (isset($posted_data['your-pref'][0])) {
        $pref = $posted_data['your-pref'][0];

        if (in_array($pref, ['北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県', '埼玉県', '東京都', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県'])) {
            $cc_emails = ['m.jinno@crane-a.co.jp', 'hachimonji@crane-a.co.jp'];
        } elseif ($pref === '静岡県') {
            $cc_emails = ['m.jinno@crane-a.co.jp'];
        } elseif ($pref === '神奈川県') {
            $cc_emails = ['nakayama@crane-a.co.jp', 'ishii@crane-a.co.jp'];
        } elseif ($pref === '千葉県') {
            $cc_emails = ['ishii@crane-a.co.jp'];
        } elseif (in_array($pref, ['岐阜県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県', '香川県'])) {
            $cc_emails = ['kushitani@crane-a.co.jp'];
        } elseif (in_array($pref, ['徳島県', '愛媛県', '高知県'])) {
            $cc_emails = ['nagao@crane-a.co.jp'];
        } elseif (in_array($pref, ['福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県'])) {
            $cc_emails = ['matsunaga@crane-a.co.jp', 'kabumoto@crane-a.co.jp'];
        } elseif ($pref === '沖縄県') {
            $cc_emails = ['nakama@crane-a.co.jp'];
        }
    }

   
      if (!empty($cc_emails) && strpos( $components['subject'], '【出張買取】フォームからお申し込みがありました。' ) !== false ) {
        $components['additional_headers'] .= "\nCC: " . implode(', ', array_unique($cc_emails));
    }

   
    return $components;
}
*/


add_filter('wpcf7_mail_components', 'custom_wpcf7_add_dynamic_cc', 100, 3);
function custom_wpcf7_add_dynamic_cc($components, $contact_form, $mail) {
    if ($contact_form->id() !== 3796) {
        error_log('폼 ID가 3796이 아님: ' . $contact_form->id());
        return $components;
    }

    $submission = WPCF7_Submission::get_instance();
    $posted_data = $submission->get_posted_data();

    $original_to = $contact_form->prop('mail')['recipient'];

    $cc_emails = [];
    if (isset($posted_data['your-pref'][0])) {
        $pref = $posted_data['your-pref'][0];

        if (in_array($pref, ['北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県', '埼玉県', '東京都', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県'])) {
            $cc_emails = ['m.jinno@crane-a.co.jp', 'hachimonji@crane-a.co.jp'];
        } elseif ($pref === '静岡県') {
            $cc_emails = ['m.jinno@crane-a.co.jp'];
        } elseif ($pref === '神奈川県') {
            $cc_emails = ['nakayama@crane-a.co.jp', 'ishii@crane-a.co.jp'];
        } elseif ($pref === '千葉県') {
            $cc_emails = ['ishii@crane-a.co.jp'];
        } elseif (in_array($pref, ['岐阜県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県', '香川県'])) {
            $cc_emails = ['kushitani@crane-a.co.jp'];
        } elseif (in_array($pref, ['徳島県', '愛媛県', '高知県'])) {
            $cc_emails = ['nagao@crane-a.co.jp'];
        } elseif (in_array($pref, ['福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県'])) {
            $cc_emails = ['matsunaga@crane-a.co.jp', 'r.kawaguchi@crane-a.co.jp'];
        } elseif ($pref === '沖縄県') {
            $cc_emails = ['nakama@crane-a.co.jp'];
        }
    }

    // TO와 CC 스왑
    if (!empty($cc_emails) && strpos($components['subject'], '【出張買取】フォームからお申し込みがありました。') !== false) {

        $components['additional_headers'] = isset($components['additional_headers']) ? $components['additional_headers'] : '';
        $components['additional_headers'] .= "\nCC: " . $original_to;

        $components['recipient'] = implode(', ', array_unique($cc_emails));
        
    }


    return $components;
}


// ジュエルぐまのカスタム投稿タイプのアーカイブページと個別ページを404にする
add_action('template_redirect', function () {
    $blocked_post_types = ['jewel-guma-wallpaper', 'jewel-guma-news', 'jewel-guma-uranai'];
    foreach ($blocked_post_types as $post_type) {
        if (is_singular($post_type) || is_post_type_archive($post_type)) {
            global $wp_query;
            $wp_query->set_404();
            status_header(404);
            nocache_headers();
            include get_query_template('404');
            exit;
        }
    }
});




add_filter('aioseo_canonical_url', function($url) {
    if (get_post_type() === 'blog') {
        return false;
    }
    return $url;
});




// カスタム投稿タイプ "blog" の編集画面のみオートセーブ無効化（新規投稿画面でページを離れたときに自動で下書きにならないようにする設定）
add_action('admin_enqueue_scripts', function() {
    $screen = get_current_screen();
    if ($screen && $screen->post_type === 'blog') {
        wp_deregister_script('autosave');
    }
});


/**
 * 投稿者(author) 는 blog CPT만 보이게/쓰게, 나머지 메뉴는 전부 숨김 + 부드러운 리다이렉트
 */
add_action('admin_init', function () {
    $u = wp_get_current_user();
    if (!in_array('author', (array) $u->roles, true)) return;

    add_filter('login_redirect', function ($redirect_to, $requested, $user) {
        return admin_url('edit.php?post_type=blog');
    }, 10, 3);

    add_action('current_screen', function ($screen) {
        $allowed = [
            'edit-blog',
            'blog',
            'post'
        ];
        $is_blog = isset($_GET['post_type']) && $_GET['post_type'] === 'blog';
        $is_blog_edit = isset($_GET['post']) && get_post_type((int)$_GET['post']) === 'blog';

        if (!in_array($screen->id, $allowed, true) || (!$is_blog && !$is_blog_edit)) {
            wp_safe_redirect(admin_url('edit.php?post_type=blog'));
            exit;
        }
    });
});


add_action('admin_menu', function () {
    $u = wp_get_current_user();
    if (!in_array('author', (array) $u->roles, true)) return;

    $allow_parents = [
        'edit.php?post_type=blog',
    ];

    global $menu, $submenu;

    foreach ($menu as $k => $m) {
        $slug = $m[2] ?? '';
        if (!in_array($slug, $allow_parents, true)) {
            remove_menu_page($slug);
        }
    }

    foreach ($submenu as $parent => $items) {
        if ($parent !== 'edit.php?post_type=blog') {
            unset($submenu[$parent]);
        } else {
            $submenu[$parent] = array_values(array_filter($items, function ($row) {
                return in_array($row[2], ['edit.php?post_type=blog', 'post-new.php?post_type=blog'], true);
            }));
        }
    }

    remove_submenu_page('edit.php', 'post-new.php');
}, 999);


add_action('admin_bar_menu', function ($wp_admin_bar) {
    $u = wp_get_current_user();
    if (!in_array('author', (array) $u->roles, true)) return;

    $wp_admin_bar->remove_node('new-content');
    $wp_admin_bar->remove_node('new-post');
    $wp_admin_bar->remove_node('new-page');
    $wp_admin_bar->remove_node('new-media');

    // 필요하면 blog 전용 새로 추가 버튼 제공
    $wp_admin_bar->add_node([
        'id'    => 'new-blog',
        'title' => '新規追加（Blog）',
        'href'  => admin_url('post-new.php?post_type=blog'),
        'meta'  => ['class' => 'new-blog']
    ]);
}, 999);

add_action('admin_page_access_denied', function () {
    $u = wp_get_current_user();
    if (!in_array('author', (array) $u->roles, true)) return;
    wp_safe_redirect(admin_url('edit.php?post_type=blog'));
    exit;
});





function get_object_from_current_url() {
    global $wp;

    $parts = explode('/', trim($wp->request, '/'));

    if (empty($parts)) {
        return null;
    }

    $post_type = $parts[0];

    $slug = end($parts);

    $post_obj = get_page_by_path($slug, OBJECT, $post_type);

    if ($post_obj instanceof WP_Post) {
        return [
            'type' => 'post',
            'data' => $post_obj
        ];
    }

    $taxonomies = ['area'];

    foreach ($taxonomies as $tax) {
        $term = get_term_by('slug', $slug, $tax);

        if ($term instanceof WP_Term) {
            return [
                'type' => 'term',
                'taxonomy' => $tax,
                'data' => $term
            ];
        }
    }


    return null;
}





/**
 * Googleマップ 緯度経度自動保存システム
 * * [概要]
 * 店舗ページのフロントエンド（JS）で取得した最新の緯度経度を、
 * 独自テーブル「wp_shop_admin」の該当する店舗レコードに自動保存・上書きします。
 */
add_action('wp_ajax_save_mapcode_coords', 'save_mapcode_coords_callback');
add_action('wp_ajax_nopriv_save_mapcode_coords', 'save_mapcode_coords_callback');

function save_mapcode_coords_callback() {
    global $wpdb;
    
    // 保存先テーブルの定義
    $table_name = 'wp_shop_admin';

    // 送信されてきたデータの受け取りと除菌
    // shop_id: 独自テーブル上の店舗識別ID
    $shop_id = isset($_POST['shop_id']) ? intval($_POST['shop_id']) : 0;
    $lat     = isset($_POST['lat']) ? sanitize_text_field($_POST['lat']) : '';
    $lng     = isset($_POST['lng']) ? sanitize_text_field($_POST['lng']) : '';

    // shop_idが有効な場合のみ更新処理を実行
    if ($shop_id > 0) {
        
        // データベース更新実行
        // すでにデータがある場合は自動的に上書き（UPDATE）されます
        $result = $wpdb->update(
            $table_name,
            array(
                'lat' => $lat, // 緯度を更新
                'lng' => $lng  // 経度を更新
            ),
            array('shop_id' => $shop_id), // shop_idが一致する行を特定
            array('%s', '%s'),            // lat/lngは文字列型として扱う
            array('%d')                   // shop_idは数値型として扱う
        );

        // 実行結果のフィードバック
        if ($result !== false) {
            // 更新成功（変更がない場合も含む）
            echo "Success: shop_id " . $shop_id . " の座標を更新しました。";
        } else {
            // SQLエラー等の発生時
            echo "Error: データベース更新に失敗しました。 " . $wpdb->last_error;
        }
    } else {
        echo "Error: 有効な shop_id が送られていません。";
    }

    // WordPress AJAX処理の終了（必須）
    wp_die();
}



function jc_get_current_shop_by_post_name($wpdb, $post_name) {
    return $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM wp_shop_admin WHERE shop_url = %s LIMIT 1",
            $post_name
        )
    );
}

function jc_get_current_kaitori_base_path() {
    $uri = $_SERVER['REQUEST_URI'] ?? '';

    if (strpos($uri, '/kaitori/gold/') !== false) {
        return '/kaitori/gold';
    } elseif (strpos($uri, '/kaitori/tokei/rolex-top/') !== false) {
        return '/kaitori/tokei/rolex-top';
    } elseif (strpos($uri, '/kaitori/diamond/') !== false) {
        return '/kaitori/diamond';
    } elseif (strpos($uri, '/kaitori/letter-top/') !== false) {
        return '/kaitori/letter-top';
    } elseif (strpos($uri, '/kaitori/jewelry/') !== false) {
        return '/kaitori/jewelry';
    } elseif (strpos($uri, '/kaitori/brand/vuitton/') !== false) {
        return '/kaitori/brand/vuitton';
    }

    return '';
}

function jc_get_shop_area_url($shop, $base_path = '') {
    return $base_path . '/shop/' . $shop->shop_city1 . '/' . $shop->shop_city2 . '/' . $shop->shop_url . '/';
}

/**
 * 北海道・沖縄は shop_city1、
 * それ以外は shop_city2 を都道府県として扱う
 */
function jc_get_prefecture_condition($shop) {
    if ($shop->shop_city1 === 'hokkaido' || $shop->shop_city1 === 'okinawa') {
        return array(
            'field' => 'shop_city1',
            'value' => $shop->shop_city1
        );
    }

    return array(
        'field' => 'shop_city2',
        'value' => $shop->shop_city2
    );
}

/**
 * 近隣店舗5件
 * A：同一市区町村を先に取得
 * B：不足分を同一都道府県内の別市区町村から距離順で補充
 */
function jc_get_nearby_shops_with_fill($wpdb, $shop, $limit = 5) {
    $results = array();
    $exclude_ids = array((int)$shop->shop_id);

    $pref = jc_get_prefecture_condition($shop);
    $pref_field = $pref['field'];
    $pref_value = $pref['value'];

    /**
     * ロジックA：同一市区町村
     */
	$logic_a = $wpdb->get_results(
		$wpdb->prepare(
			"
			SELECT *,
				(
					6371 * ACOS(
						LEAST(1, GREATEST(-1,
							COS(RADIANS(%f))
							* COS(RADIANS(CAST(lat AS DECIMAL(10,6))))
							* COS(RADIANS(CAST(lng AS DECIMAL(10,6))) - RADIANS(%f))
							+ SIN(RADIANS(%f))
							* SIN(RADIANS(CAST(lat AS DECIMAL(10,6))))
						))
					)
				) AS distance_km
			FROM wp_shop_admin
			WHERE shop_id != %d
			  AND {$pref_field} = %s
			  AND shop_city2 = %s
			  AND lat IS NOT NULL
			  AND lat != ''
			  AND lng IS NOT NULL
			  AND lng != ''
			ORDER BY distance_km ASC
			LIMIT %d
			",
			$shop->lat,
			$shop->lng,
			$shop->lat,
			$shop->shop_id,
			$pref_value,
			$shop->shop_city2,
			$limit
		)
	);

    foreach ($logic_a as $a_shop) {
        $results[] = $a_shop;
        $exclude_ids[] = (int)$a_shop->shop_id;
    }

    if (count($results) >= $limit) {
        return array_slice($results, 0, $limit);
    }

    /**
     * ロジックB：不足分を距離順で補充
     */
    if (
        empty($shop->lat) ||
        empty($shop->lng) ||
        !is_numeric($shop->lat) ||
        !is_numeric($shop->lng)
    ) {
        return $results;
    }

    $remaining = $limit - count($results);
    $lat = (float)$shop->lat;
    $lng = (float)$shop->lng;

    $exclude_placeholders = implode(',', array_fill(0, count($exclude_ids), '%d'));

    $sql = "
        SELECT 
            *,
            (
                6371 * ACOS(
                    LEAST(1, GREATEST(-1,
                        COS(RADIANS(%f))
                        * COS(RADIANS(CAST(lat AS DECIMAL(10,6))))
                        * COS(RADIANS(CAST(lng AS DECIMAL(10,6))) - RADIANS(%f))
                        + SIN(RADIANS(%f))
                        * SIN(RADIANS(CAST(lat AS DECIMAL(10,6))))
                    ))
                )
            ) AS distance_km
        FROM wp_shop_admin
        WHERE shop_id NOT IN ({$exclude_placeholders})
          AND {$pref_field} = %s
          AND shop_city2 != %s
          AND lat IS NOT NULL
          AND lat != ''
          AND lng IS NOT NULL
          AND lng != ''
        HAVING distance_km IS NOT NULL
        ORDER BY distance_km ASC
        LIMIT %d
    ";

    $params = array_merge(
        array($lat, $lng, $lat),
        $exclude_ids,
        array($pref_value, $shop->shop_city2, $remaining)
    );

    $logic_b = $wpdb->get_results($wpdb->prepare($sql, $params));

    foreach ($logic_b as $b_shop) {
        $results[] = $b_shop;
    }

    return array_slice($results, 0, $limit);
}

/**
 * 同一都道府県の店舗一覧
 */
function jc_get_prefecture_shops($wpdb, $shop) {
    $pref = jc_get_prefecture_condition($shop);
    $pref_field = $pref['field'];
    $pref_value = $pref['value'];

    return $wpdb->get_results(
        $wpdb->prepare(
            "
            SELECT *
            FROM wp_shop_admin
            WHERE shop_id != %d
              AND {$pref_field} = %s
            ORDER BY shop_city2 ASC, shop_id DESC
            ",
            $shop->shop_id,
            $pref_value
        )
    );
}

function jc_format_tel_number($tel) {
    return str_replace(
        array('-', 'ー', '−', '―', '‐', '(', ')', '（', '）', ' ', '　'),
        '',
        $tel
    );
}


// /shop/ ページの canonical を /kaitori/gold/shop/ に向ける
add_action('wp_head', function () {

    if (!is_singular('shop')) {
        return;
    }

    $current_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (!$current_path) {
        return;
    }

    // /shop/... 以外は対象外
    if (strpos($current_path, '/shop/') !== 0) {
        return;
    }

    // /shop/kanto/tokyo/ → /kaitori/gold/shop/kanto/tokyo/
    $canonical_path = '/kaitori/gold' . $current_path;

    // 最後の / を必ず付ける
    $canonical_url = trailingslashit(home_url($canonical_path));

    echo "\n" . '<link rel="canonical" href="' . esc_url($canonical_url) . '" />' . "\n";

}, 1);


/**
 * 指定taxonomyの中で一番上位のtermを取得
 */
function get_top_parent_term($terms, $taxonomy) {
    if (empty($terms) || is_wp_error($terms)) {
        return null;
    }

    foreach ($terms as $term) {
        $ancestors = get_ancestors($term->term_id, $taxonomy);

        // 親がない = すでに最上位
        if (empty($ancestors)) {
            return $term;
        }

        // ancestorsの最後が最上位
        $top_parent_id = end($ancestors);
        $top_parent = get_term($top_parent_id, $taxonomy);

        if ($top_parent && !is_wp_error($top_parent)) {
            return $top_parent;
        }
    }

    return null;
}

/**
 * 指定taxonomyの中で一番下位のtermを取得
 */
function get_bottom_child_term($terms, $taxonomy) {
    if (empty($terms) || is_wp_error($terms)) {
        return null;
    }

    $bottom_term = null;
    $max_depth = -1;

    foreach ($terms as $term) {
        $ancestors = get_ancestors($term->term_id, $taxonomy);
        $depth = count($ancestors);

        if ($depth > $max_depth) {
            $max_depth = $depth;
            $bottom_term = $term;
        }
    }

    return $bottom_term;
}


/**
 * shop_url から wp_shop_admin の店舗情報を取得
 *
 * @param string $shop_url
 * @return object|null
 */
function get_shop_admin_by_shop_url($shop_url) {
    global $wpdb;

    $table_name = 'wp_shop_admin';

    $shop_url = trim((string) $shop_url);

    if ($shop_url === '') {
        return null;
    }

    // 末尾スラッシュあり・なし両方に対応
    $url_with_slash    = trailingslashit($shop_url);
    $url_without_slash = untrailingslashit($shop_url);

    $shop = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT *
             FROM {$table_name}
             WHERE shop_url = %s
                OR shop_url = %s
             LIMIT 1",
            $url_with_slash,
            $url_without_slash
        )
    );

    return $shop ?: null;
}
