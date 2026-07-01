


<?php
if (!function_exists('jc_footer_cache_ttl')) {
	function jc_footer_cache_ttl() {
		return defined('HOUR_IN_SECONDS') ? HOUR_IN_SECONDS : 3600;
	}
}

if (!function_exists('jc_footer_get_child_area_terms')) {
	function jc_footer_get_child_area_terms($parent_ids) {
		global $wpdb;

		static $parent_cache = array();

		$parent_ids = array_values(array_unique(array_filter(array_map('intval', (array) $parent_ids))));
		sort($parent_ids);

		if (empty($parent_ids)) {
			return array();
		}

		$missing_parent_ids = array();

		foreach ($parent_ids as $parent_id) {
			if (isset($parent_cache[$parent_id])) {
				continue;
			}

			$transient_key = 'jc_footer_area_terms_' . $parent_id;
			$cached = function_exists('get_transient') ? get_transient($transient_key) : false;

			if (false !== $cached) {
				$parent_cache[$parent_id] = $cached;
			} else {
				$missing_parent_ids[] = $parent_id;
			}
		}

		if (!empty($missing_parent_ids)) {
			$placeholders = implode(',', array_fill(0, count($missing_parent_ids), '%d'));
			$sql = "
				SELECT tt.parent, tt.term_id, tt.term_taxonomy_id, t.name, t.slug
				FROM {$wpdb->term_taxonomy} AS tt
				INNER JOIN {$wpdb->terms} AS t ON t.term_id = tt.term_id
				WHERE tt.taxonomy = 'area'
					AND tt.parent IN ({$placeholders})
				ORDER BY tt.term_taxonomy_id ASC
			";
			$prepared = call_user_func_array(array($wpdb, 'prepare'), array_merge(array($sql), $missing_parent_ids));
			$rows = $wpdb->get_results($prepared);

			foreach ($missing_parent_ids as $parent_id) {
				$parent_cache[$parent_id] = array();
			}

			foreach ((array) $rows as $row) {
				$parent_cache[(int) $row->parent][] = $row;
			}

			if (function_exists('set_transient')) {
				foreach ($missing_parent_ids as $parent_id) {
					set_transient('jc_footer_area_terms_' . $parent_id, $parent_cache[$parent_id], jc_footer_cache_ttl());
				}
			}
		}

		$terms = array();

		foreach ($parent_ids as $parent_id) {
			if (!empty($parent_cache[$parent_id])) {
				$terms = array_merge($terms, $parent_cache[$parent_id]);
			}
		}

		usort($terms, function($a, $b) {
			return (int) $a->term_taxonomy_id <=> (int) $b->term_taxonomy_id;
		});

		return $terms;
	}
}

if (!function_exists('jc_footer_get_shop_page_by_path_cached')) {
	function jc_footer_get_shop_page_by_path_cached($slug) {
		global $wpdb;

		static $posts_by_slug = null;

		$slug = (string) $slug;

		if ($slug === '') {
			return null;
		}

		if (null === $posts_by_slug) {
			$transient_key = 'jc_footer_shop_posts_by_slug';
			$posts_by_slug = function_exists('get_transient') ? get_transient($transient_key) : false;

			if (false === $posts_by_slug) {
				$posts_by_slug = array();
				$posts = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT ID, post_name FROM {$wpdb->posts} WHERE post_type = %s AND post_status NOT IN ('trash', 'auto-draft') ORDER BY ID ASC",
						'shop'
					)
				);

				foreach ((array) $posts as $shop_post) {
					if (!isset($posts_by_slug[$shop_post->post_name])) {
						$posts_by_slug[$shop_post->post_name] = (int) $shop_post->ID;
					}
				}

				if (function_exists('set_transient')) {
					set_transient($transient_key, $posts_by_slug, jc_footer_cache_ttl());
				}
			}
		}

		if (empty($posts_by_slug[$slug])) {
			return null;
		}

		return get_post($posts_by_slug[$slug]);
	}
}

if (!function_exists('jc_footer_get_shop_info_cached')) {
	function jc_footer_get_shop_info_cached($slug) {
		static $runtime_cache = array();

		$slug = (string) $slug;

		if ($slug === '') {
			return array();
		}

		if (isset($runtime_cache[$slug])) {
			return $runtime_cache[$slug];
		}

		$transient_key = 'jc_footer_shop_info_' . md5($slug);
		$cached = function_exists('get_transient') ? get_transient($transient_key) : false;

		if (false !== $cached) {
			$runtime_cache[$slug] = $cached;
			return $cached;
		}

		$shop_info = function_exists('get_shop_info') ? get_shop_info($slug) : array();

		if (function_exists('set_transient')) {
			set_transient($transient_key, $shop_info, jc_footer_cache_ttl());
		}

		$runtime_cache[$slug] = $shop_info;
		return $shop_info;
	}
}

if (!function_exists('jc_footer_is_blog_area_link_context')) {
	function jc_footer_is_blog_area_link_context() {
		$request_uri = isset($_SERVER['REQUEST_URI']) ? (string) $_SERVER['REQUEST_URI'] : '';
		$request_path = rtrim((string) parse_url($request_uri, PHP_URL_PATH), '/');

		return strpos($request_path, '/blog/') === 0 && $request_path !== '/blog';
	}
}

if (!function_exists('jc_footer_get_blog_prefecture_base_path')) {
	function jc_footer_get_blog_prefecture_base_path($category_slug = '') {
		$category_slug = sanitize_title((string) $category_slug);

		if ($category_slug !== '') {
			return '/blog/' . $category_slug . '/';
		}

		return '/blog/';
	}
}

if (!function_exists('jc_footer_get_blog_category_slug')) {
	function jc_footer_get_blog_category_slug($blog_base_path = '') {
		$candidate_paths = array(
			trim((string) parse_url((string) $blog_base_path, PHP_URL_PATH), '/'),
			trim((string) parse_url((string) (isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : ''), PHP_URL_PATH), '/'),
		);

		foreach ($candidate_paths as $path) {
			if ($path === '') {
				continue;
			}

			$segments = array_values(array_filter(explode('/', $path), 'strlen'));

			if (!isset($segments[0]) || $segments[0] !== 'blog' || empty($segments[1])) {
				continue;
			}

			return sanitize_title($segments[1]);
		}

		return '';
	}
}

if (!function_exists('jc_footer_get_blog_kaitori_base_path')) {
	function jc_footer_get_blog_kaitori_base_path($blog_base_path = '') {
		$category_slug = jc_footer_get_blog_category_slug($blog_base_path);
		$mapping = array(
			'gold' => '/kaitori/gold',
			'diamond' => '/kaitori/diamond',
			'jewelry' => '/kaitori/jewelry',
			'card' => '/kaitori/card',
			'letter-top' => '/kaitori/letter-top',
			'vuitton' => '/kaitori/brand/vuitton',
		);

		return isset($mapping[$category_slug]) ? $mapping[$category_slug] : '';
	}
}

if (!function_exists('jc_footer_get_area_link_href')) {
	function jc_footer_get_area_link_href($term, $is_blog_context = false, $blog_base_path = '/blog/') {
		if (!$is_blog_context || !is_object($term) || empty($term->slug)) {
			return 'javascript:;';
		}

		$kaitori_base_path = jc_footer_get_blog_kaitori_base_path($blog_base_path);

		if ($kaitori_base_path === '' || empty($term->parent)) {
			return '#';
		}

		$parent_term = get_term((int) $term->parent, 'area');

		if (!$parent_term || is_wp_error($parent_term) || empty($parent_term->slug)) {
			return '#';
		}

		$relative_path = trailingslashit(
			trim($kaitori_base_path, '/') . '/shop/' . $parent_term->slug . '/' . $term->slug
		);

		return home_url('/' . $relative_path);
	}
}

if (!function_exists('jc_footer_render_area_city_group')) {
	function jc_footer_render_area_city_group($parent_ids, $args = array()) {
		$defaults = array(
			'skip_term_ids' => array(),
			'label_overrides' => array(),
			'active_indexes' => array(),
			'active_term_ids' => array(),
			'line_break_every' => 0,
			'line_break_skip_term_ids' => array(),
			'separator_skip_term_ids' => array(),
			'is_blog_context' => false,
			'blog_base_path' => '/blog/',
		);

		$args = function_exists('wp_parse_args') ? wp_parse_args($args, $defaults) : array_merge($defaults, $args);
		$terms = jc_footer_get_child_area_terms($parent_ids);
		$visible_terms = array_values(array_filter($terms, function ($term) use ($args) {
			return !in_array((int) $term->term_id, $args['skip_term_ids'], true);
		}));
		$visible_count = count($visible_terms);

		foreach ($visible_terms as $index => $term) {
			$term_id = (int) $term->term_id;
			$classes = array();

			if (in_array($index, $args['active_indexes'], true) || in_array($term_id, $args['active_term_ids'], true)) {
				$classes[] = 'active-a';
			}

			$label = isset($args['label_overrides'][$term_id]) ? $args['label_overrides'][$term_id] : $term->name;

			printf(
				'<a href="%1$s" data-area="%2$d"%3$s>%4$s</a>',
				esc_url(jc_footer_get_area_link_href($term, $args['is_blog_context'], $args['blog_base_path'])),
				$term_id,
				empty($classes) ? '' : ' class="' . esc_attr(implode(' ', $classes)) . '"',
				esc_html($label)
			);

			if ($index >= $visible_count - 1) {
				continue;
			}

			$should_line_break = $args['line_break_every'] > 0
				&& (($index + 1) % $args['line_break_every'] === 0)
				&& !in_array($term_id, $args['line_break_skip_term_ids'], true);

			if ($should_line_break) {
				echo '<span class="sp-line">　|　</span><br class="only-sp" />';
				continue;
			}

			if (!in_array($term_id, $args['separator_skip_term_ids'], true)) {
				echo '<span>　|　</span>';
			}
		}
	}
}

