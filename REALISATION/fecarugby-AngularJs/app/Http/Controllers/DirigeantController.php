<?php

namespace fecarugby\Http\Controllers;

use Illuminate\Http\Request;

use fecarugby\Http\Requests;

class DirigeantController extends Controller
{
    public function index()
    {
        $dirigeants = \fecarugby\Dirigeant::all();
        $bossWithPoste = [];
        foreach ($dirigeants as $key => $boss) {
        	$boss->poste;
        	$boss->poste->departement;
        	$bossWithPoste[] = $boss;

        }
        return response()->json($bossWithPoste);
    }

    public function show($id)
    {
        $dirigeant = \fecarugby\Dirigeant::findorfail($id);
        $dirigeant->poste;
        $dirigeant->poste->departement;
        return response()->json($dirigeant);
    }
    public function postes() {
        // Route named "api::dashboard"
        $datas = \fecarugby\Poste::all();
        return response()->json($datas);
	}
}
