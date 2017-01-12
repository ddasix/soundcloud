var fff = false;
var down = $(document).scrollTop();


$(document).scroll(function () {

    var afterScrollTop = $(document).scrollTop();
    var delta = afterScrollTop - down;
    total_high = document.body.scrollHeight;
    c_high = document.body.clientHeight;

    c_per = ($(window).scrollTop() / ($(document).height() - $(window).height())) * 100;

    if (c_per > 40) {
        if (typeof $('#p_table').html() != "undefined") {
            $(".slide_ad_new").css('bottom', '60px');
            $(".slide_ad_new").slideDown();
            fff = true;
        } else {
            $(".slide_ad").css('bottom', '60px');
            $(".slide_ad").slideDown();
            fff = true;
        }
    }

    down = afterScrollTop;
});

if (typeof $('#p_table').html() != "undefined") {
    var p_title = document.getElementById("p_title").innerHTML;
    var p_cost = document.getElementById("p_cost").innerHTML;
    var p_dcost = document.getElementById("p_dcost").innerHTML;
    var p_code = document.getElementById("p_code").innerHTML;

    document.getElementById("bn_title").innerHTML = p_title;
    $('#bn_code').attr("href", "http://kr.iherb.com/p/" + p_code + "?rcode=NGV599");
    $('.go_herblink').attr("href", "http://kr.iherb.com/p/" + p_code + "?rcode=NGV599");
    $('.go_herblink').text('리뷰 제품 바로가기');
}


  var color = '#';
var letters = ['f6c9cc', 'a8c0c0', 'FEBF36', 'FF7238', '6475A0', 'acc7bf', '5e5f67', 'c37070', 'eae160', 'bf7aa3', 'd7d967'];

color += letters[Math.floor(Math.random() * letters.length)];
document.getElementById('bgcolor').style.background = color;


var main_img = $('meta[property="og:image"]').attr('content');

        $('#close_ad').css("background-image", 'url("' + main_img + '")');