if (!function_exists('jc_footer_get_shop_relative_permalink')) {
	function jc_footer_get_shop_relative_permalink($post_id, $category_prefix = '') {
		$post_id = (int) $post_id;

		if ($post_id <= 0) {
			return '';
		}

		$permalink = get_permalink($post_id);

		if (!$permalink) {
			return '';
		}

		if (function_exists('wp_make_link_relative')) {
			$permalink = wp_make_link_relative($permalink);
		} else {
			$path = (string) parse_url($permalink, PHP_URL_PATH);
			$query = (string) parse_url($permalink, PHP_URL_QUERY);
			$permalink = $path !== '' ? $path : $permalink;

			if ($query !== '') {
				$permalink .= '?' . $query;
			}
		}

		$category_prefix = trim((string) $category_prefix);

		if ($category_prefix !== '') {
			$permalink = untrailingslashit($category_prefix) . $permalink;
		}

		return $permalink;
	}
}

if (!function_exists('jc_footer_get_shop_area_heading_term')) {
	function jc_footer_get_shop_area_heading_term($post_id) {
		$area_terms = get_the_terms((int) $post_id, 'area');

		if (empty($area_terms) || is_wp_error($area_terms)) {
			return null;
		}

		$area_terms = array_values($area_terms);
		$primary_term = $area_terms[0] ?? null;
		$secondary_term = $area_terms[1] ?? null;

		if ($secondary_term && isset($secondary_term->parent) && (int) $secondary_term->parent < 1) {
			return $primary_term ?: $secondary_term;
		}

		return $secondary_term ?: $primary_term;
	}
}

if (!function_exists('jc_footer_get_shop_card_data')) {
	function jc_footer_get_shop_card_data($term, $category_prefix = '') {
		if (!is_object($term) || empty($term->slug)) {
			return null;
		}

		$shop_post = jc_footer_get_shop_page_by_path_cached($term->slug);

		if (!$shop_post || empty($shop_post->ID)) {
			return null;
		}

		$shop_info = jc_footer_get_shop_info_cached($term->slug);
		$shop_row = is_array($shop_info) && isset($shop_info[0]) ? $shop_info[0] : null;

		return array(
			'name' => (string) $term->name,
			'heading_term' => jc_footer_get_shop_area_heading_term($shop_post->ID),
			'permalink' => jc_footer_get_shop_relative_permalink($shop_post->ID, $category_prefix),
			'address' => $shop_row && isset($shop_row->shop_add) ? (string) $shop_row->shop_add : '',
			'tel' => $shop_row && isset($shop_row->shop_tel) ? (string) $shop_row->shop_tel : '',
		);
	}
}

if (!function_exists('jc_footer_get_shop_tel_link_html')) {
	function jc_footer_get_shop_tel_link_html($tel) {
		$tel = trim((string) $tel);

		if ($tel === '') {
			return '<a href="javascript:;" class="ftshop_tel"></a>';
		}

		return sprintf(
			'<a href="tel:%1$s" class="ftshop_tel">TEL %2$s</a>',
			esc_attr($tel),
			esc_html($tel)
		);
	}
}

if (!function_exists('jc_footer_render_shop_card')) {
	function jc_footer_render_shop_card($card_data) {
		if (empty($card_data['name']) || empty($card_data['permalink'])) {
			return;
		}

		$button_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="18.077" height="15.869" viewBox="0 0 18.077 15.869"><path id="パス_1" data-name="パス 1" d="M2.7,9.472H9.2v4.909H2.7Zm13.91-1.488h0ZM2.232,4.464H15.846l.768,3.521H1.463ZM1.091,2.976,0,7.985V9.472H1.216v6.4h9.473v-6.4h4.686v6.4h1.488v-6.4h1.215V7.985L16.986,2.976Zm0-1.488h15.92V0H1.091Z" transform="translate(0 -0.001)" fill="#c70000"/></svg>';

		printf(
			'<div class="ftshop_list" data-name="%1$s"><h4 class="ftshop_name">ジュエルカフェ %2$s</h4><div class="ftshop_add">%3$s</div><div class="ftshop_info">%4$s<a href="%5$s" class="ftshop_btn">%6$s店舗詳細ページへ</a></div></div>',
			esc_attr($card_data['name']),
			esc_html($card_data['name']),
			wp_kses_post($card_data['address']),
			jc_footer_get_shop_tel_link_html($card_data['tel']),
			esc_url($card_data['permalink']),
			$button_icon
		);
	}
}

if (!function_exists('jc_footer_render_prefecture_shop_cards')) {
	function jc_footer_render_prefecture_shop_cards($area_parent_id, $category_prefix = '', $render_heading = true) {
		$rows = jc_footer_get_child_area_terms((int) $area_parent_id);
		$has_heading = false;

		foreach ($rows as $row) {
			$card_data = jc_footer_get_shop_card_data($row, $category_prefix);

			if (!$card_data) {
				continue;
			}

			if ($render_heading && !$has_heading && !empty($card_data['heading_term']->name)) {
				echo '<h3 class="d-n">' . esc_html($card_data['heading_term']->name) . '</h3>';
				$has_heading = true;
			}

			jc_footer_render_shop_card($card_data);
		}
	}
}
?>

<div id="drawernav" class="hidden-md hidden-lg">
<!--
              <div class="drawer-fixed"><p class="color-red bold top_title">かんたんMENU</p></div>
