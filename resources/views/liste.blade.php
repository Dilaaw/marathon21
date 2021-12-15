@extends('layouts.app')

@section('content')


    <h1>Liste des épisodes :</h1>



    @yield('form')

    <form method="get">
        <label for="genre">Choisir genre</label>
        <input type="text" id="genre" name="genre" list="listGenre" />
        <datalist id="listGenre">
            @foreach($genres as $genre)
                <option>{{$genre}}</option>
            @endforeach
        </datalist>

        <label for="langue">Choisir langue</label>
        <input type="text" id="langue" name="langue" list="listLangue" />
        <datalist id="listLangue">
            @foreach($langues as $langue)
                <option>{{$langue}}</option>
            @endforeach
        </datalist>


        <input type="submit" value="Filtrer">
    </form>


    @if(!empty($series))
        @foreach($series as $serie)

            <a href="">
                <div style="border: solid blue 1px; margin: 10px;">
                <img src="{{asset($serie -> urlImage)}}">
                <p>Nom : {{$serie -> nom}} </p>
                <p>Genre : {{$serie -> genre}} </p>
                <p>Langue : {{$serie -> langue}}</p>
                <p>Nombre de saisons : {{$saisons[$serie->id]}}</p>
                </div>
            </a>
        @endforeach
    @else
        <h3>Aucune série</h3>
    @endif
@endsection
