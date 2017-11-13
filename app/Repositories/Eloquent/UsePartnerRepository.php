<?php

namespace App\Repositories\Eloquent;
use Illuminate\Container\Container;

/**
 * Created by PhpStorm.
 * User: zhouhao
 * Date: 17-10-23
 * Time: 下午2:56
 */
class UserPartnerRepository extends Repository{

    protected $email;
    protected $http;

    public function __construct(Container $app)
    {
        parent::__construct($app);
    }

    public function model()
    {
        return "App\Models\UserPartner";
    }

    public function firstorCreate($data)
    {
        //SoftDelete migration '/database/migrations/addsoftdelete'
        // if need to search results include soft delete results
        // $this->model->history()->withTrashed()->get();

        // if need to search only softdelete results
        // $this->model->history()->onlyTrashed()->get();

        // if need to restore the result which had been soft deleted
        // $this->model->history()->where($attr, '=', $value)
        // ->restore()

        // Force Delete one
        // $this->model->find($id)->forceDelete();

        // Force Delete many lines
        // $this->model->history()->where($attr, '=', $value)
        // ->forceDelete();

        // find record if not exist then create one
        $partner = $this->model->firstOrCreate($data);

        // find record if not exist then create new instance
        // could be save to create new record
//        $partner = $this->model->firstOrNew([$attribute => $value]);
//        $partner.save();
        return $partner;
    }

    public function updateorCreate($data)
    {
        // update record if not exist then create one
        $partner = $this->model->updateOrCreate($data);
        return $partner;
    }

    public function updatesingle($id, $data)
    {
        // Find one record from table
        $partner = $this->model->find($id);
        if ($partner) {
             return $partner->update($data);
        }
        return False;
    }

    public function index($query = '')
    {
        if (!$query) {
            $user_partner = $this->model
                ->orderBy('created_at', 'desc')
                ->toArray();
        } else {
            $user_partner = $this->model
                ->where('name', 'like', "%$query%")
                ->get();
        }
        return $user_partner;
    }
}