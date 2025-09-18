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
<section class="py-5">
    <div class="container p-4 position-relative rounded-3 shadow" style="background-color: #670103;">
        <div class="row align-items-center">
            <div class="col-md-4 text-center order-md-3">
                <div id="main-box" class="mx-auto d-flex align-items-center justify-content-center fw-bold text-white animate-up" style="max-width: 320px; width: 100%; aspect-ratio: 1/1; background: none; overflow: hidden; border-radius: 20px;">
                    <img src="" alt="coffee image" class="w-100 h-100 object-fit-contain" id="main-img">
                </div>
            </div>
                         <div class="col-md-4 d-flex flex-column justify-content-center text-white my-4 my-md-0 text-center text-md-start order-md-2">
                 <h3 id="main-text" class="mb-2 animate-up" style="font-family: 'Halima Sofira', sans-serif;"></h3>
                 <p id="main-desc" style="font-size:0.95rem;" class="animate-up"></p>
             </div>
            <div class="col-md-4 d-flex flex-wrap gap-3 justify-content-center justify-content-md-start order-md-1">
                <div id="thumbnail-container" class="d-flex flex-wrap gap-3 justify-content-center justify-content-md-start">
                    <!-- Thumbnail akan di-generate dari JS -->
                </div>
            </div>
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
   HOW TO ORDER SECTION
================================================================== --}}
<section id="how-to-order" class="py-5 section-bg">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold" style="font-family: 'Halima Sofira', sans-serif;">Cara Pemesanan</h2>
            <p class="lead text-muted">Langkah mudah untuk memesan kopi favorit Anda di Expresso Express.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3 text-center mb-4">
                <div class="mb-3">
                    <span class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;font-size:2rem;">
                        <i class="bi bi-cup-hot"></i>
                    </span>
                </div>
                <h5 class="fw-bold mb-1">Pilih Menu</h5>
                <p class="text-muted mb-0">Lihat dan pilih kopi atau minuman favorit Anda dari daftar menu.</p>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="mb-3">
                    <span class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;font-size:2rem;">
                        <i class="bi bi-cart"></i>
                    </span>
                </div>
                <h5 class="fw-bold mb-1">Pesan Online</h5>
                <p class="text-muted mb-0">Klik tombol pesan dan isi detail pesanan Anda dengan mudah.</p>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="mb-3">
                    <span class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;font-size:2rem;">
                        <i class="bi bi-credit-card"></i>
                    </span>
                </div>
                <h5 class="fw-bold mb-1">Pembayaran</h5>
                <p class="text-muted mb-0">Lakukan pembayaran melalui metode yang tersedia.</p>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="mb-3">
                    <span class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;font-size:2rem;">
                        <i class="bi bi-truck"></i>
                    </span>
                </div>
                <h5 class="fw-bold mb-1">Kopi Dikirim</h5>
                <p class="text-muted mb-0">Pesanan Anda akan segera diproses dan dikirim ke alamat Anda.</p>
            </div>
        </div>
    </div>
</section>

{{-- =================================================================
   TEAM SECTION
================================================================== --}}
<section id="team" class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold" style="font-family: 'Halima Sofira', sans-serif;">Tim Kami</h2>
            <p class="lead text-muted">Kenali orang-orang di balik Expresso Express.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('img/team1.jpg') }}" alt="Nama 1" class="rounded-circle mb-3 shadow" width="120" height="120">
                <h5 class="fw-bold mb-1">Nama 1</h5>
                <p class="text-muted mb-0">Project Manager</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('img/team2.jpg') }}" alt="Nama 2" class="rounded-circle mb-3 shadow" width="120" height="120">
                <h5 class="fw-bold mb-1">Nama 2</h5>
                <p class="text-muted mb-0">Developer</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('img/team3.jpg') }}" alt="Nama 3" class="rounded-circle mb-3 shadow" width="120" height="120">
                <h5 class="fw-bold mb-1">Nama 3</h5>
                <p class="text-muted mb-0">Designer</p>
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

