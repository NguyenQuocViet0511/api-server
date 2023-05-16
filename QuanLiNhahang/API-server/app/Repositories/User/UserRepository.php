<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new User();
    }

    public function getUserAndRole($data){

        $data = $this-> model -> join('role','role.id','=','users.id_role')->where('users.password' ,'=',$data['password'])->
        where('users.username' ,'=',$data['username'])
        ->select('users.*','users.username as username','users.password as password','role.name as id_role') -> get();
        $total = count($data);
        return ['total' => $total, 'data' => $data];

    }



}
