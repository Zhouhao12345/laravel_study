<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserAccountGet;
use App\Http\Requests\UserAccountPost;
use App\Models\UserAccount;
use function foo\func;
use Illuminate\Http\Request;

//If the controller was not under the App\Http\Controllers
//Please add this import
use App\Http\Controllers\Controller;
//Import User model in controller
use App\Repositories\Eloquent\UserAccountRepository;

//Used for form error message overwrite
use Validator;

class TestController extends Controller
{
    //Create method for route to render the frontpage
    protected $user_account;

    protected function formatValidationErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }


    // Created for ajax to check validation of data
    public function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user_accounts',
        ]);
    }

    public function __construct(UserAccountRepository $user_account)
    {
        $this->user_account = $user_account;
    }

    public function create(Request $request)
    {
        return view('user.profile');
    }


    // Specific request with rule and authorized under app/http/requests
    public function store(UserAccountPost $request)
    {

//        $this->validate($request,[
//            // if required fail, it won't check unique
//            'name' => 'bail|required|unique:user_accounts|max:5',
//            'email' => 'required',
//        ]);
        $value = $this->user_account->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        return $value;
    }

    public function test(Request $request){
        $uri = $request->path();
        $url = $request->url();
        if ($request->is('/user_namespace/*'))
        {
            return 0;
        }
        return 1;
    }

    public function show(UserAccountGet $request, $id)
    {
        $name = $this->user_account->find($id)->name;
        // Check the url of the route by rc pattern
        $uri = $request->path();
        $url = $request->url();
        $full_url = $request->fullUrl();
        // last
        $request->flash();
        $id = $request->input('id');
        if ($request->is('user_namespace/*'))
        {
            return 0;
        }
        return $name;
    }
}
