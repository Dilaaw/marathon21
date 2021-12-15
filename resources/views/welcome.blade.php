@extends('layouts.app')

@section('content')
    C'est la page générale du site,
    <br />
    on doit y voir les dernières séries par exemple.
    @if(!empty($series))
        @foreach($series as $serie)
            <p>{{$serie -> nom}}</p>
        @endforeach
    @else
        <h3>Aucune série</h3>
    @endif
@endsection
