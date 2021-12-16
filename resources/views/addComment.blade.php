@extends('DetailSerie')

@section('addComment')


    @if (Auth::user())
        <form class ="addcomment" action=".addComment" method="post">
        
                
                <textarea style="width: 50rem; height: 15rem;" class ="tris" type="" name="commentaire" rows="5" cols="33" placeholder ="Commentaire "   ></textarea>
          
                <br/>
                <input class="tris" type="number" name="note" placeholder ="note">
            

            <input class="tris-btn" type="submit" value="Envoyer ">
        </form>

    @else
        <h1 style="color: green;">Pour ajouter un commentaire, veuillez vous connecter</h1>
    @endif


@endsection

