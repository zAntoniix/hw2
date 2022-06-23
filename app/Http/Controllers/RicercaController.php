<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Preferito;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class RicercaController extends BaseController {
  public function index() {
    $user_id = Session::get('user_id');
    $user = User::find($user_id);
    if (!isset($user)) {
      return redirect('login');
    } else {
      return view('ricerca')->with('user', $user);
    }
  }

  public function cerca() {
    $request = request();
    $q = urlencode($request->q);

    // Richiesta token
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_POST, 1);
    curl_setopt($c, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
    curl_setopt($c, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode(env('CLIENT_ID').':'.env('CLIENT_SECRET'))));
    $res = curl_exec($c);
    $tokenSpotify = json_decode($res, true);
    curl_close($c);

    //Ricerca brano
    $endpoint = 'https://api.spotify.com/v1/search?type=track&q='.$q;
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $endpoint);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$tokenSpotify['access_token']));
    $result = curl_exec($c);
    $json = json_decode($result, true);
    curl_close($c);

    for($i=0;$i < count($json['tracks']['items']);$i++) {
      $id = $json['tracks']['items'][$i]['id'];
      $userid = Session::get('user_id');

      $query = Preferito::where('user_id', $userid)->where('musicid', $id)->first();
      if($query) {
        $p = true;
      } else {
        $p = false;
      }

      $playlist = Playlist::where('user_id', $userid)->where('musicid', $id)->first();
      if($playlist) {
        $pl = true;
      } else {
        $pl = false;
      }
     
      $nome = $json['tracks']['items'][$i]['name'];
      $artista = $json['tracks']['items'][$i]['artists']['0']['name'];
      $album_img = $json['tracks']['items'][$i]['album']['images']['1'];
    
      $tracce[] = array("titolo" => $nome, "artista" => $artista, "img" => $album_img, "id" => $id, "preferito" => $p, "playlist" => $pl);
    }

    $jsonfinale = array("tracks" => $tracce, "next" => $json['tracks']['next'], "previous" => $json['tracks']['previous']);
    return $jsonfinale;
  }

  public function prevNext() {
    $request = request();
    $url = $request->url;

    // Richiesta token
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_POST, 1);
    curl_setopt($c, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
    curl_setopt($c, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode(env('CLIENT_ID').':'.env('CLIENT_SECRET'))));
    $res = curl_exec($c);
    $tokenSpotify = json_decode($res, true);
    curl_close($c);

    //Ricerca brano
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$tokenSpotify['access_token']));
    $result = curl_exec($c);
    $json = json_decode($result, true);
    curl_close($c);

    for($i=0;$i < count($json['tracks']['items']);$i++) {
      $id = $json['tracks']['items'][$i]['id'];
      $userid = Session::get('user_id');

      $query = Preferito::where('user_id', $userid)->where('musicid', $id)->first();
      if($query) {
        $p = true;
      } else {
        $p = false;
      }

      $playlist = Playlist::where('user_id', $userid)->where('musicid', $id)->first();
      if($playlist) {
        $pl = true;
      } else {
        $pl = false;
      }

      $nome = $json['tracks']['items'][$i]['name'];
      $artista = $json['tracks']['items'][$i]['artists']['0']['name'];
      $album_img = $json['tracks']['items'][$i]['album']['images']['1'];
    
      $tracce[] = array("titolo" => $nome, "artista" => $artista, "img" => $album_img, "id" => $id, "preferito" => $p, "playlist" => $pl);
    }

    $jsonfinale = array("tracks" => $tracce, "next" => $json['tracks']['next'], "previous" => $json['tracks']['previous']);
    return $jsonfinale;
  }

  public function addPref() {
    $request = request();

    $esito = new Preferito;
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
}