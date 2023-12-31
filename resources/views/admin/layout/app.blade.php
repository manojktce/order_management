@include('admin.includes.head')

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  @include('admin.includes.navbar')
  
  @include('admin.includes.sidemenu')
  
  @yield('content')
  
  @include('admin.includes.footer')
  @include('admin.includes.scripts')
  @stack('js')
  @include('admin.includes.custom_script')
  </div>

</body>
</html>
<!-- ./wrapper -->