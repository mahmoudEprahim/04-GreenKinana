<?php

namespace App\Http\Controllers\web;

use App\EnglishCategory;
use App\SubCategoryChild;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Alert;

use App\Setting;
use App\Message;
use App\Order;
use App\Service;
use App\Image;
use App\Video;


use App\Http\Requests\Messages\Store;
use App\Http\Requests\Orders\StoreOrder;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Up;

class HomeController extends Controller
{
    public function index()
    {
		$services = Service::all();
		$photos = Image::all();
		$videos = Video::all();
    	return view('web.index.home',compact(['services','photos','videos']));
	}

	public function messageStore(Store $request)
	{
		Message::create($request->all());
		// alert()->success(trans('admin.message_sent'),'Done');
		return redirect()->back()->with('success',trans('admin.message_sent'));
		
	}

	public function orderStore(StoreOrder $request)
	{
		Order::create($request->all());
		return redirect()->back()->with('success',trans('admin.order_sent'));
	}
	


}
