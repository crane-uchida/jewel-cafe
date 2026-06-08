<?php



if(strpos($_SERVER["QUERY_STRING"],'tokei') !== false	 ||	  strpos($_SERVER["QUERY_STRING"],'brand') !== false	){ 

	$new_group = get_field('買取実績その1');
	

	
}



	if(	trim($new_group['買取実績その1_画像'])!==''	){


?>
<section class="common-kaitori-resuluts">
  <div class="common-ttl">
    <div class="section-inner">


	<h2 class="shop-title <?php if ( $post->post_type =='shop' && $post->post_parent > 0 ):  echo 'shop';  else:  echo 'kaitori';  endif;?>-title">
			<span class="common-ttl-sub">
				ジュエルカフェ
				<?php
				$terms = get_the_terms($post->ID,'area');

				foreach($terms as $v){

					if( $v->parent >0  ){

						echo $v->name . ' - ';

					}

				}

				if($post->post_type == 'kaitori' && get_the_terms($post->ID, 'area')) :
					//品目 - 県ページの場合
					$kaitori_area_parent_id = $post->post_parent;
					$post_title = get_post( $kaitori_area_parent_id)->post_title;
				else:
					$post_title = str_replace('-時計買取','',trim($post->post_title));

					$post_title = str_replace('買取','',$post_title);
				endif;

				if (!( $post->post_type =='shop' && $post->post_parent > 0 )): echo 'の'.$post_title; else: echo $post_title;  endif;

				if ( $post->post_type =='shop' && $post->post_parent > 0 ):  echo '';  else:  echo '買取';  endif;

			?>
			</span>

			<span class="common-ttl-main"><span class="color-red">他店と差がつく</span>高価買取実績</span>
	</h2>

    </div>
  </div>


  <div class="section-inner">
    <ul class="item-list d-f jc-sb">
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

		//$get_data  = get_page_by_path($post_slug, OBJECT, 'kaitori');

		$count = 0 ;

        for($i=1; $i<=10; $i++){
			
			if($post->post_type == 'kaitori' && get_the_terms($post->ID, 'area')) :
				// 品目 - 県ページの場合
				$group = get_field('買取実績その'.$i, $post->post_parent);
			else:
				$group = get_field('買取実績その'.$i);
			endif;


			if($group['買取実績その'.$i.'_画像']){
		?>
		  <li class="mb-20">
			<div class="item-img">
			  <img src="<?php echo $group['買取実績その'.$i.'_画像']['sizes']['large'];?>">
			</div>
			<div class="p-10">
			  <p class="kaitoriName mb-4">
				<?php 
				
					if($group['買取実績その'.$i.'_買取名']){
					
					
						$group['買取実績その'.$i.'_買取名'] = str_replace(' ','',$group['買取実績その'.$i.'_買取名']);
						
						echo $group['買取実績その'.$i.'_買取名'];
				
					}
					
				?>
				</p>
			  <p class="ttl mb-10"><?php if($group['買取実績その'.$i.'_タイトル']){echo $group['買取実績その'.$i.'_タイトル'];} ?><br>お買取いたしました！</p>
			  <div class="priceBox d-f jc-sb">
				<div class="left color-red">高価買取実績</div>
				<div class="right color-red"><?php if($group['買取実績その'.$i.'_価格']){echo $group['買取実績その'.$i.'_価格'];} ?><span class="small">円</span></div>
			  </div>
			</div>
		  </li>
      <?php
				$count++;
			}

        }
      ?>
    </ul>



  </div>
</section>



<style>

.common-kaitori-resuluts .item-list li .kaitoriName{letter-spacing:-0.1px;}

.common-kaitori-resuluts .item-list li .ttl{
	
	min-height:65px;
	
}


@media screen and (min-width: 501px){

	.common-kaitori-resuluts .item-list li{width:19%;}

}

.common-kaitori-resuluts .item-list li .priceBox .right{
	
	width:100%;
	text-align:right;
	
}


.common-kaitori-resuluts .item-list li .priceBox .left{
	
	width:100%;
	margin-bottom:10px;
	
}

</style>

<?php
	}
?>

