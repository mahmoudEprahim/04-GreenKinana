<?php

namespace App\Http\Controllers\Admin\setting;

use App\Service;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\DataTables\ServicesDataTable;

use Up;
 
class ServicesController extends Controller
{
    
    public function index(ServicesDataTable $service) 
    {
        return $service->render('admin.setting.service.index',['title'=>trans('admin.service_information')]);
    }

    public function create()
    {
        return view('admin.setting.service.create', ['title'=> trans('admin.Create_new_service')]);
    }

    public function store(Request $request)
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
        $service = new Service;
        $service->desc_ar = $request->desc_ar;
        $service->desc_en = $request->desc_en;
        if($request->hasFile('image')){
            $service['image'] = Up::upload([
                'request' => 'image',
                'path'=>'service',
                'upload_type' => 'single'
            ]);
        }
       
        $service->save();
        return redirect(aurl('services'))->with(session()->flash('message',trans('admin.success_add')));

    }

    public function show($id)
    {
        $service = Service::find($id);
        return view('admin.setting.service.show', compact('service'));
    }

    public function edit($id)
    {
        // find the service
        $service = Service::findOrFail($id);
        return view('admin.setting.service.edit', ['title'=> trans('admin.Edit_service'),'service' => $service]);
        
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
        
        $service = Service::findOrFail($id);
        
        $service->desc_ar = $request->desc_ar;
        $service->desc_en = $request->desc_en;
       
        if($request->hasFile('image')){
            $service['image'] = Up::upload([
                'request' => 'image',
                'path'=>'service',
                'upload_type' => 'single'
            ]);
        }
        $service->save();
        
        return redirect(aurl('services'))->with(session()->flash('message',trans('admin.success_update')));
    }

    
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect(aurl('services'));
    }
}
