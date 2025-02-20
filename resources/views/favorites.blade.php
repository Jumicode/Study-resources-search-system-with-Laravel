@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Tus Favoritos</h1>
    
    @if($favorites->count() > 0)
        @php
            // Agrupar los favoritos por su tipo: video, course, book, research
            $groupedFavorites = $favorites->groupBy('type');
        @endphp

        @foreach($groupedFavorites as $type => $favoritesGroup)
            <h2 class="mt-4">{{ ucfirst($type) }}</h2>
            <div class="row">
                @foreach($favoritesGroup as $favorite)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if($type !== 'research' && $favorite->cover)
                                <img src="{{ $favorite->cover }}" class="card-img-top" alt="{{ $favorite->title }} Cover">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $favorite->title }}</h5>
                                <a href="{{ $favorite->url }}" target="_blank" class="btn btn-primary">Ver</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <p class="text-center">No tienes favoritos aún.</p>
    @endif
</div>
@endsection
