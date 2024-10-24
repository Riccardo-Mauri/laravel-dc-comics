@extends('layouts.app')

@section('content')
<h1>{{ $comic->title }}</h1>
<p><strong>Descrizione:</strong> {{ $comic->description }}</p>
<p><strong>Prezzo:</strong> {{ $comic->price }} <span>$</span></p>
<img src="{{ $comic->thumb }}" alt="Immagine di {{ $comic->title }}">
<p><strong>Serie:</strong> {{ $comic->series }}</p>
<p><strong>Data di Vendita:</strong> {{ $comic->sale_date }}</p>
<p><strong>Tipo:</strong> {{ $comic->type }}</p>
<p><strong>Artisti:</strong> {{ $comic->artists }}</p>
<p><strong>Scrittori:</strong> {{ $comic->writers }}</p>
<a href="{{ route('comics.index') }}">Torna all'elenco</a>
@endsection