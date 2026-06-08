<!DOCTYPE html>
<html lang="ja">
<head>
	<?php if ( $_SERVER['HTTP_HOST'] === 'jewel-cafe.jp' ) : ?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KDBZFFD');</script>
		<!-- End Google Tag Manager -->
	<?php endif; ?>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0" />
  <meta name="format-detection" content="telephone=no">

	<?php


		if(	strpos($_SERVER['REQUEST_URI'],'/tag/') !== false || strpos($_SERVER['REQUEST_URI'],'junk') !== false || strpos($_SERVER['REQUEST_URI'],'/author/') !== false){

			echo '<meta name="robots" content="noindex,nofollow">';			
		
		}
		
		$image_fv_pc = get_field('fv_image_pc');
		
		if(!empty($image_fv_pc)):
	?>

<?php /* ?>
	<meta property="og:image" content="<?php echo esc_url($image_fv_pc['url']);?>">
<?php */ ?>

	<?php endif;?>

<meta property="og:image" content="https://jewel-cafe.jp/wp-content/themes/jewelcafe_replace/ogp.jpg">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="全国展開の買取専門店 ジュエルカフェ【公式】">
<meta name="twitter:description" content="全国展開の買取専門店 ジュエルカフェ【公式】 | 金・時計・金券・ブランド買取を日本全国対応いたします。全国300店舗以上で高価買取実施中。お気軽に無料査定をご利用ください！">

<?php //検索結果にサムネイル画像を表示させる設定（メタタグと構造化データ）
	$slug = '';
	$target_slugs = ['gold', 'brand', 'tokei'];
	foreach ( $target_slugs as $s ) {
		if ( is_single($s) ) {
			$slug = $s;
			break;
		}
	}
	if ( !empty($slug) ) :
		$img_url = get_stylesheet_directory_uri() . "/assets/images/thumbnails/{$slug}-thumbnail.jpg";
		$desc = get_post_meta( get_the_ID(), '_aioseo_description', true );
?>
    <meta name="thumbnail" content="<?php echo esc_url( $img_url ); ?>" />
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php echo esc_url( get_permalink() ); ?>"
      },
      "image": "<?php echo esc_url( $img_url ); ?>",
      "name": "<?php echo esc_js( wp_get_document_title() ); ?>",
      "description": "<?php echo esc_js( wp_strip_all_tags( $desc ) ); ?>"
    }
    </script>
<?php endif; ?>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="icon" href="<?php echo esc_url(get_template_directory_uri());?>/favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url(get_template_directory_uri());?>/favicon.ico" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_template_directory_uri());?>/apple-touch-icon.png">
	<?php if(is_page( array('form_syuttyou', 'form_takuhai', 'property') )):?>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://use.typekit.net/rxn5qbi.css">
	<?php endif;?>



	<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/assets/css/main.css<?php echo '?' . filemtime(get_stylesheet_directory() . '/assets/css/main.css'); ?>">
    
	<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/src/swiper/swiper-bundle.min.css"/>




	<?php
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array(), '2.2.1');
	?>

	<?php
	/*
	<script src="<?php echo esc_url(get_template_directory_uri());?>/assets/js/swiper-bundle.min.js"></script>
  */
	?>
  <script src="https://unpkg.com/swiper@8.4.7/swiper-bundle.min.js"></script>

	<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/slick.min.js" defer></script>
	<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/slick.js" defer></script>
	<script src="<?php echo esc_url(get_template_directory_uri());?>/src/js/desvg.js" async></script>
	<script>
		window.addEventListener('load', function(){
			deSVG('.js-svg', true);
		});
	</script>





<script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "Organization",
"url": "https://www.crane-a.co.jp",
"sameAs": ["https://www.instagram.com/crane_inc_official/",
"https://www.facebook.com/crane.inc",
"https://twitter.com/crane__inc",
"https://www.tiktok.com/@crane__official"],
"logo": "https://www.crane-a.co.jp/wp-content/themes/crane-a/assets/img/common/logo.svg",
"name": "株式会社クレイン",
"description": "「買取を身近なものに。気軽に足を運べる場所に」業界最大級の買取専門店ジュエルカフェをはじめ、国内・海外に幅広い事業と拠点を持つ株式会社クレイン",
"email": "kantei@jewel-cafe.jp",
"telephone": "",
"address": {
"@type": "PostalAddress",
"streetAddress": "南青山5-6-26 青山246ビル5F",
"addressLocality": "港区",
"addressCountry": "JP",
"addressRegion": "東京都",
"postalCode": "1070062"
},
"vatID": "",
"iso6523Code": ""
}
</script>







	<?php
	/*
	if(is_front_page(  )):?>
		<script src="https://unpkg.com/vue@next"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<?php endif;
	*/
	?>

	<?php
  /*
  $slug = get_post($post->ID)->post_name;
  if($slug == 'gold'): //金TOP ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ItemList",
      "itemListElement": [
        {
          "@type": "Product",
          "image": "https://jewel-cafe.jp/wp-content/uploads/2021/07/item01-4.jpg.webp"
        },
        {
          "@type": "Product",
          "image": "https://jewel-cafe.jp/wp-content/uploads/2021/07/item02-3.jpg.webp"
        },
        {
          "@type": "Product",
          "image": "https://jewel-cafe.jp/wp-content/uploads/2021/07/item03-3.jpg.webp"
        }
      ]
    }
    </script>
  <?php endif;
  */

  ?>
  <?php wp_head(); ?>




