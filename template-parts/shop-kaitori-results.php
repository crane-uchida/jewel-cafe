<?php


	$field_id = 151;


?>

<section class="common-kaitori-resuluts" id="js-achievement">
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

				$post_title = str_replace('-時計買取','',trim($post->post_title));

				$post_title = str_replace('買取','',$post_title);

				if (!( $post->post_type =='shop' && $post->post_parent > 0 )): echo 'の'.$post_title; else: echo $post_title;  endif;

				if ( $post->post_type =='shop' && $post->post_parent > 0 ):  echo '';  else:  echo '買取';  endif;

			?>
			</span>

			<span class="common-ttl-main"><span class="color-red">他店と差がつく</span>高価買取実績</span>
	</h2>

    </div>
  </div>


  <div class="section-inner">


	<div class="only-pc">
		  <?php

if ( ! empty( $pages ) ) {
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
} else {
		$page = 0;
	}

			echo '<ul class="item-list d-f jc-sb">';


			//$get_data  = get_page_by_path($post_slug, OBJECT, 'kaitori');

			$count = 0 ;

			for($i=1; $i<=10; $i++){

				$group = get_field('買取実績その'.$i , $field_id);


				if($group['買取実績その'.$i.'_画像']){
			?>
			  <li class="mb-20">
				<div class="item-img">
				  <img src="<?php echo $group['買取実績その'.$i.'_画像']['sizes']['large'];?>" alt="<?php echo trim(str_replace('-時計買取','',$post->post_title));?>の時計買取実績">
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






	<div class="only-sp">


		<div class="swiper mySwiper">



		<ul class="new-item-list swiper-wrapper">

		<?php
			$count = 0 ;

			for($i=1; $i<=10; $i++){

				$group = get_field('買取実績その'.$i , $field_id);


				if(trim($group['買取実績その'.$i.'_画像']['sizes']['large']) !== ''){

		?>
			  <li class="mb-20 swiper-slide">

				<div style="text-align:left;">

					<div class="item-img mb-10">
						 <img src="<?php echo $group['買取実績その'.$i.'_画像']['sizes']['large'];?>">
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




  </div>


</section>








<!-- Demo styles -->
<style>


  .common-kaitori-resuluts .item-list{

		flex-wrap:nowrap;
		justify-content:center;


  }





  .new-item-list li .kaitoriName{

	  color:#ccc;
	  font-size:10px;
	  text-align:left;
	  height:25px;
	  margin-bottom:10px;
	  padding-left:10px;


  }





  .common-kaitori-resuluts .new-item-list li .priceBox .left{

	  font-size:12px;
	  margin-bottom:0px;
	  width:100%;
	  text-align:left;

  }


  .common-kaitori-resuluts .new-item-list li .priceBox .right{

	  font-size:20px;
	  width:100%;
	  text-align:right;
	  letter-spacing:-0.3px;

  }

  .common-kaitori-resuluts .new-item-list li .ttl{

		font-size:10px;
		min-height:58px;
		padding-left:10px;

  }



  .common-kaitori-resuluts .new-item-list li .priceBox .right .small{

	  font-size:10px;

  }






  @media (min-width: 800px) {

	  .common-kaitori-resuluts .item-list{

			flex-wrap:wrap;
			justify-content:center;


	  }


		.common-kaitori-resuluts .item-list li{

			width:19%;
			margin-right:10px;

		}


		.common-kaitori-resuluts .item-list li:nth-child(5n) {

			margin-right:0px;

		}





		.common-kaitori-resuluts .item-list li .priceBox .right{

			width:100%;


		}


		.common-kaitori-resuluts .item-list li .priceBox .left{

			width:100%;
			margin-bottom:10px;

		}


  }



      .swiper {
        width: 100%;
        height: 100%;
      }






      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
		width:80%;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }






</style>









<!-- Initialize Swiper -->
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
