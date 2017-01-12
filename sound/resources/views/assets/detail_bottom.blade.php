<div class="detail-action">
    <span class="action-column"><p class="dope-count">{{ $post->Likes->count() }}</p></span>
    <span class="action-column"><p class="clip-count" data-my-clip="{{ implode(',',$clips) }}">{{ $post->Clips->count() }}</p></span>
    <span class="action-column"><p class="comment-count">{{ $post->Comments->count() }}</p></span>
</div>
<div class="track-artist-wrap">
    <div class="track-artist">
        <img class="track-artist-img" src="https://i1.sndcdn.com/avatars-000149370739-pfnmce-t200x200.jpg" />
        <p class="detail-artist-name">{{ $post->track_artist }}</p>
        <div class="artist-wrap-follow-btn">follow</div>
    </div>
</div>
<div class="dots-wrap">
    <div class="dots per50">ABOUT</div>
    <div class="dots per50">LYRICS</div>
</div>
<div class="detail-info">
    <p class="track-title">{{ $post->post_title }}</p>
</div>
<div id="detail-content-carousel">
    <div class="detail-content-item">
        <div class="detail-bottom-lylics">
            <p>{{ $post->post_desc }}</p>
        </div>
    </div>
    <div class="detail-content-item">
        <div class="detail-bottom-lylics">
            <p>{{ $post->post_subs }}</p>
        </div>
    </div>
</div>