<?php if ( strpos($_SERVER['REQUEST_URI'], '/blog/') !== false ) : ?>
	<?php
		// 現在のページの完全なURLを取得する
		$canonical_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		// クエリパラメータ（?以降）を除外して正規化する
		$canonical_url = strtok($canonical_url, '?');
	?>
	<link rel="canonical" href="<?php echo esc_url($canonical_url); ?>">
<?php endif; ?>



</head>


<body id="js-body">
	<?php if ( $_SERVER['HTTP_HOST'] === 'jewel-cafe.jp' ) : ?>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KDBZFFD"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
	<?php endif; ?>



	<?php if('blog' === get_post_type( ) || 'news' === get_post_type( )|| 'column' === get_post_type( ) || is_tax('hinmoku')):?>
		<div class="wrap-inner blog">
	<?php elseif(is_tax('area')):?>
		<div class="wrap-inner shop">
	<?php elseif(is_archive('kaitori')):?>
		<div class="wrap-inner purchase-page">
	<?php elseif('kaitori' === get_post_type( )):?>
		<div class="wrap-inner kaitori">
	<?php elseif('shop' === get_post_type()):?>
		<div class="wrap-inner shop-detail">
	<?php elseif (is_home()): ?>
	 <div class="wrap-inner">
	<?php else:?>
		<?php
      $page = get_post(get_the_ID());
	  
	  if(isset($page)){
      $slug = $page->post_name;
	  }else{
		  $slug = '';
	  }
		?>
    <div class="wrap-inner <?php echo $slug;?>">
    <?php if ('first' === $slug || 'property' === $slug): ?>
      <div class="wrap-inner static-first static">
    <?php elseif ('form_syuttyou' === $slug || 'form_takuhai' === $slug): ?>
      <div class="wrap-inner form-page">
    <?php elseif (strpos($_SERVER['REQUEST_URI'],'/line-ad/') !== false): ?>
      <div class="wrap-inner line-ad">
    <?php else: ?>
      <div class="wrap-inner <?php echo $slug;?>">
    <?php endif; ?>
	<?php endif; ?>

    <header>
      <div class="header-inner">
        <div class="header-pc only-pc">
          <div class="d-f ai-c jc-sb inner">
		  
            <div class="pc-logo" >
              <a href="<?php echo esc_url(home_url());?>"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/logo.png" alt="最新相場で高価買取ならジュエルカフェ"></a>
            </div>			
					
            <div class="d-f ai-c middle_area">
				<div class="d-f upper">
					<p class="title">

					  <?php if (get_post_type() === 'kaitori' && strpos($_SERVER['REQUEST_URI'], '/shop/') == false ):?>
							  <?php
	  
								  if( rtrim($_SERVER['REQUEST_URI']) == '/kaitori/' ){
	  
									  echo '買取専門店 ジュエルカフェ';
									  
									  $top_url = '/kaitori/';
	  
	  
								  }else if ($post->post_parent) {
	  
									  $ancestors = get_post_ancestors($post->ID);
									  
									  if (in_array(4747, $ancestors) || $post->ID == 4747) {
										  
										  $root_post = get_post(4747);
										  
										  echo '<a href="/kaitori/brand/'.$root_post->post_name.'/" class="color-black">'.esc_html($root_post->post_title).'の買取はジュエルカフェへ</a>';
										  
										  $top_url = '/kaitori/brand/'.$root_post->post_name.'/';
										  
									  }else if (in_array(3288, $ancestors) || $post->ID == 3288) {
									  
										  $root_post = get_post(3288);
										  echo '<a href="/kaitori/tokei/'.$root_post->post_name.'/" class="color-black">'.esc_html($root_post->post_title).'の買取はジュエルカフェへ</a>';
										  
										  $top_url = '/kaitori/tokei/'.$root_post->post_name.'/';
									  
									  }else if (in_array(3472, $ancestors) || $post->ID == 3472) {
									  
										  $root_post = get_post(3472);
										  echo '<a href="/kaitori/brand/'.$root_post->post_name.'/" class="color-black">'.esc_html($root_post->post_title).'の買取はジュエルカフェへ</a>';
										  
										  $top_url = '/kaitori/brand/'.$root_post->post_name.'/';
									  
									  }else if (in_array(3520, $ancestors) || $post->ID == 3520) {
									  
										  $root_post = get_post(3520);
										  echo '<a href="/kaitori/brand/'.$root_post->post_name.'/" class="color-black">'.esc_html($root_post->post_title).'の買取はジュエルカフェへ</a>';
										  
										  $top_url = '/kaitori/brand/'.$root_post->post_name.'/';
									  
									  
									  }else{
					  
										  $root_id   = end($ancestors);
										  $root_post = get_post($root_id);
	  
										  echo '<a href="/kaitori/'.$root_post->post_name.'/" class="color-black">'.esc_html($root_post->post_title).'の買取はジュエルカフェへ</a>';
										  
										  $top_url = '/kaitori/'.$root_post->post_name.'/';
	  
									  }
	  
								  }else{
	  
									  echo '<a href="/kaitori/'.$post->post_name.'/" class="color-black">'.$post->post_title.'の買取はジュエルカフェへ</a>';
									  
									  $top_url = '/kaitori/'.$post->post_name.'/';
	  
									  $root_post = $post;
	

								  }
								  

							  ?>


					<?php elseif ( strpos($_SERVER['REQUEST_URI'], '/shop/') !== false ):?>
					
	

