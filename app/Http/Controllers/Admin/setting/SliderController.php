<?php

namespace App\Http\Controllers\Admin\setting;

use App\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\DataTables\SliderDataTable;

use Up;

class SliderController extends Controller
{
    
    public function index(SliderDataTable $slide) 
    {
        return $slide->render('admin.setting.slider.index',['title'=>trans('admin.slider_information')]);
    }

    public function create(Slider $slider)
    {
        return view('admin.setting.slider.create', ['title'=> trans('admin.Create_new_slider'),'slider' => $slider]);
    }

    public function store(Request $request, Slider $slider)
    {
        $data = $this->validate($request,[
            'desc_ar' => 'sometimes',
            'desc_en' => 'sometimes',
            'image' => 'required',
        ],[],[
            'desc_ar' => trans('admin.desc_ar'),
            'desc_en' => trans('admin.desc_en'),
            'image' => trans('admin.image'),  
        ]);
        $slider = new Slider;
        $slider->desc_ar = $request->desc_ar;
        $slider->desc_en = $request->desc_en;
        if($request->hasFile('image')){
            $slider['image'] = Up::upload([
                'request' => 'image',
                'path'=>'slider',
                'upload_type' => 'single'
            ]);
        }
       
        $slider->save();
        return redirect(aurl('sliders'))->with(session()->flash('message',trans('admin.success_add')));

    }

    public function show($id)
    {
        $slide = Slider::find($id);
        return view('admin.setting.slider.show')->with('slide', $slide);
    }

    public function edit($id)
    {
        // find the slider
        $slider = Slider::findOrFail($id);
        return view('admin.setting.slider.edit', ['title'=> trans('admin.Edit_slider'),'slider' => $slider]);
        
    }

    
    public function update(Request $request, $id)
    {
         // validate the data
         $data = $this->validate($request,[
            'desc_ar' => 'sometimes',
            'desc_en' => 'sometimes',
            'image' => 'required',
        ],[],[
            'desc_ar' => trans('admin.desc_ar'),
            'desc_en' => trans('admin.desc_en'),
            'image' => trans('admin.image'),  
        ]);
        $slider = Slider::findOrFail($id);
        $slider->desc_ar = $request->desc_ar;
        $slider->desc_en = $request->desc_en;
       
        if($request->hasFile('image')){
            $slider['image'] = Up::upload([
                'request' => 'image',
                'path'=>'slider',
                'upload_type' => 'single'
            ]);
        }
        $slider->save();
        return redirect(aurl('sliders'))->with(session()->flash('message',trans('admin.success_update')));
    }

    
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect(aurl('sliders'));
    }
}
