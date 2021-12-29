@extends('layouts.admin')

@section('content-admin')
  <section class="px-8 py-2">
    <h2 class="text-2xl">Edit form</h2>
    <div class="divider-shop mb-4"></div>

    <form method="post" action="{{ route('categories.store') }}">
      @csrf
      <div class="mb-1 form-control">
        <label>Name
          <input
            type="text"
            class="input input-bordered input-sm px-4 py-3 w-full"
            name="name"
            value="{{ $category->name }}"
          >
        </label>
        @if ($errors->has('name'))
          <span class="text-red-700">{{ $errors->first('name') }}</span>
        @endif
      </div>

      <div class="mb-1 form-control">
        <label>Slug
          <input
            type="text"
            class="input input-bordered input-sm px-4 py-3 w-full"
            name="slug"
            value="{{ $category->slug }}"
          >
        </label>
        @if ($errors->has('slug'))
          <span class="text-red-700">{{ $errors->first('slug') }}</span>
        @endif
      </div>

      <div class="mt-6 mb-8 flex justify-end space-x-4">
        <a href="{{ route('categories.index') }}" class="btn-custom-info">
          Cancel
        </a>
        <button class="btn-custom">
          Save
        </button>
      </div>
    </form>
  </section>
@endsection
