@extends('layouts.app')

@section('title', 'Modifica Fumetto')

@section('content')
<h1>Modifica Fumetto</h1>

<form action="{{ route('comics.update', $comic->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Importante per il metodo PUT -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <label for="title">Titolo:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $comic->title) }}" required>
    </div>

    <div>
        <label for="description">Descrizione:</label>
        <textarea name="description" id="description" required>{{ old('description', $comic->description) }}</textarea>
    </div>

    <div>
        <label for="price">Prezzo:</label>
        <input type="text" name="price" id="price" value="{{ old('price', $comic->price) }}" required>
    </div>

    <div>
        <label for="thumb">Immagine:</label>
        <input type="text" name="thumb" id="thumb" value="{{ old('thumb', $comic->thumb) }}" required>
    </div>

    <div>
        <label for="series">Serie:</label>
        <input type="text" name="series" id="series" value="{{ old('series', $comic->series) }}" required>
    </div>

    <div>
        <label for="sale_date">Data di Vendita:</label>
        <input type="date" name="sale_date" id="sale_date" value="{{ old('sale_date', $comic->sale_date) }}" required>
    </div>

    <div>
        <label for="type">Tipo:</label>
        <input type="text" name="type" id="type" value="{{ old('type', $comic->type) }}" required>
    </div>

    <div>
        <label for="artists">Artisti:</label>
        <input type="text" name="artists" id="artists" value="{{ old('artists', $comic->artists) }}">
    </div>

    <div>
        <label for="writers">Scrittori:</label>
        <input type="text" name="writers" id="writers" value="{{ old('writers', $comic->writers) }}">
    </div>

    <button type="submit">Aggiorna Fumetto</button>
</form>

<a href="{{ route('comics.index') }}" class="btn btn-secondary">Torna all'elenco dei fumetti</a>
@endsection