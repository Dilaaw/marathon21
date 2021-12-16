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
           <div class="ifo-genre"> <b>Genre :</b> <?php echo (html_entity_decode($serie -> genre));?></div>
           <div class="ifo-resume"><br><b>Résumé : </b><?php echo (html_entity_decode($serie -> resume));?></div>
           <div class="ifo-vo"> <b>VO :</B> <?php echo (html_entity_decode($serie -> langue));?></div>
           <div class="ifo-sortie">  <b>Date de parution</b> : <?php echo (html_entity_decode($serie -> premiere));?></div>
           <div class="ifo-avis"> <b>Avis de la redac :</b> <?php echo (html_entity_decode($serie -> avis));?></div>
            </div>
            </div>


            <table >
           @if(Auth::user())
               Vous avez peut être déjà vu la serie ?
                   <form action="{{route('serie.store')}}" method="POST">
                       @csrf
                       <button
                               type="submit"
                               name="serieBox"
                               value="{{$serie->id}}"
                               id="{{$serie->id}}">Déjà vu
                       </button>
                   </form>
           @endif
            <table border>
                <thead>
                    <tr>
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
                                @if(in_array($episode->id,$episodeVu,true))
                                    <td>Déja vu</td>
                                @else
                                    <td>
                                        <form action="{{route('serie.store')}}" method="POST">
                                            @csrf
                                            <button
                                                   type="submit"
                                                   name="maBox"
                                                   value="{{$episode->id}}"
                                                   id="{{$episode->id}}">Marquer comme vu ?
                                            </button>
                                        </form>
                                    </td>
                                @endif
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
                {{$comments->content}}
               @if($comments->validated != 1)
                   <span style="color: red;">
                       En attente de validation par un administrateur.
                   </span>
               @endif

               <br>
               <br>
           @endforeach

        @yield('addComment')




    @else
        <h3>Aucune série</h3>
    @endif
@endsection
