@extends('layouts.app')

@section('content')
<h1>Aggiungi Fumetto</h1>
<form action="{{ route('comics.store') }}" method="POST">
    @csrf
    <label for="title">Titolo:</label>
    <input type="text" name="title" required>

    <label for="description">Descrizione:</label>
    <textarea name="description" required></textarea>

    <label for="price">Prezzo:</label>
    <input type="text" name="price" required>

    <label for="thumb">Immagine:</label>
    <input type="url" name="thumb" required>

    <label for="series">Serie:</label>
    <input type="text" name="series" required>

    <label for="sale_date">Data di vendita:</label>
    <input type="date" name="sale_date" required>

    <label for="type">Tipo:</label>
    <input type="text" name="type" required>

    <label for="artists">Artisti (separati da virgola):</label>
    <input type="text" name="artists" id="artists">

    <label for="writers">Scrittori (separati da virgola):</label>
    <input type="text" name="writers" id="writers">


    <button type="submit">Crea Fumetto</button>
</form>
@endsection