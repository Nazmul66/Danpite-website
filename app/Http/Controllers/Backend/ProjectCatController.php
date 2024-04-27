<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectCat;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProjectCatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $project_cats = ProjectCat::all();
        return view('backend.pages.project_category.manage', compact('project_cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string',
            'category_img' => 'file',
        ]);

        $project_cat = new ProjectCat();

        if( !is_null( $project_cat ) ){
            $project_cat->category_name   = $request->category_name;
            $project_cat->category_slug   = Str::slug($request->category_name);
            $project_cat->status   = $request->status;

            if ( $request->hasFile('category_img') ) {
                $image = $request->file('category_img');

                $extension = $image->getClientOriginalExtension();
                $nameToStore = 'photo-'.md5(uniqid()).time().'.'.$extension;

                $image->move(public_path('backend/project_category'), $nameToStore);

                $filePath = 'backend/project_category/'.$nameToStore;
                $project_cat->category_img = $filePath;
            }

            $project_cat->save();

            return redirect()->back();
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|string',
            'category_img' => 'file',
        ]);

        $project_cat = ProjectCat::findOrFail($id);

        if( !is_null( $project_cat ) ){
            $project_cat->category_name   = $request->category_name;
            $project_cat->category_slug   = Str::slug($request->category_name);
            $project_cat->status   = $request->status;

            if ( $request->hasFile('category_img') ) {

                if( !empty ( $project_cat->category_img ) ) {
                    if( file_exists($project_cat->category_img) == ""){
                        unlink($project_cat->category_img);
                    }
                    else if( file_exists($project_cat->category_img) ){
                        unlink($project_cat->category_img);
                    }
                }

                $image = $request->file('category_img');

                $extension = $image->getClientOriginalExtension();
                $nameToStore = 'photo-'.md5(uniqid()).time().'.'.$extension;

                $image->move(public_path('backend/project_category'), $nameToStore);

                $filePath = 'backend/project_category/'.$nameToStore;
                $project_cat->category_img = $filePath;
            }

            $project_cat->save();

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ProjectCat::findOrFail($id);

        // Get the file path of the category image
        $imagePath = public_path($category->category_img);

        // Check if the file exists before attempting to delete it
        if (File::exists($imagePath)) {
            // Delete the category image file
            File::delete($imagePath);
        }

        // Delete the ProjectCategory from the database
        $category->delete();

        return back()->with('success', 'Project Category deleted successfully.');
    }
}
