<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Buku Aplikasi</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li><a class="nav-link" href="{{ route("dashboard") }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
          <li class="menu-header">Buku</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book"></i> <span>Buku</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route("kategoriBuku") }}">Kategori Buku</a></li>
              <li><a class="nav-link" href="{{ route("buku") }}">Data Buku</a></li>
            </ul>
          </li>
        </ul>
    </aside>
  </div>