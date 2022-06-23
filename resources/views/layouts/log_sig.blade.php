<html>
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel='stylesheet' href="{{ asset('css/login.css') }}">
    @yield('script')
  </head>
  <body>
    @yield('form')
  </body>
</html>