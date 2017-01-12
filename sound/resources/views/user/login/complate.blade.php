@extends('layouts.master')

@section('title')
DOPEHOTZ
@endsection

@section('header')
    @include('assets.optional_header')
    <div class="login-page-wrap">
		<div class="login-center-wrap">
			<p class="login-title">로그인 완료!</p>
			<p class="login-body">DOPEHOTZ에서 내 곡을 공유하고<br>새로운 팬을 만드세요!</p>
			<a href="/" class="email-submit">DOPEHOTZ 시작하기</a>
		</div>
	</div>
@endsection

@section('content')
    
@endsection

@section('footerjs')
    <script src="/js/headup.js"></script>
	<script src="/js/menu.js"></script>
@endsection