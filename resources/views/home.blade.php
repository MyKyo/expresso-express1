{{-- Menggunakan layout utama dari layouts.app --}}
@extends('layouts.app')

{{-- Mengatur judul spesifik untuk halaman ini --}}
@section('title', 'Beranda')

{{-- Memulai section 'content' untuk diisi ke dalam @yield('content') di layout --}}
@section('content')

{{-- ================================================================
   SECTI
    SECTION: PRODUK UNGGULAN (Carousel horizontal scroll)
================================================================ --}}
<section id="menu" class="product-section bg-light py-5">
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


{{-- ================================================================
    SECTION: INTERAKTIF KOLEKSI KOPI
================================================================ --}}
<section style="padding:60px 0; background: transparent;">
    <div class="container">
        {{-- Class "animated-gradient-bg" ditambahkan di sini --}}
        <div class="rounded-5 shadow overflow-hidden coffee-wrap animated-gradient-bg">
            <div class="row g-2 align-items-center justify-content-center p-4 p-md-4">
            
                <div class="col-md-6 d-flex flex-column justify-content-center text-white text-center text-md-start order-md-1">
                    <img id="main-label" class="mb-3 animate-up" style="max-width: 320px; width:100%; height:auto; object-fit:contain;" />
                    <img id="main-text" class="mb-3 animate-up"  style="max-width: 320px; width:100%; height:auto; object-fit:contain;" />
                    <img id="main-desc" class="mb-3 animate-up"  style="max-width: 420px; width:100%; height:auto; object-fit:contain;" />
                    <p class="text-white small fw-semibold mt-2 mb-1">
                        <i class="bi bi-box-seam me-2"></i> Pilih Kemasanmu
                    </p>
                    <div id="thumb-desktop-wrap" class="mt-2 d-none d-md-flex flex-wrap gap-3 justify-content-center justify-content-md-start">
                        <div id="thumbnail-container" class="d-flex flex-wrap gap-3 justify-content-center justify-content-md-start"></div>
                    </div>
                </div>

                <div id="main-col" class="col-lg-5 col-md-6 col-12 text-center order-md-2">
                    {{-- class "animate-up" dihapus dari sini --}}
                    <div id="main-box" class="mx-auto d-flex align-items-center justify-content-center fw-bold text-white" style="max-width: 450px; width: 100%; aspect-ratio: 1/1; overflow: hidden; border-radius: 20px;">
                        <img src="" alt="coffee image" class="w-100 h-100 object-fit-contain" id="main-img">
                    </div>
                    <div id="thumb-mobile-wrap" class="d-flex d-md-none mt-3 justify-content-center"></div>
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
    <div class="container">
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
    <a href="https://play.google.com/store/apps/details?id=com.mojang.minecraftpe&hl=id" class="store-btn">
        <img src="{{ asset('assets/img/Asset_15.png') }}" alt="Get it on Google Play" class="img-fluid" style="height:48px;">
    </a>
    <a href="https://apps.apple.com/id/app/minecraft-bangun-bertahan/id479516143?l=id" class="store-btn">
        <img src="{{ asset('assets/img/Asset_16.png') }}" alt="Download on the App Store" class="img-fluid" style="height:48px;">
    </a>
</div>
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
.store-btn {
    display: inline-block;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 12px; /* opsional, biar ada sudut membulat */
    overflow: hidden;
}

.store-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
}
    </style>





{{-- CSS Styling original Anda --}}
<style>
#how-to-order { background: #1b0404ff; color: #fff; border-radius: 40px 40px 40px 40px; overflow: hidden; }
#how-to-order h2, #how-to-order h3, #how-to-order h5, #how-to-order p { color: #ebdece !important; }
#how-to-order img { max-width: 100%; height: auto; display: block; margin: 0 auto; }
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
<section id="blog" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold" style="font-family: 'Halima Sofira', sans-serif;">Dari Blog Kami</h2>
            <p class="lead text-muted">Baca cerita dan tips menarik seputar dunia kopi.</p>
        </div>
        @php
            $latestPosts = \App\Models\BlogPost::where('is_published', true)->latest('published_at')->take(3)->get();
        @endphp
        <div class="row">
            @forelse($latestPosts as $post)
            <div class="col-lg-4 col-md-6 mb-4">
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

@php
    $about = \App\Models\About::where('is_published', true)->latest('id')->first();
    $bg = $about && $about->image_path ? asset('storage/'.$about->image_path) : asset('img/about/2.png');
    $rawAboutText = $about ? strip_tags($about->content) : 'Kami percaya bahwa kopi berkualitas tidak harus mahal. Berawal dari mimpi sederhana untuk menyajikan kopi terbaik dari biji pilihan Indonesia kepada semua orang, kami lahir.';
    
    $cleanAboutText = preg_replace('/\b(kami\s+bersemangat)\b[^\.!?\n]*(?:[\.!?]|$)/i', '', $rawAboutText);
    $aboutText = Str::limit(trim(preg_replace('/\s+/', ' ', $cleanAboutText)), 160);
@endphp

<section id="about" class="py-5 section-bg">
    <div class="container d-flex align-items-center justify-content-center rounded shadow overflow-hidden"
         style="background: url('{{ $bg }}') no-repeat center center;
                background-size: cover;
                width: 100%;
                min-height: 500px;
                  border-radius: 50px; position: relative;">
        <div class="row text-white w-100 p-4">
            <div class="col-md-6 mt-4 mt-md-0 d-flex flex-column align-items-start justify-content-between" style="min-height: 260px;">
                <p class="lead mb-3">{{ $aboutText }}</p>
            </div>
        </div>
        <a href="{{ route('about.show') }}" class="btn btn-light position-absolute" style="left: 900px; bottom: 20px;">Selengkapnya</a>
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

    /* 2. ANIMASI PRODUK POP-UP */
    .product-enter-animation {
        animation: product-pop 0.5s ease-out forwards;
    }
    @keyframes product-pop {
        from { opacity: 0.5; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }

    /* 3. STYLE THUMBNAIL AKTIF */
    #thumbnail-container .card.active {
        outline: 3px solid #FFD700;
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    /* Animasi original Anda untuk teks (opsional, bisa disimpan atau dihapus) */
    @keyframes slideUp { 0% { opacity: 0; transform: translateY(50px); } 100% { opacity: 1; transform: translateY(0); } }
    .animate-up { animation: slideUp 0.8s ease forwards; }
    @keyframes slideUpSmall { 0% { opacity: 0; transform: translateY(20px); } 100% { opacity: 1; transform: translateY(0); } }
    .animate-up-small { animation: slideUpSmall 0.5s ease forwards; }
</style>

<script id="coffee-data" type="application/json">{!! json_encode($coffees) !!}</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
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
        // Picu animasi "pop" pada gambar produk
        mainBox.classList.remove('product-enter-animation');
        void mainBox.offsetWidth;
        mainBox.classList.add('product-enter-animation');

        // Picu animasi gradien di latar belakang
        if (coffeeWrap) {
            coffeeWrap.classList.remove('is-animating');
            void coffeeWrap.offsetWidth;
            coffeeWrap.classList.add('is-animating');
        }

        // Ganti semua sumber gambar
        mainImg.src = coffee.image;
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