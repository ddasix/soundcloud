$(function () {
    $('.dope-count').on('click', function () {
        if ($(this).hasClass('select')) {
            $(this).removeClass('select');
            $(this).html(function (i, val) {
                return val * 1 - 1
            });
        } else {
            $(this).addClass('select');
			$('.dope-alert').attr('style','display:normal;');
				setTimeout(function(){
					$(".dope-alert").attr('style','display:none;');
				}, 2000);
            $(this).html(function (i, val) {
                return val * 1 + 1
            });
        }
    });
});

$(function () {
    $('.clip-count').on('click', function () {
        if ($(this).hasClass('select')) {
            $(this).removeClass('select');
            $(this).html(function (i, val) {
                return val * 1 - 1
            });
        } else {
            $(this).addClass('select');
			$('.clip-alert').attr('style','display:normal;');
				setTimeout(function(){
					$(".clip-alert").attr('style','display:none;');
				}, 2000);
            $(this).html(function (i, val) {
                return val * 1 + 1
            });
        }
    });
});