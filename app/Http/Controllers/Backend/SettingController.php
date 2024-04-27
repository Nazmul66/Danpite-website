<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $setting = Setting::first();
        return view('backend.pages.setting_pages.manage', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $setting = new Setting();

        if( !is_null( $setting ) ){
            $settingLogo            = $request->logo;

            if ( $settingLogo ) {
                $time                = microtime('.') * 10000;
                $imgName             = $time . $settingLogo->getClientOriginalName();
                $imgUploadPath       = ('public/image/backend/uploads/');
                $settingLogo->move($imgUploadPath, $imgName);
                $settingImgUrl       = $imgUploadPath . $imgName;
                $setting->logo	 = $settingImgUrl;
            }

            $setting->whatsapp_link	          =  $request->whatsapp_link;
            $setting->address	              =  $request->address;
            $setting->phone	                  =  $request->phone;
            $setting->phone_optional          =  $request->phone_optional;
            $setting->email	                  =  $request->email;
            $setting->email_optional          =  $request->email_optional;
            $setting->copyright	              =  $request->copyright;
            $setting->fb_link	              =  $request->fb_link;
            $setting->twitter_link	          =  $request->twitter_link;
            $setting->linkedin_link	          =  $request->linkedin_link;
            $setting->pixel_FB                =  $request->pixel_FB;
            $setting->google_analytics        =  $request->google_analytics;
            $setting->chatbot	              =  $request->chatbot;
            $setting->years	                  =  $request->years;
            $setting->team_members	          =  $request->team_members;
            $setting->satisfied_client	      =  $request->satisfied_client;
            $setting->complete_projects	      =  $request->complete_projects;


            $setting->save();

            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $setting = Setting::find($id);

        if( !is_null( $setting ) ){
            $settingLogo            = $request->logo;

            if ( $settingLogo ) {

                if( !empty ( $setting->logo ) ) {
                    if( file_exists($setting->logo) == ""){
                        unlink($setting->logo);
                    }
                    else if( file_exists($setting->logo) ){
                        unlink($setting->logo);
                    }
                }

                $time                = microtime('.') * 10000;
                $imgName             = $time . $settingLogo->getClientOriginalName();
                $imgUploadPath       = ('public/image/backend/uploads/');
                $settingLogo->move($imgUploadPath, $imgName);
                $settingImgUrl       = $imgUploadPath . $imgName;
                $setting->logo	     = $settingImgUrl;
            }

            $setting->whatsapp_link	          =  $request->whatsapp_link;
            $setting->address	              =  $request->address;
            $setting->phone	                  =  $request->phone;
            $setting->phone_optional          =  $request->phone_optional;
            $setting->email	                  =  $request->email;
            $setting->email_optional          =  $request->email_optional;
            $setting->copyright	              =  $request->copyright;
            $setting->fb_link	              =  $request->fb_link;
            $setting->twitter_link	          =  $request->twitter_link;
            $setting->linkedin_link	          =  $request->linkedin_link;
            $setting->pixel_FB                =  $request->pixel_FB;
            $setting->google_analytics	      =  $request->google_analytics;
            $setting->chatbot	              =  $request->chatbot;
            $setting->years	                  =  $request->years;
            $setting->team_members	          =  $request->team_members;
            $setting->satisfied_client	      =  $request->satisfied_client;
            $setting->complete_projects	      =  $request->complete_projects;


            $setting->save();

            return redirect()->back();
        }
    }

}