-->
              <div class="drawer-ttl mb-12">
                <h3 class="bg-pink2 bold color-red ptb-8 ta-c base-font-size">お近くのジュエルカフェを探す</h3>
              </div>


              <!-- flex_box start -->
              <div class="flex_box">
                <div class="api_current_location_button sidebar">
                  <a href="<?php echo esc_url(home_url('/shop_map/')); ?>" target="_blank" class="bold" style="line-height: normal;">現在地から探す</a>
                  <a href="<?php echo esc_url(home_url('/shop_map/')); ?>" target="_blank" class="only-pc">
                    <img class="thum" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/api_current_location_thum.jpg">
                  </a>
                </div>

                <div class="search_prefectures_outer mb-16">
                  <p class="bold ta-c">都道府県から探す</p>
                  <section id="select-tel">




					<?php
					
						global $parent_term_slug;
						

						
						$ex1_city = '';
						
						if(	strpos($_SERVER['REQUEST_URI'],'/kaitori/gold/') !== false || $parent_term_slug == 'gold' ){
							
							$ex1_city = '/kaitori/gold';
						
						}else if(	strpos($_SERVER['REQUEST_URI'],'/kaitori/tokei/rolex-top/') !== false ){
						
							$ex1_city = '/kaitori/tokei/rolex-top';
						
						}else if(	strpos($_SERVER['REQUEST_URI'],'/kaitori/diamond/') !== false ){
							
							$ex1_city = '/kaitori/diamond';
						
						}else if(	strpos($_SERVER['REQUEST_URI'],'/kaitori/letter-top/') !== false ){
							
							$ex1_city = '/kaitori/letter-top';
						
						}else if(	strpos($_SERVER['REQUEST_URI'],'/kaitori/jewelry/') !== false ){
							
							$ex1_city = '/kaitori/jewelry';
							
						}else if(	strpos($_SERVER['REQUEST_URI'],'/kaitori/card/') !== false ){
							
							$ex1_city = '/kaitori/card';
						
						}else if(	strpos($_SERVER['REQUEST_URI'],'/kaitori/brand/vuitton/') !== false ){
							
							$ex1_city = '/kaitori/brand/vuitton';
						
						}
						
					?>
					
                    <div class="ex1-city-category-outer">
                      <select id="ex1-city-category">
                        <option value="">エリア</option>
                        <option value="<?php echo $ex1_city;?>/shop/hokkaido">北海道エリア</option>
                        <option value="tohoku">東北エリア</option>
                        <option value="kanto">関東エリア</option>
                        <option value="chubu">中部エリア</option>
                        <option value="hokuriku">北陸エリア</option>
                        <option value="kansai">関西エリア</option>
                        <option value="chugoku">中国エリア</option>
                        <option value="shikoku">四国エリア</option>
                        <option value="kyusyu">九州エリア</option>
                        <option value="<?php echo $ex1_city;?>/shop/okinawa">沖縄エリア</option>
                      </select>
                    </div>
					

                    <div class="ex1-city-outer">
                      <select id="ex1-city">
                        <option value="" >−−−</option>
                        <option value="<?php echo $ex1_city;?>/shop/hokkaido/douou/" data-ex1-city-category="hokkaido">北海道</option>
                        <option value="<?php echo $ex1_city;?>/shop/tohoku/aomori/" data-ex1-city-category="tohoku">青森県</option>
                        <option value="<?php echo $ex1_city;?>/shop/tohoku/iwate/" data-ex1-city-category="tohoku">岩手県</option>
                        <option value="<?php echo $ex1_city;?>/shop/tohoku/miyagi/" data-ex1-city-category="tohoku">宮城県</option>
                        <option value="<?php echo $ex1_city;?>/shop/tohoku/akita/" data-ex1-city-category="tohoku">秋田県</option>
                        <option value="<?php echo $ex1_city;?>/shop/tohoku/yamagata/" data-ex1-city-category="tohoku">山形県</option>
                        <option value="<?php echo $ex1_city;?>/shop/tohoku/fukushima/" data-ex1-city-category="tohoku">福島県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kanto/tokyo/" data-ex1-city-category="kanto">東京都</option>
                        <option value="<?php echo $ex1_city;?>/shop/kanto/kanagawa/" data-ex1-city-category="kanto">神奈川県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kanto/saitama/" data-ex1-city-category="kanto">埼玉県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kanto/chiba/" data-ex1-city-category="kanto">千葉県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kanto/ibaraki/" data-ex1-city-category="kanto">茨城県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kanto/gunma/" data-ex1-city-category="kanto">群馬県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kanto/tochigi/" data-ex1-city-category="kanto">栃木県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kanto/yamanashi/" data-ex1-city-category="kanto">山梨県</option>
                        <option value="<?php echo $ex1_city;?>/shop/chubu/mie/" data-ex1-city-category="chubu">三重県</option>
                        <option value="<?php echo $ex1_city;?>/shop/chubu/nagano/" data-ex1-city-category="chubu">長野県</option>
                        <option value="<?php echo $ex1_city;?>/shop/chubu/shizuoka/" data-ex1-city-category="chubu">静岡県</option>
                        <option value="<?php echo $ex1_city;?>/shop/chubu/gifu/" data-ex1-city-category="chubu">岐阜県</option>
                        <option value="<?php echo $ex1_city;?>/shop/chubu/aichi/" data-ex1-city-category="chubu">愛知県</option>
                        <option value="<?php echo $ex1_city;?>/shop/hokuriku/niigata/" data-ex1-city-category="hokuriku">新潟県</option>
                        <option value="<?php echo $ex1_city;?>/shop/hokuriku/fukui/" data-ex1-city-category="hokuriku">福井県</option>
                        <option value="<?php echo $ex1_city;?>/shop/hokuriku/ishikawa/" data-ex1-city-category="hokuriku">石川県</option>
                        <option value="<?php echo $ex1_city;?>/shop/hokuriku/toyama/" data-ex1-city-category="hokuriku">富山県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kansai/kyoto/" data-ex1-city-category="kansai">京都府</option>
                        <option value="<?php echo $ex1_city;?>/shop/kansai/hyogo/" data-ex1-city-category="kansai">兵庫県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kansai/osaka/" data-ex1-city-category="kansai">大阪府</option>
                        <option value="<?php echo $ex1_city;?>/shop/kansai/nara/" data-ex1-city-category="kansai">奈良県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kansai/shiga/" data-ex1-city-category="kansai">滋賀県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kansai/wakayama/" data-ex1-city-category="kansai">和歌山県</option>
                        <option value="<?php echo $ex1_city;?>/shop/chugoku/yamaguchi/" data-ex1-city-category="chugoku">山口県</option>
                        <option value="<?php echo $ex1_city;?>/shop/chugoku/okayama/" data-ex1-city-category="chugoku">岡山県</option>
                        <option value="<?php echo $ex1_city;?>/shop/chugoku/shimane/" data-ex1-city-category="chugoku">島根県</option>
                        <option value="<?php echo $ex1_city;?>/shop/chugoku/hiroshima/" data-ex1-city-category="chugoku">広島県</option>
                        <option value="<?php echo $ex1_city;?>/shop/chugoku/tottori/" data-ex1-city-category="chugoku">鳥取県</option>
                        <option value="<?php echo $ex1_city;?>/shop/shikoku/tokushima/" data-ex1-city-category="shikoku">徳島県</option>
                        <option value="<?php echo $ex1_city;?>/shop/shikoku/ehime/" data-ex1-city-category="shikoku">愛媛県</option>
                        <option value="<?php echo $ex1_city;?>/shop/shikoku/kagawa/" data-ex1-city-category="shikoku">香川県</option>
                        <option value="<?php echo $ex1_city;?>/shop/shikoku/kouchi/" data-ex1-city-category="shikoku">高知県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kyusyu/fukuoka/" data-ex1-city-category="kyusyu">福岡県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kyusyu/saga/" data-ex1-city-category="kyusyu">佐賀県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kyusyu/nagasaki/" data-ex1-city-category="kyusyu">長崎県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kyusyu/kumamoto/" data-ex1-city-category="kyusyu">熊本県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kyusyu/oita/" data-ex1-city-category="kyusyu">大分県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kyusyu/kagoshima/" data-ex1-city-category="kyusyu">鹿児島県</option>
                        <option value="<?php echo $ex1_city;?>/shop/kyusyu/miyazaki/" data-ex1-city-category="kyusyu">宮崎県</option>
                        <option value="<?php echo $ex1_city;?>/shop/okinawa/honto/" data-ex1-city-category="okinawa">沖縄</option>
                      </select>
                    </div>
                  </section>
                </div>
              </div>
              <!-- flex_box end -->





        <div class="drawer-ttl mt-24">
          <h3 class="bg-pink2 bold color-red ptb-8 ta-c base-font-size">選べる3つの買取方法</h3>
        </div>
        <ul class="border-col-3 m-12">
          <li class="bg-white">
            <a href="<?php echo esc_url(home_url('/shop-buy/')); ?>" class="border-col-item">
              <div class="drawer-icon mb-4">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/drawer-icon-01.svg" alt="" width="28" height="27">
              </div>店頭買取
            </a>
          </li>
          <li class="bg-white">
            <a href="<?php echo esc_url(home_url('/delivery-buy/')); ?>" class="border-col-item">
              <div class="drawer-icon mb-4">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/drawer-icon-02.svg" alt="" width="24" height="27">
              </div>宅配買取
            </a>
          </li>
          <li class="bg-white">
            <a href="<?php echo esc_url(home_url('/trip-buy/')); ?>" class="border-col-item">
              <div class="drawer-icon mb-4">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/drawer-icon-03.svg" alt="" width="29" height="27">
              </div>出張買取
            </a>
          </li>
        </ul>


	<?php

		if ( (strpos($_SERVER['REQUEST_URI'], '/shop/') !== false && strpos($_SERVER['REQUEST_URI'], 'rolex-') !== false)  || (strpos($_SERVER['REQUEST_URI'], '/shop/') !== false && strpos($_SERVER['REQUEST_URI'], 'tokei-repair-') !== false) ) {
					
			$post_name_arr = explode( '/',$_SERVER['REQUEST_URI'] );
		
			$post_post_name = str_replace('rolex-','',$post_name_arr[count($post_name_arr)-2]);
			
			$post_post_name = str_replace('tokei-repair-','',$post_post_name);


		}else{
			
			$post_post_name = $post->post_name;
			
		}

	?>




			  
			  
			  <?php
			  
				if( $post->post_type == 'kaitori' && $post->post_title ) : 
				
				
					$category_parent_id = ($post->post_parent == 0) ? $post->ID : $post->post_parent;

					

					
					
					if (strpos($_SERVER['REQUEST_URI'], '/shop/') !== false) {


						
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
			

						
						if( get_post($post->post_parent) -> post_name == 'shop'){

						
						$category_link = $topmost_parent->post_name;

						


						echo '<div class="drawer-ttl mt-20">
						<a href="/kaitori/<?php echo $category_link;?>/">
						<h3 class="bg-pink2 bold color-red ptb-8 ta-c base-font-size">'.$post->post_title.'の'.$topmost_parent->post_title.'買取ならジュエルカフェ</h3>
						</a>
						</div><ul class="drawer-column-2">
						';

							$shop_args = array(
								'post_type' => 'shop',
								'tax_query' => array(
									array(
										'taxonomy' => 'area',
										'field' => 'slug',
										'terms' => $post->post_name,
									),
								),
								 'post_parent' => 0,
								 'posts_per_page' => -1,
							);

							$the_query = new WP_Query($shop_args); if($the_query->have_posts()):
						
							while($the_query->have_posts()): $the_query->the_post();
											
							echo '<li><a href="#" class=""><h4>'.get_the_title().'</h4></a></li>';			
		
							endwhile;
							wp_reset_postdata();
							endif;

							echo '</ul>';

						}


						$category_parent_id = $topmost_parent_id;
					
					}				
					
					
					
					

					$args = array(
						'post_type' => 'kaitori',
						'post_parent' => $category_parent_id,
						'posts_per_page' => -1,
						'post__not_in' => array( 87115 ), // 金相場
					);
						
					$parent_post = get_post($category_parent_id);


					$category_link = $parent_post->post_name;

					
			  ?>
		


		<?php
			// 現在のリクエストURIを取得
			$request_uri = $_SERVER['REQUEST_URI'];
			// URIを'/'で分割して、最後のセグメントを取得
			$uri_segments = explode('/', trim($request_uri, '/'));
			$last_segment = end($uri_segments);
		?>
		
		
		
		
		
		<?php if ($last_segment !== 'kaitori'):?>
			<div class="drawer-ttl mt-20">
				<a href="/kaitori/<?php echo $category_link;?>/">
					<div class="bg-pink2 bold color-red ptb-8 ta-c base-font-size">買取強化中の<?php echo $parent_post->post_title;?></div>
				</a>
			</div>
			<ul class="drawer-column-2">
				<?php

					$city_data = array(
					'hokkaido', 'aomori', 'iwate', 'miyagi', 'akita', 'yamagata', 'fukushima', 
					'ibaraki', 'tochigi', 'gunma', 'saitama', 'chiba', 'tokyo', 'kanagawa', 
					'niigata', 'toyama', 'ishikawa', 'fukui', 'yamanashi', 'nagano', 'gifu', 
					'shizuoka', 'aichi', 'mie', 'shiga', 'kyoto', 'osaka', 'hyogo', 'nara', 
					'wakayama', 'tottori', 'shimane', 'okayama', 'hiroshima', 'yamaguchi', 
					'tokushima', 'kagawa', 'ehime', 'kouchi', 'fukuoka', 'saga', 'nagasaki', 
					'kumamoto', 'oita', 'miyazaki', 'kagoshima', 'okinawa','souba'
					);


					$query = new WP_Query($args);

					if ($query->have_posts()) {
						foreach ($query->posts as $post2) {
						setup_postdata($post2);
							
							if ( $post2->post_name == 'shop' ) { continue; }
							
								if ( !empty($parent_post->post_parent) && $parent_post->post_parent > 0 ) {

									$grand_parent_id = $parent_post->post_parent;

									$grand_parent = get_post($grand_parent_id);

									$grand_parent_slug = $grand_parent->post_name.'/';

								}else{
									
									$grand_parent_slug = '';
									
								}
								
					

							
							if (in_array($post2->post_name, $city_data)) { continue; }
				
							echo '<li><a href="/kaitori/'.$grand_parent_slug.$category_link.'/'.$post2->post_name.'/" class=""><div>'.$post2->post_title.'買取</div></a></li>';
					
			
						}
						
						wp_reset_postdata();
					}

					wp_reset_postdata();
					
				?>
			</ul>
				
		<?php endif;?>
		


		<?php
          endif;
        ?>




		<?php


		if( $parent_term_slug == 'gold'){
		
			$category_parent_id = 3198;

			$args = array(
				'post_type' => 'kaitori',
				'post_parent' => $category_parent_id,
				'posts_per_page' => -1,
				'post__not_in' => array( 87115 ), // 金相場
			);

			$parent_post = get_post($category_parent_id);

			$category_link = $parent_post->post_name;

		?>


			<div class="drawer-ttl mt-20">
				<a href="/kaitori/<?php echo $category_link;?>/">
					<div class="bg-pink2 bold color-red ptb-8 ta-c base-font-size">買取強化中の<?php echo $parent_post->post_title;?></div>
				</a>
			</div>
			<ul class="drawer-column-2">
				<?php

					$city_data = array(
					'hokkaido', 'aomori', 'iwate', 'miyagi', 'akita', 'yamagata', 'fukushima', 
					'ibaraki', 'tochigi', 'gunma', 'saitama', 'chiba', 'tokyo', 'kanagawa', 
					'niigata', 'toyama', 'ishikawa', 'fukui', 'yamanashi', 'nagano', 'gifu', 
					'shizuoka', 'aichi', 'mie', 'shiga', 'kyoto', 'osaka', 'hyogo', 'nara', 
					'wakayama', 'tottori', 'shimane', 'okayama', 'hiroshima', 'yamaguchi', 
					'tokushima', 'kagawa', 'ehime', 'kouchi', 'fukuoka', 'saga', 'nagasaki', 
					'kumamoto', 'oita', 'miyazaki', 'kagoshima', 'okinawa','souba'
					);


					$query = new WP_Query($args);

					if ($query->have_posts()) {
						foreach ($query->posts as $post2) {
						setup_postdata($post2);
							
							if ( $post2->post_name == 'shop' ) { continue; }
							
								if ( !empty($parent_post->post_parent) && $parent_post->post_parent > 0 ) {

									$grand_parent_id = $parent_post->post_parent;

									$grand_parent = get_post($grand_parent_id);

									$grand_parent_slug = $grand_parent->post_name.'/';

								}else{
									
									$grand_parent_slug = '';
									
								}
								
					

							
							if (in_array($post2->post_name, $city_data)) { continue; }
				
							echo '<li><a href="/kaitori/'.$grand_parent_slug.$category_link.'/'.$post2->post_name.'/" class=""><div>'.$post2->post_title.'買取</div></a></li>';
					
			
						}
						
						wp_reset_postdata();
					}

					wp_reset_postdata();
					
				?>
			</ul>

        <?php

			}
		?>




        <div class="drawer-ttl mt-20">
          <div class="bg-pink2 bold color-red ptb-8 ta-c base-font-size">買取強化中ブランド</div>
        </div>
        <ul class="drawer-column-2">
          <li><a href="<?php echo esc_url(home_url('/kaitori/brand/vuitton/')); ?>" class=""><div>ルイヴィトン</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/brand/chanel/')); ?>" class=""><div>シャネル</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/brand/hermes/')); ?>" class=""><div>エルメス</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/brand/gucci/')); ?>" class=""><div>グッチ</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/brand/coach/')); ?>" class=""><div>コーチ</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/brand/prada/')); ?>" class=""><div>プラダ</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/brand/cartier/')); ?>" class=""><div>カルティエ</div></a></li>
          <li><a href="<?php echo esc_url(home_url('kaitori/brand/bvlgari/')); ?>" class=""><div>ブルガリ</div></a></li>
          <li><a href="<?php echo esc_url(home_url('kaitori/brand/tiffany/')); ?>" class=""><div>ティファニー</div></a></li>
          <li><a href="<?php echo esc_url(home_url('kaitori/brand/dior/')); ?>" class=""><div>ディオール</div></a></li>
          <li><a href="<?php echo esc_url(home_url('kaitori/tokei/rolex-top/')); ?>" class=""><div>ロレックス</div></a></li>
          <li><a href="<?php echo esc_url(home_url('kaitori/tokei/omega/')); ?>" class=""><div>オメガ</div></a></li>
        </ul>
  
        <div class="drawer-ttl">
          <div class="bg-pink2 bold color-red ptb-8 ta-c base-font-size">品目別買取専門サイト</div>
        </div>
        <ul class="drawer-column-2">
          <li><a href="<?php echo esc_url(home_url('/kaitori/gold/')); ?>" class=""><div>金買取</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/diamond/')); ?>" class=""><div>ダイヤモンド買取</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/jewelry/')); ?>" class=""><div>宝石買取</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/tokei/')); ?>" class=""><div>時計買取</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/brand/')); ?>" class=""><div>ブランド品買取</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/letter-top/')); ?>" class=""><div>切手買取</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/card/')); ?>" class=""><div>金券買取</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/kottou/')); ?>" class=""><div>遺品・生前整理買取</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/cosme/')); ?>" class=""><div>化粧品買取</div></a></li>
          <li><a href="<?php echo esc_url(home_url('/kaitori/osake/')); ?>" class=""><div>お酒買取</div></a></li>
        </ul>
        <div class="drawer-ttl">
          <p class="bg-pink2 bold color-red ptb-8 ta-c base-font-size">店舗スタッフ募集中</p>
        </div>
        <div class="job m-12">
          <a href="<?php echo esc_url(home_url('/job/')); ?>" target="_blank" class="ta-c"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/staff_recruit2.jpg">ジュエルカフェ採用サイトはこちら</a>
        </div>
        <div class="drawer-ttl">
          <h3 class="bg-pink2 bold color-red ptb-8 ta-c base-font-size mt-20">ジュエルカフェについて</h3>
        </div>
        <ul class="drawer-column-2 mb-24">
			<li><a href="<?php echo esc_url(home_url('/shop/')); ?>" class=""><h4>店舗案内</h4></a></li>
			<li><a href="<?php echo esc_url(home_url('/blog/')); ?>" class=""><h4>買取実績</h4></a></li>
			<li><a href="<?php echo esc_url(home_url('/first/')); ?>" class=""><h4>初めての方へ</h4></a></li>
			<li><a href="<?php echo esc_url(home_url('/qa/')); ?>" class=""><h4>よくある質問</h4></a></li>
			<li><a href="<?php echo esc_url(home_url('/media/')); ?>" class=""><h4>CM・メディア掲載</h4></a></li>
			<li><a href="<?php echo esc_url(home_url('/jewel-guma/')); ?>" class="" target="_blank"><h4>ジュエルぐまのご紹介！</h4></a></li>
			<li><a href="<?php echo esc_url(home_url('/column/')); ?>"><h4>コラム</h4></a></li>
			<li><a href="<?php echo esc_url(home_url('/company/')); ?>"><h4>運営会社</h4></a></li>
			<li><a href="<?php echo esc_url(home_url('/property/')); ?>"><h4>店舗物件募集</h4></a></li>
			<li><a href="<?php echo esc_url(home_url('/privacy/')); ?>" class=""><h4>個人情報保護方針</h4></a></li>
			<li><a href="<?php echo esc_url(home_url('/declaration/')); ?>" class=""><h4>反社会的勢力排除宣言</h4></a></li>
        </ul>
        <!-- ドロワーナビ -->
				
        <div class="d-f jc-c mb-80">
          <div class="mr-10">
            <a href="https://www.instagram.com/jewelcafe.jp/" target="_blank">
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/jewelcafe_insta.png" alt="" style="width:35px;" height="35" >
            </a>
          </div>
          <div class="mr-10">
            <a href="https://twitter.com/Jewel_Cafe" target="_blank">
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/jewelcafe_x.png" alt="" style="width:35px;" height="35" >
            </a>
          </div>
		  <?php /* ?>
          <div class="mr-10">
            <a href="https://jewel-cafe.jp/about-line/">
              <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/jewelcafe_line.png" alt="" style="width:35px;" height="35" >
            </a>
          </div>
		  <?php */ ?>
        </div>
				
				
      </div>




	
	<link rel="stylesheet" href="/wp-content/themes/jewelcafe_replace/assets/css/footer.css"/>
	
	
	
	
	<footer id="footer">
		<div class="section-inner">
		
			
			<a href="/job/" class="result-btn-a lts0 color-white bold"> 
				<div class="result-btn"> 
					ジュエルカフェでは<br class="only-sp"/>店舗スタッフを<br class="only-sp"/>大募集しています!
				</div>
			</a>
	
	

