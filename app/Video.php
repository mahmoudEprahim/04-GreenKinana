<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'image',
        'video_src',
        'name_ar',
        'name_en',
        'desc_en',
        'desc_ar',
    ];
}
