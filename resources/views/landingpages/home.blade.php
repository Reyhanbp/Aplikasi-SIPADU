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

</body>
</html>
