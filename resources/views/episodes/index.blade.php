@extends('app')

@section('header')
  Episodes
@endsection

@section('content')
  <form action="">
    <ul class="list-group">
      @foreach ($episodes as $episode)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Episode 
          <input type="checkbox">
        </li>
      @endforeach
    </ul>

    <button class="btn btn-primary mt-2 mb-2">Save</button>
  </form>

@endsection