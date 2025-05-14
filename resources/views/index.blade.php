@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Listado de Posts</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Agregar nuevo Post</a>
    </div>

    <div class="row">
        @forelse($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Publicado por: {{ $post->user->name }}</small>
                    </div>
                </div>
            </div>
        @empty
            <p>No hay posts disponibles aún.</p>
        @endforelse
    </div>
</div>
@endsection
