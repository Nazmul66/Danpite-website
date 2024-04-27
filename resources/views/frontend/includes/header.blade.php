<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <img src="{{ asset($setting->logo) }}" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="{{ route('home') }}" class="nav-item nav-link  @if ( request()->routeIs('home')) active @endif ">Home</a>
                <a href="{{ route('about') }}" class="nav-item nav-link @if ( request()->routeIs('about')) active @endif " >About</a>
                <a href="{{ route('service') }}" class="nav-item nav-link @if ( request()->routeIs('service')) active @endif ">Service</a>
                <a href="{{ route('project') }}" class="nav-item nav-link @if ( request()->routeIs('project')) active @endif ">Project</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('team') }}" class="dropdown-item ">Our Team</a>
                        <a href="{{ route('testimonial') }}" class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="nav-item nav-link @if( request()->routeIs('contact')) active @endif ">Contact</a>
            </div>
            <a href="https://wa.me/+8801799586688?text=I%20am%20interested" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Get Started</a>
        </div>
    </nav>

    <div class="container-xxl bg-primary hero-header">
        <div class="container px-lg-5">
            <div class="row g-5 align-items-end">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="text-white mb-4 animated slideInDown">{{$slider_data->slider_title}}</h1>
                    <p class="text-white pb-3 animated slideInDown">{{$slider_data->slider_desc}}</p>
                    <a href="{{$slider_data->first_btn_link}}}" class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Read More</a>
                    <a href="{{$slider_data->second_btn_link}}" class="btn btn-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact Us</a>
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <img class="img-fluid animated zoomIn" src="{{ asset($slider_data->slider_img) }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>


