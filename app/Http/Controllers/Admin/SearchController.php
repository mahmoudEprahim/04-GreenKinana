<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(){

        return view('admin.search.index',['title'=>trans('admin.search_for_employee')]);
    }
}
