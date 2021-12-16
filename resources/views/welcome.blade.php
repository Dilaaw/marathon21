@extends('layouts.app')

@section('content')

    <h1 class="lastSeries-title">Les dernières sorties :</h1>

    @if(!empty($recentSeries))
    <div class="welcome-caroussel">
    <img src="img/Flecheg.png" id ='welcome-caroussel-prec'>
    <div class = "last-series-container">
        @foreach($recentSeries as $serie)
            <div class="last-series">
          
            <img src='{{$serie -> urlImage}}' alt='{{$serie -> nom}}'>
            
        </div>
        @endforeach
</div>
    <img id ='welcome-caroussel-suiv' src="img/Fleched.png">
</div>
    @else
    
        <h3>Aucune série</h3>
    @endif

@endsection
