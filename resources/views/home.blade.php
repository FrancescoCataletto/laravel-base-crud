@extends('layouts.main')

@section('content')
<h1>COMICS</h1>

@foreach ($comics as $comic)
    <div>
        <ul>
            <li>{{$comic->title}}</li>
            <li><img src="{{$comic->image}}" alt="{{$comic->title}}"></li>
            <li>{{$comic->type}}</li>
        </ul>
    </div>
@endforeach

@endsection