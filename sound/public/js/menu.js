$(".menu-btn").click(function () {
    $("#menu,body,.page-wrap").addClass("open");
    window.location.hash = "#menu-open";
});
$(".srch-btn").click(function () {
    $("#srch-menu,body,.page-wrap").addClass("open");
	$(".list-search-input").focus();
    window.location.hash = "#menu-open";
});

window.onhashchange = function () {
    if (location.hash != "#menu-open") {
        $("#srch-menu,#menu,#cover-wrap,body,.page-wrap").removeClass("open");
    }
};