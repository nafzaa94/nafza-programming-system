<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentDiscussionFyp extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id_user',
        'Username',
        'Key_comment',
        'Key_reply',
        'Comment',
    ];
}
