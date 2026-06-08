$(function() {
    //functions for tab button section in diamond kaitori
    $('.tabBtn li').click(function() {
        var activeCon = $(this).parent().next().children('.inner');

        if ($(this).hasClass('active')) {
            activeCon.slideUp();
            $(this).removeClass('active');
        } else {
            var index = $(this).parent().children('li').index(this);

            $(this).parent('.tabBtn').each(function() {

                $('>li', this).removeClass('active');
                $('>li', this).eq(index).addClass('active');
            });

            $(this).parent().next().children('.inner').hide().eq(index).fadeIn('slow');
        }
    });

    $('a.closeBtn').click(function() {
        $('.tabBtn li').removeClass('active');
        $('.tabArea .inner').slideUp();
        var speed = 500;
        var target = $("#4c");
        var position = (target.offset().top);
        $('body,html').animate({
            scrollTop: position
        }, speed, '');
        return false;
    });

});