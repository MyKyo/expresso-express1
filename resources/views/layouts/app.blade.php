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
        /* --- FONT: HALIMA SOFIRA --- */
        @font-face {
            font-family: 'Halima Sofira';
            src: url('{{ asset('fonts/Halima-Sofira.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        /* Menambahkan efek scroll yang halus saat mengklik link navigasi */
        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: #fff;
            padding-top: 56px
            /* font-family: 'Halima Sofira'; */
        }

        .section-bg {
            background-color: #f8f9fa;
        }

        .navbar-custom {
            background-color: #670103;
            transition: all 0.3s ease;
        }

        /* Efek hover pada link navbar */
        .navbar-custom .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .navbar-custom .nav-link:hover {
            color: rgba(255, 255, 255, 0.9);
        }

        /* Animasi underline pada hover link navbar */
        .navbar-custom .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: #fff;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar-custom .nav-link:hover::after {
            width: 70%;
        }

        /* Penyesuaian untuk mobile */
        @media (max-width: 991.98px) {
            .navbar-custom {
                padding-top: 0.5rem;
                padding-bottom: 0.10rem;
            }
            
            .navbar-custom .navbar-nav {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
            }

            .navbar-custom .nav-link::after {
                display: none;
            }

            /* === KODE PERBAIKAN TEGAS DITAMBAHKAN DI SINI === */

            /* 1. Paksa area menu (collapse) agar lebarnya tidak meluap */
            .navbar-custom .navbar-collapse {
                width: 100% !important;
                flex-basis: 100%;
            }

            /* 2. Paksa daftar menu (nav) menjadi tumpukan vertikal */
            .navbar-custom .navbar-nav {
                width: 100%;
                flex-direction: column; /* Ini adalah properti kunci yang memaksa menu tersusun ke bawah */
                align-items: center; /* Agar item menu tetap di tengah */
            }

            /* ============================================== */

        }

        /* =================================================================
         * CSS UNTUK HERO CAROUSEL (BANNER UTAMA) - BOOTSTRAP OPTIMIZED
         * =================================================================
        */

        /*
         * Enhanced carousel controls styling
        */
        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            opacity: 1;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 2rem;
            height: 2rem;
        }

        .carousel-indicators {
            margin-bottom: 1.5rem;
        }

        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 5px;
            opacity: 0.5;
            transition: opacity 0.3s ease;
        }

        .carousel-indicators button.active {
            opacity: 1;
        }

        /*
         * Responsive banner heights using Bootstrap utilities
        */
        @media (max-width: 767.98px) {
            .carousel-indicators {
                margin-bottom: 1rem;
            }
            
            .carousel-control-prev,
            .carousel-control-next {
                width: 8%;
            }
        }
        
        /* =================================================================
         * AKHIR DARI CSS HERO CAROUSEL
         * =================================================================
        */


        {{-- =================================================================
        CSS UNTUK CAROUSEL PRODUK (PILIHAN POPULER)
        ================================================================== --}}
        /* Wrapper: scroll horizontal, tanpa scrollbar */
        .position-relative {
            position: relative;
        }

        .product-scroll-wrapper {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            -ms-overflow-style: none;
            scrollbar-width: none;
            padding: 15px 0;
            gap: 12px;
        }

        .product-scroll-wrapper::-webkit-scrollbar {
            display: none;
        }

        .product-row {
            display: flex;
            flex-wrap: nowrap;
            gap: 16px;
        }

        .product-card {
            min-width: 180px;
            flex: 0 0 auto;
            border: none;
            background-color: transparent;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .product-card:hover img {
            transform: scale(1.05);
        }

        .product-card-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #333;
            margin-top: 0.75rem;
            text-align: center;
        }
        .product-nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.95);
            border: 1px solid #ddd;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #333;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            z-index: 10;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            outline: none;
        }

        .product-nav-arrow.prev {
            left: 10px;
        }

        .product-nav-arrow.next {
            right: 10px;
        }

        .product-nav-arrow:hover {
            background-color: white;
            transform: translateY(-50%) scale(1.1);
            color: #000;
        }
        /* Kontainer utama */
        .position-relative {
            position: relative;
            margin: 0 auto;
        }

        /* Wrapper produk: atur lebar agar hanya 5 produk terlihat */
        .product-scroll-wrapper {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            -ms-overflow-style: none;  /* Edge */
            scrollbar-width: none;     /* Firefox */
            padding: 15px 0;
            gap: 12px;

            /* 🔥 Atur lebar: cukup untuk 5 produk */
            max-width: calc(5 * 180px + 4 * 16px); /* 5 kartu + 4 gap (16px) */
            margin-left: auto;
            margin-right: auto;
        }

        /* Sembunyikan scrollbar */
        .product-scroll-wrapper::-webkit-scrollbar {
            display: none;
        }

        /* Baris produk */
        .product-row {
            display: flex;
            flex-wrap: nowrap;
            gap: 16px; /* Jarak antar produk */
        }

        /* Kartu produk: ukuran tetap */
        .product-card {
            min-width: 180px;
            max-width: 180px;
            flex: 0 0 auto; /* Jangan stretch */
            border: none;
            background-color: transparent;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        /* Gambar */
        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Judul */
        .product-card-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #333;
            margin-top: 0.75rem;
            text-align: center;
        }
        @media (max-width: 768px) {
            .product-card {
                min-width: 150px;
                max-width: 150px;
            }
            .product-scroll-wrapper {
                max-width: calc(3 * 150px + 2 * 16px); /* 3 produk */
            }
        }

        @media (max-width: 576px) {
            .product-card {
                min-width: 130px;
                max-width: 130px;
            }
            .product-scroll-wrapper {
                max-width: calc(2 * 130px + 16px);
            }
        }

        .how-to-order-step {
            text-align: center;
        }

        .how-to-order-step .icon {
            font-size: 3rem;
            color: #9d2533;
        }

        .footer {
            background-color: #670103;
            color: white;
            padding: 40px 0 20px 0;
        }

        .footer h5 {
            color: #ffffffff;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: white;
        }

        .footer .social-icons a {
            font-size: 1.5rem;
            margin-right: 15px;
            color: white;
            transition: color 0.3s ease;
        }

        .footer .social-icons a:hover {
            color: #ffc107;
        }
    </style>
