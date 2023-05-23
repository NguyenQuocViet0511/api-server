<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;
use App\Services\BaseService;

class UserService extends BaseService
{
    public function __Construct(UserRepositoryInterface $UserRepositoryInterface)
    {
        $this->repo = $UserRepositoryInterface;
    }

    public function getAll()
    {
        return $this->repo->getAll();
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
            $data['id'] = insertStringID('US',$getId,6);
            $data['username'] =  $data['id'];
            $data['password'] = $data['id'];
            $data['image'] = (String)$data['image'];
            $this->repo->create($data);
            $this->repo->commitTran();
            return  true;

        } catch (\Throwable$th) {
            $this->repo->rollbackTran();
            throw $th;
        }
    }


    public function delete($id)
    {

        try {
            $this->repo->beginTran();
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

        if(!empty($data['image']))
        {
            $data['image'] = (String)$data['image'];

        }
        $this->repo->update($condition, $data);
        return true;

    }

    public function changePassword($data)
    {
        $result = $this -> repo -> find($data['id']);
        $result -> update(array('password' => $data['password']));
        return true;
    }
    public function getUserAndRole($data)
    {
      return  $this -> repo -> getUserAndRole($data);
    }


}
