<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>SKM</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/png" href="{{ asset('logobaru.png') }}" />
      
      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />
      
      <!-- Aos Animation Css -->
      <link rel="stylesheet" href="{{ asset('assets/vendor/aos/dist/aos.css') }}" />
      
      <!-- Hope Ui Design System Css -->
      <link rel="stylesheet" href="{{ asset('assets/css/mycustom.css?v=1.0.3') }}" />
      
      <!-- Custom Css -->
      <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?v=1.2.0') }}" />
      
      <!-- Customizer Css -->
      <link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css') }}" />

      <link rel="stylesheet" href="{{ asset('assets/js/sweetalert/sweetalert2.min.css') }}">

      <style>
        html, body { 
            color: #2f3036;
        }
        .sidebar-default .sidebar-list .navbar-nav .nav-item .nav-link:not(.disabled) {
            display: flex;
            white-space: normal;
        }
      </style>
      
      @yield('css')
  </head>
  <body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>    
    </div>
    <!-- loader END -->
    
    @include('layouts.sidebar')
      
    <main class="main-content">
      <div class="position-relative">

        @include('layouts.navbar')

      </div>

      <div class="conatiner-fluid content-inner ">
        @yield('content')
      </div>

    </main>
    <!-- Wrapper End-->

    <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/external.min.js') }}"></script>
    <script src="{{ asset('assets/js/hope-ui.js') }}" defer></script>

    <script src="{{ asset('jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/active-sidebar.js') }}?v=1.0.0"></script>

    <script src="{{ asset('assets/js/sweetalert/sweetalert2@11.js') }}"></script>

	{{-- <script src="{{ asset('assets/js/jquery-validation/jquery-validate.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('assets/js/jquery-validation/additional-methods.js') }}"></script> --}}
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    @yield('script')
  </body>
</html>