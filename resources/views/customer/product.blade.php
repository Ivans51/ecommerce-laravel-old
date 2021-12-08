@extends('layouts.customer')

@section('content-customer')
  <section class="flex space-x-6 py-10 px-6">
    <div class="w-5/12 text-center">
      <img src="{{asset('img/images/product/product.png')}}" alt="product image">
      <div class="mt-2">
        <p class="font-bold">All hand-made with natural soy wax, Candleaf is made for your pleasure moments.</p>
        <p class="mt-4"> 🚚 <span class="text-primary font-bold">FREE SHIPPING</span></p>
      </div>
    </div>

    <div class="w-7/12">
      <h1 class="font-bold text-2xl">Spiced Mint Candleaf®</h1>

      <div class="flex items-center my-5">
        <p class="w-1/4 text-primary font-bold text-2xl">$ 9.99</p>
        <div class="w-3/4 px-4">
          <input class="mx-2" type="radio" id="one_time">
          <label for="one_time">One time purchase</label>
        </div>
      </div>

      <div class="flex items-center my-4">
        <div class="w-1/4">
          <p class="">Quantity</p>
          <div class="px-2 border border-primary inline-block">
            <button class="text-primary">+</button>
            <input class="border-none w-6 text-center" type="text" value="1">
            <button class="text-primary">-</button>
          </div>
        </div>
        <div class="w-3/4 border rounded-2xl p-4">
          <div>
            <input class="mx-2" type="radio" id="subscribe">
            <label for="subscribe">Subscribe and delivery every </label>
            <select class="border" name="week" id="week">
              <option value="">Select</option>
              <option value="4">4 weeks</option>
            </select>
          </div>
          <p class="mt-2">
            Subscribe now and get the 10% of discount on every recurring order. The discount will be
            applied at checkout. <a class="text-primary">See details</a>
          </p>
        </div>
      </div>

      <div class="flex justify-end mt-20 mb-10 py-2">
        <button class="btn-custom w-3/4 flex justify-center items-center">
          <img class="mr-2" src="{{asset('img/images/cart-white.svg')}}" alt="cart white">+ Add to cart
        </button>
      </div>

      <div class="border rounded-2xl p-4">
        <p>
          Wax: <span class="text-primary">Top grade Soy wax that delivers a smoke less,  consistent burn</span>
        </p>
        <p>
          Fragrance: <span class="text-primary my-4">Premium quality ingredients with natural essential oils </span>
        </p>
        <p>
          Burning Time: <span class="text-primary">70-75 hours</span>
          Dimension: <span class="text-primary">10cm x 5cm</span>
          Weight: <span class="text-primary">400g</span>
        </p>
      </div>
    </div>
  </section>
@endsection
