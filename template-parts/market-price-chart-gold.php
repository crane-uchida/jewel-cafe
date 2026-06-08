
<!--	
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
!-->

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script> 


<?php

$date = new DateTime();
$date->modify('-2 years');

$before_last_year = $date->format('Y-m-d');       // 표시 날짜 그대로 유지
$before_last_year_string = $date->format('Y年m月d日');

$search_base_date = $before_last_year;   // 검색용 날짜 (뒤로 이동)

$found_row = null;

for ($i = 0; $i < 10; $i++) {

    $check_date = date("Y-m-d", strtotime("-{$i} day", strtotime($search_base_date)));

    $sql = $wpdb->prepare("
        SELECT *
        FROM wp_goldchart
        WHERE DATE(gold_time) = %s
        ORDER BY id DESC
        LIMIT 1
    ", $check_date);

    $result = $wpdb->get_results($sql);

    if (!empty($result)) {
        $found_row = $result[0];   // 가격만 이 날로 가져옴
        break;
    }
}

if ($found_row) {
    $before_last_year_result = [ $found_row ];
} else {
    $before_last_year_result = [];
}




$date = new DateTime();

$date->modify('-1 years');

$last_year =  $date->format('Y-m-d');

$last_last_year_string =  $date->format('Y年m月d日');


$found_row = null;

for ($i = 0; $i < 10; $i++) {

    $check_date = date("Y-m-d", strtotime("-{$i} day", strtotime($last_year)));

    $sql = $wpdb->prepare("
        SELECT *
        FROM wp_goldchart
        WHERE DATE(gold_time) = %s
        ORDER BY id DESC
        LIMIT 1
    ", $check_date);

    $result = $wpdb->get_results($sql);

    if (!empty($result)) {
        $found_row = $result[0];
        $last_year = $check_date;
        break;
    }
}


if ($found_row) {
    $last_year_result = [ $found_row ];
} else {
    $last_year_result = [];
}




$today_sql = "
(
  SELECT *
  FROM `wp_goldchart`
  WHERE DATE(STR_TO_DATE(`gold_time`, '%Y-%m-%d %H:%i:%s')) = CURDATE()
  ORDER BY STR_TO_DATE(`gold_time`, '%Y-%m-%d %H:%i:%s') DESC
  LIMIT 1
)
UNION ALL
(
  SELECT *
  FROM `wp_goldchart`
  WHERE DATE(STR_TO_DATE(`gold_time`, '%Y-%m-%d %H:%i:%s')) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)
  ORDER BY STR_TO_DATE(`gold_time`, '%Y-%m-%d %H:%i:%s') DESC
  LIMIT 1
)
ORDER BY STR_TO_DATE(`gold_time`, '%Y-%m-%d %H:%i:%s') DESC
";


$today_result = $wpdb->get_results($today_sql);






$date = new DateTime();

$date->modify('-1 day');

$yesterday_year =  $date->format('Y-m-d');

$yesterday_sql = "
SELECT *
FROM `wp_goldchart`
WHERE DATE(STR_TO_DATE(`gold_time`, '%Y-%m-%d %H:%i:%s')) = '{$yesterday_year}'
ORDER BY STR_TO_DATE(`gold_time`, '%Y-%m-%d %H:%i:%s') DESC
LIMIT 1
";

$yesterday_result = $wpdb->get_results($yesterday_sql);





?>




<div class="gold_souba_banner">
	<div class="content">
		<div class="title_box">
			
			<?php
				if(is_single('k24') || is_single('k23') || is_single('k22') || is_single('k21_6') || is_single('k20') || is_single('k18') || is_single('k14') || is_single('k12') || is_single('k10') || is_single('k9') || is_single('k8') ){}else{ echo '<p class="text">歴史的高騰が続いています!</p>'; }

			?>
		
	
		
		


			<?php
				
					if(is_single('k24') || is_single('k23') || is_single('k22') || is_single('k21_6') || is_single('k20') || is_single('k18') || is_single('k14') || is_single('k12') || is_single('k10') || is_single('k9') || is_single('k8') ):
							
						$post->post_title = str_replace('/純金','',$post->post_title);
						
						echo '<div class="title type2">'.$post->post_title.'<br>';

					else:
					
						echo '<div class="title">金';

					 endif;
					
				echo '相場速報</div>';
					 
			?>
			
		</div>
		
		
		
		
		
		<div class="today_box">
			<div class="today_date"><?php echo date('Y');?>年<?php echo date('m');?>月<?php echo date('d');?>日</div>
			<div class="the_day_before_box">
				<div class="balloon">
					<p class="text2">前日比</p>
					
						<?php 

						if(is_single('k24') && isset($today_result[0]) && isset($yesterday_result[0])):
						
							$yesterday_price =  $today_result[0]->k24_price - $yesterday_result[0]->k24_price;
							
						elseif(is_single('k23') && isset($today_result[0]) && isset($yesterday_result[0])):
						
							$yesterday_price =  $today_result[0]->k23_price - $yesterday_result[0]->k23_price;
						
						elseif(is_single('k22') && isset($today_result[0]) && isset($yesterday_result[0])):
						
							$yesterday_price =  $today_result[0]->k22_price - $yesterday_result[0]->k22_price;
						
						elseif(is_single('k21_6') && isset($today_result[0]) && isset($yesterday_result[0])):
						
							$yesterday_price =  $today_result[0]->k21_6_price - $yesterday_result[0]->k21_6_price;
								
						elseif(is_single('k20') && isset($today_result[0]) && isset($yesterday_result[0])):
						
							$yesterday_price =  $today_result[0]->k20_price - $yesterday_result[0]->k20_price;	
								
						elseif(is_single('k18') && isset($today_result[0]) && isset($yesterday_result[0])):
						
							$yesterday_price =  $today_result[0]->k18_price - $yesterday_result[0]->k18_price;
	
						elseif(is_single('k14') && isset($today_result[0]) && isset($yesterday_result[0])):
						
							$yesterday_price =  $today_result[0]->k14_price - $yesterday_result[0]->k14_price;
	
						elseif(is_single('k12') && isset($today_result[0]) && isset($yesterday_result[0])):
						
							$yesterday_price =  $today_result[0]->k12_price - $yesterday_result[0]->k12_price;
						
						elseif(is_single('k10') && isset($today_result[0]) && isset($yesterday_result[0])):
						
							$yesterday_price =  $today_result[0]->k10_price - $yesterday_result[0]->k10_price;
							
						elseif(is_single('k9') && isset($today_result[0]) && isset($yesterday_result[0])):
						
							$yesterday_price =  $today_result[0]->k9_price - $yesterday_result[0]->k9_price;
	
						elseif(is_single('k8') && isset($today_result[0]) && isset($yesterday_result[0])):
						
							$yesterday_price =  $today_result[0]->k8_price - $yesterday_result[0]->k8_price;
	
						else:
						
							if (!empty($today_result[0]) && !empty($yesterday_result[0])) {
								$today_price = (float)($today_result[0]->gold_price ?? 0);
								$yesterday_price_val = (float)($yesterday_result[0]->gold_price ?? 0);
								$yesterday_price = $today_price - $yesterday_price_val;
							} else {
								$yesterday_price = 0;
							}
							
						 endif;

						echo '<div class="value_the_day_before">'.($yesterday_price > 0 ? '+' : '') .$yesterday_price .'<span class="en">円</span></div>';

						 ?>
					
					</div>
				</div>
			
					<?php
											
						if (!empty($today_result[0])) {
							$today_result[0]->gold_price = str_replace(' ', '', (string)$today_result[0]->gold_price);
						}

						if(is_single('k24') && isset($today_result[0])):
							echo '<div class="value_today">'.number_format($today_result[0]->k24_price).'<span class="en">&nbsp;円/g</span></div>';
							
						elseif(is_single('k23') && isset($today_result[0])):
						
							echo '<div class="value_today">'.number_format($today_result[0]->k23_price).'<span class="en">&nbsp;円/g</span></div>';
						
						elseif(is_single('k22') && isset($today_result[0])):
						
							echo '<div class="value_today">'.number_format($today_result[0]->k22_price).'<span class="en">&nbsp;円/g</span></div>';
						
						elseif(is_single('k21_6') && isset($today_result[0])):
						
							echo '<div class="value_today">'.number_format($today_result[0]->k21_6_price).'<span class="en">&nbsp;円/g</span></div>';
								
						elseif(is_single('k20') && isset($today_result[0])):
						
							echo '<div class="value_today">'.number_format($today_result[0]->k20_price).'<span class="en">&nbsp;円/g</span></div>';
								
						elseif(is_single('k18') && isset($today_result[0])):
						
							echo '<div class="value_today">'.number_format($today_result[0]->k18_price).'<span class="en">&nbsp;円/g</span></div>';
	
						elseif(is_single('k14') && isset($today_result[0])):
						
							echo '<div class="value_today">'.number_format($today_result[0]->k14_price).'<span class="en">&nbsp;円/g</span></div>';
	
						elseif(is_single('k12') && isset($today_result[0])):
						
							echo '<div class="value_today">'.number_format($today_result[0]->k12_price).'<span class="en">&nbsp;円/g</span></div>';
						
						elseif(is_single('k10') && isset($today_result[0])):
						
							echo '<div class="value_today">'.number_format($today_result[0]->k10_price).'<span class="en">&nbsp;円/g</span></div>';
							
						elseif(is_single('k9') && isset($today_result[0])):
						
							echo '<div class="value_today">'.number_format($today_result[0]->k9_price).'<span class="en">&nbsp;円/g</span></div>';
	
						elseif(is_single('k8') && isset($today_result[0])):
						
							echo '<div class="value_today">'.number_format($today_result[0]->k8_price).'<span class="en">&nbsp;円/g</span></div>';

						else:
							if (isset($today_result[0]) && is_numeric($today_result[0]->gold_price)) {
								echo '<div class="value_today">'
									. number_format((float)$today_result[0]->gold_price)
									. '<span class="en">&nbsp;円/g</span></div>';
							} else {
								echo '<div class="value_today">-<span class="en">&nbsp;円/g</span></div>';
							}
						endif;
					?>

		</div>

		<div class="past_box">
			<div class="text3">過去価格と比べて大幅高騰!</div>
			<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/gold_souba_line.svg" alt="ライン" />
			<ul class="past_flex">
				<li>
					<div class="last_year_date"><?php echo $before_last_year_string;?></div>
						 
						<?php 
						
						if(is_single('k24') && isset($before_last_year_result[0])):
							echo '<div class="value_last_year">'.number_format($before_last_year_result[0]->k24_price).'<span class="en">&nbsp;円/g</span></div>';
							
						elseif(is_single('k23') && isset($before_last_year_result[0])):
						
							echo '<div class="value_last_year">'.number_format($before_last_year_result[0]->k23_price).'<span class="en">&nbsp;円/g</span></div>';
						
						elseif(is_single('k22') && isset($before_last_year_result[0])):
						
							echo '<div class="value_last_year">'.number_format($before_last_year_result[0]->k22_price).'<span class="en">&nbsp;円/g</span></div>';
						
						elseif(is_single('k21_6') && isset($before_last_year_result[0])):
						
							echo '<div class="value_last_year">'.number_format($before_last_year_result[0]->k21_6_price).'<span class="en">&nbsp;円/g</span></div>';
								
						elseif(is_single('k20') && isset($before_last_year_result[0])):
						
							echo '<div class="value_last_year">'.number_format($before_last_year_result[0]->k20_price).'<span class="en">&nbsp;円/g</span></div>';
								
						elseif(is_single('k18') && isset($before_last_year_result[0])):
						
							echo '<div class="value_last_year">'.number_format($before_last_year_result[0]->k18_price).'<span class="en">&nbsp;円/g</span></div>';
	
						elseif(is_single('k14') && isset($before_last_year_result[0])):
						
							echo '<div class="value_last_year">'.number_format($before_last_year_result[0]->k14_price).'<span class="en">&nbsp;円/g</span></div>';
	
						elseif(is_single('k12') && isset($before_last_year_result[0])):
						
							echo '<div class="value_last_year">'.number_format($before_last_year_result[0]->k12_price).'<span class="en">&nbsp;円/g</span></div>';
						
						elseif(is_single('k10') && isset($before_last_year_result[0])):
						
							echo '<div class="value_last_year">'.number_format($before_last_year_result[0]->k10_price).'<span class="en">&nbsp;円/g</span></div>';
							
						elseif(is_single('k9') && isset($before_last_year_result[0])):
						
							echo '<div class="value_last_year">'.number_format($before_last_year_result[0]->k9_price).'<span class="en">&nbsp;円/g</span></div>';
	
						elseif(is_single('k8') && isset($before_last_year_result[0])):
						
							echo '<div class="value_last_year">'.number_format($before_last_year_result[0]->k8_price).'<span class="en">&nbsp;円/g</span></div>';

						elseif( isset($before_last_year_result[0])):
							echo '<div class="value_last_year">'.number_format($before_last_year_result[0]->gold_price).'<span class="en">&nbsp;円/g</span></div>';
						endif;
						
						 ?>
					
					
				</li>
				<li>
					<div class="the_year_before_last_date"><?php echo $last_last_year_string;?></div>

						<?php 
						
						if(is_single('k24') && isset($last_year_result[0])):
							echo '<div class="value_the_year_before_last">'.number_format($last_year_result[0]->k24_price).'<span class="en">&nbsp;円/g</span></div>';
							
						elseif(is_single('k23') && isset($last_year_result[0])):
						
							echo '<div class="value_the_year_before_last">'.number_format($last_year_result[0]->k23_price).'<span class="en">&nbsp;円/g</span></div>';
						
						elseif(is_single('k22') && isset($last_year_result[0])):
						
							echo '<div class="value_the_year_before_last">'.number_format($last_year_result[0]->k22_price).'<span class="en">&nbsp;円/g</span></div>';
						
						elseif(is_single('k21_6') && isset($last_year_result[0])):
						
							echo '<div class="value_the_year_before_last">'.number_format($last_year_result[0]->k21_6_price).'<span class="en">&nbsp;円/g</span></div>';
								
						elseif(is_single('k20') && isset($last_year_result[0])):
						
							echo '<div class="value_the_year_before_last">'.number_format($last_year_result[0]->k20_price).'<span class="en">&nbsp;円/g</span></div>';
								
						elseif(is_single('k18') && isset($last_year_result[0])):
						
							echo '<div class="value_the_year_before_last">'.number_format($last_year_result[0]->k18_price).'<span class="en">&nbsp;円/g</span></div>';
	
						elseif(is_single('k14') && isset($last_year_result[0])):
						
							echo '<div class="value_the_year_before_last">'.number_format($last_year_result[0]->k14_price).'<span class="en">&nbsp;円/g</span></div>';
	
						elseif(is_single('k12') && isset($last_year_result[0])):
						
							echo '<div class="value_the_year_before_last">'.number_format($last_year_result[0]->k12_price).'<span class="en">&nbsp;円/g</span></div>';
						
						elseif(is_single('k10') && isset($last_year_result[0])):
						
							echo '<div class="value_the_year_before_last">'.number_format($last_year_result[0]->k10_price).'<span class="en">&nbsp;円/g</span></div>';
							
						elseif(is_single('k9') && isset($last_year_result[0])):
						
							echo '<div class="value_the_year_before_last">'.number_format($last_year_result[0]->k9_price).'<span class="en">&nbsp;円/g</span></div>';
	
						elseif(is_single('k8') && isset($last_year_result[0])):
						
							echo '<div class="value_the_year_before_last">'.number_format($last_year_result[0]->k8_price).'<span class="en">&nbsp;円/g</span></div>';

						elseif( isset($last_year_result[0])):
							echo '<div class="value_the_year_before_last">'.number_format($last_year_result[0]->gold_price).'<span class="en">&nbsp;円/g</span></div>';
						endif;
						
						 ?>
					
				</li>
			</ul>
		</div>
	</div>
</div>





<section class="market-price gold_top">

<div class="section-inner">

<?php 
	if( $post->post_name == 'souba' ){
		echo '<div class="section-ja-title ta-c souba mt-40">';
	}else{
		echo '<div class="section-ja-title ta-c">';
	}
?>

	<h2>	
	<?php 
	
		if( $post->post_name == 'k24' ){ 
		
			echo '24金(K24)'; 		
		
		}else if( $post->post_name == 'k23' ){ 
		
			echo '23金(K23)'; 		
		
		}else if( $post->post_name == 'k22' ){ 
		
			echo '22金(K22)'; 
		
		}else if( $post->post_name == 'k21.6' ){ 
		
			echo '21.6金(K21.6)'; 		
		
		}else if( $post->post_name == 'k20' ){
			
			echo '20金(K20)'; 		
			

		}else if( $post->post_name == 'k18' ){ 
		
			echo '18金(K18)'; 		
		
		
		}else if( $post->post_name == 'k14' ){ 
		
			echo '14金(K14)'; 		
		
		}else if( $post->post_name == 'k12' ){ 

			echo '12金(K12)'; 		

		}else if( $post->post_name == 'k10' ){ 		
		
			echo '10金(K10)'; 		
		
		}else if( $post->post_name == 'k9' ){ 		
		
			echo '9金(K9)'; 
		
		}else if( $post->post_name == 'k8' ){ 		
		
			echo '8金(K8)'; 		
		
		}else{
					
			echo '今日の金相場の推移';
		
		}
	?>
	

	<?php
	if( $post->post_name == 'k24' || $post->post_name == 'k23' || $post->post_name == 'k22' || $post->post_name == 'k21.6' || $post->post_name == 'k20' || $post->post_name == 'k18' || $post->post_name == 'k14' || $post->post_name == 'k12' || $post->post_name == 'k10' || $post->post_name == 'k9' || $post->post_name == 'k8'){
		echo '<div>今日の1gあたりの相場</div>';
	}
	?>
	</h2>

	<span class="mb-20 dateModified"><time datetime="<?php echo date('Y-m-d');?>" itemprop="dateModified"><?php echo date('Y年m月d日');?> 10:00</time>公開(日本時間)</span>
	
</div>



	<?php 
	
		if( $post->post_name == 'k24' && isset($today_result) ){

	?>

<div class="market-price-inner">
	<div class="d-f w-100per">
		<div class="market-price-item market-price-gold"><div class="color-gold market-price-ttl">K24</div><hr><div class="color-gold  market-price-detail"> ¥<?php echo number_format($today_result[0]->k24_price);?><span>/1g</span></div></div>
	</div>
</div>


<?php		
		}else if( $post->post_name == 'k23' && isset($today_result)  ){ 
?>		
		


<div class="market-price-inner">
	<div class="d-f w-100per">
		<div class="market-price-item market-price-gold"><div class="color-gold market-price-ttl">K23</div><hr><div class="color-gold  market-price-detail"> ¥<?php echo number_format($today_result[0]->k23_price);?><span>/1g</span></div></div>
	</div>
</div>


<?php		
		}else if( $post->post_name == 'k22' && isset($today_result)  ){ 
?>		

		


<div class="market-price-inner">
	<div class="d-f w-100per">
		<div class="market-price-item market-price-gold"><div class="color-gold market-price-ttl">K22</div><hr><div class="color-gold  market-price-detail"> ¥<?php echo number_format($today_result[0]->k22_price);?><span>/1g</span></div></div>
	</div>
</div>
		
		
		
<?php	
		}else if( $post->post_name == 'k21.6' && isset($today_result)  ){ 
		
?>
	

<div class="market-price-inner">
	<div class="d-f w-100per">
		<div class="market-price-item market-price-gold"><div class="color-gold market-price-ttl">K21.6</div><hr><div class="color-gold  market-price-detail"> ¥<?php echo number_format($today_result[0]->k21_6_price);?><span>/1g</span></div></div>
	</div>
</div>
	
	

<?php	
		}else if( $post->post_name == 'k20' && isset($today_result)  ){
?>

	
<div class="market-price-inner">
	<div class="d-f w-100per">
		<div class="market-price-item market-price-gold"><div class="color-gold market-price-ttl">K20</div><hr><div class="color-gold  market-price-detail"> ¥<?php echo number_format($today_result[0]->k20_price);?><span>/1g</span></div></div>
	</div>
</div>
	
			
<?php
		}else if( $post->post_name == 'k18' && isset($today_result[0])  ){
?>		


<div class="market-price-inner">
	<div class="d-f w-100per">
		<div class="market-price-item market-price-gold"><div class="color-gold market-price-ttl">K18</div><hr><div class="color-gold market-price-detail"> ¥<?php echo number_format($today_result[0]->k18_price);?><span>/1g</span></div></div>
		<div class="market-price-item market-price-platinum"><div class="color-silver market-price-ttl">K18WG</div><hr><div class="color-silver market-price-detail"> ¥<?php echo number_format($today_result[0]->k18wg_price);?><span>/1g</span></div></div>
	</div>
</div>


<div class="market-price-inner">
	<div class="d-f w-100per">
		<div class="market-price-item market-price-gold">
			<div class="color-gold market-price-ttl">Pt850 / K18 半々</div><hr>
			<div class="color-gold market-price-detail"> 
			¥<?php 
				if( isset($today_result[0]) ){
					echo number_format( ($today_result[0]->pt850_price + $today_result[0]->k18_price) / 2 );
				}
			?>
			<span>/1g</span>
			
			</div>
			
		</div>
			
		<div class="market-price-item market-price-gold"><div class="color-gold market-price-ttl">Pt900 / K18 半々</div><hr><div class="color-gold market-price-detail"> ¥
			<?php 
			if( isset($today_result[0]) ){
				echo number_format( ($today_result[0]->pt900_price + $today_result[0]->k18_price) / 2) ;
			}
			?>
		<span>/1g</span></div></div>
	</div>
</div>





		
<?php		
		}else if( $post->post_name == 'k14' && isset($today_result[0])  ){ 
?>
	
<div class="market-price-inner">
	<div class="d-f w-100per">
		<div class="market-price-item market-price-gold"><div class="color-gold market-price-ttl">K14</div><hr><div class="color-gold  market-price-detail"> ¥<?php echo number_format($today_result[0]->k14_price);?><span>/1g</span></div></div>
	</div>
</div>
	

<?php	
		}else if( $post->post_name == 'k12' && isset($today_result[0])  ){ 
?>

<div class="market-price-inner">
	<div class="d-f w-100per">
		<div class="market-price-item market-price-gold"><div class="color-gold market-price-ttl">K12</div><hr><div class="color-gold  market-price-detail"> ¥<?php echo number_format($today_result[0]->k12_price);?><span>/1g</span></div></div>
	</div>
</div>
	

<?php
		}else if( $post->post_name == 'k10' && isset($today_result[0]) ){ 		
?>	

<div class="market-price-inner">
	<div class="d-f w-100per">
		<div class="market-price-item market-price-gold"><div class="color-gold market-price-ttl">K10</div><hr><div class="color-gold  market-price-detail"> ¥<?php echo number_format($today_result[0]->k10_price);?><span>/1g</span></div></div>
	</div>
</div>

<?php	
		}else if( $post->post_name == 'k9' && isset($today_result[0])  ){ 		
?>
	
<div class="market-price-inner">
	<div class="d-f w-100per">
		<div class="market-price-item market-price-gold"><div class="color-gold market-price-ttl">K9</div><hr><div class="color-gold  market-price-detail"> ¥<?php echo number_format($today_result[0]->k9_price);?><span>/1g</span></div></div>
	</div>
</div>
		
	
<?php		
		}else if( $post->post_name == 'k8' && isset($today_result[0])  ){ 		
?>		
<div class="market-price-inner">
	<div class="d-f w-100per">
		<div class="market-price-item market-price-gold"><div class="color-gold market-price-ttl">K8</div><hr><div class="color-gold  market-price-detail"> ¥<?php echo number_format($today_result[0]->k8_price);?><span>/1g</span></div></div>
	</div>
</div>
	




<?php }else{ ?>


<div class="market-price-inner">
	<div class="d-f w-100per">
		<div class="market-price-item market-price-gold"><div class="color-gold market-price-ttl">金価格相場</div><hr><div class="color-gold  market-price-detail"> ¥
<?php if (isset($today_result[0]->gold_price)) : ?>
    <?php 
		if (isset($today_result[0]->gold_price) && is_numeric($today_result[0]->gold_price)) {
			echo number_format((float)$today_result[0]->gold_price);
		}
	?>
<?php endif; ?>
		<span>/1g</span></div></div>
		<div class="market-price-item market-price-platinum"><div class="color-silver market-price-ttl">プラチナ価格相場</div><hr><div class="color-silver market-price-detail"> ¥
<?php if (isset($today_result[0]->platinum_price)) : ?>
	<?php
		if (isset($today_result[0]->platinum_price) && is_numeric($today_result[0]->platinum_price)) {
			echo number_format((float)$today_result[0]->platinum_price);
		}	
	?>
<?php endif; ?>
		<span>/1g</span></div></div>
	</div>
</div>


<div class="market-price-inner">
	<div class="d-f w-100per">
		<div class="market-price-item market-price-silver"><div class="color-silver market-price-ttl">シルバー価格相場</div><hr><div class="color-silver market-price-detail"> ¥<?php if (isset($today_result[0]->sv1000_price)) : ?>
	<?php
		if (isset($today_result[0]->sv1000_price) && is_numeric($today_result[0]->sv1000_price)) {
			echo number_format((float)$today_result[0]->sv1000_price);
		}
	?>
<?php endif; ?><span>/1g</span></div></div>
		<div class="market-price-item market-price-platinum"><div class="color-silver market-price-ttl">パラジウム価格相場</div><hr><div class="color-silver market-price-detail"> ¥<?php if (isset($today_result[0]->palladium)) : ?>
	<?php
		if (isset($today_result[0]->palladium) && is_numeric($today_result[0]->palladium)) {
			echo number_format((float)$today_result[0]->palladium);
		}
	?>
<?php endif; ?><span>/1g</span></div></div>
	</div>
</div>

<?php } ?>








<div class="market-price-inner pb-20 mt-20">
	<p><b>国内取引市場の金相場／プラチナ相場です。<br class="sp">平日午前9-11時に更新いたします。<br>相場や為替の変動により、実際の市場相場と異なる場合があります。店頭買取価格とは異なります。</b></p>

	

	<p class="mt-20">
	
		<?php	


			if($post->post_name == 'gold'){

				//echo '<a href="/kaitori/gold/souba/" class="souba-btn">金相場情報ページで詳しく解説しています。</a>';

			}else{
	
				echo '<a href="/kaitori/gold/" class="souba-btn">ジュエルカフェの金買取はこちらから！</a>';
	
			}
		
		?>
		
	</p>
	
</div>


</div>
</section>


<?php $slug = get_post($post->ID)->post_name;?>


<section class="gold-info mb-40" id="js-gold-chart">


    <div class="common-ttl">
        <div class="section-inner">
			<div class="kaitori-title bold">
				<span class="common-ttl-sub">今日の<?php echo $post->post_title;?></span>
				<span class="common-ttl-main">リアルタイム相場<span class="color-red">早見表</span></span>
			</div>
            <div class="common-ttl-en">PriceTable</div>
        </div>
    </div>


    <div class="section-inner">
        <div class="graph -cushion shadow-none">
		
		

		
		<div class="head">
			<div class="red-border-left-ttl">
				<?php if($slug== 'gold'):?>
					<h3>今日の金1gの相場</h3>
				<?php else:?>
					<h3><?php echo $post->post_title;?> 1gあたりの相場表</h3>
				<?php endif;?>
			</div>		
		</div>
		

		<p class="realtime_pricetable_modified_date">
			<?php
				date_default_timezone_set('Asia/Tokyo'); // 日本時間に設定

				$now = new DateTime(); // 現在時刻を取得
				$cutoff = clone $now;
				$cutoff->setTime(9, 45); // 今日の9:45に設定

				// 9:45より前なら日付を1日前にする
				if ($now < $cutoff) {
					$now->modify('-1 day');
				}

				echo $now->format('更新日 Y年n月j日');
			?>
		</p>

		<div class="table ta-c">
			<table>		
				<thead><tr><td><p>品位</p></td><td><p>価格相場</p></td><td><p>前日比</p></td></tr></thead>
				<tbody>
				
				
						
						
				<?php 
				
					if( $post->post_name == 'k24' ){ 
				?>	
					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k24/">24金 (24K)</a></div></td>
						<td><div class="bold">¥<?php echo number_format($today_result[0]->k24_price);?></div></td>
						<td><div class="base-font-size">(<?php if($today_result[0]->k24_price - $today_result[1]->k24_price >0){echo '+';}  echo number_format($today_result[0]->k24_price - $today_result[1]->k24_price);?><span>円</span>)</div></td>
					</tr>			
					
				<?php	
					}else if( $post->post_name == 'k23' ){ 
				?>
			
					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k23/">23金 (23K)</a></div></td>
						<td><div class="bold">¥<?php echo number_format($today_result[0]->k23_price);?></div></td>
						<td><div class="base-font-size">(<?php if($today_result[0]->k23_price - $today_result[1]->k23_price >0){echo '+';}  echo number_format($today_result[0]->k23_price - $today_result[1]->k23_price);?><span>円</span>)</div></td>
					</tr>			

				<?php
					}else if( $post->post_name == 'k22' ){
				?>	
					
					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k22/">22金 (22K)</a></div></td>
						<td><div class="bold">¥<?php echo number_format($today_result[0]->k22_price);?></div></td>
						<td><div class="base-font-size">(<?php if($today_result[0]->k22_price - $today_result[1]->k22_price >0){echo '+';}  echo number_format($today_result[0]->k22_price - $today_result[1]->k22_price);?><span>円</span>)</div></td>
					</tr>			
					
				<?php	
					}else if( $post->post_name == 'k21_6' ){ 
				?>		
				
					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k21_6/">21.6金 (21.6K)</a></div></td>
						<td><div class="bold">¥<?php echo number_format($today_result[0]->k21_6_price);?></div></td>
						<td><div class="base-font-size">(<?php if($today_result[0]->k21_6_price - $today_result[1]->k21_6_price >0){echo '+';}  echo number_format($today_result[0]->k21_6_price - $today_result[1]->k21_6_price);?><span>円</span>)</div></td>
					</tr>			

				<?php
					}else if( $post->post_name == 'k20' ){
				?>

					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k20/">20金 (20K)</a></div></td>
						<td><div class="bold">¥<?php echo number_format($today_result[0]->k20_price);?></div></td>
						<td><div class="base-font-size">(<?php if($today_result[0]->k20_price - $today_result[1]->k20_price >0){echo '+';}  echo number_format($today_result[0]->k20_price - $today_result[1]->k20_price);?><span>円</span>)</div></td>
					</tr>			
					
				<?php
					}else if( $post->post_name == 'k18' ){ 
				?>
					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k18/">18金 (18K)</a></div></td>
						<td><div class="bold">¥<?php echo number_format($today_result[0]->k18_price);?></div></td>
						<td><div class="base-font-size">(<?php if($today_result[0]->k18_price - $today_result[1]->k18_price >0){echo '+';}  echo number_format($today_result[0]->k18_price - $today_result[1]->k18_price);?><span>円</span>)</div></td>
					</tr>			
					
				<?php	
					}else if( $post->post_name == 'k14' ){ 
				?>
					
					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k14/">14金 (14K)</a></div></td>
						<td><div class="bold">¥<?php echo number_format($today_result[0]->k14_price);?></div></td>
						<td><div class="base-font-size">(<?php if($today_result[0]->k14_price - $today_result[1]->k14_price >0){echo '+';}  echo number_format($today_result[0]->k14_price - $today_result[1]->k14_price);?><span>円</span>)</div></td>
					</tr>		
					
				<?php
					}else if( $post->post_name == 'k12' ){ 
				?>
						
					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k12/">12金 (12K)</a></div></td>
						<td><div class="bold">¥<?php echo number_format($today_result[0]->k12_price);?></div></td>
						<td><div class="base-font-size">(<?php if($today_result[0]->k12_price - $today_result[1]->k12_price >0){echo '+';}  echo number_format($today_result[0]->k12_price - $today_result[1]->k12_price);?><span>円</span>)</div></td>
					</tr>		

				<?PHP
					}else if( $post->post_name == 'k10' ){ 		
					
				?>
					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k12/">10金 (10K)</a></div></td>
						<td><div class="bold">¥<?php echo number_format($today_result[0]->k10_price);?></div></td>
						<td><div class="base-font-size">(<?php if($today_result[0]->k10_price - $today_result[1]->k10_price >0){echo '+';}  echo number_format($today_result[0]->k10_price - $today_result[1]->k10_price);?><span>円</span>)</div></td>
					</tr>						

			<?PHP				
					}else if( $post->post_name == 'k9' ){ 		
					
			?>
					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k9/">9金 (10K)</a></div></td>
						<td><div class="bold">¥<?php echo number_format($today_result[0]->k9_price);?></div></td>
						<td><div class="base-font-size">(<?php if($today_result[0]->k9_price - $today_result[1]->k9_price >0){echo '+';}  echo number_format($today_result[0]->k9_price - $today_result[1]->k9_price);?><span>円</span>)</div></td>
					</tr>			

				<?php
					}else if( $post->post_name == 'k8' ){
					
				?>
				
					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k8/">8金 (10K)</a></div></td>
						<td><div class="bold">¥<?php echo number_format($today_result[0]->k8_price);?></div></td>
						<td><div class="base-font-size">(<?php if($today_result[0]->k8_price - $today_result[1]->k8_price >0){echo '+';}  echo number_format($today_result[0]->k8_price - $today_result[1]->k8_price);?><span>円</span>)</div></td>
					</tr>						
					
				<?php
					}else{
					?>
					<tr>
						<td><div class="ta-l"><a href="/kaitori/gold/ingot/">金</a></div></td>
						<td><div class="bold">¥<?php echo (isset($today_result[0]->gold_price) && is_numeric($today_result[0]->gold_price))
							? number_format((float)$today_result[0]->gold_price): '-'; ?>

						</div></td>
						<td><div class="base-font-size">(<?php if(isset($today_result[0]) && isset($today_result[1]) && $today_result[0]->gold_price - $today_result[1]->gold_price >0){echo '+';} if(isset($today_result[0]) && isset($today_result[1])){ echo number_format($today_result[0]->gold_price - $today_result[1]->gold_price);}?><span>円</span>)</div></td>
					</tr>
					
					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k24/">24金 (24K)</a></div></td>
						<td><div class="bold">¥<?php
echo (isset($today_result[0]->k24_price) && is_numeric($today_result[0]->k24_price))
    ? number_format((float)$today_result[0]->k24_price)
    : '-';
?>
</div></td>
						<td><div class="base-font-size">(<?php if(isset($today_result[0]) && isset($today_result[1])   && $today_result[0]->k24_price - $today_result[1]->k24_price >0){echo '+';} if(isset($today_result[0]) && isset($today_result[1])){ echo number_format($today_result[0]->k24_price - $today_result[1]->k24_price);}?><span>円</span>)</div></td>
					</tr>
					
					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k22/">22金 (22K)</a></div></td>
						<td><div class="bold">¥<?php
echo (isset($today_result[0]->k22_price) && is_numeric($today_result[0]->k22_price))
    ? number_format((float)$today_result[0]->k22_price)
    : '-';
?>
</div></td>
						<td><div class="base-font-size">(<?php if(isset($today_result[0]) && $today_result[0]->k22_price - $today_result[1]->k22_price >0){echo '+';} if(isset($today_result[0]) && isset($today_result[1])){ echo number_format($today_result[0]->k22_price - $today_result[1]->k22_price);}?><span>円</span>)</div></td>
					</tr>
					
					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k20/">20金 (20K)</a></div></td>
						<td><div class="bold">¥<?php
echo (isset($today_result[0]->k20_price) && is_numeric($today_result[0]->k20_price))
    ? number_format((float)$today_result[0]->k20_price)
    : '-';
?>
</div></td>
						<td><div class="base-font-size">(<?php if(isset($today_result[0]) && $today_result[0]->k20_price - $today_result[1]->k20_price >0){echo '+';} if(isset($today_result[0]) && isset($today_result[1])){ echo number_format($today_result[0]->k20_price - $today_result[1]->k20_price);}?><span>円</span>)</div></td>
					</tr>

					
					
					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k18/">18金 (18K)</a></div></td>
					<td><div class="bold">¥<?php
echo (isset($today_result[0]->k18_price) && is_numeric($today_result[0]->k18_price))
    ? number_format((float)$today_result[0]->k18_price)
    : '-';
?>
</div></td>
						<td><div class="base-font-size">(<?php if(isset($today_result[0]) && $today_result[0]->k18_price - $today_result[1]->k18_price >0){echo '+';} if(isset($today_result[0]) && isset($today_result[1])){ echo number_format($today_result[0]->k18_price - $today_result[1]->k18_price);}?><span>円</span>)</div></td>
					</tr>
					
					
			

					<tr>
						<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/k14/">14金 (14K)</a></div></td>
						<td><div class="bold">¥<?php
echo (isset($today_result[0]->k14_price) && is_numeric($today_result[0]->k14_price))
    ? number_format((float)$today_result[0]->k14_price)
    : '-';
?>
</div></td>
						<td><div class="base-font-size">(<?php if(isset($today_result[0]) && $today_result[0]->k14_price - $today_result[1]->k14_price >0){echo '+';}  if(isset($today_result[0]) && isset($today_result[1])){ echo number_format($today_result[0]->k14_price - $today_result[1]->k14_price);}?><span>円</span>)</div></td>
					</tr>
					


					
					<?php
						}
					?>
					
				</tbody>
			</table>
			

			
			
			<div class="mt-8"> 
				<p><b>国内取引市場の金相場／プラチナ相場です。<br class="sp">平日午前9-11時に更新いたします。<br>相場や為替の変動により、実際の市場相場と異なる場合があります。店頭買取価格とは異なります。</b></p>
			</div>
			
		</div>



	<?php if($slug == 'souba' || $slug== 'gold'):?>

		<section class="mt-40">
			<div class="section-inner">
				<div class="graph -cushion shadow-none">
				
				<div class="head">
					<div class="red-border-left-ttl">
						<h3>今日のプラチナ1gの相場</h3>
					</div>		
				</div>
						
				<p class="realtime_pricetable_modified_date">
					<?php
						date_default_timezone_set('Asia/Tokyo'); // 日本時間に設定

						$now = new DateTime(); // 現在時刻を取得
						$cutoff = clone $now;
						$cutoff->setTime(9, 45); // 今日の9:45に設定

						// 9:45より前なら日付を1日前にする
						if ($now < $cutoff) {
							$now->modify('-1 day');
						}

						echo $now->format('更新日 Y年n月j日');
					?>
				</p>
				
				<div class="table ta-c">
					<table>		
						<thead><tr><td><p>品位</p></td><td><p>価格相場</p></td><td><p>前日比</p></td></tr></thead>
						<tbody>
							<tr>
								<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/platinum/">プラチナ</a></div></td>
								<td><div class="bold">¥<?php echo number_format($today_result[0]->platinum_price);?></div></td>
								<td><div class="base-font-size">(<?php if($today_result[0]->platinum_price - $today_result[1]->platinum_price >0){echo '+';}  echo number_format($today_result[0]->platinum_price - $today_result[1]->platinum_price);?><span>円</span>)</div></td>
							</tr>		
							<tr>
								<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/platinum/">pt1000</a></div></td>
								<td><div class="bold">¥<?php echo number_format($today_result[0]->	pt1000_price);?></div></td>
								<td><div class="base-font-size">(<?php if($today_result[0]->	pt1000_price - $today_result[1]->pt1000_price >0){echo '+';}  echo number_format($today_result[0]->	pt1000_price - $today_result[1]->pt1000_price);?><span>円</span>)</div></td>
							</tr>
							<tr>
								<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/platinum/">pt950</a></div></td>
								<td><div class="bold">¥<?php echo number_format($today_result[0]->pt950_price);?></div></td>
								<td><div class="base-font-size">(<?php if($today_result[0]->	pt950_price - $today_result[1]->pt950_price >0){echo '+';}  echo number_format($today_result[0]->pt950_price - $today_result[1]->pt950_price);?><span>円</span>)</div></td>
							</tr>
							<tr>
								<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/platinum/">pt900</a></div></td>
								<td><div class="bold">¥<?php echo number_format($today_result[0]->pt900_price);?></div></td>
								<td><div class="base-font-size">(<?php if($today_result[0]->pt900_price - $today_result[1]->pt900_price >0){echo '+';}  echo number_format($today_result[0]->pt900_price - $today_result[1]->pt900_price);?><span>円</span>)</div></td>
							</tr>
							<tr>
								<td><div class="ta-l"><a class="fc_blue" href="/kaitori/gold/platinum/">pt850</a></div></td>
								<td><div class="bold">¥<?php echo number_format($today_result[0]->pt850_price);?></div></td>
								<td><div class="base-font-size">(<?php if($today_result[0]->pt850_price - $today_result[1]->pt850_price >0){echo '+';}  echo number_format($today_result[0]->pt850_price - $today_result[1]->pt850_price);?><span>円</span>)</div></td>
							</tr>

						</tbody>
					</table>
				</div>
				
				</div>
			</div>
		</section>
		
		
		

		<section class="mt-40">
			<div class="section-inner">
				<div class="graph -cushion shadow-none">
				
				<div class="head">
					<div class="red-border-left-ttl">
						<h3>今日のシルバー1gの相場</h3>
					</div>		
				</div>
						
				<p class="realtime_pricetable_modified_date">
					<?php

						// 9:45より前なら日付を1日前にする
						if ($now < $cutoff) {
							$now->modify('-1 day');
						}

						echo $now->format('更新日 Y年n月j日');
					?>
				</p>
				
				<div class="table ta-c">
					<table>		
						<thead><tr><td><p>品位</p></td><td><p>価格相場</p></td><td><p>前日比</p></td></tr></thead>
						<tbody>
							<tr>
								<td><div class="ta-l"><a class="fc_blue" href="#">Sv1000ig</a></div></td>
								<td><div class="bold">¥<?php echo number_format($today_result[0]->sv1000ig_price);?></div></td>
								<td><div class="base-font-size">(<?php if($today_result[0]->sv1000ig_price - $today_result[1]->sv1000ig_price >0){echo '+';}  echo number_format($today_result[0]->sv1000ig_price - $today_result[1]->sv1000ig_price);?><span>円</span>)</div></td>
							</tr>		
							<tr>
								<td><div class="ta-l"><a class="fc_blue" href="#">Sv1000</a></div></td>
								<td><div class="bold">¥<?php echo number_format($today_result[0]->sv1000_price);?></div></td>
								<td><div class="base-font-size">(<?php if($today_result[0]->	sv1000_price - $today_result[1]->sv1000_price >0){echo '+';}  echo number_format($today_result[0]->sv1000_price - $today_result[1]->sv1000_price);?><span>円</span>)</div></td>
							</tr>
							<tr>
								<td><div class="ta-l"><a class="fc_blue" href="#">Sv970</a></div></td>
								<td><div class="bold">¥<?php echo number_format($today_result[0]->sv970_price);?></div></td>
								<td><div class="base-font-size">(<?php if($today_result[0]->	sv970_price - $today_result[1]->sv970_price >0){echo '+';}  echo number_format($today_result[0]->sv970_price - $today_result[1]->sv970_price);?><span>円</span>)</div></td>
							</tr>
							<tr>
								<td><div class="ta-l"><a class="fc_blue" href="#">Sv950</a></div></td>
								<td><div class="bold">¥<?php echo number_format($today_result[0]->sv950_price);?></div></td>
								<td><div class="base-font-size">(<?php if($today_result[0]->sv950_price - $today_result[1]->sv950_price >0){echo '+';}  echo number_format($today_result[0]->sv950_price - $today_result[1]->sv950_price);?><span>円</span>)</div></td>
							</tr>
							<tr>
								<td><div class="ta-l"><a class="fc_blue" href="#">Sv925</a></div></td>
								<td><div class="bold">¥<?php echo number_format($today_result[0]->sv925_price);?></div></td>
								<td><div class="base-font-size">(<?php if($today_result[0]->sv925_price - $today_result[1]->sv925_price >0){echo '+';}  echo number_format($today_result[0]->sv925_price - $today_result[1]->sv925_price);?><span>円</span>)</div></td>
							</tr>

						</tbody>
					</table>
				</div>
				
				</div>
			</div>
		</section>
		
		
<?php if(is_single('souba')):?>
		<section class="mt-40">
			<div class="section-inner">
				<div class="graph -cushion shadow-none">
				
				<div class="head">
					<div class="red-border-left-ttl">
						<h3>直近30日間の金相場</h3>
					</div>		
				</div>

<?php
$sql = "
    SELECT DATE(gold_time) AS d, gold_price
    FROM wp_goldchart
    GROUP BY DATE(gold_time)
    ORDER BY d DESC
    LIMIT 31
";
$rows = $wpdb->get_results($sql);

$rows = array_reverse($rows);

$previous_price = null;
				
				?>
				<div class="historical_price_day_table ta-c">
					<table>		
						<thead><tr><td><p>日付</p></td><td><p>価格</p></td><td><p>前日比</p></td></tr></thead>
						<tbody>
<?php
$previous_price = floatval($rows[0]->gold_price);

for ($i = 1; $i < count($rows); $i++):
    $date = date('m/d', strtotime($rows[$i]->d));
    $price = floatval($rows[$i]->gold_price);

    $diff_value = $price - $previous_price;
    $diff = ($diff_value > 0 ? "+" : "") . number_format($diff_value) . "円";

    $previous_price = $price;
?>
    <tr class="gold-row">
        <td><div class="ta-l"><a class="fc_blue" href="#"><?php echo $date; ?></a></div></td>
        <td><div class="bold">¥<?php echo number_format($price); ?></div></td>
        <td><div class="base-font-size">(<?php echo $diff; ?>)</div></td>
    </tr>
<?php endfor; ?>

							
						</tbody>
					</table>

					<div class="d-b ta-c mb-20 mt-20">
						<button id="loadMore" class="load-more-button">もっと見る</button>	
					</div>
										
				</div>
				</div>
			</div>
		</section>
<?php endif;?>


		<section>
            <div class="head mt-20">
                <div class="red-border-left-ttl">
                    <h2>
						<?php 
						
						
						if( $post->post_name == 'k24' ){ 
						
							echo '24金(24K)'; 
						
						}else if( $post->post_name == 'k23' ){ 
						
							echo '23金(23K)'; 
						
						}else if( $post->post_name == 'k22' ){ 
						
							echo '22金(22K)'; 
						
						}else if( $post->post_name == 'k21_6' ){ 
						
							echo '21.6金(21.6K)'; 
							
						}else if( $post->post_name == 'k20' ){ 
						
							echo '20金(20K)'; 
						
						}else if( $post->post_name == 'k18' ){ 
						
							echo '18金(18K)'; 
						
						}else if( $post->post_name == 'k14' ){ 
						
							echo '14金(14K)'; 
						
						}else if( $post->post_name == 'k12' ){ 
						
							echo '12金(12K)'; 
							
						}else if( $post->post_name == 'k10' ){ 
						
							echo '10金(10K)'; 
						
						}else if( $post->post_name == 'k9' ){ 
						
							echo '9金(9K)'; 
						
						}else if( $post->post_name == 'k8' ){ 
						
							echo '8金(8K)'; 
						
						}else{ echo '金'; } 
						
						
						?>
						
						のリアルタイム相場 推移グラフ
						
					</h2>
                    <div class="period fs_10"><?php echo date('Y年m月d日',strtotime("-30 day")); ?> ~ <?php echo date('Y年m月d日');?></div>
                </div>
            </div>
            <div class="body">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand"><div class=""></div></div>
					<div class="chartjs-size-monitor-shrink"><div class=""></div></div>
				</div>
                <canvas id="myChart" width="716" height="358" style="display: block; width: 716px; height: 358px;" class="chartjs-render-monitor"></canvas>
                <div class="chart-txt">※土日・祝日を除く税込小売価格の推移です。</div>
            </div>
			<div class="gold-line">
				<div class="gold-title">
					その他の相場グラフはこちらから
				</div>
				<div class="selectWrap">
					<select id="graph-select" class="select form-control">
						<option value="">選択してください</option>
						<optgroup label="金">
						  <option value="k24_price" <?php if( $post->post_name == 'k24' ){ echo 'selected'; }?>>K24</option>
						  <option value="k23_price" <?php if( $post->post_name == 'k23' ){ echo 'selected'; }?>>K23</option>
						  <option value="k22_price" <?php if( $post->post_name == 'k22' ){ echo 'selected'; }?>>K22</option>
						  <option value="k21_6_price" <?php if( $post->post_name == 'k21_6' ){ echo 'selected'; }?>>K21.6</option>
						  <option value="k20_price" <?php if( $post->post_name == 'k20' ){ echo 'selected'; }?>>K20</option>
						  <option value="k18_price" <?php if( $post->post_name == 'k18' ){ echo 'selected'; }?>>K18</option>
						  <option value="k14_price" <?php if( $post->post_name == 'k14' ){ echo 'selected'; }?>>K14</option>
						  <option value="k12_price" <?php if( $post->post_name == 'k12' ){ echo 'selected'; }?>>K12</option>
						  <option value="k10_price" <?php if( $post->post_name == 'k10' ){ echo 'selected'; }?>>K10</option>
						  <option value="k9_price" <?php if( $post->post_name == 'k9' ){ echo 'selected'; }?>>K9</option>
						  <option value="k8_price" <?php if( $post->post_name == 'k8' ){ echo 'selected'; }?>>K8</option>
						</optgroup>
						<optgroup label="プラチナ">
						<option value="pt1000_price">Pt1000</option>
						<option value="pt950_price">Pt950</option>
						<option value="pt900_price">Pt900</option>
						<option value="pt850_price">Pt850</option>
						</optgroup>
						<optgroup label="銀">
						  <option value="sv1000ig_price">Sv1000IG</option>
						  <option value="sv1000_price">Sv1000</option>
						  <option value="sv970_price">Sv970</option>
						  <option value="sv950_price">Sv950</option>
						  <option value="sv925_price">Sv925</option>
						</optgroup>
						<optgroup label="パラジウム">
						<option value="gold_combi_price">金ベースコンビ</option>
						<option value="half_combi">ハーフコンビ</option>
						<option value="pt900_k18_combi">Pt900ベース/K18コンビ</option>
						<option value="pt850_k18_combi">Pt850ベース/K18コンビ</option>
						<option value="palladium">パラジウム</option>
						<option value="ruthenium">ルテニウム</option>
						</optgroup>
					</select>
				</div>
			</div>
		</section>


		
		
		<section class="mt-40">
			<div class="section-inner">
				<div class="graph -cushion shadow-none">
				
				<div class="head">
					<div class="red-border-left-ttl">
						<h3>過去年度別の金相場表</h3>
						<p class="period fs_10">その年の最高価格・最低価格と平均価格（1gあたり）を表記しています。</p>
					</div>
				</div>		
		
<?php
$current_year = date("Y");
$years = range($current_year, $current_year - 10);

$year_data = [];

foreach ($years as $year) {

    $sql = $wpdb->prepare("
        SELECT gold_price
        FROM `wp_goldchart`
        WHERE `gold_time` LIKE %s
    ", $year . '%');

    $rows = $wpdb->get_results($sql);

    if (!empty($rows)) {


        $prices = array_map(fn($r) => floatval($r->gold_price), $rows);

        $year_data[$year] = [
            'max' => max($prices),
            'min' => min($prices),
            'avg' => array_sum($prices) / count($prices)
        ];

    } else {

        $year_data[$year] = [
            'max' => null,
            'min' => null,
            'avg' => null
        ];
    }
}
?>

<div class="historical_price_year_table ta-c">
    <table class="">
        <thead>
            <tr>
                <td><p>年度</p></td>
                <td><p>最高相場</p></td>
                <td><p>最低相場</p></td>
                <td><p>平均相場</p></td>
            </tr>
        </thead>
        <tbody id="tableBody">

        <?php foreach ($year_data as $year => $d): ?>
            <tr>
                <td><div class="ta-l"><?php echo $year; ?>年</div></td>

                <td><div class="bold">
                    <?php echo is_numeric($d['max']) ? number_format($d['max']) . '円' : '-'; ?>
                </div></td>

                <td><div class="bold">
                    <?php echo is_numeric($d['min']) ? number_format($d['min']) . '円' : '-'; ?>
                </div></td>

                <td><div class="bold">
                    <?php echo is_numeric($d['avg']) ? number_format($d['avg']) . '円' : '-'; ?>
                </div></td>
            </tr>
        <?php endforeach; ?>

							
						</tbody>
					</table>
					<button class="show-more-btn" onclick="toggleRows()">もっと見る</button>
					<script>
						function toggleRows() {
							const tbody = document.getElementById('tableBody');
							const btn = document.querySelector('.show-more-btn');
							tbody.classList.toggle('expanded');
							btn.textContent = tbody.classList.contains('expanded') ? '閉じる' : 'もっと見る';
						}
					</script>
				</div>
				
				</div>
			</div>
		</section>

		<section class="mt-40">
			<?php get_template_part('template-parts/gold-expert' ,null , $args); ?>
		</section>
 


<div class="section-inner mt-40">
	<div class="graph -cushion shadow-none">
	
	<div class="head">
		<div class="red-border-left-ttl">
			<h3>今日の金(ゴールド)の買取相場価格 グラム表 </h3>
		</div>		
	</div>
			

	<div class="table ta-c">
		<table>		
			<thead><tr><td><p>グラム</p></td><td><p>今日の金の相場価格</p></td><td><p>前日比</p></td></tr></thead>
			<tbody>

				<tr>
					<td><div class="ta-l"><a class="fc_blue" href="#">1g</a></div></td>
					<td><div class="bold">¥<?php echo (isset($today_result[0]->gold_price) && is_numeric($today_result[0]->gold_price))
						? number_format((float)$today_result[0]->gold_price): '-'; ?>

					</div></td>
					<td><div class="base-font-size"><?php if(isset($today_result[0]) && isset($today_result[1]) && $today_result[0]->gold_price - $today_result[1]->gold_price >0){echo '+';} if(isset($today_result[0]) && isset($today_result[1])){ echo number_format($today_result[0]->gold_price - $today_result[1]->gold_price);}?><span> 円</span></div></td>
				</tr>
				
				
				<tr>
					<td><div class="ta-l"><a class="fc_blue" href="#">3g</a></div></td>
					<td><div class="bold">¥<?php
echo (isset($today_result[0]->gold_price) && is_numeric($today_result[0]->gold_price))
    ? number_format((float)$today_result[0]->gold_price * 3)
    : '-';
?>
					</div></td>

						<td>
						  <div class="base-font-size">
							<?php
							if (isset($today_result[0], $today_result[1]) 
								&& is_numeric($today_result[0]->gold_price) 
								&& is_numeric($today_result[1]->gold_price)) {

								$diff = ((float)$today_result[0]->gold_price - (float)$today_result[1]->gold_price) * 3;

								if ($diff > 0) {
									echo '+';
								}

								echo number_format($diff);
							}
							?>
							<span>円</span>
						  </div>
						</td>

				</tr>
				
				
				
				<tr>
					<td><div class="ta-l"><a class="fc_blue" href="#">5g</a></div></td>
					<td><div class="bold">¥<?php
echo (isset($today_result[0]->gold_price) && is_numeric($today_result[0]->gold_price))
    ? number_format((float)$today_result[0]->gold_price * 5)
    : '-';
?>
					</div></td>

						<td>
						  <div class="base-font-size">
							<?php
							if (isset($today_result[0], $today_result[1]) 
								&& is_numeric($today_result[0]->gold_price) 
								&& is_numeric($today_result[1]->gold_price)) {

								$diff = ((float)$today_result[0]->gold_price - (float)$today_result[1]->gold_price) * 5;

								if ($diff > 0) {
									echo '+';
								}

								echo number_format($diff);
							}
							?>
							<span>円</span>
						  </div>
						</td>

				</tr>
				


				<tr>
					<td><div class="ta-l"><a class="fc_blue" href="#">10g</a></div></td>
					<td><div class="bold">¥<?php
echo (isset($today_result[0]->gold_price) && is_numeric($today_result[0]->gold_price))
    ? number_format((float)$today_result[0]->gold_price * 10)
    : '-';
?>
					</div></td>

						<td>
						  <div class="base-font-size">
							<?php
							if (isset($today_result[0], $today_result[1]) 
								&& is_numeric($today_result[0]->gold_price) 
								&& is_numeric($today_result[1]->gold_price)) {

								$diff = ((float)$today_result[0]->gold_price - (float)$today_result[1]->gold_price) * 10;

								if ($diff > 0) {
									echo '+';
								}

								echo number_format($diff);
							}
							?>
							<span>円</span>
						  </div>
						</td>

				</tr>
				


				<tr>
					<td><div class="ta-l"><a class="fc_blue" href="#">15g</a></div></td>
					<td><div class="bold">¥<?php
echo (isset($today_result[0]->gold_price) && is_numeric($today_result[0]->gold_price))
    ? number_format((float)$today_result[0]->gold_price * 15)
    : '-';
?>
					</div></td>

						<td>
						  <div class="base-font-size">
							<?php
							if (isset($today_result[0], $today_result[1]) 
								&& is_numeric($today_result[0]->gold_price) 
								&& is_numeric($today_result[1]->gold_price)) {

								$diff = ((float)$today_result[0]->gold_price - (float)$today_result[1]->gold_price) * 15;

								if ($diff > 0) {
									echo '+';
								}

								echo number_format($diff);
							}
							?>
							<span>円</span>
						  </div>
						</td>

				</tr>
				
				

				<tr>
					<td><div class="ta-l"><a class="fc_blue" href="#">30g</a></div></td>
					<td><div class="bold">¥<?php
echo (isset($today_result[0]->gold_price) && is_numeric($today_result[0]->gold_price))
    ? number_format((float)$today_result[0]->gold_price * 30)
    : '-';
?>
					</div></td>

						<td>
						  <div class="base-font-size">
							<?php
							if (isset($today_result[0], $today_result[1]) 
								&& is_numeric($today_result[0]->gold_price) 
								&& is_numeric($today_result[1]->gold_price)) {

								$diff = ((float)$today_result[0]->gold_price - (float)$today_result[1]->gold_price) * 30;

								if ($diff > 0) {
									echo '+';
								}

								echo number_format($diff);
							}
							?>
							<span>円</span>
						  </div>
						</td>

				</tr>
				
				

				<tr>
					<td><div class="ta-l"><a class="fc_blue" href="#">100g</a></div></td>
					<td><div class="bold">¥<?php
echo (isset($today_result[0]->gold_price) && is_numeric($today_result[0]->gold_price))
    ? number_format((float)$today_result[0]->gold_price * 100)
    : '-';
?>
					</div></td>

						<td>
						  <div class="base-font-size">
							<?php
							if (isset($today_result[0], $today_result[1]) 
								&& is_numeric($today_result[0]->gold_price) 
								&& is_numeric($today_result[1]->gold_price)) {

								$diff = ((float)$today_result[0]->gold_price - (float)$today_result[1]->gold_price) * 100;

								if ($diff > 0) {
									echo '+';
								}

								echo number_format($diff);
							}
							?>
							<span>円</span>
						  </div>
						</td>

				</tr>
				


				<tr>
					<td><div class="ta-l"><a class="fc_blue" href="#">500g</a></div></td>
					<td><div class="bold">¥<?php
echo (isset($today_result[0]->gold_price) && is_numeric($today_result[0]->gold_price))
    ? number_format((float)$today_result[0]->gold_price * 500)
    : '-';
?>
					</div></td>

						<td>
						  <div class="base-font-size">
							<?php
							if (isset($today_result[0], $today_result[1]) 
								&& is_numeric($today_result[0]->gold_price) 
								&& is_numeric($today_result[1]->gold_price)) {

								$diff = ((float)$today_result[0]->gold_price - (float)$today_result[1]->gold_price) * 500;

								if ($diff > 0) {
									echo '+';
								}

								echo number_format($diff);
							}
							?>
							<span>円</span>
						  </div>
						</td>

				</tr>
				
				

				<tr>
					<td><div class="ta-l"><a class="fc_blue" href="#">1kg</a></div></td>
					<td><div class="bold">¥<?php
echo (isset($today_result[0]->gold_price) && is_numeric($today_result[0]->gold_price))
    ? number_format((float)$today_result[0]->gold_price * 1000)
    : '-';
?>
					</div></td>

						<td>
						  <div class="base-font-size">
							<?php
							if (isset($today_result[0], $today_result[1]) 
								&& is_numeric($today_result[0]->gold_price) 
								&& is_numeric($today_result[1]->gold_price)) {

								$diff = ((float)$today_result[0]->gold_price - (float)$today_result[1]->gold_price) * 1000;

								if ($diff > 0) {
									echo '+';
								}

								echo number_format($diff);
							}
							?>
							<span>円</span>
						  </div>
						</td>

				</tr>
				

				
			</tbody>
		</table>
	</div>
	
	</div>
</div>
 

	<?php endif;?>





        </div>
		




<?php
	
	

	if(get_option('souba_search_display') == '1' && $post->post_name == 'souba'){

			
			$today_sql = "select * from `wp_goldchart` ORDER BY `wp_goldchart`.`id` DESC limit 0,2";

			$today_result = $wpdb->get_results($today_sql);
			


			?>
			



		<section class="section-inner kaitori-goldtool">
		
			<h3 class="goldtool-title">金・貴金属相場<br class="only-sp"> かんたん計算</h3>
			
			<div class="goldtool-inner">
			
				<div class="goldtool-label">
					<p>貴金属の種類</p>

					<div class="selectWrap">
				
						<select class="select goldtool-type">
							<option value="">選択してください</option>
							<optgroup label="金スクラップ買取">
								<option value="<?php echo $today_result[0]->k24_price;?>">K24</option>
								<option value="<?php echo $today_result[0]->k23_price;?>">K23</option>
								<option value="<?php echo $today_result[0]->k22_price;?>">K22</option>
								<option value="<?php echo $today_result[0]->k21_6_price;?>">K21.6</option>
								<option value="<?php echo $today_result[0]->k20_price;?>">K20</option>
								<option value="<?php echo $today_result[0]->k18_price;?>">K18</option>
								<option value="<?php echo $today_result[0]->k14_price;?>">K14</option>
								<option value="<?php echo $today_result[0]->k12_price;?>">K12</option>
								<option value="<?php echo $today_result[0]->k10_price;?>">K10</option>
								<option value="<?php echo $today_result[0]->k9_price;?>">K9</option>
								<option value="<?php echo $today_result[0]->k8_price;?>">K8</option>
							</optgroup>
							<optgroup label="プラチナスクラップ買取">
								<option value="<?php echo $today_result[0]->pt1000_price;?>">Pt1000</option>
								<option value="<?php echo $today_result[0]->pt950_price;?>">Pt950</option>
								<option value="<?php echo $today_result[0]->pt900_price;?>">Pt900</option>
								<option value="<?php echo $today_result[0]->pt850_price;?>">Pt850</option>
							</optgroup>
							<optgroup label="銀スクラップ買取">
								<option value="<?php echo $today_result[0]->sv1000ig_price;?>">Sv1000</option>
								<option value="<?php echo $today_result[0]->sv1000_price;?>">Sv1000</option>
								<option value="<?php echo $today_result[0]->sv970_price;?>">Sv970</option>
								<option value="<?php echo $today_result[0]->sv950_price;?>">Sv950</option>
								<option value="<?php echo $today_result[0]->sv925_price;?>">Sv925</option>
							</optgroup>
							<optgroup label="金・プラチナコンビ買取">
								<option value="<?php echo $today_result[0]->gold_combi_price;?>">金ベースコンビ</option>
								<option value="<?php echo $today_result[0]->half_combi;?>">ハーフコンビ</option>
								<option value="<?php echo $today_result[0]->pt900_k18_combi;?>">Pt900ベース/K18コンビ</option>
								<option value="<?php echo $today_result[0]->pt850_k18_combi;?>">Pt850ベース/K18コンビ</option>
								<option value="<?php echo $today_result[0]->palladium;?>">パラジウム</option>
								<option value="<?php echo $today_result[0]->ruthenium;?>">ルテニウム</option>
								<option value="<?php echo $today_result[0]->rhodium;?>">ロジウム</option>
								<option value="<?php echo $today_result[0]->gold_plated;?>">金メッキ品</option>
							</optgroup>
						</select>
						
					</div>
					
				</div>
				
				
				<div class="goldtool-label">
					<span class="dli-close"></span>
				</div>
				
				<div class="goldtool-label">
					<p>重さ</p>				
					<div class="weight-label">
						<input type="number" name="goldtool-weight" class="goldtool-weight" step="1" value="" maxlength="10"/>
						&nbsp;
						<span>g</span>
					</div>
				</div>
				
				<?php
					if(!wp_is_mobile()){
				?>
				<div class="goldtool-label goldtool-price">
					<span>相場価格</span>
					<input type="text" name="souba_price" id="souba_price" value="" readonly="readonly" />
					<span>円</span>
				</div>
				<?php
					}
				?>
			</div>
			
			
			<?php
				if(wp_is_mobile()){
			?>
			<div>
				<div class="goldtool-label goldtool-price">
					<span>相場価格</span>
					<input type="text" name="souba_price" id="souba_price" value="" readonly="readonly" />
					<span>円</span>
				</div>
			</div>
			<?php
					}
			?>
			
		</section>
		
		
	<?php
		}
	?>







    </div>
</section>










        <script>
		
		var ctx = document.getElementById('myChart').getContext('2d');

		var data_line = new Array();	
		
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
						<?php
						
			

							$sql = "
								SELECT g.*
								FROM wp_goldchart g
								WHERE g.id IN (
									SELECT MAX(id)
									FROM wp_goldchart
									GROUP BY DATE(gold_time)
								)
								ORDER BY g.gold_time DESC
								LIMIT 30
							";


							$result = $wpdb->get_results($sql);

						
							foreach($result as $key=>$row) {
								
								echo '"'.substr($row->gold_time,5).'"'.',';
								
								
								if( $post->post_name == 'k18' ){
									
									$gold_price[] = '"'.str_replace(',','',$row->k18_price).'"';
								
								}else{
								
									$gold_price[] = '"'.str_replace(',','',$row->gold_price).'"';
								
								}
								
								
							}

						?>
					],
                    datasets: [{
                        label: "(金)価格相場",
                        lineTension: 0,
                        data: [
						
						<?php
								foreach($gold_price as $key=>$value){
									
									echo $value.',';
									
								}
						?>
						
						],
                        backgroundColor: [
                            'rgba(252, 247, 240, .5)',
                        ],
                        borderColor: [
                            'rgba(154, 133, 74, .5)',
                        ],
                        borderWidth: 2,
                        pointRadius: 1,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
						
                        yAxes: [{
                            ticks: {
                                //min: 8000,
                                //max: 8900,
                                autoSkip: true,
                                maxTicksLimit: 10,
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                reverse: true,
                                autoSkip: true,
                                maxTicksLimit: 5,
                                maxRotation: 0,
                                minRotation: 0,
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            title: function (ti, data){
                                return ti[0].xLabel.replace('/', '月') + '日';
                            },
                            label: function(ti, data){
                                const formatter = new Intl.NumberFormat('ja-JP');
                                return formatter.format(data.datasets[0].data[ti.index]) + "円(/g)";
                            }
                        }
                    },
                    layout: {
                        padding: {
                            right: 20,
                        }
                    },
                }
            });




		
		
		
		
		$("#graph-select").change(function(){
	
				var item = $(this).val();
			
				var data_line = new Array();


			$.ajax({
				type: 'POST',
				// WordPressでAjaxを使用する場合、urlにはadmin-ajax.phpの絶対パスを指定
				url: "<?php echo admin_url( 'admin-ajax.php'); ?>",
				data: {
					// アクションフックで利用する文字列を指定
					action : 'gold_search_ajax_action',
					// 現在のページのURLが格納された変数を値に指定
					posttype : item,
				},
				success: function(response){
	
					var count_key = 0;
					

					$.each(response,function(key,item){
					
						data_line[count_key] = item;
						
						count_key++;
						
					});
					
		
					$('.red-border-left-ttl h2').html($('#graph-select option:selected').text() + 'の相場 推移グラフ');

					myChart.data.datasets[0].label =  $('#graph-select option:selected').text()+'相場';
					
					myChart.data.datasets[0].data = data_line;

					myChart.update();	


				},
				error : function() {
				  console.log("サーバエラー")
				}					
			});
			




			});

        </script>


<script>
document.addEventListener("DOMContentLoaded", () => {
    const typeSelect  = document.querySelector(".goldtool-type");
    const weightInput = document.querySelector(".goldtool-weight");
    const priceOutput = document.getElementById("souba_price");

    function calc() {
        const pricePerGram = Number(typeSelect.value);
        const weight       = Number(weightInput.value);

        if (!pricePerGram || !weight || weight <= 0) {
            priceOutput.value = "";
            return;
        }

        const total = Math.floor(pricePerGram * weight);
        priceOutput.value = total.toLocaleString("ja-JP");
    }

    typeSelect.addEventListener("change", calc);

    weightInput.addEventListener("input", calc);

    weightInput.addEventListener("change", calc);
});
</script>

