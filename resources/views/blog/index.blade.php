@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<section id="blog" class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); min-height: 100vh;">
    <div class="container">
        <!-- Header Section -->
        <div class="text-center mb-5 animate-fade-in">
            <h1 class="display-4 fw-bold mb-3" style="font-family: 'Halima Sofira', sans-serif; color: #670103;">
                Dari Blog Kami
            </h1>
            <div class="header-divider mx-auto mb-4"></div>
            <p class="lead text-muted" style="max-width: 600px; margin: 0 auto;">
                Baca cerita dan tips menarik seputar dunia kopi
            </p>
        </div>

        <!-- Blog Grid -->
        <div class="row g-4">
            @forelse($posts as $post)
            <div class="col-lg-4 col-md-6 animate-slide-up" style="animation-delay: {{ ($loop->index % 3) * 0.1 }}s;">
                <article class="blog-card h-100">
                    <a href="{{ route('blog.show', $post->slug) }}" class="blog-card-link">
                        <div class="blog-image-wrapper">
                            @if($post->cover_path)
                                <img src="{{ asset('storage/'.$post->cover_path) }}" 
                                     class="blog-image" 
                                     alt="{{ $post->title }}"
                                     loading="lazy">
                            @else
                                <div class="blog-image-placeholder">
                                    <i class="bi bi-cup-hot"></i>
                                </div>
                            @endif
                            <div class="blog-overlay">
                                <span class="read-more-badge">
                                    Baca Artikel <i class="bi bi-arrow-right ms-2"></i>
                                </span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h3 class="blog-title">{{ $post->title }}</h3>
                            <p class="blog-excerpt">
                                {{ Str::limit($post->excerpt ?: strip_tags($post->content), 100) }}
                            </p>
                            <div class="blog-meta">
                                <span class="meta-date">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $post->published_at ? $post->published_at->format('d M Y') : 'Baru' }}
                                </span>
                            </div>
                        </div>
                    </a>
                </article>
            </div>
            @empty
                <div class="col-12">
                    <div class="empty-state text-center py-5">
                        <i class="bi bi-journal-text mb-3" style="font-size: 4rem; color: #dee2e6;"></i>
                        <h3 class="text-muted">Belum ada artikel</h3>
                        <p class="text-muted">Nantikan artikel menarik dari kami segera!</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($posts->hasPages())
        <div class="d-flex justify-content-center mt-5">
            <div class="pagination-wrapper">
                {{ $posts->links() }}
            </div>
        </div>
        @endif
    </div>
</section>

<style>
/* ===================================
   HEADER STYLES
=================================== */
.header-divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #670103, #9d2533);
    border-radius: 2px;
}

/* ===================================
   BLOG CARD STYLES
=================================== */
.blog-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}

.blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(103, 1, 3, 0.15);
}

.blog-card-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

/* ===================================
   IMAGE STYLES
=================================== */
.blog-image-wrapper {
    position: relative;
    width: 100%;
    padding-top: 65%; /* 16:10 aspect ratio */
    overflow: hidden;
    background: linear-gradient(135deg, #f5f5f5, #e0e0e0);
}

.blog-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.blog-card:hover .blog-image {
    transform: scale(1.1);
}

.blog-image-placeholder {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 4rem;
    color: #670103;
    opacity: 0.3;
}

/* ===================================
   OVERLAY STYLES
=================================== */
.blog-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to top, rgba(103, 1, 3, 0.9) 0%, transparent 70%);
    display: flex;
    align-items: flex-end;
    justify-content: center;
    padding: 20px;
    opacity: 0;
    transition: opacity 0.4s ease;
}

.blog-card:hover .blog-overlay {
    opacity: 1;
}

.read-more-badge {
    background: white;
    color: #670103;
    padding: 12px 24px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    display: inline-flex;
    align-items: center;
    transform: translateY(20px);
    transition: transform 0.4s ease;
}

.blog-card:hover .read-more-badge {
    transform: translateY(0);
}

/* ===================================
   CONTENT STYLES
=================================== */
.blog-content {
    padding: 1.8rem;
}

.blog-title {
    font-size: 1.35rem;
    font-weight: 700;
    color: #2d3436;
    margin-bottom: 1rem;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: color 0.3s ease;
}

.blog-card:hover .blog-title {
    color: #670103;
}

.blog-excerpt {
    font-size: 0.95rem;
    color: #636e72;
    line-height: 1.7;
    margin-bottom: 1.2rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* ===================================
   META STYLES
=================================== */
.blog-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding-top: 1rem;
    border-top: 1px solid #f0f0f0;
}

.meta-date {
    font-size: 0.85rem;
    color: #95a5a6;
    display: flex;
    align-items: center;
    font-weight: 500;
}

/* ===================================
   ANIMATIONS
=================================== */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-out;
}

.animate-slide-up {
    animation: slideUp 0.6s ease-out backwards;
}

/* ===================================
   EMPTY STATE
=================================== */
.empty-state {
    background: white;
    border-radius: 20px;
    padding: 3rem;
}

/* ===================================
   PAGINATION
=================================== */
.pagination-wrapper {
    background: white;
    padding: 1rem 1.5rem;
    border-radius: 50px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}

.pagination-wrapper .pagination {
    margin: 0;
}

/* ===================================
   RESPONSIVE
=================================== */
@media (max-width: 768px) {
    .blog-title {
        font-size: 1.2rem;
    }
    
    .blog-excerpt {
        font-size: 0.9rem;
        -webkit-line-clamp: 2;
    }
    
    .blog-content {
        padding: 1.5rem;
    }

    .blog-image-wrapper {
        padding-top: 70%;
    }
}
</style>
@endsection


