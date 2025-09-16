@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<section id="blog" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold "style="font-family: 'Halima Sofira', sans-serif;">Dari Blog Kami</h2>
            <p class="lead text-muted">Baca cerita dan tips menarik seputar dunia kopi.</p>
        </div>
        <div class="row">
            @forelse($posts as $post)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($post->cover_path)
                        <img src="{{ asset('storage/'.$post->cover_path) }}" class="card-img-top" alt="{{ $post->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-sm btn-outline-dark">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-12 text-center">Belum ada artikel.</div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection


