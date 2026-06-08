<?php
/*
Template Name: コラムブログ
*/




if($post->post_parent < 1){
	
	get_template_part('single/column/single-column-parent'); 
	
	//子供その以外
}else{
	
	
	get_template_part('single/column/single-column-child'); 

}

?>