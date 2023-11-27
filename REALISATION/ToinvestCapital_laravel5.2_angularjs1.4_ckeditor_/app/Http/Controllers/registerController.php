<?php
// APP_KEY M9kI54HpaNn61ucoqnhgsd5pycbywCJz
namespace ToInvestCapital\Http\Controllers;

use Illuminate\Http\Request;
use ToInvestCapital\User;
use ToInvestCapital\Http\Requests;

class registerController extends Controller
{

  function index() {

    return view('admin.register');
  }

  function create_admin(Request $request) {

    if ($request->isMethod('post')) {

      $this->validate($request, [
        'email' => 'required|unique:users|max:255|email',
        'name' => 'required|max:255',
        'password' => 'required|min:5|max:50|same:password_confirmation',
        'password_confirmation'=>'required|min:5'
        ]);
        $user_info = $request->input();
        $user_info['is_admin'] = 1;
        $user_info['password'] = $this->hash_mdp($user_info['password']);

        $user = User::create($user_info);

        $request->session()->put('user', $user);

        return redirect('/dashboard');

      }else {
        return response('Accés non autorisée', '404');
      }
    }
  }
