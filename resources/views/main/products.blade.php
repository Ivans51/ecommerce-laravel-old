@extends('layouts.main')

@section('content-home')
  <section class="my-6 container mx-auto px-5 sm:px-0">
    <div class="text-center">
      <h2 class="text-4xl font-bold mb-2">Products</h2>
      <p class="text-lg">Order it for you or for your beloved ones </p>

      <div class="divider-ecommerce"></div>

      <form class="flex justify-center items-end mt-4 mb-10" method="post" action="{{ route('api-login') }}">
        @csrf
        <div class="form-control">
          <label>Search
            <input type="text" class="input input-bordered input-sm px-4 py-3 w-full" name="search">
          </label>
          @if ($errors->has('search'))
            <span class="text-red-700">{{ $errors->first('search') }}</span>
          @endif
        </div>
        <button class="btn-custom ml-2">
          GO
        </button>
      </form>
    </div>

    <div class="my-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
    </div>

    <div id="navigation">
      <div class="flex-1 flex justify-between sm:hidden">
        <a href="#"
           class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
          Previous
        </a>
        <a href="#"
           class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
          Next
        </a>
      </div>

      <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
          <p class="text-sm text-gray-700 dark:text-white">
            Showing
            <span class="font-medium">1</span>
            to
            <span class="font-medium">10</span>
            of
            <span class="font-medium">97</span>
            results
          </p>
        </div>
        <div>
          <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            <a href="#" class="navigation-arrow rounded-l-md">
              <span class="sr-only">Previous</span>
              <svg class="h-5 w-5"
                   xmlns="http://www.w3.org/2000/svg"
                   viewBox="0 0 20 20"
                   fill="currentColor"
                   aria-hidden="true"
              >
                <path fill-rule="evenodd"
                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                      clip-rule="evenodd"
                />
              </svg>
            </a>
            <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 navigation-item">
              1
            </a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 navigation-item">
              2
            </a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 navigation-item">
              3
            </a>
            <span
              class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
              ...
            </span>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 navigation-item">
              8
            </a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 navigation-item">
              9
            </a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 navigation-item">
              10
            </a>
            <a href="#" class="navigation-arrow rounded-r-md">
              <span class="sr-only">Next</span>
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                   aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                      clip-rule="evenodd" />
              </svg>
            </a>
          </nav>
        </div>
      </div>
    </div>
  </section>
@endsection
