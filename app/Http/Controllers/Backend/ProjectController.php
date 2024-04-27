<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
         /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $projects = Project::latest()->get();
        $projectCats = ProjectCat::latest()->get();
        return view('backend.pages.project_Section.manage', compact("projects", 'projectCats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = new Project();

        if( !is_null( $project ) ){
            $project->project_cat_name	 =  $request->project_cat_name;
            $project->project_title	     =  $request->project_title;
            $project->project_slug	     =  Str::slug($request->project_title);
            $project->project_desc	     =  $request->project_desc;
            $project->project_link	     =  $request->project_link;
            $project->status	         =  $request->status;
            $projectImg                  = $request->project_img;

            if ( $projectImg ) {
                $time                    = microtime('.') * 10000;
                $imgName                 = $time . $projectImg->getClientOriginalName();
                $imgUploadPath           = ('public/image/backend/projects/');
                $projectImg->move($imgUploadPath, $imgName);
                $productImgUrl           = $imgUploadPath . $imgName;
                $project->project_img	 = $productImgUrl;
            }

            // dd($project);
            $project->save();

            return redirect()->back();
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);

        if( !is_null( $project ) ){
            $project->project_cat_name	 =  $request->project_cat_name;
            $project->project_title	     =  $request->project_title;
            $project->project_slug	     =  Str::slug($request->project_title);
            $project->project_desc	     =  $request->project_desc;
            $project->project_link	     =  $request->project_link;
            $project->status	         =  $request->status;
            $projectImg                  = $request->project_img;

            if ( $projectImg ) {
                if( !empty ( $project->project_img ) ) {
                    if( file_exists($project->project_img) == ""){
                        unlink($project->project_img);
                    }
                    else if( file_exists($project->project_img) ){
                        unlink($project->project_img);
                    }
                }
                $time                    = microtime('.') * 10000;
                $imgName                 = $time . $projectImg->getClientOriginalName();
                $imgUploadPath           = ('public/image/backend/projects/');
                $projectImg->move($imgUploadPath, $imgName);
                $productImgUrl           = $imgUploadPath . $imgName;
                $project->project_img	 = $productImgUrl;
            }

            // dd($project);
            $project->save();

            return redirect()->back();
        }
    }


        /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        if( !is_null( $project ) ){
            // unlink specify one images from Product Data Table
            unlink($project->project_img);
            $project->delete();

            return redirect()->back();
        }
    }

}


