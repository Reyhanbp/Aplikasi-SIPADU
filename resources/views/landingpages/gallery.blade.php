<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

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

    .konten-berita{
        font-size: 25px
    }
    
</style>

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
            <div class="col-lg-7 col-md-6 mb-4 mb-md-0 ">
                <img width="80px" src="{{asset('assets/img/LOGO S1.png')}}">
              <h5 class="text-uppercase">SIPADU</h5>
            </div>
            <!--Grid column-->


            <!--Grid column-->
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Address</h5>

              <ul class="list-unstyled mb-0">
                <li>
                  <p  class="text-white">JL Dukuh Menanggal Surabaya </p>
                </li>
                {{-- <li>
                  <a href="#!" class="text-white">Account information</a>
                </li>
                <li>
                  <a href="#!" class="text-white">About</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Contact Us</a>
                </li> --}}
              </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Contact Info</h5>

              <ul class="list-unstyled mb-0">
                <li>
                  <p class="text-white">+62 895-3302-85700</p>
                </li>
                <li>
                  <p class="text-white">reyhan@gmail.com</p>
                </li>
                <li>
                  <p  class="text-white"></a>
                </li>
                {{-- <li>
                  <p class="text-white">Covid Responde</p>
                </li> --}}
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