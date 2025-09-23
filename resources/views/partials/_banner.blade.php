<!-- =================================================================
2. HERO CAROUSEL (Bagian Promosi Utama) - BOOTSTRAP OPTIMIZED
================================================================== -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
        @php
            $activeBanners = \App\Models\Banner::where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id', 'desc')
                ->get();
        @endphp

        @forelse($activeBanners as $index => $banner)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                @php
                    $desktopImg = $banner->image_desktop_path ? asset('storage/'.$banner->image_desktop_path) : asset('img/banner/banner_5.png');
                    $mobileImg  = $banner->image_mobile_path ? asset('storage/'.$banner->image_mobile_path) : $desktopImg;
                @endphp
                
                <picture>
                    <!-- untuk mobile -->
                    <source media="(max-width: 768px)" srcset="{{ $mobileImg }}">
                    <!-- untuk desktop -->
                    <img 
                        src="{{ $desktopImg }}" 
                        class="d-block w-100"
                        style="width:100vw; min-height:300px; height:70vh; object-fit:cover; background:#222;"
                        alt="{{ $banner->title ?? 'Banner' }}"
                        loading="lazy">
                </picture>
            </div>
        @empty
            <div class="carousel-item active">
                <img 
                    src="{{ asset('img/banner/banner_1.png') }}" 
                    class="d-block w-100"
                    style="width:100vw; min-height:300px; height:70vh; object-fit:cover; background:#222;"
                    alt="Default Banner"
                    loading="lazy">
            </div>
        @endforelse
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

    @if($activeBanners->count() > 1)
        <div class="carousel-indicators custom-indicators">
            @foreach($activeBanners as $i => $banner)
                <button type="button" 
                        data-bs-target="#heroCarousel" 
                        data-bs-slide-to="{{ $i }}" 
                        class="{{ $i === 0 ? 'active' : '' }}" 
                        aria-current="{{ $i === 0 ? 'true' : 'false' }}" 
                        aria-label="Slide {{ $i+1 }}">
                </button>
            @endforeach
        </div>
    @endif
</div>

<style>
.banner-wrapper {
    display: block;
    width: 100%;
    background: #222; /* fallback background */
    overflow: hidden;
}

.banner-img {
    width: 100%;
    height: 70vh;          /* default desktop */
    min-height: 300px;
    object-fit: cover;
}

/* Tablet & mobile */
@media (max-width: 768px) {
    .banner-img {
        height: 45vh;      /* lebih pendek di tablet/HP */
        min-height: 200px;
    }
}

/* Layar sangat kecil */
@media (max-width: 480px) {
    .banner-img {
        height: 35vh;      /* makin pendek biar pas */
        min-height: 150px;
    }
}

/* Indicator carousel khusus banner (hindari conflict/duplikasi) */
#heroCarousel .carousel-indicators.custom-indicators [data-bs-target] {
    width: 12px;
    height: 12px;
    border-radius: 0;
    background-color: #ffffff;
    border: 0;
    opacity: 0.6;
    margin: 0 5px;
}

#heroCarousel .carousel-indicators.custom-indicators .active {
    opacity: 1;
}
</style>

