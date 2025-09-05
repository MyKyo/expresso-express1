<!-- =================================================================
2. HERO CAROUSEL (Bagian Promosi Utama)
================================================================== -->
{{-- CATATAN: Kode ini sudah cukup responsif. Penggunaan unit 'vh' dan 'object-fit' adalah praktik yang baik. --}}
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1: Video -->
        <div class="carousel-item active">
            {{-- Penggunaan 'vh' (viewport height) membuat tinggi video relatif terhadap tinggi layar perangkat --}}
            {{-- 'object-fit: cover' memastikan video/gambar menutupi area tanpa distorsi --}}
            <video id="heroVideo" class="d-block w-100" style="height: 60vh; object-fit: cover;" autoplay muted loop playsinline>
                <source src="{{ asset('video/jago-coffee.mp4') }}" type="video/mp4">
                Browser Anda tidak mendukung video.
            </video>
        </div>

        <!-- Slide 2: Gambar -->
        <div class="carousel-item">
            <img src="{{ asset('img/banner/banner_1.png') }}"
                 class="d-block w-100"
                 alt="Banner 1"
                 style="height: 60vh; object-fit: cover;">
        </div>

        <!-- Slide 3: Gambar -->
        <div class="carousel-item">
            <img src="{{ asset('img/banner/banner_1.png') }}"
                 class="d-block w-100"
                 alt="Banner 2"
                 style="height: 60vh; object-fit: cover;">
        </div>
    </div>

    <!-- Kontrol Panah -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

    <!-- Indikator -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
</div>
