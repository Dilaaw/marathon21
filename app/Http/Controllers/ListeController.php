<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Utils;
use PhpParser\Node\Expr\Cast\Object_;

class ListeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSeries = Serie::all();
        $saisons = [];
        foreach ($allSeries as $serie) {
            $saisons[$serie->id] = $this->getNbSaison($serie);
        }
        return view('liste', ['series' => $allSeries, 'genres'=> $this->getAllGenre($allSeries),'langues'=> $this->getAllLangue($allSeries), 'saisons' => $saisons]);
    }

    public function getListe()
    {

        if (isset($_GET['search'])){
            return $this->getByName($_GET['search']);

        }

        if (isset($_GET['langue'])){
            $languechoisie = $_GET['langue'];
        } else {
            $languechoisie ="all";
        }
        if (isset($_GET['genre'])) {
            $genrechoisi = $_GET['genre'];
        } else {
            $genrechoisi = "all";
        }
        $allSeries = Serie::all();
        $series = [];
        $saisons= [];

        foreach ($allSeries as $serie) {
            if     ($serie->genre == $genrechoisi && $serie->langue == $languechoisie
                || ($genrechoisi == "all" && $serie->langue == $languechoisie)
                || ($serie->genre == $genrechoisi && $languechoisie == "all"
                    || ($genrechoisi == "all" && $languechoisie == "all")))
            {
                $series[] = $serie;
            }
        }
        foreach ($series as $serie) {
            $saisons[$serie->id] = $this->getNbSaison($serie);
        }
        return view('liste', ['series' => $series,'genres'=> $this->getAllGenre($allSeries),'langues'=> $this->getAllLangue($allSeries), 'saisons' => $saisons]);
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
    public function getNbSaison($serie) {
        $episodes = $serie->episodes;
        $episodes->sortByDesc('saison');
        return $episodes->last()->saison;
    }

    public function getByName($name) {
        $allSeries = Serie::all();
        foreach ($allSeries as $serie) {
            if ($serie->nom == $name) {
                //echo $serie->id . $serie->nom;
                $str = "/serie/".$serie->id;
                return view($str, [SerieController::class,'getSerie']);
            }
        }
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
