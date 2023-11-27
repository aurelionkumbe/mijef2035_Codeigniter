<?php

namespace fecarugby\Http\Controllers;

use Illuminate\Http\Request;
use fecarugby\Http\Requests;

class MatchController extends Controller {

    public function index() {
        // Route named "admin::matchs"
        $datas = \fecarugby\Match::all();
        return response()->json($datas);
    }

}
