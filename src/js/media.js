$("[data-media]").on("click", function(e) {


    e.preventDefault();
    var $this = $(this);
    var videoUrl = $this.attr("data-media");
    var popup = $this.attr("href");


	var str_iframe = '<div class="jcmedia"><iframe width="100%" height="300" src="'+videoUrl+'"  frameborder="0" id="video_iframe"></iframe><span class="round_btn"></span></div>';

	$("#overlay").css('opacity',1);

    $("#overlay").css('background','rgba(0,0,0,.7)');

    $("#overlay").css('z-index','999999');

    $("#overlay").html(str_iframe);

	$this.closest(".media").addClass("show-popup");

});



$("#overlay").on("click", function(e) {


	$('#video_iframe').remove();

	$(".round_btn").hide();

	$("#overlay").css('opacity',0);

	$("#overlay").css('z-index','-1');


});


document.addEventListener("DOMContentLoaded", function() {
    const rows = document.querySelectorAll(".gold-row");
    const btn = document.getElementById("loadMore");

    let visibleCount = 10;
    const totalCount = rows.length;

    function showInitial() {
        visibleCount = 10;

        rows.forEach((row, index) => {
            row.style.display = (index < visibleCount) ? "table-row" : "none";
        });

        // 🔥 버튼 있을 때만 실행
        if (btn) {
            btn.textContent = "もっと見る";
            btn.style.display = "inline-block";
        }
    }

    showInitial();

    // 🔥 버튼 없으면 여기서 종료
    if (!btn) return;

    btn.addEventListener("click", function() {

        if (visibleCount >= totalCount) {
            showInitial();
            return;
        }

        visibleCount += 10;

        rows.forEach((row, index) => {
            if (index < visibleCount) {
                row.style.display = "table-row";
            }
        });

        if (visibleCount >= totalCount) {
            btn.textContent = "閉じる";
            btn.style.display = "inline-block";
        }
    });
});