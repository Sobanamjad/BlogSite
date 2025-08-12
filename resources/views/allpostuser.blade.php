<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">{{ $title }}</h2>

        @forelse($posts as $post)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">{{ $post->title }}</h4>
                    <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>
                    <p>
                        <small class="text-secondary">
                            By {{ $post->user->name ?? 'Unknown' }} on {{ $post->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <div class="mb-2">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('tag.posts', $tag->slug) }}"
                                class="badge bg-info text-dark text-decoration-none">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                    <a href="{{ route('post.view', $post->id) }}" class="btn btn-sm btn-primary">View Post</a>
                </div>
            </div>
        @empty
            <p>No posts found for this tag.</p>
        @endforelse

        <a href="{{ route('allpost') }}" class="btn btn-secondary mt-3">← Back to All Posts</a>
    </div>
</body>

</html>
