@extends('layouts.app')

@section('main-app')
  <div>
    <header id="mySidenav" class="dark:bg-black sidenav dark:text-white">
      <a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
      <ul class="flex flex-col">
        <li>
          <x-logo></x-logo>
        </li>
        <li class="dark:hover:bg-gray-800 hover:bg-gray-100">
          <a href="{{ route('profile-admin') }}">Profile</a>
        </li>
        <li class="dark:hover:bg-gray-800 hover:bg-gray-100">
          <a href="{{ route('admins.index') }}">Admins</a>
        </li>
        <li class="dark:hover:bg-gray-800 hover:bg-gray-100">
          <a href="{{ route('customers.index') }}">Customers</a>
        </li>
        <li class="dark:hover:bg-gray-800 hover:bg-gray-100">
          <a href="{{ route('products.index') }}">Products</a>
        </li>
        <li class="dark:hover:bg-gray-800 hover:bg-gray-100">
          <a href="{{ route('categories.index') }}">Categories</a>
        </li>
        <li class="dark:hover:bg-gray-800 hover:bg-gray-100">
          <a href="{{ route('config-admin') }}">Config</a>
        </li>
        <li class="dark:hover:bg-gray-800 hover:bg-gray-100">
          <a>
            <div class="cursor-pointer items-center flex space-x-2">
              <label for="dark-theme" class="cursor-pointer">Dark theme</label>
              <input id="dark-theme"
                     type="checkbox"
                     checked="checked"
                     class="toggle toggle-sm bg-gray-400 dark:bg-gray-900"
                     onclick="onChangeTheme()">
            </div>
          </a>
        </li>
        <li class="dark:hover:bg-gray-800 hover:bg-gray-100">
          <a href="{{route('api-logout', \App\Utils\Constants::ADMIN)}}">Logout</a>
        </li>
      </ul>
    </header>

    <div id="main" class="relative h-screen">
      <nav class="w-full dark:bg-black dark:text-white navbar space-x-4" style="min-height: 55px !important;">
        <div class="container mx-auto flex justify-end">
          Page Dashboard
          <button class="btn btn-square btn-ghost inline-block md:hidden" onclick="openNav()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 class="inline-block w-6 h-6 stroke-current">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
      </nav>

      <main style="height: 200px">
        <div class="p-4">
          @yield('content-admin')
        </div>

        @error('message')
        <div class="border px-4 py-2 bg-red-500 text-white mt-2 w-6/12 mx-auto">
          {{ $errors->first('message') }}
        </div>
        @enderror
      </main>

      <footer class="dark:bg-black dark:text-white absolute bottom-0 w-full">
        <div class="divider-shop"></div>
        <div class="container mx-auto flex justify-between px-4 py-4 text-sm">
          <p>©2021 IvansDev</p>
          <p><a class="hover:text-primary" href="{{route('terms')}}">Terms</a></p>
        </div>
      </footer>
    </div>
  </div>
@endsection

@push('styles')
  <style>
    .sidenav a {
      border-bottom: 1px solid rgba(204, 204, 204, 0.2);
      display: block;
      padding: 10px 20px;
      width: 100%;
    }

    .sidenav {
      display: block;
      height: 100vh;
      position: fixed;
      left: 0;
      overflow-x: hidden;
      padding-top: 0;
      top: 0;
      width: 200px;
      z-index: 1;
    }

    .sidenav .close-btn {
      position: absolute;
      top: -5px;
      right: 0;
      font-size: 30px;
      width: auto;
      display: none;
      border-bottom: none;
    }

    #main {
      width: calc(100% - 200px);
      margin-left: 200px;
    }

    @media screen and (max-width: 768px) {
      .sidenav {
        display: none;
        padding-top: 40px;
      }

      .sidenav .close-btn {
        display: inline-block;
      }

      #main {
        width: 100%;
        margin-left: 0;
      }
    }

    @media screen and (max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }
    }
  </style>
@endpush

@push('scripts')
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.display = "block";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.display = "none";
    }
  </script>
@endpush
