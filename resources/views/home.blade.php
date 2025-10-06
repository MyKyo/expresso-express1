{{-- Menggunakan layout utama dari layouts.app --}}
@extends('layouts.app')

{{-- Mengatur judul spesifik untuk halaman ini --}}
@section('title', 'Beranda')

{{-- Memulai section 'content' untuk diisi ke dalam @yield('content') di layout --}}
@section('content')

{{-- ================================================================
    SECTION: PRODUK UNGGULAN (Carousel)
================================================================ --}}
<section id="menu" class="product-section bg-light py-5 scroll-reveal">
    <div class="position-relative">
        <div class="product-scroll-wrapper" id="product-wrapper">
            @php
                $products = \App\Models\Product::where('is_active', true)
                    ->orderBy('sort_order')
                    ->orderBy('id', 'desc')
                    ->get();
            @endphp

            <div class="product-row d-flex">
                @forelse($products as $product)
                    <div class="text-center product-card">
                        <img src="{{ $product->image_path ? asset('storage/'.$product->image_path) : asset('img/coffe/1.png') }}" alt="{{ $product->name }}" class="img-fluid">
                        <div class="product-card-title">{{ $product->name }}</div>
                    </div>
                @empty
                    <div class="text-center w-100 py-4">Belum ada produk.</div>
                @endforelse
            </div>
            {{-- Tombol NAVIGASI khusus mobile: di dalam wrapper --}}
            <button id="mobile-prev-btn" type="button" class="product-nav-arrow prev d-flex d-md-none" aria-label="Geser ke kiri">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button id="mobile-next-btn" type="button" class="product-nav-arrow next d-flex d-md-none" aria-label="Geser ke kanan">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>

        {{-- Tombol navigasi untuk desktop/tablet (posisi di luar wrapper) --}}
        <button id="prev-btn" type="button" class="product-nav-arrow prev d-none d-md-flex" aria-label="Geser ke kiri">
            <i class="bi bi-chevron-left"></i>
        </button>
        <button id="next-btn" type="button" class="product-nav-arrow next d-none d-md-flex" aria-label="Geser ke kanan">
            <i class="bi bi-chevron-right"></i>
        </button>
    </div>
</section>

<!-- Custom CSS untuk merapatkan tombol carousel -->
<style>
.product-nav-arrow {
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,0.5);
    color: #fff;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease;
    position: absolute;
    z-index: 10;
    border: none;
    cursor: pointer;
}

/* Desktop & tablet positioning */
@media (min-width: 768px) {
    #prev-btn {
        left: 2%;
    }
    #next-btn {
        right: 2%;
    }
}

/* Large desktop positioning */
@media (min-width: 1200px) {
    #prev-btn {
        left: 15%;
    }
    #next-btn {
        right: 15%;
    }
}

/* Mobile: tombol di dalam wrapper */
#mobile-prev-btn {
    left: 10px;
}
#mobile-next-btn {
    right: 10px;
}

/* Additional mobile styles */
@media (max-width: 767px) {
    .product-nav-arrow {
        width: 35px;
        height: 35px;
    }
    
    .product-nav-arrow i {
        font-size: 0.9em;
    }
}

.product-nav-arrow:hover {
    background: rgba(0,0,0,0.7);
    transform: translateY(-50%) scale(1.1);
}
</style>



