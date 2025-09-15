<!-- =================================================================
2. HERO CAROUSEL (Bagian Promosi Utama)
================================================================== -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        
        <!-- Slide 1: Video -->
        <div class="carousel-item active">
            {{-- Hapus style inline dan tambahkan class `carousel-video-item` --}}
            <video class="d-block w-100 carousel-video-item" autoplay muted loop playsinline>
                <source src="{{ asset('video/jago-coffee.mp4') }}" type="video/mp4">
                Browser Anda tidak mendukung video.
            </video>
        </div>

        <!-- Slide 2: Gambar -->
        <div class="carousel-item">
            {{-- Gambar untuk Desktop (akan disembunyikan di mobile) --}}
            <img src="{{ asset('img/banner/banner_1.png') }}" 
                 class="d-none d-md-block w-100 carousel-image-desktop" 
                 alt="Banner Desktop 1">
            {{-- Gambar untuk Mobile (hanya muncul di mobile) - PASTIKAN FILE INI ADA --}}
            <img src="{{ asset('img/banner/banner_1.png') }}" 
                 class="d-block d-md-none w-100 carousel-image-mobile" 
                 alt="Banner Mobile 1">
        </div>

        <!-- Slide 3: Gambar -->
        <div class="carousel-item">
            {{-- Gambar untuk Desktop (akan disembunyikan di mobile) --}}
            <img src="{{ asset('img/banner/banner_1.png') }}" 
                 class="d-none d-md-block w-100 carousel-image-desktop" 
                 alt="Banner Desktop 2">
            {{-- Gambar untuk Mobile (hanya muncul di mobile) - PASTIKAN FILE INI ADA --}}
            <img src="{{ asset('img/banner/banner_1.png') }}" 
                 class="d-block d-md-none w-100 carousel-image-mobile" 
                 alt="Banner Mobile 2">
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
