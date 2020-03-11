<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'lang';
    protected $fillable =[
        'lang',
        'lang_read',
        'lang_write',
        'lang_understand',
        'applicant_id',
    ];
    public function applicants(){
        return $this->hasOne('App\Applicant','id','applicants_id');
    }

}
