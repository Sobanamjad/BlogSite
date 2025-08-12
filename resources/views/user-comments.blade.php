<!DOCTYPE html>
<html>
<head>
    <title>Comments Through User's Posts</title>
</head>
<body>
    <h2>Comments on posts written by {{ $user->name }}</h2>

    @if($comments->count())
        <ul>
            @foreach($comments as $comment)
                <li>
                    <strong>Post:</strong> {{ $comment->post->title ?? 'N/A' }}<br>
                    <strong>Comment:</strong> {{ $comment->comment }}<br>
                    <strong>By:</strong> {{ $comment->name }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No comments found through this user's posts.</p>
    @endif
</body>
</html>
