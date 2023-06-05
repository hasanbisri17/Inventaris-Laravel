<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <nav class="navbar navbar-expand-lg main-navbar">
      <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
      </form>
      <ul class="navbar-nav navbar-right">

        @if($user || $emp)
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('dist/img/avatar/avatar-1.png') }}" class="rounded-circle mr-2">
            <div class="d-sm-none d-lg-inline-block">
              {{ $name }}
            </div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form id="logout-form" action="{{ $logout }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        @endif
      </ul>
    </nav>

    <!-- Main Sidebar -->
    @include('template.sidebar')
