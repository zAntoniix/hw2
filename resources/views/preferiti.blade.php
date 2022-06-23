@extends('layouts.base')

@section('title', 'Preferiti')

@section('external')
<link rel='stylesheet' href="{{ asset('css/preferiti.css') }}">
<script>
  const BASE_URL="{{ url('/preferiti') }}"
</script>
<script src="{{ asset('js/preferiti.js') }}" defer="true"></script>
@endsection

@section('navbar')
<nav>
  <div id="nome">Recording Studio</div>
  <ul id="links">
    <li><a>{{ $user['username'] }}</a></li>
    <li><a href ="{{ url('/home') }}">Home</a></li>
    <li><a href ="{{ url('/ricerca') }}">Ricerca</a></li>
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
      <li><a href ="{{ url('/ricerca') }}">Ricerca</a></li>
      <li><a href ="{{ url('/playlist') }}">Playlist</a></li>
      <li><a href ="{{ url('/logout') }}">Logout</a></li>
    </ul>
  </div>
</nav>
@endsection

@section('title_page', 'Brani preferiti')

@section('content')
<div id="preferiti">
  <h1>Ecco i tuoi brani preferiti</h1>
  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
  <div id="preferiti-view"></div>
</div>
@endsection