<?php

$result = get_object_from_current_url(); //functions.phpを最新にしたら有効にする



if( is_404() ){
	
	echo '買取専門店 ジュエルカフェ';
	
}else if (isset($result['type']) && $result['type'] === 'post') {



    $post = $result['data'];
    $post_type = get_post_type($post);

    if ($post_type === 'shop') {

        $terms = wp_get_post_terms($post->ID, 'area');

        if (!empty($terms)) {

            $child = null;
            foreach ($terms as $t) {
                if ($t->parent != 0) {
                    $child = $t;
                    break;
                }
            }

			if ($child) {
				$name = ($child->name === '道央') ? '北海道' : $child->name;
				$name = ($name === '沖縄本島') ? '沖縄県' : $name;
				echo $name . "の買取ならジュエルカフェ";
			} else {
				$name = ($terms[0]->name === '道央') ? '北海道' : $terms[0]->name;
				$name = ($name === '沖縄本島') ? '沖縄県' : $name;
				echo $name . "の買取ならジュエルカフェ";
			}


        } else {
			
			$name = $post->post_title;

			$name = ($name === '道央') ? '北海道' : $name;
			$name = ($name === '沖縄本島') ? '沖縄県' : $name;

			echo $name . "の買取ならジュエルカフェ";

			
        }
    }

}else if ($post_type === 'kaitori') {	

	// ① 변환 함수
	$convert = function($name) {
		$name = trim($name);
		if ($name === '道央') return '北海道';
		if ($name === '沖縄本島') return '沖縄県';
		return $name;
	};



    // 현재 포스트의 자식 존재 여부 확인
    $children = get_children([
        'post_parent' => $post->ID,
        'post_type'   => 'kaitori',
        'numberposts' => 1
    ]);

    // 자식이 있으면 현재 포스트 이름
    if (!empty($children)) {

        $name = $convert($post->post_title);
		
		if($name !== '店舗案内'){
		
			echo $name.'の' ;
		}



    } else {

        // 자식이 없으면 부모 출력
        $parent_post = get_post($post->post_parent);

        if ($parent_post) {
            $name = $convert($parent_post->post_title);
        } else {
            // 부모도 없으면 자기 자신 출력
            $name = $convert($post->post_title);
        }

		if($name !== '店舗案内'){
		
			echo $name.'の' ;

		}

    }
	

	$ancestors = get_post_ancestors($post->ID);

	if (in_array(4747, $ancestors) || $post->ID == 4747) {
		$root_post = get_post(4747);
		$base_title = $root_post->post_title;
	}

	else if (in_array(3288, $ancestors) || $post->ID == 3288) {
		$root_post = get_post(3288);
		$base_title = $root_post->post_title;
	}
	
	else if (in_array(3472, $ancestors) || $post->ID == 3472) {
		$root_post = get_post(3472);
		$base_title = $root_post->post_title;
	}
	
	else if (in_array(3520, $ancestors) || $post->ID == 3520) {
		$root_post = get_post(3520);
		$base_title = $root_post->post_title;
	}

	else if (!empty($ancestors)) {
		$root_id   = end($ancestors);
		$root_post = get_post($root_id);
		if ($root_post) {
			$base_title = $root_post->post_title;
		}
	}




	$final_title = $convert($base_title);

	echo esc_html($final_title) . "買取ならジュエルカフェ";

}else if ( isset($result['type']) && $result['type'] === 'term') {

    $term = $result['data'];
	
	if( $term->slug == 'tokei-repair-yoshinari' ){
		
		echo "鳥取県の時計修理ならジュエルカフェ";
		
	}else if( $term->slug == 'tokei-repair-matsuegakuendori' ){
	
		echo "島根県の時計修理ならジュエルカフェ";
	
	}else{
			
		$name = ($term->name === '道央') ? '北海道' : $term->name;
		$name = ($name === '沖縄本島') ? '沖縄県' : $name;
		echo "{$name}の買取ならジュエルカフェ";
		
	}
	
	
}



	
						?>

					<?php else: ?>	
						買取専門店 ジュエルカフェ
					<?php endif;?>

					</p>


						<?php
							$url = $_SERVER['REQUEST_URI'];
							if (
								// A: kaitori が無い
								strpos($url, 'kaitori') === false
								// OR
								// B: kaitori と shop が両方ある
								|| (strpos($url, 'kaitori') !== false && strpos($url, 'shop') !== false)
							)
						:?>
							<ul class="d-f button_area">
								<li class="property_button"><a href="/property/">店舗物件募集中！</a></li>
								<li class="job_button"><a href="/job/">店舗スタッフ募集中！</a></li>
							</ul>
						<?php endif;?>
						
				</div>
				<div class="lower">

					<ul class="d-f jc-sb nav">
	  

	  
	  
					  <li class="menu-item">
	  
						  <span href="<?php echo $top_url; ?>" class="color-black bold">
	  
							  <?php 
							  if ( get_post_type() === 'kaitori' && isset($root_post) && $root_post instanceof WP_Post && trim($root_post->post_title) !== '' ) :
							  
								  echo trim($root_post->post_title).'の買取品目一覧';
							  
							  else:
							  
								  echo '買取品目の一覧';
	  
							  endif;?>
	  
						  </span>
	  
						  <div class="submenu <?php if(isset($root_post) && $root_post->post_name == 'brand'){ echo 'brand'; }?>">
							<div class="head">ジュエルカフェなら最新相場で高価買取！</div>
							<ul>
	  
							  <?php
							  
								  if (get_post_type() === 'kaitori' && isset($root_post) && $root_post->ID > 0){
							  
									  $children = get_pages(array(
										  'post_type'   => 'kaitori',
										  'child_of'    => $root_post->ID,
										  'parent'      => $root_post->ID,
										  'sort_column' => 'menu_order',
										  'sort_order'  => 'ASC'
									  ));
	  
									  if ($children) {
	  
										  $all_city_array = array("junk-rolex","kouchi","hokkaido","aomori","iwate","akita","fukushima","yamagata","tochigi","ibaraki","gunma","miyagi","saitama","chiba","tokyo","kanagawa","niigata","ishikawa","toyama","yamanashi","fukui","nagano","gifu","shizuoka","aichi","mie","shiga","kyoto","hyogo","osaka","nara","wakayama","shimane","tottori","okayama","hiroshima","tokushima","kagawa","yamaguchi","ehime","fukuoka","kagoshima","saga","nagasaki","miyazaki","kumamoto","oita","okinawa");
										  
										  foreach ($children as $child) {
																			  
											  if ($child->post_name === 'shop' || $child->post_name === 'souba' || in_array($child->post_name, $all_city_array, true)) {
												  continue;
											  }
											  
											  
											  
											  echo '<li><a href="' . get_permalink($child->ID) . '">' . esc_html($child->post_title) . '</a></li>';
											  
										  }
									  }
							  
								  }else{ ?>
								  <li><a href="<?php echo esc_url(home_url('/kaitori/gold/')); ?>">金・貴金属買取</a></li>
								  <li><a href="<?php echo esc_url(home_url('/kaitori/brand/')); ?>">ブランド品買取</a></li>
								  <li><a href="<?php echo esc_url(home_url('/kaitori/tokei/')); ?>">ブランド時計買取</a></li>
								  <li><a href="<?php echo esc_url(home_url('/kaitori/jewelry/')); ?>">宝石買取</a></li>
								  <li><a href="<?php echo esc_url(home_url('/kaitori/diamond/')); ?>">ダイヤモンド買取</a></li>
								  <li><a href="<?php echo esc_url(home_url('/kaitori/card/')); ?>">金券買取</a></li>
								  <li><a href="<?php echo esc_url(home_url('/kaitori/letter-top/')); ?>">切手買取</a></li>
								  <li><a href="<?php echo esc_url(home_url('/kaitori/cosme/')); ?>">化粧品買取</a></li>
								  <li><a href="<?php echo esc_url(home_url('/kaitori/osake/')); ?>">お酒買取</a></li>
								  <li><a href="<?php echo esc_url(home_url('/kaitori/kottou/')); ?>">遺品・生前整理買取</a></li>
							  <?php } ?>
							  
							</ul>
							<div class="foot">
								<div class="archive-link"><a href="<?php echo esc_url(home_url('/kaitori/')); ?>">すべての買取品目はこちらから！</a></div>
							</div>
						  </div>
	  
					  </li>


					<?php if(is_single('gold') || (isset($root_post) && $root_post->post_name == 'gold')): ?>
					  <li class="sep">|</li>
					  <li><a href="<?php echo esc_url(home_url('/kaitori/gold/souba/')); ?>" class="color-black bold">金・貴金属の相場情報</a></li>
