@extends('layouts.app')

@section('content')


    <h1 class="lesSeries">Les séries</h1>

 <div class="recherche-form">
    <form  action="/serie" method="get">
        <input class="recherche" type="text" placeholder="Rechercher" name="search">
        <input class='recherche-btn' type="submit">
    </form>

    <form method="get">
        <label for="genre">Choisir genre :</label>
        <input class="tris" type="text" id="genre" name="genre" list="listGenre" />
        <datalist id="listGenre">
            @foreach($genres as $genre)
                <option>{{$genre}}</option>
            @endforeach
        </datalist>
        <label for="langue">Choisir langue :</label>
        <input class="tris" type="text" id="langue" name="langue" list="listLangue" />
        <datalist id="listLangue">
            @foreach($langues as $langue)
                <option>{{$langue}}</option>
            @endforeach
        </datalist>
        <input class='tris-btn' type="submit" value="Filtrer">
    </form>
</div>

    @if(!empty($series))
    <div class="series-container">
        @foreach($series as $serie)
        <div class="series">
            <a href="/serie/{{$serie->id}}">
                
                <img src="{{asset($serie -> urlImage)}}">
                <div class="series-detail">
                <h5> {{$serie -> nom}} </h5>
                <p>Genre : {{$serie -> genre}} </p>
                <p>Langue : {{$serie -> langue}}</p>
                <p>Nombre de saisons : {{$saisons[$serie->id]}}</p>
                </div>
            </a>
            </div>
        @endforeach
    </div>
    @else
        <h3>Aucune série</h3>
    @endif
@endsection
