<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ListeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languechoisie = (empty($_GET['langue'])) ? 'all' : $_GET['langue'];
        $genrechoisi = (empty($_GET['genre'])) ? 'all' : $_GET['genre'];

        $allSeries = Serie::all();
        $series = [];
        foreach ($allSeries as $serie) {
            if     (($serie->genre == $genrechoisi && $serie->langue == $languechoisie) //Si le genre est Set + bon et que la langue aussi
                || ($genrechoisi == "all" && $serie->langue == $languechoisie) // Si le genre n'est pas set mais que la langue si et est bonne
                || ($serie->genre == $genrechoisi && $languechoisie == "all") // Si genre set et bon + langue pas set
                || ($genrechoisi == "all" && $languechoisie == "all")) // Si rien de set
            {
                $series[] = $serie;
            }
        }
        return view('liste', ['series' => $series,'genres'=> $this->getAllGenre($allSeries),'langues'=> $this->getAllLangue($allSeries), 'saisons' => $this->getNbSaison($series)]);
    }

    public function getAllGenre($allSeries) {
        $genres = [];
        foreach ($allSeries as $serie) {
            if (!in_array($serie->genre, $genres)) {
                $genres[] = $serie->genre;
            }
        }
        return $genres;
    }
    public function getAllLangue($allSeries) {
        $langues = [];
        foreach ($allSeries as $serie) {
            if (!in_array($serie->langue, $langues)) {
                $langues[] = $serie->langue;
            }
        }
        return $langues;
    }
    public function getNbSaison($series) {
        $saisons = [];
        foreach ($series as $serie) {
            $episodes = $serie->episodes;
            $episodes->sortByDesc('saison');
            $saisons[$serie->id] = $episodes->last()->saison;
        }
        return $saisons;
    }

    /*
     * Show the detailed page of the serie
     */
    public function getByName() {
        if (isset($_GET['search'])) {
            $allSeries = Serie::all();
            foreach ($allSeries as $serie) {
                if ($serie->nom == $_GET['search']) {
                    $episodes=$serie->episodes;
                    $comments=$serie->comments;
                    break;
                }
            }
            return view('DetailSerie', ['serie' => $serie,'episodes' =>$episodes,'comments' =>$comments]);
        } else {
            echo "Erreur PAs de recherche mais appelé";
        }
        return view('404');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie = Serie::find($id);
        return view('series.edit', ['serie' => $serie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
