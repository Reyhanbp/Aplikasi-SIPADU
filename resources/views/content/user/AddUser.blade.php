@extends('layouts.user_type.auth')


@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-title text w-100 d-flex justify-content-between">
      <h4 class="fw-bold mb-2">
          <span class=" text-muted fw-light">User  / </span> Add User
        </h4>
        <div>
          <a class="btn btn-danger" role="button"  href="{{route('user')}}">
          <i class="fas fa-times-circle "></i>
            Batal
          </a>
        </div>
     </div>
      <hr>
        <form action="{{route('Send-User')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
            <div class="row">
              <div class="col-6" >
                <div class="mb-3">
                  <label for="profil" class="required" >
                    Profil :
                  </label>
                  <input type="file" class="form-control" name="profil" required>
                </div>
              </div>
              <div class="col-6" >
                <div class="mb-3">
                  <label for="data_penduduk_id" class="required" >
                    Nama Penduduk :
                  </label>
                 <select
                  class="form-control"
                  name="data_penduduk_id"
                  placeholder="Pilih data_penduduk_id"
                  id="data_penduduk_id"
                  required
                >

                  <option value="">Pilih</option>
                  @foreach ($DataPenduduk as $item)
                  <option value="{{$item -> id}}">{{$item -> name}}</option>
                  @endforeach

                </select>
                </div>
              </div>
          <div class="col-6">
            <div class="mb-3">
              <label for="name" class="form-label required" > Username : </label>
              <input type="text" name="name" id="name" placeholder="Name"
                class="form-control" required autoComplete="off"  />
            </div>
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="password" class="form-label required" > Password : </label>
            <input type="text" name="password" id="password" placeholder="Password"
              class="form-control" required autoComplete="off"  />
          </div>
        </div>
          <div class="col-6">
            <div class="mb-3">
              <label for="email" class="form-label required" > Email : </label>
              <input type="email" name="email" id="email" placeholder="Email"
                class="form-control" required autoComplete="off"  />
            </div>
          </div>
          <div class="col-6">
              <div class="mb-3">
                <label for="user_group_id" class="form-label required"> User Group : </label>
                <select
                  class="form-control"
                  name="user_group_id"
                  placeholder="Pilih user_group_id"
                  id="user_group_id"
                  required
                >

                  <option value="">Pilih</option>
                  @foreach ($DataUserGroup as $user_group)
                  <option value="{{$user_group -> id}}">{{$user_group -> name}}</option>
                  @endforeach

                </select>
              </div>
            </div>
          <div class="col-6">
              <div class="mb-2">
                <label for="level" class="form-label required"> Level : </label>
                <select
                  class="form-control"
                  name="level"
                  placeholder="Pilih Level"
                  id="level"
                  required
                >
                  <option value="">Pilih</option>
                  <option value="admin">Admin</option>
                  <option value="warga">Warga</option>
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
            <button type="submit" class="btn btn-success btn-sm ms-auto mt-8 d-block">
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
