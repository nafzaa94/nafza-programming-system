<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryProject extends Model
{
    use HasFactory;

    protected $fillable = [
        "Title_Project",
        "Link_Video_Project",
        "Video_Id",
        "Project_From",
        "Link_File_Project",
        "FeedbacK_project",
        "Type_Programming_project",
        "id_projectfrom_taget",
        "id_projectfrom",
        "id_projectlink_taget",
        "id_projectlink",
        "id_projecttypeprogramming_taget",
        "id_projecttypeprogramming",
        "id_projectfeedback_taget",
        "id_projectfeedback",
    ];
}
