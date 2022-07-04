@extends('layouts.main')

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-8 offset-2">
            <h2 class="mb-3">Aggiungi un nuovo fumetto</h2>
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

            <form action="{{route('comic.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label"></label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Titolo">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label"></label>
                    <input type="text" id="type" name="type" class="form-control" placeholder="Tipo" >
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label"></label>
                    <input type="text" id="image" name="image" class="form-control" placeholder="URL immagine" >
                </div>

                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>

</div>

@endsection