@extends('layouts.admin')

@section('content-admin')
  @foreach ($categories as $item)
    <p>Name: {{ $item->name }}</p>
    <hr>
  @endforeach

  <p>Contents categories</p>
@endsection
