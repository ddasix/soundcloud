<div class="hashtag-wrap">
    <!-- foreach -->
    @foreach($tags as $tag)
    <div class="hash"><a href="/hash/{{ $tag->Tags->tag }}">#{{ $tag->Tags->tag }}</a></div>
    @endforeach
    <!-- foreach -->
</div>