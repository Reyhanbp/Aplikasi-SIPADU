<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 mt-4 shadow-none border-radius-xl bg-white"  id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">{{ str_replace('-', ' ', Request::path()) }}</li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
        </nav>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
            <div class="navbar-nav align-items-center">
                @component('components.current-time')
                    @endcomponent
                        <span id="current-time" class="ms-1">
                        </span>
                </div>
            <ul class="navbar-nav ms-2 justify-content-end">

            <li class="nav-item d-flex align-items-center">
                <a href="{{ url('/logout')}}" class="nav-link text-body font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">Sign Out</span>
                </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
                </a>
            </li>

            <li class="nav-item dropdown px-3 pe-2 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-cog cursor-pointer"></i>
                </a>
                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                          <div class="d-flex  py-1">
                      <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        <img src="/storage/{{ Auth()->user()->profil }}" alt="profile" class="avatar avatar-sm bg-gradient-white  me-3">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-semibold d-block">{{Auth()->user()->name}}</span>
                      <small class="text-muted">{{Auth()->user()->level}}</small>
                    </div>
                    </div>
                    </a>
                </li>
                <hr class="horizontal dark mt-0">
                <li>
                    <a class="dropdown-item" href="{{route('user-profile')}}" >
                        <img src="{{asset('assets/img/user (2).png')}}" alt="profile" class="avatar avatar-sm bg-gradient-white  me-3">
                        <span class="align-middle">My Profile</span>
                    </a>
                </li>
                <li>
                @if (auth()->user()->level == "admin")
                    <a class="dropdown-item" href="{{route('pengumuman')}}">
                        <img src="{{asset('assets/img/megaphone.png')}}" alt="profile" class="avatar avatar-sm bg-gradient-white  me-3">
                        <span class="align-middle">Pengumuman</span>
                    </a>
                </li>
                @else
                <li>
                    <a class="dropdown-item" href="{{route('detailpengumuman')}}">
                        <img src="{{asset('assets/img/megaphone.png')}}" alt="profile" class="avatar avatar-sm bg-gradient-white  me-3">
                        <span class="align-middle">Pengumuman</span>
                    </a>
                </li>
                @endif
                <li>
                    <a class="dropdown-item" href="{{route('settings')}}" >
                        <img src="{{asset('assets/img/settings.png')}}" alt="profile" class="avatar avatar-sm bg-gradient-white  me-3">
                        <span class="align-middle">Settings</span>
                    </a>
                </li>
                </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>
   <script>
      function updateClock() {
      const now = new Date();
      const timeElement = document.getElementById("current-time");

      const hours = now.getHours().toString().padStart(2, "0");
      const minutes = now.getMinutes().toString().padStart(2, "0");
      const seconds = now.getSeconds().toString().padStart(2, "0");

      const currentTimeString = `${hours}:${minutes}:${seconds}`;

      timeElement.textContent = currentTimeString;
      }

      // Update the clock every second
       setInterval(updateClock, 1000);
         // Initial update
            updateClock();
            </script>
            <script>
            function updateClock() {
              const now = new Date();
                const timeElement = document.getElementById("current-time");

                const hours = now.getHours().toString().padStart(2, "0");
                const minutes = now.getMinutes().toString().padStart(2, "0");
                const seconds = now.getSeconds().toString().padStart(2, "0");

                const currentTimeString = `${hours}:${minutes}:${seconds}`;

                timeElement.textContent = currentTimeString;
            }

            setInterval(updateClock, 1000);
            updateClock();
            </script>
<!-- End Navbar -->
