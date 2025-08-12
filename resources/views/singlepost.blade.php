<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --accent-color: #f093fb;
            --dark-color: #2d3748;
            --light-bg: #f8fafc;
            --card-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            --card-shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.1);
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-card: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            color: var(--dark-color);
            line-height: 1.6;
        }

        /* Header Styles */
        .hero-header {
            background: var(--gradient-primary);
            color: white;
            padding: 3rem 0;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }

        .hero-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="1" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="1" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .hero-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Main Content Card */
        .main-card {
            background: var(--gradient-card);
            border: none;
            border-radius: 25px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            position: relative;
            margin-bottom: 2rem;
        }

        .main-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient-primary);
        }

        .card-body {
            padding: 3rem;
        }

        .card-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 2rem;
            line-height: 1.3;
        }

        .card-text {
            color: #4a5568;
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        /* Meta Information */
        .meta-section {
            background: rgba(102, 126, 234, 0.05);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .meta-item {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-right: 1.5rem;
            margin-bottom: 0.5rem;
            color: #64748b;
            font-size: 0.95rem;
        }

        .meta-item i {
            color: var(--primary-color);
            width: 16px;
            text-align: center;
        }

        .author-link,
        .country-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }

        .author-link:hover,
        .country-link:hover {
            color: var(--secondary-color);
            text-decoration: none;
        }

        .author-link::after,
        .country-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-primary);
            transition: width 0.3s ease;
        }

        .author-link:hover::after,
        .country-link:hover::after {
            width: 100%;
        }

        /* Tags */
        .tags-section {
            margin-bottom: 2rem;
        }

        .badge {
            background: var(--gradient-primary) !important;
            color: white !important;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: all 0.3s ease;
        }

        .badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            color: white !important;
        }

        /* Back Button */
        .btn-secondary {
            background: linear-gradient(135deg, #718096, #4a5568);
            border: none;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(113, 128, 150, 0.3);
            color: white;
        }

        /* Comments Section */
        .comments-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .comments-header h5 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark-color);
            margin: 0;
        }

        .comments-count {
            background: var(--gradient-primary);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .comment-item {
            background: #f8fafc;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-left: 4px solid var(--primary-color);
            transition: all 0.3s ease;
        }

        .comment-item:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .comment-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
        }

        .comment-author {
            color: var(--primary-color);
            font-weight: 600;
        }

        .comment-time {
            color: #64748b;
            font-size: 0.85rem;
        }

        .comment-text {
            color: #4a5568;
            line-height: 1.6;
        }

        .no-comments {
            text-align: center;
            padding: 3rem;
            color: #64748b;
            font-style: italic;
        }

        .no-comments i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        /* Comment Form */
        .comment-form-card {
            background: var(--gradient-card);
            border: none;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .form-card-header {
            background: var(--gradient-primary);
            color: white;
            padding: 1.5rem 2rem;
            font-size: 1.3rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-body {
            padding: 2rem;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 15px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .form-label {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            color: white;
            background: var(--gradient-primary);
        }

        /* Success Alert */
        .alert-success {
            background: linear-gradient(135deg, #10b98120, #059f0820);
            border: 1px solid #10b98130;
            border-radius: 15px;
            color: #047857;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert-success::before {
            content: '\f058';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: #10b981;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .card-body,
            .form-body {
                padding: 2rem 1.5rem;
            }

            .card-title {
                font-size: 1.8rem;
            }
        }

        /* Loading Animation */
        .loading-animation {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Container styling */
        .container.mt-5 {
            margin-top: 0 !important;
        }

        .main-container {
            padding-bottom: 3rem;
        }
    </style>
</head>

<body>
    <!-- Hero Header -->
    <div class="hero-header">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">{{ $data->title }}</h1>
                <p class="hero-subtitle">
                    <i class="fas fa-book-open me-2"></i>
                    Read and explore this amazing content
                </p>
            </div>
        </div>
    </div>

    <div class="container main-container">
        <!-- Main Post Card -->
        <div class="card main-card shadow loading-animation">
            <div class="card-body">
                <h2 class="card-title">{{ $data->title }}</h2>

                <p class="card-text">
                    {{ $data->content }}
                </p>

                <!-- Meta Information -->
                <div class="meta-section">
                    <div class="meta-item">
                        <i class="fas fa-user"></i>
                        By
                        @if ($data->user)
                            <a href="{{ route('author.posts', $data->user->slug ?? $data->user->id) }}"
                                class="author-link">
                                {{ $data->user->name }}
                            </a>
                        @else
                            <strong>Unknown Author</strong>
                        @endif
                    </div>

                    @if (isset($data->user->country))
                        <div class="meta-item">
                            <i class="fas fa-globe"></i>
                            From
                            <a href="{{ route('country.posts', $data->user->country->slug ?? $data->user->country->code) }}"
                                class="country-link">
                                {{ $data->user->country->name }}
                            </a>
                        </div>
                    @endif

                    <div class="meta-item">
                        <i class="fas fa-clock"></i>
                        {{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}
                    </div>
                </div>

                <!-- Tags -->
                <div class="tags-section">
                    @foreach ($data->tags as $tag)
                        <a href="{{ route('tag.posts', $tag->slug) }}"
                            class="badge bg-info text-dark text-decoration-none">
                            <i class="fas fa-tag"></i>
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>

                <a href="{{ route('allpost') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Back to Posts
                </a>

                <hr style="margin: 2rem 0; border-color: #e2e8f0;">

                <!-- Comments Section -->
                <div class="comments-header">
                    <h5><i class="fas fa-comments me-2"></i>Comments</h5>
                    <span class="comments-count">{{ $data->comments->count() }}</span>
                </div>

                @forelse ($data->comments as $comment)
                    <div class="comment-item loading-animation" style="animation-delay: {{ $loop->index * 0.1 }}s">
                        <div class="comment-header">
                            <i class="fas fa-user-circle" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                            <span class="comment-author">{{ $comment->name }}</span>
                            <span class="comment-time">
                                <i class="fas fa-clock"></i>
                                {{ $comment->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <p class="comment-text">{{ $comment->comment }}</p>
                    </div>
                @empty
                    <div class="no-comments">
                        <i class="fas fa-comment-slash"></i>
                        <p>No comments yet. Be the first to share your thoughts!</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Add Comment Form -->
        <div class="card comment-form-card loading-animation" style="animation-delay: 0.3s">
            <div class="form-card-header">
                <i class="fas fa-plus-circle"></i>
                Add a Comment
            </div>
            <div class="form-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('comments.store', ['post' => $data->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $data->id }}">

                    <div class="mb-3">
                        <label for="name" class="form-label">
                            <i class="fas fa-user me-1"></i>Your Name
                        </label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Enter your full name" required>
                    </div>

                    <div class="mb-3">
                        <label for="comment" class="form-label">
                            <i class="fas fa-comment me-1"></i>Comment
                        </label>
                        <textarea name="comment" id="comment" rows="4" class="form-control"
                            placeholder="Share your thoughts about this post..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i>
                        Submit Comment
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Lazy loading animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.loading-animation').forEach(el => {
            observer.observe(el);
        });

        // Form enhancements
        const form = document.querySelector('form');
        const submitBtn = document.querySelector('.btn-primary');

        form.addEventListener('submit', function() {
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
            submitBtn.disabled = true;
        });

        // Auto-resize textarea
        const textarea = document.getElementById('comment');
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });

        // Smooth scroll to comments after form submission
        if (window.location.hash === '#comments') {
            document.querySelector('.comments-header').scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>
