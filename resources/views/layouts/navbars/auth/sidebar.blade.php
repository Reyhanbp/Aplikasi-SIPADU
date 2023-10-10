<section class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
        <img src="../assets/img/LOGO S1.png" class="navbar-brand-img h-100" alt="...">
        <span class="ms-3 font-weight-bold">Aplikasi-SIPADU</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">

  <!-- Navbar collapse div -->
  <div class="" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}" href="{{ url('dashboard') }}">
          <div class="ms-2">
            <i class="fas fa-home"></i>
              <span class="ms-3 nav-link-text ms-1">Dashboard</span>
          </div>
        </a>
      </li>
      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Content</h6>
      </li>
      <li class="nav-item">
      <a class="nav-link {{ (Request::is('user') ? 'active' : '') }}" href="{{ route('user') }}">
             <div class="ms-2">
            <i class="fas fa-user"></i>
              <span class="ms-3 nav-link-text ms-1">User</span>
          </div>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('user-group') ? 'active' : '') }}" href="{{ route('user-group') }}">
            <div class="ms-2">
            <i class="fas fa-users-cog"></i>
              <span class="ms-3 nav-link-text ms-1">User Group</span>
            </div>
          </a>
      </li>
      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pages</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
           <div class="ms-2">
            <i class="fas fa-users"></i>
              <span class="ms-3 nav-link-text ms-1">Kelola Data Penduduk</span>
          </div>
        </a>
      </li>
      <li class="collapse" id="collapseExample" >
        <a class="nav-link" href="{{ url('static-sign-up') }}">
           <div class="ms-4">
            <i class="fas fa-circle"></i>
              <span class="ms-3 nav-link-text ms-1">Total Penduduk</span>
          </div>
        </a>
      </li>
      <li class="collapse" id="collapseExample" >
        <a class="nav-link {{ (Request::is('datapenduduk') ? 'active' : '') }}" href="{{ route('datapenduduk') }}">
           <div class="ms-4">
            <i class="fas fa-circle"></i>
              <span class="ms-3 nav-link-text ms-1">Data Penduduk</span>
          </div>
        </a>
      </li>
      <li class="collapse" id="collapseExample" >
        <a class="nav-link" href="{{ url('static-sign-up') }}">
           <div class="ms-4">
            <i class="fas fa-circle"></i>
              <span class="ms-3 nav-link-text ms-1">Pendatang</span>
          </div>
        </a>
      </li>
      <li class="collapse" id="collapseExample" >
        <a class="nav-link" href="{{ url('melahirkan') }}">
           <div class="ms-4">
            <i class="fas fa-circle"></i>
              <span class="ms-3 nav-link-text ms-1">Meninggal</span>
          </div>
        </a>
      </li>
      <li class="collapse" id="collapseExample" >
        <a class="nav-link  {{ (Request::is('melahirkan') ? 'active' : '') }}" href="{{ url('melahirkan') }}">
           <div class="ms-4">
            <i class="fas fa-circle"></i>
              <span class="ms-3 nav-link-text ms-1">Melahirkan</span>
          </div>
        </a>
      </li>
      <li class="collapse" id="collapseExample" >
        <a class="nav-link" href="{{ url('static-sign-up') }}">
           <div class="ms-4">
            <i class="fas fa-circle"></i>
              <span class="ms-3 nav-link-text ms-1">Pindah</span>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('data-kk') ? 'active' : '') }}" href="{{ route('data-kk') }}">
            <div class="ms-2">
            <i class="fas fa-user-friends"></i>
              <span class="ms-3 nav-link-text s-1">Data Kartu Keluarga</span>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('gallery') ? 'active' : '') }}" href="{{ route('gallery') }}">
           <div class="ms-2">
            <i class="fas fa-camera"></i>
              <span class="ms-3 nav-link-text ">Galery</span>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('berita') ? 'active' : '') }}" href="{{ route('berita') }}">
            <div class="ms-2">
            <i class="fas fa-book-open"></i>
              <span class="ms-3 nav-link-text ms-1">Berita</span>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('pengumuman') ? 'active' : '') }}" href="{{ url('pengumuman') }}">
           <div class="ms-2">
            <i class="fas fa-chalkboard-teacher"></i>
              <span class="ms-3 nav-link-text ">Pengumuman</span>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('kotaksaran') ? 'active' : '') }}" href="{{ url('kotaksaran') }}">
           <div class="ms-2">
            <i class="fas fa-inbox"></i>
              <span class="ms-3 nav-link-text ms-1">Kotak Saran</span>
          </div>
        </a>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laporan</h6>
      </li>
       <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
           <div class="ms-2">
            <i class="fas fa-book"></i>
              <span class="ms-3 nav-link-text ms-1">Data Laporan</span>
          </div>
        </a>
      </li>
     <li class="collapse" id="collapseExample2" >
        <a class="nav-link" href="{{ url('static-sign-up') }}">
           <div class="ms-4">
            <i class="fas fa-circle"></i>
              <span class="ms-3 nav-link-text ms-1">Total Penduduk</span>
          </div>
        </a>
      </li>
      <li class="collapse" id="collapseExample2" >
        <a class="nav-link" href="{{ url('static-sign-up') }}">
           <div class="ms-4">
            <i class="fas fa-circle"></i>
              <span class="ms-3 nav-link-text ms-1">Pendatang</span>
          </div>
        </a>
      </li>
      <li class="collapse" id="collapseExample2" >
        <a class="nav-link" href="{{ url('static-sign-up') }}">
           <div class="ms-4">
            <i class="fas fa-circle"></i>
              <span class="ms-3 nav-link-text ms-1">Tetap</span>
          </div>
        </a>
      </li>
      <li class="collapse" id="collapseExample2" >
        <a class="nav-link" href="{{ url('static-sign-up') }}">
           <div class="ms-4">
            <i class="fas fa-circle"></i>
              <span class="ms-3 nav-link-text ms-1">Meninggal</span>
          </div>
        </a>
      </li>
      <li class="collapse" id="collapseExample2" >
        <a class="nav-link " href="{{ url('melahirkan') }}">
           <div class="ms-4">
            <i class="fas fa-circle"></i>
              <span class="ms-3 nav-link-text ms-1">Melahirkan</span>
          </div>
        </a>
      </li>
    </ul>
  </div>

</section>
