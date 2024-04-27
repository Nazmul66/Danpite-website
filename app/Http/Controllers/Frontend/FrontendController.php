<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Service;
use App\Models\Team;
use App\Models\Newsletter;
use App\Models\Testimonial;
use App\Models\Project;
use App\Models\ProjectCat;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $all_services   = Service::inRandomOrder()->limit(3)->get();
        $about          = About:: first();
        $teams          = Team::latest()->get();
        $services       = Service::orderBy('service_title', 'asc')->skip(2)->limit(4)->get();
        $newsletter   = Newsletter::first();
        $testimonials = Testimonial::inRandomOrder()->get();
        $project_cats  = ProjectCat::latest()->get(); 
        $projects      = Project::latest()->get(); 
        return view('frontend.pages.home',compact('all_services', 'about', 'teams', 'services', 'newsletter', 'testimonials', 'projects', 'project_cats'));
    }

    /**
     * Display a listing of the resource.
     */
    public function about()
    {
        $all_services   = Service::inRandomOrder()->limit(3)->get();
        $about          = About:: first();
        $teams          = Team::latest()->get();
        $services       = Service::orderBy('service_title', 'asc')->skip(2)->limit(4)->get();
        return view('frontend.pages.about',['all_services'=>$all_services, 'about'=> $about, 'teams'=> $teams, 'services' => $services]);
    }


    /**
     * Display a listing of the resource.
     */
    public function service()
    {
        $all_services = Service::latest()->get();
        $newsletter   = Newsletter::first();
        $testimonials = Testimonial::inRandomOrder()->get();
        return view('frontend.pages.service', compact('all_services', 'newsletter', 'testimonials'));
    }


    /**
     * Display a listing of the resource.
     */
    public function project()
    {
        $project_cats  = ProjectCat::latest()->get(); 
        $projects      = Project::latest()->get(); 
        return view('frontend.pages.project', compact('projects', 'project_cats'));
    }


    /**
     * Display a listing of the resource.
     */
    public function contact()
    {
        return view('frontend.pages.contact');
    }


    /**
     * Display a listing of the resource.
     */
    public function team()
    {
        $teams  = Team::latest()->get();
        return view('frontend.pages.team', compact('teams'));
    }


    /**
     * Display a listing of the resource.
     */
    public function testimonial()
    {
        $testimonials = Testimonial::inRandomOrder()->get();
        return view('frontend.pages.testimonial', compact('testimonials'));
    }


}
