@extends('layouts.customer')

@section('content-customer')
  <section class="block lg:flex">
    <div class="w-full lg:w-3/6 px-4 sm:px-10 md:px-16 lg:px-32 pt-4 md:pt-10 pb-20">
      <div class="block sm:flex space-x-0 sm:space-x-2">
        <a class="text-primary">Cart</a>
        <img src="{{asset('img/images/arrow-right.svg')}}" alt="arrow icon">
        <a class="text-primary">Details</a>
        <img src="{{asset('img/images/arrow-right.svg')}}" alt="arrow icon">
        <a class="text-primary">Shipping</a>
        <img src="{{asset('img/images/arrow-right.svg')}}" alt="arrow icon">
        <a class="font-bold">Payment</a>
      </div>

      <div class="text-center flex flex-col items-center">
        <img class="w-20 mt-10 mb-3" src="{{asset('img/images/check-circle.svg')}}" alt="check circle icon">
        <h3 class="font-bold text-2xl">Payment Confirmed</h3>
        <p class="text-sm text-primary mt-2 mb-4">ORDER #2039</p>
        <p class="text-sm">
          Thank you Joe for buying Candleaf. The nature is grateful to you. Now that your order is confirmed it will
          be ready to ship in 2 days. Please check your inbox in the future for your order updates.
        </p>

        <a href="{{route('products-customer')}}" class="btn-custom mt-10 mb-6" style="padding: 5px 40px !important;">
          Back to shopping
        </a>
        <span class="cursor-pointer text-primary underline">Print receipt</span>
      </div>
    </div>

    <div class="w-full lg:w-3/6 px-4 sm:px-10 md:px-16 lg:px-20 py-10 bg-quartary-light dark:bg-gray-700">
      <div class="flex space-x-16 items-start">
        <div class="bg-tertiary relative">
          <span
            class="bg-primary text-white absolute flex justify-center items-center rounded-full text-sm"
            style="
              top: -10px;
              right: -6px;
              height: 20px;
              width: 20px;"
          >
            1
          </span>
          <img class="w-40" src="{{asset('img/images/image-1.png')}}" alt="image product">
        </div>
        <div>
          <p class="mb-5">Spiced Mint Candleaf®</p>
          <a href="/#" class="font-bold text-xl text-primary">$ 9.99</a>
        </div>
      </div>
      <div class="divider-shop mt-14"></div>

      <div class="block sm:flex items-center mt-6 space-x-0 sm:space-x-4">
        <label class="w-full block">
          <input type="text"
                 placeholder="Coupon code"
                 class="w-full py-2 px-2 text-sm"
                 name="coupon_code"
          >
          @if ($errors->has('coupon_code'))
            <span class="text-red-700">{{ $errors->first('coupon_code') }}</span>
          @endif
        </label>

        <button
          class=" whitespace-nowrap mt-2 sm:mt-0 px-10 py-2 text-white bg-tertiary-light dark:bg-gray-900 rounded w-full sm:w-auto">
          Add code
        </button>
      </div>
      <div class="divider-shop mt-6"></div>

      <div class="flex items-center justify-between text-sm mt-4 mb-2">
        <span>Subtotal</span>
        <span class="font-bold">$  9.99</span>
      </div>
      <div class="flex items-center justify-between text-sm">
        <span>Shipping</span>
        <span>Calculated at the next step</span>
      </div>
      <div class="divider-shop mt-6"></div>

      <div class="flex items-center justify-between mt-2">
        <span class="text-sm">Total</span>
        <span class="text-2xl font-bold">$ 9.99</span>
      </div>
    </div>
  </section>
@endsection
