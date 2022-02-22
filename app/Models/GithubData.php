<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GithubData extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'name_project',
        'start_time_class',
        'start_date_class',
        'end_time_class',
        'end_date_class',
        'url_github',
        'url_meet',
    ];
}
