<?php
// APP_KEY M9kI54HpaNn61ucoqnhgsd5pycbywCJz
namespace ToInvestCapital\Http\Controllers;

use Illuminate\Http\Request;
use ToInvestCapital\Http\Requests;
use ToInvestCapital\User;

class loginController extends Controller {

  //
  private $redirect_to = '/dashboard';

  function index() {

    return view('admin.login');
  }

  function auth(Request $request) {

    if ($request->isMethod('post')) {

      $this->validate($request, [
        'email' => 'required|exists:users|max:255|email',
        'password' => 'required|min:5|max:50',

      ]);
      $credentials = $request->input();
      $user = User::where('email', $credentials['email'])
      ->where('password', $this->hash_mdp($credentials['password']))
      ->where('is_admin', 1)
      ->firstorfail();
      if(empty($user)) redirect()->back();

      $request->session()->put('user', $user);

      return redirect(url($this->redirect_to));

    }else {
      return response('Accés non autorisée', '404');
    }

  }

  public function logout(Request $request)
  {
    //$request->session()->forget('key');
    $request->session()->flush();
    return redirect('/');
  }

}
