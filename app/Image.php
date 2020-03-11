<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = ['image', 'name_en', 'name_ar','desc_en','desc_ar' ];
}
