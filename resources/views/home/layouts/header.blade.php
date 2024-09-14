<style>
  .menu-active{
      color:white !important;
      font-weight: bold;
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

          <li class="nav-item menu-open">
              <a class="nav-link {{ Request::is('ppid') ? 'menu-active' : '' }}"aria-current="page" href="/ppid">Profil PPID</a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Request::is('infopublik') ? 'menu-active' : '' }}"aria-current="page" href="/infopublik">Informasi Publik</a>
          </li>
          
          <li class="nav-item">
              <a class="nav-link {{ Request::is('layananinfo') ? 'menu-active' : '' }}"aria-current="page" href="/layananinfo">Layanan Informasi</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('profile') ? 'menu-active' : '' }}"aria-current="page" href="/profile">Profile Bandara</a>
          </li>
        </ul>
        <form class="d-flex">
          <a href="/admin" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i /> Login</a>
        </form>
      </div>
    </div>
  </nav>
</header>