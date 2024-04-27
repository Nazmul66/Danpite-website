<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class ABoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $about = About::orderBy('id', 'asc')->limit(1)->first();
        return view('backend.pages.about_pages.manage', compact("about"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $about = new About();

        if( !is_null( $about ) ){
            $about->about_title	 =  $request->about_title;
            $about->about_desc	 =  $request->about_desc;
            $about->about_btn	 =  $request->about_btn;
            $about->status	     =  $request->status;
            $aboutImg            = $request->about_img;

            if ( $aboutImg ) {
                $time                = microtime('.') * 10000;
                $imgName             = $time . $aboutImg->getClientOriginalName();
                $imgUploadPath       = ('public/image/backend/uploads/');
                $aboutImg->move($imgUploadPath, $imgName);
                $productImgUrl       = $imgUploadPath . $imgName;
                $about->about_img	 = $productImgUrl;
            }

            // dd($about);
            $about->save();

            return redirect()->back();
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $about = About::find($id);

        if( !is_null ( $about ) ){
        $about->about_title	 =  $request->about_title;
        $about->about_desc	 =  $request->about_desc;
        $about->about_btn	 =  $request->about_btn;
        $about->status	     =  $request->status;

        $aboutImg            = $request->file('about_img');
        $time                = microtime('.') * 10000;

        if ( $aboutImg ) {

            if( !empty ( $about->about_img ) ) {
                if( file_exists($about->about_img) == ""){
                    unlink($about->about_img);
                }
                else if( file_exists($about->about_img) ){
                    unlink($about->about_img);
                }
            }

            $time                = microtime('.') * 10000;
            $imgName             = $time . $aboutImg->getClientOriginalName();
            $imgUploadPath       = ('public/image/backend/uploads/');
            $aboutImg->move($imgUploadPath, $imgName);
            $productImgUrl       = $imgUploadPath . $imgName;
            $about->about_img	 = $productImgUrl;
        }

        $about->save();
        }

        return redirect()->back();
    }

}
