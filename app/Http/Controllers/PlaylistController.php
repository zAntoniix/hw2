<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Support\Facades\Session;

class PlaylistController extends BaseController {
  public function index() {
    $user_id = Session::get('user_id');
    $user = User::find($user_id);
    if (!isset($user)) {
      return redirect('login');
    } else {
      return view('playlist')->with('user', $user);
    }
  }

  public function getPlaylist() {
    $user = Session::get('user_id');
    $playlist = Playlist::where('user_id', $user)->get();
    return $playlist;
  }

  public function addSong() {
    $request = request();

    $esito = new Playlist;
    $esito->user_id = Session::get('user_id');
    $esito->musicid = $request->id;
    $esito->img = $request->img;
    $esito->titolo = $request->title;
    $esito->artista = $request->artist;

    $esito->save();
    if($esito) {
      $response = array('esito' => true);
    } else {
      $response = array('esito' => false);
    }
    return $response;
  }

  public function removeSong() {
    $request = request();
    $musicid = $request->musicid;

    $res = Playlist::where('user_id', session('user_id'))->where('musicid', $musicid);
    $res->delete();
    if($res) {
      $response = array('esito' => true);
    } else {
      $response = array('esito' => false);
    }
    return $response;
  }
}