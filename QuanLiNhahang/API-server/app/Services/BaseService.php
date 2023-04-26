<?php
namespace App\Services;

abstract class BaseService
{

    protected $repo;

    public function Show($name)
    {
        return $this -> repo -> where('name',$name) -> get();
    }


}

