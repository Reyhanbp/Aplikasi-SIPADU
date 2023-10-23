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

<div class="container">
    <h1 class="mt-5">Berita</h1>
    <div class="card mb-3 mt-5 border-0" style="max-width: 700px; ">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{asset('assets/img/team-3.jpg')}}" class="img-fluid rounded-start"  alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body mt-1 ms-">
              <h1 class="card-title ">Judul Berita</h1>
              <p class="card-text"> corrupte Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto ab qui illum? Repellendus voluptatum expedita aut provident non, laborum molestias odio quisquam laudantium accusantium pariatur cum, ipsam possimus debitis ipsa.</p>
              <button type="button" class="btn btn-primary">Primary</button>
            </div>
          </div>
          <div class="col-md-4">
            <img src="{{asset('assets/img/team-3.jpg')}}" class="img-fluid rounded-start"  alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body mt-1 ms-">
              <h1 class="card-title ">Judul Berita</h1>
              <p class="card-text"> corrupte Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto ab qui illum? Repellendus voluptatum expedita aut provident non, laborum molestias odio quisquam laudantium accusantium pariatur cum, ipsam possimus debitis ipsa.</p>
              <button type="button" class="btn btn-primary">Primary</button>
            </div>
          </div>
          <div class="col-md-4">
            <img src="{{asset('assets/img/team-3.jpg')}}" class="img-fluid rounded-start"  alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body mt-1 ms-">
              <h1 class="card-title ">Judul Berita</h1>
              <p class="card-text"> corrupte Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto ab qui illum? Repellendus voluptatum expedita aut provident non, laborum molestias odio quisquam laudantium accusantium pariatur cum, ipsam possimus debitis ipsa.</p>
              <button type="button" class="btn btn-primary">Primary</button>
            </div>
          </div>
          <div class="col-md-4">
            <img src="{{asset('assets/img/team-3.jpg')}}" class="img-fluid rounded-start"  alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body mt-1 ms-">
              <h1 class="card-title ">Judul Berita</h1>
              <p class="card-text"> corrupte Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto ab qui illum? Repellendus voluptatum expedita aut provident non, laborum molestias odio quisquam laudantium accusantium pariatur cum, ipsam possimus debitis ipsa.</p>
              <button type="button" class="btn btn-primary">Primary</button>
            </div>
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
    
</div>