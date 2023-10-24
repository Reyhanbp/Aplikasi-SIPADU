@extends('layouts.user_type.auth')

@section('content')

<div class="card mb-5"> <form class="me-5 ms-5 mt-5 mb-5" action="{{ route('cetakpenduduk') }}" method="POST"> @csrf
    <div class="row">
    <div class="col-12">
        <div class="mb-3">
            <label for="data_penduduk_id" class="required"> Nama Penduduk: </label>
                <select class="form-control" name="data_penduduk_id" placeholder="Pilih data_penduduk_id"
                    id="data_penduduk_id" required>
                    <option value="">Pilih</option>
                    @foreach ($data as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
        </div>
    </div>
</div>
<div class="col-4 d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i>
        Cetak Data
    </button>
</div>
</form>
</div>

@endsection
