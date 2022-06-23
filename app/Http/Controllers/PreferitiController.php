<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Preferito;
use Illuminate\Support\Facades\Session;

class PreferitiController extends BaseController {
  public function index() {
    $user_id = Session::get('user_id');
    $user = User::find($user_id);
    if (!isset($user)) {
      return redirect('login');
    } else {
      return view('preferiti')->with('user', $user);
    }
  }

  public function getPrefs() {
    $user_id = Session::get('user_id');
    $user = User::find($user_id);
    return $user->preferiti()->get();
  }

  public function removePrefs() {
    $request = request();
    $musicid = $request->musicid;

    $res = Preferito::where('user_id', session('user_id'))->where('musicid', $musicid);
    $res->delete();
    if($res) {
      $response = array('esito' => true);
    } else {
      $response = array('esito' => false);
    }
    return $response;
  }
}