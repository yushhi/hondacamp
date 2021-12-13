<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary" style="box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%); border-radius: 8px">
    <div class="card-header text-center">
      <a href="/assets/index2.html" class="h1">Komunitas<b>DPS</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <input name="name" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" autofocus type="text" class="form-control" placeholder="Nama Lengkap">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="email" type="email" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" autofocus type="text" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input name="nomer_wa" type="number" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" autofocus type="text" class="form-control" placeholder="Nomer WA">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fab fa-whatsapp"></i>
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
          <input  name="password" type="password" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" autofocus type="text" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input  name="password_confirmation" type="password" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" autofocus type="text" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input name="provinsi" type="text" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" class="form-control" autofocus type="text" placeholder="Provinsi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-globe-americas"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input name="kabupaten" type="text" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" class="form-control" autofocus type="text" placeholder="Kabupaten">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-globe-americas"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="angkatan" type="number" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" class="form-control" autofocus type="text" placeholder="Angkatan Ke :">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-users"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="avatar" type="file" placeholder="Foto Profile">
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
          <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>
</body>
</html>
