<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use App\Events\test_event;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function partner()
    {
        return $this->hasOne('App\Models\UserPartner');
    }

    // LifeCycle of model
//一个新模型被首次保存的时候，creating 和 created
// 事件会被触发。如果一个模型已经在数据库中存在并调用
// save 方法，updating/updated 事件会被触发，无论
//是创建还是更新，saving/saved事件都会被调用。

//    protected $events = [
//        'saved' => UserSaved::class,
//        'deleted' => UserDeleted::class,
//    ];
}
