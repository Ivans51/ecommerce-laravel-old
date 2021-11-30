<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/x-icon">

  <title>Ecommerce</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @stack('styles')
</head>
<body class="font-poppins dark:bg-gray-800">

<header class="bg-white dark:bg-black dark:text-white shadow fixed w-full z-10">
  @yield('sidebar')
</header>

<main class="dark:text-white" style="padding-top: 64px">
  @yield('content')
</main>

<footer class="bg-quartary text-white">
  @yield('footer')
</footer>

<script src="{{ asset('js/app.js') }}"></script>

<script>
  startTheme(true)

  isDarkTheme()

  function onChangeTheme() {
    changeTheme()
  }

  window.addEventListener('resize', function (event) {
    if (event.currentTarget.innerWidth > 1024) {
      if (document.getElementById('menu-collapse').classList.contains('flex')) {
        document.getElementById('menu-collapse').classList.add('hidden')
        document.getElementById('menu-collapse').classList.remove('flex')
      }
    }
  })

  function openMenu() {
    if (document.getElementById('menu-collapse').classList.contains('flex')) {
      document.getElementById('menu-collapse').classList.add('hidden')
      document.getElementById('menu-collapse').classList.remove('flex')
    } else {
      document.getElementById('menu-collapse').classList.add('flex')
      document.getElementById('menu-collapse').classList.remove('hidden')
    }
  }
</script>

@stack('scripts')

</body>
</html>
