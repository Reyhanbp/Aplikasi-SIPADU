@extends('layouts.user_type.auth')

@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-title text w-100 d-flex justify-content-between">
      <h4 class="fw-bold  mb-2">
          <span class=" text-muted fw-light">Galery  / </span> Edit Galery
        </h4>
        <div>
          <a class="btn btn-danger" role="button"  href="{{ route ('gallery') }}">
          <i class="fas fa-times-circle"></i>
            Batal
          </a>
        </div>
     </div>
      <hr>
        <form action="{{ route ('update-gallery', $gallery->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
        <div class="row">
            <div class="col-12 d-flex justify-content-center" >
            <div class="mb-3">
            <br>
             <img class="img-thumbnail" width="100px" src="{{ asset('/storage/'.$gallery->gallery)}}">
             </div>
          </div>
              <div class="col-12">
              <div class="mb-3">
                  <label for="jdl_gallery" class="form-label required" > Judul Galery </label>
                       <input type="text" name="jdl_gallery" id="jdl_gallery" placeholder="Judul Galery"
                        class="form-control" required autoComplete="off" value="{{ $gallery ->jdl_gallery }}"/>
                  </div>
              </div>
              <div class="col-12">
                    <div class="mb-3">
                      <label for="gallery" class="form-label">Foto Galery </label>
                      <input class="form-control" type="file" id="gallery" name="gallery" value="{{ $gallery ->gallery }}">
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
