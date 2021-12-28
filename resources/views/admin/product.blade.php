@extends('layouts.admin')

@section('content-admin')
  <p>Name: {{ $product->name }}</p>
  <p>Description: {{ $product->description }}</p>
@endsection
