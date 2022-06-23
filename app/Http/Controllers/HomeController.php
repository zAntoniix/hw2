<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Content;
use App\Models\Evidenza;
use App\Models\Preferito;
use App\Models\Playlist;
use Illuminate\Support\Facades\Session;

class HomeController extends BaseController {
  
  public function index() {
    $user_id = Session::get('user_id');
    $user = User::find($user_id);
    if (!isset($user)) {
      return redirect('login');
    } else {
      return view('home')->with('user', $user);
    }
  }

  public function getContents() {
    return Content::all();
  }

  public function getEvidenza() {
    $risultato = Evidenza::all();

    foreach($risultato as $result) {
      $id = $result['musicid'];

      $res = Preferito::where('user_id', session('user_id'))->where('musicid', $id)->exists();
      if($res) {
        $p = true;
      } else {
        $p = false;
      }

      $playlist = Playlist::where('user_id', session('user_id'))->where('musicid', $id)->first();
      if($playlist) {
        $pl = true;
      } else {
        $pl = false;
      }
  
      $titolo = $result['titolo'];
      $artista = $result['artista'];
      $img = $result['img'];
      
      $json[] = array("titolo" => $titolo, "artista" => $artista, "img" => $img, "musicid" => $id, "preferito" => $p, "playlist" => $pl);
    }
    return $json;
  }
}