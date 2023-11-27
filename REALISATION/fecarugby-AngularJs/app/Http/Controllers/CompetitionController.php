<?php

namespace fecarugby\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use fecarugby\Http\Requests;

class CompetitionController extends Controller {

    public function index() {
        $datas = \fecarugby\Competition::all();
        return response()->json($datas);
    }

    public function nationale() {
        $datas = \fecarugby\Competition::nationale()->get();
        return response()->json($datas);
    }

    public function internationale() {
        $datas = \fecarugby\Competition::internationale()->get();
        return response()->json($datas);
    }

    public function getTeamsForOneCompetition($idCompetition)
    {
        $competition = \fecarugby\Competition::findorfail($idCompetition);
        $equipes = $competition->equipes()->orderBy('nbre_point', 'desc')->get();
        return response()->json($equipes);
    }

    public function getMatchsForOneCompetition($idCompetition)
    {
        $competition = \fecarugby\Competition::findorfail($idCompetition);
        $matchs = $competition->matchs()->take(14)->get(); 
        //TODO: comment faire que ca fontionne : ->xattr_get(filename, name)where('DateM', '>','now()')
        $matchsWithTeams = [];
       foreach ($matchs as $key => $m) {
            $eDom = $m->equipeaDomicile;
            $eExt = $m->equipeaExterieur;

/*          j ai appris que ce bout de code n etait plus necessaire
            $m['equipeaDomicile'] = $eDom;
            $m['equipeaExterieur'] = $eExt;
            
*/
            $matchsWithTeams[] = $m;

       }
        return response()->json($matchsWithTeams);

       // 2e facon de faire par jointure avec le Query builder
        /*
        $matchsWithTeams = [];
        foreach ($matchs as $key => $m) {
            $match = DB::table('match')
                ->select('match.*', 'eDom.nom as eDomNom','eDom.coach as eDomCoach', 'eExt.nom as eExtNom', 'eExt.coach as eExtCoach')
                ->join('equipe as eDom', 'eDom.id', '=', 'match.equipe_id')
                ->join('equipe as eExt', 'eExt.id', '=', 'match.equipe_id1')
                ->where('id_match',$m->id_match )
                ->take(1)
                ->get();
            $matchsWithTeams[] = $match[0];
        dd($matchsWithTeams);
        }
        return response()->json($matchsWithTeams);

        */

    }
    public function calandrier($idCompetition, $mois = null)
    {
        $competition = \fecarugby\Competition::findorfail($idCompetition);
        $matchs = $competition->matchs()->get(); //where('DateM', '>','now()')  ->witch('equipes')
        return response()->json($matchs);
    }
}
