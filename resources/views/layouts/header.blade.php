<div class="navbar-custom">
  <ul class="list-unstyled topnav-menu float-right mb-0">

    <!-- Notifications -->
    <li class="dropdown notification-list">
      <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button">
        <i class="fe-bell noti-icon"></i>
        <span class="badge badge-danger rounded-circle noti-icon-badge">3</span>
      </a>
    </li>

    <!-- User Profile -->
    <li class="dropdown notification-list">
      <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button">
        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
        <span class="d-none d-sm-inline-block ml-1">{{ auth()->user()->name ?? 'Guest' }}</span>
        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right profile-dropdown">
        <a href="#" class="dropdown-item notify-item">
          <i class="fe-user"></i> <span>Profile</span>
        </a>
        <a href="{{ route('logout') }}" class="dropdown-item notify-item"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fe-log-out"></i> <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </li>
  </ul>

  <div class="logo-box">
    <a href="{{ url('/dashboard') }}" class="logo text-center">
      <span class="logo-lg">
        <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="22">
      </span>
    </a>
  </div>

  <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
    <li>
      <button class="button-menu-mobile waves-effect">
        <i class="fe-menu"></i>
      </button>
    </li>
  </ul>
</div>
