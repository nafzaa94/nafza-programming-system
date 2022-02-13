<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDiscussionCP extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id_user',
        'Username',
        'Key_Post',
        'Title_Post',
        'Question_Post',
        'Image_Project_Post',
        'Language_Programming',
        'Image_Code_Post',
        'Coding_Post',
        'Url_Image_Project_Post',
        'Url_Image_Code_Post',
    ];
}
