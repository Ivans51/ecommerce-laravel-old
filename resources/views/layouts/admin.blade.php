@extends('layouts.app')

@section('sidebar')
  <nav class="container mx-auto navbar flex justify-between lg:grid lg:grid-cols-3">
    <div class="px-2 mx-2">
      <x-logo></x-logo>
    </div>

    <div class="space-x-4 hidden lg:flex justify-self-center">
      <x-theme-button></x-theme-button>
      @foreach($menu as $item)
        <a href="{{ $item['link'] }}" class="cursor-pointer hover:text-primary">
          {{ $item['label'] }}
        </a>
      @endforeach
    </div>

    <div class="hidden lg:flex space-x-4 justify-self-end">
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
    @foreach($menu as $item)
      <a href="{{ $item['link'] }}" class="cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 block px-2 py-1">
        {{ $item['label'] }}
      </a>
    @endforeach

    <a class="cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 block px-2 py-1" href="{{route('api-logout')}}">
      Logout
    </a>
  </div>
@endsection

@section('content')
  @yield('content-admin')

  @error('message')
  <div class="border px-4 py-2 bg-red-500 text-white mt-2 w-6/12 mx-auto">
    {{ $errors->first('message') }}
  </div>
  @enderror
@endsection

@section('footer')
  <div class="container mx-auto flex justify-between px-4 py-4 text-sm">
    <p>©2021 IvansDev</p>
    <p><a class="hover:text-primary" href="{{route('terms')}}">Terms</a></p>
  </div>
@endsection
