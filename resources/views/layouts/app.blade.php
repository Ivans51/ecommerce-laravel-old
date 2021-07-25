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
  @stack('styles')
  <script src="{{asset('js/utils.js')}}"></script>
</head>
<body class="bg-secondary font-sans dark:bg-gray-800">

<div class="grid grid-rows-3 h-screen grid-rows-home-custom">

  <div class="bg-white dark:bg-black dark:text-white shadow">
    @yield('sidebar')
  </div>

  <main class="container mx-auto bg-gray-50 dark:bg-gray-900 dark:text-white">
    @yield('content')
  </main>

  <div class="bg-white dark:bg-black dark:text-white shadow">
    @yield('footer')
  </div>

  @stack('scripts')
</div>

</body>
</html>
