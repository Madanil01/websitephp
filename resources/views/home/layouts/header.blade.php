<style>
  .menu-active{
      color:white !important;
      font-weight: bold;
  }
  .nav-item.dropdown:hover .dropdown-menu {
    display: block;
}
</style>

<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container">
      <a class="navbar-brand" href="login">Website Bandara</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
              <a class="nav-link {{ Request::is('/') ? 'menu-active' : '' }}"aria-current="page" href="/">Beranda</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Request::is('ppid*') ? 'active' : '' }}" href="/ppid" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Profil PPID
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <!-- <li><a class="dropdown-item {{ Request::is('ppid') ? 'active' : '' }}" href="/ppid">Profil PPID</a></li> -->
              <!-- <li><hr class="dropdown-divider"></li> -->
              <li><a class="dropdown-item" href="#">Profile PPID</a></li>
              <li><a class="dropdown-item" href="#">Tugas Dan Fungi</a></li>
              <li><a class="dropdown-item" href="/ppid/visi-misi">Visi Misi</a></li>
              <li><a class="dropdown-item" href="#">Regulasi</a></li>
              <li><a class="dropdown-item" href="#">Kontak</a></li>
            </ul>
          </li>


          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle {{ Request::is('infopublik') ? 'menu-active' : '' }}"aria-current="page" href="/infopublik" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Informasi Publik</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <!-- <li><a class="dropdown-item {{ Request::is('ppid') ? 'active' : '' }}" href="/ppid">Profil PPID</a></li> -->
              <!-- <li><hr class="dropdown-divider"></li> -->
              <li><a class="dropdown-item" href="#">Informasi Berkala</a></li>
              <li><a class="dropdown-item" href="#">Informasi Serta Merta</a></li>
              <li><a class="dropdown-item" href="#">Informasi Setiap Saat</a></li>
              <li><a class="dropdown-item" href="#">Dikecualikan</a></li>
            </ul>
            </li>
          
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle {{ Request::is('layananinfo') ? 'menu-active' : '' }}"aria-current="page" href="/layananinfo" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Layanan Informasi</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Maklumat Pelayanan</a></li>
                <li><a class="dropdown-item" href="#">Prosedur Permohonan Informasi</a></li>
                <li><a class="dropdown-item" href="#">Prosedur Permohonan Keberatan Informasi</a></li>
                <li><a class="dropdown-item" href="#">Prosedur Sengketa Informasi Publik</a></li>
                <li><a class="dropdown-item" href="#">Laporan Layanan Publik</a></li>
                <li><a class="dropdown-item" href="#">Formulir Permohonan Keberatan Informasi Publik</a></li>
              </ul>

            </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Request::is('profile') ? 'menu-active' : '' }}"aria-current="page" href="/profile" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile Bandara</a>
             <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Sejarah Singkat</a></li>
                <li><a class="dropdown-item" href="#">Visi dan Misi</a></li>
                <li><a class="dropdown-item" href="#">Tugas dan Fungsi</a></li>
                <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                <li><a class="dropdown-item" href="#">Fasilitas Sisi Udara</a></li>
                <li><a class="dropdown-item" href="#">Fasilitas SIsi Darat</a></li>
              </ul>
          </li>
        </ul>
        <form class="d-flex gap-2">
           @guest
              <!-- Jika pengguna belum login, tampilkan link login dan register -->
              <a href="/login" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</a>
              <a href="/register" class="btn btn-primary"><i class="fas fa-user-plus"></i> Sign Up</a>
            @else
            <div class="d-flex gap-2">
            <!-- Jika pengguna sudah login, tampilkan tombol logout -->
              <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-sign-out-alt"></i> Sign Out
                </button>
              </form> -->
              <a href="{{ route('admin_home') }}" class="btn btn-primary"> Admin Page</a>
              
            </div>
              
            @endguest
        </form>
      </div>
    </div>
  </nav>
</header>