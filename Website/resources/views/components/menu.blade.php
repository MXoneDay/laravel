<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="/">
        {{-- <img src="" width="112" height="28"> --}} LOGO
      </a>
    </div>
  
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item"href="{{ url('/') }}">
                Home
            </a>
            <a class="navbar-item" href="{{ url('/regels') }}">
                Regels
            </a>
            <a class="navbar-item" href="{{ url('/kalender') }}">
                Kalender
            </a>
            <a class="navbar-item" href="{{ url('/uitslagen') }}">
                Uitslagen
            </a>
            <a class="navbar-item" href="{{ url('/FIA') }}">
                FIA
            </a>
            <a class="navbar-item" href="{{ url('/drivers') }}">
                Coureurs
            </a>
        </div>
  </nav>