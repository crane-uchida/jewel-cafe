<?php 
/*
Template Name: 催事一覧
*/

header("Location: /", true, 301);
exit();


/*
?>


<?php get_header( );?>

<div id="page-top"></div>
	<div class="breadcrumbs">  
		<div class="section-inner">
			<a href="<?php esc_url( home_url() );?>">TOP<span></span></a>
			<span>催事</span>
		</div>		
	</div>

    <section class="event_saiji">
      <div class="section-inner">
        <div class="section-en-title sofia">EVENT</div>
        <div class="en-title-border"></div>
        <h3 class="section-ja-title ta-c">全国各地で買取イベント開催中！</h3>
        <ul class="primary">


		<?php
		
			$get_latest =  get_saiji_list(0);

			
			if(is_array($get_latest)){
				
				foreach($get_latest as $v){
	
	
		?>
					
          <li>
            <div class="title"><?php if($v['is_eventing'] == '1'){?><span>開催中</span><?php }?>【<?php echo $v['event_area'];?>】<?php echo $v['event_area2'];?>会場</div>
            <table>
              <tr>
                <th>開催地</th>
                <td><b><?php echo $v['venue_name'];?></b><br><?php echo $v['event_area'];?> <?php echo $v['event_area2'];?> <?php echo $v['event_area3'];?> <?php echo $v['venue_room'];?></td>
              </tr>
              <tr>
                <th>開催日程</th>
                <td><?php echo $v['schedule_sdate'];?>(<?php echo get_week($v['schedule_sdate'])?>)  ～  <?php echo $v['schedule_edate'];?>(<?php echo get_week($v['schedule_edate']);?>)　<?php echo $v['schedule_stime'];?> - <?php echo $v['schedule_etime'];?>
				<?php
					if($v['different_etime'] !== ''){
				?>
				<span>※最終日は<?php echo $v['different_etime'];?>までになります。</span>
				<?php } ?>
				</td>
              </tr>
            </table>
            <a href="/event/<?php echo $v['post_name'];?>/" class="details_button" target="_blank">詳しく見る</a>
          </li>			

		<?php
				}
				
			}

		?>
		

		  
        </ul>

	
	
      <?php get_template_part( 'template-parts/common-tab' );?>
	  
      </div>
    </section>    

<?php get_footer( );
*/
?>