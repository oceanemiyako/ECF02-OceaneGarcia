@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $internship->title }}</h2>
        <p>Description: {{ $internship->description }}</p>
        <p>Date de début: {{ $internship->start }}</p>
        <p>Date de fin: {{ $internship->end }}</p>
        <p>Email de contact: {{ $internship->email }}</p>
    </div>
@endsection
