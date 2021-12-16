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
                                <td><input
                                           type="button"
                                           value="Déjà vu"
                                           id="{{$episode->id}}">
                                </td>
                                @if(isset($_POST['Déjà vu']))
                                    Episode vu !!
                                @endif
                            @endif
                            <td>{{$episode->saison}}</td>
                            <td>{{$episode->numero}}</td>
                            <td>{{$episode->nom}}</td>
                            <td><img src=" {{ asset($episode -> urlImage) }}"/><br></td>
                            <td><?php echo (html_entity_decode($episode -> resume));?></td>
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
