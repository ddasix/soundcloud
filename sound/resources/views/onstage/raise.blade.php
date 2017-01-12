@include('assets.detail_top',['post'=>$post])
<div class="page-width">
    <div class="detail-bottom">
        @include('assets.detail_bottom',['post'=>$post])
        <h2 class="main-title">COMMENTS ({{ count($post->Comments) }})</h2>
        @include('assets.detail_comment',['comments'=>$post->Comments])
        <h2 class="main-title">HASHTAG</h2>
        @include('assets.detail_hashtag',['tags'=>$post->Tags])
        <h2 class="main-title">HOT TRACKS</h2>
        <div class="main-list">
            @include('assets.list_onstage')
        </div>
    </div>
</div>