
<?php

$shop_tokei_id = 151;


?>

<div class="market-price-content">

	<div class="market-price-wrap" id="market-price-wrap">


		<div class="ttl-wrap">

			<div class="ttl-minamino only-sp">
				<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/minamino.png" alt="ブランド腕時計買取相場高騰中" />	
			</div>
			
			<div class="common-ttl">
				<div class="section-inner">
					<h2 class="kaitori-title">
						<span class="common-ttl-sub"><?php the_field('タイトル1' , $shop_tokei_id);?></span>
						<div class="common-ttl-main"><?php the_field('タイトル2' , $shop_tokei_id);?><span class="maker"><?php the_field('赤タイトル' , $shop_tokei_id);?></span></div>
					</h2>
				</div>
			</div>
			
		</div>



		<div class="market-content">
		
		<div class="market-model only-pc">
			<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/minamino.png" alt="ブランド腕時計買取相場高騰中" />	
			<div class=" only-pc pc-note">
				<?php
					if( trim(get_field('備考' , $shop_tokei_id)) !== '' ){ echo get_field('備考' , $shop_tokei_id);}
				?>
			</div>
		</div>		
		
		
		
		<div class="maket-more animated">

			<table cellpadding="0" cellspacing="0" width="100%" class="maket-price-table">
				<tr>
					<td class="date">ブランド腕時計品目</td>
					<td class="date"><?php echo the_field('以前年度' , $shop_tokei_id);?>年</td>
					<td class="date new"><span class="price"><?php echo date('Y');?>年</span></td>
				</tr>
	
				<?php
				
					$img_alt = ['','ロレックスデイトナ','ロレックスGMTマスターⅡ','ロレックスサブマリーナ','オメガスピードマスター','オメガスピードマスター','オメガシーマスター'];
				
				
					for($i=1; $i <= 6; $i++){
					
					$image = get_field('相場比較画像'.$i , $shop_tokei_id);
				?>
				
				
				<tr>	
					<td class="item" valign="middle">
						<div>
						
							<?php
								if( trim($image['url']) !== '' ){
									
									echo '<img src=" '.$image['url'].'" alt="" class="maket-price-img" alt="'.$img_alt[$i].'" />';
				
								}else{
									
									echo '<div style="width:50px;height:50px;"></div>';
									
								}
							?>

						</div>
						

						<div>
							<div>
								<?php 
								
									$shopname = get_field('相場比較ブランド名'.$i , $shop_tokei_id);
									
									if( trim($shopname) !== '' ){ echo $shopname; }
									
								?>
							</div>


							<div>
								<?php 
								
									$shopname = get_field('相場比較種類'.$i , $shop_tokei_id);
									
									if( trim($shopname) !== '' ){ echo $shopname; }
									
								?>
							</div>


							<div class="code">
								<?php
									$modelname = get_field('相場比較品番'.$i , $shop_tokei_id);
									
									if( trim($modelname) !== '' ){ echo $modelname; }								

								?>
							</div>
					</div>
				
					</td>
					<td align="center" valign="middle" class="old">
					<?php
						$old_price = get_field('以前の価格'.$i , $shop_tokei_id);
						
						if( trim($old_price) !== '' ){ echo '&yen;'.$old_price; }
					
					?>
					</td>
					<td align="center" valign="middle" class="new">
						<span class="price">
							<?php
								$new_price = get_field('現在の価格'.$i , $shop_tokei_id);
								
								if( trim($new_price) !== '' ){ echo '&yen;'.$new_price; }							
							
							?>
						</span>
						
					</td>
				</tr>
				<?php
				
					}
				?>
			</table>
			
			
			<div class="more-btn only-sp"><p class="open">もっと見る</p></div>
		
			
			<p class="note only-sp">
				<?php
					if( trim(get_field('備考' , $shop_tokei_id)) !== '' ){ echo get_field('備考' , $shop_tokei_id);}
				?>
			</p>
			
		</div>
			
			

			
			
		</div>	
			
	</div>

</div>





	
<style>



/* ブランド腕時計買取相場 */

.market-price-content{padding:20px 0px;}


.market-price-wrap .ttl-wrap{
	
	display:flex;
	font-size:16px;
	align-items:top;	

}







.market-price-wrap{background:#fff;border-radius:10px;padding:12px;padding-bottom:0px;}


#market-price-wrap .deco{font-size:14px;letter-spacing:0.5px;padding:15px 0px;padding-bottom:5px; margin-top:10px;}


#market-price-wrap .ttl{font-size:25px;font-weight:bold;color:#000;}

#market-price-wrap .ttl-minamino{width:100px;overflow:hidden;height:130px;}


#market-price-wrap .ttl-minamino img{max-width:90px;}


#market-price-wrap .maker{
	
	background:linear-gradient(transparent 70%,#ff0 0%);
	height:28px;
	line-height:28px;
	color:#f00200;
	position:absolute;
	
}


#market-price-wrap .date{
	
	padding:10px 0px;
	border-right:1px solid #fbcfac;
	letter-spacing:-0.5px;
	text-align:center;
	font-weight:bold;
}



#market-price-wrap .old{
	
	color:#323232;
	
}


#market-price-wrap .new{
	
	color:#f00200;
	font-weight:bold;
	background:#ffdac7;

}




.maket-price-table td{border-right:1px solid #fbcfac;font-size:12px;padding:5px;vertical-align: middle;letter-spacing:-1px;}


#market-price-wrap  .maket-price-img{
	
	width:40px;
	margin-right:5px;
	
}


.market-price-wrap table .item{
	
	display:flex;
	font-size:13px;
	align-items: center;


}


.pc-note{padding:0px 10px;font-size:10px;position:relative;}



.maket-more{
	
	height:270px;
	position:relative;
	overflow:hidden;
	
}



@media screen and (min-width: 800px){

	.maket-more{
		
		position:relative;
		height:auto;

	}
	
	#market-price-wrap .date{font-size:15px;}

	#market-price-wrap .old{ width:200px;}
	
	#market-price-wrap .new{ width:200px;}

	.maket-price-table td{border-right:1px solid #fbcfac;font-size:20px;padding:5px 0px;vertical-align: middle;letter-spacing:1px;}

	#market-price-wrap .deco{font-size:25px;letter-spacing:0;padding:0px;}

	#market-price-wrap .ttl{font-size:35px;font-weight:bold;color:#000;margin-bottom:15px;}

	.market-price-wrap{background:#fff;border-radius:10px;padding:40px;padding-bottom:20px;}
	
	#market-price-wrap .maker{
		
		background:linear-gradient(transparent 70%,#ff0 0%);
		height:50px;
		line-height:60px;
		color:#f00200;
		font-size:45px;
		position:absolute;
		
	}
	
	
	#market-price-wrap  .maket-price-img{
		
		width:50px;
		margin-right:10px;
		
	}

	.market-price-wrap table .item{
		
		display:flex;
		font-size:14px;
		width:300px;
		align-items: center;
		justify-content: left;

	}
	
	
	.market-content{
		
		display:flex;
		font-size:16px;
		align-items:top;
		
	}



}









.maket-price-table{
	
	border-collapse: separate;
	border-spacing: 0px;
	border:1px solid #fbcfac;

}


.maket-price-table td{

	border-bottom:1px solid #fbcfac;

}


.maket-price-table tr:last-child td{

	border-bottom:0px;

}




.market-price-wrap table .item div{
	
	vertical-align: middle;
	
}



.market-model img{
	
	max-width:290px;

}


.code{
	
	font-size:10px;
	
}


.note{
	
	font-size:10px;
	padding:15px 0px;
	
}






</style>





	