<?php

global $wpdb;

$japan_shop_count = $wpdb->get_var("
    SELECT COUNT(*)
    FROM {$wpdb->prefix}shop_admin where shop_pre_open != '1'
");

?>


	<h2 class="ft-shop-title">ジュエルカフェ <br class="sp"><mark>ただいま日本全国<span class="big"><?php echo $japan_shop_count;?></span>店舗</mark></h2>
	<p class="shop-list-lead ta-c bold mb-20">有名ショッピングセンターや駅近商店街など、<br class="sp">あなたの街のジュエルカフェでお待ちしています!</p>





<?php if(is_single('gold') || is_single('souba') || is_single('k18') || is_single('souba') || is_single('vuitton') || is_single('letter-top') || is_single('rolex-top') || is_single('diamond') || is_single('jewelry') || is_single('card')): ?>

<?php 

	if(is_single('souba') && get_post($post->post_parent)->post_name == 'rolex-top'){
		$category = '/kaitori/tokei/rolex-top';
	}else if(is_single('souba') && get_post($post->post_parent)->post_name == 'chanel'){
		$category = '';
	}else if(is_single('souba') && get_post($post->post_parent)->post_name == 'vuitton'){
		$category = '/kaitori/brand/vuitton';
	}else if(is_single('souba') && get_post($post->post_parent)->post_name == 'gold'){
		$category = '/kaitori/gold';
	}else if (is_single('gold') || is_single('k18') ) {
		$category = '/kaitori/gold';
	} elseif (is_single('vuitton')) {
		$category = '/kaitori/brand/vuitton';
	} elseif (is_single('letter-top')) {
		$category = '/kaitori/letter-top';
	} elseif (is_single('rolex-top')) {
		$category = '/kaitori/tokei/rolex-top';
	} elseif (is_single('diamond')) {
		$category = '/kaitori/diamond';
	} elseif (is_single('jewelry')) {
		$category = '/kaitori/jewelry';
	} elseif (is_single('card')) {
		$category = '/kaitori/card';
	} else {
	}
	

?>

	<section class="kaitori-kinds mt-20">
		<div class="section-inner kaitori-kinds-list-wrap">
			<h3 class="area base-font-size">北海道/東北</h3>
			<ul class="kaitori-kinds-list column9 type2">
				<li>
					<a href="<?php echo $category; ?>/shop/hokkaido/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">北海道</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/tohoku/aomori/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">青森県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/tohoku/iwate/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">岩手県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/tohoku/miyagi/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">宮城県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/tohoku/akita/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">秋田県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/tohoku/yamagata/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">山形県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/tohoku/fukushima/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">福島県</div>
						</div>
					</a>
				</li>
			</ul>

			<h3 class="area base-font-size">関東</h3>
			<ul class="kaitori-kinds-list column9 type2">
				<li>
					<a href="<?php echo $category; ?>/shop/kanto/ibaraki/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">茨城県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kanto/tochigi/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">栃木県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kanto/gunma/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">群馬県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kanto/saitama/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">埼玉県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kanto/chiba/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">千葉県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kanto/tokyo/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">東京都</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kanto/kanagawa/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">神奈川県</div>
						</div>
					</a>
				</li>
			</ul>

			<h3 class="area base-font-size">中部・北陸</h3>
			<ul class="kaitori-kinds-list column9 type2">
				<li>
					<a href="<?php echo $category; ?>/shop/kanto/yamanashi/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">山梨県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/chubu/nagano/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">長野県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/hokuriku/niigata/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">新潟県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/hokuriku/toyama/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">富山県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/hokuriku/ishikawa/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">石川県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/hokuriku/fukui/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">福井県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/chubu/gifu/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">岐阜県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/chubu/shizuoka/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">静岡県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/chubu/aichi/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">愛知県</div>
						</div>
					</a>
				</li>
			</ul>

			<h3 class="area base-font-size">関西</h3>
			<ul class="kaitori-kinds-list column9 type2">
				<li>
					<a href="<?php echo $category; ?>/shop/chubu/mie/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">三重県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kansai/shiga/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">滋賀県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kansai/kyoto/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">京都府</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kansai/osaka/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">大阪府</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kansai/hyogo/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">兵庫県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kansai/nara/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">奈良県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kansai/wakayama/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">和歌山県</div>
						</div>
					</a>
				</li>
			</ul>

			<h3 class="area base-font-size">中国・四国</h3>
			<ul class="kaitori-kinds-list column9 type2">
				<li>
					<a href="<?php echo $category; ?>/shop/chugoku/tottori/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">鳥取県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/chugoku/shimane/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">島根県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/chugoku/okayama/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">岡山県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/chugoku/hiroshima/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">広島県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/chugoku/yamaguchi/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">山口県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/shikoku/tokushima/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">徳島県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/shikoku/kagawa/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">香川県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/shikoku/ehime/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">愛媛県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/shikoku/kouchi/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">高知県</div>
						</div>
					</a>
				</li>
			</ul>

			<h3 class="area base-font-size">九州・沖縄</h3>
			<ul class="kaitori-kinds-list column9 type2">
				<li>
					<a href="<?php echo $category; ?>/shop/kyusyu/fukuoka/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">福岡県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kyusyu/saga/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">佐賀県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kyusyu/nagasaki/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">長崎県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kyusyu/kumamoto/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">熊本県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kyusyu/oita/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">大分県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kyusyu/miyazaki/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">宮崎県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/kyusyu/kagoshima/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">鹿児島県</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo $category; ?>/shop/okinawa/">
						<div class="kaitori-kinds-label ta-c">
							<div style="font-weight:bold;" class="base-font-size">沖縄県</div>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</section>
<?php endif;?>




<?php
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$segments = explode('/', $uri);

?>


<?php if(!(is_single('gold')) && !(is_single('souba')) && !(is_single('vuitton')) && !(is_single('letter-top')) && !(is_single('k18')) && !(is_single('rolex-top')) && !(is_single('diamond')) && !(is_single('jewelry')) && !(is_single('card'))): ?>


<?php
	if( $post->post_type == 'shop' && count($segments) >= 3 ) { }else{

	$footer_area_tab_labels = array('北海道', '東北', '関東', '中部･北陸', '関西', '中国･四国', '九州', '沖縄');
	$footer_current_post_name = isset($post->post_name) ? $post->post_name : '';
	$footer_is_blog_context = jc_footer_is_blog_area_link_context();
	$footer_blog_category_slug = '';

	if (isset($parent_post) && !empty($parent_post->post_name)) {
		$footer_blog_category_slug = $parent_post->post_name;
	} elseif (isset($category_link) && $category_link !== '') {
		$footer_blog_category_slug = $category_link;
	}

	$footer_blog_base_path = jc_footer_get_blog_prefecture_base_path($footer_blog_category_slug);
	$footer_area_groups = array(
		array(
			'parent_ids' => 357,
			'options' => array(
				'label_overrides' => array(504 => '北海道'),
			),
		),
		array(
			'parent_ids' => 359,
			'options' => array(
				'skip_term_ids' => array(552, 553),
			),
		),
		array(
			'parent_ids' => 5,
			'options' => array(
				'active_indexes' => $footer_current_post_name !== 'tokei-repair-matsuegakuendori' ? array(0) : array(),
				'line_break_every' => 4,
			),
		),
		array(
			'parent_ids' => array(370, 556),
			'options' => array(
				'skip_term_ids' => array(555),
				'line_break_every' => 4,
				'line_break_skip_term_ids' => array(403),
			),
		),
		array(
			'parent_ids' => 339,
			'options' => array(
				'line_break_every' => 4,
			),
		),
		array(
			'parent_ids' => array(406, 557),
			'options' => array(
				'active_indexes' => $footer_current_post_name === 'tokei-repair-matsuegakuendori' ? array(2) : array(),
				'line_break_every' => 4,
			),
		),
		array(
			'parent_ids' => 438,
			'options' => array(
				'line_break_every' => 4,
			),
		),
		array(
			'parent_ids' => 237,
			'options' => array(
				'label_overrides' => array(240 => '沖縄'),
			),
		),
	);
?>

	<div class="area_tab">
		<ul class="d-f ai-c ft-area-list">
			<?php foreach ($footer_area_tab_labels as $area_index => $area_label) : ?>
				<li><a href="javascript:;" data-area="<?php echo esc_attr($area_index); ?>"><?php echo esc_html($area_label); ?></a></li>
			<?php endforeach; ?>
		</ul>
		<div class="area-city">
			<?php foreach ($footer_area_groups as $group) : ?>
				<div class="area-city2">
					<?php
					jc_footer_render_area_city_group(
						$group['parent_ids'],
						array_merge(
							$group['options'],
							array(
								'is_blog_context' => $footer_is_blog_context,
								'blog_base_path' => $footer_blog_base_path,
							)
						)
					);
					?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>


	
	<?php if (!$footer_is_blog_context) : ?>
	<div class="active-city" style="display:none;"></div>


	<div class="area-wrapper">
		<?php
			$footer_area_shop_groups = array(
				array(504),
				array(360, 362, 365, 367, 552, 553),
				array(6, 261, 293, 305, 319, 325, 329, 336),
				array(371, 379, 382, 384, 392, 395, 397, 403, 555),
				array(340, 346, 349, 352, 354, 554),
				array(407, 416, 422, 427, 434, 526, 532, 537, 544),
				array(439, 451, 455, 458, 465, 473, 475),
				array(240),
			);
			$footer_category_prefix = isset($ex1_city) ? (string) $ex1_city : '';
			$footer_all_area_term_ids = array();

			foreach ($footer_area_shop_groups as $footer_area_term_ids) {
				$footer_all_area_term_ids = array_merge($footer_all_area_term_ids, $footer_area_term_ids);
			}

			jc_footer_get_child_area_terms($footer_all_area_term_ids);
		?>

		<?php foreach ($footer_area_shop_groups as $footer_area_term_ids) : ?>
			<?php foreach ($footer_area_term_ids as $footer_area_term_id) : ?>
				<div class="city3-wrap area-<?php echo esc_attr($footer_area_term_id); ?>">
					<div class="area-city3">
						<?php jc_footer_render_prefecture_shop_cards($footer_area_term_id, $footer_category_prefix); ?>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
	<?php }?>

<?php endif;?>





<?php


	if( $post->post_type == 'shop' && count($segments) >= 3 ):


	$footer_shop_area_term = jc_footer_get_shop_area_heading_term($post->ID);

	if ($footer_shop_area_term):
	$footer_shop_area_term_id = !empty($footer_shop_area_term->term_id)
		? (int) $footer_shop_area_term->term_id
		: (int) $footer_shop_area_term->term_taxonomy_id;
?>	
	
	
	<h3 class="active-city">

		<?php echo esc_html($footer_shop_area_term->name);?>
		
	</h3>



	<div class="city3-wrap area-<?php echo esc_attr($footer_shop_area_term_id); ?>" style="display: block;">

		<div class="area-city3">

		<?php jc_footer_render_prefecture_shop_cards($footer_shop_area_term_id, isset($ex1_city) ? (string) $ex1_city : '', false); ?>


		</div>

	</div>
	
<?php	
	endif;
	endif;
?>


<?php
global $wpdb;

$table = $wpdb->prefix . 'shop_count_logs';

$countries = [
    '台湾' => 'https://jewel-cafe.tw/',
    '香港' => 'https://jewel-cafe.hk/',
    'マレーシア' => 'https://jewel-cafe.my/',
    'タイ' => 'https://jewel-cafe.co.th/',
    'シンガポール' => 'https://jewel-cafe.sg/',
    'フィリピン' => 'https://jewel-cafe.ph/',
    'インドネシア' => 'https://jewel-cafe.id/',
    'カンボジア' => 'https://jewelcafe-kh.com/',
    'オーストラリア' => '',
    'ベトナム' => '',
];

$shop_counts = [];
$total_count = 0;

foreach ($countries as $country => $url) {
    $row = $wpdb->get_row(
        $wpdb->prepare(
            "
            SELECT shop_count, updated_at
            FROM {$table}
            WHERE country = %s
            ORDER BY target_date DESC, updated_at DESC
            LIMIT 1
            ",
            $country
        )
    );

    $shop_counts[$country] = $row;

    if ($row) {
        $total_count += (int) $row->shop_count;
    }
}
?>

<section class="overseas-store-information">
    <div class="ft-shop-title">
        <span class="pc-inline-block">ジュエルカフェは</span>海外でも大好評！
        <br class="sp">
        <mark>
            ただいま世界<span class="big">10</span>ヵ国・<span class="big"><?php echo esc_html($total_count); ?></span>店舗
        </mark>
    </div>

    <div class="store-list">
        <?php foreach ($countries as $country => $url): ?>
            <?php $row = $shop_counts[$country]; ?>
			<div class="item">
                <span class="country-name">
					<?php if (!empty($url)): ?>
						<a class="" href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener">
					<?php else: ?>
						<a style="pointer-events: none;" href="#">
					<?php endif; ?>
						<?php echo esc_html($country); ?>
						</a>
				</span>

                <?php if ($row): ?>
                    &nbsp;<span class="store-count"><?php echo esc_html($row->shop_count); ?> 店舗</span>
				<?php else: ?>
					&nbsp;<span class="store-count"></span>
                <?php endif; ?>
			</div>
        <?php endforeach; ?>
    </div>
</section>



			<div class="footer-logo ta-c">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/logo.svg" class="footer-logo" alt="<?php if($post->post_type == 'kaitori'){echo $post->post_title;}?>買取専門店ジュエルカフェ" style="max-height:50px;">
				</a>
			</div>


			<div class="ta-c pt-10 pb-10 lts0">
			  <ul class="ft-nav">
				<li><a href="<?php echo esc_url(home_url('/shop/')); ?>" class="bold color-black">店舗案内</a></li>
				<li><a href="<?php echo esc_url(home_url('/blog/')); ?>" class="bold color-black">買取実績</a></li>
				<li><a href="<?php echo esc_url(home_url('/first/')); ?>" class="bold color-black">初めての方へ</a></li>
				<li><a href="<?php echo esc_url(home_url('/qa/')); ?>" class="bold color-black">よくある質問</a></li>
				<li><a href="<?php echo esc_url(home_url('/media/')); ?>" class="bold color-black">CM・メディア掲載情報</a></li>
				<li><a href="<?php echo esc_url(home_url('/jewel-guma/')); ?>" class="bold color-black" target="_blank">ジュエルぐまのご紹介！</a></li>
				<li><a href="<?php echo esc_url(home_url('/column/')); ?>" class="bold color-black">コラム</a></li>
				<li><a href="<?php echo esc_url(home_url('/company/')); ?>" class="bold color-black">運営会社</a></li>
				<li><a href="<?php echo esc_url(home_url('/property/')); ?>" class="bold color-black">店舗物件募集</a></li>
				<li><a href="<?php echo esc_url(home_url('/privacy/')); ?>" class="bold color-black">個人情報保護方針</a></li>
				<li><a href="<?php echo esc_url(home_url('/declaration/')); ?>" class="bold color-black">反社会的勢力排除宣言</a></li>
				
				<?php
					/*
				?>
				<li><a href="<?php echo esc_url(home_url('/webmedia/')); ?>" class="bold color-black" target="_blank">運営メディア「バイミー」</a></li>
				<?php
					*/
				?>
			  </ul>
			</div>


		

		
		
		
			
			<p class="ta-c small-font-size copyright ptb-12">株式会社クレイン 東京都公安委員会 第302210708825号　© JEWEL CAFE All Rights Reserved.</p>
			
		</div>
		
	</footer>


	<div class="pagetop">
		<a href="#top"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/scroll_kuma.png" alt="ページTOP"></a>
	</div>
	<script>
		$(document).ready(function() {
			$(window).scroll(function() {
				var scrollPosition = $(window).scrollTop();
				if (scrollPosition > 100) {
					$('.pagetop').addClass('is-active');
				} else {
					$('.pagetop').removeClass('is-active');
				}
			});
		});
	</script>


    <div id="overlay" class="hidden-md hidden-lg"></div>
</div>




<?php if(is_page('property')):?>
	<dialog class="container-modal" id="modalDialog"></dialog>
<?php endif;?>







	<?php if(is_singular( 'shop' )):?>
	<div class="footer-shop-nav">
		<div class="footer-shop-nav-menuWrapper">
			<ul class="footer-shop-nav-menu">
				<li>
					<a href="#js-purchase-price">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/purchase-icon-diamond.svg" class="js-svg" alt="">
						<span>最新買取事例</span>
					</a>
				</li>
				<li>
					<a href="#js-store-guide">
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/map-icon.svg" class="js-svg" alt="">
						<span>アクセス</span>
					</a>
				</li>
				<li class="footer-shop-nav-menu-tel">
					<a href="tel:<?php
						
						if($post->post_parent > 0 ){
						
								$get_field_id = $post->post_parent;
							
						}else{
								
								$get_field_id = $post->ID;
								
						}
						
			
						$tel = get_field('店舗電話番号',$get_field_id);
						$tel = str_replace(array('-', 'ー', '−', '―', '‐','(',')','（','）',' ','　'), '', $tel);
						echo $tel;
					?>">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/tel-icon.svg" class="js-svg" alt="">
					<span>電話する</span></a>
				</li>
			</ul>
		</div>
	</div>
	<?php endif;?>

	<?php wp_footer();?>







	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>	

	<script src="<?php  echo esc_url(get_template_directory_uri()); ?>/src/js/media.js"></script>

	<script src="<?php echo esc_url(get_template_directory_uri())?>/src/js/wth_toggle.js"></script>



	<?php $jc_footer_chart_js_loaded = false; ?>

	<?php if('kaitori' === get_post_type()):?>
		<?php if (!$jc_footer_chart_js_loaded): $jc_footer_chart_js_loaded = true; ?>
			<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
		<?php endif; ?>

		<?php if(has_term('diamond', 'hinmoku')):?>
			<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/diamond.js"></script>
		<?php endif;?>
		<?php if(is_single('diamond')):?>
			<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/diamond-4c.js"></script>
		<?php endif;?>
	<?php endif;?>

	<?php if ( get_post_type() === 'kaitori' && ! str_contains($_SERVER['REQUEST_URI'], '/gold/') ) : ?>
		<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/accordion2.js"></script>
	<?php endif; ?>

	<?php //応急処置のコード。よくあるご質問の答えを表示
	$current_uri = $_SERVER['REQUEST_URI'];
	// 「gold」を含み、かつ「トップページではない」＝「gold配下の詳細ページ」
	if (str_contains($current_uri, '/gold/') && rtrim($current_uri, '/') !== '/kaitori/gold'): 
	?>
		<style>
			.kaitori-faq-list dd{
				display:block;
			}
		</style>
	<?php endif; ?>

	<?php if('shop' === get_post_type() || 'kaitori' === get_post_type()):?>
		<?php if (!$jc_footer_chart_js_loaded): $jc_footer_chart_js_loaded = true; ?>
			<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
		<?php endif; ?>
		<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/shop.js"></script>
		
		
		<?php /* <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDG1w7am_338bO-1sZuc0DRIbEPHmlJ5g"></script> */ ?>
		<?php /*<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/googlemap.js"></script> */ ?>


	<?php endif;?>




	<?php if (is_page('aboutline', 'deliverybuy', 'first', 'qa', 'shopbuy', 'tripbuy', 'company', 'media', 'property', 'privacy', 'form_syuttyou', 'form_takuhai')): ?>
	
    <?php if (is_page('first', 'company', 'media', 'property', 'privacy', 'form_syuttyou', 'form_takuhai')): ?>
      <?php if (!$jc_footer_chart_js_loaded): $jc_footer_chart_js_loaded = true; ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
      <?php endif; ?>
    <?php endif;?>
		<script src="<?php echo esc_url(get_template_directory_uri());?>src/js/shop.js"></script>
	<?php endif;?>
		
		

    <script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/accordion.js" async></script>
    <script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/narrows.js" async></script>
    <script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/menu.js" async></script>
    <script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/search.js" async></script>
	<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/accordion3.js" async></script>
	<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/accordion4.js" async></script>
	<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/check_form.js" async></script>



	
<?php

/*
	if( $post->post_type == 'shop' || $post->post_type == 'kaitori' ){

		if($_SERVER['REQUEST_URI'] !=='/kaitori' && $_SERVER['REQUEST_URI'] !=='/kaitori/' && $_SERVER['REQUEST_URI'] !== '/kaitori/gold/souba/' && $_SERVER['REQUEST_URI'] !== '/kaitori/gold/souba'){

?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
	
	<?php
		echo google_json_data($post);
	?>
	
  ]
}
</>
<?php
		}
	}
*/	
	
?>







<script>

jQuery(function(){
        jQuery(window).on("scroll", function() {
                if (jQuery(window).scrollTop() > 550) {
                        jQuery('#footer-kaitori-type').addClass('fixed');
                }else {
                        jQuery('#footer-kaitori-type').removeClass('fixed');
                }
        });
});

var footerAreaUsesBlogLinks = <?php echo !empty($footer_is_blog_context) ? 'true' : 'false'; ?>;
var footerAreaDefaultCities = {
	'0': '504',
	'1': '360',
	'2': '6',
	'3': '371',
	'4': '340',
	'5': '407',
	'6': '439',
	'7': '240'
};

function jcFooterShowPrefecture(prefectureAreaId, options) {
	var $ = jQuery;
	var settings = options || {};
	var $prefectureLink = $('.area-city2 a[data-area="' + prefectureAreaId + '"]').first();

	if (!$prefectureLink.length) {
		return;
	}

	$('.area-city2 .active-a').removeClass('active-a');
	$prefectureLink.addClass('active-a');

	var isFirst = $('.active-city').html() === '';
	var shouldAnimate = typeof settings.animate === 'boolean' ? settings.animate : isFirst;

	$('.active-city').html($prefectureLink.html()).show();
	$('.city3-wrap').hide();

	if (shouldAnimate) {
		$('.area-' + prefectureAreaId).slideDown('slow');
	} else {
		$('.area-' + prefectureAreaId).css('display', 'block');
	}
}

function jcFooterShowArea(areaIndex, options) {
	var $ = jQuery;
	var settings = options || {};
	var areaKey = String(areaIndex);
	var areaIndexNumber = parseInt(areaIndex, 10);
	var $areaLink = $('.ft-area-list a[data-area="' + areaKey + '"]').first();

	if (!$areaLink.length || isNaN(areaIndexNumber)) {
		return;
	}

	$('.ft-area-list .active').removeClass('active');
	$areaLink.addClass('active');

	var $cityGroup = $('.area-city2').hide().eq(areaIndexNumber).show();
	$cityGroup.find('a').show();

	if (areaKey === '0' || areaKey === '7') {
		$cityGroup.find('.active-a').hide();
	}

	if (settings.activateDefaultPrefecture === false) {
		return;
	}

	if (footerAreaDefaultCities[areaKey]) {
		jcFooterShowPrefecture(footerAreaDefaultCities[areaKey], {
			animate: settings.animate
		});
	}
}




jQuery(function($){
	
	

<?php 
/* if( $post->post_name !== 'tigany-festival2023' && $post->post_name !== 'tokei-repair-matsuegakuendori'){ ?>	
	
    //ajax送信
    $.ajax({
        url : "https://ipapi.co/<?php echo $_SERVER["REMOTE_ADDR"];?>/json",
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            console.log("ajax通信に失敗しました");
        },
        success : function(data) {
			get_active_city(data.region.toLowerCase());
			
            console.log(data);

        }
    });
	
} 
*/
?>
	
	
	
	function get_active_city( city_name ){
		
	let city = {

		'hokkaido': ['0','504'],


		'aomori': ['1','360'],		
		'iwate': ['1','360'],	
		'miyagi': ['1','362'],		
		'akita': ['1','365'],		
		'yamagata': ['1','367'],		
		'fukushima': ['1','367'],	

		
		'ibaraki': ['2','319'],
		'tochigi': ['2','329'],
		'gunma': ['2','325'],
		'saitama': ['2','293'],
		'chiba': ['2','305'],
		'tokyo': ['2','6'],
		'kanagawa': ['2','261'],
		'yamanashi': ['2','336'],


		'niigata': ['3','392'],
		'toyama': ['3','379'],
		'ishikawa': ['3','395'],
		'fukui': ['3','395'],
		'nagano': ['3','397'],
		'gifu': ['3','382'],
		'shizuoka': ['3','403'],
		'aichi': ['3','384'],
		'mie': ['3','371'],


		'shiga': ['4','354'],
		'kyoto': ['4','340'],
		'osaka': ['4','349'],
		'hyogo': ['4','346'],
		'nara': ['4','352'],
		'wakayama': ['4','554'],


		'tottori': ['5','434'],
		'shimane': ['5','422'],
		'okayama': ['5','416'],
		'hiroshima': ['5','427'],
		'yamaguchi': ['5','407'],
		'tokushima': ['5','526'],
		'kagawa': ['5','532'],
		'ehime': ['5','537'],
		'kochi': ['5','544'],


		'fukuoka': ['6','439'],
		'saga': ['6','451'],
		'nagasaki': ['6','455'],
		'kumamoto' : ['6','458'],
		'oita': ['6','465'],
		'miyazaki': ['6','473'],
		'kagoshima': ['6','475'],


		'okinawa': ['7','240'],

	}


	
		if( city[city_name][0] == ''){

			jcFooterShowArea('2', { activateDefaultPrefecture: false, animate: false });
			jcFooterShowPrefecture('6', { animate: false });

		}else{
			
			jcFooterShowArea(city[city_name][0], { activateDefaultPrefecture: false, animate: false });
			jcFooterShowPrefecture(city[city_name][1], { animate: false });

		}
		
		
	}

	
});







$(function() {

	$('.ft-area-list a').click(function(event) {
		event.preventDefault();

		jcFooterShowArea($(this).data('area'), {
			activateDefaultPrefecture: !footerAreaUsesBlogLinks
		});
	});

	//店舗リスト
	$('.area-city2 a').click(function(event) {
		var href = $(this).attr('href');
		var shouldNavigate = footerAreaUsesBlogLinks && href && href !== '#';

		if (!shouldNavigate) {
			event.preventDefault();
		}

		if (shouldNavigate) {
			return;
		}

		jcFooterShowPrefecture($(this).data('area'));
	});
	


});





	//send
	function send_form(){
		
		$(".wpcf7-form").submit();
				
	}
	
	// モーダルウィンドウ
	const myDialog = document.getElementById('modalDialog');
	
	function buttonClose(){
		
		myDialog.close();
		
	};

	//cancel
	function cancel(){	
		
		buttonClose();
		
	}
	
	

</script>





<script> //買取事例で使うスクリプト @TOPと全品目ページ
	$(document).ready(function() {
		$(".blog-archive-point").each(function(index, element) {
			if($(window).width() <= 768){ //ウィンドウ幅768px以下のとき
				var text = $(element).text();
				if (text.replace(/\s/g, '').length <= 150 && $(element).siblings(this).height() <= 109) { //空白を除いたテキスト文字数が150文字以内かつ高さが109px以内
					$(this).next('.read_more').remove(); //直後の要素「.read_more」のHTML削除
					$(this).css('position', 'static'); //CSSスタイル変更
					$(this).css('overflow', 'visible'); //CSSスタイル変更
					$(this).addClass('flag');
				}
			}
		});
	});
</script>

<script> //@店舗ページ
	$(document).ready(function() {
		var childElements_voice = $('#js-shop-voice').children(); //#js-shop-voiceの子要素を取得
		var childElements_news = $('#js-shop-news').children(); //#js-shop-newsの子要素を取得
		if (childElements_voice.length === 0) { //子要素が存在しない場合
			$('a[href="#js-shop-voice"]').css('pointer-events','none');
		}
		if (childElements_news.length === 0) { //子要素が存在しない場合
			$('a[href="#js-shop-news"]').css('pointer-events','none');
		}
	});
</script>




<?php if (!is_singular('shop')): //店舗ページ以外。モバイル画面下に固定メニューの表示 ?>
	<script>
	$(document).scroll(function() {
		var bottomElement = $('#bottomElement');
		var scrollPosition = $(window).scrollTop();

		// 指定のpx以上スクロールされたら要素を表示
		if (scrollPosition >= 460) {
			bottomElement.css('bottom', '0');
			$('.jewelkuma_speech_balloon').addClass('is-active2');
			$('.pagetop').addClass('is-active2');
		} else {
			bottomElement.css('bottom', '-72px'); // 画面外に配置
			$('.jewelkuma_speech_balloon').removeClass('is-active2');
			$('.pagetop').removeClass('is-active2');
		}
	});
	</script>

	<div class="fixed-bottom sp" id="bottomElement">
		<div class="kaitori">
			<div class="kaitori-method red_bg" style="padding:0;">
				<ul class="d-f ai-c section-inner" style="padding:15px 0;">
					<li class="arrow_r">
						<a href="/shop" class="color-white bold">お近くのジュエルカフェを検索</a>
					</li>
					<li style="width:50vw; padding:0;">
						<a href="/shop/" class="color-white d-f bold" style="margin:0 auto; width:65%;">
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/tel_button.png" alt="" style="max-width:100%;">
						</a>
					</li>
					<li style="width:50vw; padding:0;">
						<a href="/trip-buy/" class="color-white d-f bold" style="margin:0 auto; width:65%;">
							<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/trip_buy_button.png" alt="" style="max-width:100%;">
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
<style>
	.kaitori .kaitori-method ul li:nth-child(2) a::before,
	.kaitori .kaitori-method ul li:nth-child(3) a::before{
		content:none;
	}
</style>
<?php endif;?>

<script> //パンくずリストの最後のspanを特定の条件(特定の高さ)でブロック要素にして見栄えよくしている
$(document).ready(function() {
	function checkBreadcrumbsHeight() {
		var breadcrumbsHeight = $('.breadcrumbs .section-inner span:last').height();
		if (breadcrumbsHeight > 22 && breadcrumbsHeight < 45) {
			$('.breadcrumbs .section-inner span:last').css('display', 'block');
		} else {
			$('.breadcrumbs .section-inner span:last').css('display', '');
		}
	}
	checkBreadcrumbsHeight();
});
</script>











<?php 
	$nav_arr = kaitori_breadcrumb2();

	// トップページかどうかを判定
	if ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '/index.php') {
		@$nav_arr['value'][0] = wp_title('|', false, 'right');
		$nav_arr['url'][0] = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	} else {
	}

    // /blog/xxx/ 以下（/blog/ TOP除く）かどうかを判定
    $is_blog = (strpos($_SERVER['REQUEST_URI'], '/blog/') === 0) && strlen(rtrim($_SERVER['REQUEST_URI'], '/')) > strlen('/blog');
