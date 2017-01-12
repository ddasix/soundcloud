@extends('layouts.master')

@section('title')
DOPEHOTZ
@endsection

@section('header')
    @include('assets.optional_header')
    <div class="login-page-wrap">
		<div class="login-center-wrap">
		<p class="login-title">간편 로그인</p>
			<p class="login-body">SOUNDCLOUD로 가입없이
				<br>간편하게 로그인 하세요!</p>
			<div class="login-btn-wrap">
				<a href="#" class="menu-login-btn">LOGIN WITH<br> SOUND CLOUD</a>
			</div>
		</div>
	</div>
@endsection

@section('content')
    
@endsection

@section('footerjs')
    <script src="/js/headup.js"></script>
	<script src="/js/menu.js"></script>
@endsection