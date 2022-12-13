@extends('layout')

@section('content')


<div class="container d-flex justify-content-center">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center" style="border: none !important; ">
            <form action="/store" method="POST" class="form">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @csrf
                <div>
                    <h5 class="card-title">Create New Plant</h5>
                    <hr>
                </div>
                <div class="form-row">
                    <div class="col-6" style="padding-bottom: 20px;">
                        <label>Kode Plant</label>
                        <input name="kode" type="text" class="form-control" placeholder="B001">
                    </div>
                    <div class="col" style="margin-left: 18px;">
                        <label>Nama Plant</label>
                        <input name="name" type="text" class="form-control" placeholder="Bunga Bangkai">
                    </div>
                    <div class="form-group col-12">
                        <label for="inputState">Type</label>
                        <select name="type" id="inputState" class="form-control">
                            <option selected hidden disabled>--select type--</option>
                            <option value="Obat">Obat</option>
                            <option value="Bunga">Bunga</option>
                            <option value="Rumput">Rumput</option>
                            <option value="Buah">Buah</option>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label>Notes</label>
                        <textarea name="notes" class="form-control" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-3">Create</button>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5>Plants</h5>
                      <h3 class="card-title2" style="color: #afafaf;">see all plants data</h3>
                    </div>
                    <div class="button-create">
                      <a href="/" class="btn btn-outline-danger">Go to Page</a>
                    </div>
            
                  </div>
            </form>

        </div>
    </div>
</div>



@endsection