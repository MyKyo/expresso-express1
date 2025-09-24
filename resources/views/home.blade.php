{{-- Menggunakan layout utama dari layouts.app --}}
@extends('layouts.app')

{{-- Mengatur judul spesifik untuk halaman ini --}}
@section('title', 'Beranda')

{{-- Memulai section 'content' untuk diisi ke dalam @yield('content') di layout --}}
@section('content')

{{-- ================================================================
   SECTION: PRODUK UNGGULAN (Carousel horizontal scroll)
   Menampilkan daftar produk aktif dalam bentuk kartu yang bisa discroll
   dengan tombol navigasi untuk desktop dan mobile.
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
   Thumbnail dinamis (dari DB) untuk mengganti gambar dan deskripsi utama.
================================================================ --}}
<section style="padding:60px 0; background: transparent;">
    <div class="container">
        <div class="rounded-5 shadow overflow-hidden coffee-wrap" style="background-color:#670103;">
            <div class="row g-4 align-items-center justify-content-center justify-content-md-between p-4 p-md-5">
            
			<!-- Teks + Thumbnail (kiri) -->
			<div class="col-md-6 d-flex flex-column justify-content-center text-white text-center text-md-start order-md-1">
				<img id="main-text" class="mb-3 animate-up" alt="coffee name image" style="max-width: 320px; width:100%; height:auto; object-fit:contain;" />
				<img id="main-desc" class="animate-up" alt="coffee description image" style="max-width: 420px; width:100%; height:auto; object-fit:contain;" />
				<div id="thumb-desktop-wrap" class="mt-3 d-none d-md-flex flex-wrap gap-3 justify-content-center justify-content-md-start">
					<div id="thumbnail-container" class="d-flex flex-wrap gap-3 justify-content-center justify-content-md-start"><!-- Thumbnail di-generate via JS --></div>
				</div>
			</div>

			<!-- Gambar utama (kanan) -->
			<div id="main-col" class="col-md-5 text-center order-md-2">
			<div id="main-box" class="mx-auto d-flex align-items-center justify-content-center fw-bold text-white animate-up" style="max-width: 900px; width: 100%; aspect-ratio: 1/1; overflow: hidden; border-radius: 20px;">
					<img src="" alt="coffee image" class="w-100 h-100 object-fit-contain" id="main-img">
				</div>
				<div id="thumb-mobile-wrap" class="d-flex d-md-none mt-3 justify-content-center"><!-- Thumbnails dipindah ke sini pada mobile --></div>
			</div>

            </div>
        </div>
    </div>
</section>  

<style>
#thumbnail-container img {
    max-width: 100px;
    border-radius: 10px;
    cursor: pointer;
    transition: transform .3s;
}
#thumbnail-container img:hover {
    transform: scale(1.05);
}
/* Mobile horizontal scroll for thumbnails */
@media (max-width: 767.98px) {
    #thumb-mobile-wrap {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        width: 100%;
    }
    #thumb-mobile-wrap::-webkit-scrollbar { height: 6px; }
    #thumb-mobile-wrap::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.4); border-radius: 3px; }
    #thumbnail-container {
        display: inline-flex !important;
        flex-wrap: nowrap !important;
        gap: 12px !important;
        padding: 6px 4px;
    }
}
</style>
<style>
@media (min-width: 768px) {
    .coffee-wrap { overflow: visible !important; }
    #main-col { position: relative; min-height: 420px; }
    #main-box {
        position: absolute;
        top: -100px;
        left: 10%;
        transform: translateX(-50%);
    }
}
</style>

