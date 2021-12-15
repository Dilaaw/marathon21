@extends('layouts.app')

@section('content')
    Liste des épisodes :
    @if(!empty($series))
        @foreach($series as $serie)

            <div style="border: solid blue 1px; margin: 10px;">
                <img src="{{$serie -> urlImage}}">
                <p>Nom : {{$serie -> nom}} -> </p>
                <p>Genre : {{$serie -> genre}} </p>
                <p>Langue : {{$serie -> langue}}</p>
                <p>Nombre de saisons : {{$saisons[$serie->id]}}</p>

            </div>
        @endforeach
    @else
        <h3>Aucune série</h3>
    @endif
@endsection
