@extends('layouts.app')

@section('title', $about->title)

@section('content')

{{-- Banner Full Width --}}
@if($about->image_path)
    <div class="container-fluid px-0" style="padding-top: 25gitpx;">
        <img src="{{ asset('storage/'.$about->image_path) }}"
             alt="{{ $about->title }}"
             class="d-block"
             style="width:100vw; height:auto; object-fit:cover; background:#222;">
    </div>
@endif


{{-- ================================================================
   ABOUT SECTION (Minimalist Box with Title + Description)
================================================================ --}}
<section id="about" class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="p-5 bg-white rounded-3 shadow-sm text-center">

                    {{-- Judul --}}
                    <h2 class="fw-bold display-6 mb-3" style="font-family: 'Halima Sofira', sans-serif;">
                        {{ $about->title }}
                    </h2>

                    {{-- Garis dekorasi tipis --}}
                    <div class="mx-auto mb-4" 
                         style="width: 60px; height: 3px; background: #c49b63; border-radius: 2px;"></div>

                    {{-- Deskripsi --}}
                    <p class="lead text-muted mb-0" style="line-height:1.8;">
                        {!! nl2br(e($about->content)) !!}
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>

{{-- =================================================================
   TEAM SECTION (Minimalist Style with Hover Social Icons)
================================================================== --}}
@if($teams->count() > 0)
<section id="team" class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-6" style="font-family: 'Halima Sofira', sans-serif;">Tim Kami</h2>
            <p class="text-muted">Orang-orang hebat di balik <strong>Expresso Express</strong></p>
        </div>

        <div class="row justify-content-center">
            @foreach($teams as $member)
            <div class="col-lg-3 col-md-4 col-sm-6 text-center mb-4">
                <div class="p-4 bg-light rounded-3 shadow-sm h-100 team-card">
                    
                    {{-- Foto Profil --}}
                    @if($member->image_path)
                        <img src="{{ asset('storage/'.$member->image_path) }}" 
                             alt="{{ $member->name }}" 
                             class="rounded-circle mb-3" 
                             width="100" height="100" 
                             style="object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-white d-flex align-items-center justify-content-center mb-3 shadow-sm" 
                             style="width:100px; height:100px; margin:auto;">
                            <i class="fa fa-user fa-2x text-muted"></i>
                        </div>
                    @endif

                    {{-- Nama & Posisi --}}
                    <h6 class="fw-bold mb-1">{{ $member->name }}</h6>
                    <p class="text-muted small mb-2">{{ $member->position }}</p>
                    
                    {{-- Bio Singkat --}}
                    @if($member->bio)
                        <p class="text-muted small mb-3">{{ Str::limit($member->bio, 80) }}</p>
                    @endif
                    
                    {{-- Social Links (muncul saat hover) --}}
                    <div class="social-icons mt-3">
                        @if($member->social_linkedin)
                            <a href="{{ $member->social_linkedin }}" target="_blank" class="me-2 social-linkedin">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        @endif
                        @if($member->social_instagram)
                            <a href="{{ $member->social_instagram }}" target="_blank" class="me-2 social-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        @if($member->social_twitter)
                            <a href="{{ $member->social_twitter }}" target="_blank" class="me-2 social-twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CSS untuk efek hover --}}
<style>
.team-card .social-icons {
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease-in-out;
}

.team-card:hover .social-icons {
    opacity: 1;
    transform: translateY(0);
}

/* Style khusus tiap icon */
.social-icons a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    color: #fff;
    font-size: 16px;
    transition: background 0.3s ease, transform 0.2s ease;
}

.social-linkedin { background: #0077b5; }
.social-instagram { background: #e4405f; }
.social-twitter { background: #1da1f2; }

.social-icons a:hover {
    transform: scale(1.1);
    text-decoration: none;
}
</style>


@endsection
