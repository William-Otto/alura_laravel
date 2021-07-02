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
        <span class="d-flex">
          <a href="/series/{{ $serie->id }}/seasons" class="btn btn-info btn-sm" style="margin-right: 5px"><i class="fa fa-external-link" aria-hidden="true"></i></a>
          <form method="post" action="/series/delete/{{ $serie->id }}" onsubmit="return confirm('Are you sure?')">
            @csrf
            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
          </form>
        </span>
      </li>
    @endforeach
  </ul>
@endsection