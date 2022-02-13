<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDiscussionFyp extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id_user',
        'Username',
        'Key_Post',
        'Title_Post',
        'Question_Post',
        'Image_Post',
        'Language_Programming',
        'Url_Post_Image',
    ];
}
