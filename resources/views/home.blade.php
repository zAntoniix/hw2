@extends('layouts.base')

@section('title', 'Home')

@section('external')
<link rel='stylesheet' href="{{ asset('css/home.css') }}">
<script>
  const BASE_URL="{{ url('/home') }}"
</script>
<script src="{{ asset('js/home.js') }}" defer="true"></script>
@endsection

@section('navbar')
<nav>
  <div id="nome">Recording Studio</div>
    <ul id="links">
      <li><a>{{ 'Benvenuto, '.$user['username'] }}</a></li>
      <li><a href ="{{ url('/ricerca') }}">Ricerca</a></li>
      <li><a href ="{{ url('/preferiti') }}">Preferiti</a></li>
      <li><a href ="{{ url('/playlist') }}">Playlist</a></li>
      <li><a href ="{{ url('/logout') }}">Logout</a></li>
    </ul>
  <div id="menu" onclick="mobileMenu(this)">
    <div></div>
    <div></div>
    <div></div>
    <ul class="links_mobile">
      <li><a>{{ 'Benvenuto, '.$user['username'] }}</a></li>
      <li><a href ="{{ url('/ricerca') }}">Ricerca</a></li>
      <li><a href ="{{ url('/preferiti') }}">Preferiti</a></li>
      <li><a href ="{{ url('/playlist') }}">Playlist</a></li>
      <li><a href ="{{ url('/logout') }}">Logout</a></li>
    </ul>
  </div>
</nav>
@endsection

@section('title_page', 'Registra la tua musica')

@section('content')
<div id="intro">
  <h1>Lo Studio</h1>
  <p>Il nostro studio dispone di tutti gli strumenti all'avanguardia per offrire un servizio di altissima qualità</p>
</div>

<div id="dettagli">
  <!-- <div>
    <img src="images/strumenti.png" />
    <h1>Strumenti</h1>
    <p>Disponiamo di tutti gli strumenti musicali per ogni tipo di necessità e richiesta</p>
  </div>

  <div>
    <img src="images/registrazione.jpg" />
    <h1>Registrazione</h1>
    <p>Usiamo la tecnologia più avanzata per registrare in modo cristallino la vostra musica</p>
  </div>

  <div>
    <img src="images/consulenza.jpg" />
    <h1>Consulenza</h1>
    <p>Ti aiuteremo nella scelta delle opzioni milgiori per valorizzare e migliorare il tuo prodotto</p>
  </div> -->
</div>

<div id=inEvidenza>
  <h1>Brani in evidenza questo mese</h1>
  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
  <div id="inEvidenza-view"></div>
</div>
@endsection