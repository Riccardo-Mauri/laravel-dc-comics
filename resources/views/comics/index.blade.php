@extends('layouts.app')

@section('content')
<h1>Fumetti</h1>
<a href="{{ route('comics.create') }}">Aggiungi Fumetto</a>
<div>
    <ul>
        @foreach($comics as $comic)
            <li>
                <a href="{{ route('comics.show', $comic->id) }}">{{ $comic->title }}</a>
                <strong>Artisti:</strong> {{ $comic->artists }}<br>
                <strong>Scrittori:</strong> {{ $comic->writers }}<br>
            </li>
        @endforeach
    </ul>

</div>
@endsection