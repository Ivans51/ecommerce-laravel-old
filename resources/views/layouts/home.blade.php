@extends('layouts.app')

@section('sidebar')
  <nav class="container mx-auto">
    <div class="flex justify-between items-center px-4 py-1">
      <ul class="flex space-x-4">
        <x-logo></x-logo>
      </ul>

      <ul class="flex items-center space-x-4">
        <x-theme-button></x-theme-button>
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
