<?php

namespace App\Http\Requests;

use App\Models\UserAccount;
use Illuminate\Foundation\Http\FormRequest;

class UserAccountPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

//    public function withValidator($validator)
//    {
//        $validator->after(function (){
//            if ($this->)
//           {
//               $validator->errors()->add('field', 'Something worng');
//           }
//        });
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:user_accounts|max:5',
            'email' => 'required',
            //
        ];
    }
}
