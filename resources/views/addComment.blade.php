@extends('DetailSerie')

@section('addComment')


    @if (Auth::user())
        <form action=".addComment" method="post">
            <label for="commentaire">
                Commentaire :
                <input type="textarea" name="commentaire" rows="5" cols="33">
            </label>
            <label for="note">
                Note :
                <input type="number" name="note">
            </label>

            <input type="submit" value="Envoyer le commentaire">
        </form>

    @else
        <h1 style="color: green;">Pour ajouter un commentaire, veuillez vous connecter</h1>
    @endif


@endsection

