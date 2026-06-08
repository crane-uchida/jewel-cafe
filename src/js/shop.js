$(function() {
  let tabs = $(".shop-tab"); // tabのクラスを全て取得し、変数tabsに配列で定義
  $(".shop-tab").on("click", function() { // tabをクリックしたらイベント発火
    $(".active").removeClass("active"); // activeクラスを消す
    $(this).addClass("active"); // クリックした箇所にactiveクラスを追加
    const index = tabs.index(this); // クリックした箇所がタブの何番目か判定し、定数indexとして定義
    $(".shop-tab-content").removeClass("show").eq(index).addClass("show"); // showクラスを消して、contentクラスのindex番目にshowクラスを追加
  })
})

$(".shop-voice-list-item .media .button-more").on("click", function() {
  var toggleButton = $(this);
  toggleButton.hide();
  var target = $(this.closest('.media')).next();
  target.slideToggle('fast');
});

$(".shop-voice-list-item .button-more").on("click", function() {
  var toggleButton = $(this);
  toggleButton.hide();
  var target = $(this.closest('.customer-review-list-item')).find('.review-content');
  target.toggleClass("opened");
});
