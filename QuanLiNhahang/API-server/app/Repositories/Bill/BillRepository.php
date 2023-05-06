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

    public function GetBill(){

        $data = $this-> model -> join('tablefood','tablefood.id_bill','=','bill.id')->where('tablefood.status','=','Đang Ăn')
        ->join('billinfo', 'billinfo.id_bill', '=', 'bill.id')->where('bill.status','=','No')
        ->select('*','bill.status as billstatus')
        ->get();
        $total = count($data);
        return ['total' => $total, 'data' => $data];
    }



}
