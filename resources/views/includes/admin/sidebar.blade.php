<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#">Dashboard</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">Dashboard</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>

          <li>
            <a class="nav-link" href="/dashboard">
              <i class="fas fa-tachometer-alt"></i> 
              <span>Dashboard</span>
            </a>
          </li>

          <li>
            <a class="nav-link" href="{{ route('tambahGroup') }}">
              <i class="far fa-square"></i> 
              <span>Tambah Group</span>
            </a>
          </li>  

          <li>
            <a class="nav-link" href="{{ route('tambahArtikel') }}">
              <i class="far fa-clone"></i> 
              <span>Tambah Artikel</span>
            </a>
          </li>  

          <li>
            <a class="nav-link" href="{{ route('category.create') }}">
              <i class="far fa-clone"></i> 
              <span>Tambah Kategori</span>
            </a>
          </li> 
          
          <li>
            <a class="nav-link" href="{{ route('subcategory.create') }}">
              <i class="far fa-clone"></i> 
              <span>Tambah Type</span>
            </a>
          </li> 

          <li>
            <a class="nav-link" href="/slider">
              <i class="far fa-clone"></i> 
              <span>Slider</span>
            </a>
          </li>

          <li>
            <a class="nav-link" href="{{ route('category.index') }}">
              <i class="far fa-clone"></i> 
              <span>Category</span>
            </a>
          </li>
          
         
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="{{ route('logout') }}" 
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
          class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-sign-out-alt"></i> Logout
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
          </a>
        </div>
    </aside>
  </div>