@extends('layouts.app')

@section('content')

<div class="container py-2 text-center">
    <h1>Aggiungi Fumetto</h1>
</div>
  <!-- Mostra i messaggi di errore -->
  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="container py-3">
    <form action="{{ route('comics.store') }}" method="POST">
        @csrf
        <div class="px-1 py-2 border">
            <label for="title">Titolo:</label>
            <input type="text" name="title" required>
        </div>

        <div class="px-1 py-2 border">
            <label for="description">Descrizione:</label>
            <textarea name="description" required></textarea>
        </div>
    
        <div class="px-1 py-2 border">
            <label for="price">Prezzo:</label>
            <input type="text" name="price" required>
            <span>$</span>
        </div>
    
        <div class="px-1 py-2 border">
            <label for="thumb">Immagine:</label>
            <input type="url" name="thumb" required>
        </div>

        <div class="px-1 py-2 border">
            <label for="series">Serie:</label>
            <input type="text" name="series" required>
        </div>

        <div class="px-1 py-2 border">
            <label for="sale_date">Data di vendita:</label>
            <input type="date" name="sale_date" required>
        </div>
    
        <div class="px-1 py-2 border">
            <label for="type">Tipo:</label>
            <input type="text" name="type" required>
        </div>

        <div class="px-1 py-2 border">
            <label for="artists">Artisti (separati da virgola):</label>
            <input type="text" name="artists" id="artists">
        </div>
    
        <div class="px-1 py-2 border">
            <label for="writers">Scrittori (separati da virgola):</label>
            <input type="text" name="writers" id="writers">
        </div>

        <div class="py-2 border">
            <button type="submit" class="btn btn-success w-100">Crea Fumetto</button>
        </div>
    </form>
</div>
@endsection