@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Dashboard</h1>
    <p class="text-center">Bienvenid@, {{ auth()->user()->name }} 👋</p>

    <div class="d-flex justify-content-center gap-3 mt-4">
        <a href="{{ route('resources.search') }}" class="btn btn-primary">🔍 Ir a Búsqueda</a>
        <a href="{{ route('favorites.list') }}" class="btn btn-secondary">⭐ Ver Favoritos</a>
    </div>
</div>
@endsection
