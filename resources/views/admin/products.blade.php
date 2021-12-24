@extends('layouts.admin')

@section('content-admin')
  @foreach ($products as $item)
    <p>Name: {{ $item->name }}</p>
    <p>Description: {{ $item->description }}</p>
    <hr>
  @endforeach

  <p>Contents products</p>
@endsection
