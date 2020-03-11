<?php

Route::group(['prefix'=>'admin'],function (){
    Config::set('auth.defines','admin');

//    login
    Route::get('/','Admin\AdminAuth@login')->name('admin.login');
    Route::post('adminlogin','Admin\AdminAuth@dologin');
    Route::get('forgetPassword','Admin\AdminAuth@forgetPassword');
    Route::post('forgetPassword','Admin\AdminAuth@forgetPasswordPost');
    Route::get('reset/password/{token}','Admin\AdminAuth@reset_password');
    Route::post('reset/password/{token}','Admin\AdminAuth@reset_password_post');


    Route::get('/foo', function () {
        Artisan::call('storage:link');
        dd('djhddhj');
    });


    Route::get('lang/{lang}',function ($lang){
        session()->has('lang')?session()->forget('lang'):'';
        $lang == 'ar' ? session()->put('lang','ar') : session()->put('lang','en');
        return back();
    });
//    admin panal
    Route::group(['middleware'=>'auth:admin'],function (){

        Route::get('/dashboard','DashboardController@home')->name('admin.home');
        Route::post('/sendmail','DashboardController@sendmail')->name('admin.sendmail');
        Route::any('logout','Admin\AdminAuth@a_logout');

//        admins
        Route::resource('admins','Admin\AdminController');
        Route::delete('admins/{id}','Admin\AdminController@destroy');


//        permission & role
        Route::resource('permissions','Admin\roles\PermissionController');
        Route::resource('roles','Admin\roles\RoleController');
        Route::resource('admins/permission_role','Admin\roles\permission_roles');
        //branches
        Route::resource('branches','Admin\Branches\BranchesController');
        Route::get('branchActive', 'Admin\Branches\BranchesController@branchActive')->name('branchActive'); 
//        setting
        Route::get('setting','SettingController@index')->name('setting');
        Route::post('setting','SettingController@setting_save')->name('setting.save');

        // slide
        Route::resource('sliders', 'Admin\setting\SliderController');
        Route::resource('services', 'Admin\setting\ServicesController');
        Route::resource('videos', 'Admin\pages\VideosController');
        Route::resource('images', 'Admin\pages\ImagesController');
        // categories
        Route::resource('categories', 'Admin\category\CategoriesController');
        Route::resource('messages', 'Admin\pages\MessagesController');
        Route::post('messages/reply/{id}', 'Admin\pages\MessagesController@reply')->name('message.reply');
        Route::resource('orders', 'Admin\pages\OrdersController');
        Route::post('orders/reply/{id}', 'Admin\pages\OrdersController@orderreply')->name('order.reply');
        Route::get('uimaster', function(){
            return view('admin.ui-master');
        });
       

    });

});
