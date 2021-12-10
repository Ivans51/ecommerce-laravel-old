@extends('layouts.customer')

@section('content-customer')
  <section class="py-6 sm:py-10 px-6 sm:px-10 mb-20">
    <div class="text-center">
      <h1 class="text-2xl my-5 font-bold">Your cart items</h1>
      <a href="{{route('product-customer')}}" class="text-primary underline">Back to shopping</a>
    </div>

    <table class="w-full mt-10 space-x-8">
      <tr class="hidden lg:table-row font-bold border-b">
        <th class="text-left py-4">Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
      <tr class="hidden lg:table-row text-center border-b">
        <td class="text-left">
          <div class="flex space-x-5 py-10 items-start">
            <div class="bg-tertiary">
              <img class="w-48" src="{{asset('img/images/image-1.png')}}" alt="image product">
            </div>
            <div>
              <h3 class="font-bold mb-3 text-2xl">Spiced Mint Candleaf®</h3>
              <a href="/#" class="text-primary underline">Remove</a>
            </div>
          </div>
        </td>
        <td class="px-8">
          <p>$ 9.99</p>
        </td>
        <td class="px-8">
          <div class="px-2 border border-primary inline-block">
            <button class="text-primary">+</button>
            <input class="border-none w-6 text-center" type="text" value="1">
            <button class="text-primary">-</button>
          </div>
        </td>
        <td class="px-8">
          <p>$ 9.99</p>
        </td>
      </tr>
      <tr class="table-row lg:hidden border-b">
        <td class="py-6">
          <div>
            <p class="mb-1">Product</p>
            <div class="flex space-x-5 items-start">
              <div class="bg-tertiary">
                <img class="w-48" src="{{asset('img/images/image-1.png')}}" alt="image product">
              </div>
              <div>
                <h3 class="font-bold mb-3 text-2xl">Spiced Mint Candleaf®</h3>
                <a href="/#" class="text-primary underline">Remove</a>
              </div>
            </div>
          </div>

          <div class="flex font-bold justify-between items-center mt-4">
            <div>
              <p class="mb-1">Price</p>
              <p>$ 9.99</p>
            </div>

            <div>
              <p class="mb-1">Quantity</p>
              <div class="px-2 border border-primary inline-block">
                <button class="text-primary">+</button>
                <input class="border-none w-6 text-center" type="text" value="1">
                <button class="text-primary">-</button>
              </div>
            </div>

            <div>
              <p class="mb-1">Total</p>
              <p>$ 9.99</p>
            </div>
          </div>
        </td>
      </tr>
    </table>

    <div class="block md:flex justify-end items-start space-x-14 mt-10 text-right">
      <div>
        <div class="text-xl font-bold">
          <span class="mr-14">Sub-total</span>
          <span>$ 9.99</span>
        </div>
        <p class="text-quartary my-2">Tax and shipping cost will be calculated later</p>
      </div>
      <a href="{{route('shop-cart-customer-address')}}" class="btn-custom" style="padding: 5px 40px !important;">
        Check-out
      </a>
    </div>
  </section>
@endsection
