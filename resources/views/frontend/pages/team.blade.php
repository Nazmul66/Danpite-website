@extends('frontend.layout.template')

@push('title')
     <title>DANPITE.TECH - Team Pages</title>
@endpush

@section('body-content')

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
