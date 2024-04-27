@extends('frontend.layout.template')

@push('title')
     <title>DANPITE.TECH - About Pages</title>
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
