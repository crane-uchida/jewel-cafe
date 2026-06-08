$(function () {
    var minHeight;
    var contentAreaClass = '.txtarea-js'; // コンテンツのクラス名
    var readMore = '.read-more'; // 読み込みボタンのクラス名
    var Open = 'open'; // 開いた時のクラス名

    var contentsAreas = $(contentAreaClass);

    // ウィンドウ幅で初期の高さを別々設定
    if ($(window).width() <= 767) {
      minHeight = 950; // スマホの場合
    } else {
      minHeight = 680; // PCの場合
    }

    // コンテンツの高さにminHeightを代入
    contentsAreas.each(function() {
        $(this).css({ height: minHeight });
    });

    contentsAreas.find(readMore).on("click", function () {
        var contentsArea = $(this).closest(contentAreaClass);

        var currentHeight = contentsArea.height();
        var autoHeight = contentsArea.css({ height: "auto" }).height();

        if (contentsArea.hasClass(Open)) {
            contentsArea.height(currentHeight).animate({ height: minHeight }, 300, function () {
                var top = contentsArea.offset().top;
                $('html, body').animate({ scrollTop: top }, 300);
            });
            contentsArea.removeClass(Open);
        } else {
            contentsArea.height(currentHeight).animate({ height: autoHeight }, 300, function () {
                contentsArea.css({ height: "auto" });
            });
            contentsArea.addClass(Open);
        }
    });


    $(document).ready(function() {
        $('.common-kaitori-resuluts .rolex-btn').click(function() {
            $('.common-kaitori-resuluts .section-inner').toggleClass('more-btn-outer2');
        });
    });



});