</head>

<body>

    @include('partials._navbar')

    <main>
        @include('partials._banner')
        @yield('content')
    </main>

    @include('partials._footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JAVASCRIPT KUSTOM UNTUK FUNGSI SCROLL PRODUK -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const wrapper = document.getElementById('product-wrapper');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');

        const mobilePrevBtn = document.getElementById('mobile-prev-btn');
        const mobileNextBtn = document.getElementById('mobile-next-btn');

        if (!wrapper) {
            // console.error("Elemen tidak ditemukan!"); // <-- BARIS INI DIHAPUS
            return; // Keluar dari fungsi jika elemen tidak ada di halaman ini
        }

        // Hitung lebar rata-rata per produk (termasuk gap)
        const scrollAmount = 180 + 16; // lebar kartu + gap

        const goNext = (e) => {
            if (e) e.preventDefault();
            wrapper.scrollBy({ left: scrollAmount * 1, behavior: 'smooth' });
        };
        const goPrev = (e) => {
            if (e) e.preventDefault();
            wrapper.scrollBy({ left: -scrollAmount * 1, behavior: 'smooth' });
        };

        if (nextBtn) nextBtn.addEventListener('click', goNext);
        if (prevBtn) prevBtn.addEventListener('click', goPrev);
        if (mobileNextBtn) mobileNextBtn.addEventListener('click', goNext);
        if (mobilePrevBtn) mobilePrevBtn.addEventListener('click', goPrev);


        // Opsional: Atur opacity tombol saat di ujung
        wrapper.addEventListener('scroll', function () {
            const maxScroll = wrapper.scrollWidth - wrapper.clientWidth;

            prevBtn.style.opacity = wrapper.scrollLeft > 0 ? '1' : '0.4';
            prevBtn.style.pointerEvents = wrapper.scrollLeft > 0 ? 'auto' : 'none';

            nextBtn.style.opacity = wrapper.scrollLeft < maxScroll ? '1' : '0.4';
            nextBtn.style.pointerEvents = wrapper.scrollLeft < maxScroll ? 'auto' : 'none';
        });

        // Jalankan sekali saat load
        wrapper.dispatchEvent(new Event('scroll'));
    });
</script>

    @stack('scripts')
</body>

</html>