?>
	<script type="application/ld+json">
		{
		"@context": "https://schema.org",
		"@type": "BreadcrumbList",
		"itemListElement": [{
			"@type": "ListItem",
			"position": 1,
			"name": "<?php echo $nav_arr['value'][0];?>",
			"item": "<?php echo $nav_arr['url'][0];?>"
		}
		<?php if (!empty($nav_arr['value'][1])): ?>
		,{
			"@type": "ListItem",
			"position": 2,
            "name": "<?php 
                $name2 = $is_blog && isset($parent_post->post_title) ? $parent_post->post_title . '買取' : $nav_arr['value'][1];
                echo $name2;
            ?>"<?php if (!empty($nav_arr['value'][2])): ?>,
			"item": "<?php echo $nav_arr['url'][0].$nav_arr['url'][1];?>"<?php endif;?>
		}
		<?php endif;?>
		<?php if (!empty($nav_arr['value'][2])): ?>
		,{
			"@type": "ListItem",
			"position": 3,
            "name": "<?php 
                $name3 = $is_blog && isset($parent_post->post_title) ? $parent_post->post_title . 'の参考価格・買取実績一覧' : $nav_arr['value'][2];
                echo $name3;
            ?>"<?php if (!empty($nav_arr['value'][3])): ?>,
			"item": "<?php echo $nav_arr['url'][0].$nav_arr['url'][1].$nav_arr['url'][2];?>"<?php endif;?>
		}
		<?php endif;?>
		<?php if (!empty($nav_arr['value'][3])): ?>
		,{
			"@type": "ListItem",
			"position": 4,
			"name": "<?php echo $nav_arr['value'][3];?>"<?php if (!empty($nav_arr['value'][4])): ?>,
			"item": "<?php echo $nav_arr['url'][0].$nav_arr['url'][1].$nav_arr['url'][2].$nav_arr['url'][3];?>"<?php endif;?>
		}
		<?php endif;?>
		<?php if (!empty($nav_arr['value'][4])): ?>
		,{
			"@type": "ListItem",
			"position": 5,
			"name": "<?php echo $nav_arr['value'][4];?>"<?php if (!empty($nav_arr['value'][5])): ?>,
			"item": "<?php echo $nav_arr['url'][0].$nav_arr['url'][1].$nav_arr['url'][2].$nav_arr['url'][3].$nav_arr['url'][4];?>"<?php endif;?>
		}
		<?php endif;?>
		<?php if (!empty($nav_arr['value'][5])): ?>
		,{
			"@type": "ListItem",
			"position": 6,
			"name": "<?php echo $nav_arr['value'][5];?>"
		}
		<?php endif;?>
		]
		}
	</script>




