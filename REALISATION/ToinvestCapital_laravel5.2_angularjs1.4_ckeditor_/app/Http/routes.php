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


  Route::get('/', function () {
   $slides = \ToInvestCapital\Document::imageSlide()->get();
   return view('welcome')->with(compact('slides'));
 });

  Route::get('/services', function () {
    return view('services');
  });
  Route::get('/services/strategy_and_development', function () {
    return view('services.strategy_and_development');
  });
  Route::get('/services/projet_management', function () {
    return view('services/projet_management');
  });
  Route::get('/services/capital_advisory', function () {
    return view('services/capital_advisory');
  });

  Route::get('/contacts', ['as' => 'send.email', 'uses' => 'MailController@index']);

  Route::post('/contacts', ['as' => 'post.email', 'uses' => 'MailController@sendSimpleEmailReminder']);

  Route::get('/privacy', function () {
    return view('privacy');
  });
  Route::get('/faq', function () {
    return view('faq')->with(['faqs' => \ToInvestCapital\Faq::all()]);
  });
  Route::any('/faq/question',['as' => 'post.question', 'uses' => 'FaqController@postQuestion']);

  Route::get('/press-release', function () {
    $countries = \ToInvestCapital\Country::all();

    $videos = \ToInvestCapital\Video::all();
    return view('press_release')->with(compact("videos","countries"));
  });
  Route::get('/solutions', function () {
    return view('solutions');
  });
  Route::get('/activities', function () {
    return view('activities');
  });
  Route::get('/about-us', function () {
    return view('about_us');
  });
  Route::get('/documents', function () {
    $countries = \ToInvestCapital\Country::all();
    $documents = \ToInvestCapital\Document::texte()->get();
    return view('documents')->with(compact('documents', 'countries'));
  });

  //Route::get('articles/bulletins', ['as' => 'get.bulletins', 'uses' => 'ArticleController@getBulletins']);
  Route::get('weekly-bulletin', ['as' => 'get.bulletins', 'uses' => function() {
    $ArticleCtrl = new ToInvestCapital\Http\Controllers\ArticleController;
    $articles = $ArticleCtrl->getBulletins();
    //dd($articles);
    return view('weekly_bulletin')->with(compact('articles'));
  }]);
  Route::get('/articles/{slug}/show', ['as' => 'show.article', 'uses' => function($slug) {
    $ArticleCtrl = new ToInvestCapital\Http\Controllers\ArticleController;
    $article = $ArticleCtrl->showArticle($slug);

    return view('article_single')->with(compact('article'));
  }]);

  //TODO doivent etre accessible apres authentification
  Route::get('/workspace', function () {
    return view('workspace');
  });
});

Route::group(['middleware' => ['web']], function () {

  //Route::auth();

    //login route
  Route::get('/dashboard/logout', 'loginController@logout');
  Route::post('/dashboard/login', 'loginController@auth');
  Route::get('/dashboard/register', 'registerController@index');
  Route::post('/dashboard/register', 'registerController@create_admin');
  Route::get('/dashboard/login', 'loginController@index');

  Route::group(['as' => 'admin::'], function () {


    Route::group(['middleware' => 'isAdmin'], function () {


      Route::get('dashboard/articles/bulletins', ['as' => 'get.admin.bulletins', 'uses' => function() {
        $ArticleCtrl = new ToInvestCapital\Http\Controllers\ArticleController;
        $articles = $ArticleCtrl->getBulletins();

        return view('admin.weekly_bulletin')->with(compact('articles','accounts', 'menus', 'languages', 'countries'));
      }]);


      Route::post('/article/create', ['as' => 'post.article', 'uses' => 'ArticleController@create']);
      Route::put('dashboard/articles/{slug}/update', ['as' => 'put.article', 'uses' => 'ArticleController@update']);
      Route::get('dashboard/articles/{slug}/update', ['as' => 'update.article', 'uses' => 'ArticleController@getOne']);
      Route::get('dashboard/articles/{slug}/delete', ['as' => 'delete.article', 'uses' => 'ArticleController@delete']);


      Route::get('/dashboard/articles', ['as' => 'admin.articles', 'uses' => 'ArticleController@index']);
      Route::get('/dashboard', ['as' => 'admin.dashboard', 'uses' => 'AdminController@index']);

      Route::post('dashboard/articles/faq/update', ['as' => 'patch.faq', 'uses' => 'FaqController@update']);
      Route::post('dashboard/articles/faq', ['as' => 'post.faq', 'uses' => 'FaqController@create']);
      Route::get('dashboard/articles/faq', ['as' => 'get.faqs', 'uses' => 'FaqController@index']);
      Route::get('dashboard/articles/faq/{id}/delete', ['as' => 'delete.faq', 'uses' => 'FaqController@delete']);

      Route::post('dashboard/addons/create', ['as' => 'post.addons', 'uses' => 'ArticleController@postAddon']);
      Route::get('dashboard/{addons}/{id}/delete', ['as' => 'delete.addons', 'uses' => 'ArticleController@deleteAddon']);

      Route::get('dashboard/articles/documents', ['as' => 'get.documents', 'uses' => 'DocumentController@index']);
      Route::get('dashboard/articles/documents/{id}/delete', ['as' => 'delete.document', 'uses' => 'DocumentController@delete']);
      Route::post('dashboard/articles/documents', ['as' => 'post.documents', 'uses' => 'DocumentController@create']);

      Route::get('dashboard/slides', ['as' => 'get.slides', 'uses' => 'SlideController@index']);
      Route::post('dashboard/slides', ['as' => 'post.slide', 'uses' => 'SlideController@create']);
      Route::get('dashboard/slides/{id}/del', ['as' => 'delete.slide', 'uses' => 'SlideController@delete']);
      

      Route::get('dashboard/articles/videos/{id}/delete', ['as' => 'delete.video', 'uses' => 'VideoController@delete']);
      Route::get('dashboard/articles/videos', ['as' => 'get.videos', 'uses' => 'VideoController@index']);
      Route::post('dashboard/articles/videos', ['as' => 'post.videos', 'uses' => 'VideoController@create']);

    });
  });
  //Route::get('/home', 'HomeController@index');
});