{{-- ================================================================
    SECTION: INTERAKTIF KOLEKSI KOPI
================================================================ --}}
<section style="padding:60px 0; background: transparent;">
    <div class="container scroll-reveal">
        {{-- Class "animated-gradient-bg" ditambahkan di sini --}}
        <div class="rounded-5 shadow overflow-hidden coffee-wrap animated-gradient-bg">
            <div class="row g-2 align-items-center justify-content-center p-4 p-md-4">
            
                <div class="col-md-6 d-flex flex-column justify-content-center text-white text-center text-md-start order-md-1">
                    <img id="main-label" class="mb-3 scroll-reveal scroll-reveal-delay-1" style="max-width: 320px; width:100%; height:auto; object-fit:contain;" />
                    <img id="main-text" class="mb-3 scroll-reveal scroll-reveal-delay-2"  style="max-width: 320px; width:100%; height:auto; object-fit:contain;" />
                    <img id="main-desc" class="mb-3 scroll-reveal scroll-reveal-delay-3"  style="max-width: 420px; width:100%; height:auto; object-fit:contain;" />
                    <p class="text-white small fw-semibold mt-2 mb-1 scroll-reveal scroll-reveal-delay-1">
                        <i class="bi bi-box-seam me-2"></i> Pilih Kemasanmu
                    </p>
                    <div id="thumb-desktop-wrap" class="mt-2 d-none d-md-flex flex-wrap gap-3 justify-content-center justify-content-md-start scroll-reveal scroll-reveal-delay-2">
                        <div id="thumbnail-container" class="d-flex flex-wrap gap-3 justify-content-center justify-content-md-start"></div>
                    </div>
                </div>

                <div id="main-col" class="col-lg-5 col-md-6 col-12 text-center order-md-2 position-relative">
                    <!-- Gambar Background Absolute -->
                    <div class="position-absolute coffee-bg-decoration" style="z-index: 0;">
                        <img src="{{ asset('assets/img/Asset_42.png') }}" alt="background decoration" class="w-100 h-100 object-fit-contain">
                    </div>
                    
                    <div id="main-box" class="mx-auto d-flex align-items-center justify-content-center fw-bold text-white scroll-reveal position-relative" style="max-width: 450px; width: 100%; aspect-ratio: 1/1; overflow: hidden; border-radius: 20px; z-index: 1;">
                        <img src="" alt="coffee image" class="w-100 h-100 object-fit-contain" id="main-img">
                    </div>
                    <div id="thumb-mobile-wrap" class="d-flex d-md-none mt-3 justify-content-center scroll-reveal scroll-reveal-delay-1 position-relative" style="z-index: 1;"></div>
                </div>

            </div>
        </div>
    </div>
</section>  

{{-- CSS Styling original Anda --}}
<style>
#thumbnail-container .card {
    transition: transform .3s, box-shadow .3s;
}
#thumbnail-container .card:hover {
    transform: scale(1.05);
}
@media (max-width: 767.98px) {
    #thumb-mobile-wrap { overflow-x: auto; -webkit-overflow-scrolling: touch; width: 100%; }
    #thumb-mobile-wrap::-webkit-scrollbar { height: 6px; }
    #thumb-mobile-wrap::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.4); border-radius: 3px; }
    #thumbnail-container { display: inline-flex !important; flex-wrap: nowrap !important; gap: 12px !important; padding: 6px 4px; }
    #main-box { width: 100% !important; max-width: 90vw !important; margin: 0 auto; }
    .coffee-wrap { overflow: hidden !important; }
}

/* ===== BACKGROUND DECORATION - RESPONSIF ===== */
.coffee-bg-decoration {
    /* Default untuk mobile kecil */
    width: 280px !important;
    height: 280px !important;
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%) scale(0) rotate(45deg) !important; /* Mulai dari ukuran 0 dengan rotasi */
    transition: transform 1.2s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important; /* Animasi bounce-out effect */
    z-index: 0;
    pointer-events: none;
    opacity: 0.5;
}

/* Class untuk mengaktifkan animasi zoom dari 0 ke 100% */
.coffee-bg-decoration.animate-in {
    transform: translate(-50%, -50%) scale(1) rotate(0deg) !important; /* Zoom dari 0% ke 100% tanpa rotasi */
    opacity: 1;
    transition: transform 1.2s cubic-bezier(0.175, 0.885, 0.32, 1.275), opacity 1.2s ease !important;
}

/* Animasi pulse tambahan saat hover thumbnail */
.coffee-bg-decoration.pulse {
    animation: backgroundPulse 0.6s ease-out;
}

@keyframes backgroundPulse {
    0% { transform: translate(-50%, -50%) scale(1) rotate(0deg); }
    25% { transform: translate(-50%, -50%) scale(0.95) rotate(-3deg); }
    50% { transform: translate(-50%, -50%) scale(1.08) rotate(2deg); }
    75% { transform: translate(-50%, -50%) scale(0.98) rotate(-1deg); }
    100% { transform: translate(-50%, -50%) scale(1) rotate(0deg); }
}

