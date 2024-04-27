@extends('frontend.layout.template')

@push('title')
     <title>DANPITE.TECH - Home Pages</title>
@endpush

@section('body-content')

<!-- Feature Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="row g-4">

            @foreach ($all_services as $service)
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-item bg-light rounded text-center p-4">
                        <i class="{{$service->service_icon}} text-primary mb-4"></i>
                        <h5 class="mb-3">{{$service->service_title}}</h5>
                        <p class="m-0">{{$service->service_desc}}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Feature End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <p class="section-title text-secondary">About Us<span></span></p>
                <h1 class="mb-5">{{$about->about_title}}</h1>
                <p class="mb-5">{{$about->about_desc}}</p>

                @foreach ($services as $service)
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">{{ $service->service_title }}</p>
                            <p class="mb-2">{{ $service->service_percent }}%</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="background-color: {{ $service->service_color }}!important" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                @endforeach

                <a href="{{ $about->about_btn }}" class="btn btn-primary py-sm-3 px-sm-5 rounded-pill mt-3">Read More</a>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{ asset( $about->about_img ) }}">
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Facts Start -->
<div class="container-xxl bg-primary fact py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-certificate fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{ $setting->years }}</h1>
                <p class="text-white mb-0">Years Experience</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-users-cog fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{ $setting->team_members }}</h1>
                <p class="text-white mb-0">Team Members</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-users fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{ $setting->satisfied_client }}</h1>
                <p class="text-white mb-0">Satisfied Clients</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                <i class="fa fa-check fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{ $setting->complete_projects }}</h1>
                <p class="text-white mb-0">Compleate Projects</p>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->


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


<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <p class="section-title text-secondary justify-content-center"><span></span>Our Projects<span></span></p>
            <h1 class="text-center mb-5">Recently Completed Projects</h1>
        </div>
        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
            <div class="col-12 text-center">
                <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter="*">All</li>
                    @foreach ($project_cats as $project_cat)
                       <li class="mx-2" data-filter=".{{ $project_cat->category_slug  }}">{{ $project_cat->category_name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row g-4 portfolio-container" style="position: relative; height: 966.376px;">
            
            @foreach ($projects as $project)
                <div class="col-lg-4 col-md-6 portfolio-item {{ $project->project_cat_name }} wow fadeInUp" data-wow-delay="0.1s" style="position: absolute; left: 0px; top: 0px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ $project->project_img }}" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ $project->project_img }}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ $project->project_link }}">
                                <i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="bg-light p-4">
                            <p class="text-primary fw-medium mb-2">{{ $project->project_title }}</p>
                            <h5 class="lh-base mb-0" style="font-size: 1rem;">{{ $project->project_desc }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Projects End -->


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


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>Our Team<span></span></p>
            <h1 class="text-center mb-5">Our Team Members</h1>
        </div>
        <div class="row g-4">

            @foreach ($teams as $team)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light rounded">
                        <div class="text-center border-bottom p-4">
                            <img class="img-fluid rounded-circle mb-4" style="height:325px" src="{{ $team->team_img }}" alt="">
                            <h5>{{ $team->team_title }}</h5>
                            <span>{{ $team->team_designation }}</span>
                        </div>
                        <div class="d-flex justify-content-center p-4">
                            <a href="{{ $team->insta_link }}" class="btn btn-square mx-1"><i class="fab fa-instagram"></i></a>
                            <a href="{{ $team->fb_link }}" class="btn btn-square mx-1"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $team->linkedin_link }}" class="btn btn-square mx-1"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</div>
<!-- Team End -->

@endsection
