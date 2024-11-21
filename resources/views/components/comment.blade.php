<section>
    <h1>Comments</h1>
    <div class="comment-list">
    
        @foreach($comments as $comment)
            <div class="comment">
                <h2>{{ $comment->name }}</h2>
                <p>{{ $comment->body }}</p>
            </div>
        @endforeach
    </div>
</section>


