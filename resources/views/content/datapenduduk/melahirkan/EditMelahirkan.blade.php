@extends('layouts.user_type.auth')

@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-title text w-100 d-flex justify-content-between">
      <h4 class="fw-bold mb-2">
          <span class=" text-muted fw-light">Data Penduduk  / </span> Edit Data Penduduk
        </h4>
        <div>
          <a class="btn btn-danger" role="button"  href="{{ route ('melahirkan') }}">
          <i class="fas fa-times-circle"></i>
            Batal
          </a>
        </div>
     </div>
      <hr>
        <form action="{{route('update-melahirkan', $melahirkan->id)}}" method="POST" enctype="multipart/form-data" >
          @csrf
        <div class="card-body">
        <div class="row">
          <div class="col-6">
            <div class="mb-3">
                <label for="name" class="form-label required" > Name </label>
                     <input type="text" name="name" id="name" placeholder="Name"
                      class="form-control" required autoComplete="off"  value="{{$melahirkan->name}}" />
                </div>
            </div>
            <div class="col-6">
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label required" > Tanggal Lahir </label>
                     <input type="date" name="tgl_lahir" id="tgl_lahir"
                      class="form-control" required autoComplete="off"  value="{{$melahirkan->tgl_lahir}}"  />
                </div>
            </div>
          <div class="col-6" >
                <div class="mb-3">
                  <label for="data_kk_id" class="required" >
                    Data Kartu Keluarga
                  </label>
                 <select
                  class="form-control"
                  name="data_kk_id"
                  placeholder="Pilih data_kk_id"
                  id="data_kk_id"
                  required
                >

                  <option value="">Pilih</option>
                    @foreach ($Datakk as $data)
                  <option value="{{ $data->id }}" @if ($melahirkan->data_kk_id === $data->id) selected @endif>
                    {{ $data->no_kk }}
                  </option>
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
                    <option value="Perempuan" {{ $melahirkan->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    <option value="Laki-laki" {{ $melahirkan->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
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
