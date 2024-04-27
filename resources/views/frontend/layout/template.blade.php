
@include('frontend.includes.meta-tags')

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
           @include('frontend.includes.loader')
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
           @include('frontend.includes.header')
        <!-- Navbar & Hero End -->


                <!-- Whole body content -->

                    @yield('body-content')

                <!-- Whole body content -->


        <!-- Footer Start -->
        @include('frontend.includes.footer')
        <!-- Footer End -->

       @include('frontend.includes.scripts')

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    </div>

</body>

</html>
