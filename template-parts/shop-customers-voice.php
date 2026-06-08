        <div class="shop-voice-list">


				<?php if( $args[0]->shop_customer_title1 ):?>
				
					<div class="shop-voice-list-item">
						<div class="d-f media jc-sb">
							<div class="voice-img">
							

								<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/<?php echo getCustomerImage($args[0]->shop_customer_attributes1);?>" alt="買取してもらったお客様">

							</div>
							<div class="voice-default">
								<div class="count-rating">
									<div class="rating-value mr-3"><?php echo $args[0]->shop_customer_score1;?></div>
                                    <div class="stars-flat"></div>
								</div>
								<div class="shop-customer-review-header bold">
									<p class="voice-ttl"><?php echo $args[0]->shop_customer_title1;?><span>

									<?php
										echo $args[0]->shop_customer_attributes1;
									?>


									</span></p>
								</div>
								<div class="mtb-12">
									<?php echo $args[0]->shop_customer_content1;?>
								</div>
							</div>
						</div>

						

						<div class="d-f media jc-sb mt-12">
							<div class="voice-img">
								<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/staff.png" alt="買取対応した店舗スタッフ">
							</div>
							<div class="voice-default">
								<p class="voice-ttl bold"><?php echo $args[0]->shop_staff_title1;?></p>
								<div class="mtb-12">
									<?php echo $args[0]->shop_staff_content1;?>
								</div>
							</div>
						</div>

					</div>

					<?php endif;?>







				<?php if( $args[0]->shop_customer_title2 ):?>
				
					<div class="shop-voice-list-item">
						<div class="d-f media jc-sb">
							<div class="voice-img">


								<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/<?php echo getCustomerImage($args[0]->shop_customer_attributes2);?>" alt="買取してもらったお客様">

							</div>
							<div class="voice-default">
								<div class="count-rating">
									<div class="rating-value mr-3"><?php echo $args[0]->shop_customer_score2;?></div>
                                    <div class="stars-flat"></div>
								</div>
								<div class="shop-customer-review-header bold">
									<p class="voice-ttl"><?php echo $args[0]->shop_customer_title2;?><span>

									<?php
										echo $args[0]->shop_customer_attributes2;
									?>
									</span></p>
								</div>
								<div class="mtb-12">
									<?php echo $args[0]->shop_customer_content2;?>
								</div>
							</div>
						</div>
						
						

						

						<div class="d-f media jc-sb mt-12">
							<div class="voice-img">
								<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/staff.png" alt="買取対応した店舗スタッフ">
							</div>
							<div class="voice-default">
								<p class="voice-ttl bold"><?php echo $args[0]->shop_staff_title2;?></p>
								<div class="mtb-12">
									<?php echo $args[0]->shop_staff_content2;?>
								</div>
							</div>
						</div>

					</div>

					<?php endif;?>










				<?php if( $args[0]->shop_customer_title3 ):?>
								
					<div class="shop-voice-list-item">
						<div class="d-f media jc-sb">
							<div class="voice-img">

								<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shop/<?php echo getCustomerImage($args[0]->shop_customer_attributes3);?>" alt="買取してもらったお客様">
							</div>
							<div class="voice-default">
								<div class="count-rating">
									<div class="rating-value mr-3"><?php echo $args[0]->shop_customer_score3;?></div>
                                    <div class="stars-flat"></div>
								</div>
								<div class="shop-customer-review-header bold">
									<p class="voice-ttl">

									<?php echo $args[0]->shop_customer_title3; ?>

									<span>

										<?php
	
											echo $args[0]->shop_customer_attributes3;

										?>

									</span>

									</p>
								</div>
								<div class="mtb-12">

											<?php

												if( $args[0]->shop_customer_content3 == '' ):

													echo '少しでも高く売りたいと思い、インターネットなどで買取店を調べて、何店舗か回ってみました。その中でもジュエルカフェ'. $args[0]->shop_name .'さんは新聞チラシでもよく見かけていて名前を知っていたので期待して行ったのですが、30年近く前に夫が購入した傷だらけのロレックスでも驚くような値段がつきました。もちろん、何店舗か回った他店さんより高かったです。スタッフさんの応対も親切で、査定内容も納得できるものでしたので、最後はジュエルカフェ'. $args[0]->shop_name .'さんにて買い取っていただくことにしました。また何かお願いしたいと思います。';


												else:

													echo $args[0]->shop_customer_content3;

												endif;

											?>

								</div>
							</div>
						</div>
						



						<div class="d-f media jc-sb mt-12">
							<div class="voice-img">
								<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/common/staff.png" alt="買取対応した店舗スタッフ">
							</div>
							<div class="voice-default">
								<p class="voice-ttl bold">

									<?php

									if( $args[0]->shop_staff_title3 == '' ):
									
											echo 'ジュエルカフェ'.$args[0]->shop_name.'にお越しいただき、ありがとうございました！';

									else:

										echo $args[0]->shop_staff_title3;

									endif;

									?>

								</p>
								<div class="mtb-12 voice-user">

										<?php
										
										
										
										if( $args[0]->shop_staff_content3 == '' ):
										
												echo 'この度はジュエルカフェ'. $args[0]->shop_name .'の買取査定をご利用いただきありがとうございました。拝見した商品は確かに年代・状態ともにやや古いモデルではありましたが、ロレックスはヴィンテージに近いものであっても価格が高騰しており、買った当時よりも高く売れるケースも多々ございます。また、事前にお電話で来店予約をしてくださったことによりキャッシュバックキャンペーンの対象となったため、+αのお値段でお買取させていただきました。
												ジュエルカフェ'. $args[0]->shop_name .'では時計の他にも貴金属ジュエリーやブランド品など、幅広い品目をお買取しています。1つからでも大丈夫ですので、ぜひまたのご利用をお待ちしております。';

										else:

											echo $args[0]->shop_staff_content3;

										endif;

										?>


								</div>
							</div>
						</div>

					</div>
				<?php
					endif;
				?>




        </div>


