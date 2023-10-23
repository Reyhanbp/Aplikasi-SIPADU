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