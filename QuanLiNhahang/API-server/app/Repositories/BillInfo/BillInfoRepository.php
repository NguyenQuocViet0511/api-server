<?php

namespace App\Repositories\BillInfo;

use App\Models\BillInfo;
use App\Repositories\BillInfo\BillInfoRepositoryInterface;
use App\Repositories\BaseRepository;

class BillInfoRepository extends BaseRepository implements BillInfoRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new BillInfo();
    }


    public function GetJoin($data){

        $data = $this-> model -> join('bill','bill.id','=','billinfo.id_bill')
        ->join('tablefood','tablefood.id_bill','=','bill.id')
        ->join('food','food.id','=','billinfo.id')->where('tablefood.id','=',$data['id_table'])->where('tablefood.status','=','Yes')
        ->select('billinfo.*','bill.status as billstatus','food.name as foodname','food.price as foodprice','tablefood.id as Tableid','bill.timein')
        ->get();
        $total = count($data);
        return ['total' => $total, 'data' => $data];
    }
    public function GetJoinBill($data){

        $data = $this-> model -> join('bill','bill.id','=','billinfo.id_bill')
        ->join('food','food.id','=','billinfo.id')->where('bill.id','=',$data['id_bill'])
        ->select('billinfo.*','bill.status as billstatus','food.name as foodname','food.price as foodprice','bill.timein')
        ->get();
        $total = count($data);
        return ['total' => $total, 'data' => $data];
    }

    public function checkExist($id,$id_bill){
        $data = $this-> model -> where('id','=',$id)->where('id_bill','=',$id_bill)-> where('status','No') -> first();
        return $data;
    }

}
