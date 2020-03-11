<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Applicant;
use App\applicants_company;
use App\applicants_requests;
use App\Branches;
use App\Company;
use App\Mail\AdminMessage;
use App\User;
use App\visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Khill\Lavacharts\Lavacharts;

class DashboardController extends Controller
{
    public function home(){
        
        
        $lava = new Lavacharts;
        $settins = Setting::all();
        return view('admin.setting', compact('settins'));
        

        // return view('admin.home');
    }
    public function sendmail(Request $request) {
        $data = $this->validate($request,[
            'subject' => 'required',
            'contents' => 'required',
            'emailto' => 'required',
        ],[],[
            'subject' => trans('admin.subject'),
            'contents' => trans('admin.Message'),
            'emailto' => trans('admin.Email_To'),
        ]);
        $from = auth()->guard('admin')->user()->email;
        $subject = $request->subject;
        $message = $request->contents;
        $to = $request->emailto;

        Mail::to($to)->send(new AdminMessage($from,$subject,$message));



        return back();
    }

}
