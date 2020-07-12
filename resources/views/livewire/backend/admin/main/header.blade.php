<div>
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white fixed-top" style="border-top: 5px solid #517ef8;">
    <div class="container">
      <a href="{{ route('dashboard.index') }}" class="navbar-brand">
        <img src="{{ asset('/uploads/images/logo/favicon.png') }}" alt="zaelani.id" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light"><strong> Zaelani.id</strong></span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fas fa-bars"></i> Update</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li>
                <a href="{{ route('categories.index') }}" class="dropdown-item"><i class="nav-icon fa fa-folder"></i> Categories</a>
              </li>
              <li>
                <a href="{{ route('tags.index') }}" class="dropdown-item"><i class="nav-icon fa fa-tag"></i> Tags</a>
              </li>
              <li>
                <a href="{{ route('posts.index') }}" class="dropdown-item"><i class="nav-icon fas fa-copy"></i> Posts</a>
              </li>
              <li>
                <a href="#" class="dropdown-item"><i class="nav-icon far fa-calendar-alt"></i> Agenda</a>
              </li>
              
              <li class="dropdown-divider"></li>
              
              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                  </li>

                  <!-- Level three dropdown-->
                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                    </ul>
                  </li>
                  <!-- End Level three -->

                  <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-award"></i> Media</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li>
                <a tabindex="#" href="#" class="dropdown-item"><i class="nav-icon far fa-image"></i> Slider</a>
              </li>
              <li>
                <a href="#" class="dropdown-item"><i class="nav-icon far fa-image"></i> Galery Photo</a>
              </li>
              <li>
                <a href="#" class="dropdown-item"><i class="nav-icon far fa-image"></i> Galeri Video</a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="fa fa-users"></i> Users</a>
          </li>
        </ul>
        
        <!-- SEARCH FORM -->
        
      </div>
      
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
       
        <!-- Notifications Dropdown Menu -->
        
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" 
          aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-user-circle"></i> {{ auth()->user()->name }}</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li>
              <a class="dropdown-item" href="{{ route('root') }}" target="_blank"><i class="fa fa-external-link-alt"></i> View Site</a>
            </li>
            <livewire:backend.admin.logout />
          </ul>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
          </li> --}}
        </ul>
      </div>
    </nav>
  </div>
  