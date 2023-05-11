<?php

namespace App\Repositories\Bill;

use App\Models\Bill;
use App\Repositories\Bill\BillRepositoryInterface;
use App\Repositories\BaseRepository;

class BillRepository extends BaseRepository implements BillRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new Bill();
    }

    public function GetBill($id){

        $data = $this-> model -> join('tablefood','tablefood.id_bill','=','bill.id')->where('tablefood.status','=','Yes')
        ->join('billinfo', 'billinfo.id_bill', '=', 'bill.id')->where('bill.status','=','No')->where('tablefood.id',"=",$id)
        ->select('bill.*','bill.status as billstatus')
        ->get();
        $total = count($data);
        return ['total' => $total, 'data' => $data];
    }

    public function checkExist($id){
        $data = $this-> model -> where('id','=',$id) -> where('status','No')-> count();
        if($data > 0)
        {
            return true;
        }
        return false;
    }

}
