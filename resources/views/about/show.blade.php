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
<section id="team" class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold" style="font-family: 'Halima Sofira', sans-serif;">Tim Kami</h2>
            <p class="lead text-muted">Kenali orang-orang di balik Expresso Express.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('img/team1.jpg') }}" alt="Nama 1" class="rounded-circle mb-3 shadow" width="120" height="120">
                <h5 class="fw-bold mb-1">Nama 1</h5>
                <p class="text-muted mb-0">Project Manager</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('img/team2.jpg') }}" alt="Nama 2" class="rounded-circle mb-3 shadow" width="120" height="120">
                <h5 class="fw-bold mb-1">Nama 2</h5>
                <p class="text-muted mb-0">Developer</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('img/team3.jpg') }}" alt="Nama 3" class="rounded-circle mb-3 shadow" width="120" height="120">
                <h5 class="fw-bold mb-1">Nama 3</h5>
                <p class="text-muted mb-0">Designer</p>
            </div>
        </div>
    </div>
</section>
@endsection


