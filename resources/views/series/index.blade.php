@extends('app')

@section('header')
  Series
@endsection

@section('content')
  @if($message)
    <div class="alert alert-success" role="alert">
      {{ $message }}
    </div>
  @endif

  <a href="{{ route ('create_serie') }}" class="btn btn-primary mb-2">New</a>
  <ul class="list-group">
    @foreach ($series as $serie)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $serie->name }}
        <form method="post" action="/series/delete/{{ $serie->id }}" onsubmit="return confirm('Are you sure?')">
          @csrf
          <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </form>
      </li>
    @endforeach
  </ul>
@endsection