<!-- =================================================================
2. HERO CAROUSEL (Bagian Promosi Utama)
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
                @if(true)
                    @php
                        $desktopPath = $banner->image_desktop_path ? asset('storage/'.$banner->image_desktop_path) : asset('img/banner/banner_1.png');
                        $mobilePath = $banner->image_mobile_path ? asset('storage/'.$banner->image_mobile_path) : $desktopPath;
                    @endphp
                    <div class="d-none d-md-block w-100" style="height:70vh; overflow:hidden;">
                        <img src="{{ $desktopPath }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $banner->title ?? 'Banner Desktop' }}">
                    </div>
                    <div class="d-block d-md-none w-100" style="height:50vh; overflow:hidden;">
                        <img src="{{ $mobilePath }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $banner->title ?? 'Banner Mobile' }}">
                    </div>
                @endif
            </div>
        @empty
            <div class="carousel-item active">
                <div class="w-100" style="height:70vh; overflow:hidden;">
                    <img src="{{ asset('img/banner/banner_1.png') }}" class="w-100 h-100" style="object-fit: cover;" alt="Default Banner">
                </div>
            </div>
        @endforelse
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
        @foreach($activeBanners as $i => $b)
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $i+1 }}"></button>
        @endforeach
    </div>
</div>
