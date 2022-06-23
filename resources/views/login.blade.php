@extends('layouts.log_sig')

@section('title', 'Login - Accedi')

@section('script')
<script src="{{ asset('js/login.js') }}" defer="true"></script>
@endsection

@section('form')
<section class="login">
  <h1>Login</h1>

  @if($error === true)
  <span id="error" class="log_error">Username e/o password non corretti, riprova!</span>
  @endif

  <span id="error" class="log_error"></span>
  <form name="login" method="post" action="{{ url('/login') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="username">
      <div><label for='username'>Username</label></div>
      <div><input type='text' name='username'></div>
    </div>
    <div class="password">
      <div><label for='password'>Password</label></div>
      <div><input type='password' name='password'></div>
    </div>
    <div class="access">
      <input type='submit' id="submit" value="Accedi">
    </div>
  </form>
  <div class="registrazione">Non hai un account? <a href="{{ url('/signup') }}">Iscriviti</a>
</section>