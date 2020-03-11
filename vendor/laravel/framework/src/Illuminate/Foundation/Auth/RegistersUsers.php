<?php

namespace Illuminate\Foundation\Auth;

use App\city;
use App\country;
use App\state;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
//        if($request->ajax()){
//            $country = country::findOrFail($request->country);
////            dd($country->id);
//            $city = city::where('country_id',$country->id)->pluck('city_name_'.session('lang'),'id');
//            $contents = view('web.index.city', compact('country','city'))->render();
//            return $contents;
//        }
//        $countries = DB::table("countries")->pluck("country_name_ar","id");
//        return view('web.index.register',compact('countries'));
    }

//    public function getCityList(Request $request)
//    {
//        $city = DB::table("cities")
//            ->where("country_id",$request->country_id)
//            ->pluck("city_name_ar","id");
//        return response()->json($city);
//    }

//    public function getStateList(Request $request)
//    {
//        $states = DB::table("states")
//            ->where("city_id",$request->city_id)
//            ->pluck("state_name_ar","id");
//        return response()->json($states);
//    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
