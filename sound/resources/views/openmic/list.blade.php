@extends('layouts.master')

@section('title')
DOPEHOTZ
@endsection

@section('header')
    @include('layouts.header.master_header')
@endsection

@section('content')
    <div class="list-top">
        <p class="list-top-title">OPEN MIC</p>
        <p class="list-top-body">내가 만든 멋진 TRACK을 공개하고
            <br>온스테이지에 도전하세요!</p>
        <div class="post-btn-wrap">
            <a href="/post/select.html" class="post-btn">내 트랙 공개하기</a>
        </div>
        {{-- @include('assets.list_hashtag') --}}
    </div>
    <div class="page-width">
        <div class="list-page-wrap">
            <div class="main-list-wrap">
                <div class="main-list">
                    @include('assets.list_openmic')
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