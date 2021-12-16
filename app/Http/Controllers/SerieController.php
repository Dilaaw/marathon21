<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Http\Request;

class SerieController extends Controller
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

    public function getSerie($id){
        $serie =Serie::find($id);
        $episodes=$serie->episodes;
        $comments=$serie->comments;
        return view('DetailSerie', ['serie' => $serie,'episodes' =>$episodes,
                                            'comments' =>$comments]);
    }

    public function getRecent(){
        $series = Serie::all();
        $series = $series->sortByDesc('premiere');
        $recentSeries = [];
        $cpt = 0;
        foreach ($series as $serie) {
            if ($cpt < 5) {
                //echo "<p style='color: red;'>" . $serie->nom . "</p>";
                $recentSeries[] = $serie;
                $cpt++;
            } else {
                break;
            }
        }
        return view('welcome', ['recentSeries' => $recentSeries]);
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
