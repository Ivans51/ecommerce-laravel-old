<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/x-icon">

  <title>Ecommerce</title>

  <!-- Fonts -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @stack('styles')
  <script src="{{asset('js/utils.js')}}"></script>
</head>
<body class="font-poppins dark:bg-gray-800">

<header class="bg-white dark:bg-black dark:text-white shadow fixed w-full z-10">
  @yield('sidebar')
</header>

<main class="dark:text-white">
  @yield('content')
</main>

<footer class="bg-quartary text-white">
  @yield('footer')
</footer>

@stack('scripts')

</body>
</html>
