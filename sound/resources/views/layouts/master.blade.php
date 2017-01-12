<!doctype html>
<html lang="ko">

<head>
    <meta name="theme-color" content="#1a1a1a" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <title>@yield('title') :::: </title>
    <link rel="icon" sizes="192x192" href="/icon.png" />
    <link href="/css/base.css" rel="stylesheet" type="text/css" />
    <link href="/css/carousel.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="page-wrap" onclick="history.back();"></div>
    @yield('header')
    <div class="clip-alert" style="display:none;">
        <p>클립했습니다. 클립보드를 확인해 보세요!</p>
    </div>
    <div class="dope-alert" style="display:none;">
        <p>온스테이지로 추천했습니다.</p>
    </div>
    
    <div id="container">
        @yield('content')
    </div>
    
    <div class="floating-player-wrap">

    </div>
    
    <div class="footer">
        <p>copyright© DOPEHOTZ. all right reserved.</p>
    </div>
    <div id="loading-cover">
        <svg version="1.1" id="loadingIcon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="100px" width="100px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
            <path fill="#fff" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
            </path>
        </svg>
    </div>
    <script src="//w.soundcloud.com/player/api.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="/js/owl.carousel.min.js"></script>
    <script src="/bower_components/jquery-form/jquery.form.js"></script>
    <script src="/js/sc-loading.js"></script>
    <script src="/js/sc-player.js"></script>
    <script src="/js/float-player.js"></script>
    
    @yield('footerjs')
</body>

</html>