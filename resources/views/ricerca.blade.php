@extends('layouts.base')

@section('title', 'Ricerca brani')

@section('external')
<link rel='stylesheet' href="{{ asset('css/ricerca.css') }}">
<script>
  const BASE_URL="{{ url('/ricerca') }}"
</script>
<script src="{{ asset('js/ricerca.js') }}" defer="true"></script>
@endsection

@section('navbar')
<nav>
  <div id="nome">Recording Studio</div>
  <ul id="links">
    <li><a>{{ $user['username'] }}</a></li>
    <li><a href ="{{ url('/home') }}">Home</a></li>
    <li><a href ="{{ url('/preferiti') }}">Preferiti</a></li>
    <li><a href ="{{ url('/playlist') }}">Playlist</a></li>
    <li><a href ="{{ url('/logout') }}">Logout</a></li>
  </ul>
  <div id="menu" onclick="mobileMenu(this)">
    <div></div>
    <div></div>
    <div></div>
    <ul class="links_mobile">
      <li><a>{{ $user['username'] }}</a></li>
      <li><a href ="{{ url('/home') }}">Home</a></li>
      <li><a href ="{{ url('/preferiti') }}">Preferiti</a></li>
      <li><a href ="{{ url('/playlist') }}">Playlist</a></li>
      <li><a href ="{{ url('/logout') }}">Logout</a></li>
    </ul>
  </div>
</nav>
@endsection

@section('title_page', 'Ricerca brani e testi')

@section('content')
<div id="searchbox">
  <form id="spotify">
    Inserisci il titolo della canzone che vuoi cercare
    <input type="text" id="song">
    <input type="submit" id="submit" value="Cerca">
  </form>
  
  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
  <div id="result-view"></div>
  <div id="navigazione">
    <a id="prec" class="hidden">Precedente</a>
    <a id="succ" class="hidden">Successiva</a>
  </div>
</div>
@endsection