<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Auth')->group(function (){
   Route::any('login', 'LoginController@postlogin')->name('login');
//   Route::get('login/form', 'LoginController@form')->name('login_form');
    Route::any('register', 'RegisterController@create')->name('register');
//    Route::get('register/form', 'RegisterController@form')->name('register_form');
});

Route::get('/', function () {
    return view('welcome');
});

//Default Route

Route::get('/user', function () {
    return 'Hello World';
})->name('user');

Route::get('/user/back', function () {
    // Back to the last page with data input
    return back()->withInput();
})->name('user');

//Route with parms and related Controller
Route::get('/user/{id}', 'TestController@show');

//Route with parms and related Controller with namespace
//Route::get('/user_namespace/{id}', 'User\TestController@show');

//Route with multi-parms
Route::get('/user/{post}/comments/{comment}', function ($post, $comment) {
    return 'Hello World'.$post.'+'.$comment;
});

//Route with parms set by default value
Route::get('/users/{name?}', function ($name = 'Zhouhao'){
    return 'Hello World'.$name;
});

//Route with parms filtered by regular expression
Route::get('/re/{password}', function ($password){

})->where('password', '[A-Za-z]+');

//Route with parms filtered by global regular expression
//Add global regular expression in /app/providers/routeserviceprovider.php
// function boot before parent::boot
Route::get('/re2/{name}', function ($name) {
    return 'Hello World'.$name;
});

//Route redirect
Route::get('/redirect', function(){
    return redirect()->route('user');
});

//Action Redirect
Route::get('/redirect_action', function(){
    return redirect()->action('TestController@get', ['id' => 1]);
});

//Route generate url and middleware for specific route
Route::get('user/{id}/profile', function ($id) {
    $url = route('profile', ['id' => 1]);
    return $url;
})->name('profile')->middleware('routecheck');

//Route generate url and middleware for multi route
//middleware could be multiples, executed follow the sequence of list
Route::middleware(['routecheck2'])->group(function () {
    Route::get('/re4', function () {
        return 'Hellow World re4';
    })->name('re4');
    Route::get('/re3', function () {
        return 'Hellow World re3';
    })->name('re3');
});

//Route generate url and middleware group for multi route
Route::group(['middleware' => ['route_check']], function (){
    Route::get('/re5', function () {
        return 'Hellow World re5';
    })->name('re5');
});

// Default MiddleWare map to web.php and api.php should
// configured in app/Providers/RouteServiceProvider.php
// under the function mapWebRoutes and mapApiRoutes

//Arrange namespace 'app\http\controllers\user' controllers
//to list of route
Route::namespace('User')->group(function (){
    Route::get('/user_namespace/{id?}', 'TestController@show');
});

//In order to arrange group of routes for specific sub-domain
//For example account would be the subdomain of full url,
// account would be used
Route::domain('{subdomain}.foodtuo.com')->group(function () {
    Route::get('subdomain_get/{id}', function ($subdomain, $id) {
        return 'This is ' . $subdomain . ' page of User ' . $id;
    });
});

// for example 'www.domain.com/url' would specific to this route group
Route::prefix('url')->group(function () {
    // 'www.domain.com/url/users' would be used in this route group
    Route::get('users', function () {
        // Matches The "/admin/users" URL
    });
});

// route binding to model under app, model would search for the record which
// has the same field value of $user
Route::get('model_bind_route/{user}', function (App\UserAccount $user) {
    dd($user);
});

//Route::namespace('Auth')->group(function (){
//   Route::post('login', 'LoginController@postlogin')->name('login');
//   Route::post('register', 'RegisterController@postregister')->name('register');
//});

// Route bind global model configure in RouteServiceProvider.php
Route::get('model_bind_route_global/{user_model}', function (App\UserAccount $user){
    dd($user);
});
Route::group(['middleware' => ['web']], function (){
    //Csrf Token Test
    Route::get('form_without_csrf_token', function (){
        return '<form method="POST" action="/hello_from_form/create">
                    <input name="name" type="text" placeholder="Name"/>
                    <input name="password" type="text" placeholder="Password"/>
                    <button type="submit">提交</button>
                </form>';
    });

    Route::get('form_with_csrf_token', function () {
        return '<form method="POST" action="/hello_from_form/create">
                   ' . csrf_field() . '
                   <input name="name" type="text" placeholder="Name"/>
                   <input name="password" type="text" placeholder="Password"/>
                   <button type="submit">提交</button>
                </form>';
    })->name('form_user');

    Route::namespace('User')->group(function (){

        Route::get('hello_from_form/create', 'TestController@create');

        Route::post('hello_from_form', 'TestController@store');

        Route::get('hello_from_form/{id}', 'TestController@show')->name('user_account');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
