<?php

namespace App\Http\Controllers;

use App\ComicController;
use Illuminate\Http\Request;

class ComicControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ComicController  $comicController
     * @return \Illuminate\Http\Response
     */
    public function show(ComicController $comicController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ComicController  $comicController
     * @return \Illuminate\Http\Response
     */
    public function edit(ComicController $comicController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ComicController  $comicController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComicController $comicController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ComicController  $comicController
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComicController $comicController)
    {
        //
    }
}
