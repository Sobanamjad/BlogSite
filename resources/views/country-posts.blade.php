<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts from {{ $country->name }}</title>

    <!-- Bootstrap 5 CSS -->
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
            padding: 4rem 0;
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

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .hero-subtitle {
            text-align: center;
            font-size: 1.2rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        /* Post Card Styles */
        .card {
            background: var(--gradient-card);
            border: none;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            position: relative;
            height: 100%;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-shadow-hover);
        }

        .card:hover::before {
            transform: scaleX(1);
        }

        .card-body {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 1rem;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-text {
            color: #64748b;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        /* Meta Information */
        .meta-section {
            margin-top: auto;
        }

        .published-info {
            background: linear-gradient(135deg, #667eea10, #764ba210);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 15px;
            font-size: 0.9rem;
            font-weight: 500;
            border: 1px solid #667eea20;
            margin-bottom: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .author-info {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .author-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .author-link:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .country-info {
            background: rgba(102, 126, 234, 0.05);
            padding: 0.5rem 1rem;
            border-radius: 15px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .country-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .country-link:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        /* Tags */
        .badge {
            background: linear-gradient(135deg, #667eea20, #764ba220) !important;
            color: var(--primary-color) !important;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            display: inline-block;
            border: 1px solid #667eea30;
            transition: all 0.3s ease;
        }

        .badge:hover {
            background: var(--gradient-primary) !important;
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        /* View Post Button */
        .btn-outline-primary {
            background: var(--gradient-primary);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            margin-top: 1rem;
        }

        .btn-outline-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
            color: white;
            background: var(--gradient-primary);
            border: none;
        }

        .btn-outline-primary::after {
            content: '\f061';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            transition: transform 0.3s ease;
        }

        .btn-outline-primary:hover::after {
            transform: translateX(3px);
        }

        /* Alert for no posts */
        .alert-warning {
            background: linear-gradient(135deg, #fbbf2420, #f093fb20);
            border: 1px solid #fbbf2430;
            border-radius: 20px;
            padding: 3rem;
            text-align: center;
            color: #8b5a00;
            font-size: 1.1rem;
            position: relative;
        }

        .alert-warning::before {
            content: '\f071';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            font-size: 3rem;
            display: block;
            margin-bottom: 1rem;
            color: #fbbf24;
        }

        /* Pagination Wrapper */
        .pagination-wrapper {
            margin-top: 4rem;
            display: flex;
            justify-content: center;
        }

        .pagination .page-link {
            border: none;
            padding: 0.75rem 1rem;
            margin: 0 0.25rem;
            border-radius: 10px;
            color: var(--primary-color);
            background: white;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .pagination .page-link:hover,
        .pagination .page-item.active .page-link {
            background: var(--gradient-primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
            border-color: transparent;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .card-body {
                padding: 1.5rem;
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

        /* Floating Elements */
        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            width: 40px;
            height: 40px;
            top: 40%;
            right: 30%;
            animation-delay: 4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        /* Custom container styling */
        .container.mt-5 {
            margin-top: 0 !important;
        }

        .main-container {
            padding-bottom: 3rem;
        }
    </style>

    @php use Illuminate\Support\Str; @endphp
</head>

<body>
    <!-- Hero Header -->
    <div class="hero-header">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="container">
            <h1 class="hero-title">Posts from {{ $country->name }}</h1>
            <p class="hero-subtitle">
                <i class="fas fa-globe-americas"></i>
                Discover amazing content from this region
            </p>
        </div>
    </div>

    <div class="container main-container">
        <div class="row">
            @forelse ($posts as $post)
                <div class="col-md-6 mb-4 loading-animation" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <div class="card shadow-sm h-100 border">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>

                            <p class="card-text text-muted mb-2">
                                {{ Str::limit($post->content, 100, '...') }}
                            </p>

                            <div class="meta-section">
                                <div class="published-info">
                                    <i class="fas fa-clock"></i>
                                    <strong>Published:</strong>
                                    {{ $post->created_at->diffForHumans() }}
                                </div>

                                <p class="author-info">
                                    <i class="fas fa-user me-1"></i>
                                    By
                                    <a href="{{ route('author.posts', $post->user->slug) }}" class="author-link">
                                        <strong>{{ $post->user->name }}</strong>
                                    </a>
                                </p>

                                <div class="country-info">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <strong>Country:</strong>
                                    @if ($post->user && $post->user->country)
                                        <a href="{{ route('country.posts', $post->user->country->slug) }}"
                                            class="country-link">
                                            {{ $post->user->country->name }}
                                        </a>
                                    @else
                                        <span class="text-muted">Unknown</span>
                                    @endif
                                </div>

                                @if ($post->tags && $post->tags->count())
                                    <div class="mb-3">
                                        @foreach ($post->tags as $tag)
                                            <a href="{{ route('tag.posts', $tag->slug) }}"
                                                class="badge bg-info text-dark text-decoration-none me-1">
                                                <i class="fas fa-tag me-1"></i>{{ $tag->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                @endif

                                <a href="{{ route('view.post', $post->slug) }}" class="btn btn-sm btn-outline-primary">
                                    View Post
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center loading-animation">
                        <h4>No Posts Found</h4>
                        <p>No posts found for this country. Please check back later for new content.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $posts->links() }}
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Add hover effects
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

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

        // Smooth scroll for pagination
        document.querySelectorAll('.page-link').forEach(link => {
            link.addEventListener('click', function(e) {
                setTimeout(() => {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }, 100);
            });
        });
    </script>
</body>

</html>