/* Mobile Sedang */
@media (min-width: 576px) and (max-width: 767.98px) {
    .coffee-bg-decoration {
        width: 320px !important;
        height: 320px !important;
    }
}

/* Tablet - posisi mengikuti main-box yang bergeser */
@media (min-width: 768px) and (max-width: 991.98px) {
    .coffee-bg-decoration {
        width: 380px !important;
        height: 380px !important;
        top: 50% !important;
        left: 60% !important; /* Sedikit ke kanan mengikuti box */
    }
}

/* Desktop - posisi mengikuti main-box */
@media (min-width: 992px) {
    .coffee-bg-decoration {
        width: 450px !important;
        height: 450px !important;
        top: 45% !important;
        left: 65% !important; /* Mengikuti posisi main-box */
    }
}

/* Desktop Besar - posisi mengikuti main-box yang lebih tinggi */
@media (min-width: 1200px) {
    .coffee-bg-decoration {
        width: 500px !important;
        height: 500px !important;
        top: 50% !important; /* Mengikuti main-box yang naik ke atas */
        left: 70% !important; /* Lebih ke kanan */
    }
}
</style>
<style>
#main-box { transition: all 0.3s ease; }
@media (max-width: 575.98px) {
    #main-box { max-width: 280px !important; aspect-ratio: 1/1; margin: 0 auto; }
    #main-col { padding: 0 15px; }
}
@media (min-width: 576px) and (max-width: 767.98px) {
    #main-box { max-width: 320px !important; aspect-ratio: 1/1; margin: 0 auto; }
    #main-col { padding: 0 20px; }
}
@media (min-width: 768px) and (max-width: 991.98px) {
    .coffee-wrap { overflow: visible !important; }
    #main-col { position: relative; min-height: 400px; display: flex; align-items: center; justify-content: center; }
    #main-box { position: absolute; top: 10px; left: 50px; max-width: 380px !important; transform: none; }
}
@media (min-width: 992px) {
    .coffee-wrap { overflow: visible !important; }
    #main-col { position: relative; min-height: 400px; display: flex; align-items: center; justify-content: center; }
    #main-box { position: absolute; top: 10px; left: 50px; max-width: 450px !important; transform: none; }
}
@media (min-width: 1200px) {
    .coffee-wrap { overflow: visible !important; }
    #main-col { position: relative; min-height: 400px; display: flex; align-items: center; justify-content: center; }
    #main-box { position: absolute; top: -50px; left: 100px; max-width: 450px !important; transform: none; }
}
</style>

{{-- ================================================================
    SECTION: HOW TO ORDER (APP DOWNLOAD)
================================================================ --}}
<section id="how-to-order" style="padding:4px 0; background: transparent;">
    <div class="container scroll-reveal">
        <div class="rounded-5 shadow overflow-hidden animated-gradient-bg">
            <div class="row g-2 align-items-center justify-content-center p-4 p-md-4">

  {{-- Kolom Kiri: Teks & Button --}}
