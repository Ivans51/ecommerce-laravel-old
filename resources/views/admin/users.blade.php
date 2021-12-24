@extends('layouts.admin')

@section('content-admin')
  @foreach ($users as $item)
    <p>Name: {{ $item->name }}</p>
    <hr>
  @endforeach

  <p>Contents users</p>
@endsection
