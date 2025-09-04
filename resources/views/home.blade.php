{{-- Menggunakan layout utama dari layouts.app --}}
@extends('layouts.app')

{{-- Mengatur judul spesifik untuk halaman ini --}}
@section('title', 'Beranda')

{{-- Memulai section 'content' untuk diisi ke dalam @yield('content') di layout --}}
@section('content')

{{-- =================================================================
4. PRODUCT DISPLAY (Tampilan Produk Unggulan)
================================================================== --}}
<section class="product-section bg-light py-5">
    <div class="container">
        {{-- Judul Section --}}
        <div class="text-center mb-4">
            <h2 class="display-5 fw-bold">Pilihan Populer</h2>
            <p class="lead text-muted">Minuman yang paling sering dipesan oleh teman-temanmu.</p>
        </div>

        {{-- Wrapper untuk Carousel/Scroller Produk --}}
        <div class="position-relative">
            <div class="product-scroll-wrapper" id="product-wrapper">
                {{-- Data produk ini idealnya datang dari Controller --}}
                @php
                    $popularProducts = [
                        ['name' => 'KOPI SUSU', 'image' => 'img/coffe/1.png'],
                        ['name' => 'KOPI SUSU', 'image' => 'img/coffe/1.png'],
                        ['name' => 'KOPI SUSU', 'image' => 'img/coffe/1.png'],
                        ['name' => 'KOPI SUSU', 'image' => 'img/coffe/1.png'],
                        ['name' => 'KOPI SUSU', 'image' => 'img/coffe/1.png'],
                        ['name' => 'KOPI SUSU', 'image' => 'img/coffe/1.png'],
                        ['name' => 'KOPI SUSU', 'image' => 'img/coffe/1.png'],
                        ['name' => 'KOPI SUSU', 'image' => 'img/coffe/1.png'],
                        ['name' => 'KOPI SUSU', 'image' => 'img/coffe/1.png'],
                        ['name' => 'KOPI SUSU', 'image' => 'img/coffe/1.png'],
                        ['name' => 'KOPI SUSU', 'image' => 'img/coffe/1.png'],
                    ];
                @endphp

                {{-- Baris Produk yang dapat di-scroll --}}
                {{-- Menggunakan flex-nowrap agar item tidak turun ke bawah --}}
                <div class="row flex-nowrap g-3">

                    {{-- Loop untuk menampilkan setiap produk --}}
                    @foreach ($popularProducts as $product)
                        {{-- Mengatur lebar kolom untuk berbagai ukuran layar --}}
                        <div class="col-6 col-md-4 col-lg-3">
                            {{-- Kartu Produk --}}
                            <div class="card product-card h-100 text-center border-0 shadow-sm">
                                {{-- Wrapper untuk gambar agar ukurannya konsisten --}}
                                <div class="product-img-container">
                                    <img src="{{ asset($product['image']) }}" class="card-img-top product-img" alt="{{ $product['name'] }}">
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h6 class="product-card-title fw-bold mb-0">{{ $product['name'] }}</h6>
                                </div>
                                {{-- Membuat seluruh kartu dapat diklik --}}
                                <a href="#" class="stretched-link" aria-label="Lihat detail untuk {{ $product['name'] }}"></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            {{-- Tombol Navigasi (hanya tampil di layar medium ke atas) --}}
            <button id="prev-btn" class="product-nav-arrow prev d-none d-md-flex" aria-label="Geser ke kiri">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button id="next-btn" class="product-nav-arrow next d-none d-md-flex" aria-label="Geser ke kanan">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>
</section>
<!-- =================================================================
Sisa Section (About, Menu, How to Order, Blog)
================================================================== -->
<section id="about" class="py-5 section-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6"><img src="{{ asset('img/about/2.png')}}" class="img-fluid rounded shadow" alt="Tentang Kopi Kenangan"></div>
            <div class="col-md-6 mt-4 mt-md-0">
                <h2 class="display-5 fw-bold">Cerita di Balik Setiap Cangkir</h2>
                <p class="lead">Kami percaya bahwa kopi berkualitas tidak harus mahal. Berawal dari mimpi sederhana untuk menyajikan kopi terbaik dari biji pilihan Indonesia kepada semua orang, kami lahir.</p>
                <p>Setiap cangkir yang kami sajikan adalah hasil dari kerja keras, dedikasi, dan cinta kami terhadap kopi. Mari nikmati kenangan di setiap tegukan.
            </div>
        </div>
    </div>
</section>
<section id="menu" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Menu Favorit Kami</h2>
            <p class="lead text-muted">Temukan minuman favoritmu di sini.</p>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <div class="col">
                <div class="card h-100 shadow-sm"><img src="{{ asset('img/coffe/6.png') }}" class="card-img-top" alt="Kopi Kenangan Mantan">
                    <div class="card-body">
                        <h5 class="card-title">Kopi Kenangan Mantan</h5>
                        <p class="card-text">Kopi susu dengan gula aren asli, rasa klasik yang selalu di hati.</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <p class="fw-bold">Rp 18.000</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm"><img src="{{ asset('img/coffe/8.png') }}" class="card-img-top" alt="Cokelat">
                    <div class="card-body">
                        <h5 class="card-title">Dua Shot Iced Shaken</h5>
                        <p class="card-text">Dua shot espresso dengan susu segar, lebih kuat dan mantap.</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <p class="fw-bold">Rp 24.000</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm"><img src="{{ asset('img/coffe/8.png') }}" class="card-img-top" alt="Susu">
                    <div class="card-body">
                        <h5 class="card-title">Milk Tea Gula Aren</h5>
                        <p class="card-text">Teh susu klasik dengan manis legit dari gula aren pilihan.</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <p class="fw-bold">Rp 19.000</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm"><img src="{{ asset('img/coffe/9.png') }}" class="card-img-top" alt="Teh">
                    <div class="card-body">
                        <h5 class="card-title">Avocado Coffee</h5>
                        <p class="card-text">Perpaduan unik jus alpukat, espresso, dan es krim cokelat.</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <p class="fw-bold">Rp 28.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="how-to-order" class="py-5 section-bg">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">3 Langkah Mudah Menikmati Kopimu</h2>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0 how-to-order-step">
                <div class="icon mb-3"><i class="bi bi-phone"></i></div>
                <h3>Pesan via Aplikasi</h3>
                <p class="text-muted">Download aplikasi kami, pilih menu favoritmu, dan tentukan lokasi pengantaran.</p>
            </div>
            <div class="col-md-4 mb-4 mb-md-0 how-to-order-step">
                <div class="icon mb-3"><i class="bi bi-wallet2"></i></div>
                <h3>Bayar dengan Mudah</h3>
                <p class="text-muted">Pilih berbagai metode pembayaran yang aman dan praktis, dari e-wallet hingga kartu debit.</p>
            </div>
            <div class="col-md-4 how-to-order-step">
                <div class="icon mb-3"><i class="bi bi-cup-hot"></i></div>
                <h3>Tunggu dan Nikmati</h3>
                <p class="text-muted">Kopimu akan segera kami siapkan dan antar. Selamat menikmati kenangan!</p>
            </div>
        </div>
    </div>
</section>
<section id="blog" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Dari Blog Kami</h2>
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

@endsection
