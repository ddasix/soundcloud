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
            {{ Form::open(['url'=>URL::secure('/post'),'method'=>'POST','id'=>'form-my-post-track']) }}
            <input type="hidden" name="track_id" value="{{ $track->id }}"/>
            <input type="hidden" name="track_title" value="{{ $track->title }}"/>
            <input type="hidden" name="artwork_url" value="{{ $track->artwork_url ? $track->artwork_url : str_replace('large','large',$track->user->avatar_url) }}"/>
            <input type="hidden" name="track_artist" value="{{ $track->user->username }}"/>
            <div class="post-wrap">
                <div class="tracks-item">
                    <a class="track-link">
                        <div class="tracks-item-left">
                            <img src="{{ $track->artwork_url ? $track->artwork_url : str_replace('large','large',$track->user->avatar_url) }}" class="main-product-thumb" />
                        </div>
                        <div class="tracks-item-right">
                            <div class="item-info-wrap">
                                <p class="tracks-list-track">{{ $track->title }}</p>
                                <p class="tracks-list-artist">{{ $track->user->username }}</p>
                            </div>
                        </div>
                    </a>
                    <div class="list-play" data-tracknum="{{ $track->id }}"></div>
                </div>
            </div>
            <div class="post-wrap">
                <input type="text" name="post_title" class="input-con-title" placeholder="제목을 입력하세요." />
                <textarea name="post_desc" id="post_desc" class="input-con-body" placeholder="본문을 입력하세요." onkeyup="resize(this)"></textarea>
                <textarea name="post_subs" class="input-con-body" placeholder="가사를 입력하세요." onkeyup="resize(this)"></textarea>
            </div>

            <div class="post-wrap">
                <div class="tag-wrap">
                    <input type="text" class="tagged form-control" name="post_tag" data-removeBtn="true" placeholder="해시태그를 입력해주세요.">
                </div>
            </div>
            {{ Form::close() }}
            <button class="post-submit-btn" id="submit-post">공유하기</button>
        </div>
    </div>
@endsection

@section('footerjs')
<script src="/js/detail-carousel.js"></script>
<script src="/js/menu.js"></script>
<script src="/js/float-player.js"></script>
<script src="/js/clip-rate.js"></script>
<script src="/js/tagsinput.js"></script>
<script>
    function resize(obj) {
        obj.style.height = "0px";
        obj.style.height = (2 + obj.scrollHeight) + "px";
    }
    
    var loading;
    
    var options = { 
        target:        '#output2',      // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,     // pre-submit callback 
        success:       showResponse,    // post-submit callback
        error:         showErrors,
    
        dataType:  'json',              // 'xml', 'script', or 'json'
        clearForm: false,                // clear all form fields after successful submit 
        resetForm: false                 // reset the form after successful submit 
    
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 
    
    // bind to the form's submit event 
    $('#form-my-post-track').submit(function() { 
        $(this).ajaxSubmit(options); 
    
        return false; 
    });
    
    function showRequest(formData, jqForm, options) { 
        loading = new loading();
        loading.display();
        return true; 
    } 
     
    function showResponse(responseText, statusText, xhr, $form)  {
        loading.dismiss();
        location.href = responseText.return_url;
    } 
    
    function showErrors(error){
        
        var result = JSON.parse(error.responseText);
        loading.dismiss();
    }

    $("#submit-post").on('click', function(){
        $('#form-my-post-track').submit();
    });
</script>
@endsection