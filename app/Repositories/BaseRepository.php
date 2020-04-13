<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;


abstract class BaseRepository {

    protected $model;

    public function __construct(Model $model) 
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    public function where($column, $value)
    {
        return $this->model->where($column, $value)->get();
    }

    public function create(array $data) 
    {
        return $this->model->create($data);
    }

    public function update(array $data, int $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->model->delete($id);
    }

}
