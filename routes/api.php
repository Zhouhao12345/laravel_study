<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
], function (){
    Route::namespace('Api')->group(function (){
        Route::post('user/post', 'TestController@post');
        Route::get('user/get/{id}', 'TestController@get');
        Route::get('user_partner/all', 'UserPartnerController@all');
        Route::post('user_partner/create', 'UserPartnerController@create');
        Route::post('user_partner/validator', 'UserPartnerController@validator');
        Route::get('user_partner/get/{id}', 'UserPartnerController@get');
    });
    // Resource Route created by php artisan make:controller
// mycontroller --resource
    Route::namespace('Resource')->group(function (){
        Route::resource('video', 'VideoController',
// Control the available method
//    ['only' => ['index', 'show'],
//    ['except' => ['create', 'store', 'update']]

// Refactor the name of method of controller
//    ['names' => ['create' => 'video.build']]

// call show method of controller with parameter id
// with url '/video/{id}'
            ['parameters' => ['id' => 'id']]
        );
        // More usage for resource controller http://laravelacademy.org/post/6745.html
        Route::resource('video/create','VideoController');


    });
});