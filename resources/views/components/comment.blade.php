@props(['comments'])

<section>
    <h1 class="text-2xl font-semibold text-gray-900 mb-4 border-b border-gray-400 p-6">Comments</h1>
    <div class="comment-list">
        @if($comments->count())
            @foreach($comments as $comment)
                <div class="comment p-2 ">
                    <div class="border-l-[6px] rounded-sm border-blue-400 mb-4 p-1">
                        <div class="mb-2 ml-4 flex items-center gap-2">
                        <img src="https://i.pravatar.cc/30" class="rounded-full" alt="">
                            <h2 class="font-bold">{{ $comment->name }}</h2>
                        </div>
                        <p class="text-sm text-gray-500 text-right mr-2 ">{{ $comment->created_at->diffForHumans() }}</p>
                    <div class="m-2 p-4 ">
                    <p class="">{{ $comment->body }}</p>
                    </div>
                    <form method="POST" action="{{ route('comment.delete', ['post' => $comment->post->slug, 'comment' => $comment->id]) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <div class="flex justify-end w-full">
                            <button type="submit" class="p-1 bg-gray-500 text-white rounded-md text-sm">Delete</button>
                            </div>
                        </form>
                    
                    </div>
                </div>
            @endforeach
        @else
            <p>No comments yet.</p>
        @endif
    </div>
</section>


