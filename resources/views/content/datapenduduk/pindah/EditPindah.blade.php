@extends('layouts.user_type.auth')

@section('content')
<div class="card"> <div class="card-header"> <div class="card-title text w-100 d-flex justify-content-between"> <h4
    class="fw-bold mb-2"> <span class=" text-muted fw-light">Data Pindah / </span> Edit Data Pindah `
    </h4> <div> <a class="btn btn-danger" role="button" href="{{ route ('pindah') }}"> <i
        class="fas fa-times-circle"></i> Batal
    </a>
    </div>
</div>
<hr>
<form action="{{route('update-pindah', $pindah->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body"> <div class="row"> <div class="col-6"> <div class="mb-3"> <label for="data_penduduk_id" >
    Data Penduduk :
    </label>
    <select class="form-control" name="data_penduduk_id" placeholder="Pilih data_penduduk_id" id="data_penduduk_id"
        required> <option value="">Pilih</option>
        @foreach ($data as $data)
        <option value="{{ $data->id }}" @if ($pindah->data_penduduk_id === $data->id) selected @endif>
        {{ $data->name }}
        </option>
        @endforeach

    </select>
    </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="tgl_pindah" class="form-label required"> Tanggal Pindah </label>
            <input type="date" name="tgl_pindah" id="tgl_pindah" class="form-control" required autoComplete="off"
                value="{{$pindah->tgl_pindah}}" />
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="sebab_pindah" class="form-label required"> Sebab Pindah </label>
            <textarea id="sebab_pindah" name="sebab_pindah" class="form-control" rows="2"
                placeholder="Sebab Pindah">{{$pindah->sebab_pindah}}</textarea>
        </div>
    </div>
    </div>
    <div class="col-12">
        <br>
        <button type="submit" class="btn btn-success btn-sm ms-auto mt-6 d-block">
            <i class="fas fa-save"></i>
            Simpan
        </button>
    </div>
    </div>
    </form>


    </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    @endsection
