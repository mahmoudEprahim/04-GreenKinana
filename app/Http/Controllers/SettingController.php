<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Up;
class SettingController extends Controller
{
    public function index()
    {
        $settins = Setting::all();
        return view('admin.setting', compact('settins'));
    }


    public function setting_save(Request $request){

        $data = $this->validate($request,[
            'sitename_ar' => 'sometimes',
            'sitename_en' => 'sometimes',
            'logo_ar' => validate_image(),
            'logo_en' => validate_image(),
            'email' => 'sometimes',
            'main_lang' => 'sometimes',
            'main_currency' => 'sometimes',
            'main_color' => 'sometimes',
            'footer_header_color' => 'sometimes',
            'about_site_ar' => 'sometimes',
            'about_site_en' => 'sometimes',
            'address_ar' => 'sometimes',
            'address_en' => 'sometimes',
            'phone' => 'sometimes',
            'fees' => 'sometimes',
            'phone_2' => 'sometimes',
            'facebook' => 'sometimes',
            'snapshat' => 'sometimes',
            'instagram' => 'sometimes',
            'youtube' => 'sometimes',
            'pinterest' => 'sometimes',
            'keyword' => 'sometimes',
            'abou_us_bg_img' => 'sometimes',
            'qinana_added_val_en' => 'sometimes',
            'qinana_added_val_ar' => 'sometimes',

        ],[],[
            'sitename_en' => trans('admin.arabic_name'),
            'sitename_ar' => trans('admin.english_name'),
            'logo_ar' => trans('admin.image'),
            'logo_en' => trans('admin.icon'),
            'email' => trans('admin.email'),
            'main_lang' => trans('admin.main_lang'),
            'main_currency' => trans('admin.main_currency'),
            'fees' => trans('admin.fees'),
            'main_color' => trans('admin.main_color'),
            'footer_header_color' => trans('admin.footer_header_color'),
            'about_site_ar' => trans('admin.about_site_ar'),
            'about_site_en' => trans('admin.about_site_en'),
            'address_ar' => trans('admin.address_ar'),
            'address_en' => trans('admin.address_en'),
            'phone' => trans('admin.phone'),
            'phone_2' => trans('admin.phone_2'),
            'facebook' => trans('admin.facebook'),
            'snapshat' => trans('admin.snapshat'),
            'instagram' => trans('admin.instagram'),
            'youtube' => trans('admin.youtube'),
            'pinterest' => trans('admin.pinterest'),
            'keyword' => trans('admin.keyword'),
            'abou_us_bg_img' => trans('admin.abou_us_bg_img'),
            'qinana_added_val_ar' => trans('admin.qinana_added_val_ar'),
            'qinana_added_val_en' => trans('admin.qinana_added_val_en'),
           
        ]);
        if($request->hasFile('logo_ar')){
            $data['logo_ar'] = Up::upload([
                'request' => 'logo_ar',
                'path'=>'setting',
                'upload_type' => 'single',
                'delete_file'=> setting()->logo_ar
            ]);
        }
        if($request->hasFile('logo_en')){
            $data['logo_en'] = Up::upload([
                'request' => 'logo_en',
                'path'=>'setting',
                'upload_type' => 'single',
                'delete_file'=> setting()->logo_en
            ]);
        }
        if($request->hasFile('abou_us_bg_img')){
            $data['abou_us_bg_img'] = Up::upload([
                'request' => 'abou_us_bg_img',
                'path'=>'setting',
                'upload_type' => 'single',
                'delete_file'=> setting()->abou_us_bg_img
            ]);
        }

        Setting::orderBy('id','desc')->update($data);
        return redirect(aurl('setting'))->with('message',trans('admin.success_update'));
    }
}
