@extends('layouts.app')

@section('title', $post->title)

@section('content')
<article class="blog-post-detail">
    <!-- Hero Section -->
    <section class="blog-hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Back Button -->
                    <div class="back-button-wrapper animate-fade-in">
                        <a href="{{ route('blog.index') }}" class="back-button">
                            <i class="bi bi-arrow-left me-2"></i> Kembali ke Blog
                        </a>
                    </div>

                    <!-- Title & Meta -->
                    <div class="blog-header text-center animate-slide-up">
                        <h1 class="blog-post-title">{{ $post->title }}</h1>
                        <div class="blog-post-meta">
                            <span class="meta-item">
                                <i class="bi bi-calendar3"></i>
                                {{ $post->published_at ? $post->published_at->format('d F Y') : 'Baru dipublikasikan' }}
                            </span>
                            <span class="meta-divider">•</span>
                            <span class="meta-item">
                                <i class="bi bi-clock"></i>
                                {{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min membaca
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    @if($post->cover_path)
    <section class="blog-featured-image animate-zoom-in">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="featured-image-wrapper">
                        <img src="{{ asset('storage/'.$post->cover_path) }}" 
                             class="featured-image" 
                             alt="{{ $post->title }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Content Section -->
    <section class="blog-content-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-content-wrapper animate-fade-in-up">
                        <!-- Excerpt -->
                        @if($post->excerpt)
                        <div class="blog-excerpt-box">
                            <div class="excerpt-icon">
                                <i class="bi bi-quote"></i>
                            </div>
                            <p class="excerpt-text">{{ $post->excerpt }}</p>
                        </div>
                        @endif

                        <!-- Main Content -->
                        <div class="blog-content-text">
                            {!! nl2br(e($post->content)) !!}
                        </div>

                        <!-- Share Section -->
                        <div class="blog-share-section">
                            <h5 class="share-title">Bagikan Artikel Ini</h5>
                            <div class="share-buttons">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}" 
                                   target="_blank" 
                                   class="share-btn share-facebook"
                                   title="Bagikan ke Facebook">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}" 
                                   target="_blank" 
                                   class="share-btn share-twitter"
                                   title="Bagikan ke Twitter">
                                    <i class="bi bi-twitter"></i>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . route('blog.show', $post->slug)) }}" 
                                   target="_blank" 
                                   class="share-btn share-whatsapp"
                                   title="Bagikan ke WhatsApp">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('blog.show', $post->slug)) }}&title={{ urlencode($post->title) }}" 
                                   target="_blank" 
                                   class="share-btn share-linkedin"
                                   title="Bagikan ke LinkedIn">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Posts / Back to Blog -->
    <section class="blog-footer-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="back-to-blog">
                        <a href="{{ route('blog.index') }}" class="btn-back-blog">
                            <i class="bi bi-grid-3x3-gap me-2"></i>
                            Lihat Semua Artikel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

