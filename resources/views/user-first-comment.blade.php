<h1>First Comment on Any Post by {{ $user->name }}</h1>

@if($comment)
    <p><strong>Post Title:</strong> {{ $comment->post->title }}</p>
    <p><strong>Comment:</strong> {{ $comment->content }}</p>
@else
    <p>This user doesn't have any comments on their posts yet.</p>
@endif
