<?php

namespace App\Http\Controllers;

use App\ComicController;
use Illuminate\Http\Request;
use App\Comic;
use Illuminate\Support\Str; 

class ComicControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        return view('index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'image' => 'required|image',
            'type' => 'required|string|max:255'
        ],
        [
            'title.required' => 'Bisogna inserire un titolo',
            'title.max' => 'Il titolo deve essere lungo al massimo 255 caratteri',
            'title.string' => 'Il titolo deve essere una stringa',
            'image.required' => 'Bisogna inserire un\'immagine',
            'image.image' => 'Inserire un\'immagine valida',
            'type.required' => 'Bisogna inserire una tipologia di fumetto',
            'type.string' => 'La tipologia di fumetto deve essere una stringa',
            'type.max' => 'La tipologia deve essere lunga al massimo 255 caratteri'
        ]);


        $data = $request->all();

        $new_comic = new Comic;
        $new_comic->title = $data['title'];
        $new_comic->type = $data['type'];
        $new_comic->image = $data['image'];
        $new_comic->slug = Str::slug($new_comic->title, '-');

        $new_comic->save();

        return redirect()->route('comic.show', $new_comic->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ComicController  $comicController
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $comic = Comic::where('slug', $slug)->first();
        if($comic){
            return view('show', compact('comic'));
        }
        abort(404, 'Fumetto non trovato');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ComicController  $comicController
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $comic = Comic::where('slug', $slug)->first();
        if($comic){
            return view('edit', compact('comic'));
        }
        abort(404, 'Fumetto non trovato');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ComicController  $comicController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'image' => 'required|image',
            'type' => 'required|string|max:255'
        ],
        [
            'title.required' => 'Bisogna inserire un titolo',
            'title.max' => 'Il titolo deve essere lungo al massimo 255 caratteri',
            'title.string' => 'Il titolo deve essere una stringa',
            'image.required' => 'Bisogna inserire un\'immagine',
            'image.image' => 'Inserire un\'immagine valida',
            'type.required' => 'Bisogna inserire una tipologia di fumetto',
            'type.string' => 'La tipologia di fumetto deve essere una stringa',
            'type.max' => 'La tipologia deve essere lunga al massimo 255 caratteri'
        ]);


        $data = $request->all();
        // dump($data);
        // dump($comic);
        $comic->slug = Str::slug($comic->title, '-');
        $comic->update($data);

        return redirect()->route('comic.show', $comic->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ComicController  $comicController
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comic.index');
    }
}
