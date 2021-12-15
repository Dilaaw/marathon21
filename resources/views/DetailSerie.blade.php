@extends('layouts.app')

@section('content')
    Résume:
    <?php
   $bdd=new PDO('sqlite:host=localhost;dbname=db;charset=utf8','root',/*MDP:*/'root');


   $requete= $bdd->query('select nom,resume,genre,note
                                from serie
                                order by id desc

                                ');

   echo'<table border>
                    <tr>
                        <th>Nom</th>
                        <th>Resume</th>
                        <th>Genre</th>
                        <th>Note</th>
                    </tr>';
   while($donnees=$requete->fetch()){

       echo'<tr>
                    <td>'.$donnees['nom'].'</td>
                    <td>'.$donnees['resume'].'</td>
                    <td>'.$donnees['genre'].'</td>
                    <td>'.$donnees['note'].'</td>
                </tr>';


   }
   echo'</table>';
?>

@endsection