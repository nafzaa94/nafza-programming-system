<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'Categories_video',
        'Id_video',
        'Id_video_taget',
        'Title_video',
        'Link_video',
        'Description_video',
    ];
}
