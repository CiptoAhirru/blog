<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
    <a class="navbar-brand" href="#">TOQU-TOQU</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
          <a class="nav-link" href="/home">Home</a>
        </li>
        <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item {{ Request::is('categories') ? 'active' : '' }}">
          <a class="nav-link" href="/categories">Categories</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
      @auth
      {{-- <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">Dashboard</a>
      </li>
      <li class="nav-item">
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="nav-link bg-danger border-0">
            <i class="bi bi-box-arrow-right"></i>
            Logout
          </button>
        </form>
      </li> --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dashboard">
              <i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="bi bi-box-arrow-right"></i>
                  Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
        @else
          <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
            <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
        @endauth
      </ul>
    </div>
    </div>
  </nav>