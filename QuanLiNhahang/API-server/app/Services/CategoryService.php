<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Food\FoodRepositoryInterface;

use App\Services\BaseService;


class CategoryService extends BaseService
{
    protected $_FoodRepositoryInterface;
    public function __Construct(CategoryRepositoryInterface $CategoryRepositoryInterface,FoodRepositoryInterface $FoodRepositoryInterface)
    {
        $this->repo = $CategoryRepositoryInterface;
        $this -> _FoodRepositoryInterface = $FoodRepositoryInterface;
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }
    public function GetByStatus(){
        return $this -> repo -> GetByStatus();
    }
    public function get()
    {
        return $this->repo->get();
    }

    public function getById($id)
    {
        return $this->repo->find($id);
    }

    public function create($data = [])
    {
        try {
            $this->repo->beginTran();
            $getId = $this ->  repo -> getOderById('id','desc',1);
            $data['id'] = insertStringID('CG',$getId,6);
            $data['count'] = 0;
            $this->repo->create($data);
            $this->repo->commitTran();
            return true;

        } catch (\Throwable$th) {
            $this->repo->rollbackTran();
            throw $th;
        }
    }

    public function delete($id)
    {

        try {
            $this->repo->beginTran();
            $food = $this -> _FoodRepositoryInterface -> GetById($id);
            foreach($food as $item)
            {
                $item -> delete();
            }

            $this->repo->delete($id);

            $this->repo->commitTran();
            return true;

        } catch (\Throwable$th) {

            $this->repo->rollbackTran();

            throw $th;
        }

    }
    public function update($condition = [], $data = [])
    {
        $this->repo->update($condition, $data);
        return true;
    }



}
