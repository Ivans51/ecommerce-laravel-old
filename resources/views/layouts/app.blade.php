<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <title>Ecommerce</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-secondary">
<div class="grid grid-rows-3 h-screen grid-rows-home-custom">
  <div class="bg-white shadow">
    @yield('sidebar')
  </div>

  <main class="container mx-auto bg-gray-50">
    @yield('content')
  </main>

  <div class="bg-white shadow">
    @yield('footer')
  </div>
</div>
@if (getenv('APP_ENV') === 'local')
  <script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.18.6'><\/script>".replace("HOST", location.hostname))
    //]]>
  </script>
@endif
</body>
</html>
