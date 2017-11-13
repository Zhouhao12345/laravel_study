<?php

namespace App\Repositories\Eloquent;
use Illuminate\Container\Container;

/**
 * Created by PhpStorm.
 * User: zhouhao
 * Date: 17-10-23
 * Time: 下午2:56
 */
class UserAccountRepository extends Repository{

    protected $username;
    protected $http;

    public function __construct(Container $app)
    {
        parent::__construct($app);
    }

    public function model()
    {
        return "App\Models\UserAccount";
    }

    public function index($query = '')
    {
        if (!$query) {
            $user_account = $this->model
                ->orderBy('created_at', 'desc')
                ->toArray();
        } else {
            $user_account = $this->model
                ->where('name', 'like', "%$query%")
                ->get();
        }
        return $user_account;
    }
}