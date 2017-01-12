@foreach($tracks as $track)
<div class="post-list-item">
    <div class="post-item-thumb">
        <img src="{{ $track->artwork_url ? $track->artwork_url : str_replace('large','t200x200',$track->user->avatar_url) }}" />
        <div class="detail-play-btn play-trigger" data-tracknum="{{ $track->id }}">
            <img class="play-btn-img" src="/img/play.png" />
        </div>
    </div>
    <div class="detail-top-track-info">
        <p class="detail-thumb-title">{{ $track->title }}</p>
        <p class="detail-thumb-artist">{{ $track->user->username }}</p>
        <a href="/post/posting/{{ $track->id }}" class="post-track-select">선택</a>
    </div>
</div>
@endforeach