@extends('layouts.master')

@section('title')
DOPEHOTZ
@endsection

@section('header')
    @include('layouts.header.sub_header')
@endsection

@section('content')
    @include('onstage.raise',['post'=>$post])
@endsection

@section('footerjs')
    <script src="/js/detail-carousel.js"></script>
    <script src="/js/headup.js"></script>
    <script src="/js/main-tab.js"></script>
    <script src="/js/menu.js"></script>
    <script src="/js/float-player.js"></script>
    <script src="/js/clip-rate.js"></script>
@endsection