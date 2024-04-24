@extends('layouts.app')

@section('content')
    <link rel="stylesheet"  href="{{ asset('css/style.css') }}">

    <div class="container">
        <h2>Créer une Offre de Stage</h2>
        <form method="POST" action="{{ route('internship.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Titre:</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" id="description" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="start">Date de début:</label>
                <input type="date" name="start" class="form-control" id="start" required>
            </div>
            <div class="form-group">
                <label for="end">Date de fin:</label>
                <input type="date" name="end" class="form-control" id="end" required>
            </div>
            <div class="form-group">
                <label for="email">Email de contact:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection
