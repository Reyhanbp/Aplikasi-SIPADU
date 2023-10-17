@extends('layouts.user_type.auth')

@section('content')
<div class="card">
    <div class="card-header">
    <div class="card-title text w-100 d-flex justify-content-between">
    <h4 class="fw-bold mb-2">
    <span class=" text-muted fw-light">Setting / </span> Tambah Setting
    </h4>
</div>
<hr>
<form action="{{route('Send-settings')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="name" class="form-label required"> Judul </label>
                <input type="text" name="jdl_kita" id="jdl_kita" placeholder="Name" class="form-control" required autoComplete="off"
                    value="{{ old('jdl_kita', isset($data) ? $data->jdl_kita : '') }}" />
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="desc_kita" class="form-label required"> Deskripsi </label>
            <textarea type="text" name="desc_kita" id="desc_kita" class="form-control" required autoComplete="off"
                placeholder="Deskripsi">{{ old('desc_kita', isset($data) ? $data->desc_kita : '') }}</textarea>
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

</div>

</div>
<!-- /.container-fluid -->

</div>
@endsection
