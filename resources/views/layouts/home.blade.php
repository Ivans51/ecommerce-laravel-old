@extends('layouts.app')

@section('sidebar')
  {{--<header class="header">
    <a href="" class="logo">CSS Nav</a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" id="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
    <ul class="menu">
      <li><a href="#work">Our Work</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#careers">Careers</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </header>--}}

  <nav class="container mx-auto">
    <div class="flex justify-start lg:justify-between items-center px-4 py-1">
      <div class="flex-none lg:hidden">
        <label for="my-drawer-3" class="btn btn-square btn-ghost">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               class="inline-block w-6 h-6 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </label>
      </div>

      <ul class="flex space-x-4">
        <x-logo></x-logo>
      </ul>

      <ul class="hidden lg:flex items-center space-x-4">
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

@push('styles')
  <style>
    .header {
      background-color: #fff;
      box-shadow: 1px 1px 4px 0 rgba(0, 0, 0, .1);
      position: fixed;
      width: 100%;
      z-index: 3;
    }

    .header ul {
      margin: 0;
      padding: 0;
      list-style: none;
      overflow: hidden;
      background-color: #fff;
    }

    .header li a {
      display: block;
      padding: 20px 20px;
      border-right: 1px solid #f4f4f4;
      text-decoration: none;
    }

    .header li a:hover,
    .header .menu-btn:hover {
      background-color: #f4f4f4;
    }

    .header .logo {
      display: block;
      font-size: 2em;
      padding: 10px 20px;
      text-decoration: none;
    }

    /* menu */

    .header .menu {
      max-height: 0;
      transition: max-height .2s ease-out;
    }

    /* menu icon */

    .header .menu-icon {
      cursor: pointer;
      display: flex;
      justify-content: flex-end;
      padding: 28px 20px;
      position: relative;
      user-select: none;
    }

    .header .menu-icon .nav-icon {
      background: #333;
      display: block;
      height: 2px;
      position: relative;
      transition: background .2s ease-out;
      width: 18px;
    }

    .header .menu-icon .nav-icon:before,
    .header .menu-icon .nav-icon:after {
      background: #333;
      content: '';
      display: block;
      height: 100%;
      position: absolute;
      transition: all .2s ease-out;
      width: 100%;
    }

    .header .menu-icon .nav-icon:before {
      top: 5px;
    }

    .header .menu-icon .nav-icon:after {
      top: -5px;
    }

    /* menu btn */

    .header .menu-btn {
      display: none;
    }

    .header .menu-btn:checked ~ .menu {
      max-height: 240px;
    }

    .header .menu-btn:checked ~ .menu-icon .nav-icon {
      background: transparent;
    }

    .header .menu-btn:checked ~ .menu-icon .nav-icon:before {
      transform: rotate(-45deg);
    }

    .header .menu-btn:checked ~ .menu-icon .nav-icon:after {
      transform: rotate(45deg);
    }

    .header .menu-btn:checked ~ .menu-icon:not(.steps) .nav-icon:before,
    .header .menu-btn:checked ~ .menu-icon:not(.steps) .nav-icon:after {
      top: 0;
    }

    /* 48em = 768px */

    @media (min-width: 48em) {
      .header li a {
        padding: 20px 30px;
      }

      .header .menu {
        flex-direction: row;
        max-height: none;
      }

      .header .menu-icon {
        display: none;
      }
    }
  </style>
@endpush

@push('scripts')
  <script>
    const target = document.querySelector('#menu-icon')

    document.addEventListener('click', (event) => {
      document.getElementById('menu-btn').checked = !event.composedPath().includes(target)
    })
  </script>
@endpush
