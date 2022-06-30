@extends('layouts.main')

@section('content')
    
<div class="container my-5">
    <div class="row">
        <div class="col-8 offset-2">
            <h2 class="mb-3">Modifica il fumetto</h2>
            <form action="{{route('comic.update', $comic)}}" method="POST">
                @csrf

                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" value="{{$comic->title}}"
                    class="form-control" placeholder="Titolo">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" id="type" name="type" value="{{$comic->type}}"
                    class="form-control" placeholder="Tipo" >
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image URL</label>
                    <input type="text" id="image" name="image" value="{{$comic->image}}"
                    class="form-control" placeholder="URL immagine" >
                </div>

                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>

</div>

@endsection