{{-- =================================================================
   HOW TO ORDER SECTION (EXPRESSO EXPRESS APP PROMO)
================================================================== --}}
<section id="how-to-order" class="py-3" style="background:#670103;">
    <div class="container-fluid px-0" style="border: radius 40px;">
        <div class="row align-items-center">
            <!-- Kolom Kiri: Teks & Logo Store -->
            <div class="col-lg-6 col-md-12 text-white px-5 py-4 d-flex flex-column justify-content-center">
                <div class="mb-4">
                    <h5 class="fw-bold mb-3" style="letter-spacing:2px;font-size:2.2rem;line-height:1;">EXPRESSO EXPRESS APP</h5>
                    <h2 class="fw-bold mb-3" style="font-size:2.2rem;line-height:1.2;">
                        MOODBOOSTER KAMU<br>
                        TERLETAK DI GENGGAMANMU!
                    </h2>
                    <h3 class="fw-bold mb-4" style="font-size:1.5rem;">
                        DAPATKAN PROMO DAN EXPERIENCE<br>
                        PENUH HANYA TERSEDIA DI APLIKASI
                    </h3>
                    <p class="mt-4" style="font-size:1.1rem;">Unduh sekarang</p>
                   <div class="d-flex gap-3 mt-2 justify-content-start align-items-center flex-wrap">
                    <a href="#" class="text-decoration-none">
                     <img src="{{ asset('assets/img/Asset_15.png') }}" alt="Get it on Google Play" style="height: 48px; max-width: 100%;">
                    </a>
                 <a href="#" class="text-decoration-none">
                 <img src="{{ asset('assets/img/Asset_16.png') }}" alt="Download on the App Store" style="height: 48px; max-width: 100%;">
                </a>
            </div>
                </div>
            </div>
            <!-- Kolom Kanan: Mockup HP -->
            <div class="col-lg-6 col-md-12 text-center px-0 py-4">
                <img src="{{ asset('assets/img/Asset_14.png') }}" alt="Mockup App Expresso Express" class="img-fluid" style="max-height:500px;">
            </div>
        </div>
    </div>
</section>

<style>
#how-to-order {
    background: #1b0404ff; /* warna latar belakang hitam  */
    color: #fff;
     border-radius: 40px 40px 40px 40px; /* radius hanya di bawah */
    overflow: hidden;
}

#how-to-order h2,
#how-to-order h3,
#how-to-order h5,
#how-to-order p {
    color: #fff !important;
}

#how-to-order img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
}

/* CSS untuk menyelaraskan teks dengan atas gambar HP */
@media (min-width: 992px) {
    #how-to-order .row {
        align-items: start !important;
    }
    
    #how-to-order .col-lg-6:first-child {
        padding-top: 4rem !important;
        padding-bottom: 4rem !important;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }
    
    #how-to-order .col-lg-6:last-child {
        padding-top: 2rem !important;
        display: flex;
        align-items: flex-start;
        justify-content: center;
    }
    
    #how-to-order .col-lg-6:last-child img {
        max-height: 450px;
        width: auto;
    }
}

@media (max-width: 777.98px) {
    #how-to-order .px-5 {
        padding-left: 1rem !important;
        padding-right: 1rem !important;
    }
    #how-to-order .py-4 {
        padding-top: 1.5rem !important;
        padding-bottom: 1.5rem !important;
    }
}
</style>

