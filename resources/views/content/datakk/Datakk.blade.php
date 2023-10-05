@extends('layouts.user_type.auth')

@section('content')
<div class="card">
  <form action="{{ route('data-kk') }}">
    <div class="card-header ">
      <div class="d-flex justify-content-between">
          <div class="card-title text w-100 d-flex justify-content-between">
              <h4 class="fw-bold">
                  <span class=" text-muted fw-light">Index Kartu Keluarga / </span> Kartu Keluarga
              </h4>
          </div>
           <div class="col-4 ms-md-3 pe-md-3 d-flex align-items-center">
            <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input name="search" type="text" class="form-control" placeholder="Search here..." value="{{ request()->input('search') }}">
            </div>
            </div>
            <div class="mt-3" >
             <a class="btn btn-3 btn-primary w-200" type="button" style="width: 150px;"  href="{{ route ('tambah-data-kk') }}">
                    <span class="btn-inner-icon"><i class="fas fa-plus"></i></span>
                <span class="btn-inner-text"> Tambah</span>
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No kk</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kepala Keluarga</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Desa/Kelurahan</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kecamatan</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Anggota KK</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                           @foreach ($data as $datakk)
                        <tr>
                          <td>{{$loop->iteration }}</td>
                        <td>{{$datakk ->no_kk }}</td>
                          <td>{{$datakk->data_penduduk->name }}</td>
                        <td>{{$datakk ->desa }}</td>
                         <td>{{$datakk ->kecamatan }}</td>
                         <td>
                         <a class="btn btn-info" role="button" href="{{ route ('addanggota-data-kk', $datakk->id) }}">
                            <i class="fas fa-users-cog"></i>
                            Tambah Anggota KK
                            </a>
                         </td>

                        <td class="text-center align-middle" >
                            <form action="{{ route ('delete-data-kk', $datakk->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning" role="button"  href="{{ route ('edit-data-kk', $datakk->id) }}">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                 </a>
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
                   {{$data->links('pagination::bootstrap-5')}}


            </div>

            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