<!-- モーダル本体 -->
<div id="modal" class="modal">
  <div class="modal-content">
    <span class="modal-close">×</span>
    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/campaign_x_modal.png" alt="ジュエルぐま公式X10000フォロワー突破キャンペーン 買取金額20%UP">
    <div class="modal-buttons">
      <a href="/shop/" class="modal-button"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/campaign_x_modal_shop_button.png" alt="お近くの店舗はこちら"></a>
      <a href="https://x.com/Jewel_Cafe" target="_blank" class="modal-button"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/campaign_x_modal_x_button.png" alt="ジュエルぐま<公式X>"></a>
    </div>
  </div>
</div>

<style>
/* モーダル本体（オーバーレイ） */
.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  height: 100dvh;
  background: rgba(0, 0, 0, 0.7);
  justify-content: center;
  align-items: center;
  z-index: 9999;
}
/* モーダルウィンドウ */
.modal-content {
  position: relative;
  background: #fff;
  border-radius: 10px;
  max-width: 90%;
  max-height: 90%;
  width: 600px;
  overflow: visible;
  padding: 20px 15px;
  z-index: 1;
  box-sizing: border-box;
}
/* 上40%に背景画像を表示（擬似要素） */
.modal-content::before {
  content: "";
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 61%;
  background: url('https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/assets/images/campaign_x_modal_bg.png') no-repeat center top / cover;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  z-index: -1;
  pointer-events: none;
}
/* モーダル本文（中の要素を上に表示） */
.modal-body {
  position: relative;
  z-index: 1;
}
/* 閉じるボタン */
.modal-close {
  position: absolute;
  top: -12px;       /* 上に12pxはみ出す */
  right: -12px;     /* 右に12pxはみ出す */
  width: 32px;
  height: 32px;
  background-color: #fff;
  color: #000;
  font-size: 20px;
  font-weight: bold;
  border: none;
  border-radius: 50%;
  text-align: center;
  line-height: 32px;
  cursor: pointer;
  box-shadow: 0 0 5px rgba(0,0,0,0.2);
  z-index: 10;
  transition: background-color 0.3s, color 0.3s;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
  
}
.modal-close:hover {
  background-color: #f0f0f0;
  color: #888888;
}
/* ボタン配置 */
.modal-buttons {
  display: flex;
  justify-content: center;
  gap: 2%;
  margin-top:10px;
}
.modal-button {
  display: inline-block;
}
.modal-content img{
  max-width:100%;
  height:auto;
}
.modal-trigger img:hover{
	opacity: 0.8;
}
</style>



