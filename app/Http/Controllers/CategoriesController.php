<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoriesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View
   */
  public function index()
  {
    $categories = Category::all();
    return view('admin.categories.categories', ['categories' => $categories]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Application|Factory|View
   */
  public function create()
  {
    return view('admin.categories.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return Response
   */
  public function store(Request $request)
  {
    //
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
    $category = Category::query()->where('id', '=', $id)->first();
    return view('admin.categories.edit', ['category' => $category]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param string $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param string $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }
}
