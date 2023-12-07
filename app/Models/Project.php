<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    public function image()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function lang()
    {
        return $this->hasMany(ProjectLang::class);
    }

}
