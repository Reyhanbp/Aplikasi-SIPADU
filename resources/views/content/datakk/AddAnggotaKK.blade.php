@extends('layouts.user_type.auth')

@section('content')
<div class="card">
    <form action="{{ route ('addanggota-data-kk',  ['id' => $Datakk->id ?? null]) }}">
    <div class="card-header ">
      <div class="d-flex justify-content-between">
          <div class="card-title text w-100 d-flex justify-content-between">
              <h4 class="fw-bold">
                  <span class=" text-muted fw-light">Index Anggota Keluarga / </span>Keluarga {{$Datakk->data_penduduk->name }}
              </h4>
          </div>
           <div class="col-4 ms-md-3 pe-md-3 d-flex align-items-center">
            <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input name="search" type="text" class="form-control" placeholder="Search here..." value="{{ request()->input('search') }}">
            </div>
            </div>
            <div class="mt-3 me-3" >
                   <button type="button" class="btn btn-block btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">
                          <span class="btn-inner-icon"><i class="fas fa-plus"></i></span>
                        <span class="btn-inner-text"> Tambah</span>
                    </button>
            </div>
            <div class="mt-3 ">
          <a class="btn btn-danger" role="button"  href="{{ route ('data-kk') }}">
          <i class="fas fa-times-circle"></i>
              Batal
             </a>
          </div>
      </div>
    </form>
      <hr>
      @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text"><strong>{{Session::get('message')}}!</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
     <!-- Begin Page Content -->
        <div class="card-body">

        <div class="row">
           <div class="card mb-5">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Anggota</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hubungan Anggota</th>

                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          @foreach ($anggotaKk as $anggota)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{$anggota->anggota_keluarga->name }}</td>
                                <td>{{$anggota->hub_keluarga }}</td>
                                <td class="text-center align-middle" >
                                    <form action="{{ route ('deleteanggota-data-kk', ['id' => $anggota->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button id="deleteButton" class="btn btn-danger"  role="button">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    </table>
                </div>
                </div>
            <br>
            <div class="row">
              <div class="mb-4">


            </div>

            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="col-md-4">
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
          <div class="modal-body ">
            <div class="card ">
              <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-info text-gradient">Add Anggota Keluarga</h3>
              </div>
              <div class="card-body">
                <form  action="{{route('Sendanggota-data-kk', $Datakk->id)}}" method="POST" enctype="multipart/form-data"  role="form text-left">
                    @csrf
                <div class="input-group mb-3">
                    <input type="hidden" name="kk_id"  class="form-control" value="{{ $Datakk -> id }}">
                  </div>
                  <label>Anggota Keluarga</label>
                  <div class="input-group mb-3">
                     <div class="input-group mb-3">
                <select
                  class="form-control"
                  name="anggota_id"
                  placeholder="Pilih anggota_id"
                  id="anggota_id"
                  required
                >

                  <option value="">Pilih</option>
                @foreach ($DataPenduduk as $data)
                    @if (!$data->data_kk_id)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endif
                @endforeach

                </select>
                  </div>
                  <label>Hubungan Keluarga</label>
                  <div class="input-group mb-3">
                    <select
                  class="form-control"
                  name="hub_keluarga"
                  placeholder="Pilih hub_keluarga"
                  id="hub_keluarga"
                  required
                >

                  <option value="">Pilih</option>
                <option value="kepala_keluarga">Kepala Keluarga</option>
                <option value="ibu_rumah_tangga">Ibu RumahTangga</option>
                <option value="anak">Anak</option>
                <option value="istri">Istri</option></option>
                <option value="ayah">Ayah</option>

                </select>
                  </div>
                  <div class="text-center d-flex justify-content-center ms-6">
                    <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0 ms-5">Tambah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
