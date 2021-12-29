@extends('layouts.admin')

@section('content-admin')
  <div class="flex justify-between py-2 px-4">
    <h2 class="text-2xl">List Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn-custom">Create</a>
  </div>

  <table class="table-fixed w-full mt-4">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Actions</th>
    </tr>
    @foreach ($categories as $item)
      <tr class="text-center">
        <td>
          <p>{{ $item->id }}</p>
        </td>
        <td>
          <p>{{ $item->name }}</p>
        </td>
        <td class="text-center">
          <div class="space-x-4">
            <a title="show" href="{{ route('categories.edit', $item->id) }}">
              <i class="fas fa-eye"></i>
            </a>
            <label for="my-modal-{{ $item->id }}" title="delete">
              <i class="fas fa-trash-alt cursor-pointer"></i>
            </label>
            <x-delete-dialog :id="$item->id" :route="route('categories.destroy', $item->id)"></x-delete-dialog>
          </div>
        </td>
      </tr>
    @endforeach
  </table>

  <x-pagination></x-pagination>
@endsection
