@extends('layouts.app')

@section('content')

    <h1>Les dernières sorties :</h1>

    @if(!empty($recentSeries))
    <div class="welcome-caroussel">
    <img id="welcome-caroussel-prec" src="/img/flecheg.png" alt="precedent">
    <div class = "last-series-container">

        @foreach($recentSeries as $serie)
            <div class="last-series">
            
            <img src='{{$serie -> urlImage}}' alt='{{$serie -> nom}}'></img>
            <div class="series-detail">
                <h5> {{$serie -> nom}} </h5>
                <p>Genre : {{$serie -> genre}} </p>
                <p>Langue : {{$serie -> langue}}</p>
           
                </div>

        </div>
        @endforeach
        
</div>
<img id="welcome-caroussel-suiv" src="/img/fleched.png" alt="suivant">
</div>
    @else
        <h3>Aucune série</h3>
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
