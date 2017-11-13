<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface
{
    private $app;
    protected $model;
    protected $statuscode = 200;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract function model();

    /**
     * 根据模型名创建Eloquent ORM 实例
     *
     * @return bool|\Illuminate\Database\Eloquent\Builder
     */

    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            return false;
        }
        return $this->model = $model;
    }

    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function with($relations)
    {
        return $this->model->with(is_string($relations) ? func_get_args() : $relations);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($ids);
    }

    public function deletelist($attribute, $value)
    {
        return $this->model->where($attribute, '=', $value)->delete();
    }

    public function paginate($perPage = 10, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function update(array $data, $id, $attribute = 'id')
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * @return int
     */
    public function getStatuscode(): int
    {
        return $this->statuscode;
    }

    public function setStatuscode(int $statuscode)
    {
        $this->statuscode = $statuscode;
        return $this;
    }
}

