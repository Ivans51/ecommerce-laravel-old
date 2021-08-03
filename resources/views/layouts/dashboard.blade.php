@extends('layouts.app')

@section('sidebar')
  <div class="rounded-lg shadow bg-base-200 drawer h-52">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle">
    <div class="flex flex-col drawer-content">
      <div class="w-full navbar bg-base-300">
        <div class="flex-none lg:hidden">
          <label for="my-drawer-3" class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </label>
        </div>
        <div class="flex-1 px-2 mx-2">
        <span>
          Change screen size to show/hide menu
        </span>
        </div>
        <div class="flex-none hidden lg:block">
          <ul class="menu horizontal">
            <li>
              <a class="rounded-btn">Item 1</a>
            </li>
            <li>
              <a class="rounded-btn">Item 2</a>
            </li>
          </ul>
        </div>
      </div>
      <span>Hi</span>
    </div>
    <div class="drawer-side">
      <label for="my-drawer-3" class="drawer-overlay"></label>
      <ul class="p-4 overflow-y-auto menu w-80 bg-base-100">
        <li>
          <a>Item 1</a>
        </li>
        <li>
          <a>Item 2</a>
        </li>
      </ul>
    </div>
  </div>
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

@push('scripts')
  <script>
    function onChangeTheme() {
      changeTheme()
    }
  </script>
@endpush
