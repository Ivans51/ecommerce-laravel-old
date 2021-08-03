@extends('layouts.app')

@section('sidebar')
  <nav class="container mx-auto navbar flex justify-between lg:justify-around">
    <div class="px-2 mx-2">
      <x-logo></x-logo>
    </div>

    <div class="space-x-2 hidden lg:flex items-center">
      <x-theme-button></x-theme-button>
      <a class="cursor-pointer hover:text-primary rounded-btn px-2 py-1">
        Products
      </a>

      <a class="cursor-pointer hover:text-primary rounded-btn px-2 py-1">
        About
      </a>

      <a class="cursor-pointer hover:text-primary rounded-btn px-2 py-1">
        Testimonials
      </a>
    </div>

    <div class="hidden lg:flex space-x-2">
      <img src="{{asset('img/images/Cart.png')}}" alt="ico cart">
      <img src="{{asset('img/images/profile.png')}}" alt="ico profile">
    </div>

    <div class="flex-none lg:hidden">
      <button class="btn btn-square btn-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             class="inline-block w-6 h-6 stroke-current">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
  </nav>
@endsection

@section('content')
  @yield('content-dashboard', 'Hi')

  @error('message')
  <div class="border px-4 py-2 bg-red-500 text-white mt-2 w-6/12 mx-auto">
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
