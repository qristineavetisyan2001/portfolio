<?php

namespace App\Http\Controllers;

use App\Helpers\FileSystem;
use App\Models\Admin;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectLang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public static function login(Request $request)
    {
        $admin = Admin::where("login", $request->login)->where("password", $request->password)->get()->first();
        if ($admin) {
            session(['admin' => $admin]);
            return redirect()->route("admin");
        } else {
            return view("adminLogin");
        }
    }

    public static function logOut()
    {
        session()->forget("admin");

        return redirect()->route("admin");
    }

    public static function getAdminPage()
    {
        if (session("admin")) {
            $projects = Project::with('image')->with('lang')->get();

            return view("adminTable", ["projects" => $projects]);
        } else {
            return view('adminLogin');
        }
    }

    public static function editProject($id, Request $request)
    {
        $project = Project::with('lang')->with('image')->where('id', $id)->get()->first();

        if ($request->title) {
            $project->title = $request->title;
        }
        if ($request->short_description) {
            $project->short_description = $request->short_description;
        }
        if ($request->description) {
            $project->description = $request->description;
        }
        if ($request->worked_by_me) {
            $project->worked_by_me = $request->worked_by_me;
        }

        if($request->langs) {
            foreach ($request->langs as $index => $lang) {
                if ($request->ids && count($request->ids) > $index) {
                    if ($lang) {
                        ProjectLang::where("id", $request->ids[$index])->update(["name" => $lang]);
                    } else {
                        ProjectLang::where("id", $request->ids[$index])->delete();
                    }
                } else if($lang){
                    $newLang = new ProjectLang;

                    $newLang->name = $lang;
                    $newLang->project_id = $id;

                    $newLang->save();
                }
            }
        }
        if($request->file('images')) {
            foreach ($request->file('images') as $image) {
                FileSystem::file_upload($image, storage_path('app/public/uploads'));

                $newImage = new ProjectImage;

                $newImage->image_path = md5(date('y-m-d H:i:sa') . $image->getClientOriginalName()) . FileSystem::getImageType($image);
                $newImage->project_id = $id;
                $newImage->status = 0;

                $newImage->save();
            }
        }

        if($request->deleted_image_ids) {
            ProjectImage::whereIn('id', $request->deleted_image_ids)->where("project_id", $id)->delete();
        }

        if($request->main_image){
            ProjectImage::where("project_id", $id)->where("status", 1)->update(["status"=>0]);
            ProjectImage::where("id", $request->main_image)->update(["status"=>1]);
        }

        $project->save();

        return back();
    }



    public static function deleteProject($id)
    {
        $projectImages = ProjectImage::where('project_id', $id)->get();
        foreach ($projectImages as $index => $projectImage) {
            File::delete(storage_path('app/public/uploads/' . $projectImage->image_path));
        }
        Project::where('id', $id)->delete();

        return back();
    }
}
