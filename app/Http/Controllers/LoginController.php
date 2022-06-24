<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Playlist;
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

      $playlist = Playlist::where('user_id', $user->id)->first();
      Session::put('playlist_id', $playlist->_id);
      
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