<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati da andare a controllare
        $request->validate([
        'title' => 'required|string|min:3|max:255|unique:comics,title', //il titolo deve essere di almeno tot caratteri
        'description' => 'required|string|min:10', //la descrizione deve essere almeno di tot caratteri
        'price' => 'required|numeric|min:0', // Il prezzo deve essere un numero positivo
        'thumb' => 'required|url|max:2048', // Controlla che sia un URL valido
        'series' => 'required|string|min:3|max:255',//la serie deve essere di almeno tot caratteri 
        'sale_date' => 'required|date|before_or_equal:today', // La data deve essere oggi o nel passato
        'type' => 'required|string|min:3|max:255', // il tipo deve essere almeno di tot caratteri
        'artists' => 'nullable|string|min:3|max:1024', // Limitare la lunghezza per evitare stringhe eccessive
        'writers' => 'nullable|string|min:3|max:1024', // Limitare la lunghezza per evitare stringhe eccessive
        ]);

        $comic = new Comic();

        // Assegna i valori singolarmente per evitare che venga salvato il _token 
        $comic->title = $request->title;
        $comic->description = $request->description;
        $comic->price = $request->price;
        $comic->thumb = $request->thumb;
        $comic->series = $request->series;
        $comic->sale_date = $request->sale_date;
        $comic->type = $request->type;
    
        // Separare gli autori e i disegnatori dalla stringa 
        $comic->artists = implode('|', explode(',', $request->artists));
        $comic->writers = implode('|', explode(',', $request->writers));
    
        $comic->save();
    
        return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $comic = Comic::findOrFail($id);

    // Validazione dei dati
    $request->validate([
        'title' => 'required|string|min:3|max:255|unique:comics,title,'. $comic->id, //il titolo deve essere di almeno tot/max caratteri
        'description' => 'required|string|min:10', //la descrizione deve essere almeno di tot/max caratteri
        'price' => 'required|numeric|min:0', // Il prezzo deve essere un numero positivo
        'thumb' => 'required|url|max:2048', // Controlla che sia un URL valido
        'series' => 'required|string|min:3|max:255',//la serie deve essere di almeno tot/max caratteri 
        'sale_date' => 'required|date|before_or_equal:today', // La data deve essere oggi o nel passato
        'type' => 'required|string|min:3|max:255', // il tipo deve essere almeno di tot/max caratteri
        'artists' => 'nullable|string|min:3|max:1024', // Limitare la lunghezza per evitare stringhe eccessive
        'writers' => 'nullable|string|min:3|max:1024', // Limitare la lunghezza per evitare stringhe eccessive
    ]);

    // Assegna i valori manualmente
    $comic->title = $request->title;
    $comic->description = $request->description;
    $comic->price = $request->price;
    $comic->thumb = $request->thumb;
    $comic->series = $request->series;
    $comic->sale_date = $request->sale_date;
    $comic->type = $request->type;

    // Gestisci separatamente artists e writers
    $comic->artists = implode('|', explode(',', $request->artists));
    $comic->writers = implode('|', explode(',', $request->writers));

    // Salva i dati aggiornati
    $comic->save();

    return redirect()->route('comics.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
