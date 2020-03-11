<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\parents;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'parent/parent';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        if (auth('parent')->check()){
            return redirect()->route('parent.index');
        }
        return view('web.parent.login');
    }

    protected function guard()
    {
        return Auth::guard('parent');
    }

    public function login(Request $request){
        $parent = parents::where('email', $request->email)->first();
        if($parent != null){
            if ($parent->active == 0){
                return back()->with(session()->flash('error', 'Please active your account first من فضلك يجب عليك تفعيل الحساب أولا'));
            }
        }
        $remember_me = $request->remember_me == 1 ? true : false;
        if (auth('parent')->attempt(['email'=>$request->email,'password'=>$request->password],$remember_me)){
            return redirect()->route('parent.index');
        } else {
            return back()->with(session()->flash('error', 'Credentials error'));
        }
    }

    public function logout(){
        auth('parent')->logout();
        return redirect()->route('parentLogin');
    }
}
