<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Komunitas DPS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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

  <!-- =======================================================
  * Template Name: Resi - v2.2.1
  * Template URL: https://bootstrapmade.com/resi-free-bootstrap-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

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

  @yield('content')

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

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