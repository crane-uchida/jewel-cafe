$(document).ready(function () {
  $(".js-diamond-button").on("click", function () {
    if ($('select[name="ct"] option:selected').val() == "") {
      alert("カラット数を選択してください。");
      $('select[name="ct"]').focus();
      return false;
    }
    if ($('select[name="color"] option:selected').val() == "") {
      alert("カラーを選択してください。");
      $('select[name="color"]').focus();
      return false;
    }
    if ($('select[name="clarity"] option:selected').val() == "") {
      alert("クラリティを選択してください。");
      $('select[name="clarity"]').focus();
      return false;
    }
    if ($('select[name="cut"] option:selected').val() == "") {
      alert("カットを選択してください。");
      $('select[name="cut"]').focus();
      return false;
    }
    var ctv = $('select[name="ct"] option:selected').val();
    var clarity = $('select[name="clarity"] option:selected').val();
    var colorv = $('select[name="color"] option:selected').val();
    var cutv = $('select[name="cut"] option:selected').val();
    var id = "#" + ctv + "-" + clarity;
    $(".js-diamond-form").find(".js-diamond-price").scrollTop(0);
    var scroll = $(id).offset().top;
    var price_scroll = $(".js-diamond-form")
      .find(".js-diamond-price")
      .offset().top;
    // $("html,body").animate(
    //   {
    //     scrollTop: price_scroll + 20,
    //   },
    //   100
    // );
    $(".js-diamond-form .js-diamond-price").animate(
      {
        scrollTop: parseInt(scroll) - parseInt(price_scroll) - 20,
      },
      800
    );
    $(".js-diamond-price").find("td").removeClass("the_active");
    $(id).find("tr").eq(colorv).find("td").eq(cutv).addClass("the_active");
  });
  $(".js-diamond-title").on("click", function () {
    $(".js-diamond-form").slideToggle(1000);
  });
});
