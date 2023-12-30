<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
  <a class="navbar-brand" href="/home">Task Note</a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link @yield('acHome')" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @yield('acMatkul')" href="/mata-kuliah">Mata Kuliah</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @yield('acJadkul')" href="/jadwal-kuliah">Jadwal Kuliah</a>
        </li>
      </ul>
      <div class="dropdown">
        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        @yield('user')
        </a>
      
        <ul class="dropdown-menu">
          <li> <a href="/logout" class="dropdown-item">Logout</a></li>
        </ul>
      </div>
 
    </div>
  </div>
</nav>
