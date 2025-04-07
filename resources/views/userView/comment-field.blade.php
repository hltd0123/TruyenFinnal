<div class="row">
    <div class="col-lg-8 col-md-8">
        <div class="anime__details__review">
            <div class="section-title">
                <h5>Reviews</h5>
            </div>
            @foreach($comments as $comment)
                <div class="anime__review__item">
                    <div class="anime__review__item__text">
                        <!-- Tên người bình luận -->
                        <h6>{{ $comment->user->name }} - <span>{{ $comment->created_at->diffForHumans() }}</span></h6>
                        <!-- Hiển thị nội dung bình luận -->
                        <p>{{ $comment->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        @auth
        <div class="anime__details__form">
            <div class="section-title">
                <h5>Comment</h5>
            </div>
            <form action="{{ route('comment.save', [
                'storyName' => $story->id, 
                'chapterNumber' => isset($chapter) ? $chapter->chapterNumber : null
            ]) }}" method="POST">
            @csrf
            <textarea name="content" placeholder="Your Comment"></textarea>
            <button type="submit"><i class="fa fa-location-arrow"></i> Bình luận</button>
        </form>
        </div>
        @endauth
        @guest
        <div class="anime__details__form">
            <div class="section-title">
                <h5>Vui lòng đăng nhập để comment</h5>
            </div>
        </div>
        @endguest
    </div>
</div>