@extends('layouts.master')

@section('title')
DOPEHOTZ
@endsection

@section('header')
    @include('assets.optional_header')
@endsection

@section('content')
    <div class="page-width">
            <div class="content">
                <div class="profile-top" style="background-image: url(https://i1.sndcdn.com/avatars-000263738448-8c1gra-t500x500.jpg);">
                    <div class="profile-wrap">
                        <div class="profile-artist-image">
                            <img src="https://i1.sndcdn.com/avatars-000263738448-8c1gra-t200x200.jpg">
                        </div>
                        <p class="profile-artist-name">{프로필 네임}</p>
                        <p class="profile-artist-intro">안녕하세요 디제즈라고 합니다.
                            <br /> 많이 들어주세요 ~ ^.^
                            <br /> Co-produced by @dzezvenue, @junaslee
                            <br />
                            <br />Composed by DZEZ
                            <br />Arranged by DZEZ
                            <br />Rap by JUNAS
                            <br />Vocal by DZEZ
                            <br />Chorus by JUNAS, DZEZ
                            <br />Mixed and Mastered by DZEZ, JUNAS
                            <br />Recorded @DZEZHOUSE</p>
                        </p>
                        <div class="post-btn-wrap">
                            <a href="/post/select.html" class="post-btn">내 트랙 공개하기</a>
                        </div>
                    </div>
                </div>
                
                <div class="dots-wrap">
                    <div class="dots per50">ON STAGE</div>
                    <div class="dots per50">OPEN MIC</div>
                </div>
                <div class="main-list-carousel">
                    <div class="main-list-wrap">
                        <div class="main-list">
                            @include('assets.list_onstage')
                        </div>
                    </div>
                    <div class="main-list-wrap">
                        <div class="main-list">
                            @include('assets.list_openmic')
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('footerjs')
    <script src="/js/detail-carousel.js"></script>
    <script src="/js/main-carousel.js"></script>
    <script src="/js/menu.js"></script>
    <script src="/js/float-player.js"></script>
    <script src="/js/clip-rate.js"></script>
@endsection