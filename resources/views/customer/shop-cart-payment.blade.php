@extends('layouts.customer')

@section('content-customer')
  <section class="block lg:flex">
    <div class="w-full lg:w-3/6 px-4 sm:px-10 md:px-16 lg:px-32 pt-4 md:pt-10 pb-20">
      <div class="block sm:flex space-x-0 sm:space-x-2">
        <a href="{{route('shop-cart-customer')}}" class="text-primary">Cart</a>
        <img src="{{asset('img/images/arrow-right.svg')}}" alt="arrow icon">
        <a href="{{route('shop-cart-customer-address')}}" class="text-primary">Details</a>
        <img src="{{asset('img/images/arrow-right.svg')}}" alt="arrow icon">
        <a class="font-bold">Shipping</a>
        <img src="{{asset('img/images/arrow-right.svg')}}" alt="arrow icon">
        <a href="{{route('shop-cart-customer-success')}}">Payment</a>
      </div>

      <form action="">
        @csrf
        <div class="mt-12">
          <div class="border rounded px-4 py-4 mt-4 text-sm">
            <div class="flex items-start justify-between">
              <span>Contact <strong>joe.spagnuolo@uxbly.com</strong></span>
              <a class="text-primary" href="{{route('profile-customer')}}">Edit</a>
            </div>

            <div class="divider-shop mb-3 mt-3"></div>

            <div class="flex items-start justify-between">
              <span>Ship to <strong>Via Firenze 23, 92023, Campobello di  Licata AG, Italia</strong></span>
              <a class="text-primary" href="{{route('shop-cart-customer-address')}}">Edit</a>
            </div>
          </div>

          @if ($errors->has('billing_address'))
            <span class="text-red-700">{{ $errors->first('billing_address') }}</span>
          @endif
        </div>

        <div class="mt-6 md:mt-12">
          <h3 class="font-bold text-lg">Payment method</h3>

          <div class="border rounded mt-4">
            <div
              class="flex items-center px-4 py-2"
              style="background-image: linear-gradient(to right, rgba(86,178,128,0.2) , rgba(86,178,128,0.4))"
            >
              <img src="{{asset('img/images/credit-card.svg')}}" alt="credit card icon">
              <span class="font-bold text-primary-dark ml-3">Credit Card</span>
            </div>

            <div class="px-4 py-4">
              <div class="mt-2">
                <label>
                  <input
                    type="number"
                    placeholder="Card Number"
                    class="w-full py-2 px-2 text-sm"
                    name="card_number"
                  >
                </label>
                @if ($errors->has('card_number'))
                  <span class="text-red-700">{{ $errors->first('card_number') }}</span>
                @endif
              </div>

              <div class="mt-2">
                <label>
                  <input
                    type="text"
                    placeholder="Holder Name"
                    class="w-full py-2 px-2 text-sm"
                    name="holder_name"
                  >
                </label>
                @if ($errors->has('holder_name'))
                  <span class="text-red-700">{{ $errors->first('holder_name') }}</span>
                @endif
              </div>

              <div class="mt-2 block sm:flex items-center space-x-0 sm:space-x-4 mb-3">
                <label class="w-full">
                  <input
                    type="date"
                    placeholder="Expiration (MM/YY)"
                    class="w-full py-2 px-2 text-sm"
                    name="expiration"
                  >
                  @if ($errors->has('expiration'))
                    <span class="text-red-700">{{ $errors->first('expiration') }}</span>
                  @endif
                </label>

                <label class="w-full block mt-2 sm:mt-0">
                  <input
                    type="text"
                    placeholder="CVV"
                    class="w-full py-2 px-2 text-sm"
                    name="cvv"
                  >
                  @if ($errors->has('cvv'))
                    <span class="text-red-700">{{ $errors->first('cvv') }}</span>
                  @endif
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-12">
          <h3 class="font-bold text-lg">Billing address</h3>

          <div class="border rounded px-4 py-4 mt-4">
            <div class="flex items-center">
              <input id="billing_same" type="radio" class="mr-4 py-2 px-2 text-sm" name="billing_address">
              <label for="billing_same">Same as the shipping address</label>
            </div>

            <div class="divider-shop mb-3 mt-3"></div>

            <div class="flex items-center">
              <input id="billing_address" type="radio" class="mr-4 py-2 px-2 text-sm" name="shipping_note">
              <label for="billing_address">Use a different address for billing</label>
            </div>
          </div>

          @if ($errors->has('billing_address'))
            <span class="text-red-700">{{ $errors->first('billing_address') }}</span>
          @endif
        </div>

        <div class="flex items-center justify-between mt-14">
          <a href="{{route('shop-cart-customer-address')}}" class="text-primary underline">Back to shipping</a>
          <button class="btn-custom" style="padding: 5px 40px !important;">
            Pay now
          </button>
        </div>
      </form>
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
