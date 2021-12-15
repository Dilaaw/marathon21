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
@endsection