<?php /* ?><?php */ ?>
					<?php elseif(is_single('vuitton') || (isset($root_post) && $root_post->post_name == 'vuitton')): ?>
					  <li class="sep">|</li>
					  <li><a href="<?php echo esc_url(home_url('/kaitori/brand/vuitton/souba/')); ?>" class="color-black bold">ルイヴィトンの相場情報</a></li>
					<?php elseif(is_single('chanel') || (isset($root_post) && $root_post->post_name == 'chanel')): ?>
					  <li class="sep">|</li>
					  <li><a href="<?php echo esc_url(home_url('/kaitori/brand/chanel/souba/')); ?>" class="color-black bold">シャネルの相場情報</a></li>
					<?php elseif(is_single('rolex-top') || (isset($root_post) && $root_post->post_name == 'rolex-top')): ?>
					  <li class="sep">|</li>
					  <li><a href="<?php echo esc_url(home_url('/kaitori/tokei/rolex-top/souba/')); ?>" class="color-black bold">ロレックスの相場情報</a></li>

					<?php endif;?>

					  <li class="sep">|</li>
					  <li><a href="<?php echo esc_url(home_url('/shop/')); ?>" class="color-black bold">店舗案内</a></li>
					  <li class="sep">|</li>
					  <li class="blog"><a href="<?php echo esc_url(home_url('/blog/')); ?>" class="color-black bold">買取実績</a></li>
					  <li class="sep">|</li>
					  <li class="first_time_users"><a href="<?php echo esc_url(home_url('/first/')); ?>" class="color-black bold">初めての方へ</a></li>
						<?php
							$url = $_SERVER['REQUEST_URI'];
							if (
								// A: kaitori が無い
								strpos($url, 'kaitori') === false
								// OR
								// B: kaitori と shop が両方ある
								// || (strpos($url, 'kaitori') !== false && strpos($url, 'shop') !== false)
							)
						:?>
							<li class="sep">|</li>
							<li class=""><a href="<?php echo esc_url(home_url('/column/')); ?>" class="color-black bold">お買取コラム</a></li>
						<?php endif;?>
					  
					  
					</ul>
				</div>
            </div>
            <div class="right_area">
              <div class="d-f jc-a sns">
				<a href="https://www.instagram.com/jewelcafe.jp/" target="_blank" class="instagram_link"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/jewelcafe_insta.png" alt="" ></a>
                <a href="https://twitter.com/Jewel_Cafe" target="_blank" class="x_link"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/jewelcafe_x.png" alt="" ></a>
                <a href="https://jewelguma.base.shop/" target="_blank" class="jewelguma_link"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/jewelguma.png" alt="" ></a>
                <?php /* ?><a href="https://jewel-cafe.jp/about-line"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/jewelcafe_line.png" alt="" style="width:35px;" height="35" ></a><?php */ ?>
              </div>
            </div>
          </div>
        </div>


        <div class="header-sp">
          <div class="d-f jc-sb ai-c">
			<a href="<?php echo esc_url(home_url( ));?>"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/logo.png" class="header-logo-sp tablet" alt="最新相場で高価買取ならジュエルカフェ" width="115" height="100%"></a>		
            <div id="humberger" class="hidden-md hidden-lg">
              <!--<a href="#" class="menu d-ib"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/hamburger-menu.svg"></a>-->
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </div>
          </div>
        </div>



		
      </div>
    </header>
