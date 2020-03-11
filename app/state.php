<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    protected $table = 'states';
    protected $fillable=[
        'state_name_ar',
        'state_name_en',
        'city_id',
        'country_id'
    ];

    public function city(){
        return $this->hasOne('App\city','id','city_id');
    }
    public function country(){
        return $this->hasOne('App\country','id','country_id');
    }
//    public function subscriptions(){
//        return $this->hasMany('App\subscription','depart_id','id');
//    }
}
