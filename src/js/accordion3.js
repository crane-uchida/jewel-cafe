$(function(){
  $("#acMenu").on("click", function() {
    $(this).next().slideToggle();
    $(this).toggleClass('is-active');
  });

  $("#acMenu2").on("click", function() {
    $(".acMenuOpen").slideToggle();
    $(this).toggleClass('is-active');
    if($(this).hasClass('is-active')){
        $(this).text("閉じる");
      }
      else{
        $(this).text("もっと見る");
      }
  });
});







/****************************金ページ**************************/

  $('.more-btn').on('click', function() {


		if( $(this).children().is('.open') ) {


			  $(this).closest('section').removeClass('more-btn-outer');
			  
			  $(this).closest('section').removeClass('more-btn-outer2');


			  $(this).children().html('閉じる').addClass('close');
			  
			  $(this).removeClass('more-btn').addClass('slide-down');

			  $(this).children().removeClass('open');
			  
			  $(this).parent().removeClass('slide-up').addClass('slide-down');

		} else {


				if( $(this).hasClass('btn2') ){
				
					$(this).closest('section').addClass('more-btn-outer2');
	
				}else{
					
					$(this).closest('section').addClass('more-btn-outer');
					
				}
	
	
	
			  $(this).children().html('もっと見る').addClass('open');

			  $(this).addClass('more-btn').addClass('slide-down');  
			  
			  $(this).children().removeClass('close');
			  
			  $(this).parent().removeClass('slide-down').addClass('slide-up');
		

		}
		
	  });
				  
		
		

	  
		
		


$('.kaitori-howto-more-btn').on('click', function() {
	
	if( $(this).children().hasClass('is-active') ){

		$('.kaitori .kaitori-howto .kaitori-howto-txt').height('380');
	  
	   $(this).children().removeClass('is-active');
	 
	}else{
		
		$('.kaitori .kaitori-howto .kaitori-howto-txt').height('auto');
	  
		$(this).children().addClass('is-active');
		
	} 
	 
	 
 });


 


$('.kaitori-inner-ways h3').on('click', function() {
	
	
	$(this).next('p').slideToggle(300);
	
	/*
	
	var check_result = $(this).parent().children().find('.ico-plus');
	

	if(check_result[0] !== undefined){

		$(this).parent().children().find('.ico-plus').addClass('ico-close');
		
		$(this).parent().children().find('.ico-plus').removeClass('ico-plus');
		
		$(this).parent().find('p').slideToggle(300);		

	}else{
		

		$(this).parent().children().find('.ico-close').addClass('ico-plus');
		
		$(this).parent().children().find('.ico-close').removeClass('ico-close');
		
		$(this).parent().find('p').slideToggle(300);		

	}
	
	*/
	

});






$('.policies-item-inner h3').on('click', function() {
	
	
	var check_result = $(this).parent().children().find('.ico-plus');
	

	if(check_result[0] !== undefined){

		$(this).parent().children().find('.ico-plus').addClass('ico-close');
		
		$(this).parent().children().find('.ico-plus').removeClass('ico-plus');
		
		$(this).parent().find('.policy-text').slideToggle(300);		

	}else{
		

		$(this).parent().children().find('.ico-close').addClass('ico-plus');
		
		$(this).parent().children().find('.ico-close').removeClass('ico-close');
		
		$(this).parent().find('.policy-text').slideToggle(300);		

	}

});





window.onload = function(){
	$('.kaitori-howto-tips .accordion.child').append('<div class="ico-plus"></div>');
	$('.kaitori-howto-tips .ico-plus.parent').on('click', function () {
		$('.kaitori-howto-txt').toggle(300);
		$(this).toggleClass('ico-close').toggleClass('ico-plus');
	});
	$('.kaitori-howto-tips .accordion.child').on('click', function () {
		$(this).next().toggle(300);
		$(this).children().toggleClass('ico-close').toggleClass('ico-plus');
	});
};
/****************************金ページ**************************/
