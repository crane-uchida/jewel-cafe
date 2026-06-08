<div class="pink_bg">


		<div class="section-inner">
		


			<div class="point-title">
			
				<div class="point-title-inner d-f ai-c">
					<div class="point-kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/kaitori-kuma.png" alt="" ></div>
					<div class="only-sp">
							ジュエルカフェの<br/>
							<?php echo $post->post_title;?>買取ポイント
					</div>
				</div>
				
				<div class="point-bg">
					<p class="only-pc">ジュエルカフェの <?php echo $post->post_title;?>買取ポイント</p>
					<h2><?php echo the_title();?>買取にジュエルカフェが選ばれる理由</h2>
				</div>
				
			</div>		
			
			</div>
		
		
		


	<div class="section-inner bg-white">
	
		<div class="policies">

			<div class="d-f ai-t policies-wrap">
				<div class="policies-img"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rolex-new-policy-01.jpg" alt="プロの査定スタッフ"></div>
				<div class="policies-item-inner">
					<div class="red_bg policies-num color-white bold"><?php the_title();?>買取に強い理由 〈1〉</div>
					<h3 class="policies-title mt-10 mb-10 d-f ai-t"><span class="mr-10 only-sp ico-plus"></span><span class="ways90 reason_text">プロの査定スタッフ</h3>
					<div class="policy-text lh-20 justify">
						ジュエルカフェではプロの査定スタッフが丁寧に査定いたします。
						最新の価格データ、市場相場を加味して自信を持って査定し、お客様にご満足いただける価格をご提示できるように日々努めております。
					</div>
				</div>
			</div>




			

			<?php if(is_single('vuitton') || is_single('rolex-top') || is_single('letter-top') || is_single('gold')):?>	
				<style>
					.policies .policies-wrap .reason_text{
						font-size:35px;
					}
					.section-inner.w-auto{
						width: auto;
					}
					@media screen and (max-width: 990px){
						.policies .policies-wrap .reason_text{
							font-size:17px;
						}
						.policies .kaitori-purchase{
							padding:0;
						}
						.ex-purchase-list-name{
							line-height: 1.4;
						}
						.ex-purchase.type2 .ex-purchase-price div{
							display: inline;
							width: auto;
						}
						.ex-purchase.type2 ul.ex-purchase-list li .ex-purchase-label{
							position: initial;
							margin-top:20px;
						}
						.ex-purchase.type2 .ex-purchase-img{
							width: 100%;
						}
						.point-title-inner.unique{
							display: flex;
						}
						.point-title-inner.unique .point-kuma{
							width: auto;
						}
					}
					@media screen and (min-width: 991px){
						.ex-purchase-list-name{
							min-height:81px;
						}
					}
				</style>
				<section class="kaitori-purchase">		
					<div class="section-inner">
						<div class="point-title">
							<div class="point-title-inner unique d-f ai-c">
								<div class="point-kuma"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/kaitori-kuma.png" alt="" ></div>
								<div class="only-sp">ジュエルカフェの<br><?php echo $post->post_title;?>買取ポイント</div>
							</div>
							<div class="point-bg">
								<p class="only-pc">ジュエルカフェの <?php echo $post->post_title;?>買取ポイント</p>
								<h3><?php echo $post->post_title;?>買取価格を他社と比較して下さい！</h3>
							</div>
						</div>
						<p class="section-ttl-con lh-20 justify"><?php if( isset($purchase_desc) ){ echo $purchase_desc; }?></p>
					</div>
					<section class="ex-purchase type2">
						<div class="section-inner w-auto">
							<?php
								get_template_part( 'template-parts/new-ex-purchase' );
							?>
						</div>
					</section>
				</section>
			<?php endif;?>





			<div class="d-f ai-t policies-wrap">
				<div class="policies-img">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/rolex-new-policy-02.jpg" alt="海外に展開・独自販売ルートの確立">
				</div>
				<div class="policies-item-inner">
				
					<div class="red_bg policies-num color-white bold"><?php the_title();?>買取に強い理由 〈2〉</div>
					<h3 class="policies-title mt-10 mb-10 d-f ai-t"><span class="mr-10 only-sp ico-plus"></span><span class="ways90">国内外の独自販売ルート</span></h3>
					<div class="policy-text lh-20 justify">
						ジュエルカフェでは海外にも多数の営業拠点を展開。
						お買取した商品は国内外のネットワークを活かして販売に繋げるため、より高い高価買取を実現できます。
					</div>

				</div>
			</div>





			<div class="d-f ai-t policies-wrap">
				<div class="policies-img">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-03.jpg" alt="店舗の実績">
				</div>
				<div class="policies-item-inner">
				
					<div class="red_bg policies-num color-white bold"><?php the_title();?>買取に強い理由 〈3〉</div>
					<h3 class="policies-title mt-10 mb-10 d-f ai-t"><span class="mr-10 only-sp ico-plus"></span><span class="ways90">直営<?php echo get_option('shop'); ?>店舗の実績</span></h3>
					<div class="policy-text lh-20 justify">
						ジュエルカフェでは直営店舗として<?php echo get_option('shop'); ?>店舗以上の店舗を展開し、これまでに延べ300万人以上のお客様にご利用いただいております。
						これからもお客様に信頼していただけるよう努めてまいります。
					</div>

				</div>
			</div>
			
	




			<div class="d-f ai-t policies-wrap">
				<div class="policies-img">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-04.jpg" alt="様々な特典が利用可能">
				</div>
				<div class="policies-item-inner">
				
					<div class="red_bg policies-num color-white bold"><?php the_title();?>買取に強い理由 〈4〉</div>
					<h3 class="policies-title mt-10 mb-10 d-f ai-t"><span class="mr-10 only-sp ico-plus"></span><span class="ways90">様々な特典が利用可能</span></h3>
					<div class="policy-text lh-20 justify">
						ジュエルカフェでは、ご来店時にご利用いただける様々な特典をご用意しており、リピーターのお客様にも大変お喜びいただいております。
						Tポイントやジュエリークリーニングなども大好評です。
					</div>

				</div>
			</div>





			<div class="d-f ai-t policies-wrap">
				<div class="policies-img">
					<?php if(is_single('gold')):?>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-05b.jpg" alt="手数料無料で気軽に相談可能">
					<?php else:?>
						<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/policy-05.jpg" alt="気軽で便利な店舗立地">
					<?php endif;?>
				</div>
				<div class="policies-item-inner">
				
					<div class="red_bg policies-num color-white bold"><?php the_title();?>買取に強い理由 〈5〉</div>
					<h3 class="policies-title mt-10 mb-10 d-f ai-t">
						<span class="mr-10 only-sp ico-plus"></span>
						<span class="ways90">
							<?php if(is_single('gold')):?>
								手数料無料で気軽に相談可能
							<?php else:?>
								気軽で便利な店舗立地
							<?php endif;?>
						</span>
					</h3>
					<div class="policy-text lh-20 justify">
						<?php if(is_single('gold')):?>
							ジュエルカフェでは、査定料・手数料はすべて無料です。「これは売れるの？」「いくらくらいになる？」といったご相談だけでも大歓迎ですので、初めての方も安心してお気軽にご利用ください。
						<?php else:?>
							ジュエルカフェは大型ショッピングモールや駅前商店街など便利なエリアにお店を展開。お買い物ついでに気軽に立ち寄れる居心地の良い空間を私たちは常に目指しております。
						<?php endif;?>
					</div>

				</div>
			</div>
			

			
	</div>
	</div>

	
</div>