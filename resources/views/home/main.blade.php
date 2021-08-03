@extends('layouts.home')

@section('content-home')
  <div class="my-10 relative">
    <h1
      class="text-3xl w-full text-white font-bold text-center absolute bottom-10 font-roboto">
      Ecommerce - Page of test
    </h1>
    <p
      class="w-full text-white text-center absolute bottom-1 mt-5">
      Log in, Please
    </p>
    <img src="{{asset('img/old/home.jpg')}}" alt="image home">
  </div>
@endsection
