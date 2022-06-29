@extends('layouts.main')

@section('content')
<h1>COMICS</h1>

@foreach ($comics as $comic)
    <div>
        <ul>
            <li><a href="{{route('comic.show', $comic->slug)}}">{{$comic->title}}</a></li>
            <li><img src="{{$comic->image}}" alt="{{$comic->title}}"></li>
            <li>{{$comic->type}}</li>
        </ul>
    </div>
@endforeach

@endsection