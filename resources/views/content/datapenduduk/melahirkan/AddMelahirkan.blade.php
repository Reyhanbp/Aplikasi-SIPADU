@extends('layouts.user_type.auth')

@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-title text w-100 d-flex justify-content-between">
      <h4 class="fw-bold mb-2">
          <span class=" text-muted fw-light">Data Penduduk  / </span> Tambah Data Penduduk
        </h4>
        <div>
          <a class="btn btn-danger" role="button"  href="{{ route ('melahirkan') }}">
          <i class="fas fa-times-circle"></i>
            Batal
          </a>
        </div>
     </div>
      <hr>
        <form action="{{route('Send-melahirkan')}}" method="POST" enctype="multipart/form-data" >
          @csrf
        <div class="card-body">
        <div class="row">
          <div class="col-6">
            <div class="mb-3">
                <label for="name" class="form-label required" > Name </label>
                     <input type="text" name="name" id="name" placeholder="Name"
                      class="form-control" required autoComplete="off"  />
                </div>
            </div>
            <div class="col-6">
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label required" > Tanggal Lahir </label>
                     <input type="date" name="tgl_lahir" id="tgl_lahir"
                      class="form-control" required autoComplete="off"  />
                </div>
            </div>
          <div class="col-6" >
                <div class="mb-3">
                  <label for="data_kk_id" class="required" >
                    Data Kartu Keluarga :
                  </label>
                 <select
                  class="form-control"
                  name="data_kk_id"
                  placeholder="Pilih data_kk_id"
                  id="data_kk_id"
                  required
                >

                  <option value="">Pilih</option>
                  @foreach ($Datakk as $item)
                  <option value="{{$item -> id}}">{{$item ->data_penduduk->name}}</option>
                  @endforeach

                </select>
                </div>
              </div>
            <div class="col-6">
              <div class="mb-2">
                <label for="jenis_kelamin" class="form-label required"> Jenis Kelamin : </label>
                <select
                  class="form-control"
                  name="jenis_kelamin"
                  placeholder="Pilih jenis_kelamin"
                  id="jenis_kelamin"
                  required
                >
                  <option value="">Pilih</option>
                  <option value="Perempuan">Perempuan</option>
                  <option value="Laki-laki">Laki-laki</option>

                </select>
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
