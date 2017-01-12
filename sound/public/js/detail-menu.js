$(function () {
	$(window).scroll(function () {
		var winTop = $(window).scrollTop();
		if (winTop >= 50) {
			$("#sub-header").css("top", "-40px");
			$(".detail-top").css("top", "0px");
		} else {
			$("#sub-header").css("top", "0px");
			$(".detail-top").css("top", "40px");
		}
	});
});


$(".comment-input").focus(function(){
    $(".detail-top").css("opacity", "0");
});

$(".comment-input").focusout(function(){
    $(".detail-top").css("opacity", "1");
});