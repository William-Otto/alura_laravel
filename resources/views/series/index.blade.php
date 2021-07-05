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
        <span id="serie-name-{{ $serie->id }}">{{ $serie->name }}</span>

        <div class="input-group w-50" hidden id="input-name-serie-{{ $serie->id }}">
          <input type="text" class="form-control" value="{{ $serie->name }}">
          <div class="input-group-append">
            <button class="btn btn-primary" onclick="editSerie({{ $serie->id }})">
              <i class="fa fa-check" aria-hidden="true"></i>
            </button>
            @csrf
          </div>
        </div>

        <span class="d-flex">
          <button class="btn btn-info btn-sm" onclick="toggleInput({{ $serie->id }})" style="margin-right: 5px">
            <i class="fa fa-pencil" aria-hidden="true"></i>
          </button>
          <a href="/series/{{ $serie->id }}/seasons" class="btn btn-info btn-sm" style="margin-right: 5px"><i class="fa fa-external-link" aria-hidden="true"></i></a>
          <form method="post" action="/series/delete/{{ $serie->id }}" onsubmit="return confirm('Are you sure?')">
            @csrf
            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
          </form>
        </span>
      </li>
    @endforeach
  </ul>

  <script>

    function toggleInput (serieId) {
      const serieNameEl = document.getElementById(`serie-name-${serieId}`);
      const inputSerieNameEl = document.getElementById(`input-name-serie-${serieId}`);

      if (serieNameEl.hasAttribute('hidden')) {
        serieNameEl.removeAttribute('hidden')
        inputSerieNameEl.hidden = true;

      } else {
        inputSerieNameEl.removeAttribute('hidden');
        serieNameEl.hidden = true;
      }
    }  

    function editSerie (serieId) {
      
      let formData = new FormData();

      const name = document.querySelector(`#input-name-serie-${serieId} > input`).value;

      const token = document.querySelector('input[name="_token"]').value;

      formData.append('name', name);
      formData.append('_token', token);

      const url = `/series/${serieId}/editName`;

      fetch (url, {
        body: formData,
        method: 'POST'
      }).then(() => {
        toggleInput(serieId);
        document.getElementById(`serie-name-${serieId}`).textContent = name;
      })
    }
  </script>  
@endsection