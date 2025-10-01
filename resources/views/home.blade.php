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

                <div id="main-col" class="col-lg-5 col-md-6 col-12 text-center order-md-2">
                    <div id="main-box" class="mx-auto d-flex align-items-center justify-content-center fw-bold text-white scroll-reveal" style="max-width: 450px; width: 100%; aspect-ratio: 1/1; overflow: hidden; border-radius: 20px;">
                        <img src="" alt="coffee image" class="w-100 h-100 object-fit-contain" id="main-img">
                    </div>
                    <div id="thumb-mobile-wrap" class="d-flex d-md-none mt-3 justify-content-center scroll-reveal scroll-reveal-delay-1"></div>
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
<section id="blog" class="py-5 scroll-reveal">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold blog-title" style="font-family: 'Halima Sofira', sans-serif;">Dari Blog Kami</h2>
            <p class="lead text-muted">Baca cerita dan tips menarik seputar dunia kopi.</p>
        </div>

<style>
/* Hover effects untuk "Dari Blog Kami" section */
#blog .blog-title {
    position: relative;
    display: inline-block;
    transition: color 0.3s ease;
}

#blog .blog-title::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -5px;
    left: 50%;
    background-color: #3f0c0c;
    transition: all 0.3s ease;
}

#blog .blog-title:hover {
    color: #3f0c0c;
}

#blog .blog-title:hover::after {
    width: 100%;
    left: 0;
}

#blog .card {
    transition: all 0.3s ease;
    border: none;
    overflow: hidden;
}

#blog .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
}

#blog .card-img-top {
    transition: all 0.5s ease;
}

#blog .card:hover .card-img-top {
    transform: scale(1.05);
}
</style>
        @php
            $latestPosts = \App\Models\BlogPost::where('is_published', true)->latest('published_at')->take(3)->get();
        @endphp
        <div class="row">
            @forelse($latestPosts as $index => $post)
            <div class="col-lg-4 col-md-6 mb-4 scroll-reveal scroll-reveal-delay-{{ ($index % 3) + 1 }}">
                <div class="card h-100 shadow-sm">
                    @if($post->cover_path)
                        <img src="{{ asset('storage/'.$post->cover_path) }}" class="card-img-top" alt="{{ $post->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($post->excerpt ?: $post->content), 120) }}</p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-sm btn-outline-dark">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">Belum ada artikel.</div>
            @endforelse
        </div>
    </div>
</section>

{{-- ================================================================
    Tentang Kami
================================================================ --}}
@php
    $about = \App\Models\About::where('is_published', true)->latest('id')->first();
    $imgMain = $about && $about->image_path ? asset('storage/'.$about->image_path) : asset('img/about/2.png');
@endphp

<style>
#about .image-container {
    position: relative;
    overflow: hidden;
    border-radius: 1rem;
}

#about .image-container img {
    transition: transform 0.5s ease;
}

#about .image-container:hover img {
    transform: scale(1.05);
}

#about .btn-dark {
    transition: all 0.3s ease;
    opacity: 0.9;
}

#about .btn-dark:hover {
    transform: translateY(-5px);
    opacity: 1;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3) !important;
}

#about h2 {
    position: relative;
    display: inline-block;
}

#about h2::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -5px;
    left: 50%;
    background-color: #3f0c0c;
    transition: all 0.3s ease;
}

#about h2:hover::after {
    width: 100%;
    left: 0;
}

#about .lead {
    transition: color 0.3s ease;
}

#about .lead:hover {
    color: #3f0c0c;
}
</style>

{{-- ============================================
== ABOUT SECTION
============================================ --}}
<section id="about" class="py-5 scroll-reveal">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            
            {{-- Gambar Full --}}
            <div class="col-12 mb-4">
                <div class="position-relative d-inline-block w-100 image-container">
                    {{-- Gambar Utama --}}
                    <img src="{{ $imgMain }}" 
                         alt="Tentang Kami"
                         class="img-fluid w-100 shadow"
                         style="max-height: 500px; object-fit: contain;">
                </div>
            </div>
                {{-- Tombol di bawah teks --}}
                <div class="text-center text-lg-start mt-4">
                    <a href="{{ route('about.show') }}"
                       class="btn btn-dark px-5 py-3 fw-semibold shadow-lg">
                        <i class="bi bi-arrow-right-circle me-2"></i> Ikuti Perjalanan Kami
                    </a>
                </div>
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

    /* ================================================================
       COFFEE SECTION STYLES
    ================================================================ */
    /* 1. ANIMASI GRADIENT (HANYA AKTIF SAAT DIKLIK) */
    .animated-gradient-bg {
        background: linear-gradient(135deg, #670103, #420102 40%, #670103);
        background-size: 300% 300%;
        background-position: 0% 50%;
        transition: background-position 0.5s ease;
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

        // Ganti sumber gambar
        mainImg.src = coffee.image;
        
        // Tambahkan animasi untuk elemen teks saat klik
        [mainLabel, mainText, mainDesc].forEach((el, idx) => {
            el.classList.add('animate-up');
            setTimeout(() => el.classList.remove('animate-up'), 600);
        });
        
        if (coffee.label) { mainLabel.src = coffee.label; } else { mainLabel.removeAttribute('src'); }
        if (coffee.name) { mainText.src = coffee.name; } else { mainText.removeAttribute('src'); }
        if (coffee.desc) { mainDesc.src = coffee.desc; } else { mainDesc.removeAttribute('src'); }

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
        });
    });

    // Tampilkan produk pertama saat halaman dimuat
    if(coffees.length > 0){
        updateProductDisplay(coffees[0]);
    }

    // Fungsi untuk memindahkan thumbnail antara view mobile dan desktop
    function moveThumbnails() {
        if (window.innerWidth < 768) {
            if (thumbMobileWrap && thumbnailContainer.parentElement !== thumbMobileWrap) {
                thumbMobileWrap.innerHTML = '';
                thumbMobileWrap.appendChild(thumbnailContainer);
            }
        } else {
            if (thumbDesktopWrap && thumbnailContainer.parentElement !== thumbDesktopWrap) {
                thumbDesktopWrap.innerHTML = '';
                thumbDesktopWrap.appendChild(thumbnailContainer);
            }
        }
    }
    moveThumbnails();
    window.addEventListener('resize', moveThumbnails);
});
</script>
@endpush

@endsection