<style>

.cat-Trend2_List {
  list-style: none;
  margin: 0;
  padding: 0;
  border-top: 1px solid #e5e5e5;
  font-family: "Noto Sans JP", sans-serif;
}

.cat-Trend2Details {
  border-bottom: 1px solid #e5e5e5;
  background: #fff;
}

.cat-Trend2Details_Summary {
  cursor: pointer;
  padding: 18px 20px;
  font-size: 16px;
  font-weight: 600;
  color: #323232;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: background 0.2s ease;
}

.cat-Trend2Details_Summary:hover {
  background: #f7f7f7;
}


.cat-Trend2Details_Summary::after {
  content: "＋";
  font-size: 18px;
  color: #888;
  transition: transform 0.2s ease;
}

details[open] > .cat-Trend2Details_Summary::after {
  content: "－";
}

.cat-Trend2Details_Contents {
  background: #fafafa;
}

.cat-Trend2Details_Inner {
  padding: 20px;
}


.cat-Trend2Details_Table table {
  width: 100%;
  border-collapse: collapse;
  background: #fff;
  border-radius: 8px;
  overflow: hidden;
}

.cat-Trend2Details_Table thead th {
  background: #c80000;
  color: #fff;
  font-size: 13px;
  font-weight: 500;
  padding: 12px;
  text-align: left;
}

