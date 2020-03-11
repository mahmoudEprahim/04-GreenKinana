<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = ['image','desc_en','desc_ar'];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
