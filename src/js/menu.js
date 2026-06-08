$(function() {
    var touch = false;
    $('#humberger').on('click touchstart',function(e){
        switch (e.type) {
            case 'touchstart':
                drawerToggle();
                touch = true;
                return false;
            break;
            case 'click':
                if(!touch)
                     drawerToggle();
                return false;
            break;
         }
        function drawerToggle(){
            $('body').toggleClass('drawer-opened');
            touch = false;
        }
    })
    $('#overlay').on('click touchstart',function(){
        $('body').removeClass('drawer-opened');
    })
});



$(function() {
	$('#ex1-city-category').on('change', function() {
        var url = $(this).val();
        if ( url.includes('hokkaido') || url.includes('okinawa') ) {
            location.reload();
            location.href = url;
        }

	});
});




$(function() {
    $('#ex1-city').on('change', function() {
        var url = $(this).val();
        if (url != '') {
            location.reload();
            location.href = url;
        }
    })
});

$(function() {
    // 例1：親→子
    $("#ex1-city-category").narrows("#ex1-city");
});
