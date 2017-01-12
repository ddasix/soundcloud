console.clear();

var optionInputs = {
    auto_play: 'Y',
    buying : 'Y',
    liking : 'Y',
    download : 'Y',
    sharing : 'Y',
    show_artwork : 'Y',
    show_comments : 'Y',
    show_playcount : 'Y',
    show_user : 'Y',
    hide_related : 'Y',
    visual : 'Y',
    start_track : 0
};
/*
$(document).ready(function () {

    var player = SC.Widget($('iframe.sc-widget')[0]);

    var pOffset = $('.progress').offset(); //Zero the progress bar
    var pWidth = $('.progress').width();
    var scrub;

    player.bind(SC.Widget.Events.READY, function (eventData) {
        setInfo();
    }); //Set info on load
    player.bind(SC.Widget.Events.PLAY_PROGRESS, function (e) {
        if (e.relativePosition < 0.003) {
            setInfo();
        }
        //Event listener when track is playing
        $('.progress-bar').css('width', (e.relativePosition * 100) + "%");

        if (!$(".play").hasClass('pause')) {
            $(".play")
                .removeClass('now')
                .addClass('pause');
        }
    });

    player.bind(SC.Widget.Events.PAUSE, function (e) { //Event listener when track is paused
        setInfo();
        $(".play")
            .addClass('now')
            .removeClass('pause');
    });

    $('.progress').mousemove(function (e) { //Get position of mouse for scrubbing
        scrub = (e.pageX - pOffset.left);
    });

    $('.progress').click(function () { //Use the position to seek when clicked
        $('.progress-bar').css('width', scrub + "px");
        var seek = player.duration * (scrub / pWidth);
        player.seekTo(seek);
    });

    //Buttons
    $('.play').click(function () {
        player.toggle();
    });
    $('.backward').click(function () {
        player.prev();
    });
    $('.forward').click(function () {
        player.next();
    });

    function setInfo() {
        player.getCurrentSound(function (song) {
            if (!song) {
                $('.art').css('background-image', '');
                $('.title').html('');
                $('.song').html('해당 트랙이 재생할 수 없는 상태 입니다.');
                return;
            }
            $('.art').css('background-image', "url('" + song.artwork_url.replace('-large', '-t500x500') + "')");
            $('.title').html(song.user.username);
            $('.song').html(song.title);
            player.current = song;
        });

        player.getDuration(function (value) {
            player.duration = value;
        });


        player.isPaused(function (bool) {
            player.getPaused = bool;
        });
    }


});
*/
function soundSkip(idx){
    
}
function bindEvent(target,$parent){

    var player = SC.Widget(target);
    var widgetOptions = getWidgetOptions();
    
    widgetOptions.callback = function(){
        console.log('Widget is reloaded.')
    };
    player.load('http://api.soundcloud.com/playlists/213045110',widgetOptions);
    

    $('.track-skip').on('click', function(e){
        e.preventDefault();
        var soundIndex = $(this).attr('data-track-index');
        player.skip(soundIndex);
    });
    var progress = $parent.find('.progress');
    var play = $parent.find('.play');
    var backward = $parent.find('.backward');
    var forward = $parent.find('.forward');
    
    var pOffset = progress.offset(); //Zero the progress bar
    var pWidth = progress.width();
    var scrub;
    
    
    
    var setInfo = function () {
        player.getCurrentSound(function (song) {
            var imagecheck = song.artwork_url;
            console.log(song);
            if (!song) {
                $('.art').css('background-image', '');
                $('.title').html('');
                $('.song').html('해당 트랙이 재생할 수 없는 상태 입니다.');
                return;
            };
            if (imagecheck == undefined){
                $('.art').css('background-image', "url('" + song.user.avatar_url.replace('-large', '-large') + "')");
            }else{
                $('.art').css('background-image', "url('" + song.artwork_url.replace('-large', '-large') + "')");
            }
            //$('.art').css('background-image', "url('" + song.artwork_url.replace('-large', '-large') + "')");
            //$('.art').css('background-image', "url('" + song.user.avatar_url.replace('-large', '-large') + "')");
            $('.title').html(song.user.username);
            $('.song').html(song.title);
            player.current = song;
        });

        player.getDuration(function (value) {
            player.duration = value;
        });


        player.isPaused(function (bool) {
            player.getPaused = bool;
        });
    };
    
    
    player.bind(SC.Widget.Events.READY, function (eventData) {
        console.log(eventData);
        setInfo();
        
        //player.toggle();
    }); //Set info on load
    player.bind(SC.Widget.Events.PLAY_PROGRESS, function (e) {
        if (e.relativePosition < 0.003) {
            setInfo();
        }
        //Event listener when track is playing
        $('.progress-bar').css('width', (e.relativePosition * 100) + "%");

    });
    player.bind(SC.Widget.Events.PLAY, function(){
        setInfo();
        if (!$(".play").hasClass('pause')) {
            $(".play")
                .removeClass('now')
                .addClass('pause');
        }
    })

    player.bind(SC.Widget.Events.PAUSE, function (e) { //Event listener when track is paused
        setInfo();
        $(".play")
            .addClass('now')
            .removeClass('pause');
    });

    progress.mousemove(function (e) { //Get position of mouse for scrubbing
        scrub = (e.pageX - pOffset.left);
    });

    progress.click(function () { //Use the position to seek when clicked
        $('.progress-bar').css('width', scrub + "px");
        var seek = player.duration * (scrub / pWidth);
        player.seekTo(seek);
    });

    //Buttons
    play.on('click',function () {
        player.toggle();
    });
    if(backward != null){
        backward.on('click',function () {
            player.prev();
        });
    }
    if(forward != null){
        forward.on('click',function () {
            player.next();
        });
    }
    
}
function getWidgetOptions() {
    var widgetOptions = {};
    
    Object.keys(optionInputs).map(function(obj,idx){
        console.log(obj,optionInputs[obj]);
        
        widgetOptions[obj] = optionInputs[obj];
    });
    return widgetOptions;
}