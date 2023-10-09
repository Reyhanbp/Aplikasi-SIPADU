@extends('layouts.user_type.auth')

@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-title text w-100 d-flex justify-content-between">
      <h4 class="fw-bold mb-2">
          <span class=" text-muted fw-light">Kotak Saran  / </span> Tambah Kotak Saran
        </h4>
        <div>
          <a class="btn btn-danger" role="button"  href="{{ route ('kotaksaran') }}">
          <i class="fas fa-times-circle"></i>
            Batal
          </a>
        </div>
     </div>
      <hr>
        <form action="{{route('Send-kotaksaran')}}" method="POST" enctype="multipart/form-data" >
          @csrf
        <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="">
                <input type="hidden" name="users_id" id="users_id" placeholder="Judul Berita"
                      value="{{ Auth()->user()->id }}"/>
                </div>
            </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="desc_saran" class="form-label required" > Deskripsi Saran </label>
                        <textarea class="form-control" id="desc_saran" name="desc_saran" rows="3" placeholder="Deskripsi"></textarea>
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
