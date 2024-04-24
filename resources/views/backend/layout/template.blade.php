 @include('backend.includes.meta-tags')

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <!-- Menu ( sidebar.blade.php ) -->
         @include('backend.includes.sidebar')
        <!-- / Menu ( sidebar.blade.php ) -->

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Navbar ( header.blade.php ) -->
           @include('backend.includes.header')
          <!-- / Navbar ( header.blade.php ) -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

                <!-- ALl body content are here -->
                 @yield('body-content')
                <!-- ALl body content are here -->

            </div>
            <!-- / Content -->

            <!-- Footer ( footer.blade.php ) -->
              @include('backend.includes.footer')
            <!-- / Footer ( footer.blade.php ) -->

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

    <!-- Core JS ( scripts.blade.php ) -->
    @include('backend.includes.scripts')
    <!-- Core JS ( scripts.blade.php ) -->

  </body>
</html>
