@extends('layouts.user_type.auth')

@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-title text w-100 d-flex justify-content-between">
      <h4 class="fw-bold mb-2">
          <span class=" text-muted fw-light">Data Penduduk  / </span> Tambah Data Penduduk
        </h4>
        <div>
          <a class="btn btn-danger" role="button"  href="{{ route ('datapenduduk') }}">
          <i class="fas fa-times-circle"></i>
            Batal
          </a>
        </div>
     </div>
      <hr>
        <form action="{{route('Send-datapenduduk')}}" method="POST" enctype="multipart/form-data" >
          @csrf
        <div class="card-body">
        <div class="row">
          <div class="col-6">
            <div class="mb-3">
                <label for="NIK" class="form-label required" > NIK </label>
                     <input type="number" name="NIK" id="NIK" placeholder="NIK"
                      class="form-control" required autoComplete="off"  />
                </div>
            </div>
          <div class="col-6">
            <div class="mb-3">
                <label for="name" class="form-label required" > Nama Lengkap </label>
                     <input type="text" name="name" id="name" placeholder="Name"
                      class="form-control" required autoComplete="off"  />
                </div>
            </div>
          <div class="col-6">
            <div class="mb-3">
                <label for="tmpt_lahir" class="form-label required" > Tempat Lahir </label>
                     <input type="text" name="tmpt_lahir" id="tmpt_lahir" placeholder="Tempat Lahir"
                      class="form-control" required autoComplete="off"  />
                </div>
            </div>
          <div class="col-6">
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label required" > Tempat Lahir </label>
                     <input type="date" name="tgl_lahir" id="tgl_lahir"
                      class="form-control" required autoComplete="off"  />
                </div>
            </div>
          <div class="col-6">
            <div class="mb-3">
                <label for="desa_kelurahan" class="form-label required" > Desa/Kelurahan </label>
                     <input type="text" name="desa_kelurahan" id="desa_kelurahan" placeholder="Desa/Kelurahan"
                      class="form-control" required autoComplete="off"  />
                </div>
            </div>
          <div class="col-3">
            <div class="mb-3">
                <label for="rt" class="form-label required" > RT </label>
                     <input type="number" name="rt" id="rt" placeholder="Rt"
                      class="form-control" required autoComplete="off"  />
                </div>
            </div>
          <div class="col-3">
            <div class="mb-3">
                <label for="rw" class="form-label required" > RW </label>
                     <input type="number" name="rw" id="rw" placeholder="Rw"
                      class="form-control" required autoComplete="off"  />
                </div>
            </div>
          <div class="col-6">
            <div class="mb-3">
                <label for="agama" class="form-label required" > Agama </label>
                    <select
                  class="form-control"
                  name="agama"
                  placeholder="Pilih agama"
                  id="agama"
                  required
                >
                  <option value="">Pilih</option>
                  <option value="islam">Islam</option>
                  <option value="kristen">Kristen</option>
                  <option value="katolik">Katolik</option>
                  <option value="hindu">Hindu</option>
                  <option value="buddha">Buddha</option>
                  <option value="khonghucu">Khonghucu</option>
                </select>
                </div>
            </div>
          <div class="col-6">
            <div class="mb-3">
                <label for="status" class="form-label required" > Status </label>
                    <select
                  class="form-control"
                  name="status"
                  placeholder="Pilih status"
                  id="status"
                  required
                >
                  <option value="">Pilih</option>
                  <option value="sudah nikah">Sudah Menikah</option>
                  <option value="belum nikah">Belum Menikah</option>
                  <option value="cerai mati">Cerai Mati</option>
                  <option value="cerai hidup">Cerai Hidup</option>
                </select>
                </div>
            </div>

            <div class="col-6">
            <div class="mb-3">
                <label for="pekerjaan" class="form-label required" > Pekerjaan </label>
                     <input type="text" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan"
                      class="form-control" required autoComplete="off"  />
                </div>
            </div>
            <div class="col-6">
            <div class="mb-3">
                <label for="file_foto" class="form-label required" > Foto / File </label>
                     <input type="file" name="file_foto" id="file_foto" placeholder="Foto"
                      class="form-control" required autoComplete="off"  />
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
