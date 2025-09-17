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
                    $desktopPath = $banner->image_desktop_path ? asset('storage/'.$banner->image_desktop_path) : asset('img/banner/banner_1.png');
                    $mobilePath = $banner->image_mobile_path ? asset('storage/'.$banner->image_mobile_path) : $desktopPath;
                @endphp
                
                <!-- Desktop Banner -->
                <div class="d-none d-md-block position-relative" style="height: 70vh;">
                    <img src="{{ $desktopPath }}" 
                         class="img-fluid w-100 h-100 object-fit-cover" 
                         alt="{{ $banner->title ?? 'Banner Desktop' }}"
                         loading="lazy">
                </div>
                
                <!-- Mobile Banner -->
                <div class="d-block d-md-none position-relative" style="height: 50vh;">
                    <img src="{{ $mobilePath }}" 
                         class="img-fluid w-100 h-100 object-fit-cover" 
                         alt="{{ $banner->title ?? 'Banner Mobile' }}"
                         loading="lazy">
                </div>
            </div>
        @empty
            <div class="carousel-item active">
                <div class="position-relative" style="height: 70vh;">
                    <img src="{{ asset('img/banner/banner_1.png') }}" 
                         class="img-fluid w-100 h-100 object-fit-cover" 
                         alt="Default Banner"
                         loading="lazy">
                </div>
            </div>
        @endforelse
    </div>

    <!-- Kontrol Panah - Enhanced with Bootstrap -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

    <!-- Indikator - Bootstrap Enhanced -->
    @if($activeBanners->count() > 1)
        <div class="carousel-indicators">
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
