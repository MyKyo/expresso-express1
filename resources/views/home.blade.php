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
            $popularProducts = [
                ['name' => 'KOPI SUSU', 'image' => 'img/coffe/1.png'],
                ['name' => 'AMERICANO', 'image' => 'img/coffe/1.png'],
                ['name' => 'LATTE', 'image' => 'img/coffe/1.png'],
                ['name' => 'CAPPUCCINO', 'image' => 'img/coffe/1.png'],
                ['name' => 'MOCHA', 'image' => 'img/coffe/1.png'],
                ['name' => 'KOPI AREN', 'image' => 'img/coffe/1.png'],
                ['name' => 'ESPRESSO', 'image' => 'img/coffe/1.png'],
                ['name' => 'KOPI TUBRUK', 'image' => 'img/coffe/1.png'],
            ];
        @endphp

        <div class="product-row d-flex">
            @foreach($popularProducts as $product)
                <div class="text-center product-card">
                    <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="img-fluid">
                    <div class="product-card-title">{{ $product['name'] }}</div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- TOMBOL NAVIGASI: di luar wrapper, tetap di bawah --}}
    <button id="prev-btn" type="button" class="product-nav-arrow prev" aria-label="Geser ke kiri">
        <i class="bi bi-chevron-left"></i>
    </button>
    <button id="next-btn" type="button" class="product-nav-arrow next" aria-label="Geser ke kanan">
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
            <div class="col-md-6"><img src="{{ asset('img/about/2.png') }}" class="img-fluid rounded shadow" alt="Tentang Kopi Kenangan"></div>
            <div class="col-md-6 mt-4 mt-md-0">
                <h2 class="display-5 fw-bold "style="font-family: 'Halima Sofira', sans-serif;">Cerita di Balik Setiap Cangkir</h2>
                <p class="lead">Kami percaya bahwa kopi berkualitas tidak harus mahal. Berawal dari mimpi sederhana untuk menyajikan kopi terbaik dari biji pilihan Indonesia kepada semua orang, kami lahir.</p>
                <p>Setiap cangkir yang kami sajikan adalah hasil dari kerja keras, dedikasi, dan cinta kami terhadap kopi. Mari nikmati kenangan di setiap tegukan.</p><a href="#" class="btn btn-dark">Selengkapnya</a>
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
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm"><img src="https://placehold.co/400x250/6c757d/fff?text=Biji+Kopi" class="card-img-top" alt="Blog 1">
                    <div class="card-body">
                        <h5 class="card-title">Mengenal Perbedaan Arabika dan Robusta</h5>
                        <p class="card-text">Sudah tahu bedanya? Yuk, cari tahu karakteristik unik dari dua jenis biji kopi paling populer di dunia.</p><a href="#" class="btn btn-sm btn-outline-dark">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm"><img src="https://placehold.co/400x250/6c757d/fff?text=Proses" class="card-img-top" alt="Blog 2">
                    <div class="card-body">
                        <h5 class="card-title">Tips Menyeduh Kopi di Rumah Seperti Barista</h5>
                        <p class="card-text">Tidak perlu alat mahal, dengan beberapa trik sederhana ini kamu bisa membuat kopi nikmat di rumah.</p><a href="#" class="btn btn-sm btn-outline-dark">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm"><img src="https://placehold.co/400x250/6c757d/fff?text=Manfaat" class="card-img-top" alt="Blog 3">
                    <div class="card-body">
                        <h5 class="card-title">Manfaat Kopi untuk Produktivitas Harian</h5>
                        <p class="card-text">Selain bikin melek, kopi punya banyak manfaat lain. Temukan bagaimana kopi bisa jadi teman produktifmu.</p><a href="#" class="btn btn-sm btn-outline-dark">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Script untuk bagian Interaktif --}}
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const coffees = [
        { image: "{{ asset('img/coffe/1.png') }}", name: "Coffee Latte", desc: "Coffee ini terbuat dari susu segar dan espresso yang lembut." },
        { image: "{{ asset('img/coffe/6.png') }}", name: "Kopi Kenangan Mantan", desc: "Kopi susu dengan gula aren asli, rasa klasik yang selalu di hati." },
        { image: "{{ asset('img/coffe/8.png') }}", name: "Avocado Coffee", desc: "Perpaduan unik jus alpukat, espresso, dan es krim cokelat." },
    ];
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

