<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  {{-- <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a> --}}

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- User Menu -->
        <li class="nav-item">
          <a href="/admin/kontent" class="nav-link {{ Request::is('admin/kontent*') ? 'active' : '' }}">
            <p>Kontent Branda</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/user" class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}">
            <p>User</p>
          </a>
        </li>

        <!-- Profile PPID Menu -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link {{ Request::is('admin/profile') || Request::is('admin/infopublik') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Profile PPID
              <i class="right fas fa-angle-left"></i>
            </p>  
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/profile" class="nav-link {{ Request::is('admin/profile') ? 'active' : '' }}">
                <p>Profile PPID</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/infopublik" class="nav-link {{ Request::is('admin/infopublik') ? 'active' : '' }}">
                <p>Tugas dan Fungsi</p>
              </a>
            </li>
            <!-- Add more items as needed -->
          </ul>
        </li>

        <!-- Informasi Publik Menu -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link {{ Request::is('admin/berkala') || Request::is('admin/serta-merta') || Request::is('admin/setiap-saat') || Request::is('admin/dikecualikan') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Informasi Publik
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/berkala" class="nav-link {{ Request::is('admin/berkala') ? 'active' : '' }}">
                <p>Berkala</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/serta-merta" class="nav-link {{ Request::is('admin/serta-merta') ? 'active' : '' }}">
                <p>Serta Merta</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/setiap-saat" class="nav-link {{ Request::is('admin/setiap-saat') ? 'active' : '' }}">
                <p>Setiap Saat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/dikecualikan" class="nav-link {{ Request::is('admin/dikecualikan') ? 'active' : '' }}">
                <p>Dikecualikan</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Profile Bandara Menu -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link {{ Request::is('admin/sejarah-singkat') || Request::is('admin/visi-misi') || Request::is('admin/tugas-fungsi') || Request::is('admin/struktur-organisasi') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Profile Bandara
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/sejarah-singkat" class="nav-link {{ Request::is('admin/sejarah-singkat') ? 'active' : '' }}">
                <p>Sejarah Singkat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/visi-misi" class="nav-link {{ Request::is('admin/visi-misi') ? 'active' : '' }}">
                <p>Visi dan Misi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/tugas-fungsi" class="nav-link {{ Request::is('admin/tugas-fungsi') ? 'active' : '' }}">
                <p>Tugas dan Fungsi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/struktur-organisasi" class="nav-link {{ Request::is('admin/struktur-organisasi') ? 'active' : '' }}">
                <p>Struktur Organisasi</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>
  <!-- /.sidebar -->
</aside>
