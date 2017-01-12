<div id="comment-wrap">
    <div class="comment-field">
        <input type="text" class="comment-input" placeholder="곡에대한 댓글을 입력하세요!">
        <a class="comment-submit">OK</a>
    </div>
    @if(count($comments) > 0)
    <div class="comment-list-wrap">
        <!-- foreach -->
        @foreach($comments as $comment)
        <div class="comment-item">
            <div class="comment-user">
                <img src="https://i1.sndcdn.com/avatars-000245600112-jmdyvq-t50x50.jpg" />
            </div>
            <div class="comment-text-wrap">
                <p class="user-name">{뮤지션 이름}</p>
                <p class="comment-time">{시간 - 4분전}</p>
                <p class="comment-text">{코멘트 내용}</p>
                <a class="comment-delete active">댓글 삭제</a><!-- 삭제 버튼 활성화는 active 클래스 추가 -->
            </div>
        </div>
        @endforeach
        <!-- foreach -->
    </div>
    @endif
</div>