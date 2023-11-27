<?php

namespace ToInvestCapital\Http\Controllers;

use Illuminate\Http\Request;
use ToInvestCapital\Http\Requests;
use ToInvestCapital\Menu;
use ToInvestCapital\Language;
use ToInvestCapital\Account;
use ToInvestCapital\Country;

class ArticleController extends Controller {

  public function index() {

    $articles = \ToInvestCapital\Article::select('*', 'menus.name_en as menu_name_en', 'accounts.name as account_name', 'countries.name as country_name', 'languages.name as language_name')
    ->join('menus', 'menu_id', '=', 'menus.id')
    ->join('accounts', 'account_id', '=', 'accounts.id')
    ->join('countries', 'country_code', '=', 'countries.code')
    ->join('languages', 'language_code', '=', 'languages.code')
    ->take(25)->get();
    //dd($articles);
    return view('admin.dashboard')->with(compact('articles'));
  }

  public function getBulletins() {
    $articles = \ToInvestCapital\Article::select('*', 'menus.name_en as menu_name_en', 'accounts.name as account_name', 'countries.name as country_name', 'languages.name as language_name')
    ->join('menus', 'menu_id', '=', 'menus.id')
    ->join('accounts', 'account_id', '=', 'accounts.id')
    ->join('countries', 'country_code', '=', 'countries.code')
    ->join('languages', 'language_code', '=', 'languages.code')
    ->where('menus.name_en', 'like', '%bulletin%')->take(25)->get();
    //dd($articles);
    return $articles;
  }

  public function showArticle($slug) {
    $article = \ToInvestCapital\Article::select('*', 'menus.name_en as menu_name_en', 'accounts.name as account_name', 'countries.name as country_name', 'languages.name as language_name')
    ->join('menus', 'menu_id', '=', 'menus.id')
    ->join('accounts', 'account_id', '=', 'accounts.id')
    ->join('countries', 'country_code', '=', 'countries.code')
    ->join('languages', 'language_code', '=', 'languages.code')
    ->where('slug', '=', $slug)->firstorfail();
    //dd($articles);
    return $article;
  }

  public function getOne($slug) {
    $menus = \ToInvestCapital\Menu::all();
    $languages = \ToInvestCapital\Language::all();
    $countries = \ToInvestCapital\Country::all();
    $accounts = \ToInvestCapital\Account::all();
    $article = \ToInvestCapital\Article::where('slug', $slug)->firstorfail();
    //dd($countries);
    return view('admin.article_update')->with(compact('article', 'accounts', 'menus', 'languages', 'countries'));
  }

  public function delete($slug) {
    $article = \ToInvestCapital\Article::where('slug', $slug)->delete();
    return redirect('dashboard/articles');
  }

  public function create(Request $req) {

    $article = $req->input('article');
    $article['slug'] = str_slug($article['title']);
    $article['menu_id'] = 1;
    //dd($article);
    $i = \ToInvestCapital\Article::create($article);
    return redirect('dashboard/articles');
  }

  public function update($slug, Request $req) {
    $article = $req->input('article');
    //dd($article);
    $a = \ToInvestCapital\Article::where('slug', '=', $slug)->update($article);
    return redirect('dashboard/articles');
  }
  public function postAddon(Request $r) {

    if ($r->isMethod('post')) {
      $data = $r->input();
      if (isset($data['postMenu'])) {
        $menu = Menu::create($data);
      } else if (isset($data['postLanguage'])) {
        $lang = Language::create($data);
      } else if (isset($data['postCountry'])) {
        $country = Country::create($data);
      } else if (isset($data['postAccount'])) {
        $account = Account::create($data);
      } else {
        /* code */
      }
      return back();
    }else{
      return response('Not Accessible', '404');
    }
  }
  public function deleteAddon($addon, $id, Request $r) {

    if ($r->isMethod('get')) {

      if ($addon === "menu") {
        $menu = Menu::find($id);
        $menu->delete();
      } else if ($addon === "language") {
        $lang = Language::find($id);
        $lang->delete();
      } else if ($addon === "country") {
        $country = Country::find($id);
        $country->delete();
      } else if ($addon === "account") {
        $account = Account::find($id);
        $account->delete();
      } else {
        /* code */
      }
      return back();

    }else{
      return response('Not Accessible', '404');
    }
  }
}
