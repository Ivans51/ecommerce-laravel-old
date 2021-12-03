@extends('layouts.customer')

@section('content-customer')
  <section class="relative xl:container mx-auto" style="
      background: url('{{asset('img/images/bg-image.png')}}') no-repeat;
      background-size: cover;
      padding: 150px 0;
    ">

    <div class="relative bg-white opacity-75
                blur-3xl p-8 w-11/12 md:w-3/6 sm:w-8/12 mx-auto flex items-center flex-col"
         style="top: 58%">
      <img class="w-3/5" src="{{asset('img/images/hero-title.png')}}" alt="hero title">

      <p class="text-center mt-5 text-lg text-black">
        All handmade with natural soy wax, Candleaf is a companion for all your pleasure moments
      </p>

      <button class="bg-primary hover:bg-primary-light transition text-white rounded px-8 py-1 mt-10 text-xl">
        Discover our collection
      </button>
    </div>
  </section>

  <section class="my-20 container mx-auto px-5 sm:px-0">
    <div class="text-center">
      <h2 class="text-4xl font-bold mb-2">Products</h2>
      <p class="text-lg">Order it for you or for your beloved ones </p>
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
  </section>

  <section class="bg-tertiary dark:bg-gray-900 py-20 px-5 sm:px-0">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
      <div>
        <h2 class="text-4xl font-bold mb-2">Clean and fragrant soy wax</h2>
        <p class="text-primary">Made for your home and for your wellness</p>
        <ul class="mt-10 leading-9 font-bold">
          <li>
            <img class="inline-block mr-1" src="{{asset('img/images/checkmark-circle-outline.png')}}" alt="list icon">
            Eco-sustainable:All recyclable materials, 0% CO2 emissions
          </li>
          <li>
            <img class="inline-block mr-1" src="{{asset('img/images/checkmark-circle-outline.png')}}" alt="list icon">
            Hyphoallergenic: 100% natural, human friendly ingredients
          </li>
          <li>
            <img class="inline-block mr-1" src="{{asset('img/images/checkmark-circle-outline.png')}}" alt="list icon">
            Handmade: All candles are craftly made with love.
          </li>
          <li>
            <img class="inline-block mr-1" src="{{asset('img/images/checkmark-circle-outline.png')}}" alt="list icon">
            Long burning: No more waste. Created for last long.
          </li>
        </ul>
        <button class="bg-primary hover:bg-primary-light transition text-white rounded px-8 py-1 mt-10 text-xl">
          Learn more
        </button>
      </div>
      <div class="bg-white shadow-2xl my-5 md:my-10">
        <img class="" src="{{asset('img/images/mockups.png')}}" alt="mockups">
      </div>
    </div>
  </section>

  <section class="bg-primary-100 py-14 px-5 sm:px-0">
    <div class="container mx-auto text-center">
      <h2 class="text-4xl font-bold mb-2">Testimonials</h2>
      <p class="text-lg">Some quotes from our happy customers</p>

      <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="shadow bg-white dark:bg-gray-900 rounded">
          <div class="flex flex-col items-center">
            <img src="{{asset('img/images/img.png')}}" alt="profile client">
            <img class="w-5/12" src="{{asset('img/images/stars.png')}}" alt="stars">
          </div>
          <div class="text-center py-5 px-6">
            <p class="font-bold text-xl">“I love it! No more air fresheners”</p>
            <p class="text-lg mt-1">Luisa</p>
          </div>
        </div>

        <div class="shadow bg-white dark:bg-gray-900 rounded">
          <div class="flex flex-col items-center">
            <img src="{{asset('img/images/img-2.png')}}" alt="profile client">
            <img class="w-5/12" src="{{asset('img/images/stars.png')}}" alt="stars">
          </div>
          <div class="text-center py-5 px-6">
            <p class="font-bold text-xl">“Recommended for everyone”</p>
            <p class="text-lg mt-1">Eduardo</p>
          </div>
        </div>

        <div class="shadow bg-white dark:bg-gray-900 rounded">
          <div class="flex flex-col items-center">
            <img src="{{asset('img/images/img-3.png')}}" alt="profile client">
            <img class="w-5/12" src="{{asset('img/images/stars.png')}}" alt="stars">
          </div>
          <div class="text-center py-5 px-6">
            <p class="font-bold text-xl">“Looks very natural, the smell is awesome”</p>
            <p class="text-lg mt-1">Mari</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="my-20 container mx-auto px-5 sm:px-0">
    <div class="text-center">
      <h2 class="text-4xl font-bold mb-2">Popular</h2>
      <p class="text-lg">Our top selling product that you may like</p>
    </div>

    <div class="my-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
    </div>
  </section>
@endsection
