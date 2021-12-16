@extends('layouts.app')

@section('content')
    Détail de la serie:
    <br>
    <br>
    @if(!empty($serie))
            <div class="info-serie">
            <img src=" {{ asset($serie -> urlImage) }}"/><br>
            <div class="txt-serie">
         <h1 style="text-align : center"> <?php echo (html_entity_decode($serie -> nom));?></h1>
           <div class="ifo-genre"> <b>Genre:</b> <?php echo (html_entity_decode($serie -> genre));?></div>
           <div class="ifo-resume"><b>résumé: </b>:<?php echo (html_entity_decode($serie -> resume));?></div>
           <div class="ifo-vo"> <b>VO:</B> <?php echo (html_entity_decode($serie -> langue));?></div>
           <div class="ifo-sortie">  <b>Date de parution</b> : <?php echo (html_entity_decode($serie -> premiere));?></div>
           <div class="ifo-avis"> <b>Avis de la redac :</b> <?php echo (html_entity_decode($serie -> avis));?></div>
            </div>
            </div>


            <table >

           Pour la série : {{$serie -> nom}}<br>
           Le genre est : {{$serie -> genre}}<br>
           Petit résume : {!!$serie -> resume!!}<br>
           La langue disponible est : {{$serie -> langue}}<br>
           Cette serie est sorti : {{$serie -> premiere}}<br>
           La redaction a dit : {{$serie -> avis}}<br><br>
           <img src=" {{ asset($serie -> urlImage) }}"/><br>
           @if(Auth::user())
               Vous avez peut être déjà vu la serie ?
                   <form action="{{route('serie.store')}}" method="POST">
                       @csrf
                       <button
                               type="submit"
                               name="serieBox"
                               value={{$serie->id}}
                                       id={{$serie->id}}>Déjà vu
                       </button>
                   </form>
           @endif
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
                                        @csrf
                                        <button
                                               type="submit"
                                               name="maBox"
                                               value={{$episode->id}}
                                               id={{$episode->id}}>Déjà vu
                                        </button>
                                    </form>
                                </td>
                            @endif
                            <td>{{$episode->saison}}</td>
                            <td>{{$episode->numero}}</td>
                            <td>{{$episode->nom}}</td>
                            <td><img src=" {{ asset($episode -> urlImage) }}"/><br></td>
                            <td>@if($episode->resume==null)
                                    Pas de resume    </td>
                                @else
                                    {!!$episode->resume!!}</td>
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
