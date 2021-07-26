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
        <x-theme-button></x-theme-button>
        <li>
          <a href="{{route('api-logout')}}">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
@endsection

@section('content')
  @yield('content-admin', 'Hi')

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

@push('scripts')
  <script>
    function onChangeTheme() {
      changeTheme()
    }
  </script>
@endpush
