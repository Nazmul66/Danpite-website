@extends('frontend.layout.template')

@push('title')
     <title>DANPITE.TECH - Service Pages</title>
@endpush

@section('body-content')

 <!-- Service Start -->
 <div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>Our Services<span></span></p>
            <h1 class="text-center mb-5">What Solutions We Provide</h1>
        </div>

        <div class="row g-4">

            @foreach ($all_services as $all_service)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex flex-column text-center rounded">
                        <div class="service-icon flex-shrink-0">
                            <i class="{{ $all_service->service_icon }}"></i>
                        </div>
                        <h5 class="mb-3">{{ $all_service->service_title }}</h5>
                        <p class="m-0">{{ $all_service->service_desc }}</p>
                        <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Newsletter Start -->
<div class="container-xxl bg-primary newsletter py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <p class="section-title text-white justify-content-center"><span></span>Newsletter<span></span></p>
                <h1 class="text-center text-white mb-4">{{ $newsletter->section_titles }}</h1>
                <p class="text-white mb-4">{{ $newsletter->section_desc }}</p>
                <div class="position-relative w-100 mt-3">
                    <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Enter Your Email" style="height: 48px;">
                    <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <p class="section-title text-secondary justify-content-center"><span></span>Testimonial<span></span></p>
        <h1 class="text-center mb-5">What Say Our Clients!</h1>
        <div class="owl-carousel testimonial-carousel">

            @foreach ($testimonials as $testimonial)
                <div class="testimonial-item bg-light rounded my-4">
                    <p class="fs-8"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>{{ $testimonial->test_desc }}</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ $testimonial->test_img }}" style="width: 65px; height: 65px;">
                        <div class="ps-4">
                            <h5 class="mb-1"><a href="{{ $testimonial->test_link }}" target="_blank">{{ $testimonial->test_title }}</a></h5>
                            <span>{{ $testimonial->business_type }}</span>
                        </div>
                    </div>
                </div>  
            @endforeach
        </div>
    </div>
</div>
<!-- Testimonial End -->

@endsection