<div class="col-lg-6 col-md-12 d-flex flex-column justify-content-center text-center text-md-start py-4 px-3">
    <div class="mb-4">

        <!-- Judul kecil -->
        <h1 class="fw-bold mb-5 text-uppercase lh-1 fs-3 text-color">
            EXPRESSO EXPRESS APP
        </h1>

        <!-- Judul besar -->
        <h5 class="fw-bold mb-5 lh-sm fs-2">
            MOODBOOSTER KAMU<br>
            TERLETAK DI GENGGAMANMU!
        </h5>

        <!-- Sub headline -->
        <h5 class="fw-bold mb-5 fs-2">
            DAPATKAN PROMO DAN EXPERIENCE<br>
            PENUH HANYA TERSEDIA DI APLIKASI
        </h5>

        <!-- Deskripsi -->
        <p class="mb-5 fs-5">Unduh sekarang</p>

        <!-- Tombol download -->
        <div class="d-flex gap-3 mt-2 justify-content-center justify-content-md-start align-items-center flex-wrap">
            <a href="https://play.google.com/store/apps/details?id=com.garena.game.codm&hl=id" class="text-decoration-none store-button">
                <img src="{{ asset('assets/img/Asset_15.png') }}" alt="Get it on Google Play" class="img-fluid" style="height:48px;">
            </a>
            <a href="https://apps.apple.com/id/app/minecraft-bangun-bertahan/id479516143?l=id" class="text-decoration-none store-button">
                <img src="{{ asset('assets/img/Asset_16.png') }}" alt="Download on the App Store" class="img-fluid" style="height:48px;">
            </a>
        </div>

        <style>
        .store-button {
            transition: all 0.3s ease;
            display: inline-block;
            transform: translateY(0);
        }
        
        .store-button:hover {
            transform: translateY(-5px) scale(1.05);
            filter: brightness(1.1);
        }
        
        .store-button:active {
            transform: translateY(0) scale(0.95);
        }
        </style>
    </div>
</div>



                {{-- Kolom Kanan: Mockup Aplikasi --}}
                <div class="col-lg-6 col-md-12 text-center">
                    <img src="{{ asset('assets/img/Asset_14.png') }}" 
                         alt="Mockup App Expresso Express" 
                         class="img-fluid" 
                         style="max-height:500px;">
                </div>

            </div>
        </div>
    </div>
</section>

<style>
.col-lg-6 .text-color {
    color: #ebdece !important;
}
</style>

{{-- CSS Styling original Anda --}}
<style>
#how-to-order { background: #1b0404ff; color: #fff; border-radius: 40px 40px 40px 40px; overflow: hidden; }
#how-to-order h2, #how-to-order h3, #how-to-order h5, #how-to-order p { color: #ebdece !important; }
#how-to-order img { max-width: 100%; height: auto; display: block; margin: 0 auto; }
#how-to-order .animated-gradient-bg {
    background: linear-gradient(135deg, #670103, #420102 40%, #670103);
    background-size: 300% 300%;
    background-position: 0% 50%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
}

/* Gradient border untuk bagian bawah How to Order section */
#how-to-order .animated-gradient-bg::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 25px;
    background: 
        linear-gradient(90deg, 
            #170202 0%, 
            #170202 22%, 
            #170202 25%, 
            #350102 25%, 
            #350102 47%, 
            #350102 50%, 
            #520102 50%, 
            #520102 72%, 
            #520102 75%, 
            #BCB2A5 75%, 
            #BCB2A5 100%);
    opacity: 1;
    border-radius: 0 0 20px 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
}

#how-to-order .animated-gradient-bg:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

@keyframes gradientBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

@media (min-width: 992px) {
    #how-to-order .row { align-items: start !important; }
    #how-to-order .col-lg-6:first-child { padding-top: 4rem !important; padding-bottom: 4rem !important; display: flex; flex-direction: column; justify-content: flex-start; }
    #how-to-order .col-lg-6:last-child { padding-top: 2rem !important; display: flex; align-items: flex-start; justify-content: center; }
    #how-to-order .col-lg-6:last-child img { max-height: 450px; width: auto; }
}
@media (max-width: 777.98px) {
    #how-to-order .px-5 { padding-left: 1rem !important; padding-right: 1rem !important; }
    #how-to-order .py-4 { padding-top: 1.5rem !important; padding-bottom: 1.5rem !important; }
}
</style>

{{-- ================================================================
    SECTION: BLOG TERBARU
================================================================ --}}
<section id="blog" class="py-5 scroll-reveal" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
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

        @php
            $latestPosts = \App\Models\BlogPost::where('is_published', true)->latest('published_at')->take(3)->get();
        @endphp

        <!-- Blog Grid -->
        <div class="row g-4">
            @forelse($latestPosts as $index => $post)
            <div class="col-lg-4 col-md-6 scroll-reveal scroll-reveal-delay-{{ ($index % 3) + 1 }}">
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
                            <h3 class="blog-title-card">{{ $post->title }}</h3>
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
    </div>
