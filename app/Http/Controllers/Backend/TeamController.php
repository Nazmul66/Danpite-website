<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $all_teams = Team::latest()->get();
        return view('backend.pages.team_pages.manage', compact('all_teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $team = new Team();

        if( !is_null( $team ) ){
            $team->team_title           = $request->team_title;
            $team->team_designation     = $request->team_designation;
            $team->fb_link              = $request->fb_link;
            $team->twitter_link         = $request->twitter_link;
            $team->linkedin_link        = $request->linkedin_link;
            $team->insta_link           = $request->insta_link;
            $team->status               = $request->status;
            $teamImg                    = $request->team_img;

            if ( $teamImg ) {
                $time                   = microtime('.') * 10000;
                $imgName                = $time . $teamImg->getClientOriginalName();
                $imgUploadPath          = ('public/image/backend/images/team/');
                $teamImg->move($imgUploadPath, $imgName);
                $productImgUrl          = $imgUploadPath . $imgName;
                $team->team_img	        = $productImgUrl;
            }

            $team->save();

            return  redirect()->back();
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team = Team::find($id);

        if( !is_null( $team ) ){
            $team->team_title           = $request->team_title;
            $team->team_designation     = $request->team_designation;
            $team->fb_link              = $request->fb_link;
            $team->twitter_link         = $request->twitter_link;
            $team->linkedin_link        = $request->linkedin_link;
            $team->insta_link           = $request->insta_link;
            $team->status               = $request->status;
            $teamImg                    = $request->team_img;

            if ( $teamImg ) {

                if( !empty ( $team->team_img ) ) {
                    if( file_exists($team->team_img) == ""){
                        unlink($team->team_img);
                    }
                    else if( file_exists($team->team_img) ){
                        unlink($team->team_img);
                    }
                }

                $time                   = microtime('.') * 10000;
                $imgName                = $time . $teamImg->getClientOriginalName();
                $imgUploadPath          = ('public/image/backend/images/team/');
                $teamImg->move($imgUploadPath, $imgName);
                $productImgUrl          = $imgUploadPath . $imgName;
                $team->team_img	        = $productImgUrl;
            }

            $team->save();

            return  redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::find($id);

        if( !is_null( $team ) ){
            // unlink specify one images from Product Data Table
            unlink($team->team_img);
            $team->delete();

            return redirect()->back();
        }
    }
}
