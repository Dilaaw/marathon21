@extends('layouts.app')

@section('content')

    Détail de la serie:
    <br>
    <br>
    @if(!empty($serie))

           Pour la série : {{$serie -> nom}}<br>
           Le genre est : {{$serie -> genre}}<br>
           Petit résume : {{$serie -> resume}}<br>
           La langue disponible est : {{$serie -> langue}}<br>
           Cette serie est sorti : {{$serie -> premiere}}<br>
           La redaction a dit : {{$serie -> avis}}<br><br>
           <img src=" {{ asset($serie -> urlImage) }}"/><br>
            <table border>
                <thead>
                    <tr>
                        <th>Vu: </th>
                        <th>Saison:</th>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Resume</th>
                    </tr>
                </thead>
                @foreach($episodes as $episode)
                    <tbody>
                        <tr>
                            <td><input
                                       type="button"
                                       value="Déjà vu"></td>
                            <td>{{$episode->saison}}</td>
                            <td>{{$episode->numero}} </td>
                            <td>{{$episode->nom}}</td>
                            <td><img src=" {{ asset($episode -> urlImage) }}"/><br></td>
                            <td>@if($episode->resume==null)
                                    Pas de resume    </td>
                                @else
                                    {{$episode->resume}}</td>
                                @endif
                        </tr>
                    </tbody>
                @endforeach
            </table>
            <br><br>
           Commentaires :<br>
           @foreach($comments as $comments)
               <br>
                {{$comments->content}}<br>
               <br>
           @endforeach




    @else
        <h3>Aucune série</h3>
    @endif
@endsection
