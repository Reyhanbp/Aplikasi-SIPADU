
@extends('layouts.user_type.auth')


@section('content')
<div class="card">
    <div class="card-header">
      <div class="card-title text w-100 d-flex justify-content-between">
      <h4 class="fw-bold mb-2">
          <span class=" text-muted fw-light">User  / </span> Edit User
        </h4>
        <div>
          <a class="btn btn-danger" role="button"   href="{{route('user')}}">
          <i class="fas fa-times-circle "></i>
            Batal
          </a>
        </div>
     </div>
      <hr>
      <form action="{{ route ('update-User', $user->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
        <div class="col-12 d-flex justify-content-center" >
            <div class="mb-3">
              <label for="profil">
                Profil :
              </label>
              <input type="file" class="form-control" name="profil"  value="{{ $user -> profil }}">
            </div>
          </div>
        <div class="row">
          <div class="col-6">
            <div class="mb-3">
              <label for="name" class="form-label required" > Name : </label>
              <input type="text" name="name" id="name" placeholder="Name"  value="{{ $user -> name }}"
                class="form-control" required autoComplete="off"  />
            </div>
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="password" class="form-label required" > Password : </label>
            <input type="password" name="password" id="password" placeholder="Password"  value=""
              class="form-control" required autoComplete="off"  value="{{ $user -> password }}" />
          </div>
        </div>
          <div class="col-6">
            <div class="mb-3">
              <label for="email" class="form-label required" > Email : </label>
              <input type="email" name="email" id="email" placeholder="Email"   value="{{ $user -> email }}"
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
                  <option value="{{ $user_group->id }}" @if ($user->user_group_id === $user_group->id) selected @endif>
                    {{ $user_group->name }}
                  </option>
                @endforeach
                </select>
              </div>
            </div>
          <div class="col-6">
              <div class="mb-3">
                <label for="level" class="form-label required"> Level : </label>
                <select
                  class="form-control"
                  name="level"
                  placeholder="Pilih Level"
                  id="level"
                  required
                >
                <option  value="">Pilih</option>
                @foreach ($availableLevels as $availableLevel)
                    <option value="{{ $availableLevel }}" @if ($user->level === $availableLevel) selected @endif>
                      {{ ucfirst($availableLevel) }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="jenis_kelamin" class="form-label required"> Jenis Kelamin : </label>
                <select
                  class="form-control"
                  name="jenis_kelamin"
                  placeholder="Pilih jenis_kelamin"
                  id="jenis_kelamin"
                  required


                >
                  <option selected>{{$user->jenis_kelamin}}</option>
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
