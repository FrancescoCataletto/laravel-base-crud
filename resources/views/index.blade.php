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
                <a href="{{route('comic.edit', $comic->slug)}}">EDIT</a>
                <form action="{{route('comic.destroy', $comic)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comic?')">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE">
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
