@extends('layouts.user_type.auth')

@section('content')
<div class="card"> <div class="card-header"> <div class="card-title text w-100 d-flex justify-content-between">
    <h4 class="fw-bold mb-2">
    <span class=" text-muted fw-light">Data Meninggal / </span> Edit Data Meninggal
    </h4>
    <div>
    <a class="btn btn-danger" role="button" href="{{ route ('meninggal') }}">
    <i class="fas fa-times-circle"></i>
    Batal
    </a>
</div>
</div>
<hr>
<form action="{{route('update-meninggal', $meninggal->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
    <div class="row">
          <div class="col-6">
            <div class="mb-3">
                <label for="data_penduduk_id" class="required">
                    Data Penduduk :
                </label>
                <select class="form-control" name="data_penduduk_id" placeholder="Pilih data_penduduk_id" id="data_penduduk_id" required>

                    <option value="">Pilih</option>
                @foreach ($data as $data)
                <option value="{{ $data->id }}" @if ($meninggal->data_penduduk_id === $data->id) selected @endif>
                    {{ $data->name }}
                </option>
                @endforeach

                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="tgl_meninggal" class="form-label required"> Tanggal Meninggal </label>
                <input type="date" name="tgl_meninggal" id="tgl_meninggal" class="form-control" required autoComplete="off"  value="{{$meninggal->tgl_meninggal}}"/>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="sebab_meninggal" class="form-label required"> Sebab Kematian </label>
                <textarea id="sebab_meninggal" name="sebab_meninggal" class="form-control" rows="2"
                    placeholder="Sebab Meninggal">{{$meninggal->sebab_meninggal}}</textarea>
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
