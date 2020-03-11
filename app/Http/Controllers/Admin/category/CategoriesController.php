<?php

namespace App\Http\Controllers\Admin\category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

use App\DataTables\CategoriesDataTable;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Up;

class CategoriesController extends Controller
{
    public function index(CategoriesDataTable $content)
    {
        return $content->render('admin.category.index',['title'=>trans('admin.categories_information')]);
    }

    public function create(Category $content)
    {
        return view('admin.category.create', ['title'=> trans('admin.create_new_category')]);
    }

    public function store(Request $request, Category $content)
    {
         $data= $this->validate($request,[
            'name_ar' => 'sometimes',
            'name_en' => 'required',
            'Cat_No' => 'required',
        ],[],[
            'name_ar'=> trans('admin.unit_name_ar'),
            'name_en' => trans('admin.unit_name_en'),
            'Cat_No' => trans('admin.Cat_No'), 
        ]);

        $content->create($data);

        return redirect(aurl('categories'))->with(session()->flash('message',trans('admin.success_add')));

    }

    public function show($id)
    {

        $content = Category::findOrFail($id);
        return view('admin.category.show',compact('content'));
    }

    public function edit($id)
    {
        $content = Category::findOrFail($id);
        return view('admin.category.edit',['content'=> $content,'title'=>trans('admin.edit_category')]);
    }

    public function update(Request $request, $id)
    {
        $content = Category::findOrFail($id);
        $data = $this->validate($request,[
            'name_ar' => 'sometimes',
            'name_en' => 'required',
            'Cat_No' => 'sometimes',
        ],[],[
            'name_ar'=> trans('admin.unit_name_ar'),
            'name_en' => trans('admin.unit_name_en'),
            'Cat_No' => trans('admin.Cat_No'),
        ]);

        $content->update($data);
        return redirect(aurl('categories'))->with(session()->flash('message',trans('admin.success_update')));

    }


    public function destroy($id)
    {
        $content = Category::findOrFail($id);
        $content->delete();
        return redirect(aurl('categories'));
    }
}
