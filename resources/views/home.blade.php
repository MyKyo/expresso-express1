{{-- Menggunakan layout utama dari layouts.app --}}
@extends('layouts.app')

{{-- Mengatur judul spesifik untuk halaman ini --}}
@section('title', 'Beranda')

{{-- Memulai section 'content' untuk diisi ke dalam @yield('content') di layout --}}
@section('content')

{{-- =================================================================
4. PRODUCT DISPLAY (Tampilan Produk Unggulan) - MENGGUNAKAN CAROUSEL
================================================================== --}}
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

    {{-- TOMBOL NAVIGASI desktop/tablet: di luar wrapper --}}
    <button id="prev-btn" type="button" class="product-nav-arrow prev d-none d-md-flex" aria-label="Geser ke kiri">
        <i class="bi bi-chevron-left"></i>
    </button>
    <button id="next-btn" type="button" class="product-nav-arrow next d-none d-md-flex" aria-label="Geser ke kanan">
        <i class="bi bi-chevron-right"></i>
    </button>
</div>
</section>


{{-- =================================================================
   INTERACTIVE COFFEE DISPLAY
================================================================== --}}
<section style="background-color:#670103; padding:60px 0;">
    <div class="container-fluid px-0">
        <div class="row g-0 align-items-center">
            
            <!-- Thumbnail -->
            <div class="col-md-4 d-flex flex-wrap gap-3 justify-content-center justify-content-md-start order-md-1 p-4">
                <div id="thumbnail-container" class="d-flex flex-wrap gap-3 justify-content-center justify-content-md-start">
                    <!-- Thumbnail akan di-generate dari JS -->
                </div>
            </div>

            <!-- Teks -->
            <div class="col-md-4 d-flex flex-column justify-content-center text-white text-center text-md-start order-md-2 p-4">
                <h3 id="main-text" class="mb-2 animate-up" style="font-family: 'Halima Sofira', sans-serif;"></h3>
                <p id="main-desc" style="font-size:0.95rem;" class="animate-up"></p>
            </div>

            <!-- Gambar utama -->
            <div class="col-md-4 text-center order-md-3 p-4">
                <div id="main-box" class="mx-auto d-flex align-items-center justify-content-center fw-bold text-white animate-up" style="max-width: 320px; width: 100%; aspect-ratio: 1/1; overflow: hidden; border-radius: 20px;">
                    <img src="" alt="coffee image" class="w-100 h-100 object-fit-contain" id="main-img">
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
</style>

{{-- =================================================================
   HOW TO ORDER SECTION (EXPRESSO EXPRESS APP PROMO)
================================================================== --}}
<section id="how-to-order" class="py-5" style="background:#000000;">
    <div class="container-fluid px-0">
        <div class="row align-items-center">
            <!-- Kolom Kiri: Teks & Logo Store -->
            <div class="col-lg-6 col-md-12 text-white px-5 py-4">
                <div class="mb-4">
                    <h5 class="fw-normal" style="letter-spacing:2px;">EXPRESSO EXPRESS APP</h5>
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
                     <img src="{{ asset('assets/img/asset_15.png') }}" alt="Get it on Google Play" style="height: 48px; max-width: 100%;">
                    </a>
                 <a href="#" class="text-decoration-none">
                 <img src="{{ asset('assets/img/asset_16.png') }}" alt="Download on the App Store" style="height: 48px; max-width: 100%;">
                </a>
                </div>
                </div>
            </div>
            <!-- Kolom Kanan: Mockup HP -->
            <div class="col-lg-6 col-md-12 text-center px-0 py-4">
                <img src="{{ asset('assets/img/asset14.png') }}" alt="Mockup App Expresso Express" class="img-fluid" style="max-height:500px;">
            </div>
        </div>
    </div>
</section>

<style>
#how-to-order {
    background: #1b0404ff; /* warna latar belakang hitam  */
    color: #fff;
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

@media (max-width: 991.98px) {
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


<section id="blog" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold "style="font-family: 'Halima Sofira', sans-serif;">Dari Blog Kami</h2>
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

{{-- =================================================================
   ABOUT SECTION
================================================================== --}}
<section id="about" class="py-5 section-bg">
    <div class="container">
        <div class="row align-items-center">
            @php
                $about = \App\Models\About::where('is_published', true)->latest('id')->first();
            @endphp
            <div class="col-md-6"><img src="{{ $about && $about->image_path ? asset('storage/'.$about->image_path) : asset('img/about/2.png') }}" class="img-fluid rounded shadow" alt="Tentang Kami"></div>
            <div class="col-md-6 mt-4 mt-md-0">
                <h2 class="display-5 fw-bold "style="font-family: 'Halima Sofira', sans-serif;">{{ $about->title ?? 'Cerita di Balik Setiap Cangkir' }}</h2>
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
            'name' => $i->name,
            'desc' => $i->description,
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
    const mainImg = document.getElementById('main-img');
    const mainText = document.getElementById('main-text');
    const mainDesc = document.getElementById('main-desc');
    if(coffees.length > 0){
        mainImg.src = coffees[0].image;
        mainText.textContent = coffees[0].name;
        mainDesc.textContent = coffees[0].desc;
    }
    coffees.forEach(coffee => {
        const thumb = document.createElement('div');
        thumb.className = 'card shadow-sm rounded-3';
        thumb.style.cssText = 'width: 70px; height: 70px; cursor: pointer; overflow: hidden;';
        thumb.dataset.image = coffee.image;
        thumb.dataset.name = coffee.name;
        thumb.dataset.desc = coffee.desc;
        const img = document.createElement('img');
        img.src = coffee.image;
        img.className = 'w-100 h-100 object-fit-cover rounded-3';
        img.alt = coffee.name;
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
            mainText.textContent = coffee.name;
            mainDesc.textContent = coffee.desc;
            mainImg.classList.add('animate-zoom-out');
            mainText.classList.add('animate-up');
            mainDesc.classList.add('animate-up');
            mainImg.parentElement.classList.add('animate-up');
        });
    });
});
</script>
@endpush

@endsection

