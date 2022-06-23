@extends('layouts.base')

@section('title', 'Mia playlist')

@section('external')
<link rel='stylesheet' href="{{ asset('css/playlist.css') }}">
<script>
  const BASE_URL="{{ url('/playlist') }}"
</script>
<script src="{{ asset('js/playlist.js') }}" defer="true"></script>
@endsection

@section('navbar')
<nav>
  <div id="nome">Recording Studio</div>
  <ul id="links">
    <li><a>{{ $user['username'] }}</a></li>
    <li><a href ="{{ url('/home') }}">Home</a></li>
    <li><a href ="{{ url('/ricerca') }}">Ricerca</a></li>
    <li><a href ="{{ url('/preferiti') }}">Preferiti</a></li>
    <li><a href ="{{ url('/logout') }}">Logout</a></li>
  </ul>
  <div id="menu" onclick="mobileMenu(this)">
    <div></div>
    <div></div>
    <div></div>
    <ul class="links_mobile">
      <li><a>{{ $user['username'] }}</a></li>
      <li><a href ="{{ url('/home') }}">Home</a></li>
      <li><a href ="{{ url('/ricerca') }}">Ricerca</a></li>
      <li><a href ="{{ url('/preferiti') }}">Preferiti</a></li>
      <li><a href ="{{ url('/logout') }}">Logout</a></li>
    </ul>
  </div>
</nav>
@endsection

@section('title_page', 'La tua playlist')

@section('content')
<div id="playlist">
  <h1>Ecco i brani della tua playlist</h1>
  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
  <div id="playlist-view"></div>
</div>
@endsection