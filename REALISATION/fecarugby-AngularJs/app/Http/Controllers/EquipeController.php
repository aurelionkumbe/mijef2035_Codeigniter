<?php

namespace fecarugby\Http\Controllers;

use Illuminate\Http\Request;

use fecarugby\Http\Requests;

class EquipeController extends Controller
{
    public function index()
    {
    	 // Route named "api::dashboard"
            $datas = \fecarugby\Equipe::all();
            return response()->json($datas);
    }
    public function show($id)
    {
    	 // Route named "api::dashboard"
            $e = \fecarugby\Equipe::findorfail($id);
            $e->lieu;
            $e->genre;
            $e->categorie;
            $e->typeEquipe;
            $e->joueurs;
            return response()->json($e);
    }
    public function getAllPerType($divisionId)
    {
         // Route named "api::dashboard"
      
            $equipes = \fecarugby\Equipe::where('type_equipe_id', $divisionId)->get();
            $equipesWithInfo = [];
            foreach ($equipes as $key => $e) {
                $e->lieu;
                $e->genre;
                $e->categorie;
                $e->typeEquipe;
                $e->joueurs;
                $equipesWithInfo[]=$e;
            }
            return response()->json($equipesWithInfo);
            
    }
    public function joueurs($id)
    {
            $e = \fecarugby\Equipe::findorfail($id);
            $e->joueurs;
            return response()->json($e);
    }
}
