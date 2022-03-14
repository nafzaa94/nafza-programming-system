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
        'Avatar',
        'Key_comment',
        'Status_delete',
        'Key_reply',
        'Comment',
    ];
}
