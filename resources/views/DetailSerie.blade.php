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
                            @if(Auth::user())
                                <td>
                                    <form action="{{route('serie.store')}}" method="POST">
                                        <button
                                               type="submit"
                                               name="maBox"
                                               value="maBox"
                                               id="{{$episode->id}}">Déjà vu
                                        </button>
                                    </form>
                                </td>
                            @endif
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

        @yield('addComment')




    @else
        <h3>Aucune série</h3>
    @endif
@endsection
