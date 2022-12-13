@extends('layout')

@section('content')


<div class="container d-flex justify-content-center">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center" style="border: none !important; ">
            <form action="/update/{{$tanams['id']}}" method="POST" class="form">
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

                @method('PATCH')
                <div>
                    <h5 class="card-title">Edit Plant</h5>
                    <hr>
                </div>
                <div class="form-row">
                    <div class="col-6" style="padding-bottom: 20px;">
                        <label>Kode Plant</label>
                        <input name="kode" type="text" class="form-control" placeholder="B001" value="{{$tanams['kode']}}">
                    </div>
                    <div class="col" style="margin-left: 18px;">
                        <label>Nama Plant</label>
                        <input name="name" type="text" class="form-control" placeholder="Bunga Bangkai" value="{{$tanams['name']}}">
                    </div>
                    <div class="form-group col-12">
                        <label for="inputState">Type</label>
                        <select name="type" id="inputState" class="form-control">
                            <option selected hidden disabled value=>--select type--</option>
                            <option value="Obat" {{ $tanams['type'] == 'Obat' ? 'selected' : ''  }}>Obat</option>
                            <option value="Bunga" {{ $tanams['type'] == 'Bunga' ? 'selected' : ''  }}>Bunga</option>
                            <option value="Rumput" {{ $tanams['type'] == 'Rumput' ? 'selected' : ''  }}>Rumput</option>
                            <option value="Buah" {{ $tanams['type'] == 'Buah' ? 'selected' : ''  }}>Buah</option>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label>Notes</label>
                        <textarea name="notes" class="form-control" rows="4">{{$tanams['notes']}}</textarea>
                    </div>
                    <div class="form-group col-12">
                        <label for="inputState">Growth</label>
                        <select name="growth" id="inputState" class="form-control">
                            <option selected hidden disabled>--select type--</option>
                            <option value="Tunas" {{ $tanams['growth'] == 'Tunas' ? 'selected' : ''  }}>Tunas</option>
                            <option value="Tumbuh Bunga" {{ $tanams['growth'] == 'Tumbuh Bunga' ? 'selected' : ''  }}>Tumbuh Bunga</option>
                            <option value="Tumbuh Daun" {{ $tanams['growth'] == 'Tumbuh Daun' ? 'selected' : ''  }}>Tumbuh Daun</option>
                            <option value="Tumbuh Buah" {{ $tanams['growth'] == 'Tumbuh Buah' ? 'selected' : ''  }}>Tumbuh Buah</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-3">Save Update</button>
                    <a href="/" class="btn btn-primary">Cencel</a>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection