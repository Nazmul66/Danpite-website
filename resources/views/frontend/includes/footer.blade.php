<div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-3">
                <p class="section-title text-white h5 mb-4">Address<span></span></p>
                <p><i class="fa fa-map-marker-alt me-3"></i>{{ $setting->address }}</p>
                 <p>
                    <a href="tel:{{ $setting->phone }}" style="color: #FFF"><i class="fa fa-phone-alt me-3"></i>{{ $setting->phone }}</a>
                 </p>
                  <p>
                    <a href="mailto:{{ $setting->email }}" style="color: #FFF"><i class="fa fa-envelope me-3"></i>{{ $setting->email }}</a>
                  </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="{{ $setting->fb_link }}"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ $setting->twitter_link }}"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ $setting->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <p class="section-title text-white h5 mb-4">Quick Link<span></span></p>
                <a class="btn btn-link" href="{{ route('about') }}">About Us</a>
                <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
                <a class="btn btn-link" href="">Privacy Policy</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
            </div>
            <div class="col-md-6 col-lg-3">
                <p class="section-title text-white h5 mb-4">Gallery<span></span></p>
                <div class="row g-2">
                    <div class="col-4">
                        <img class="img-fluid" src="{{ asset('frontend/img/portfolio-1.jpg') }}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid" src="{{ asset('frontend/img/portfolio-2.jpg') }}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid" src="{{ asset('frontend/img/portfolio-3.jpg') }}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid" src="{{ asset('frontend/img/portfolio-4.jpg') }}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid" src="{{ asset('frontend/img/portfolio-5.jpg') }}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid" src="{{ asset('frontend/img/portfolio-6.jpg') }}" alt="Image">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <p class="section-title text-white h5 mb-4">Newsletter<span></span></p>
                <p>Get in touch with our offers.</p>
                <div class="position-relative w-100 mt-3">
                    <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
                    <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-lg-5">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="">2024</a>, All Right Reserved. Designed & Developed By <a class="border-bottom" href="">{{ $setting->copyright }}</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