.cat-Trend2Details_Table tbody tr {
  border-bottom: 1px solid #eee;
}

.cat-Trend2Details_Table tbody tr:last-child {
  border-bottom: none;
}

.cat-Trend2Details_Table td {
  padding: 14px 12px;
  vertical-align: middle;
}

.cat-Trend2Details_Name {
  font-size: 14px;
  line-height: 1.5;
  color: #111;
  display: inline-block;
}

/* ===== 가격 ===== */
.cat-Trend2Details_Price {
  display: flex;
  gap: 20px;
}

.cat-Trend2Details_Price div {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.cat-Trend2Details_Price dt {
  font-size: 12px;
  color: #666;
}

.cat-Trend2Details_Price dd {
  margin: 0;
  font-size: 15px;
  font-weight: 600;
  color: #111;
}

.cat-Trend2Details_Price .font-Heebo {
  font-family: "Heebo", sans-serif;
  letter-spacing: 0.5px;
}


@media (max-width: 768px) {

  .cat-Trend2Details_Table table,
  .cat-Trend2Details_Table thead,
  .cat-Trend2Details_Table tbody,
  .cat-Trend2Details_Table th,
  .cat-Trend2Details_Table td,
  .cat-Trend2Details_Table tr {
    display: block;
  }

  .cat-Trend2Details_Table thead {
    display: none;
  }

  .cat-Trend2Details_Table tbody tr {
    padding: 12px 0;
  }

  .cat-Trend2Details_Table td {
    padding: 8px;
  }

  .cat-Trend2Details_Price {
    justify-content: space-between;
  }
}



.condition-wrap {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
    margin: 40px 0;
}

section.condition {
    background: #f7f7f7;
    padding: 24px 28px;
    border-radius: 8px;
    box-sizing: border-box;
}

section.condition h3 {
    font-size: 16px;
    font-weight: 600;
    text-align: center;
    margin: 0 0 16px;
    position: relative;
    letter-spacing: 0.05em;
}

section.condition h3::before,
section.condition h3::after {
    content: "";
    position: absolute;
    top: 50%;
    width: 40px;
    height: 1px;
    background: #ccc;
}

section.condition h3::before {
    left: 0;
}

section.condition h3::after {
    right: 0;
}

section.condition ul {
    list-style: disc;
    padding-left: 18px;
    margin: 0;
}

section.condition li {
    font-size: 11px;
    line-height: 1.7;
    color: #333;
    margin-bottom: 6px;
}

section.condition li:last-child {
    margin-bottom: 0;
}

</style>



<script>
$(function(){
$('.modal-trigger').on('click', function(){
  $('#modal').fadeIn().css('display', 'flex');
});


  // モーダル閉じる（背景 or ×ボタン）
  $('#modal, .modal-close').on('click', function(e){
    if (e.target === this || $(e.target).hasClass('modal-close')) {
      $('#modal').fadeOut();
    }
  });
});
</script>


<script>
// グローバルナビゲーションのサブメニュー表示
$(function() {
  $(".nav .menu-item").hover(
    function() {
      $(this).find(".submenu").stop(true, true).fadeIn(200);
    },
    function() {
      $(this).find(".submenu").stop(true, true).fadeOut(200);
    }
  );
});
</script>




</body>
</html>
