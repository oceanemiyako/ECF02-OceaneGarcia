@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Liste des Offres de Stage</h2>
        <ul>
            @foreach ($internships as $internship)
                <li><a href="{{ route('internship.show', $internship->id) }}">{{ $internship->title }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
