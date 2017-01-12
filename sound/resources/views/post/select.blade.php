@extends('layouts.master')

@section('title')
DOPEHOTZ
@endsection

@section('header')
    @include('assets.optional_header')
@endsection

@section('content')
    <div id="container">
        <div class="page-width">
            <div class="content">
                <div class="post-my-track-list">
                    <div class="post-carousel">
                        @include('assets.list_select_track')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerjs')
    <script src="/js/detail-carousel.js"></script>
    <script src="/js/menu.js"></script>
    <script src="/js/float-player.js"></script>
@endsection