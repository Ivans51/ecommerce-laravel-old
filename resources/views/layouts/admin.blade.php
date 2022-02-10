@extends('layouts.app')

@section('main-app')
  <div>
    <header id="mySidenav" class="bg-gray-custom-dark sidenav text-white px-4">
      <a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
      <ul class="links flex flex-col">
        <li>
          <x-logo></x-logo>
        </li>
        <li class="hover:bg-gray-custom-light">
          <a href="{{ route('admins.index') }}">Admins</a>
        </li>
        <li class="hover:bg-gray-custom-light">
          <a href="{{ route('customers.index') }}">Customers</a>
        </li>
        <li class="hover:bg-gray-custom-light">
          <a href="{{ route('products.index') }}">Products</a>
        </li>
        <li class="hover:bg-gray-custom-light">
          <a href="{{ route('categories.index') }}">Categories</a>
        </li>
        <li class="hover:bg-gray-custom-light">
          <a href="{{ route('config-admin') }}">Config</a>
        </li>
        <li class="hover:bg-gray-custom-light">
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
      </ul>

      <ul id="logout-content" class="mb-6 space-y-2">
        <li>
          <h5 class="text-gray-500">Profile</h5>
          <a class="flex items-center space-x-2" href="{{ route('profile-admin') }}">
            <img
              class="w-14 h-14"
              style="border-radius: 50%"
              src="{{asset('img/images/img.png')}}"
              alt="image profile"
            >
            <div>
              <h5>Admin</h5>
            </div>
          </a>
        </li>
        <li class="rounded-2xl bg-gray-custom-light px-4 py-2">
          <a class="" href="{{route('api-logout', \App\Utils\Constants::ADMIN)}}">Logout</a>
        </li>
      </ul>
    </header>

    <div id="main" class="relative">
      <nav class="w-full dark:bg-gray-custom-dark dark:text-white space-x-4">
        <div class="container mx-auto flex justify-end items-center">
          Page Dashboard
          <button class="btn btn-square btn-ghost inline-block md:hidden ml-3" onclick="openNav()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 class="inline-block w-6 h-6 stroke-current">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
      </nav>

      <main style="min-height: calc(100vh - 55px)">
        <div class="p-4">
          @yield('content-admin')
        </div>

        @error('message')
        <div class="border px-4 py-2 bg-red-500 text-white mt-2 w-6/12 mx-auto">
          {{ $errors->first('message') }}
        </div>
        @enderror
      </main>

      <footer class="dark:bg-gray-custom-dark dark:text-white absolute bottom-0 w-full">
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
    nav {
      align-items: center;
      border-bottom: 1px solid rgba(204, 204, 204, 0.2);
      display: flex;
      justify-content: flex-end;
      height: 55px;
      padding: 10px 20px;
    }

    .sidenav {
      display: flex;
      flex-direction: column;
      height: 100vh;
      justify-content: space-between;
      position: fixed;
      left: 0;
      overflow-x: hidden;
      padding-top: 0;
      top: 0;
      width: 200px;
      z-index: 1;
    }

    .sidenav .links li {
      border-radius: 5px;
    }

    .sidenav .links a {
      border-bottom: 1px solid #272730;
      display: block;
      padding: 10px 20px;
      width: 100%;
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

    footer {
      border-top: 1px solid rgba(204, 204, 204, 0.2);
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
      document.getElementById("mySidenav").style.display = "flex";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.display = "none";
    }
  </script>
@endpush