{{-- ================================================================
   SECTION: BLOG TERBARU — 3 artikel terbaru yang dipublikasikan
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

{{-- ================================================================
   SECTION: TENTANG KAMI — Ringkasan singkat dengan tombol menuju halaman penuh
================================================================ --}}
<section id="about" class="py-5 section-bg">
    <div class="container">
        <div class="row align-items-center">
            @php
                $about = \App\Models\About::where('is_published', true)->latest('id')->first();
            @endphp
            <div class="col-md-6"><img src="{{ $about && $about->image_path ? asset('storage/'.$about->image_path) : asset('img/about/2.png') }}" class="img-fluid rounded shadow" alt="Tentang Kami"></div>
            <div class="col-md-6 mt-4 mt-md-0">
                <h2 class="display-5 fw-bold" style="font-family: 'Halima Sofira', sans-serif;">{{ $about->title ?? 'Cerita di Balik Setiap Cangkir' }}</h2>
                <p class="lead">{{ $about ? Str::limit(strip_tags($about->content), 160) : 'Kami percaya bahwa kopi berkualitas tidak harus mahal. Berawal dari mimpi sederhana untuk menyajikan kopi terbaik dari biji pilihan Indonesia kepada semua orang, kami lahir.' }}</p>
                <a href="{{ route('about.show') }}" class="btn btn-dark">Selengkapnya</a>
            </div>
        </div>
    </div>
</section>
{{-- Script untuk bagian Interaktif --}}
@php
    $coffeeModels = \App\Models\CoffeeItem::where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('id','desc')
        ->get();
    $coffees = $coffeeModels->map(function($i){
        return [
            'image' => $i->image_path ? asset('storage/'.$i->image_path) : asset('img/coffe/1.png'),
            'name' => $i->name ? asset('storage/'.$i->name) : null,
            'desc' => $i->description ? asset('storage/'.$i->description) : null,
        ];
    })->values();
@endphp
@push('scripts')
<style>
@keyframes slideUp {
    0% { opacity: 0; transform: translateY(50px); } 100% { opacity: 1; transform: translateY(0); }
}
.animate-up { animation: slideUp 0.8s ease forwards; }
@keyframes zoomOut {
    0% { transform: scale(1.2); opacity: 0; } 100% { transform: scale(1); opacity: 1; }
}
.animate-zoom-out { animation: zoomOut 0.5s ease forwards; }
</style>
<script id="coffee-data" type="application/json">{!! json_encode($coffees) !!}</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dataEl = document.getElementById('coffee-data');
    let coffees = [];
    try {
        coffees = dataEl && dataEl.textContent ? JSON.parse(dataEl.textContent) : [];
    } catch (e) {
        coffees = [];
    }
    const thumbnailContainer = document.getElementById('thumbnail-container');
    const thumbMobileWrap = document.getElementById('thumb-mobile-wrap');
    const thumbDesktopWrap = document.getElementById('thumb-desktop-wrap');
    const mainImg = document.getElementById('main-img');
    const mainText = document.getElementById('main-text');
    const mainDesc = document.getElementById('main-desc');
    if(coffees.length > 0){
        mainImg.src = coffees[0].image;
        if (coffees[0].name) { mainText.src = coffees[0].name; } else { mainText.removeAttribute('src'); }
        if (coffees[0].desc) { mainDesc.src = coffees[0].desc; } else { mainDesc.removeAttribute('src'); }
    }
    coffees.forEach(coffee => {
        const thumb = document.createElement('div');
        thumb.className = 'card shadow-sm rounded-3';
        thumb.style.cssText = 'min-width: 70px; width: 70px; height: 70px; cursor: pointer; overflow: hidden;';
        thumb.dataset.image = coffee.image;
        thumb.dataset.name = coffee.name;
        thumb.dataset.desc = coffee.desc;
        const img = document.createElement('img');
        img.src = coffee.image;
        img.className = 'w-100 h-100 object-fit-cover rounded-3';
        img.alt = 'thumbnail';
        thumb.appendChild(img);
        thumbnailContainer.appendChild(thumb);
        thumb.addEventListener('click', () => {
            ['animate-zoom-out', 'animate-up'].forEach(cls => {
                mainImg.classList.remove(cls);
                mainText.classList.remove(cls);
                mainDesc.classList.remove(cls);
                mainImg.parentElement.classList.remove(cls);
            });
            void mainImg.offsetWidth;
            mainImg.src = coffee.image;
            if (coffee.name) { mainText.src = coffee.name; } else { mainText.removeAttribute('src'); }
            if (coffee.desc) { mainDesc.src = coffee.desc; } else { mainDesc.removeAttribute('src'); }
            mainImg.classList.add('animate-zoom-out');
            mainText.classList.add('animate-up');
            mainDesc.classList.add('animate-up');
            mainImg.parentElement.classList.add('animate-up');
        });
    });

    function moveThumbnails() {
        if (window.innerWidth < 768) {
            if (thumbMobileWrap && thumbnailContainer && thumbnailContainer.parentElement !== thumbMobileWrap) {
                thumbMobileWrap.innerHTML = '';
                thumbMobileWrap.appendChild(thumbnailContainer);
            }
        } else {
            if (thumbDesktopWrap && thumbnailContainer && thumbnailContainer.parentElement !== thumbDesktopWrap) {
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

