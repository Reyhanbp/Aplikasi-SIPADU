@extends('layouts.user_type.auth')

@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-title text w-100 d-flex justify-content-between">
      <h4 class="fw-bold mb-2">
          <span class=" text-muted fw-light">Pengumuman  / </span> Tambah Pengumuman
        </h4>
        <div>
          <a class="btn btn-danger" role="button"  href="{{ route ('pengumuman') }}">
          <i class="fas fa-times-circle"></i>
            Batal
          </a>
        </div>
     </div>
      <hr>
        <form action="{{route('Send-pengumuman')}}" method="POST" enctype="multipart/form-data" >
          @csrf
        <div class="card-body">
        <div class="row">
             <div class="col-12">
                    <div class="mb-3">
                        <label for="jdl_pengumuman" class="form-label required" > Judul Pengumuman </label>
                        <input type="text" name="jdl_pengumuman" id="jdl_pengumuman" placeholder="Judul Pengumuman"
                          class="form-control" required autoComplete="off"  />
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="pengumuman" class="form-label required" > Pengumuman </label>
                        <textarea class="form-control" id="pengumuman" name="pengumuman" rows="3" placeholder="Pengumuman"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                      <label for="file" class="form-label">File  <span class=" text-danger"> (Opsional)  </span></label>
                      <input class="form-control" type="file" id="file" name="file">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-5">
                        <label for="link" class="form-label required" > Link <span class=" text-danger"> (Opsional)  </span> </label>
                        <input type="url" name="link" id="link" placeholder="Link "
                          class="form-control" autoComplete="off"  />
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
