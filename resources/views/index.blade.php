@extends('layouts.main')

@section('content')

<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>TITOLO FUMETTO</td>
            <td>PULSANTI</td>
        </tr>
    </thead>

    <tbody>

        @foreach ($comics as $comic)
        <tr>
            <td>{{$comic->id}}</td>
            <td>{{$comic->title}}</td>
            <td>
                <a href="{{route('comic.show', $comic->slug)}}">SHOW</a>
                <a href="#">EDIT</a>
                <a href="#">DELETE</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
