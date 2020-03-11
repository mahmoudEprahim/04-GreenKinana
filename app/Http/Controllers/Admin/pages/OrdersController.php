<?php

namespace App\Http\Controllers\Admin\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Messages\reply;
use App\Mail\ReplyContact;

use Illuminate\Support\Facades\Mail;

use App\Order;
use App\DataTables\OrdersDataTabe;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Up;


class OrdersController extends Controller
{
    public function index(OrdersDataTabe $content) 
    { 
        return $content->render('admin.orders.index',['title'=>trans('admin.orders_information')]);
    } 
    
    public function show($id)
    {
        $content = Order::find($id);
        return view('admin.orders.show',['content' => $content,'title'=>trans('admin.orders_information')]);
    }
    public function edit($id)
    {
        $content = Order::find($id);
        return view('admin.orders.edit',['content' => $content,'title'=>trans('admin.orders_information')]);
    }

    public function update(Request $request, $id)
    {
        $content = Order::findOrFail($id);
        $data = $this->validate($request,[
            'name' => 'sometimes',
            'email' => 'sometimes',
            'phone' => 'sometimes',
            'message' => 'sometimes',
            'order_id' => 'sometimes',
        ],[],[
            'name'=> trans('admin.name'),
            'email' => trans('admin.email'),
            'phone' => trans('admin.phone'),
            'message' => trans('admin.message'),
            'order_id' => trans('admin.order_id'),
        ]);

        $content->update($data);
        alert()->success(trans('admin.order_sent'),'Done');
		return redirect(aurl('orders'));
    }

    public function destroy($id)
    {
        $content = Order::findOrFail($id);
        $content->delete();
        return redirect(aurl('orders'));
    }

    public function orderreply($id, reply $request)
    {
        $message = Order::findOrFail($id);
        Mail::send(new ReplyContact($message, $request->message));
        return redirect()->route('orders.edit', ['id'=>$message->id])->with('success',trans('admin.reply_sent'));        
    }
}
