<?php

namespace App\Http\Controllers;

use App\Helpers\FileSystem;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\File;

class ProjectImageController extends Controller
{
    public static function deleteImage($id)
    {
        $projectImage = ProjectImage::where('id', $id)->get()->first();
        File::delete(storage_path('app/public/uploads/' . $projectImage->image_path));

        $projectImage->delete();
        return back();
    }

    public static function addImage($request)
    {
        $newImage = new ProjectImage;

        $newImage->image_path = md5(date('y-m-d H:i:sa').$request->file()[0]->getClientOriginalName()).FileSystem::getImageType($image);

        FileSystem::file_upload($request->file()[0], storage_path('app/public/uploads'));

        return back();
    }
}
