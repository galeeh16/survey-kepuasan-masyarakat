<!--Nav Start-->
<nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
    <div class="container-fluid navbar-inner">
      @if (isset($show_logo) && $show_logo === 'show')
        <a href="/" class="navbar-brand d-flex" >
          <img src="{{ asset('logobaru.png') }}" style="height: 44px;"/>       
          <div>
            <h5 class="fw-bold text-dark">SKM</h5>
            <div style="font-size: 16px;" class="text-muted">Disnakertrans Cianjur</div>
          </div>
        </a>
      @endif

      <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
          <i class="icon">
           <svg width="20px" height="20px" viewBox="0 0 24 24">
              <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
          </svg>
          </i>
      </div>
   
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <span class="mt-2 navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav d-flex justify-content-end me-xl-4" style="flex: 1;">
          <li class="nav-item">
            <a class="nav-link text-reset" href="#layanan">Isi Survey</a>
          </li>
        </ul>

        <div class="navbar-nav ms-auto align-items-center navbar-list" style="height: 50px;">
          @if(session()->get('username'))
          <a href="{{ url('admin/dashboard') }}" class="me-4 text-reset">                           
            Admin Page
          </a>
          <a href="{{ url('auth/logout') }}" class="btn btn-primary">                           
            Logout
          </a>
          @else
          <a href="{{ url('login') }}" class="btn btn-primary">                           
            Login
          </a>
          @endif
        </div>
        
      </div>
     
    </div>

  </nav>          
  {{-- Nav End --}}