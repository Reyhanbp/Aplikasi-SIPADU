@extends('layouts.user_type.auth')

@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-title text w-100 d-flex justify-content-between">
      <h4 class="fw-bold  mb-2">
          <span class=" text-muted fw-light">Berita  / </span> Edit Berita
        </h4>
        <div>
          <a class="btn btn-danger" role="button"  href="{{ route ('berita') }}">
          <i class="fas fa-times-circle"></i>
            Batal
          </a>
        </div>
     </div>
      <hr>
        <form action="{{ route ('update-berita', $Berita->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
        <div class="row">
            <div class="col-12 d-flex justify-content-center" >
            <div class="mb-3">
            <br>
             <img class="img-thumbnail" width="100px" src="{{ asset('/storage/'.$Berita->foto)}}">
             </div>
          </div>
              <div class="col-12">
                    <div class="mb-3">
                      <label for="foto" class="form-label">Foto </label>
                      <input class="form-control" type="file" id="foto" name="foto">
                    </div>
                </div>
          <div class="col-12">
            <div class="mb-3">
                <label for="jdl_berita" class="form-label required" > Judul Berita </label>
                     <input type="text" name="jdl_berita" id="jdl_berita" placeholder="Judul Berita"
                      class="form-control" required autoComplete="off" value="{{ $Berita ->jdl_berita }}"/>
                </div>
            </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="desc_berita" class="form-label required" > Deskripsi Berita </label>
                        <textarea class="form-control" id="desc_berita" name="desc_berita" rows="3" placeholder="Deskripsi">{{ $Berita ->desc_berita }}</textarea>
                    </div>
                </div>
                 <div class="col-12">
                    <div class="mb-5">
                        <label for="link" class="form-label" > Link <span class=" text-danger"> (Opsional)  </span> </label><br>
                          @if ($Berita->link)
                            <label>Link yang sudah diunggah : <a href="{{ Storage::url($Berita->link) }}">{{ $Berita->link }}</a></label>
                        @else
                            <label>Belum ada link diunggah.</label>
                        @endif
                        <input type="url" name="link" id="link" placeholder="Link Tambahan"
                          class="form-control" autoComplete="off" value="{{ $Berita->link }}"/>
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
