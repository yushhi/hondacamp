<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>bs4 edit profile page - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
  <link href="assetsgroup/img/favicon.png" rel="icon">
  <link href="assetsgroup/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

     <!-- Vendor CSS Files -->
  <link href="assetsgroup/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assetsgroup/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assetsgroup/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assetsgroup/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assetsgroup/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assetsgroup/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assetsgroup/css/style.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Komunitas DPS</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#contact">Contact</a></li>
          <li class="drop-down"><a href="#" ><b>{{ Auth::user()->name }}</b></a>
            <ul>
              <li><a href="profile">Edit Profile</a></li>
              <li><a href="password">Edit Password</a></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

<div class="container" style="padding-top: 100px">
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
            <form method="POST" action="{{ route('profile.edit') }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="card-body">
                    <div class="e-profile">
                    <div class="row">
                        <div class="col-12 col-sm-auto mb-3">
                        <div class="mx-auto" style="width: 140px;">
                            <img src="/images/{{Auth::user()->avatar}}" class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                            <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                        </div>
                        </div>
                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $user->name }}</h4>
                            <p class="mb-0">{{ $user->email }}</p>
                            <div class="text-muted"><small>{{ $user->nomer_wa }}</small></div>
                            <div class="mt-2">
                                <input name="avatar" type="file" placeholder="Foto Profile">
                            </div>
                        </div>
                        <div class="text-center text-sm-right">
                            <p class="mb-0">{{ $user->provinsi }}, {{ $user->kabupaten }}</p>
                            <span class="badge badge-secondary">Angkatan {{ $user->angkatan }}</span>
                            <div class="text-muted"><small>Bergabung {{ $user->created_at->format('d M Y') }}</small></div>
                        </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                    </ul>
                    <div class="tab-content pt-3">
                        <div class="tab-pane active">
                        <form class="form" novalidate="">
                            <div class="row">
                            <div class="col">
                                <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                    <label>Nama</label>
                                    <input name="name" value="{{ old('name', $user->name) }}" autocomplete="name" autofocus class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                    <label>Nomer WA</label>
                                    <input class="form-control" type="number" name="nomer_wa" value="{{ old('name', $user->nomer_wa) }}" autocomplete="nomer_wa" >
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" placeholder="user@example.com" name="email" value="{{ old('name', $user->email) }}" autocomplete="email">
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                    <label>Provinsi</label>
                                    <input name="provinsi" value="{{ old('name', $user->provinsi) }}" autocomplete="provinsi" autofocus class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                    <label>Kabupaten</label>
                                    <input class="form-control" type="text" name="kabupaten" value="{{ old('name', $user->kabupaten) }}" autocomplete="kabupaten" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                    <label>Angkatan</label>
                                    <input class="form-control" type="text" name="angkatan" value="{{ old('name', $user->angkatan) }}" autocomplete="angkatan" >
                                    </div>
                                </div>

                                </div>
                            </div>
                            </div>
                            
                            <div class="row">
                            <div class="col d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit">Save Changes</button>
                            </div>
                            </div>
                        </form>

                        </div>
                    </div>
                    </div>
                </div>
            </form>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
              <button class="btn btn-block btn-secondary">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
              </button>
            </div>
          </div>
        </div>
       
      </div>
    </div>

  </div>
</div>
<!-- ======= Footer ======= -->
<footer id="footer" style="margin-top: 30px">

    

<div class="container d-md-flex py-4">

  <div class="mr-md-auto text-center text-md-left">
    <div class="copyright">
      &copy; Copyright <strong><span>Muslim Go Online</span></strong>. All Rights Reserved
    </div>
    <!-- <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div> -->
  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
  </div>
</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</div>

<style type="text/css">
body{
    margin-top:20px;
    background:#f8f8f8
}
</style>

<script type="text/javascript">

</script>
 <!-- Vendor JS Files -->
 <script src="assetsgroup/vendor/jquery/jquery.min.js"></script>
  <script src="assetsgroup/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assetsgroup/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assetsgroup/vendor/php-email-form/validate.js"></script>
  <script src="assetsgroup/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assetsgroup/vendor/counterup/counterup.min.js"></script>
  <script src="assetsgroup/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assetsgroup/vendor/venobox/venobox.min.js"></script>
  <script src="assetsgroup/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assetsgroup/js/main.js"></script>
</body>
</html>