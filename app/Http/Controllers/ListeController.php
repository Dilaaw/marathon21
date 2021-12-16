<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class ListeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Serie::all();
        return view('welcome', ['series' => $series]);
    }

    public function getListe($genrechoisi = "all")
    {
        $series = [];
        if ($genrechoisi != "all") {
            $allSeries = Serie::all();
            foreach ($allSeries as $serie) {
                if ($genrechoisi == $serie->genre) {
                    $series[] = $serie;
                }
            }
        } else {
            $series = Serie::all();
        }


        $saisons = [];
        $genres = [];

        foreach ($series as $serie) {
            // On récupère tout les genres possibles pour les boutons de tri par genre
            if (!in_array($serie->genre, $genres)) {
                $genres[] = $serie->genre;
            }
        }

        foreach ($series as $serie) {

            if ($genrechoisi != "all") {

            } else {

            }



            // On récupère le nombre de saisons des séries
            $episodes = $serie->episodes;
            $episodes->sortByDesc('saison');
            $saison[$serie->id] = $episodes->Last()->saison;

        }



        return view('liste', ['series' => $series, 'saisons' => $saison, 'genres' => $genres]);
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
