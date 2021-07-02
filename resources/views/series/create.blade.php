@extends('app')

@section('header')
  New Serie
@endsection

@section('content')
  <form method="post">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name">
    </div>
    <button class="btn btn-primary mt-2">Save</button>
  </form>
@endsection