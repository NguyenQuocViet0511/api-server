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


    public function GetBillInfo($id){

        $data = $this-> model -> join('food','food.id','=','billinfo.id')
        ->join('bill', 'bill.id', '=', 'billinfo.id_bill')->where('bill.status','=','No')->where('bill.id',"=",$id)
        ->select('billinfo.*','bill.status as billstatus','food.name as foodname','food.price as foodprice')
        ->get();
        $total = count($data);
        return ['total' => $total, 'data' => $data];
    }

    public function checkExist($id,$id_bill){
        $data = $this-> model -> where('id','=',$id)->where('id_bill','=',$id_bill)-> where('status','No') -> first();

        return $data;
    }

}