</section>

<style>
/* ===================================
   BLOG SECTION STYLES
=================================== */
#blog .header-divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #670103, #9d2533);
    border-radius: 2px;
}

/* Blog Card Styles */
#blog .blog-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}

#blog .blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(103, 1, 3, 0.15);
}

#blog .blog-card-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

/* Image Styles */
#blog .blog-image-wrapper {
    position: relative;
    width: 100%;
    padding-top: 65%; /* 16:10 aspect ratio */
    overflow: hidden;
    background: linear-gradient(135deg, #f5f5f5, #e0e0e0);
}

#blog .blog-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

#blog .blog-card:hover .blog-image {
    transform: scale(1.1);
}

#blog .blog-image-placeholder {
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

/* Overlay Styles */
#blog .blog-overlay {
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

#blog .blog-card:hover .blog-overlay {
    opacity: 1;
}

#blog .read-more-badge {
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

#blog .blog-card:hover .read-more-badge {
    transform: translateY(0);
}

/* Content Styles */
#blog .blog-content {
    padding: 1.8rem;
}

#blog .blog-title-card {
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

#blog .blog-card:hover .blog-title-card {
    color: #670103;
}

#blog .blog-excerpt {
    font-size: 0.95rem;
    color: #636e72;
    line-height: 1.7;
    margin-bottom: 1.2rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Meta Styles */
#blog .blog-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding-top: 1rem;
    border-top: 1px solid #f0f0f0;
}

#blog .meta-date {
    font-size: 0.85rem;
    color: #95a5a6;
    display: flex;
    align-items: center;
    font-weight: 500;
}

/* Empty State */
#blog .empty-state {
    background: white;
    border-radius: 20px;
    padding: 3rem;
}

/* Responsive */
@media (max-width: 768px) {
    #blog .blog-title-card {
        font-size: 1.2rem;
    }
    
    #blog .blog-excerpt {
        font-size: 0.9rem;
        -webkit-line-clamp: 2;
    }
    
    #blog .blog-content {
        padding: 1.5rem;
    }

    #blog .blog-image-wrapper {
        padding-top: 70%;
    }
}
</style>

{{-- ================================================================
    Tentang Kami
================================================================ --}}
@php
    $about = \App\Models\About::where('is_published', true)->latest('id')->first();
    $imgMain = $about && $about->image_path ? asset('storage/'.$about->image_path) : asset('img/about/2.png');
@endphp

<style>
/* About Section Divider */
.about-divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #670103, #9d2533);
    border-radius: 2px;
}

/* About Image Container */
#about .image-container {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
}

#about .image-container img {
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

#about .image-container:hover img {
    transform: scale(1.05);
}

/* Custom Button for About Section */
.btn-about-custom {
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
    border: 2px solid transparent;
}

.btn-about-custom:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(103, 1, 3, 0.4);
    color: white;
    background: linear-gradient(135deg, #9d2533, #670103);
}

.btn-about-custom:active {
    transform: translateY(-2px);
}

.btn-about-custom i {
    transition: transform 0.3s ease;
}

.btn-about-custom:hover i {
    transform: translateX(5px);
}
</style>

{{-- ============================================
== ABOUT SECTION
============================================ --}}
<section id="about" class="py-5 scroll-reveal" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
    <div class="container">
        <!-- Header Section -->
        <div class="text-center mb-5 animate-fade-in">
            <h1 class="display-4 fw-bold mb-3" style="font-family: 'Halima Sofira', sans-serif; color: #670103;">
                Tentang Kami
            </h1>
            <div class="about-divider mx-auto mb-4"></div>
            <p class="lead text-muted" style="max-width: 600px; margin: 0 auto;">
                Kenali lebih dekat perjalanan kami dalam menghadirkan kopi terbaik untuk Anda
            </p>
        </div>

        <div class="row align-items-center justify-content-center">
            {{-- Gambar Full --}}
            <div class="col-12 mb-4">
                <div class="position-relative d-inline-block w-100 image-container">
                    {{-- Gambar Utama --}}
                    <img src="{{ $imgMain }}" 
                         alt="Tentang Kami"
                         class="img-fluid w-100"
                         style="max-height: 500px; object-fit: contain; border-radius: 20px; box-shadow: 0 15px 40px rgba(103, 1, 3, 0.15);">
                </div>
            </div>
            
            {{-- Tombol di bawah gambar --}}
            <div class="text-center mt-4">
                <a href="{{ route('about.show') }}"
                   class="btn-about-custom">
                    <i class="bi bi-arrow-right-circle me-2"></i> Ikuti Perjalanan Kami
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ================================================================
    SCRIPT DAN STYLE UNTUK BAGIAN INTERAKTIF