<style>
/* ===================================
   GENERAL STYLES
=================================== */
.blog-post-detail {
    background: linear-gradient(135deg, #fafafa 0%, #ffffff 100%);
    padding-bottom: 4rem;
}

/* ===================================
   HERO SECTION
=================================== */
.blog-hero {
    padding: 3rem 0 2rem;
}

.back-button-wrapper {
    margin-bottom: 2rem;
}

.back-button {
    display: inline-flex;
    align-items: center;
    color: #636e72;
    text-decoration: none;
    font-weight: 500;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    transition: all 0.3s ease;
    background: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.back-button:hover {
    color: #670103;
    background: #fff5f5;
    transform: translateX(-5px);
}

.blog-header {
    margin: 2rem 0;
}

.blog-post-title {
    font-size: 2.8rem;
    font-weight: 800;
    color: #2d3436;
    line-height: 1.2;
    margin-bottom: 1.5rem;
    font-family: 'Montserrat', sans-serif;
}

.blog-post-meta {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    color: #95a5a6;
    font-size: 0.95rem;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

.meta-item i {
    font-size: 1.1rem;
}

.meta-divider {
    color: #dfe6e9;
}

/* ===================================
   FEATURED IMAGE
=================================== */
.blog-featured-image {
    padding: 2rem 0 3rem;
}

.featured-image-wrapper {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(103, 1, 3, 0.15);
    background: linear-gradient(135deg, #f5f5f5, #e0e0e0);
}

.featured-image {
    width: 100%;
    height: auto;
    display: block;
    max-height: 600px;
    object-fit: cover;
}

/* ===================================
   CONTENT SECTION
=================================== */
.blog-content-section {
    padding: 2rem 0;
}

.blog-content-wrapper {
    background: white;
    border-radius: 24px;
    padding: 3rem;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
}

.blog-excerpt-box {
    background: linear-gradient(135deg, #fff5f5 0%, #ffe8e8 100%);
    border-left: 4px solid #670103;
    border-radius: 12px;
    padding: 2rem;
    margin-bottom: 3rem;
    position: relative;
}

.excerpt-icon {
    position: absolute;
    top: 1.5rem;
    right: 1.5rem;
    font-size: 3rem;
    color: #670103;
    opacity: 0.1;
}

.excerpt-text {
    font-size: 1.15rem;
    line-height: 1.8;
    color: #2d3436;
    font-style: italic;
    margin: 0;
    position: relative;
    z-index: 1;
}

.blog-content-text {
    font-size: 1.1rem;
    line-height: 1.9;
    color: #2d3436;
    margin-bottom: 3rem;
}

.blog-content-text p {
    margin-bottom: 1.5rem;
}

/* ===================================
   SHARE SECTION
=================================== */
.blog-share-section {
    border-top: 2px solid #f0f0f0;
    padding-top: 2.5rem;
    margin-top: 3rem;
    text-align: center;
}

.share-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #2d3436;
    margin-bottom: 1.5rem;
}

.share-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.share-btn {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    font-size: 1.3rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}

.share-btn:hover {
    transform: translateY(-5px) scale(1.1);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
}

.share-facebook {
    background: linear-gradient(135deg, #1877f2, #0c63d4);
}

.share-twitter {
    background: linear-gradient(135deg, #1da1f2, #0c8cd9);
}

.share-whatsapp {
    background: linear-gradient(135deg, #25d366, #1ebe57);
}

.share-linkedin {
    background: linear-gradient(135deg, #0077b5, #005885);
}

/* ===================================
   FOOTER SECTION
=================================== */
.blog-footer-section {
    padding: 3rem 0 1rem;
}

.back-to-blog {
    text-align: center;
}

.btn-back-blog {
    display: inline-flex;
    align-items: center;
    background: linear-gradient(135deg, #670103, #9d2533);
    color: white;
    padding: 1rem 2.5rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.05rem;
    box-shadow: 0 10px 30px rgba(103, 1, 3, 0.3);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.btn-back-blog:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(103, 1, 3, 0.4);
    color: white;
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

@keyframes zoomIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeIn 0.6s ease-out;
}

.animate-slide-up {
    animation: slideUp 0.8s ease-out 0.2s backwards;
}

.animate-zoom-in {
    animation: zoomIn 0.8s ease-out 0.4s backwards;
}

.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out 0.6s backwards;
}

/* ===================================
   RESPONSIVE
=================================== */
@media (max-width: 992px) {
    .blog-post-title {
        font-size: 2.2rem;
    }
    
    .blog-content-wrapper {
        padding: 2rem;
    }
}

@media (max-width: 768px) {
    .blog-hero {
        padding: 2rem 0 1.5rem;
    }

    .blog-post-title {
        font-size: 1.8rem;
    }
    
    .blog-content-wrapper {
        padding: 1.5rem;
        border-radius: 16px;
    }
    
    .blog-excerpt-box {
        padding: 1.5rem;
    }
    
    .excerpt-text {
        font-size: 1rem;
    }
    
    .blog-content-text {
        font-size: 1rem;
    }

    .featured-image {
        max-height: 400px;
    }

    .share-btn {
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
    }
}

@media (max-width: 576px) {
    .blog-post-title {
        font-size: 1.5rem;
    }

    .blog-post-meta {
        font-size: 0.85rem;
    }

    .btn-back-blog {
        padding: 0.875rem 2rem;
        font-size: 0.95rem;
    }
}
</style>
@endsection


