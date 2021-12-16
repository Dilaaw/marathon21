@extends('layouts.app')

@section('content')

    <h1>Les dernières sorties :</h1>

    @if(!empty($recentSeries))
        @foreach($recentSeries as $serie)
            <p>{{$serie -> nom}}</p>
        @endforeach
    @else
        <h3>Aucune série</h3>
    @endif

    <a href="{{route('all_series')}}">
        <h1>Go voir la liste entière des séries dispo</h1>
    </a>

    <form action="/liste" method="get">
        <input type="text" placeholder="Rechercher" name="search">
        <input type="submit">
    </form>

@endsection
