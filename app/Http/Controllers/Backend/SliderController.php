<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $all_sliders = Slider::latest()->get();
        return view('backend.pages.slider_section.manage', compact('all_sliders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slider = new Slider();

        if( !is_null( $slider ) ){
            $slider->slider_title      = $request->slider_title;
            $slider->slider_desc       = $request->slider_desc;
            $slider->slider_bg         = $request->slider_bg;
            $slider->first_btn_link    = $request->first_btn_link;
            $slider->second_btn_link   = $request->second_btn_link;
            $slider->slider_type       = $request->slider_type;
            $slider->status            = $request->status;
            $sliderImg                 = $request->file('slider_img');

            if ( $sliderImg ) {
                $time                = microtime('.') * 10000;
                $imgName             = $time . $sliderImg->getClientOriginalName();
                $imgUploadPath       = ('public/image/backend/slider/');
                $sliderImg->move($imgUploadPath, $imgName);
                $productImgUrl       = $imgUploadPath . $imgName;
                $slider->slider_img	 = $productImgUrl;
            }

            // dd( $slider);
            $slider->save() ;

            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::find($id);

        if( !is_null( $slider ) ){
            $slider->slider_title      = $request->slider_title;
            $slider->slider_desc       = $request->slider_desc;
            $slider->slider_bg         = $request->slider_bg;
            $slider->first_btn_link    = $request->first_btn_link;
            $slider->second_btn_link   = $request->second_btn_link;
            $slider->slider_type       = $request->slider_type;
            $slider->status            = $request->status;
            $sliderImg                 = $request->file('slider_img');

            if ( $sliderImg ) {
                if( !empty ( $slider->slider_img ) ) {
                    if( file_exists($slider->slider_img) == ""){
                        unlink($slider->slider_img);
                    }
                    else if( file_exists($slider->slider_img) ){
                        unlink($slider->slider_img);
                    }
                }

                $time                = microtime('.') * 10000;
                $imgName             = $time . $sliderImg->getClientOriginalName();
                $imgUploadPath       = ('public/image/backend/slider/');
                $sliderImg->move($imgUploadPath, $imgName);
                $productImgUrl       = $imgUploadPath . $imgName;
                $slider->slider_img	 = $productImgUrl;
            }

            // dd( $slider);
            $slider->save() ;

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);

        if( !is_null( $slider ) ){
            // unlink specify one images from Product Data Table
            unlink($slider->slider_img);
            $slider->delete();

            return redirect()->back();
        }
    }
}
