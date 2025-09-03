<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Judul halaman akan dinamis, dengan judul default 'Kopi Kenangan' --}}
    <title>@yield('title', 'Kopi Kenangan') - Tampilan Website</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS Kustom -->
    <style>
        /* Menambahkan efek scroll yang halus saat mengklik link navigasi */
        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: #fff;
            /* Latar belakang putih bersih */
        }

        /* Memberi latar belakang abu-abu pada section tertentu untuk memisahkan konten */
        .section-bg {
            background-color: #f8f9fa;
        }

        /* --- Kustomisasi Navbar --- */
        .navbar-custom {
            background-color: #9d2533;
        }

        .navbar-custom .navbar-brand img {
            height: 40px;
        }

        .navbar-custom .nav-link {
            color: white;
            font-weight: 500;
        }

        .navbar-custom .nav-link:hover {
            color: #f0f0f0;
        }

        /* --- Kustomisasi Carousel Hero --- */
        .hero-carousel .carousel-item img {
            max-height: 900px;
            object-fit: cover;
        }

        /* --- Kustomisasi Bagian Produk --- */
        .product-section {
            position: relative;
        }

        /* Penampung untuk produk agar bisa di-scroll secara horizontal */
        .product-scroll-wrapper {
            overflow-x: auto;
            scroll-behavior: smooth;
            /* Menyembunyikan scrollbar bawaan browser */
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .product-scroll-wrapper::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari and Opera */
        }

        /* Mencegah produk turun ke baris baru saat di-scroll */
        .product-row {
            flex-wrap: nowrap;
        }

        .product-card {
            border: none;
            background-color: transparent;
            min-width: 160px;
            /* Memberi lebar minimum agar tidak terlalu rapat */
        }

        .product-card img {
            border-radius: 8px;
            max-width: 150px;
            margin: auto;
        }

        .product-card-title {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
            margin-top: 0.75rem;
        }

        /* --- Kustomisasi Panah Navigasi Produk --- */
        .product-nav-arrow {
            position: absolute;
            top: 40%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #ddd;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #333;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 10;
            cursor: pointer;
        }

        .product-nav-arrow:hover {
            background-color: white;
            color: #000;
        }

        .product-nav-arrow.prev {
            left: -20px;
        }

        .product-nav-arrow.next {
            right: -20px;
        }

        /* --- Gaya untuk Bagian How to Order --- */
        .how-to-order-step {
            text-align: center;
        }

        .how-to-order-step .icon {
            font-size: 3rem;
            color: #9d2533;
        }

        /* --- Kustomisasi Footer --- */
        .footer {
            background-color: #343a40;
            color: white;
            padding: 40px 0;
        }

        .footer h5 {
            color: #ffc107;
        }

        .footer a {
            color: #adb5bd;
            text-decoration: none;
        }

        .footer a:hover {
            color: white;
        }

        .footer .social-icons a {
            font-size: 1.5rem;
            margin-right: 15px;
        }
    </style>
</head>

<body>

    {{-- Memasukkan file navbar --}}
    @include('partials._navbar')

    <main>
        {{-- Memasukkan file banner --}}
        @include('partials._banner')

        {{-- Ini adalah area dimana konten utama dari setiap halaman akan ditampilkan --}}
        @yield('content')
    </main>

    {{-- Memasukkan file footer --}}
    @include('partials._footer')


    <!-- Bootstrap JS Bundle CDN (termasuk Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JAVASCRIPT KUSTOM UNTUK FUNGSI SCROLL PRODUK -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const wrapper = document.getElementById('product-wrapper');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');

            if (wrapper && prevBtn && nextBtn) {
                nextBtn.addEventListener('click', function () {
                    wrapper.scrollBy({
                        left: 300,
                        behavior: 'smooth'
                    });
                });

                prevBtn.addEventListener('click', function () {
                    wrapper.scrollBy({
                        left: -300,
                        behavior: 'smooth'
                    });
                });
            }
        });
    </script>

    {{-- Section untuk script tambahan jika diperlukan per halaman --}}
    @stack('scripts')
</body>

</html>
