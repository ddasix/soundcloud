$(".play-trigger").on('click', function () {
	var track_num = $(this).attr('data-tracknum');
    removePlayer();
    renderPlayer(track_num);
    /*
	$('.close-float-player').remove();
    $('.sc-widget').remove();
    $('.floating-player-wrap').append('<iframe class="sc-widget" src="//w.soundcloud.com/player/?url=//api.soundcloud.com/tracks/' + track_num + '"></iframe>');
	$('.floating-player-wrap').append(
        '<div class="close-float-player">'
            +'<div class="float-player">'
                +'<div class="progress">'
                    +'<div class="progress-bar"></div>'
                +'</div>'
                +'<div class="art"></div>'
                +'<div class="info">'
                    +'<div class="song"></div>'
                    +'<div class="title"></div>'
                +'</div>'

                +'<div class="controls">'
                    +'<button class="play now"></button>'
                +'</div>'
                +'<div class="float-player-close-btn"></div>'
            +'</div>'
        +'</div>'
    );
	$('body').addClass('bottom');
	
	$(".float-player-close-btn").click(function () {
		$('.float-player').remove();
		$('.close-float-player').remove();
        $('body').removeClass('bottom');
	});
    */
});
function renderPlayer(track_num){
    var url = '//api.soundcloud.com/playlists/'+track_num;
    var host2widgetBaseUrl = {
        "wt.soundcloud.dev" : "wt.soundcloud.dev:9200/",
        "wt.soundcloud.com" : "wt.soundcloud.com/player/",
        "w.soundcloud.com"  : "w.soundcloud.com/player/"
      };

    var $iframe = $("<iframe>",{
        'class': 'sc-widget',
        'id':'iframe-sc-widget-'+Math.floor((Math.random() * 10000000) + 1),
        //'src' : '//w.soundcloud.com/player/?url=' + encodeURI(url),
        'src':location.protocol + "//" + host2widgetBaseUrl['w.soundcloud.com'] + "?url=" + url
    });

    var $close_float_player = $("<div>",{
        'class':'close-float-player'
    });
    
    var $float_player = $("<div>",{
        'class':'float-player'
    }).appendTo($close_float_player);
    
    var progress = $("<div>",{
        'class':'progress'
    }).appendTo($float_player);
    
    var progress_bar = $("<div>",{
        'class':'progress-bar'
    }).appendTo(progress);
    
    var art = $("<div>",{
        'class':'art',
        'style' : 'background-image:url(/img/loading.gif)'
    }).appendTo($float_player);
    
    var info = $("<div>",{
        'class':'info'
    }).appendTo($float_player);
    
    var song = $("<div>",{
        'class':'song',
        'html' : 'NOW LOADING...'
    }).appendTo(info);
    
    var title = $("<div>",{
        'class':'title',
        'html' : '로딩이 완료되면 재생을 눌러주세요.'
    }).appendTo(info);
    
    var controls = $("<div>",{
        'class':'controls mixtcon'
    }).appendTo($float_player);
    
    var $button = $("<button>",{
        'class':'play now'
    }).appendTo(controls);
    
    var $button = $("<button>",{
        'class':'forward'
    }).appendTo(controls);
    
    
    
    
    $('.floating-player-wrap').append($iframe);
    $('.floating-player-wrap').append($close_float_player);
    
    $('body').addClass('bottom');
    $('.float-player-close-btn').on('click',closePlayer)
    
    bindEvent($iframe.attr('id'),$close_float_player);
    

}

function closePlayer(){
    /*
   	$(".float-player-close-btn").click(function () {
		$('.float-player').remove();
		$('.close-float-player').remove();
        $('body').removeClass('bottom');
	});
    */
        console.log('Bind closePlayer');
    
    return function () {
         removePlayer()
	}();
}

function removePlayer(){
    var $player = $('.close-float-player');
    var $widget = $('.sc-widget');
    
    if($player != null){
        $player.remove();
    }
    
    if($widget != null){
        $widget.remove()
    }
}