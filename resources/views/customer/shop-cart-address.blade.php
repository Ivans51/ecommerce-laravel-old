@extends('layouts.customer')

@section('content-customer')
  <section class="block lg:flex">
    <div class="w-full lg:w-3/6 px-4 sm:px-10 md:px-16 lg:px-32 pt-4 md:pt-10 pb-20">
      <div class="block sm:flex space-x-0 sm:space-x-2">
        <a href="{{route('shop-cart-customer')}}" class="text-primary">Cart</a>
        <img src="{{asset('img/images/arrow-right.svg')}}" alt="arrow icon">
        <a class="font-bold">Details</a>
        <img src="{{asset('img/images/arrow-right.svg')}}" alt="arrow icon">
        <a href="{{route('shop-cart-customer-payment')}}">Shipping</a>
        <img src="{{asset('img/images/arrow-right.svg')}}" alt="arrow icon">
        <a href="{{route('shop-cart-customer-success')}}">Payment</a>
      </div>

      <form action="">
        @csrf
        <div class="mt-6 md:mt-12">
          <h3 class="font-bold text-lg">Contact</h3>
          <div class="mt-2">
            <label>
              <input type="email"
                     placeholder="Email"
                     class="w-full py-2 px-2 text-sm"
                     name="email"
              >
            </label>
            @if ($errors->has('email'))
              <span class="text-red-700">{{ $errors->first('email') }}</span>
            @endif

            <div class="flex items-center mt-1">
              <input
                type="checkbox"
                id="newsletter"
                name="newsletter"
              >
              <label for="newsletter" class="mt-1 ml-2">Add me to Candleaf newsletter for a 10% discount</label>
            </div>
            @if ($errors->has('newsletter'))
              <span class="text-red-700">{{ $errors->first('newsletter') }}</span>
            @endif
          </div>
        </div>

        <div class="mt-12">
          <h3 class="font-bold text-lg">Shipping Address</h3>

          <div class="mt-2 block sm:flex items-center space-x-0 sm:space-x-4 mb-3">
            <label class="w-full">
              <input
                type="text"
                placeholder="Name"
                class="w-full py-2 px-2 text-sm"
                name="name"
              >
              @if ($errors->has('name'))
                <span class="text-red-700">{{ $errors->first('name') }}</span>
              @endif
            </label>

            <label class="w-full block mt-2 sm:mt-0">
              <input
                type="text"
                placeholder="Second Name"
                class="w-full py-2 px-2 text-sm"
                name="last_name"
              >
              @if ($errors->has('last_name'))
                <span class="text-red-700">{{ $errors->first('last_name') }}</span>
              @endif
            </label>
          </div>

          <label class="mb-3 block">
            <input
              type="text"
              placeholder="Address and number"
              class="w-full py-2 px-2 text-sm"
              name="address_number"
            >
            @if ($errors->has('address_number'))
              <span class="text-red-700">{{ $errors->first('address_number') }}</span>
            @endif
          </label>

          <label class="mb-3 block">
            <input
              type="text"
              placeholder="Shipping note (optional)"
              class="w-full py-2 px-2 text-sm"
              name="shipping_note"
            >
            @if ($errors->has('shipping_note'))
              <span class="text-red-700">{{ $errors->first('shipping_note') }}</span>
            @endif
          </label>

          <div class="mt-2 block sm:flex items-center space-x-0 sm:space-x-4 mb-3">
            <label class="w-full">
              <input
                type="text"
                placeholder="City"
                class="w-full py-2 px-2 text-sm"
                name="city"
              >
              @if ($errors->has('city'))
                <span class="text-red-700">{{ $errors->first('city') }}</span>
              @endif
            </label>

            <label class="w-full block mt-2 sm:mt-0 mb-2 sm:mb-0">
              <input
                type="text"
                placeholder="Postal Code"
                class="w-full py-2 px-2 text-sm"
                name="postal_code"
              >
              @if ($errors->has('postal_code'))
                <span class="text-red-700">{{ $errors->first('postal_code') }}</span>
              @endif
            </label>

            <label class="w-full">
              <select name="province" class="w-full py-2 px-2 text-sm">
                <option value="">Select</option>
                <option value="Province">Province</option>
              </select>
              @if ($errors->has('province'))
                <span class="text-red-700">{{ $errors->first('province') }}</span>
              @endif
            </label>
          </div>

          <label class="mb-1 block">
            <select name="country_region" class="w-full py-2 px-2 text-sm">
              <option value="">Country/Region</option>
              <option value="Italy">Italy</option>
            </select>
            @if ($errors->has('country_region'))
              <span class="text-red-700">{{ $errors->first('country_region') }}</span>
            @endif
          </label>

          <div class="flex items-center">
            <input
              type="checkbox"
              id="save_info"
              name="save_info"
            >
            <label for="save_info" class="mt-1 ml-2">Save this informations for a future fast checkout</label>
          </div>
          @if ($errors->has('save_info'))
            <span class="text-red-700">{{ $errors->first('save_info') }}</span>
          @endif
        </div>

        <div class="flex items-center justify-between mt-14">
          <a href="{{route('product-customer')}}" class="text-primary underline">Back to cart</a>
          <button class="btn-custom" style="padding: 5px 40px !important;">
            Go to shipping
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
