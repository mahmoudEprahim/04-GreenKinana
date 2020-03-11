<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = [
        'sitename_ar',
        'sitename_en',
        'logo_ar',
        'logo_en',
        'email',
        'main_lang',
        'main_currency',
        'main_color',
        'address_en',
        'address_ar',
        'phone',
        'phone_2',
        'footer_header_color',
        'about_site_ar',
        'about_site_en',
        'facebook',
        'snapshat',
        'pinterest',
        'instagram',
        'youtube',
        'keyword',
        'abou_us_bg_img',
        'qinana_added_val_en',
        'qinana_added_val_ar',
       
    ];
}
