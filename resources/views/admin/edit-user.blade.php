<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Forms &rsaquo; Editor &mdash; Stisla</title>

  <!-- General CSS Files -->
  @include('includes.admin.style')

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('includes.admin.navbar')
      @include('includes.admin.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Editor</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Editor</div>
            </div>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit User</h4>
                  </div>
                  <div class="card-body">
                    <form action="/updateUser/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama User</label>
                      <div class="col-sm-12 col-md-7">
                        <input name="name" style="background-color: #cdcdcd" class="form-control" value="{{ $user->name }}">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                      <div class="col-sm-12 col-md-7">
                        <input name="email" style="background-color: #cdcdcd" class="form-control" disabled value="{{ $user->email }}">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomer WA</label>
                      <div class="col-sm-12 col-md-7">
                       <input name="nomer_wa" style="background-color: #cdcdcd" class="form-control" disabled value="{{ $user->nomer_wa }}">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Mobil</label>
                      <div class="col-sm-12 col-md-7">
                        <input name="category_id" style="background-color: #cdcdcd" class="form-control" disabled value="{{ $user->category_id }}">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe Mobil</label>
                      <div class="col-sm-12 col-md-7">
                        <input name="subcategory_id" style="background-color: #cdcdcd" class="form-control" disabled value="{{ $user->subcategory_id }}">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomer Angka</label>
                      <div class="col-sm-12 col-md-7">
                        <input name="nomer_angka" style="background-color: #cdcdcd" class="form-control" disabled value="{{ $user->nomer_angka }}">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomer Mesin</label>
                      <div class="col-sm-12 col-md-7">
                        <input name="nomer_mesin" style="background-color: #cdcdcd" class="form-control" disabled value="{{ $user->nomer_mesin }}">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                      <div class="col-sm-12 col-md-7">
                        <input name="alamat" style="background-color: #cdcdcd" class="form-control" disabled value="{{ $user->alamat }}">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama User</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control" value="{{ $user->role }}" name="role">
                          <option value="pending">Pending</option>
                          <option value="reject">Reject</option>
                          <option value="approve">Approve</option>
                        </select>
                      </div>
                    </div>
                  </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>
      </div>
      @include('includes.admin.footer')
    </div>
  </div>

  @include('includes.admin.script')
  <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

  <script>
    ClassicEditor
        .create( document.querySelector( '#task-textarea' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>

    @if(Session::has('statusSlider'))
    <script>
        swal("Berhasil","{!! Session::get('statusSlider') !!}", "success", {
        button:"OK",
        });
    </script>
    @endif


  <!-- Page Specific JS File -->
</body>
</html>
