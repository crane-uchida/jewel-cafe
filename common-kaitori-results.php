<?php

if (has_term('brand', 'hinmoku')){


	$check_field1 = JC_check_field( $post->ID , '買取実績その' );

}else if (has_term('tokei', 'hinmoku')){


	$check_field1 = JC_check_field( $post->ID , '買取実績その' );

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



			

	if( $check_field1  > 0  ||  $check_field2 > 0){
?>

<style>

.common-kaitori-resuluts .item-list li{width:47%;margin-right:10px;}

.common-kaitori-resuluts .rolex-sp{position:relative;height:800px;overflow:hidden;}

.common-kaitori-resuluts .slide-down {
  height: auto;
  overflow: visible;
  padding-bottom: 50px;
}



@media screen and (min-width: 501px){
	
.common-kaitori-resuluts .item-list li{width:19%;margin-right:10px;}

}

</style>



<section class="common-kaitori-resuluts">
  <div class="common-ttl">
    <div class="section-inner">


	<h2 class="shop-title <?php if ( $post->post_type =='shop' && $post->post_parent > 0 ):  echo 'shop';  else:  echo 'kaitori';  endif;?>-title">
			<span class="common-ttl-sub">



				<?php
				$is_area =  get_the_terms($post->ID, 'area');

				global $custom_title;



				if(is_array($is_area) && count($is_area) >0 && $post->post_parent  > 0 && !is_single('junk-rolex')  ){


					echo trim($post->post_title) . 'の'.$custom_title.'買取ならジュエルカフェ';


				}else{

					echo 'ジュエルカフェ';

					$terms = get_the_terms($post->ID,'area');

					if( is_array($terms) ){

					foreach($terms as $v){

						if( $v->parent >0  ){

							echo $v->name . ' - ';

						}

					}

					}

					$post_title = str_replace('-時計買取','',trim($post->post_title));

					$post_title = str_replace('買取','',$post_title);

					if (!( $post->post_type =='shop' && $post->post_parent > 0 )): echo 'の'.$post_title; else: echo $post_title;  endif;

					if ( $post->post_type =='shop' && $post->post_parent > 0 ):  echo '';  else:  echo '買取価格';  endif;
				}

			

			?>




			</span>




			<?php if(is_single('k18')):?>
				<span class="common-ttl-main">18金(K18)の買取参考価格</span>
			<?php else:?>
				<span class="common-ttl-main"><span class="color-red">他店と差がつく</span>高価買取実績</span>
			<?php endif;?>



	</h2>

    </div>
  </div>


  <div class="section-inner">



	<div class="only-pc">
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



			for($i=1; $i<=12; $i++){

				$group = get_field('買取実績その'.$i , $field_id);



				if(is_single('k18')){
									
					if( strpos($group['買取実績その'.$i.'_タイトル'], '18金') !== false) {}else{ continue; }		
					
				} 

			
				

				if($group['買取実績その'.$i.'_画像']){
			?>
			  <li class="mb-20">
				<div class="item-img">
				
					<img src="<?php echo $group['買取実績その'.$i.'_画像']['sizes']['large']; ?>" alt="<?php echo strip_tags($group['買取実績その'.$i.'_タイトル']);?>" />
				  
				</div>
				<div class="p-10">
				  <p class="kaitoriName mb-4"><?php if($group['買取実績その'.$i.'_買取名']){echo $group['買取実績その'.$i.'_買取名'];} ?></p>
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





<?php if(!is_single('rolex')){?>
	<div class="only-sp">

		<div class="swiper mySwiper">

		<ul class="new-item-list swiper-wrapper">

		<?php
			$count = 0 ;
			


			for($i=1; $i<=10; $i++){

				$group = get_field('買取実績その'.$i , $field_id);


				if(trim($group['買取実績その'.$i.'_画像']['sizes']['large']) !== ''){
					

				if(is_single('k18')){
									
					if( strpos($group['買取実績その'.$i.'_タイトル'], '18金') !== false) {}else{ continue; }		
					
				} 


		?>
			  <li class="mb-20 swiper-slide">

				<div style="text-align:left;">

					<div class="item-img mb-10">
						 
						 <img src="<?php echo $group['買取実績その'.$i.'_画像']['sizes']['large']; ?>" alt="<?php echo strip_tags($group['買取実績その'.$i.'_タイトル']);?>" />
						 
					</div>
				  <p class="kaitoriName mb-4"><?php if($group['買取実績その'.$i.'_買取名']){echo $group['買取実績その'.$i.'_買取名'];} ?></p>
				  <p class="ttl"><?php if($group['買取実績その'.$i.'_タイトル']){echo $group['買取実績その'.$i.'_タイトル'];} ?><br>お買取いたしました！</p>
				  <div class="p-10 priceBox jc-sb">
					<div class="left color-red">高価買取実績</div>
					<div class="right color-red"><?php if($group['買取実績その'.$i.'_価格']){echo $group['買取実績その'.$i.'_価格'];} ?><span class="small">円</span></div>
				  </div>
				</div>
			  </li>
			<?php
				}

			}
			?>


		</ul>


		</div>

	</div>

	<?php
}else{
	

?>
	<div class="only-sp rolex-sp">

		<ul class="item-list d-f">
		
		<?php
			//$get_data  = get_page_by_path($post_slug, OBJECT, 'kaitori');

			$count = 0 ;

			for($i=1; $i<=12; $i++){

				$group = get_field('買取実績その'.$i , $field_id);


				if(is_single('k18')){
									
					if( strpos($group['買取実績その'.$i.'_タイトル'], '18金') !== false) {}else{ continue; }		
					
				} 


				if($group['買取実績その'.$i.'_画像']){
			?>
			  <li class="mb-20">
				<div class="item-img">

				  <img src="<?php echo $group['買取実績その'.$i.'_画像']['sizes']['large']; ?>" alt="<?php echo strip_tags($group['買取実績その'.$i.'_タイトル']);?>" />
				</div>
				<div class="p-10">
				  <p class="kaitoriName mb-4"><?php if($group['買取実績その'.$i.'_買取名']){echo $group['買取実績その'.$i.'_買取名'];} ?></p>
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
	
		<div class="more-btn rolex-btn">
			<p class="open">もっと見る</p>
		</div>		
	
	
	
	</div>
	
<?php	
}	
	?>

  </div>

</section>


<?php if(!is_single('rolex-top')){?>








<!-- common-kaitori-results  Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
	slidesPerView: 2,
	spaceBetween: 10,
	loop: true,
	autoplay: {
	   delay: 2500,
	   disableOnInteraction:false
	 },
	centeredSlides: true,
	pagination: {
	  el: ".swiper-pagination",
	  clickable: true,
	},

  });
</script>
<?php
}
?>




<?php
	}
?>
