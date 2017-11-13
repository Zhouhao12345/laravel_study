<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Import User model in controller
use App\UserAccount;
use function MongoDB\BSON\toJSON;

class TestController extends Controller
{
    //Create method for route to render the frontpage
    public function post(Request $request)
    {
        //get all input of request
        $input = $request->all();
        //get one input by key
        $name = $request->input('name');
        $index = $request->input('index');
        $username = $request->input('username');
        $username2 = $request->input('username2');
        $width = $request->input('email.width');
        $height = $request->input('email.height');
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
//        $array_json = array(
//                            'name' => $name,
//                            'password' => $password,
//                            'email' => array(
//                                'width' => $width,
//                                'height' => $height,
//                            ),
//                        );
//        $array_list = array(
//            $name,
//            $password,
//        );
        $array_json = array(
            'username' => $username,
            'username2' => $username2,
            'status' => '200',
            'success' => 'Welcome'
        );
        //json encode for api calling
        return response()->json(
            $array_json
        )->cookie('name', '123', 1);

        // Display the file on browser
        // return response()->file($pathToFile, $headers);


        // http://blog.csdn.net/u011700203/article/details/46532455
        // jsonp callback to solve the 'access control allow origin' problem
//            ->withCallback($request->input('name'));
//            ->header('Content-Type', 'text/plain');


        // Response with file download
//        return response()->download(
//            '/home/zhouhao/work/generic_report/trading_purchase_order/report/purchase_order_template.ods'
//        );
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
