<?php


$parent_id = $post->post_parent;

$slug = get_post($post->ID)->post_name;

$parent_slug = get_post($parent_id)->post_name;

$parent_parent_slug = get_post(get_post($parent_id)->post_parent)->post_name;


$args = array(
    'post_type'      => 'kaitori',
    'post_status'    => 'publish',
    'post_parent'    => $post->ID,
    'posts_per_page' => 1 // 하나의 자식 페이지만 찾으면 되므로 1로 설정
);

$child_pages = get_posts($args);





if(is_single('letter-top')){

	get_template_part('single/kaitori/single-kaitori-letter-test');


//品目 - 店舗 メイン
}else if($post->post_name == 'shop'){

	get_template_part('single/shop/single-kaitori-shop_main');
	
	
//品目 - 店舗都道府県ページ	
}else if($parent_slug == 'shop' && $slug !== 'hokkaido'  && $slug !== 'okinawa' ){

	get_template_part('single/shop/single-kaitori-shop_area');
	

//品目 - 店舗リスト

}else if( (!empty($child_pages) && strpos($_SERVER['REQUEST_URI'],'/shop/') !== false)  || $slug == 'hokkaido'  || $slug == 'okinawa' || $slug == 'aomori'  ||  $slug == 'fukushima'  || $slug == 'fukui'  || $slug == 'wakayama' || $slug == 'toyama'){

	get_template_part('single/shop/single-kaitori-shop_list');

//品目 - 店舗ページ	
}else if ( (empty($child_pages) && strpos($_SERVER['REQUEST_URI'],'/shop/') !== false) ) {
	
	get_template_part('single/shop/single-kaitori-shop_store');


	//切手
}else if($parent_slug == 'gold' && $slug == 'souba'){
	
	get_template_part('single/kaitori/single-kaitori-gold-souba');

	//相場

}else if($slug == 'gold'){

	get_template_part('single-kaitori-gold');
	
	//金の親

	//ルイヴィトン、シャネル、ロレックス、相場
}else if( ($parent_slug == 'rolex-top' || $parent_slug == 'chanel' || $parent_slug == 'vuitton' )     && $slug == 'souba'){

	get_template_part('single/kaitori/single-kaitori-brand-souba'); 


}else if( ($parent_slug == 'tokei' && $slug !== 'tokei') || $parent_slug == 'rolex-top' ){

	get_template_part('single/kaitori/single-kaitori-tokei'); 

	//時計、またはロレックス子供

}else if($parent_slug == 'brand' && $slug !== 'brand' ){


	get_template_part('single/kaitori/single-kaitori-brand'); 

	//ブランドの子供


	
}else if(get_the_terms($post->ID, 'area')){
	
	get_template_part('single/kaitori/single-kaitori-area'); 
	//エリア
	
	
	
}else if(strpos($_SERVER['REQUEST_URI'],'junk') !== false ){
	
	get_template_part('single/kaitori/single-kaitori-junk'); 
	//ボロボロ　ロレックス
	
	
}else if($post->post_parent < 1){
	
	get_template_part('single/kaitori/single-kaitori-parent'); 
	
	//すべての親


}else{
		
	get_template_part('single/kaitori/single-kaitori-child'); 
	
	//すべての子供

}

?>
