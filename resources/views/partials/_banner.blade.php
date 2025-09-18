<!-- =================================================================
2. HERO CAROUSEL (Bagian Promosi Utama) - BOOTSTRAP OPTIMIZED
================================================================== -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
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
                    $imgPath = $banner->image_desktop_path ? asset('storage/'.$banner->image_desktop_path) : asset('img/banner/banner_1.png');
                @endphp
                <img 
                    src="{{ $imgPath }}" 
                    class="d-block w-100"
                    style="width:100vw; min-height:300px; height:70vh; object-fit:cover; background:#222;"
                    alt="{{ $banner->title ?? 'Banner' }}"
                    loading="lazy">
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
.custom-indicators {
    bottom: 18px !important; /* sedikit di bawah gambar */
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
}
.custom-indicators button {
    width: 28px !important;   /* garis horizontal */
    height: 4px !important;
    border-radius: 2px !important;
    margin: 0 2px !important;
    background-color: #fff !important;
    opacity: 0.5;
    border: none;
    transition: opacity 0.2s, background-color 0.2s;
    box-shadow: none;
}
.custom-indicators .active {
    opacity: 1;
    background-color: #bfa6a6 !important; /* warna garis aktif sesuai contoh */
}
</style>
