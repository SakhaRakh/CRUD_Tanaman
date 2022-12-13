@extends('layout')

@section('content')

<div class="container d-flex justify-content-center" >
  <form action="/create">
    <div class="card">
      @if (session('addTanaman'))
      <div class="alert alert-success">
      {{ session('addTanaman') }}
      </div>
      @endif
      @if (session('successUpdate'))
      <div class="alert alert-success">
          {{ session('successUpdate') }}
      </div>
      @endif
      @if (session('successDelete'))
      <div class="alert alert-warning">
          {{ session('successDelete') }}
      </div>
      @endif
      <div class="card-header d-flex justify-content-between align-items-center" style="border: none !important; ">
        <div>
          <h2 class="title">Plants Report</h2>
          <h3 class="title1">all of plants report</h3>
        </div>
        <div class="button-create">
          <button type="submit" class="btn btn-primary">Create</button>
        </div>

      </div>
      <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #e9e9e9; border: none !important;">
        <div>
          <h2 class="title">Counts</h2>
          <h3 class="card-title2">Total plants</h3>
        </div>
        <div class="total-plants">
        {{ count($tanams) }}
        </div>
      </div>
    </form>
      <div class="card-body align-items-center">
        <div>
          <table class="table table-borderless">
            <tr style="text-align: center">
              <th>Kode</th>
              <th>Name</th>
              <th>Type</th>
              <th>Growth</th>
              <th>Action</th>
            </tr>
            @foreach ($tanams as $tanaman)
            <tr>
              <td style="color: blue">
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#data-{{$tanaman['id']}}">
                  {{ $tanaman['kode']}}
                </button>
              </td>
              <td>
                <p>{{ $tanaman['name']}}
                <br>
                <span class="text-secondary d-inline-block text-truncate" style="width: 150px">{{ $tanaman['notes']}}</span></p>
              </td>
              <td>{{ $tanaman['type']}}</td>
              <td style="text-align: center">
                @if (is_null($tanaman['growth']))
                <i class="fa-solid fa-circle-xmark"></i>
                @else
                    {{ $tanaman['growth'] }}
                @endif

              </td>
              <td class="d-flex align-items-center" >
              <div class="mr-2">
                <a href="/edit/{{$tanaman['id']}}" class="d-flex" style="text-decoration: none;"><i class="fa-solid fa-file-pen"></i></a>
              </div>
              
              <form action="/destroy/{{$tanaman['id']}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-none" style="padding: 0 !important"><i class="fa-solid fa-trash-can" style="color: red;"></i></button>
              </form>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
</div>

@foreach ($tanams as $tanaman)
<div class="modal fade" id="data-{{$tanaman['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Kode: {{ $tanaman['kode'] }}</p>
        <p>Name: {{ $tanaman['name'] }}</p>
        <p>Type: {{ $tanaman['type'] }}</p>
        <p>Growth: {{ is_null($tanaman['growth']) ? '-' : $tanaman['growth'] }}</p>
        <p>Notes: {{ $tanaman['notes'] }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection