@extends('layouts.user_type.guest')

@section('content')

   <main class="main-content  mt-0">
  <section>
    <div class="card-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="position-absolute top-0 h-100 d-md-block d-none me-n8">
              <div class="bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6">
                <br><br><br><br><br>
                <img src="{{asset('assets/img/1.png')}}" alt="" width="500px">
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex flex-column justify-content-center">
            <div class="card card-plain mt-8">
              <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Welcome Register</h3>
                <p class="mb-0">Buat Akun Baru Dan Nikmatilah<br></p>
                <p class="mb-0">Atau Login Dengan Akun Yang Sudah Ada</p>
              </div>
              <div class="card-body">
                <form role="form" method="POST" action="/session">
                  @csrf
                  <label>Email</label>
                  <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"  aria-label="Email" aria-describedby="email-addon">
                    @error('email')
                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <label>Password</label>
                  <div class="mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"  aria-label="Password" aria-describedby="password-addon">
                    @error('password')
                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>

                </form>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                 <div class="text-center">
                  <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Sign up</button>
                </div>
                <p class="text-sm mt-3 mb-0">Already have an account? <a href="login" class="text-info font-weight-bolder">Sign in</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>



@endsection

