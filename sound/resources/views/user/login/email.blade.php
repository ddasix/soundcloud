@extends('layouts.master')

@section('title')
DOPEHOTZ
@endsection

@section('header')
    @include('assets.optional_header')
    <div class="login-page-wrap">
        <div class="login-center-wrap">
            <p class="login-title">처음 오시는 군요!</p>
            <p class="login-body">로그인을 완료하기위해
                <br>이메일 주소를 입력하세요!</p>
            <input type="email" class="login-input" placeholder="이메일을 입력하세요." />
            <input type="submit" class="email-submit" value="인증메일 발송" />
        </div>
    </div>
@endsection

@section('content')
    
@endsection

@section('footerjs')
    <script src="/js/headup.js"></script>
	<script src="/js/menu.js"></script>
@endsection