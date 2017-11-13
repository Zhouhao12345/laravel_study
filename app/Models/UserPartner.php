<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPartner extends Model
{
    //Define one new database connection for this model
    //    protected $connection = 'connection-name';
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'user_partners';

    protected $fillable = ['name', 'email', 'use_id'];

    // prevent input value
    protected $guarded = ['id'];


    //One2one, it will create foreign key called 'user_partners_id' in UserAccount
    public function accounts()
    {
        return $this->hasMany('App\Models\UserAccount', 'partner_id', 'id');
    }

    public function companys()
    {
        return $this->belongsToMany('App\Models\ResCompany','company_partner_ref','partner_id','company_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
