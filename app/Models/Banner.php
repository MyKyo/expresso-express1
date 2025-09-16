<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'image_desktop_path',
        'image_mobile_path',
        'video_path',
        'is_active',
        'sort_order',
    ];
}