================================================================ --}}
@php
    $coffeeModels = \App\Models\CoffeeItem::where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('id','desc')
        ->get();
    $coffees = $coffeeModels->map(function($i, $key){
        return [
            'id' => $key,
            'image' => $i->image_path ? asset('storage/'.$i->image_path) : asset('img/coffe/1.png'),
            'name' => $i->name ? asset('storage/'.$i->name) : null,
            'label' => $i->label ? asset('storage/'.$i->label) : null,
            'desc' => $i->description ? asset('storage/'.$i->description) : null,
        ];
    })->values();
@endphp
@push('scripts')
<style>
    /* ================================================================
       SCROLL ANIMATION STYLES - MINIMALIST
    ================================================================ */
    .scroll-reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .scroll-reveal.active {
        opacity: 1;
        transform: translateY(0);
    }

    .scroll-reveal-left {
        opacity: 0;
        transform: translateX(-30px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .scroll-reveal-left.active {
        opacity: 1;
        transform: translateX(0);
    }

    .scroll-reveal-right {
        opacity: 0;
        transform: translateX(30px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .scroll-reveal-right.active {
        opacity: 1;
        transform: translateX(0);
    }

    /* Delay untuk efek stagger */
    .scroll-reveal-delay-1 { transition-delay: 0.1s; }
    .scroll-reveal-delay-2 { transition-delay: 0.2s; }
    .scroll-reveal-delay-3 { transition-delay: 0.3s; }
    
    /* Prevent animation conflicts */
    .scroll-reveal.active {
        pointer-events: auto;
    }
    
    .scroll-reveal:not(.active) {
        pointer-events: none;
    }

    /* ================================================================
       COFFEE SECTION STYLES
    ================================================================ */
    /* 1. ANIMASI GRADIENT (HANYA AKTIF SAAT DIKLIK) */
    .animated-gradient-bg {
        background: linear-gradient(135deg, #670103, #420102 40%, #670103);
        background-size: 300% 300%;
        background-position: 0% 50%;
        transition: background-position 0.5s ease;
        position: relative;
    }

    /* Gradient border untuk bagian bawah Interactive Coffee Items section */
    .coffee-wrap::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 25px;
        background: 
            linear-gradient(90deg, 
                #170202 0%, 
                #170202 22%, 
                #170202 25%, 
                #350102 25%, 
                #350102 47%, 
                #350102 50%, 
                #520102 50%, 
                #520102 72%, 
                #520102 75%, 
                #BCB2A5 75%, 
                #BCB2A5 100%);
        opacity: 1;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }
    .animated-gradient-bg.is-animating {
        animation: animatedGradient 5s ease forwards;
    }
    @keyframes animatedGradient {
        from { background-position: 0% 50%; }
        to { background-position: 100% 50%; }
    }

    /* STYLE THUMBNAIL AKTIF */
    #thumbnail-container .card.active {
        outline: 3px solid #FFD700;
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    /* Animasi untuk teks dan elemen - Tetap digunakan untuk interaksi klik */
    @keyframes slideUp { 
        0% { 
            opacity: 0; 
            transform: translateY(30px); 
        } 
        100% { 
            opacity: 1; 
            transform: translateY(0); 
        } 
    }
    .animate-up { 
        animation: slideUp 0.6s ease-out forwards;
    }
    @keyframes slideUpSmall { 
        0% { 
            opacity: 0; 
            transform: translateY(15px); 
        } 
        100% { 
            opacity: 1; 
            transform: translateY(0); 
        } 
    }
    .animate-up-small { 
        animation: slideUpSmall 0.4s ease-out forwards;
    }
</style>

<script id="coffee-data" type="application/json">{!! json_encode($coffees) !!}</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ================================================================
    // SCROLL ANIMATION FUNCTIONALITY
    // ================================================================
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.85 &&
            rect.bottom >= 0
        );
    }

    function revealOnScroll() {
        const elements = document.querySelectorAll('.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right');
        
        elements.forEach(element => {
            if (isInViewport(element) && !element.classList.contains('active')) {
                element.classList.add('active');
            }
        });
    }

    // Jalankan saat scroll
    window.addEventListener('scroll', revealOnScroll);
    
    // Jalankan saat halaman pertama kali dimuat
    revealOnScroll();

    // ================================================================
    // COFFEE INTERACTIVE SECTION
    // ================================================================
    // Ambil data kopi dari HTML
    const dataEl = document.getElementById('coffee-data');
    let coffees = [];
    try {
        coffees = dataEl && dataEl.textContent ? JSON.parse(dataEl.textContent) : [];
    } catch (e) {
        console.error("Gagal parse data kopi:", e);
        coffees = [];
    }

    // Deklarasi semua elemen yang dibutuhkan
    const coffeeWrap = document.querySelector('.coffee-wrap');
    const mainBox = document.getElementById('main-box');
    const mainImg = document.getElementById('main-img');
    const mainLabel = document.getElementById('main-label');
    const mainText = document.getElementById('main-text');
    const mainDesc = document.getElementById('main-desc');
    const thumbnailContainer = document.getElementById('thumbnail-container');
    const thumbMobileWrap = document.getElementById('thumb-mobile-wrap');
    const thumbDesktopWrap = document.getElementById('thumb-desktop-wrap');

    // Fungsi utama untuk update tampilan saat thumbnail diklik
    function updateProductDisplay(coffee) {
        // Picu animasi gradien di latar belakang
        if (coffeeWrap) {
            coffeeWrap.classList.remove('is-animating');
            void coffeeWrap.offsetWidth;
            coffeeWrap.classList.add('is-animating');
        }

        // Tambahkan animasi saat klik (tidak mengganggu scroll reveal)
        mainBox.classList.add('animate-up');
        setTimeout(() => mainBox.classList.remove('animate-up'), 600);

        // Ganti sumber gambar dengan preload untuk menghindari flicker
        const img = new Image();
        img.onload = () => {
            mainImg.src = coffee.image;
        };
        img.src = coffee.image;
        
        // Tambahkan animasi untuk elemen teks saat klik dengan stagger effect
        [mainLabel, mainText, mainDesc].forEach((el, idx) => {
            if (el) {
                el.classList.add('animate-up');
                setTimeout(() => el.classList.remove('animate-up'), 600 + (idx * 100));
            }
        });
        
        // Update text elements with proper null checks
        if (coffee.label && mainLabel) { 
            mainLabel.src = coffee.label; 
        } else if (mainLabel) { 
            mainLabel.removeAttribute('src'); 
        }
        
        if (coffee.name && mainText) { 
            mainText.src = coffee.name; 
        } else if (mainText) { 
            mainText.removeAttribute('src'); 
        }
        
        if (coffee.desc && mainDesc) { 
            mainDesc.src = coffee.desc; 
        } else if (mainDesc) { 
            mainDesc.removeAttribute('src'); 
        }

        // Tandai thumbnail yang aktif
        document.querySelectorAll('#thumbnail-container .card').forEach(thumb => {
            thumb.classList.toggle('active', thumb.dataset.id == coffee.id);
        });
    }
    
    // Buat dan tampilkan semua thumbnail
    coffees.forEach(coffee => {
        const thumb = document.createElement('div');
        thumb.className = 'card shadow-sm rounded-3 animate-up-small';
        thumb.style.cssText = 'min-width: 70px; width: 70px; height: 70px; cursor: pointer; overflow: hidden;';
        thumb.dataset.id = coffee.id;

        const img = document.createElement('img');
        img.src = coffee.image;
        img.className = 'w-100 h-100 object-fit-cover rounded-3';
        img.alt = 'thumbnail';

        thumb.appendChild(img);
        thumbnailContainer.appendChild(thumb);

        // Tambahkan event listener pada setiap thumbnail
        thumb.addEventListener('click', () => {
            updateProductDisplay(coffee);
            animateBackgroundDecoration();
        });
    });

    // Fungsi untuk animasi background decoration dengan efek zoom out yang lebih dramatis
    function animateBackgroundDecoration() {
        const bgDecoration = document.querySelector('.coffee-bg-decoration');
        if (bgDecoration) {
            // Reset semua class animasi
            bgDecoration.classList.remove('animate-in', 'pulse');
            
            // Trigger reflow untuk memastikan class dihapus
            void bgDecoration.offsetWidth;
            
            // Tambahkan class animasi zoom out setelah delay singkat
            requestAnimationFrame(() => {
                bgDecoration.classList.add('animate-in');
                
                // Tambahkan efek pulse setelah zoom out selesai
                setTimeout(() => {
                    bgDecoration.classList.add('pulse');
                    
                    // Hapus class pulse setelah animasi selesai
                    setTimeout(() => {
                        bgDecoration.classList.remove('pulse');
                    }, 600);
                }, 1200); // Increased delay to match CSS animation duration
            });
        }
    }
    
    // Fungsi untuk efek hover pada thumbnail dengan animasi background
    function addThumbnailHoverEffects() {
        document.querySelectorAll('#thumbnail-container .card').forEach(thumb => {
            // Remove existing listeners to prevent duplicates
            thumb.removeEventListener('mouseenter', thumb._hoverHandler);
            
            // Create new handler
            thumb._hoverHandler = () => {
                const bgDecoration = document.querySelector('.coffee-bg-decoration');
                if (bgDecoration && !thumb.classList.contains('active')) {
                    // Prevent multiple pulse animations
                    if (!bgDecoration.classList.contains('pulse')) {
                        bgDecoration.classList.add('pulse');
                        setTimeout(() => {
                            bgDecoration.classList.remove('pulse');
                        }, 600);
                    }
                }
            };
            
            thumb.addEventListener('mouseenter', thumb._hoverHandler);
        });
    }

    // Tampilkan produk pertama saat halaman dimuat
    if(coffees.length > 0){
        updateProductDisplay(coffees[0]);
        // Tambahkan efek hover pada thumbnail
        addThumbnailHoverEffects();
        // Trigger animasi background saat halaman pertama kali dimuat
        setTimeout(() => {
            animateBackgroundDecoration();
        }, 500);
    }

    // Fungsi untuk memindahkan thumbnail antara view mobile dan desktop
    function moveThumbnails() {
        if (window.innerWidth < 768) {
            if (thumbMobileWrap && thumbnailContainer.parentElement !== thumbMobileWrap) {
                thumbMobileWrap.innerHTML = '';
                thumbMobileWrap.appendChild(thumbnailContainer);
                // Re-add hover effects setelah dipindah dengan delay untuk memastikan DOM ready
                setTimeout(() => {
                    addThumbnailHoverEffects();
                }, 100);
            }
        } else {
            if (thumbDesktopWrap && thumbnailContainer.parentElement !== thumbDesktopWrap) {
                thumbDesktopWrap.innerHTML = '';
                thumbDesktopWrap.appendChild(thumbnailContainer);
                // Re-add hover effects setelah dipindah dengan delay untuk memastikan DOM ready
                setTimeout(() => {
                    addThumbnailHoverEffects();
                }, 100);
            }
        }
    }
    
    // Debounce resize event untuk performa yang lebih baik
    let resizeTimeout;
    function debouncedMoveThumbnails() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(moveThumbnails, 150);
    }
    
    moveThumbnails();
    window.addEventListener('resize', debouncedMoveThumbnails);
});
</script>
@endpush

@endsection

