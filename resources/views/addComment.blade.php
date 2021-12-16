@extends('DetailSerie')

@section('addComment')
    <form method="post">
        <label for="commentaire">
            Commentaire :
            <input type="text" name="commentaire">
        </label>
        <label for="note">
            <input type="number" name="note">
        </label>

        <input type="submit" value="Envoyer le commentaire">
    </form>
@endsection

