@extends('layouts.master')

@section('title')
DOPEHOTZ
@endsection

@section('header')
    @include('layouts.header.sub_header')
@endsection

@section('content')
    @include('assets.detail_top')
    <div class="page-width">
        {{ dd($tracks) }}
        <div class="detail-bottom">
            @include('assets.detail_bottom')
            <h2 class="main-title">COMMENTS ({코멘트 카운트})</h2>
            @include('assets.detail_comment')
            <h2 class="main-title">HASHTAG</h2>
            @include('assets.detail_hashtag')
            <h2 class="main-title">HOT TRACKS</h2>
            <div class="main-list">
                @include('assets.list_openmic')
            </div>
        </div>
    </div>
@endsection

@section('footerjs')
    <script src="/js/detail-carousel.js"></script>
    <script src="/js/headup.js"></script>
    <script src="/js/main-tab.js"></script>
    <script src="/js/menu.js"></script>
    <script src="/js/float-player.js"></script>
    <script src="/js/clip-rate.js"></script>
@endsection