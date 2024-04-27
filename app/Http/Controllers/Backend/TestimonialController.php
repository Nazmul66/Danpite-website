<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $all_testimonials = Testimonial::latest()->get();
        return view('backend.pages.testimonial_section.manage', compact('all_testimonials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $testimonial = new Testimonial;

        if( !is_null( $testimonial ) ){
            $testimonial->test_title           = $request->test_title;
            $testimonial->test_desc            = $request->test_desc;
            $testimonial->business_type        = $request->business_type;
            $testimonial->test_link            = $request->test_link;
            $testimonial->status               = $request->status;
            $testimonialImg                    = $request->test_img;

            if ( $testimonialImg ) {
                $time                         = microtime('.') * 10000;
                $imgName                      = $time . $testimonialImg->getClientOriginalName();
                $imgUploadPath                = ('public/image/backend/images/testimonial/');
                $testimonialImg->move($imgUploadPath, $imgName);
                $productImgUrl                = $imgUploadPath . $imgName;
                $testimonial->test_img	      = $productImgUrl;
            }

            $testimonial->save();

            return  redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimonial = Testimonial::find($id);

        if( !is_null( $testimonial ) ){
            $testimonial->test_title           = $request->test_title;
            $testimonial->test_desc            = $request->test_desc;
            $testimonial->business_type        = $request->business_type;
            $testimonial->test_link            = $request->test_link;
            $testimonial->status               = $request->status;
            $testimonialImg                    = $request->test_img;

            if ( $testimonialImg ) {

                if( !empty ( $testimonial->test_img ) ) {
                    if( file_exists($testimonial->test_img) == ""){
                        unlink($testimonial->test_img);
                    }
                    else if( file_exists($testimonial->test_img) ){
                        unlink($testimonial->test_img);
                    }
                }

                $time                         = microtime('.') * 10000;
                $imgName                      = $time . $testimonialImg->getClientOriginalName();
                $imgUploadPath                = ('public/image/backend/images/testimonial/');
                $testimonialImg->move($imgUploadPath, $imgName);
                $productImgUrl                = $imgUploadPath . $imgName;
                $testimonial->test_img	      = $productImgUrl;
            }

            $testimonial->save();

            return  redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            $testimonial = Testimonial::find($id);

            if( !is_null( $testimonial ) ){
                // unlink specify one images from Product Data Table
                unlink($testimonial->test_img);
                $testimonial->delete();

                return redirect()->back();
            }
        }
    }
}
