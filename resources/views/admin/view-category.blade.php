

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
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header"  style="margin:0px; padding: 0px">
                  <h4  class="col-10 col-md-10 col-lg-10">Daftar Kategori</h4>
                  <div>
                  <a href="{{ route('category.create') }}" class="btn btn-primary" style="border-radius: 4px">
                    <i class="fas fa-edit"></i> 
                      Tambah Kategori
                  </a>
                </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                   {{-- @php $artikels = DB::table('artikels')->orderBy('created_at', 'desc')->get(); @endphp --}}
                    <table class="table table-bordered table-md">
                      <tr>
                        <th>No</th>
                        <th>Jenis Mobil</th>
                        <th>Action</th>
                      </tr>
                      @foreach($categories as $category)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                          <div class="btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $category->categoryname }}
                            <div class="dropdown-menu">
                            @foreach($category->subcategories as $subcat)
                              <li>{{ $subcat->subcategoryname }}</li>
                            @endforeach
                          </div>
                          </div>
                        </td>
                        <td>
                          <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <a type=submit href="delete-artikel/{{$category->id}}" method="POST" class="btn btn-danger">
                            @csrf
                            @method('DELETE')  
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </table>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <nav class="d-inline-block">
                    {{-- {!! $artikels->links('admin.paginator') !!} --}}
                  </nav>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header"  style="margin:0px; padding: 0px">
                  <h4  class="col-10 col-md-10 col-lg-10">Daftar Jenis Mobil</h4>
                  <div>
                  <a href="{{ route('category.create') }}" class="btn btn-primary" style="border-radius: 4px">
                    <i class="fas fa-edit"></i> 
                      Tambah Jenis Mobil
                  </a>
                </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                   {{-- @php $artikels = DB::table('artikels')->orderBy('created_at', 'desc')->get(); @endphp --}}
                    <table class="table table-bordered table-md">
                      <tr>
                        <th>No</th>
                        <th>Jenis Mobil</th>
                        <th>Tipe Mobil</th>
                        <th>Action</th>
                      </tr>
                      @foreach($categories as $category)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                          {{ $category->categoryname }}
                          <td>
                            @foreach($category->subcategories as $subcat)
                              <li>{{ $subcat->subcategoryname }}</li>
                            @endforeach
                          </td>
                        </td>
                        <td>
                          <a href="/edit-artikel/{{ $category->id }}" class="btn btn-success">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <a type=submit href="delete-artikel/{{$category->id}}" method="POST" class="btn btn-danger">
                            @csrf
                            @method('DELETE')  
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </table>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <nav class="d-inline-block">
                    {{-- {!! $artikels->links('admin.paginator') !!} --}}
                  </nav>
                </div>
              </div>
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Kategori</h4>
                  </div>
                  <div class="card-body">
                    @foreach($categories as $category)
                        <div>
                          <h4>
                            {{ $category->categoryname }}
                          </h4>
                          <ul>
                            @foreach($category->subcategories as $subcat)
                              <li>{{ $subcat->subcategoryname }}</li>
                            @endforeach
                          </ul>
                        </div>
                        </ul>
                        <div style="width:30%; height:1px; background: rgb(136, 136, 136); margin-bottom: 10px"></div>
                    @endforeach
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
