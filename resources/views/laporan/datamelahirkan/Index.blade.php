@extends('layouts.user_type.auth')

@section('content')


<div class="card mb-5">
    <form class="me-5 ms-5 mt-5 mb-5">
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="tglawal" class="form-label required"> Tanggal Awal </label>
                <input type="date" name="tglawal" id="tglawal" class="form-control" required autoComplete="off" />
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="tglakhir" class="form-label required"> Tanggal Akhir </label>
                <input type="date" name="tglakhir" id="tglakhir" class="form-control" required autoComplete="off" />
            </div>
        </div>
    </div>
    <div class="col-4 d-flex justify-content-between mt-3 ">
        <a class="btn btn-success " role="button" onclick="this.href='/laporan-datamelahirkan-filter/'+ document.getElementById('tglawal').value +
         '/' + document.getElementById('tglakhir').value" >
            <i class="fas fa-save"></i>
            Filter Data Melahirkan
        </a>
    </div>
    </form>
</div>

@endsection
