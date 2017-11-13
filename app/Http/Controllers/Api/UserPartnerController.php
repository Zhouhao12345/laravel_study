<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ResCompany as company;
use App\User as user;
use App\Repositories\Eloquent\UserPartnerRepository;
use Validator;

class UserPartnerController extends Controller
{
    protected $user_partner;
    public function __construct(UserPartnerRepository $user_partner)
    {
        $this->user_partner = $user_partner;
    }

    // Created for ajax to check validation of data
    public function validator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:40',
            'email' => 'required|string|email|max:40|unique:user_partners',
        ]);
        if ($validator->fails()){
            return response()->json(
                array([
                    'status' => '500',
                    'error' => $validator->errors(),
                ])
            );
        }
        else {
            return response()->json(
                array([
                    'status' => '300',
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                ]));
        }
    }

    public function create(Request $request)
    {
        $value = $this->user_partner->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        return $value;
    }

    public function get(Request $request, $id)
    {
        $partner = $this->user_partner->find($id);
//        $companys = $this->user_partner->find($id)->companys;
        // create and insert Many2many relation
//      $partner->companys()->saveMany([
//            new company(['name' => 'test1', 'address' => 'test1' ]),
//            new company(['name' => 'test2', 'address' => 'test2' ])
//        ]);

        // Add belong to many relation
        //$partner->companys()->attach($company)

        // Remove belong to many relation
        //$partner->companys()->detach($company)
        //$partner->companys()->detach([1,2,3])
        // Remove all
        //$partner->companys()->detach()

        $user1 = user::findOrFail(1);
        $user4 = user::findOrFail(4);

        // Remove belong to relation
//        $partner->user()->dissociate($user1);
//        $partner->save();

//        Add belong to relation
//        $partner->user()->associate($user4);
//        $partner->save();

        if ($partner)
        {
            return response()->json([
                'status' => '200',
                'name' => $partner->name,
                'email' => $partner->email,
            ]);
        } else {
            return response()->json([
                'status' => '500',
                'error' => 'Record Not Found',
            ]);
        }
    }

    public function all(Request $request)
    {
        $partner_list = $this->user_partner->all();
//        return max id of partner record not record
//        ->max('id')
//        return the length of partner list
//        ->count()
        $partner_list_array = [];
//        Remove the record when condition meet
//        $partner_list = $partner_list->reject(function ($partner){
//           return strpos($partner->email, 'zhou') === 0;
//        })->map(function ($partner){
//          return $partner->name;
//        });

        foreach ($partner_list as $partner){
            array_push( $partner_list_array,
                [
                    'name' => $partner->name,
                    'email' => $partner->email,
                    'id' => $partner->id,
                ]
            );
        };
        return response()->json(
            $partner_list_array
        );
    }

    public function search(Request $request, $attribute, $value)
    {
        $partner_list = $this->user_partner->findBy($attribute, $value);
        return response()->json(
            $partner_list
        );
    }
}
