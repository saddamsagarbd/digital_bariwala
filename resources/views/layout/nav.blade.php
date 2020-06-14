    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
          <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo" href="{{ url('/dashboard') }}"><img src="{{ asset('assets/images/logo-white.svg') }}" alt="logo"/></a>
              <a class="navbar-brand brand-logo-mini" href="{{ url('/dashboard') }}"><img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo"/></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                  <img src="https://via.placeholder.com/30x30" alt="profile"/>
                  <span class="nav-profile-name">{{ Session::get('first_name').' '.Session::get('last_name')}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                    <i class="mdi mdi-settings text-primary"></i>
                    Settings
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{url('/logout')}}">
                    <i class="mdi mdi-logout text-primary"></i>
                    Logout
                  </a>
                </div>
              </li>
              <li class="nav-item nav-toggler-item-right d-lg-none">
                <button class="navbar-toggler align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                  <span class="mdi mdi-menu"></span>
                </button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item" style="float: left;">
              <a class="nav-link" href="{{ url('/dashboard') }}">
                <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <?php
                $userType = Session::get('user_type');
                if($userType === 1){
            ?>
            <li class="nav-item" style="float: left;">
              <a class="nav-link" href="{{ url('/users') }}">
                <i class="fa fa-users menu-icon"></i>
                <span class="menu-title">Users</span>
              </a>
            </li>

            <?php
                }
            ?>
            <li class="nav-item" style="float: left;">
              <a class="nav-link" href="{{url('/apartments')}}">
                <i class="fa fa-building-o menu-icon"></i>
                <span class="menu-title">Apartments</span>
              </a>
            </li>
            <li class="nav-item" style="float: left;">
              <a class="nav-link" href="{{ url('/tanents') }}">
                <i class="fa fa-user-circle menu-icon"></i>
                <span class="menu-title">Tanents</span>
              </a>
            </li>
            <li class="nav-item" style="float: left;">
              <a href="#" class="nav-link">
                <i class="fa fa-calculator menu-icon"></i>
                <span class="menu-title">Accounts</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                  <!-- <li class="nav-item"><a class="nav-link" href="">Basic Elements</a></li> -->
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <!-- partial -->