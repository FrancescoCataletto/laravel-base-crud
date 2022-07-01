@extends('layouts.main')

@section('content')
    <h1>ERRORE 404</h1>
    <h2>{{ $exception->getMessage() }}</h2>
@endsection