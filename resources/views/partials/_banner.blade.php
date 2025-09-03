<!-- =================================================================
2. HERO CAROUSEL (Bagian Promosi Utama)
================================================================== -->
<section id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
        {{-- Menggunakan helper asset() untuk path gambar yang benar di Laravel --}}
        <div class="carousel-item active"><img src="{{ asset('img/banner/banner_1.png') }}" class="d-block w-100 h-100" alt="Promosi 1"></div>
        <div class="carousel-item"><img src="{{ asset('img/banner/banner_1.png') }}" class="d-block w-100" alt="Promosi 2"></div>
        <div class="carousel-item"><img src="{{ asset('img/banner/banner_1.png') }}" class="d-block w-100" alt="Promosi 3"></div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</section>

