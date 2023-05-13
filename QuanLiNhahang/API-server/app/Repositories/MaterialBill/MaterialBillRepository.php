<?php

namespace App\Repositories\MaterialBill;

use App\Models\MaterialBill;
use App\Repositories\MaterialBill\MaterialRepositoryInterface;
use App\Repositories\BaseRepository;

class MaterialBillRepository extends BaseRepository implements MaterialBillRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new MaterialBill();
    }



        public function GetJoin($id){

            $data = $this-> model -> join('materialbillinfo','materialbillinfo.id_materialbill','=','materialbill.id')
            ->join('material','material.id','=','materialbillinfo.id')->where('materialbill.id','=',$id)
            ->select('materialbillinfo.*' )
            ->get();
            $total = count($data);
            return ['total' => $total, 'data' => $data];

        }



    public function GetById($id){


       return  $this-> model -> where('id_category',$id) -> get();


    }

    public function checkExist($id){
        $data = $this-> model -> where('id','=',$id) -> count();
        if($data > 0)
        {
            return true;
        }
        return false;
    }



}
