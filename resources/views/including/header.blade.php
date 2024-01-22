<nav class="navbar navbar-expand-lg bg-secondary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" style="color: white" href="#">{{ config('app.name') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" style="color: white" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white" href="{{ route('games.index') }}">Games</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" style="color: white" href="{{ route('logout') }}">Logout</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" style="color: white" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white" href="{{ route('register') }}">Register</a>
          </li>
          @endauth
        </ul>
      </div>
      <div>
        <span style="color:white">@auth Welcome, {{ auth()->user()->name }}!@endauth</span>
      </div>
    </div>
  </nav>