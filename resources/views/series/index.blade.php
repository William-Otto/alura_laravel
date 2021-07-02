@extends('app')

@section('header')
  Series
@endsection

@section('content')
  <a href="/series/create" class="btn btn-primary mb-2">New</a>
  <ul class="list-group">
    @foreach ($series as $serie)
      <li class="list-group-item">{{ $serie->name }}</li>
    @endforeach
  </ul>
@endsection