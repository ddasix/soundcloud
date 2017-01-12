<div class="detail-action">
    <span class="action-column"><p class="dope-count">{추천 카운트}</p></span>
    <span class="action-column"><p class="clip-count">{클립카운트}</p></span>
    <span class="action-column"><p class="comment-count">{댓글 카운트}</p></span>
</div>
<div class="track-artist-wrap">
    <div class="track-artist">
        <img class="track-artist-img" src="https://i1.sndcdn.com/avatars-000149370739-pfnmce-t200x200.jpg" />
        <p class="detail-artist-name">{뮤지션 이름}</p>
        <div class="artist-wrap-follow-btn">follow</div>
    </div>
</div>
<div class="dots-wrap">
    <div class="dots per50">ABOUT</div>
    <div class="dots per50">LYRICS</div>
</div>
<div class="detail-info">
    <p class="track-title">{곡 제목}</p>
</div>
<div id="detail-content-carousel">
    <div class="detail-content-item">

        <div class="detail-bottom-lylics">
            <p>{어바웃 내용 - br 태그로 줄바꿈}</p>
        </div>
    </div>
    <div class="detail-content-item">
        <div class="detail-bottom-track-list">
            <div class="main-list">
                @include('assets.list_detail_bottom_track')
            </div>
        </div>
    </div>
</div>