@extends('layouts.master')

@section('title')
DOPEHOTZ
@endsection

@section('header')
    @include('layouts.header.master_header')
@endsection

@section('content')
    <div class="list-top">
        <p class="list-top-title">ON STAGE</p>
        <p class="list-top-body">실력과 재능을 갖춘 멋진 아티스트들의
            <br>DOPE하고 HOT한 트랙을 들어보세요!</p>
        <div class="post-btn-wrap">
            <a href="/openmic/list.html" class="post-btn">온스테이지 추천하러 가기</a>
        </div>
        @include('assets.list_hashtag')
    </div>
    <div class="page-width">
        <div class="list-page-wrap">
            <div class="main-list-wrap">
                <div class="main-list">
                    @include('assets.list_onstage')
                </div>
            </div>
        </div>
    </div>
    
    <div id="detail-layer">
        @include('layouts.header.sub_header')
        <div class="inner-layer">
            awef
        </div>
    </div>
    
@endsection

@section('footerjs')
    <script src="/js/menu.js"></script>
    <script src="/js/headup.js"></script>
    <script src="/js/clip-rate.js"></script>
    <script>
        var scRaise = (function ($){
            var raise = null;
            this.detail_layer = $("#detail-layer");
            
            window.addEventListener("popstate", function() {
                alert('pop');
            }, false);
            
            function getInstance() {
                if(raise === null){
                    raise =  scRaise;
                }
                return raise;
            }
            var scRaise =  {
                
                show : function(){
                    this.detail_layer.addClass("open");
                    this.replaceLocation({
                        'stateObj': { foo: "bar" },
                        'title':'',
                        'url':'/onstage/32'
                    });
                },
                dismiss : function(){
                    this.detail_layer.removeClass("open");
                },
                replaceLocation : function(obj){
                    history.pushState(obj.stateObj, obj.title, obj.url);
                    console.log(history);
                },
                moveBack : function(){
                    this.dismiss();
                    location.back();
                }
            };
        })(jQuery);
        var raise = scRaise.getInstance();
        $(".track-link").on('click', function(e){
            $.getJSON('/onstage/32', function(xhr){
                var data = xhr.data;
                if(xhr.status == "success"){
                    var $detail_layer = $("#detail-layer");
                    $detail_layer.find(".inner-layer").html(data);
                    //$detail_layer.addClass("open");
console.log(raise);
                    raise.show();
                }
            });
        }).on('tap', function(e){
            $.getJSON('/onstage/32', function(xhr){
                var data = xhr.data;
                $("#detail-layer inner-layer").html(data);
            });
        });
    </script>
@endsection