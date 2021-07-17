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
        <li class="border rounded bg-white p-1">
          <a class="flex items-center space-x-2 hover:text-blue-800" href="#">
            <img class="object-fill h-6" src="img/buying.png" alt="shop icon">
            <span>0</span>
          </a>
        </li>
        <li>
          <a class="hover:text-blue-800" href="#">
            <img class="object-fill h-8" src="img/game_controller.png" alt="profile icon">
          </a>
        </li>
      </ul>
    </div>
  </nav>
@endsection

@section('content')
  @yield('content-home', 'Hi')
@endsection

@section('footer')
  <footer class="container mx-auto flex justify-between px-4 py-4 text-sm">
    <p>©2021 IvansDev</p>
    <p><a class="hover:text-primary" href="#">Terms</a></p>
  </footer>
@endsection
