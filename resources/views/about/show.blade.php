@extends('layouts.app')

@section('title', $about->title)

@section('content')
<section id="about" class="py-5 section-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                @if($about->image_path)
                    <img src="{{ asset('storage/'.$about->image_path) }}" class="img-fluid rounded shadow" alt="{{ $about->title }}">
                @endif
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <h2 class="display-5 fw-bold " style="font-family: 'Halima Sofira', sans-serif;">{{ $about->title }}</h2>
                <div class="lead">{!! nl2br(e($about->content)) !!}</div>
            </div>
        </div>
    </div>
</section>

{{-- =================================================================
   TEAM SECTION
================================================================== --}}
@if($teams->count() > 0)
<section id="team" class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold" style="font-family: 'Halima Sofira', sans-serif;">Tim Kami</h2>
            <p class="lead text-muted">Kenali orang-orang di balik Expresso Express.</p>
        </div>
        <div class="row justify-content-center">
            @foreach($teams as $member)
            <div class="col-lg-4 col-md-6 text-center mb-4">
                <div class="team-member">
                    @if($member->image_path)
                        <img src="{{ asset('storage/'.$member->image_path) }}" alt="{{ $member->name }}" class="rounded-circle mb-3 shadow" width="120" height="120" style="object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mb-3 shadow" style="width: 120px; height: 120px; margin: 0 auto;">
                            <i class="fa fa-user fa-3x text-muted"></i>
                        </div>
                    @endif
                    <h5 class="fw-bold mb-1">{{ $member->name }}</h5>
                    <p class="text-muted mb-2">{{ $member->position }}</p>
                    @if($member->bio)
                        <p class="small text-muted mb-3">{{ Str::limit($member->bio, 100) }}</p>
                    @endif
                    
                    {{-- Social Links --}}
                    @if($member->social_linkedin || $member->social_instagram || $member->social_twitter || $member->email)
                    <div class="social-links">
                        @if($member->email)
                            <a href="mailto:{{ $member->email }}" class="text-muted me-2" title="Email">
                                <i class="fa fa-envelope"></i>
                            </a>
                        @endif
                        @if($member->social_linkedin)
                            <a href="{{ $member->social_linkedin }}" target="_blank" class="text-muted me-2" title="LinkedIn">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        @endif
                        @if($member->social_instagram)
                            <a href="{{ $member->social_instagram }}" target="_blank" class="text-muted me-2" title="Instagram">
                                <i class="fa fa-instagram"></i>
                            </a>
                        @endif
                        @if($member->social_twitter)
                            <a href="{{ $member->social_twitter }}" target="_blank" class="text-muted me-2" title="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection


