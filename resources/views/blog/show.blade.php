@extends('layouts.app')

@section('title', $post->title)

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <h1 class="mb-3">{{ $post->title }}</h1>
                @if($post->cover_path)
                    <img src="{{ asset('storage/'.$post->cover_path) }}" class="img-fluid rounded mb-4" alt="{{ $post->title }}">
                @endif
                <article class="prose">
                    {!! nl2br(e($post->content)) !!}
                </article>
            </div>
        </div>
    </div>
    </section>
@endsection


