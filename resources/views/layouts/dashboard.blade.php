@extends('layouts.app')

@section('sidebar')
  <nav class="container mx-auto navbar flex justify-between lg:grid lg:grid-cols-3">
    <div class="px-2 mx-2">
      <x-logo></x-logo>
    </div>

    <div class="space-x-4 hidden lg:flex items-center justify-self-center">
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

    <div class="hidden lg:flex space-x-4 justify-self-end">
      <a href="/#" class="ico-menu ico-cart"></a>
      <a class="ico-menu ico-profile" href="{{route('api-logout')}}"></a>
    </div>

    <div class="flex-none lg:hidden" onclick="openMenu()">
      <button class="btn btn-square btn-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             class="inline-block w-6 h-6 stroke-current">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
  </nav>

  <div id="menu-collapse" class="hidden flex-col w-full p-4 absolute dark:bg-gray-900 bg-white z-10 border-t border-b">
    <x-theme-button></x-theme-button>
    <a class="cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 block px-2 py-1">
      Products
    </a>

    <a class="cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 block px-2 py-1">
      About
    </a>

    <a class="cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 block px-2 py-1">
      Testimonials
    </a>

    <a class="cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 block px-2 py-1">
      Shop cart
    </a>

    <a class="cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 block px-2 py-1" href="{{route('api-logout')}}">
      Profile
    </a>
  </div>
@endsection

@section('content')
  @yield('content-dashboard')

  @error('message')
  <div class="border px-4 py-2 bg-red-500 text-white mt-2 w-6/12 mx-auto">
    {{ $errors->first('message') }}
  </div>
  @enderror
@endsection

@section('footer')
  <div class="container mx-auto flex justify-between px-4 py-4 text-sm">
    <p>©2021 IvansDev</p>
    <p><a class="hover:text-primary" href="#">Terms</a></p>
  </div>
@endsection
