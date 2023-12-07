<?php

declare(strict_types=1);

namespace App\Helpers;

class FileSystem{
    static function getImageType($image){
        switch ($image->getClientMimeType()){
            case "image/jpeg":
                return ".jpg";
            case "image/png":
                return ".png";
            default:
                return null;
        }
    }

    static function file_upload($file, $path){
        if(!self::getImageType($file)){
            return "error";
        }

        $type = self::getImageType($file);
        $fileName = md5(date('y-m-d H:i:sa').$file->getClientOriginalName()).$type;

        $file->move($path, $fileName);

        return $fileName;
    }
}





