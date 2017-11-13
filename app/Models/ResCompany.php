<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResCompany extends Model
{
    protected $table = 'res_company';

    protected $fillable = ['name', 'address'];

    public function partners()
    {
        return $this->belongsToMany('App/Models/UserPartner',
                                    'company_partner_ref',
                                    'partner_id',
                                    'company_id');
//        Defind the middle table with model defination
//        return $this->belongsToMany('App\User')->using('App\UserRole');
    }
}
