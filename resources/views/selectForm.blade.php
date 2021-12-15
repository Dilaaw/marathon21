@extends('liste')

@section('form')

    <form action="/liste" method="get">
        <input type="text" name="genre" placeholder="Genre ici">
        <input type="text" name="langue" placeholder="Langue ici">
        <input type="submit" value="submit">
    </form>
@endsection