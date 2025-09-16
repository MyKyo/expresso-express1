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
@endsection


