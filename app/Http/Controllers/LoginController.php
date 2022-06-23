<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends BaseController {

  public function login() {
    $error = false;
    if(Session::get('user_id') != null) {
      return redirect("home");
    } else {
      return view('login')->with("error", $error);
    }
  }

  public function checklogin() {
    $error = false;
    $request = request();
    $user = User::where('username', request('username'))->first();
    $password = $request['password'];
    if(!$user) {
      $error = true;
      return view('login')->with("error", $error);
    }
    if(Hash::check($password, $user->password)) {
      Session::put('user_id', $user->id);
      return redirect('home');
    } else {
      $error = true;
      return view('login')->with("error", $error);
    }
  }

  public function logout() {
    Session::flush();
    return redirect('login');
  }
}