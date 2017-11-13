<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import User model in controller
use App\UserAccount;

class TestController extends Controller
{
    //Create method for route to render the frontpage
    public function post(Request $request)
    {
        // remove value of key from session
        $request->session()->forget('name');

        // remove all data from session
//        $request->session()->flush();

        //Get data from session
        $value = $request->session()->get('name');
        $value = $request->session()->get('name', 'Default_Name');
        $value = $request->session()->all();
        $value = $request->session()->get('name', function (){
            return 'Default_Name';
        });

        // if session has the key or the value of the key was not null
        if ($request->session()->has('name'))
        {
            return redirect()->to('https://www.baidu.com');
        }

        // if session has the key or the value of the key was null
        if ($request->session()->exists('name'))
        {
            return redirect()->to('https://www.sina.com');
        }

        // Set data to session for each request
        $request->session()->put('user_teams',['old_value']);

        // push new value to the array value of key from session
        // user_teams => array(['old_value'])
        // user_teams => array(['old_value', 'new_value'])
        $request->session()->push('user_teams', 'new_value');

        // Pull value of key from session and remove it from session
        $value = $request->session()->pull('name', 'Default_Name');

        // Get data from global method session
        $value = session('name');
        $value = session('name', 'Default_Name');

        //Set data by global session method
        session(['name' => 'Set_Name']);

        // Set one time session with key and value
        $request->session()->flash('name', 'value');

        // Keep one time session during this request after used them
        // Keep all
        $request->session()->reflash();
        // Keep specific field
        $request->session()->keep(['name']);

        // Regenerate session id
        $request->session()->regenerate();



        //Redirect
        // Get data from one time session
        if ($request->old('name'))
        {
            $name = $_POST['name'];
            // get data from cookie
            $name_cookie = $request->cookie('name');
            return redirect('form_with_csrf_token')->withInput($request->only('name'));
        }

        $name_cookie = $request->cookie('name');

        //Set post data into the session only could be pop one time
        $request->flash();
        $request->flashExcept('password');
        $request->flashOnly('name');


        //get all input of request
        $input = $request->all();


        //get one input by key
        $name = $request->input('name');
        $data = $request->input('data');


        //get input if key not existed give a default value
        $password = $request->input('password', '123');


        //Get value by key dynamic from request
        $name = $request->name;
//        {
//            "data":"zhouhao",
//            "email": {
//               "width": 12,
//               "height": 34
//             }
//         }


        // width should be 12
        $width = $request->input('email.width');


        if ($request->old('password'))
        {
            //get upload file from request
            $file = $request->file('photo');
            $file = $request->photo;


            //check whether file existed in request
            if ($request->hasFile('photo')) {
                //
            }


            //check whether file uploading exception happened
            if ($request->file('photo')->isValid()) {
                //
            }

            // check the absolute path of file
            $path = $request->photo->path();


            // check the extension of file
            $extension = $request->photo->extension();

            // First parms: the relative path of file system
            // Second parms: the disk name of the file system
            // Should be configured in config/filesystems.php
            $path = $request->photo->store('images', 's3');
        }

        // set cookie with name, value, minute
        $cookie = cookie('name', $name, 1);

        // set header of response
        return response($value, 200)
            ->withHeaders([
                'Content-Type' => 'text/plain'
            ])
            ->cookie($cookie);

//        return response($password, 200)
//            ->cookie($cookie)
//            ->header('Content-Type', 'text/plain');


        //cookie additional parms
        // ->cookie($name, $value, $minutes, $path, $domain, $secure, $httpOnly)
    }

    //Set the other parm with request
    public function get(Request $request, $id)
    {
        //get route url after the domain
        $uri = $request->path();
        $url = $request->url();
        $fullurl = $request->fullUrl();
        // General Check the route url meet the pattern match rc
        if($request->is('api1/*'))
        {
            return $uri.' Yes '. $id;
        }
        if($request->isMethod('get'))
        {
            return $uri.' Yes '. $id;
        }
        return $uri.' No '. $id.' '.$url.' '.$fullurl;
    }
}
