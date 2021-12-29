<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends BaseController
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View
   */
  public function index()
  {
    $products = Product::all();

    return view('admin.products.products', ['products' => $products]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Application|Factory|View
   */
  public function create()
  {
    return view('admin.products.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param ProductRequest $request
   * @return JsonResponse
   */
  public function store(ProductRequest $request): JsonResponse
  {
    $input = $request->all();

    $product = Product::create($input);

    return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param string $id
   * @return Application|Factory|View
   */
  public function show(string $id)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param string $id
   * @return Application|Factory|View
   */
  public function edit(string $id)
  {
    $product = Product::query()->where('id', '=', $id)->first();
    return view('admin.products.edit', ['product' => $product]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param ProductRequest $request
   * @param Product $product
   * @return JsonResponse
   */
  public function update(ProductRequest $request, Product $product): JsonResponse
  {
    $input = $request->all();

    $validator = Validator::make($input, [
      'name' => 'required',
      'detail' => 'required'
    ]);

    if ($validator->fails()) {
      return $this->sendErrorValidator('Validation Error.', $validator->errors()->all());
    }

    $product->name = $input['name'];
    $product->detail = $input['detail'];
    $product->save();

    return $this->sendResponse(new ProductResource($product), 'Product updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param ProductRequest $product
   * @return JsonResponse
   */
  public function destroy(ProductRequest $product): JsonResponse
  {
    Product::whereId($product->input('id'))->delete();

    return $this->sendResponse([], 'Product deleted successfully.');
  }
}
