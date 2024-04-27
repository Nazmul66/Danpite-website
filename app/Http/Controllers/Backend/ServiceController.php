<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $all_services = Service::latest()->get();
         return view('backend.pages.service_section.manage', compact('all_services'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $service = new Service();

        if( !is_null( $service ) ){
            $service->service_title      = $request->service_title;
            $service->service_slug       =  Str::slug($request->service_title);
            $service->service_desc       = $request->service_desc;
            $service->service_icon       = Str::lower($request->service_icon);
            $service->service_percent    = $request->service_percent;
            $service->service_color      = $request->service_color;
            $service->status             = $request->status;
            $serviceImg                 = $request->service_img;

            if ( $serviceImg ) {
                $time                   = microtime('.') * 10000;
                $imgName                = $time . $serviceImg->getClientOriginalName();
                $imgUploadPath          = ('public/image/backend/images/service/');
                $serviceImg->move($imgUploadPath, $imgName);
                $productImgUrl          = $imgUploadPath . $imgName;
                $service->service_img	= $productImgUrl;
            }

            $service->save();

            return  redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::find($id);

        if( !is_null( $service ) ){
            $service->service_title      = $request->service_title;
            $service->service_slug       =  Str::slug($request->service_title);
            $service->service_desc       = $request->service_desc;
            $service->service_icon       = Str::lower($request->service_icon);
            $service->service_percent    = $request->service_percent;
            $service->service_color      = $request->service_color;
            $service->status             = $request->status;
            $serviceImg                 = $request->service_img;

            if ( $serviceImg ) {

                if( !empty ( $service->service_img ) ) {
                    if( file_exists($service->service_img) == ""){
                        unlink($service->service_img);
                    }
                    else if( file_exists($service->service_img) ){
                        unlink($service->service_img);
                    }
                }

                $time                   = microtime('.') * 10000;
                $imgName                = $time . $serviceImg->getClientOriginalName();
                $imgUploadPath          = ('public/image/backend/images/service/');
                $serviceImg->move($imgUploadPath, $imgName);
                $productImgUrl          = $imgUploadPath . $imgName;
                $service->service_img	= $productImgUrl;
            }

            $service->save();

            return  redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);

        if( !is_null( $service ) ){
            // unlink specify one images from Product Data Table
            unlink($service->service_img);
            $service->delete();

            return redirect()->back();
        }
    }
}
