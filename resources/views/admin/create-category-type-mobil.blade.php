

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
                    <h4>Buat Tipe Jenis Mobil</h4>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('subcategory.store') }}" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="exampleFormControlSelect1">Pilih Kategori</label>
                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                          <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                          @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                          @endforeach
                        </select>
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Tipe</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="subcategoryname" class="form-control" placeholder="Type 1">
                          @error('subcategoryname')
                            <div class="error text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                          <button class="btn btn-primary">Create</button>
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

    @if(Session::has('statusArtikel'))
    <script>
        swal("Berhasil","{!! Session::get('statusArtikel') !!}", "success", {
        button:"OK",
        });
    </script>
    @endif


  <!-- Page Specific JS File -->
</body>
</html>
