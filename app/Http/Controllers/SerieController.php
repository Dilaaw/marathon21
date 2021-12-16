<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (isset($_POST['commentaire']) && isset($_POST['note'])) {
            $con = new UserController();
            $con->addComment($_POST, $serie);
        }
        $episodes=$serie->episodes->sortBy('saison');
        $comments=$serie->comments;
        $nbrSaison = $episodes->sortBy('saison')->last()->saison;
        if (Auth::user()) {
            return view('addComment', ['serie' => $serie,'episodes' =>$episodes,
                'comments' =>$comments]);
        } else {
            return view('DetailSerie', ['serie' => $serie,'episodes' =>$episodes,
                'comments' =>$comments,'saison' => $nbrSaison]);
        }
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
        $episodeVu = DB::select('select episode_id from seen ');
        if($request->serieBox!=null) {
            $serie =Serie::find($request->serieBox) ;
            foreach ($serie->episodes as $episodes) {
                if(!in_array("$episodes",$episodeVu))
                    DB::table("seen")->insert(
                        [
                            'user_id' => Auth::user()->id,
                            'episode_id' => $episodes->id,
                            'date_seen' => now(),
                        ]
                    );
            }
            $serieID = $request->serieBox;
            return $this->getSerie($serieID);
        }
        else {
            if(!in_array("$request->maBox",$episodeVu))
                DB::table("seen")->insert(
                    [
                        'user_id' => Auth::user()->id,
                        'episode_id' => $request->maBox,
                        'date_seen' => now(),
                    ]
                );
                $episodeID = Episode::find($request->maBox);
                $serieID = $episodeID->serie_id;
                return $this->getSerie($serieID);
            }
    }

    public function storeSer(Request $request)
    {
        $this->validate(
            $request,
            [
                'serieBox' => 'required',
            ]
        );
        foreach ($request->serieBox->episodes as $episodes){
            DB::table("seen")->insert(
                [
                    'user_id' => Auth::user()->id,
                    'episode_id' => $episodes->id,
                    'date_seen' => now(),
                ]
            );
        }




        return $this->getSerie($request->serieBox);
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
