$('.slick-kaitori').slick({
  slidesToShow: 5,
  slidesToScroll: 5,
  dots: true,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    },

    {
      breakpoint: 480,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    }
  ]
});

$('.store-guide-slick').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  centerMode: true,
  variableWidth: true,
  dots: false,
  centerPadding: '12%'
});


var init = {
  //autoplay: true,
  infinite: true,
  cssEase: "linear",
  dots: true,
  centerMode: true,
  centerPadding: '12%',
  slidesToShow: 1,
  slidesToScroll: 1 };

$(function () {
  var win = $(window);
  var slider = $(".slider, .slick-top-search");

  win.on("load resize", function () {
    if (win.width() < 576) {
      slider.not(".slick-initialized").slick(init);
    } else if (slider.hasClass("slick-initialized")) {
      slider.slick("unslick");
    }
  });
});
