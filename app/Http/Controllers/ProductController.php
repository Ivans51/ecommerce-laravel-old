<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends BaseController {
  /**
   * Display a listing of the resource.
   *
   * @return JsonResponse
   */
  public function index() {
    $products = Product::all();

    return view('admin.products', ['products' => $products]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param ProductRequest $request
   * @return JsonResponse
   */
  public function store(ProductRequest $request): JsonResponse {
    $input = $request->all();

    $product = Product::create($input);

    return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return JsonResponse
   */
  public function show(int $id): JsonResponse {
    $product = Product::find($id);

    if (is_null($product)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new ProductResource($product), 'Product retrieved successfully.');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param ProductRequest $request
   * @param Product $product
   * @return JsonResponse
   */
  public function update(ProductRequest $request, Product $product): JsonResponse {
    $input = $request->all();

    $validator = Validator::make($input, [
      'name'   => 'required',
      'detail' => 'required'
    ]);

    if ($validator->fails()) {
      return $this->sendErrorValidator('Validation Error.', $validator->errors()->all());
    }

    $product->name   = $input['name'];
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
  public function destroy(ProductRequest $product): JsonResponse {
    Product::whereId($product->input('id'))->delete();

    return $this->sendResponse([], 'Product deleted successfully.');
  }
}
