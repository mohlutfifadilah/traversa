@section('title', 'Admin | Dashboard')
@include('admin.template.header')
  <body>
    @include('sweetalert::alert')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        @include('admin.template.sidebar')

        <!-- Layout container -->
        <div class="layout-page">

            @include('admin.template.navbar')

          <!-- Content wrapper -->
          <div class="content-wrapper">

            @yield('content')

            @include('admin.template.footer')

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    @include('admin.template.javascript')
  </body>
</html>
