<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['facebook_id'] = $user->getId();
            $create['password'] = md5(rand(1,10000));
            $userModel = new User;
//            dd($userModel,$create);
            $createdUser = $userModel->addNew($create);
//            dd($createdUser->id);
            Auth::loginUsingId($createdUser->id);
            return redirect()->route('profile.index');
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
    }

    public function save($id, Request $request)
    {
        $user = User::findOrFail($id);
//        dd($user);
        $data = $this->validate($request,[
            'addriss' => ['required', 'string', 'max:191'],
            'phone' => ['required', 'min:20','numeric','unique:users'],
            'gender' => ['required'],
            'country_id' => ['sometimes'],
            'city_id' => ['sometimes'],
            'state_id' => ['sometimes'],
            'isadmin' => ['required'],
        ],[],[
            'addriss' => trans('auth.Addriss'),
            'phone' => trans('auth.phone'),
            'gender' => trans('auth.gender'),
            'country_id' => trans('auth.countries'),
            'city_id' => trans('auth.cities'),
            'state_id' => trans('auth.state'),
            'isadmin' => trans('auth.isadmin')
        ]);

        $user->addriss = $request->input('addriss');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->country_id = $request->input('country_id');
        $user->city_id = $request->input('city_id');
        $user->state_id = $request->input('state_id');
        $user->isadmin = $request->input('isadmin');

        $user->update($data);
//        dd($user);

        return redirect(url('profile'));
    }

    public function getCityList(Request $request)
    {
        $city = DB::table("cities")
            ->where("country_id",$request->country_id)
            ->pluck("city_name_ar","id");
        return response()->json($city);
    }

    public function getStateList(Request $request)
    {
        $states = DB::table("states")
            ->where("city_id",$request->city_id)
            ->pluck("state_name_ar","id");
        return response()->json($states);
    }
}
