@extends('layouts.app')

@section('sidebar')
  <nav class="container mx-auto">
    <div class="flex justify-between items-center px-4 py-4">
      <ul class="flex space-x-4">
        <li>
          <a class="hover:text-blue-800" href="#">Products</a>
        </li>
      </ul>

      <ul class="flex items-center space-x-4">
        <x-theme-button></x-theme-button>
        <li class="border rounded bg-white p-1 dark:bg-gray-900 dark:border-transparent">
          <a class="flex items-center space-x-2 hover:text-blue-800" href="#">
            <img class="object-fill h-6" src="{{asset('img/buying.png')}}" alt="shop icon">
            <span>0</span>
          </a>
        </li>
        <li>
          <a class="hover:text-blue-800" href="#">
            <img class="object-fill h-8" src="{{asset('img/game_controller.png')}}" alt="profile icon">
          </a>
        </li>
        <li>
          <a href="{{route('api-logout')}}">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
@endsection

@section('content')
  @yield('content-dashboard', 'Hi')

  @error('message')
  <div class="border px-4 py-2 bg-red-500 text-white mt-2">
    {{ $errors->first('message') }}
  </div>
  @enderror
@endsection

@section('footer')
  <footer class="container mx-auto flex justify-between px-4 py-4 text-sm">
    <p>©2021 IvansDev</p>
    <p><a class="hover:text-primary" href="#">Terms</a></p>
  </footer>
@endsection

@push('scripts')
  <script>
    function onChangeTheme() {
      changeTheme()
    }
  </script>
@endpush
