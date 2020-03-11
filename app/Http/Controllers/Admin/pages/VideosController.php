<?php

namespace App\Http\Controllers\Admin\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Video;
use App\DataTables\VideosDataTable;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Up;

class VideosController extends Controller
{
   
    public function index(VideosDataTable $content) 
    {  
        return $content->render('admin.pages.videos.index',['title'=>trans('admin.videos')]);
    } 

    public function create()
    {
        
        return view('admin.pages.videos.create', ['title'=> trans('admin.Create_new_video')]);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'image' => 'sometimes',
            'video_src' => 'required',
            'desc_en' => 'sometimes',
            'desc_ar' => 'sometimes',
            'name_ar' => 'sometimes',
            'name_en' => 'sometimes',
            
        ],[],[
            'video_src' => trans('admin.video'),
        ]);

        if($request->hasFile('image')){
            $data['image'] = Up::upload([
                'request' => 'image',
                'path'=>'pages/videos',
                'upload_type' => 'single',
            ]);
        }

        $desc_en = $request->input('desc_en');       
        $embedvideo = str_replace('watch?v=', 'embed/', $request->video_src);
        $data['video_src'] = $embedvideo;
        foreach ($embedvideo as  $key => $video_src)
        {
            // $subcontent = new SubContent();
            $content = new Video();
            $content->video_src = $embedvideo[$key];
            $content->desc_en = $desc_en[$key];
            $content->desc_ar = $request->desc_ar[$key];
            $content->name_en = $request->name_en[$key];
            $content->name_ar = $request->name_ar[$key];
            
            $content->save();
        }
        
        return redirect(aurl('videos'))->with(session()->flash('message',trans('admin.success_add')));
            
    }

    public function show($id)
    {
        $content = Video::findOrFail($id);
        return view('admin.pages.videos.show',compact('content'), ['title'=>trans('admin.show_video')]);
    }

    public function edit($id)
    {
        $content =  Video::findOrFail($id);  
        return view('admin.pages.videos.edit',['content'=> $content, 'title'=>trans('admin.edit_video_content')]);
    }

    public function update(Request $request, $id)
    {
        $content = Video::findOrFail($id);
        $data = $this->validate($request,[
            'image' => 'sometimes',
            'video_src' => 'sometimes',
            'desc_en' => 'sometimes',
            'desc_ar' => 'sometimes',
            'name_ar' => 'sometimes',
            'name_en' => 'sometimes',
        ],[],[
            
        ]);
            
            
        if($request->hasFile('image')){
            $data['image'] = Up::upload([
                'request' => 'image',
                'path'=>'pages/videos',
                'upload_type' => 'single',
                'delete_file' => $content->image,
            ]);
        }
        $embedvideo = str_replace('watch?v=', 'embed/', $request->video_src);
        $data['video_src'] = $embedvideo;
        if($data != null){
            $content->update($data);
            return redirect(aurl('videos'))->with(session()->flash('message',trans('admin.success_update')));  
        }
         
    }

    public function destroy($id)
    {
       $content = Video::findOrFail($id);
       $content->delete();
       return redirect(aurl('videos'));
    }


    public function upload(Request $request)
    {
        for($i=0; $i < count($request->file('file_name')); $i++)
        {
            $file = $request->file('file_name')[$i];
            $filePath = public_path().'/files';
            $extension = $file->getClientOriginalExtension();
            $files = $file->getClientOiginalName();
            $fileName = $files . '_' . $time() . '.' .$extension;
            $file->move($filePath, $fileName);
        }
        return redirect()->back();
    }
}
