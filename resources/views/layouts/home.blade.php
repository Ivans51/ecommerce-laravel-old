@extends('layouts.app')

@section('sidebar')
  <nav class="container mx-auto navbar flex justify-between lg:justify-around">
    <div class="px-2 mx-2">
      <x-logo></x-logo>
    </div>

    <div class="space-x-2 hidden lg:flex items-center">
      <x-theme-button></x-theme-button>
      <a class="cursor-pointer hover:text-primary px-2 py-1">
        Products
      </a>

      <a class="cursor-pointer hover:text-primary px-2 py-1">
        About
      </a>

      <a class="cursor-pointer hover:text-primary px-2 py-1">
        Testimonials
      </a>
    </div>

    @if(Auth::check())
      <div class="hidden lg:flex space-x-2">
        <img src="{{asset('img/images/cart.png')}}" alt="ico cart">
        <img src="{{asset('img/images/profile.png')}}" alt="ico profile">
      </div>
    @else
      <div class="hidden lg:flex space-x-2">
        <a class="hover:text-primary" href="{{ route('login') }}">
          Login
        </a>
        <a class="hover:text-primary" href="{{ route('register') }}">
          Register
        </a>
      </div>
    @endif

    <div class="flex-none lg:hidden" onclick="openMenu()">
      <button class="btn btn-square btn-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             class="inline-block w-6 h-6 stroke-current">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
  </nav>

  <div id="menu-collapse" class="hidden flex-col w-full p-4 absolute dark:bg-gray-900 bg-white z-10 border-t">
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
  </div>
@endsection

@section('content')
  @yield('content-home', 'Hi')

  @error('message')
  <div class="border px-4 py-2 bg-red-500 text-white mt-2 w-6/12 mx-auto">
    {{ $errors->first('message') }}
  </div>
  @enderror
@endsection

@section('footer')
  <div class="container mx-auto pb-4 pt-14">
    <div class="bg-white" style="height: 1px"></div>

    <div class="flex justify-between flex-col md:flex-row py-4 text-xs">
      <div class="w-2/5">
        <img src="{{asset('img/images/logo-footer.png')}}" alt="logo footer">
        <p>Your natural candle made for your home and for your wellness.</p>
        <p>©2021 IvansDev</p>
      </div>

      <div class="flex space-x-6 mt-4 leading-8">
        <div>
          <p><a class="hover:text-primary" href="#">Products</a></p>
          <p><a class="hover:text-primary" href="{{route('login')}}">Login</a></p>
          <p><a class="hover:text-primary" href="{{route('register')}}">Register</a></p>
        </div>
        <p><a class="hover:text-primary" href="#">About</a></p>
        <p><a class="hover:text-primary" href="#">Terms</a></p>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
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
@endpush
