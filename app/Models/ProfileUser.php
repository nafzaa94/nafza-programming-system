<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'fullname',
        'address',
        'no_phone',
        'gender',
        'statusdepartment',
        'department',
        'projectname',
        'presendate',
        'typeproject',
        'objectiveproject',
        'image_profile',
        'url_profile_image',
        'imageproject',
        'url_project_image',
        'imagehalfpayment',
        'url_imagehalfpayment',
        'imagefullpayment',
        'url_imagefullpayment',
        'package',
    ];
}
