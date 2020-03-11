<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    protected $table ='branches';
    protected $fillable =[
        'name_ar',
        'name_en',
        'address',
        'type',
        'mini_charge',
    ];

}
