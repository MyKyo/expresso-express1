<!-- =================================================================
2. HERO CAROUSEL (Bagian Promosi Utama)
================================================================== -->
<div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1: Video -->
        <div class="carousel-item active">
            <video id="heroVideo" class="d-block w-100" autoplay muted>
                <source src="{{ asset('video/jago-coffee.mp4') }}" type="video/mp4">
                Browser Anda tidak mendukung video.
            </video>
        </div>

        <!-- Slide 2: Gambar -->
        <div class="carousel-item">

            <img src="{{ asset('img/banner/banner_1.png') }}" class="d-block w-100" alt="Banner 1" style="max-height: 900px; object-fit: cover;">
        </div>

        <!-- Slide 3: Gambar -->
        <div class="carousel-item">
            <img src="{{ asset('img/banner/banner_1.png') }}" class="d-block w-100" alt="Banner 2" style="max-height: 900px; object-fit: cover;">
        </div>
    </div>

    <!-- Kontrol Panah -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

    <!-- Indikator (opsional) -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>
</div>
