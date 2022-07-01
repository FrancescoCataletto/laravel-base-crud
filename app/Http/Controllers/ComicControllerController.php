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
        return view('show', compact('comic'));
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
