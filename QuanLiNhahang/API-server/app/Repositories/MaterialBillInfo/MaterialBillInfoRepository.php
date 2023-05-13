<?php

namespace App\Repositories\MaterialBillInfo;

use App\Models\MaterialBillInfo;
use App\Repositories\MaterialBillInfo\MaterialBillInfoRepositoryInterface;
use App\Repositories\BaseRepository;

class MaterialBillInfoRepository extends BaseRepository implements MaterialBillInfoRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new MaterialBillInfo();
    }


        public function GetJoin($id){

            $data = $this-> model -> join('materialbill','materialbill.id','=','materialbillinfo.id_materialbill')
            ->join('material','material.id','=','materialbillinfo.id')->where('materialbill.id','=',$id)
            ->select('materialbillinfo.*' ,'material.name as name','material.price as price','materialbill.status as status')
            ->get();
            $total = count($data);
            return ['total' => $total, 'data' => $data];

        }


    public function GetAllID($data){


       return  $this-> model -> where('id_materialbill','=',$data)-> get();


    }

    public function checkExist($id,$id_bill){
        $data = $this-> model -> where('id','=',$id)->where('id_materialbill','=',$id_bill)-> first();
        return $data;
    }


}
