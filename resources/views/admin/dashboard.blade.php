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
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
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
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
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
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Komentar</h4>
                  </div>
                  <div class="card-body">
                    1,201
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Online Users</h4>
                  </div>
                  <div class="card-body">
                    47
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header"  style="margin:0px; padding: 0px">
                  <h4  class="col-10 col-md-10 col-lg-10">User</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    @php $users = DB::table('users')->orderBy('created_at', 'desc')->latest()->simplePaginate(5); @endphp
                    <table class="table table-bordered table-md">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      @foreach($users as $user)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                          <a href="editUser/{{ $user->id }}" class="btn btn-success">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <a type=submit href="deleteUser/{{$user->id}}" method="POST" class="btn btn-danger">
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
                    {!! $users->links('admin.paginator') !!}
                  </nav>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header"  style="margin:0px; padding: 0px">
                  <h4  class="col-10 col-md-10 col-lg-10">Artikel</h4>
                  <div>
                  <a href="{{ route('tambahArtikel') }}" class="btn btn-primary" style="border-radius: 4px">
                    <i class="fas fa-edit"></i> 
                      Tambah Artikel
                  </a>
                </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                   {{-- @php $artikels = DB::table('artikels')->orderBy('created_at', 'desc')->get(); @endphp --}}
                    <table class="table table-bordered table-md">
                      <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>keterangan</th>
                        <th>Created</th>
                        <th>Action</th>
                      </tr>
                      @foreach($artikels as $artikel)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img width="120px" src="{{ url('/images/'.$artikel->file) }}"></td>
                        <td>{{ $artikel->judul }}</td>
                        <td style="width: 400px"> {!! \Illuminate\Support\Str::limit($artikel->keterangan, 180, '.....') !!}</td>
                        <td>{{ Carbon\Carbon::parse($artikel->created_at)->diffForHumans() }}</td>
                        <td>
                          <a href="/edit-artikel/{{ $artikel->id }}" class="btn btn-success">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <a type=submit href="delete-artikel/{{$artikel->id}}" method="POST" class="btn btn-danger">
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
                    {!! $artikels->links('admin.paginator') !!}
                  </nav>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header"  style="margin:0px; padding: 0px">
                  <h4  class="col-10 col-md-10 col-lg-10">Group</h4>
                  <div>
                  <a href="{{ route('tambahGroup') }}" class="btn btn-primary" style="border-radius: 4px">
                    <i class="fas fa-edit"></i> 
                      Tambah Group
                  </a>
                </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                   @php $groups = DB::table('posts')->orderBy('created_at', 'desc')->get(); @endphp
                    <table class="table table-bordered table-md">
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>keterangan</th>
                        <th>Created</th>
                        <th>Action</th>
                      </tr>
                      @foreach($groups as $group)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $group->title }}</td>
                        <td style="width: 400px"> {!! \Illuminate\Support\Str::limit($group->body, 180, '.....') !!}</td>
                        <td>{{ Carbon\Carbon::parse($group->created_at)->diffForHumans() }}</td>
                        <td>
                          <a href="/edit-group/{{ $group->id }}" class="btn btn-success">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <a type=submit href="delete-group/{{$group->id}}" method="POST" class="btn btn-danger">
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
                    {{-- {!! $groups->links('admin.paginator') !!} --}}
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
