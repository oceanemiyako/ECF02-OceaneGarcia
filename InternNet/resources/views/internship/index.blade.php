@extends('layouts.app')

@section('content')
    <link rel="stylesheet"  href="{{ asset('css/style.css') }}">

    <div class="container">
        <h2>Liste des Offres de Stage</h2>
        @foreach ($internships as $internship)
            <div class="card">
                <a href="{{ route('internship.show', $internship->id) }}">{{ $internship->title }}</a>
            </div>
        @endforeach
    </div>
@endsection
