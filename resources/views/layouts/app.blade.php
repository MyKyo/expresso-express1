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

        /* ...existing code... */
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
/* ...existing code... */

        #heroCarousel .carousel-item video,
        #heroCarousel .carousel-item img {
            object-fit: cover;
        }

        {{-- =================================================================
        CSS UNTUK CAROUSEL PRODUK (PILIHAN POPULER)
        ================================================================== --}}
        /* Penampung untuk produk agar bisa di-scroll secara horizontal */
        .product-scroll-wrapper {
            overflow-x: auto;
            scroll-behavior: smooth;
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none; /* Firefox */
        }

        .product-scroll-wrapper::-webkit-scrollbar {
            display: none; /* Chrome, Safari and Opera */
        }
        
        .product-card {
            border: none;
            background-color: transparent;
            min-width: 160px; /* Memberi lebar minimum agar tidak terlalu rapat */
        }

        .product-card img {
            border-radius: 8px;
            max-width: 150px; /* Membatasi lebar gambar */
            margin: auto;
        }

        .product-card-title {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
            margin-top: 0.75rem;
        }

        /* Panah Navigasi Produk */
        .product-nav-arrow {
            position: absolute;
            top: 40%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #ddd;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #333;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 10;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }
        .product-nav-arrow:hover {
            background-color: white;
            transform: translateY(-50%) scale(1.1);
        }
        .product-nav-arrow.prev {
            left: -20px;
        }
        .product-nav-arrow.next {
            right: -20px;
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

            if (wrapper && prevBtn && nextBtn) {
                // Sembunyikan tombol di perangkat sentuh untuk menghindari tumpang tindih dengan gestur swipe
                const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;
                if(isTouchDevice) {
                    prevBtn.style.display = 'none';
                    nextBtn.style.display = 'none';
                    return; // Hentikan eksekusi script jika ini perangkat sentuh
                }

                const checkButtons = () => {
                    // Cek apakah bisa scroll ke kiri
                    prevBtn.style.display = wrapper.scrollLeft > 0 ? 'flex' : 'none';
                    
                    // Cek apakah bisa scroll ke kanan (dengan toleransi 1px)
                    const maxScrollLeft = wrapper.scrollWidth - wrapper.clientWidth;
                    nextBtn.style.display = wrapper.scrollLeft < maxScrollLeft - 1 ? 'flex' : 'none';
                };

                nextBtn.addEventListener('click', () => wrapper.scrollBy({ left: 300, behavior: 'smooth' }));
                prevBtn.addEventListener('click', () => wrapper.scrollBy({ left: -300, behavior: 'smooth' }));
                
                wrapper.addEventListener('scroll', checkButtons);
                window.addEventListener('resize', checkButtons);
                
                // Panggil sekali saat halaman dimuat untuk mengatur state awal tombol
                checkButtons();
            }
        });
   </script>

    @stack('scripts')
</body>

</html>

