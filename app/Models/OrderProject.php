<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_name',
        'package_detail',
        'package_price',
        'package_color',
    ];
}
