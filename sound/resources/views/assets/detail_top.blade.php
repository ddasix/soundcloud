<div class="detail-top">
    <div class="detail-top-thumb">
        <img src="{{ $post->artwork_url }}" />
        <div class="detail-play-btn play-trigger" data-tracknum="{{ $post->track_id }}">
            <img class="play-btn-img" src="/img/play.png" />
        </div>
    </div>
    <div class="detail-top-track-info">
        <p class="detail-thumb-title">{{ $post->track_title }}</p>
        <p class="detail-thumb-artist">{{ $post->track_artist }}</p>
    </div>
</div>