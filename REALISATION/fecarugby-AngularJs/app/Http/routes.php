<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */


Route::get('/', function () {
    return view('home');
});

Route::group(['as' => 'api::'], function () {
    Route::get('api/categories', ['as' => 'categories', function () {
            $datas = fecarugby\Categorie::all();
            return response()->json($datas);
        }]);
    Route::get('api/genres', ['as' => 'genres', function () {
            // Route named "api::dashboard"
            $datas = fecarugby\Genre::all();
            return response()->json($datas);
        }]);
    Route::get('api/grades', ['as' => 'grades', 'uses'=>'DirigeantController@postes']);
    Route::get('api/dirigeant/{id}', ['as' => 'dirigeant.show', 'uses'=>'DirigeantController@show']);
    Route::get('api/dirigeants', ['as' => 'dirigeants', 'uses'=>'DirigeantController@index']);
        


    Route::get('api/joueur/{nom}', ['as' => 'joueur.show', 'uses'=>'DirigeantController@show']);
    Route::get('api/equipes', ['as' => 'equipes', 'uses'=>'EquipeController@index']);
    Route::get('api/equipe/{id}', ['as' => 'equipes', 'uses'=>'EquipeController@show']);
    Route::get('api/equipe/{id}/joueurs', ['as' => 'equipes', 'uses'=>'EquipeController@joueurs']);
    Route::get('api/division/{id}', ['as' => 'equipes', 'uses'=>'EquipeController@getAllPerType']);
        

    Route::get('api/postes/joueurs', ['as' => 'poste-joueurs', function () {
            // Route named "api::dashboard"
            $datas = fecarugby\JPoste::all();
            return response()->json($datas);
        }]);
    Route::get('api/menus', ['as' => 'menus', function () {
      // Route named "api::menus"
      $datas['departements'] = fecarugby\Departement::all();
      $datas['competitions']= ['nationale','internationale'];
      $datas['divisions'] = fecarugby\TypeEquipe::all();
      $datas['types_produit'] = fecarugby\TypeProduit::all();
      
      return response()->json($datas);
    }]);

    Route::get('api/matchs', ['as' => 'matchs', 'uses' => 'MatchController@index']);

    Route::get('api/competitions', ['as' => 'competitions', 'uses' => 'CompetitionController@index']);
    Route::get('api/competitions/{id}/classement', ['as' => 'competitions.classement', 'uses' => 'CompetitionController@getTeamsForOneCompetition']);
    Route::get('api/competitions/{id}/calandrier', ['as' => 'competitions.calandrier', 'uses' => 'CompetitionController@calandrier']);
    Route::get('api/competitions/{id}/hebdo', ['as' => 'competitions.hebdo', 'uses' => 'CompetitionController@getMatchsForOneCompetition']);
    Route::get('api/competitions/nationale', ['as' => 'competitions.nationale', 'uses' => 'CompetitionController@nationale']);
    Route::get('api/competitions/internationale', ['as' => 'competitions.internationale', 'uses' => 'CompetitionController@internationale']);


    Route::get('api/type-equipes', ['as' => 'typeEquipes', function () {
            // Route named "api::dashboard"
            $datas = fecarugby\TypeEquipe::all();
            return response()->json($datas);
        }]);
    Route::get('api/type-produits', ['as' => 'typeProduits', function () {
            // Route named "api::dashboard"
            $datas = fecarugby\TypeProduit::all();
            return response()->json($datas);
        }]);
    Route::get('api/lieux', ['as' => 'lieux', function () {
            // Route named "api::dashboard"
            $datas = fecarugby\Lieu::all();
            return response()->json($datas);
        }]);
});

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {
    //
});