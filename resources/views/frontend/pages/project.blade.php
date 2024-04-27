@extends('frontend.layout.template')

@push('title')
     <title>DANPITE.TECH - Project Pages</title>
@endpush

@section('body-content')

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

@endsection
