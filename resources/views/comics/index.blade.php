@extends('layouts.app')

@section('title', 'Fumetti')

@section('content')
<body>
<div class="container">
    <h1>Fumetti</h1>
</div>
<div>
    <ul class="list-group">
        @foreach($comics as $comic)
            <li class="list-group-item">
                <div>
                <a href="{{ route('comics.show', $comic->id) }}">{{ $comic->title }}</a>
                </div>
                <div>
                    <div>
                        <strong>Artisti:</strong> {{ $comic->artists }}
                    </div>
                    <div>
                        <strong>Scrittori:</strong> {{ $comic->writers }}
                    </div>
                </div>
                <div class="d-flex justify-content-between py-2">
                    <div>
                        <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn btn-warning">Modifica</a>
                    </div>
                    <div>
                        <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare questo fumetto?');">Elimina</button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
<div class="py-3">
    <a href="{{ route('comics.create') }}" class="btn btn-primary w-100">Aggiungi Fumetto</a>
</div>
</body>

@endsection