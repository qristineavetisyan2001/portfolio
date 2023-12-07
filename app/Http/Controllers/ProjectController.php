<?php

namespace App\Http\Controllers;

use App\Helpers\FileSystem;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectLang;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function getAllProjects()
    {
        $projects = Project::with('image')->with('lang')->get();

        return view("portfolio",['projects'=>$projects]);
    }

    public function insert(ProjectRequest $request)
    {
        $newProject = new Project;

        $newProject->title = $request->title;
        $newProject->short_description = $request->short_description;
        $newProject->description = $request->description;
        $newProject->worked_by_me = $request->worked_by_me;

        $newProject->save();
        if($request->file()) {
            foreach ($request->file()["images"] as $index => $image) {
                $newProjectImage = new ProjectImage;
                $newProjectImage->image_path = md5(date('y-m-d H:i:sa').$image->getClientOriginalName()).FileSystem::getImageType($image);
                $newProjectImage->project_id = $newProject->id;
                if ($index === 0) {
                    $newProjectImage->status = 1;
                } else {
                    $newProjectImage->status = 0;
                }

                FileSystem::file_upload($image, storage_path('app/public/uploads'));

                $newProjectImage->save();
            }
        }

        if($request->langs) {
            foreach ($request->langs as $lang) {
                $newProjectLang = new ProjectLang;
                $newProjectLang->name = $lang;
                $newProjectLang->project_id = $newProject->id;

                $newProjectLang->save();
            }
        }
        return redirect()->back();
    }

    public function getProject($id){
        $project = Project::with('image')->with('lang')->where("id", $id)->get()->first();

        return view("project", ['project'=>$project]);
    }


}
