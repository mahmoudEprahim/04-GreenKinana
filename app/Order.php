<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['name','email','phone','message','service_id'];

    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}
