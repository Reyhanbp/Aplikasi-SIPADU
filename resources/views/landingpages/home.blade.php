<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/styles.css" rel="stylesheet"/>
    <style>
        /* Add styling to the navbar */
        .navbar {
            background-color: #fff;
            overflow: hidden;
            padding: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Style the product name on the left */
        .brand {
            float: left;
            font-size: 24px;
            font-weight: bold;
        }

        /* Style the navbar items on the right */
        .navbar-right {
            float: right;
            margin-right: 20px;
        }

        .navbar-right ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .navbar-right li {
            display: inline;
            margin-right: 20px;
        }

        .navbar-right a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            transition: color 0.5s;
        }

        .navbar-right a:hover {
          background-color: blue;
          color: #fff;
          border-radius: 30px;
          padding:10px 20px;
        }

        /* Style the login button */
        .login-button {
            background-color: blue;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: bold;
        }

        .login-button-wrapper {
            display: inline-block;
            margin-right: 20px;
        }

    </style>

</head>
<body>

<div class="navbar">
    <div class="brand">
             <img class="ms-2" width="50px" src="{{asset('assets/img/LOGO S1.png')}}">
        SIPADU</div>
    <div class="navbar-right">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#berita">Berita</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li>
                <a class="login-button btn btn-primary" role="button" href="{{url('login')}}">Login</a>
            </li>
        </ul>

    </div>
</div>
<div class="card border-0 overflow-hidden ms-5 mt-1" >
            <div class="card-body p-0">
                      <div class="row gx-0">
                          <div class="col-lg-6 col-xl-5 py-lg-5">
                              <div class="p-4 p-md-5">
                                  <div class="h1 fw-bolder mb-3">Selamat Datang Di Desa</div>
                                  <p class="mb-2">Sebuah aplikasi sistem pendataan penduduk untuk membantu amankan data penduduk anda</p>
                                  <button class="btn btn-primary">next-></button>
                              </div>
                          </div>
                          <div class="col-lg-5 col-xl-7"><div class="bg-featured-blog">
                            <img class="ms-5" src="{{asset('assets/img/sipadu.png')}}" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            </div>
              <div class="container" style="margin-top: 10%">
                <div class="row justify-content-center">
                    <!-- Left Column for Image -->
                    <div class="col-lg-4 col-xl-4 mt-5">
                        <div class="card border-0 overflow-hidden">
                            <div class="card-body p-0">
                                <div class="bg-featured-blog">
                                    <img class="ms-5" src="{{asset('assets/img/desc.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column for Paragraph -->
                    <div class="col-lg-8 col-xl-8 mt-5">
                        <div class="card border-0 overflow-hidden">
                            <div class="card-body p-4 p-md-5">
                                   @foreach ($data as $data)
                                <div class="h1 fw-bolder mb-3">{{$data->jdl_kita}}</div>
                                <p class="mb-2">
                                   {{$data->desc_kita}}
                                </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10%">
              <div class="text-center"><h1>Data Penduduk</h1></div>
              <div class="row mt-5">
                  <div class="col-lg-3 col-md-6 mb-4">
                      <div class="card bg-primary">
                        <div class="card-body">
                            <h1 class="card-text text-white text-center">{{$penduduk}}</h1>
                            <p class="card-text text-center text-white"><small class="text-white">Jumlah Data</small></p>
                        </div>
                        <h5 class="card-title text-white text-center">DATA PENDUDUK</h5>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-4">
                      <div class="card bg-primary">
                        <div class="card-body">
                            <h1 class="card-text text-white text-center">{{$datakk}}</h1>
                            <p class="card-text text-center text-white"><small class="text-white">Jumlah Data</small></p>
                        </div>
                        <h5 class="card-title text-white text-center">DATA KARTU KELUARGA</h5>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-4">
                      <div class="card bg-primary">
                        <div class="card-body">
                            <h1 class="card-text text-white text-center">{{$pendatang}}</h1>
                            <p class="card-text text-center text-white"><small class="text-white">Jumlah Data</small></p>
                        </div>
                        <h5 class="card-title text-white text-center">DATA PENDATANG</h5>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-4">
                      <div class="card bg-primary">
                        <div class="card-body">
                            <h1 class="card-text text-white text-center">{{$pindah}}</h1>
                            <p class="card-text text-center text-white"><small class="text-white">Jumlah Data</small></p>
                        </div>
                        <h5 class="card-title text-white text-center">DATA PINDAH</h5>
                    </div>
                  </div>
              </div>

    <div>
  <div class="p-4 p-md-4">
  <h1 class="berita fw-bolder p-4"> Berita Terkini</h1>
  <div class="container">
    <div class="row">
        @foreach ($datasan->take(3) as $index => $datassan)
        <div class="col-lg-4 mb-4">
            <div class="card border-0">
                <img src="{{asset('/storage/'.$datassan->foto)}}" class="card-img-top" alt="Card Image" style="height: 300px">
                <div class="card-body">
                    <h5 class="card-title">{{$datassan->jdl_berita}}</h5>
                    <p class="card-text">{{ implode(' ', array_slice(explode(' ', $datassan->desc_berita), 0, 8)) }}</p>
                    <a type="button" href="{{ route('detailberita', ['id' => $datassan->id]) }}" class="btn btn-primary" >Selengkapnya</a type="button" href="">
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

</div>

<div>
  <div class="p-4 p-md-4">
    <h1 class="gallery fw-bolder p-4"> Gallery Terkini</h1>

    <div class="container ">
      <div class="row">
               @foreach ($datas->take(8) as $index => $datass)
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-0">
                <img src="{{asset('/storage/'.$datass->gallery)}}" class="card-img-top"  data-bs-toggle="modal" data-bs-target="#exampleModal{{ $index }}" alt="Card Image" style="width: 250px; height: 250px;" >
                <div class="card-body" >
                    <h5 class="card-title" >{{$datass->jdl_gallery}}</h5>
                </div>
            </div>
        </div>
         <div class="modal fade" id="exampleModal{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$datass->jdl_gallery}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <img src="{{asset('/storage/'.$datass->gallery)}}" class="card-img-top" alt="Card Image" >
                </div>
                
                </div>
            </div>
        </div>
        @endforeach
    </div>

  </div>

</div>

<div class="footer">
    <!-- Footer -->
    <footer
            class="text-center text-lg-start text-white pt-3 "
            style="background-color: #161C28
            "
            >
      <!-- Grid container -->
      <div class="container p-4 pb-3">
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-lg-7 col-md-6 mb-4 mb-md-0">
                <img width="80px" src="{{asset('assets/img/LOGO S1.png')}}">
              <h5 class="text-uppercase">SIPADU</h5>
            </div>
            <!--Grid column-->


            <!--Grid column-->
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Support</h5>

              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-white">Help Centre</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Account information</a>
                </li>
                <li>
                  <a href="#!" class="text-white">About</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Contact Us</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Help and Solution</h5>

              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-white">Talk to Support</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Support docs</a>
                </li>
                <li>
                  <a href="#!" class="text-white">System status</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Covid Responde</a>
                </li>
              </ul>
            </div>
          </div>
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div
           class="text-center p-3"
           style="background-color: rgba(0, 0, 0, 0.2)"
           >
        © 2020 Copyright : Aplikasi Sipadu

      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
