<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:rgba(0, 189, 41, 0.534)">
    <div class="container">
      <a class="navbar-brand" href="#">Azkaainurridho</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ request()->segment(1) == '' ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->segment(1) == 'about' ? 'active' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->segment(1) == 'post' ? 'active' : '' }} {{ request()->segment(1) == 'posts' ? 'active' : '' }}" href="/posts">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->segment(1) == 'categories' ? 'active' : '' }} {{ request()->segment(1) == 'category' ? 'active' : '' }}" href="/categories">Category</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">LogOut</button>
                  </form>
                </li>
              </ul>
            </li>
          @else
          <li class="nav-item d-flex align-items-center">
            <i class="bi bi-box-arrow-in-right" style="font-size: 25px; color:white"></i>
            <a href="/login" class="nav-link active">Sign In</a>
          </li>
          @endauth
        </ul>
        {{-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-dark" type="submit">Search</button>
        </form> --}}
      </div>
    </div>
  </nav>



  {{-- {{ request()->segment(1) == 'home' ? 'active' : '' }} --}}