<?php

namespace ToInvestCapital\Http\Controllers;

use Illuminate\Http\Request;

use ToInvestCapital\Http\Requests;

class AdminController extends Controller
{
  public function __construct(Request $request)
  {
    //var_dump(session('user')); die;

  }
  public function index() {


    $menus = \ToInvestCapital\Menu::all();
    $languages = \ToInvestCapital\Language::all();
    $countries = \ToInvestCapital\Country::all();
    $accounts = \ToInvestCapital\Account::all();

    $articles = \ToInvestCapital\Article::select('*', 'menus.name_en as menu_name_en', 'accounts.name as account_name', 'countries.name as country_name', 'languages.name as language_name')
    ->join('menus', 'menu_id', '=', 'menus.id')
    ->join('accounts', 'account_id', '=', 'accounts.id')
    ->join('countries', 'country_code', '=', 'countries.code')
    ->join('languages', 'language_code', '=', 'languages.code')
    ->take(25)->get();

    //dd($articles->menu());

    return view('admin.dashboard')->with(compact('articles','accounts', 'menus', 'languages', 'countries'));
  }
}
