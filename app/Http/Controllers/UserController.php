<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seen = User::all();
        return view('profil', ['seen' => $seen]);
    }

    public function getVisionnes($id){
        $user = User::find($id);
        $lst=[];
        $cpt=0;
        foreach ($user->seen as $el){
            if (!(in_array($el,$lst))){
                $lst[]=Serie::find($el->serie_id);
            }
            $cpt+=$el->duree;
        }
        $list = $this->getValider();
        return view('profil',["user"=>$user,"seen"=>$lst,"count"=>$cpt,"content"=>$list]);
    }

    public function getValider(){
        $comments = Comment::all();
        $list = [];
        foreach ($comments as $comment){
            if($comment->validated == 0){
                $list[]=$comment->content;
            }
        }
        return $list;
    }

    public function addComment($request, $serie){


        DB::table('comments')->insert(
            [
                'content'=>$request['commentaire'],
                'note'=>$request['note'],
                'validated'=>false,
                'user_id'=>Auth::user()->getAuthIdentifier(),
                'serie_id'=>$serie->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]
        );
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
