@extends('layouts.app')

@section('sidebar')
  <nav class="container mx-auto">
    <div class="flex justify-between items-center px-4 py-1">
      <ul class="flex space-x-4">
        <x-logo></x-logo>
      </ul>

      <ul class="flex items-center space-x-4">
        <li>
          <a class="hover:text-primary" href="{{ route('login') }}">
            Login
          </a>
        </li>
        <li>
          <a class="hover:text-primary" href="{{ route('register') }}">
            Register
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
