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
            <div class="container">
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
                                <div class="h1 fw-bolder mb-3">Tentang Deskripsi Desa</div>
                                <p class="mb-2">
                                    Sebuah aplikasi sistem pendataan penduduk untuk membantu amankan data penduduk anda. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non leo eu nisi fermentum interdum. Phasellus id justo eu ipsum dapibus semper a a tortor. Proin ullamcorper a libero at iaculis. Nunc eget risus eu purus dignissim bibendum. Sed ac nunc vitae sapien interdum rhoncus. Suspendisse cursus purus non aliquam vestibulum. Nulla facilisi. Vestibulum dapibus fringilla orci, a condimentum tortor. Fusce bibendum tristique malesuada. Vivamus et mauris a libero volutpat vehicula a non libero. Fusce nec nisl ut mi placerat consectetur ut ac arcu. In hac habitasse platea dictumst. Phasellus eget auctor justo. Nulla facilisi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>          
            <div class="container" style="margin-top: 10%">
              <div class="text-center"><h1>Data Penduduk</h1></div>
              <div class="row mt-5">
                  <div class="col-lg-3 col-md-6 mb-4">
                      <div class="card">
                          <img src="{{asset('assets/img/team-1.jpg')}}" class="card-img-top" alt="Profile Image 1">
                          <div class="card-body">
                              <h5 class="card-title">Name Data Penduduk</h5>
                          </div>
                      </div>
                  </div>
          
                  <div class="col-lg-3 col-md-6 mb-4">
                      <div class="card">
                          <img src="{{asset('assets/img/team-2.jpg')}}" class="card-img-top" alt="Profile Image 2">
                          <div class="card-body">
                              <h5 class="card-title">Name Data Penduduk</h5>
                          </div>
                      </div>
                  </div>
          
                  <div class="col-lg-3 col-md-6 mb-4">
                      <div class="card">
                          <img src="{{asset('assets/img/team-3.jpg')}}" class="card-img-top" alt="Profile Image 3">
                          <div class="card-body">
                              <h5 class="card-title">Name Data Penduduk</h5>
                          </div>
                      </div>
                  </div>
          
                  <div class="col-lg-3 col-md-6 mb-4">
                      <div class="card">
                          <img src="{{asset('assets/img/team-4.jpg')}}" class="card-img-top" alt="Profile Image 4">
                          <div class="card-body">
                              <h5 class="card-title">Name Data Penduduk</h5>
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
