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

            <div class ="saisons">
                <?php 
                    
                    for ($i =1; $i<= $saison; $i++){
                        if ($i%2==0){
                            echo '<span class="saison-rose saison-btn" id="saison'.$i.'" >saison '.$i.'</span>';
                            
                        }else{
                            echo '<span class="saison-bleu saison-btn" id=\"saison'.$i.'\" >saison '.$i.'</span>';
                        }
                       
                    }
                
                ?>
                </div>  
            
    
            <div class ="episodes-list">
                @for ($i =1; $i<= $saison; $i++)
                <div id="season{{$i}}" class="season"> 
            
                <h3>Saison {{$i}}</h3>
                <div class="episodes-group">
                @foreach($episodes as $episode)
                    
                    <div class="episode-container">
                        <img src="{{ asset($episode -> urlImage) }}" alt="visuel">
                        <span> {{$episode->numero}} - {{$episode->nom}} </span>
                    </div>
                @endforeach
                </div>
                </div>
            
                @endfor
            <div>
 
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
                           
                        
                            <td><?php echo (html_entity_decode($episode -> resume));?></td>
                            <td style="color: red;">{{$saison}}</td>
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
    <script src="{{ asset('js/serie.js') }}"></script>
@endsection
