<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard &mdash; Yusi</title>

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
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total User</h4>
                  </div>
                  <div class="card-body">
                    {{ DB::table('users')->count() }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Artikel</h4>
                  </div>
                  <div class="card-body">
                    {{ DB::table('artikels')->count() }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Group</h4>
                  </div>
                  <div class="card-body">
                     {{ DB::table('posts')->count() }}
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          

          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header"  style="margin:0px; padding: 0px">
                  <h4  class="col-10 col-md-10 col-lg-10">Slider</h4>
                  {{-- <div>
                  <a href="{{ route('tambahSlider') }}" class="btn btn-primary" style="border-radius: 4px">
                    <i class="fas fa-edit"></i> 
                      Tambah Data
                  </a>
                </div> --}}
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                   {{-- @php $artikels = DB::table('artikels')->orderBy('created_at', 'desc')->get(); @endphp --}}
                    <table class="table table-bordered table-md">
                      <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Created</th>
                        <th>Action</th>
                      </tr>
                      @foreach($sliders as $slider)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img width="400px" src="{{ url('/images/'.$slider->file) }}"></td>
                        <td>{{ $slider->judul }}</td>
                        <td>{{ Carbon\Carbon::parse($slider->created_at)->diffForHumans() }}</td>
                        <td>
                          <a href="editSlider/{{ $slider->id }}" class="btn btn-success">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          {{-- <a type=submit href="deleteSlider/{{$slider->id}}" method="POST" class="btn btn-danger">
                            @csrf
                            @method('DELETE')  
                            <i class="fas fa-trash-alt"></i>
                          </a> --}}
                        </td>
                      </tr>
                      @endforeach
                    </table>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <nav class="d-inline-block">
                    {!! $sliders->links('admin.paginator') !!}
                  </nav>
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

<style>
  .w-5{
    display: none
  }
</style>

</body>
</html>
