<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;

class SignupController extends BaseController {

  public function signup() {
    $request = request();

    if($this->checkCampi($request) === 0) {
      $user = new User;
      $user->nome = $request['nome'];
      $user->cognome = $request['cognome'];
      $user->username = $request['username'];
      $user->email = $request['email'];
      $user->password = password_hash($request['password'], PASSWORD_BCRYPT);

      $user->save();
      if($user) {
        Session::put('user_id', $user->id);
        return redirect('home');
      }
    } else {
      return redirect('signup');
    }
  }

  public function checkUsername($username) {
    $esiste = User::where('username', $username)->exists();
    if($esiste) {
      $response = array('esiste' => true);
    } else {
      $response = array('esiste' => false);
    }
    return $response;
  }

  public function checkEmail($email) {
    $esiste = User::where('email', $email)->exists();
    if($esiste) {
      $response = array('esiste' => true);
    } else {
      $response = array('esiste' => false);
    }
    return $response;
  }

  private function checkCampi($form) {
    $errori = array();

    if(!preg_match('/^[a-zA-Z0-9_]{1,8}$/', $form['username'])) {
      $errori[] = "Username inserito non valido!";
    } else {
      $username = User::where('username', $form['username'])->first();
      if ($username !== null) {
        $errori[] = "Username già usato, inserisci un altro username!";
      }
    }

    if(strlen($form['password']) < 8) {
      $errori[] = "Password troppo corta! (min 8 caratteri)";
    }

    if(strcmp($form['password'], $form['conferma_password']) != 0) {
      $errori[] = "Le password non sono uguali, riprova!";
    }

    if(!filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
      $errori[] = "Email non corretta!";
    } else {
      $email = User::where('email', $form['email'])->first();
      if($email !== null) {
        $errori[] = "Email già usata";
      }
    }
    return count($errori);
  }

  public function index() {
    return view('signup');
  }
}
?>