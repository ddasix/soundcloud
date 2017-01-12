$(function () {
	$(window).scroll(function () {
		var winTop = $(window).scrollTop();
		if (winTop >= 200) {
			$("#sub-header").addClass('up');
		} else {
			$("#sub-header").removeClass('up');
		}
	});
});

