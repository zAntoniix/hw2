<html>
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta data="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
    @yield('external')
  </head>
  <body>
    @yield('navbar')
    <header>
      <div id="overlay"></div>
      <h1>
        <strong>@yield('title_page')</strong></br>
      </h1>
    </header>
      
    <section>
      @yield('content')
    </section>

    <footer>
      <p>Antonio Zarbo O46002167</p>
    </footer>
  </body>
</html>