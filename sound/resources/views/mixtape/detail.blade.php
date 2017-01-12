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
        <div class="detail-bottom">
            @include('assets.detail_bottom_mixt')
            <h2 class="main-title">COMMENTS ({코멘트 카운트})</h2>
            @include('assets.detail_comment')
            <h2 class="main-title">HASHTAG</h2>
            @include('assets.detail_hashtag')
            <h2 class="main-title">HOT MIXTAPES</h2>
            <div class="main-list">
                @include('assets.list_mixtape')
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