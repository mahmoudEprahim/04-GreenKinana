<?php

namespace App\Http\Controllers\Admin\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Messages\reply;
use App\Mail\ReplyContact;

use Illuminate\Support\Facades\Mail;

use App\Message;
use App\DataTables\MessagesDataTabe;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Up;

class MessagesController extends Controller
{
    public function index(MessagesDataTabe $content) 
    { 
        return $content->render('admin.messages.index',['title'=>trans('admin.messages_information')]);
    } 
    
    public function show($id)
    {
        $content = Message::find($id);
        return view('admin.messages.show',['content' => $content,'title'=>trans('admin.messages_information')]);
    }
    public function edit($id)
    {
        $content = Message::find($id);
        return view('admin.messages.edit',['content' => $content,'title'=>trans('admin.messages_information')]);
    }

    public function update(Request $request, $id)
    {
        $content = Message::findOrFail($id);
        $data = $this->validate($request,[
            'name' => 'sometimes',
            'email' => 'sometimes',
            'phone' => 'sometimes',
            'message' => 'sometimes',
        ],[],[
            'name'=> trans('admin.name'),
            'email' => trans('admin.email'),
            'phone' => trans('admin.phone'),
            'message' => trans('admin.message'),
        ]);

        $content->update($data);
        return redirect(aurl('messages'))->with(session()->flash('message',trans('admin.success_update')));

    }

    public function destroy($id)
    {
        $content = Message::findOrFail($id);
        $content->delete();
        return redirect(aurl('messages'));
    }

    public function reply($id, reply $request)
    { 
        $message = Message::findOrFail($id);
        Mail::send(new ReplyContact($message, $request->message));
        return redirect()->route('messages.edit', ['id'=>$message->id])->with('success',trans('admin.reply_sent'));
    }



}
