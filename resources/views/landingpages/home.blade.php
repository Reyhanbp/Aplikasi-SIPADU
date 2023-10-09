<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/styles.css" rel="stylesheet" />
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
        .footer {
            border-radius: 50px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="brand">SIPADU</div>
    <div class="navbar-right">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#berita">Berita</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><button class="login-button btn btn-primary">Login</button></li>
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
                              </div>
                          </div>
                          <div class="col-lg-5 col-xl-7"><div class="bg-featured-blog">
                            <img class="ms-5" src="{{asset('assets/img/sipadu.png')}}" alt="">
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
             <!-- Remove the container if you want to extend the Footer to full width. -->
<div class="footer">
    <!-- Footer -->
    <footer
            class="text-center text-lg-start text-white"
            style="background-color: #161C28
            "
            >
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <img width="100px" src="{{asset('assets/img/LOGO S1.png')}}">
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
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
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
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Product</h5>

              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-white">Link 1</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Link 2</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Link 3</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Link 4</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->

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
  <!-- End of .container -->
</body>
</html>
