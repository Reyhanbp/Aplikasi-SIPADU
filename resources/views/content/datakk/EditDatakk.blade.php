@extends('layouts.user_type.auth')

@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-title text w-100 d-flex justify-content-between">
      <h4 class="fw-bold  mb-2">
          <span class=" text-muted fw-light">Data Penduduk  / </span> Edit Data Penduduk
        </h4>
        <div>
          <a class="btn btn-danger" role="button"  href="{{ route ('data-kk') }}">
          <i class="fas fa-times-circle"></i>
            Batal
          </a>
        </div>
     </div>
      <hr>
        <form action="{{ route ('update-data-kk', $datakk->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
         <div class="row">
           <div class="col-6">
            <div class="mb-3">
                <label for="no_kk" class="form-label required" > No Kartu Keluarga </label>
                     <input type="number" name="no_kk" id="no_kk" placeholder="No Kartu Keluarga"
                      class="form-control" required autoComplete="off"  value="{{ $datakk -> no_kk }}" />
                </div>
            </div>
         <div class="col-6">
              <div class="mb-3">
                <label for="kepala_keluarga_id" class="form-label required"> Kepala Keluarga : </label>
                <select
                  class="form-control"
                  name="kepala_keluarga_id"
                  placeholder="Pilih "
                  id="kepala_keluarga_id"
                  required
                >

                  <option value="">Pilih</option>
                    @foreach ($DataPenduduk as $data)
                  <option value="{{ $data->id }}" @if ($datakk->kepala_keluarga_id === $data->id) selected @endif>
                    {{ $data->name }}
                  </option>
                @endforeach

                </select>
              </div>
            </div>


          <div class="col-6">
            <div class="mb-3">
                <label for="rt" class="form-label required" > RT </label>
                     <input type="number" name="rt" id="rt" placeholder="Rt"
                      class="form-control" required autoComplete="off" value="{{ $datakk -> rt }}"  />
                </div>
            </div>
          <div class="col-6">
            <div class="mb-3">
                <label for="rw" class="form-label required" > RW </label>
                     <input type="number" name="rw" id="rw" placeholder="Rw"
                      class="form-control" required autoComplete="off" value="{{ $datakk -> rw }}" />
                </div>
            </div>
            <div class="col-6">
            <div class="mb-3">
                <label for="desa" class="form-label required" > Desa </label>
                     <input type="text" name="desa" id="desa" placeholder="Desa"
                      class="form-control" required autoComplete="off" value="{{ $datakk -> desa }}" />
                </div>
            </div>
            <div class="col-6">
            <div class="mb-3">
                <label for="kecamatan" class="form-label required" > Kecamatan </label>
                     <input type="text" name="kecamatan" id="kecamatan" placeholder="Kecamatan"
                      class="form-control" required autoComplete="off" value="{{ $datakk -> kecamatan }}" />
                </div>
            </div>
            <div class="col-6">
            <div class="mb-3">
                <label for="kabupaten" class="form-label required" > Kabupaten </label>
                     <input type="text" name="kabupaten" id="kabupaten" placeholder="Kabupaten"
                      class="form-control" required autoComplete="off"  value="{{ $datakk -> kabupaten }}"/>
                </div>
            </div>
            <div class="col-6">
            <div class="mb-3">
                <label for="provinsi" class="form-label required" > Provinsi </label>
                     <input type="text" name="provinsi" id="provinsi" placeholder="Provinsi"
                      class="form-control" required autoComplete="off" value="{{ $datakk -> provinsi }}" />
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
