@extends('layouts.log_sig')

@section('title', 'Signup - Registrati')

@section('script')
<script>
  const BASE_URL ="{{ url('/signup') }}"
</script>
<script src="{{ asset('js/signup.js') }}" defer="true"></script>
@endsection

@section('form')
<section class="signup_form">
  <h1>Signup</h1>
  <span id="error"></span>
  <form name="signup" method="post" action="{{ url('/signup') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="nome">
      <div><label for='nome'>Nome</label></div>
      <div><input type='text' name='nome'></div>
      <span></span>
    </div>
    <div class="cognome">
      <div><label for='cognome'>Cognome</label></div>
      <div><input type='text' name='cognome'></div>
      <span></span>
    </div>
    <div class="username">
      <div><label for='username'>Username</label></div>
      <div><input type='text' name='username'></div>
      <span></span>
    </div>
    <div class="email">
      <div><label for='email'>Email</label></div>
      <div><input type='text' name='email'></div>
      <span></span>
    </div>
    <div class="password">
      <div><label for='password'>Password</label></div>
      <div><input type='password' name='password'></div>
      <span></span>
    </div>
    <div class="conferma_password">
      <div><label for='conferma_password'>Conferma Password</label></div>
      <div><input type='password' name='conferma_password'></div>
      <span></span>
    </div>
    <div class="register">
      <input type='submit' id="submit" value="Registrati">
    </div>
  </form>
  <div class="accesso">Hai già un account? <a href="{{ url('/login') }}">Accedi</a>
</section>
@endsection