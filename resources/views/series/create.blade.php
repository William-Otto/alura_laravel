@extends('app')

@section('header')
  New Serie
@endsection

@section('content')
  <form action="post">
    @csrf
    <div class="form-group">
      <label for="serie_name">Name</label>
      <input type="text" class="form-control" name="serie_name" id="serie_name">
    </div>
    <button class="btn btn-primary mt-2">Save</button>
  </form>
@endsection