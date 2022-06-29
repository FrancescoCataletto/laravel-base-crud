@extends('layouts.main')

@section('content')

<h1>FUMETTO SINGOLO</h1>

<div>
    <ul>
        <li>{{$comic->title}}</li>
        <li><img src="{{$comic->image}}" alt="{{$comic->title}}"></li>
        <li>{{$comic->type}}</li>
    </ul>
</div>

@endsection