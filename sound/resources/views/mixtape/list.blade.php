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
        {{-- @include('assets.list_hashtag') --}}
    </div>
    <div class="page-width">
        <div class="list-page-wrap">
            <div class="main-list-wrap">
                <div class="main-list">
                    @include('assets.list_mixtape')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerjs')
    <script src="/js/menu.js"></script>
    <script src="/js/headup.js"></script>
    <script src="/js/clip-rate.js"></script>
@endsection