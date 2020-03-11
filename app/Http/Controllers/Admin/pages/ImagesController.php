<?php

namespace App\Http\Controllers\Admin\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Image;
use App\DataTables\ImagesDataTable;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Up;

class ImagesController extends Controller
{
    public function index(ImagesDataTable $content) 
    {  
        return $content->render('admin.pages.images.index',['title'=>trans('admin.images')]);
    } 

    public function create()
    {
        
        return view('admin.pages.images.create', ['title'=> trans('admin.Create_new_image')]);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'image.*' => 'required',
            'desc_en.*' => 'sometimes',
            'desc_ar.*' => 'sometimes',
            'name_ar.*' => 'sometimes',
            'name_en.*' => 'sometimes',
            
        ],[],[
            'image' => trans('admin.video'),
        ]);
        

        
        foreach ($request->image as  $key => $image)
        {
            $filePath = 'files/';
            $extension = $image->getClientOriginalExtension();
            $name = $image->getClientOriginalName(); 
            $fileName = $name . '_' . time() . '.' .$extension;
            $image->move($filePath, $fileName);
            Image::create([
                'image' => $filePath.$fileName,
                'desc_en' => $request->desc_en[$key],
                'desc_ar' => $request->desc_ar[$key],
                'name_ar' => $request->name_ar[$key],
                'name_en' => $request->name_en[$key],

            ]);
        }
        return redirect(aurl('images'))->with(session()->flash('message',trans('admin.success_add')));   
    }

    public function show($id)
    {
        $content = Image::findOrFail($id);
        return view('admin.pages.images.show',compact('content'), ['title'=>trans('admin.show_image')]);
    }

    public function edit($id)
    {
        $content =  Image::findOrFail($id);  
        return view('admin.pages.images.edit',['content'=> $content, 'title'=>trans('admin.edit_image_content')]);
    }

    public function update(Request $request, $id)
    {
        $content = Image::findOrFail($id);
        $data = $this->validate($request,[
            'image' => 'sometimes',
            'desc_en' => 'sometimes',
            'desc_ar' => 'sometimes',
            'name_ar' => 'sometimes',
            'name_en' => 'sometimes',
        ],[],[
            
        ]);

        if($request->hasFile('image')){
            $image = $request->image;
            $filePath = 'files/';
            $extension = $image->getClientOriginalExtension();
            $name = $image->getClientOriginalName(); 
            $fileName = $name . '_' . time() . '.' .$extension;
            $image->move($filePath, $fileName);
            $data['image'] = $filePath.$fileName;
        }

        
        $content->update($data);
        return redirect(aurl('images'))->with(session()->flash('message',trans('admin.success_update')));  
    }

    public function destroy($id)
    {
       $content = Image::findOrFail($id);
       $content->delete();
       return redirect(aurl('images'));
    }
}
