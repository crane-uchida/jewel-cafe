$(function() {
	$(".brand-pricetable .accordion-head , .card-pricetable .accordion-head  , .tokei-pricetable .accordion-head").on("click",
	function() {
		if ($(this).parent(".accordion-item").children().eq(1).css("display") == "none") {
			
			$(this).parent(".accordion-item").children(".accordion-head").children().children("i").css("transform", "rotate(45deg)");
			
			$(this).parent(".accordion-item").children(".accordion-head").children("i").css("transform", "rotate(45deg)");
			
			$(this).parent().children().find('.ico-plus').addClass('ico-close');
			
			$(this).parent().children().find('.ico-plus').removeClass('ico-plus');
			
		} else {
			
			$(this).parent(".accordion-item").children(".accordion-head").children().children("i").css("transform", "rotate(-45deg)");
			
			$(this).parent(".accordion-item").children(".accordion-head").children("i").css("transform", "rotate(-45deg)");
			
			$(this).parent().children().find('.ico-close').addClass('ico-plus');
			
			$(this).parent().children().find('.ico-close').removeClass('ico-close');
			
		}
		$(this).parent(".accordion-item").children().eq(1).slideToggle(300)
	});
	$(".accordion-model").on("click",
	function() {
		if ($(this).next(".model-content").css("display") == "none") {
			
			$(this).children().children().children().children("i").css("transform", "rotate(45deg)");
			
			$(this).parent().children("i").css("transform", "rotate(45deg)");
			
		} else {
			
			$(this).children().children().children().children("i").css("transform", "rotate(-45deg)");
			
			$(this).parent().children("i").css("transform", "rotate(45deg)");
			
		}
		$(this).next(".model-content").slideToggle(300)
	});
	
	
	
	
});



