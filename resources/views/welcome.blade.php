@extends('layouts.app')

@section('content')

    <h1>Les dernières sorties :</h1>

    @if(!empty($recentSeries))
    <div class = "last-series-container">
        @foreach($recentSeries as $serie)
            <div class="last-series">
          
            <img src='{{$serie -> urlImage}}' alt='{{$serie -> nom}}'></img>

        </div>
        @endforeach
    <div>
    @else
        <h3>Aucune série</h3>
    @endif

@endsection
