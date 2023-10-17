
@extends('layouts.user_type.auth')

@section('content')

<div class="card-body">
<form action="{{ route('indexdatapenduduk', ['tglawal' => $tglawal, 'tglakhir' => $tglakhir]) }}" method="GET">
        <div class="card-header "> <div class="d-flex justify-content-between"> <div
            class="card-title text w-100 d-flex justify-content-between">
            <h4 class="fw-bold">
            <span class=" text-muted fw-light">Index Data Penduduk / </span> Data Penduduk
            </h4>
            </div>
            <div class="col-4 ms-md-3 pe-md-3 d-flex align-items-center">
            <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input name="search" type="text" class="form-control" placeholder="Search here..." value="{{
                request()->input('search') }}">
            </div>
            </div>
            <div class="mt-3" >
            <a class="btn btn-3 btn-primary w-200" type="button" style="width: 150px;" onclick="">
                <span class="btn-inner-icon"><i class="fas fa-plus"></i></span>
                <span class="btn-inner-text"> Tambah</span>
            </a>

            </div>
        </div>
        </form>

        <hr>

    <div class="row">
        <div class="card mb-5">
        <div class="table-responsive" id="tabel-laporan">
            <table class="table align-items-center mb-0">
            <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Lahir</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tempat Lahir</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $indexdatapenduduk)
            <tr>
                <td>{{$loop->iteration }}</td>
                <td>{{$indexdatapenduduk->name }}</td>
                <td>{{$indexdatapenduduk->tgl_lahir }}</td>
                <td>{{$indexdatapenduduk->tmpt_lahir }}</td>
            </tr>
            @endforeach
            </tbody>
            </table>

            </div>
        </div>
    </div>
</div>
</div>
    @endsection
