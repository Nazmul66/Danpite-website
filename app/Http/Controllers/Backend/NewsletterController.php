<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $newsletter = Newsletter::orderBy('id', 'asc')->limit(1)->first();
        return view('backend.pages.newsletter_section.manage', compact('newsletter'));
    }

      /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newsletter = new Newsletter();

        if( !is_null( $newsletter ) ){
            $newsletter->section_titles	  =  $request->section_titles;
            $newsletter->section_desc	  =  $request->section_desc;
            $newsletter->section_bg	      =  $request->section_bg;
            $newsletter->status           =  $request->status;
            $newsletter->save();

            return redirect()->back();
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newsletter = Newsletter::find($id);

        if( !is_null( $newsletter ) ){
            $newsletter->section_titles	  =  $request->section_titles;
            $newsletter->section_desc	  =  $request->section_desc;
            $newsletter->section_bg	      =  $request->section_bg;
            $newsletter->status           =  $request->status;
            $newsletter->save();

            return redirect()->back();
        }
    }
}
