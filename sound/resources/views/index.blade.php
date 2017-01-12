@extends('layouts.master')

@section('title')
DOPEHOTZ
@endsection

@section('header')
     @include('layouts.header.master_header')
@endsection

@section('content')
    @include('layouts.main.main_slide')
    <div class="page-width">
        <div class="content">
            @include('layouts.main.main_content')
        </div>
        @include('layouts.main.artist')
    </div>
@endsection

@section('footerjs')
    <script src="/js/main-carousel.js"></script>
    <script src="/js/headup.js"></script>
    <script src="/js/menu.js"></script>
    <script src="/js/float-player.js"></script>
    <script src="/js/clip-rate.js"></script>
@endsection