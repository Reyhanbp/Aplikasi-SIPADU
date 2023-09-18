@extends('layouts.user_type.auth')

@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-title text w-100 d-flex justify-content-between">
      <h4 class="fw-bold  mb-2">
          <span class=" text-muted fw-light">Data Penduduk  / </span> Edit Data Penduduk
        </h4>
        <div>
          <a class="btn btn-danger" role="button"  href="{{ route ('datapenduduk') }}">
          <i class="fas fa-times-circle"></i>
            Batal
          </a>
        </div>
     </div>
      <hr>
        <form action="{{ route ('update-datapenduduk', $datapenduduk->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
         <div class="row">
          <div class="col-6">
            <div class="mb-3">
                <label for="NIK" class="form-label required" > NIK </label>
                     <input type="number" name="NIK" id="NIK" placeholder="NIK"
                      class="form-control" required autoComplete="off" value="{{ $datapenduduk ->NIK }}" />
                </div>
            </div>
          <div class="col-6">
            <div class="mb-3">
                <label for="name" class="form-label required" > Nama Lengkap </label>
                     <input type="text" name="name" id="name" placeholder="Name"
                      class="form-control" required autoComplete="off" value="{{ $datapenduduk ->name }}"  />
                </div>
            </div>
          <div class="col-6">
            <div class="mb-3">
                <label for="tmpt_lahir" class="form-label required" > Tempat Lahir </label>
                     <input type="text" name="tmpt_lahir" id="tmpt_lahir" placeholder="Tempat Lahir"
                      class="form-control" required autoComplete="off"  value="{{ $datapenduduk ->tmpt_lahir }}"/>
                </div>
            </div>
          <div class="col-6">
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label required" > Tanggal Lahir </label>
                     <input type="date" name="tgl_lahir" id="tgl_lahir"
                      class="form-control" required autoComplete="off" value="{{ $datapenduduk ->tgl_lahir }}" />
                </div>
            </div>
          <div class="col-6">
            <div class="mb-3">
                <label for="desa_kelurahan" class="form-label required" > Desa/Kelurahan </label>
                     <input type="text" name="desa_kelurahan" id="desa_kelurahan" placeholder="Desa/Kelurahan"
                      class="form-control" required autoComplete="off"  value="{{ $datapenduduk ->desa_kelurahan }}"/>
                </div>
            </div>
          <div class="col-3">
            <div class="mb-3">
                <label for="rt" class="form-label required" > RT </label>
                     <input type="number" name="rt" id="rt" placeholder="Rt"
                      class="form-control" required autoComplete="off" value="{{ $datapenduduk ->rt }}"  />
                </div>
            </div>
          <div class="col-3">
            <div class="mb-3">
                <label for="rw" class="form-label required" > RW </label>
                     <input type="number" name="rw" id="rw" placeholder="Rw"
                      class="form-control" required autoComplete="off"  value="{{ $datapenduduk ->rw }}"/>
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
                  @foreach ($agamaList as $agama)
                    <option value="{{ $agama }}" @if ($datapenduduk->agama === $agama) selected @endif>
                      {{ ucfirst($agama) }}
                    </option>
                  @endforeach
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
                  @foreach ($statusList as $status)
                    <option value="{{ $status }}" @if ($datapenduduk->status === $status) selected @endif>
                      {{ ucfirst($status) }}
                    </option>
                  @endforeach
                </select>
                </div>
            </div>

            <div class="col-6">
            <div class="mb-3">
                <label for="pekerjaan" class="form-label required" > Pekerjaan </label>
                     <input type="text" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan"
                      class="form-control" required autoComplete="off" value="{{ $datapenduduk ->pekerjaan }}" />
                </div>
            </div>
            <div class="col-6">
            <div class="mb-3">
                <label for="file_foto" class="form-label required" > Foto / File </label>
                <input type="file" name="file_foto" id="file_foto" placeholder="Foto"
                 class="form-control"  autoComplete="off"  />
                   @if ($datapenduduk->file_foto)
                            <label>Foto/file yang sudah diunggah : <a href="{{ Storage::url($datapenduduk->file_foto) }}">{{ $datapenduduk->file_foto }}</a></label>
                        @else
                            <label>Belum ada Foto/file diunggah.</label>
                        @endif
                </div>
            </div>
            </div>
          <div class="col-12">
            <br>
            <button type="submit" class="btn btn-success btn-sm ms-auto mt-6 d-block">
              <i class="fas fa-save ms"></i>
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
