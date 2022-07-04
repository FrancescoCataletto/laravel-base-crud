@extends('layouts.main')

@section('content')
    
<div class="container my-5">
    <div class="row">
        <div class="col-8 offset-2">
            <h2 class="mb-3">Modifica il fumetto</h2>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route('comic.update', $comic)}}" method="POST">
                @csrf

                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" value="{{$comic->title}}"
                    class="form-control @error('title') is-invalid
                    @enderror" placeholder="Titolo">
                    @error('title')
                        <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" id="type" name="type" value="{{$comic->type}}"
                    class="form-control @error('type') is-invalid
                    @enderror" placeholder="Tipo" >
                    @error('type')
                        <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image URL</label>
                    <input type="text" id="image" name="image" value="{{$comic->image}}"
                    class="form-control @error('image') is-invalid
                    @enderror" placeholder="URL immagine" >
                    @error('image')
                        <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>

</div>

@endsection