<!-- 評価値（.rating-value）を元に星（.stars-flat）を自動生成 -->
<script>
  // .rating-value が複数ある場合に対応してループ処理
  document.querySelectorAll('.rating-value').forEach(function(ratingEl) {
    const rating = parseFloat(ratingEl.textContent);
    const container = ratingEl.nextElementSibling;

    const full  = Math.floor(rating);
    const half  = (rating % 1 >= 0.5) ? 1 : 0;
    const empty = 5 - full - half;

    let html = '';
    for (let i = 0; i < full;  i++) html += '<span class="star full">★</span>';
    if (half)                           html += '<span class="star half"></span>';
    for (let i = 0; i < empty; i++) html += '<span class="star">★</span>';

    container.innerHTML = html;
  });
</script>




<!-- レビュースニペット -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "<?php echo $args[0]->shop_name;?>",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "<?php echo $args[0]->shop_score;?>",
    "reviewCount": "<?php echo $args[0]->shop_reviews;?>"
  },
  "review": [
    {
      "@type": "Review",
      "author": { "@type": "Person", "name": "<?php echo $args[0]->shop_customer_attributes1;?>" },
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "<?php echo $args[0]->shop_customer_score1;?>"
      },
      "reviewBody": "<?php echo $args[0]->shop_customer_content1;?>"
    },
    {
      "@type": "Review",
      "author": { "@type": "Person", "name": "<?php echo $args[0]->shop_customer_attributes2;?>" },
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "<?php echo $args[0]->shop_customer_score2;?>"
      },
      "reviewBody": "<?php echo $args[0]->shop_customer_content2;?>"
    },
    {
      "@type": "Review",
      "author": { "@type": "Person", "name": "<?php echo $args[0]->shop_customer_attributes3;?>" },
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "<?php echo $args[0]->shop_customer_score3;?>"
      },
      "reviewBody": "<?php echo $args[0]->shop_customer_content3;?>"
    }
  ]
}
</script>