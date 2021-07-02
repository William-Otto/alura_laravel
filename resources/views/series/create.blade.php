@extends('app')

@section('header')
  New Serie
@endsection

@section('content')
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
  <form method="post">
    @csrf
    <div class="row">
      <div class="col col-8">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name">
      </div>

      <div class="col col-2">
        <label for="seasons_number">Number of Seasons</label>
        <input type="number" class="form-control" name="seasons_number" id="seasons_number">
      </div>

      <div class="col col-2">
        <label for="ep_per_season">Episodes each season</label>
        <input type="number" class="form-control" name="ep_per_season" id="ep_per_season">
      </div>
    </div>
    
    <button class="btn btn-primary mt-2">Save</button>

  </form>
@endsection