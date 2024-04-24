@extends('layouts.app')

@section('content')
    <link rel="stylesheet"  href="{{ asset('../css/style.css') }}">

    <div class="container">
        <div class="card">
            <h2>{{ $internship->title }}</h2>
            <p>Description: {{ $internship->description }}</p>
            <p>Date de début: {{ $internship->start }}</p>
            <p>Date de fin: {{ $internship->end }}</p>
            <p>Email de contact: {{ $internship->email }}</p>
        </div>

        @auth
            @if (auth()->user()->id === $internship->user_id)
            <div class="button-actions">
            <a href="{{ route('internship.edit', $internship->id) }}" class="btn btn-primary">Modifier</a>
            <form action="{{ route('internship.destroy', $internship->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
            </form>
            </div>
            @endif
        @endauth
    </div>
@endsection
