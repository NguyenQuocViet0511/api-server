<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected const PAGE_NUMBER = 1;
    protected const ARRAY_COLUMN_FILTER = ['itemsPerPage', 'page', 'sortBy', 'sortDesc', 'groupBy', 'groupDesc', 'mustSort', 'multiSort'];

    protected const STATUS_ACTIVE = 1;
    protected const STATUS_UNACTIVE = 0;

    protected $model;
    protected $modelFilter;

    /**
     * Get the repository model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getModel(): Model
    {
        if ($this->model instanceof Model) {
            return $this->model;
        }
        throw new ModelNotFoundException(
            'You must declare your repository $model attribute with an Illuminate\Database\Eloquent\Model '
            . 'namespace to use this feature.'
        );
    }

    public function get()
    {
       return $this -> model -> all();
    }

    public function getAll($columns = ['*'])
    {
        $data = $this->model->all($columns);
        $total = count($data);

        return ['total' => $total, 'data' => $data];
    }

    public function find($id)
    {
        $result = $this->model->findOrFail($id);

        return $result;
    }
    public function getOderById($columns,$type,$limit)
    {
        return  $this-> model -> orderBy($columns,$type) -> limit($limit) -> first();

    }
    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function save($attributes = [])
    {
        return $this->model->save($attributes);
    }


    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function updateOrCreate($attributes = [], $value = [])
    {
        $result = $this->model->updateOrCreate($attributes, $value);
        return $result ? $result : false;
    }

    

    public function delete($id)
    {
        $ids = explode(",", $id);

        $this->model->whereIn('id', $ids)->delete();
        return true;
    }

    public function GetByStatus()
    {
            $data = $this -> model -> where('status','Yes')->get();
            $total = count($data);
            return ['total' => $total, 'data' => $data];
    }

    public function beginTran()
    {
        DB::beginTransaction();
    }

    public function commitTran()
    {
        DB::commit();
    }

    public function rollbackTran()
    {
        DB::rollBack();
    }
}
